<?php
include_once("DB.php");

class Lecturer extends DB{
    function getLecturer(){
        $query = "SELECT lecturer.*, subject.name_subject, subject.SKS
                  FROM lecturer
                  JOIN subject ON lecturer.subject = subject.id_subject
                  ORDER BY lecturer.id";

        return $this->execute($query);
    }

    function getLecturerById($id){
        $query = "SELECT * FROM lecturer WHERE id = $id";
        return $this->execute($query);
    }

    function addLecturer($data){
        $name = $data['name'];
        $nidn = $data['nidn'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $subject = $data['subject'];

        $query = "INSERT INTO lecturer (name, nidn, phone, join_date, subject)
                  VALUES ('$name', '$nidn', '$phone', '$join_date', '$subject')";
        return $this->execute($query);
    }
    
    function updateLecturer($id, $data){
        $name = $data['name'];
        $nidn = $data['nidn'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $subject = $data['subject'];

        $query = "UPDATE lecturer SET 
                    name = '$name',
                    nidn = '$nidn',
                    phone = '$phone',
                    join_date = '$join_date',
                    subject = '$subject'
                WHERE id = $id";

        return $this->execute($query);
    }

    function deleteLecturer($id){
        $query = "DELETE FROM lecturer WHERE id = $id";
        return $this->execute($query);
    }
}

?>
