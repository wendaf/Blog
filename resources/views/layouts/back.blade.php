<!DOCTYPE html>
<html lang="en">

@include ('include.back.head')

<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">

@include ('include.back.menu_top')

<div class="app-body">

    @include('include.back.menu')
    <main class="main">

        <div class="mb-3"></div>

        <div class="container-fluid">
            @yield('content')
        </div>

    </main>

</div>

@include ('include.back.footer')

</body>
</html>
