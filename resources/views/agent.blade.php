@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card mb-5">
                <div class="page-header-content header-elements-md-inline">
                    <h4 class="font-weight-bold text-center my-5">TOP 10 Customer</h4>
                </div>
                <div class="pt-2 pr-1 pl-1 table-responsive table-light col-sm-12 ">
                    <table class="table table-light table-striped table-border">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Agent Id</th>
                                <th>Nama Agent</th>
                                <th>Jumlah Customer</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $key=>$data)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$data->agent_id}}</td>
                                <td>{{$data->agent_name}}</td>
                                <td>{{$data->total}}</td>
                                <td> <a class="btn btn-sm btn-success" style="text-decoration:none;"
                                        href="{{ route('detail', $data->agent_id) }}">Detail
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
