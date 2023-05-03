<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $this->load->helper('form');
		$this->load->view('public/home');
	}

    public function login()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('user_name','User Name','trim|required|valid_email');
        $this->form_validation->set_rules('password','Password','trim|required');

        if ( $this->form_validation->run() == false )
        {
            $data = array('load_error' => 'true');
            $this->load->view('public/home', $data);
            //$this->load->view('admin/home',$data);
        }
        else
        {
            //data stuff
            $this->load->model('Member');

            if ($this->Member->user_login($this->input->post('user_name'),
                $this->input->post('password')))
            {
                $this->load->view('admin/home');
            }

            else
            {
                //bad password
                $data = array('load_error' => 'true', 'error_message'=>'Invalid Username or Password');
                $this->load->view('public/home',$data);
            }
        }
    }

    public function create()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('user_name','User Name','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('password','Password','trim|required');
        $this->form_validation->set_rules('confirm_password','Confirm','trim|required');

        if ( $this->form_validation->run() == false)
        {
            $data = array('load_error' => 'true');
            $this->load->view('public/home', $data);
            //$this->load->view('admin/home',$data);
        }
        else
        {

            //data stuff
            $this->load->model('CreateMember');

            if ($this->CreateMember->user_create($this->input->post('user_name'), $this->input->post('email'),
                $this->input->post('password'), $this->input->post('confirm_password')))
            {
                $this->load->view('public/home');
            }

            else
            {
                //bad password
                $data = array('load_error' => 'true', 'error_message'=>'Invalid Data Inputted');
                $this->load->view('public/home',$data);
            }
        }
    }
}
