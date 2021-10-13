<?php
  class language extends CI_Controller{
    public function eng(){
      $this->session->unset_userdata("lang");
      $this->session->set_userdata("lang", "english");
      redirect(base_url());
    }

    public function bg(){
      $this->session->unset_userdata("lang");
      $this->session->set_userdata("lang", "bangla");
      redirect(base_url());
    }

    public function hnd(){
      $this->session->unset_userdata("lang");
      $this->session->set_userdata("lang", "hindi");
      redirect(base_url());
    }
  }
?>