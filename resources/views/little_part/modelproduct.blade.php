 <!-- Modal -->
 <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <form action="" method="POST" id="addproductfrom">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header bg-info">
                    <h1 class="modal-title fs-5" id="addModalLabel">Add Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    {{-- Erorr Message Start --}}
                         <div class="errorMessageProduct mb-3"></div>
                    {{-- Erorr Message End --}}
                        <div class="from-group mb-3">
                            <label for="name">Product Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Product Name">
                        </div>

                        <div class="from-group mb-3">
                            <label for="price">Product Price</label>
                            <input type="text" class="form-control" name="price" id="price" laceholder="Product Price">
                        </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-info add_product">Save Product</button>
                  </div>
                </div>
              </div>
        </form>
  </div>