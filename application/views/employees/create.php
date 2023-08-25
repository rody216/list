

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Administrar
      <small>Empleados</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Empleados</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
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
          <div class="box-header">
            <h3 class="box-title">Agregar empleados</h3>
          </div>
          <!-- /.box-header -->
          <form role="form" action="<?php echo base_url('employees/create') ?>" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <?php echo validation_errors(); ?>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="document_type_id">Tipo de documento</label>
                      <select class="form-control select_group" id="document_type_id" name="document_type_id">
                        <?php foreach ($document_types as $k => $v): ?>
                          <option value="<?php echo $v['id'] ?>"><?php echo $v['name'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="document_number">Número de documento</label>
                      <input type="text" class="form-control" id="document_number" name="document_number" autocomplete="off"/>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="product_name">Nombre</label>
                      <input type="text" class="form-control" id="first_name" name="first_name" autocomplete="off"/>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="product_name">Apellido</label>
                      <input type="text" class="form-control" id="last_name" name="last_name" autocomplete="off"/>
                    </div>
                  </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="document_type_id">Estado civil</label>
                      <select class="form-control select_group" id="civil_status_id" name="civil_status_id">
                        <option value="">Seleccione el estado civil</option>
                        <?php foreach ($civil_status as $k => $v): ?>
                          <option value="<?php echo $v['id'] ?>"><?php echo $v['name'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="document_type_id">Fecha de Nacimiento</label>
                      <input type="date" class="form-control" id="birthdate" name="birthdate" autocomplete="off"/>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="document_type_id">Estatura</label>
                      <input type="text" class="form-control" id="height" name="height" autocomplete="off" placeholder="Ingrese la estatura en centimetros"/>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="document_number">Tipo de sangre</label>
                      <select class="form-control select_group" id="blood_type_id" name="blood_type_id">
                        <option value="">Seleccionar</option>
                        <?php foreach ($blood_types as $k => $v): ?>
                          <option value="<?php echo $v['id'] ?>"><?php echo $v['name'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-grouppmb-0">
                  <label>Lugar de nacimiento</label>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="country_id">País</label>
                      <select class="form-control select_group country_id" id="country_id" name="country_id">
                        <option value="">Seleccione el país</option>
                        <?php foreach ($countries as $k => $v): ?>
                          <option value="<?php echo $v['id'] ?>"><?php echo $v['name'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="product_name">Departamento</label>
                      <select class="form-control select_group department_id" id="department_id" name="department_id">
                        <option value="">Seleccione el Departamento</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="product_name">Provincia</label>
                      <select class="form-control select_group province_id" id="province_id" name="province_id">
                        <option value="">Seleccione la Provincia</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-grouppmb-0">
                  <label>Lugar de Residencia</label>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="country_id2">País</label>
                      <select class="form-control select_group country_id2" id="country_id2" name="country_id2">
                        <option value="">Seleccione el País</option>
                        <?php foreach ($countries as $k => $v): ?>
                          <option value="<?php echo $v['id'] ?>"><?php echo $v['name'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="product_name">Departamento</label>
                      <select class="form-control select_group department_id2" id="department_id2" name="department_id2">
                        <option value="">Seleccione el Departamento</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="product_name">Provincia</label>
                      <select class="form-control select_group province_id2" id="province_id2" name="province_id2">
                        <option value="">Seleccione la provincia</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="sku">Dirección de Residencia</label>
                  <input type="text" class="form-control" id="address" name="address" autocomplete="off" />
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="sku">Teléfono móvil</label>
                      <input type="text" class="form-control" id="mobile_phone" name="mobile_phone"autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <label for="sku">Teléfono Fijo</label>
                      <input type="text" class="form-control" id="telephone" name="telephone"autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <label for="sku">Correo Electrónico</label>
                      <input type="email" class="form-control" id="email" name="email"autocomplete="off" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="image">Image</label>
                      <div class="kv-avatar">
                        <div class="file-loading">
                          <input id="image" name="image" type="file">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="sku">Fecha de foto</label>
                      <input type="date" class="form-control" id="photo_date" name="photo_date"autocomplete="off" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-success">Guardar Cambios</button>
                <a href="<?php echo base_url('employees/') ?>" class="btn btn-primary">Regresar</a>
              </div>
            </form>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
  $(document).ready(function() {
    $(".select_group").select2();
    $("#description").wysihtml5();

    $("#mainEmployeeNav").addClass('active');
    $("#addEmployeeNav").addClass('active');

    $("#country_id").change(function() {
      var selectedCountryId = $(this).val();
      
      if (!selectedCountryId) {
        $("#department_id").empty().append('<option value="">Seleccione el departamento</option>');
        return;
      }

      $.ajax({
        url: 'fetchDepartmentByCountry/'+selectedCountryId,
        method: "GET",
        dataType: "json",
        success: function (response) {
          var $departmentSelect = $("#department_id");
          $departmentSelect.empty().append('<option value="">Seleccione el departamento</option>');

          if (response.length > 0) {
            $.each(response, function(index, department) {
              $departmentSelect.append('<option value="' + department.id + '">' + department.name + '</option>');
            });
          }
        },
        error: function (xhr, status, error) {
          console.error(error);
        }
      });
    });

    $("#department_id").change(function() {
      var selectedDepartmentId = $(this).val();
      
      if (!selectedDepartmentId) {
        $("#province_id").empty().append('<option value="">Seleccione la provincia</option>');
        return;
      }

      $.ajax({
        url: 'fetchProvincesByDepartmentId/'+selectedDepartmentId,
        method: "GET",
        dataType: "json",
        success: function (response) {
          var $provinceSelect = $("#province_id");
          $provinceSelect.empty().append('<option value="">Seleccione la provincia</option>');

          if (response.length > 0) {
            $.each(response, function(index, province) {
              $provinceSelect.append('<option value="' + province.id + '">' + province.name + '</option>');
            });
          }
        },
        error: function (xhr, status, error) {
          console.error(error);
        }
      });
    });

    $("#country_id2").change(function() {
      var selectedCountryId = $(this).val();
      
      if (!selectedCountryId) {
        $("#department_id2").empty().append('<option value="">Seleccione el departamento</option>');
        return;
      }

      $.ajax({
        url: 'fetchDepartmentByCountry/'+selectedCountryId,
        method: "GET",
        dataType: "json",
        success: function (response) {
          var $departmentSelect = $("#department_id2");
          $departmentSelect.empty().append('<option value="">Seleccione el departamento</option>');

          if (response.length > 0) {
            $.each(response, function(index, department) {
              $departmentSelect.append('<option value="' + department.id + '">' + department.name + '</option>');
            });
          }
        },
        error: function (xhr, status, error) {
          console.error(error);
        }
      });
    });

    $("#department_id2").change(function() {
      var selectedDepartmentId = $(this).val();
      
      if (!selectedDepartmentId) {
        $("#province_id2").empty().append('<option value="">Seleccione la provincia</option>');
        return;
      }

      $.ajax({
        url: 'fetchProvincesByDepartmentId/'+selectedDepartmentId,
        method: "GET",
        dataType: "json",
        success: function (response) {
          var $provinceSelect = $("#province_id2");
          $provinceSelect.empty().append('<option value="">Seleccione la provincia</option>');

          if (response.length > 0) {
            $.each(response, function(index, province) {
              $provinceSelect.append('<option value="' + province.id + '">' + province.name + '</option>');
            });
          }
        },
        error: function (xhr, status, error) {
          console.error(error);
        }
      });
    });
    
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