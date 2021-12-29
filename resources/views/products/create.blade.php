@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Nieuw product aanmaken') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Oeps!</strong> Er waren wat problemen met je input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('products.store') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group pb-2">
                                            <strong>Naam:</strong>
                                            <input type="text" name="name" class="form-control" placeholder="Naam">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group pb-2">
                                            <strong>Details:</strong>
                                            <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group pb-2">
                                            <strong>Productcode:</strong>
                                            <input class="form-control" name="productcode" placeholder="Productcode">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group pb-2">
                                            <strong>Lijstpositie:</strong>
                                            <input class="form-control" name="position" placeholder="Positie">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group pb-2">
                                            <strong>Voorraadtotaal:</strong>
                                            <input class="form-control" name="totalstock" placeholder="Vooraadtotaal">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group pb-2">
                                            <strong>Categorieën:</strong>
                                            <div class="form-check">
                                                @foreach($categories as $category)
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        <input class="form-check-input" name="category[]" type="checkbox" value="{{$category->id}}" id="flexCheckDefault"> {{ $category->name }}
                                                    </label>
                                                    <br>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary">Opslaan</button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
