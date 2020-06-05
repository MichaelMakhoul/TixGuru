<?php require APPROOT . '/views/inc/header.php'; ?>

<a href="<?php echo URLROOT ; ?>/events/index" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
  <div class="card card-body bg-light mt-5">
    <h2>Add Event</h2>
    <p>Add an event with this form</p>
    <form action="<?php echo URLROOT ; ?>/events/add_event" method="post" enctype="multipart/form-data">

      <div class="form-group">
        <label for="event_title">Title: <sup>*</sup></label>
        <input type="text" name="event_title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : '';?>" value="<?php echo $data['event_title']; ?>">
        <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
      </div>

      <div class="form-group">
        <label for="event_description">Add Description: <sup>*</sup></label>
        <textarea name="event_description" class="form-control form-control-lg <?php echo (!empty($data['description_err'])) ? 'is-invalid' : '';?>"><?php echo $data['event_description']; ?></textarea>
        <span class="invalid-feedback"><?php echo $data['description_err']; ?></span>
      </div>
      
      <div class="form-group">
        <label for="event_date">Date: <sup>*</sup></label>
        <input type="datetime-local" name="event_date" class="form-control form-control-lg <?php echo (!empty($data['date_err'])) ? 'is-invalid' : '';?>"><?php echo $data['event_date']; ?>
        <span class="invalid-feedback"><?php echo $data['date_err']; ?></span>
      </div>
      
      <div class="form-group">
        <label for="event_capacity">Capacity: <sup>*</sup></label>
        <input type="text" name="event_capacity" class="form-control form-control-lg <?php echo (!empty($data['capacity_err'])) ? 'is-invalid' : '';?>"><?php echo $data['event_capacity']; ?>
        <span class="invalid-feedback"><?php echo $data['capacity_err']; ?></span>
      </div>
      
      <div class="form-group">
        <label for="event_location">Location: <sup>*</sup></label>
        <input type="text" name="event_location" class="form-control form-control-lg <?php echo (!empty($data['location_err'])) ? 'is-invalid' : '';?>"><?php echo $data['event_location']; ?>
        <span class="invalid-feedback"><?php echo $data['location_err']; ?></span>
      </div>
      
       <div class="form-group">
        <label for="event_category">Category: <sup>*</sup></label>
        <select name="event_category" class="form-control form-control-lg" aria-describedby="inputGroupFileAddon01">
          <option value="Art">Art</option>
          <option value="Sport">Sport</option>
          <option value="Science">Science</option>
          <option value="Business">Business</option>
        </select>
      </div>
      
      <div class="input-group mt-5 mb-4">
        <div class="input-group-prepend">
          <span for="event_picture" class="input-group-text" id="inputGroupFileAddon01">Event Picture: </span>
        </div>
        <div class="custom-file">
          <input type="file" class="custom-file-input" name="event_picture" id="inputGroupFile01"
            aria-describedby="inputGroupFileAddon01">
          <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
        </div>
      </div>
      
      <div class="form-group">
        <label for="seat_map">Seat Map: <sup>*</sup></label>
        <select name="seat_map" class="form-control form-control-lg" aria-describedby="inputGroupFileAddon01">
          <option value="theater.png">Theatre</option>
          <option value="stad.png">Stadium</option>
          <option value="stad.png">Entertainment Centre</option>
          <option value="business.png">Business Centre</option>
          <option value="museum.png">Museum</option>
        </select>
      </div>
      
      <div class="form-group">
        <label for="supplier_name">Supplier: <sup>*</sup></label>
        <input type="text" name="supplier_name" class="form-control form-control-lg <?php echo (!empty($data['supplier_name_err'])) ? 'is-invalid' : '';?>"><?php echo $data['supplier_name']; ?>
        <span class="invalid-feedback"><?php echo $data['supplier_name_err']; ?></span>
      </div>
      
      <div class="form-group">
        <label for="event_price">Price: <sup>*</sup></label>
        <input type="number" name="event_price" class="form-control form-control-lg <?php echo (!empty($data['price_err'])) ? 'is-invalid' : '';?>"><?php echo $data['event_price']; ?>
        <span class="invalid-feedback"><?php echo $data['price_err']; ?></span>
      </div>
      
      <input type="submit" class="btn btn-success" value="Submit">
    </form>
  </div>
<?php require APPROOT . '/views/inc/footer_eh.php'; ?>















