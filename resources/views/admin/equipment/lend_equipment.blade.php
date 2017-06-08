@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Prestamos de Equipos</strong></div>
                <div class="panel-body">
                    <form class="" action="/lend_equipments" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Socios</label>

                                <select name="user"  class="form-control" required>
                                    @forelse($users_unassigned as $users_un)
                                    <option value="{{$users_un->id}}">{{  $users_un->name }}  {{  $users_un->last_name }}</option>
                                    @empty
                                    <span>sin datos</span>
                                    @endforelse
                                </select>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                              <label>Fecha Devolucion *</label>
                                <div class="input-group input-append date datetimepicker">
                                    <input type="text" class="form-control add-on" data-format="yyyy-MM-dd"  name="return_date" required >
                                    <span class="input-group-btn">
                                      <button class="btn btn-default add-on" type="button"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></button>
                                    </span>
                                  </div>
                            </div>
                        </div>
                    <div class="col-md-12" style="margin-top:10px;">
                        <div class="row">
                            <div class="col-md-5">
                                <label>Todos los Equipos</label>
                                <select name="from[]" id="multiselect" class="form-control" size="8" multiple="multiple">
                                    @forelse($equipments_unassigned as $equipment_un)
                                    <option value="{{$equipment_un->id}}">{{  $equipment_un->name }} | {{  $equipment_un->brand }}</option>
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
                                <label>Prestar</label>
                                <select name="to[]" id="multiselect_to" class="form-control" size="8" multiple="multiple"></select>
                            </div>
                        </div>
                         <button type="submit" class="btn pull-right btn-success">Registrar Prestamo!</button>
                    </div>
                    </form>
                    <br>
                    <br>

                    <div class="col-md-12" style="margin-top:10px;">
                        <table class="datatable table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Socio</th>
                                    <th>Equipos Prestados</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users_assigned as $user_ass)
                                <tr>
                                    <td>{{ $user_ass->equipments->first()->pivot->updated_at }}</td>
                                    <td>{{ $user_ass->name }} {{ $user_ass->last_name }}</td>
                                    <td>
                                        @forelse($user_ass->equipments as $equipment)
                                            {{ $equipment->name }} ,
                                        @empty
                                        @endforelse
                                    </td>
                                    <td>
                                        <a class="btn btn-primary btn-xs" href="/lend_equipments/{{$user_ass->id}}/edit" data-toggle="tooltip" title="Devolver o Editar" style="float:left;margin-right:5px;">
                                          <span class="glyphicon glyphicon-backward" ></span>  <span class="glyphicon glyphicon-edit"></span>
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
$(function() {
  $('.datetimepicker').datetimepicker({
    language: 'es-Es',
    pickTime: false
  });
  $('#multiselect').multiselect();
});


</script>

@endsection
