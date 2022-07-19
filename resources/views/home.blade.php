@extends('layouts.app')
@section('top-js')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages': ['bar']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable({{ Js::from($result) }});

            var options = {
                chart: {
                    title: 'Visualisation',
                  //  subtitle: 'Click and Views',
                },
            };

            var chart = new google.charts.Bar(document.getElementById('barchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard
            </h3>

        </div>
        <div class="col-lg-12 grid-margin stretch-card">

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Liste des Filières</h4>
                    <form method="post" action="{{route('home')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-8 form-group">
                                {{--                                <label for="exampleFormControlSelect3">Small select</label>--}}
                                <select name="filiere" class="form-control form-control-sm"
                                        id="exampleFormControlSelect3">
                                    <option>Choisir un département</option>
                                    @foreach($filieres as $filiere)
                                        <option value="{{$filiere->id}}">{{$filiere->name}}</option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 form-group">
                                <button name="valider" value="valider" type="submit"
                                        class="btn btn-gradient-primary mb-2">Checker
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @if($result)
            <div id="barchart_material" style=" height: 500px;"></div>
        @endif
    </div>
@endsection
