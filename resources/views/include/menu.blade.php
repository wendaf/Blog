<section id="header_section_wrapper" class="header_section_wrapper">
    <div class="container">
        <div class="header-section">
            <div class="row">
                <div class="col-md-4">
                    <div class="left_section">
                        <span id="dateToday" class="date"></span>
                        <div class="social">
                            <a class="icons-sm fb-ic"><i class="fa fa-facebook"></i></a>
                            <a class="icons-sm tw-ic"><i class="fa fa-twitter"></i></a>
                            <a class="icons-sm inst-ic"><i class="fa fa-instagram"> </i></a>
                            <a class="icons-sm tmb-ic"><i class="fa fa-tumblr"> </i></a>
                            <a class="icons-sm rss-ic"><i class="fa fa-rss"> </i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="logo" style="color:rgba(84,84,84,0.53);font-family: 'Concert One', cursive;font-size:75px;margin-top:1%;">
                        Auto Blog
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="right_section">
                        @if (Auth::guest())
                            <ul class="nav navbar-nav">
                                <li><a href="/login">Login</a></li>
                                <li><a href="/register">Register</a></li>
                            </ul>
                        @else
                            <ul class="nav navbar-nav">
                                <li class="dropdown m-menu-fw">
                                    <a href="javascript:void(0);" data-toggle="dropdown" class="dropdown-toggle">
                                        {{Auth::user()->name}}
                                        <span><i class="fa fa-angle-down"></i></span></a>
                                    <ul class="dropdown-menu">
                                        @if (Auth::user()->is_admin)
                                            <li><a href="/home/admin">Panel admin</a></li>
                                        @endif
                                        <li>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                                                Logout
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        @endguest
                    </div>
                </div>
            </div>
        </div>

        <div class="navigation-section">
            <nav class="navbar m-menu navbar-default">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#navbar-collapse-1"><span class="sr-only">Toggle navigation</span> <span
                                    class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="#navbar-collapse-1">
                        <ul class="nav navbar-nav main-nav">
                            <li class="active"><a href="/">Accueil</a></li>
                            @php $count = 0; @endphp
                            @foreach($fifthCategory as $key => $data)
                                <li class="active"><a href="/category/{{$data->id}}">{{$data->name}}</a></li>
                            @endforeach

                            <li class="dropdown m-menu-fw"><a href="javascript:void(0);" data-toggle="dropdown" class="dropdown-toggle">
                                    Category
                                    <span><i class="fa fa-angle-down"></i></span></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="m-menu-content">
                                            <ul class="col-md-auto">
                                                @foreach($category as $key => $data)
                                                    <li class="active"><a href="/category/{{$data->id}}">{{$data->name}}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</section>
