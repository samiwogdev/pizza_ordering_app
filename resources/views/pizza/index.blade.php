@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">Menu</div>
                    <div class="card-body">
                        <ul class="list-group">
                            <a href="{{ route('pizza.index') }}" class="list-group-item list-group-item-action">View</a>
                            <a href="{{ route('pizza.create') }}" class="list-group-item list-group-item-action">Create</a>
                            <a href="{{ route('order.index') }}" class="list-group-item list-group-item-action">user order</a>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('All Pizza') }}
                        <a href="{{ route('pizza.create') }}">
                            <button class="btn btn-success" style="float: right">Add pizza</button>
                        </a>
                    </div>
                    <div class="card-body">
                        @if (session('message'))
                        <div class="alert alert-success">
                            {{ __(session('message')) }}
                        </div>
                        @endif
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">S.price</th>
                                    <th scope="col">M.price</th>
                                    <th scope="col">L.price</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($all_pizzas) > 0)
                                    @foreach ($all_pizzas as $key => $pizza)
                                        <tr>
                                            <th scope="row">{{ __($key + 1 )}}</th>
                                            <td><img src="{{ Storage::url($pizza->image) }}" width="80"></td>
                                            <td>{{ $pizza->name }}</td>
                                            <td>{{ $pizza->description }}</td>
                                            <td>{{ $pizza->category }}</td>
                                            <td>{{ $pizza->small_pizza_price }}</td>
                                            <td>{{ $pizza->medium_pizza_price }}</td>
                                            <td>{{ $pizza->large_pizza_price }}</td>
                                            <td><a href="{{ route('pizza.edit', $pizza->id) }}"><button class="btn btn-primary">Edit</button></a></td>
                                            <td><button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                             data-bs-target="#deleteModal{{ $pizza->id }}">Delete</button>
                                            </td>
                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="deleteModal{{ $pizza->id }}" tabindex="-1"
                                                aria-labelledby="delete_modal" aria-hidden="true">
                                                <form action="{{ route('pizza.destroy', $pizza->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="delete_modal">Delete
                                                                    confirmation</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure ?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-danger">Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </tr>
                                    @endforeach
                                @else
                                    <p>No pizza to show</p>
                                @endif
                            </tbody>
                        </table>
                      {{ $all_pizzas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
