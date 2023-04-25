<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

       <a class="btn btn-primary" href="addnewpro">Add new</a>

    </div>
    </div>
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="margin-left:auto">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                <h2>list all product</h2>
                
                @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show">
                    <strong id="myAlert">alert!</strong> {{ session('status') }}
                    <button type="button" class="btn-close" id="myBtn" data-bs-dismiss="alert"></button>
                </div>
                @endif

                @if (session('insert-status'))
                <div class="alert alert-success alert-dismissible fade show">
                    <strong id="myAlert">alert!</strong> {{ session('insert-status') }}
                    <button type="button" class="btn-close" id="myBtn" data-bs-dismiss="alert"></button>
                </div>
                @endif

                @if (session('update-status'))
                <div class="alert alert-success alert-dismissible fade show">
                    <strong id="myAlert">alert!</strong> {{ session('update-,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,status') }}
                    <button type="button" class="btn-close" id="myBtn" data-bs-dismiss="alert"></button>
                </div>
                @endif

                <table class="table table-striped table bordered">
                    <tr>
                        <th>title</th>
                        <th>description</th>
                        <th>price</th>
                        <th>quantity</th>
                        <th>image</th>
                        <th>action</th>
                    </tr>
                   {{-- {{dd($productData)}} --}}
                @foreach($productData as $data)
                <tr>
                <td>{{ $data->product_title}}</td>
                <td>{{ $data->product_description}}</td>
                <td>{{ $data->product_price}}</td>
                <td>{{ $data->product_quantity}}</td>
                <td><img src="images/{{$data->product_image}}" width="100px" alt="images"></td>
                <td><a href="editpro/{{$data->id}}" class="btn btn-primary mr-3 ml-4">Edit</a>
                <a href="delatepro/{{$data->id}}" class="btn btn-danger btn-circle">Delate</a></td>
                </tr>
                @endforeach
            </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
