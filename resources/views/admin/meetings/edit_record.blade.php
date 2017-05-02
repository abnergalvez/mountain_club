@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Ver y Editar Acta</strong></div>
                <div class="panel-body">
                    <div class="col-md-12" style="margin-top:10px;">
                        <form class="" action="/meetings_records" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="meeting_id" value="{{ $meeting->id }}">
                            <button type="submit" class="btn pull-right btn-success">Registrar / Editar!</button>
                            <div class="col-md-12" style="margin-top:5px;">
                                <div class="form-group">
                                  <label>Acta Reunion del {{$meeting->date}} </label>
                                  <textarea class="wysi" name="record" rows="10" cols="80">{{ $meeting != null ? $meeting->record : ''}}</textarea>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
          </div>
      </div>
    </div>
</div>

<script src="//tinymce.cachefly.net/4.3/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea'});</script>

@endsection
