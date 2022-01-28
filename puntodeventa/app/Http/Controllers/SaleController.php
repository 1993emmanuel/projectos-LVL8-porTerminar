<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

use App\Models\Client;
use App\Models\Product;
use App\Http\Requests\Sale\StoreRequest;
use App\Http\Requests\Sale\UpdateRequest;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

//para poder imprimir el PDF
use Barryvdh\DomPDF\Facade as PDF;

//github de la libreria que usamos
//https://github.com/mike42/escpos-php
//librerias que usamos para poder imprimir en salesController
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;
//esta libreria nos permite imprimir imagenes.
use Mike42\Escpos\EscposImage;
//nos permite cargar los conectores del windows
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;


class SaleController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $sales = Sale::get();
        return view('admin.sales.index',compact('sales'));
    }
    public function create()
    {
        $clients = Client::get();
        $products = Product::get();
        return view('admin.sales.create',compact('clients','products'));
    }
    public function store(StoreRequest $request)
    {
        $sale = Sale::create($request->all()+[
            'user_id'=>Auth::user()->id,
            'sale_date'=>Carbon::now('America/Mexico_City'),
        ]);
        foreach($request->product_id as $key=>$product){
            $results[] = array("product_id"=>$request->product_id[$key],"quantity"=>$request->quantity[$key],"price"=>$request->price[$key],"discount"=>$request->discount[$key]);
        }
        // dd($results);
        $sale->saleDetails()->createMany($results);
        // $purchase->comments()->createMany([
        //     ['message' => 'A new comment.'],
        //     ['message' => 'Another new comment.'],
        // ]);
        // return redirect()->route('sales');
    }
    public function show(Sale $sale)
    {
        $subtotal = 0;
        $salesDetalles = $sale->saleDetails;
        foreach($salesDetalles as $salesDetalle){
            $subtotal+=$salesDetalle->quantity * $salesDetalle->price - 
                $salesDetalle->quantity * $salesDetalle->price*$salesDetalle->discount / 100;
        }
        return view('admin.sales.show',compact('sale','subtotal','salesDetalles'));
    }
    public function edit(Sale $sale)
    {
        // $clients = Client::get();
        // return view('admin.sale.show',compact('clients'));
    }
    public function update(UpdateRequest $request, Purchase $purchase)
    {
        // $purchase->update($request->all());
        // return redirect()->route('purchase.index');
    }
    public function destroy(Sale $sale)
    {
        // $purchase->delete();
        // return redirect()->route('purchase.index');
    }

    public function pdf(Sale $sale){
        $subtotal = 0;
        $salesDetalles = $sale->saleDetails;
        foreach($salesDetalles as $salesDetalle){
            $subtotal+=$salesDetalle->quantity * $salesDetalle->price - 
                $salesDetalle->quantity * $salesDetalle->price*$salesDetalle->discount / 100;
        }
        $pdf = PDF::loadView('admin.sales.pdf', compact('sale', 'subtotal', 'salesDetalles'));
        return $pdf->download('Reporte_de_venta_'.$sale->id.'.pdf');
    }

    public function print(Sale $sale){
        try{
            $subtotal = 0;
            $salesDetalles = $sale->saleDetails;
            foreach($salesDetalles as $salesDetalle){
                $subtotal+=$salesDetalle->quantity * $salesDetalle->price - 
                    $salesDetalle->quantity * $salesDetalle->price*$salesDetalle->discount / 100;
            }

            //se puede generar un crud para las impresoras y el tipo de cada una de ellas
            //y de esta manera sacar el valor de dicha impresora.
            $printer_name = "TM20";

            $conector = new WindowsPrintConnector($printer_name);
            $printer = new Printer($conector);

            $printer->text('$ contenido 1');//este es el contenido de la boleta

            $printer->cut();//cortar automaticamente una vez que se termina de imprimir el printer->text
            $printer->close();

            return redirect()->back();
        }catch(Throwable $th){
            return redirect()->back();
        }
    }

    public function change_status(Sale $sale){
        if($sale->status == 'VALID'){
            $sale->update(['status'=>'CANCELED']);
            return redirect()->back();
        }else{
            $sale->update(['status'=>'VALID']);
            return redirect()->back();
        }
    }

}
