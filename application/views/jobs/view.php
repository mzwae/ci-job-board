<div class="page-header">
  <h1>
    <?php echo form_open('jobs/index'); ?>
    <div class="row">
      <div class="col-lg-12">
        <div class="input-group">
          <input type="text" class="form-control" name="search_string" placeholder="Search Jobs...">
          <span class="input-group-btn">
            <button type="submit" class="btn btn-default">Search</button>
          </span>
        </div>
      </div>
    </div>
    <?php echo form_close(); ?>
  </h1>
</div>

<table class="table table-hover">
  <?php foreach($query->result() as $row): ?>
    <tr>
      <td>
        <a href="<?=base_url()?>jobs/apply/<?=$row->job_id?>"><?=$row->job_title?></a>
        <br>
        <?php echo word_limiter($row->job_desc, 50); ?>
      </td>
      <td>
        Posted on <?=$row->job_created_at?>
        <br>
        Rate is &pound;<?=$row->job_rate?>
      </td>
      <td>
        <a href="<?=base_url()?>jobs/apply/<?=$row->job_id?>">Apply</a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>
