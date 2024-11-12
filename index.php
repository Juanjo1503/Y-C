<?php 
include 'plantilla.html'; 
require_once 'includes/class_cliente.php';

// Obtener estadísticas de usuarios
$cliente = new cliente();
$estadisticas = $cliente->obtener_estadisticas();
?>

<?php startblock('article') ?>

<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="row">
      <div class="col-12 col-xl-8 mb-4 mb-xl-0">
        <h3 class="font-weight-bold">Y&C tienda deportiva</h3>
        <h6 class="font-weight-normal mb-0">En este apartado se encuentran <span class="text-primary">todos los detalles!</span></h6>
      </div>
    </div>
  </div>
</div>

<!-- Tarjeta UDI Electiva Profesional -->
<div class="row">
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card tale-bg">
      <div class="card-people mt-auto">
<!--<img src="assets/images/dashboard/people.svg" alt="people">-->
        <img src="cafeteria.webp" alt="people">
        <div class="weather-info">
          <div class="d-flex">
            <div class="ms-2">
             <!-- <h4 class="location font-weight-normal">UDI</h4>  -->
             <!-- <h6 class="font-weight-normal">Electiva Profesional</h6>  -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Tarjetas de Estadísticas -->
  <div class="col-md-6 grid-margin transparent">
    <div class="row">
      <div class="col-md-6 mb-4 stretch-card transparent">
        <div class="card card-tale">
          <div class="card-body">
            <p class="mb-4">Total de Usuarios Registrados</p>
            <p class="fs-30 mb-2"><?php echo $estadisticas['total']; ?></p>
          </div>
        </div>
      </div>
      <div class="col-md-6 mb-4 stretch-card transparent">
        <div class="card card-dark-blue">
          <div class="card-body">
            <p class="mb-4">Usuarios Activos</p>
            <p class="fs-30 mb-2"><?php echo $estadisticas['activos']; ?></p>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
  
      <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
        <div class="card card-light-blue">
          <div class="card-body">
            <p class="mb-4">Usuarios Inactivos</p>
            <p class="fs-30 mb-2"><?php echo $estadisticas['inactivos']; ?></p>
          </div>
        </div>
      </div>

      <div class="col-md-6 stretch-card transparent">
        <div class="card card-light-danger">
          <div class="card-body">
            <p class="mb-4">Visión de registros (2024)</p>
            <p class="fs-30 mb-2">+1000</p> 
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php endblock() ?>
