
@extends('layout.app')

@section('title','ajouter un sujet')
@section('content')


<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4> Creation epreuve </h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ajout du sujet</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right">
            <div class="dropdown">
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{url('/')}}">retour</a>
                    <a class="dropdown-item" href="{{url('media/')}}">liste</a>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="container">
    @if (session()->get('flash_message'))
   <div class="alert alert-success">
    {{ session()->get('flash_message')}}
   </div>
   @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Ajout Media</div>
                    <div class="card-body">
                        {{-- <a href="{{ url('/') }}" title="Retour" style="float: right;"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Retour</button></a> --}}
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/documents/save') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                                <label for="title" class="control-label">{{ 'Titre du media' }}</label>
                                <input class="form-control" name="title" type="text" id="title" value="{{ isset($media->title) ? $media->title : ''}}" required>
                                {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
                                <label for="description" class="control-label">{{ 'Description' }}</label>
                                <input class="form-control" name="description" type="text" id="title" value="{{ isset($media->description) ? $media->description : ''}}" required>
                                {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('file') ? 'has-error' : ''}}">
                                <label for="file" class="control-label">{{ 'Fichier joint' }}</label>
                                <input class="form-control" name="file" type="file" id="file" value="{{ isset($media->file) ? $media->file : ''}}">
                                {!! $errors->first('file', '<p class="help-block">:message</p>') !!}
                            </div>

                           

                            <div class="row">
                            <input class="btn btn-primary col-md-2 ml-auto" type="submit" value="envoyer"  style="margin: 2%">
                            <input class="btn btn-primary col-md-2" type="reset" value="Annuler" style="margin: 2%">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
