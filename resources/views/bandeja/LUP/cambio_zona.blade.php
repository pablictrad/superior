@extends('layout.app')

@section('Titulo', 'ProfRegLR- Editar Usuario ADMIN')

@section('ContenidoPrincipal')

<section id="container">
    <section id="main-content">
        <section class="content-wrapper">
            
                <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    
                    <div class="row d-flex justify-content-center">
                        <div class="row" style="font-weight: bold; text-align: justify; font-family: 'Times New Roman', Times, serif; width: 100%; align-content: center; align-items: center;">
                            <div class="alert alert-success alert-dismissible " style="padding: 2%; padding-bottom: 0%; width: 100%;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                              <h5 style="font-weight: bold; color:blue; text-align: center; align-items: center;" ><i class="icon fas fa-info"></i>INFORMACIÓN IMPORTANTE! <br/>   Los Requisitos Para El Cambio De Zona Están Regulados Por La Ley N° 6436/01 y Decreto N°376/01</h5>
                            
                             <h6 style="font-weight: bold; margin-left: 7%; "> La Documentación a Presentar Para Solicitar El Cambio De Zona Es La Siguiente:</h6>
                                <ol style="margin-left: 10%;">
                                   <li>La fotocopia de DNI (Debe estar certificada en el Registro Civil).</li>                                  
                                   <li>Factura de Servicios.</li>                                  
                              </ol>
                              <p style="font-family: 'Arial Narrow Bold', sans-serif; font-weight: bolder; text-align: center;">El archivo a cargar debe ser extensión pdf y No debe ser mayor de 2 MB.
                              </p>
                            </div>       
                        </div>
                        <!-- left column -->
                        <div class="col-md-10">
                            <!-- general form elements -->
                            <div class="card card-green">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Solicitar Cambio de Zona
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                @php
                                    //voy a realizar una preconsulta para saber su dpto a parti de la localidad
                                    $infoDpto =DB::table('tb_localidades')
                                    ->join('tb_departamentos','tb_departamentos.idDepartamento','=','tb_localidades.Departamento')
                                    ->where('idLocalidad',$Agente->Localidad)
                                    ->select('tb_departamentos.idDepartamento as Departamento','tb_localidades.idLocalidad as Localidad')
                                    ->first();
                                   // dd($infoDpto);
                                   $d=$infoDpto->Departamento;
                                   $l=$infoDpto->Localidad;

                                   $Agente->cambio_idDpto;
                                   if($Agente->cambio_idDpto != null){
                                    $d=$Agente->cambio_idDpto;
                                    $l=$Agente->cambio_Localidad;
                                   }
                                    if($infoDpto){
                                        echo '<input type="hidden" name="dpto" id="dpto" value="'.$d.'">';
                                        echo '<input type="hidden" name="idloc" id="idloc" value="'.$l.'">';
                                    }else{
                                        echo '<input type="hidden" name="dpto" id="dpto" value="">';
                                        echo '<input type="hidden" name="idloc" id="idloc" value="">';
                                    }
                                    
                                @endphp
                                <form method="POST" action="{{ route('FormActualizarZona_ind') }}" class="FormActualizarZona_ind form-group">
                                @csrf
                                    <div class="card-body" id="NuevoAgenteContenido1" style="display:visible">
                                        <!-- fila1 -->
                                        
                                        <!-- Fila2 -->
                                        <div class="form-group row">
                                            <div class="col-4">
                                                <label for="Barrio">Barrio: </label>
                                                <input type="text" autocomplete="off" class="form-control" id="Barrio" name="Barrio" placeholder="Ingrese Barrio" value="{{ $Agente->cambio_Barrio ?? strtoupper($Agente->Barrio)}}">
                                                <script>
                                                    document.addEventListener('DOMContentLoaded', (event) => {
                                                        const barrioInput = document.getElementById('Barrio');
                                                        barrioInput.addEventListener('input', function() {
                                                            this.value = this.value.toUpperCase();
                                                        });
                                                
                                                        // Ensure the initial value is uppercase if already set
                                                        barrioInput.value = barrioInput.value.toUpperCase();
                                                    });
                                                </script>
                                                
                                            </div>
                                            <div class="col-4">
                                                <label for="Calle">Calle: </label>
                                                <input type="text" autocomplete="off" class="form-control" id="Calle" name="Calle" placeholder="Ingrese Nombre de la Calle" value="{{ $Agente->cambio_Calle ?? strtoupper($Agente->Calle)}}">
                                                <script>
                                                    document.addEventListener('DOMContentLoaded', (event) => {
                                                        const calleInput = document.getElementById('Calle');
                                                        calleInput.addEventListener('input', function() {
                                                            this.value = this.value.toUpperCase();
                                                        });
                                                
                                                        // Ensure the initial value is uppercase if already set
                                                        calleInput.value = calleInput.value.toUpperCase();
                                                    });
                                                </script>
                                            </div>
                                            <div class="col-2">
                                                <label for="Casa">N° Casa/Dpto: </label>
                                                <input type="text" autocomplete="off" class="form-control" id="NumCasa" name="NumCasa" placeholder="Ingrese Numero de Casa" value="{{ $Agente->cambio_Numero_Casa ?? $Agente->Numero_Casa}}">
                                            </div>
                                            <div class="col-2">
                                                <label for="Piso">Piso: </label>
                                                <input type="text" autocomplete="off" class="form-control" id="Piso" name="Piso" placeholder="Ingrese Piso" value="{{ $Agente->cambio_Piso ??  $Agente->Piso}}">
                                            </div>
                                            
                                        </div>
                                        <!-- Fila4 -->
                                        <div class="form-group row">
                                        </div>
                                        <!-- Fila3 -->
                                        <div class="form-group row">
                                            <div class="col-4">
                                                <label for="Provincia">Provincia: </label>
                                                <select class="form-control" name="Provincia" id="Provincia">
                                                    @foreach ($Provincias as $p)
                                                        @if ($p->idProvincia == 1)
                                                            <option value="{{$p->idProvincia}}" selected="selected">{{$p->nombre_prov}}</option>
                                                        @else
                                                            <option value="{{$p->idProvincia}}">{{$p->nombre_prov}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <label for="Departamento">Departamento (Zona): </label>
                                                <select class="form-control" name="Departamento" id="Departamento">
                                                   
                                                        @if($infoDpto)
                                                            @php
                                                                if($d!=null){
                                                                    $cambio = $d;
                                                                }else{
                                                                    $cambio =$infoDpto->Departamento;
                                                                }
                                                            @endphp
                                                            @foreach ($Departamentos as $dep)
                                                                @if($cambio == $dep->idDepartamento)
                                                                    <option value="{{$dep->idDepartamento}}" selected="selected">{{$dep->nombre_dpto}} ({{$dep->zona}})</option>
                                                                @else
                                                                    <option value="{{$dep->idDepartamento}}">{{$dep->nombre_dpto}} ({{$dep->zona}})</option>
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            @foreach ($Departamentos as $dep)
                                                                   
                                                                        <option value="{{$dep->idDepartamento}}">{{$dep->nombre_dpto}}</option>
                                                                    
                                                                @endforeach
                                                        @endif
                                                        
                                                    
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <label for="Localidad">Localidad: </label>
                                                <select class="form-control" name="Localidad" id="Localidad">
                                                    
                                                        @if ($infoDpto)
                                                            @foreach ($Localidades as $loc)
                                                                @if($Agente->Localidad == $loc->idLocalidad)
                                                                    <option value="{{$loc->idLocalidad}}" selected="selected">{{$loc->localidad}}</option>
                                                                @else
                                                                    <option value="{{$loc->idLocalidad}}">{{$loc->localidad}}</option>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                        
                                                   
                                                </select>
                                            </div>
                                               
                                        </div>
                                        <div class="row">
                                            {{-- dni --}}
                                            <div class="col-md-6">
                                                        <div class="form-group has-feedback">
                                                            <label class="control-label">DNI: <span class="symbol required"></span></label>
                                                            <input required="" type="file" class="btn btn-default" data-original-title="Subir Imagen" data-rel="tooltip" placeholder="Suba su Archivo" name="dniFrente" id="dniFrente" autocomplete="nope" title="Buscar Archivo">

                                                        </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Certificado de Domicilio: <span class="symbol required"></span></label>
                                                    <input required="" type="file" class="btn btn-default" data-original-title="Subir Imagen" data-rel="tooltip" placeholder="Suba su Archivo" name="dniFrente" id="dniFrente" autocomplete="nope" title="Buscar Archivo">

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Certificado de Servicios: <span class="symbol required"></span></label>
                                                    <input required="" type="file" class="btn btn-default" data-original-title="Subir Imagen" data-rel="tooltip" placeholder="Suba su Archivo" name="dniFrente" id="dniFrente" autocomplete="nope" title="Buscar Archivo">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Certificado de Residencia: <span class="symbol required"></span></label>
                                                    <input required="" type="file" class="btn btn-default" data-original-title="Subir Imagen" data-rel="tooltip" placeholder="Suba su Archivo" name="dniFrente" id="dniFrente" autocomplete="nope" title="Buscar Archivo">
                                                </div>
                                            </div>
                                                                                    
                                          
                                           
                                            
                                            
                                    </div> 
                                       
                                    <!-- /.card-body -->
                                    <input type="hidden" name="ag" value="{{$Agente->idAgente}}"/>
                                    <div class="card-footer bg-transparent" id="NuevoAgenteContenido2" style="display:visible">
                                        <button type="submit" class="btn btn-primary btn-block bg-success">Solicitar Cambio de Zona</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
         

                
            </section>
            <!-- /.content -->
        </section>
    </section>
</section>
@endsection

@section('Script')
    <script src="{{ asset('js/funcionesvarias.js') }}"></script>
        @if (session('ConfirmarActualizarAgente')=='OK')
            <script>
            Swal.fire(
                'Registro Actualizado',
                'Se actualizó registro de un Agente',
                'success'
                    )
            </script>
        @endif
    <script>
ConfirmarActualizarAgente
    $('.FormActualizarAgente_ind').submit(function(e){
        e.preventDefault();
        Swal.fire({
            title: '¿Está seguro de querer actualizar el Agente?',
            text: "Este cambio no puede ser borrado luego, y deberá ser validado por RRHH!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, crear el registro!'
          }).then((result) => {
            if (result.isConfirmed) {
              this.submit();
            }
          })
    })
    
</script>
<script>
    $(document).ready(function(){
        // Función para cargar las localidades al cargar la página
        function cargarLocalidadesPorDefecto(dpto) {
            if(dpto){
                var departamentoId = dpto
               
            }else{
                var departamentoId = $('#Departamento').val();
            }
            console.log(departamentoId);
            let idloc = document.getElementById("idloc").value;

            $.ajax({
                url: '/traerLocalidades/' + departamentoId,
                type: 'GET',
                success: function(response){
                    
                    if(response.status == 200) {
                        $('#Localidad').empty();
                        var localidades = response.msg;
                        $.each(localidades, function(index, localidad){
                           if(idloc == localidad.idLocalidad){
                                $('#Localidad').append('<option value="' + localidad.idLocalidad + '" selected="selected">' + localidad.localidad + '</option>');
                           }else{
                                $('#Localidad').append('<option value="' + localidad.idLocalidad + '">' + localidad.localidad + '</option>');
                           }
                            
                        });
                    } else {
                        console.log('Error: ' + response.msg);
                    }
                },
                error: function(xhr, status, error){
                    console.log('Error: ' + error);
                }
            });
        }
        
        // Llamar a la función para cargar las localidades al cargar la página
        let dpto = document.getElementById("dpto").value;
        cargarLocalidadesPorDefecto(dpto);
        
        
        // Asociar el evento change al campo de selección de departamento
            $('#Departamento').change(function(){
                var departamentoId = $(this).val();
                $.ajax({
                    url: '/traerLocalidades/' + departamentoId,
                    type: 'GET',
                    success: function(response){
                        
                        if(response.status == 200) {
                            $('#Localidad').empty();
                            var localidades = response.msg;
                            $.each(localidades, function(index, localidad){
                                $('#Localidad').append('<option value="' + localidad.idLocalidad + '">' + localidad.localidad + '</option>');
                            });
                        } else {
                            console.log('Error: ' + response.msg);
                        }
                    },
                    error: function(xhr, status, error){
                        console.log('Error: ' + error);
                    }
                });
            });
        
    });
</script>
@endsection
