@extends('layouts.front')

@section('content')

    <section id="category_section" class="category_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="widget">
                            <div class="media">
                                <div class="media-left article-content" style="background-image:url('/{{$myArticle['media']}}')">                                   {{--<a href="javascript:void(0);">--}}</div>
                                <div class="media-body">
                                    <br>
                                    <h1 class="media-heading">
                                        <a href="javascript:void(0);" target="_self">{{$myArticle['title']}}</a>
                                    </h1> <span class="media-date"><a href="javascript:void(0);">{{$myArticle['created_at']}}</a>  By <a href="javascript:void(0);">{{$myArticle['author']}}</a></span>
                                    <br>
                                    <p>{{$myArticle['description']}}</p>
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
