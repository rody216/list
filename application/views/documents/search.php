<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Búsqueda y Visualización de empleados
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
                </div>
                <div class="row">
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="product_name">Nombre</label>
                      <input type="text" class="form-control" id="first_name" name="first_name" autocomplete="off"/>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="product_name">Apellido</label>
                      <input type="text" class="form-control" id="last_name" name="last_name" autocomplete="off"/>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <button class="btn btn-outline-secondary" style="margin-top: 25px" type="button" id="btnSearchPerson">Buscar</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
            <div class="panel panel-info">
              <div class="panel-heading" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <h4 class="panel-title">
                  <a class="collapsed" role="button">Resultados</a>
                </h4>
              </div>
              <div class="panel-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Tipo de documento</th>
                      <th>Número de documento</th>
                      <th>Apellidos</th>
                      <th>Nombres</th>
                      <th>Ver resultados</th>
                     <!-- <th>Descargar</th> -->
                    </tr>
                  </thead>
                  <tbody id="employeeTableBody">
                    
                  </tbody>
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

    $(".select_group").select2();
    $("#description").wysihtml5();

    $("#mainEmployeeNav").addClass('active');
    $("#documentSpoaNav").addClass('active');

    const tableBody = document.getElementById("employeeTableBody");

    function clearTable() {
      tableBody.innerHTML = ""; 
    }

    function createTableRow(index, documentType, documentNumber, lastName, firstName, id) {
      return `
        <tr>
            <td>${index}</td>
            <td>${documentType}</td>
            <td>${documentNumber}</td>
            <td>${lastName}</td>
            <td>${firstName}</td>
            <td class="text-center"><a class="btn btn-success btn-sm" href="${base_url}/documents/employee/${id}" target="_blank"><i class="fa fa-search"></i></a> Ver Más</td>
           <!-- <td class="text-center"><a class="btn btn-success btn-sm" href="${base_url}/documents/report/${id}" target="_blank"><i class="fa fa-print"></i></a> PDF</td> -->
        </tr>
      `;
    }

    //buscar persona
    $("#btnSearchPerson").click(function() {
      let document_type_id = $("#document_type_id").val();
      let document_number = $("#document_number").val();
      let first_name = $("#first_name").val();
      let last_name = $("#last_name").val();

      $.ajax({
        url: base_url+'documents/searchEmployees',
        method: "POST",
        dataType: "json",
        data: {
          document_type_id: document_type_id,
          document_number: document_number,
          first_name: first_name,
          last_name: last_name
        },
        success: function (response) {
          clearTable();
          response.employees.forEach((employee, index) => {
            const { document_type_id, document_number, last_name, first_name, id } = employee;
            const rowHtml = createTableRow(index + 1, document_type_id, document_number, last_name, first_name, id);
            tableBody.innerHTML += rowHtml;
        });
        },
        error: function (xhr, status, error) {
          console.error(error);
        }
      });
    });

  });
</script>