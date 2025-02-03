@extends('layouts.main')
@section('title', 'Report')
@push('styles')
<style>.full-width {
    width: 100% !important;
}

.transition-width {
    transition: width 0.3s ease-in-out;
}</style>    

@endpush
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
                <h2 class="card-title mb-0">Create Report</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('report.store') }}" method="POST" class="mt-4 skillForm"
                    enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="origin" id="origin">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-4">
                                <label class="mr-sm-2" for="destinationSelect">Select Destination</label>
                                <select name="destination_id" id="destinationSelect" class="form-select" required>
                                    <option selected disabled>Choose Destination...</option>
                                    @foreach ($destination as $dest)
                                        <option value="{{ $dest->id }}"
                                            {{ old('destination_id') == $dest->id ? 'selected' : '' }}>{{ $dest->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="mb-1">License Plate</label>
                                <input type="text" class="form-control" id="licensePlate" name="license_plate"
                                    placeholder="License Plate" value="{{ old('license_plate') }}" required>
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
                                    <div class="col-lg-2 col-sm-12">
                                        <label class="mb-1">Waste Name</label>
                                        <input type="text" class="form-control waste-name" name="waste_name"
                                            placeholder="Waste Name" required readonly>
                                    </div>
                                    <div class="col-lg-2 col-sm-12">
                                        <label class="mb-1">Qty</label>
                                        <input type="number" class="form-control" placeholder="0" name="quantity"
                                            min="0" step="0.01" required>
                                    </div>
                                    <div class="col-lg-1 col-sm-12">
                                        <label class="mb-1">UOM</label>
                                        <select class="form-control" name="unit" required>
                                            <option value="" selected disabled>Choose</option>
                                            <option value="Kg">Kg</option>
                                            <option value="Drum">Drum</option>
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
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card">
            <div class="card-header pt-4" style="background-color: white !important">
                <div class="row">
                    <div class="col-9">
                        <h4 class="fw-5">
                            Reports
                        </h4>
                    </div>
                    <div class="col-3 text-end">
                        <div class="d-flex justify-content-end gap-2">
                            <!-- Tombol Filter -->
                            <button class="btn btn-primary px-3 py-1" id="filterReports" style="font-size: 14px;">
                                <span class="rounded-3 pe-2">
                                    <span class="d-none d-sm-inline-block">Filter</span>
                                    <i class="ti ti-filter"></i>
                                </span>
                            </button>
                            <!-- Tombol Create Report -->
                            <button class="btn btn-primary px-3 py-1" id="createReport" style="font-size: 14px;">
                                <span class="rounded-3 pe-2">
                                    <i class="ti ti-plus"></i>
                                </span>
                                <span class="d-none d-sm-inline-block">Create Report</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-3">
                <table class="table text-nowrap align-middle mb-0" id="masterSkill" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Destination</th>
                            <th>License Plate</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reports as $report)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $report->destination->name }}</td>
                                <td>{{ $report->license_plate }}</td>
                                @php
                                    $statusClasses = [
                                        'Pending' => 'btn-warning',
                                        'Approved' => 'btn-success',
                                    ];
    
                                    $attr = [
                                        'Pending' => 'disabled',
                                        'Approved' => '',
                                    ];
                                @endphp
    
                                <td>
                                    <span class="btn {{ $statusClasses[$report->status] ?? 'bg-secondary' }} btn-sm">
                                        {{ $report->status }}
                                    </span>
                                </td>
    
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1">
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                            data-target="#showModal" data-id="{{ $report->id }}">
                                            <i class="ti ti-eye"></i>
                                        </button>
                                        @if ($report->status == 'Pending')
                                            <a href="report/edit/{{ $report->id }}" class="btn btn-warning btn-sm">
                                                <i class="ti ti-pencil"></i>
                                            </a>
                                            <form action="{{ route('report.destroy', $report->id) }}" method="post"
                                                class="delete-button">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="ti ti-x"></i>
                                                </button>
                                            </form>
                                        @endif
                                        @if ($report->status == 'Approved')
                                            <a href="{{ route('report.download', $report->id) }}" class="btn btn-dark btn-sm"
                                                {{ $attr[$report->status] }}>
                                                <i class="ti ti-printer"></i>
                                            </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal Show Details -->
    <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title text-white" id="showModalLabel">Details Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-group mb-4">
                        <!-- Column -->
                        <div class="card card-bg">
                            <div class="card-body text-center text-white">
                                <div class="pt-2">
                                    <h4 class="fw-bolder text-white status">
                                        -
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                    </div>
                    <div class="modal-body mt-3">
                        <div class="card card-danger p-3">
                            <div class="row text-center">
                                <div class="col-6"><code>Destination : </code>
                                    <span id="destination">-</span>
                                </div>
                                <div class="col-6"><code>License Plate : </code>
                                    <span id="licence_plate">-</span>
                                </div>
                            </div>
                        </div>
                        <p class="mb-4">Waste Details :</p>
                        <div class="row" id="list"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- modal confirmation --}}
    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content modal-filled bg-light-warning">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center text-warning">
                        <i class="ti ti-alert-octagon fs-7"></i>
                        <p class="mt-3">
                            Are you sure you want to delete this record?
                        </p>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modal view document --}}
    {{-- <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="showModalLabel">View Document</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Click the button below to view the document:</p>
                    <a href="#" id="fileLink" class="btn btn-primary" target="_blank">
                        <i class="ti ti-file"></i> Open Document
                    </a>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- end of modal --}}

@endsection
@push('scripts')
    <script src={{ asset('js/jquery-3.6.3.min.js') }} integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#addSkill').on('click', function() {
                $("#addSkillCard").toggle();
                $("#icon").html($("#addSkillCard").is(":visible") ? '<i class="ti ti-minus"></i>' :
                    '<i class="ti ti-plus"></i>');
            });

            $(document).on('change', '.waste-code', function() {
                const selectedOption = $(this).find(':selected');
                const wasteNameInput = $(this).closest('.row').find('.waste-name');
                wasteNameInput.val(selectedOption.data('name') || ''); // Mengisi waste name sesuai pilihan
            });

            // Initialize DataTable
            var table = $('#masterSkill').DataTable({
                scrollX: true,
            });
            // Attach click event to your button
            $('button[data-target="#showModal"]').on('click', function() {
                const id = $(this).data('id');
                let modalContent = ``;

                $.ajax({
                    url: '/report/modal/' + id,
                    type: 'GET',
                    success: function(data) {
                        console.log(data);
                        // Populate modal fields dynamically
                        $('#destination').text(data.destination.name);
                        $('#licence_plate').text(data.license_plate);

                        if (data.status == 'Pending') {
                            $('.card-group').css('display', 'none');
                            $('.card-bg').addClass('bg-warning');
                            $('.card-bg').removeClass('bg-success');
                        } else if (data.status == 'Approved') {
                            $('.card-group').css('display',
                                'block'); // Or 'flex', based on your layout needs
                            $('.card-bg').addClass('bg-success');
                            $('.card-bg').removeClass('bg-warning');
                            $('.status').text(data.surat_jalan);
                        }

                        // Format details in card layout
                        data.details.forEach((report) => {
                            modalContent += `
                            <div class="col-12 mb-3">
                                <div class="border rounded p-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <span class="badge bg-dark me-2">${report.limbah.code}</span>
                                            <h6 class="mb-0" style="font-weight: bold;">: ${report.limbah.name}</h6>
                                        </div>
                                        <span class="badge bg-primary">${report.qty} ${report.unit}</span>
                                    </div>
                                    <div class="mt-2">
                                        <small class="text-muted d-block">Description:</small>
                                        <p class="mb-0" style="font-size: 0.9rem; color: #555;">${report.desc || 'N/A'}</p>
                                    </div>
                                </div>
                            </div>`;
                        });

                        $('#list').html(modalContent);

                        // Show the modal
                        $('#showModal').modal('show');
                    },
                    error: function(xhr) {
                        console.error('Error loading appointment details:', xhr);
                    }
                });
            });

            var deleteForm; // Variable to store the form to be submitted

            // Handle click on delete button
            $('.delete-button').on('click', function(event) {
                event.preventDefault(); // Prevent the default form submission

                // Store the form associated with the delete button
                deleteForm = $(this).closest('form');

                // Show the confirmation modal
                $('#confirmationModal').modal('show');
            });

            // Handle click on confirm delete button
            $('#confirmDelete').on('click', function() {
                if (deleteForm) {
                    // Submit the stored form for deletion
                    deleteForm.submit();
                }
            });

        });
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const contentWrapper = document.querySelector('.col-12.col-lg-12');
        const sidebarToggle = document.querySelector('#sidebarToggle'); // Sesuaikan ID atau selector tombol toggle sidebar

        if (contentWrapper) {
            contentWrapper.classList.add('transition-width'); // Menambahkan animasi transisi

            sidebarToggle.addEventListener('click', function () {
                setTimeout(() => {
                    if (document.body.classList.contains('sidebar-collapsed')) {
                        contentWrapper.classList.add('full-width');
                    } else {
                        contentWrapper.classList.remove('full-width');
                    }
                }, 300); // Sesuaikan waktu transisi dengan animasi sidebar
            });
        }
    });
</script>
@endpush
