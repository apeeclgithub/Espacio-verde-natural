//******************************************MENU**//
$(function(){
    var btn_movil = $('#nav-mobile');
    var menu = $('#menu').find('ul');

    btn_movil.on('click', function(e){
        e.preventDefault();
        var el = $(this);
        el.toggleClass('nav-active');
        menu.toggleClass('open-menu');
    })
});
//*****************************************SLIDE**//
$(function() {
    $('.slides').slidesjs({
        width: 970,
        height: 500,
        start: 1,
        navigation: false,
        play: {
        auto: true,
        interval:4000
        },
        pagination:{
        active: false
        }
    });
});
  
//*****************************************CARRO**//

function agregar(id, cantidad, precio, nombre){
    var params = {
        'id' : id,
        'cantidad' : cantidad,
        'precio' : precio,
        'nombre' : nombre
    };
    $.ajax({
        url : 'Controller/functionCarrito.php?page=1',
        type : 'post',
        data : params,
        dataType : 'json'
    }).done(function(data){
        if(data.success==true){
            $("#carro").load('detalle-carro.php');
            $("#pedido").load('detalle-pedido.php');
            alertify.success("Carro actualizado.");
        }else{
            alertify.error("Producto no agregado.");
        }
    });
};
function borrar(id){
    var params = {
        'id' : id
    };
    $.ajax({
        url : 'Controller/functionCarrito.php?page=2',
        type : 'post',
        data : params,
        dataType : 'json'
    }).done(function(data){
        if(data.success==true){
            $("#carro").load('detalle-carro.php');
            $("#pedido").load('detalle-pedido.php');
            alertify.error("Producto eliminado exitosamente");
        }else{
            alertify.error("Producto no eliminado.");
        }
    });
};
function vaciar(){
    $.ajax({
        url : 'Controller/functionCarrito.php?page=3',
    }).done(function(data){
        $("#carro").load('detalle-carro.php');
        $("#pedido").load('detalle-pedido.php');
        alertify.error("Carro vaciado correctamente");
      
    });
};

//**************************************CONTACTO**//

function contacto(){
      var params = {
        'con_name'    : $('input[id=con_name]').val(),
        'con_email'   : $('input[id=con_email]').val(),
        'con_phone'   : $('input[id=con_phone]').val(),
        'con_message' : $('textarea[id=con_message]').val()
    };
    $.ajax({
        url : 'Controller/functionContacto.php',
        type : 'post',
        data : params,
        dataType : 'json'
    }).done(function(data){
        if(data.success==true){
            $('input[id=con_name]').val('');
            $('input[id=con_email]').val('');
            $('input[id=con_phone]').val('');
            $('textarea[id=con_message]').val('');
            alertify.success(data.msg);
        }else{
            alertify.error(data.msg);
        }
    });
}

//**************************************REGISTRO**//

function registro(){
      var params = {
        'reg_name'    : $('input[id=reg_name]').val(),
        'reg_email'   : $('input[id=reg_email]').val(),
        'reg_pass'    : $('input[id=reg_pass]').val(),
        'reg_day'     : $('select[id=reg_day]').val(),
        'reg_month'   : $('select[id=reg_month]').val(),
        'reg_year'    : $('select[id=reg_year]').val()
    };
    $.ajax({
        url : 'Controller/functionRegistro.php',
        type : 'post',
        data : params,
        dataType : 'json'
    }).done(function(data){
        if(data.success==true){
            $('input[id=reg_name]').val('');
            $('input[id=reg_email]').val('');
            $('input[id=reg_pass]').val('');
            alertify.success(data.msg);       
        }else{
            alertify.error(data.msg);
        }
    });
}

//*********************************INICIO SESION**//

function inicio_sesion(){
      var params = {
        'ini_mail'    : $('input[id=ini_mail]').val(),
        'ini_pass'    : $('input[id=ini_pass]').val()
    };
    $.ajax({
        url : 'Controller/functionInicio.php',
        type : 'post',
        data : params,
        dataType : 'json'
    }).done(function(data){
        if(data.success==true){
            location.href = data.pag;       
        }else{
            alertify.error(data.msg);
        }
    });
}

//********************************MODIFICA-DATOS**//

function modifica_datos(){
      var params = {
        'mod_name'    : $('input[id=mod_name]').val(),
        'mod_phone'   : $('input[id=mod_phone]').val(),
        'mod_pass'    : $('input[id=mod_pass]').val()
    };
    $.ajax({
        url : 'Controller/functionModificaDatos.php',
        type : 'post',
        data : params,
        dataType : 'json'
    }).done(function(data){
        if(data.success==true){
            alertify.success(data.msg);
        }else{
            alertify.error(data.msg);
        }
    });
}

//********************************MODIFICA-DIREC**//

function modifica_direc(){
      var params = {
        'mod_direccion'    : $('input[id=mod_direccion]').val(),
        'mod_comuna'    : $('input[id=mod_comuna]').val()
    };
    $.ajax({
        url : 'Controller/functionModificaDirec.php',
        type : 'post',
        data : params,
        dataType : 'json'
    }).done(function(data){
        if(data.success==true){
            alertify.success(data.msg);
        }else{
            alertify.error(data.msg);
        }
    });
}

function vermas($nombre){
    location.href=$nombre;
}

function ModiProd(){
    if($('select[id=ModiProd]').val() == 0){
        alertify.error('Seleccione un producto');
    }else{
    location.href='crud.php?crud=2&id='+$('select[id=ModiProd]').val();
    }
}
function ElimProd(){
    if($('select[id=ElimProd]').val() == 0){
        alertify.error('Seleccione un producto');
    }else{
    location.href='Controller/subir-producto.php?crud=3&id='+$('select[id=ElimProd]').val();
    }
}

//**************************************REGISTRO**//

function guardar(){ 
      var params = {
        'adm_nombre'    : $('input[id=adm_nombre]').val(),
        'adm_valor'   : $('input[id=adm_valor]').val(),
        'adm_categoria'    : $('select[id=adm_categoria]').val(),
        'adm_descripcion'     : $('textarea[id=adm_descripcion]').val(),
        'adm_imagen'   : $('input[id=adm_imagen]').val()
      }
    $.ajax({
        url : 'Controller/functionRegistro.php',
        type : 'post',
        data : params,
        dataType : 'json'
    }).done(function(data){
        if(data.success==true){
            $('input[id=reg_name]').val('');
            $('input[id=reg_email]').val('');
            $('input[id=reg_pass]').val('');
            alertify.success(data.msg);
        }else{
            alertify.error(data.msg);
        }
    });
}

$(document).ready(function(){
  
    $(".modal").fadeIn();
  
    $(".cerrar").click(function(){
      
        $(".modal").fadeOut(300);
      
    });

});