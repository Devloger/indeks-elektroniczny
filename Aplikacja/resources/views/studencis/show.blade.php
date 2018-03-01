@extends('crudgenerator::layouts.master')

@section('content')

{{--{{ dd(\App\Studenci::find(1)->srednia()) }}--}}
{{--{{ dd(\App\Studenci::find(1)->niema()) }}--}}


<h2 class="page-header">Studenci</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        View Studenci    </div>

    <div class="panel-body">
                

        <form action="{{ url('/studencis') }}" method="POST" class="form-horizontal">


                
        <div class="form-group">
            <label for="id" class="col-sm-3 control-label">Id</label>
            <div class="col-sm-6">
                <input type="text" name="id" id="id" class="form-control" value="{{$model['id'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="imie" class="col-sm-3 control-label">Imie</label>
            <div class="col-sm-6">
                <input type="text" name="imie" id="imie" class="form-control" value="{{$model['imie'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="nazwisko" class="col-sm-3 control-label">Nazwisko</label>
            <div class="col-sm-6">
                <input type="text" name="nazwisko" id="nazwisko" class="form-control" value="{{$model['nazwisko'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="pesel" class="col-sm-3 control-label">Pesel</label>
            <div class="col-sm-6">
                <input type="text" name="pesel" id="pesel" class="form-control" value="{{$model['pesel'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="data_urodzenia" class="col-sm-3 control-label">Data Urodzenia</label>
            <div class="col-sm-6">
                <input type="text" name="data_urodzenia" id="data_urodzenia" class="form-control" value="{{$model['data_urodzenia'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="album" class="col-sm-3 control-label">Album</label>
            <div class="col-sm-6">
                <input type="text" name="album" id="album" class="form-control" value="{{$model['album'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="wydzial" class="col-sm-3 control-label">Wydzial</label>
            <div class="col-sm-6">
                <input type="text" name="wydzial" id="wydzial" class="form-control" value="{{$model['wydzial'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="semestr" class="col-sm-3 control-label">Semestr</label>
            <div class="col-sm-6">
                <input type="text" name="semestr" id="semestr" class="form-control" value="{{$model['semestr'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="grupa" class="col-sm-3 control-label">Grupa</label>
            <div class="col-sm-6">
                <input type="text" name="grupa" id="grupa" class="form-control" value="{{$model['grupa'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="kierunek" class="col-sm-3 control-label">Kierunek</label>
            <div class="col-sm-6">
                <input type="text" name="kierunek" id="kierunek" class="form-control" value="{{$model['kierunek'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="created_at" class="col-sm-3 control-label">Created At</label>
            <div class="col-sm-6">
                <input type="text" name="created_at" id="created_at" class="form-control" value="{{$model['created_at'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="updated_at" class="col-sm-3 control-label">Updated At</label>
            <div class="col-sm-6">
                <input type="text" name="updated_at" id="updated_at" class="form-control" value="{{$model['updated_at'] or ''}}" readonly="readonly">
            </div>
        </div>
        
        
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <a class="btn btn-default" href="{{ url('/studencis') }}"><i class="glyphicon glyphicon-chevron-left"></i> Wróć</a>
            </div>
        </div>


        </form>

    </div>
</div>



@if($model->niema()->toArray())
    <div class="panel panel-default">
        <div class="panel-heading">
            Zapisz studenta na przedmiot w obecnym czasie
        </div>

        <div class="panel-body">
            <div class="">
                <form action="{{ route('zapisz', $model) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('POST') }}
                    <div class="form-group">
                        <label for="sel1">Wybierz przedmiot z listy:</label>
                        <select class="form-control" name="przedmiot">
                            @foreach($model->niema() as $id => $name)
                            <option value="{{ $id }}">
                                {{ $name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sel1">Wybierz wykładowcę z listy:</label>
                        <select class="form-control" name="wykladowca">
                            <?php $wykladowcy = \App\User::all()->pluck('id', 'nazwisko') ?>
                            @foreach($wykladowcy as $id => $name)
                            <option value="{{ $name }}">
                                {{ $id }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default">Zapisz!</button>
                </form>
            </div>
        </div>
    </div>
@endif









@if($model->oceny()->toArray())
<div class="panel panel-default">
    <div class="panel-heading">
        Oceny Studenta
    </div>

    <div class="panel-body">
        <div class="">
            <table class="table table-striped" id="thegrid">
                <thead>
                <tr>
                    <th>Przedmiot</th>
                    <th>Ocena</th>
                    <th>Data Oceny Końcowej</th>
                    <th>Ocena Poprawkowa</th>
                    <th>Data Oceny Poprawkowej</th>
                </tr>
                @foreach($model->oceny() as $lekcja)
                    <?php
                    $przedmiot = \App\Przedmiot::find($lekcja->przedmiot);
                    ?>
                    <tr>
                            <td>{{ $przedmiot->nazwa }}</td>
                            <td>{{ $lekcja->ocena ?? 'BRAK' }}</td>
                            <td>{{ $lekcja->data_oceny ?? 'BRAK' }}</td>
                            <td>{{ $lekcja->ocena_poprawkowa ?? 'BRAK' }}</td>
                            <td>{{ $lekcja->data_oceny_poprawkowej ?? 'BRAK' }}</td>
                    </tr>
                @endforeach
                </thead>
                <tbody>
                </tbody>
            </table>
            Średnia ocen: {{ $model->srednia() }}
        </div>
    </div>
</div>
<h3>Wykres Ocen:</h3>
{{--{{ dd(json_encode($model->all_przedmioty())) }}--}}
<div style="display: flex; justify-content: center;">
<canvas id="graph" width="900" height="400"></canvas>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
<script>
    var data = {
        labels: {!! json_encode($model->all_przedmioty()) !!},
//        labels: ['Programowanie', 'Java', 'Usługi Sieciowe', 'Systemy Operacyjne 2'],

        datasets: [
            {
                fillColor: "rgba(220,220,220,0.2)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: {!! json_encode($model->all_oceny()) !!}
            },
        ]
    };

    var context = document.querySelector('#graph').getContext('2d');

    new Chart(context).Bar(data);
</script>
</div>
@endif




@endsection