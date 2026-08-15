<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management - Index</title>
    {{-- CSS લિંક્સ --}}
    @include('partials.login.inc_top')
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
        .big-wrapper {
            position: relative;
            padding: 20px 0; 
            overflow: hidden;
        } 

        .shape {
            position: absolute;
            z-index: -1;
            width: 500px;
            top: -100px;
            left: -150px;
            opacity: 0.5;
        }

        .big-title h1 {
            color: #1a2d3b;
            font-weight: 700;
            font-size: 3rem;
            margin: 0;
        }

        .text {
            color: #666;
            font-size: 1.1rem;
            margin: 20px 0 30px;
            line-height: 1.6;
        }

        .cta .btn {
            background-color: #1a2d3b;
            color: white;
            padding: 12px 35px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 500;
            transition: 0.3s;
        }

        .cta .btn:hover {
            background-color: #2c3e50;
        }

        .person {
            width: 100%;
            max-width: 550px;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        .card {
            transition: 0.3s; 
            border-radius: 15px;
        }

        .card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>

<body>

    @include('partials.login.header')

    <main>
        <div class="big-wrapper light">

            <div class="container mt-5">
                <div class="row align-items-center">
                    <div class="col-12 col-md-6 get-started">
                        <div class="big-title">
                            <h1>Future is here,</h1>
                            <h1>Start Exploring now.</h1>
                        </div>
                        <p class="text">
                            Streamline processes, manage resources, track student data, facilitate
                            communication, and enhance administrative tasks effectively.
                        </p>
                        <div class="cta">
                            <a href="{{ route('login') }}" class="btn">Get started</a>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 text-center image-box">
                        <img src="{{ asset('images/login-bg.png') }}" alt="School Children" class="person" />
                    </div>
                </div>
            </div>
            {{-- Feature Cards  --}}
            <div class="container card-container mt-5" id="feature-cards">
                <div class="row g-4 show-cards">
                    <div class="col-12 col-md-4">
                        <div class="card border-0 shadow-sm p-4 h-100">
                            <h3 class="fs-4 d-flex align-items-center">
                                <span class="text-primary mr-2"><i class='bx bxs-book'></i></span> Features
                            </h3>
                            <p class="text-muted">A robust academic career is typically essential for securing financial stability.</p>
                        </div>
                    </div> 
                     
                    <div class="col-12 col-md-4">
                        <div class="card border-0 shadow-sm p-4 h-100">
                            <h3 class="fs-4 d-flex align-items-center">
                                <span class="text-primary mr-2"><i class='bx bxs-star-half'></i></span> Achievement
                            </h3>
                            <p class="text-muted">Recognition for academic excellence and leadership at school awards.</p>
                        </div> 
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="card border-0 shadow-sm p-4 h-100">
                            <h3 class="fs-4 d-flex align-items-center">
                                <span class="text-primary mr-2"><i class='bx bxs-cuboid'></i></span> Goals
                            </h3>
                            <p class="text-muted">Creating an environment where curiosity and innovation thrive.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-5">
                <hr>
            </div> 
            
            {{-- Slider (Carousel)  --}}
            <div class="container mt-5 mb-5 carousel-box">
                <div id="carouselExample" class="carousel slide shadow" data-bs-ride="carousel" data-bs-interval="2000" style="border-radius: 15px; overflow: hidden;">

                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></button>
                        <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1"></button>
                        <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('images/carousel1.jpg') }}" class="d-block w-100" alt="Slider 1">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/carousel2.jpg') }}" class="d-block w-100" alt="Slider 2">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/carousel3.jpg') }}" class="d-block w-100" alt="Slider 3">
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </main>

    @include('partials.login.footer') 

    {{-- Bootstrap Bundle JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Carousel Initialization  --}}
    <script>
        const myCarousel = document.querySelector('#carouselExample')
        const carousel = new bootstrap.Carousel(myCarousel, {
            interval: 2000,
            ride: 'carousel'
        })
    </script>
</body>
{{--    --}}
</html>

