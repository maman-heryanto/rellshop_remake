@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Roll In Datatable</h4>
                        <div class="flex-shrink-0">
                            <div class="form-check form-switch form-switch-right form-switch-md">
                                <label class="form-label mb-0"> </label>
                                <select id="filter_machine_id" class="form-control">
                                    <option value="">-- All Roll --</option>
                                </select>
                            </div>
                            <div class="form-check form-switch form-switch-right form-switch-md">
                                <button type="button" class="btn btn-primary" id="btnFilter">Filter</button>
                            </div>
                            <div class="form-check form-switch form-switch-right form-switch-md">
                                <button type="button" class="btn btn-warning" id="btnReset">Reset</button>
                            </div>
                        </div>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="equipment_datatables" class="table table-bordered table-striped nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Specification</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div>
@endsection

@push('scripts')
   
@endpush
