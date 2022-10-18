<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller { // Controller name

      //change made here and here
	public function index($category_id = 0)
	{
       
      $viewData = [];
      $search = $this->input->get('search');
      $start = (int)$this->input->get('per_page');
      $limit = $this->config->item('per_page');
      $where =[];

      if($search){
       $where['title LIKE'] = '%' . $search . '%';
      }

      if($category_id){
        $where['category_id'] = (int)$category_id;
      }

     $viewData['items'] = $this->db->where($where)->limit($limit,$start)->get('items')->result();
        
        $this->pagination->initialize([
            'base_url'=>base_url(). ($category_id ? 'category/'.$category_id : ''  ),
            'total_rows'=>$this->db->count_all_results('items')
        ]);
        $viewData['pagination'] = $this->pagination->create_links();

        $categories = $this->db->get('categories')->result();

        $this->load->view('inc/header',['categories'=>$categories]);
        $this->load->view('home',$viewData);
        $this->load->view('inc/footer');
	}


    public function login(){

        $viewData = [];

        $this->load->library('form_validation');
        $this->load->helper('form');
        
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        $this->load->view('inc/header');
        $this->load->view('login',$viewData);
        $this->load->view('inc/footer');
            
    }

    public function register(){
        $viewData =[];

        $this->load->helper('form');
        $this->load->library('form_validation');
       

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('first_name', 'First Name', 'required|trim|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|trim|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]|max_length[50]');
        $this->form_validation->set_rules('passconf', 'Password Confirm', 'required|trim|matches[password]');
      
        if ($this->form_validation->run()){
             
            $data = [
                'email'=> $this->input->post('email'),
                'first_name'=>$this->input->post('first_name'),
                'last_name'=>$this->input->post('last_name'),
                'password'=> md5(sha1($this->input->post('password')))
            ];

            $insert = $this->db->insert('users',$data);
            
        if($insert){
            $newdata=[
              'logged' =>       true,
              'user_id' =>      $this->db->insert_id(),
              'email'=>         $data['email'],
              'first_name'=>    $data['first_name'],
              'last_name'=>     $data['last_name']
            ];
            $this->session->set_userdata($newdata);
            $viewData['success'] = true;
        } 
    }
    $this->load->view('inc/header');
    $this->load->view('register',$viewData);
    $this->load->view('inc/footer');
    }


    public function add_category(){
            
            $title = 'Add category';
            $viewData = [];
            $this->load->helper('form'); // loading form helper library
            $this->load->library('form_validation');

            $this->form_validation->set_rules('title', 'Title', 'required|min_length[5]|max_length[40]');
            

            if ($this->form_validation->run()){
               
                    $insertData = [
                        'title'=> $this->input->post('title'),
                         ];
                    $this->db->insert('categories', $insertData); // inserting into db name , $variable with all data

            }
            
             $this->load->view('inc/header');
             $this->load->view('add_category',$viewData);
             $this->load->view('inc/footer');
        }
        
        
    public function add_item(){

        $viewData = [];
        $this->load->helper('form'); // loading form helper library
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Title', 'required|min_length[5]|max_length[40]');
        $this->form_validation->set_rules('description', 'Description','required');
        $this->form_validation->set_rules('price', 'Price', 'required|numeric|greater_than[0]');

        if ($this->form_validation->run()){
            $upload = $this->do_upload();
            
            if(isset($upload['error'])){
            $viewData['error'] = $upload['error'];
            }else{
                $insertData = [
                    'title'=> $this->input->post('title'),
                    'price'=> $this->input->post('price'),
                    'description' => $this->input->post('description'),
                    'image'=> $upload['data']
                ];
                $this->db->insert('items', $insertData); // inserting into db name , $variable with all data
            }
        }
           
         $this->load->view('inc/header');
         $this->load->view('add_item',$viewData);
         $this->load->view('inc/footer');
    }

    private function do_upload() // copied from do upload on Codeigniter documentation search (File Upload on Codeigniter.com)
        {
            $config = [
                'upload_path'=> './uploads/',
                'allowed_types'=>'gif|jpg|png',
                'max_size' => 1024,
                'encrypt_name' => true
            ];
                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('image')) {                                                               // refrences the form_validation.php to give the error message the correct formattign
                        return array('error' => $this->upload ->display_errors($this->config->item('error_prefix'),$this->config->item('error_suffix')));
                    }else
                {
                        return array('data'=>$this->upload->data('file_name'));   
                }
        }
}







