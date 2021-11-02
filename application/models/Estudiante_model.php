<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Estudiante_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        //$query = $this->db->get("estudiantes");
        
        // consulta personalizada
        $query = $this->db->query("SELECT a.idestudiante, a.nombre, a.apellido, a.email, a.idcarrera, b.carrera, a.usuario 
                                   FROM estudiantes a, carreras b WHERE a.idcarrera = b.idcarrera;");
        $records = $query->result();
        return $records;
    }

    public function insert($data)
    {
        $this->db->insert("estudiantes", $data);
        $rows = $this->db->affected_rows();
        return $rows;
    }

    public function delete($id)
    {
        if ($this->db->delete("estudiantes", "idestudiante='" . $id . "'")) {
            return true;
        }
    }
    public function getById($id)
    {
        return $this->db->get_where("estudiantes", array("idestudiante" => $id))->row();
    }
    public function update($data, $id)
    {
        $this->db->set($data);
        $this->db->where("idestudiante", $id);
        $this->db->update("estudiantes", $data);
        $rows = $this->db->affected_rows();
        return $rows;
    }
}
