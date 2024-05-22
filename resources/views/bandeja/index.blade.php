@extends('layout.app')

@section('Titulo', 'ProfRegLR - Principal')

@section('ContenidoPrincipal')

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