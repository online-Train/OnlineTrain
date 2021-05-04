<?php include('db_connect.php');?>

<?php 
 
 
//require_once 'C:/xampp/htdocs/TRS/twilio-php-main/src/Twilio/autoload.php'; 
//require_once '/path/to/vendor/autoload.php'; 
 
// use Twilio\Rest\Client; 
 
// if(isset($_POST['send'])){
// 	$sid    = "AC82f8e62b54c133bb25bedbc1c740d2ba"; 
// 	$token  = "0548a005c3286574536d5ac02dfe335f"; 
// 	$twilio = new Client($sid, $token); 
 
// 	$message = $twilio->messages 
//                   	->create("whatsapp:+94760442947", // to 
//                   	         array( 
//                   	             "from" => "whatsapp:+14155238886",       
//                   	             "body" => "Your Twilio code is 1238432" 
//                    	        ) 
//                  	 ); 
 
// 	print($message->sid);
// }

//?>


<style>
	input[type=checkbox]
{
  /* Double-sized Checkboxes */
  -ms-transform: scale(1.3); /* IE */
  -moz-transform: scale(1.3); /* FF */
  -webkit-transform: scale(1.3); /* Safari and Chrome */
  -o-transform: scale(1.3); /* Opera */
  transform: scale(1.3);
  padding: 10px;
  cursor:pointer;
}
</style>
<div class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row mb-4 mt-4">
			<div class="col-md-12">
				
			</div>
		</div>
		<div class="row">
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<b>List of Routes and Fees</b>
						<span class="float:right"><a class="btn btn-primary btn-block btn-sm col-sm-2 float-right" href="javascript:void(0)" id="new_course">
					<i class="fa fa-plus"></i> New Route
				</a></span>
					
					</div>
					<div class="card-body">
						<table class="table table-condensed table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="">Route/Class</th>
									<th class="">Description</th>
									<th class="">Total Fee</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$course = $conn->query("SELECT * FROM courses  order by course asc ");
								while($row=$course->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td>
										<p> <b><?php echo $row['course'] . " - " . $row['level'] ?></b></p>
									</td>
									<td class="">
										 <p><small><i><b><?php echo $row['description'] ?></i></small></p>
									</td>
									<td class="text-right">
										<p> <b><?php echo number_format($row['total_amount'],2) ?></b></p>
									</td>
									<td class="text-center">
										<button class="btn btn-sm btn-outline-primary edit_course" type="button" data-id="<?php echo $row['id'] ?>" >Edit</button>
										<button class="btn btn-sm btn-outline-danger delete_course" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>

									</td>
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	

</div>
<style>
	
	td{
		vertical-align: middle !important;
	}
	td p{
		margin: unset
	}
	img{
		max-width:100px;
		max-height: :150px;
	}
</style>
<script>
	$(document).ready(function(){
		$('table').dataTable()
	})
	$('#new_route').click(function(){
		uni_modal("New Route and Fees Entry","manage_route.php",'large')
		
	})

	$('.edit_route').click(function(){
		uni_modal("Manage Route and Fees Entry","manage_route.php?id="+$(this).attr('data-id'),'large')
		
	})
	$('.delete_route').click(function(){
		_conf("Are you sure to delete this Route?","delete_route",[$(this).attr('data-id')])
	})
	
	function delete_route($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_route',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>