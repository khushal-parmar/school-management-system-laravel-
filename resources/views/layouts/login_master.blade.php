<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | School Management System</title>
    @include('partials.login.inc_top')
    
    <style>
        body {
            background-color: #eef2f3;
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Poppins', sans-serif;
        }

        .login-card {
            display: flex;
            width: 1000px;
            max-width: 95%;
            background: #fff;
            border-radius: 4px; /* ફોટા મુજબ થોડા ખૂણા જ ગોળ */
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            min-height: 550px;
        }

        .login-left {
            flex: 1;
            padding: 80px 60px; /* થોડું વધારે સ્પેસિંગ */
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-right {
            flex: 1.1; /* ઈમેજ વાળો ભાગ થોડો મોટો */
            background-color: #b5bdbe;
            position: relative;
        }

        .login-right img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .overlay-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            text-align: center;
            color: white;
            padding: 20px;
        }

        .overlay-text h2 {
            font-weight: 800;
            font-size: 1.8rem;
            text-transform: uppercase;
            margin-bottom: 5px;
            letter-spacing: 1px;
        }

        @media (max-width: 768px) {
            .login-right { display: none; }
            .login-left { padding: 40px 30px; }
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="login-left">
            @yield('content')
        </div>
        <div class="login-right">
            <img src="{{ asset('images/login-bg.png') }}" alt="School">
            <div class="overlay-text">
                <h2>SCHOOL MANAGEMENT SYSTEM</h2>
                <p>Plan serve program</p>
            </div>
        </div>
    </div>
    @include('partials.login.footer')
</body>
</html>