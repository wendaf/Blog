@extends('layouts.front')

@section('content')

<style>
    .media-object {
        width: 120px !important;
        height: 110px !important;
    }
</style>
<section id="category_section" class="category_section">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="category_section mobile">
                    <div class="article_title header_purple">
                        <h2 style="font-size:20px;"><a href="/" target="_self">Latest Article</a></h2>
                    </div>
                    <div class="category_article_wrapper">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="top_article_img">
                                    <a href="/article/{{$fifthArticle[0]['id']}}" target="_self"><img class="img-responsive" src="{{$fifthArticle[0]['media']}}" style="width:100%;height:155px !important;" alt="{{$fifthArticle[0]['title']}}"></a>
                                </div>
                            </div>
                        </div>
                        <div style="margin-top:2.5%;"></div>
                        <div class="row"></div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="widget">
                    <div class="widget_title widget_black">
                        <h2><a href="javascript:void(0);">Popular News</a></h2>
                    </div>
                    @php
                    function make_seed()
                    {
                    list($usec, $sec) = explode(' ', microtime());
                    return (float) $sec + ((float) $usec * 100000);
                    }
                    @endphp
                    @foreach ($popularArticle as $key => $data)
                    @php
                    mt_srand(make_seed());
                    $color = ['blue', 'red', 'green', 'purple', 'black', 'pink', 'orange'];
                    $rand = mt_rand() % (count($color));
                    @endphp
                    <div class="media">
                        <div class="media-left">
                            <a href="javascript:void(0);"><img class="media-object" src="{{str_replace('_cover', '_thumb', str_replace('cover_article', 'cover_thumb', $data['media']))}}" alt="{{$data['title']}}"></a>
                        </div>
                        <div class="media-body">
                            <span class="tag {{$color[$rand]}}">{{$data['categorie']}}</span>
                            <h3 class="media-heading">
                                <a href="/article/{{$data['id']}}" target="_self">{{$data['title']}}</a>
                            </h3> <span class="media-date"><a href="javascript:void(0);">{{$data['created_at']}}</a> By <a href="javascript:void(0);">{{$data['author']}}</a></span>

                            <div class="widget_article_social">
                                <span><a href="javascript:void(0);" target="_self"> <i class="fa fa-heart" data-id="{{$data['id']}}" style="background:transparent;color:red;margin-right:5px;font-weight:900">&nbsp;{{$data['like'] ?? 0}}</i></a></span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection