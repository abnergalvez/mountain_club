@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
      <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Actas de Reuniones</strong></div>
                <div class="panel-body">

                    <div class="col-md-12" style="margin-top:10px;">
                        <table class="datatable table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Fecha Reunion</th>
                                    <th>Lugar Reunion</th>
                                    <th>Acta / Acuerdos</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($meetings as $meeting)
                                <tr>
                                    <td>{{ $meeting->date }}</td>
                                    <td>{{ $meeting->place }}</td>
                                    <td>
                                        @if($meeting->record == null)
                                            Sin Registro de Acta
                                        @else
                                            {!! html_entity_decode($meeting->record) !!}
                                        @endif

                                    </td>
                                    <td>
                                        <a class="btn btn-primary btn-xs" href="/meetings_records/{{$meeting->id}}/edit"  title="Editar" style="float:left;margin-right:5px;">
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
@endsection
