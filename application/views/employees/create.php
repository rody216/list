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
          <div class="box-header">
            <h3 class="box-title">Agregar Empleados</h3>
          </div>
          <!-- /.box-header -->
          <form role="form" action="<?php echo base_url('employees/create') ?>" method="post" enctype="multipart/form-data">
            <div class="box-body">
              <?php echo validation_errors(); ?>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="document_type_id">Tipo de Documento</label>
                    <select class="form-control select_group" id="document_type_id" name="document_type_id">
                      <option value="">Seleccione el Tipo de Documento</option>
                      <?php foreach ($document_types as $k => $v) : ?>
                        <option value="<?php echo $v['id'] ?>"><?php echo $v['name'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="document_number">Número de Documento</label>
                    <input type="text" class="form-control" id="document_number" name="document_number" autocomplete="off" oninput="validateAndUppercase(this)">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="first_name">Nombre</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" autocomplete="off" oninput="validateTextInput(this)">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="product_name">Apellido</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" autocomplete="off" oninput="validateTextInput(this)">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="document_type_id">Estado Civíl</label>
                    <select class="form-control select_group" id="civil_status_id" name="civil_status_id">
                      <option value="">Seleccione el Estado Civil</option>
                      <?php foreach ($civil_status as $k => $v) : ?>
                        <option value="<?php echo $v['id'] ?>"><?php echo $v['name'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="birthdate">Fecha de Nacimiento</label>
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
                    <label for="edad">Edad</label>
                    <input type="text" class="form-control" id="edad" name="edad" readonly placeholder="Calculando..." />
                  </div>
                </div>



                <div class="col-md-3">
                  <div class="form-group">
                    <label for="document_number">Tipo de Sangre</label>
                    <select class="form-control select_group" id="blood_type_id" name="blood_type_id">
                      <option value="">Seleccione el Grupo Sanguíneo</option>
                      <?php foreach ($blood_types as $k => $v) : ?>
                        <option value="<?php echo $v['id'] ?>"><?php echo $v['name'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="country_id">País de Nacimiento</label>
                    <select class="form-control select_group country_id" id="country_id" name="country_id">
                      <option value="">Seleccione el País</option>
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
                      <option value="">Seleccione el Departamento</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="product_name">Ciudad/Municipio</label>
                    <select class="form-control select_group province_id" id="province_id" name="province_id">
                      <option value="">Seleccione la Ciudad/Municipio</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="country_id2">País de Residencia</label>
                    <select class="form-control select_group country_id2" id="country_id2" name="country_id2">
                      <option value="">Seleccione el País</option>
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
                      <option value="">Seleccione el Departamento</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="product_name">Provincia</label>
                    <select class="form-control select_group province_id2" id="province_id2" name="province_id2">
                      <option value="">Seleccione la Ciudad/Municipio</option>
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
                    <label for="sku">Teléfono Móvil</label>
                    <input type="text" class="form-control" id="mobile_phone" name="mobile_phone" autocomplete="off" oninput="validateNumberInput(this)" />
                  </div>
                  <!-- Modal para seleccionar país -->
                  <div id="countryModal" class="col-md-6">
                    <div class="form-group">
                      <span class="close" onclick="closeCountryModal()">&times;</span>
                      <label for="telephone">Indicativo del País</label>
                      <select class="form-control" id="telephone" name="telephone" onchange="updateCountryCode(); closeCountryModal();">
                        <option value="57">Colombia (+57)</option>
                        <option value="593">Ecuador (+593)</option>
                        <option value="58">Venezuela (+58)</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <label for="sku">Teléfono Fijo</label>
                    <div class="form-group">
                      <input type="text" class="form-control" id="telephone" name="telephone" autocomplete="off" oninput="validateNumberInput(this)" />
                      <div class="input-group-append">
                        <button class="btn btn-secondary" type="button" onclick="openCountryModal()">+</button>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="sku">Correo Electrónico</label>
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
        url: 'fetchDepartmentByCountry/' + selectedCountryId,
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
        url: 'fetchProvincesByDepartmentId/' + selectedDepartmentId,
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
        url: 'fetchDepartmentByCountry/' + selectedCountryId,
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
        url: 'fetchProvincesByDepartmentId/' + selectedDepartmentId,
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
    const regex = /^[A-Za-z0-9\s]*$/; // Expresión regular para letras mayúsculas, minúsculas, números y espacios en blanco

    if (restrictedChars.test(inputValue)) {
      input.setCustomValidity("No se permiten ciertos caracteres especiales.");
      input.value = input.value.replace(restrictedChars, ''); // Eliminar caracteres no permitidos
    } else if (!regex.test(inputValue)) {
      input.setCustomValidity("El campo solo puede contener letras mayúsculas, minúsculas, números y espacios en blanco.");
      input.value = inputValue.replace(/[^A-Za-z0-9\s]/g, ''); // Eliminar otros caracteres no permitidos
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



  function validateTextInput(input) {
    const inputValue = input.value;
    const filteredValue = inputValue.replace(/[^a-zA-Z\s]/g, '').toUpperCase();

    input.value = filteredValue;
  }




  function convertToUppercase(input) {
    input.value = input.value.toUpperCase(); // Convertir a mayúsculas
  }

  const fechaNacimientoInput = document.getElementById("birthdate");
  const edadInput = document.getElementById("edad");

  fechaNacimientoInput.addEventListener("input", function() {
    const fechaNacimiento = new Date(this.value);
    const fechaActual = new Date();

    let edad = fechaActual.getFullYear() - fechaNacimiento.getFullYear();

    if (
      fechaNacimiento.getMonth() > fechaActual.getMonth() ||
      (fechaNacimiento.getMonth() === fechaActual.getMonth() &&
        fechaNacimiento.getDate() > fechaActual.getDate())
    ) {
      edad--;
    }

    edadInput.placeholder = `${edad} años`;
  });

  function validateNumberInput(inputElement) {
    const phoneNumber = inputElement.value;
    const countryCode = getCountryCode(phoneNumber);

    let countryCodeLabel = '';
    if (countryCode) {
      countryCodeLabel = `(${countryCode}) `;
    }

    inputElement.value = `${countryCodeLabel}${phoneNumber}`;
  }

  function updatePhoneNumber(inputElement) {
    const phoneNumber = inputElement.value.replace(/\D/g, ''); // Elimina cualquier carácter no numérico
    const countryCode = getCountryCode(phoneNumber);

    let formattedPhoneNumber = phoneNumber;
    if (countryCode) {
      formattedPhoneNumber = `(${countryCode}) ${phoneNumber}`;
    }

    inputElement.value = formattedPhoneNumber;
  }

  function updateCountryCode() {
    const countrySelect = document.getElementById('country');
    const selectedCountryCode = countrySelect.value;
    localStorage.setItem('selectedCountryCode', selectedCountryCode);
    updatePhoneNumber();

  }

  let isCountryModalOpen = false;

  function openCountryModal() {
    const countryModal = document.getElementById('countryModal');
    countryModal.style.display = 'block';
    isCountryModalOpen = true;
  }

  function closeCountryModal() {
    const countryModal = document.getElementById('countryModal');
    countryModal.style.display = 'none';
    isCountryModalOpen = false;
  }

  function updateCountryCode() {
    const countrySelect = document.getElementById('country');
    const selectedCountryCode = countrySelect.value;
    localStorage.setItem('selectedCountryCode', selectedCountryCode);
  }

  function validateNumberInput(input) {
    const inputValue = input.value;
    const numericValue = inputValue.replace(/\D/g, ''); // Filtrar caracteres no numéricos

    input.value = numericValue; // Actualizar el valor del campo solo con números
  }

  // Load previously selected country code if available
  document.addEventListener('DOMContentLoaded', function() {
    const storedCountryCode = localStorage.getItem('selectedCountryCode');
    if (storedCountryCode) {
      const countrySelect = document.getElementById('country');
      countrySelect.value = storedCountryCode;
    }
  });
</script>