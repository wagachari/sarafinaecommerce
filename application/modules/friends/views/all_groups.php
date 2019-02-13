<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>assets/themes/custom/styles.css" />
    <!-- <script src="main.js"></script> -->
</head>
<body>
    
   <div class="container" style="margin-top:80px;margin-left:250px;">
       <?php 
       $success=$this->session->flashdata("success_message");
       $error=$this->session->flashdata("error_message");
       ?>
       <h1>My Groups</h1>
       <?php echo anchor ("friends/groups/new_group/", "add group"); ?>
       <table class="table">
           <tr>
           <th>Count
                </th>
               <th>Name
                </th>
                <th>No. of friends
                </th>
                <th>No. of messages
                </th>
                
                <th>Image
                </th>
            </tr>
            <?php
            if($all_groups->num_rows()>0){
                $count=0;
                foreach($all_groups->result()
                 as $row){
                    {
                        $count++;
                        $id=$row->group_table_id;
                        $group_name=$row->group_name;
                        
                       
                        ?>
                        <tr>
                            <td><?php echo $count;?></td>
                            <td><?php echo $group_name.'  ';?></td>
                           
                           
                            <!-- <td><img class="thumbnail" style="height: 100px; width: 100px;" src="<//?php echo base_url(); ?>uploads/images/<//?php echo $row->friend_image; ?>"></td> -->
                           
                            <td> 
                            <!-- <//?php echo anchor("groups/groups/welcome/".$id,"View");?> -->
                    <a href="<?php echo site_url()?>friends/groups/welcome/">
                        </td>
                    </tr>
                    <?php
                   
                    //echo <div id="pagination">'. $this->pagination->create_links().'</div>;
                    }
                }

            }
          ?>
</table>
 
        </div>
</body>
</html>