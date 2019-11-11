@extends('layout')

@section('content')
    @if(!empty($mensaje) != null)
        <div class="six wide column">
            <div class="ui icon message">
                <i class="user times icon"></i>
                <div class="content">
                    <div class="header">
                        Lo sentimos...
                    </div>
                    <p>{{ $mensaje }}</p>
                </div>
            </div>
        </div>
    @else
        @foreach ($contactos as $contacto)
            <div class="column" style="margin-bottom: 10px">
                <div class="ui card">
                    <div class="content">
                        <div class="header">{{ $contacto->nombre }}</div>
                    </div>
                    <div class="content">
                        <h4 class="ui sub header">Información:</h4>
                        <div class="ui small feed">
                            <div class="event">
                                <div class="content">
                                    <div class="summary">
                                        Teléfono: <a>{{ $contacto->telefono }}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="event">
                                <div class="content">
                                    <div class="summary">
                                        Dirección: <a>{{ $contacto->direccion }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
@endsection
