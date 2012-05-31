<?php

class New_info extends CI_Model {
  function new_course($data){
    $this->db->insert('datos_curso',$data);
  }

}
