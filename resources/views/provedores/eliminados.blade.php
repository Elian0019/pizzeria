@extends('layouts.base')

@section('content')

    {{-- INICIO DEL CUERPO --}}

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-0">
                  <div class="col-sm-6 mb-0">
                      <h1>Provedores Eliminados</h1>  
                  </div>
                  
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-12">
                      <div class="card">

                          <!-- /.card-header -->
                          <div class="card-body">
                              <div class="mb-3">
                                <label for="">Tipo Provedor</label>
                                <br>
                                <input type="radio" id="opcion" name="opcion" value="1" onchange="mostrar(this.value);">Persona
                                <br>
                                <input type="radio"  id="opcion" name="opcion" value="2" checked onchange="mostrar(this.value);">Empresa
                              </div>
                              
                              <div id="rama_provedorA" style="display:block">
                                <table id="provedor_empresa"   class="table table-bordered table-sm table-hover table-striped ">
                                    <thead>
                                        <tr>
                                          <th width="5%"> id </th>
                                          <th> direccion </th>
                                          <th> telefono </th>
                                          <th> correo </th>
                                          <th> razon social </th>
                                          <th width="7%">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($pempresa as $empresa)
                                          @php($id_provedor1=$empresa->id)                                        
                                          @foreach ($provedor1 as $provedor)
                                            @if ($provedor->id==$id_provedor1)
                                            <tr>
                                                <td>{{$provedor->id}}</td>
                                                <td>{{$provedor->direccion}}</td>
                                                <td>{{$provedor->telefono}}</td>
                                                <td>{{$provedor->correo}}</td>
                                                <td>{{$empresa->razonsocial}}</td>
                                                <td class="py-1 align-middle text-center">
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="#" data-href="{{url('provedor/restaurar/'.$empresa->id)}}" rel="tooltip" title="Restaurar" data-toggle="modal" data-target="#modal-confirma" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-alt-circle-up"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endif
                                          @endforeach
                                      @endforeach
                                    </tbody>
                                </table>
                              </div>
                              <div id="rama_provedorB" style="display:none" >
                                <table id="example2" class="table table-bordered table-sm table-hover table-striped ">
                                  <thead>
                                      <tr>
                                        <th width="5%"> id </th>
                                        <th> direccion </th>
                                        <th> telefono </th>
                                        <th> correo </th>
                                        <th> nombre </th>
                                        <th> apellidos </th>
                                        <th width="7%">Acción</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($ppersona as $persona)
                                        @php($id_provedor=$persona->id)
                                        @foreach ($provedor2 as $provedor)
                                            @if ($provedor->id==$id_provedor)
                                            <tr>
                                                <td>{{$provedor->id}}</td>
                                                <td>{{$provedor->direccion}}</td>
                                                <td>{{$provedor->telefono}}</td>
                                                <td>{{$provedor->correo}}</td>
                                                <td>{{$persona->nombre}}</td>
                                                <td>{{$persona->apellidos}}</td>
                                                <td class="py-1 align-middle text-center">
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="#" data-href="{{url('provedor/restaurar/'.$persona->id)}}" rel="tooltip" title="Restaurar" data-toggle="modal" data-target="#modal-confirma" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-alt-circle-up"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endif
                                        @endforeach
                                    @endforeach
                                  </tbody>
                               </table>
                             </div>
                          </div>
                          <!-- /.card-body -->

                      </div>
                      <!-- /.card -->

                  </div>
                  <!-- /.col -->
              </div>
              <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
    
  
  {{-- ocultar y mostrar las table--}}
    <script>
      function mostrar(dato){
          if(dato=="1"){
          //  document.getElementById("provedor_persona").style.display = "table";
            document.getElementById("rama_provedorA").style.display = "none";
            document.getElementById("rama_provedorB").style.display = "block";
           // document.getElementById("provedor_empresa").style.display = "none";
              
          }
          if(dato=="2"){
           // document.getElementById("provedor_persona").style.display = "none";
            document.getElementById("rama_provedorA").style.display = "block";
            document.getElementById("rama_provedorB").style.display = "none";
           // document.getElementById("provedor_empresa").style.display = "table";  
          }
      }
      </script>

    <!-- Modal -->
    <div class="modal fade" id="modal-confirma" data-backdrop="static">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Restaurar Registro</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¿Desea Restaurar este registro?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-danger btn-ok btn-sm">Confirmar</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <script>
              $(function () {
        $('#provedor_empresa').DataTable({
          "paging": true,
          "lengthChange": true,//view nro
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
          "deferRender": true,//
          "retrieve": true,
          "processing": true,//
          language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "lengthMenu": "Mostrar _MENU_ entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "next": "Siguiente",
                "previous": "Anterior"
            }
          }
        });
      });
    </script>
@endsection