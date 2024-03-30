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