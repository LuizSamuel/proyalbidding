<style>
	/* .logo {
    margin: auto;
    font-size: 20px;
    background: white;
    padding: 7px 11px;
    border-radius: 50% 50%;
    color: #000000b3;
} */
.luiz{
  padding: 0;
  min-height: 3.5rem;
  background: red;
}
.maze{
	padding: 30px;
	background-color: #03c04a;
}
</style>

<nav class="luiz">
  <div class="maze">
  	<div class="col-lg-12">
  		<div class="col-md-1 float-left">

  		</div>
      <div class="col-md-4 float-left text-white">
        <large><b><?php echo isset($_SESSION['system']['name']) ? $_SESSION['system']['name'] : '' ?></b></large>
      </div>





	  	<div class="float-right">
        <div class=" dropdown mr-4">
            <a href="#" class="text-white dropdown-toggle"  id="account_settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['login_name'] ?> </a>
              <div class="dropdown-menu" aria-labelledby="account_settings" style="left: -2.5em;">
                <a class="dropdown-item" href="javascript:void(0)" id="manage_my_account"><i class="fa fa-cog"></i> Manage Account</a>
                <a class="dropdown-item" href="ajax.php?action=logout"><i class="fa fa-power-off"></i> Logout</a>
                <!-- <a class="dropdown-item" href="index.php?page=home"><i class="fa fa-power-off"></i> Continue Bidding</a> -->
              </div>
        </div>
      </div>
  </div>

</nav>

<script>
  $('#manage_my_account').click(function(){
    uni_modal("Manage Account","manage_user.php?id=<?php echo $_SESSION['login_id'] ?>&mtype=own")
  })
</script>
