@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Ver & Editar Informacion del Club</strong></div>
                <div class="panel-body">
                    <div class="col-md-12" style="margin-top:10px;">
                        @if($club == null)
                        <form class="" action="/info_club" method="post" enctype="multipart/form-data">
                        @else
                        <form class="" action="/info_club/{{ $club->id }}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="put">
                        @endif
                            {{ csrf_field() }}


                            <div class="col-md-3">
                                <div class="form-group">
                                  <label>R.U.T CLUB</label>
                                  <input type="text" class="form-control" name="dni_club" value="{{$club != null ? $club->dni_club : ''}}" placeholder="Ingresa Rut" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label>Fecha de Fundacion</label>
                                  <div class="input-group input-append date datetimepicker">
                                      <input type="text" class="form-control add-on" data-format="yyyy-MM-dd" name="birthdate" value="{{$club != null ? $club->birthdate : ''}}" required >
                                      <span class="input-group-btn">
                                        <button class="btn btn-default add-on" type="button"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></button>
                                      </span>
                                    </div>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                  <label>Lugar de Reuniones (Direccion)</label>
                                  <input type="text" class="form-control" name="address" value="{{ $club != null ? $club->address : ''}}" required>
                              </div>
                            </div>

                            <div class="col-md-3">
                                <img src="/img/site/{{$club != null ? $club->logo : ''}}" alt="" height="70">
                              <div class="form-group">
                                <label>Logo</label>
                                <input type="file" class="form-control" name="club_logo">
                              </div>
                            </div>



                            <div class="col-md-6" style="margin-top:5px;">
                                <div class="form-group">
                                  <label>Quienes Somos</label>
                                  <textarea class="wysi" name="who_are" rows="5" cols="80">{{$club != null ? $club->who_are : ''}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6" style="margin-top:5px;">
                                <div class="form-group">
                                  <label>Horarios de reuniones</label>
                                  <textarea class="wysi" name="schedule_meetings" rows="5" cols="80">{{$club != null ? $club->schedule_meetings : ''}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6" style="margin-top:5px;">
                                <div class="form-group">
                                  <label>Objetivos</label>
                                  <textarea class="wysi" name="objetives" rows="5" cols="80">{{$club != null ? $club->objetives : ''}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6" style="margin-top:5px;">
                                <div class="form-group">
                                  <label>Historia</label>
                                  <textarea class="wysi" name="history" rows="5" cols="80">{{$club != null ? $club->history : ''}}</textarea>
                                </div>
                            </div>

                             <button type="submit" class="btn pull-right btn-success">Actualizar!</button>
                        </form>
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
<script src="//tinymce.cachefly.net/4.3/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea'});</script>

@endsection
