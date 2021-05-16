@extends('adminlte::page')

@section('title', 'Detalhes do Perfil')

@section('content_header')
    <h1>Detalhes do Perfil: <b>{{ $profile->name }}</b></h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <ul>
            <li>
                <strong>Nome: </strong> {{ $profile->name }}
            </li>
            <li>
                <strong>Descricão: </strong> {{ $profile->description }}
            </li>
        </ul>
    </div>
</div>
@stop
