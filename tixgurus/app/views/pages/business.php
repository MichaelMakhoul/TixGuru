<?php require APPROOT . '/views/inc/header.php'; ?>  
<h4>Business</h4>
<?php foreach($data['events'] as $event) : ?>
<div class="container mt-3">
  <div class="row">
  <div class="card col-md-9 mx-auto">
    <img class="card-img-top" src='<?php echo $data['img'] .$event->event_picture   ;?> ' width="800" height="550" alt="Card image" >
    <div class="card-body">
      <h4 class="card-title"><?php echo $event->event_title; ?></h4>
      <p class="card-text"><?php echo $event->event_description; ?></p>
      <p class="card-text">Ticket Price: $<?php echo $event->event_price; ?></p>
    </div>
    <div class="d-flex justify-content-between align-items-center">
      <div class="btn-group col-md-12">
        <a type="button" href="<?php echo URLROOT ; ?>/pages/show_members/<?php echo $event->event_id ;?>" class="btn btn-sm btn-outline-secondary">View</a>
      </div>
    </div>
  </div>  
  </div>
  <br>
  </div>
<?php endforeach; ?>

<?php require APPROOT . '/views/inc/footer.php'; ?>