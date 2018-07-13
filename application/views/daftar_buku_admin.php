<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Daftar Buku</title>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
	 <div class="container">
  <nav class="navbar navbar-inverse" role="navigation">
  	<div class="container-fluid">
  		<!-- Brand and toggle get grouped for better mobile display -->
  		<div class="navbar-header">
  			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
  				<span class="sr-only">Toggle navigation</span>
  				<span class="icon-bar"></span>
  				<span class="icon-bar"></span>
  				<span class="icon-bar"></span>
  			</button>
  			<a class="navbar-brand" href="#">Daftar Buku</a>
  		</div>
  
  		<!-- Collect the nav links, forms, and other content for toggling -->
  		<div class="collapse navbar-collapse navbar-ex1-collapse">
  			<ul class="nav navbar-nav">
  				<li class="active"><a href="<?php echo site_url()?>/daftar_buku_admin">Daftar Buku</a></li>
          <li class="active"><a href="<?php echo site_url()?>/home">Home</a></li>
          
          
  			</ul>


  			<ul class="nav navbar-nav navbar-right">
  				<li class="dropdown">
  					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
  					<ul class="dropdown-menu">
  						<li><a href="#">Action</a></li>
  						<li><a href="#">Another action</a></li>
  						<li><a href="#">Something else here</a></li>
  						<li><a href="#">Separated link</a></li>
  					</ul>
  				</li>
  			</ul>
  		</div><!-- /.navbar-collapse -->
  	</div>
  </nav>
  
  	<div class="container">
  		<h1>Daftar Buku</h1>
  	</div>
  </div>
		
					<table class="table table-hover">
						<thead>
							<tr>
						<th>Id</th>		
						<th>Nama</th>
						<th>Keterangan</th>
            <th>Tanggal_Pengembalian</th>
						<th>Action</th>
					</tr>
							</thead>
						<tbody>

						<?php foreach ($daftar_buku_list as $key => $value): ?>
            <tr>
              <td><?php echo $value['id'] ?></td>
              <td><?php echo $value['nama'] ?></td>
              <td><?php echo $value['keterangan'] ?></td>
              <td><?php echo $value['tanggal'] ?></td>
              <td><?php echo $value['harga'] ?></td>
              <td>
                <a href="<?php echo site_url()?>/perpustakaan"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Edit</button></a>
              </td>
            </tr>
            
          <?php endforeach ?>
							</tbody>
					</table>
</div>
</body>
<p>
        <a href="<?php echo base_url("index.php/perpustakaan/create/ ")?>"><button type="button" class="btn btn-info">
      <span class="glyphicon glyphicon-plus"></span> TAMBAH DATA
    </button></a>
      </p>

    
</html>