<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <!-- Mewarisi layout app -->
    @extends('layouts.app')
    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <!-- Header card -->
                    <div class="card-header bg-primary text-white text-center" style="font-weight: bold; margin-bottom: 20px;">
                        {{ __('Profile') }}
                    </div>
                    <!-- Menampilkan pesan error jika ada -->
                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                    @endforeach
                    @endif
                    <!-- Form untuk mengubah profil -->
                    <form action="{{ route('edit_profile') }}" method="post">
                        @csrf
                        <div class="row">
                            <!-- Kolom pertama -->
                            <div class="col-md-6">
                                <!-- Input untuk nama -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="name" placeholder="Name" class="form-control"
                                        value="{{ $user->name }}">
                                </div>
                                <!-- Input untuk email (disabled) -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                    </div>
                                    <input type="email" class="form-control" value="{{ $user->email }}" disabled>
                                </div>
                                 <!-- Tombol untuk mengubah detail profil -->
                        <center><p><button type="submit" class="btn btn-success mt-3">{{ __('Change profile details') }}</button></p></center>
                            </div>
                            <!-- Kolom kedua -->
                            <div class="col-md-6">
                                <!-- Input untuk peran (disabled) -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-user-shield"></i>
                                        </span>
                                    </div>
                                    <input type="role" class="form-control"
                                        value="{{ $user->is_admin ? 'Admin' : 'Member' }}" disabled>
                                </div>
                                <!-- Input untuk password -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-lock"></i>
                                        </span>
                                    </div>
                                    <input type="password" name="password" class="form-control" placeholder="{{ __('New Password') }}">
                                </div>
                                <!-- Input untuk konfirmasi password -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-lock"></i>
                                        </span>
                                    </div>
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="{{ __('Confirm Password') }}">
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Akhir dari section content -->
@endsection
</body>

</html>
