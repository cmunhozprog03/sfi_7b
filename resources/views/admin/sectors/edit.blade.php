@extends('admin.layouts.main')

@section('title', "Editar categoria {$sector->name}")

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <h2 class="mt-2 mb-2">Editar Setor: {{$sector->name}}</h2>
        </div>
        <div class="row justify-content-center" >

            <form action="{{route('setores.update', $sector->id)}}" method="post" enctype="multipart/form-data">

                @method('PUT')
                @include('admin.sectors._partials.form')

            </form>
        </div>
    </div>



@endsection
