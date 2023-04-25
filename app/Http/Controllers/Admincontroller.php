<?php

namespace App\Http\Controllers;
use App\Models\productTable;

use Illuminate\Http\Request;

class Admincontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function __construct(){
    // $this->middleware('auth');
    // }

    public function index(Request $request)
    {
        // $request->authenticate();
        // dd("inside index");
        return view("dashboard");
    }
    public function products(Request $request,productTable $productTable)
    {
        dd("called");
        $productData=$productTable->get();
        // dd("called");
        // $data=array("test"=>"someone");
        return view("allproducts",compact('productData'));
    }
    public function productsdataapiget(Request $request,productTable $productTable)
    {
        // dd("called");
        $productData=$productTable->get();
        // dd("$productData");
        // $data=array("test"=>"someone");
        // return view("allproducts",compact('productData'));
        return $productData;

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,productTable $productTable)
    {
        // $destinationPath = 'images';
        // $myimage = $request->product_image->getClientOriginalName();
        // $request->product_image->move(public_path($destinationPath), $myimage);
        $productTable->product_title = $request->product_title;
        $productTable->product_description =$request->product_description;
        $productTable->product_price = $request->product_price;
        $productTable->product_quantity = $request->product_quantity;
        $productTable->product_image ="mango";
        $productTable->created_at = date("Y-m-d H:i:s");
        $response = $productTable->save();
        return $response;
        // return redirect('product')->with('insert-status', 'Record Added successfully');
        
        // return("called");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function getdataapi($id,productTable $productTable)
    {
        // dd("called" ,$id);
        // $productById=$productTable::find($id);
        // dd("called");
        // $data=array("test"=>"someone");
        // return view("addnewpro",compact('productById'));
        $productById=$producttable::find($id);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
