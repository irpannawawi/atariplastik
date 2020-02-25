<?php require 'template/header.php'; ?>
<?php require 'template/sidebar.php'; ?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Users</a></li>
              <li class="breadcrumb-item active">List</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->




<section>
	<?=!empty($_SESSION['status'])?"<div class=\"alert alert-success\">".$_SESSION['status']."</div>":''?>
	<table border="1" class="table table-bordered table-striped table-hover">
		<tr>
			<th>No</th>
			<th>Username</th>
			<th>Email</th>
			<th>Role</th>
			<th>Password</th>
			<th>Aksi</th>
		</tr>

		<?php $n =0; foreach($users as $row ){ $n++;?>
			<tr>
				<td><?=$n?></td>
				<td><?=$row->username?></td>
				<td><?=$row->email?></td>
				<td><?=$row->role?></td>
				<td><?=$row->password?></td>
				<td>
					<a href="<?=site_url('admin/edit_user/'.$row->id_user)?>" class="btn btn-warning">Edit</a>
					<a href="<?=site_url('user/delete/'.$row->id_user)?>" class="btn btn-danger">Hapus</a>
				</td>
			</tr>
		<?php } ?>
	</table>
</section>





	
	





<?php require 'template/footer.php'; ?>














<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <script>
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' });
  } );
  </script>
</head>
<body>
	<h1>Welccome <?=$_SESSION['role']." ".$_SESSION['username']; ?> </h1>
<div>
	<ul>
		<li><a href="<?=site_url('admin/input_barang_masuk')?>">input_barang_masuk</a></li>
		<li><a href="<?=site_url('admin/input_lokasi')?>">input_lokasi</a></li>
		<li><a href="<?=site_url('admin/input_satuan')?>">input_satuan</a></li>
		<li><a href="<?=site_url('admin/barang_masuk')?>">barang_masuk</a></li>
		<li><a href="<?=site_url('admin/barang_keluar')?>">barang_keluar</a></li>
		<li><a href="<?=site_url('admin/profil')?>">profil</a></li>
		<li><a href="<?=site_url('admin/users')?>">users</a></li>
	</ul>
</div>
<h1>Tabel Users</h1>
<h3>Showing <?=$jumlah_user?> user data from the database</h3>
<?=!empty($_SESSION['status'])?$_SESSION['status']:''?>
	<br>
	<a href="<?=site_url('admin/adduser')?>">Tambah</a>
	<table border="1">
		
	</table>


	
</body>
</html>