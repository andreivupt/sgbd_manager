$(document).ready(function () {

    editPatrimony();

});

function editPatrimony() {

    var patrimony_number;
    var patrimony_name;

    $('.edit_register').click(function () {

        patrimony_number = $(this).data('number');
        patrimony_name   = $(this).data('name');

        $('#n_patrimony_name').val(patrimony_name);
        $('#n_patrimony_number').val(patrimony_number);
        $('.patrimony_name').val(patrimony_name);
        $('.patrimony_number').val(patrimony_number);


    });
}