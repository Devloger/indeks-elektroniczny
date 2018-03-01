@extends('crudgenerator::layouts.master')

@section('content')



<h2 class="page-header">Lesson</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        View Lesson    </div>

    <div class="panel-body">
                

        <form action="{{ url('/lessons') }}" method="POST" class="form-horizontal">


                
        <div class="form-group">
            <label for="id" class="col-sm-3 control-label">Id</label>
            <div class="col-sm-6">
                <input type="text" name="id" id="id" class="form-control" value="{{$model['id'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="group_id" class="col-sm-3 control-label">Group Id</label>
            <div class="col-sm-6">
                <input type="text" name="group_id" id="group_id" class="form-control" value="{{$model['group_id'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="user_id" class="col-sm-3 control-label">User Id</label>
            <div class="col-sm-6">
                <input type="text" name="user_id" id="user_id" class="form-control" value="{{$model['user_id'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="item_id" class="col-sm-3 control-label">Item Id</label>
            <div class="col-sm-6">
                <input type="text" name="item_id" id="item_id" class="form-control" value="{{$model['item_id'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="final_grade" class="col-sm-3 control-label">Final Grade</label>
            <div class="col-sm-6">
                <input type="text" name="final_grade" id="final_grade" class="form-control" value="{{$model['final_grade'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="final_grade_date" class="col-sm-3 control-label">Final Grade Date</label>
            <div class="col-sm-6">
                <input type="text" name="final_grade_date" id="final_grade_date" class="form-control" value="{{$model['final_grade_date'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="re_final_grade" class="col-sm-3 control-label">Re Final Grade</label>
            <div class="col-sm-6">
                <input type="text" name="re_final_grade" id="re_final_grade" class="form-control" value="{{$model['re_final_grade'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="re_final_grade_date" class="col-sm-3 control-label">Re Final Grade Date</label>
            <div class="col-sm-6">
                <input type="text" name="re_final_grade_date" id="re_final_grade_date" class="form-control" value="{{$model['re_final_grade_date'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="time_id" class="col-sm-3 control-label">Time Id</label>
            <div class="col-sm-6">
                <input type="text" name="time_id" id="time_id" class="form-control" value="{{$model['time_id'] or ''}}" readonly="readonly">
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
                <a class="btn btn-default" href="{{ url('/lessons') }}"><i class="glyphicon glyphicon-chevron-left"></i> Wróć</a>
            </div>
        </div>


        </form>

    </div>
</div>







@endsection