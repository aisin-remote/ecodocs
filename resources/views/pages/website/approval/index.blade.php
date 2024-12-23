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
                </div>
            </div>
            <div class="card-body p-3">
                <table class="table text-nowrap align-middle mb-0" id="masterSkill" style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
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
                                        'Pending' => '',
                                        'Approved' => 'disabled',
                                    ];
                                @endphp

                                <td>
                                    <span class="btn {{ $statusClasses[$report->status] ?? 'bg-secondary' }} btn-sm">
                                        {{ $report->status }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#showModal" data-id="{{ $report->id }}">
                                            <i class="ti ti-eye"></i>
                                        </button>
                                        <button type="button" class="btn btn-success" data-toggle="modal"
                                            data-target="#approveModal" data-id="{{ $report->id }}"
                                            {{ $attr[$report->status] }}>
                                            <i class="ti ti-check"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

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

    {{-- approve modal --}}
    <div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('approval.approve') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title text-white" id="approveModalLabel">Approve Modal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body mt-3">
                            <input type="hidden" id="report_id" name="report_id">
                            <label class="text-dark mb-3">Nomor Surat Jalan</label>
                            <input class="form-control" type="text" name="surat_jalan" placeholder="surat jalan">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Approve</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
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

            $('button[data-target="#approveModal"]').on('click', function() {
                const id = $(this).data('id');

                $('#approveModal').modal('show');

                // Set the value of the input field inside the modal
                $('#approveModal').find('input[name="report_id"]').val(id);
            })


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
        });
    </script>
@endpush
