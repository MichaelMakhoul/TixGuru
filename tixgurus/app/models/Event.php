<?php
class Event{
  private $db;
  
  public function __construct(){
    $this->db = new Database;
  }
  
  public function getEvents(){
    $this->db->query('SELECT *,
                      events.event_id as eventId,
                      members.member_id as memberId
                      FROM events
                      INNER JOIN members
                      ON events.member_id = members.member_id
                      ORDER BY events.event_added_at DESC');
    
    $results = $this->db->resultSet();
    
    return $results;
      }
  

  
  public function addEvent($data){
    $this->db->query('INSERT INTO events (event_title, event_description, event_date, event_capacity, event_location, event_category, event_picture, event_price, supplier_name, seat_map, member_id) VALUES(:event_title, :event_description, :event_date, :event_capacity, :event_location, :event_category, :event_picture, :event_price ,:supplier_name, :seat_map, :member_id)');
      // Bind values
      $this->db->bind(':event_title', $data['event_title']);
      $this->db->bind(':event_description', $data['event_description']);
      $this->db->bind(':event_date', $data['event_date']);
      $this->db->bind(':event_capacity', $data['event_capacity']);
      $this->db->bind(':event_location', $data['event_location']);
      $this->db->bind(':event_category', $data['event_category']);
      $this->db->bind(':event_picture', $_FILES['event_picture']['name']);
      $this->db->bind(':event_price', $data['event_price']);
      $this->db->bind(':supplier_name', $data['supplier_name']);
      $this->db->bind(':seat_map', $data['seat_map']);
      $this->db->bind(':member_id', $data['member_id']);

      
      // Excecute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
  }
  
  public function updateEvent($data){
    $this->db->query('UPDATE events SET event_title = :event_title, event_description = :event_description, event_date = :event_date, event_capacity = :event_capacity, event_location =  :event_location, event_category = :event_category, event_picture = :event_picture, event_price = :event_price, seat_map = :seat_map ,supplier_name = :supplier_name WHERE event_id = :event_id');
    
      // Bind values
      $this->db->bind(':event_id', $data['event_id']);
      $this->db->bind(':event_title', $data['event_title']);
      $this->db->bind(':event_description', $data['event_description']);
      $this->db->bind(':event_date', $data['event_date']);
      $this->db->bind(':event_capacity', $data['event_capacity']);
      $this->db->bind(':event_location', $data['event_location']);
      $this->db->bind(':event_category', $data['event_category']);
      $this->db->bind(':event_picture', $data['event_picture']);
      $this->db->bind(':event_price', $data['event_price']);
      $this->db->bind(':seat_map', $data['seat_map']);
      $this->db->bind(':supplier_name', $data['supplier_name']);
      
      // Excecute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
  }
  
  public function getEventById($event_id){
    $this->db->query('SELECT * FROM events WHERE event_id = :event_id');
    $this->db->bind(':event_id', $event_id);
    
    $row = $this->db->single();
    
    return $row;
  }
  
  public function ticketSold(){
    $this->db->query('SELECT COUNT(booking_id) AS NumberOfTickets FROM bookings');
    
    $results = $this->db->resultSet();
    
    return $results;
  }
  
  public function weeklyFive(){
    $this->db->query('SELECT COUNT(booking_id) AS top, event_id, event_title
                      FROM dashboard
                      where booking_date between date_sub(now(),INTERVAL 1 WEEK) and now()
                      GROUP BY event_id
                      ORDER BY COUNT(booking_id) DESC
                      LIMIT 5
                      ');
    $results = $this->db->resultSet();
    
    return $results;
  }
  
  public function monthlyFive(){
    $this->db->query('SELECT COUNT(booking_id) AS top, event_id, event_title
                      FROM dashboard
                      where booking_date between date_sub(now(),INTERVAL 1 MONTH) and now()
                      GROUP BY event_id
                      ORDER BY COUNT(booking_id) DESC
                      LIMIT 5
                      ');
    $results = $this->db->resultSet();
    
    return $results;
  }
  
  public function yearlyTen(){
    $this->db->query('SELECT COUNT(booking_id) AS top, event_id, event_title
                      FROM dashboard
                      where booking_date between date_sub(now(),INTERVAL 1 YEAR) and now()
                      GROUP BY event_id
                      ORDER BY COUNT(booking_id) DESC
                      LIMIT 10
                      ');
    $results = $this->db->resultSet();
    
    return $results;
  }
  
  public function eventsTicket($event_id){
    $this->db->query('SELECT COUNT(booking_id) AS ticketSold, supplier_name
                      FROM dashboard
                      where event_id = :event_id
                      ');
    $this->db->bind(':event_id', $event_id);
    $results = $this->db->resultSet();
    
    return $results;
  }
  
  
}










