@extends('layout.app')

@section('Titulo', 'ProfRegLR- Editar Usuario ADMIN')

@section('ContenidoPrincipal')

<section id="container">
    <section id="main-content">
        <section class="content-wrapper">
            
                <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row d-flex justify-content-center" style="margin-top: 5%;">
                        <div class="col-lg-10">
                            <section class="panel">
                                <header class="panel-heading">
                                   
                                </header>
                                <table class="table table-striped table-advance table-hover">
                                    <thead>
                                        <h3 class="card-title alert alert-success" style="width: 100%; text-align:center; font-weight: bolder;">
                                        
                                            Documentación Solicitada para Cambio de Zona
                                       
                                    </h3>
                                    <tr>
                                        <th>N&deg;</th>
                                        <th>Descripción</th>
                                        <th>Ver Adjunto</th>
                                        <th>Opciones</th>
                                    </tr>
                                    </thead>
                                    <tbody id="contenido_adjuntos_riesgo">
                                    <tr>
                                        <td>1</td>
                                        <td>Fotocopia DNI</td>
                                        <td><i class="fas fa-delete"> ver </i></td>
                                        <td><i class="mdi mdi-delete font-22 text-danger"> X </i></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Certificado de Domicilio</td>
                                        <td><i class="fas fa-delete"> ver </i></td>
                                        <td><i class="mdi mdi-delete font-22 text-danger"> X </i></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Certificado de Servicios</td>
                                        <td><i class="fas fa-delete"> ver </i></td>
                                        <td><i class="mdi mdi-delete font-22 text-danger"> X </i></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Certificado de Residencia</td>
                                        <td><i class="fas fa-delete"> ver </i></td>
                                        <td><i class="mdi mdi-delete font-22 text-danger"> X </i></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </section>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </section>
</section>
@endsection
