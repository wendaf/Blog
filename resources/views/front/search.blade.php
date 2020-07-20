@extends('layouts.front')

@section('content')

<style>
    .media-object {
        width: 120px !important;
        height: 110px !important;
    }
</style>

<div class="container">
    @if(isset($results))
        <p> Les résultats pour votre recherche <b> {{ $q }} </b> sont :</p>
    <h2>Listes des news trouvee</h2>
    @foreach($results as $result)
    <div class="category_article_wrapper">
            <div class="row">
                <div class="col-md-6">
                    <div class="top_article_img">
                        <a href="/article/{{$result['id']}}" target="_self"><img class="img-responsive" src="{{$result['media']}}" style="width:100%;height:155px !important;" alt="{{$result['title']}}"></a>
                    </div>
                    <div class="media-body">
                            <h3 class="media-heading">
                                <a href="/article/{{$result['id']}}" target="_self">{{$result['title']}}</a>
                            </h3> <span class="media-date"><a href="javascript:void(0);">{{$result['created_at']}}</a> By <a href="javascript:void(0);">{{$result['author']}}</a></span>

                            <div class="widget_article_social">
                                <span><a href="javascript:void(0);" target="_self"> <i class="fa fa-heart" data-id="{{$result['id']}}" style="background:transparent;color:red;margin-right:5px;font-weight:900">&nbsp;{{$result['like'] ?? 0}}</i></a></span>
                            </div>
                        </div>
                </div>
            </div>
            <div style="margin-top:2.5%;"></div>
            <div class="row"></div>
        </div>
    @endforeach
    @else
    <p>Aucun resultat veuillez réessayer</p>
    @endif
</div>

@endsection