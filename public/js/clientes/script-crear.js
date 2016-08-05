$("#registro").click(
    function(){
    var dato1 = $("#nombre_cliente").val();
    var dato2 = $("#apellido_cliente").val();
    var dato3 = $("#cedula_ruc").val();
    var dato4 = $("#direccion").val();
    var dato5 = $("#correo").val();
    var dato6 = $("#telefono").val();
    var dato7 = $("#password").val();
    var route = "http://localhost:8000/cliente";
    var token = $("#token").val();
    $.ajax({
             url: route,
             headers: {'X-CSRF-TOKEN': token},
             type: 'POST',
             dataType: 'json',
             data: {
                 nombre_cliente: dato1,
                 apellido_cliente: dato2,
                 cedula_ruc: dato3,
                 direccion: dato4,
                 correo: dato5,
                 telefono: dato6,
                 password: dato7
                },
             success: function(){
                 $('#msj-success').fadeIn();
             },
         });
});