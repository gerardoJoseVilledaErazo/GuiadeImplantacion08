<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Materia_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $query = $this->db->get("materias");
        $records = $query->result();
        return $records;
    }

    public function insert($data)
    {
        $this->db->insert("materias", $data);
        $rows = $this->db->affected_rows();
        return $rows;
    }

    public function delete($id)
    {
        if ($this->db->delete("materias", "idmateria='" . $id . "'")) {
            return true;
        }
    }
    public function getById($id)
    {
        return $this->db->get_where("materias", array("idmateria" => $id))->row();
    }
    public function update($data, $id)
    {
        $this->db->set($data);
        $this->db->where("idmateria", $id);
        $this->db->update("materias", $data);
        $rows = $this->db->affected_rows();
        return $rows;
    }
}
