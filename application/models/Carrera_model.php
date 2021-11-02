<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Carrera_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getAll()
    {
        $query = $this->db->get("carreras");
        $records = $query->result();
        return $records;
    }

    public function insert($data)
    {
        $this->db->insert("carreras", $data);
        $rows = $this->db->affected_rows();
        return $rows;
    }

    public function delete($id)
    {
        if ($this->db->delete("carreras", "idcarrera='" . $id . "'")) {
            return true;
        }
    }

    public function getById($id)
    {
        return $this->db->get_where("carreras", array("idcarrera" => $id))->row();
    }

    public function update($data, $id)
    {
        $this->db->set($data);
        $this->db->where("idcarrera", $id);
        $this->db->update("carreras", $data);
        $rows = $this->db->affected_rows();
        return $rows;
    }
}

?>
