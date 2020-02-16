$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});


$('.titleItem').on('input', function(){

  $(this).parents('.tab-pane.active').find('.titleMetaTag').val($(this).val());

});


$('.delete-form').click(function(e) {
  e.preventDefault() // Don't post the form, unless confirmed
    
    alertify.dialog('confirm')
      .set('title', '')
      .set({transition:'zoom',message: 'Are you Sure!?'})
      .set('onok', function(closeEvent){
          // Post the form
          $(e.target).closest('form').submit() // Post the surrounding form
      })
      .set('oncancel', function(closeEvent){
        
      })
      .show();
});

$('.showComment').click(function(e) {
  e.preventDefault() // Don't post the form, unless confirmed
    
    const txt = $(this).data('text');

    alertify.alert('', txt);

});




$('.search-reset').click(function(e) {
  $(':input').val('');
  $('select').val('');
  $('.select2').val(null).trigger('change');
});


$('.select2').each(function() {  

  let placeholder = $(this).attr('placeholder');
  $(this).select2({
      placeholder: placeholder,
      allowClear: true
  })
});


function readURL(input, preview) {
  
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function (e) {
      $('#'+ preview).attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}



function allPermissions(page) {
  if ($('#'+ page +'-permission').is(":checked"))
  {
    $('.'+ page +'-permission').prop('checked', true);
  } else {
    $('.'+ page +'-permission').prop('checked', false);
  }
}
