
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Responder Propuesta</strong></div>
                <div class="panel-body">
                    <form class="form" action="/suggestions/{{ $suggestion->id }}" method="post">
                        {{ csrf_field() }}
                        <div class="col-md-12">
                          <label for="">Usuario</label> : {{ $suggestion->user->name}} {{ $suggestion->user->last_name}}
                          <hr>
                          <label for="">Tema</label> :  {{ $suggestion->subject}} <br>
                          <label for="">Propuesta</label> :  {{ $suggestion->description}} <br>
                            <div class="form-group">
                              <label>Respuesta</label>
                              <textarea class="form-control" rows="3"  name="answer">{{$suggestion->answer}}</textarea>
                            </div>
                            <button type="submit" class="btn pull-right btn-success">Actualizar</button>
                        </div>
                    </form>
                </div>
          </div>
      </div>
    </div>
</div>
@endsection
