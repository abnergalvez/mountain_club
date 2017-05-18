@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
      <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Editar Actividad {{ $activity->name}}</strong></div>
                <div class="panel-body">
                    <form class="form" action="/activities/{{$activity->id}}" method="post" enctype="multipart/form-data">
                      <input type="hidden" name="_method" value="put">
                      {{ csrf_field() }}
                        {{ csrf_field() }}

                        <div class="col-md-2">
                            <div class="form-group">
                              <label>Nombre Actividad *</label>
                              <input type="text" class="form-control" name="name" value="{{$activity->name}}" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                              <label>Coordinadores o Guias *</label>
                              <input type="text" class="form-control" name="coordinators_guides" value="{{$activity->coordinators_guides}}" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                              <label>Encargados de Seguridad</label>
                              <input type="text" class="form-control" name="security_managers" value="{{$activity->security_managers}}">
                            </div>
                        </div>

                        <div class="col-md-2">
                          <div class="form-group">
                            <label>Tipo de Actividad *</label>
                            <select class="form-control" name="type" required>
                                <option value="escalada" {{$activity->type == 'escalada'?'selected':''}}>Escalada</option>
                                <option value="ascencion" {{$activity->type == 'ascencion'?'selected':''}}>Ascención</option>
                                <option value="confraternizacion" {{$activity->type == 'confraternizacion'?'selected':''}}>Confraternizacion</option>
                                <option value="coordinacion" {{$activity->type == 'coordinacion'?'selected':''}}>Coordinacion</option>
                                <option value="entrenamiento" {{$activity->type == 'entrenamiento'?'selected':''}}>Entrenamiento</option>
                                <option value="travesia" {{$activity->type == 'travesia'?'selected':''}}>Travesia</option>
                                <option value="trekking" {{$activity->type == 'trekking'?'selected':''}}>Trekking / Senderismo</option>
                                <option value="campamento" {{$activity->type == 'campamento'?'selected':''}}>Campamento</option>
                                <option value="celebracion" {{$activity->type == 'celebracion'?'selected':''}}>Celebracion</option>
                                <option value="capacitacion" {{$activity->type == 'capacitacion'?'selected':''}}>Capacitacion</option>
                                <option value="otro" {{$activity->type == 'otro'?'selected':''}}>Otro</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                              <label>Lugar *</label>
                              <input type="text" class="form-control" name="place"  value="{{$activity->place}}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                              <label>Descripcion *</label>
                             <textarea class="form-control" name="description" rows="5" cols="80" required>
                               {{$activity->description}}
                             </textarea>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                              <label>Aprendizaje Esperado</label>
                             <textarea class="form-control" name="learning" rows="5" cols="80">
                               {{$activity->learning}}
                             </textarea>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                              <label>Objetivos a Completar</label>
                             <textarea class="form-control" name="goals" rows="5" cols="80">
                               {{$activity->goals}}
                             </textarea>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                              <label>Fecha Inicial *</label>
                                <div class="input-group input-append date datetimepicker">
                                    <input type="text" class="form-control add-on" data-format="yyyy-MM-dd"  name="init_date" value="{{$activity->init_date}}" required >
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
                                    <input type="text" class="form-control add-on" data-format="yyyy-MM-dd"  name="finish_date" value="{{$activity->finish_date}}" required >
                                    <span class="input-group-btn">
                                      <button class="btn btn-default add-on" type="button"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></button>
                                    </span>
                                  </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                              <label>URL Video (Youtube)</label>
                              <input type="text" class="form-control" name="video"  value="{{$activity->video}}">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                              @if($activity->photo != '-')
                              <img src="/img/activities/{{$activity->photo}}" alt=" " height="50">
                              @else
                               <h4>Sin Foto</h4>
                              @endif
                              <br><small>foto anterior</small><br>
                              <label>Foto</label>
                              <input type="file" class="form-control" name="photo_activity" >
                            </div>
                            <button type="submit" class="btn pull-right btn-success">Actualizar Actividad</button>
                        </div>
                    </form>
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
