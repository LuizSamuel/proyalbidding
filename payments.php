<?php include('db_connect.php');?>

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
						<b>Payment List</b>
						<span class="float:right"><a class="btn btn-primary btn-block btn-sm col-sm-2 float-right" href="payment_report.php" id="payment_report">
					<i class="fa fa-print"></i> Print Report
				</a></span>
					</div>
					<div class="card-body">
						<table class="table table-condensed table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="">Product</th>
									<th class="">Name</th>
									<th class="">Amount</th>
									<th class="">Transaction Code</th>
									<th class="">Date</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$session_user_id = $_SESSION['login_id'];
								$i = 1;
								$cat = array();
								$cat[] = '';
								$qry = $conn->query("SELECT * FROM categories ");
								while($row = $qry->fetch_assoc()){
									$cat[$row['id']] = $row['name'];
								}
								$books = $conn->query("SELECT py.*, b.*, u.name as uname,p.name,p.bid_end_datetime bdt FROM payments py inner join bids b on b.id = py.bid_id inner join users u on u.id = b.user_id inner join products p on p.id = b.product_id WHERE u.id = $session_user_id ");
								while($row=$books->fetch_assoc()):
									$get = $conn->query("SELECT * FROM bids where product_id = {$row['product_id']} order by bid_amount desc limit 1 ");
									$uid = $get->num_rows > 0 ? $get->fetch_array()['user_id'] : 0 ;
									$bid_id = $row['id'];
									$payment_status = $row['payment_status'];
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="">
										 <p> <b><?php echo ucwords($row['name']) ?></b></p>
									</td>
									<td class="">
										 <p> <b><?php echo ucwords($row['uname']) ?></b></p>
									</td>
									<td class="text-right">
										 <p> <b><?php echo number_format($row['amount'],2) ?></b></p>
									</td>
									<td class="text-center">
										 <p> <b><?php echo ucwords($row['transaction_code']) ?></b></p>
									</td>
									<td class="text-center">
										<p> <b><?php echo $row['date']; ?></b></p>
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
	
	$('.view_user').click(function(){
		uni_modal("<i class'fa fa-card-id'></i> Buyer Details","view_udet.php?id="+$(this).attr('data-id'))
		
	})
	$('#new_book').click(function(){
		uni_modal("New Book","manage_booking.php","mid-large")
		
	})
	$('.edit_book').click(function(){
		uni_modal("Manage Book Details","manage_booking.php?id="+$(this).attr('data-id'),"mid-large")
		
	})
	$('.delete_book').click(function(){
		_conf("Are you sure to delete this book?","delete_book",[$(this).attr('data-id')])
	})

	$('.pay_now').click(function(){
		location.href ="index.php?page=pay_now&id="+$(this).attr('data-id')
		
	})
	
	function delete_book($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_book',
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