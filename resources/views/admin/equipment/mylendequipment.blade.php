@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading"><strong>Equipos del Club que tienes ::</strong></div>
                <div class="panel-body">
                  <div class="col-md-12">
                    <table class="datatable table table-striped table-bordered " cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Equipo</th>
                                <th>Modelo</th>
                                <th>Costo</th>
                                <th>Foto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($equipments as $equipment)
                            <tr>
                                <td>{{ $user->equipments->first()->pivot->updated_at }}</td>
                                <td>{{ $equipment->name }}</td>
                                <td>{{ $equipment->brand }}</td>
                                <td>{{ $equipment->cost}}</td>
                                <td>
                                  <a href="/img/equipments/{{ $equipment->photo }}">
                                      <img src="/img/equipments/{{ $equipment->photo }}" alt="" height="40">
                                  </a>
                                </td>
                            </tr>
                            @empty
                            <span>No Tienes Equipos en tu Poder!</span>
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
