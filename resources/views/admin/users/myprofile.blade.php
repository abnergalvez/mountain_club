@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
      <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Perfil del Socio</strong></div>
                <div class="panel-body">
                    <div class="col-md-3">
                        <h2>{{$user->name}} {{$user->last_name}}</h2>
                        <h4>{{$user->email}}</h4>
                        <br>
                        @if($user->photo!=null)
                        <img src="{{url('img/profile/'.$user->photo)}}" alt="" class="img-thumbnail" style="width: 200px; height: 200px;">
                        @else
                        <span class="glyphicon glyphicon-user" aria-hidden="true" style="font-size:150px;"></span>
                        @endif
                        <br>
                        <br>
                        <strong>Cargo :</strong>
                        @if($user->club_position=='president') Presidente @endif
                        @if($user->club_position=='secretary') Secretari@ @endif
                        @if($user->club_position=='treasurer') Tesorer@ @endif
                        @if($user->club_position=='director') Director Asociado @endif
                        @if($user->club_position=='only_member') Sin Cargo @endif
                        <br>
                        <br>

                        <strong>Rol en Sistema :</strong>
                        @if($user->role=='admin') Usuario Administrador @endif
                        @if($user->role=='member') Usuario Socio @endif

                    </div>
                    <div class="col-md-9">
                        <form class="" action="/users_update_profile" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input  type="hidden"  value="{{$user->id}}" name="user_id" />
                            <div class="col-md-4">

                                <div class="form-group">
                                  <label>Fecha de Nacimiento</label><br>
                                  <input  type="text"  placeholder="" value="{{$user->birthdate}}" name="birthdate" class="form-control"/>
                                </div>
                                <div class="form-group">
                                  <label>Telefono</label><br>
                                  <input  type="text"  placeholder="" value="{{$user->phone}}" name="phone" class="form-control"/>
                                </div>
                                <div class="form-group">
                                  <label>R.U.N</label><br>
                                  <input  type="text"  placeholder="" value="{{$user->dni}}" name="dni" class="form-control"/>
                                </div>
                                <div class="form-group">
                                  <label>Profesion o Carrera</label><br>
                                  <input  type="text"  placeholder="" value="{{$user->profession}}" name="profession" class="form-control"/>
                                </div>
                                <div class="form-group">
                                  <label>Tipo de Sangre</label><br>
                                  <input  type="text"  placeholder=""  value="{{$user->blood_type}}"name="blood_type" class="form-control"/>
                                </div>
                                <div class="form-group">
                                  <label>Alergias, Enfermedades & Lesiones</label><br>
                                 <textarea class="form-control" rows="3"  name="health_problems">{{$user->health_problems}}</textarea>
                                </div>

                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                  <label>Foto (Cuadrada)</label>
                                  <input  type="file" placeholder="" name="photo" class=""/>
                                </div>

                                <div class="form-group">
                                  <label>Experiencia en Montaña / Trekking</label><br>
                                  <textarea class="form-control" rows="3" name="experience">{{$user->experience}}</textarea>
                                </div>

                                <div class="form-group">
                                  <label>Cursos, Certificaciones & Capacitaciones</label><br>
                                  <textarea class="form-control" rows="3" name="training">{{$user->training}}</textarea>
                                </div>

                                <div class="form-group">
                                  <label>Equipo Propio</label><br>
                                  <textarea class="form-control" rows="3" name="own_equipment">{{$user->own_equipment}}</textarea>
                                </div>
                            </div>


                            <button type="submit" class="btn pull-right btn-success">Actualizar Datos Ficha</button>
                        </form>
                    </div>


                </div>
          </div>
      </div>
    </div>
</div>
@endsection
