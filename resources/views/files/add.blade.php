@extends('layouts.base')


@section('customCSS')
<link rel="stylesheet" href="{{ asset('css/material/material.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/material/dataTables.material.min.css') }}" />
<link href="{{ asset('css/bootstrap/sidebar.css') }}" rel="stylesheet">
@endsection


@section('content')
<div class="container-fluid">
    <div class="col-12">
        <div class="row">
            <div class="card container">
                <h3>Ajouter un fichier</h3>
                <hr>
                
                <div class="row">
                    <form action="/files/add" method="post" class="offset-md-2 offset-lg-3 col-md-8 col-lg-6" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-12">
                            <div class="form-group">
                                <label for="nom">Nom du fichier</label>
                                <input type="text" class="form-control" name="nom" id="nom" value="{{ old('nom') }}" />
                                <div style="width: 100%; text-align: left; color: red">
                                    <i style="font-size: 9px"> {{ $errors->first('nom') }} </i>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" name="description" id="description" value="{{ old('description') }}" />
                                <div style="width: 100%; text-align: left; color: red">
                                    <i style="font-size: 9px"> {{ $errors->first('description') }} </i>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="type">Type de fichier</label>
                                <select name="type" class="form-control" id="type">
                                    <option value="" disabled>Selectionner le type de fichier</option>
                                    <option value="Audio">Audio</option>
                                    <option value="Compresse">Compréssé</option>
                                    <option value="Document">Document</option>
                                    <option value="Executable">Exécutable</option>
                                    <option value="Image">Image</option>
                                    <option value="Video">Vidéo</option>
                                    
                                </select>
                                <div style="width: 100%; text-align: left; color: red">
                                    <i style="font-size: 9px"> {{ $errors->first('type') }} </i>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="piece">Selectionner un fichier</label>
                                <input type="file" class="form-control" name="piece" id="type"  />
                                <div style="width: 100%; text-align: left; color: red">
                                    <i style="font-size: 9px"> {{ $errors->first('piece') }} </i>
                                </div>
                            </div>
                        </div>
                        <div class="col" style="margin-top: 30px; margin-bottom: 50px;">
                            <input type="submit" class="btn btn-success" value="Enregistrer" />
                            <a href="{{ route('all_files') }}" class="btn btn-danger">Annuler</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection