
<!doctype html>
<html lang="en">
  <head>
   
 <?php $this->load->view("site/layouts/includes/header");?>
 
  </head>
  <body class="text-center">
    
  <?php 
    $error=$this->session->flashdata("error");
    
    if(!empty($error)){
        ?>
        <div class="alert alert danger">
            <?php echo $error;?>
        </div>
    
    <?php
     }
  ?>
 <?php echo $content?>
</body>
</html>
