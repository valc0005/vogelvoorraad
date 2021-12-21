@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">{{ __('Categorieën') }}
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
                                <a class="btn btn-success" href="{{ route('categories.create') }}">Product toevoegen</a>
                            </div>

                            </div>

                            <table class="table table-bordered">
                                <tr>
                                    <th>ID</th>
                                    <th>Naam</th>
                                    <th width="280px">Actie</th>
                                </tr>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            <form action="{{ route('categories.destroy',$category->id) }}" method="POST">

                                                <a class="btn btn-info" href="{{ route('categories.show',$category->id) }}">Show</a>

                                                <a class="btn btn-primary" href="{{ route('categories.edit',$category->id) }}">Edit</a>

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>

                            {!! $categories->links() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
