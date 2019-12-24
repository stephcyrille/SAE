@extends('layouts.base')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                  <div class="card card-small mb-4">
                    <div class="card-body p-10 pb-3">
                      <h4 class="text-center" style="padding: 10px;">Profil {{ $profile->username }} </h4> <hr>
                      <a href="{{ route('all_users') }}" class="btn btn-secondary">Retour</a>
                        <div class="row">
                          <div class="col-6 pt-20">
                            <div>
                              <div class="input-group mb-3">
                                <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                                  <label for="username">Pseudo</label>
                                </div>
                                  <input type="text" value="{{ old('username') ?? $profile->username }}" class="form-control" placeholder="Nom de profile" name="username" disabled>
                                <div style="width: 100%; text-align: left; color: red">
                                  <i style="font-size: 9px">{{ $errors->first('username') }}</i> 
                                </div>
                              </div>
                              <div class="input-group mb-3">
                                <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                                  <label for="first_name">Nom</label>
                                </div>
                                  <input type="text" value="{{ old('first_name') ?? $profile->first_name }}" class="form-control" placeholder="Nom" name="first_name" disabled> 
                                <div style="width: 100%; text-align: left; color: red">
                                  <i style="font-size: 9px" >{{ $errors->first('first_name') }}</i> 
                                </div>
                              </div>
                              <div class="input-group mb-3">
                                <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                                  <label for="last_name">Prénom</label>
                                </div>
                                  <input type="text" value="{{ old('last_name') ?? $profile->last_name }}" class="form-control" placeholder="Prénom" name="last_name" disabled>
                                <div style="width: 100%; text-align: left; color: red">
                                  <i style="font-size: 9px">{{ $errors->first('last_name') }}</i> 
                                </div>
                              </div>
                              <div class="input-group mb-3">
                                <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                                  <label for="service_id">Service</label>
                                </div>
                                <select name="service_id" class="form-control" id="service_id" disabled> 
                                  @foreach ($services as $item)
                                    <option {{ old('service_id', $profile->service_id) ==  $item->id ? 'selected' : ''  }} value="{{ $item->id }}" >{{ $item->nom }}</option>
                                  @endforeach
                                </select>
                                <div style="width: 100%; text-align: left; color: red">
                                  <i style="font-size: 9px">{{ $errors->first('service_id') }}</i> 
                                </div>
                              </div>
                            </div>
                          </div>
              
                          <div class="col-6 pt-20">
                            <div class="input-group mb-3">
                              <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                                <label for="address">Adresse</label>
                              </div>
                                <input type="text" value="{{ old('address') ?? $profile->address  }}" class="form-control" placeholder="Adresse" name="address" disabled>
                              <div style="width: 100%; text-align: left; color: red">
                                <i style="font-size: 9px">{{ $errors->first('address') }}</i> 
                              </div>
                            </div>
                            <div class="input-group mb-3">
                              <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                                <label for="phone">Téléphone</label>
                              </div>
                                <input type="text" value="{{ old('phone') ?? $profile->phone }}" class="form-control" placeholder="Téléphone" name="phone" disabled>
                              <div style="width: 100%; text-align: left; color: red">
                                <i style="font-size: 9px">{{ $errors->first('phone') }}</i> 
                              </div>
                            </div>

                            <div class="input-group mb-3">
                              <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                                <label for="roles">Roles</label>
                              </div>
                              <select name="roles" class="form-control" id="roles" disabled>
                                @foreach ($roles as $item)
                                  <option {{ old('roles', $profile->roles) ==  $item->key ? 'selected' : ''  }} value="{{ $item->key }}" >{{ $item->value }}</option>
                                @endforeach
                              </select>
                              <div style="width: 100%; text-align: left; color: red">
                                <i style="font-size: 9px">{{ $errors->first('roles') }}</i> 
                              </div>
                            </div>
              
              
                            {{-- <div class="input-group mb-3">
                              <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                                <label for="picture_path">Photo de profil</label> 
                              </div>
                              <img src="{{ $profile->picture_path }}" alt="" width="200px">
                            </div> --}}
                          </div>
                        </div>
              
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
