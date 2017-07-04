<?php $seccion = 'website'; ?>
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Editar Imagen Parallax</strong></div>
                <div class="panel-body">
                    <div class="col-md-12" style="margin-top:10px;">
                        <form class="" action="/parallaxes/{{ $parallax->id}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="put">
                                <div class="col-md-3">
                                    <img src="/img/parallaxes/{{ $parallax->photo }}" alt="" height="120">
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Descripcion</label>
                                      <input type="text" class="form-control" name="description" value="{{ $parallax->description}}" required>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Orden</label>
                                          <input type="number" class="form-control" name="order"  value="{{ $parallax->order}}" required>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Foto (Solo si se desea cambiar)</label>
                                      <input type="file" class="form-control" name="photo_" >
                                    </div>
                                </div>
                                <button type="submit" class="btn pull-right btn-success">Actualizar !</button>

                        </form>
                    </div>
                    <br>
                </div>
          </div>
      </div>
    </div>
</div>

@endsection
