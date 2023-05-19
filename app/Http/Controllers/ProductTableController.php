<?php

namespace App\Http\Controllers;

use App\Models\productTable;
use Illuminate\Http\Request;
use App\Traits\ImageTrait;
use App\Mail\MyTestMail;
use PDF;
use Mail;

class ProductTableController extends Controller
{
    
    
    use ImageTrait;
    
    public function testTrait(Request $request){
        $input['image'] = $this->verifyAndUpload($request, 'image', 'images');
        dd("inside Trait controller called");

    }
    public function index(productTable $productTable)
    {

        $productData=$productTable->get();
        // dd("called");
        // $data=array("test"=>"someone");
        return view("listallproducts",compact('productData'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,productTable $productTable)
    {

        $destinationPath = 'images';
        $myimage = $request->product_image->getClientOriginalName();
        $request->product_image->move(public_path($destinationPath), $myimage);

        $insertproduct=array("product_title"=>$request->product_title,"product_description"=>$request->product_description,
                             "product_price"=>$request->product_price,"product_quantity"=>$request->product_quantity,
                             "product_image"=>$myimage,"created_at"=>date("Y-m-d H:i:s"));

          $saveproduct=$productTable->customfunctiomn($insertproduct,$productTable);
        return $saveproduct;
        // $productTable->product_title = $request->product_title;
        // $productTable->product_description =$request->product_description;
        // $productTable->product_price = $request->product_price;
        // $productTable->product_quantity = $request->product_quantity;
        // $productTable->product_image =$myimage;
        // $productTable->created_at = date("Y-m-d H:i:s");
        $productTable->save();
        return redirect('product')->with('insert-status', 'Record Added successfully');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(productTable $productTable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id,productTable $productTable)
    {
        // dd("called" ,$id);
        $productById=$productTable::find($id);
        // dd("called");
        // $data=array("test"=>"someone");
        return view("addnewpro",compact('productById'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id,Request $request, productTable $productTable)
    {
        $productById=$productTable::find($id);

        if($request->product_image){
          
            $destinationPath = 'images';
            $myimage = $request->product_image->getClientOriginalName();
            $request->product_image->move(public_path($destinationPath), $myimage);
        }
        else{        
           $myimage= $request->product_image_old;
        }

        $updateprodata=array("product_title"=>$request->product_title,"product_description"=>$request->product_description,
        "product_price"=>$request->product_price,"product_quantity"=>$request->product_quantity,
        "product_image"=>$myimage);

        foreach ($updateprodata as $key => $value) {
            $productById->$key=$value;
        }
        
        $productById->save();
        return redirect('product')->with('update-status', 'Record update successfully');
        // dd($updateprodata);
        // dd ("called");
        // $destinationPath = 'images';
        // $myimage = $request->product_image->getClientOriginalName();
        // $request->product_image->move(public_path($destinationPath), $myimage);
        // $productTable->product_image =$myimage;
        // $productById->product_title = $request->product_title;
        // $productById->product_description = $request->product_description;
        // $productById->product_price = $request->product_price;
        // $productById->product_quantity = $request->product_quantity;
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id,productTable $productTable)
    {
        // dd("called",$id);
        $productById=$productTable::find($id);
        // dd($productById);
        $productById->delete($id);
        return redirect('product')->with('status', 'Record delated successfully');

    }

    public function sendmail(){
        $data["email"] = "dodiyay098@gmail.com";
        $data["title"] = "From nilkhanth mango.com";
        $data["body"] = "This is mango farm";
    
        $pdf = PDF::loadView('emails.myTestMail', $data);
        $data["pdf"] = $pdf;
  
        Mail::to($data["email"])->send(new MyTestMail($data));
    
        dd('Mail sent successfully');
    }
}
