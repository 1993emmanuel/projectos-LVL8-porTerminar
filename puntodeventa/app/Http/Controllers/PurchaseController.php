<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;

use App\Models\Provider;
use App\Models\Product;
use App\Http\Requests\Purchase\StoreRequest;
use App\Http\Requests\Purchase\UpdateRequest;

//carbon usado para poner la hora
use Carbon\Carbon;
//auth para sacar informacion de la session
use Illuminate\Support\Facades\Auth;
//para poder imprimir el PDF
use Barryvdh\DomPDF\Facade as PDF;



class PurchaseController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $purchases = Purchase::get();
        return view('admin.purcharses.index',compact('purchases'));
    }
    public function create()
    {
        $providers = Provider::get();
        $products = Product::get();
        return view('admin.purcharses.create',compact('providers','products'));
    }
    public function store(StoreRequest $request)
    {   
        $purchase = Purchase::create($request->all()+[
            'user_id'=>Auth::user()->id,
            'purchase_date'=>Carbon::now('America/Mexico_City'),
        ]);

        foreach($request->product_id as $key=>$product){
            $results[] = array("product_id"=>$request->product_id[$key], "quantity"=>$request->quantity[$key], "price"=>$request->price[$key]);
        }
        $purchase->purchaseDetails()->createMany($results);
        return redirect()->route('purcharses');
    }
    public function show(Purchase $purchase)
    {   
        $subtotal = 0;
        $purchaseDetails  = $purchase->purchaseDetails;
        foreach($purchaseDetails as $purchaseDetail){
            $subtotal+=$purchaseDetail->quantity * $purchaseDetail->price;
        }
        return view('admin.purcharses.show',compact('purchase','subtotal','purchaseDetails'));
    }

    // public function edit(Purchase $purchase)
    // {
    //     // $providers = Provider::get();
    //     // return view('admin.purchase.edit',compact('providers'));
    // }

    public function update(UpdateRequest $request, Purchase $purchase)
    {
        // $purchase->update($request->all());
        // return redirect()->route('purchase.index');
    }
    public function destroy(Purchase $purchase)
    {
        // $purchase->delete();
        // return redirect()->route('purchase.index');
    }

    public function pdf(Purchase $purchase){
        $subtotal = 0;
        $purchaseDetails = $purchase->purchaseDetails;
        foreach($purchaseDetails as $purchaseDetail){
            $subtotal+= $purchaseDetail->quantity * $purchaseDetail->price;
        }
        $pdf = PDF::loadView('admin.purcharses.pdf', compact('purchase', 'subtotal', 'purchaseDetails'));
        return $pdf->download('Reporte_de_compra_'.$purchase->id.'.pdf');
    }

    public function upload(Request $request, Purchase $purchase){
        //$purchase->update($request->all());
        //return redirect()->route('admin.purcharses.index');
    }

    public function change_status(Purchase $purchase){
        // $purchase->update($request->all());
        // return redirect()->route('admin.purcharses.index');
        if($purchase->status == 'VALID'){
            $purchase->update(['status'=>'CANCELED']);
            return redirect()->back();
        }else{
            $purchase->update(['status'=>'VALID']);
            return redirect()->back();
        }
    }

}
