<?php
Class Messages_model extends CI_Model{
   public function add_message(){
$data=array(
    "message"=>$this->input->post("message") );
  
$this->db->insert("message",$data);
   } 
//    public function get_friend(){
//        $this->db->order_by("created","DESC");
//        return $this->db->get('group_table');
//    }
//    public function get_single($friend_id){
//     $this->db->where("group_table_id",$friend_id);
//     return $this->db->get("group_table");
//    }
   public function get_message_info(){
   $this->db->select('message.message_id, message.message, message.created,
   friend_group_table.friend_group_table_id');
   $this->db->from('message')->join('friend_group_table', 'message.message_id = friend_group_table.friend_group_table_id');
   $query = $this->db->get();

   return $query;
   }
}
?>