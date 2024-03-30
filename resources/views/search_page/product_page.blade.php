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
{{$products->links('pagination::bootstrap-5')}}