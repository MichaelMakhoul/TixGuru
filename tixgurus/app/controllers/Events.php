<?php
class Events extends Controller {
  public function __construct(){
 
    $this->eventModel = $this->model('Event');
    $this->userModel = $this->model('User');
  }

  public function index(){
    // Get Events
    
    $events = $this->eventModel->getEvents(); 
    $img = "../img/";
    
    $data = [
      'events' => $events,
      'img' => $img
    ];
    
    $this->view('events/index', $data);
  } 
  public function add_event(){
   
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // Sanitize POST array
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      
      $image = $_FILES['event_picture']['name'];

  	// image file directory
  	 $target = "img/".$image ;

  	// execute query

  	move_uploaded_file($_FILES['event_picture']['tmp_name'], $target);
     
       $data = [
      'event_title' => trim($_POST['event_title']),
      'event_description' => trim($_POST['event_description']),
      'event_date' => trim($_POST['event_date']) ,
      'event_capacity' => trim($_POST['event_capacity']), 
      'event_location' => trim($_POST['event_location']),
      'event_category' => trim($_POST['event_category']),
      'event_picture' => $image,
      'seat_map' => trim($_POST['seat_map']),
      'event_price' => trim($_POST['event_price']),
      'supplier_name' => trim($_POST['supplier_name']),
      'member_id' => $_SESSION['member_id'],
      'title_err' => '',
      'description_err' => '',
      'date_err' => '' ,
      'capacity_err' => '' ,
      'location_err' => '' ,
      'category_err' => '' ,
      'picture_err' => '' ,
      'price_err' => '' ,
      'supplier_name_err' => ''
    ];
  
    // Validate data
    if(empty($data['event_title'])){
      $data['title_err'] = 'Please enter title';
    }
      
    if(empty($data['event_description'])){
      $data['description_err'] = 'Please enter description';
    }
      
    if(empty($data['event_date'])){
      $data['date_err'] = 'Please enter date';
    }
      
    if(empty($data['event_capacity'])){
      $data['capacity_err'] = 'Please enter capacity';
    }
      
   if(empty($data['event_location'])){
      $data['location_err'] = 'Please enter location';
    }
      
    if(empty($data['event_category'])){
      $data['category_err'] = 'Please enter category';
    }
      
    if(empty($data['event_picture'])){
      $data['picture_err'] = 'Please enter picture';
    }
      
    if(empty($data['event_price'])){
      $data['price_err'] = 'Please enter price';
    }
    
    if(empty($data['supplier_name'])){
      $data['supplier_name_err'] = 'Please enter supplier name';
    }
      
    // Make sure no errors
    if(empty($data['title_err']) && empty($data['description_err']) && empty($data['date_err']) && empty($data['capacity_err']) && empty($data['location_err']) && empty($data['category_err']) /*&& empty($data['picture_err'])*/ && empty($data['supplier_name_err']) && empty($data['price_err'])){
      
      //Validated
    if($this->eventModel->addEvent($data)){
      flash('event_message', 'Event Added');
      redirect('events/index');
    }else{
      die('Somthing went wrong');
    }
    }else{
      // Load the view with errors
      $this->view('events/add_event', $data);
    }
      
    }else{
      
    $data = [
      'event_title' => '',
      'event_description' => '',
      'event_date' => '',
      'event_capacity' => '', 
      'event_location' => '',
      'event_category' => '',
      'event_picture' => '',
      'seat_map' => '',
      'supplier_name' => '',
      'event_price' => ''
    ];
    
    $this->view('events/add_event', $data);
  }
}

  public function edit_event($event_id){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // Sanitize POST array
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      
      
      $image = $_FILES['event_picture']['name'];

  	// image file directory
  	$target = "img/".$image ;

  	// execute query

  	move_uploaded_file($_FILES['event_picture']['tmp_name'], $target);
      
       $data = [
      'event_id' => $event_id,
      'event_title' => trim($_POST['event_title']),
      'event_description' => trim($_POST['event_description']),
      'event_date' => trim($_POST['event_date']) ,
      'event_capacity' => trim($_POST['event_capacity']), 
      'event_location' => trim($_POST['event_location']),
      'event_category' => trim($_POST['event_category']),
      'event_picture' => $image,
      'event_price' => trim($_POST['event_price']),
      'seat_map' => trim($_POST['seat_map']),
      'supplier_name' => trim($_POST['supplier_name']),
      'member_id' => $_SESSION['member_id'],
      'title_err' => '',
      'description_err' => '',
      'date_err' => '' ,
      'capacity_err' => '' ,
      'location_err' => '' ,
      'category_err' => '' ,
      'picture_err' => '' ,
      'price_err' => '' ,
      'supplier_name_err' => ''
    ];

    // Validate data
    if(empty($data['event_title'])){
      $data['title_err'] = 'Please enter title';
    }
      
    if(empty($data['event_description'])){
      $data['description_err'] = 'Please enter description';
    }
      
    if(empty($data['event_date'])){
      $data['date_err'] = 'Please enter date';
    }
      
    if(empty($data['event_capacity'])){
      $data['capacity_err'] = 'Please enter capacity';
    }
      
   if(empty($data['event_location'])){
      $data['location_err'] = 'Please enter location';
    }
      
    if(empty($data['event_category'])){
      $data['category_err'] = 'Please enter category';
    }
      
    /*if(empty($data['event_picture'])){
      $data['picture_err'] = 'Please enter picture';
    }*/
    
    if(empty($data['event_price'])){
      $data['price_err'] = 'Please enter Price';
    } 
      
    if(empty($data['supplier_name'])){
      $data['supplier_name_err'] = 'Please enter supplier name';
    }
      
    // Make sure no errors
    if(empty($data['title_err']) && empty($data['description_err']) && empty($data['date_err']) && empty($data['capacity_err']) && empty($data['location_err']) && empty($data['category_err']) /*&& empty($data['picture_err'])*/ && empty($data['supplier_name_err']) && empty($data['price_err'])){
      //Validated
    if($this->eventModel->updateEvent($data)){
      flash('event_message', 'Event Updated');
      redirect('events/index');
    }else{
      die('Somthing went wrong');
    }
    }else{
      // Load the view with errors
      $this->view('events/edit_event', $data);
    }
      
    }else{
    // Get existing event from model
    $event = $this->eventModel->getEventById($event_id);
      
    // Check for Owner
    if($event->member_id != $_SESSION['member_id']){
      redirect('events/index');
    }
      
    $data = [
      'event_id' => $event_id,
      'event_title' => $event->event_title,
      'event_description' => $event->event_description,
      'event_date' => $event->event_date,
      'event_capacity' => $event->event_capacity, 
      'event_location' => $event->event_location,
      'event_category' => $event->event_category,
      'seat_map' => $event->seat_map,
      'event_picture' => $event->event_picture,
      'event_price' => $event->event_price,
      'supplier_name' => $event->supplier_name
    ];
    
    $this->view('events/edit_event', $data);
  }
}
  
    public function show($event_id){
    
    $event = $this->eventModel->getEventById($event_id);  
    $member = $this->userModel->getUserById($event->member_id);
    $img = "../../img/";
      
    $data = [
      'event' => $event,
      'member' => $member,
      'img' => $img
    ];
    if(isEmployee() || isAdmin()){
    $this->view('events/show', $data);
    }else{
    $this->view('pages/show_members', $data);
    }
  }
  
  public function show_admin($event_id){
    
    $event = $this->eventModel->getEventById($event_id);  
    $member = $this->userModel->getUserById($event->member_id);
    $tickets = $this->eventModel->eventsTicket($event_id);
    $img = "../img/";

    $data = [
      'event' => $event,
      'member' => $member,
      'tickets' => $tickets,
      'img' => $img
    ];
    if(isAdmin()){
    $this->view('events/show_admin', $data);
    }else{
    $this->view('pages/show_members', $data);
    }
  }
  
    public function dashboard(){
      
    $tickets = $this->eventModel->ticketSold();
    $weekFive = $this->eventModel->weeklyFive();
    $monthFive = $this->eventModel->monthlyFive();
    $yearTen = $this->eventModel->yearlyTen();
    
    $data = [
      'tickets' => $tickets,
      'weekFive' => $weekFive,
      'monthFive' => $monthFive,
      'yearTen' => $yearTen
    ];
    
    $this->view('events/dashboard', $data);
    }
  
}
  
  
  
  
  
  
  
  
  
  
  
  