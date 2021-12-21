@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">{{ __('Alle producten') }}
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <div class="d-flex flex-row-reverse">
                            <div class="float-right pb-3">
                                <a class="btn btn-success" href="{{ route('products.create') }}">Product toevoegen</a>
                            </div>

                            </div>

                            <table class="table table-bordered">
                                <tr>
                                    <th>ID</th>
                                    <th>Productnaam</th>
                                    <th>Details</th>
                                    <th>Productcode</th>
                                    <th>Lijstpositie</th>
                                    <th>Categorie</th>
                                    <th width="280px">Actie</th>
                                </tr>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->detail }}</td>
                                        <td>{{ $product->productcode }}</td>
                                        <td>{{ $product->position }}</td>
                                        <td>{{ $product->category_id}}</td>
                                        <td>
                                            <form action="{{ route('products.destroy',$product->id) }}" method="POST">

                                                <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Details</a>

                                                <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Wijzig</a>

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger">Verwijder</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>

                            {!! $products->links() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
