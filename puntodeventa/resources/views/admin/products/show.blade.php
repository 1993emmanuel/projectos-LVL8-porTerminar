@extends('layouts.admin')


@section('title','Products Detalles')

@section('styles')
@endsection

@section('create')
	<li class="nav-item d-none d-lg-flex">
		<a href="{{route('products')}}" class="nav-link">
			<span class="btn btn-primary">Ver Productos</span>
		</a>
	</li>
@endsection

@section('options')
@endsection

@section('preference')
@endsection


@section('content')
      <div class="content-wrapper">
		<div class="page-header">
			<h3 class="page-title">Detalles Productos</h3>
		</div>
		<nav arial-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
				<li class="breadcrumb-item"><a href="{{route('products')}}">Productos</a></li>
				<li class="breadcrumb-item active" aria-current="page">
                              Detalles del Producto {{$product->name}}
                        </li>
			</ol>
		</nav>
            <div class="row">
                  <div class="col-12">
                        <div class="card">
                              <div class="card-body">
                                    <div class="row">
                                          <div class="col-lg-4">
                                                <div class="border-bottom text-center pb-4">

                                                      <img src="{{asset('image/'.$product->image)}}"
                                                            class="img-lg mb-3" alt="profile">


                                                      <h3>{{$product->name}}</h3>
                                                      <div class="d-flex justify-content-between"></div>
                                                </div>
{{--                                                 <div class="border-bottom py-4">
                                                      <div class="list-group">
                                                            <button type="button" class="list-group-item list-group-item-action active">
                                                                  Sobre Producto
                                                            </button>
                                                            <button class="list-group-item list-group-item-action">
                                                                  Productos
                                                            </button>
                                                            <button class="list-group-item list-group-item-action">
                                                                  Registrar Producto
                                                            </button>
                                                      </div>
                                                </div> --}}

                                                <div class="py-4">
                                                      <p class="clearfix">
                                                            <span class="float-left">Estado del Producto</span>
                                                            <span class="float-right text-muted">
                                                                  {{$product->status}}
                                                            </span>
                                                      </p>
                                                      <p class="clearfix">
                                                            <span class="float-left">Proveedor</span>
                                                            <span class="float-right text-muted">
                                                                  {{-- productos por provedor --}}
                                                                  <a href="
                                                                        {{route('providers.show',$product->provider->id)}}
                                                                        ">
                                                                        {{$product->provider->name}}
                                                                  </a>
                                                            </span>
                                                      </p>
                                                      <p class="clearfix">
                                                            <span class="float-left">Categoria</span>
                                                            <span class="float-right text-muted">
                                                                  {{-- productos por categoria --}}
                                                                  {{$product->category->name}}
                                                            </span>
                                                      </p>
                                                </div>

                                                @if($product->status == 'ACTIVE')
                                                      <button class="btn btn-success btn-block">
                                                            {{$product->status}}
                                                      </button>
                                                @else
                                                      <button class="btn btn-warning btn-block">
                                                            {{$product->status}}
                                                      </button>
                                                @endif


                                          </div>


                                          <div class="col-lg-5 pl-lg-5">
                                                <div class="d-flex justify-content between">
                                                      <div>
                                                            <h4>Informacion del proveedor</h4>
                                                      </div>
                                                </div>
                                                <div class="profile-feed">
                                                      <div class="d-flex align-items-start profile-feed-item">
                                                            
                                                            <div class="form-group col-md-6">
                                                                  <strong>
                                                                        <i class="fab fa-product-hunt mr-1"></i>Codigo del Producto
                                                                  </strong>
                                                                  <p class="text-muted">{{$product->code}}</p>
                                                                  <hr>
                                                                  <strong>
                                                                        <i class="fab fa-product-hunt mr-1"></i>Stock
                                                                  </strong>
                                                                  <p class="text-muted">{{$product->stock}}</p>
                                                                  <hr>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                  <strong>
                                                                        <i class="far fa-address-card mr-1"></i>Precio de venta
                                                                  </strong>
                                                                  <p class="text-muted">{{$product->sell_price}}</p>
                                                                  <hr>
                                                            </div>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                              </div>

                              <div class="card-footer text-muted">
                                    <a href="{{route('providers')}}" class="btn btn-primary float-right">Regresar</a>
                              </div>

                        </div>
                  </div>
            </div>
	</div>
@endsection


@section('scripts')
	{!! Html::script('melody/js/data-table.js') !!}
@endsection

