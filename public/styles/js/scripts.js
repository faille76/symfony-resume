function contactOnSubmit(token) {
    let contactForm = $('#contact-form');

    const post_url = contactForm.attr("action");
    const form_data = contactForm.serialize();

    $.post(post_url, form_data)
        .done((result) => {
            $('#form-contact-success').html(result.message);
            $('#form-contact-error').prop('hidden', true);
            $('#form-contact-success').prop('hidden', false);
            $('#contact-form').prop('hidden', true);
        })
        .fail((result) => {
            $('#form-contact-error').html(result.responseJSON.message);
            $('#form-contact-error').prop('hidden', false);
            $('#form-contact-success').prop('hidden', true);
        });
}

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
});