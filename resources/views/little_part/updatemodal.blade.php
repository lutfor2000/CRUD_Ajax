 <!-- Modal -->
 <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <form action="" method="POST" id="updateModalForm">
         @csrf
         <input type="hidden" id="up_id">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-info">
                <h1 class="modal-title fs-5" id="updateModalLabel">Edit Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                {{-- Erorr Message Start --}}
                     <div class="errorMessageProduct mb-3"></div>
                {{-- Erorr Message End --}}
                    <div class="from-group mb-3">
                        <label for="name">Product Name</label>
                        <input type="text" class="form-control" name="up_name" id="up_name" placeholder="Product Name">
                    </div>

                    <div class="from-group mb-3">
                        <label for="price">Product Price</label>
                        <input type="text" class="form-control" name="up_price" id="up_price" laceholder="Product Price">
                    </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-warning product_update_btn">Update Product</button>
              </div>
            </div>
          </div>
    </form>
</div>