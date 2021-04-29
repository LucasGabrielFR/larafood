@extends('adminlte::page')

@section('title', 'Editar plano')

@section('content_header')
    <h1>Editar Plano: <b>{{ $plan->name }}</b></h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('plans.update',$plan->id) }}" class="form" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Nome</label>
                <input type="text" name="name" class="form-control" placeholder="Nome" value="{{ $plan->name }}">
            </div>
            <div class="form-group">
                <label>Preco</label>
                <input type="text" name="price" class="form-control" placeholder="Preco" value="{{ $plan->price }}">
            </div>
            <div class="form-group">
                <label>Descricao</label>
                <input type="text" name="description" class="form-control" placeholder="Descricão" value="{{ $plan->description }}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-dark">Salvar</button>
            </div>
        </form>
    </div>
</div>
@stop
