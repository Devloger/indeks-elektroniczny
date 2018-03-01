@extends('crudgenerator::layouts.master')

@section('content')


<h2 class="page-header">Panel do zarządzania danymi: Czas</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        Moduł: Czasu
    </div>

    <div class="panel-body">
        <div class="">
            <table class="table table-striped" id="thegrid">
              <thead>
                <tr>
                                        <th>Id</th>
                                        <th>Czas</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th style="width:50px"></th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
        </div>
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
                "ajax": "{{url('czasies/grid')}}",
                "columnDefs": [
                    {
                        "render": function ( data, type, row ) {
                            return '<a href="{{ url('/czasies') }}/'+row[0]+'">'+data+'</a>';
                        },
                        "targets": 1
                    },
                    {
                        "render": function ( data, type, row ) {
                            return '<a href="{{ url('/czasies') }}/'+row[0]+'/edit" class="btn btn-default">Zaktualizuj</a>';
                        },
                        "targets": 4                    },
                ]
            });
        });
        function doDelete(id) {
            if(confirm('Naprawdę chcesz usunąć ten wpis?')) {
               $.ajax({ url: '{{ url('/czasies') }}/' + id, type: 'DELETE'}).success(function() {
                theGrid.ajax.reload();
               });
            }
            return false;
        }
    </script>
@endsection