<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT ; ?>/pages/index" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
<br>
<h1><?php echo $data['event']->event_title; ?></h1>

<p><span style="font-size: 25px;">Event Categoru: </span><?php echo $data['event']->event_category; ?></p>
<p><?php echo $data['event']->event_picture; ?></p>
<p><span style="font-size: 25px;">Description: </span><br><?php echo $data['event']->event_description; ?></p>
<p>In <?php echo $data['event']->event_location; ?></p>
<p>at <?php echo $data['event']->event_date; ?></p>
<p><span style="font-size: 25px;">Supplier's Name: </span><?php echo $data['event']->supplier_name; ?></p>
<p><span style="font-size: 25px;">Event Capacity: </span><?php echo $data['event']->event_capacity; ?></p>
<div class="bg-secondary text-white p-2 mb-3">
  Added By: <?php echo $data['member']->member_name; ?> on <?php echo $data['event']->event_added_at; ?>
</div>
        
<?php foreach ( $data[ 'tickets' ] as $ticket ) : ?>
  <p>Number of Tickets Sold for this event: <span style="font-weight: bold;"><?php echo $ticket->ticketSold; ?></span></p>
  <p>Supplier Name: <span style="font-weight: bold;"><?php echo $ticket->supplier_name; ?></span></p>
<?php endforeach; ?>
<hr>

<?php require APPROOT . '/views/inc/footer_eh.php'; ?>