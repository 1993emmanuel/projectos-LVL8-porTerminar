<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venta</title>
</head>
<body>
    <style>

        body{
            font-family: Arial, sans serif;
            font-size: 14px;
        }

        #datos{
            float: left;
            margin-top: 0%;
            margin-left: 2%;
            margin-right: 2%;

        }

        #fact{
            float: right;
            margin-top: 2%;
            margin-left: 2%;
            margin-right: 2%;
            font-size: 20px;
            background: #33AFFF;
        }

        section{
            clear: left;
        }

        #cliente{
            text-align: left;
        }

        #faproveedor{
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 15px;
        }

        #fac,
        #fv,
        #fa{
            color: #FFFFFF;
            font-size: 15px;
        }

        #faproveedor thead{
            padding: 20px;
            background: #33AFFF;
            text-align: left;
            border: 1px solid #FFFFFF;
        }

        #faccomprador{
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 15px;
        }

        #faccomprador thead{
            padding: 20px;
            background: #33AFFF;
            text-align: center;
            border: 1px solid #FFFFFF;
        }

        #facproductpo{
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 15px;
        }

        #facproducto thead{
            padding: 20px;
            background: #33AFFF;
            text-align: center;
            border-bottom: 1px solid #FFFFFF;
        }

    </style>

    <header>
        <div>
            <table id="datos">
                <thead>
                    <tr>
                        <th id="">Datos del proveedor</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>
                            <p id="faproveedor">
                                Nombre : {{$sale->user->name}} <br>
                                Email : {{$sale->user->email}} <br>
                            </p>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>

        <div id="fact">
            <p>
                numero de venta <br>
                {{$sale->id}}
            </p>
        </div>
    </header>

    <br><br>

    <section>
        <div>
            <table id="faccomprador">
                <thead>
                    <tr id="fv">
                        <th>COMPRADOR</th>
                        <th>FECHA DE COMPRA</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$sale->user->name}}</td>
                        <td>{{$sale->created_at}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <br>

    <section>
        <div>
            <table id="facproducto">
                <thead>
                    <tr id="fa">
                        <th>CANTIDAD</th>
                        <th>PRODUCTO</th>
                        <th>PRECIO COMPRA (PEN)</th>
                        <th>SUBTOTAL (PEN)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($salesDetalles as $salesDetail)
                        <tr>
                            <td>{{$salesDetail->quantity}}</td>
                            <td>{{$salesDetail->product->name}}</td>
                            <td>{{$salesDetail->price}}</td>
                            <td>s/ {{number_format($salesDetail->quantity * $salesDetail->price,2)}}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3">
                            <p align="right">SUBTOTAL</p>
                        </th>
                        <th>
                            <p align="right">{{number_format($subtotal,2)}}</p>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3">
                            <p align="right">TOTAL IMPUESTO({{$sale->tax}}%)</p>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3"><p align="right">TOTAL A PAGAR</p></th>
                        <th>
                            <p align="right">s/{{number_format($subtotal + $sale->tax,2 )}}</p>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>

    <footer>
        <div id="datos">
            <p id="encabezado">
                {{-- Datos de la empresa --}}
            </p>
        </div>
    </footer>


</body>
</html>