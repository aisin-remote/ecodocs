@extends('layouts.main')

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
                <form action="" method="POST" class="mt-4 skillForm">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="origin" id="origin">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-4">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Select</label>
                                <input list="browsers" name="browser" id="browser">
                                <datalist class="form-select mr-sm-2" id="browsers">
                                    <option selected>Choose...</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </datalist>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="mb-1">Licence Plate</label>
                                <input type="text" class="form-control" id="nametext" aria-describedby="name"
                                    placeholder="Name">
                            </div>
                        </div>
                    </div>
                    <div class="card p-3 mt-4">
                        <div class="email-repeater mb-3 mt-3">
                            <div data-repeater-list="repeater-group">
                                <div data-repeater-item="" class="row mb-3">
                                    <div class="col-lg-2 col-sm-12">
                                        <label class="mb-1">Waste Code</label>
                                        <input type="text" class="form-control" placeholder="limbah Name" name="name"
                                            required>
                                    </div>
                                    <div class="col-lg-3 col-sm-12">
                                        <label class="mb-1">Waste Name</label>
                                        <input type="text" class="form-control" placeholder="limbah Name" name="name"
                                            required>
                                    </div>
                                    <div class="col-lg-1 col-sm-12">
                                        <label class="mb-1">Qty</label>
                                        <input type="text" class="form-control" placeholder="18" name="name" required>
                                    </div>
                                    <div class="col-lg-1 col-sm-12">
                                        <label class="mb-1">Uom</label>
                                        <input type="text" class="form-control" placeholder="Kg" name="name" required>
                                    </div>
                                    <div class="col-lg-2 col-sm-12">
                                        <label class="mb-1">Description</label>
                                        <textarea type="text" class="form-control" name="name" required></textarea>
                                    </div>
                                    <div class="col-lg-2 col-sm-12">
                                        <label class="mb-1">Photo (Optional)</label>
                                        <input type="File" class="form-control" placeholder="Kg" name="name" required>
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
                                    Add limbah
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
                            <th>Name</th>
                            <th class="text-center">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <span class="actual">cek</span>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-icon btn-warning edit" id="edit"><i
                                        class="far fa-edit"></i></button>
                                <button class="btn btn-icon btn-success save mb-1" style="display: none"><i
                                        class="fas fa-check"></i></button>
                                <button class="btn btn-icon btn-danger cancel" style="display: none"><i
                                        class="fas fa-times"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
<script src={{ asset('js/jquery-3.6.3.min.js') }} integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
    crossorigin="anonymous"></script>
<script>
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
</script>
