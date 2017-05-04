@extends('layouts.app')

@section('content')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['Effort', 'Amount given'],
      ['Asistidas',  {{$user->meetings->count()}}],
      ['No Asistidas', {{ $meetings->count() - $user->meetings->count()}}]
    ]);

    var options = {
      pieHole: 0.3,
      pieSliceTextStyle: {
        color: 'black',
      }
    };

    var chart = new google.visualization.PieChart(document.getElementById('donut_single'));
    chart.draw(data, options);
  }
  $(window).resize(function(){
  drawChart();
});
</script>
<div class="container">
    <div class="row">
      <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading"><strong>Mi asistencia a Reuniones</strong></div>
                <div class="panel-body">
                    <div class="col-md-12 center-block" style="text-align:center;">
                        <div>
                            <h5><strong>Grafica de Reuniones Asistidas v/s No Asistidas</strong></h5>
                             <div id="donut_single"  class="centered center-block" style="width: 100%; mex-height: 300px;text-align:center;"></div>
                        </div>

                    </div>
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
                            <tr class="{{ $meeting->users->find($user->id) != null ? 'success':'danger' }}" >
                                <td>{{ $meeting->date }}</td>
                                <td>{{ $meeting->place }}</td>
                                <td >
                                    {{ $meeting->users->find($user->id) != null ? 'SI':'NO' }}</td>
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
