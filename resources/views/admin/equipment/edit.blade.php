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
                        <div class="col-md-3">
                            <div class="form-group">
                              <label>Nombre (Descriptivo)</label>
                              <input type="text" class="form-control" name="name"  value="{{$equipment->name}}" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label>Marca</label>
                            <input type="text" class="form-control" name="brand" value="{{$equipment->brand}}">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                              <label>Modelo</label>
                              <input type="text" class="form-control" name="model" value="{{$equipment->model}}">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                              <label>Foto</label>
                              <input type="file" class="form-control" name="photo_equipment">
                          </div>
                        </div>
                        <div class="col-md-2">
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
