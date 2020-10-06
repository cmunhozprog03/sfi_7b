@extends('admin.layouts.main')

@section('title', "Categorias")

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <h1 class="display-4">Categorias</h1>
            </div>
            <div class="col-md-6">
                <form class="form-inline">
                    <input action="#" class="form-control mr-sm-2 mt-4" type="search" placeholder="Search" name="filter" aria-label="Search">
                    <button class="btn btn-outline-success mt-4" type="submit">Pesquisar</button>
                </form>
            </div>
            <div class="col-md-2">
                <a href="{{route('categorias.create')}}" class="btn btn-primary mt-4"><span class="material-icons"> add_circle</span></a>
            </div>
        </div>


        <div class="row justify-content-center">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead class="thead-dark">
                    <tr>
                        <th width="5%">Imagem</th>
                        <th width="20%">Nome</th>
                        <th width="35%">Descrição</th>d
                        <th width="15%">Setor</th>
                        <th width="2%">P</th>
                        <th width="2%">S</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>

                            <td>
                                @if($category->image)
                                    <img src="{{url("storage/{$category->image}")}}" alt="{{$category->name}}" width="80">
                                @endif
                            </td>
                            <td class="w3-large">{{$category->name}}</td>
                            <td class="w3-large">{{$category->description}}</td>
                            <td class="w3-large">{{$category->sector->name}}</td>
                            <td class="w3-large">{{$category->position}}</td>
                            <td class="w3-large">{{$category->condition}}</td>
                            <td>
                                <div class="btn-group">
                                    <form action="">
                                        <a href="{{route('categorias.show', [$category->id])}}" class="btn  btn-info"><span class="material-icons">visibility</span></a>
                                    </form>
                                    <form action="">
                                        <a href="{{route('categorias.edit', [$category->id])}}" class="btn  btn-warning"><span class="material-icons">create</span></a>
                                    </form>
                                    <form action="{{route('categorias.destroy', [$category->id])}}" method="post">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn  btn-danger"><span class="material-icons">delete_forever</span></button>
                                    </form>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{$categories->links()}}
    </div>

@endsection
