<?php 
include 'admin/db_connect.php'; 
?>
<style>
    body{
        background-color: slategray;
    }


.contaix{
    background-color: red;
}
.col-lg-12 {
    flex: 10px 0 100%;
    max-width: 100%;
    background-color: slategray;
    position: relative;
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
}
.row {
  display: flex;
  flex-wrap: wrap;
  margin-right: -15px;
  margin-left: -15px;
  color: chocolate;
/*  background-color: skyblue;*/
font-weight: 500;
}
.col-md-3{
    position: relative;
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    background-color: slategray;
}
.card-header{
    background-color: silver;
    text-align: center;
    font-size: 1.9rem;
}


    .list-group-item:hover{
        color: gold;
    }
    #cat-list li{
        cursor: pointer;
        color: black;
    }
       #cat-list li:hover {
        color: white;
        background: red;
    }
    .prod-item p{
        margin: unset;
        color: black;
    }
    
    .bid-tag {
        position: absolute;
        left: -0.07em;
        top: -0.25em;
        
    }
    .badge-primary {
        color: #fff;
        background-color: #007bff;
        border-radius: 5px;
}
    .list-group-item{
        background-color: silver;
        cursor: pointer;
    }
    .rere{
        background-color: gold;
    }
    .nuvita{
        color: burlywood;
    }










</style>
<?php 
$cid = isset($_GET['category_id']) ? $_GET['category_id'] : 0;
?>
<body>
<div class="contaix">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Categories</div>
                    <div class="card-body"> <!--style/styles.css doesn't affect home and veiwpages-->
                        <ul class='list-group' id='cat-list'>
                             <?php if(isset($_SESSION['login_id'])): ?>
                             <li class='list-group-item nuvita' class="rere" data-href="users.php?page=homeuser">Dashboard</li>
                             <?php endif; ?>
                                                     <select class="custom-select select2" id="select-opt">
                          <?php
                                $cat = $conn->query("SELECT * FROM categories order by name asc");
                                while($row=$cat->fetch_assoc()):
                                    $cat_arr[$row['id']] = $row['name'];
                             ?>
                             <option value="">Search Categories</option>
    <option value="index.php?page=home&category_id=<?php echo $row['id'] ?>"><?php echo ucwords($row['name']) ?></option>
    <?php endwhile; ?>
</select>
                            <li class='list-group-item'  data-href="index.php?page=home">All</li>

                            
                            <?php
                                $cat = $conn->query("SELECT * FROM categories order by name asc");
                                while($row=$cat->fetch_assoc()):
                                    $cat_arr[$row['id']] = $row['name'];
                             ?>
                            <li class='list-group-item' data-id='<?php echo $row['id'] ?>' data-href="index.php?page=home&category_id=<?php echo $row['id'] ?>"><?php echo ucwords($row['name']) ?></li>

                            <?php endwhile; ?>
                        </ul>

                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <?php
                                $where = "";
                                if($cid > 0){
                                    $where  = " and category_id =$cid ";
                                }
                                $cat = $conn->query("SELECT * FROM products where unix_timestamp(bid_end_datetime) >= ".strtotime(date("Y-m-d H:i"))." $where order by name asc");
                                if($cat->num_rows <= 0){
                                    echo "<h4><i>No Available Product.</i></h4>";
                                } 
                                while($row=$cat->fetch_assoc()):
                             ?>
                             <div class="col-sm-4">
                                 <div class="card">
                                    <div class="float-right align-top bid-tag">
                                         <span class="badge badge-pill badge-primary text-white"><i class="fa fa-tag"></i> <?php echo number_format($row['start_bid']) ?></span>
                                     </div>
                                     <img class="card-img-top" src="admin/assets/uploads/<?php echo $row['img_fname'] ?>" alt="Card image cap">
                                      <div class="float-right align-top d-flex">
                                         <span class="badge badge-pill badge-warning text-white"><i class="fa fa-hourglass-half"></i> <?php echo date("M d,Y h:i A",strtotime($row['bid_end_datetime'])) ?></span>
                                     </div>
                                     <div class="card-body prod-item">
                                         <p><?php echo $row['name'] ?></p>
                                         <p><small><?php echo $cat_arr[$row['category_id']] ?></small></p>
                                         <p class="truncate"><?php echo $row['description'] ?></p>
                                        <button class="btn btn-primary btn-sm view_prod" type="button" data-id="<?php echo $row['id'] ?>"> View</button>
                                     </div>
                                 </div>
                             </div>
                            <?php endwhile; ?>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
       
<script>
    $('#cat-list li').click(function(){
        location.href = $(this).attr('data-href')
    })
     $('#cat-list li').each(function(){
        var id = '<?php echo $cid > 0 ? $cid : 'all' ?>';
        if(id == $(this).attr('data-id')){
            $(this).addClass('active')
        }
    })
     $('.view_prod').click(function(){
        uni_modal_right('Product Showcase','view_prod.php?id='+$(this).attr('data-id'))
     })

      $(document).on('change', '#select-opt', function (e) {
        var value = $(this).val();
        window.location.href=value;
    });
    $('.select2').select2({
    placeholder:"Search Categories",
    width: "100%"
  })
</script>
</body>