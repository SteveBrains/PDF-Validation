<?php
if (!defined("BASEPATH"))
    exit("No direct script access allowed");

class Car_Model extends CI_Model
{



    function getCars($search)
    {
        $this->db->select('ay.*');
        $this->db->from('car as ay');
        if (!empty($search['name'])) {
            $likeCriteria = "(ay.name  LIKE '%" . $search['name'] . "%')";
            $this->db->where($likeCriteria);
        }
        $this->db->order_by("ay.id", "ASC");
        $this->db->order_by("ay.id", "ASC");
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function getCar($id)
    {
        $this->db->select('ay.*');
        $this->db->from('car as ay');
        $this->db->where('ay.id', $id);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    // function addCar($data)
    // {
    //     $data['created_by'] = $_SESSION['userId'];
    //     $data['updated_by'] = $_SESSION['userId'];
    //     $data['created_by_tm'] = date('Y-m-d H:i:s');
    //     $data['updated_dt_tm'] = date('Y-m-d H:i:s');
    //     $this->db->trans_start();
    //     $this->db->insert('car', $data);
    //     $insert_id = $this->db->insert_id();
    //     $this->db->trans_complete();
    //     return $insert_id;
    // }


    function addCar($data)
    {
        $data['created_by'] = $_SESSION['userId'];
        $data['updated_by'] = $_SESSION['userId'];
        $data['created_by_tm'] = date('Y-m-d H:i:s');
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');

        // Check if the table exists
        $table_name = 'car';
        $table_exists = $this->db->table_exists($table_name);

        // If the table doesn't exist, create it
        if (!$table_exists) {
            $this->createCarTable();
        }

        // Insert data into the car table
        $this->db->trans_start();
        $this->db->insert('car', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();

        return $insert_id;
    }
    function editCar($data, $id)
    {
        $data['updated_by'] = $_SESSION['userId'];
        $data['updated_dt_tm'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        $this->db->update('car', $data);
        return TRUE;
    }


    function createCarTable()
    {
        // Define the SQL statement to create the car table
        $sql = "CREATE TABLE IF NOT EXISTS car (
                id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                status INT(1) NOT NULL,
                created_by INT(11) NOT NULL,
                updated_by INT(11) NOT NULL,
                created_by_tm DATETIME NOT NULL,
                updated_dt_tm DATETIME NOT NULL
            )";

        // Execute the SQL statement
        $this->db->query($sql);
    }
}