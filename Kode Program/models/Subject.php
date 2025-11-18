<?php
include_once("DB.php");

class Subject extends DB{
    function getSubject(){
        $query = "SELECT * FROM subject";
        return $this->execute($query);
    }

    function getSubjectById($id){
        $query = "SELECT * FROM subject WHERE id_subject = $id";
        return $this->execute($query);
    }

    public function addSubject($data){
        $name = $data['name_subject'];
        $SKS  = $data['SKS'];

        $query = "INSERT INTO subject (name_subject, SKS)
                VALUES ('$name', '$SKS')";

        return $this->execute($query);
    }

    function deleteSubject($id){
        $query = "DELETE FROM subject WHERE id = $id";
        return $this->execute($query);
    }

    function updateSubject($id, $data){
        $name = $data['name_subject'];
        $SKS = $data['SKS'];

        $query = "UPDATE subject SET 
                    name_subject = '$name',
                    SKS = '$SKS'
                WHERE id_subject = $id";

        return $this->execute($query);
    }
}

?>
