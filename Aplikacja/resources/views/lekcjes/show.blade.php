@extends('crudgenerator::layouts.master')

@section('content')



<h2 class="page-header">Lekcje</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        View Lekcje    </div>

    <div class="panel-body">
                

        <form action="{{ url('/lekcjes') }}" method="POST" class="form-horizontal">


                
        <div class="form-group">
            <label for="id" class="col-sm-3 control-label">Id</label>
            <div class="col-sm-6">
                <input type="text" name="id" id="id" class="form-control" value="{{$model['id'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="grupa" class="col-sm-3 control-label">Grupa</label>
            <div class="col-sm-6">
                <input type="text" name="grupa" id="grupa" class="form-control" value="{{$model['grupa'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="wykladowca" class="col-sm-3 control-label">Wykladowca</label>
            <div class="col-sm-6">
                <input type="text" name="wykladowca" id="wykladowca" class="form-control" value="{{$model['wykladowca'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="przedmiot" class="col-sm-3 control-label">Przedmiot</label>
            <div class="col-sm-6">
                <input type="text" name="przedmiot" id="przedmiot" class="form-control" value="{{$model['przedmiot'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="ocena" class="col-sm-3 control-label">Ocena</label>
            <div class="col-sm-6">
                <input type="text" name="ocena" id="ocena" class="form-control" value="{{$model['ocena'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="data_oceny" class="col-sm-3 control-label">Data Oceny</label>
            <div class="col-sm-6">
                <input type="text" name="data_oceny" id="data_oceny" class="form-control" value="{{$model['data_oceny'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="ocena_poprawkowa" class="col-sm-3 control-label">Ocena Poprawkowa</label>
            <div class="col-sm-6">
                <input type="text" name="ocena_poprawkowa" id="ocena_poprawkowa" class="form-control" value="{{$model['ocena_poprawkowa'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="data_oceny_poprawkowej" class="col-sm-3 control-label">Data Oceny Poprawkowej</label>
            <div class="col-sm-6">
                <input type="text" name="data_oceny_poprawkowej" id="data_oceny_poprawkowej" class="form-control" value="{{$model['data_oceny_poprawkowej'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="czas" class="col-sm-3 control-label">Czas</label>
            <div class="col-sm-6">
                <input type="text" name="czas" id="czas" class="form-control" value="{{$model['czas'] or ''}}" readonly="readonly">
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
                <a class="btn btn-default" href="{{ url('/lekcjes') }}"><i class="glyphicon glyphicon-chevron-left"></i> Wróć</a>
            </div>
        </div>


        </form>

    </div>
</div>







@endsection