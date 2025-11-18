<?php
include_once("connection.php");
include_once("../models/Subject.php");
include_once("../views/SubjectView.php");

class SubjectController{
    //Properti Kontroler
    private $subject;

    //Konstruktor Controller Subject
     public function __construct(){
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db   = "db_kampus";

        $this->subject  = new Subject($host,$user,$pass,$db);
    }

    //Fungsi yang mengarahkan ke halaman umum controller subject
    public function index(){
        //Menyambungkan/membuka jalur ke database
        $this->subject->open();
        //Meneruskan request umum dari views (mengambil data subject) 
        $this->subject->getSubject();

        //Inisiasi variabel untuk menyimpan data subject
        $data = array();
        //Push data yang berbentuk object 1 per 1 ke variabel yang sudah dibuat tadi agar dikemas dalam bentuk array
        while ($row = $this->subject->getResult()) {
            $data[] = $row;
        }

        //Menutup jalur ke database
        $this->subject->close();

        //Meneruskannya ke view
        $view = new subjectView();
        $view->render($data);
    }

    public function getSubjectById($id) {
        $this->subject->open();
        $this->subject->getSubjectById($id);
        $data = $this->subject->getResult();
        $this->subject->close();
        return $data;
    }

    //Fungsi untuk menambah data
    public function addSubject($post){
        if (isset($post['submit'])) {

            $name_subject = $post['name_subject'];
            $SKS          = $post['SKS'];

            $data = [
                'name_subject' => $name_subject,
                'SKS' => $SKS
            ];

            $this->subject->open();
            $this->subject->addSubject($data);
            $this->subject->close();

            header("Location: index.php");
            exit;
        }
    }

    //Fungsi untuk mengedit atau mengupdate data
    public function updateSubject($id, $post)
    {
        if (isset($post['submit'])) {

            $this->subject->open();
            $this->subject->updateSubject($id, $post);
            $this->subject->close();

            header("Location: index.php");
            exit;
        }

        // Kalau belum submit, ambil data subject berdasar ID
        $this->subject->open();
        $this->subject->getSubjectById($id);
        $data = $this->subject->getResult();
        $this->subject->close();

        include 'views/editSub.php';
    }

    //Fungsi untuk menghapus data
    public function deleteSubject($id)
    {
        $this->subject->open();
        $this->subject->deleteSubject($id);
        $this->subject->close();

        header("Location: index.php");
    }
}
