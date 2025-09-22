@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Equipment Datatable</h4>
                        <div class="flex-shrink-0">
                            {{-- <div class="form-check form-switch form-switch-right form-switch-md">
                                <label class="form-label mb-0">Date</label>
                                <input type="text" class="form-control" data-provider="flatpickr"
                                    data-date-format="d M, Y" data-range-date="true" id="filter_date">
                            </div> --}}
                            <div class="form-check form-switch form-switch-right form-switch-md">
                                <label class="form-label mb-0">Machine</label>
                                <select id="filter_machine_id" class="form-control">
                                    <option value="">-- All Machines --</option>
                                    @foreach ($machines as $machine)
                                        <option value="{{ $machine->id }}">{{ $machine->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-check form-switch form-switch-right form-switch-md">
                                <button type="button" class="btn btn-primary" id="btnFilter">Filter</button>
                            </div>
                            <div class="form-check form-switch form-switch-right form-switch-md">
                                <button type="button" class="btn btn-warning" id="btnReset">Reset</button>
                            </div>
                            <div class="form-check form-switch form-switch-right form-switch-md">
                                <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                                    data-bs-target="#showModalAdd"><i class="ri-add-circle-line"></i> Add Equipment</button>
                            </div>
                        </div>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="equipment_datatables" class="table table-bordered table-striped nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Machine</th>
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

    <!-- Modal Add Equipment -->
    <div class="modal fade" id="showModalAdd" tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="showModalAddLabel">Add Equipment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('master.equipment.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="machine_id" class="form-label">Machine</label>
                            <select name="machine_id" id="machine_id" class="form-control">
                                <option value="">-- Select Machine --</option>
                                @foreach ($machines as $machine)
                                    <option value="{{ $machine->id }}">{{ $machine->name }}</option>
                                @endforeach
                            </select>
                            @error('machine_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Equipment Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Enter equipment name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="specification" class="form-label">Specification</label>
                            <textarea name="specification" id="specification" class="form-control" rows="3" placeholder="Enter specification"></textarea>
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
                    <h5 class="modal-title" id="showModalEditLabel">Edit Equipment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="#" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="machine_id" class="form-label">Machine</label>
                            <select name="machine_id" id="machine_id" class="form-control">
                                <option value="">-- Select Machine --</option>
                                @foreach ($machines as $machine)
                                    <option value="{{ $machine->id }}">{{ $machine->name }}</option>
                                @endforeach
                            </select>
                            @error('machine_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Equipment Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Enter equipment name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="specification" class="form-label">Specification</label>
                            <textarea name="specification" id="specification" class="form-control" rows="3"
                                placeholder="Enter specification"></textarea>
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
    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll("[data-provider=flatpickr]").forEach(function(el) {
                if (el.dataset.rangeDate != undefined) {
                    flatpickr(el, {
                        mode: "range",
                        dateFormat: "d/m/Y", // format DD/MM/YYYY
                        locale: {
                            rangeSeparator: " - " // ubah pemisah default " to "
                        }
                    });
                } else {
                    flatpickr(el, {
                        dateFormat: "d/m/Y"
                    });
                }
            });
        });
    </script> --}}
    <script>
        $(document).ready(function() {
            let table = $('#equipment_datatables').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,  
                // scrollX: true,
                ajax: {
                    url: "{{ route('master.equipment.getAll') }}",
                    data: function (d) {
                        // d.date = $('#filter_date').val(); 
                        d.machine_id = $('#filter_machine_id').val();
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'machine',
                        name: 'machine'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'specification',
                        name: 'specification'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
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
            
        });
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
        $(document).on('click', '.editEquipmentBtn', function() {
            let id = $(this).data('id');
            let machine_id = $(this).data('machine_id');
            let name = $(this).data('name');
            let specification = $(this).data('specification');

            $('#showModalEdit #machine_id').val(machine_id);
            $('#showModalEdit #name').val(name);
            $('#showModalEdit #specification').val(specification);

            let url = "{{ route('master.equipment.update', ':id') }}";
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
