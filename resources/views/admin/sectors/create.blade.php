@extends('admin.layouts.main')

@section('content')

    <div class="container">
        <div class="row justify-content-center mt-1">
            <div class="col-md-8 col-lg-8 col-sm-12">
                <div class="w3-card-4">
                    <div class="w3-container w3-green">
                        <h2>Novo Setor</h2>

                    </div>
                    <form class="w3-container w3-light-grey" action="{{route('setores.store')}}" method="post"
                          enctype="multipart/form-data">
                        @include('admin.sectors._partials.form')
                    </form>
                </div>
            </div>
        </div>



@endsection
