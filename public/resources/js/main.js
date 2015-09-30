/**
 * Created by ngocnh on 7/24/15.
 */
$(document).ready(function () {
    $('textarea.ckeditor').each(function () {
        CKEDITOR.replace($(this).attr('id'), {
            allowedContent: true
        });
    });
});