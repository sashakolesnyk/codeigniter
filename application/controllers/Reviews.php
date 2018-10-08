<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reviews extends CI_Controller
{
	
	public function __construct() {
		parent::__construct();
		$this->output->cache(10);
	}
	
	public function index() {
		$this->load->model('Reviews_model');
		$courses = $this->Reviews_model->get_current_curses();
		$data['result'] = $courses;
		
		$this->load->view('my', $data);
	}
	
	public function history() {
		$this->load->model('Reviews_model');
		$courses = $this->Reviews_model->db_get();
		$data['result'] = $courses;
		
		$this->load->view('history', $data);
	}
	
	
	
	public function show($id) {
		$this->load->model('Reviews_model');
		$reviews = $this->Reviews_model->get_reviews($id);
		$data['title'] = $reviews['title'];
		$data['grade'] = $reviews['grade'];
		$this->load->view('movie_review', $data);
	}
}