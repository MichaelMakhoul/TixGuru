<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('booking_message') ; ?>
<a href="<?php echo URLROOT ; ?>/events/book<?php echo $data['event']->event_id; ?>" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
  <div class="card card-body bg-light mt-5 col-md-6">
    <h2>Choose Your Seats </h2>
    <form action="<?php echo URLROOT ; ?>/pages/seats" method="post">
      
      <div class="form-group">
        <label for="seats_number">Choose your seats numbers as located on the site map: <sup>*</sup></label>
        <input type="number" name="seats_number" class="form-control form-control-lg <?php echo (!empty($data['seats_number_err'])) ? 'is-invalid' : '';?>"><?php echo $data['seats_number']; ?>
        <span class="invalid-feedback"><?php echo $data['seats_number_err']; ?></span>
      </div>
      
      <input type="submit" class="btn btn-success" value="Submit">
    </form>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
