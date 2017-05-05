@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Prestar / Devolver a {{$user->name}} {{$user->last_name}}</strong></div>
                <div class="panel-body">
                    <form class="" action="/lend_equipments" method="post" enctype="multipart/form-data">
                      <input type="hidden" name="user" value="{{$user->id}}">
                        {{ csrf_field() }}
                    <div class="col-md-12" style="margin-top:10px;">
                        <div class="row">
                            <div class="col-md-5">
                                <label>Equipos en Club</label>
                                <select name="from[]" id="multiselect" class="form-control" size="8" multiple="multiple">
                                    @forelse($equipments_noreg as $equipment_un)
                                    <option value="{{$equipment_un->id}}">{{  $equipment_un->name }} | {{  $equipment_un->brand }}</option>
                                    @empty
                                    <span>sin datos</span>
                                    @endforelse
                                </select>
                            </div>
                            <div class="col-md-2">
                                <br>
                                <button type="button" id="multiselect_rightAll" class="btn btn-block"><i class="glyphicon glyphicon-forward"></i></button>
                                <button type="button" id="multiselect_rightSelected" class="btn btn-block">Prestar ></i></button>
                                <button type="button" id="multiselect_leftSelected" class="btn btn-block">< Devolver</i></button>
                                <button type="button" id="multiselect_leftAll" class="btn btn-block"><i class="glyphicon glyphicon-backward"></i></button>
                            </div>

                            <div class="col-md-5">
                                <label>Prestado a {{$user->name}} {{$user->last_name}} </label>
                                <select name="to[]" id="multiselect_to" class="form-control" size="8" multiple="multiple">
                                  @forelse($equipments_reg as $equipment_reg)
                                  <option value="{{$equipment_reg->id}}">{{  $equipment_reg->name }} | {{  $equipment_reg->brand }}</option>
                                  @empty
                                  <span>sin datos</span>
                                  @endforelse
                                </select>
                            </div>
                        </div>
                         <button type="submit" class="btn pull-right btn-success">Registrar Prestamo!</button>
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
