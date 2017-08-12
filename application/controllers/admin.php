<?php
class Admin extends My_controller
{
	
	public function dasboard()
	{	
		$this->load->view('admin/dasboard');
	}
	public function add_category()
	{
		$this->form_validation->set_rules('cname', 'Category Name', 'required');
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
		 if($this->form_validation->run())
		 {
		 	$userid=$this->session->userdata('userid');
		 	$cname=$this->input->post('cname');
		 	$tdate=$this->input->post('cdate');
		 	$data=[
		 		'cat_name'=>$cname,
		 		'user_id'=>$userid,
		 		'creation'=>$tdate
		 	];
		 	$this->load->model('articlesmodel');
		 	if($this->articlesmodel->add_category($data))
		 	{
		 		$this->session->set_flashdata('feedback','Category added sucessfully');
				$this->session->set_flashdata('feedback_class','alert-success');
		 	}
		 	else
		 	{
		 		$this->session->set_flashdata('feedback','Faild to add Category, plz try again');
				$this->session->set_flashdata('feedback_class','alert-danger');
		 	}
		 	return redirect('admin/add_category');
		 }
		 else
		 {
		 	$this->load->view('admin/add_category');
		 }
		
	}
	public function view_category()
	{	$userid=$this->session->userdata('userid');
		$this->load->model('articlesmodel');
		$categories=$this->articlesmodel->view_category($userid);
		$this->load->view('admin/view_category',['category'=>$categories]);
	}
	public function add_articles()
	{
		 $config['upload_path']= './uploads/';
         $config['allowed_types']= 'gif|jpg|png';
		$this->load->library('upload',$config);
		$this->form_validation->set_rules('title', 'Title', 'required');
		 $this->form_validation->set_rules('des', 'Description', 'required');
		 $this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
		 if($this->form_validation->run() && $this->upload->do_upload('userfile'))
		 {
		 	$userid=$this->session->userdata('userid');
		 	$title=$this->input->post('title');
		 	$des=$this->input->post('des');
		 	$tdate=$this->input->post('cdate');
		 	$data1=$this->upload->data();
		 	$image_path= base_url ("uploads/".$data1['raw_name'].$data1['file_ext']);
		 	$data=[
		 		'title'=>$title,
		 		'description'=>$des,
		 		'creation'=>$tdate,
		 		'user_id'=>$userid,
		 		'image_path'=>$image_path
		 	];
		 	$this->load->model('articlesmodel');
		 	if($this->articlesmodel->add_articles($data))
		 	{
		 		$this->session->set_flashdata('feedback','Articles added sucessfully');
				$this->session->set_flashdata('feedback_class','alert-success');
		 	}
		 	else
		 	{
		 		$this->session->set_flashdata('feedback','Faild to add articles, plz try again');
				$this->session->set_flashdata('feedback_class','alert-danger');
		 	}
		 	return redirect('admin/dasboard');
		 }
		 else
		 {
		 	$upload_error=$this->upload->display_errors();
		 	$this->load->view('admin/dasboard',compact('upload_error'));
		 }
	}
	public function view_articles()
	{	$userid=$this->session->userdata('userid');
		$this->load->model('articlesmodel');
		$articles=$this->articlesmodel->view_articles($userid);
		$this->load->view('admin/view_articles',['articles'=>$articles]);
	}
}