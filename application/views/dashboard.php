

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content contenedor">
      <!-- Small boxes (Stat box) -->
      <?php if($is_admin == true): ?>
          <div class="col-lg-8 col-xs-8">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3><?php echo $total_users; ?></h3>
                <p>REGISTRO BlI-NP</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-people"></i>
              </div>
              <!--<a href="<?php echo base_url('users/') ?>" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>-->
            </div>
          </div>
        </div>
        <!-- /.row -->
      <?php endif; ?>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script type="text/javascript">
    $(document).ready(function() {
      $("#dashboardMainMenu").addClass('active');
    }); 
  </script>
