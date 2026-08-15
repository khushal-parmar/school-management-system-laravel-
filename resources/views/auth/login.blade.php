@extends('layouts.login_master')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    /* Modern UI Card Styling */
    .login-card-modern {
        border-radius: 16px !important;
        border: 1px solid rgba(255, 255, 255, 0.15) !important;
        background: #ffffff !important;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15) !important;
        overflow: hidden;
        width: 100%;
        max-width: 420px;
        margin: 0 auto;
    }

    .login-icon-wrapper {
        width: 70px;
        height: 70px;
        background: rgba(99, 102, 241, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.25rem;
    }

    .login-icon-wrapper i {
        font-size: 1.8rem;
        color: #6366f1;
    }

    .form-control-modern {
        border-radius: 10px !important;
        padding: 12px 42px 12px 42px !important;
        border: 1px solid #e5e7eb !important;
        background-color: #f9fafb !important;
        font-size: 0.95rem;
        transition: all 0.25s ease;
        width: 100%;
        outline: none;
    }

    .form-control-modern:focus {
        background-color: #ffffff !important;
        border-color: #6366f1 !important;
        box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.15) !important;
    }

    .input-icon-left {
        position: absolute;
        top: 50%;
        left: 14px;
        transform: translateY(-50%);
        color: #9ca3af;
        font-size: 1.1rem;
        z-index: 4;
    }

    .toggle-password {
        position: absolute;
        top: 50%;
        right: 14px;
        transform: translateY(-50%);
        cursor: pointer;
        color: #9ca3af;
        font-size: 1rem;
        z-index: 4;
        transition: color 0.2s ease;
    }

    .toggle-password:hover {
        color: #6366f1;
    }

    .btn-gradient-primary {
        background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%) !important;
        border: none !important;
        border-radius: 10px !important;
        padding: 12px !important;
        font-weight: 600 !important;
        font-size: 0.95rem !important;
        letter-spacing: 0.3px;
        color: #ffffff !important;
        box-shadow: 0 4px 12px rgba(99, 102, 241, 0.35) !important;
        transition: all 0.3s ease !important;
        width: 100%;
        cursor: pointer;
    }

    .btn-gradient-primary:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 16px rgba(99, 102, 241, 0.45) !important;
    }

    .forgot-pass {
        color: #6b7280;
        font-weight: 500;
        font-size: 0.875rem;
        text-decoration: none !important;
        transition: color 0.2s ease;
    }

    .forgot-pass:hover {
        color: #6366f1;
    }
</style>

<div class="page-content login-cover">
    <div class="content-wrapper">
        <div class="content d-flex justify-content-center align-items-center min-vh-100">

            <div class="card login-card-modern mb-0">
                <div class="card-body p-4">

                    <!-- Header -->
                    <div class="text-center">
                        <div class="login-icon-wrapper">
                            <i class="fa-solid fa-user-lock"></i>
                        </div>
                        <h4 class="mb-1 font-weight-bold text-dark">Welcome Back</h4>
                        <p class="text-muted font-size-sm mb-4">Please sign in to your account</p>
                    </div>

                    <!-- Password Reset Success Message Alert -->
                    @if (session('status'))
                        <div class="alert alert-success border-0 rounded-lg mb-3" role="alert" style="background-color: #d1fae5; color: #065f46; border-radius: 10px; padding: 12px;">
                            <i class="fa-solid fa-circle-check mr-2"></i> {{ session('status') }}
                        </div>
                    @endif

                    <!-- Validation Errors Alert -->
                    @if ($errors->any())
                        <div class="alert alert-danger border-0 rounded-lg mb-3" role="alert" style="background-color: #fee2e2; color: #991b1b; border-radius: 10px; padding: 12px;">
                            <ul class="mb-0 pl-3 font-size-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Input -->
                        <div class="form-group position-relative mb-3">
                            <i class="fa-solid fa-envelope input-icon-left"></i>
                            <input type="email" name="identity" class="form-control-modern" placeholder="Enter your email" required value="{{ old('identity') }}">
                        </div>

                        <!-- Password Input -->
                        <div class="form-group position-relative mb-2">
                            <i class="fa-solid fa-lock input-icon-left"></i>
                            <input type="password" name="password" id="password" class="form-control-modern" placeholder="Enter your password" required>
                            <i class="fa-solid fa-eye toggle-password" id="eyeIcon" onclick="togglePass()"></i>
                        </div>

                        <!-- Forgot Password Link -->
                        <div class="d-flex justify-content-end mb-4">
                            <a href="{{ route('password.request') }}" class="forgot-pass">Forgot password?</a>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-gradient-primary">
                            <i class="fa-solid fa-right-to-bracket mr-2"></i> Sign In
                        </button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<script>
    function togglePass() {
        var x = document.getElementById("password");
        var icon = document.getElementById("eyeIcon");
        if (x.type === "password") {
            x.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            x.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }
</script>
@endsection