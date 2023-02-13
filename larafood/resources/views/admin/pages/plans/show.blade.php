@extends('adminlte::page')

@section('title', "Detalhes do plano {$plan->name}")

@section('content_header')
    <h1>Detalhes do plano:  {{$plan->name}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li><strong>Nome: </strong>{{$plan->name}}</li>
                <li><strong>URL: </strong>{{$plan->url}}</li>
                <li><strong>Preço: </strong>R$ {{number_format($plan->price, 2, ',', '.')}}</li>
                <li><strong>Descrição: </strong>{{$plan->description}}</li>
            </ul>
            @include('admin.includes.alerts')
            <form action="{{route('plans.destroy', $plan->url)}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">DELETAR PLANO {{$plan->name}}</button>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Cadastrar Novo Plano'); </script>
@stop
