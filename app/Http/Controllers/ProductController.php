<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Carbon\Carbon;


class ProductController extends Controller
{
    function product(){
        $products = Product::latest()->paginate(5); 
        return view('product',compact('products'));
    }
//========Product Insert Start=======================>
    function addProduct(Request $request){
        $request->validate(
             [
               'name' => 'required|unique:products',
               'price' => 'required',
             ],
             [
               'name.required' => 'Name is required',
               'name.uniqu' => 'Product Alredy Exists',
               'price.required' => 'Price is required',
             ]
        );

        Product::insert($request->except('_token')+[
            'created_at' => Carbon::now(), 
        ]);

        return response()->json([
            'status' => 'success',
        ]);
    }
//========Product Insert End=======================>

//========Product Update Start=======================>
    function updateProduct(Request $request){
        $request->validate(
            [
            'up_name' => 'required|unique:products,name,'.$request->up_id,
            'up_price' => 'required',
            ],
            [
            'up_name.required' => 'Name is required',
            'up_name.uniqu' => 'Product Alredy Exists',
            'up_price.required' => 'Price is required',
            ]
        );

        Product::where('id',$request->up_id)->update([
             'name' =>$request->up_name,
             'price' =>$request->up_price,
        ]);

        return response()->json([
            'status' => 'success',
        ]);
    }
//========Product Update End=======================>

//========Product Delete Start=======================>
    function deleteProduct(Request $request){
        Product::find($request->product_id)->delete();
        return response()->json([
            'status' => 'success',
        ]);
    }

//========Product Delete End=======================>

//========Product Pagination Ajax Start=======================>
     function ProductPagination(Request $request){
        $products = Product::latest()->paginate(5); 
        return view('pagination_page.product',compact('products'));
     }

//========Product Pagination Ajax End=======================>


//========Product Search Start=======================>
    function ProductSearch(Request $request){
        $products = Product::where('name','like','%'.$request->search_str.'%')
        ->orWhere('price','like','%'.$request->search_str.'%')
        ->orderBy('id','desc')
        ->paginate(5);
        if($products->count() >= 1){
            return view('search_page.product_page',compact('products'));
        }else{
            return response()->json([
                 'status' => 'nothing_found'
            ]);
        }
    }

//========Product Search End=======================>

//========Product Update Start=======================>

//========Product Update End=======================>


}
