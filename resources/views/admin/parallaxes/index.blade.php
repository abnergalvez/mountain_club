<?php $seccion = 'website'; ?>
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Imagenes Parallax (Fondos Separadores del Sitio)</strong></div>
                <div class="panel-body">
                    <div class="col-md-12" style="margin-top:10px;">
                        <form class="" action="/parallaxes" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label>Descripcion</label>
                                      <input type="text" class="form-control" name="description" required>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label>Foto</label>
                                      <input type="file" class="form-control" name="photo_" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label>Orden</label>
                                        <input type="number" class="form-control" name="order" required>
                                    </div>
                                </div>

                                <button type="submit" class="btn pull-right btn-success">Registrar !</button>

                        </form>
                    </div>
                    <br>

                    <div class="col-md-12" style="margin-top:10px;">
                        <table class="datatable table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>Descripcion</th>
                                    <th>Orden</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($parallaxes as $parallax)
                                <tr>
                                    <td>
                                        <a href="/img/parallaxes/{{ $parallax->photo }}">
                                            <img src="/img/parallaxes/{{ $parallax->photo }}" alt="" height="40">
                                        </a>
                                    </td>
                                    <td>{{ $parallax->description }}</td>
                                    <td>{{ $parallax->order }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-xs" href="/parallaxes/{{$parallax->id}}/edit"  title="Editar" style="float:left;margin-right:5px;">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>
                                        <form  action="/parallaxes/{{ $parallax->id }}" method="post" onSubmit="if(!confirm('Estas seguro de eliminar la foto!?')){return false;}" >
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
