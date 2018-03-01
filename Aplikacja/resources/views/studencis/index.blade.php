@extends('crudgenerator::layouts.master')

@section('content')


<h2 class="page-header">Panel do zarządzania danymi: Studentów</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        Moduł: Studentów
    </div>

    <div class="panel-body">
        <div class="">
            <table class="table table-striped" id="thegrid">
              <thead>
                <tr>
                                        <th>Id</th>
                                        <th>Imie</th>
                                        <th>Nazwisko</th>
                                        <th>Pesel</th>
                                        <th>Data Urodzenia</th>
                                        <th>Album</th>
                                        <th>Wydzial</th>
                                        <th>Semestr</th>
                                        <th>Grupa</th>
                                        <th>Kierunek</th>
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
        <a href="{{url('studencis/create')}}" class="btn btn-primary" role="button">Dodaj: studenci</a>
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
                "ajax": "{{url('studencis/grid')}}",
                "columnDefs": [
                    {
                        "render": function ( data, type, row ) {
                            return '<a href="{{ url('/studencis') }}/'+row[0]+'">'+data+'</a>';
                        },
                        "targets": 1
                    },
                    {
                        "targets": [ 11 ],
                        "visible": false,
                        "searchable": false
                    },
                    {
                        "targets": [ 10 ],
                        "visible": false,
                        "searchable": false
                    },
                    {
                        "targets": [ 9 ],
                        "visible": false,
                        "searchable": false
                    },
                    {
                        "targets": [ 8 ],
                        "visible": false,
                        "searchable": false
                    },
                    {
                        "targets": [ 7 ],
                        "visible": false,
                        "searchable": false
                    },
                    {
                        "targets": [ 6 ],
                        "visible": false,
                        "searchable": false
                    },
                    {
                        "render": function ( data, type, row ) {
                            return '<a href="{{ url('/studencis') }}/'+row[0]+'/edit" class="btn btn-default">Zaktualizuj</a>';
                        },
                        "targets": 12                    },
                    {
                        "render": function ( data, type, row ) {
                            return '<a href="#" onclick="return doDelete('+row[0]+')" class="btn btn-danger">Usuń</a>';
                        },
                        "targets": 12+1
                    },
                ]
            });
        });
        function doDelete(id) {
            if(confirm('Naprawdę chcesz usunąć ten wpis?')) {
               $.ajax({ url: '{{ url('/studencis') }}/' + id, type: 'DELETE'}).success(function() {
                theGrid.ajax.reload();
               });
            }
            return false;
        }
    </script>
@endsection