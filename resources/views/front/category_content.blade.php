@extends('layouts.front')

@section('content')

<style>
    .media-object {
        width: 480px !important;
        height: 270px !important;
    }

    @media only screen and (max-width: 500px) {
        .media-body {
            display: inline !important;

        }
    }
</style>
<section id="category_section" class="category_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="widget">
                    <div class="widget_title">
                        <h2><a href="javascript:void(0);">Tous les articles pour "{{$allArticle[0]['categorie'] ?? "Undefined"}}"</a></h2>
                    </div>
                    @foreach ($allArticle as $key => $data)
                    <h2 class="media-heading" style="font-size:18px; margin-top: 25px; margin-bottom: 15px">
                        <a href="/article/{{$data['id']}}" target="_self">{{$data['title']}}</a> <span style="margin-right: 5px">/</span><a href="/article/{{$data['id']}}" class="btn-link" style="font-size: 15px;cursor:pointer;">En savoir plus<a>
                                </h1>
                                <div class="media">
                                    <div class="media-left">
                                        <a href="/article/{{$data['id']}}"><img class="media-object" src="/{{$data['media']}}" alt="{{$data['title']}}"></a>
                                    </div>
                                    <div class="media-body">
                                        <h1 class="media-heading" style="font-size:22px;">
                                            <a href="/article/{{$data['id']}}" target="_self">{{$data['title']}}</a>
                                        </h1>
                                        <br>
                                        <span class="media-date"><a href="javascript:void(0);">{{$data['created_at']}}</a> By <a href="javascript:void(0);">{{$data['author']}}</a></span>
                                        <br><br><br>
                                        <p style="word-break:break-all;font-size:14px;">
                                            {{substr($data['description'], 0, 300)}} ...<br>
                                            <a href="/article/{{$data['id']}}" class="btn-link" style="cursor:pointer;">Read more</a>
                                        </p>
                                        <div class="widget_article_social">
                                            <span><a href="javascript:void(0);" target="_self"> <i class="fa fa-heart" data-id="{{$data['id']}}" style="background:transparent;color:red;margin-right:5px;font-weight:900">&nbsp;{{$data['like'] ?? 0}}</i></a></span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <p class="widget_divider">
                                    {{$allArticle->links()}}
                                </p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection