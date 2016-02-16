	<div class="navbar">
		<div class="navbar-inner">
			<div class="container">
				<a class="brand" href="#"><img src='favicon.ico' height='16px' width='16px'/></a>
				<div class="nav-collapse">
					<ul class="nav">
						<li><a href="index.php">Home</a></li>
						<li><a href="film_list.php">List Film</a></li>
						<?php
							session_start();
							if(isset($_SESSION['level'])){
							if(($_SESSION['level'])<2)
							{
							echo"
							<li><a href='film_index.php'>Manage Film</a></li>
						<li><a href='jadwal_index.php'>Manage Jadwal Film</a></li>";}}?>
						<li><a href='jadwal_list.php'>List Jadwal</a></li>
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Teater<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="jadwal_teater.php?kode=31">Teater 1</a></li>
								<li><a href="jadwal_teater.php?kode=32">Teater 2</a></li>
								<li><a href="jadwal_teater.php?kode=33">Teater 3</a></li>
								<li><a href="jadwal_teater.php?kode=34">Teater 4</a></li>
								<li><a href="jadwal_teater.php?kode=35">Teater 5</a></li>
								<li><a href="jadwal_teater.php?kode=36">Teater 6</a></li>
								<li><a href="jadwal_teater.php?kode=37">Teater 7</a></li>
								<li><a href="jadwal_teater.php?kode=38">Teater 8</a></li>
								<li><a href="jadwal_teater.php?kode=39">Teater 9</a></li>
							</ul>
						</li>
						<!--<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="film_index.php">Manage Film</a></li>
								<li><a href="jadwal_index.php">Manage Jadwal Film</a></li>
							</ul>
						</li>-->
						<?php
							if(!isset($_SESSION['user']))
							{
							  echo"<li><a href='login.php'>Login</a></li>";
							}
							else
							{
							  echo"<li><a href='logout.php'>Logout (".$_SESSION['user'].")</a></li>";
							}
						?>
						
					</ul>
				</div>
			</div>
		</div>
	</div>
	
<!--<div class="navbar">
 <div class="navbar-inner">
 <div class="container">
 <ul class="nav">
 <li class="active"><a href="#">Home</a></li>
 <li class="dropdown">
 <a href="#" class="dropdown-toggle" data-toggle="dropdown">
 <i class="icon-th-large"></i>Projects
 <b class="caret"></b>
 </a>

 <ul class="dropdown-menu">
 <li><a href="#">Item1</a></li>
 <li><a href="#">Item2</a></li>
 <li><a href="#">Item3</a></li>
 </ul>
 </li>
 <li><a href="#">Services</a></li>
 <li><a href="#">Downloads</a></li>
 <li><a href="#">About</a></li>
 <li><a href="#">Contact</a></li>
 </ul>
 </div>
 </div>
 </div>
<!-- Javascript files harus ditaruh di bawah untuk meningkatkan performa web -->
 <script src="js/bootstrap.js"></script>