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
    }

    // Accessed if the user clicks on the apply button or the job title
    public function apply()
    {
    }
}
