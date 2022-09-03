@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card mb-5">
                <div>
                    <a href="{{route('orders')}}" class="btn btn-danger"><< Kembali</a>
                </div>
                <div class="page-header-content header-elements-md-inline">
                        <h4 class="font-weight-bold text-center my-3">DETAIL - {{$order->invoice_id}}</h4>
                </div>
                <div class=" card">
                    <div class="pt-2 pr-1 pl-1 table-responsive table-lidgt col-sm-12 ">
                        <table class="table table-lidgt table-striped  table-striped table-border">
                                <tr>
                                    <th>No Pesanan</th>
                                    <td>{{$order->invoice_id}}</td>
                                </tr>
                                <tr>
                                    <th>Nama</th>
                                    <td>{{$order->name}}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    @if($order->status == 1)
                                    <td><span class="badge badge-secondary">New Order</span></td>
                                    @elseif ($order->status == 2)
                                    <td><span class="badge badge-info">Payment Success</span></td>
                                    @elseif ($order->status == 3)
                                    <td><span class="badge badge-info">Order Process</span></td>
                                    @elseif ($order->status == 4)
                                    <td><span class="badge badge-success">Order Completed</span></td>
                                    @elseif ($order->status == 5)
                                    <td><span class="badge badge-warning">Order Cancel</span></td>
                                    @elseif ($order->status == 6)
                                    <td><span class="badge badge-warning">Payment Pending</span></td>
                                    @elseif ($order->status == 7)
                                    <td><span class="badge badge-danger">Payment Failed</span></td>
                                    @endif
                                </tr>
                                <tr>
                                    <th>Waktu Pesan</th>
                                    <td>{{$order->order_time}}</td>
                                </tr>
                                <tr>
                                    <th>Total Pembayaran</th>
                                    <td>{{$order->payment_final}}</td>
                                </tr>
                                <tr>
                                <th>Metode Pembayaran</th>
                                <td>{{$order->payment_method}}</td>
                                </tr>
                                <tr>
                                <th>Alamat</th>
                                <td>{{$order->address}} {{$order->kelurahan}}
                                        <br>
                                        {{$order->kecamatan}} {{$order->kota}}
                                        <br>
                                        {{$order->provinsi}}
                                    </td>
                                </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection