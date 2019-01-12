<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class H extends CI_Controller {
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}


	public function index(){
		$data['title'] = 'TokoFlix - Welcome to TokoFlix.id';
		$url = 'https://api.themoviedb.org/3/discover/movie?api_key=059c5bd1d2f7171b553e1aadd6887e61&region=ID&sort_by=primary_release_date.desc&include_adult=true&include_video=true&page=1&vote_average.gte=1&vote_average.lte=10'; // path to your JSON file
		$dataapi1 = json_decode(file_get_contents($url),true); // put the contents of the file into a variable
		$url = 'https://api.themoviedb.org/3/genre/movie/list?api_key=059c5bd1d2f7171b553e1aadd6887e61&language=en-US'; // path to your JSON file
		$dataapi2 = json_decode(file_get_contents($url),true); // put the contents of the file into a variable
		$url='https://api.themoviedb.org/3/movie/popular?api_key=059c5bd1d2f7171b553e1aadd6887e61&language=en-US&page=1&region=ID';
		$dataapi3 = json_decode(file_get_contents($url),true); // put the contents of the file into a variable

		$data['content'] = $this->load->view('TokoFlix/page_main', [
			'notification' => $this->session->flashdata('notification'),
			'title'=>$data['title'],
			'movies'=>$dataapi1['results'],
			'genres'=>$dataapi2['genres'],
			'trendings'=>$dataapi3['results'],
			// 'datagroup'=>$this->M_UAcc->getGroup(),
			// 'datauser'=>$this->M_UAcc->getAllUser()
		], TRUE);
		$this->load->view('TokoFlix/page_index', $data);
	}

	public function detail($idmovie='')
	{
		$data['title'] = 'TokoFlix - Detail Movie';
		$url ='https://api.themoviedb.org/3/movie/'.$idmovie.'?api_key=059c5bd1d2f7171b553e1aadd6887e61&language=en-US';
		$dataapi1 = json_decode(file_get_contents($url),true); // put the contents of the file into a variable
		$url = 'https://api.themoviedb.org/3/movie/'.$idmovie.'/credits?api_key=059c5bd1d2f7171b553e1aadd6887e61'; // path to your JSON file
		$dataapi2 = json_decode(file_get_contents($url),true); // put the contents of the file into a variable
		$url = 'https://api.themoviedb.org/3/movie/'.$idmovie.'/recommendations?api_key=059c5bd1d2f7171b553e1aadd6887e61&language=en-US&page=1'; // path to your JSON file
		$dataapi3 = json_decode(file_get_contents($url),true); // put the contents of the file into a variable
		$url = 'https://api.themoviedb.org/3/movie/'.$idmovie.'/similar?api_key=059c5bd1d2f7171b553e1aadd6887e61&language=en-US&page=1'; // path to your JSON file
		$dataapi4 = json_decode(file_get_contents($url),true); // put the contents of the file into a 
		$url = 'https://api.themoviedb.org/3/movie/'.$idmovie.'/videos?api_key=059c5bd1d2f7171b553e1aadd6887e61&language=en-US';
		$dataapi5 = json_decode(file_get_contents($url),true); // put the contents of the file into a 
		$url = 'https://api.themoviedb.org/3/movie/'.$idmovie.'/images?api_key=059c5bd1d2f7171b553e1aadd6887e61';
		$dataapi6 = json_decode(file_get_contents($url),true); // put the contents of the file into a 
		$data['content'] = $this->load->view('TokoFlix/page_detail', [
			'notification' => $this->session->flashdata('notification'),
			'title'=>$data['title'],
			'movies'=>$dataapi1,
			'credits'=>$dataapi2,
			'recommendations'=>$dataapi3['results'],
			'similiars'=>$dataapi4['results'],
			'videos'=>$dataapi5['results'],
			'images'=>$dataapi6['backdrops'],
			// 'datagroup'=>$this->M_UAcc->getGroup(),
			// 'datauser'=>$this->M_UAcc->getAllUser()
		], TRUE);
		$this->load->view('TokoFlix/page_index', $data);
	}

	public function test($value='')
	{
		$this->load->view('TokoFlix/test');
		# code...
	}
}
