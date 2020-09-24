@extends('admin.layouts.main')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <h2 class="mt-2 mb-2">Novo Setor</h2>
        </div>
        <div class="row justify-content-center" >

            <form action="{{route('setores.store')}}" method="post" enctype="multipart/form-data">
                @include('admin.sectors._partials.form')

            </form>
        </div>
    </div>


@endsection
