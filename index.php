<?php
    session_start();

    include_once 'app/controllers/InventoryController.php';
    include_once 'app/controllers/GudangController.php';
    include_once 'app/controllers/VendorController.php';
    include_once 'app/controllers/AdminController.php';

    $action = isset($_GET['act']) ? $_GET['act'] : 'inventory';
    $inventoryController = new InventoryController();
    $gudangController = new GudangController();
    $vendorController = new VendorController();
    $adminController = new AdminController();

    switch ($action) {

    case 'inventory':
        $inventoryController->index();
        break;

    case 'inventory-tambah':
        $inventoryController->tambah();
        break;

    case 'inventory-tambah-proses':
        $inventoryController->tambahProses();
        break;

    case 'inventory-detail':
        $inventoryController->detail();
        break;

    case 'inventory-edit':
        $inventoryController->edit();
        break;

    case 'inventory-edit-proses':
        $inventoryController->editProses();
        break;

    case 'inventory-hapus':
        $inventoryController->hapus();
        break;

    case 'gudang':
        $gudangController->index();
        break;

    case 'gudang-tambah':
        $gudangController->tambah();
        break;

    case 'gudang-tambah-proses':
        $gudangController->tambahProses();
        break;

    case 'gudang-edit':
        $gudangController->edit();
        break;

    case 'gudang-edit-proses':
        $gudangController->editProses();
        break;

    case 'gudang-hapus':
        $gudangController->hapus();
        break;

    case 'vendor':
        $vendorController->index();
        break;

    case 'vendor-tambah':
        $vendorController->tambah();
        break;

    case 'vendor-tambah-proses':
        $vendorController->tambahProses();
        break;

    case 'vendor-edit':
        $vendorController->edit();
        break;

    case 'vendor-edit-proses':
        $vendorController->editProses();
        break;

    case 'vendor-hapus':
        $vendorController->hapus();
        break;

    case 'admin':
        $adminController->index();
        break;

    case 'admin-tambah':
        $adminController->tambah();
        break;

    case 'admin-tambah-proses':
        $adminController->tambahProses();
        break;

    case 'admin-edit':
        $adminController->edit();
        break;

    case 'admin-edit-proses':
        $adminController->editProses();
        break;

    case 'admin-hapus':
        $adminController->hapus();
        break;

    default:
        $inventoryController->index();
        break;
    }
?>
