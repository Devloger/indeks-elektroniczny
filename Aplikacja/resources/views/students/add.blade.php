@extends('crudgenerator::layouts.master')

@section('content')


<h2 class="page-header">Student</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        Dodaj/Zmodyfikuj Student    </div>

    <div class="panel-body">
                
        <form action="{{ url('/students'.( isset($model) ? "/" . $model->id : "")) }}" method="POST" class="form-horizontal">
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
                <label for="first_name" class="col-sm-3 control-label">First Name</label>
                <div class="col-sm-6">
                    <input type="text" name="first_name" id="first_name" class="form-control" value="{{$model['first_name'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="last_name" class="col-sm-3 control-label">Last Name</label>
                <div class="col-sm-6">
                    <input type="text" name="last_name" id="last_name" class="form-control" value="{{$model['last_name'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="pesel" class="col-sm-3 control-label">Pesel</label>
                <div class="col-sm-6">
                    <input type="text" name="pesel" id="pesel" class="form-control" value="{{$model['pesel'] or ''}}">
                </div>
            </div>
                                                                                                                        <div class="form-group">
                <label for="birth" class="col-sm-3 control-label">Birth</label>
                <div class="col-sm-3">
                    <input type="date" name="birth" id="birth" class="form-control" value="{{$model['birth'] or ''}}">
                </div>
            </div>
                                                                        <div class="form-group">
                <label for="register" class="col-sm-3 control-label">Register</label>
                <div class="col-sm-6">
                    <input type="text" name="register" id="register" class="form-control" value="{{$model['register'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="department_id" class="col-sm-3 control-label">Department Id</label>
                <div class="col-sm-6">
                    <input type="text" name="department_id" id="department_id" class="form-control" value="{{$model['department_id'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="semester_id" class="col-sm-3 control-label">Semester Id</label>
                <div class="col-sm-6">
                    <input type="text" name="semester_id" id="semester_id" class="form-control" value="{{$model['semester_id'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="group_id" class="col-sm-3 control-label">Group Id</label>
                <div class="col-sm-6">
                    <input type="text" name="group_id" id="group_id" class="form-control" value="{{$model['group_id'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="direction_id" class="col-sm-3 control-label">Direction Id</label>
                <div class="col-sm-6">
                    <input type="text" name="direction_id" id="direction_id" class="form-control" value="{{$model['direction_id'] or ''}}">
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
                        <i class="fa fa-plus"></i> Save
                    </button> 
                    <a class="btn btn-default" href="{{ url('/students') }}"><i class="glyphicon glyphicon-chevron-left"></i> Cofnij</a>
                </div>
            </div>
        </form>

    </div>
</div>






@endsection