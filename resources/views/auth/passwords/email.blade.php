@extends('layouts.login_master')

@section('content')
<style>
    /* Modern UI Overlay & Card Styling */
    .reset-card-modern {
        border-radius: 16px !important;
        border: 1px solid rgba(255, 255, 255, 0.15) !important;
        background: #ffffff !important;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15) !important;
        overflow: hidden;
        width: 100%;
        max-width: 420px;
    }

    .reset-icon-wrapper {
        width: 70px;
        height: 70px;
        background: rgba(99, 102, 241, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.25rem;
    }

    .reset-icon-wrapper i {
        font-size: 1.8rem;
        color: #6366f1;
    }

    .form-control-modern {
        border-radius: 10px !important;
        padding: 12px 16px 12px 42px !important;
        border: 1px solid #e5e7eb !important;
        background-color: #f9fafb !important;
        font-size: 0.95rem;
        transition: all 0.25s ease;
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

    .btn-gradient-primary {
        background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%) !important;
        border: none !important;
        border-radius: 10px !important;
        padding: 12px !important;
        font-weight: 600 !important;
        font-size: 0.95rem !important;
        letter-spacing: 0.3px;
        box-shadow: 0 4px 12px rgba(99, 102, 241, 0.35) !important;
        transition: all 0.3s ease !important;
    }

    .btn-gradient-primary:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 16px rgba(99, 102, 241, 0.45) !important;
    }

    .back-to-login {
        color: #6b7280;
        font-weight: 500;
        text-decoration: none !important;
        transition: color 0.2s ease;
    }

    .back-to-login:hover {
        color: #6366f1;
    }
</style>

<div class="page-content login-cover">
    <div class="content-wrapper">
        <div class="content d-flex justify-content-center align-items-center min-vh-100">

            <!-- Direct Password Reset Form -->
            <form class="login-form" method="POST" action="{{ route('password.direct.update') }}">
                @csrf
                <div class="card reset-card-modern mb-0">
                    <div class="card-body p-4">

                        <!-- Icon Header -->
                        <div class="text-center">
                            <div class="reset-icon-wrapper">
                                <i class="icon-key"></i>
                            </div>
                            <h4 class="mb-1 font-weight-bold text-dark">Reset Password</h4>
                            <p class="text-muted font-size-sm mb-4">Enter your email and set a new password</p>
                        </div>

                        <!-- Status Alert -->
                        @if (session('status'))
                            <div class="alert alert-success border-0 rounded-lg mb-3" role="alert" style="background-color: #d1fae5; color: #065f46;">
                                <i class="icon-checkmark-circle mr-2"></i> {{ session('status') }}
                            </div>
                        @endif

                        <!-- Error Alerts -->
                        @if ($errors->any())
                            <div class="alert alert-danger border-0 rounded-lg mb-3" role="alert" style="background-color: #fee2e2; color: #991b1b;">
                                <ul class="mb-0 pl-3">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Email Input -->
                        <div class="form-group position-relative mb-3">
                            <i class="icon-mention input-icon-left"></i>
                            <input name="email" required type="email" class="form-control form-control-modern" value="{{ old('email') }}" placeholder="Registered Email Address">
                        </div>

                        <!-- New Password Input -->
                        <div class="form-group position-relative mb-3">
                            <i class="icon-lock2 input-icon-left"></i>
                            <input name="password" required type="password" class="form-control form-control-modern" placeholder="New Password">
                        </div>

                        <!-- Confirm Password Input -->
                        <div class="form-group position-relative mb-4">
                            <i class="icon-shield-check input-icon-left"></i>
                            <input name="password_confirmation" required type="password" class="form-control form-control-modern" placeholder="Confirm New Password">
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary btn-block btn-gradient-primary">
                            <i class="icon-checkmark3 mr-2"></i> Update Password
                        </button>

                        <!-- Back to Login Link -->
                        <div class="text-center mt-4">
                            <a href="{{ route('login') }}" class="back-to-login font-size-sm">
                                <i class="icon-arrow-left13 mr-1"></i> Back to Login
                            </a>
                        </div>

                    </div>
                </div>
            </form>
            <!-- /Direct Password Reset Form -->

        </div>
    </div>
</div>
@endsection