@extends('crudgenerator::layouts.master')

@section('content')


<h2 class="page-header">Panel do zarządzania danymi: {{ ucfirst('semesters') }}</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        Moduł: {{ ucfirst('semesters') }}
    </div>

    <div class="panel-body">
        <div class="">
            <table class="table table-striped" id="thegrid">
              <thead>
                <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Value</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th style="width:50px"></th>
                    <th style="width:50px"></th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
        </div>
        <a href="{{url('semesters/create')}}" class="btn btn-primary" role="button">Dodaj: semester</a>
    </div>
</div>




@endsection



@section('scripts')
    <script type="text/javascript">
        var theGrid = null;
        $(document).ready(function(){
            theGrid = $('#thegrid').DataTable({
                "processing": true,
                "serverSide": true,
                "ordering": true,
                "responsive": true,
                "ajax": "{{url('semesters/grid')}}",
                "columnDefs": [
                    {
                        "render": function ( data, type, row ) {
                            return '<a href="{{ url('/semesters') }}/'+row[0]+'">'+data+'</a>';
                        },
                        "targets": 1
                    },
                    {
                        "render": function ( data, type, row ) {
                            return '<a href="{{ url('/semesters') }}/'+row[0]+'/edit" class="btn btn-default">Zaktualizuj</a>';
                        },
                        "targets": 5                    },
                    {
                        "render": function ( data, type, row ) {
                            return '<a href="#" onclick="return doDelete('+row[0]+')" class="btn btn-danger">Usuń</a>';
                        },
                        "targets": 5+1
                    },
                ]
            });
        });
        function doDelete(id) {
            if(confirm('You really want to delete this record?')) {
               $.ajax({ url: '{{ url('/semesters') }}/' + id, type: 'DELETE'}).success(function() {
                theGrid.ajax.reload();
               });
            }
            return false;
        }
    </script>
@endsection