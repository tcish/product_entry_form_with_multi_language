<?php
  class product_model extends CI_Model{
    public function brand(){
      $brand_query = $this->db->get('brands');
      return $brand_query->result_array();
    }

    public function categories(){
      $categories_query = $this->db->order_by("id", "desc")->get('categories');
      return $categories_query->result_array();
    }

    public function form_validation() {
      $this->form_validation->set_rules("productCategories", "Categories", "required|trim");
			$this->form_validation->set_rules("productBrand", "Brand", "required|trim");
			$this->form_validation->set_rules("productName", "product Name", "required|trim");
			$this->form_validation->set_rules("productPrice", "product Price", "required|integer|trim");
			$this->form_validation->set_rules("short_desc", "Short Description", "required|trim");
			$this->form_validation->set_rules("desc", "Description", "required|trim");
    }

    public function file_validation(){
      $file = array(
        "upload_path" => "img/",
				"allowed_types" => "jpeg|jpg|png",
				"max_size" => "4000",
				'encrypt_name' => TRUE,
				"file_ext_tolower" => TRUE
			);
      $this->load->library('upload', $file);
    }
    
    public function insertData(){
      $this->form_validation();
      $this->file_validation();

			if($this->form_validation->run() == FALSE || !$this->upload->do_upload("productImage")) {
				$data["brands"] = $this->product_model->brand();
				$data["cat"] = $this->product_model->categories();
				$data["file"] = $this->upload->display_errors();
				$this->load->view('addProduct', $data);
			}else {
				$fileData = $this->upload->data();
				$fileName = $fileData["raw_name"].$fileData["file_ext"];

				$userData = array(
					"categories_id" => $this->input->post("productCategories"),
					"brand_id" => $this->input->post("productBrand"),
					"pro_name" => $this->input->post("productName"),
					"price" => $this->input->post("productPrice"),
					"image" => $fileName,
					"short_desc" => $this->input->post("short_desc"),
					"description" => $this->input->post("desc")
				);
				$this->db->insert("product", $userData);
				redirect('welcome/');
			}
		}

    public function allData(){
      $products_query = $this->db->select("*")->from("product")->join("brands", "product.brand_id = brands.brand_id")->join("categories", "product.categories_id = categories.id")->order_by("product.pro_id", "desc")->get();
      return $products_query->result_array();
    }

    public function upFetch($id){
      $products = $this->db->select("*")->from("product")->where("pro_id", $id)->get();
      return $products->result_array();
    }

    public function upData($id){
      $this->form_validation();
      $this->file_validation();

			if((!$this->form_validation->run() == FALSE)) {
				if (!$this->upload->do_upload("productImage")) {
					$updateData = array(
						"categories_id" => $this->input->post("productCategories"),
						"brand_id" => $this->input->post("productBrand"),
						"pro_name" => $this->input->post("productName"),
						"price" => $this->input->post("productPrice"),
						"short_desc" => $this->input->post("short_desc"),
						"description" => $this->input->post("desc"),
					);
				}else {
					$fileData = $this->upload->data();
					$fileName = $fileData["raw_name"].$fileData["file_ext"];
					$updateData = array(
						"categories_id" => $this->input->post("productCategories"),
						"brand_id" => $this->input->post("productBrand"),
						"pro_name" => $this->input->post("productName"),
						"price" => $this->input->post("productPrice"),
						"image" => $fileName,
						"short_desc" => $this->input->post("short_desc"),
						"description" => $this->input->post("desc")
					);
				}
				$this->db->where("pro_id", $id)->update("product", $updateData);
				redirect('welcome/');
			}
  	}

    public function delData($id){
      $this->fetchImg($id);

      $this->db->where('id', $id);
			$this->db->delete('product');
    }

    public function fetchImg($id) {
      $getImg =$this->db->select("*")->from("product")->where("id", $id)->get();
      $getarr = $getImg->result_array();
      foreach ($getarr as $key ) {
        $img = $key["image"];
				$base = "img/".$img;
				unlink($base);
      }
    }
  }
?>