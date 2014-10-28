$(document).ready(function() {


     //petición al enviar el formulario de registro
    var form = $('.register_ajax');
        form.bind('submit',function () {
            $.ajax({
                type: form.attr('method'),
                url: form.attr('action'),
                data: form.serialize(),
                beforeSend: function(){

                },
                complete: function(data){
                    
                },
                success: function (data) {
                  alert('Resultado:'+ data.resultado);
                },
                error: function(errors){
                    alert('no se ha creado');
                }
            });
       return false;
    });
    
    
    //mostrar sub grupos al seleccionar grupo
    $('#select_grupo').change(function(e){
        //alert($('#grupos').val());
        var url1='filtrar_subgrupos/'+$('#select_grupo').val()+'/' ;

       // alert(id_grupo);
        e.preventDefault();
        $.ajax({
            type: 'GET',
            url: url1,
            beforeSend: function(){
               // $('.preload_users').html('<img src="imgs/350.gif" />');
            },
            success: function (data) {
                //$('.preload_users').html('');
                //$('.load_ajax').html(usuarios)
                var usuarios = '';  
                    usuarios += '<option value="seleccionar">Seleccionar</option>';
                for(datos in data.subgrupos){
                    usuarios += '<option value="'+ data.subgrupos[datos].id+'">';
                    usuarios +=  data.subgrupos[datos].nombre_sub_grupo ;
                    usuarios += '</option>';
                }
                $('#select_sub').html(usuarios)
            }
        })
    });

    //mostrar producto al seleccionar subgrupos
    $('#select_sub').change(function(e){
        //alert($('#grupos').val());
        var url1='filtrar_productos/'+$('#select_sub').val()+'/' ;

       // alert(id_grupo);
        e.preventDefault();
        $.ajax({
            type: 'GET',
            url: url1,
            beforeSend: function(){
               // $('.preload_users').html('<img src="imgs/350.gif" />');
            },
            success: function (data) {
                //$('.preload_users').html('');
                //$('.load_ajax').html(usuarios)
                var usuarios = '';    
                    usuarios += '<option value="seleccionar">Seleccionar</option>';
                for(datos in data.subgrupos){
                    usuarios += '<option value="'+ data.subgrupos[datos].id+'">';
                    usuarios +=  data.subgrupos[datos].nombre_producto ;
                    usuarios += '</option>';
                }
                $('#seleccionar_producto').html(usuarios)
            }
        })
    });





// Funcion al seleccionar nuevo Grupo
    $("#nuevo_grupo").change(function() { 
        if($("#nuevo_grupo").is(':checked')) {  
            $('#select_sub').attr('disabled','disabled');
            $('#select_grupo').attr('disabled','disabled');
            $('#seleccionar_producto').attr('disabled','disabled');


            $("#nuevo_subgrupo").prop('checked', true);
            $("#check_producto").prop('checked', true);

            // requiere el campos 
            $('#nuevo_producto').attr('required','required');
            $('#nombre_subgrupo').attr('required','required');
            $('#nombre_grupo').attr('required','required');



            //$('#nuevo_subgrupo').attr('disabled','disabled');
            //$('#check_producto').attr('disabled','disabled');


        }else{
            $('#select_sub').removeAttr('disabled');
            $('#select_grupo').removeAttr('disabled');
            $('#seleccionar_producto').removeAttr('disabled');

            $("#nuevo_subgrupo").prop('checked', false);
            $("#check_producto").prop('checked', false);

            $('#nuevo_subgrupo').removeAttr('disabled');
            $('#check_producto').removeAttr('disabled');

            $('#nuevo_producto').removeAttr('required');
            $('#nombre_subgrupo').removeAttr('required');
            $('#nombre_grupo').removeAttr('required');


        }
    }); 

    // Funcion al seleccionar nuevo Sub Grupo
    $("#nuevo_subgrupo").change(function() { 
        if($("#nuevo_subgrupo").is(':checked')) { 

            $('#select_sub').attr('disabled','disabled');
            $('#seleccionar_producto').attr('disabled','disabled');
            $("#check_producto").prop('checked', true);

            // requiere el campos 
            $('#nuevo_producto').attr('required','required');
            $('#nombre_subgrupo').attr('required','required');
            //$('#check_producto').attr('disabled','disabled');


        }else{
            $('#select_sub').removeAttr('disabled');
            $('#seleccionar_producto').removeAttr('disabled');
            $("#check_producto").prop('checked', false);
            $('#check_producto').removeAttr('disabled');

            $('#nuevo_producto').removeAttr('required');
            $('#nombre_subgrupo').removeAttr('required');

            

        }
    }); 

    // Funcion al seleccionar nuevo producto
    $("#check_producto").change(function() { 
        if($("#check_producto").is(':checked')) { 
            $('#seleccionar_producto').attr('disabled','disabled');
            $('#nuevo_producto').attr('required','required');


        }else{
            $('#seleccionar_producto').removeAttr('disabled');
            $('#nuevo_producto').removeAttr('required');

            
        }
    }); 


    // Funcion al seleccionar cadenas
    $("#check_cadena").change(function() { 
        if($("#check_cadena").is(':checked')) { 
            $('#select_cadena').attr('disabled','disabled');
            $('#nombre_cadena').attr('required','required');


        }else{
            $('#select_cadena').removeAttr('disabled');
            $('#nombre_cadena').removeAttr('required');

            
        }
    }); 


 });