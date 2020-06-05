<?php
class Page{
   private $db;
  
  public function __construct(){
    $this->db = new Database;
  }
  
  public function getEvent(){
    $this->db->query('SELECT *,
                      events.event_id as eventId,
                      members.member_id as memberId
                      FROM events
                      INNER JOIN members
                      ON events.member_id = members.member_id
                      ORDER BY events.event_category, events.event_added_at DESC');
    
    $results = $this->db->resultSet();
    
    return $results;
  }
  
  
  public function getEventsById($event_id){
    $this->db->query('SELECT * FROM events WHERE event_id = :event_id');
    $this->db->bind(':event_id', $event_id);
    
    $row = $this->db->single();
    
    return $row;
  }
  
  public function art(){
    $this->db->query('SELECT * FROM tixgurus.`art category`;');
    
    $results = $this->db->resultSet();
    
    return $results;
  }
  
  public function sport(){
    $this->db->query('SELECT * FROM tixgurus.`sport category`;');
    
    $results = $this->db->resultSet();
    
    return $results;
  }
  
  public function business(){
    $this->db->query('SELECT * FROM tixgurus.`business category`;');
    
    $results = $this->db->resultSet();
    
    return $results;
  }
  
  public function science(){
    $this->db->query('SELECT * FROM tixgurus.`science category`;');
    
    $results = $this->db->resultSet();
    
    return $results;
  }
  
  public function stad(){
    $this->db->query('SELECT DISTINCT * FROM tixgurus.`stad`;');
    
    $results = $this->db->resultSet();
    
    return $results;
  }
  
  public function getBookingById($booking_id){
    $this->db->query('SELECT * FROM bookings WHERE booking_id = :booking_id');
    $this->db->bind(':booking_id', $booking_id);
    
    $row = $this->db->single();
    
    return $row;
  }
  
  public function getBookings(){
    $this->db->query('SELECT *,
                      events.event_id as eventId,
                      bookings.booking_id as bookingId
                      FROM events
                      INNER JOIN bookings
                      ON events.event_id = bookings.event_id
                      ');
    
     $results = $this->db->resultSet();
    
    return $results;
  }
  
  public function book($data){
    
    $this->db->query('INSERT INTO bookings (seat, member_id, event_id, member_name) VALUES (:seat, :member_id, :event_id, :member_name)
    ');
      // Bind values
      $this->db->bind(':seat', $data['seat']);
      $this->db->bind(':member_id', $data['member_id']);
      $this->db->bind(':event_id', $data['event_id']);
      $this->db->bind(':member_name', $data['member_name']);
    // Excecute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
  }

  
  public function displayCart($data){
    $this->db->query('SELECT * FROM dashboard
                             WHERE status = "not_paid" AND member_id = :member_id');
    
      $this->db->bind(':member_id', $data['member_id']);
    
    $results = $this->db->resultSet();
    
    return $results;
  }
  
  public function cart($member_id){
    $this->db->query('UPDATE bookings SET status = "paid" WHERE member_id = :member_id');
    $this->db->bind(':member_id', $member_id);
    // Excecute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
  }
  
  public function dashboard($member_id){
    
    $this->db->query('SELECT DISTINCT event_id, event_title, event_description, event_picture FROM dashboard
                             WHERE member_id = :member_id');

    // Bind values 
      $this->db->bind(':member_id', $member_id);

  
    $results = $this->db->resultSet();
    
    return $results;
}
}














