@extends('layouts.front')

@section('content')

<section>
    <div class="container">
        <div class="container">
            <h1>Éditer mon profil</h1>
            <hr>
            <div class="row">
                <div class="col-md-12 personal-info">
                    <form class="form-horizontal" role="form" action="{{route('update_profile')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Email:</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" value="{{auth()->user()->email}}" name="email" id="email">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label">Username:</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" value="{{auth()->user()->name}}" name="name" id="name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Password:</label>
                            <div class="col-md-8">
                                <input class="form-control" type="password" name="password" id="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Confirm password:</label>
                            <div class="col-md-8">
                                <input class="form-control" type="password" name="conf_password" id="conf_password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-primary" value="Sauvegarder les changements">
                                <span></span>
                                <input type="reset" class="btn btn-default" value="Annuler">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <hr>
    </div>
</section>

@endsection