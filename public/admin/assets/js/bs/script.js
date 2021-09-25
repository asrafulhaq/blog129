(function ($) {
    $(document).ready(function () {

        // Logout System 
        $('#logout-btn').click(function (e) {
            e.preventDefault();

            $('#logout-form').submit();

        });

        // Post tags select2 
        $('.post-tags').select2();

        // Post Editor 
        CKEDITOR.replace('posteditor');

        // Post type manage 
        $('#post-type').change(function () {
            let type = $(this).val();


            if (type == 'Standard') {
                $('.post-type-area').html(`<div class="form-group">
                <label class="">Featured Image</label>
         
                    <input name="image" type="file" class="form-control">
             
            </div>`);
            } else if (type == 'Gallery') {
                $('.post-type-area').html(`<div class="form-group">
                <label class="">Gallery Images</label>
         
                    <input name="gallery[]" type="file" class="form-control" multiple >
             
            </div>`);

            } else if (type == 'Video') {
                $('.post-type-area').html(`<div class="form-group">
                <label class="">Video URL</label>
         
                    <input name="video" type="text" class="form-control" placeholder="Youtubr / Vimeo video link">
             
            </div>`);
            } else if (type == 'Audio') {
                $('.post-type-area').html(`<div class="form-group">
                <label class="">Audio URL</label>
         
                    <input name="audio" type="text" class="form-control" >
             
            </div>`);
            } else if (type == 'Quote') {
                $('.post-type-area').html(`<div class="form-group">
                <label class="">Quote</label>
         
                    <textarea name="quote" class="form-control"></textarea>
             
            </div>`);
            } else {
                $('.post-type-area').html('');
            }

        });



        // Post table to Data Table 
        $('#post').DataTable();


    });
})(jQuery)