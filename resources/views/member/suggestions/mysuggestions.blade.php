@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Mis Propuestas/Sugerencias</strong></div>
                <div class="panel-body">
                  <div class="col-md-3">
                  <form class="form" action="{{ url('/suggestions')}}" method="post">
                      {{ csrf_field() }}
                          <input type="hidden" name="user_id" value="{{ $user->id }}">
                          <div class="form-group">
                            <label>Asunto o Tema</label>
                            <input type="text" class="form-control" name="subject" placeholder="Nombre"required>
                          </div>
                          <div class="form-group">
                            <label>Descripcion</label>
                            <textarea class="form-control" rows="5" name="description"></textarea>
                          </div>


                        <button type="submit" class="btn pull-right btn-success">Enviar Propuesta!</button>


                  </form>
                  </div>
                  <div class="col-md-9">
                    <table class="datatable table table-striped table-bordered " cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Tema</th>
                                <th>Propuestas</th>
                                <th>Respuesta</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($suggestions as $suggestion)
                            <tr>
                                <td>{{ $suggestion->created_at }}</td>
                                <td>{{ $suggestion->subject }}</td>
                                <td>{{ $suggestion->description }}</td>
                                <td>{{ $suggestion->answer == null ? 'Sin Respuesta aun' : $suggestion->answer}}</td>
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
@endsection
