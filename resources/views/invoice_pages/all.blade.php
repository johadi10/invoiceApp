@extends('template')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">All Invoices</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Invoices (completed and not completed)
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <!-- /.col-lg-6 (nested) -->
                            <div class="col-lg-12">

                                <div class="table-responsive">
                                    @include('partials.success')
                                    <table class="table table-striped table-bordered table-hover" id="item-table">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Invoice Number</th>
                                            <th>Invoice Status</th>
                                            <th>Invoice Client</th>
                                            <th>Payment method</th>
                                            <th>Date Created</th>
                                            <th>Due Date</th>
                                            <th>View</th>
                                            <th>Edit</th>
                                            <th>Remove</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(count($invoices))
                                            @foreach($invoices as $invoice)
                                                @if($invoice->completed==0)
                                                    <tr class="text-danger">
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$invoice->invoice_number}}</td>
                                                        <td>Not completed</td>
                                                        <td>Not available</td>
                                                        <td>Not available</td>
                                                        <td>{{$invoice->created_at->toFormattedDateString()}}</td>
                                                        <td>Not available</td>
                                                        <td colspan="2"><a class="btn btn-primary btn-sm" href="/invoice/generate/{{$invoice->id}}"><i class="fa fa-link"></i> complete Invoice</a></td>
                                                        <td><a class="btn btn-danger btn-sm" href="/invoice/delete/{{$invoice->id}}" onclick="return showConfirm()"><i class="fa fa-times"></i> Remove</a></td>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$invoice->invoice_number}}</td>
                                                        <td>Completed</td>
                                                        <td>{{$invoice->client->first_name.' '.$invoice->client->last_name}}</td>
                                                        <td>{{$invoice->payment_method}}</td>
                                                        <td>{{$invoice->created_at->toFormattedDateString()}}</td>
                                                        <td>{{$invoice->due_date->toFormattedDateString()}}</td>
                                                        <td><a class="btn btn-success btn-sm" href="/invoice/view/{{$invoice->id}}"><i class="fa fa-check"></i> view</a></td>
                                                        <td><a class="btn btn-primary btn-sm" href="/invoice/edit/{{$invoice->id}}"><i class="fa fa-link"></i> Edit</a></td>
                                                        <td><a class="btn btn-danger btn-sm" href="/invoice/delete/{{$invoice->id}}" onclick="return showConfirm()"><i class="fa fa-times"></i> Remove</a></td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <!-- /.col-lg-6 (nested) -->
                        </div>
                        <!-- /.row (nested) -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
@endsection