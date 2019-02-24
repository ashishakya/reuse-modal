$(document).on('click', '.edit-btn', function () {
    $('.modal-header .modal-title').text('Edit');

    $('.edit-content').show();
    $('.delete-content').hide();

    $('.modal-footer .action-btn').text('Update');

    $('.modal-footer .action-btn').addClass('btn-success');
    $('.modal-footer .action-btn').addClass('edit');
    $('.modal-footer .action-btn').removeClass('btn-danger');
    $('.modal-footer .action-btn').removeClass('delete');

    $('#modal-id').val($(this).data('id'));
    $('#modal-name').val($(this).data('name'));
});

$(document).on('click', '.delete-btn', function () {
    $('.modal-header .modal-title').text('Delete');

    $('.delete-content').show();
    $('.edit-content').hide();

    $('.modal-footer .action-btn').text('Delete');

    $('.modal-footer .action-btn').addClass('btn-danger');
    $('.modal-footer .action-btn').addClass('delete');
    $('.modal-footer .action-btn').removeClass('btn-success');
    $('.modal-footer .action-btn').removeClass('edit');

    $('.delete-content .name').text($(this).data('name'));
    $('.delete-content .id').text($(this).data('id'));
});

$('.modal-footer').on('click', '.edit', function () {
    const name = $('#modal-name').val();
    const id = $('#modal-id').val();
    console.log(name, id);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'PATCH',
        url: 'reusables/' + id,
        data: {
            'id': id,
            'name': name
        },
        success: (response) => {
            window.location = response.url;
        }
    });
});
$('.modal-footer').on('click', '.delete', function () {
    const id = $('.delete-content .id').text();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'DELETE',
        url: 'reusables/' + id,
        success: (response) => {
            window.location = response.url;
        }
    });
});