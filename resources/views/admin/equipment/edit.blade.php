@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Editar Equipo</strong></div>
                <div class="panel-body">
                    <form class="form" action="/equipments/{{$equipment->id}}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="put">
                        {{ csrf_field() }}
                        <div class="col-md-4">
                            <div class="form-group">
                              <label>Nombre (Descriptivo) *</label>
                              <input type="text" class="form-control" name="name"  value="{{$equipment->name}}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Marca *</label>
                            <input type="text" class="form-control" name="brand" value="{{$equipment->brand}}">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                              <label>Modelo *</label>
                              <input type="text" class="form-control" name="model" value="{{$equipment->model}}">
                          </div>
                        </div>
                        <div class="col-md-4">
                          @if($equipment->photo != 'sin_foto')
                            <img src="/img/equipments/{{$equipment->photo}}" alt="" height="100">
                          @else
                            <h4>Sin Foto</h4>
                          @endif
                          <div class="form-group">
                              <label>Foto</label>
                              <input type="file" class="form-control" name="photo_equipment">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                              <label>Status *</label>
                              <select class="form-control" name="status" required>
                                <option value="used" {{ $equipment->status == 'used'? 'selected="selected"':''}}>Usado (Buenas Condiciones)</option>
                                <option value="new" {{ $equipment->status == 'new'? 'selected="selected"':''}}>Nuevo</option>
                                <option value="old" {{ $equipment->status == 'old'? 'selected="selected"':''}}>Algo Deteriorado/Viejo </option>
                                <option value="bad" {{ $equipment->status == 'bad'? 'selected="selected"':''}}>Malas Condiciones</option>
                              </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                              <label>Costo</label>
                              <input type="number" class="form-control" name="cost" value="{{$equipment->cost}}">
                          </div>
                          <button type="submit" class="btn pull-right btn-success">Actualizar Equipo!</button>
                        </div>
                    </form>

                </div>
            </div>
      </div>
    </div>
</div>
@endsection
