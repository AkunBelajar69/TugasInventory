<style>
.sidebar{
    position:fixed;
    top:60px;
    left:0;
    width:230px;
    height:100%;
    background:white;
    box-shadow:2px 0 10px rgba(0,0,0,0.05);
    padding-top:20px;
}

.side-nav{
    list-style:none;
}

.side-nav li{
    margin:8px 10px;
}

.side-btn{
    display:block;
    padding:12px 18px;
    border-radius:10px;
    text-decoration:none;
    color:#444;
    font-weight:500;
    transition:0.2s;
}

.side-btn:hover{
    background:#FFF3CD;
}

.side-btn.active{
    background:#F7B267;
    color:white;
}

</style>
<div class="sidebar">
    <ul class="side-nav">
        <li><a href="index.php?act=inventory" class="side-btn <?= ($_GET['act'] ?? 'inventory') == 'inventory' ? 'active' : '' ?>">Data Barang</a></li>
        <li><a href="index.php?act=gudang" class="side-btn <?= ($_GET['act'] ?? '') == 'gudang' ? 'active' : '' ?>">Data Gudang</a></li>
        <li><a href="index.php?act=vendor" class="side-btn <?= ($_GET['act'] ?? '') == 'vendor' ? 'active' : '' ?>">Data Vendor</a></li>
        <li><a href="index.php?act=admin" class="side-btn <?= ($_GET['act'] ?? '') == 'admin' ? 'active' : '' ?>">Data Admin</a></li>
    </ul>
</div>
