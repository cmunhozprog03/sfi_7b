@extends('admin.layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
           <div class="col-md-4">
               <h1 class="display-4">Setores</h1>
           </div>
            <div class="col-md-6">
                <form class="form-inline">
                    <input class="form-control mr-sm-2 mt-4" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success mt-4" type="submit">Search</button>
                </form>
            </div>
            <div class="col-md-2">
                <a href="{{route('setores.create')}}" class="btn btn-primary mt-4">Adicionar</a>
            </div>
        </div>


        <div class="row justify-content-center">

            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th width="2%">ID</th>
                            <th width="5%">Imagem</th>
                            <th width="35%">Nome</th>
                            <th width="40%">Descrição</th>
                            <th width="2%">P</th>
                            <th width="2%">S</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($sectors as $sector)
                        <tr>
                            <td>{{$sector->id}}</td>
                            <td>
                                @if($sector->image)
                                    <img src="{{url("storage/{$sector->image}")}}" alt="{{$sector->name}}" width="100">
                                @endif
                            </td>
                            <td>{{$sector->name}}</td>
                            <td>{{$sector->description}}</td>
                            <td>{{$sector->position}}</td>
                            <td>{{$sector->condition}}</td>
                            <td>
                                <a href="">Detalhes</a>
                                <a href="">Editar</a>
                                <a href="">Excluit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
