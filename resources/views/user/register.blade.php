{{-- @extends('app')
@section('content')
<div class="row">
    <div class="col-md-6">
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
        <form action="{{ route('register.action') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Name <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="name" value="{{ old('name') }}" />
            </div>
            <div class="mb-3">
                <label>Username <span class="text-danger">*</span></label>
                <input class="form-control" type="username" name="username" value="{{ old('username') }}" />
            </div>
            <div class="mb-3">
                <label>Password <span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="password" />
            </div>
            <div class="mb-3">
                <label>Password Confirmation<span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="password_confirm" />
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Register</button>
                <a class="btn btn-danger" href="{{ route('user/login') }}">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('icon/leaf-svgrepo-com.svg') }}" type="image/svg+xml">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('template/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Lightbox2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-primary">

    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-register-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            @if($errors->any())
                                            @foreach($errors->all() as $err)
                                            <p class="alert alert-danger">{{ $err }}</p>
                                            @endforeach
                                            @endif
                                            <form action="{{ route('register.action') }}" method="POST" class="user">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="name">Name <span class="text-danger">*</span></label>
                                                    <input class="form-control form-control-user" type="text" name="name" id="name" value="{{ old('name') }}" required />
                                                </div>
                                                <div class="form-group">
                                                    <label for="username">Username <span class="text-danger">*</span></label>
                                                    <input class="form-control form-control-user" type="text" name="username" id="username" value="{{ old('username') }}" required />
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">Password <span class="text-danger">*</span></label>
                                                    <input class="form-control form-control-user" type="password" name="password" id="password" required />
                                                </div>
                                                <div class="form-group">
                                                    <label for="passwordConfirm">Password Confirmation <span class="text-danger">*</span></label>
                                                    <input class="form-control form-control-user" type="password" name="password_confirm" id="passwordConfirm" required />
                                                </div>
                                                <button class="btn btn-primary btn-user btn-block">Register</button>
                                                <a class="btn btn-danger btn-user btn-block" href="{{ route('user/login') }}">Back</a>
                                            </form>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('user/login') }}">Already have an account? Login!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('template/js/sb-admin-2.min.js') }}"></script>

    <!-- Lightbox2 JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

</body>
</html>
