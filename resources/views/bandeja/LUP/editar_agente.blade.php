@extends('layout.app')

@section('Titulo', 'ProfRegLR - Editar Usuario ADMIN')

@section('ContenidoPrincipal')

<section id="container">
    <section id="main-content">
        <section class="content-wrapper">
                <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Buscador Agente -->
                    <h6 class="text-center display-4" style="font-weight: bold;">Editar Usuario</h6>
                    <!-- Agregar Nuevo Agente -->
                    <div class="row d-flex justify-content-center">
                        <!-- left column -->
                        <div class="col-md-10">
                            <!-- general form elements -->
                            <div class="card card-green">
                                <div class="card-header">
                                    <h3 class="card-title">
                                       Por Favor Complete o Modifique sus Datos
                                    </h3>
                                    <p> </p>
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
                                    if($infoDpto){
                                        echo '<input type="hidden" name="dpto" id="dpto" value="'.$infoDpto->Departamento.'">';
                                        echo '<input type="hidden" name="idloc" id="idloc" value="'.$infoDpto->Localidad.'">';
                                    }else{
                                        echo '<input type="hidden" name="dpto" id="dpto" value="">';
                                        echo '<input type="hidden" name="idloc" id="idloc" value="">';
                                    }
                                    
                                @endphp
                                <form method="POST" action="{{ route('FormActualizarAgente_ind') }}" class="FormActualizarAgente_ind form-group">
                                @csrf
                                    <div class="card-body" id="NuevoAgenteContenido1" style="display:visible">
                                        <!-- fila1 -->
                                        <div class="form-group row">
                                            <div class="col-4">
                                                <label for="Agente">Apellido Y Nombre: </label>
                                                <input type="text" autocomplete="off" class="form-control" id="Agente" name="Agente" placeholder="Ingrese Nombre Completo" value="{{strtoupper($Agente->ApeNom)}}">
                                            </div>
                                            <div class="col-2">
                                                <label for="DNI">DNI: </label>
                                                <input type="text" autocomplete="off" class="form-control" id="DNI" name="DNI" placeholder="Ingrese DNI sin puntos" value="{{$Agente->Documento}}" maxlength="8">
                                            </div>
                                             <div class="col-3">
                                                <label for="CUIL">CUIL: </label>
                                                <input type="text" autocomplete="off" class="form-control" id="CUIL" name="CUIL" placeholder="Ingrese Cuil" value="{{$Agente->Cuil}}" maxlength="11" required>
                                            </div>
                                            <div class="col-3">
                                                <label for="Sexo">Sexo: </label>
                                                <select class="form-control" name="Sexo" id="Sexo">
                                                    @foreach ($Sexos as $s)
                                                        @if ($s->Mnemo == $Agente->Sexo)
                                                            <option value="{{$s->Mnemo}}" selected="selected">{{$s->Descripcion}}</option>
                                                        @else
                                                            <option value="{{$s->Mnemo}}">{{$s->Descripcion}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <!-- Fila2 -->
                                        <div class="form-group row">
                                            <div class="col-4">
                                                <label for="Barrio">Barrio: </label>
                                                <input type="text" autocomplete="off" class="form-control" id="Barrio" name="Barrio" placeholder="Ingrese Barrio" value="{{strtoupper($Agente->Barrio)}}" required>
                                            </div>
                                            <div class="col-4">
                                                <label for="Calle">Calle: </label>
                                                <input type="text" autocomplete="off" class="form-control" id="Calle" name="Calle" placeholder="Ingrese Nombre de la Calle" value="{{strtoupper($Agente->Calle)}}" required>
                                            </div>
                                            <div class="col-2">
                                                <label for="Casa">N° Casa/Dpto: </label>
                                                <input type="text" autocomplete="off" class="form-control" id="NumCasa" name="NumCasa" placeholder="Ingrese Numero de Casa" value="{{$Agente->Numero_Casa}}" required>
                                            </div>
                                            <div class="col-2">
                                                <label for="Piso">Piso: </label>
                                                <input type="text" autocomplete="off" class="form-control" id="Piso" name="Piso" placeholder="Ingrese Piso" value="{{$Agente->Piso}}">
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
                                                            @foreach ($Departamentos as $dep)
                                                                @if($infoDpto->Departamento == $dep->idDepartamento)
                                                                    <option value="{{$dep->idDepartamento}}" selected="selected">{{$dep->nombre_dpto}} ({{$dep->zona}})</option>
                                                                @else
                                                                    <option value="{{$dep->idDepartamento}}">{{$dep->nombre_dpto}} ({{$dep->zona}})</option>
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            @foreach ($Departamentos as $dep)
                                                                   
                                                                        <option value="{{$dep->idDepartamento}}">{{$dep->nombre_dpto}} ({{$dep->zona}})</option>
                                                                    
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
                                        <div class="form-group row">
                                            <div class="col-4">
                                                <label for="Barrio">Correo Eléctronico: </label>
                                                <input type="text" autocomplete="off" class="form-control" id="email" name="email" placeholder="" value="{{$usuario->email}}" required>
                                            </div>
                                            <div class="col-4">
                                                <label for="Calle">Clave: </label>
                                                <input type="text" autocomplete="off" class="form-control" id="Clave" name="Clave" placeholder="Ingrese la Clave" value="{{$usuario->Clave}}" required>
                                            </div>
                                            <div class="col-4">
                                                <label for="Casa">N° Teléfono: </label>
                                                <input type="text" autocomplete="off" class="form-control" id="NumTel" name="NumTel" placeholder="Ingrese Número de Teléfono" value="{{$Agente->telefono}}" required>
                                            </div>
                                            
                                        </div>
                                    <!-- /.card-body -->
                                    <input type="hidden" name="ag" value="{{$Agente->idAgente}}"/>
                                    <div class="card-footer bg-transparent" id="NuevoAgenteContenido2" style="display:visible">
                                        <button type="submit" class="btn btn-primary btn-block bg-success">Actualizar Información</button>
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
                'Se actualizaron sus Datos Correctamente',
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
