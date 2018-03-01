@extends('crudgenerator::layouts.master')

@section('content')


<h2 class="page-header">Panel do zarządzania danymi: Prowadzone Zajęcia</h2>

{{--{{ dd(auth()->user()->moje->groupBy('przedmiot')) }}--}}

@forelse(auth()->user()->moje->groupBy('przedmiot') as $przedmiot)

<!--    --><?php
//            dd($przedmiot);
//            $student = \App\Student::find($przedmiot->student);
//            dd($student);
//    ?>

<div class="panel panel-default">
    <div class="panel-heading">
        Przedmiot: {{ \App\Przedmiot::find($przedmiot->first()->przedmiot)->nazwa }}
    </div>

    <div class="panel-body">
        <div class="">
            <table class="table table-striped" id="thegrid">
              <thead>
                <tr>
                                        <th>Imie</th>
                                        <th>Nazwisko</th>
                                        <th>Grupa</th>
                                        <th>Ocena</th>
                                        <th>Data Oceny Końcowej</th>
                                        <th>Ocena Poprawkowa</th>
                                        <th>Data Oceny Poprawkowej</th>
                                        <th>Zaktualizuj oceny</th>
                </tr>
                @foreach($przedmiot as $p)
                <?php
                $student = \App\Student::find($p->student);
                $grupa = \App\Grupa::find($p->grupa);
                ?>
                <tr>
                    <form action="{{ route('LU', $p) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                    <td><a href="{{ route('studencis.show', $student) }}">
                            {{ $student->imie }}
                        </a>
                    </td>
                    <td>{{ $student->nazwisko }}</td>
                    <td>{{ $grupa->nazwa }}</td>
                    <td>
                        <input name="grade1" class="form-control"  type="text" {!! $p->ocena ? 'value="'.$p->ocena.'"' : 'placeholder="BRAK"' !!}"/>
                    </td>
                    <td>
                        <input name="date1" class="form-control"  type="date" value="{{ $p->data_oceny }}"/>
                    <td>
                        <input name="grade2" class="form-control"  type="text" {!! $p->ocena_poprawkowa ? 'value="'.$p->ocena_poprawkowa.'"' : 'placeholder="BRAK"' !!}"/>
                    </td>
                    <td>
                        <input name="date2" class="form-control"  type="date" value="{{ $p->data_oceny_poprawkowej }}"/>
                    <td>
                        <input class="form-control btn btn-success" type="submit" value="Zatwierdź!">
                    </td>
                    </form>
                </tr>
                @endforeach
              </thead>
              <tbody>
              </tbody>
            </table>
        </div>
    </div>
</div>

@empty
    <h1>Nie prowadzisz obecnie żadnych zajęć!</h1>
@endforelse


@endsection



@section('scripts')
@endsection