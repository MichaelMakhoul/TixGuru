<?php require APPROOT . '/views/inc/header.php'; ?>
<?php
if (!isAdmin() ) {
    redirect( 'pages' );
}
?>
   <?php foreach ( $data['tickets'] as $tickets ) : ?>
    <h4 class="mt-3">Total Number of sold tickets is: <span style="border: 2px solid #ccc;"> <?php echo $tickets->NumberOfTickets ; ?></span></h4>

    <br>
    <?php endforeach; ?>
    <h4 class="mt-3">Weekly Top 5 events: </h4>
   <?php foreach ( $data['weekFive'] as $weekFive ) : ?>
    <span class="mr-3" style="border: 2px solid #ccc; font-size: 20px;"> <?php echo $weekFive->event_title ; ?></span>
    <?php endforeach; ?>

    <br>
    <h4 class="mt-3">Monthly Top 5 events: </h4>
    <?php foreach ( $data['monthFive'] as $monthFive ) : ?>
    <span class="mr-3" style="border: 2px solid #ccc; font-size: 20px;"> <?php echo $monthFive->event_title ; ?></span>
    <?php endforeach; ?>

    <br>
    <h4 class="mt-3">Yearly Top 10 events: </h4>
    <?php foreach ( $data['yearTen'] as $yearTen ) : ?>
    <span class="mr-1" style="border: 2px solid #ccc; font-size: 20px;"> <?php echo $yearTen->event_title ; ?></span>
    <?php endforeach; ?>


<?php require APPROOT . '/views/inc/footer_eh.php'; ?>
