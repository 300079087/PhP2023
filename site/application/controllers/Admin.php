<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
        $data = array('dashboard'=>'true');
		$this->load->view('admin/dashboard', $data);
	}
    //1 is blank
    //2 for registration form code
    //7 for grid display

    public function manage_marathons()
    {
        $data = array('manage_marathons'=>'true');
        $this->load->view('admin/manage_marathons', $data);
    }

    public function add_marathons()
    {
        $data = array('add_marathons'=>'true');
        $this->load->view('admin/add_marathons', $data);
    }

    public function manage_runners()
    {
        $data = array('manage_runners'=>'true');
        $this->load->view('admin/manage_runners', $data);
    }

    public function registration_form()
    {
        $data = array('registration_form'=>'true');
        $this->load->view('admin/registration_form', $data);
    }

}
