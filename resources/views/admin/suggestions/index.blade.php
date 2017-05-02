@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Sugerencias Socios</strong></div>
                <div class="panel-body">
                    <div class="col-md-12" style="margin-top:10px;">
                        <table class="datatable table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Socio</th>
                                    <th>Tema</th>
                                    <th>Descripcion</th>
                                    <th>Respuesta</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($suggestions as $suggestion)
                                <tr>
                                    <td>{{ $suggestion->created_at }}</td>
                                    <td>{{ $suggestion->user->name }} {{$suggestion->user->last_name}}</td>
                                    <td>{{ $suggestion->subject }}</td>
                                    <td>{{ $suggestion->description }}</td>
                                    <td>
                                      @if($suggestion->answer!=null)
                                        {{$suggestion->answer}}
                                      @else
                                        <a href="/suggestions/{{$suggestion->id}}/answer" class="btn btn-primary btn-xs">
                                          <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Responder
                                        </a>
                                      @endif

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
@endsection
