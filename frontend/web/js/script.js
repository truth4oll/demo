$(function () {
    $('#imageModal').on('shown.bs.modal', function (event) {
        var image = $(event.relatedTarget);
        var image_url = image.data('image');
        var modal = $(this);
        modal.find('.modalContent').html('<img style="max-height:400px;" src="' + image_url + '">');
    }).on('hide.bs.modal', function (event) {
        var modal = $(this);
        modal.find('.modalContent').html('');
    });


    $('#viewModal').on('shown.bs.modal', function (event) {
        var related = $(event.relatedTarget);
        var remote_url = $(related).attr('href');
        var modal = $(this);
        $(modal.find('.modalContent')).load(remote_url);
    }).on('hide.bs.modal', function (event) {
        var modal = $(this);
        modal.find('.modalContent').html('');
    });

});

