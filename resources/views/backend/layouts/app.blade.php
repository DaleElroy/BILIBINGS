<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
</head>

<body>

    <aside class="left-sidebar" style="padding-bottom:50px; margin-top:-15px">
        <h1 class="text" style="margin-bottom:20px;">Bilibeads</h1>
        <div class="scroll-sidebar" data-sidebarbg="skin6">
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li class="sidebar-item selected">
                        <a class="sidebar-link active" href="{{url('admindashboard')}}" aria-expanded="false">
                            <i data-feather="home" class="feather-icon"></i>
                            <span class="hide-menu">Home</span>
                        </a>
                    </li>
                    <li class="sidebar-item selected">
                        <a class="sidebar-link active" href="{{ url('/') }}" aria-expanded="false">
                            <i data-feather="package" class="feather-icon"></i>
                            <span class="hide-menu">Shop</span>
                        </a>
                    </li>
    
                    <li class="sidebar-item selected">
                        <a class="sidebar-link active" href="{{ url('adminusers') }}" aria-expanded="false">
                            <i data-feather="package" class="feather-icon"></i>
                            <span class="hide-menu">CRUD Manager</span>
                        </a>
                    </li>
    
                    <li class="sidebar-item selected">
                        <a class="sidebar-link active" href="{{ url('adminproduct') }}" aria-expanded="false">
                            <i data-feather="globe" class="feather-icon"></i>
                            <span class="hide-menu">Products</span>
                        </a>
                    </li>
    
                    <li class="sidebar-item selected">
                        <a class="sidebar-link active" href="" aria-expanded="false">
                            <i data-feather="key" class="feather-icon"></i>
                            <span class="hide-menu">Carousel</span>
                        </a>
                    </li>
    
                    <li class="sidebar-item selected">
                        <a class="sidebar-link active" href="" aria-expanded="false">
                            <i data-feather="user" class="feather-icon"></i>
                            <span class="hide-menu">Latest Product</span>
                        </a>
                    </li>
    
                    <li class="sidebar-item selected">
                        <a href="{{ route('logout') }}" class="sidebar-link sidebar-link"
                            onclick="event.preventDefault(); document.querySelector('#logout').submit()"
                            aria-expanded="false">
                            <i data-feather="log-out" class="feather-icon"></i>
                            <span class="hide-menu">Logout</span>
                        </a>
                        <form id="logout" action="{{ route('logout') }}" method="post"> @csrf </form>
                    </li>
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>

</body>
@style('https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css')
@script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
@script('https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
@script('https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.2/dist/alpine.min.js')
@script('/assets/admin/js/ckeditor.min.js')

{{-- Styles --}}
@livewireStyles
@style('/assets/admin/css/style.min.css')
@if (config('easy_panel.rtl_mode'))
    @style('/assets/admin/css/rtl.css')
    @style('https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font@v27.2.1/dist/font-face.css')
@endif

</html>
