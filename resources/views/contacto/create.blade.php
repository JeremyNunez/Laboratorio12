@extends('layout')

@section('content')
    <div class="ui container segment nine wide column">
        <h2 class="ui header">Nuevo contacto</h2>
        <form class="ui form" action="{{ route('contacto.store') }}" method="POST">
            @csrf
            <div class="field">
                <label>Nombre</label>
                <input type="text" name="nombre" placeholder="Nombre del contacto">
            </div>
            <div class="field">
                <label>Teléfono</label>
                <input type="text" name="telefono" placeholder="Número del contacto" maxlength="9">
            </div>
            <div class="field">
                <label>Dirección</label>
                <input type="text" name="direccion" placeholder="Dirección del contacto">
            </div>
            <button class="ui button" type="submit">Crear</button>
            <div class="ui error message"></div>
        </form>
    </div>
@endsection

@section('extra-scripts')
    <script>
        $('.ui.form')
            .form({
                fields: {
                    name: {
                        identifier: 'nombre',
                        rules: [
                            {
                                type   : 'empty',
                                prompt : 'Debe ingresa el nombre del contacto.'
                            }
                        ]
                    },
                    phone: {
                        identifier: 'telefono',
                        rules: [
                            {
                                type   : 'empty',
                                prompt : 'Debe ingresar el teléfono del contacto.'
                            },
                            {
                                type   : 'integer',
                                prompt : 'No debe ingresar letras en el teléfono del contacto.'
                            },
                            {
                                type   : 'exactLength[9]',
                                prompt : 'El teléfono del contacto debe ser de 9 dígitos.'
                            }
                        ]
                    },
                    address: {
                        identifier: 'direccion',
                        rules: [
                            {
                                type   : 'empty',
                                prompt : 'Debe ingresar la dirección del contacto.'
                            }
                        ]
                    }
                }
            });
    </script>
@endsection
