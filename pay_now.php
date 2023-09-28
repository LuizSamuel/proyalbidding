<?php 
include('db_connect.php');
$bid_id = $_REQUEST['id'];
$query = $conn->query("SELECT * FROM `bids` WHERE `id` = '$bid_id'") or die(mysqli_error());
$row = $query->fetch_array();
$amount = $row['bid_amount'];
$user_id = $row['user_id'];
$user_query = $conn->query("SELECT * FROM `users` WHERE `id` = '$user_id'") or die(mysqli_error());
$user_row = $user_query->fetch_array();
$phone_number = $user_row['contact'];
include 'payherokenya-sps-main/global.php';

//prepare an array that will contain your account details and payment details.
$data=array(
        'api_key' =>"",//provide api keyhere
        'username'=>"",//provide username here
        'amount'=>"$amount",//provide amount here
        'phone'=>$phone_number,//provide phone number here
        'user_reference'=>"",//provide user reference here
        'channel_id'=>"",//provide channel id
    );
  
$jdata=json_encode($data);
$response=sendRequest("https://payherokenya.com/sps/portal/app/external_express",$jdata);
// print_r($response);
// //Thats it hit send and we will take care of the rest
//     echo '<script>
//     window.alert("An MPESA STK has been sent to your mobile handset, check and provide PIN to complete transaction.");
//     </script>';
// ?>
<div class="col-md-4">
            <form action="" id="manage-payment">
                <div class="card">
                    <div class="card-header">
                            Payment Form
                    </div>
                    <div class="card-body">
                            <input type="hidden" name="id">
                            <div class="form-group">
                                <label class="control-label">Transaction Code</label>
                                <input type="text" class="form-control" name="transaction_code" required="">
                                <input type="hidden" class="form-control" name="amount" value='<?php echo $amount; ?>'>
                                <input type="hidden" class="form-control" name="user_id" value='<?php echo $user_id; ?>'>
                                <input type="hidden" class="form-control" name="bid_id" value='<?php echo $bid_id; ?>'>
                            </div>
                    </div>
                            
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-sm btn-primary col-sm-3 offset-md-3"> Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <script>
    
    $('#manage-payment').submit(function(e){
        e.preventDefault()
        start_load()
        $.ajax({
            url:'admin/ajax.php?action=save_payment',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success:function(resp){
                if(resp==1){
                    alert_toast("Payment Made successfully",'success')
                    setTimeout(function(){
                        location.href = "index.php?page=payments"
                    },1500)

                }
            }
        })
    })
</script>