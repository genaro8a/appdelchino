$('#registro').click(
        function(){
         var nombre_medico = $('#nombre_medico').val();
         var cedula = $('#cedula').val();
         var telefono = $('#telefono').val();
         var especialidad_id = $('#especialidad_id').val();
         var correo = $('#correo').val();
         var resumen = $('#resumen').val();
         var path = $('#path').val();

         var route = URL_HOST+'medicos';

         var token = $('#token').val();
         $.ajax({
             url: route,
             headers: {'X-CSRF-TOKEN': token},
             type: 'POST',
             dataType: 'json',
             data: {
                 nombre_medico: nombre_medico,
                 cedula : cedula,
                 telefono : telefono,
                 especialidad_id : especialidad_id,
                 correo : correo ,
                 resumen : resumen ,
                 path : path
                },
             success: function(){
                 $('#msj-success').fadeIn();
                 $('#nombre_medico').val('');
                 $('#cedula').val('');
                 $('#telefono').val('');
                 $('#especialidad_id').val('');
                 $('#correo').val('');
                 $('#resumen').val('');
                 $('#path').val('');
             },
            error: function(msj){
               console.log(msj.responseJSON.nombre);
               $("#msj").html(msj.responseJSON.nombre);
               $("#msj-error").fadeIn();
            }
         });
        });