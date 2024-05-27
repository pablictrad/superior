<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('Titulo')</title>
  <link rel="icon" href="dist/img/logo.png" type="image/png">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  {{-- <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}"> --}}
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
  <!--Style dropzone subir doc-->
  <link rel="stylesheet" href="{{ asset('plugins/dropzone/min/dropzone.min.css') }}">

  <!--Style Bootstrap-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <!--Style MaterialGoogle-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20,400,0,0" />
  <!--CSS personalizados-->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style_vincular.css') }}">
  <link rel="stylesheet" href="{{ asset('css/reloj.css') }}">
  @yield('LinkCSS')
  <meta name="csrf-token" content="{{csrf_token()}}">
  {{-- control para ancho de select --}}
  <style>
    .custom-select option{
        width: 723px; /* Ancho máximo inicial */
        max-width: 100%; /* Limita el ancho máximo al tamaño del contenedor */
        overflow-x: auto;  /* Oculta el desbordamiento de contenido */
    }
  </style>
</head>
<!--BODY-->
@if(session('Validar') !="")
<body class=" sidebar-mini layout-fixed ">
{{-- <div class="loader"></div>  --}}

<div class=""> <!-- Aquí era así <div class="wrapper"> -->
  
  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('dist/img/Spinner-3.gif') }}" alt="NIVEL SUPERIOR" height="60" width="60">
  </div>

  <!--bandeja principal-->
  <nav class="main-header navbar navbar-expand navbar-light brand-text font-weight-bold" style="background-color: rgb(244, 244, 202)">
   
    <ul class="navbar-nav align-items-center" >
      <li class="nav-item"> <a href="#" class="nav-link" data-widget="pushmenu" role="button"><i class="fas fa-bars"></i></a></li>
      <li class="nav-item d-none d-sm-inline-block">
       
        
        <a href="#" class="nav-link h6">
          <?php
            if(isset($mensajeNAV))
            {
              echo $mensajeNAV;
            }else{
            
            }
            ?>
        </a>
       
      </li>
    </ul>
    <a style="justify-content: flex-end; padding-left: 70%;"  href="{{route('Salir')}}" class="nav-link">
      <i style="color:rgb(5, 179, 83); " class="fa fa-power-off"> Cerrar</i>         
    </a>
   
    </nav>
   
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4" style="background-color: rgb(244, 244, 202)">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ asset('dist/img/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span style="color: black;" class="brand-text font-weight-bold">{{session('NombreModo')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="background-color: hsl(64, 44%, 88%);">
      <!-- Sidebar user panel (optional) -->
      <div style="background-color: rgb(176, 243, 206); padding-top:4%; margin: -2%;" class="user-panel mt-3 pb-3 mb-3 d-flex" >
        <div class="image">
          <img src="{{ asset('dist/img/user6-128x128.jpg') }}" class="img-circle elevation-2" alt="User Image" />
        </div>
        <div class="info" >
          <span style="color:black;"  class="brand-text font-weight-bold">{{session('Usuario')}}</span>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      
          <li class="nav-item">
            <a href="{{route('Bandeja')}}" class="nav-link">
              <i class="nav-icon fas fa-home" style="color:  rgb(5, 179, 83);">
                <span style="color: black; font-weight: bold">
                  Inicio
                </span>
              </i>             
            </a>
          </li>
          <!--usuario docente superior-->
          @if (session('Modo')==7)
          <li class="nav-item menu-is-opening menu-open">
            @php
              $ag=DB::table('tb_usuarios')
              ->join('tb_agentes','tb_agentes.Documento','=','tb_usuarios.Agente')
              ->where('idUsuario',session('idUsuario'))
              ->first();              
            @endphp
           <a href="#" class="nav-link">
               <i class="nav-icon fas fa-copy" style="color: rgb(5, 179, 83);">
                  <span style="color: black; font-weight: bold">
                    Mis Datos                   
                  </span>   
               </i>                     
            </a>
            <ul class="nav nav-treeview">       
              <li class="nav-item">
                <a href="{{route('editarAgente',$ag->idAgente)}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-pink"></i>
                  <p style="color: black; font-weight: bold">Datos Personales</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-is-opening menu-open">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy" style="color:rgb(5, 179, 83);">
                  <span style="color: black; font-weight: bold">
                    Zona                 
                  </span>
                </i>
                <i class="fas fa-angle-left right"></i>            
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('editarZona',$ag->idAgente)}}" class="nav-link">
                    <i class="nav-icon far fa-circle text-pink"></i>
                    <p style="color: black; font-weight: bold">Solicitar Cambio de Zona</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('verdocuZona',$ag->idAgente)}}" class="nav-link">
                    <i class="nav-icon far fa-circle text-success"> </i> 
                      <p style="color: black; font-weight: bold">Ver Documentación Zona</p>
                                    
                  </a>                 
                </li>            
              
             </ul>
           </li>
          <li class="nav-item menu-is-opening menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy" style="color: rgb(5, 179, 83);">
                <span style="color: black; font-weight: bold">
                  Mi Documentación               
                </span>
              </i>              
              <i class="fas fa-angle-left right"></i>
            </a>
            <ul class="nav nav-treeview">
               <li class="nav-item">
                <a href="{{route('editarAgente',$ag->idAgente)}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-pink"></i>
                  <p style="color: black; font-weight: bold">Títulos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('editarAgente',$ag->idAgente)}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-warning"></i>
                  <p style="color: black; font-weight: bold">Certificados</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('editarAgente',$ag->idAgente)}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-success"></i>
                  <p style="color: black; font-weight: bold">F2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('editarAgente',$ag->idAgente)}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-warning"></i>
                  <p style="color: black; font-weight: bold">Certificación de Servicios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('editarAgente',$ag->idAgente)}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-info"></i>
                  <p style="color: black; font-weight: bold">Concepto</p>
                </a>
              </li>
           
            </ul>
          </li>
          <li class="nav-item menu-is-opening menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy" style="color:rgb(5, 179, 83);">
                <span style="color: black; font-weight: bold">
                  Mis Inscripciones               
                </span>
              </i>             
              <i class="fas fa-angle-left right" style="color: rgb(50, 205, 128);"></i>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('inscripcion',$ag->idAgente)}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-red"></i>
                  <p style="color: black; font-weight: bold">Altas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('editarAgente',$ag->idAgente)}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-blue"></i>
                  <p style="color: black; font-weight: bold">Bajas</p>
                </a>
              </li>
             {{-- <i class="far fa-circle nav-icon"></i>
              <li class="nav-item">
                <a href="{{route('ver_novedades_licencias')}}" class="nav-link">
                <p>Licencias</p>
                </a>
              </li> --}}
              {{-- <li class="nav-item">
                <a href="{{route('generar_pdf_novedades')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Generar PDF de Novedades</p>
                </a>
              </li> --}}
              {{-- <li class="nav-item">
                <a href="{{route('buscar_dni_cue')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Consulta Temporal - Borrar</p>
                </a> --}}
              </li>
            </ul>
          </li>
        @endif
          <!--fin usuario docente superior-->
        
          <!--inicio usuario Administrador superior-->

        @if (session('Modo')==8)
        @php
          $ag=DB::table('tb_usuarios')
          ->join('tb_agentes','tb_agentes.Documento','=','tb_usuarios.Agente')
          ->where('idUsuario',session('idUsuario'))
          ->first();        
        @endphp
        <li class="nav-item menu-is-opening menu-open">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy" style="color: rgb(5, 179, 83);">
              <span style="color: black; font-weight: bold">
                Mis Datos                   
              </span>   
            </i>        
            <i class="fas fa-angle-left right"></i>     
          </a>
          <ul class="nav nav-treeview">
            {{-- <li class="nav-item">
              <a href="{{route('verSubOrg')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Instituci&oacuten</p>
              </a>
            </li> --}}
            <li class="nav-item">
              <a href="{{route('editarAgente',$ag->idAgente)}}" class="nav-link">
                <i class="nav-icon far fa-circle text-blue"></i>
                <p style="color: black; font-weight: bold">Datos Personales</p>
              </a>
            </li>
           
            
          </ul>
        </li>
        <li class="nav-item menu-is-opening menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy" style="color:rgb(5, 179, 83);">
                <span style="color: black; font-weight: bold">
                 Docentes              
                </span>
              </i>
              <i class="fas fa-angle-left right"></i>            
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('ver_novedades_altas')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-pink"></i>
                  <p style="color: black; font-weight: bold">Con Legajo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('ver_novedades_bajas')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-success"> </i> 
                    <p style="color: black; font-weight: bold">Sin Legajo</p>
                                  
                </a>                 
              </li>            
            
           </ul>
         </li>
        <li class="nav-item menu-is-opening menu-open">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy" style="color: rgb(5, 179, 83);">
              <span style="color: black; font-weight: bold">
               clasificación              
              </span>
            </i>              
            <i class="fas fa-angle-left right"></i>
          </a>
          <ul class="nav nav-treeview">
             <li class="nav-item">
              <a href="{{route('nuevoAgente')}}" class="nav-link">
                <i class="nav-icon far fa-circle text-pink"></i>
                <p style="color: black; font-weight: bold">Títulos</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('verArbolServicio')}}" class="nav-link">
                <i class="nav-icon far fa-circle text-warning"></i>
                <p style="color: black; font-weight: bold">Certificados</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('verArbolServicio2')}}" class="nav-link">
                <i class="nav-icon far fa-circle text-success"></i>
                <p style="color: black; font-weight: bold">F2</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('verArbolServicio2')}}" class="nav-link">
                <i class="nav-icon far fa-circle text-warning"></i>
                <p style="color: black; font-weight: bold">Certificación de Servicios</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('verArbolServicio2')}}" class="nav-link">
                <i class="nav-icon far fa-circle text-info"></i>
                <p style="color: black; font-weight: bold">Concepto</p>
              </a>
            </li>
         
          </ul>
        </li>
        <li class="nav-item menu-is-opening menu-open">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy" style="color:rgb(5, 179, 83);">
              <span style="color: black; font-weight: bold">
                Llamados              
              </span>
            </i>             
            <i class="fas fa-angle-left right" style="color: rgb(50, 205, 128);"></i>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('ver_novedades_altas')}}" class="nav-link">
                <i class="nav-icon far fa-circle text-red"></i>
                <p style="color: black; font-weight: bold">Altas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('ver_novedades_bajas')}}" class="nav-link">
                <i class="nav-icon far fa-circle text-blue"></i>
                <p style="color: black; font-weight: bold">Bajas</p>
              </a>
            </li>
           {{-- <i class="far fa-circle nav-icon"></i>
            <li class="nav-item">
              <a href="{{route('ver_novedades_licencias')}}" class="nav-link">
              <p>Licencias</p>
              </a>
            </li> --}}
            {{-- <li class="nav-item">
              <a href="{{route('generar_pdf_novedades')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Generar PDF de Novedades</p>
              </a>
            </li> --}}
            {{-- <li class="nav-item">
              <a href="{{route('buscar_dni_cue')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Consulta Temporal - Borrar</p>
              </a> --}}
            </li>
          </ul>
        </li>
        @endif
        
       {{-- fin admin superior--}}

        @if (session('Modo')==1)
        {{-- admin --}}
        
          <li class="nav-item menu-is-opening menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Panel del Administrador
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"><!--aqui algo--></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('nuevoUsuario')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Crear Agente Nuevo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('usuariosLista')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buscar y Administrar Usuarios</p>
                </a>
              </li>
              
            </ul>
          </li> 
          <li class="nav-item menu-is-opening menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Movimientos en CUE
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"><!--aqui algo--></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('ver_novedades_cues')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lista Rapida</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{route('buscar_dni_cue')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Consulta Temporal - Borrar</p>
                </a>
              </li>
            </ul>
          </li>         
        @endif

        @if (session('Modo')==3)
        {{-- admin Jr --}}
        
          <li class="nav-item menu-is-opening menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Panel de Técnicos
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"><!--aqui algo--></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('nuevoUsuario')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Controlar Nuevos Agentes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('nuevoUsuario')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ver Instituciones / Datos</p>
                </a>
              </li>
              
            </ul>
          </li>          
        @endif 
          <li class="nav-header" style="color: black; font-weight: bold">Opciones</li>
          <li class="nav-item">
            <a href="{{route('Salir')}}" class="nav-link">
              <i style="color:rgb(5, 179, 83);" class="fa fa-power-off"></i>
              <p style="color: black; font-weight: bold">
                Salir
                <span class="badge badge-info right"><!--aqui algo--></span>
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
@else
  
@endif
  <!-- Content Wrapper. Contains page content -->
    <!-- Main content -->
    <section class="content">
      
      <div class="container-fluid">
        @yield('ContenidoPrincipal')    
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  <!-- /.content-wrapper -->



   
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<script src="{{ asset('js/arbol.js')}}"></script>
<script src="{{ asset('js/funcionesvarias.js') }}"></script>
<script src="{{ asset('js/reloj.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Toastr -->
<script src="{{ asset('plugins/toastr/toastr.min.js')}}"></script>
<!--subir doc-->
<script src="{{ asset('plugins/dropzone/min/dropzone.min.js')}}"></script>
<script src="{{ asset('js/subirDoc.js') }}"></script>

@yield('Script')
<script type="text/javascript">
    $(window).on('load', function(){
      $(".loader").fadeOut("slow")
    })
</script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)')
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    })
  })
</script>
</body>
</html>