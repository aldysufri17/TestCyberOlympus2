@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card mb-5">
                <div class="page-header-content header-elements-md-inline">
                    <h4 class="text-center my-3 font-weight-bold">ORDER LISTS</h4>
                </div>
                <div class="col-md-12">
                    @if ($orders->IsNotEmpty())
                    <h6 class="mb-0 my-3 text-danger">Cari Berdasarkan Nama</h6>
                    <form action="/search" method="GET">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Cari" aria-label="Cari" name="name"
                                aria-describedby="basic-addon2">
                            <div class="input-group-append" value="{{ Request::get('name') }}">
                                <button class="btn btn-primary" type="submit">Cari</button>
                            </div>
                            @if (Request::get('name') != "")
                            <a class="btn btn-warning" href="{{route('orders')}}">Clear</a>
                            @endif
                        </div>
                    </form>
                    <div class="my-2">
                        <form action="/filter" method="GET">
                            @csrf
                            <h6 class="mb-0 my-3 text-danger">Filter Berdasarkan Tanggal Order</h6>
                            <div class="input-group mb-3">
                                <input type="date" class="form-control" value="{{ Request::get('start_date') }}"
                                    name="start_date">
                                <input type="date" class="form-control" value="{{ Request::get('end_date') }}"
                                    name="end_date">
                                <button class="btn btn-primary" type="submit">Filter</button>
                                @if (Request::get('start_date') != "" || Request::get('end_date') != "")
                                <a class="btn btn-warning" href="{{route('orders')}}">Clear</a>
                                @endif
                            </div>
                        </form>
                    </div>
                    <div class=" card">
                        <div class="pt-2 pr-1 pl-1 table-responsive table-light col-sm-12 ">
                            <table class="table table-light table-striped  table-striped table-border">
                                <thead>
                                    <tr>
                                        <th>Kode Order</th>
                                        <th>Nama Customer</th>
                                        <th>Status</th>
                                        <th>Tanggal Order</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $data)
                                    <tr>
                                        <td>{{$data->invoice_id}}</td>
                                        <td>{{$data->name}}</td>
                                        @if($data->status == 1)
                                        <td><span class="badge p-2 badge-secondary">New Order</span></td>
                                        @elseif ($data->status == 2)
                                        <td><span class="badge p-2 badge-info">Payment Success</span></td>
                                        @elseif ($data->status == 3)
                                        <td><span class="badge p-2 badge-info">Order Process</span></td>
                                        @elseif ($data->status == 4)
                                        <td><span class="badge p-2 badge-success">Order Completed</span></td>
                                        @elseif ($data->status == 5)
                                        <td><span class="badge p-2 badge-danger">Order Cancel</span></td>
                                        @elseif ($data->status == 6)
                                        <td><span class="badge p-2 badge-warning">Payment Pending</span></td>
                                        @elseif ($data->status == 7)
                                        <td><span class="badge p-2 badge-danger">Payment Failed</span></td>
                                        @endif
                                        <td>{{date('d-m-Y', strtotime($data->order_time))}}</td>
                                        <td> <a class="btn btn-sm btn-success" style="text-decoration:none;"
                                                href="{{ route('order.detail', $data->id) }}">Detail
                                            </a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br />
                        </div>
                    </div>
                    @else
                    @if (Request::get('end_date') || Request::get('start_date') || Request::get('name') )
                    <a class="btn btn-sm btn-primary" href="{{route('orders')}}"><i class="fas fa-angle-double-left"></i>
                        << Tampilkan Semua Data</a>
                    @endif
                        <div class="card-body text-danger ">Oops data order tidak ditemukan.!</div>
                    @endif
                </div>
            </div>
            {{$orders->links()}}
        </div>
    </div>
</div>
@endsection
