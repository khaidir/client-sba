@extends('layout.admin.app')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box mb-0 d-sm-flex align-items-center justify-content-between">
                    <h2 class="mb-sm-0 m-0 font-size-18 page-title">New Worker</h2>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item">New Worker</li>
                            <li class="breadcrumb-item active">Lists</li>
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
                            <div class="col-md-9 mt--2">
                                <div class="col-9">
                                    <div class="row row-cols-lg-auto g-3 align-items-center">
                                        <div class="col-12 mt-4">
                                            <span id="dlength"></span>
                                        </div>
                                        <div class="col-12 col-sm-12">
                                            <a href="/worker/new" class="btn btn-md btn-primary btn-float" style="margin-top:;">Add New</a>
                                        </div>
                                        <div class="col-12 col-sm-12 mt-4">
                                            <span id="dfilter"></span>
                                        </div>
                                        <div class="col-12 col-sm-12">
                                            <select name="company" id="company" class="form-control" style="width:250px">
                                                <option value="0">Filter by Company</option>
                                                @foreach ($company as $c)
                                                <option value="{{ @$c->id }}">{{ @$c->company }}</option>
                                                @endforeach
                                            </select>
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
                                            <th width="10">#</th>
                                            <th width="160">Action</th>
                                            <th width="300">Company</th>
                                            <th width="250">Contract ID/Worker</th>
                                            <th width="250">PIC</th>
                                            <th width="120">Periode</th>
                                            <th width="120">Date Request</th>
                                            <th width="120">Date Approval</th>
                                            <th width="90">Status</th>
                                            <th width="80">Remarks</th>
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
@include('admin.worker.script')
@endsection
