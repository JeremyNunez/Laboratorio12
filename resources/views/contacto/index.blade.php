@extends('layout')

@section('content')
    @if($contactos == null)
        <div>No tiene contactos todavía...</div>
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
                    <div class="extra content">
                        <div class="ui icon buttons">
                            <a class="ui vertical animated button" tabindex="0" href="{{ route('contacto.edit', $contacto->id) }}">
                                <div class="hidden content">Editar</div>
                                <div class="visible content">
                                    &nbsp;&nbsp;&nbsp;&nbsp;<i class="edit icon"></i>
                                </div>
                            </a>
                            <form action="{{ route('contacto.delete', $contacto->id ) }}">
                                @csrf
                                <button class="ui vertical animated button" tabindex="0" type="submit">
                                    <div class="hidden content">Eliminar</div>
                                    <div class="visible content">
                                        &nbsp;&nbsp;&nbsp;&nbsp;<i class="ban icon"></i>
                                    </div>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
@endsection
