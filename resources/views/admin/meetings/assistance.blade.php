@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
      <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Pasar Asistencia Reunion</strong></div>
                <div class="panel-body">

                        <form class="" action="/meetings_assistance" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Reuniones sin Asistencias <small> (Fecha | Lugar | Encargado)</small></label>
                                     
                                    <select name="meeting_id"  class="form-control" required>
                                        @forelse($meetingsUnAssigned as $mu)
                                        <option value="{{$mu->id}}">{{  $mu->date }}  | {{  $mu->place }} | {{  $mu->attendant }}</option>
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
                                    <label>Asistentes a Reunion</label>
                                    <select name="to[]" id="multiselect_to" class="form-control" size="8" multiple="multiple"></select>
                                </div>
                            </div>
                             <button type="submit" class="btn pull-right btn-success">Registrar Asistencia!</button>
                        </div>
                        </form>



                        <div class="col-md-12" style="margin-top:10px;">
                            <table class="datatable table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Fecha Reunion</th>
                                        <th>Lugar Reunion</th>
                                        <th>Socios que Asistieron</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($meetingsAssigned as $ma)
                                    <tr>
                                        <td>{{ $ma->date }}</td>
                                        <td>{{ $ma->place }}</td>
                                        <td>
                                            @forelse($ma->users as $user)
                                                {{ $user->name }} {{ $user->last_name }} ,
                                            @empty
                                            @endforelse
                                        </td>
                                        <td>
                                            <a class="btn btn-primary btn-xs" href="/meetings_assistance/{{$ma->id}}/edit"  title="Editar" style="float:left;margin-right:5px;">
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
