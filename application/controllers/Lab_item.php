<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class lab_item extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Lab Items';
		$this->load->view($this->session->userdata('role').'/lab_items',$data);			
    }

    function get_data_from_post(){
        $data['lab_item']    = $this->input->post('lab_item');
        $data['lab_shelf_id']    = $this->input->post('lab_shelf_id');
        $data['lab_type_id']    = $this->input->post('lab_type_id');
        $data['description']    = $this->input->post('description');
        $data['item_code']    = $this->input->post('item_code');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_lab_item->get_lab_item_by_id($update_id);
		foreach ($query as $row) {
		    $data['lab_item']    = $row['lab_item'];
        	$data['lab_shelf_id']    = $row['lab_shelf_id'];
        	$data['lab_type_id']    = $row['lab_type_id'];
        	$data['description']    = $row['description'];
        	$data['item_code']    = $row['item_code'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('lab_item_id',$update_id);
			$this->db->update('lab_items',$data);
		 }else{
			$this->db->insert('lab_items',$data);
		}

		$this->session->set_flashdata('message','Item saved successfully');
			if($update_id !=''):
    			redirect('lab_item');
			else:
				redirect('lab_item/read');
			endif;
	}


	function read(){
		$update_id = $this->uri->segment(3);
		if(!isset($update_id)){
			$update_id = $this->input->post('update_id',$update_id);
		}
		if(is_numeric($update_id)){
			$data = $this->get_data_from_db($update_id);
			$data['update_id'] = $update_id;
		}
		else{
			$data = $this->get_data_from_post();
		}

		$data['page_title']  = 'Create';
		$this->load->view($this->session->userdata('role').'/add_lab_item',$data);			
	}

	
	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('lab_item_id',$param);
        $this->db->update('lab_items',$data);
    	$this->session->set_flashdata('message','Item deleted successfully');
		redirect('lab_item');
	}

	function delete_receiving($param=''){

		$lab_item_id = $this->M_lab_item->get_lab_item_id($param);//get lab_item_id 
		$oldstock = $this->M_lab_item->get_instock($lab_item_id);// get old stock
		$quantity = $this->M_lab_item->get_quantity($param);//  get amount received

		$new['qty'] = $oldstock - $quantity;

        $this->db->where('lab_item_id',$lab_item_id);//change stock in lab_items
		$this->db->update('lab_items',$new);

		$this->db->where('lab_receiving_id',$param);
        $this->db->delete('lab_receivings');
    	$this->session->set_flashdata('message','Receiving deleted successfully');
		redirect('lab_item/receivings');
	}

	function receivings(){
		$this->check_session();
		$data['page_title']  = 'Receivings';
		$this->load->view($this->session->userdata('role').'/lab_item_receivings',$data);			
    }


	function receive($param=''){
		$this->check_session();
		$data['page_title']  = 'Receive Lab Item '. $this->M_lab_item->get_lab_item($param);
		$data['lab_item_id']  = $param;
		$this->load->view($this->session->userdata('role').'/receive_lab_item',$data);			
    }

    function filter_receivings1(){
		$this->check_session();
		$data['page_title']  = 'Filter Receivings';
		$this->load->view($this->session->userdata('role').'/filter_lab_item_receivings1',$data);			
    }

    function filter_receivings2(){
		$this->check_session();
		$data['arrival_date1']  = $this->input->post('arrival_date1');
		$data['arrival_date2']  = $this->input->post('arrival_date2');
		$data['page_title']  = 'Lab Item Receivings | '.date('d M Y',strtotime($data['arrival_date1'])).' - '.date('d M Y',strtotime($data['arrival_date2']));
		$this->load->view($this->session->userdata('role').'/filter_lab_item_receivings2',$data);			
    }

    function save_receive(){
		$this->check_session();
		$data['lab_item_id'] = $this->input->post('lab_item_id');
		$data['comment'] = $this->input->post('comment');
		$data['quantity'] = $this->input->post('quantity');
    	$data['arrival_date'] = date('Y-m-d-H-i-s',strtotime($this->input->post('arrival_date')));
    	$data['price'] = $this->input->post('price');
    	$data['total_cost'] = $data['price'] * $data['quantity'];
    	$data['added_by'] = $this->session->userdata('user_id');
		$data['date'] = date('Y-m-d h:i');

		$oldstock = $this->M_lab_item->get_instock($data['lab_item_id']);
		$new['qty'] = $oldstock + $data['quantity'];
        $this->db->insert('lab_item_receivings',$data);		

        $this->db->where('lab_item_id',$data['lab_item_id']);//change stock in lab_items
		$this->db->update('lab_items',$new);

		$this->session->set_flashdata('message','Item Received updated successfully');
		redirect('lab_item');
    }

    function filter_student_lab_items(){
		$this->check_session();
		$data['page_title']  = 'USER lab_items';
		$this->load->view($this->session->userdata('role').'/filter_student_lab_items',$data);			
    }

    function student_lab_items(){
		$this->check_session();
		$data['page_title']  = 'lab_item Report';
		$data['user_id'] = $this->input->post('user_id');
  		$data['page_title'] ='LIBRARY REPORT FOR  '. strtoupper($this->M_user->get_user($data['user_id']));
		$this->load->view($this->session->userdata('role').'/student_lab_items',$data);			
    }

    function filter_lab_items(){
		$this->check_session();
		$data['page_title']  = 'Lab Item Report';
		$this->load->view($this->session->userdata('role').'/filter_lab_items',$data);			
    }

    function lab_item_report(){
		$this->check_session();
		$data['page_title']  = 'Lab Item Report';
		$data['lab_type_id'] = $this->input->post('lab_type_id');
		$data['lab_shelf_id'] = $this->input->post('lab_shelf_id');

		if($data['lab_type_id'] == 'all' && $data['lab_shelf_id'] == 'all'){
		   $data['page_title'] = 'ALL CATEGORIES | ALL LOCATIONS';
		   $data['lab_items'] = $this->M_lab_item->get_lab_items();
		}else{

		if (!empty($data['lab_type_id']) && empty($data['lab_shelf_id'])) {
			
  		  $data['page_title'] = strtoupper($this->M_lab_type->get_lab_type($data['lab_type_id']));
		  $this->db->where('lab_type_id',$data['lab_type_id']);
  		  $this->db->where('deleted',0);
		  $data['lab_items'] = $this->db->get('lab_items')->result_array();
		}

		if (empty($data['lab_type_id']) && !empty($data['lab_shelf_id'])) {
			
  		  $data['page_title'] = strtoupper($this->M_lab_shelf->get_lab_shelf($data['lab_shelf_id']));
		  $this->db->where('lab_shelf_id',$data['lab_shelf_id']);
  		  $this->db->where('deleted',0);
		  $data['lab_items'] = $this->db->get('lab_items')->result_array();
		}

		if (!empty($data['lab_type_id']) && !empty($data['lab_shelf_id'])) {
			
  		  $data['page_title'] = strtoupper($this->M_lab_type->get_lab_type($data['lab_type_id'])).' | '.  
  		  strtoupper($this->M_lab_shelf->get_lab_shelf($data['lab_shelf_id']));
		  $this->db->where('lab_type_id',$data['lab_type_id']);
  		  $this->db->where('lab_shelf_id',$data['lab_shelf_id']);
  		  $this->db->where('deleted',0);
		  $data['lab_items'] = $this->db->get('lab_items')->result_array();
		}
	}

		$this->load->view($this->session->userdata('role').'/lab_item_report',$data);			
    }



    function filter1(){//missing lab_items
		$this->check_session();
		$data['page_title']  = 'Filter Missing lab_items';
		$this->load->view($this->session->userdata('role').'/filter_missing_lab_items1',$data);			
    }

    function filter2(){
		$this->check_session();
		$data['lab_type_id'] = $this->input->post('lab_type_id');
		if($data['lab_type_id'] == 'all'){
			$data['missing'] = $this->M_lab_item->get_missing_lab_items();
		}else{
			$data['missing'] = $this->M_lab_item->get_missing_lab_items_by_class($data['lab_type_id']);
		}

		$data['page_title']  = 'Missing lab_items | '.$this->M_lab_type->get_lab_type($data['lab_type_id']);
		$this->load->view($this->session->userdata('role').'/filter_missing_lab_items2',$data);			
    }

   
}