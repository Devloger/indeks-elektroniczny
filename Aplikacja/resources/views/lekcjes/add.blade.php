@extends('crudgenerator::layouts.master')

@section('content')


<h2 class="page-header">Lekcje</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        Dodaj/Zmodyfikuj Lekcje    </div>

    <div class="panel-body">
                
        <form action="{{ url('/lekcjes'.( isset($model) ? "/" . $model->id : "")) }}" method="POST" class="form-horizontal">
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
                <label for="grupa" class="col-sm-3 control-label">Grupa</label>
                <div class="col-sm-2">
                    <input type="number" name="grupa" id="grupa" class="form-control" value="{{$model['grupa'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="wykladowca" class="col-sm-3 control-label">Wykladowca</label>
                <div class="col-sm-2">
                    <input type="number" name="wykladowca" id="wykladowca" class="form-control" value="{{$model['wykladowca'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="przedmiot" class="col-sm-3 control-label">Przedmiot</label>
                <div class="col-sm-2">
                    <input type="number" name="przedmiot" id="przedmiot" class="form-control" value="{{$model['przedmiot'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="ocena" class="col-sm-3 control-label">Ocena</label>
                <div class="col-sm-2">
                    <input type="number" name="ocena" id="ocena" class="form-control" value="{{$model['ocena'] or ''}}">
                </div>
            </div>
                                                                                                            <div class="form-group">
                <label for="data_oceny" class="col-sm-3 control-label">Data Oceny</label>
                <div class="col-sm-3">
                    <input type="date" name="data_oceny" id="data_oceny" class="form-control" value="{{$model['data_oceny'] or ''}}">
                </div>
            </div>
                                                                                    <div class="form-group">
                <label for="ocena_poprawkowa" class="col-sm-3 control-label">Ocena Poprawkowa</label>
                <div class="col-sm-2">
                    <input type="number" name="ocena_poprawkowa" id="ocena_poprawkowa" class="form-control" value="{{$model['ocena_poprawkowa'] or ''}}">
                </div>
            </div>
                                                                                                            <div class="form-group">
                <label for="data_oceny_poprawkowej" class="col-sm-3 control-label">Data Oceny Poprawkowej</label>
                <div class="col-sm-3">
                    <input type="date" name="data_oceny_poprawkowej" id="data_oceny_poprawkowej" class="form-control" value="{{$model['data_oceny_poprawkowej'] or ''}}">
                </div>
            </div>
                                                                                    <div class="form-group">
                <label for="czas" class="col-sm-3 control-label">Czas</label>
                <div class="col-sm-2">
                    <input type="number" name="czas" id="czas" class="form-control" value="{{$model['czas'] or ''}}">
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
                    <a class="btn btn-default" href="{{ url('/lekcjes') }}"><i class="glyphicon glyphicon-chevron-left"></i> Wróć</a>
                </div>
            </div>
        </form>

    </div>
</div>






@endsection