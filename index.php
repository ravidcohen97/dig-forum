<?php 

session_start();
$page_title = 'Home Page';

?>

<?php include('tpl/header.php'); ?>

<main class="min-h-900">
  <div class="container mt-3">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="display-4">Welcome to digg site!</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        <p class="mt-4">
          <a href="signup.php" class="btn btn-outline-warning">START DIGG NOW!</a>
        </p>
      </div>
    </div>
  </div>
</main>

<?php include('tpl/footer.php'); ?>