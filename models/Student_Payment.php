<?php
  class Student_Payment {
    private $db;

    public function __construct() {
      $this->db = new Database;
    }

    public function addPayment($data) {
      // Prepare Query
      $this->db->query('INSERT INTO student_payment (id, first_name, last_name, email, amount)
        VALUES(:id, :first_name, :last_name, :email, :amount)');

        // Bind Values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':amount', $data['amount']);

        // Execute
        if($this->db->execute()) {
          return true;
        } else {
          return false;
        }
    }

    public function getStudentPayment() {
      $this->db->query('SELECT * FROM student_payment 
       ORDER BY created_at DESC');

      $results = $this->db->resultset();
      return $results;
    }
  }