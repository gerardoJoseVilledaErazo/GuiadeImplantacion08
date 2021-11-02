<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profesor_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $query = $this->db->get("profesores");
        $records = $query->result();
        return $records;
    }

    public function insert($data)
    {
        $this->db->insert("profesores", $data);
        $rows = $this->db->affected_rows();
        return $rows;
    }

    public function delete($id)
    {
        if ($this->db->delete("profesores", "idprofesor='" . $id . "'")) {
            return true;
        }
    }
    public function getById($id)
    {
        return $this->db->get_where("profesores", array("idprofesor" => $id))->row();
    }
    public function update($data, $id)
    {
        $this->db->set($data);
        $this->db->where("idprofesor", $id);
        $this->db->update("profesores", $data);
        $rows = $this->db->affected_rows();
        return $rows;
    }
}
