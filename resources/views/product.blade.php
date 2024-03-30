@extends('layouts.fontant')

@section('body')
<div class="col-lg-10 m-auto mt-3">

    <div class="card">
        <div class="card-header bg-info">
          Product Table
        </div>
        <div class="card-body">
            <div class="product_table d-flex">
                 <div class="product_left w-50">
                     <button type="button" class="btn btn-sm btn-warning mb-2" data-bs-toggle="modal" data-bs-target="#addModal">
                        Add Product
                      </button>
                 </div>
                 <div class="input-group input-group-sm w-50 mb-3">
                    <span class="input-group-text text-warning" id="basic-addon1"><i class="fa-solid fa-magnifying-glass"></i></span>
                    <input type="text" class="form-control" placeholder="Srarch Here"  id="search" name="search" aria-describedby="basic-addon1">
                  </div>  
            </div>
           
             <div class="product-table text-center">
                 <table class = "table table-bordered text-center">
                     <thead>
                         <tr>
                             <th>Serial No</th>
                             <th>Prosuct Name</th>
                             <th>Product Price</th>
                             <th>Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         @forelse ($products as $product)
                         <tr>
                             <td>{{$loop->index+1}}</td>
                             <td>{{ucwords(strtolower($product->name))}}</td>
                             <td>{{$product->price}}</td>
                             <td>
                             <div class="btn-group text-center ">
                                 <a type="submit" class="btn btn-sm bg-warning product_edit_btn" 
                                 data-bs-toggle="modal" data-bs-target="#updateModal"
                                 data-id="{{$product->id}}" 
                                 data-name="{{$product->name}}" 
                                 data-price="{{$product->price}}" 
                                 href = ""><i class="fa-regular fa-pen-to-square"></i></a>
                                 
                                 <a type="submit" class="btn btn-sm bg-info product_delete_btn"
                                 data-id="{{$product->id}}"
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
                <span class="text-info">{{$products->links('pagination::bootstrap-5')}}</span>
             </div>
        </div>
        @include('little_part/modelproduct')
        @include('little_part/updatemodal')
      </div>
</div>
@endsection
@section('footer_script')
   @include('js_all/allacript')
@endsection