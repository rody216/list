<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Agregar familia
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
        <?php if ($this->session->flashdata('success')) : ?>
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        <?php elseif ($this->session->flashdata('error')) : ?>
          <div class="alert alert-error alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('error'); ?>
          </div>
        <?php endif; ?>
        <div class="box">
          <div class="box-body">
            <form role="form" action="<?php base_url('employees/create') ?>" method="post" enctype="multipart/form-data">
              <input type="hidden" id="employee_id" name="employee_id" value="">
              <div class="box-body">
                <?php echo validation_errors(); ?>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="document_type_id">Tipo de documento</label>
                      <select class="form-control" id="document_type_id_employee" name="document_type_id_employee">
                        <?php foreach ($document_types as $k => $v) : ?>
                          <option value="<?php echo $v['id'] ?>"><?php echo $v['name'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="document_number">Numero de documento</label>
                      <input type="text" class="form-control" id="document_number_employee" name="document_number_employee" autocomplete="off" value="77128391" />
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group ">
                      <button class="btn btn-outline-secondary" style="margin-top: 25px" type="button" id="btnSearchEmployee">Buscar empleado</button>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="product_name">Nombre</label>
                      <input type="text" class="form-control" id="first_name_employee" name="first_name_employee" autocomplete="off"  oninput="validateAndUppercase(this)"  />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="product_name">Apellido</label>
                      <input type="text" class="form-control" id="last_name_employee" name="last_name_employee" autocomplete="off"  oninput="validateAndUppercase(this)"  />
                    </div>
                  </div>
                </div>
                <hr>
                <h4>Ingrese datos del familiar</h4>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="document_type_id">Parentesco</label>
                      <select class="form-control" id="relationship_id" name="relationship_id">
                        <?php foreach ($relationship as $k => $v) : ?>
                          <option value="<?php echo $v['id'] ?>"><?php echo $v['name'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label for="document_type_id">¿Trabaja en la Empresa?</label>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="1" id="is_employee">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="document_type_id">Tipo de documento</label>
                      <select class="form-control" id="document_type_id" name="document_type_id">
                        <?php foreach ($document_types as $k => $v) : ?>
                          <option value="<?php echo $v['id'] ?>"><?php echo $v['name'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="document_number">Numero de documento</label>
                    <input type="text" class="form-control" id="document_number" name="document_number" autocomplete="off" oninput="validateAndUppercase(this)" />
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
                      <input type="text" class="form-control" id="first_name" name="first_name" autocomplete="off"  oninput="validateAndUppercase(this)"  />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="product_name">Apellido</label>
                      <input type="text" class="form-control" id="last_name" name="last_name" autocomplete="off"  oninput="validateAndUppercase(this)"  />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="document_type_id">Estado civil</label>
                      <select class="form-control" id="civil_status_id" name="civil_status_id">
                        <option value="">Seleccione el estado civil</option>
                        <?php foreach ($civil_status as $k => $v) : ?>
                          <option value="<?php echo $v['id'] ?>"><?php echo $v['name'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="document_type_id">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" id="birthdate" name="birthdate" autocomplete="off" onchange="validateDate(this)" />
                  </div>
                </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="document_type_id">Estatura</label>
                      <input type="text" class="form-control" id="height" name="height" autocomplete="off" placeholder="Ingrese la estatura en centimetros" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="blood_type_id">Tipo de sangre</label>
                      <select class="form-control" id="blood_type_id" name="blood_type_id">
                        <option value="">Seleccione el Grupo Sanguíneo.</option>
                        <?php foreach ($blood_types as $k => $v) : ?>
                          <option value="<?php echo $v['id'] ?>"><?php echo $v['name'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-grouppmb-0">
                  <label>Lugar de nacimiento</label>
                  <br>
                  <span id="ubigeos_birthdate" class="text-primary"></span>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="country_id">País</label>
                      <select class="form-control select_group country_id" id="country_id" name="country_id">
                        <option value="">Seleccione el país</option>
                        <?php foreach ($countries as $k => $v) : ?>
                          <option value="<?php echo $v['id'] ?>"><?php echo $v['name'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="product_name">Departamento</label>
                      <select class="form-control select_group department_id" id="department_id" name="department_id">
                        <option value="">Seleccione el departamento</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="product_name">Provincia</label>
                      <select class="form-control select_group province_id" id="province_id" name="province_id">
                        <option value="">Seleccione la provincia</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-grouppmb-0">
                  <label>Lugar de residencia</label>
                  <br>
                  <span id="ubigeos_residence" class="text-primary"></span>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="country_id2">País</label>
                      <select class="form-control select_group country_id2" id="country_id2" name="country_id2">
                        <option value="">Seleccione el país</option>
                        <?php foreach ($countries as $k => $v) : ?>
                          <option value="<?php echo $v['id'] ?>"><?php echo $v['name'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="product_name">Departamento</label>
                      <select class="form-control select_group department_id2" id="department_id2" name="department_id2">
                        <option value="">Seleccione el departamento</option>
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
                <label for="sku">Direccion Residencia</label>
                <input type="text" class="form-control" id="address" name="address" autocomplete="off" oninput="convertToUppercase(this)" />
              </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="sku">Telefono móvil</label>
                      <input type="text" class="form-control" id="mobile_phone" name="mobile_phone" autocomplete="off" oninput="validateNumberInput(this)" />
                    </div>
                   <div class="form-group">
                    <label for="sku">Telefono fijo</label>
                    <input type="text" class="form-control" id="telephone" name="telephone" autocomplete="off" oninput="validateNumberInput(this)" />
                  </div>
                      <div class="form-group">
                      <label for="sku">Correo electronico</label>
                      <input type="email" class="form-control" id="email" name="email" autocomplete="off" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="image">Image</label>
                      <div class="kv-avatar">
                        <div class="file-loading">
                          <input id="image" name="image" type="file" onchange="setCreationDate(this)">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                  <label for="image_date">Fecha de la Imagen</label>
                  <input type="date" class="form-control" id="image_date" name="image_date" autocomplete="off" onchange="validateDate(this)" />
                </div>
              </div>
                  </div>
                </div>
              </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-success">Guardar cambios</button>
            <a href="<?php echo base_url('employees/') ?>" class="btn btn-primary">Regresar</a>
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

    manageTable = $('#manageTable').DataTable({
      'ajax': base_url + 'employees/fetchFamiliesByEmployeeId/' + employee_id,
      'order': []
    });

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
        url: base_url + '/employees/fetchDepartmentByCountry/' + selectedCountryId,
        method: "GET",
        dataType: "json",
        success: function(response) {
          var $departmentSelect = $("#department_id");
          $departmentSelect.empty().append('<option value="">Seleccione el departamento</option>');

          if (response.length > 0) {
            $.each(response, function(index, department) {
              $departmentSelect.append('<option value="' + department.id + '">' + department.name + '</option>');
            });
          }
        },
        error: function(xhr, status, error) {
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
        url: base_url + '/employees/fetchProvincesByDepartmentId/' + selectedDepartmentId,
        method: "GET",
        dataType: "json",
        success: function(response) {
          var $provinceSelect = $("#province_id");
          $provinceSelect.empty().append('<option value="">Seleccione la provincia</option>');

          if (response.length > 0) {
            $.each(response, function(index, province) {
              $provinceSelect.append('<option value="' + province.id + '">' + province.name + '</option>');
            });
          }
        },
        error: function(xhr, status, error) {
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
        url: base_url + '/employees/fetchDepartmentByCountry/' + selectedCountryId,
        method: "GET",
        dataType: "json",
        success: function(response) {
          var $departmentSelect = $("#department_id2");
          $departmentSelect.empty().append('<option value="">Seleccione el departamento</option>');

          if (response.length > 0) {
            $.each(response, function(index, department) {
              $departmentSelect.append('<option value="' + department.id + '">' + department.name + '</option>');
            });
          }
        },
        error: function(xhr, status, error) {
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
        url: base_url + 'employees/fetchProvincesByDepartmentId/' + selectedDepartmentId,
        method: "GET",
        dataType: "json",
        success: function(response) {
          var $provinceSelect = $("#province_id2");
          $provinceSelect.empty().append('<option value="">Seleccione la provincia</option>');

          if (response.length > 0) {
            $.each(response, function(index, province) {
              $provinceSelect.append('<option value="' + province.id + '">' + province.name + '</option>');
            });
          }
        },
        error: function(xhr, status, error) {
          console.error(error);
        }
      });
    });

    $("#btnSearchEmployee").click(function() {
      let document_type_id = $("#document_type_id_employee").val();
      let document_number = $("#document_number_employee").val();

      $("#employee_id").val('')
      $("#first_name_employee").val('')
      $("#last_name_employee").val('')

      $.ajax({
        url: base_url + 'documents/fetchPersonByDocumentNumber/ponal/' + document_type_id + '/' + document_number,
        method: "POST",
        dataType: "json",
        success: function(response) {
          if (response != null) {
            $("#employee_id").val(response.employee.id)
            $("#first_name_employee").val(response.employee.first_name)
            $("#last_name_employee").val(response.employee.last_name)
          }
        },
        error: function(xhr, status, error) {
          console.error(error);
        }
      });
    });

    $("#btnSearchPerson").click(function() {
      let document_type_id = $("#document_type_id").val();
      let document_number = $("#document_number").val();

      //clear
      $("#first_name").val(null)
      $("#last_name").val(null)
      $("#civil_status_id").val(null)
      $("#birthdate").val(null)
      $("#blood_type_id").val(null)
      $("#ubigeos_birthdate").text(null)
      $("#ubigeos_residence").text(null)
      $("#address").val(null)
      $("#telephone").val(null)
      $("#mobile_phone").val(null)
      $("#email").val(null)

      $.ajax({
        url: base_url + 'employees/fetchPersonByDocumentNumber/' + document_type_id + '/' + document_number,
        method: "POST",
        dataType: "json",
        success: function(response) {
          if (response != null) {
            $("#first_name").val(response.first_name)
            $("#last_name").val(response.last_name)
            $("#civil_status_id").val(response.civil_status_id)
            $("#birthdate").val(response.birthdate)
            $("#blood_type_id").val(response.blood_type_id)

            if (response.ubigeos_birthdate != null) {
              let ubigeos_birthdate = response.ubigeos_birthdate;
              $("#ubigeos_birthdate").text(`${ubigeos_birthdate.country_name}/${ubigeos_birthdate.department_name}/${ubigeos_birthdate.province_name}`)
            }

            if (response.ubigeos_residence != null) {
              let ubigeos_residence = response.ubigeos_residence;
              $("#ubigeos_residence").text(`${ubigeos_residence.country_name}/${ubigeos_residence.department_name}/${ubigeos_residence.province_name}`)
            }

            $("#address").val(response.address)
            $("#telephone").val(response.telephone)
            $("#mobile_phone").val(response.mobile_phone)
            $("#email").val(response.email)
          }
        },
        error: function(xhr, status, error) {
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
      layoutTemplates: {
        main2: '{preview} ' + btnCust + ' {remove} {browse}'
      },
      allowedFileExtensions: ["jpg", "png", "gif"]
    });

  });

  function validateAndUppercase(input) {
    const inputValue = input.value;
    const restrictedChars = /[*\-+\[\]{}|,.!?¿/]/g; // Caracteres especiales restringidos
    const regex = /^[A-Za-z0-9]*$/; // Expresión regular para letras mayúsculas, minúsculas y números

    if (restrictedChars.test(inputValue)) {
      input.setCustomValidity("No se permiten ciertos caracteres especiales.");
      input.value = input.value.replace(restrictedChars, ''); // Eliminar caracteres no permitidos
    } else if (!regex.test(inputValue)) {
      input.setCustomValidity("El campo solo puede contener letras mayúsculas números.");
      input.value = inputValue.replace(/[^A-Za-z0-9]/g, ''); // Eliminar otros caracteres no permitidos
    } else {
      input.setCustomValidity("");
      input.value = inputValue.toUpperCase(); // Convertir a mayúsculas
    }
  }

  function setCreationDate(input) {
    const imageDateInput = document.getElementById("image_date");

    if (input.files && input.files[0]) {
      const selectedFile = input.files[0];

      // Obtener el metadato de tiempo de creación (si está disponible)
      const creationTime = selectedFile.lastModified;
      const selectedDate = new Date(creationTime).toISOString().split('T')[0];
      imageDateInput.value = selectedDate;
    } else {
      // Si no se selecciona una imagen, establecer la fecha actual
      const currentDate = new Date().toISOString().split('T')[0];
      imageDateInput.value = currentDate;
    }

    validateDate(imageDateInput); // Validar la fecha automáticamente
  }

  function validateDate(input) {
    const selectedDate = new Date(input.value);
    const currentDate = new Date();

    if (selectedDate > currentDate) {
      input.setCustomValidity("No se permite ingresar una fecha futura.");
    } else {
      input.setCustomValidity("");
    }
  }

  function validateDate(input) {
    const selectedDate = new Date(input.value);
    const currentDate = new Date();

    if (selectedDate > currentDate) {
      input.setCustomValidity("No se permite ingresar una fecha futura.");
    } else {
      input.setCustomValidity("");
    }
  }

  function validateNumberInput(input) {
  const inputValue = input.value;
  const numericValue = inputValue.replace(/\D/g, ''); // Filtrar caracteres no numéricos

  input.value = numericValue; // Actualizar el valor del campo solo con números
}

function convertToUppercase(input) {
  input.value = input.value.toUpperCase(); // Convertir a mayúsculas
}

function validateAndUppercase(input) {
  const inputValue = input.value;
  const regex = /^[A-Za-z\s]*$/; // Expresión regular para letras (mayúsculas y minúsculas) y espacios

  if (!regex.test(inputValue)) {
    input.value = inputValue.replace(/[^A-Za-z\s]/g, ''); // Eliminar caracteres no permitidos
    return; // Detener la validación adicional
  }

  input.value = inputValue.toUpperCase(); // Convertir a mayúsculas
}
</script>

