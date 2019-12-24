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
                <h3>Ajouter un service</h3>
                <hr>
                
                <div class="row">
                    <form action="/services/add" method="post" class="offset-md-2 offset-lg-3 col-md-8 col-lg-6">
                        {{ csrf_field() }}
                        <div class="col-12">
                            <div class="form-group">
                                <label for="nom">Nom du service</label>
                                <input type="text" class="form-control" name="nom" id="nom" value="{{ old('nom') }}" />
                                <div style="width: 100%; text-align: left; color: red">
                                    <i style="font-size: 9px"> {{ $errors->first('nom') }} </i>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="acronyme">Acronyme</label>
                            <input type="text" class="form-control" name="acronyme" id="acronyme" value="{{ old('acronyme') }}" />
                                <div style="width: 100%; text-align: left; color: red">
                                    <i style="font-size: 9px"> {{ $errors->first('acronyme') }} </i>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="responsable_id">Responsable du service</label>
                                <select name="responsable_id" class="form-control" id="responsable_id">
                                    <option value="" disabled>Selectionner le responsabzle du service</option>
                                    @foreach ($profiles as $item)
                                        <option value="{{ $item->id }}">{{ $item->first_name.' '.$item->last_name }}</option>                                        
                                    @endforeach
                                </select>
                                <div style="width: 100%; text-align: left; color: red">
                                    <i style="font-size: 9px"> {{ $errors->first('responsable_id') }} </i>
                                </div>
                            </div>
                        </div>
                        <div class="col" style="margin-top: 30px; margin-bottom: 50px;">
                            <input type="submit" class="btn btn-success" value="Enregistrer" />
                            <a href="{{ route('all_services') }}" class="btn btn-danger">Annuler</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection