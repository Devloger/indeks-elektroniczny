@extends('crudgenerator::layouts.master')

@section('content')



<h2 class="page-header">Item</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        View Item    </div>

    <div class="panel-body">
                

        <form action="{{ url('/items') }}" method="POST" class="form-horizontal">


                
        <div class="form-group">
            <label for="id" class="col-sm-3 control-label">Id</label>
            <div class="col-sm-6">
                <input type="text" name="id" id="id" class="form-control" value="{{$model['id'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="name" class="col-sm-3 control-label">Name</label>
            <div class="col-sm-6">
                <input type="text" name="name" id="name" class="form-control" value="{{$model['name'] or ''}}" readonly="readonly">
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
                <a class="btn btn-default" href="{{ url('/items') }}"><i class="glyphicon glyphicon-chevron-left"></i> Wróć</a>
            </div>
        </div>


        </form>

    </div>
</div>







@endsection