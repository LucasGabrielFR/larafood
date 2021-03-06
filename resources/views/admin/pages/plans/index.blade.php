@php
$heads = [
    'Nome',
    'Preco',
    ['label' => 'Actions', 'no-export' => true, 'width' => 10],
];

@endphp
@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Planos <a href="{{ route('plans.create') }}" class="btn btn-success"><i class="fa fa-lg fa-fw fa-plus"></i></a></h1>
@stop



@section('content')
<div class="card">
    <div class="card-header">
        Planos
    </div>
    <div class="card-body">
        <x-adminlte-datatable id="table2" :heads="$heads" head-theme="dark"
        striped hoverable bordered compressed>
        @foreach ($plans as $plan)
            <tr>
                <td>
                    {{ $plan->name }}
                </td>
                <td>
                    R$ {{ number_format($plan->price,2,',','.') }}
                </td>
                <td>
                    <div class="row">

                        <a class="btn btn-xs btn-default text-teal mx-1 shadow align-self-center" href="{{ route('plans.show',$plan->url) }}">
                            <i class="fa fa-lg fa-fw fa-eye"></i>
                        </a>

                        <a class="btn btn-xs btn-default text-primary mx-1 shadow align-self-center" href="{{ route('plans.edit',$plan->url) }}">
                            <i class="fa fa-lg fa-fw fa-pen"></i>
                        </a>

                        <x-adminlte-button data-toggle="modal" data-target="#modalExcluir{{ $plan->id }}" theme="default" icon="fa fa-trash" class="btn btn-default text-danger mx-1 shadow"/>
                    </div>
                </td>
            </tr>
            <x-adminlte-modal id="modalExcluir{{ $plan->id }}" title="Confirmar Exclusão" size="sm" theme="danger"
            icon="fas fa-trash" v-centered static-backdrop scrollable>
                Você deseja realmente excluir <b>{{ $plan->name }}</b>?
                <x-slot name="footerSlot">
                    <form action="{{ route('plans.destroy',$plan->url) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-adminlte-button class="mr-auto" theme="danger" label="Excluir" type="submit"/>
                    </form>
                    <x-adminlte-button theme="dark" label="Cancelar" data-dismiss="modal"/>
                </x-slot>
            </x-adminlte-modal>
        @endforeach
        </x-adminlte-datatable>
    </div>

</div>

@stop
