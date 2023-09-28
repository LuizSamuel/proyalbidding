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
						<b>List of Bids</b>
					</div>
					<div class="card-body">
						<table class="table table-condensed table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="">Product</th>
									<th class="">Name</th>
									<th class="">Amount</th>
									<th class="">Status</th>
									<th class="">Payment Status</th>
									<th class="">Action</th>
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
								$books = $conn->query("SELECT b.*, u.name as uname,p.name,p.bid_end_datetime bdt FROM bids b inner join users u on u.id = b.user_id inner join products p on p.id = b.product_id WHERE u.id = $session_user_id ");
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
										 <p> <b><?php echo number_format($row['bid_amount'],2) ?></b></p>
									</td>
									<td class="text-center">
										<?php if($row['status'] == 1): ?>
										<?php if(strtotime(date('Y-m-d H:i')) < strtotime($row['bdt'])): ?>
										<span class="badge badge-secondary">Bidding Stage</span>
										<?php else: ?>
										<?php if($uid == $row['user_id']): ?>
										<span class="badge badge-success">Wins in Bidding</span>
										<?php else: ?>
										<span class="badge badge-secondary">Loose in Bidding</span>
										<?php endif; ?>
										<?php endif; ?>
										<?php elseif($row['status'] == 2): ?>
										<span class="badge badge-primary">Confirmed</span>
										<?php else: ?>
										<span class="badge badge-danger">Canceled</span>
										<?php endif; ?>
									</td>
									<td class="text-center">
										<?php if($payment_status == 1): ?>
										<span class="badge badge-success">Paid</span>
										<?php else: ?>
										<?php if($payment_status == 0): ?>
										<span class="badge badge-danger">Not Paid</span>
										<?php else: ?>
										<span class="badge badge-secondary">-</span>
										<?php endif; ?>
										<?php endif; ?>
									</td>
									<td>
										<!-- <button class="btn btn-primary btn-sm view_user" type="button" data-id ='<?php echo $row['user_id'] ?>'>View Buyer Details</button> -->
										<?php
										if ($row['status'] == 1 AND $payment_status == 0 AND $uid == $row['user_id'] AND strtotime(date('Y-m-d H:i')) > strtotime($row['bdt'])) {
											?>
											<button class="btn btn-sm btn-success pay_now" type="button" data-id="<?php echo $bid_id; ?>" >Pay Now</button>
											<?php
										} else {
										}
										?>
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