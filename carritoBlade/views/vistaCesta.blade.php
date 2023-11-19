@extends('plantillas.plantilla1')
@section('titulo')
    {{$titulo}}
@endsection
@section('encabezado')
    {{$encabezado}}
@endsection

@section('contenido')
    <div class="container mt-5">
        <div class="float-right mb-3">
            <a href="listado.php" class="btn btn-primary mr-2">Volver a la Tienda</a>
            <a href="pagar.php" class="btn btn-danger">Pagar</a>
        </div>

        @if (isset($_SESSION['cesta']))
            @php $total = 0; @endphp
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Precio (€)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($_SESSION['cesta'] as $cesta)
                        <tr>
                            <td>{{ $cesta['nombre'] }}</td>
                            <td>{{ $cesta['pvp'] }}</td>
                        </tr>
                        @php $total += $cesta['pvp']; @endphp
                    @endforeach
                </tbody>
            </table>

            <hr style='border:none; height:2px; background-color: white;'>

            <h4>Total: {{ $total }} €</h4>

        @else
            <p class='card-text'>Tu carrito está vacío.</p>
        @endif
    </div>
@endsection
