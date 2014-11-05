$(document).ready(function() {

//----------------------------------------------------------
//     JS registrar Variedades
//----------------------------------------------------------


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
                $('#select_sub').html(usuarios);
                $('#seleccionar_producto').html('<option value="seleccionar">Seleccionar SubGgrupo</option>');


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



            $('#nuevo_subgrupo').attr('readonly','readonly');
            // cambiar todos
           // $('#nuevo_subgrupo').attr('onClick','return false');

            $('#check_producto').attr('readonly','readonly');


        }else{
            $('#select_sub').removeAttr('disabled');
            $('#select_grupo').removeAttr('disabled');
            $('#seleccionar_producto').removeAttr('disabled');

            $("#nuevo_subgrupo").prop('checked', false);
            $("#check_producto").prop('checked', false);

            $('#nuevo_subgrupo').removeAttr('onClick');
            $('#check_producto').removeAttr('onClick');

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


//----------------------------------------------------------
//     JS registrar Productores 
//----------------------------------------------------------

// evento seleccionar informacion interes en productores.
$('#seleccionar_todos').click(function(){

    $("#asistencia_tecnica").prop('checked', true);
    $("#asociatividad_organizacion").prop('checked', true);
    $("#credito").prop('checked', true);
    $("#manejo_poscosecha").prop('checked', true);
    $("#precios_mercados").prop('checked', true);
    $("#que_cultivar").prop('checked', true);
    $("#tecnologias").prop('checked', true);
    $("#temas_ambientales").prop('checked', true);

});


// evento des marcar  toda  informacion de interes  en productores.
$('#quitar_todos').click(function(){

   $("#asistencia_tecnica").prop('checked', false);
    $("#asociatividad_organizacion").prop('checked', false);
    $("#credito").prop('checked', false);
    $("#manejo_poscosecha").prop('checked', false);
    $("#precios_mercados").prop('checked', false);
    $("#que_cultivar").prop('checked', false);
    $("#tecnologias").prop('checked', false);
    $("#temas_ambientales").prop('checked', false);


});
var contador = 1;
// obtener el valor del select variedades y verificar que no este en la lista para agregarlo
$('#agregar_variedad').click(function(){
    var prueba="pasa";
    var agregados =$('#agregar_variedades').val();
    $('#tabla_variedades tr').each(function () {
        var nombre_variedad = $(this).find("td").eq(0).html();
        if (nombre_variedad==agregados) {
            prueba="falso";
        };
    });
    if (prueba=="pasa") {
        $( "#tabla_variedades" ).append('<tr><td id="celEsp"  width="75%" style="padding-left:10px">'+ $('#agregar_variedades').val() +'</td><td id="celEsp" width="25%" style=" background-color:#FFF; text-align:center"><a type="button" class=" creado" id="eliminartrabla"><strong>Eliminar</strong></a><input style="display:none" type="text" value="'+ $('#agregar_variedades').val() +'" checked="true" name="variedad'+contador+'"></td></tr>');
        contador++;
    }else{
        alert('La variedade ya esta agregada');
    };
});

// evento de tipo delegado porque es a codigo que aparece despues de creada la pagina 
// camturando el di de la tabla ya creada como padre
$('#tabla_variedades').on('click','a.creado',function(e){
    e.preventDefault();
    $(this).parent().parent().remove();
});



//-------------------------------------------------------------------
//--------------------     JS Listar  Variedades --------------------
//-------------------------------------------------------------------


// ------------------------------------------
//      Ajax Filtrar Listado Variedades
//  ------------------------------------------
    var formulariolistar = $('.listar_ajax');
        formulariolistar.bind('submit',function () {
            $.ajax({
                type: formulariolistar.attr('method'),
                url: formulariolistar.attr('action'),
                data: formulariolistar.serialize(),
                beforeSend: function(){

                },
                complete: function(data){
                    
                },
                success: function (data) {
                    // ------------------------------------------
                    //      Resultado Filtro Dinamico
                    //  ------------------------------------------
                    $('#tabla_contenido tr').remove();
                    var tabla = '';
                    for(datos in data.vector){
                        tabla += '<tr>';
                        tabla +=  '<td id="celEsp" width="5%"> <input type="checkbox" name="eliminar[]"  value="'+data.vector[datos].id+'" ></td>';
                        tabla +=  '<td id="celEsp" width="17%">'+data.vector[datos].nombre_cadena+'</td>';
                        tabla +=  '<td id="celEsp" width="17%">'+data.vector[datos].nombre_grupo+'</td>';
                        tabla +=  '<td id="celEsp" width="17%">'+data.vector[datos].nombre_sub_grupo+'</td>';
                        tabla +=  '<td id="celEsp" width="17%">'+data.vector[datos].nombre_producto+'</td>';
                        tabla +=  '<td id="celEsp" width="17%">'+data.vector[datos].nombre_variedad+'</td>';
                        tabla +=  '<td id="celEsp" width="10%"> <button class="open" class="actualizar_variedad" >Actualizar</button> </td>';
                        tabla += '</tr>';
                    }
                    $("#tabla_contenido").append(tabla);

                },
                error: function(errors){
                    alert('no se ha creado');
                }
            });
       return false;
    });



$('.open').click(function(e){

      // alert($(this).attr("nombrevariedad"));

       $('#nombre_variedad').val($(this).attr("nombrevariedad"));
       $('#codigo_dane').val($(this).attr("codigodane"));


        $('#popup').fadeIn('slow');
        $('.popup-overlay').fadeIn('slow');
        $('.popup-overlay').height($(window).height());
        return false;
});
    
    $('#close').click(function(){
        $('#popup').fadeOut('slow');
        $('.popup-overlay').fadeOut('slow');
        return false;
    });




// Bloquea seleccionar grupo , sub grupo y producto 
//  para seleccionar solo una cadena 
    $('#select_cadena_filtro').change(function(){

        if ($('#select_cadena_filtro').val()=='seleccionar') {

            $('#select_grupo').removeAttr('disabled');
            $('#select_sub').removeAttr('disabled');
            $('#seleccionar_producto').removeAttr('disabled');

        }else{
            $('#select_grupo').attr('disabled','disabled');
            $('#select_sub').attr('disabled','disabled');
            $('#seleccionar_producto').attr('disabled','disabled');
        };

    });

// si se selecciona grupo sub grupo y producto bloquea cadena 
$('#select_grupo').change(function(){

        if ($('#select_grupo').val()=='seleccionar') {
            $('#select_cadena_filtro').removeAttr('disabled');
        }else{
            $('#select_cadena_filtro').attr('disabled','disabled');
        };

    });


 //mostrar producto al seleccionar subgrupos
    $('#cambiar_table').change(function(e){
        //alert($('#grupos').val());
        $('#cambiar_table').val();
        var url1='listarproductos' ;
       // alert(id_grupo);
        e.preventDefault();
        $.ajax({
            type: 'GET',
            url: url1,
            beforeSend: function(){
            },
            success: function (data) {
                $("#tabla_contenido").remove();
                var tabla = '<table width="100%" id="tabla_contenido"><tr><td id="celdas" width="5%"></td><td id="celdas" width="17%"><input type="text"></td><td id="celdas" width="17%"><select id="selectproductos">';
                    tabla += '<option value="seleccionar">Seleccionar Producto</option>';
                for(datos in data.productos){
                    tabla += '<option value="'+data.productos[datos].id+'">';
                    tabla +=  data.productos[datos].nombre_producto;
                    tabla += '</option>';
                }
                tabla+='</select></td><td id="celdas" width="17%"><select id="selectsubgrupo">';
                tabla += '<option value="seleccionar">Seleccionar SubGrupo</option>';
                for(datos in data.subgrupos){
                    tabla += '<option value="'+data.subgrupos[datos].id+'">';
                    tabla +=  data.subgrupos[datos].nombre_sub_grupo;
                    tabla += '</option>';
                }

                tabla+='</select></td><td id="celdas" width="17%"><select id="selectgrupo">';
                tabla += '<option value="seleccionar">Seleccionar Grupo</option>';
                for(datos in data.grupos){
                    tabla += '<option value="'+data.grupos[datos].id+'">';
                    tabla +=  data.grupos[datos].nombre_grupo;
                    tabla += '</option>';
                }

                tabla+='</select></td><td id="celdas" width="17%"><select id="selectcadena">';
                tabla += '<option value="seleccionar">Seleccionar Cadena</option>';
                for(datos in data.cadenas){
                    tabla += '<option value="'+data.cadenas[datos].id+'">';
                    tabla +=  data.cadenas[datos].nombre_cadena;
                    tabla += '</option>';
                }
                tabla+='</select></td></tr>';

                // Listar informacion
                for(datos in data.join){
                    tabla += '<option value="'+data.join[datos].id+'">';
                    tabla +=  data.join[datos].nombre_cadena;
                    tabla += '</option>';

                  
                }



                tabla+='</tabe>';



                 $("#contenedor_tabla").append(tabla);

                // var usuarios = '';    
                //     usuarios += '<option value="seleccionar">Seleccionar</option>';
                // for(datos in data.subgrupos){
                //     usuarios += '<option value="'+ data.subgrupos[datos].id+'">';
                //     usuarios +=  data.subgrupos[datos].nombre_producto ;
                //     usuarios += '</option>';
                // }

              

                // $('#seleccionar_producto').html(usuarios)
            },
                error: function(errors){
                    alert('no se ha creado');
                }
        })
    });


  // <table width="100%" id="tabla_contenido">
  //              <tr>
  //                   <td id="celdas" width="5%">
  //                   </td>
  //                  <td id="celdas" width="17%">
  //                       <input type="text">
  //                   </td>
  //                   <td id="celdas" width="17%">
  //                       {{ Form::select('cadena',array('Seleccionar Cadena'=>'Seleccionar Cadena' , $cadenas)) }}
  //                   </td>
  //                   <td id="celdas" width="17%">
  //                       {{ Form::select('grupo',array('Seleccionar Grupo'=>'Seleccionar Grupo' , $grupos)) }}
  //                   </td>
  //                   <td id="celdas" width="17%">
  //                       {{ Form::select('subgrupo',array('Seleccionar Sub Grupo'=>'Seleccionar Sub Grupo' , $subgrupos)) }}
  //                   </td>
  //                   <td id="celdas" width="17%">
  //                       {{ Form::select('producto', array('Seleccionar Producto'=>'Seleccionar Producto' ,$productos) ,array('id' => 'filtro_producto')) }}
  //                   </td>
  //                   <td id="celdas" width="10%">
  //                   </td>
  //              </tr>
               
  //           @foreach ($join as $p ) 
  //              <tr>
  //               <td id="celEsp" width="5%"><input type="checkbox" name=" {{ $p->id }} "></td>
  //                   <td id="celEsp"  width="17%">{{ $p->nombre_variedad }} </td>
  //                   <td id="celEsp" width="17%">{{ $p->nombre_cadena}}</td>
  //                   <td id="celEsp" width="17%">{{ $p->nombre_grupo}}</td>
  //                   <td id="celEsp" width="17%">{{ $p->nombre_sub_grupo}}</td>
  //                   <td id="celEsp" width="17%">{{ $p->nombre_producto}}</td>
  //                   <td id="celEsp" width="10%"> <button class='actualizar_variedad' >Actualizar</button> </td>
  //              </tr>
  //           @endforeach
  //           </table>



// fin archivo 
 });