@extends('crudgenerator::layouts.master')

@section('content')


<h2 class="page-header">Studenci</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        Dodaj/Zmodyfikuj Studenci    </div>

    <div class="panel-body">
                
        <form action="{{ url('/studencis'.( isset($model) ? "/" . $model->id : "")) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            @if (isset($model))
                <input type="hidden" name="_method" value="PATCH">
            @endif


                                    <div class="form-group">
                <label for="id" class="col-sm-3 control-label">Id</label>
                <div class="col-sm-6">
                    <input type="text" name="id" id="id" class="form-control" value="{{$model['id'] or ''}}" readonly="readonly">
                </div>
            </div>
                                                                                                            <div class="form-group">
                <label for="imie" class="col-sm-3 control-label">Imie</label>
                <div class="col-sm-6">
                    <input type="text" name="imie" id="imie" class="form-control" value="{{$model['imie'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="nazwisko" class="col-sm-3 control-label">Nazwisko</label>
                <div class="col-sm-6">
                    <input type="text" name="nazwisko" id="nazwisko" class="form-control" value="{{$model['nazwisko'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="pesel" class="col-sm-3 control-label">Pesel</label>
                <div class="col-sm-6">
                    <input type="text" name="pesel" id="pesel" class="form-control" value="{{$model['pesel'] or ''}}">
                </div>
            </div>
                                                                                                                        <div class="form-group">
                <label for="data_urodzenia" class="col-sm-3 control-label">Data Urodzenia</label>
                <div class="col-sm-3">
                    <input type="date" name="data_urodzenia" id="data_urodzenia" class="form-control" value="{{$model['data_urodzenia'] or ''}}">
                </div>
            </div>
                                                                        <div class="form-group">
                <label for="album" class="col-sm-3 control-label">Album</label>
                <div class="col-sm-6">
                    <input type="text" name="album" id="album" class="form-control" value="{{$model['album'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="wydzial" class="col-sm-3 control-label">Wydzial</label>
                <div class="col-sm-6">
                    <input type="text" name="wydzial" id="wydzial" class="form-control" value="{{$model['wydzial'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="semestr" class="col-sm-3 control-label">Semestr</label>
                <div class="col-sm-6">
                    <input type="text" name="semestr" id="semestr" class="form-control" value="{{$model['semestr'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="grupa" class="col-sm-3 control-label">Grupa</label>
                <div class="col-sm-6">
                    <input type="text" name="grupa" id="grupa" class="form-control" value="{{$model['grupa'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="kierunek" class="col-sm-3 control-label">Kierunek</label>
                <div class="col-sm-6">
                    <input type="text" name="kierunek" id="kierunek" class="form-control" value="{{$model['kierunek'] or ''}}">
                </div>
            </div>
                                                                                                                                    <div class="form-group">
                <label for="created_at" class="col-sm-3 control-label">Created At</label>
                <div class="col-sm-6">
                    <input type="text" name="created_at" id="created_at" class="form-control" value="{{$model['created_at'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="updated_at" class="col-sm-3 control-label">Updated At</label>
                <div class="col-sm-6">
                    <input type="text" name="updated_at" id="updated_at" class="form-control" value="{{$model['updated_at'] or ''}}">
                </div>
            </div>
                        
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-plus"></i> Dodaj
                    </button> 
                    <a class="btn btn-default" href="{{ url('/studencis') }}"><i class="glyphicon glyphicon-chevron-left"></i> Wróć</a>
                </div>
            </div>
        </form>

    </div>
</div>






@endsection