@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
      <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Pasar Asistencia de Actividad</strong></div>
                <div class="panel-body">

                        <form class="" action="/activities_assistance" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Actividades sin registro de Asistencia <small> (Nombre | Fecha )</small></label>

                                    <select name="activity_id"  class="form-control" required>
                                        @forelse($activitiesunAssigned as $au)
                                        <option value="{{$au->id}}">{{  $au->name }}  | {{  $au->init_date }}</option>
                                        @empty
                                        <span>sin datos</span>
                                        @endforelse
                                    </select>

                                </div>
                            </div>
                        <div class="col-md-12" style="margin-top:10px;">
                            <div class="row">

                                <div class="col-md-5">
                                    <label>Todos los Socios</label>
                                    <select name="from[]" id="multiselect" class="form-control" size="8" multiple="multiple">
                                        @forelse($users as $user)
                                        <option value="{{$user->id}}">{{  $user->name }}</option>
                                        @empty
                                        <span>sin datos</span>
                                        @endforelse
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <br>
                                    <button type="button" id="multiselect_rightAll" class="btn btn-block"><i class="glyphicon glyphicon-forward"></i></button>
                                    <button type="button" id="multiselect_rightSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
                                    <button type="button" id="multiselect_leftSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
                                    <button type="button" id="multiselect_leftAll" class="btn btn-block"><i class="glyphicon glyphicon-backward"></i></button>
                                </div>

                                <div class="col-md-5">
                                    <label>Asistentes a Actividad</label>
                                    <select name="to[]" id="multiselect_to" class="form-control" size="8" multiple="multiple"></select>
                                </div>
                            </div>
                             <button type="submit" class="btn pull-right btn-success">Registrar Asistencia Actividad!</button>
                        </div>
                        </form>
                        <br>
                        <br>


                        <div class="col-md-12" style="margin-top:10px;">
                            <table class="datatable table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Fecha Actividad</th>
                                        <th>Nombre Actividad</th>
                                        <th>Lugar Actividad</th>
                                        <th>Socios que Asistieron</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($activitiesassigned as $aa)
                                    <tr>
                                        <td>{{ $aa->init_date }}</td>
                                        <td>{{ $aa->name }}</td>
                                        <td>{{ $aa->place }}</td>
                                        <td>
                                            @forelse($aa->users as $user)
                                                {{ $user->name }} {{ $user->last_name }} ,
                                            @empty
                                            @endforelse
                                        </td>
                                        <td>
                                            <a class="btn btn-primary btn-xs" href="/activities_assistance/{{$aa->id}}/edit"  title="Editar" style="float:left;margin-right:5px;">
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </a>
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
    $('#multiselect').multiselect();
</script>
@endsection
