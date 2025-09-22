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
                        <div class="table-responsive">
                            <table id="user_datatables" class="table table-bordered table-striped nowrap" style="width:100%">
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
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div>

    
    <!-- Modal Add Equipment -->
    <div class="modal fade" id="showModalAdd" tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="showModalAddLabel">Add User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('user-management.user.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Username</label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Enter Username">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" id="email" class="form-control"
                                placeholder="Enter email">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Enter password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Re-Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                                placeholder="Enter re password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Equipment -->
    <div class="modal fade" id="showModalEdit" tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="showModalEditLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

              <form action="#" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Username</label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Enter Username">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" id="email" class="form-control"
                                placeholder="Enter email">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <p class="text-muted"><code>*</code>Leave blank if you don't want to change the <code>password</code></p>
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Enter password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Re-Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                                placeholder="Enter re password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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
                // scrollX: true    
            });
        });

        $('#btnFilter').on('click', function() {
            table.ajax.reload();
        });

        $('#btnReset').on('click', function() {
            // $('#filter_date').val('');
            $('#filter_machine_id').val('');
            table.ajax.reload();
        });

        // SweetAlert
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>

    {{-- sweetAlert VALIDATION --}}
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                html: `{!! implode('<br>', $errors->all()) !!}`
            });
        </script>
    @endif

    <script>
        // Handle Update
       $(document).on('click', '.editUserBtn', function() {
            let id = $(this).data('id');
            let name = $(this).data('name');
            let email = $(this).data('email');

            // isi form di modal
            $('#showModalEdit #name').val(name);
            $('#showModalEdit #email').val(email);

            // update action form
            let url = "{{ route('user-management.user.update', ':id') }}";
            url = url.replace(':id', id);
            $('#showModalEdit form').attr('action', url);
        });
    </script>
    <script>
        // Handle Delete
        $(document).on('submit', '.deleteForm', function(e) {
            e.preventDefault();

            let form = this;

            Swal.fire({
                title: 'Are you sure?',
                text: "This action cannot be undone!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    </script>
@endpush
