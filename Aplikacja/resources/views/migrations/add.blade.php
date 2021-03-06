@extends('crudgenerator::layouts.master')

@section('content')


<h2 class="page-header">Migration</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        Dodaj/Zmodyfikuj Migration    </div>

    <div class="panel-body">
                
        <form action="{{ url('/migrations'.( isset($model) ? "/" . $model->id : "")) }}" method="POST" class="form-horizontal">
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
                <label for="migration" class="col-sm-3 control-label">Migration</label>
                <div class="col-sm-6">
                    <input type="text" name="migration" id="migration" class="form-control" value="{{$model['migration'] or ''}}">
                </div>
            </div>
                                                                                                            <div class="form-group">
                <label for="batch" class="col-sm-3 control-label">Batch</label>
                <div class="col-sm-2">
                    <input type="number" name="batch" id="batch" class="form-control" value="{{$model['batch'] or ''}}">
                </div>
            </div>
                                                
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-plus"></i> Dodaj
                    </button> 
                    <a class="btn btn-default" href="{{ url('/migrations') }}"><i class="glyphicon glyphicon-chevron-left"></i> Wróć</a>
                </div>
            </div>
        </form>

    </div>
</div>






@endsection