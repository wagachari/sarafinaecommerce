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
       <h1>Write Message</h1>
       <?php echo anchor ("friends/messages/new_message", "Write Message"); ?>
       <table class="table">
           <tr>
           <th>Count
                </th>
               <th>Message
                </th>
                <th>Group
                </th>
                <th>Sender
                </th>
                
                <th>Phone No.
                </th>
            </tr>
            <?php
            if($all_messages->num_rows()>0){
                $count=0;
                foreach($all_messages->result()
                 as $row){
                    {
                        $count++;
                        $id=$row->message_id;
                        $message=$row->message;
                        
                       
                        ?>
                        <tr>
                            <td><?php echo $count;?></td>
                            <td><?php echo $message.'  ';?></td>
                           
                           
                            <!-- <td><img class="thumbnail" style="height: 100px; width: 100px;" src="<//?php echo base_url(); ?>uploads/images/<//?php echo $row->friend_image; ?>"></td> -->
                           
                            <td> 
                            <!-- <//?php echo anchor("friends/messages/welcome/".$id,"Add message");?> -->
                            <!-- <a href="<//?php echo site_url()?>friends/messages/all_messages/"></a> -->
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