<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>


 <?= $this->include('partials/links'); ?>
</head>
<body class="hold-transition s-idebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <?= $this->include('partials/navbar'); ?>
  <?php 
    $session = session();
    $hesap_turu = $session->get('hesap_turu');
    if($hesap_turu==1){
     echo view('partials/admin/sidebar',$this->data);  
    }
    else{
      echo view('partials/sidebar',$this->data);
    }
   ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <?= $this->renderSection('content',) ?>
  </div>
  <!-- /.content-wrapper -->


<?= $this->include('partials/footer'); ?> 

<?= $this->include('partials/scripts'); ?> 

<?= $this->renderSection('pageSpecificScript'); ?> 
</body>
</html>
