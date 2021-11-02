<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

require_once dirname(__FILE__) . '/tcpdf/tcpdf.php'; //Tengo dudas
//require_once dirname(__FILE__) . '/tcpdf_min/tcpdf.php'; //Tengo dudas

class Report extends TCPDF
{

    public $titulo;

    public function __construct()
    {
        parent::__construct();
    }

    //Cabecera de página
    public function Header()
    {
        // Fuente
        $this->SetFont('helvetica', 'B', 20);
        // Titulo
        $this->Cell(0, 15, $this->titulo, 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Pie de página
    public function Footer()
    {
        // Posición a 15mm del borde inferior
        $this->SetY(-15);
        // Fuente
        $this->SetFont('helvetica', '', 8);
        // Números de página
        $this->Cell(0, 10, 'Página ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

/* End of file Report.php */
/* Location: ./application/libraries/Report.php */