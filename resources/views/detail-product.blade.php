@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card mb-5">
                <div class="">
                    <a href="/product" class="btn btn-danger">Kembali</a>
                </div>
                <div class="page-header-content header-elements-md-inline">
                        <h4 class="font-weight-bold text-center my-5">DETAIL - {{$product->product_name}}</h4>
                        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                </div>
                <div class=" card">
                    <div class="pt-2 pr-1 pl-1 table-responsive table-light col-sm-12 ">
                        <table class="table table-light table-striped table-border">
                            <tr>
                                <th>Nama</th>
                                <td>{{$product->product_name}}</td>
                            </tr>
                            <tr>
                                <th>Harga Jual</th>
                                <td>Rp {{$product->price_sell}}</td>

                            </tr>
                            <tr>
                                <th>Harga Agen</th>
                                <td>Rp {{$product->price_agent}}</td>
                            </tr>
                        </table>
                        <br />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
