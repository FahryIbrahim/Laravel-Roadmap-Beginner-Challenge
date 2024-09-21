    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ env('APP_NAME') }}</title>
        {{-- Link CSS --}}
        <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}" />
        {{-- Bootstrap CDN --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>

    <body>
        <img src="{{ asset('assets/pattern.jpg') }}" class="position-absolute img-fluid bg-cover" alt="">

        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <svg class="d-inline-block align-text-top logo-svg" xmlns="http://www.w3.org/2000/svg"
                        alt="logo" width="25" height="25" viewBox="0,0,256,256">
                        <g fill="#0d6efd" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                            stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                            font-family="none" font-weight="none" font-size="none" text-anchor="none"
                            style="mix-blend-mode: normal">
                            <g transform="scale(2,2)">
                                <path
                                    d="M58,1c-1.7,0 -3,1.3 -3,3v33c0,7.2 -5.8,13 -13,13h-25c-1.7,0 -3,1.3 -3,3v71c0,1.7 1.3,3 3,3h1c0.8,0 1.59961,-0.30039 2.09961,-0.90039l7.90039,-7.90039l7.90039,7.90039c1.2,1.2 3.09922,1.2 4.19922,0l7.90039,-7.90039l7.90039,7.90039c1.2,1.2 3.09922,1.2 4.19922,0l7.90039,-7.90039l7.90039,7.90039c1.2,1.2 3.09922,1.2 4.19922,0l7.90039,-7.90039l7.90039,7.90039c0.6,0.6 1.39961,0.90039 2.09961,0.90039c0.7,0 1.49961,-0.30039 2.09961,-0.90039l10,-10c0.6,-0.6 0.90039,-1.29961 0.90039,-2.09961v-103c0,-5.5 -4.5,-10 -10,-10zM45.87891,7.74609c-0.53437,0.02813 -1.07812,0.20469 -1.57812,0.55469c-1,0.7 -1.90078,1.39961 -2.80078,2.09961l-25.09961,21.5c-2,1.7 -2.89961,4.59922 -2.09961,7.19922c0.9,2.9 3.69883,4.80078 6.79883,4.80078h17.90039c5.5,0 10,-4.5 10,-10v-23.20117c0,-1.8 -1.51797,-3.0375 -3.12109,-2.95313zM48.41016,71.83789c3.97595,-0.06445 6.85938,3.47461 9.39063,6.66211c1.8,2.2 4.09961,5.00039 5.59961,4.90039c1.1,-0.1 2.50039,-1.50078 3.90039,-2.80078c2.2,-2.1 4.99844,-4.80039 8.89844,-4.40039c1.1,0.1 2.20078,0.4 3.30078,1c1.4,0.7 1.99922,2.6 1.19922,4c-0.7,1.5 -2.5,2.10078 -4,1.30078c-0.5,-0.2 -0.89922,-0.40039 -1.19922,-0.40039c-1.1,-0.1 -2.59961,1.30078 -4.09961,2.80078c-2,1.9 -4.20039,4.10039 -7.40039,4.40039h-0.80078c-4.4,0 -7.39961,-3.80156 -10.09961,-7.10156c-1.3,-1.7 -3.3,-4.09844 -4.5,-4.39844c-1,0.9 -3.19922,3.9 -4.69922,6c-0.6,0.8 -1.10117,1.59844 -1.70117,2.39844c-1,1.3 -2.89922,1.60156 -4.19922,0.60156c-1.3,-1 -1.59961,-2.90117 -0.59961,-4.20117c0.6,-0.8 1.09922,-1.49883 1.69922,-2.29883c3.9,-5.5 5.9,-8.10039 8.5,-8.40039c0.275,-0.0375 0.54548,-0.0582 0.81055,-0.0625zM90,83c1.7,0 3,1.3 3,3c0,1.7 -1.3,3 -3,3c-1.7,0 -3,-1.3 -3,-3c0,-1.7 1.3,-3 3,-3z">
                                </path>
                            </g>
                        </g>
                    </svg>
                    <h5 class="d-inline">
                        Pawarta
                    </h5>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav mx-auto">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                        <a class="nav-link" href="#">Article</a>
                        <a class="nav-link" href="#">About</a>
                    </div>
                    @auth
                        <!-- Logout Button -->
                        <form action="{{ route('logout') }}" method="post" class="d-inline">
                            @csrf
                            <button class="btn btn-primary" type="submit">Logout</button>
                        </form>
                    @endauth

                    @guest
                        <!-- Login Button -->
                        <a class="btn btn-login btn-primary" href="{{ route('login') }}">Log In</a>
                    @endguest
                </div>
            </div>
        </nav>

        <main>
            <div class="container mt-5 z-2">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="bg-white rounded-3 z-3 p-2 shadow">
                            <img src="{{ $articleHero->image }}" class="img-fluid rounded-3 p-" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="container mt-5 ">
                            <div class="row bg-body-secondary align-items-center rounded-4 hero">
                                <div
                                    class="col-lg-4 rounded-4 bg-primary text-white text-center justify-content-center h-75">
                                    <div class="category-hero">{{ $articleHero->category->name }}</div>
                                </div>
                                <div class="col-lg-8 estimation-time">{{ $articleHero->reading_time }} min read</div>
                            </div>
                            <div class="row mt-3">
                                <h1>{{ $articleHero->title }}</h1>
                            </div>
                            <div class="row mt-1">
                                <p>{{ $articleHero->content }} </p>
                            </div>
                            <div class="row button-readmore">
                                <a href="" class="text-primary fw-semibold cta icon-link icon-link-hover">Read
                                    More <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" stroke="#0d6efd" stroke-width="1.2"
                                            d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                                    </svg></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5" />
                <div class="row mt-5">
                    <div class="col-lg-12">
                        <div class="container">
                            <div class="row">
                                <h2 class="section-title">Our Recent Article</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-lg-11">
                        <div class="container">
                            <div class="row">
                                <p class="section-description">Stay Inform with Our Latest Insights
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1">
                        <div class="container container-pagination">
                            <div class="row">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                fill="currentColor" class="bi bi-arrow-left-circle-fill"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z" />
                                            </svg>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                fill="currentColor" class="bi bi-arrow-right-circle-fill"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    @foreach ($articles as $article)
                    <div class="col-lg-4">
                        <img src="{{ $article->image }}" class="rounded-3 article-thumbnail"
                            alt="" srcset="" width="408px" height="230px">
                        <div class="mt-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <p class="writer text-start text-danger fs-6">{{ $article->user->name }}
                                    </p>
                                </div>
                                <div class="col-lg-6">
                                    <p class="date text-end fs-6">{{ \Carbon\Carbon::parse($article->created_at)->format('d M Y') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="title title-article">
                            <h4>{{ $article->title }}</h4>
                        </div>
                        <div class="description">
                            <p class="text-secondary">{{Str::limit($article->content,200)}}</p>
                        </div>
                        <div class="button">
                            <a href="" class="text-primary fw-semibold cta icon-link icon-link-hover">Read
                                More <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" stroke="#0d6efd" stroke-width="1.2"
                                        d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row mt-5"></div>
                <div class="row mt-5"></div>
                <div class="row mt-5"></div>
                <div class="row mt-5"></div>
                <div class="row mt-5">
                    <div class="col-lg-4">
                        <div class="container">
                            <div class="section">
                                <p class="text-primary fw-semibold">Trending</p>
                            </div>
                            <div class="title">
                                <h1>Trending Articles You Need To Read</h1>
                            </div>
                            <div class="description">
                                <p class="text-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Error
                                    reiciendis quos illum adipisci, rerum impedityalo....</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 trending">
                        @foreach ($trendingArticles as $index => $trending)
                        <div class="row {{ $index === 0 ? '' : 'mt-5' }}">
                            <div class="col-lg-12">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <img src="{{ $trending->image }}"
                                                class="rounded-3 article-thumbnail" alt="" srcset=""
                                                width="300px" height="169px">
                                        </div>
                                        <div class="col-lg-8">
                                            <div
                                                class="category category-width text-primary ms-5 bg-body-secondary text-center rounded-5">
                                                {{ $trending->category->name }}</div>
                                            <div class="title ms-5 mt-1">
                                                <h5 class="fw-bold">{{$trending->title}}</h5>
                                            </div>
                                            <div class="description">
                                                <p class="text-secondary ms-5">{{Str::limit($trending->content,200)}}
                                                </p>
                                            </div>
                                            <div class="button ms-5">
                                                <a href=""
                                                    class="text-primary fw-semibold cta icon-link icon-link-hover">Read
                                                    More <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor" class="bi bi-arrow-right"
                                                        viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" stroke="#0d6efd" stroke-width="1.2"
                                                            d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="row mt-5"></div>
                <div class="row mt-5"></div>
                <div class="row mt-5"></div>
                <div class="row ">
                    <div class="col-lg-12">
                        <div class="container border border-3">
                            <div class="row banner">
                                <div class="col-lg-6"><img src="{{ asset('assets/mockup.png') }}" alt=""
                                        srcset="" height="450" class="p-2 banner-image"></div>
                                <div class="col-lg-6 p-5">
                                    <div class="title text-start">
                                        <h1>
                                            Maximize Efficiency - Boost Sales
                                        </h1>
                                    </div>
                                    <div class="desc">
                                        <p class="text-secondary">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Error
                                            reiciendis
                                            quos illum adipisci, rerum impedityalo....
                                        </p>
                                    </div>
                                    <div class="button">
                                        <a type="button" class="btn btn-danger">Start for Now!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5"></div>
                <div class="row mt-5"></div>
                <div class="row mt-5"></div>
                <div class="row mt-5"></div>
                <div class="row">
                    <div class="col-lg-7">
                        <div class="container">
                            <div class="title">
                                <h1>Optimize Your Hospitality Business With Pawarta</h1>
                            </div>
                            <div class="description">
                                <p class="text-secondary">Simplify Hospitality Management with Our Expert
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="container newsletter-section">
                            <div class="title">
                                <h5>Newsletter</h5>
                            </div>
                            <div class="description">
                                <p class="text-secondary">Subscribe to our newsletter to get latest news</p>
                            </div>
                            <div class="row">
                                <div class="col-9">
                                    <input type="text" class="form-control" placeholder="Enter your email">
                                </div>
                                <div class="col-3">
                                    <button type="submit" class="btn btn-primary">Subscribe</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5"></div>
                <div class="row mt-5"></div>
                <div class="row">
                    <div class="col me-5">
                        <div class="fw-bold">Company</div>
                        <ul class="list-unstyled text-secondary">
                            <li><a href="/about" class="text-secondary footer-a">About Us</a></li>
                            <li><a href="/careers" class="text-secondary footer-a">Careers</a></li>
                            <li><a href="/press" class="text-secondary footer-a">Press</a></li>
                            <li><a href="/blog" class="text-secondary footer-a">Blog</a></li>
                            <li><a href="/contact" class="text-secondary footer-a">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col me-5">
                        <div class="fw-bold">Support</div>
                        <ul class="list-unstyled text-secondary">
                            <li><a href="/help" class="text-secondary footer-a">Help Center</a></li>
                            <li><a href="/faq" class="text-secondary footer-a">FAQ</a></li>
                            <li><a href="/shipping" class="text-secondary footer-a">Shipping & Returns</a></li>
                            <li><a href="/track" class="text-secondary footer-a">Track Order</a></li>
                            <li><a href="/warranty" class="text-secondary footer-a">Warranty</a></li>
                        </ul>
                    </div>
                    <div class="col me-5">
                        <div class="fw-bold">Legal</div>
                        <ul class="list-unstyled text-secondary">
                            <li><a href="/privacy" class="text-secondary footer-a">Privacy Policy</a></li>
                            <li><a href="/terms" class="text-secondary footer-a">Terms of Service</a></li>
                            <li><a href="/cookies" class="text-secondary footer-a">Cookie Policy</a></li>
                            <li><a href="/security" class="text-secondary footer-a">Security</a></li>
                            <li><a href="/compliance" class="text-secondary footer-a">Compliance</a></li>
                        </ul>
                    </div>
                    <div class="col me-5">
                        <div class="fw-bold">Social Media</div>
                        <ul class="list-unstyled text-secondary">
                            <li><a href="https://www.facebook.com" class="text-secondary footer-a">Facebook</a></li>
                            <li><a href="https://www.twitter.com" class="text-secondary footer-a">Twitter</a></li>
                            <li><a href="https://www.instagram.com" class="text-secondary footer-a">Instagram</a></li>
                            <li><a href="https://www.linkedin.com" class="text-secondary footer-a">LinkedIn</a></li>
                            <li><a href="https://www.youtube.com" class="text-secondary footer-a">YouTube</a></li>
                        </ul>
                    </div>
                    <div class="col">
                        <div class="fw-bold">Newsletter</div>
                        <ul class="list-unstyled text-secondary">
                            <li><a href="/subscribe" class="text-secondary footer-a">Subscribe</a></li>
                            <li><a href="/promotions" class="text-secondary footer-a">Special Offers</a></li>
                            <li><a href="/news" class="text-secondary footer-a">Latest News</a></li>
                            <li><a href="/events" class="text-secondary footer-a">Events</a></li>
                            <li><a href="/updates" class="text-secondary footer-a">Product Updates</a></li>
                        </ul>
                    </div>
                </div>
                <hr class="my-4">
                <div class="row mb-3">
                    <div class="col-lg-7">
                        <ul class="list-unstyled d-flex gap-5 m-0 p-0">
                            <li><a href="#" class="text-secondary footer-a">Instagram</a></li>
                            <li><a href="#" class="text-secondary footer-a">Twitter</a></li>
                            <li><a href="#" class="text-secondary footer-a">Facebook</a></li>
                            <li><a href="#" class="text-secondary footer-a">LinkedIn</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-5">
                        <div class="text-end">
                            <p>&copy; 2021 Pawarta. All rights reserved.</p>
                        </div>
                    </div>
                </div>

            </div>
        </main>

        {{-- Script --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
            integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
        </script>
    </body>

    </html>
