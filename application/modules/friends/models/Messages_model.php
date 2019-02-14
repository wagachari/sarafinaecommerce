<?php
Class Messages_model extends CI_Model{
   public function add_message(){
$data=array(
    "message"=>$this->input->post("message") );
  
$this->db->insert("message",$data);
   } 

   public function get_message_info(){
   // $this->db->select('message.message_id, message.message, message.created,
   // friend_group_table.friend_group_table_id');
   // $this->db->from('message')->join('friend_group_table', 'message.message_id = friend_group_table.friend_group_table_id');
   $this->db->order_by("created","DESC");
  
   return $this->db->get('message');
  //Joining the tables
  e

  
   
   }
}
?>