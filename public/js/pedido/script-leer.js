$(document).ready(function(){
   cargar();
});
function cargar(){
     var tablaDatos = $("#datos");
   var route = URL_HOST+'medicosList';
   $("#datos").empty();
   $.get(route,function(resp){
       $(resp).each(function(key,value){
          tablaDatos.append("<tr><td>"+value.nombre_medico+"</td><td>"
            +value.consultorio+"</td><td>"
            +value.cedula+"</td><td>"
            +value.resumen+"</td><td>"
            +value.correo+"</td><td>"
            +value.telefono+"</td><td>"
            +value.direccion+"</td><td>"
            +value.especialidad.nombre_especialidad+"</td><td><td><button value="
            +value.id+" OnClick='mostrar(this);' class='btn btn-primary' data-toggle='modal' data-target='#myModal'>Editar</button><button class='btn btn-danger' value="
            +value.id+" OnClick='eliminar(this);'>Eliminar</button></td></tr>");
       });
   });
}
function mostrar(btn){
    var route = URL_HOST+'medicos/'+btn.value+'/edit';
    $.get(route,function(res){
         $("#id") .val(res.id);
        $("#nombre_medico") .val(res.nombre_medico);
        $("#consultorio") .val(res.consultorio);
        $("#cedula") .val(res.cedula);
        $("#resumen") .val(res.resumen);
        $("#correo") .val(res.correo);
        $("#telefono") .val(res.telefono);
        $("#direccion") .val(res.direccion);
        $("#especialidad_id") .val(res.especialidad_id);
        $("#id").val(res.id);
    });
}
$("#actualizar").click(function(){
    var id = $("#id").val();
    var nombre_medico = $("#nombre_medico").val();
    var consultorio = $("#consultorio").val();
    var cedula = $("#cedula").val();
    var resumen = $("#resumen").val();
    var correo  = $("#correo").val();
    var telefono = $("#telefono").val();
    var direccion = $("#direccion").val();
    var especialidad_id = $("#especialidad_id").val();
    route =  URL_HOST+"medicos/"+id+"";
    token = $("#token").val();
     $.ajax({
             url: route,
             headers: {'X-CSRF-TOKEN': token},
             type: 'PUT',
             dataType: 'json',
             data: {
                 nombre_medico: nombre_medico,
                 consultorio: consultorio,
                 cedula: cedula,
                 resumen: resumen,
                 correo: correo,
                 telefono: telefono,
                 direccion: direccion,
                 especialidad_id: especialidad_id
                },
             success: function(){
                 cargar();
                 $("#myModal").modal('toggle');
                  $('#msj-success').fadeIn();
             }
         });
});
function eliminar(btn){
    route =  URL_HOST+"medicos/"+btn.value;
    token = $("#token").val();
     $.ajax({
             url: route,
             headers: {'X-CSRF-TOKEN': token},
             type: 'DELETE',
             dataType: 'json',
             success: function(){
                 cargar();
                  $('#msj-success').fadeIn();
             }
         });
}