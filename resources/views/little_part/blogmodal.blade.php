<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <form  id="addblogfrom">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-info">
                <h1 class="modal-title fs-5" id="addModalLabel">Add Blog</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                {{-- Erorr Message Start --}}
                     <span id="error" class="alert text-danger"></span>
                {{-- Erorr Message End --}}
                    <div class="from-group mb-3">
                        <label for="name">Blog Name</label>
                        <input type="text" class="form-control" name="blog_name"  placeholder="Blog Name">
                    </div>

                    <div class="from-group mb-3">
                        <label for="price">Blog Photo</label>
                        <input type="file" class="form-control" name="blog_photo" >
                    </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info">Upload</button>
              </div>
            </div>
          </div>
    </form>
</div>