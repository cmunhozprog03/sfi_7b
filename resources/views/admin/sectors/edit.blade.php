@extends('admin.layouts.main')

@section('title', "Editar Setor {$sector->name}")

@section('content')

    <div class="container">
        <div class="row justify-content-center mt-1">
            <div class="col-md-8 col-lg-8 col-sm-12">
                <div class="w3-card-4">
                    <div class="w3-container w3-amber">
                        <h2>Editar Setor: {{$sector->name}}</h2>

                    </div>
                    <form class="w3-container w3-light-grey" action="{{route('setores.update', $sector->id)}}" method="post"
                          enctype="multipart/form-data">
                        @method('PUT')
                        @include('admin.sectors._partials.form')
                    </form>
                </div>
            </div>
        </div>

@endsection
