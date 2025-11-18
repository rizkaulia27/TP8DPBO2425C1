<?php
include_once("DB.php");

class Subject extends DB{
    //Mengambil semua data mata kuliah dari tabel subject
    function getSubject(){
        $query = "SELECT * FROM subject";
        return $this->execute($query);
    }

    //Mengambil satu data subject berdasarkan id_subject
    function getSubjectById($id){
        $query = "SELECT * FROM subject WHERE id_subject = $id";
        return $this->execute($query);
    }

    //Menambah data subject baru ke database
    public function addSubject($data){
        $name = $data['name_subject'];
        $SKS  = $data['SKS'];

        $query = "INSERT INTO subject (name_subject, SKS)
                VALUES ('$name', '$SKS')";

        return $this->execute($query);
    }

    //Mengupdate data subject berdasarkan id_subject
    function updateSubject($id, $data){
        $name = $data['name_subject'];
        $SKS = $data['SKS'];
        
        $query = "UPDATE subject SET 
                    name_subject = '$name',
                    SKS = '$SKS'
                WHERE id_subject = $id";

    return $this->execute($query);
    }

    //Menghapus data subject berdasarkan id_subject
    function deleteSubject($id){
        $query = "DELETE FROM subject WHERE id_subject = $id";
        return $this->execute($query);
    }
}

?>
