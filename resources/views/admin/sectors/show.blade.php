@extends('admin.layouts.main')

@section('title', "{$sector->name}")

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-8 col-sm-12">

                <div class="w3-card-4 mt-3">

                    <header class="w3-container w3-teal">
                        <h1>{{$sector->name}}</h1>
                    </header>

                    <div class="w3-container">
                        <p class="w3-large mt-1"><b>Descrição:</b> {{$sector->description}}</p>
                        <p class="w3-large mt-1"><b>Descrição Longa:</b> {{$sector->body}}</p>
                        <div class="row">
                            <div class="col-6">
                                @if($sector->image)
                                    <img  class="mb-3" src="{{url("storage/{$sector->image}")}}" alt="{{$sector->name}}" width="200">
                                @endif
                            </div>
                            <div class="col-3">
                                <p class="w3-large mt-1"><b>Ordem:</b> {{$sector->position}}</p>


                            </div>
                            <div class="col-3">
                                <p class="w3-large mt-1"><b>Ativo:</b> {{$sector->condition}}</p>
                                <br><br>
                                <a href="{{route('setores.edit', [$sector->id])}}" class="btn  btn-warning">Editar</a>
                                <a href="{{route('setores.index')}}" class="btn  btn-success">Voltar</a>
                            </div>
                        </div>
                    </div>
                </div>



            </div>

        </div>
    </div>
    </div>
@endsection
