@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading"><strong>Mi asistencia a Reuniones</strong></div>
                <div class="panel-body">
                  <div class="col-md-12">
                    <table class="datatable table table-striped table-bordered " cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Lugar</th>
                                <th>Asistencia (SI/NO)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($meetings as $meeting)
                            <tr>
                                <td>{{ $meeting->date }}</td>
                                <td>{{ $meeting->place }}</td>
                                <td>{{ $meeting->users->find($user->id) != null ? 'SI':'NO' }}</td>
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
