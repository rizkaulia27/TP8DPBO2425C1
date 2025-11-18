<?php
include_once(__DIR__ . "/../views/connection.php");
include_once(__DIR__ . "/../models/Lecturer.php");
include_once(__DIR__ . "/../models/Subject.php");
include_once(__DIR__ . "/../views/LecturerView.php"); // kalau digunakan

class LecturerController{
    //Properti Kontroler
    private $lecturer;

    //Konstruktor Controller Lecturer
    public function __construct(){
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db   = "db_kampus";

        $this->lecturer = new Lecturer($host,$user,$pass,$db);
        $this->subject  = new Subject($host,$user,$pass,$db);
    }

    //Fungsi yang mengarahkan ke halaman umum controller lecturer
    public function index(){
        //Menyambungkan/membuka jalur ke database
        $this->lecturer->open();
        //Meneruskan request umum dari views (mengambil data lecturer) 
        $this->lecturer->getLecturer();

        //Inisiasi variabel untuk menyimpan data lecturer
        $data = array();
        //Push data yang berbentuk object 1 per 1 ke variabel yang sudah dibuat tadi agar dikemas dalam bentuk array
        while ($row = $this->lecturer->getResult()) {
            $data[] = $row;
        }

        //Menutup jalur ke database
        $this->lecturer->close();

        //Meneruskannya ke view
        $view = new LecturerView();
        $view->render($data);
    }

    public function getLecturerById($id) {
        $this->lecturer->open();
        $this->lecturer->getLecturerById($id);
        $data = $this->lecturer->getResult();
        $this->lecturer->close();
        return $data;
    }

    public function getAllSubjects() {
        $this->subject->open();
        $data = $this->subject->getSubject(); // asumsi getSubjects() sudah ada di model Subject
        $this->subject->close();
        return $data;
    }

    //Fungsi untuk menambah data
    public function addLecturer($post){
        if (isset($post['submit'])) {

            $name      = $post['name'];
            $nidn      = $post['nidn'];
            $phone     = $post['phone'];
            $join_date = $post['join_date'];
            $subject   = $post['subject'];

            $data = [
                'name' => $name,
                'nidn' => $nidn,
                'phone' => $phone,
                'join_date' => $join_date,
                'subject' => $subject
            ];

            $this->lecturer->open();
            $this->lecturer->addLecturer($data);
            $this->lecturer->close();

            header("Location: index.php");
        }
    }

    //Fungsi untuk mengedit atau mengupdate data
    public function updateLecturer($id, $post)
    {
        if (isset($post['submit'])) {

            $this->lecturer->open();
            $this->lecturer->updateLecturer($id, $post);
            $this->lecturer->close();

            header("Location: index.php");
            exit;
        }

        // Kalau belum submit, ambil data lecturer berdasar ID
        $this->lecturer->open();
        $this->lecturer->getLecturerById($id);
        $data = $this->lecturer->getResult();
        $this->lecturer->close();

        // Ambil daftar subject untuk dropdown
        $subjects = $this->getAllSubjects();

        include 'views/editLec.php';
    }

    //Fungsi untuk menghapus data
    public function deleteLecturer($id)
    {
        $this->lecturer->open();
        $this->lecturer->deleteLecturer($id);
        $this->lecturer->close();

        header("Location: index.php");
    }
}
