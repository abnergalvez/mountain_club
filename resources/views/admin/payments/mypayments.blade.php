@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading"><strong>Mis Pagos y Cuotas</strong></div>
                <div class="panel-body">
                  <div class="col-md-12">
                    <table class="datatable table table-striped table-bordered " cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Tipo Pago</th>
                                <th>Mes</th>
                                <th>Monto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($payments as $payment)
                            <tr>
                                <td>{{ $payment->created_at }}</td>
                                <td>{{ $payment->type }}</td>
                                <td>{{ $payment->month }}</td>
                                <td>{{ $payment->amount}}</td>
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
