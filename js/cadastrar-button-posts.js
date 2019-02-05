$(document).ready(function () {
    limparForm();
    $("#notificacao").hide();
    $("#cadastrar").on('click', function(){
        $(".alert").removeClass("alert-success");
        $(".alert").addClass("alert-danger");

        var txtTitulo = $("#titulo");
        var txtTexto = $("#texto");

        var titulo  = $("#titulo").val();
        var texto = $("#texto").val();

        txtTitulo.removeClass("is-invalid");
        txtTexto.removeClass("is-invalid");

        if (!txtTitulo.val() && !txtTexto.val()) {
            $("#msgNotificacao").text('Preencha corretamente os campos');
            $("#notificacao").show();
            return false;
        } else if (txtTitulo.val() == null || txtTitulo.val() == "") {
            $(".invalid-feedback-nome").css('color', '#c0392b');
            $(".invalid-feedback-nome").text('Preencha corretamente o campo título');
            return false;
        } else if (txtTexto.val() == null || txtTexto.val() == "") {
            $(".invalid-feedback-email").css('color', '#c0392b');
            $(".invalid-feedback-email").text('Preencha corretamente o campo texto');
            return false;
        }else {
            $.ajax({
            method: "POST",
            url: "./src/usuario/cadastrar-post.php",
            data: { "titulo": titulo, "texto": texto},
        }).done(function (data) {
            var result = $.parseJSON(data);
            if (result == 1) {
                $(".alert").removeClass("alert-danger");
                $(".alert").removeClass("alert-warning");
                $(".alert").addClass("alert-success");

                $("#msgNotificacao").text('Notícia salva com sucesso! ');
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
    $("#titulo").val("");
    $("#texto").val("");
}
