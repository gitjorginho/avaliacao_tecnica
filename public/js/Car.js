/**
 * Created by Jorge on 01/03/21.
 */

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function capturar(element) {

    let route = $(element).data('route');
    let data = {
        text_capturar: $('#text_capturar').val()
    }
    $(element).attr('disabled','disabled');
    $('#btn_loading').show();
    $.post(route, data, (response) => {
        $('#btn_loading').hide();
        $(element).removeAttr('disabled');
        $('#modal_msg p').html(response);
        $('#modal_msg').fadeIn().modal('show');

    }).fail((response) => {
        $('#btn_loading').hide();
        $(element).removeAttr('disabled');
        alert('Algo deu errado');
    });
}


function getForm(element) {

    let route = $(element).data('route');

    $.get(route, (response) => {
        $('#table_list').html(response);

    }).fail((response) => {
        alert('Algo deu errado')
    });


}

function deleteArtigo(element){
    let route = $(element).data('route');
    let data = {
       _method: 'DELETE',
       id_artigo : $(element).data('id')
    };

    $.post(route, data, (response) => {
        $('#table_list').html(response);
    }).fail((response) => {
        alert('Algo deu+ errado')
    });
}
