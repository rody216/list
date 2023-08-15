<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    MPP
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
          <div class="box-body">
            <form role="form" action="<?php base_url('employees/create') ?>" method="post" enctype="multipart/form-data">
              <input type="hidden" id="employee_id" name="employee_id" value="">
              <input type="hidden" id="document_id" name="document_id" value="">
              <div class="box-body">
                <?php echo validation_errors(); ?>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="document_type_id">Tipo de documento</label>
                      <select class="form-control" id="document_type_id" name="document_type_id">
                        <?php foreach ($document_types as $k => $v): ?>
                          <option value="<?php echo $v['id'] ?>"><?php echo $v['name'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="document_number">Numero de documento</label>
                      <input type="text" class="form-control" id="document_number" name="document_number" autocomplete="off" value="77128391"/>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group ">
                      <button class="btn btn-outline-secondary" style="margin-top: 25px" type="button" id="btnSearchPerson">Buscar</button>
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
                      <label for="crime">Fecha de hechos</label>
                      <input type="date" class="form-control" id="date_issue" name="date_issue" autocomplete="off"/>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="country_id2">País</label>
                      <select class="form-control select_group country_id" id="country_id" name="country_id">
                        <option value="">Seleccione el país</option>
                        <?php foreach ($countries as $k => $v): ?>
                          <option value="<?php echo $v['id'] ?>"><?php echo $v['name'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="product_name">Departamento</label>
                      <select class="form-control select_group department_id" id="department_id" name="department_id">
                        <option value="">Seleccione el departamento</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="product_name">Provincia</label>
                      <select class="form-control select_group province_id" id="province_id" name="province_id">
                        <option value="">Seleccione la provincia</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="product_name">Articulo</label>
                      <input type="text" class="form-control" id="article" name="article" autocomplete="off"/>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="crime">Numeral</label>
                      <input type="text" class="form-control" id="numeral" name="numeral" autocomplete="off"/>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="detail">Relato hechos</label>
                  <textarea class="form-control" id="detail" name="detail" autocomplete="off"></textarea>
                </div>
                <div class="form-group">
                  <label for="detail">Descargos</label>
                  <textarea class="form-control" id="arguments" name="arguments" autocomplete="off"></textarea>
                </div>
                <div class="form-group">
                  <label for="detail">Conciliaciones</label>
                  <textarea class="form-control" id="reconciliations" name="reconciliations" autocomplete="off"></textarea>
                </div>
                <div class="form-group">
                  <label for="pdf">Subir documento</label>
                  <input type="file" class="form-control" id="pdf" name="pdf"/>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
              </div>
            </form>
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

    console.log(employee_id)

    manageTable = $('#manageTable').DataTable({
      'ajax': base_url + 'employees/fetchFamiliesByEmployeeId/'+employee_id,
      'order': []
    });

    $(".select_group").select2();
    $("#description").wysihtml5();

    $("#mainEmployeeNav").addClass('active');
    $("#documentMmpNav").addClass('active');

    $("#country_id").change(function() {
      var selectedCountryId = $(this).val();
      
      if (!selectedCountryId) {
        $("#department_id").empty().append('<option value="">Seleccione el departamento</option>');
        return;
      }

      $.ajax({
        url: '../employees/fetchDepartmentByCountry/'+selectedCountryId,
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
        url: '../employees/fetchProvincesByDepartmentId/'+selectedDepartmentId,
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

    //buscar persona
    $("#btnSearchPerson").click(function() {
      let document_type_id = $("#document_type_id").val();
      let document_number = $("#document_number").val();

      $("#employee_id").val('')

      console.log("document_type_id", document_type_id, document_number)
      $.ajax({
        url: base_url+'documents/fetchPersonByDocumentNumber/mmp/'+document_type_id+'/'+document_number,
        method: "POST",
        dataType: "json",
        success: function (response) {
          if (response != null) {
            $("#employee_id").val(response.employee.id)
            $("#first_name").val(response.employee.first_name)
            $("#last_name").val(response.employee.last_name)

            if(response.document != null) {
              $("#document_id").val(response.document.id)
              $("#data_issue").val(response.document.data_issue)
              $("#article").val(response.document.article)
              $("#numeral").val(response.document.numeral)
              $("#detail").val(response.document.detail)
              $("#arguments").val(response.document.arguments)
              $("#reconciliations").val(response.document.reconciliations)
            }
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