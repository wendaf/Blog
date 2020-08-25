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
                        <img style="width: 370px; height: 100px" src="https://upload.wikimedia.org/wikipedia/commons/c/ce/Automoto_La_cha%C3%AEne_2018_on_air.jpg" />
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
                <div style='display: flex; flex-direction: row; align-items: center; justify-content: center;'>

                    <a href="/" class="btn btn-primary btn-sm" style="margin-right: 5px" role="button" aria-disabled="true"><i class="fas fa-home"></i> Accueil</a>

                    <div class="dropdown">
                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-list"></i> Catégories
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">

                            @php $count = 0; @endphp
                            @foreach($fifthCategory as $key => $data)
                            <li class="dropdown-item active" type="button"><a href="/categorie/{{$data->id}}">{{$data->name}}</a></li>
                            @endforeach
                        </div>
                    </div>


                    <a href="/chats" class="btn btn-primary btn-sm" style="margin-left: 5px; margin-right: 50px" role="button" aria-disabled="true"><i class="fas fa-comment"></i> Chatbox</a>

                    <form action="/search" method="POST" role="search" class="form-inline my-2 my-lg-0">
                        {{ csrf_field() }}
                        <input class="form-control mr-sm-2" type="search" name="q" style='margin-top: 2px; margin-left: 25px' placeholder="Quelques mots clés..." aria-label="Recherhcer">
                        <button class="btn btn-primary btn-sm" style='margin-top: 2px;' type="submit"><i class="fas fa-search"></i> Recherche</button>
                    </form>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</section>