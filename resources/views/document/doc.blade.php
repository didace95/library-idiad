@extends('layout.app')
@section('content')
    <div class="container">

        @if(session()->get('flash_message'))
            <div class="alert alert-success">{{session()->get('flash_message')}}</div>
        @endif

        @if(session()->get('del_message'))
            <div class="alert alert-success">{{session()->get('del_message')}}</div>
        @endif

        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Epreuves et corrections</div>
                    <div class="card-body">
                        
                        {{-- <a href="{{ url('/admin/devoir/create') }}" class="btn btn-success btn-sm" title="Ajout candidat">
                            <i class="fa fa-plus" aria-hidden="true"></i> Ajouter Nouveau
                        </a> --}}

                        <form method="GET" action="{{ url('/admin/devoir') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Rechercher..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <div class="search">
                            <form role="form" method="GET" action="{{ url('/admin/devoir') }}" accept-charset="UTF-8">
                                <input type="text" class="search-form" autocomplete="on" placeholder="Search">
                                <i class="fa fa-search"></i>
                            </form>
                        </div>
                        <div class="table-responsive">
                            <table class="table-striped">
                                <thead>
                                    <tr>
                                        <th>Nom Devoir</th><th>Description</th><th>Fichier Du Devoir</th><th>Fichier Correction</th><th>Fomateur</th><th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @for($i = 0; $i < 10; $i++)
                                    <tr>
                                        <td> devv {{ $i }}</td><td>Files 1</td><td><iframe src="/storage/uploads/" class="taille3"></iframe>
                                            <a href="/storage/uploads/"> telecharger</a></td>
                                            <td><iframe src="/storage/uploads/" class="taille3"></iframe>
                                            <a href="/storage/uploads/"> telecharger</a></td>
                                            <td>idiad</td>
                                        <td>
                                            <a href="{{ url('/admin/devoir/') }}" title="Details devoir"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                            <a href="{{ url('admin/devoir/' . '/edit') }}" title="Modifier devoir"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                            <a onclick="return myFunction();" href="{{ url('/admin/devoir/delete') }}" title="supprimer le devoir"><button  class="btn btn-danger btn-sm  deleted_element"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                                            
                                        </td>
                                    </tr>
                                @endfor
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection