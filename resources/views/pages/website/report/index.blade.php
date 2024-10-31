@extends('layouts.main')
@section('title', 'Report')

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
                        <button class="btn btn-primary px-4 py-2" id="addSkill">
                            <span class="rounded-3 pe-2" id="icon">
                                <i class="ti ti-plus"></i>
                            </span>
                            <span class="d-none d-sm-inline-block">Create Report</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body p-3">
                <table class="table text-nowrap align-middle mb-0" id="masterSkill" style="width:100%">
                    <thead>
                        <tr>
                            <th>Destination</th>
                            <th class="text-center">License Plate</th>
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <h6>Limbah Information</h6>
                        <p><strong>Limbah:</strong> <span id="limbah"></span></p>
                        <p><strong>Quantity:</strong> <span id="qty"></span> <span id="unit"></span></p>
                        <p><strong>Description:</strong> <span id="desc"></span></p>
                        <p><strong>Picture:</strong></p>
                        <div>
                            <img id="picture" src="" alt="Picture"
                                style="width: 100%; max-height: 300px; object-fit: contain;">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


@endsection
<script src={{ asset('js/jquery-3.6.3.min.js') }} integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
    crossorigin="anonymous"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const wasteCodeSelects = document.querySelectorAll('.waste-code');
        wasteCodeSelects.forEach(select => {
            select.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                const wasteNameInput = this.closest('.row').querySelector('.waste-name');
                wasteNameInput.value = selectedOption.getAttribute('data-name') ||
                    ''; // Mengisi waste name sesuai pilihan
            });
        });
    });
    $(document).ready(function() {
        // initialize datatable
        var table = $('#masterSkill').DataTable({
            scrollX: true,
        });

        $('#addSkill').on('click', function() {
            $("#addSkillCard").toggle();

            $("#icon").html($("#addSkillCard").is(":visible") ? '<i class="ti ti-minus"></i>' :
                '<i class="ti ti-plus"></i>');
        })
    });
    document.addEventListener('DOMContentLoaded', function() {
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
    });
    $(document).ready(function() {
        // Initialize DataTable
        var table = $('#masterSkill').DataTable();

        // Fetch data dari tabel limbah
        function fetchData() {
            $.ajax({
                url: '{{ route('report.data') }}',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    table.clear().draw();
                    $.each(data, function(index, item) {
                        table.row.add([
                            item.destination_id,
                            item.license_plate,
                            '<div class="text-center">' +
                            '<button class="btn btn-icon btn-info show me-2" data-id="' +
                            item.id + '"><i class="ti ti-eye"></i></button>' +
                            '<button class="btn btn-icon btn-warning edit me-2" data-id="' +
                            item.id + '"><i class="ti ti-edit"></i></button>' +
                            '<button class="btn btn-icon btn-danger delete" data-id="' +
                            item.id + '"><i class="ti ti-trash"></i></button>' +
                            '</div>'
                        ]).draw();
                    });
                }
            });
        }

        fetchData();

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
                        data
                        .id);
                    $('#editModal').modal('show');
                }
            });
        });
        $(document).on('click', '.show', function() {
            let detailId = $(this).data('id');
            console.log(detailId);

            $.ajax({
                url: '{{ route('report.show', '') }}/' +
                    detailId, // Ganti dengan URL endpoint API Anda
                method: 'GET',
                success: function(data) {
                    $('#limbah').text(data.limbah.name);
                    $('#qty').text(data.qty);
                    $('#unit').text(data.unit);
                    $('#desc').text(data.desc);
                    $('#picture').attr('src', data.picture ? `/storage/${data.picture}` :
                        '/path/to/default.jpg');

                    $('#showModal').modal('show');
                },
                error: function() {
                    alert('Failed to fetch details.');
                }
            });
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
