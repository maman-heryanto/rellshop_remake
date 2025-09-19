@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">User Datatable</h4>
                        <div class="flex-shrink-0">
                            <div class="form-check form-switch form-switch-right form-switch-md">
                                <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                                    data-bs-target="#showModalAdd"><i class="ri-add-circle-line"></i> Add User</button>
                            </div>
                        </div>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <table id="user_datatables" class="table table-bordered table-striped nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
              let table = $('#user_datatables').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('user-management.user.getAll') }}',
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'action', name: 'action', orderable: false, searchable: false },
                ],
                order: [[3, 'desc']],
                responsive: true,  
                scrollX: true    
            });
        });
    </script>
@endpush
