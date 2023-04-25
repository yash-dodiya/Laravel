@include('layouts.adminapp')
<div class="container-xxl flex-grow-1 container-p-y">
              
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
               <div style="float: right; margin: 10px">
                <a class="btn btn-sm btn-primary" href="addnewpro">Add new</a>
            </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
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
    </div>

@include('layouts.adminappfooter')