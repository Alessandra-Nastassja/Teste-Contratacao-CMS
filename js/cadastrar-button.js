$(document).ready(function () {
    $('.phone_with_ddd').mask('(00) 00000-0000');
    limparForm();
    $("#notificacao").hide();
    $("#cadastrarUsuario").on('click', function () {
        $(".alert").removeClass("alert-success");
        $(".alert").addClass("alert-danger");

        var txtNome = $("#nome");
        var txtEmail = $("#email");
        var txtCelular = $("#celular");

        var nome  = $("#nome").val();
        var email = $("#email").val();
        var celular = $("#celular").val();

        txtNome.removeClass("is-invalid");
        txtEmail.removeClass("is-invalid");
        txtCelular.removeClass("is-invalid");

        email = $("#email").val();
        filtro = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

        if (!txtNome.val() && !txtEmail.val() && !txtCelular.val()) {
            $("#msgNotificacao").text('Preencha corretamente os campos');
            $("#notificacao").show();
            return false;
        } else if (txtNome.val() == null || txtNome.val() == "") {
            $(".invalid-feedback-nome").css('color', '#c0392b');
            $(".invalid-feedback-nome").text('Preencha corretamente o campo nome');
            return false;
        } else if (txtEmail.val() == null || txtEmail.val() == "" || !filtro.test(email)) {
            $(".invalid-feedback-email").css('color', '#c0392b');
            $(".invalid-feedback-email").text('Preencha corretamente o campo email');
            return false;
        } else if (txtCelular.val() == null || txtCelular.val() == "") {
            $(".invalid-feedback-celular").css('color', '#c0392b');
            $(".invalid-feedback-celular").text('Preencha corretamente o campo celular');
            return false;
        } else {
            $.ajax({
            method: "POST",
            url: "./src/usuario/cadastrar-usuario.php",
            data: { "nome": nome, "email": email, "celular": celular },
        }).done(function (data) {
            var result = $.parseJSON(data);
            if (result == 1) {
                $(".alert").removeClass("alert-danger");
                $(".alert").removeClass("alert-warning");
                $(".alert").addClass("alert-success");

                $("#msgNotificacao").text('Usuário salvo com sucesso! ');
                $("#notificacao").show();
                limparForm();
            } 
            else if (result == 2) {
                $("#msgNotificacao").text('Todos os campos são obrigatórios!');
                $("#notificacao").show();
            } else if (result == 3) {
                alert('Enter a valid email address.');
            } else {
                alert('User data could not be saved. Please try again');
            }
        });
    }
    });
});
function limparForm() {
    $("#nome").val("");
    $("#email").val("");
    $("#celular").val("");
}
