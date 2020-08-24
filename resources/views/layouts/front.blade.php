<!DOCTYPE html>
<html>

@include('include.head')

<body id="page-top" data-spy="scroll" data-target=".navbar">

 <div id="app">

    <div id="main-wrapper">
        <div id="preloader">
            <div id="status">
                <div class="status-mes"></div>
            </div>
        </div>


        <div class="uc-mobile-menu-pusher">
            <div class="content-wrapper">
                @include('include.menu')
                @yield('content')
            </div>
        </div>

        <a href="javascript:void(0);" class="crunchify-top"><i class="fa fa-angle-up" aria-hidden="true"></i></a>

        <div class="uc-mobile-menu uc-mobile-menu-effect" style="display:none;">
            <button type="button" class="close" aria-hidden="true" data-toggle="offcanvas"
                    id="uc-mobile-menu-close-btn">&times;</button>
            <div>
                <div>
                    <ul id="menu">
                        <li class="active"><a href="blog.html">Article</a></li>
                        <li class="dropdown m-menu-fw"><a href="javascript:void(0);" data-toggle="dropdown" class="dropdown-toggle">
                                Categorie
                                <span><i class="fa fa-angle-down"></i></span></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="m-menu-content">
                                        <ul class="col-sm-3">
                                            <li class="dropdown-header">Widget Haeder</li>
                                            <li><a href="javascript:void(0);">Awesome Features</a></li>
                                            <li><a href="javascript:void(0);">Clean Interface</a></li>
                                            <li><a href="javascript:void(0);">Available Possibilities</a></li>
                                            <li><a href="javascript:void(0);">Responsive Design</a></li>
                                            <li><a href="javascript:void(0);">Pixel Perfect Graphics</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

</div>

</body>

@include('include.footer')

@yield('script')

</html>


