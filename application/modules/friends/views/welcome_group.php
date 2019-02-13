<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" type="text/css"  href="<?php echo base_url()?>assets/themes/custom/styles.css"/>
    <!-- <script src="main.js"></script>  -->
</head>
<div class="container" style="margin-top:80px;">
 
<body>
    <h1>Welcome to<?php echo ' ' .$group_name?></h1>
    <ol>
    <li>Group name<?php echo $group_name?></li>
    <li>Number of friends<?php echo count($friends_id)?></li>
    <!-- <li>Hobby:<//?php echo $friend_hobby?></li>
    <li>Phone:<//?php echo $friend_phone?></li>
    <li>Image:<//?php echo $friend_image?></li> -->
    
    </ol>
    
</body>
</div>
</html>