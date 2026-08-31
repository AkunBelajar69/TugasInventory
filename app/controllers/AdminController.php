<?php
include_once 'app/models/AdminModel.php';
include_once 'app/models/InventoryModel.php';
include_once 'config/db_config.php';

class AdminController {
    private $AdminModel;
    private $InventoryModel;
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->AdminModel = new AdminModel($this->db);
        $this->InventoryModel = new InventoryModel($this->db);
    }

    public function index() {
        $data_admin = $this->AdminModel->getAll();
        // barang yang stoknya habis, dipakai buat kasih alert ke admin
        $stok_habis = $this->InventoryModel->getStokHabis();
        include 'app/view/admin/index.php';
    }

    public function tambah() {
        include 'app/view/admin/tambah.php';
    }

    public function tambahProses() {
        if ($_POST) {
            $nama = $_POST['nama'];
            $kontak = $_POST['kontak'];
            $email = $_POST['email'];

            if (!empty($nama) && !empty($email)) {
                $this->AdminModel->create($nama, $kontak, $email);
                $_SESSION['success_msg'] = "Berhasil Tambah Admin!";
            }
        }
        header("Location: index.php?act=admin");
        exit;
    }

    public function edit() {
        $id = isset($_GET['id']) ? $_GET['id'] : die('Error: id kosong');
        $admin = $this->AdminModel->getById($id);
        include 'app/view/admin/edit.php';
    }

    public function editProses() {
        if ($_POST) {
            $id = $_POST['id'];
            $nama = $_POST['nama'];
            $kontak = $_POST['kontak'];
            $email = $_POST['email'];

            if (!empty($nama) && !empty($id)) {
                $this->AdminModel->update($id, $nama, $kontak, $email);
                $_SESSION['success_msg'] = "Berhasil Edit Admin";
            }
        }
        header("Location: index.php?act=admin");
        exit;
    }

    public function hapus() {
        if (isset($_GET['id'])) {
            $this->AdminModel->delete($_GET['id']);
            $_SESSION['success_msg'] = "Berhasil Hapus Admin";
        }
        header("Location: index.php?act=admin");
        exit;
    }
}
?>
