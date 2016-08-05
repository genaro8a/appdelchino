$(document).ready(function(){
   cargar();
});
function cargar(){
     var tablaDatos = $("#datos");
   var route = URL_HOST+'listarClientes';
   $("#datos").empty();
   $.get(route,function(resp){
       $(resp).each(function(key,value){
          tablaDatos.append("<tr><td>"+value.nombre_cliente+"</td><td>"
            +value.apellido_cliente+"</td><td>"
            +value.cedula_ruc+"</td><td>"
            +value.direccion+"</td><td>"
            +value.user.email+"</td><td>"
            +value.telefono+"</td><td><td><button value="
            +value.id+" OnClick='mostrar(this);' class='btn btn-primary' data-toggle='modal' data-target='#myModal'>Editar</button><button class='btn btn-danger' value="
            +value.id+" OnClick='eliminar(this);'>Eliminar</button></td></tr>");
       });
   });
}
function mostrar(btn){
    var route = URL_HOST+'cliente/'+btn.value+'/edit';
    $.get(route,function(res){
         $("#id") .val(res.id);
        $("#nombre_cliente") .val(res.nombre_cliente);
        $("#apellido_cliente") .val(res.apellido_cliente);
        $("#cedula_ruc") .val(res.cedula_ruc);
        $("#direccion") .val(res.direccion);
        $("#telefono") .val(res.telefono);
        $("#id").val(res.id);
    });
}
$("#actualizar").click(function(){
    var id = $("#id").val();
    var nombre_cliente = $("#nombre_cliente").val();
    var apellido_cliente = $("#apellido_cliente").val();
    var cedula_ruc = $("#cedula_ruc").val();
    var direccion = $("#direccion").val();
    var telefono  = $("#telefono").val();
    route =  URL_HOST+"ActualizarMedico"
    token = $("#token").val();
     $.ajax({
             url: route,
             headers: {'X-CSRF-TOKEN': token},
             type: 'POST',
             dataType: 'json',
             data: {
                id: id,
                 nombre_cliente: nombre_cliente,
                 apellido_cliente: apellido_cliente,
                 cedula_ruc: cedula_ruc,
                 direccion: direccion,
                 telefono: telefono
                },
             success: function(){
                 cargar();
                 $("#myModal").modal('toggle');
                  $('#msj-success').fadeIn();
             }
         });
});
function eliminar(btn){
    var id =btn.value ;
    route =  URL_HOST+"eliminarCliente"
    token = $("#token").val();
     $.ajax({
             url: route,
             headers: {'X-CSRF-TOKEN': token},
             type: 'POST',
             dataType: 'json',
             data: {
                id: id
                },
             success: function(){
                cargar();
                  $('#msj-success').fadeIn();
             }
         });
}