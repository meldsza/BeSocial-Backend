@extends('layouts.admin')
@section('nav-ngo')
active
@endsection
@section('content')
<div class="container-fluid">
    <h3 class="text-dark mb-4">NGO Applications</h3>
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 font-weight-bold">Application Info</p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 text-nowrap">
                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable">
                        <label>Show&nbsp;<select class="form-control form-control-sm custom-select custom-select-sm">
                                <option value="10" selected="">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>&nbsp;</label></div>
                </div>
                <div class="col-md-6">
                    <div class="text-md-right dataTables_filter" id="dataTable_filter"><label><input type="search"
                                class="form-control form-control-sm" aria-controls="dataTable"
                                placeholder="Search"></label></div>
                </div>
            </div>
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table dataTable my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th>Identification Number</th>
                            <th>NGO Name</th>
                            <th>User ID</th>
                            <th>Verified</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($res as $value)
                        <tr>
                            <td>{{ $value->identification_number }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->user_id }}</td>
                            <td>{{ $value->verified?'Yes':'No' }}</td>
                            <td>
                                <div class="float-left" style="padding-right:10px;">
                                    <form method="POST" action="{{url('/nGO/'.$value->id.'/verify')}}">
                                        @csrf<button class="btn btn-success" type="submit" title="Verify"><i
                                                class="text-center fa fa-check" aria-hidden="true"></i></button>
                                    </form>
                                </div>
                                <div class="float-left">
                                    <form method="POST" action="{{url('/nGO/'.$value->id.'/deverify')}}"> @csrf<button
                                            class="btn btn-danger" type="submit" title="Deverify"><i
                                                class="text-center fa fa-ban" aria-hidden="true"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr></tr>
                    </tfoot>
                </table>
            </div>
            <div class="row">
                <div class="col-md-6 align-self-center">
                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">
                        Showing 1 to 10 of 27</p>
                </div>
                <div class="col-md-6">
                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                        <ul class="pagination">
                            <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span
                                        aria-hidden="true">«</span></a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span
                                        aria-hidden="true">»</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection