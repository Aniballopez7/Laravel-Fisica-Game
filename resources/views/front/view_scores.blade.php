@extends('layouts.nav_view')
@extends('layouts.dataTable')
@section('title', 'Scores')
@vite(['resources/css/score.css' , 'resources/css/bootstrap.min.css', 'resources/css/dataTables.bootstrap5.css', 'resources/css/responsive.bootstrap5.css'])
@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-dark table-borderless" id="usuarios">
                <thead>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Puntuacion</th>
                </thead>
                {{-- todo Via ajax  --}}
                {{-- <tfoot>
                    
                </tfoot> --}}
                <tbody>
                    @foreach ($scores as $score)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $score->user->nickname }}</td>
                            <td>{{ $score->user->puntuation }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="{{asset('js/jquery-3.7.1.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/dataTables.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap5.js')}}"></script>
    <script src="{{asset('js/dataTables.responsive.js')}}"></script>
    <script src="{{asset('js/responsive.bootstrap5.js')}}"></script>
    
    <script>
        {{-- todo Via ajax  --}}
        new DataTable('#usuarios' ,{
        //     ajax: '{{route('user')}}',
        //     "columns": [
        //         {data: 'nickname'},
        //         {data: 'puntuation'},
        //     ],
            responsive: true,
            autoWidth: false,
            "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "Informacion no encontrada disculpe",
            "info": "Mostrando la pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(Filtrado de _MAX_ registros totales)",
            "search": "Buscar:",
            "paginate": {
                "next": "Siguiente",
                "previous": "Anterior",

            }
        }
        })
    </script>
@endsection
