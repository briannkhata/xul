<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_member extends CI_Model {
	
		function __construct(){
			parent::__construct();
		}
		
	    function get_members(){
		    $this->db->where('deleted',0);
   		    $this->db->where('role','member');
		    $this->db->order_by('member_id');
			$query = $this->db->get('members');
			return $query->result_array();
		}

		 function get_members_for_receivers($limit,$offset=''){
		 	$data = [];
            $db = $this->db->select('member_id')
            ->from('circles')
            ->get()->result_array();
            if(count($db) > 0)
               {
                  foreach($db as $row)
                  { $data[] = $row['member_id']; }
               }
            $this->db->select('*');
            if(!empty($data))
            $this->db->where_not_in('member_id',$data);
		    $this->db->where('deleted',0);
   		    $this->db->where('role','member');
		    $this->db->order_by('member_id');
		    if($offset == 0 || $offset == null){
				$query = $this->db->get('members',$limit);
		    }else{
		    	$query = $this->db->get('members',$limit,$offset);
		 	}
			return $query->result_array();
		}

		function get_unreseted_members(){
		    $this->db->where('deleted',0);
   		    $this->db->where('role !=','admin');
   		    $this->db->where('watered',0);
			$query = $this->db->get('members');
			return $query->num_rows();
		}

		function get_other_waters(){
		    $this->db->where('deleted',0);
   		    $this->db->where('role !=','admin');
   		    $this->db->where('watered',0);
			$query = $this->db->get('members');
			return $query->num_rows();
		}

		function get_unreseted_members2(){
			$data = [];
            $db = $this->db->select('member_id')
            ->from('circles')
            ->get()->result_array();
            if(count($db) > 0)
               {
                  foreach($db as $row)
                  { $data[] = $row['member_id']; }
               }
            $this->db->select('*');
            if(!empty($data))
            $this->db->where_not_in('member_id',$data);
		    $this->db->where('deleted',0);
   		    $this->db->where('role !=','admin');
   		    $this->db->where('watered',0);
			$query = $this->db->get('members');
			return $query->num_rows();
		}

		function get_past_waters_by_date($date){
   		    $this->db->where('date <=',$date);
			$query = $this->db->get('waters');
			return $query->result_array();
		}

		function get_members_group00($member_id,$offset){
			/*$data = [];
            $db = $this->db->select('member_id')
            ->from('circles')
            ->get()->result_array();
            if(count($db) > 0)
               {
                  foreach($db as $row)
                  { $data[] = $row['member_id']; }
               }
            $this->db->select('*');
            if(!empty($data))
            $this->db->where_not_in('member_id',$data);*/
   		    $this->db->where('deleted',0);
   		    $this->db->where('role !=','admin');
   		    $this->db->where('member_id !=',$member_id);
   		    $this->db->where('watered',0);
		    $this->db->order_by('member_id','DESC');
   		    $this->db->limit($offset,8);
			$query = $this->db->get('members');
			return $query->result_array();
		}

		function get_members_group000($member_id){

   		    $this->db->where('members.deleted',0);
   		    $this->db->where('role','member');
   		    $this->db->where('member_id !=',$member_id);
   		    $this->db->where('watered',0);
   		    //$this->db->where('closed',1);
		    $this->db->order_by('member_id','DESC');
   		    //$this->db->group_by('members.group_id');
   		    $this->db->limit(8);
   			//$this->db->join('groups','groups.group_id = members.group_id');
			$query = $this->db->get('members');
			return $query->result_array();
		}

		function get_members_with_group(){
			$data = [];
            $db = $this->db->select('member_id')
            ->from('circles')
            ->get()->result_array();
            if(count($db) > 0)
               {
                  foreach($db as $row)
                  { $data[] = $row['member_id']; }
               }
            $this->db->select('*');
            if(!empty($data))
            $this->db->where_not_in('member_id',$data);
   		    $this->db->where('members.deleted',0);
   		    $this->db->where('role !=','admin');
			$this->db->where('closed',1);
		    $this->db->order_by('member_id','ASC');
   		    $this->db->group_by('groups.group_id');
   			$this->db->join('groups','groups.group_id = members.group_id');
			$query = $this->db->get('members');
			return $query->result_array();
		}


		function get_members_group(){
   		    $this->db->where('members.deleted',0);
   		    $this->db->where('role !=','admin');
   		    $this->db->where('closed',1);
		    $this->db->order_by('member_id','ASC');
   		    $this->db->group_by('groups.group_id');
   			$this->db->join('groups','groups.group_id = members.group_id');
			$query = $this->db->get('members');
			return $query->result_array();
		}


		function get_waters(){
			$query = $this->db->get('waters');
			return $query->result_array();
		}

		function get_waters1($offset,$limit){
			$data = [];
            $db = $this->db->select('member_id')
            ->from('circles')
            ->get()->result_array();
            if(count($db) > 0)
               {
                  foreach($db as $row)
                  { $data[] = $row['member_id']; }
               }
            $this->db->select('*');
            if(!empty($data))
            $this->db->where_not_in('member_id',$data);
   		    $this->db->where('deleted',0);
   		    $this->db->limit($limit - 1);
   		    //$this->db->limit($limit -1 );
   		    $this->db->where('role !=','admin');
  		    //$this->db->where('group_id',$group_id);
		    $this->db->order_by('member_id','DESC');
			$query = $this->db->get('members');
			return $query->result_array();
		}

		function get_old_waters(){
   		    //$this->db->limit(8);
   		    $this->db->where('date <=',date('Y-m-d', strtotime(date('Y-m-d'). ' - 7 days')));
   		    $this->db->or_where('date <=',date('Y-m-d', strtotime(date('Y-m-d'). ' - 21 days')));
			$query = $this->db->get('waters');
			return $query->result_array();
		}

		function get_deserving_waterers(){
			$query1 = $this->db->get_where('members', array('deleted' =>0,'watered' =>0))->num_rows();
			$query2 = count($this->get_old_waters());
			return $query1 + $query2;
		}

		function get_comb(){
			$data = [];
            $db = $this->db->select('member_id')
            ->from('circles')
            ->get()->result_array();
            if(count($db) > 0)
               {
                  foreach($db as $row)
                  { $data[] = $row['member_id']; }
               }
            $this->db->select('*');
            if(!empty($data))
            $this->db->where_not_in('member_id',$data);
			$this->db->select("member_id"); 
			$this->db->from('members');
			$this->db->where('role','member');
			$this->db->where('deleted',0);
	   		$this->db->where('watered',0);
 			$members = $this->db->get();

			$this->db->select("member_id"); 
			$this->db->from('waters');
			$this->db->where('date <=',date('Y-m-d', strtotime(date('Y-m-d'). ' - 7 days')));
	   		$this->db->or_where('date <=',date('Y-m-d', strtotime(date('Y-m-d'). ' - 21 days')));
 			$waters = $this->db->get();

			return $members->num_rows() + $waters->num_rows();
			//return array_merge($members->result_array(),$waters->result_array());
			//$union_query = $this->db->query($members.' UNION '.$waters.' ORDER BY member_id LIMIT 8');
			//return $union_query;

 		}

 	function get_merged($member_id){ 
               
        $this->db->select('member_id');
        $this->db->from('members');
        $this->db->where('deleted',0);
        $this->db->where('watered',0);
		$this->db->where('role','member');
		$this->db->where('member_id !=',$member_id);
        $this->db->get(); 
        $members = $this->db->last_query();
         
        $this->db->select('member_id'); 
		$this->db->from('waters');
		$this->db->where('date <=',date('Y-m-d', strtotime(date('Y-m-d'). ' - 7 days')));
	   	$this->db->or_where('date <=',date('Y-m-d', strtotime(date('Y-m-d'). ' - 21 days')));
 		$this->db->get();

        $waters =  $this->db->last_query();
        //if($last_gifter == 0 || $last_gifter == null){
        	$query = $this->db->query($members." UNION ".$waters.' ORDER BY member_id DESC LIMIT 8');
    	//}else{
        	//$query = $this->db->query($members." UNION ".$waters.' ORDER BY member_id DESC LIMIT '.$last_gifter.', 8 ');
    	//}
        return $query->result_array();
 
    }

    function get_last_gifter(){
   		    $this->db->limit(1);
   		    $this->db->order_by('_id ','DESC');
			$query = $this->db->get('waters')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['member_id'];
				}
			}else {
				return 0;
			}
			
		}


		 function get_first_member(){
   		    $this->db->limit(1);
   		    $this->db->where('deleted',0);
   		    $this->db->where('role','member');
   		    $this->db->order_by('member_id ');
			$query = $this->db->get('members')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['member_id'];
				}
			}else {
				return 0;
			}
			
		}

		function get_water_by_date($pay_date,$water_id){
			$data = [];
            $db = $this->db->select('water_id')
            ->from('waters')
            ->where('pay_date',$pay_date)
            ->where('water_id',$water_id)
            ->get()->result_array();
            if(count($db) > 0)
               {
                  foreach($db as $row)
                  { $data[] = $row['water_id']; }
               }
            $this->db->select('*');
            if(!empty($data))
            $this->db->where_not_in('member_id',$data);
   		    $query = $this->db->get('waters')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['member_id'];
				}
			}else {
				return 0;
			}
		}


		function get_the_last_receiver(){
   		    $this->db->limit(1);
   		    $this->db->order_by('member_id ','DESC');
			$query = $this->db->get('circles')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['member_id'];
				}
			}else {
				return 0;
			}
			
		}

		function get_the_very_last_waterer(){
   		    $this->db->limit(1);
   		    $this->db->order_by('_id ','DESC');
			$query = $this->db->get('waters')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['member_id'];
				}
			}else {
				return 0;
			}
			
		}

		function get_the_very_last_waterero($water_id){
   		    $this->db->limit(1);
   		    $this->db->order_by('_id ','DESC');
   		    $this->db->where('water_id',$water_id);
			$query = $this->db->get('waters')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['member_id'];
				}
			}else {
				return 0;
			}
			
		}

		function get_members_group0(){
   		    $this->db->where('members.deleted',0);
   		    $this->db->where('role !=','admin');
		    $this->db->order_by('member_id','ASC');
   			$this->db->join('groups','groups.group_id = members.group_id');
			$query = $this->db->get('members');
			return $query->result_array();
		}

		function get_total_members(){
			$this->db->where('deleted',0);
   		    $this->db->where('role !=','admin');
			$query = $this->db->get('members');
			return $query->num_rows();
		}

		function get_total_joins($today){
   		    $this->db->where('rejoin_date <=',$today);
			$query = $this->db->get('rejoins');
			return $query->num_rows();
		}

		function get_members_with_limit($total_number_of_waters){
			$this->db->limit($total_number_of_waters);
			$this->db->where('deleted',0);
   		    $this->db->where('role !=','admin');
		    $this->db->order_by('member_id','ASC');
			$query = $this->db->get('members');
			return $query->num_rows() == 0 ? $query->result_array() : NULL;
		}

		function get_contributors($pay_date,$member_id){
            //$this->db->where('deleted',0);
   		    $this->db->where('date',date('Y-m-d',strtotime($pay_date)));
   		    $this->db->where('water_id',$member_id);
   		    //$this->db->group_by('water_id');
			$this->db->limit(8);
            $query = $this->db->get('waters');
			return $query->result_array();
		}

		function get_next_waters($prev_id='',$total_number_of_waters='',$group_id){
			/*$data = [];
            $db = $this->db->select('member_id')
            ->from('circles')
            //->where('pay_date >=',date('Y-m-d'))
            ->get()->result_array();
            if(count($db) > 0)
               {
                  foreach($db as $row)
                  { $data[] = $row['member_id']; }
               }

            $this->db->select('*');
            if(!empty($data))
            $this->db->where_not_in('member_id',$data);*/
            $this->db->where('deleted',0);
   		    $this->db->where('role !=','admin');
   		    $this->db->where('group_id',$group_id);
			$this->db->limit($prev_id,$total_number_of_waters);
   		    $this->db->order_by('member_id');
            $query = $this->db->get('members');
			return $query->result_array();
		}

		function get_left_members(){
		    $this->db->where('deleted',1);
   		    $this->db->where('role !=','admin');
		    $this->db->order_by('member_id','DESC');
			$query = $this->db->get('members');
			return $query->num_rows() == 0 ? $query->result_array() : NULL;
		}

		function get_members_by_group_limit_offset($group_id,$limit,$offset){
		    $this->db->where('deleted',0);
   		    $this->db->where('role !=','admin');
   		    $this->db->where('group_id',$group_id);
   		    $this->db->limit($limit,$offset);
			$query = $this->db->get('members');
			return $query->result_array();
		}

		function get_next_water($member_id,$group_id){
   		    $this->db->where('member_id >',$member_id);
   		    $this->db->where('role !=','admin');
   		    $this->db->where('group_id',$group_id);
   		    $this->db->where('deleted',0);
			$query = $this->db->get('members')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['member_id'];
				}
			}else {
				return 0;
			}
			
		}

		function get_prev_water($member_id,$group_id){
  		    $this->db->where('role !=','admin');
   		    $this->db->where('member_id ',$member_id);
   		    $this->db->where('group_id',$group_id);
   		    $this->db->where('deleted',0);
			$query = $this->db->get('members')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['member_id'];
				}
			}else {
				return 0;
			}
			
		}

		function get_rejoiner($rejoin_date){
  		    $this->db->limit(1);
   		    $this->db->where('rejoin_date',date('Y-m-d',strtotime($rejoin_date)));
			$query = $this->db->get('rejoins')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['member_id'];
				}
			}else {
				return 0;
			}
			
		}

		function get_start_water($group_id){
   		    $this->db->where('deleted',0);
			$this->db->where('role !=','admin');
		   	$this->db->where('group_id',$group_id);
		   	$this->db->limit(1);
			$query = $this->db->get('members')->result_array();
				if(count($query) > 0){
				foreach ($query as $row) {
					return $row['member_id'];
					}
				}else {
				return 0;
			}

		}

		function get_start_waterR($group_id){
			if(count($this->db->get('past_waters')->result_array()) > 0){
				    $this->db->where('role !=','admin');
		   		    $this->db->where('group_id',$group_id);
		   		    $this->db->limit(1);
					$query = $this->db->get('past_waters')->result_array();
					if(count($query) > 0){
						foreach ($query as $row) {
							return $row['member_id'];
						}
					}else {
						return '';
					}

			}else{
				return 0;
			}
			
		}


		function get_members_by_group($group_id){
		    $this->db->where('deleted',0);
   		    $this->db->where('role !=','admin');
   		    $this->db->where('group_id',$group_id);
			$query = $this->db->get('members');
			return $query->result_array();
		}

		function check_if_water_exists($group_id){
   		    $this->db->where('group_id',$group_id);
   		    //$this->db->where('pay_date',$today);
			$query = $this->db->get('circles');
			return $query->num_rows();
			if($query->num_rows() > 0){
				return 1;
			}else{
				return 0;
			}
		}

		function get_members_count_by_group($group_id){
		    $this->db->where('deleted',0);
   		    $this->db->where('role !=','admin');
   		    $this->db->where('group_id',$group_id);
			$query = $this->db->get('members');
			return $query->num_rows();
		}

		function get_rejoiners(){
			$query = $this->db->get('rejoins');
			return $query->result_array();
		}

		function get_members_by_count($downlines){
		    $this->db->where('deleted',0);
   		    $this->db->where('role !=','admin');
   		    $this->db->where('downlines <=',$downlines);
		    $this->db->order_by('member_id','DESC');
			$query = $this->db->get('members');
			return $query->num_rows() == 0 ? $query->result_array() : NULL;
		}

		function get_complete_trees($max_downlines){
		    $this->db->where('deleted',0);
   		    $this->db->where('role !=','admin');
   		    $this->db->where('downlines',$max_downlines);
		    $this->db->order_by('member_id','DESC');
			$query = $this->db->get('members');
			return $query->num_rows() == 0 ? $query->result_array() : NULL;
		}

		function get_members_in_the_same_community($community_id,$member_id){
		    $this->db->where('deleted',0);
   		    $this->db->where('role !=','admin');
   		    $this->db->where('member_id !=',$member_id);
   		    $this->db->where('community_id',$community_id);
			$query = $this->db->get('members');
			return $query->num_rows() == 0 ? $query->result_array() : NULL;
		}

		function get_admins(){
		    $this->db->where('deleted',0);
   		    $this->db->where('role','admin');
		    $this->db->order_by('member_id','DESC');
			$query = $this->db->get('members');
			return $query->result_array();
		}

		function get_months(){
			$query = $this->db->get('months');
			return $query->result_array();
		}

		function get_my_downlines($parent){
		    $this->db->where('deleted',0);
   		    $this->db->where('parent',$parent);
		    $this->db->order_by('member_id','DESC');
			$query = $this->db->get('members');
			return $query->result_array();
		}

		function get_sum_of_my_downlines($parent){
			$this->db->select_sum('amount');
		    $this->db->from('shares');
		    $this->db->join('members','members.member_id = shares.member_id');
   		    $this->db->where('parent',$parent);
   		    $this->db->where('deleted',0);
		    $query = $this->db->get();
		    return $query->row()->amount;
		}

		function get_member_by_id($member_id){
		    $this->db->where('member_id',$member_id);
			$query = $this->db->get('members');
			return $query->result_array();
		}


		function get_parent_name($parent){
   		    $this->db->where('member_id',$parent);
			$query = $this->db->get('members')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['name'];
				}
			}else {
				return '';
			}
			
		}

		function get_parent_community($parent){
   		    $this->db->where('member_id',$parent);
			$query = $this->db->get('members')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['community_id'];
				}
			}else {
				return '';
			}
			
		}



		function get_name($member_id){
		    $this->db->where('deleted',0);
   		    $this->db->where('member_id',$member_id);
		    $this->db->order_by('member_id','DESC');
			$query = $this->db->get('members')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['name'];
				}
			}else {
				return '';
			}
			
		}

		function get_group_id($member_id){
   		    $this->db->where('member_id',$member_id);
			$query = $this->db->get('members')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['group_id'];
				}
			}else {
				return '';
			}
			
		}


		function get_downlines($member_id){
		    $this->db->where('deleted',0);
   		    $this->db->where('member_id',$member_id);
		    $this->db->order_by('member_id','DESC');
			$query = $this->db->get('members')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['downlines'];
				}
			}else {
				return 0;
			}
			
		}

		function get_address($member_id){
   		    $this->db->where('member_id',$member_id);
			$query = $this->db->get('members')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['address'];
				}
			}else {
				return '';
			}
			
		}

		function get_phone($member_id){
   		    $this->db->where('member_id',$member_id);
			$query = $this->db->get('members')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['phone'];
				}
			}else {
				return '';
			}
			
		}

		function get_email($member_id){
   		    $this->db->where('member_id',$member_id);
			$query = $this->db->get('members')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['email'];
				}
			}else {
				return '';
			}
			
		}

		function get_date_joined($member_id){
   		    $this->db->where('member_id',$member_id);
			$query = $this->db->get('members')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return date('d F - Y',strtotime($row['date_joined']));
				}
			}else {
				return '';
			}
			
		}

		function get_parent($member_id){
   		    $this->db->where('member_id',$member_id);
			$query = $this->db->get('members')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['parent'];
				}
			}else {
				return '';
			}
			
		}

		function get_downloan_count($member_id){
   		    $this->db->where('member_id',$member_id);
			$query = $this->db->get('members')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['downlines'];
				}
			}else {
				return '';
			}
			
		}


}

