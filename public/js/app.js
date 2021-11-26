
 
 $(document).ready(function(){
  $('.parallax').parallax();
    $('.modal').modal();
    $('.sidenav').sidenav();
    $('select').formSelect();
    $('.datepicker').datepicker();
    $('.dropdown-button').dropdown();
    $('.tabs').tabs();
  
  });

  function getProduct($id){
    
    $.ajax({
      url: '/getProduct/'+$id,
      success: function(results){

        $("#pname").html(results.name);
        $("#desc").html(results.description);
        $("#p_brand").val(results.brand);
        $("#pri").html(results.price);
        $("#p_id").val(results.id);
        $("#img").attr("src", './products/'+results.image);
        $("#id").val(results.id);
          console.log(results);
      }
    });
    
  }



  function readURL(input) {
    if (input.files && input.files[0]) {
  
      var reader = new FileReader();
  
      reader.onload = function(e) {
        $('.image-upload-wrap').hide();
  
        $('.file-upload-image').attr('src', e.target.result);
        $('.file-upload-content').show();
  
        $('.image-title').html(input.files[0].name);
      };
  
      reader.readAsDataURL(input.files[0]);
  
    } else {
      removeUpload();
    }
  }
  
  function removeUpload() {
    $('.file-upload-input').replaceWith($('.file-upload-input').clone());
    $('.file-upload-content').hide();
    $('.image-upload-wrap').show();
  }
  $('.image-upload-wrap').bind('dragover', function () {
          $('.image-upload-wrap').addClass('image-dropping');
      });
      $('.image-upload-wrap').bind('dragleave', function () {
          $('.image-upload-wrap').removeClass('image-dropping');
  });


  