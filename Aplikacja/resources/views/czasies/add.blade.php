@extends('crudgenerator::layouts.master')

@section('content')


<h2 class="page-header">Czasy</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        Dodaj/Zmodyfikuj Czasy    </div>

    <div class="panel-body">
                
        <form action="{{ url('/czasies'.( isset($model) ? "/" . $model->id : "")) }}" method="POST" class="form-horizontal">
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
                    <a class="btn btn-default" href="{{ url('/czasies') }}"><i class="glyphicon glyphicon-chevron-left"></i> Wróć</a>
                </div>
            </div>
        </form>

    </div>
</div>






@endsection