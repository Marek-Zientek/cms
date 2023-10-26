// $(document).ready(function() {
//     $('#summernote').summernote({
//         height: 400
//     });
//   });


ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
        
        
        
  
  $(document).ready(function(){
    $('#selectAllBoxes').click(function(){
        if(this.checked)
            {
                $('.checkBoxes').each(function(){
                    this.checked = true;
                });
            } else {
                $('.checkBoxes').each(function(){
                    this.checked = false;
                });
            }
    });
  });