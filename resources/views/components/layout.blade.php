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
    <nav>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <div class="row w-100">
                    <!-- Logo Column -->
                    <div class="col-lg-2 col-md-3 col-sm-12 d-flex align-items-center">
                        <a class="logo navbar-brand" href="#">
                            <svg class="d-inline-block align-text-top" xmlns="http://www.w3.org/2000/svg" alt="logo" x="0px"
                                y="0px" width="25" height="25" viewBox="0,0,256,256">
                                <g fill="#0d6efd" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                    stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                    font-family="none" font-weight="none" font-size="none" text-anchor="none"
                                    style="mix-blend-mode: normal">
                                    <g transform="scale(2,2)">
                                        <path d="M58,1c-1.7,0 -3,1.3 -3,3v33c0,7.2 -5.8,13 -13,13h-25c-1.7,0 -3,1.3 -3,3v71c0,1.7 1.3,3 3,3h1c0.8,0 1.59961,-0.30039 2.09961,-0.90039l7.90039,-7.90039l7.90039,7.90039c1.2,1.2 3.09922,1.2 4.19922,0l7.90039,-7.90039l7.90039,7.90039c1.2,1.2 3.09922,1.2 4.19922,0l7.90039,-7.90039l7.90039,7.90039c1.2,1.2 3.09922,1.2 4.19922,0l7.90039,-7.90039l7.90039,7.90039c0.6,0.6 1.39961,0.90039 2.09961,0.90039c0.7,0 1.49961,-0.30039 2.09961,-0.90039l10,-10c0.6,-0.6 0.90039,-1.29961 0.90039,-2.09961v-103c0,-5.5 -4.5,-10 -10,-10zM45.87891,7.74609c-0.53437,0.02813 -1.07812,0.20469 -1.57812,0.55469c-1,0.7 -1.90078,1.39961 -2.80078,2.09961l-25.09961,21.5c-2,1.7 -2.89961,4.59922 -2.09961,7.19922c0.9,2.9 3.69883,4.80078 6.79883,4.80078h17.90039c5.5,0 10,-4.5 10,-10v-23.20117c0,-1.8 -1.51797,-3.0375 -3.12109,-2.95313zM48.41016,71.83789c3.97595,-0.06445 6.85938,3.47461 9.39063,6.66211c1.8,2.2 4.09961,5.00039 5.59961,4.90039c1.1,-0.1 2.50039,-1.50078 3.90039,-2.80078c2.2,-2.1 4.99844,-4.80039 8.89844,-4.40039c1.1,0.1 2.20078,0.4 3.30078,1c1.4,0.7 1.99922,2.6 1.19922,4c-0.7,1.5 -2.5,2.10078 -4,1.30078c-0.5,-0.2 -0.89922,-0.40039 -1.19922,-0.40039c-1.1,-0.1 -2.59961,1.30078 -4.09961,2.80078c-2,1.9 -4.20039,4.10039 -7.40039,4.40039h-0.80078c-4.4,0 -7.39961,-3.80156 -10.09961,-7.10156c-1.3,-1.7 -3.3,-4.09844 -4.5,-4.39844c-1,0.9 -3.19922,3.9 -4.69922,6c-0.6,0.8 -1.10117,1.59844 -1.70117,2.39844c-1,1.3 -2.89922,1.60156 -4.19922,0.60156c-1.3,-1 -1.59961,-2.90117 -0.59961,-4.20117c0.6,-0.8 1.09922,-1.49883 1.69922,-2.29883c3.9,-5.5 5.9,-8.10039 8.5,-8.40039c0.275,-0.0375 0.54548,-0.0582 0.81055,-0.0625zM90,83c1.7,0 3,1.3 3,3c0,1.7 -1.3,3 -3,3c-1.7,0 -3,-1.3 -3,-3c0,-1.7 1.3,-3 3,-3z">
                                        </path>
                                    </g>
                                </g>
                            </svg>
                            Pawarta
                        </a>
                    </div>

                    <!-- Navigation Links Column -->
                    <div class="col-lg-8 col-md-6 col-sm-12">
                        <div class="navbar-text text-center">
                            <a href="home" class="mx-2">Home</a>
                            <a href="article" class="mx-2">Article</a>
                            <a href="about" class="mx-2">About</a>
                        </div>
                    </div>

                    <!-- Authentication Column -->
                    <div class="col-lg-2 col-md-3 col-sm-12 d-flex justify-content-end">
                        @auth
                            <!-- Logout Button -->
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button class="btn btn-primary" type="submit">Logout</button>
                            </form>
                        @endauth

                        @guest
                            <!-- Login Button -->
                            <a class="btn btn-primary" href="{{ route('login') }}">Log In</a>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>
    </nav>

    <!-- Main Content -->
    <main class="container py-4">
        <div class="row">
            <div class="col">
                {{$slot}}
            </div>
        </div>
    </main>

    {{-- Scripts --}}
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
