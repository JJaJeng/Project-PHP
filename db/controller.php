<?php 
    class Controller{
        private $db;

        function __construct($con){
            $this->db=$con;
            // echo "มีเรียกใช้งาน Controller";
        }

        function getDepartment(){
            try{
                $sql = "SELECT * FROM department";
                $result = $this->db->query($sql);
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
                return FALSE;
            }
        }

        function getEmployee(){
            try{
                $sql = "SELECT * FROM employee a INNER JOIN department b ON a.department_id = b.department_id ORDER BY a.emp_id;";
                $result = $this->db->query($sql);
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
                return FALSE;
            }
        }

        function delete($id){
            try{
                $sql = "DELETE FROM employee WHERE emp_id=:id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(":id",$id);
                $stmt->execute();
                return True;
            }catch(PDOException $e){
                echo $e->getMessage();
                return FALSE;
            }
        }

        function insert($fname,$lname,$salary,$department_id){
            try{
                $sql = "INSERT INTO employee(fname,lname,salary,department_id) 
                VALUE (:fname,:lname,:salary,:department_id)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(":fname",$fname);
                $stmt->bindParam(":lname",$lname);
                $stmt->bindParam(":salary",$salary);
                $stmt->bindParam(":department_id",$department_id);
                $stmt->execute();
                return true;

            }catch(PDOException $e){
                return FALSE;
            }
        }
        
        function getEmployeeDetail($id){
            try{
                $sql = "SELECT * From employee a 
                INNER JOIN department b
                ON a.department_id = b.department_id
                WHERE emp_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(":id",$id);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result;

            }catch(PDOException $e){
                return FALSE;
            }

        }


        function update($fname,$lname,$salary,$department_id,$emp_id){
            try{
                $sql = "UPDATE employee 
                SET fname=:fname,
                lname=:lname,
                salary=:salary,
                department_id = :department_id
                WHERE emp_id = :emp_id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(":fname",$fname);
                $stmt->bindParam(":lname",$lname);
                $stmt->bindParam(":salary",$salary);
                $stmt->bindParam(":department_id",$department_id);
                $stmt->bindParam(":emp_id",$emp_id);
                $stmt->execute();
                return True;

            }catch(PDOException $e){
                return FALSE;
            }

        }




    }




?>