@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Mensaje de Contactos (Desde Web)</strong></div>
                <div class="panel-body">
                    <div class="col-md-12" style="margin-top:10px;">
                        <div class="col-md-12" style="margin-top:10px;">
                            <table class="datatable table table-striped table-bordered nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Asunto / Tema</th>
                                        <th>Mensaje</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($contacts as $contact)
                                    <tr>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->subject }}</td>
                                        <td>{{ $contact->message }}</td>
                                        <td>

                                            <form action="/contacts/{{ $contact->id }}" method="post" onSubmit="if(!confirm('Estas seguro de eliminar el mensaje de contacto!?')){return false;}" >
                                                <input type="hidden" name="_method" value="delete">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button class="btn btn-danger btn-xs" type="submit" title="Eliminar" style="float:left;">
                                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                                </button>
                                            </form>
                                            <a href="#" class="btn btn-warning btn-xs" style="margin-left:5px;" title="Responder">
                                                <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
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
</div>

@endsection
