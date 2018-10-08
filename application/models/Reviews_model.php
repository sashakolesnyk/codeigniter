<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reviews_model extends CI_Model
{
	
	public function __construct() {
		$this->load->database();
	}
	
	public function get_reviews($id) {
		if ($id != FALSE) {
			$query = $this->db->get_where('reviews', array('id' => $id));
			return $query->row_array();
		}
		else {
			return FALSE;
		}
	}
	
	public function get_current_curses() {
		$ch = curl_init('https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		
		$result = curl_exec($ch);
		curl_close($ch);
		
		$this->db_write($result);
		
		return $result;
	}
	
	public function db_write($result) {
			if ($result) {
				$this->db->query("INSERT INTO courses VALUES (NULL, NULL, '{$result}');");
			}
	}
	
	public function db_get() {
			$answer = $this->db->query("SELECT * FROM courses;");
			$result = [];
			$count = $answer->num_rows();
			
			$i = 0;	
				foreach($answer->result() as $row)
				{
					
					$result[$i]['id'] = $row->id;
					$result[$i]['dat'] = $row->dat;
					$result[$i]['json'] = $row->json;
					$i++;
				}
			
			
			return $result;
	}

}


















