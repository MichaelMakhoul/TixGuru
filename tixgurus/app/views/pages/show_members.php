<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT ; ?>/events" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
<br>
<h1><?php echo $data['event']->event_title; ?></h1>
<?php if(isMember()){
          $data['event']->event_price = 0.9 * $data['event']->event_price; 
        } ?>
<p><span style="font-size: 25px;">Event Categoru: </span><?php echo $data['event']->event_category; ?></p>
<img src='<?php echo $data['img'] .$data['event']->event_picture   ;?> ' width="1100" height="850">
<p><span style="font-size: 25px;">Description: </span><br><?php echo $data['event']->event_description; ?></p>
<p>In <?php echo $data['event']->event_location; ?></p>
<p>at <?php echo $data['event']->event_date; ?></p>
<p><span style="font-size: 25px;">Ticket Price: </span>$<?php echo $data['event']->event_price; ?></p>
<p><span style="font-size: 25px;">Event Capacity: </span><?php echo $data['event']->event_capacity; ?></p>
<div class="mt-3 mb-5">
<a href="<?php echo URLROOT; ?>/pages/book/<?php echo $data['event']->event_id ;?>" class="btn btn-dark">Book Tickets</a></div>
<br>
<?php require APPROOT . '/views/inc/footer.php'; ?>