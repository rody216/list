<aside class="main-sidebar">
  <section class="sidebar">
    <ul class="sidebar-menu" data-widget="tree">
      <li id="dashboardMainMenu">
        <a href="<?php echo base_url('dashboard') ?>">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      <li id="dashboardMainMenu">
        <a href="<?php echo base_url('documents/search') ?>">
          <i class="fa fa-search"></i> <span>Búsqueda y Visualización</span>
        </a>
      </li>
      <?php if($user_permission): ?>
        <?php if(in_array('createEmployee', $user_permission) || in_array('updateEmployee', $user_permission) || in_array('viewEmployee', $user_permission) || in_array('deleteEmployee', $user_permission)): ?>
          <li class="treeview" id="mainEmployeeNav">
            <a href="#">
              <i class="fa fa-cube"></i>
              <span>Registros</span>
              <span class="pulßl-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <?php if(in_array('createEmployee', $user_permission)): ?>
                <li id="addEmployeeNav"><a href="<?php echo base_url('employees') ?>"><i class="fa fa-circle-o"></i> Agregar Empleados</a></li>
              <?php endif; ?>
              <?php if(in_array('updateEmployee', $user_permission) || in_array('viewEmployee', $user_permission) || in_array('deleteEmployee', $user_permission)): ?>
              <li id="manageEmployeeNav"><a href="<?php echo base_url('employees/family') ?>"><i class="fa fa-circle-o"> Agregar familiares</i> </a></li>
              <?php endif; ?>              
              <?php if(in_array('createDocument', $user_permission)): ?>
              <li id="documentSpoaNav"><a href="<?php echo base_url('documents/spoa') ?>"><i class="fa fa-circle-o"></i>Spoa</a></li>
              <li id="documentRnmcNav"><a href="<?php echo base_url('documents/rnmc') ?>"><i class="fa fa-circle-o"> Rnmc</i> </a></li>
              <li id="documentMmpNav"><a href="<?php echo base_url('documents/mmp') ?>"><i class="fa fa-circle-o"> Mmp</i> </a></li>
              <li id="documentPonalNav"><a href="<?php echo base_url('documents/ponal') ?>"><i class="fa fa-circle-o"></i>Ponal</a></li>
              <li id="documentProcuraduriaNav"><a href="<?php echo base_url('documents/procuraduria') ?>"><i class="fa fa-circle-o"> Procuraduría</i> </a></li>
              <li id="documentJudicialNav"><a href="<?php echo base_url('documents/judicial') ?>"><i class="fa fa-circle-o"> Rama judicial Procesos</i> </a></li>
              <li id="documentRadicadosNav"><a href="<?php echo base_url('documents/judicial_radicados') ?>"><i class="fa fa-circle-o"> Rama judicial Radicados</i> </a></li>
              <li id="manageEmployeeNav"><a href="<?php echo base_url('employees') ?>"><i class="fa fa-circle-o"> Simit</i> </a></li>
              <li id="manageContraloriaNav"><a href="<?php echo base_url('documents/contraloria') ?>"><i class="fa fa-circle-o"> Contraloria</i> </a></li>
              <li id="documentPropertyNav"><a href="<?php echo base_url('documents/property') ?>"><i class="fa fa-circle-o"></i>Propiedades Inmuebles</a></li>
              <li id="documentVehiclesNav"><a href="<?php echo base_url('documents/vehicles') ?>"><i class="fa fa-circle-o"> Vehiculos</i> </a></li>
              <li id="documentBankingNav"><a href="<?php echo base_url('documents/banking') ?>"><i class="fa fa-circle-o"> Datos financieros</i> </a></li>
              <?php if(in_array('createDocumentType', $user_permission) || in_array('updateDocumentType', $user_permission) || in_array('viewDocumentType', $user_permission) || in_array('deleteDocumentType', $user_permission)): ?>
              <li id="createUserNav"><a href="<?php echo base_url('documenttypes/') ?>"><i class="fa fa-circle-o"></i> Tipos de documentos</a></li>
              <?php endif; ?>
              <?php endif; ?>
            </ul>
          </li>
        <?php endif; ?>
        <?php if(in_array('createEmployee', $user_permission) || in_array('updateEmployee', $user_permission) || in_array('viewEmployee', $user_permission) || in_array('deleteEmployee', $user_permission)): ?>
          <?php if(in_array('createUser', $user_permission) || in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
            <li class="treeview" id="mainUserNav">
            <a href="#">
              <i class="fa fa-users"></i>
              <span>Administrador de usuarios</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <?php if(in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
              <li id="manageUserNav"><a href="<?php echo base_url('users') ?>"><i class="fa fa-circle-o"></i> Usuarios</a></li>
              <?php endif; ?>
              <?php if(in_array('updateGroup', $user_permission) || in_array('viewGroup', $user_permission) || in_array('deleteGroup', $user_permission)): ?>
                <li id="manageGroupNav"><a href="<?php echo base_url('groups') ?>"><i class="fa fa-circle-o"></i> Roles</a></li>
              <?php endif; ?>
            </ul>
          </li>
          <?php endif; ?>
        <?php endif; ?>
      <?php if(in_array('viewProfile', $user_permission)): ?>
        <li><a href="<?php echo base_url('users/profile/') ?>"><i class="fa fa-user-o"></i> <span>Perfil</span></a></li>
      <?php endif; ?>
      <?php if(in_array('updateSetting', $user_permission)): ?>
        <li><a href="<?php echo base_url('users/setting/') ?>"><i class="fa fa-wrench"></i> <span>Configuración</span></a></li>
      <?php endif; ?>
      <?php endif; ?>
      <li><a href="<?php echo base_url('auth/logout') ?>"><i class="glyphicon glyphicon-log-out"></i> <span>Cerrar Sesión</span></a></li>
    </ul>

  </section>
</aside>