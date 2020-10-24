@extends('layouts.front')

@section('content')

<section id="category_section" class="category_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="widget">
                    <div class="media">
              
                        @if ( empty(preg_match('/(http|ftp|mailto)/', $myArticle['media'], $matches) ) )
                            <div class="media-left article-content" style="background-image:url('/{{$myArticle['media']}}')"> {{--<a href="javascript:void(0);">--}}</div>
                        @else
                        <div class="text-center">
                            <iframe width="560" height="315" src="{{$myArticle['media']}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        @endif

                            <div class="media-body">

                            <br>
                            <h1 class="media-heading">
                                <a href="javascript:void(0);" target="_self">{{$myArticle['title']}}</a>
                            </h1> <span class="media-date"><a href="javascript:void(0);">{{$myArticle['created_at']}}</a> By <a href="javascript:void(0);">{{$myArticle['author']}}</a></span>
                            <br>
                            <p>{{$myArticle['description']}}</p>

                            <div class="card">
                                @foreach ($myArticle->comments()->latest()->get() as $comment)
                                    <div>
                                        <strong>{{ $comment->user->name }}</strong>
                                        {{ $comment->created_at->diffForHumans() }}
                                    </div>
                                    <div class="card-body">
                                        {{ $comment->body }}
                                    </div>
                                @endforeach
                            </div>
                            @auth
                            <!-- Comment -->
                            <form action="{{ url("/article/{$myArticle['id']}/comments") }}" method="POST">
                                @csrf
                                <div class="form-group" style="margin-top: 45px">
                                    <label for="body">Poster un commentaire</label>
                                    <textarea class="form-control" id="body" name="body" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary mb-2"><i class="fas fa-paper-plane"></i> Envoyer votre commentaires</button>
                            </form>
                            @else
                            <h1>Vous devez etre connecter pour pouvoir commenter cette article</h1>
                            @endauth

                            <!-- AddToAny BEGIN -->
                            <div class="widget_article_social">
                                <span><a href="javascript:void(0);" target="_self"> <i class="fa fa-heart" data-id="{{$myArticle['id']}}" style="background:transparent;color:red;margin-right:5px;font-weight:900">&nbsp;{{$myArticle['like'] ?? 0}}</i></a></span>
                            </div>
                            <!-- AddToAny BEGIN -->
                            <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                                <a class="a2a_button_facebook"></a>
                                <a class="a2a_button_twitter"></a>
                                <a class="a2a_button_email"></a>
                            </div>
                            <script async src="https://static.addtoany.com/menu/page.js"></script>
                            <!-- AddToAny END -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection