@extends('layouts.base')


@section('customCSS')
<link rel="stylesheet" href="{{ asset('css/material/material.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/material/dataTables.material.min.css') }}" />
<link href="{{ asset('css/bootstrap/sidebar.css') }}" rel="stylesheet">

<style>
  .mdl-grid.dt-table {
    padding-top: 0;
    padding-bottom: 0;
    width: 100%;
  }
  .mdl-button--raised.mdl-button--colored{
    background-image: initial;
    background-position-x: initial;
    background-position-y: initial;
    background-size: initial;
    background-repeat-x: initial;
    background-repeat-y: initial;
    background-attachment: initial;
    background-origin: initial;
    background-clip: initial;
    background-color: #2c7d22;
  }
  .mdl-button--raised.mdl-button--colored:hover{
    background-color: red;
  }
  #example_info{
    display: none;
  }
</style>
@endsection


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="container">
                <h2 class="panel-heading">Tous les services</h2>
                <a href="{{ route('add_service') }}" class="btn btn-success btn-md" style="margin-bottom: 30px">Ajouter un service</a>
                <div class="card pb-10 pt-10 mt-15" style="padding-top: 30px; padding: 30px 50px 60px 30px">
                    <table id="example" class="mdl-data-table" style="width:100%; margin: 20px">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Acronyme</th>
                                <th>Responsable</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $item)
                              <tr>
                                <td> {{ $item->nom }} </td>
                                <td> {{ $item->acronyme }} </td>
                                <td> {{ $item->profile->first_name.' '.$item->profile->last_name }} </td>
                                {{-- <td> {{ $item->responsable->first_name.' '.$item->responsable->last_name }} </td> --}}
                                <td> 
                                  <div class="btn-group">
                                    <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-hzaspopup="true" aria-expanded="false">
                                      Actions
                                    </button>
                                    <div class="dropdown-menu">
                                      <a href="#" class="dropdown-item">
                                        Visualiser
                                      </a>
                                      <a href="#" class="dropdown-item">
                                        Supprimer
                                      </a>
                                    </div>
                                  </div>   
                                </td>
                              </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('customJS')
<script src="{{ asset('js/custom/jquery.dataTables.min.js') }}" ></script>
<script src="{{ asset('js/custom/dataTables.material.min.js') }}" ></script>


  <script>
    $(document).ready(function() {
      $('#example').DataTable( {
          columnDefs: [
              {
                  targets: [ 0, 1, 2 ],
                  className: 'mdl-data-table__cell--non-numeric'
              }
          ]
      } );
    } );
  </script>
@endsection
