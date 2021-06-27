<?php
    class crud{
        private $db;

        function __construct($conn){
            $this->db = $conn;
        }
        public function insert($fname, $lname, $dob, $email, $phone , $speciality, $avatar_path){
            try{
                $sql = "INSERT INTO attendee(firstname,lastname,dateofbirth,email,contactnumber,speciality_id,avatar_path)
                      VALUES (:fname, :lname, :dob,  :email, :phone, :areaofinterest,:avatar_path)";
                $stmt = $this->db->prepare($sql);

                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':phone',$phone);
                $stmt->bindparam(':areaofinterest',$speciality);
                $stmt->bindparam(':avatar_path',$avatar_path);

                $stmt->execute();
                return true;

            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function editAttendees($id, $fname, $lname, $dob, $email, $phone , $speciality){
            $sql = "UPDATE `attendee` SET `firstname`= :fname,`lastname`=:lname,
            `dateofbirth`=:dob,`email`=:email,`contactnumber`=:phone,
            `speciality_id`=:areaofinterest WHERE `attendee_id` = :id";

            try{
             $stmt = $this->db->prepare($sql);

                $stmt->bindparam(':id',$id);
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':phone',$phone);
                $stmt->bindparam(':areaofinterest',$speciality);

                $stmt->execute();
                return true;
            }
           catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function getAttendes(){
            try{
                $sql = "SELECT * FROM `attendee` a inner join speciality s on a.speciality_id = s.speciality_id";
                $result = $this->db->query($sql);
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }


        public function getAttendeeDetails($id){
            try{
                $sql = "SELECT * from attendee a inner join speciality s on a.speciality_id = s.speciality_id where a.attendee_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function deleteAttendee($id){
            try{
                $sql = "DELETE from attendee where attendee_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                return true;
            }
            catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function getSpecialties(){
            try{
                $sql = "SELECT * FROM `speciality`";
                $results = $this->db->query($sql);
                return $results;
        }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }
        public function getSpecialtyById($id){
            try{
                $sql = "SELECT * FROM `speciality` where speciality_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }

        }
    }
?>
