<?php 
   class Jobs extends CI_Model{

public function insertData($data) { 
         if ($this->db->insert("test", $data)) { 
            return true; 
         } 
      } 
   
public function deleteData($id){
	$this->db->where('id', $id);
// here we select every column of the table
	$result = $this->db->delete('test');
	if (empty($result)) {
		# code...
		return $result;
	}
	else{
		return $result;
	}

}


   }

   ?>