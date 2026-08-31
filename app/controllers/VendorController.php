<?php
include_once 'app/models/VendorModel.php';
include_once 'config/db_config.php';

class VendorController {
    private $VendorModel;
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->VendorModel = new VendorModel($this->db);
    }

    public function index() {
        $data_vendor = $this->VendorModel->getAll();
        include 'app/view/vendor/index.php';
    }

    public function tambah() {
        include 'app/view/vendor/tambah.php';
    }

    public function tambahProses() {
        if ($_POST) {
            $nama = $_POST['nama'];
            $kontak = $_POST['kontak'];
            $nama_barang = $_POST['nama_barang'];

            if (!empty($nama) && !empty($kontak)) {
                $this->VendorModel->create($nama, $kontak, $nama_barang);
                $_SESSION['success_msg'] = "Berhasil Tambah Vendor!";
            }
        }
        header("Location: index.php?act=vendor");
        exit;
    }

    public function edit() {
        $id = isset($_GET['id']) ? $_GET['id'] : die('Error: id kosong');
        $vendor = $this->VendorModel->getById($id);
        include 'app/view/vendor/edit.php';
    }

    public function editProses() {
        if ($_POST) {
            $id = $_POST['id'];
            $nama = $_POST['nama'];
            $kontak = $_POST['kontak'];
            $nama_barang = $_POST['nama_barang'];

            if (!empty($nama) && !empty($id)) {
                $this->VendorModel->update($id, $nama, $kontak, $nama_barang);
                $_SESSION['success_msg'] = "Berhasil Edit Vendor";
            }
        }
        header("Location: index.php?act=vendor");
        exit;
    }

    public function hapus() {
        if (isset($_GET['id'])) {
            $this->VendorModel->delete($_GET['id']);
            $_SESSION['success_msg'] = "Berhasil Hapus Vendor";
        }
        header("Location: index.php?act=vendor");
        exit;
    }
}
?>
