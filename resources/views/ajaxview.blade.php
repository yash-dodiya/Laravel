@include('layouts.adminapp')
<div class="container-xxl flex-grow-1 container-p-y">

<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
Ajax Data
</h2>

<div class="py-12">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
<div class="p-6 text-gray-900 dark:text-gray-100">
    
    <form  name="myform" id="myform" onsubmit="event.preventDefault() savepro();" method="post">
        <div class="row" style="padding: 10px">
        
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-6 mt-2">
                        <input class="form-control" placeholder="Enter product_title" value="{{$productById->product_title ??""}}" type="text" name="product_title" id="product_title">
                    </div>
                    <div class="col-6 mt-2">
                        <textarea placeholder="Enter product_description" name="product_description" class="form-control" id="product_description">{{$productById->product_description ??""}}</textarea>
                    </div>
                    <div class="col-6 mt-2">
                        <input class="form-control" placeholder="Enter product_price" type="text"  value="{{$productById->product_price ??""}}"  name="product_price" id="product_price">
                    </div>
                    <div class="col-6 mt-2">
                        <input class="form-control" type="text" value="{{$productById->product_quantity ??""}}" placeholder="Enter quantity" id="product_quantity" name="product_quantity">
                    </div>
                    <div class="col-6 mt-2">
                        <input type="file" placeholder="Enter image" name="product_image"  id="product_image">
                    </div>                                    
                    <div class="col-6 mt-2">
                        <input class="form-control" placeholder="old image" value="{{$productById->product_image ??""}}" id="product_image_old" name="product_image_old">
                    </div>
                    <div class="col-6 mt-2">
                        <input class="btn btn-primary" type="submit" name="btn-save" id="btn-save">
                    </div>
                </div>
                
            </div>
        </div>
    </form>

    <div class="p-6 text-gray-900 dark:text-gray-100" style="padding: 10px">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>description</th>
                    <th>price</th>
                    <th>qunatity</th>
                    <th>image</th>
                    <th>Edit</th>
                    <th>Delate</th>
                </tr>
            </thead>
            <tbody id="listalldata">

            </tbody>
            
        </table>
        @push('custom-scripts')  
        <script>

            // document.getElementById("myform").addEventListener("click",function(){
                // console.log("called submit");
                function savepro(){
                    
                    var result = {};
                    $.each($('#myform').serializeArray(), function() {
                        result[this.name] = this.value;
                    });
    
                    // console.log(result);
                    fetch("http://localhost:8000/api/saveproduct",{
                    method: 'POST',
                    headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(result)
                }).then((returnData)=>
                    returnData.json()).then((response)=>{
                        console.log(response);
                // autoload();

                    });
                }
            // })


function getproducts(){
    // console.log("called");
    fetch("http://localhost:8000/api/getallproductsdata").then((returnData)=>
    returnData.json()).then((response)=>{
                // console.log(response); 
                htmltable=""
                response.forEach(element => {
                    console.log(element);
                    htmltable+=`<tr>
                        <td>${element.product_title}</td>
                        <td>${element.product_description}</td>
                        <td>${element.product_price}</td>
                        <td>${element.product_quantity}</td>
                        <td>${element.product_image}</td>
                        <td><button class="btn btn-primary" onclick="getdatabyid()"(${element.id})">Edit</button></td>
                        <td><button class="btn btn-danger" onclick="getDatabyId(${element.id})">Delate</button></td>
                        </tr>`
                });
                // console.log(htmltable);
                document.getElementById("listalldata").innerHTML=htmltable
                })}
                window.onload = getproducts;
                

     function savetododata(params){
                // console.log("savetododata called");
                
                fetch("http://localhost:8000/api/getallproductsdata")
                .then((res)=>res.json()).then((result)=>{
                // result[this.name] = this.value;
                // autoload();
                console.log("result");
            })
    }

  function updatetododata(ajaxid){

     console.log("updatetododata called",ajaxid);

    fetch("http://localhost:8000/api/getallproductsdata="+ajaxid)
    .then((res)=>res.json()).then((result)=>{ 
        console.log(res);
       {
            var myForm = document.getElementById('myForm');
            document.getElementById("btn-save").value = "add";
            myForm.setAttribute('onsubmit',`event.preventDefault(); savetododata()`);
            }
     
        // console.log(result); 
     })
}


  function getdatabyid(id){

        console.log("edit",id);
        
        fetch("http://localhost:8000/api/getdata/id")
        .then((returnData)=>returnData.json()).then((response)=>{
                console.log(response)

                document.getElementById('product_title').value=response.product_title
                document.getElementById('product_description').value=response.product_description
                document.getElementById('product_price').value=response.product_price
                document.getElementById('product_quantity').value=response.product_quantity
                // document.getElementById('product_image').value=response.product_image
                document.getElementById('product_image_old').value=response.product_image_old

                
    
                var myform = document.getElementById('myform');
                document.getElementById("btn-save").value="update";
                myform.setAttribute('onsubmit',`event.preventDefault(); updatetododata(${response.id})`);
            })
        
            } 
            </script>
        @endpush
    </div>

</div>
</div>
</div>
</div>
</div>
@include('layouts.adminappfooter')

