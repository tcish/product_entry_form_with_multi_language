<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Welcome extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$lang = ($this->session->userdata("lang")) ? $this->session->userdata("lang") : config_item("language");
			$this->lang->load("new", $lang);
		}

		public function categories(){
			$data["cat"] = $this->product_model->categories();
			$data["sub_cat"] = $this->category_model->sub_category();

			$this->load->view("categories/cat_list", $data);
		}

		public function cat_insert(){
			$this->category_model->add_cat();
		}

		public function updateCat($id){
			$data["id"] = $id;
			$data["upCatFetch"] = $this->category_model->upCatFetch($id);
			$this->load->view("categories/edit_category", $data);
			$this->category_model->upCat($id);
		}

		public function deleteCat($id){
			$data["id"] = $id;

			$this->category_model->delCat($id);
			redirect("welcome/categories");
		}

		public function sub_cat_insert() {
			$data["cat"] = $this->product_model->categories();
			$this->load->view("sub_cat/sub_cat_add" , $data);

			$this->category_model->add_sub_cat();
		}

		public function updateSubCat($id, $cat_id){
			$data["id"] = $id;
			$data["cat_id"] = $cat_id;
			$data["cat"] = $this->product_model->categories();
			$data["fetch_sub_cat"] = $this->category_model->sub_cat_fetch($id);

			$this->load->view("sub_cat/edit_sub_cat", $data);
			$this->category_model->update_sub_cat($id);
		}

		public function deleteSubCat($id){
			$data["id"] = $id;

			$this->category_model->delSubCat($id);
			redirect("welcome/categories");
		}

		public function index(){
			$data["allFetch"] = $this->product_model->allData();
			$this->load->view('index', $data);
		}

		public function insert(){
			$this->product_model->insertData();
		}

		public function updatePage($id, $cat_id, $brand_id){
			$data["id"] = $id;
			$data["cat_id"] = $cat_id;
			$data["brand_id"] = $brand_id;
			
			$data["cat"] = $this->product_model->categories();
			$data["brands"] = $this->product_model->brand();
			$data["upFetch"] = $this->product_model->upFetch($id);
			$this->load->view("edit_product", $data);
			
			$this->product_model->upData($id);
		}

		public function delete($delId){
			$data["id"] = $delId;

			$this->product_model->delData($delId);
			redirect("welcome/");
		}
	}
?>