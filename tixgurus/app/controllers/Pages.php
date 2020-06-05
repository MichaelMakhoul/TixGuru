<?php
  class Pages extends Controller {
    public function __construct(){
      
    $this->eventModel = $this->model('Event');
    $this->userModel = $this->model('User');
    $this->pageModel = $this->model('Page');
      
    }
    
    public function index(){
    // Get Events
    $events = $this->pageModel->getEvent();
    $img = "img/";
    
    $data = [
      'events' => $events,
      'img' => $img
    ];
    
    $this->view('pages/index', $data);
  } 
    

    public function categories(){
      $events = $this->pageModel->getEvent();
      
      $data = [
        'events' => $events
      ];

      $this->view('pages/categories', $data);
    }
    
    public function art(){
      $events = $this->pageModel->art();
      $img = "../img/";
      $data = [
        'events' => $events,
        'img' => $img
      ];

      $this->view('pages/art', $data);
    }
    
    public function sport(){
      $events = $this->pageModel->sport();
      $img = "../img/";
      $data = [
        'events' => $events,
        'img' => $img
      ];

      $this->view('pages/sport', $data);
    }
    
    public function business(){
      $events = $this->pageModel->business();
      $img = "../img/";
      $data = [
        'events' => $events,
        'img' => $img
      ];

      $this->view('pages/business', $data);
    }
    
    public function science(){
      $events = $this->pageModel->science();
      $img = "../img/";
      $data = [
        'events' => $events,
        'img' => $img
      ];

      $this->view('pages/science', $data);
    }
    
     public function show_members($event_id){
    
    $event = $this->eventModel->getEventById($event_id);  
       
    $data = [
      'event' => $event,
    ];
    
    $this->view('pages/show_members', $data);
  }
    
    
    
  // Book Tickets
    public function book($event_id){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // Sanitize POST array
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      
      $data = [
      'event_id' => $event_id,
      'seat' => "L". $_POST['level']. " R" . $_POST['row'] ." S". $_POST['seat'],
      'member_id' => $_SESSION['member_id'],
      'member_name' => $_SESSION['member_name'],
      'seat_err' => '',
    ];
      
      
    // Validate data
    if(empty($data['seat'])){
      $data['seat_err'] = 'Please enter seats';
    }
      

    // Make sure no errors
    if(empty($data['seat_err'])){
    //Validated
      
    if($this->pageModel->book($data)){
    flash('cart', 'Added to Your cart');
    header('location: ' . URLROOT . '/pages/book/' . $data['event_id']);
    }else{
      die('Somthing went wrong');
    }
    }else{
      // Load the view with errors
      $this->view('pages/book', $data);
    }
      
    }else{
    $events = $this->eventModel->getEventById($event_id);
    $img = "../../public/img/";
    $data = [  
      'event_id' => $event_id,
      'seat' => '',
      'member_id' => $_SESSION['member_id'],
      'member_name' => $_SESSION['member_name'],
      'seat_err' => '',
      'img' => $img,
      'events' => $events
    ];
    
    $this->view('pages/book', $data);
    }
  }
    
    public function cart($member_id){
      
      if($_SERVER['REQUEST_METHOD'] == 'POST'){      
        
      $events = $this->pageModel->getBookings()->booking_id;
      $booking = $this->pageModel->cart($member_id);
      
      $data = [
      'booking_id' => $events
    ];
      
    if($this->pageModel->cart($member_id)){
    flash('booking_message', 'Tickets Booked');
    redirect('');
   
    }else{
      die('Somthing went wrong');
    }
    }else{
      $events = $this->pageModel->displayCart($member_id);
      $img = "../../img/";
      
      $data = [
      'events' => $events,
      'member_id' => $member_id,
      'img' => $img
      ];

      $this->view('pages/cart', $data);
    }
    
    }
    
    public function dashboard($member_id){
      
    $events = $this->pageModel->dashboard($member_id);
    $img = "../../img/";

    $data = [
      'events' => $events,
      'img' => $img
    ];
      
    $this->view('pages/dashboard', $data);
   
    }
}
  
  













