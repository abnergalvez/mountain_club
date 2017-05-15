@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
      <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Editar Asistencia Actividad : {{  $activity->name }}  </strong></div>
                <div class="panel-body">

                        <form class="" action="/activities_assistance" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="activity_id" value="{{$activity->id}}">
                        <div class="col-md-12" style="margin-top:10px;">
                         <div class="row">

                                <div class="col-md-5">
                                    <label>Socios que no asistieron</label>
                                    <select name="from[]" id="multiselect" class="form-control" size="8" multiple="multiple">
                                        @forelse($users_noreg as $user_no)
                                        <option value="{{$user_no->id}}">{{ $user_no->name }}</option>
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
                                    <select name="to[]" id="multiselect_to" class="form-control" size="8" multiple="multiple">
                                        @forelse($users_reg as $user)
                                        <option value="{{$user->id}}">{{  $user->name }}</option>
                                        @empty
                                        <span>sin datos</span>
                                        @endforelse
                                    </select>
                                </div>
                            </div>

                             <button type="submit" class="btn pull-right btn-success">Actualizar Asistencia Actividad!</button>
                        </div>
                        </form>


                </div>
            </div>
      </div>
    </div>
</div>
<script type="text/javascript">
    $('#multiselect').multiselect();
</script>


@endsection
