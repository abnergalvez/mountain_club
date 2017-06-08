@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Gestion de Equipos</strong></div>
                <div class="panel-body">
                    <form class="form" action="/equipments" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-md-3">
                            <div class="form-group">
                              <label>Nombre (Descriptivo) *</label>
                              <input type="text" class="form-control" name="name" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Marca *</label>
                            <input type="text" class="form-control" name="brand" required>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                              <label>Modelo *</label>
                              <input type="text" class="form-control" name="model" required>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                              <label>Foto</label>
                              <input type="file" class="form-control" name="photo_equipment">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                              <label>Status *</label>
                              <select class="form-control" name="status" required>
                                <option value="used">Usado (Buenas Condiciones)</option>
                                <option value="new">Nuevo</option>
                                <option value="old">Algo Deteriorado/Viejo </option>
                                <option value="bad">Malas Condiciones</option>
                              </select>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                              <label>Costo</label>
                              <input type="number" class="form-control" name="cost">
                          </div>
                          <button type="submit" class="btn pull-right btn-success">Registrar Equipo!</button>
                        </div>
                    </form>
                    <br>
                    <br>



                    <div class="col-md-12" style="margin-top:10px;">
                        <table class="datatable table table-striped table-bordered nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Estado</th>
                                    <th>Foto</th>
                                    <th>Costo</th>
                                    <th>Lo tiene?</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($equipments as $equipment)
                                <tr>
                                    <td>{{ $equipment->name }}</td>
                                    <td>{{ $equipment->brand }}</td>
                                    <td>{{ $equipment->model }}</td>
                                    <td>
                                      @if($equipment->status == 'used')  Usado (Buenas Condiciones) @endif
                                      @if($equipment->status == 'new')  Nuevo @endif
                                      @if($equipment->status == 'old') Deteriorado Viejo @endif
                                      @if($equipment->status == 'bad') Malas Condiciones @endif

                                    </td>
                                    <td>
                                        <a href="/img/equipments/{{ $equipment->photo }}">
                                            <img src="/img/equipments/{{ $equipment->photo }}" alt="" height="40">
                                        </a>
                                    </td>
                                    <td>{{ $equipment->cost }}</td>
                                    <td>
                                        @if($equipment->users->count() == 0)
                                            Club Piramide
                                        @else
                                            {{ $equipment->users->first()->name }} {{ $equipment->users->first()->last_name }}
                                        @endif

                                    </td>

                                    <td>


                                        <a class="btn btn-primary btn-xs" href="/equipments/{{$equipment->id}}/edit"  title="Editar" style="float:left;margin-right:5px;">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>

                                        <form  action="/equipments/{{ $equipment->id }}" method="post" onSubmit="if(!confirm('Estas seguro de eliminar el equipo!?')){return false;}" >
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
