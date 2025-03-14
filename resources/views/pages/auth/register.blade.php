<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Ecodocs</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('dist/images/logos/ecodocs-logo-mini.png') }}" />
    <link rel="stylesheet" href="{{ asset('dist/css/style.min.css') }}" />
    <link href="{{ asset('css/iziToast.min.css') }}" rel="stylesheet">
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="{{ asset('dist/images/logos/ecodocs-logo-side.png') }}" width="180"
                                        alt="">
                                </a>
                                <p class="text-center">Sign Up Here</p>
                                <form action="{{ route('register') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputNpk" class="form-label">NPK</label>
                                        <input type="text" class="form-control" id="exampleInputNpk"
                                            aria-describedby="textHelp" name="npk">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputtext1" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="exampleInputtext1"
                                            aria-describedby="textHelp" name="name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputDept" class="form-label">Department</label>
                                        <select class="form-control" id="exampleInputDept" name="dept">
                                            <option value="" disabled selected>Select a department</option>
                                            <option value="HR&GA">HR&GA</option>
                                            <option value="MS">Management System</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email Address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" name="email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputno_hp" class="form-label">No HP</label>
                                        <input type="text" class="form-control" id="exampleInputno_hp"
                                            aria-describedby="textHelp" name="no_hp">
                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1"
                                            name="password">
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2"
                                        style="background-color: #028D3A; border-color: #028D3A;">Sign
                                        Up</button>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-bold">Already have an Account?</p>
                                        <a class="text-primary fw-bold ms-2" href="{{ route('login.form') }}">Sign
                                            In</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('dist/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/iziToast.min.js') }}"></script>
    @if (session('success'))
        <script>
            iziToast.success({
                title: 'Success',
                message: '{{ session('success') }}',
                position: 'topRight'
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            iziToast.error({
                title: 'Error',
                message: '{{ $errors->first() }}',
                position: 'topRight'
            });
        </script>
    @endif
</body>

</html>
