@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading"><strong>Historial de Prestamos de Equipos</strong></div>
                <div class="panel-body">
                  <div class="col-md-12">
                    <table class="datatable table table-striped table-bordered " cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Pedido / Devolucion</th>
                                <th>Socio</th>

                                <th> Equipo </th>
                                <th>Foto</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse($lend_equipments as $lend)
                            <tr>
                                <td>{{ $lend->updated_at }}</td>
                                <td>{{ $lend->case == 'loan'? 'Prestamo': 'Devolucion' }}</td>
                                <td>{{ $lend->user->name}} {{ $lend->user->last_name}}</td>
                                <td>{{ $lend->equipment->name}}</td>
                                <td>
                                  <a href="/img/equipments/{{ $lend->equipment->photo }}">
                                      <img src="/img/equipments/{{ $lend->equipment->photo }}" alt="" height="40">
                                  </a>
                                </td>
                            </tr>
                            @empty
                            <span>No hay historicos!</span>
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
