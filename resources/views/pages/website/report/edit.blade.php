@extends('layouts.main')
@section('title', 'Edit Report')

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
        <div class="card shadow" id="addSkillCard">
            <div class="border-bottom title-part-padding">
                <h2 class="card-title mb-0">Edit Report</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('report.update', $report->id) }}" method="POST" class="mt-4 skillForm"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Assuming you're updating an existing report -->

                    <input type="hidden" name="origin" id="origin">

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-4">
                                <label class="mr-sm-2" for="destinationSelect">Select Destination</label>
                                <select name="destination_id" id="destinationSelect" class="form-select" required>
                                    <option selected disabled>Choose Destination...</option>
                                    @foreach ($destination as $dest)
                                        <option value="{{ $dest->id }}"
                                            {{ old('destination_id', $report->destination_id) == $dest->id ? 'selected' : '' }}>
                                            {{ $dest->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="mb-1">License Plate</label>
                                <input type="text" class="form-control" id="licensePlate" name="license_plate"
                                    placeholder="License Plate" value="{{ old('license_plate', $report->license_plate) }}"
                                    required>
                            </div>
                        </div>
                    </div>

                    <div class="card p-3 mt-4">
                        <div class="email-repeater mb-3 mt-3">
                            <div data-repeater-list="repeater-group">
                                @foreach ($report->details as $key => $detail)
                                    <div data-repeater-item="" class="row mb-3">
                                        <div class="col-lg-2 col-sm-12">
                                            <label class="mb-1">Waste Code</label>
                                            <select class="form-control waste-code" name="waste_code[]" required>
                                                <option selected disabled>Choose Waste Code...</option>
                                                @foreach ($limbah as $limbahItem)
                                                    <option value="{{ $limbahItem->code }}"
                                                        data-name="{{ $limbahItem->name }}"
                                                        {{ (old('waste_code.' . $key) ? old('waste_code.' . $key) == $limbahItem->code : $detail->limbah->code == $limbahItem->code) ? 'selected' : '' }}>
                                                        {{ $limbahItem->code }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-3 col-sm-12">
                                            <label class="mb-1">Waste Name</label>
                                            <input type="text" class="form-control waste-name" name="waste_name[]"
                                                placeholder="Waste Name"
                                                value="{{ old('waste_name.' . $key, $detail->limbah->name) }}"
                                                required readonly>
                                        </div>
                                        <div class="col-lg-1 col-sm-12">
                                            <label class="mb-1">Qty</label>
                                            <input type="number" class="form-control" placeholder="0" name="quantity[]"
                                                value="{{ old('quantity.' . $key, $detail->qty) }}" required>
                                        </div>
                                        <div class="col-lg-1 col-sm-12">
                                            <label class="mb-1">UOM</label>
                                            <select class="form-control" name="unit[]" required>
                                                <option value="" selected disabled>Choose</option>
                                                <option value="Kg"
                                                    {{ old('unit.' . $key, $detail->unit) == 'Kg' ? 'selected' : '' }}>Kg
                                                </option>
                                                <option value="Pcs"
                                                    {{ old('unit.' . $key, $detail->unit) == 'Pcs' ? 'selected' : '' }}>Pcs
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-lg-2 col-sm-12">
                                            <label class="mb-1">Description</label>
                                            <textarea class="form-control" name="description[]">{{ old('description.' . $key, $detail->desc) }}</textarea>
                                        </div>
                                        <div class="col-lg-2 col-sm-12">
                                            <label class="mb-1">Photo (Optional)</label>
                                            <input type="file" class="form-control" name="photo[]"
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
                                @endforeach
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
                            <i class="ti ti-send fs-5"></i> Submit
                        </button>
                    </div>
                </form>


            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/jquery-3.6.3.min.js') }}" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
        crossorigin="anonymous"></script>
    <script>
        // Update Waste Name field when Waste Code is selected
        document.querySelectorAll('.waste-code').forEach(function(select) {
            select.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                const wasteNameField = this.closest('.row').querySelector('.waste-name');
                wasteNameField.value = selectedOption.getAttribute('data-name');
            });
        });
    </script>
@endpush
