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
  <div class="form-group">
    <?php echo form_error('app_email'); ?>
    <label for="app_email">Email</label>
    <?php echo form_input($app_email); ?>
  </div>

  <div class="form-group">
    <?php echo form_error('app_phone'); ?>
    <label for="app_phone">Phone</label>
    <?php echo form_input($app_phone); ?>
  </div>

  <div class="form-group">
    <?php echo form_error('app_cover_note'); ?>
    <label for="app_cover_note">Cover Note</label>
    <?php echo form_textarea($app_cover_note); ?>
  </div>

  <input type="hidden" name="job_id" value="<?=$this->uri->segment(3)?>">

  <div class="form-group">
    <button type="submit" class="btn btn-success">Submit</button> or <a href="jobs">Cancel</a>
  </div>
  <?php echo form_close(); ?>
</div>
