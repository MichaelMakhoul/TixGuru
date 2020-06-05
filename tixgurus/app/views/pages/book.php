<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('cart'); ?>

<a href="<?php echo URLROOT ; ?>/events" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
    <div class="row">

  <div class="card card-body bg-light mt-5 mr-2 col-lg-5">
    <h2>Book Tickets</h2>
    <form action="<?php echo URLROOT ; ?>/pages/book/<?php echo $data['event_id']; ?>" method="post">
      
      <div class="form-group">
        <label for="level">Level <sup>*</sup></label>
        <input type="number" name="level" class="form-control form-control-lg" value="">
      </div>
      
      <div class="form-group">
        <label for="row">Row <sup>*</sup></label>
        <input type="number" name="row" class="form-control form-control-lg" value="">
      </div>
      
       <div class="form-group">
        <label for="seat">Seat Number: <sup>*</sup></label>
        <input type="number" name="seat" class="form-control form-control-lg" value="">
      </div>
      <input type="submit" class="btn btn-success" name="upload" value="Book">
      <a name="add" href="<?php echo URLROOT; ?>/pages/cart/<?php echo $_SESSION['member_id']; ?>" class="btn btn-success">Check your cart</a>
      
    </form>
      </div>
  <div class=" mt-5 ml-2 col-lg-4">
    <img src="<?php echo $data['img'] .$data['events']->seat_map ;?>" width="600" height="500">
  </div>
  
    
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>