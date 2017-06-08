@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
      <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Socios</strong></div>
                <div class="panel-body">
                    <form class="form" action="/users" method="post" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="col-md-2">
                            <div class="form-group">
                              <label>Nombre *</label>
                              <input type="text" class="form-control" name="name" placeholder="Nombre"required>
                            </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label>Apellidos *</label>
                            <input type="text" class="form-control" name="last_name" placeholder="Apellidos"required>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                              <label>Tipo de Usuario *</label>
                              <select class="form-control" name="role" required>
                                <option value="member" >Socio</option>
                                <option value="admin" >Administrador</option>
                              </select>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                              <label>Cargo / Posicion *</label>
                              <select class="form-control" name="club_position" required>
                                <option value="only_member" >Sin Cargo</option>
                                <option value="president" >Presidente</option>
                                <option value="secretary" >Secretario</option>
                                <option value="treasurer" >Tesorero</option>
                                <option value="director" >Director Asociado</option>
                              </select>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label>Email *</label>
                            <input type="email" class="form-control" autocomplete="off" name="email" placeholder="Email"required>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label>Password *</label>
                            <input type="password" class="form-control" name="password" autocomplete="new-password" required>
                          </div>
                          <button type="submit" class="btn pull-right btn-success">Crear</button>
                        </div>

                    </form>
                    <br>
                    <br>



                    <div class="col-md-12" style="margin-top:10px;">
                        <table class="datatable table table-striped table-bordered nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Email</th>
                                    <th>Cargo en Club</th>
                                    <th>Rol</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->last_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if($user->club_position=='president') Presidente @endif
                                        @if($user->club_position=='secretary') Secretari@ @endif
                                        @if($user->club_position=='treasurer') Tesorer@ @endif
                                        @if($user->club_position=='director') Director Asociado @endif
                                        @if($user->club_position=='only_member') Sin Cargo @endif


                                    </td>
                                    <td>{{ $user->role == 'admin' ? 'Administrador' : 'Socio'}}</td>
                                    <td>
                                        <a class="btn btn-default btn-xs" href="/users/{{$user->id}}"  title="Ver Ficha" style="float:left;margin-right:5px;">
                                            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                                        </a>

                                        <a class="btn btn-primary btn-xs" href="/users/{{$user->id}}/edit"  title="Editar" style="float:left;margin-right:5px;">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>

                                        <form id="del_{{ $user->id }}" action="/users/{{ $user->id }}" method="post" onSubmit="if(!confirm('Estas seguro de eliminar al usuario!?')){return false;}" >
                                            <input type="hidden" name="_method" value="delete">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button class="btn btn-danger btn-xs" type="submit" title="Eliminar" style="float:left;">
                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <span>sin registros aun</span>
                                @endforelse
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
      </div>
    </div>
</div>
@endsection
