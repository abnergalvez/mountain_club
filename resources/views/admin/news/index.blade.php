<?php $seccion = 'club'; ?>
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Noticias (Web)</strong></div>
                <div class="panel-body">
                    <div class="col-md-12" style="margin-top:10px;">
                        <form class="" action="/news" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="col-md-6">
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label>Titulo</label>
                                      <input type="text" class="form-control" name="title" required>

                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group">
                                      <label>Contenido</label>
                                      <textarea type="text" class="form-control" rows="2" name="content"  required>
                                      </textarea>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-6">
                                    <div class="form-group">
                                      <label>Fecha</label>
                                        <div class="input-group input-append date datetimepicker">
                                            <input type="text" class="form-control add-on" data-format="yyyy-MM-dd" name="date" required >
                                            <span class="input-group-btn">
                                              <button class="btn btn-default add-on" type="button"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></button>
                                            </span>
                                          </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                      <label>Autor</label>
                                      <input type="text" class="form-control" name="author">
                                    </div>
                                </div>



                                <div class="col-md-6">
                                    <div class="form-group">
                                      <label>Foto</label>
                                      <input type="file" class="form-control" name="photo" >
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                      <label>Video (URL youtube)</label>
                                      <input type="text" class="form-control" name="video" >
                                    </div>
                                    <button type="submit" class="btn pull-right btn-success">Crear Noticia</button>
                                </div>
                            </div>





                        </form>
                    </div>
                    <br>
                    <br>



                    <div class="col-md-12" style="margin-top:10px;">
                        <table class="datatable table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Autor</th>
                                    <th>Titulo</th>
                                    <th>Contenido</th>
                                    <th>Foto</th>
                                    <th>Video (url)</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($news as $new)
                                <tr>
                                    <td>{{ $new->date }}</td>
                                    <td>{{ $new->author }}</td>
                                    <td>{{ $new->title }}</td>
                                    <td>{{ $new->content }}</td>
                                    <td>
                                        @if($new->photo)
                                        <a href="/img/news/{{ $new->photo }}">
                                            <img src="/img/news/{{ $new->photo }}" alt="" height="40">
                                        </a>

                                        @else
                                        <span>Sin Foto</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($new->video)
                                        <a href="{{ $new->video }}" title="Ver Video">
                                        <span class="glyphicon glyphicon-facetime-video" style="font-size:30px;"></span>
                                        </a>
                                        @else
                                        <span>Sin Video</span>
                                        @endif
                                    </td>

                                    <td>

                                        <a class="btn btn-primary btn-xs" href="/news/{{$new->id}}/edit"  title="Editar" style="float:left;margin-right:5px;">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>

                                        <form  action="/news/{{$new->id}}" method="post" onSubmit="if(!confirm('Estas seguro de eliminar la noticia!?')){return false;}" >
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
<script type="text/javascript">
  $(function() {
    $('.datetimepicker').datetimepicker({
      language: 'es-Es',
      pickTime: false
    });
  });
</script>
<script src="//tinymce.cachefly.net/4.3/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea'});</script>
@endsection
