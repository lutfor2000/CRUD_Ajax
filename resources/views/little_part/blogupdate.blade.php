<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <form  id="blogupdatefrom" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="id" name="id">
        <input type="hidden" class="form-control" name="blog_photo" id="blog_photo">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-info">
                <h1 class="modal-title fs-5" id="updateModalLabel">Blog Edit</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                {{-- Erorr Message Start --}}
                     <span id="blog_error" class="alert text-danger"></span>
                {{-- Erorr Message End --}}
                    <div class="from-group mb-3">
                        <label for="blog_name">Blog Name</label>
                        <input type="text" class="form-control" name="blog_name"  placeholder="Blog Name" id="blog_name">
                    </div>

                    <div class="from-group mb-3">
                        <label for="blog_new_photo">Blog New Photo</label>
                        <input type="file" class="form-control" name="blog_new_photo">
                    </div>
                    <div class="blog_img_view"></div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info">Upload</button>
              </div>
            </div>
          </div>
    </form>
</div>