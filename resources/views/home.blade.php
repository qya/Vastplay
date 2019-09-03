@section('title','Statistic')
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Statistic</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <div class="row">
                    <div class="col-md-4">
                        
                 <div class="card text-white bg-primary mb-3">
  <div class="card-header">Total Hits</div>
  <div class="card-body">
    <h4 class="card-title text-center">{{$vasts->sum('counter')}}</h4>
  </div>
</div>
</div>
                    <div class="col-md-4">
                 <div class="card text-white bg-primary mb-3">
  <div class="card-header">Total Vast</div>
  <div class="card-body">
    <h4 class="card-title text-center">{{$vasts->count()}}</h4>
  </div>
</div>
                    </div>
                    <div class="col-md-4">
                 <div class="card text-white bg-primary mb-3">
  <div class="card-header">Total Media</div>
  <div class="card-body">
    <h4 class="card-title text-center">{{$drive+$direct}}</h4>
  </div>
</div>
                    </div>
                    <div class="col-md-6">
                 <div class="card text-white bg-info mb-3">
  <div class="card-header">Chart Media</div>
  <div class="card-body">
                        <canvas id="pie-chart"></canvas>
  </div>
</div>
                    </div>
                    <div class="col-md-6">
                 <div class="card text-white bg-info mb-3">
  <div class="card-header">Chart VAST</div>
  <div class="card-body">
                        <canvas id="bandwidth-pie"></canvas>
  </div>
</div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script type="text/javascript">
    new Chart(document.getElementById("pie-chart"), {
    type: 'pie',
    options: {
        tooltips: {
            enabled: false
        }
    },
    data: {
        labels: ["Drive", "Direct"],
        datasets: [{
            label: "Difference of Media",
            backgroundColor: ["#0d66d4", "#00d8d2"],
            data: [{{$drive}}, {{$direct}}]
        }]
    }
});
new Chart(document.getElementById("bandwidth-pie"), {
    type: 'pie',
    options: {
        tooltips: {
            enabled: false
        }
    },
    data: {
        labels: ["Hits", "Click"],
        datasets: [{
            label: "Click VS Hits",
            backgroundColor: ["#0d66d4", "#00d8d2"],
            data: [{{$vasts->sum('counter')}}, ]
        }]
    }
});
</script>
@endsection
