<?php
include_once 'app/models/InventoryModel.php';
include_once 'app/models/GudangModel.php';
include_once 'app/models/VendorModel.php';
include_once 'config/db_config.php';

class InventoryController {
    private $InventoryModel;
    private $GudangModel;
    private $VendorModel;
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->InventoryModel = new InventoryModel($this->db);
        $this->GudangModel = new GudangModel($this->db);
        $this->VendorModel = new VendorModel($this->db);
    }

    public function index() {
        $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : null;
        $data_inventory = $this->InventoryModel->getAll($keyword);
        include 'app/view/inventory/index.php';
    }

    public function tambah() {
        $data_gudang = $this->GudangModel->getAll();
        $data_vendor = $this->VendorModel->getAll();
        include 'app/view/inventory/tambah.php';
    }

    public function tambahProses() {
        if ($_POST) {
            $nama_barang = $_POST['nama_barang'];
            $jenis_barang = $_POST['jenis_barang'];
            $kuantitas = $_POST['kuantitas'];
            $harga = $_POST['harga'];
            $serial_number = $_POST['serial_number'];
            $gudang_id = $_POST['gudang_id'];
            $vendor_id = $_POST['vendor_id'];

            if (!empty($nama_barang) && !empty($serial_number)) {
                $this->InventoryModel->create($nama_barang, $jenis_barang, $kuantitas, $harga, $serial_number, $gudang_id, $vendor_id);
                $_SESSION['success_msg'] = "Berhasil Tambah Barang!";
            }
        }
        header("Location: index.php?act=inventory");
        exit;
    }

    public function detail() {
        $id = isset($_GET['id']) ? $_GET['id'] : die('Error: id kosong');
        $barang = $this->InventoryModel->getById($id);
        include 'app/view/inventory/detail.php';
    }

    public function edit() {
        $id = isset($_GET['id']) ? $_GET['id'] : die('Error: id kosong');
        $barang = $this->InventoryModel->getById($id);
        $data_gudang = $this->GudangModel->getAll();
        $data_vendor = $this->VendorModel->getAll();
        include 'app/view/inventory/edit.php';
    }

    public function editProses() {
        if ($_POST) {
            $id = $_POST['id'];
            $nama_barang = $_POST['nama_barang'];
            $jenis_barang = $_POST['jenis_barang'];
            $kuantitas = $_POST['kuantitas'];
            $harga = $_POST['harga'];
            $serial_number = $_POST['serial_number'];
            $gudang_id = $_POST['gudang_id'];
            $vendor_id = $_POST['vendor_id'];

            if (!empty($nama_barang) && !empty($id)) {
                $this->InventoryModel->update($id, $nama_barang, $jenis_barang, $kuantitas, $harga, $serial_number, $gudang_id, $vendor_id);
                $_SESSION['success_msg'] = "Berhasil Edit Barang";
            }
        }
        header("Location: index.php?act=inventory");
        exit;
    }

    public function hapus() {
        if (isset($_GET['id'])) {
            $this->InventoryModel->delete($_GET['id']);
            $_SESSION['success_msg'] = "Berhasil Hapus Barang";
        }
        header("Location: index.php?act=inventory");
        exit;
    }
}
?>
