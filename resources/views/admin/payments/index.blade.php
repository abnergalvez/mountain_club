@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Pagos Socios</strong></div>
                <div class="panel-body">
                  <form class="form" action="/payments" method="post">
                      {{ csrf_field() }}
                      <div class="col-md-3">
                        <div class="form-group">
                            <label>Socio</label>
                            <select class="form-control" name="user_id" required>
                              @forelse($users as $user)
                              <option value="{{$user->id}}" >{{ $user->name }} {{ $user->last_name }}</option>
                              @empty
                              @endforelse

                            </select>
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Monto</label>
                          <input type="number" class="form-control" name="amount" required>
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                            <label>Tipo de Pago</label>
                            <select class="form-control" name="type" required>
                              <option value="mensual" >Mensual</option>
                              <option value="inscripcion" >Inscripcion</option>
                              <option value="abono" >Abono</option>
                            </select>
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                            <label>Mes</label>
                            <select class="form-control" name="month" required>
                              <option value="enero" >Enero</option>
                              <option value="febrero" >Febrero</option>
                              <option value="marzo" >Marzo</option>
                              <option value="abril" >Abril</option>
                              <option value="mayo" >Mayo</option>
                              <option value="junio" >Junio</option>
                              <option value="julio" >Julio</option>
                              <option value="agosto" >Agosto</option>
                              <option value="septiembre" >Septiembre</option>
                              <option value="octubre" >Octubre</option>
                              <option value="noviembre" >Noviembre</option>
                              <option value="diciembre" >Diciembre</option>
                            </select>
                        </div>
                        <button type="submit" class="btn pull-right btn-success">Registrar Pago</button>

                      </div>

                  </form>




                  <div class="col-md-12" style="margin-top:10px;">
                    <hr>
                      <table class="datatable table table-striped table-bordered nowrap" cellspacing="0" width="100%">
                          <thead>
                              <tr>
                                  <th>Fecha</th>
                                  <th>Socio</th>
                                  <th>Tipo</th>
                                  <th>Mes</th>
                                  <th>Monto</th>

                                  <th>Acciones</th>
                              </tr>
                          </thead>
                          <tbody>
                              @forelse($payments as $payment)
                              <tr>
                                  <td>{{ $payment->created_at }}</td>
                                  <td>{{ $payment->user->name }} {{ $payment->user->last_name }}</td>
                                  <td>{{ $payment->type }}</td>
                                  <td>{{ $payment->month }}</td>
                                  <td>{{ $payment->amount }}</td>
                                  <td>
                                      <form id="del_{{ $payment->id }}" action="/payments/{{ $payment->id }}" method="post" onSubmit="if(!confirm('Estas seguro de eliminar el registro de pagoS!?')){return false;}" >
                                          <input type="hidden" name="_method" value="delete">
                                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                          <button class="btn btn-danger btn-xs" type="submit" title="Eliminar" style="float:left;">
                                              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                          </button>
                                      </form>
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
