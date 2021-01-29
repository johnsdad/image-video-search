<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('home');
	}

	public function photo_search() {
		if($this->input->post('keyword')) {
			$keyword = $this->input->post('keyword');
			$keyword = htmlspecialchars($keyword);
			$keyword = urlencode($keyword);
			$page = isset($_POST['page'])?$this->input->post('page'):1;

	        $url = 'https://pixabay.com/api/?key=20045975-26cb1e27f0d0050ccb0a0bb04&image_type=photo&q='.$keyword.'&page='.$page;
	        $curl = curl_init($url);	   
	       	curl_setopt_array($curl, array(
			     CURLOPT_URL => $url,
			     CURLOPT_RETURNTRANSFER => true,
			     CURLOPT_ENCODING => "",
			     CURLOPT_TIMEOUT => 30000,
			     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			     CURLOPT_CUSTOMREQUEST => "GET",
			     CURLOPT_HTTPHEADER => array(
			         'Content-Type: application/json',
			     ),
		 	));
	        $result = curl_exec($curl);
	        curl_close($curl);

	        $data['images'] = json_decode($result);
	        $this->load->view('image_show', $data);
	    }
	}

	public function video_search() {
		if($this->input->post('keyword')) {
			$keyword = $this->input->post('keyword');
			$keyword = htmlspecialchars($keyword);
			$keyword = urlencode($keyword);
			$page = isset($_POST['page'])?$this->input->post('page'):1;

	        $url = 'https://pixabay.com/api/videos/?key=20045975-26cb1e27f0d0050ccb0a0bb04&q='.$keyword.'&page='.$page;
	        $curl = curl_init($url);	   
	       	curl_setopt_array($curl, array(
			     CURLOPT_URL => $url,
			     CURLOPT_RETURNTRANSFER => true,
			     CURLOPT_ENCODING => "",
			     CURLOPT_TIMEOUT => 30000,
			     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			     CURLOPT_CUSTOMREQUEST => "GET",
			     CURLOPT_HTTPHEADER => array(
			         'Content-Type: application/json',
			     ),
		 	));
	        $result = curl_exec($curl);
	        curl_close($curl);

	        $data['videos'] = json_decode($result);
	        $this->load->view('video_show', $data);
	    }
	}

}
