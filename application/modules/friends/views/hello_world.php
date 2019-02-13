<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>assets/themes/custom/styles.css" />
    <!-- <script src="main.js"></script> -->
</head>
<body>
    
   <div class="container-fluid" style="margin-top:80px;margin-left:200px;">
       <?php 
       $success=$this->session->flashdata("success_message");
       $error=$this->session->flashdata("error_message");
       ?>
      <?php
            echo form_open('friends/hello/execute_search');
            
            echo form_input(array('name' => 'search'));
            
            echo form_submit('search_submit', 'Submit');
            

			echo form_close();
			?>
       <h1>My Friends</h1>
       <?php echo anchor ("friends/hello/new_friend/", "add friend"); ?>
       <table class="table">
           <tr>
           <th>Count
                </th>
               <th>Name
                </th>
                <th>Age
                </th>
                <th>Gender
                </th>
                <th>Hobby
                </th>
                <th>Phone No.
                </th>
                <th>Image
                </th>
            </tr>
            <?php
            if($all_friends->num_rows()>0){
                $count=0;
                foreach($all_friends->result()
                 as $row){
                    {
                        $count++;
                        $id=$row->friend_id;
                        $name=$row->friend_name;
                        $age=$row->friend_age;
                        $gender=$row->friend_gender;
                         $hobby=$row->friend_hobby;
                         
                         $friend_phone=$row->friend_phone;
                         $friend_image=$row->friend_image;
                       
                        ?>
                        <tr>
                            <td><?php echo $count;?></td>
                            <td><?php echo $name;?></td>
                            <td><?php echo $age;?></td>
                            <td><?php echo $gender;?></td>
                            <td><?php echo $hobby;?></td>
                            <td><?php echo $friend_phone;?></td>
                           
                            <td><img class="thumbnail" style="height: 100px; width: 100px;" src="<?php echo base_url(); ?>uploads/images/<?php echo $row->friend_image; ?>"></td>
                           
                            <td> 
                            <?php echo anchor("friends/hello/hello_world/".$id,"View");?>
                    <a href="<?php echo site_url()?>friends/hello/hello_world/">
                        </td>
                    </tr>
                    <?php
                   
                   
                    }
                }

            }
          ?>
</table>
<!-- <//?php echo ('<div id="pagination">'. $this->pagination->create_links().'</div>');?> -->
        </div>
</body>
</html>