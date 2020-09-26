@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @if(Session::has('success_msg'))
                <div class="alert alert-success">{{ Session::get('success_msg') }}</div>
            @endif
            @if(Session::has('error_msg'))
                <div style="background: firebrick" ">{{ Session::get('error_msg') }}</div>
            @endif
        <!-- Posts list -->
            @if(!empty($routerdata))
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Posts List </h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('routerdata.add') }}"> Add New</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <table class="table table-striped task-table">
                            <!-- Table Headings -->
                            <thead>
                            <th width="25%">SAP id</th>
                            <th width="40%">Host Name</th>
                            <th width="40%">Loop Back</th>
                            <th width="40%">Mac Address</th>
                            <th width="15%">Created</th>
                            <th width="20%">Action</th>
                            </thead>

                            <!-- Table Body -->
                            <tbody>
                            @foreach($routerdata as $data)
                                <tr>
                                    <td class="table-text">
                                        <div>{{$data->sap_id}}</div>
                                    </td>
                                    <td class="table-text">
                                        <div>{{$data->host_name}}</div>
                                    </td>
                                    <td class="table-text">
                                        <div>{{$data->loopback}}</div>
                                    </td>
                                    <td class="table-text">
                                        <div>{{$data->mac_address}}</div>
                                    </td>
                                    <td class="table-text">
                                        <div>{{$data->created}}</div>
                                    </td>
                                    <td>
                                        <a href="{{ route('routerdata.details', $data->id) }}" class="label label-success">Details</a>
                                        <a href="{{ route('routerdata.edit', $data->id) }}" class="label label-warning">Edit</a>
                                        <a href="{{ route('routerdata.delete', $data->id) }}" class="label label-danger" onclick="return confirm('Are you sure to delete?')">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
