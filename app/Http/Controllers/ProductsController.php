<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index',Compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function get_product(){
        $response = json_decode(file_get_contents('php://input'), true);
        $product = new Product();
        $product->title = $response['title'];
        $product->sku = $response['variants'][0]['sku'];
        $product->description = $response['body_html'];
        $product->store = $response['vendor'];
        $product->image = $response['images'][0]['src'];
        $product->labels = $response['tags'];
        $product->status = $response['status'];
        $product->price = $response['variants'][0]['price'];
        $product->shopify_product_id = $response['id'];
        $product->variant_id =  $response['variants'][0]['id'];
        $product->save();
    }

    public function update_product(){
        $response = json_decode(file_get_contents('php://input'), true);
        $product = Product::where('shopify_product_id',$response['id'])->get();
        $product->title = $response['title'];
        $product->sku = $response['variants'][0]['sku'];
        $product->description = $response['body_html'];
        $product->store = $response['vendor'];
        $product->image = $response['images'][0]['src'];
        $product->labels = $response['tags'];
        $product->status = $response['status'];
        $product->price = $response['variants'][0]['price'];
        $product->shopify_product_id = $response['id'];
        $product->variant_id =  $response['variants'][0]['id'];
        $product->update();
    }
}
