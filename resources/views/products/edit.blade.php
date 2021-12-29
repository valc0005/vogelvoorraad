@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Product {{$product->name}} wijzigen</div>

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

                            <form action="{{ route('products.update',$product->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group pb-2">
                                            <strong>Name:</strong>
                                            <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group pb-2">
                                            <strong>Detail:</strong>
                                            <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail">{{ $product->detail }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group pb-2">
                                            <strong>Productcode:</strong>
                                            <input class="form-control" name="productcode" value="{{ $product->productcode }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group pb-2">
                                            <strong>Positie:</strong>
                                            <input class="form-control" name="positie" value="{{ $product->position }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group pb-2">
                                            <strong>Voorraadtotaal:</strong>
                                            <input class="form-control" name="positie" value="{{ $product->totalstock }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group pb-2">
                                            <strong>Categorieën</strong>
                                            <div class="form-check">
                                                @foreach($categories as $category)
                                                    <input class="form-check-input" type="checkbox" name="category[]" value="{{$category->id}}" id="flexCheckDefault" {{ $product->categories()->get()->contains($category->id) ? 'checked' : null }}>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        {{ $category->name }}
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
