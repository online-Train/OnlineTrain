
<style>
	.collapse a{
		text-indent:10px;
	}
	nav#sidebar{
		/*background: url(assets/uploads/<?php echo $_SESSION['system']['cover_img'] ?>) !important*/
	}
</style>

<nav id="sidebar" class='mx-lt-5 bg-dark' >
		
		<div class="sidebar-list">
				<a href="train_booking_index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-tachometer-alt "></i></span> Dashboard</a>
				<a href="train_booking_index.php?page=fees" class="nav-item nav-fees"><span class='icon-field'><i class="fa fa-money-check "></i></span>  Make a Booking </a>
				<a href="train_booking_index.php?page=payments" class="nav-item nav-payments"><span class='icon-field'><i class="fa fa-receipt "></i></span> Confirm a Booking</a>
				<div class="mx-2 text-white">Admin Panel</div>
				<a href="train_booking_index.php?page=routes" class="nav-item nav-courses"><span class='icon-field'><i class="fa fa-scroll "></i></span> Train Routes & Fees</a>
				<a href="train_booking_index.php?page=customers" class="nav-item nav-students"><span class='icon-field'><i class="fa fa-users "></i></span> Customer Information</a>
				<div class="mx-2 text-white">Report</div>
				<a href="train_booking_index.php?page=payments_report" class="nav-item nav-payments_report"><span class='icon-field'><i class="fa fa-th-list"></i></span> Payments Report</a>
				<div class="mx-2 text-white">Systems</div>
				<?php if($_SESSION['login_type'] == 1): ?>
				<a href="train_booking_index.php?page=users" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-users "></i></span> Users Profile Settings</a>
				<!-- <a href="train_booking_index.php?page=site_settings" class="nav-item nav-site_settings"><span class='icon-field'><i class="fa fa-cogs"></i></span> System Settings</a> -->
			<?php endif; ?>
		</div>

</nav>
<script>
	$('.nav_collapse').click(function(){
		console.log($(this).attr('href'))
		$($(this).attr('href')).collapse()
	})
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
