<?php

class Jobs extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('string');
        $this->load->helper('text');
        $this->load->model('Jobs_model');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
    }

    // Displays the initial list of job adverts to the user
    public function index()
    {
      $this->form_validation->set_rules('search_string', 'Search String', 'required');
      $page_data['query'] = $this->Jobs_model->get_jobs($this->input->post('search_string'));

      if ($this->form_validation->run() == false) {
        $page_data['search_string'] = array(
          'name' => 'search_string',
          'class' => 'form-control',
          'id' => 'search_string',
          'value' => set_value('search_string', $this->input->post('search_string')),
          'maxlength' => '100',
          'size' => '35'
        );

        $page_data['query'] = $this->Jobs_model->get_jobs($this->input->post('search_string'));

        $this->load->view('templates/header');
        $this->load->view('jobs/view', $page_data);
        $this->load->view('templates/footer');
      } else {
        $this->load->view('templates/header');
        $this->load->view('jobs/view', $page_data);
        $this->load->view('templates/footer');
      }
    }

    // Displays a form to the user to create job ads
    public function create()
    {
      $this->form_validation->set_rules('job_title', 'Job Title', 'required');
      $this->form_validation->set_rules('job_desc', 'Job Description', 'required');
      $this->form_validation->set_rules('cat_id', 'Category ID', 'required');
      $this->form_validation->set_rules('type_id', 'Type ID', 'required');
      $this->form_validation->set_rules('loc_id', 'Location ID', 'required');
      $this->form_validation->set_rules('start_d', 'Start day', 'required');
      $this->form_validation->set_rules('start_m', 'Start month', 'required');
      $this->form_validation->set_rules('start_y', 'Start year', 'required');
      $this->form_validation->set_rules('job_rate', 'Job Rate', 'required');
      $this->form_validation->set_rules('job_advertiser_name', 'Job Advertiser Name', 'required');
      $this->form_validation->set_rules('job_advertiser_email', 'Job Advertiser Email', 'required');
      $this->form_validation->set_rules('job_advertiser_phone', 'Job Advertiser Phone', 'required');
      $this->form_validation->set_rules('sunset_d', 'Sunset day', 'required');
      $this->form_validation->set_rules('sunset_m', 'Sunset month', 'required');
      $this->form_validation->set_rules('sunset_y', 'Sunset year', 'required');

      $page_data['categories'] = $this->Jobs_model->get_categories();
      $page_data['types'] = $this->Jobs_model->get_types();
      $page_data['locations'] = $this->Jobs_model->get_locations();

      if ($this->form_validation->run() == false) {
        $page_data['job_title'] = array(
          'name' => 'job_title',
          'class' => 'form-control',
          'id' => 'job_title',
          'value' => set_value('job_title', ''),
          'maxlength' => '100',
          'size' => '35'
        );

        $page_data['job_desc'] = array(
          'name' => 'job_desc',
          'class' => 'form-control',
          'id' => 'job_desc',
          'value' => set_value('job_desc', ''),
          'maxlength' => '3000',
          'rows' => '6',
          'cols' => '35'
        );

        $page_data['start_d'] = array(
          'name' => 'start_d',
          'class' => 'form-control',
          'id' => 'start_d',
          'value' => set_value('start_d', ''),
          'maxlength' => '100',
          'size' => '35'
      );

        $page_data['start_m'] = array(
          'name' => 'start_m',
          'class' => 'form-control',
          'id' => 'start_m',
          'value' => set_value('start_m', ''),
          'maxlength' => '100',
          'size' => '35'
        );

        $page_data['start_y'] = array(
          'name' => 'start_y',
          'class' => 'form-control',
          'id' => 'start_y',
          'value' => set_value('start_y', ''),
          'maxlength' => '100',
          'size' => '35'
        );

        $page_data['job_rate'] = array(
          'name' => 'job_rate',
          'class' => 'form-control',
          'id' => 'job_rate',
          'value' => set_value('job_rate', ''),
          'maxlength' =>'100',
          'size' => '35'
        );

        $page_data['job_advertiser_name'] = array(
          'name' => 'job_advertiser_name',
          'class' => 'form-control',
          'id' => 'job_advertiser_name',
          'value' => set_value('job_advertiser_name', ''),
          'maxlength' => '100',
          'size' => '35'
        );

        $page_data['job_advertiser_email'] = array(
          'name' => 'job_advertiser_email',
          'class' => 'form-control',
          'id' => 'job_advertiser_email',
          'value' => set_value('job_advertiser_email', ''),
          'maxlength' => '100',
          'size' => '35'
        );

        $page_data['job_advertiser_phone'] = array(
          'name' => 'job_advertiser_phone',
          'class' => 'form-control',
          'id' => 'job_advertiser_phone',
          'value' => set_value('job_advertiser_phone', ''),
          'maxlength' => '100',
          'size' => '35'
        );

        $page_data['sunset_d'] = array(
          'name' => 'sunset_d',
          'class' => 'form-control',
          'id' => 'sunset_d',
          'value' => set_value('sunset_d', ''),
          'maxlength' =>'100',
          'size' => '35'
      );

        $page_data['sunset_m'] = array(
          'name' => 'sunset_m',
          'class' => 'form-control',
          'id' => 'sunset_m',
          'value' => set_value('sunset_m', ''),
        'maxlength' => '100',
        'size' => '35'
      );

        $page_data['sunset_y'] = array(
          'name' => 'sunset_y',
          'class' => 'form-control',
          'id' => 'sunset_y',
          'value' => set_value('sunset_y', ''),
          'maxlength' => '100',
          'size' => '35'
        );

        $this->load->view('templates/header');
        $this->load->view('jobs/create', $page_data);
        $this->load->view('templates/footer');
      } else {
        // code...
      }

    }

    // Accessed if the user clicks on the apply button or the job title
    public function apply()
    {
    }
}
