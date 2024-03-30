@extends('layouts.fontant')

@section('body')
<div class="col-lg-10 m-auto mt-3">

    <div class="card">
        <div class="card-header bg-info">
          Blog Table
        </div>
        <div class="card-body">

            <div class="tabe_heat d-flex">
                 <div class="tabale_left w-50">
                    <button type="button" class="btn btn-sm btn-warning mb-2" data-bs-toggle="modal" data-bs-target="#addModal">
                        Add Blog
                    </button>
                </div>

                <div class="input-group input-group-sm w-50 mb-3">
                    <span class="input-group-text bg-warning" id="basic-addon1"><i class="fa-solid fa-magnifying-glass"></i></span>
                    <input type="text" class="form-control" placeholder="Srarch Here"  id="search" name="search" aria-describedby="basic-addon1">
                </div>  
            </div>
         
             <div id="table-data" class="text-center">
                 <table class = "table table-bordered text-center">
                     <thead>
                         <tr>
                             <th>Serial No</th>
                             <th>Blog Name</th>
                             <th>Blog Price</th>
                             <th>Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         @forelse ($blogs as $blog)
                         <tr>
                             <td>{{$loop->index+1}}</td>
                             <td>{{ucwords(strtolower($blog->blog_name))}}</td>
                             <td>
                                 <img src="{{asset("uploads/blog_photo/".$blog->blog_photo)}}" width="100" alt="not found">
                             </td>
                             <td>
                             <div class="btn-group text-center ">
                                 <a type="submit" class="btn btn-sm btn-outline-warning blog_edit_btn"
                                 data-bs-toggle="modal" data-bs-target="#updateModal"
                                 data-id="{{$blog->id}}" 
                                 data-blog_name="{{$blog->blog_name}}" 
                                 data-blog_photo="{{$blog->blog_photo}}" 
                                 href = ""><i class="fa-regular fa-pen-to-square"></i></a>
                                 
                                 <a type="submit" class="btn btn-sm btn-outline-info blog_delete_btn"
                                 data-id="{{$blog->id}}"
                                 href = ""><i class="fa-regular fa-trash-can"></i></a>
                             </div>
                             </td>
                         </tr> 
                         @empty
                         <tr class="text-center">
                             <td colspan="20" class="text-danger"> <small>No Data To Show</small></td>
                         </tr>
                         @endforelse
                     </tbody>
                 </table>
                 {{$blogs->links('pagination::bootstrap-5')}}
                 {{-- {!! $blogs->links() !!} --}}
             </div>
        </div>
        @include('little_part/blogmodal')
        @include('little_part/blogupdate')
      </div>
</div>
@endsection
@section('footer_script')
   @include('js_all/blogscript')
@endsection