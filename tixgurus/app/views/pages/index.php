<?php require APPROOT . '/views/inc/header.php'; ?>  
<?php flash('event_message') ; ?>
<?php flash('booking_message') ; ?>

<div class="container mt-3">
    <div class="row">
    
        <?php foreach ( $data[ 'events' ] as $event ) : ?>
      <?php if(isMember()){
          $event->event_price = 0.9 * $event->event_price; 
        } ?>
       <div class="col-md-4 mt-4">
            <div class="card"> 
              <img class="card-img-top"  src='<?php echo $data['img'] .$event->event_picture   ;?> ' width="285" height="200">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $event->event_title; ?></h4>
                    <p class="card-text"><?php echo $event->event_description; ?></p>
                    <p class="card-text">$<?php echo $event->event_price; ?></p>
                </div>
              <div class="card-footer">
                    <div class="btn-group">
                      <a type="button" href="<?php echo URLROOT ; ?>/events/show/<?php echo $event->eventId ;?>" class="btn btn-sm btn-outline-secondary">View</a>
                    </div>
              
              </div>
                
            </div>
        </div>
      
        <?php endforeach; ?>
    </div>
    <br>
</div>
<?php require APPROOT . '/views/inc/footer_eh.php'; ?>