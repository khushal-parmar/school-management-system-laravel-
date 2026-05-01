<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management - Index</title>
    {{-- CSS અને બીજી લિંક્સ --}}
    @include('partials.login.inc_top')
</head>
<body>
    
    @include('partials.login.header')
    
    <main>
        <div class="big-wrapper light">
            {{-- બેકગ્રાઉન્ડ શેપ ઈમેજ --}}
            <img src="{{ asset('images/shape.png') }}" alt="" class="shape" />

            <div class="container mt-5">
                <div class="row">
                    {{-- ડાબી બાજુનું લખાણ --}}
                    <div class="col-12 col-md-6 d-flex justify-content-center get-started" style="height: 550px;">
                        <div class="d-flex justify-content-center align-items-center">
                            <div>
                                <div class="big-title">
                                    <h1>Future is here,</h1>
                                    <h1>Start Exploring now.</h1>
                                </div>
                                <p class="text">
                                    streamline processes, manage resources, track student data, facilitate
                                    communication, and enhance administrative tasks effectively.
                                </p>
                                <div class="cta">
                                    {{-- લોગિન પેજ પર જવા માટે --}}
                                    <a href="{{ route('login') }}" class="btn btn-primary" style="padding: 10px 30px; border-radius: 5px;">Get started</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- જમણી બાજુની ઈમેજ --}}
                    <div class="col-12 col-md-6 image-box">
                        <img src="{{ asset('images/children.png') }}" alt="Person Image" class="person" style="width: 100%; height: auto;" />
                    </div>
                </div>
            </div>

            {{-- Feature Cards સેક્શન --}}
            {{-- જો આ ફાઈલ હજી નથી બનાવી તો આ લાઈન અત્યારે કમેન્ટ કરી રાખજે --}}
            {{-- @include('shared.feature-cards') --}}

            <div class="container mt-3">
                <hr>
            </div>

            {{-- Carousel (સ્લાઇડર) --}}
            <div class="container mt-3 carousel-box">
                <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
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
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </main>

    @include('partials.login.footer')

</body>
</html>