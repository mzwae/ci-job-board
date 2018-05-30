<?php if($this->session->flashdata('flash_message')): ?>
  <div class="alert alert-info" role="alert">
    <?php echo $this->session->flashdata('flash_message'); ?>
  </div>
<?php endif; ?>

<div class="row">
  <div class="col-sm-12 blog-main">
    <div class="blog-post">
      <?php foreach($query->result() as $row): ?>
        <h2 class="blog-post-title"><?=$row->job_title?></h2>
        <p class="blog-post-meta">Posted by <?=$row->job_advertiser_name?> on <?=$row->job_created_at?></p>
        <table class="table">
          <tr>
            <td>Start Date</td>
            <td><?=$row->job_start_date?></td>
            <td>Contact Name</td>
            <td><?=$row->job_advertiser_name?></td>
          </tr>
          <tr>
            <td>Location</td>
            <td><?=$row->loc_name?></td>
            <td>Contact Phone</td>
            <td><?=$row->job_advertiser_phone?></td>
          </tr>
          <tr>
            <td>Type</td>
            <td><?=$row->type_name?></td>
            <td>Contact Email</td>
            <td><?=$row->job_advertiser_email?></td>
          </tr>
        </table>
        <p><?=$row->job_desc?></p>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<p class="lead">Apply to <?=$job_title?></p>
<div class="span12">
  <?php echo form_open('jobs/apply', 'role="form" class="form"'); ?>
</div>
