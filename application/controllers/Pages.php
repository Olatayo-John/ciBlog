<?php
	class Pages extends CI_Controller{
		public function index(){
			$this->load->view('templates/header');
			$this->load->view('pages/content');
			$this->load->view('templates/footer');
		}
		public function about(){
			$this->load->view('templates/header');
			$this->load->view('pages/about');
			$this->load->view('templates/footer');
		}
		public function services(){
			$this->load->view('templates/header');
			$this->load->view('pages/services');
			$this->load->view('templates/footer');
		}
		public function login(){
			$this->load->view('templates/header');
			$this->load->view('templates/login');
			$this->load->view('templates/footer');
		}
		public function register(){
			$this->load->view('templates/header');
			$this->load->view('templates/register');
			$this->load->view('templates/footer');
		}

	}