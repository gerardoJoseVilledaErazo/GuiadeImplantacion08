<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Grupo_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        //$query = $this->db->get("grupos");
        
        $query = $this->db->query("SELECT a.idgrupo, a.idprofesor, CONCAT(b.nombre, ' ', b.apellido) AS 'nombreCompleto', a.idmateria, c.materia,
                                   a.num_grupo, a.anio, a.ciclo
                                   FROM grupos a, profesores b, materias c WHERE a.idprofesor = b.idprofesor AND a.idmateria = c.idmateria;");
        $records = $query->result();
        return $records;
    }

    public function insert($data)
    {
        $this->db->insert("grupos", $data);
        $rows = $this->db->affected_rows();
        return $rows;
    }

    public function delete($id)
    {
        if ($this->db->delete("grupos", "idgrupo='" . $id . "'")) {
            return true;
        }
    }
    public function getById($id)
    {
        return $this->db->get_where("grupos", array("idgrupo" => $id))->row();
    }
    public function update($data, $id)
    {
        $this->db->set($data);
        $this->db->where("idgrupo", $id);
        $this->db->update("grupos", $data);
        $rows = $this->db->affected_rows();
        return $rows;
    }
}
