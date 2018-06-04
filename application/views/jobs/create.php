<?php if ($this->session->flashdata('flash_message')): ?>
<div class="alert alert-info" role="alert">
  <?php echo $this->session->flashdata('flash_message'); ?>
</div>
<?php endif; ?>

<p class="lead">Add Job Details...</p>

<div class="span8">
  <?php echo form_open('jobs/create', 'role="form" classs="form"'); ?>

  <div class="form-group">
    <?php echo form_error('job_title'); ?>
    <label for="job_title">Job Title</label>
    <?php echo form_input($job_title); ?>
  </div>

  <div class="form-group">
    <?php echo form_error('job_desc'); ?>
    <label for="job_desc">Job Description</label>
    <?php echo form_textarea($job_desc); ?>
  </div>

  <div class="form-group">
    <?php echo form_error('type_id'); ?>
    <label for="type_id">Type</label>
    <select class="form-control" name="type_id">
      <?php foreach($types->result() as $row): ?>
        <option value="<?=$row->type_id?>"><?=$row->type_name?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="form-group">
    <?php echo form_error('cat_id'); ?>
    <label for="cat_id">Category</label>
    <select class="form-control" name="cat_id">
      <?php foreach($categories->result() as $row): ?>
        <option value="<?=$row->cat_id?>"><?=$row->cat_name?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="form-group">
    <?php echo form_error('loc_id'); ?>
    <label for="loc_id">Location</label>
    <select class="form-control" name="loc_id">
      <?php foreach($locations->result() as $row): ?>
        <option value="<?=$row->loc_id?>"><?=$row->loc_name?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <label for="sunset_d">Job Start Date</label>
  <div class="row">
    <div class="form-group">
      <div class="col-md-4">
        <?php echo form_error('start_d'); ?>
        <select class="form-control" name="start_d">
          <?php for($i = 1; $i <= 30; $i++): ?>
            <?php if(date('j', time()) == $i): ?>
              <option selected value="<?=$i?>"><?=date('jS', mktime($i, 0, 0, 0, $i, date('Y')))?></option>
          <?php else: ?>
            <option value="<?=$i?>"><?=date('jS', mktime($i, 0, 0, 0, $i, date('Y')))?></option>
          <?php endif; ?>
        <?php endfor; ?>
        </select>
      </div>

      <div class="col-md-4">
        <?php echo form_error('start_m'); ?>
        <select class="form-control" name="start_m">
          <?php for($i = 1; $i <= 12; $i++): ?>
            <?php if (date('m', time()) == $i): ?>
              <option selected value="<?=$i?>"><?=date('F', mktime(0, 0, 0, $i, 1, date('Y')))?></option>
            <?php else: ?>
              <option value="<?=$i?>"><?=date('F', mktime(0, 0, 0, $i, 1, date('Y')))?></option>
            <?php endif; ?>
          <?php endfor; ?>
        </select>
      </div>

      <div class="col-md-4">
        <?php echo form_error('start_y'); ?>
        <select class="form-control" name="start_y">
          <?php for ($i = date("Y", strtotime(date("Y"))); $i <= date("Y", strtotime(date("Y").' +3 year')); $i++): ?>
            <option value="<?=$i?>"><?=$i?></option>
          <?php endfor; ?>
        </select>
      </div>
</div>
</div>
      <div class="form-group">
        <?php echo form_error('job_rate'); ?>
        <label for="job_rate">Job Rate</label>
        <?php echo form_input($job_rate); ?>
      </div>

      <div class="form-group">
        <?php echo form_error('job_advertiser_name'); ?>
        <label for="job_advertiser_name">Job Advertiser Name</label>
        <?php echo form_input($job_advertiser_name); ?>
      </div>

      <div class="form-group">
        <?php echo form_error('job_advertiser_email'); ?>
        <label for="job_advertiser_name">Job Advertiser Email</label>
        <?php echo form_input($job_advertiser_email); ?>
      </div>

      <div class="form-group">
        <?php echo form_error('job_advertiser_phone'); ?>
        <label for="job_advertiser_phone">Job Advertiser Phone</label>
        <?php echo form_input($job_advertiser_phone); ?>
      </div>

      <label for="sunset_d">Sunset Date</label>
      <div class="row">
        <div class="form-group">
          <div class="col-md-2">
            <?php echo form_error('sunset_d'); ?>
            <select class="form-control" name="sunset_d">
              <?php for ($i = 1; $i <= 30; $i++): ?>
                <?php if (date('j', time()) == $i): ?>
                  <option selected value="<?=$i?>"><?=date('jS', mktime($i, 0, 0, 0, $i, date('Y')))?></option>
                <?php else: ?>
                  <option value="<?=$i?>"><?=date('jS', mktime($i, 0, 0, 0, $i, date('Y')))?></option>
                <?php endif; ?>
              <?php endfor; ?>
            </select>
          </div>

          <div class="col-md-2">
            <?php echo form_error('sunset_m'); ?>
            <select class="form-control" name="sunset_m">
              <?php for ($i = 1; $i <= 12; $i++): ?>
                <?php if(date('m', time()) == $i): ?>
                  <option selected value="<?=$i?>"><?=date('F', mktime(0, 0, 0, $i, 1, date('Y')))?></option>
                <?php else: ?>
                  <option value="<?=$i?>"><?=date('F', mktime(0, 0, 0, $i, 1, date('Y')))?></option>
                <?php endif; ?>
              <?php endfor; ?>
            </select>
          </div>

          <div class="col-md-2">
            <?php echo form_error('sunset_y'); ?>
            <select class="form-control" name="sunset_y">
              <?php for($i = date("Y",strtotime(date("Y"))); $i <= date("Y",strtotime(date("Y").' +3 year')); $i++): ?>
                <option value="<?=$i?>"><?=$i?></option>
              <?php endfor; ?>
            </select>
          </div>
        </div>
      </div>

      <span class="help-block">Job Sunset Date Help</span>
      <div class="form-group">
        <button type="submit" class="btn btn-success">Submit</button> or <a href="jobs">Cancel</a>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>
