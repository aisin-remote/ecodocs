@extends('layouts.main')
@section('title', 'Approval')

@section('main')
    <div class="col-12 col-lg-12">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>Success - </strong> {{ session('success') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>Error - </strong> {{ session('error') }}
            </div>
        @endif
        <div class="card shadow" id="addSkillCard" style="display: none">
            <div class="border-bottom title-part-padding">
                <h2 class="card-title mb-0">List Approval</h2>
            </div>
            <div class="card-body">
                {{-- <form action="{{ route('report.store') }}" method="POST" class="mt-4 skillForm"
                    enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="origin" id="origin">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-4">
                                <label class="mr-sm-2" for="destinationSelect">Select Destination</label>
                                <select name="destination_id" id="destinationSelect" class="form-select">
                                    <option selected disabled>Choose Destination...</option>
                                    @foreach ($destination as $dest)
                                        <option value="{{ $dest->id }}">{{ $dest->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="mb-1">License Plate</label>
                                <input type="text" class="form-control" id="licensePlate" name="license_plate"
                                    placeholder="License Plate" required>
                            </div>
                        </div>
                    </div>
                    <div class="card p-3 mt-4">
                        <div class="email-repeater mb-3 mt-3">
                            <div data-repeater-list="repeater-group">
                                <div data-repeater-item="" class="row mb-3">
                                    <div class="col-lg-2 col-sm-12">
                                        <label class="mb-1">Waste Code</label>
                                        <select class="form-control waste-code" name="waste_code" required>
                                            <option selected disabled>Choose Waste Code...</option>
                                            @foreach ($limbah as $limbahItem)
                                                <option value="{{ $limbahItem->code }}" data-name="{{ $limbahItem->name }}">
                                                    {{ $limbahItem->code }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-sm-12">
                                        <label class="mb-1">Waste Name</label>
                                        <input type="text" class="form-control waste-name" name="waste_name"
                                            placeholder="Waste Name" required readonly>
                                    </div>
                                    <div class="col-lg-1 col-sm-12">
                                        <label class="mb-1">Qty</label>
                                        <input type="number" class="form-control" placeholder="0" name="quantity" required>
                                    </div>
                                    <div class="col-lg-1 col-sm-12">
                                        <label class="mb-1">UOM</label>
                                        <select class="form-control" name="unit" required>
                                            <option value="" selected disabled>Choose</option>
                                            <option value="Kg">Kg</option>
                                            <option value="Pcs">Pcs</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-2 col-sm-12">
                                        <label class="mb-1">Description</label>
                                        <textarea class="form-control" name="description"></textarea>
                                    </div>
                                    <div class="col-lg-2 col-sm-12">
                                        <label class="mb-1">Photo (Optional)</label>
                                        <input type="file" class="form-control" name="photo"
                                            accept=".jpg, .jpeg, .png, .gif, .bmp">
                                    </div>
                                    <div class="col-lg-1 col-sm-12">
                                        <div class="mb-2" style="color: white">ccc</div>
                                        <button data-repeater-delete="" class="btn btn-danger waves-effect waves-light"
                                            type="button">
                                            <i class="ti ti-circle-x fs-5"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <button type="button" data-repeater-create=""
                                class="btn btn-primary waves-effect waves-light mb-3">
                                <div class="d-flex align-items-center">
                                    Add Waste
                                    <i class="ti ti-circle-plus ms-1 fs-5"></i>
                                </div>
                            </button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button
                            class="btn rounded-pill px-4 btn-success text-light font-weight-medium waves-effect waves-light"
                            type="submit">
                            <i class="ti ti-send fs-5"></i>
                            Submit
                        </button>
                    </div>
                </form> --}}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card">
            <div class="card-header pt-4" style="background-color: white !important">
                <div class="row">
                    <div class="col-9">
                        <h4 class="fw-5">
                            List Approval
                        </h4>
                    </div>
                    <div class="col-3 text-end">
                        {{-- <button class="btn btn-primary px-4 py-2" id="addSkill">
                            <span class="rounded-3 pe-2" id="icon">
                                <i class="ti ti-plus"></i>
                            </span>
                            <span class="d-none d-sm-inline-block">Create Report</span>
                        </button> --}}
                    </div>
                </div>
            </div>
            <div class="card-body p-3">
                <table class="table text-nowrap align-middle mb-0" id="masterSkill" style="width:100%">
                    <thead>
                        <tr>
                            <th>Destination</th>
                            <th>License Plate</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal Show Details -->
    <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="showModalLabel">Details Information</h5>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <table class="table table-bordered text-nowrap align-middle mb-0" id="masterSkill"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>Limbah</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Description</th>
                                    <th class="text-center">Picture</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Data will be populated dynamically -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="showModalLabel">Details Information</h5>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <table class="table table-bordered text-nowrap align-middle mb-0" id="masterSkill"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>Limbah</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Description</th>
                                    <th class="text-center">Picture</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Data will be populated dynamically -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script src={{ asset('js/jquery-3.6.3.min.js') }} integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
        crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // Initialize DataTable
            var table = $('#masterSkill').DataTable({
                scrollX: true,
            });

            $('#addSkill').on('click', function() {
                $("#addSkillCard").toggle();
                $("#icon").html($("#addSkillCard").is(":visible") ? '<i class="ti ti-minus"></i>' :
                    '<i class="ti ti-plus"></i>');
            });

            const textareas = document.querySelectorAll('textarea');
            textareas.forEach(textarea => {
                // Fungsi untuk mengatur tinggi textarea
                const adjustHeight = (element) => {
                    element.style.height = 'auto'; // Reset height
                    element.style.height = element.scrollHeight + 'px'; // Set height to scrollHeight
                };

                // Sesuaikan tinggi pada input awal
                adjustHeight(textarea);

                // Tambahkan event listener untuk input dan change
                textarea.addEventListener('input', function() {
                    adjustHeight(this);
                });

                textarea.addEventListener('change', function() {
                    adjustHeight(this);
                });
            });

            // Kode AJAX untuk mengambil data
            $.ajax({
                url: '{{ route('approval.data') }}',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    console.log(data); // Periksa apakah destination_name ada di log

                    table.clear().draw();

                    const addedReports = {};

                    $.each(data, function(index, report) {
                        if (!addedReports[report.report_id]) {
                            addedReports[report.report_id] = true;

                            const firstDetail = report.details.length > 0 ? report.details[0] :
                                null;

                            table.row.add([
                                report
                                .destination_name, // Pastikan ini sesuai dengan JSON
                                report.license_plate,
                                '<div class="text-center">' +
                                // Tombol See Detail
                                '<button class="btn btn-icon btn-info see-detail me-2" data-id="' +
                                (firstDetail ? firstDetail.id : '') +
                                '" data-report-id="' +
                                report.report_id +
                                '"><i class="fa fa-eye"></i></button>' +
                                // Tombol Approve dengan ikon Font Awesome
                                '<button class="btn btn-icon btn-success approve me-2" data-id="' +
                                (firstDetail ? firstDetail.id : '') +
                                '" data-report-id="' +
                                report.report_id +
                                '"><i class="fa fa-check"></i></button>' +
                                // Tombol Reject dengan ikon silang Font Awesome
                                '<button class="btn btn-icon btn-danger reject" data-id="' +
                                (firstDetail ? firstDetail.id : '') +
                                '"><i class="fa fa-times"></i></button>' +
                                '</div>'
                            ]).draw();
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.error("An error occurred:", error);
                }
            });



            // Open edit modal and load data into form
            $(document).on('click', '.edit', function() {
                var id = $(this).data('id');
                $.ajax({
                    url: '{{ route('limbah.edit', '') }}/' + id,
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#editId').val(data.id);
                        $('#editCode').val(data.code);
                        $('#editName').val(data.name);

                        // Set action attribute on the form with the ID included
                        $('#editForm').attr('action', '{{ route('limbah.update', '') }}/' +
                            data.id);
                        $('#editModal').modal('show');
                    }
                });
            });

            $(document).on('click', '.show', function() {
                const reportId = $(this).data('report-id'); // Ambil report_id dari data atribut

                console.log(reportId); // Debugging: Pastikan reportId ada

                if (!reportId) {
                    console.error("Report ID is missing!");
                    alert("Report ID is missing!");
                    return; // Jika reportId tidak ada, hentikan eksekusi AJAX
                }

                // Pastikan URL sesuai dengan route yang benar
                $.ajax({
                    url: '{{ route('report.show', '') }}/' + reportId, // Pastikan URL valid
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // Clear previous data in the modal table
                        $('#masterSkill tbody').empty();

                        // Check if the response contains any details
                        if (data.error) {
                            $('#masterSkill tbody').append(`
            <tr>
                <td colspan="4" class="text-center">No details found.</td>
            </tr>
        `);
                        } else {
                            console.log(data); // Debugging: Lihat data yang diterima

                            // Loop through the details and append them to the modal table
                            $.each(data.details, function(index, detail) {
                                $('#masterSkill tbody').append(`
                        <tr>
                            <td>${detail.limbah ? detail.limbah.name : 'N/A'}</td>
                            <td class="text-center">${detail.qty} ${detail.unit}</td>
                            <td class="text-center">${detail.desc}</td>
                            <td class="text-center">
                                <img src="${detail.picture_}" alt="Picture" style="width: 100px; height: auto;">
                            </td>
                            <td class="text-center">
                                <button class="btn btn-danger delete" data-id="${detail.id}">
                                    <i class="ti ti-trash"></i> Delete
                                </button>
                            </td>
                        </tr>
                        `);
                            });
                        }

                        // Show the modal
                        $('#showModal').modal('show');
                    },
                    error: function(xhr, status, error) {
                        console.error("An error occurred:", error); // Tangani error
                        alert("Could not fetch details. Please try again.");
                    }
                });
            });

            // Hide modal and clean up when it's closed
            $('#showModal').on('hidden.bs.modal', function() {
                $('#masterSkill tbody').empty(); // Clear the table
            });


            // Delete data
            $('#masterSkill').on('click', '.delete', function() {
                var id = $(this).data('id');
                if (confirm('Are you sure you want to delete this record?')) {
                    $.ajax({
                        url: '{{ route('limbah.destroy', '') }}/' + id,
                        method: 'POST',
                        data: {
                            _method: 'DELETE',
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.success) {
                                alert(response.success);
                                fetchData();
                            } else {
                                alert('Error: ' + response.error);
                            }
                        },
                        error: function(xhr, status, error) {
                            alert('An error occurred: ' + error);
                        }
                    });
                }
            });
        });
    </script>
@endpush
