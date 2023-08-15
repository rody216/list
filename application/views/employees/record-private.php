<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Resultados de: <?php echo $employee['first_name'].' '.$employee['last_name'] ?>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Empleados</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div id="messages"></div>
        <?php if($this->session->flashdata('success')): ?>
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        <?php elseif($this->session->flashdata('error')): ?>
          <div class="alert alert-error alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('error'); ?>
          </div>
        <?php endif; ?>
        <div class="box">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
          <div class="panel panel-info">
            <div class="panel-heading" role="tab" id="headingDatos" data-toggle="collapse" data-parent="#accordion" href="#collapseDatos" aria-expanded="true" aria-controls="collapsePonal">
              <h4 class="panel-title">
                <a role="button" >
                  Datos Personales
                </a>
              </h4>
            </div>
            <div id="collapseDatos" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingDatos">
              <div class="panel-body">
                <table class="table table-bordered table-striped">
                  <tr>
                    <td>Nombres y Apellidos</td>
                    <td><?php echo $employee['first_name'].' '.$employee['last_name'] ?></td>
                  </tr>
                  <tr>
                    <td>Documento</td>
                    <td><?php echo $employee['document_type_name'].' - '.$employee['document_number'] ?></td>
                  </tr>
                  <tr>
                    <td>Dirección</td>
                    <td><?php echo $employee['address'] ?></td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <div class="panel panel-info">
            <div class="panel-heading" role="tab" id="headingBanking" data-toggle="collapse" data-parent="#accordion" href="#collapseBanking" aria-expanded="true" aria-controls="collapsePonal">
              <h4 class="panel-title">
                <a role="button" >
                  Familias
                </a>
              </h4>
            </div>
            <div id="collapseBanking" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingBanking">
              <div class="panel-body">
                <table class="table table-bordered table-striped">
                  <tr>
                    <th>#</th>
                    <th>Tipo de documento</th>
                    <th>Número de documento</th>
                    <th>Nombre completo </th>
                    <th>Parentesco </th>
                  </tr>
                  <?php
                    foreach($families as $key => $item) {
                      ?>
                        <tr>
                          <td><?php echo $key + 1 ?></td>
                          <td><?php echo $item['document_type_name']?></td>
                          <td><?php echo $item['document_number']?></td>
                          <td><?php echo $item['first_name'].' '.$item['last_name']?></td>
                          <td><?php echo $item['relationship_name']?></td>
                        </tr>
                      <?php
                    }
                  ?>
                </table>
              </div>
            </div>
          </div>
          <div class="panel panel-info">
            <div class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              <h4 class="panel-title">
                <a role="button" >
                  Sistema Penal Oral Acusatorio (SPOA)
                </a>
              </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
              <div class="panel-body">
                <?php
                  if(!is_null($spoa)) {
                    ?>
                      <table class="table table-bordered table-striped">
                        <tr>
                          <td style="width: 40%;">Numero de noticia</td>
                          <td class="text-left"><?php echo $spoa['notice_number']?></td>
                        </tr>
                        <tr>
                          <td>Calidad</td>
                          <td class="text-left"><?php echo $spoa['quality']?></td>
                        </tr>
                        <tr>
                          <td>Delito</td>
                          <td class="text-left"><?php echo $spoa['crime']?></td>
                        </tr>
                        <tr>
                          <td>Fecha de hechos</td>
                          <td class="text-left"><?php echo $spoa['date_issue']?></td>
                        </tr>
                        <tr>
                          <td>Detalles</td>
                          <td class="text-left"><?php echo $spoa['detail']?></td>
                        </tr>
                        <tr>
                          <td>Documento</td>
                          <td class="text-left">
                          <?php
                            if(!is_null($spoa['pdf'])) {
                              ?>
                                <a class="btn btn-info" href="<?php echo base_url($spoa['pdf'])?>" target="__blank">Ver documento</a>
                              <?php
                            }
                            ?>
                          </td>
                        </tr>
                      </table>
                    <?php
                  }
                  else {
                    echo 'No tiene antecedentes SOAP';
                  }
                ?>
              </div>
            </div>
          </div>
          <div class="panel panel-info">
            <div class="panel-heading" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              <h4 class="panel-title">
                <a class="collapsed" role="button">
                Registro Nacional de Medidas Correctivas (RNMC)
                </a>
              </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
              <div class="panel-body">
                <?php
                  if(!is_null($rnmc)) {
                    ?>
                      <table class="table table-bordered table-striped">
                        <tr>
                          <td style="width: 40%;">Número de expediente</td>
                          <td class="text-left"><?php echo $rnmc['file_number']?></td>
                        </tr>
                        <tr>
                          <td>Fecha de hechos</td>
                          <td class="text-left"><?php echo $rnmc['date_issue']?></td>
                        </tr>
                        <tr>
                          <td>Lugar</td>
                          <td class="text-left"></td>
                        </tr>
                        <tr>
                          <td>Articulo</td>
                          <td class="text-left"><?php echo $rnmc['article']?></td>
                        </tr>
                        <tr>
                          <td>Numeral</td>
                          <td class="text-left"><?php echo $rnmc['numeral']?></td>
                        </tr>
                        <tr>
                          <td>Relato de hechos</td>
                          <td class="text-left"><?php echo $rnmc['detail']?></td>
                        </tr>
                        <tr>
                          <td>Descargos</td>
                          <td class="text-left"><?php echo $rnmc['arguments']?></td>
                        </tr>
                        <tr>
                          <td>Medidas correctivas</td>
                          <td class="text-left"><?php echo $rnmc['measures']?></td>
                        </tr>
                        <tr>
                          <td>Documento</td>
                          <td class="text-left">
                          <?php
                            if(!is_null($spoa['pdf'])) {
                              ?>
                                <a class="btn btn-info" href="<?php echo base_url($spoa['pdf'])?>" target="__blank">Ver documento</a>
                              <?php
                            }
                          ?>
                          </td>
                        </tr>
                      </table>
                    <?php
                  }
                  else {
                    echo 'No tiene antecedentes RNMC';
                  }
                ?>
              </div>
            </div>
          </div>
          <div class="panel panel-info">
            <div class="panel-heading" role="tab" id="headingThree"  data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              <h4 class="panel-title">
                <a class="collapsed" role="button">
                  MMP
                </a>
              </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
              <div class="panel-body">
                <?php
                  if(!is_null($rnmc)) {
                    ?>
                      <table class="table table-bordered table-striped">
                        <tr>
                          <td>Fecha de hechos</td>
                          <td class="text-left"><?php echo $mmp['date_issue']?></td>
                        </tr>
                        <tr>
                          <td>Lugar</td>
                          <td class="text-left"></td>
                        </tr>
                        <tr>
                          <td>Articulo</td>
                          <td class="text-left"><?php echo $mmp['article']?></td>
                        </tr>
                        <tr>
                          <td>Relato de hechos</td>
                          <td class="text-left"><?php echo $mmp['detail']?></td>
                        </tr>
                        <tr>
                          <td>Descargos</td>
                          <td class="text-left"><?php echo $mmp['arguments']?></td>
                        </tr>
                        <tr>
                          <td>Conciliaciones</td>
                          <td class="text-left"><?php echo $mmp['reconciliations']?></td>
                        </tr>
                        <tr>
                          <td>Documento</td>
                          <td class="text-left"></td>
                        </tr>
                      </table>
                    <?php
                  }
                  else {
                    echo 'No tiene antecedentes MMP';
                  }
                ?>
              </div>
            </div>
          </div>
          <div class="panel panel-info">
            <div class="panel-heading" role="tab" id="headingPonal" data-toggle="collapse" data-parent="#accordion" href="#collapsePonal" aria-expanded="true" aria-controls="collapsePonal">
              <h4 class="panel-title">
                <a role="button" >
                  PONAL
                </a>
              </h4>
            </div>
            <div id="collapsePonal" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingPonal">
              <div class="panel-body">
                <?php
                  if(!is_null($ponal)) {
                    ?>
                      <table class="table table-bordered table-striped">
                        <tr>
                          <td>Fecha de hechos</td>
                          <td class="text-left"><?php echo $ponal['date_issue']?></td>
                        </tr>
                        <tr>
                          <td>Hora de hechos</td>
                          <td class="text-left"><?php echo $ponal['time_issue']?></td>
                        </tr>
                        <tr>
                          <td>Resultados</td>
                          <td class="text-left"><?php echo $ponal['results']?></td>
                        </tr>
                      </table>
                    <?php
                  }
                  else {
                    echo 'No tiene antecedentes ponal';
                  }
                ?>
              </div>
            </div>
          </div>
          <div class="panel panel-info">
            <div class="panel-heading" role="tab" id="headingProperties" data-toggle="collapse" data-parent="#accordion" href="#collapseProperties" aria-expanded="true" aria-controls="collapsePonal">
              <h4 class="panel-title">
                <a role="button" >
                  Propiedades / Inmuebles
                </a>
              </h4>
            </div>
            <div id="collapseProperties" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingProperties">
              <div class="panel-body">
                <table class="table table-bordered table-striped">
                  <tr>
                    <th>#</th>
                    <th>Ciudad</th>
                    <th>Oficina</th>
                    <th>Matrícula</th>
                  </tr>
                  <?php
                    foreach($properties as $key => $property) {
                      ?>
                        <tr>
                          <td><?php echo $key + 1 ?></td>
                          <td><?php echo $property['city']?></td>
                          <td><?php echo $property['office']?></td>
                          <td><?php echo $property['plate']?></td>
                        </tr>
                      <?php
                    }
                  ?>
                </table>
              </div>
            </div>
          </div>
          <div class="panel panel-info">
            <div class="panel-heading" role="tab" id="headingVehicles" data-toggle="collapse" data-parent="#accordion" href="#collapseVehicles" aria-expanded="true" aria-controls="collapsePonal">
              <h4 class="panel-title">
                <a role="button" >
                  Vehiculos
                </a>
              </h4>
            </div>
            <div id="collapseVehicles" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingVehicles">
              <div class="panel-body">
                <table class="table table-bordered table-striped">
                  <tr>
                    <th>#</th>
                    <th>Placa</th>
                    <th>Modelo</th>
                    <th>Marca</th>
                    <th>Linea</th>
                    <th>Secretaria de tránsito</th>
                    <th>Documento</th>
                  </tr>
                  <?php
                    foreach($vehicles as $key => $vehicle) {
                      ?>
                        <tr>
                          <td><?php echo $key + 1 ?></td>
                          <td><?php echo $vehicle['plate']?></td>
                          <td><?php echo $vehicle['model']?></td>
                          <td><?php echo $vehicle['mark']?></td>
                          <td><?php echo $vehicle['line']?></td>
                          <td><?php echo $vehicle['traffic_secretary']?></td>
                          <td>
                          <?php
                            if(!is_null($vehicle['pdf'])) {
                              ?>
                                <a class="btn btn-info" href="<?php echo base_url($vehicle['pdf'])?>" target="__blank">Ver documento</a>
                              <?php
                            }
                          ?>
                          </td>
                        </tr>
                      <?php
                    }
                  ?>
                </table>
              </div>
            </div>
          </div>
          <div class="panel panel-info">
            <div class="panel-heading" role="tab" id="headingBanking" data-toggle="collapse" data-parent="#accordion" href="#collapseBanking" aria-expanded="true" aria-controls="collapsePonal">
              <h4 class="panel-title">
                <a role="button" >
                  Datos financieros
                </a>
              </h4>
            </div>
            <div id="collapseBanking" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingBanking">
              <div class="panel-body">
                <table class="table table-bordered table-striped">
                  <tr>
                    <th>#</th>
                    <th>Entidad financiera</th>
                    <th>Tipo producto</th>
                    <th>Numero producto </th>
                  </tr>
                  <?php
                    foreach($banking as $key => $item) {
                      ?>
                        <tr>
                          <td><?php echo $key + 1 ?></td>
                          <td><?php echo $item['financial_entity']?></td>
                          <td><?php echo $item['product_type']?></td>
                          <td><?php echo $item['product_number']?></td>
                        </tr>
                      <?php
                    }
                  ?>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
  $(document).ready(function() {
    var base_url = "<?php echo base_url(); ?>";
    var employee_id = $("#employee_id").val();

    manageTable = $('#manageTable').DataTable({
      'ajax': base_url + 'employees/fetchFamiliesByEmployeeId/'+employee_id,
      'order': []
    });

    $(".select_group").select2();
    $("#description").wysihtml5();

    $("#mainEmployeeNav").addClass('active');
    $("#addEmployeeNav").addClass('active');
    
    var btnCust = ''; 
    $("#image").fileinput({
        overwriteInitial: true,
        maxFileSize: 1500,
        showClose: false,
        showCaption: false,
        browseLabel: '',
        removeLabel: '',
        browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
        removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
        removeTitle: 'Cancel or reset changes',
        elErrorContainer: '#kv-avatar-errors-1',
        msgErrorClass: 'alert alert-block alert-danger',
        // defaultPreviewContent: '<img src="/uploads/default_avatar_male.jpg" alt="Your Avatar">',
        layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
        allowedFileExtensions: ["jpg", "png", "gif"]
    });

  });
</script>