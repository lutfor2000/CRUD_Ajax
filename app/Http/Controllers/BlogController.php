<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Blog;
use Carbon\Carbon;
use Image;

class BlogController extends Controller
{
    function blog(){
        $blogs = Blog::latest()->paginate(4); 
        return view('blog',compact('blogs'));
    }

//======================Blog Insert Data Start=============================>
    function blogPost(Request $request){
        $request->validate([
            'blog_name' => 'required',
            'blog_photo' => 'required',
        ],[
            'blog_name.required' => 'Name is required',
            'blog_photo.required' => 'Photo is required', 
        ]
       );

        $random_photo_name = Str::random(10).time().".".$request->blog_photo->getClientOriginalExtension();
        $blog_photo = $request->file('blog_photo');
        Image::make($blog_photo)->resize(1000, 667)->save(base_path('public/uploads/blog_photo/').$random_photo_name);
    
        Blog::insert($request->except('_token','blog_photo')+[
            'blog_photo' => $random_photo_name,
            'created_at' => Carbon::now(),
        ]);

       
        return response()->json('File Upload Successfull');
    }

//======================Blog Insert Data Start=============================>

//======================Blog Update Data Start=============================>
    function blogUpdate(Request $request){
        $request->validate([
            'blog_name' => 'required',
            'blog_new_photo' => 'required',
        ],[
            'blog_name.required' => 'Name is required',
            'blog_new_photo.required' => 'Photo is required', 
        ]
       );

       if ($request->hasFile('blog_new_photo')){
        //Delete Old Photo Start
        $old_photo_path = base_path('public/uploads/blog_photo/').Blog::find($request->id)->blog_photo;
        unlink($old_photo_path);
        
        //Upload New Photo Start-------------------------------------->
        $random_photo_name = Str::random(10).time().".".$request->blog_new_photo->getClientOriginalExtension();
        $blog_photo = $request->file('blog_new_photo');
        Image::make($blog_photo)->resize(1000, 667)->save(base_path('public/uploads/blog_photo/').$random_photo_name);
        //Upload New Photo End-------------------------------------->
        Blog::where('id',$request->id)->update([
            'blog_name' =>$request->blog_name,
            'blog_photo' =>$random_photo_name,
       ]);
       
      }
        
       return response()->json('File Update Successfull');
    }
//======================Blog Update Data End=============================>

//======================Blog Delete Data Start=============================>
    function blogDelete(Request $request){

        if (Blog::where('id',$request->blog_id)->exists()) {
            $old_photo_path = base_path('public/uploads/blog_photo/').Blog::find($request->blog_id)->blog_photo;
            unlink($old_photo_path);
            Blog::find($request->blog_id)->delete();
        } 
        return response()->json([
            'status' => 'success',
        ]);

    }  
//======================Blog Delete Data Start=============================>

//======================Blog Pagination Ajax Responsive Start=============================>
    function pagination(Request $request){
        $blogs = Blog::latest()->paginate(4); 
        return view('pagination_page/blog_page',compact('blogs'))->render();
        // if($request->ajax()){
        // }
    }  
//======================Blog Pagination Ajax Responsive End=============================>

//======================Blog Search Option Start=============================>
    function blogSearch(Request $request){
        $blogs = Blog::where('blog_name','like','%'.$request->search_string.'%')
        ->orderBy('id','desc')
        ->paginate();
        if($blogs->count() >= 1){
            return view('search_page/blog_page',compact('blogs'))->render();
        }else{
            return response()->json([
                 'status' => 'nothing_found'
            ]);
        }
    }
//======================Blog Search Option End=============================>

//======================Blog Insert Data Start=============================>
//======================Blog Insert Data Start=============================>

    
}
