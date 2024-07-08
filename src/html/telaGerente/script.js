$("#excluir").on("click", () => {
    $("#excluir_form").css("display", "block")
    $("#alterar_form").css("display", "none")
})
$("#alterar").on("click", () => {
    $("#alterar_form").css("display", "block")
    $("#excluir_form").css("display", "none")
})

$("#excluir_sala").on("click", () => {
    $("#excluir_sala_form").css("display", "block")
    $("#alterar_sala_form").css("display", "none")
})
$("#alterar_sala").on("click", () => {
    $("#alterar_sala_form").css("display", "block")
    $("#excluir_sala_form").css("display", "none")
})

$("#curso").on("change", () => {
    var curso_alterado = $("#curso").val()
    $.ajax({
        type: "Post",
        url: "../../php/controle/administrar_info.php",
        data: {curso_alterado: curso_alterado},
        success: function (response) {
            console.log("deu certo, curso alterado")
        }, error: function (error) {
            console.log("erro"+ error)
        }
    }).done(function (data) { 
        $('#info').html(data)
    });

})

$("#sala_alterado").on("change", () => {
    var sala_alterado = $("#sala_alterado").val()
    $.ajax({
        type: "Post",
        url: "../../php/controle/administrar_sala_info.php",
        data: {sala_alterado: sala_alterado},
        success: function (response) {
            console.log("deu certo, sala alterado")
        }, error: function (error) {
            console.log("erro"+ error)
        }
    }).done(function (data) { 
        $('#info_sala').html(data)
    });

})