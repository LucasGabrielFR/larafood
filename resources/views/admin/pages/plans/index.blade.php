{{-- Setup data for datatables --}}
@php
$heads = [
    'Nome',
    'Preco',
    ['label' => 'Actions', 'no-export' => true, 'width' => 5],
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
    <h1>Planos</h1>
@stop



@section('content')
<x-dg-card title="Release History" bg="primary">
    <x-adminlte-datatable id="table2" :heads="$heads" head-theme="dark"
    striped hoverable bordered compressed>
    @foreach ($plans as $plan)
        <tr>
            <td>
                {{ $plan->name }}
            </td>
            <td>
                {{ $plan->price }}
            </td>
            <td>
                <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                    <i class="fa fa-lg fa-fw fa-pen"></i>
                </button>
            </td>
        </tr>
    @endforeach
    </x-adminlte-datatable>
</x-dg-card>

@stop
    {{-- <div class="card">
        <div class="card-header">
            #filtros
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Preco</th>
                        <th style="width: 50px">Acoes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plans as $plan)
                        <tr>
                            <td>
                                {{ $plan->name }}
                            </td>
                            <td>
                                {{ $plan->price }}
                            </td>
                            <td>
                                <a href="" class="btn btn-warning">VER</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">

        </div>
    </div> --}}


{{-- @stop --}}


@section('js')
<script>
    $(()=>{
        data_table = $('#data_table').DataTable({
            ajax: {
                url: "{{route('plans.index')}}",
                type: 'GET',
                dataSrc: 'data'
            },
            columns : [
                {data: null, defaultContent : ''},
                {data: 'name'},
                {data: 'price'},
                {data: 'amount'},
            ],
            order: [],
            autoWidth: false,
        });
        data_table.on('draw.dt', function () {
            var PageInfo = $('#data_table').DataTable().page.info();
            data_table.column(0, {
                page: 'all'
            }).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1;
            });
        });
    });
</script>
@stop
