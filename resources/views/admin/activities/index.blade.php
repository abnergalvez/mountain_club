@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
      <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Activiades</strong></div>
                <div class="panel-body">
                    <form class="form" action="/activities" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="col-md-2">
                            <div class="form-group">
                              <label>Nombre Actividad *</label>
                              <input type="text" class="form-control" name="name" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                              <label>Coordinadores o Guias *</label>
                              <input type="text" class="form-control" name="coordinators_guides" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                              <label>Encargados de Seguridad</label>
                              <input type="text" class="form-control" name="security_managers">
                            </div>
                        </div>

                        <div class="col-md-2">
                          <div class="form-group">
                            <label>Tipo de Actividad *</label>
                            <select class="form-control" name="type" required>
                                <option value="escalada">Escalada</option>
                                <option value="ascencion">Ascención</option>
                                <option value="confraternizacion">Confraternizacion</option>
                                <option value="coordinacion">Coordinacion</option>
                                <option value="entrenamiento">Entrenamiento</option>
                                <option value="travesia">Travesia</option>
                                <option value="trekking">Trekking / Senderismo</option>
                                <option value="campamento">Campamento</option>
                                <option value="celebracion">Celebracion</option>
                                <option value="capacitacion">Capacitacion</option>
                                <option value="otro">Otro</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                              <label>Lugar *</label>
                              <input type="text" class="form-control" name="place" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                              <label>Descripcion *</label>
                             <textarea class="form-control" name="description" rows="5" cols="80" required></textarea>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                              <label>Aprendizaje Esperado</label>
                             <textarea class="form-control" name="learning" rows="5" cols="80"></textarea>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                              <label>Objetivos a Completar</label>
                             <textarea class="form-control" name="goals" rows="5" cols="80"></textarea>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                              <label>Fecha Inicial *</label>
                                <div class="input-group input-append date datetimepicker">
                                    <input type="text" class="form-control add-on" data-format="yyyy-MM-dd"  name="init_date" required >
                                    <span class="input-group-btn">
                                      <button class="btn btn-default add-on" type="button"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></button>
                                    </span>
                                  </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                              <label>Fecha Final *</label>
                                <div class="input-group input-append date datetimepicker">
                                    <input type="text" class="form-control add-on" data-format="yyyy-MM-dd"  name="finish_date" required >
                                    <span class="input-group-btn">
                                      <button class="btn btn-default add-on" type="button"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></button>
                                    </span>
                                  </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                              <label>URL Video (Youtube)</label>
                              <input type="text" class="form-control" name="video" >
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                              <label>Foto</label>
                              <input type="file" class="form-control" name="photo_activity" >
                            </div>
                            <button type="submit" class="btn pull-right btn-success">Crear Actividad</button>
                        </div>
                    </form>
                    <br>
                    <br>




                    <div class="col-md-12" style="margin-top:10px;">
                        <table class="datatable table table-striped table-bordered nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Tipo</th>
                                    <th>Lugar</th>
                                    <th>Fecha Inicial</th>
                                    <th>Fecha Final</th>
                                    <th>Coordinadores</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($activities as $activity)
                                <tr>
                                    <td>{{ $activity->name }}</td>
                                    <td>{{ $activity->type }}</td>
                                    <td>{{ $activity->place }}</td>
                                    <td>{{ $activity->init_date }}</td>
                                    <td>{{ $activity->finish_date }}</td>
                                    <td>{{ $activity->coordinators_guides }}</td>

                                    <td>
                                        <a class="btn btn-primary btn-xs" href="/activities/{{$activity->id}}/edit"  title="Editar" style="float:left;margin-right:5px;">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>

                                        <form  action="/activities/{{ $activity->id }}" method="post" onSubmit="if(!confirm('Estas seguro de eliminar la Actividad!?')){return false;}" >
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
<script type="text/javascript">
  $(function() {
    $('.datetimepicker').datetimepicker({
      language: 'es-Es',
      pickTime: false
    });
  });
</script>
@endsection
