@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
      <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Editar Reunion :: {{$meeting->date}} </strong></div>
                <div class="panel-body">
                    <form class="form" action="/meetings/{{$meeting->id}}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="put">
                        {{ csrf_field() }}
                        <div class="col-md-3">
                            <div class="form-group">
                              <label>Fecha</label>
                              <input type="text" class="form-control" name="date" value="{{$meeting->date}}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Lugar</label>
                            <input type="text" class="form-control" name="place"  value="{{$meeting->place}}" required>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                              <label>Encargado</label>
                              <input type="text" class="form-control" name="attendant" value="{{$meeting->attendant}}" required>
                          </div>
                        </div>
                        <div class="col-md-3">
                          @if($meeting->photo!= null)
                            <img src="/img/meetings/{{$meeting->photo}}" alt="" height="100">
                          @else
                           <h3>Sin Imagen</h3>
                          @endif
                            <br>
                            <small>foto anterior</small>
                            <br>
                          <div class="form-group">
                              <label>Foto Reunion</label>
                              <input type="file" class="form-control" name="photo" >
                          </div>
                          <button type="submit" class="btn pull-right btn-success">Actualizar!</button>
                        </div>
                    </form>


                </div>
            </div>
      </div>
    </div>
</div>
@endsection
