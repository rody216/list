<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url('') ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>BLI-NP</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>BLI-NP</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>     
      <div class="hora" id="hora-local"></div> 
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  
  <script>
  function mostrarHoraYFechaLocal() {
  var fecha = new Date();
  var hora = fecha.toLocaleTimeString();
  var fechaFormatted = fecha.toLocaleDateString();
   document.getElementById("hora-local").innerHTML = "Fecha de ingreso: " + fechaFormatted;
 }
 //  Actualizar la hora y fecha cada segundo (1000 milisegundos)
setInterval(mostrarHoraYFechaLocal, 1000);
</script>