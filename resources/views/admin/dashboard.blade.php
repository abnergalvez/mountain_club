

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="panel panel-default">
            <!--<div class="panel-heading"><strong>Estadisticas & Alertas</strong></div>-->
            <div class="panel-body">
                <h3> <i class="fa fa-pie-chart" aria-hidden="true"></i> Estadisticas</h3>
                <hr>
                <div class="statistic-group">
                    <div class="small statistic danger ">
                        <div class="value"> {{ round($meetings->sum('assistance') / $meetings->count(),1)}} %</div>
                        <div class="label">Asistencia Reuniones</div>
                     </div>

                    <div class="small statistic primary">
                        <div class="value"><i class="fa fa-home" aria-hidden="true"></i> {{$meetings->count()}}</div>
                        <div class="label">Reuniones Realizadas</div>
                     </div>

                     <div class="small statistic success">
                         <div class="value"><i class="fa fa-users" aria-hidden="true"></i> {{$users->count()}}</div>
                         <div class="label">Socios Inscritos</div>
                      </div>

                    <div class="small statistic info">
                        <div class="value"><i class="fa fa-binoculars" aria-hidden="true"></i> {{$equipments->count()}}</div>
                        <div class="label">Total Equipos</div>
                     </div>

                     <div class="small statistic warning">
                         <div class="value"> {{$equipments_lean->count()}}</div>
                         <div class="label">Equipos Prestados</div>
                      </div>


                </div>
                <h3> <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Alertas</h3>
                <hr>
                @if($equipments_late_return->count()>0)
                    <div class="alert alert-danger alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <strong>Atencion!</strong> Tienes {{$equipments_late_return->count()}} <a href="/equipments">Equipos prestados atrasados</a>.
                    </div>
                @endif
                @if($meetings->count() > 0 )
                    @if($meetings->where('assistance',null)->count() > 0)
                <div class="alert alert-warning alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong>Atencion!</strong> Tienes {{ $meetings->where('assistance',null)->count()}} Reuniones sin <a href="/meetings_assistance">Registrar Asistencia</a>.
                </div>
                    @endif
                @endif
                @if($meetings->count() > 0 )
                    @if($meetings->where('record',null)->count() > 0 )
                        <div class="alert alert-warning alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <strong>Atencion!</strong> Tienes {{$meetings->where('record',null)->count()}} Reuniones sin <a href="/meetings_records">Registrar Actas</a>.
                        </div>
                    @endif
                @endif

                @if($suggestions->where('answer',null)->count() > 0 )
                <div class="alert alert-info alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong>Atencion!</strong> Tienes {{$suggestions->where('answer',null)->count()}} <a href="/suggestions">Propuestas</a> sin responder.
                </div>
                @endif

            </div>
        </div>
      </div>

    </div>
</div>
@endsection
