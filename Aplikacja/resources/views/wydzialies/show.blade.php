@extends('crudgenerator::layouts.master')

@section('content')



<h2 class="page-header">Wydzialy</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        View Wydzialy    </div>

    <div class="panel-body">
                

        <form action="{{ url('/wydzialies') }}" method="POST" class="form-horizontal">


                
        <div class="form-group">
            <label for="id" class="col-sm-3 control-label">Id</label>
            <div class="col-sm-6">
                <input type="text" name="id" id="id" class="form-control" value="{{$model['id'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="nazwa" class="col-sm-3 control-label">Nazwa</label>
            <div class="col-sm-6">
                <input type="text" name="nazwa" id="nazwa" class="form-control" value="{{$model['nazwa'] or ''}}" readonly="readonly">
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
                <a class="btn btn-default" href="{{ url('/wydzialies') }}"><i class="glyphicon glyphicon-chevron-left"></i> Wróć</a>
            </div>
        </div>


        </form>

    </div>
</div>







@endsection