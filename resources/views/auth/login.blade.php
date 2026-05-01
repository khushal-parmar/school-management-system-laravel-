@extends('layouts.login_master')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    /* પેલા ફોટા જેવો જ લૂક લાવવા માટે કસ્ટમ CSS */
    .login-header {
        margin-bottom: 45px;
    }
    
    .login-header h2 {
        font-weight: 500;
        color: #1a1a1a;
        display: inline-block;
        border-bottom: 3px solid #1a2d3b; /* નીચેની ડાર્ક લાઈન */
        padding-bottom: 5px;
        font-size: 2rem;
        margin: 0;
        letter-spacing: 0.5px;
    }

    /* મેઈન ઇનપુટ ગ્રુપ */
    .input-group-custom {
        position: relative;
        margin-bottom: 40px;
        border-bottom: 2px solid #000; /* ફોટા જેવી જ ડાર્ક બોટમ બોર્ડર */
        display: flex;
        align-items: center;
    }

    /* ડાબી બાજુના આઈકોન્સ (Mail & Lock) */
    .input-group-custom .left-icon {
        position: absolute;
        left: 0;
        color: #1a2d3b;
        font-size: 1.1rem;
    }

    /* ઇનપુટ ફિલ્ડ */
    .input-group-custom input {
        width: 100%;
        border: none;
        padding: 10px 40px 10px 35px; /* ડાબે-જમણે આઈકોન માટે જગ્યા */
        outline: none;
        font-size: 1.1rem;
        background: transparent;
        color: #333;
        font-family: inherit;
    }

    /* જમણી બાજુનું આંખવાળું આઈકોન */
    .input-group-custom .toggle-password {
        position: absolute;
        right: 0; /* આનાથી આંખ એકદમ જમણી બાજુ જશે */
        cursor: pointer;
        color: #333;
        font-size: 1.1rem;
        padding: 5px;
    }

    /* Forgot Password લિંક */
    .forgot-pass {
        display: block;
        color: #1a1a1a;
        font-size: 1rem;
        text-decoration: none;
        margin-top: -15px;
        margin-bottom: 45px;
        font-weight: 500;
    }

    /* Submit બટન */
    .submit-btn {
        background-color: #1a2d3b; /* ફોટા મુજબનો ડાર્ક કલર */
        color: #fff;
        border: none;
        width: 100%;
        padding: 15px;
        font-size: 1.2rem;
        border-radius: 5px;
        cursor: pointer;
        font-weight: 500;
        transition: background 0.3s ease;
    }

    .submit-btn:hover {
        background-color: #121f29;
    }

    /* Placeholder કલર */
    input::placeholder {
        color: #999;
        font-size: 1rem;
    }
</style>

<div class="login-header">
    <h2>Login</h2>
</div>

<form method="POST" action="{{ route('login') }}">
    @csrf

    {{-- Email Input --}}
    <div class="input-group-custom">
        <i class="fa-solid fa-envelope left-icon"></i>
        <input type="email" name="identity" placeholder="Enter your email" required value="{{ old('identity') }}">
    </div>

    {{-- Password Input --}}
    <div class="input-group-custom">
        <i class="fa-solid fa-lock left-icon"></i>
        <input type="password" name="password" id="password" placeholder="Enter your password" required>
        <i class="fa-solid fa-eye toggle-password" id="eyeIcon" onclick="togglePass()"></i>
    </div>

    <a href="{{ route('password.request') }}" class="forgot-pass">Forgot password?</a>

    <button type="submit" class="submit-btn">Submit</button>
</form>

<script>
    // પાસવર્ડ બતાવવા/છુપાવવા માટેનું ફંક્શન
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