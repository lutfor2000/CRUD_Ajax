<script>
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
//============Product Form Data Insert================================>
    $(document).ready(function(){
      
       $(document).on('click','.add_product',function(e){
          e.preventDefault();
          let name = $('#name').val();
          let price = $('#price').val();
        //   console.log(name+price);
         $.ajax({
           url:"{{route('addproduct')}}",
           method:'post',
           data:{name:name,price:price},
           success:function(res){
                if (res.status=='success') { 
                    $('#addModal').modal('hide');
                    $('#addproductfrom')[0].reset();
                    $('.table').load(location.href+' .table');
                }
           },error:function(err){
             let error = err.responseJSON;
             $.each(error.errors,function(index ,value){
                 $('.errorMessageProduct').append('<small class="text-danger">'+value+'</small>'+'<br>')
             });
           }   
         });
       });

//Product From Data Edit in Value Show Edit Page====================================================>
     $(document).on('click','.product_edit_btn',function(){
           let id = $(this).data('id');
           let name = $(this).data('name');
           let price = $(this).data('price');

           $('#up_id').val(id);
           $('#up_name').val(name);
           $('#up_price').val(price);
     });


//Product Form Update===================================================================================>
       $(document).on('click','.product_update_btn',function(e){
          e.preventDefault();
          let up_id = $('#up_id').val();
          let up_name = $('#up_name').val();
          let up_price = $('#up_price').val();
        //   console.log(name+price);
         $.ajax({
           url:"{{route('product.update')}}",
           method:'post',
           data:{up_id:up_id,up_name:up_name,up_price:up_price},
           success:function(res){
                if (res.status=='success') { 
                    $('#updateModal').modal('hide');
                    $('#updateModalForm')[0].reset();
                    $('.table').load(location.href+' .table');
                }
           },error:function(err){
             let error = err.responseJSON;
             $.each(error.errors,function(index ,value){
                 $('.errorMessageProduct').append('<small class="text-danger">'+value+'</small>'+'<br>')
             });
           }   
         });
       });


//Product Item Delete===================================================================================>
       $(document).on('click','.product_delete_btn',function(e){
          e.preventDefault();
          let product_id = $(this).data('id');
      
        //   console.log(name+price);
        if(confirm('You are sure to Delete Your Product ?')){
            $.ajax({
           url:"{{route('delete.product')}}",
           method:'post',
           data:{product_id:product_id,},
           success:function(res){
                if (res.status=='success') { 
                    $('.table').load(location.href+' .table');
                }
           },error:function(err){
             let error = err.responseJSON;
             $.each(error.errors,function(index ,value){
                 $('.errorMessageProduct').append('<small class="text-danger">'+value+'</small>'+'<br>')
             });
           }   
         });
        }
        
       });


//==========================Product Pagination=========================================>
$(document).on('click','.pagination a',function(e){
              e.preventDefault();
              var page = $(this).attr('href').split('page=')[1]
              blog(page);
    });

    function blog(page){
             $.ajax({
                  url:"{{route('product.pagination')}}?page="+page,
                  success:function(r){
                     $('.product-table').html(r);
                  }
             });
    }
 
//==========================Product Search Start==================================>
    $(document).on('keyup',function(e){
          e.preventDefault();
          let search_str = $('#search').val();
          $.ajax({
                     url:"{{ route('product.search') }}",
                     method:'GET',
                     data:{search_str:search_str},
                     success:function(res){
                         $('.product-table').html(res);
                         if (res.status == "nothing_found"){
                             $('.product-table').html('<span class ="text-danger text-center">'+'Nothing found'+'</span>');
                         }
                     }

                 });
    });
//==========================Product Search End==================================>


    });

</script>