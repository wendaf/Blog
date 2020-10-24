@extends('layouts.front')

@section('content')

<section>
    <div class="container">
        <div class="container">
            <h1>Éditer mon profil</h1>
            <hr>
            <div class="row">
                <div class="col-md-12 personal-info">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Email:</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" value="{{auth()->user()->email}}">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label">Username:</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" value="{{auth()->user()->name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Password:</label>
                            <div class="col-md-8">
                                <input class="form-control" type="password" value="11111122333">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Confirm password:</label>
                            <div class="col-md-8">
                                <input class="form-control" type="password" value="11111122333">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-8">
                                <input type="button" class="btn btn-primary" value="Sauvegarder les changements">
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