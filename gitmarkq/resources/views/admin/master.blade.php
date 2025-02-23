<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>IB System || @yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content name="description" />
    <meta content name="author" />
    {{-- favicon --}}
    <link rel="shortcut icon" href="{{ url($settings->fabicon ?? '/') }}" type="image/x-icon">

    @include('admin.includes.css')

</head>

<body>

    {{-- <div id="loader" class="app-loader">
        <span class="spinner"></span>
    </div> --}}


    <div id="app" class="app app-header-fixed app-sidebar-fixed ">

        @include('admin.includes.navbar')
        @include('admin.includes.sidebar')


       

        
        <div class="app-sidebar-bg" data-bs-theme="dark"></div>
        <div class="app-sidebar-mobile-backdrop"><a href="#" data-dismiss="app-sidebar-mobile"
                class="stretched-link"></a></div>


        <div id="content" class="app-content">

            <ol class="breadcrumb float-xl-end">
                <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
                <li class="breadcrumb-item active">@yield('page_title')</li>
            </ol>


            <h1 class="page-header">@yield('page_title') 
                {{-- <small>Hello Users</small> --}}
            </h1>


           @yield('body')

        </div>



    </div>

    @include('admin.includes.js')
</body>


</html>
