<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="dark" data-color-theme="Blue_Theme" data-layout="vertical">

@include('layouts.partials.head')

<body>
    @include('layouts.partials.preloader')
    <div id="main-wrapper">
        @include('layouts.partials.sidebar')
        <div class="page-wrapper">
            <div class="body-wrapper">
                <div class="container-fluid">
                    <!--  Header Start -->
                    @include('layouts.partials.header')
                    <!--  Header End -->
                    {{-- Main Content Start --}}
                    @yield('main-content')
                    {{-- Main Content End --}}
                    {{-- Footer Start --}}
                    <div class="text-center text-md-start">
                        <p>Made with ❤ by <a href="https://faykarr.vercel.app" target="_blank" class="text-primary">faykarr</a></p>
                    </div>
                    {{-- Footer End --}}
                </div>
            </div>
            {{-- Theme Customizer --}}
            @include('layouts.partials.theme-customizer')
            {{-- Theme Customizer --}}
        </div>
        <div class="dark-transparent sidebartoggler"></div>
    </div>

    @include('layouts.partials.footer')
</body>

</html>