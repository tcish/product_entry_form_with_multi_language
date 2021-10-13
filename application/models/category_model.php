<?php
  class category_model extends CI_Model{
   public function add_cat() {
     $this->form_validation->set_rules("category", "Category", "required|trim");

    if($this->form_validation->run() == FALSE) {
      $this->load->view("categories/add_cat");
    }else{
      $userData = array(
        "name" => $this->input->post("category"),
      );
      $this->db->insert("categories", $userData);
      redirect('welcome/categories');
    }
   }

   public function upCatFetch($id){
    $cat = $this->db->select("*")->from("categories")->where("id", $id)->get();
    return $cat->result_array();
   }

   public function upCat($id){
    $this->form_validation->set_rules("category", "Category", "required|trim");

    if($this->form_validation->run() == FALSE){
       $this->load->view("categories/add_cat");
     }else{
      $userData = array(
        "name" => $this->input->post("category"),
      );
      $this->db->where("id", $id)->update("categories", $userData);
      redirect('welcome/categories');
    }
   }

   public function delCat($id){
    $this->db->where('id', $id)->delete('categories');
   }

   public function add_sub_cat(){
    $this->form_validation->set_rules("category", "Category", "required");
    $this->form_validation->set_rules("sub_category", "Sub Category", "required|trim");

    if($this->form_validation->run() == FALSE) {
      $this->load->view("sub_cat/sub_cat_add");
    }else{
      $userData = array(
        "cat_id" => $this->input->post("category"),
        "sub_cat_name" => $this->input->post("sub_category"),
      );
      $this->db->insert("sub_categories", $userData);
      redirect('welcome/categories');
    }
   }

   public function sub_category(){
    $sub_cat = $this->db->select("*")->from("sub_categories")->join("categories", "sub_categories.cat_id = categories.id")->order_by("sub_categories.sub_cat_id", "desc")->get();
    return $sub_cat->result_array();
   }

   public function sub_cat_fetch($id){
     $sub_cat_fetch = $this->db->select("*")->from("sub_categories")->where("sub_cat_id", $id)->get();
      return $sub_cat_fetch->result_array();
   }

   public function update_sub_cat($id){
    $this->form_validation->set_rules("category", "Category", "required");
    $this->form_validation->set_rules("sub_category", "Sub Category", "required|trim");

    if($this->form_validation->run() == FALSE) {
      $this->load->view("sub_cat/edit_sub_cat");
    }else{
      $userData = array(
        "cat_id" => $this->input->post("category"),
        "sub_cat_name" => $this->input->post("sub_category"),
      );
      $this->db->where("sub_cat_id", $id)->update("sub_categories", $userData);
      redirect('welcome/categories');
    }
   }

   public function delSubCat($id){
    $this->db->where('sub_cat_id', $id)->delete('sub_categories');
   }
  }
?>