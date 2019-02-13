<?php
Class Groups_model extends CI_Model{
   public function add_group(){
$data=array(
    "group_name"=>$this->input->post("group_name") );
  
$this->db->insert("group_table",$data);
   } 
//    public function get_friend(){
//        $this->db->order_by("created","DESC");
//        return $this->db->get('group_table');
//    }
//    public function get_single($friend_id){
//     $this->db->where("group_table_id",$friend_id);
//     return $this->db->get("group_table");
//    }
   public function get_group_info(){
   $this->db->select('group_table.group_table_id, group_table.group_name, group_table.created,
   friend.friend_id');
   $this->db->from('group_table')->join('friend', 'group_table.group_table_id = friend.friend_id');
   $query = $this->db->get();

   return $query;
   }
}
?>