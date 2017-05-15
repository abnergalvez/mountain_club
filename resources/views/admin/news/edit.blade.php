@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Editar Noticia :: {{$new->title}}</strong></div>
                <div class="panel-body">
                    <div class="col-md-12" style="margin-top:10px;">
                        <form class="form" action="/news/{{$new->id}}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="put">
                            {{ csrf_field() }}
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <div class="form-group">
                                      <label>Titulo</label>
                                      <input type="text" class="form-control" name="title"  value="{{$new->title}}" required>

                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                      <label>Contenido</label>
                                      <textarea type="text" class="form-control" rows="5" name="content"  required>
                                         {{$new->content}}
                                      </textarea>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-6">
                                    <div class="form-group">
                                      <label>Fecha</label>
                                        <div class="input-group input-append date datetimepicker">
                                            <input type="text" class="form-control add-on" data-format="yyyy-MM-dd" value="{{$new->date}}" name="date" required >
                                            <span class="input-group-btn">
                                              <button class="btn btn-default add-on" type="button"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></button>
                                            </span>
                                          </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                      <label>Autor</label>
                                      <input type="text" class="form-control" name="author" value="{{$new->author}}">
                                    </div>
                                </div>



                                <div class="col-md-12">

                                    <img src="/img/news/{{$new->photo}}" alt="" height="100">
                                    <br>
                                    <small>foto anterior</small>
                                    <br>
                                    <div class="form-group">
                                      <label>Foto</label>
                                      <input type="file" class="form-control" name="photo" >
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                      <label>Video (URL youtube)</label>
                                      <input type="text" class="form-control" name="video" value="{{$new->video}}" >
                                    </div>
                                    <button type="submit" class="btn pull-right btn-success">Actualizar Noticia</button>
                                </div>
                            </div>





                        </form>
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
