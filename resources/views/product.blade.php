@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card mb-5">
                <div class="page-header-content header-elements-md-inline">
                    <h4 class="font-weight-bold text-center my-5">TOP 10 PRODUCTS</h4>
                </div>
                <div class="pt-2 pr-1 pl-1 table-responsive table-light col-sm-12 ">
                    <table class="table table-light table-striped table-border">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Produk</th>
                                <th>Nama Product</th>
                                <th>Jumlah Terjual</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product as $key=>$data)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$data->product_id}}</td>
                                <td>{{$data->product->product_name}}</td>
                                <td>{{$data->total}}</td>
                                <td> <a class="btn btn-sm btn-success" style="text-decoration:none;"
                                        href="{{ route('detail', $data->product_id) }}">Detail
                                    </a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
