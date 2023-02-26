$(function() {

    $('.dropzone').on('dragover', function() {
      $(this).addClass('hover');
    });

    $('.dropzone').on('dragleave', function() {
      $(this).removeClass('hover');
    });

    $('.dropzone input').on('change', function(e) {
      var file = this.files[0];
      var cont = $(this).parent();
      cont.removeClass('hover');
      $(this).next('input[type="hidden"]').val('');
      if (this.accept && $.inArray(file.type, this.accept.split(/, ?/)) == -1) {
        return alert('File type not allowed.');
      }

      cont.addClass('dropped');

      $(this).closest('.dropzone .img img').remove();

      if ((/^image\/(gif|png|jpeg|pdf|docx|xlsx)$/i).test(file.type)) {
        var reader = new FileReader(file);

        reader.readAsDataURL(file);

        reader.onload = function(e) {
          var data = e.target.result,
              $img = $('<img />').attr('src', data).fadeIn();
          cont.parent().prev('div.img').children('a').html($img);
          // alert($img);
        };
      } else {
        var ext = file.name.split('.').pop();

        cont.parent().prev('div.img').children('.file_name').html("<i class='fas fa-file'></i><span>" + file.name + '</span>');
      }
    });
    // $('.select2').select2();
  });
// $(document).ready(function () {
//     if($('textarea').hasClass('ckeditor')){
//         $('.ckeditor').ckeditor();
//     }
// });


$('a.delete_file').on('click', function(e){
  e.preventDefault();
  $(this).parent().parent().prev('.img').children('a').children().remove();
  $(this).parent().prev().children('input[type="hidden"]').val('');
  $(this).parent().prev().children('input[type="file"]').val('');
  // $(this).parent().prev().children('input').val('deleted');
// alert( $(this).parent().parent().prev('.img').children('a'));
});
// $(".is_correct").change(function(){
//   $(".is_correct").prop('checked', false);
//   $(this).prop('checked', true);
// })
// $('.role').change(function(){
//     var role = $(this).val();
//     if(role==='4' || role==='5'){
//         $(".courses").removeClass("d-none");
//     }else{
//         $(".courses").addClass("d-none");
//     }
//     // console.log(role);
// })
$(function() {
    $('.form-group.'+$('.type_gallary').val()).show();
    $('.type_gallary').change(function(){
        // alert($(this).val());
        if($('.type_gallary').val() == 'image') {
            $('.form-group.image').show();
            $('.form-group.video').hide();
        } else {
            $('.form-group.video').show();
        }
    });
});
