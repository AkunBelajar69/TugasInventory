<?php
include_once 'app/models/GudangModel.php';
include_once 'config/db_config.php';

class GudangController {
    private $GudangModel;
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->GudangModel = new GudangModel($this->db);
    }

    public function index() {
        $data_gudang = $this->GudangModel->getAll();
        include 'app/view/gudang/index.php';
    }

    public function tambah() {
        include 'app/view/gudang/tambah.php';
    }

    public function tambahProses() {
        if ($_POST) {
            $nama_gudang = $_POST['nama_gudang'];
            $lokasi = $_POST['lokasi'];

            if (!empty($nama_gudang) && !empty($lokasi)) {
                $this->GudangModel->create($nama_gudang, $lokasi);
                $_SESSION['success_msg'] = "Berhasil Tambah Gudang!";
            }
        }
        header("Location: index.php?act=gudang");
        exit;
    }

    public function edit() {
        $id = isset($_GET['id']) ? $_GET['id'] : die('Error: id kosong');
        $gudang = $this->GudangModel->getById($id);
        include 'app/view/gudang/edit.php';
    }

    public function editProses() {
        if ($_POST) {
            $id = $_POST['id'];
            $nama_gudang = $_POST['nama_gudang'];
            $lokasi = $_POST['lokasi'];

            if (!empty($nama_gudang) && !empty($id)) {
                $this->GudangModel->update($id, $nama_gudang, $lokasi);
                $_SESSION['success_msg'] = "Berhasil Edit Gudang";
            }
        }
        header("Location: index.php?act=gudang");
        exit;
    }

    public function hapus() {
        if (isset($_GET['id'])) {
            $this->GudangModel->delete($_GET['id']);
            $_SESSION['success_msg'] = "Berhasil Hapus Gudang";
        }
        header("Location: index.php?act=gudang");
        exit;
    }
}
?>
