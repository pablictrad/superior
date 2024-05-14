@extends('layout.app')



@section('ContenidoPrincipal')
<body class="lock-screen" onload="startTime()">

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="margin-left: 0px;margin-top:20px;">
          <!-- Content Header (Page header) -->
          <div class="content-header">
            <div class="container">
                <div class="alert alert-info alert-dismissible">
                    <h4><i class="icon fas fa-exclamation-triangle"></i> AVISO!</h4>
                    Usted esta por Cargar datos para: <b></b><br>
                    Crear una cuenta en el sistema de Nivel Superior.
                   
                </div>
              
            </div><!-- /.container-fluid -->
          </div>
          <!-- /.content-header -->
      
          <!-- Main content -->
          <div class="content">
            
            <div class="container  col-lg-12">
              <div class="row col-lg-12">
                
                  
                  <div class="card card-info  col-lg-12">
                    <a  href="/" class=" btn-outline-info"  title="Volver a buscar por CUE" >
                        <span class="material-symbols-outlined">
                            reply_all
                        </span> VOLVER
                    </a><br>
                     <!-- Main content -->
            <section class="content col-lg-12">
              <div class="container-fluid col-lg-12">
                  <!-- Buscador Agente -->
                  <h4 class="text-center display-4">Solicitar Clave</h4>
                  <!-- Agregar Nuevo Agente -->
                  <div class="row">
                      <!-- left column -->
                      <div class="col-lg-12">
                          <!-- general form elements -->
                          <div class="card card-green col-lg-12">
                              <div class="card-header">
                                  <h3 class="card-title">
                                      Crear Usuario
                                  </h3>
                              </div>
                              <!-- /.card-header -->
                              <!-- form start -->
                          
                              <form method="POST" action="{{ route('crearregistro') }}" class="formularioNuevoUsuario form-group">
                              @csrf
                                  <div class="card-body" id="NuevoAgenteContenido1" style="display:visible">
                                      <!-- Fila Apellido, Nombre y Sexo -->
                                      <div class="form-group row">
                                        <div class="col-4">
                                          <label for="dni">DNI (Sin Puntos): </label>
                                          <input type="text" autocomplete="off" class="form-control" id="dni" name="Documento" placeholder="Ingrese su Número de Documento"  value="">
                                      </div>
                                          <div class="col-4">
                                              <label for="Nombre">Nombre Completo: </label>
                                              <input type="text" autocomplete="off" class="form-control" id="Nombre" name="nombre" placeholder="Ingrese su nombre"  value="">
                                          </div>
                                          <div class="col-4">
                                            <label for="Nombre">Apellido: </label>
                                            <input type="text" autocomplete="off" class="form-control" id="Apellido" name="apellido" placeholder="Ingrese su apellido"  value="">
                                        </div>
                                          <div class="col-4">
                                             
                                          </div>
                                          
                                          <div class="form-group">
                                          </div>
                                          
                                      </div>

                                      <!-- Fila CUIL, Tipo de Agente -->
                                      <div class="form-group row">
                                        <div class="col-3">
                                            <label for="Correo">Correo Electronico: </label>
                                            <input type="email" autocomplete="off" class="form-control" id="Correo" name="correo" placeholder="Ingrese Correo Electronico" required="true">
                                        </div>
                                          <div class="col-3">
                                              <label for="Clave">Clave: </label>
                                              <input type="text" autocomplete="off" class="form-control" id="Clave" name="clave" placeholder="Ingrese una clave para autenficarse" required="true">
                                          </div>
                                           
                                          <div class="col-3">
                                           
                                          </div>
                                  </div>
                                  <div class="form-group">
                                    <button class="btn btn-block btn-success btn-lg" type="submit">
                                        <i class="fa fa-arrow-right">ENVIAR</i>
                                    </button>
                                  </div>
                                  <!-- /.card-body -->
                                 
                              </form>
                          </div>
                          <!-- /.card -->
                      </div>
                  <!-- /.row -->
              </div><!-- /.container-fluid -->
       

              
          </section>
          <!-- /.content -->
                    <!-- /.card-body -->
                  </div>
              </div>
            
            
            </div><!-- /.container-fluid -->
          </div>
          <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
      

@endsection

@section('Script')
  <script>
        function startTime()
        {
            var today=new Date();
            var h=today.getHours();
            var m=today.getMinutes();
            var s=today.getSeconds();
            // add a zero in front of numbers<10
            m=checkTime(m);
            s=checkTime(s);
            document.getElementById('time').innerHTML=h+":"+m+":"+s;
            t=setTimeout(function(){startTime()},500);
        }

        function checkTime(i)
        {
            if (i<10)
            {
                i="0" + i;
            }
            return i;
        }
     </script>

        <script src="{{ asset('js/funcionesvarias.js') }}"></script>
        @if (session('ConfirmarNuevoUsuario')=='OK')
          <script>
            Swal.fire(
                'Excelente',
                'Registro Creado Correctamente!!',
                'success'
                    )
          </script>
        @endif

        @if (session('ConfirmarNuevoUsuarioError')=='OK')
          <script>
            Swal.fire(
              'Registro Cancelado',
              'Ya Existe Ese DNI!!. Por favor, Inicie sesión en la pantalla principal del sistema.',
              'error'
                  )
          </script>
        @endif
   

 <script>
    $('.formularioNuevoUsuario').submit(function(e){
      if(
        $("#Correo").val()=="" ||  $("#Clave").val()==""){
        console.log("error")
         e.preventDefault();
          Swal.fire(
            'Error',
            'No se pudo agregar, hay datos incompletos',
            'error'
                )
      }else{
        e.preventDefault();
        Swal.fire({
            title: 'Esta seguro de crear la cuenta de usuario?',
            text: '',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, crear el registro!'
          }).then((result) => {
            if (result.isConfirmed) {
              this.submit();
              //prueba();
            }
          })
      }
    })
  </script>
@endsection
