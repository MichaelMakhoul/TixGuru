<?php require APPROOT . '/views/inc/header.php'; ?>
<?php if(isAdmin()){ 
  header('location: ' . URLROOT . '/events/show_admin/' . $data['event']->event_id);
}
?>
<a href="<?php echo URLROOT ; ?>/events/index" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
<br>
<?php if(isMember()){
          $data['event']->event_price = 0.9 * $data['event']->event_price; 
        } ?>

<h1><?php echo $data['event']->event_title; ?></h1>

<p><span style="font-size: 25px;">Event Categoru: </span><?php echo $data['event']->event_category; ?></p>

<img src='<?php echo $data['img'] .$data['event']->event_picture   ;?> ' width="1100" height="850">

<p><span style="font-size: 25px;">Description: </span><br><?php echo $data['event']->event_description; ?></p>
<p>In <?php echo $data['event']->event_location; ?></p>
<p>at <?php echo $data['event']->event_date; ?></p>
<p><span style="font-size: 25px;">Supplier's Name: </span><?php echo $data['event']->supplier_name; ?></p>
<p><span style="font-size: 25px;">Ticket Price: </span>$<?php echo  $data['event']->event_price; ?></p>
<p><span style="font-size: 25px;">Event Capacity: </span><?php echo $data['event']->event_capacity; ?></p>
<div class="bg-secondary text-white p-2 mb-3">
  Added By: <?php echo $data['member']->member_name; ?> on <?php echo $data['event']->event_added_at; ?>
</div>

<hr>
<a href="<?php echo URLROOT; ?>/events/edit_event/<?php echo $data['event']->event_id; ?>" class="btn btn-dark">Edit</a>

<?php require APPROOT . '/views/inc/footer_eh.php'; ?>