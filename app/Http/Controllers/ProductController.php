<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function detail($id){
        $product = Product::with('detail')->findOrFail($id);;
        return view('result',[
            'product' => $product
        ]);
    }


    public function post($id)
    {
        $user = User::with('posts')->findOrFail($id);
        return view('result', compact('user'));
    }

    public function index(){
        return Product::all();
    }

    

    public function create(){

        $attributes=([
            'name' => 'Product',
            'slug' => 'product-niceg',
            'description' => 'This is product lets nice',
            'price' => '200'
        ]);


        Product::create($attributes);
        return view('welcome');
    }

    public function show($id){

        return Product::find($id);
      
    }

    public function update($id){
        $product = Product::find($id);
        $product->update([
            'name' => 'wawns'
        ]);
        return $product.'<br><br>'.'update succesfully';
    }
 
    public function destroy($id){
        $product = Product::find($id);
        $product->delete();
        return 'Delete Succesfully';
    }

    public function search($name){
        return Product::where('name','like','%'.$name.'%')->get();
    }


    

    // public function sendData($attributes){
    //     $attributes = ([
    //         'name' => 'Product niceg',
    //         'slug' => 'product-niceg',
    //         'description' => 'This is product lets nice',
    //         'price' => '200'
    //     ]);
    //     return $attributes;
    // }
}
