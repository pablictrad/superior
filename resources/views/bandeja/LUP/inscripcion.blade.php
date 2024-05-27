@extends('layout.app')
@section('Titulo', 'ProfRegLR-Docente')
@section('ContenidoPrincipal')
<section id="container">
    <section id="main-content">
        <section class="content-wrapper">            
                <!-- Main content -->
            <section class="content">
                <div class="container-fluid">               
                    <div class="card card-primary">
                        <div class="card-header">
                        <h3 class="card-title">Llamados en tu Zona</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                            <div class="position-relative p-3 bg-gray" style="height: 180px">
                                <div class="ribbon-wrapper ribbon-lg">
                                <div class="ribbon bg-primary">
                                    Llamado 1
                                </div>
                                </div>
                                I.S.F.D Los Robles <br>
                                <small>Profesorado de Educación Primaria</small><br/>
                                <small>Perfil</small><br/>
                                <small>Unidad Curricular</small><br/>
                                <small>Fecha: </small><br/>
                            </div>
                            </div>
                            <div class="col-sm-4">
                            <div class="position-relative p-3 bg-gray" style="height: 180px">
                                <div class="ribbon-wrapper ribbon-lg">
                                <div class="ribbon bg-info">
                                    Llamado 2
                                </div>
                                </div>
                                I.S.F.D Los Robles<br>
                                <small>Profesorado de Educación Primaria</small><br/>
                                <small>Perfil</small><br/>
                                <small>Unidad Curricular</small><br/>
                                <small>Fecha: </small><br/>
                            </div>
                            </div>
                            <div class="col-sm-4">
                            <div class="position-relative p-3 bg-gray" style="height: 180px">
                                <div class="ribbon-wrapper ribbon-lg">
                                <div class="ribbon bg-success">
                                    Llamado 3
                                </div>
                                </div>
                                I.S.F.D Los Robles<br>
                                <small>Profesorado de Educación Primaria</small><br/>
                                <small>Perfil</small><br/>
                                <small>Unidad Curricular</small><br/>
                                <small>Fecha: </small><br/>
                            </div>
                            </div>
                        </div>
 
                        <div class="row d-flex justify-content-center">
                            
                            <!-- left column -->
                            <div class="col-md-12" style="margin-top: 2%;">
                                <!-- general form elements -->
                                <div class="card card-green">
                                    <div class="card-header" style="height: 42px;">
                                        <h3 class="card-title">
                                            Inscripción a Llamados
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
                                    <form method="POST" action="{{ route('FormInscripcion') }}" class="FormInscripcion form-group">
                                    @csrf
                                        <div class="card-body" id="NuevoAgenteContenido1" style="display:visible">
                                            <div class="form-group row">
                                                <div class="col-3">
                                                    <label for="Provincia">Institución: </label>
                                                    <select class="form-control" name="Provincia" id="Provincia">
                                                        <option value="0" selected="selected">Seleccione un Instituto</option>
                                                        <option value="1">ISFD P. I. de C. Barros</option>
                                                        <option value="2">IDFD Albino S. Barros</option>
                                                        <option value="3">ISFD Prof. R. N. Viñas</option>    
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label for="Departamento">Carreras: </label>
                                                    <select class="form-control" name="Departamento" id="Departamento">
                                                        <option value="0" selected="selected">Seleccione una Carrera</option>

                                                        <option value="1">Profesorado de Educación Primaria </option>
                                                        <option value="2">Profesorado de Educación Inicial </option>
                                                        <option value="3">Profesorado de Educación Secundaria en Matemática</option>       
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label for="Localidad">Unidad Curricular: </label>
                                                    <select class="form-control" name="Localidad" id="Localidad">
                                                        <option value="0" selected="selected">Seleccione una Unidad Curricular</option>
                                                        <option value="1">Filosofía de La Historia</option>
                                                        <option value="2">Didáctica de La Historia I</option>
                                                        <option value="3">Introducción a La Historia</option>                                                                                                                 
                                                       
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label for="Localidad">Área: </label>
                                                    <select class="form-control" name="Localidad" id="Localidad">
                                                        <option value="0" selected="selected">Seleccione un Área</option>
                                                        <option value="1">Practica</option>
                                                        <option value="2">Disciplinar</option>
                                                        <option value="3">General</option>
                                                    </select>
                                                </div>
                                                   
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-3">
                                                    <label for="Provincia">Horas Catedras: </label>
                                                    <select class="form-control" name="Provincia" id="Provincia">
                                                        <option value="0" selected="selected">Seleccione Cantidad de Horas</option>
                                                        <option value="1">3 hs</option>
                                                        <option value="2">4 hs</option>
                                                        <option value="3">5 hs</option>    
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label for="Departamento">Título: </label>
                                                    <select class="form-control" name="Departamento" id="Departamento">
                                                        <option value="0" selected="selected">Seleccione un Título</option>
                                                        <option value="1">Profesor Para Nivel Superior en Historia</option>
                                                        <option value="2">Licenciado en Historia</option>
                                                        <option value="3">Profesor Para Nivel Superior en Matemática</option>       
                                                    </select>
                                                </div>
                                                <div class="col-3 bg-warning">
                                                    <label for="Localidad">Categoría del Título: </label>
                                                    <select class="form-control" name="Localidad" id="Localidad">
                                                        <option value="0" selected="selected">Seleccione una Categoría de Título</option>
                                                        <option value="1">Docente</option>
                                                        <option value="2">Supletorio</option>
                                                        <option value="3">Habilitante</option>                                                                                                                 
                                                       
                                                    </select>
                                                </div>
                                                <div class="col-3 bg-warning">
                                                    <label for="Localidad">Tipo de Título: </label>
                                                    <select class="form-control" name="Localidad" id="Localidad">
                                                        <option value="0" selected="selected">Seleccione el Tipo de Título</option>
                                                        <option value="1">Profesor</option>
                                                        <option value="2">Licenciado</option>
                                                        <option value="3">Técnico</option>
                                                    </select>
                                                </div>                                                   
                                            </div>
                                            
                                            <div class="form-group row">
                                                <div class="card-header" style="height: 42px; width:100%;">
                                                    <h3 class="card-title">
                                                        Subir Documentación
                                                    </h3>
                                                </div>
                                                <div class="col-6">
                                                            <div class="form-group has-feedback">
                                                                <label class="control-label">Título: <span class="symbol required"></span></label><br>
                                                                <input required="" type="file" class="btn btn-default" data-original-title="Subir Imagen" data-rel="tooltip" placeholder="Suba su Archivo" name="dniFrente" id="dniFrente" autocomplete="nope" title="Buscar Archivo">
                                                            </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">Fecha Egreso: <span class="symbol required"></span></label><br>
                                                        <input required="" type="Date" class="btn btn-default" data-original-title="Subir Imagen" data-rel="tooltip" placeholder="Suba su Archivo" name="dniFrente" id="dniFrente" autocomplete="nope" title="Buscar Archivo">
    
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-6">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">Certificados de Asistencia a Cursos: <span class="symbol required"></span></label>
                                                        <input required="" type="file" class="btn btn-default" data-original-title="Subir Imagen" data-rel="tooltip" placeholder="Suba su Archivo" name="dniFrente" id="dniFrente" autocomplete="nope" title="Buscar Archivo">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">Certificados de Cursos Dictados: <span class="symbol required"></span></label>
                                                        <input required="" type="file" class="btn btn-default" data-original-title="Subir Imagen" data-rel="tooltip" placeholder="Suba su Archivo" name="dniFrente" id="dniFrente" autocomplete="nope" title="Buscar Archivo">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">Certificación de Servicios: <span class="symbol required"></span></label>
                                                        <input required="" type="file" class="btn btn-default" data-original-title="Subir Imagen" data-rel="tooltip" placeholder="Suba su Archivo" name="dniFrente" id="dniFrente" autocomplete="nope" title="Buscar Archivo">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">F2: <span class="symbol required"></span></label><br>
                                                        <input required="" type="file" class="btn btn-default" data-original-title="Subir Imagen" data-rel="tooltip" placeholder="Suba su Archivo" name="dniFrente" id="dniFrente" autocomplete="nope" title="Buscar Archivo">
                                                    </div>
                                                </div>                                       
                                              
                                            </div> 
                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">Otros Títulos: <span class="symbol required"></span></label>
                                                        <input required="" type="file" class="btn btn-default" data-original-title="Subir Imagen" data-rel="tooltip" placeholder="Suba su Archivo" name="dniFrente" id="dniFrente" autocomplete="nope" title="Buscar Archivo">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">Concepto: <span class="symbol required"></span></label><br>
                                                        <input required="" type="file" class="btn btn-default" data-original-title="Subir Imagen" data-rel="tooltip" placeholder="Suba su Archivo" name="dniFrente" id="dniFrente" autocomplete="nope" title="Buscar Archivo">
                                                    </div>
                                                </div>                                       
                                              
                                            </div> 
                                           
                                           
                                        <!-- /.card-body -->
                                        <input type="hidden" name="ag" value="{{$Agente->idAgente}}"/>
                                        <div class="card-footer bg-transparent" id="NuevoAgenteContenido2" style="display:visible">
                                            <button type="submit" class="btn btn-primary btn-block bg-success">INSCRIBIRME</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card -->
                            </div>
                        <!-- /.row --> <!-- /.card-body -->
                    </div>
                </div>
            </section>
        </section>
    </section>
</section>
@endsection