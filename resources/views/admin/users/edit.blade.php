@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Editar Socio</strong></div>
                <div class="panel-body">
                    <form class="form" action="/users/{{$user->id}}" method="post">
                        <input type="hidden" name="_method" value="put">
                        {{ csrf_field() }}
                        <div class="col-md-6">

                            <div class="form-group">
                              <label>Nombre</label>
                              <input type="text" class="form-control" name="name" value="{{$user->name}}" required>
                            </div>
                            <div class="form-group">
                              <label>Apellidos</label>
                              <input type="text" class="form-control" name="last_name"  value="{{$user->last_name}}" required>
                            </div>
                            <div class="form-group">
                                <label>Tipo de Usuario</label>
                                <select class="form-control" name="role" required>
                                  <option value="member" {{$user->role == 'memeber'?'selected="selected"':''}}>Socio</option>
                                  <option value="admin" {{$user->role == 'admin'?'selected="selected"':''}}>Administrador</option>
                                </select>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Cargo / Posicion</label>
                                <select class="form-control" name="club_position" required>
                                  <option value="only_member" {{$user->club_position == 'only_member'?'selected="selected"':''}} >Sin Cargo</option>
                                  <option value="president"  {{$user->club_position == 'president'?'selected="selected"':''}}>Presidente</option>
                                  <option value="secretary" {{$user->club_position == 'secretary'?'selected="selected"':''}} >Secretario</option>
                                  <option value="treasurer" {{$user->club_position == 'treasurer'?'selected="selected"':''}}>Tesorero</option>
                                  <option value="director" {{$user->club_position == 'director'?'selected="selected"':''}} >Director Asociado</option>
                                </select>
                            </div>
                            <div class="form-group">
                              <label>Email</label>
                              <input type="email" autocomplete="off" class="form-control" name="email" placeholder="Email" value="{{$user->email}}" required>
                            </div>
                            <div class="form-group">
                              <label>Password</label>
                              <input type="password" autocomplete="off" class="form-control" name="password">
                            </div>
                            <button type="submit" class="btn pull-right btn-success">Actualizar</button>
                        </div>
                    </form>
                </div>
          </div>
      </div>
    </div>
</div>
@endsection
