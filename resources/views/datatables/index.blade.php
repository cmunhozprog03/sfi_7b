@extends('admin.layouts.main')

@section('title', "Setores")

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <h1 class="display-4">Setores</h1>
            </div>
            <div class="col-md-6">
                <form class="form-inline">

                    <input action="#" class="form-control mr-sm-2 mt-4" type="search" placeholder="Pesquisar" name="filter" aria-label="Search">
                    <button class="btn btn-outline-success mt-4" type="submit">Pesquisar</button>
                </form>
            </div>
            <div class="col-md-2">
                <a href="{{route('setores.create')}}" class="btn btn-primary mt-4"><span class="material-icons"> add_circle</span></a>
            </div>
        </div>


        <div class="row justify-content-center">

            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead class="thead-dark">
                    <tr>

                        <th width="5%">Imagem</th>
                        <th width="30%">Nome</th>
                        <th width="40%">Descrição</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>

                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        {{$sectors->links()}}
    </div>

@endsection

