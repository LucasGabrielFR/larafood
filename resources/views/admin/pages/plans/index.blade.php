{{-- Setup data for datatables --}}
@php
$heads = [
    'Nome',
    'Preco',
    ['label' => 'Actions', 'no-export' => true, 'width' => 6],
];

$btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                <i class="fa fa-lg fa-fw fa-pen"></i>
            </button>';
$btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                  <i class="fa fa-lg fa-fw fa-trash"></i>
              </button>';
$btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                   <i class="fa fa-lg fa-fw fa-eye"></i>
               </button>';
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
                        <a class="btn btn-xs btn-default text-teal mx-1 shadow" href="{{ route('plans.show',$plan->url) }}">
                            <i class="fa fa-lg fa-fw fa-eye"></i>
                        </a>

                        <x-adminlte-button data-toggle="modal" data-target="#modalExcluir" theme="default" icon="fa fa-trash" class="btn btn-default text-danger mx-1 shadow"/>
                    </div>
                </td>
            </tr>
            
        @endforeach
        </x-adminlte-datatable>
    </div>

</div>

<x-adminlte-modal id="modalExcluir" title="Confirmar Exclusão" size="sm" theme="danger"
    icon="fas fa-trash" v-centered static-backdrop scrollable>
    Você deseja realmente excluir este registro?
    <x-slot name="footerSlot">
        <form action="{{ route('plans.destroy',$plan->url) }}" method="POST">
            @csrf
            @method('DELETE')
            <x-adminlte-button class="mr-auto" theme="danger" label="Excluir" type="submit"/>
        </form>
        <x-adminlte-button theme="dark" label="Cancelar" data-dismiss="modal"/>
    </x-slot>
</x-adminlte-modal>



@stop
