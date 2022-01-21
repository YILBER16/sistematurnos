@extends('layouts.layout')
@section('contenido') 
<div class="container">
        <h1 class="text-center">Bienvenido</h1>
        <div class="row">
          <div class="col text-center">
              <button type="button" id="btnturnoregistrar" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#modal"> Tomar turno</button>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col text-center">
              <button type="button" id="btnregistrarusuario" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#modalregistro"> Registrar usuario</button>
          </div>
        </div>
    </div>
    @section('titulo_modal_agregar')
    <h5 class="modal-title">Tomar turno</h5>
    @endsection
    @section('cuerpo_modal_agregar')
    <form id="formagregar" class="form-horizontal col-md-12" method="post">
        {{csrf_field()}}
        @include('turnos.form')
        <div id="informacionturno"></div>
        @section('pie_modal_agregar')
        <button type="submit" id="btnagregar" class="btn btn-primary">Agregar</button>
    </form>
        @endsection
    @endsection
    @section('titulo_modal_registro')
    <h5 class="modal-title">Registro de usuario</h5>
    @endsection
    @section('cuerpo_modal_registro')
    <form id="formregistro" class="form-horizontal col-md-12" method="post">
        {{csrf_field()}}
        @include('turnos.formregistro')
        @section('pie_modal_registro')
        <button type="submit" id="btnregistro" class="btn btn-primary">Registrar</button>
    </form>
        @endsection
    @endsection
<script>
    $(document).on('click','#btnagregar', function(evt){
      evt.preventDefault();  
      Swal.fire({
        title: 'Esta seguro?',
        text: "Recuerde verificar el numero de documento!",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
                type:'post',
                url:"/turnos",
                data:$('#formagregar').serialize(),
                success:function(response){
                    console.log(response);
                  if(response=="No existe"){
                    Swal.fire({
                    icon: 'error',
                    title:'El usuario no se encuentra registrado!',
                    allowOutsideClick: false,
                    })
                  }else{
                    Swal.fire({
                    title: "<i>Turno generado</i>", 
                    html: '<div><b>Turno Nº '+response.id+'</b></div>'+
                          '<div><b>Turno '+response.tipo_turno+'</b></div>'+ 
                           '<div><b>Nº identificación '+response.id_usuario+'</b></div>'+  
                            '<div><b>Fecha '+response.created_at+'</b></div>',

                    confirmButtonText: "Imprimir", 
                    });
                  }
                },
                error:function(validator){
                  console.log(validator);
                  $.each(validator.responseJSON.errors, function(key, value){
                    Swal.fire({
                      icon: 'error',
                      title:'Corrija los siguientes errores!',
                      html: '<div><b>'+value[0]+'</b></div>',
                      allowOutsideClick: false,
                    })
                  });
                }
            });
        }
      })
    });

    $(document).on('click','#btnregistro', function(evt){
      evt.preventDefault();  
      Swal.fire({
        title: 'Esta seguro?',
        text: "Recuerde verificar los datos!",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
                type:'post',
                url:"/usuarios",
                data:$('#formregistro').serialize(),
                success:function(response){
                Swal.fire({
                    icon: 'success',
                    title:'Excelente, Usuario registrado!',
                    allowOutsideClick: false,
                })
                },
                error:function(validator){
                  console.log(validator);
                  $.each(validator.responseJSON.errors, function(key, value){
                    Swal.fire({
                      icon: 'error',
                      title:'Corrija los siguientes errores!',
                      html: '<div><b>'+value[0]+'</b></div>',
                      allowOutsideClick: false,
                    })
                  });
                }
            });
        }
      })
    });
    $(document).on('click','#btnturnoregistrar', function(evt){
      $('#id_usuario').val("");
      $('#tipo_turno').val("");
    });
    $(document).on('click','#btnregistrarusuario', function(evt){
      $('#id_documento').val("");
      $('#nom_usuario').val("");
      $('#edad').val("");
      $('#genero').val("");
    });
</script>
@endsection