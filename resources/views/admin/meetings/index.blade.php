@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
      <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Reuniones</strong></div>
                <div class="panel-body">
                    <form class="form" action="/meetings" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-md-3">
                            <div class="form-group">
                              <label>Fecha</label>
                              <input type="text" class="form-control" name="date" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Lugar</label>
                            <input type="text" class="form-control" name="place" required>
                          </div>
                        </div>
                        <div class="col-md-3">



                          <div class="form-group">
                              <label>Encargado</label>
                              <select class="" name="attendant">
                                <option value=""></option>
                              </select>
                              <input type="text" class="form-control" name="attendant" required>
                          </div>
                          <button type="button"  class="btn pull-right btn-defaul" name="button"> No esta en esta lista</button>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                              <label>Foto Reunion</label>
                              <input type="file" class="form-control" name="photo" required>
                          </div>
                          <button type="submit" class="btn pull-right btn-success">Crear Reunion</button>
                        </div>
                    </form>



                    <div class="col-md-12" style="margin-top:10px;">
                        <table class="datatable table table-striped table-bordered nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Lugar</th>
                                    <th>Encargado</th>
                                    <th>Foto Reunion</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($meetings as $meeting)
                                <tr>
                                    <td>{{ $meeting->date }}</td>
                                    <td>{{ $meeting->place }}</td>
                                    <td>{{ $meeting->attendant }}</td>
                                    <td><a href="/img/meetings/{{ $meeting->photo }}"> <img src="/img/meetings/{{ $meeting->photo }}" alt="" height="60"></a></td>

                                    <td>


                                        <a class="btn btn-primary btn-xs" href="/meetings/{{$meeting->id}}/edit"  title="Editar" style="float:left;margin-right:5px;">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>

                                        <form  action="/meetings/{{ $meeting->id }}" method="post" onSubmit="if(!confirm('Estas seguro de eliminar la reunion!?')){return false;}" >
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
