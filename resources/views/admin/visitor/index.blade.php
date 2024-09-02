@extends('layout.admin.app')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box mb-0 d-sm-flex align-items-center justify-content-between">
                    <h2 class="mb-sm-0 m-0 font-size-18 page-title">Detail Visitor Access</h2>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item">Visitor Request</li>
                            <li class="breadcrumb-item">Access</li>
                            <li class="breadcrumb-item active">Person</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9">
                                <table>
                                    <tr>
                                        <td width="100">Destination</td>
                                        <td width="10">:</td>
                                        <td width="900">{{ @$request->destination }}</td>
                                    </tr>
                                    <tr>
                                        <td>Date</td>
                                        <td>:</td>
                                        <td>{{ @$request->tanggal }}</td>
                                    </tr>
                                    <tr>
                                        <td>Remarks</td>
                                        <td>:</td>
                                        <td>{{ @$request->remarks }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9 mt--2">
                                <div class="col-9">
                                    <div class="row row-cols-lg-auto g-3 align-items-center">
                                        <div class="col-12 mt-4">
                                            <span id="dlength"></span>
                                        </div>
                                        <div class="col-12 col-sm-12">
                                            <a href="/access/visitor/new/{{ @$request->id }}" class="btn btn-md btn-primary btn-float" style="margin-top:;">Add New</a>
                                        </div>
                                        <div class="col-12 col-sm-12 mt-4">
                                            <span id="dfilter"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-12">
                                <div class="d-flex justify-content-end">
                                    <div id="dinfo" class="dinfo"></div>
                                    <div id="dpaging"></div>
                                </div>
                            </div>

                            <div class="col-md-12 responsive mt--2">
                                <table id="table" class="table table-hover data-table table-striped-columns dataTable" style="width:100%;">
                                    <thead class="table-light">
                                        <tr>
                                            <th width="10">No</th>
                                            <th width="80">Aksi</th>
                                            <th width="450">Fullname</th>
                                            <th width="150">Country</th>
                                            <th width="150">Tipe</th>
                                            <th width="150">Document</th>
                                            <th width="100">Status</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@include('admin.visitor.script')
@endsection
