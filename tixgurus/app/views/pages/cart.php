<?php require APPROOT . '/views/inc/header.php'; ?>  


<div class="container mt-3">
  <form action="<?php echo URLROOT ; ?>/pages/cart/<?php echo $_SESSION['member_id'] ;?>" method="post">
    <div class="row">
       
        <?php foreach ( $data[ 'events' ] as $event ) : ?>
        <?php if(isMember()){
          $event->event_price = 0.9 * $event->event_price; 
        } ?>
        <div class="col-md-4 mt-4">
            <div class="card"> 
               
                    <h4 class="card-title"><?php echo $event->event_title; ?></h4>
                <img class="card-img-top"  src='<?php echo $data['img'] .$event->event_picture   ;?> ' width="285" height="200">
                <div class="card-body">                   
                  <p class="card-text"><?php echo $event->event_description; ?></p>
                    <p class="card-text">TICKET Price: <span style="font-weight: bold;">$<?php echo $event->event_price; ?></span></p>
                    <p class="card-text">Your Seat: <span style="font-weight: bold;"><?php echo $event->seat; ?></span></p>
                </div>
              <div class="card-footer">
                    <div class="btn-group">
                      <a type="button" href="<?php echo URLROOT ; ?>/events/show/<?php echo $event->event_id ;?>" class="btn btn-sm btn-outline-secondary">View</a>
                    </div>              
              </div>
            </div>
        </div>
      
        <?php endforeach; ?>
   
   </div>   
   <input type="submit" class="btn btn-success mt-5" value="Checkout" onClick="myFunction()">
   
    
    <br>
</form>

<?php require APPROOT . '/views/inc/footer_eh.php'; ?>
  
<script>
function myFunction() {
  var myWindow = window.open("https://www.paypal.com/au/home", "", "width=800,height=600");
}
</script>