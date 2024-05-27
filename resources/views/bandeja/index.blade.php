@extends('layout.app')

@section('Titulo', 'ProfRegLR - Principal')

@section('ContenidoPrincipal')
@php
    //dd("aqui0");
@endphp
<section id="container" >
    <section id="main-content">
        <section class="wrapper">
            {{-- bandeja principal superior --}}
            <div class="content-wrapper" style="min-height: 607px;">
                    
                <!-- Main content -->
                <section class="content">
      
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-12">                
                        
      <div class="wrapper">
      <div class="row" style="margin-top: -12%; font-weight: bold; text-align: justify; font-family: 'Times New Roman', Times, serif;">
       
            <div class="alert alert-info alert-dismissible" style="padding: 2%;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h5 style="font-weight: bold; color:blue;"><i class="icon fas fa-info"style="font-weight: bold; color:blue;"></i>Información Importante!</h5>
              La inscripción tiene carácter de declaración jurada y los datos consignados es responsabilidad exclusiva del postulante.
              NO SE ACEPTARÁ DOCUMENTACIÓN POR FUERA DE ESTA INSCRIPCIÓN (YA SEA ONLINE O FORMATO PAPEL).<br/>
              A tener en cuenta al inscribirse:
              <ol>
                    <li> Presentar F2, detallando todos los Institutos y/o Establecimientos que presta servicios, DEBE ESTAR FIRMADA POR EL DIRECTOR DE LOS INSTITUTOS Y/O COLEGIOS QUE DETALLA.</li>
                    <li>Toda la documentación presentada debe estar debidamente autenticada por Juez de Paz Lego, Escribano Público o Supervisor de Nivel de la Zona.</li>
                    <li>La validez de la constancia de título en trámite es de 1 (uno) año, vencido este plazo debe renovar la constancia o presentar el título registrado en la provincia.</li>
                    <li>La fotocopia de DNI debe estar certificada en el Registro Civil.</li>
                    <li>No se valorará la presentación del Titulo sin Registro Provincial.</li>
                    <li>Los datos personales consignados,son de exclusiva responsabilidad del docente.</li>
                    <li>Los conceptos no son acumulativos al momento de la clasificación, siendo válidos solo para el Instituto que lo emitió.</li>
                    <li>La clasificación de los títulos que no son para el Nivel,  serán exhibidos sin su  puntaje, estando igualmente clasificados en el legajo.</li>
                    <li>Los reclamos que surjan sobre el Listado de Orden de Mérito para una determinada Unidad Curricular/ Cargo, serán recepcionados en la Institución convocante dentro de las 48hs. de exhibido el LOM; luego de ese periodo se considerará extemporáneo.</li>
                    <li>La Comisión es independiente de la JUETAENO, lo que implica Legajos distintos.</li>
                    <li>Una vez cerrada la convocatoria no se recibirán documentación de ninguna naturaleza, dicha documentación remanente podrá ser adjuntada en próximas inscripciones.</li>
              </ol>
            </div>
       
        </div>
          <div class="row">        
              <div class="col-md-12">                 
                  <div class="row" style="padding-top: 20px; padding-left: 40px; margin-left: 40px;">
                      <div class="card-body small-box bg-warning col-md-3" style="padding-top: 20px; padding-left: 40px; margin-left: 40px;">
                          <div class="inner">
                              <h5 style="font-weight: bold; color:blue;">Llamado: Perfil<sup ></sup></h5>    
                              <p style="text-align: center; font-weight: bold">Zona - Dpto</br>
                              Instituto</br>
                              Carrera</p>
                          </div>
                          <div class="icon">
                              <i class="far fa-calendar-alt"></i>
                              <p style="font-weight: bold; color:black;">Fecha:</p>
                          </div>
                      </div>                    
                      <div class="card-body small-box bg-pink col-3" style="padding-top: 20px; padding-left: 40px; margin-left: 40px;">
                            <h5 style="font-weight: bold; color:white;">Llamado: Perfil<sup ></sup></h5>    
                            <p style="text-align: center; font-weight: bold">Zona - Dpto</br>
                            Instituto</br>
                            Carrera</p>
                          <div class="icon">
                              <i class="far fa-calendar-alt"></i>
                              <p style="font-weight: bold; color:white;">Fecha:</p>
                          </div>                   
                      </div>
                      <div class="card-body small-box bg-success col-3" style="padding-top: 20px; padding-left: 40px; margin-left: 40px;">
                            <h5 style="font-weight: bold; color:white;">Llamado: Perfil<sup ></sup></h5>    
                            <p style="text-align: center; font-weight: bold">Zona - Dpto</br>
                            Instituto</br>
                            Carrera</p>
                          <div class="icon">
                              <i class="far fa-calendar-alt"></i>
                              <p style="font-weight: bold; color:white;">Fecha:</p>
                          </div>                   
                      </div>                        
                  </div>    
                  <!-- /.segunda fila -->
              </div>
          </div>    
              <div class="row">        
                  <div class="col-md-12">    
                      <div class="row" style="padding-top: 20px; padding-left: 40px; margin-left: 40px;">
                         <div class="card-body small-box bg-dark col-3" style="padding-top: 20px; padding-left: 40px; margin-left: 40px;">
                                <h5 style="font-weight: bold; color:white;">Llamado: Perfil<sup ></sup></h5>    
                                <p style="text-align: center; font-weight: bold; justify-content: center;">Zona - Dpto</br>
                                Instituto</br>
                                Carrera</p>
                              <div class="icon">
                                  <i class="far fa-calendar-alt"></i>
                                  <p style="font-weight: bold; color:white;">Fecha:</p>
                              </div>                   
                          </div>
                      
                          <div class="card-body small-box bg-warning col-3" style="padding-top: 20px; padding-left: 40px; margin-left: 40px;">
                                <h5 style="font-weight: bold; color:white;">Llamado: Perfil<sup ></sup></h5>    
                                <p style="text-align: center; font-weight: bold">Zona - Dpto</br>
                                Instituto</br>
                                Carrera</p>
                              <div class="icon">
                                  <i class="far fa-calendar-alt"></i>
                                  <p style="font-weight: bold; color:white;">Fecha:</p>
                              </div>                   
                          </div>
      
                          <div class="card-body small-box bg-info col-3" style="padding-top: 20px; padding-left: 40px; margin-left: 40px;">
                                <h5 style="font-weight: bold; color:white;">Llamado: Perfil<sup ></sup></h5>    
                                <p style="text-align: center; font-weight: bold">Zona - Dpto</br>
                                Instituto</br>
                                Carrera</p>
                              <div class="icon">
                                  <i class="far fa-calendar-alt"></i>
                                  <p style="font-weight: bold; color:white;">Fecha:</p>
                              </div>                   
                          </div>  
                      </div>   
                  </div>
              </div>                    
            
          
         
      </div>
      <!-- ./wrapper -->
      
      <!-- jQuery -->
      <script src="https://registroindustrial.larioja.gob.ar/dashboard/plugins/jquery/jquery.min.js"></script>
      <!-- Bootstrap 4 -->
      <script src="https://registroindustrial.larioja.gob.ar/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- ChartJS -->
      <script src="https://registroindustrial.larioja.gob.ar/dashboard/plugins/chart.js/Chart.min.js"></script>
      <!-- AdminLTE App -->
      <script src="https://registroindustrial.larioja.gob.ar/dashboard/dist/js/adminlte.min.js"></script>
      
      <!-- Page specific script -->
      
      
                      </div>
                    </div>
                  </div>
                </section>
                <!-- /.content -->
              </div>
        </section>
    </section>
</section>
@endsection

@section('Script')
<script>
 //custom select box

    /*$(function(){
        $('select.styled').customSelect();
    });*/

</script>
@endsection