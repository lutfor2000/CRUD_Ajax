<script>
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

  $(document).ready(function(){
//=================Bloge Insert Data=========================================================>    
         $("#addblogfrom").submit(function(e){
              e.preventDefault();
              var formdata = new FormData(this);
              $('#error').text('');
              $.ajax({
                method:'POST',
                url:"{{ route('blogpost') }}",
                data:formdata,
                contentType:false,
                processData:false,
                success:(response)=>{
                  if(response){
                    this.reset();
                    $('#addModal').modal('hide');
                    $('.table').load(location.href+' .table');
                    // alert('Full upload Successfull');
                  }
                },
                error:function(response){
                   $('#error').text(response.responseJSON.message);
                }

              });

         })

//=========================Blog Item  Edit===================================================================================>
        $(document).on('click','.blog_edit_btn',function(){
                  let id = $(this).data('id');
                  let blog_name = $(this).data('blog_name');
                  let blog_photo = $(this).data('blog_photo');

                  $('#id').val(id);
                  $('#blog_name').val(blog_name);
                  $('#blog_photo').val(blog_photo);
            });

//=========================Blog Item  Update===================================================================================>
      $("#blogupdatefrom").submit(function(e){
              e.preventDefault();
              var formdata = new FormData(this);
              $('#blog_error').text('');
              $.ajax({
                method:'POST',
                url:"{{ route('blogupdate') }}",
                data:formdata,
                contentType:false,
                processData:false,
                success:(response)=>{
                  if(response){
                    this.reset();
                    $('#updateModal').modal('hide');
                    $('.table').load(location.href+' .table');
                    alert('Full upload Successfull');
                  }
                },
                error:function(response){
                   $('#blog_error').text(response.responseJSON.message);
                }

              });

         })


//=========================Blog Item Delete===================================================================================>
        $(document).on('click','.blog_delete_btn',function(e){
                  e.preventDefault();
                  let blog_id = $(this).data('id');
                  // console.log(blog_id);

                if(confirm('You are sure to Delete Your Product ?')){
                    $.ajax({
                  url:"{{route('blog.delete')}}",
                  method:'get',
                  data:{blog_id:blog_id,},
                  success:function(res){
                        if (res.status=='success') { 
                            $('.table').load(location.href+' .table');
                        }
                  },error:function(err){
                    let error = err.responseJSON;
                    $.each(error.errors,function(index ,value){
                        $('.error').append('<small class="text-danger">'+value+'</small>'+'<br>')
                    });
                  }

                });
                }
                
              });    
              
//==================Paginator pagr Ajax Responsive Start============================================================>              
        $(document).on('click','.pagination a',function(e){
                  e.preventDefault();
                  var page = $(this).attr('href').split('page=')[1]
                  blog(page);
        });

        function blog(page){
                $.ajax({
                      url:"{{route('pagination.info')}}?page="+page,
                      success:function(r){
                        $('#table-data').html(r);
                      }
                });
        }
//==================Paginator pagr Ajax Responsive End============================================================>  

//==================Search Blog Option Us by Ajax Start============================================================> 
         $(document).on('keyup',function(e){
                 e.preventDefault();
                 let search_string = $('#search').val();
                 $.ajax({
                     url:"{{ route('blog.search') }}",
                     method:'GET',
                     data:{search_string:search_string},
                     success:function(res){
                         $('#table-data').html(res);
                         if (res.status == "nothing_found"){
                             $('#table-data').html('<span class ="text-danger text-center">'+'Nothing found'+'</span>');
                         }
                     }

                 });
         });
//==================Search Blog Option Us by Ajax End============================================================>   



//=========================Blog Item View in Edit Form===================================================================================>
// $('input[type="file"][name="blog_new_photo"]').val('');
//         $('input[type="file"][name="blog_new_photo"]').on('change',function(){
//               var img_path = $(this)[0].value;
//               var blog_img_view = $('.blog_img_view');
//               var extension = img_path.substring(img_path.lastIndexOf('.')+1).toLowerCase();
//               if(extension == 'jpeg' || extension == 'jpg' || extension == 'png'){
//                   if(typeof(FileReader) != 'undefined'){
//                      blog_img_view.empty();
//                      var reader = new FileReader();
//                      reader.onload = function(e){
//                        $('<img/>',{'src':e.target.result,'class':'img-fluid','style':'max-width:100px;margin-bottom:10px;'}).
//                        append(blog_img_view);
//                      }
//                      blog_img_view.show();
//                      reader.readAsDataURL($(this)[0].files[0]);
//                   }else{
//                     $(blog_img_view).html('This browser dose not support FileReader');
//                   }
//               }else{
//                 $(blog_img_view).empty();
//               }
//     });              



    });
</script>