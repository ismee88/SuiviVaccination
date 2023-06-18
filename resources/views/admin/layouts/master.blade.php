<!DOCTYPE html>
<html lang="fr">
<head>
    @include('admin.layouts.head')
</head>
<body>

    <div class="main-wrapper">
        @include('admin.layouts.header')
    


        <div class="sidebar" id="sidebar">
            @include('admin.layouts.sidebar')
        </div>


        {{-- main --}}
        @yield('content')

    </div>



<!--footer-->
@include('admin.layouts.footer')

</body>
</html>