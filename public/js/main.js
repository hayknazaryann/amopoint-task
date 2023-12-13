$(document)
    .ready(function (){
        initSelect();
    })
    .on('change', 'input#file', function () {
        const elm = $(this),
            form = elm.closest('form');

        $.ajax({
            url: form.attr('action'),
            method: 'post',
            data: form.serializeWithFiles(),
            contentType: false,
            processData: false,
            dataType: 'json',
        }).done(function (response) {
            if (response.success) {
                $('.import-text-content').html(`<code>${response.data.content}</code>`);
            }
        }).fail(function (error) {
            failResponse(error);
        })
    })

function initSelect () {
    $('select.select2').each(function () {
        const elm = $(this),
            placeholder = elm.attr('aria-label'),
            tags = elm.hasClass('select2-tag');

        elm.select2({
            placeholder: placeholder,
            tags: tags,
            allowClear: true
        });
    })
}

function responseMsg(title, msg, type) {
    var toastMixin = Swal.mixin({
        toast: true,
        icon: type,
        title: title,
        animation: false,
        position: 'top-right',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });

    toastMixin.fire({
        animation: true,
        title: msg
    });

}
function failResponse(error, form = null) {
    const statusCode = error.status;
    if (statusCode === 400) {
        responseMsg('Error!', error.msg, 'error');
    } else if (statusCode === 404) {
        responseMsg('Error!', error.msg, 'error');
    } else if (statusCode === 422) {
        const errors = error.responseJSON;
        if (form) {
            form.find('input[type="text"], input[type="password"], textarea').each(function (index, input) {
                $(input).removeClass('is-invalid');
                var inputName = $(input).attr('name');
                if (inputName in errors.errors) {
                    $(input).addClass('is-invalid');
                }
            });
        }
        responseMsg('Error !', errors.message, 'error')
    }
}
