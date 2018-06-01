<?php

class Jobs_model extends CI_Model{
  function __construct(){
    parent::__construct();
  }


  // Displays all jobs
  function get_jobs($search_string){
    if ($search_string == null) {
      $query = "SELECT * FROM jobs";
    } else {
      $query = "SELECT * FROM jobs where job_title LIKE '%$search_string%' OR
                job_desc LIKE '%$search_string%' AND DATE(NOW()) < DATE(job_sunset_date)";
    }

    $result = $this->db->query($query);
    if ($result) {
      return $result;
    } else {
      return false;
    }


  }

  // Fetches the details of a specific job
  function get_job($job_id){
    echo "<h1>Job id from model is $job_id</h1>";
    $query = "SELECT * FROM jobs WHERE job_id = ?";

    $result = $this->db->query($query, array($job_id));
    if ($result) {
      print_r($result);
      return $result;
    } else {
      return false;
    }

  }


  // Saves a job advert
  function save_job($save_data){
    if ($this->db->insert('jobs', $save_data)) {
      return $this->db->insert_id();
    } else {
      return false;
    }

  }

  // Fetches categories from the category table
  function get_categories(){
    return $this->db->get('categories');
  }

  // Fetches types from the types table
  function get_types(){
    return $this->db->get('types');
  }


  // Fetches locations from location table
  function get_locations(){
    return $this->db->get('locations');
  }
}

 ?>
