<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends PIS_Controller {
  
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mod_user','user');
  }
  

  public function index()
  {
    $data['codepage'] = "back_login";
    $data['page_title'] 	= 'Login';
    if($this->user->logged_id()){ 
      base_url('sarimin'); 
    } else { 
      $this->form_validation->set_rules('email', 'E-mail', 'required'); 
      $this->form_validation->set_rules('password', 'Password', 'required'); //jika session belum terdaftar 
      if ($this->form_validation->run() == false) {
        base_url('sarimin'); 
      } else { 
        $data_user = array(
          'email'     => $_POST['email'],
          'password'  => $_POST['password']
        );
        $checking = $this->user->checkLoginAdmin($data_user); 
        if ($checking == true) { 
          foreach ($checking as $apps) {
              $session_data = array( 
               'id'         => $apps->id,
               'username'   => $apps->username,
               'email'      => $apps->email, 
               'fullname'   => $apps->fullname,
               'status'     => 'admin'
              ); 
              $this->session->set_userdata($session_data); 
              redirect(base_url('admin/dashboard'));
          } 
        } else { 
          redirect(base_url('sarimin'));
        } 
      } 
    } 
    $this->template->back_views('site/back/login',$data);
  }
  public function logout(){
    $this->session->sess_destroy();    
    redirect(base_url('sarimin'));
  }
  public function listUser(){
    $data['codepage']     = "back_useradmin";
    $data['page_title'] 	= 'List User Admin';
    $data['useradmin']    = $this->user->getUserAdmin()->result_array();
    // print_r($data['useradmin']);die();
    $this->template->back_views('site/back/listUser',$data);
  }
  public function banAdmin($id){
    return $this->user->banadmin($id);      
  }
  public function detailAdmin(){
    $data['codepage']     = "back_useradmin_detail";
    $data['useradmin']    = $this->user->getUserAdminByUsername($this->uri->segment(3))->row_array();
    // print_r($data['useradmin'] );die();
    $data['page_title'] 	= 'Detail user '.$data['useradmin']['fullname'];
    $this->template->back_views('site/back/userProfile',$data);
  }

}

/* End of file User.php */
