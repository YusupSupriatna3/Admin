<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style-1.css"> <!-- pemanggilan file css untuk style pada file index-1.html -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width , initial-scale=1">
  </head>
  <body>

    <div id="login"><!-- membuat sebuah div id dengan tujuan sebagai background utama  -->
      <div class="center"><!-- div dengan class center bertujuan untuk membuat posisi tag form yang akan dibuat akan menjadi rata tengah -->
        <?php
      if (!empty($this->session->flashdata('msg'))) {
        $message = $this->session->flashdata('msg');
        ?>
        <div class="alert alert-<?php echo $message['class']?>" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <center><?php echo $message['message'] ?></center>
        </div>
      <?php } ?>

          <h2>Login Admin</h2> <!-- membuat judul pembuka -->

          <form class="fl" action="<?php echo base_url(); ?>" method="POST">
            <input class="itpw" type="email" name="email" placeholder="Email"><br>
            <input class="itpw" type="password" name="password" placeholder="Password"><br>
            <input class="its" type="submit" name="btn_login" value="LOGIN">
          </form><!-- 

          <p><a href="#">Forget your password ?</a> | <a href="#">Created an account</a>  </p>
 -->
      </div>
    </div>

  </body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>