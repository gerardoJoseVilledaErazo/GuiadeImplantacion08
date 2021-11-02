<?php

class User_Authentication extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Se carga la libreria de validación de formularios
        $this->load->library('form_validation');
        // Se carga la libreria para Sesiones
        $this->load->library('session');
        // Se carga el modelo de login para la base de datos
        $this->load->model('login_database');
        // Se carga la libreria para URL
        $this->load->helper('url');
// **************************************************************************************
        /*if (!isset($this->session->userdata['logged_in'])) { 
            redirect("/");
        }*/
// **************************************************************************************
    }
    // Muestra la pantalla de inicio de sesión 
    public function index()
    {
        $this->load->view('login_form');
    }
    // Muestra la pantalla de registro 
    public function user_registration_show()
    {
        $this->load->view('registration_form');
    }
    // Valida y almacena la información de Registro en la base de datos 
    public function new_user_registration()
    {
        // Validación de la información de registro
        $this->form_validation->set_rules('username', 
            'Usuario', 
            'trim|required|is_unique[user_login.user_name]');
        $this->form_validation->set_rules('email_value', 'Email', 'trim|required|is_unique[user_login.user_email]');
        $this->form_validation->set_rules('password', 'Contraseña', 'trim|required');
        // Modificando el mensaje de validación para los errores
        $this->form_validation->set_message('required', 'El campo %s es requerido.');
        $this->form_validation->set_message('valid_email', 'El campo %s no es un correo válido.');
        $this->form_validation->set_message('is_unique', 'El valor de %s ya está asociado a otra cuenta.');
        if ($this->form_validation->run() == false) {
            $this->load->view('registration_form');
        } else {
            $data = array(
                'user_name' => $this->input->post('username'), 
                'user_email' => $this->input->post('email_value'),
                // Agregamos el hash de la contraseña
                'user_password' => sha1($this->input->post('password')),
            );
            $result = $this->login_database->registration_insert($data);
            if ($result) {
                $this->session->set_flashdata('message_display', '¡Usuario registrado correctamente!.'); 
                redirect('/');
            } else {
                $data['message_error'] = 'No se pudo registrar el usuario.';
                redirect('/user_authentication/user_registration_show', $data);
            } 
        }

    }
    // Validación y proceso de inicio de sesión 
    public function user_login_process()
    {
        $this->form_validation->set_rules('username', 'Usuario', 'trim|required');
        $this->form_validation->set_rules('password', 'Contraseña', 'trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido.');
        if ($this->form_validation->run() == false) {
            if (isset($this->session->userdata['logged_in'])) { 
                redirect("/estudiantes");
            } else {
                $this->load->view('login_form');
            }
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                // Se encripta la contraseña para poder compararla 
                'password' => sha1($this->input->post('password')),
            );
            $result = $this->login_database->login($data);
            // result es true si las credenciales del usuario son correctas
            if ($result == true) {
                $username = $this->input->post('username');
                $result = $this->login_database->read_user_information($username);
                if ($result != false) {
                    $session_data = array(
                        'username' => $result[0]->user_name, 
                        'email' => $result[0]->user_email,
                    );
                    // Guardando la información del usuario en la sesión
                    $this->session->set_userdata('logged_in', $session_data);
                    redirect("/estudiantes");
                }
            } else {
                $this->session->set_flashdata('message_error', 
                'Usuario o contraseña incorrectos.'); 
                redirect("/");
            } 
        } 
    }
    // Cerrar sesión desde dentro del sistema 
    public function logout()
    {
        $sess_array = array( 
            'username' => '',
        );
        // Eliminando información de la sesión
        $this->session->unset_userdata('logged_in', $sess_array);
        $this->session->set_flashdata('message_display', 
        'Sesión cerrada correctamente, ¡vuelve pronto!.');
        redirect("/");
    } 
}