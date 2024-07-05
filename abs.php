<?php 
session_start();
require 'file/connection.php';
if(isset($_GET['search'])){
    $searchKey = $_GET['search'];
    $sql = "select iteminfo.*, farmer.* from iteminfo, farmer where iteminfo.fid=farmer.id && bg='$searchKey'";
}else{
    $sql = "select iteminfo.*, farmer.* from iteminfo, farmer where iteminfo.fid=farmer.id";
}
$result = mysqli_query ($conn, $sql);
?>

<!DOCTYPE html>
<html>
<?php $title="Agro Farm | Available items"; ?>
<?php require 'head.php'; ?>
<style>
    body{
    background: linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75)),url(image/backgroundimgage.jpg);
    background-size: cover;
    min-height: 0;
    height: 900px;
  }
.login-form{
    width: calc(100% - 20px);
    max-height: 650px;
    max-width: 450px;
    background-color: white;
}
</style>
<body>
    <?php require 'header.php'; ?>
    <div class="container cont">
        
        <?php require 'message.php'; ?>
        
        <div class="row col-lg-8 col-md-8 col-sm-12 mb-3">
            <form method="get" action="" style="margin-top:-20px; " style="color:white">
            <label class="font-weight-bolder" style="color:white">Select Item:</label>
               <select name="search" class="form-control">
               <option><?php echo @$_GET['search']; ?></option>
               <option value="Paddy">Paddy</option>
                <option value="Wheat">Wheat</option>
                <option value="Ragi">Ragi</option>
                <option value="Millets">Millets</option>
                <option value="Green Gram">Green Gram</option>
                <option value="Red Gram">Red Gram</option>
                <option value="Corn">Corn</option>
                <option value="Jowra">Jowar</option>
               </select><br>
               <a href="abs.php" class="btn btn-info mr-4"> Reset</a>
               <input type="submit" name="submit" class="btn btn-info" value="search">
           </form>
        </div>

        <table class="table table-responsive table-striped rounded mb-5">
            <tr style="color:white"><th colspan="7" class="title">Available Items</th></tr>
            <tr style="color:white">
                <th>#</th>
                <th>Farmer Name</th>
                <th>Farmer City</th>
                <th>Farmer Email</th>
                <th>Farmer Phone</th>
                <th>Item Name</th>
                <th>Action</th>
            </tr>

            <div>
                <?php
                if ($result) {
                    $row =mysqli_num_rows( $result);
                    if ($row) { //echo "<b> Total ".$row." </b>";
                }else echo '<b style="color:white;background-color:red;padding:7px;border-radius: 15px 50px;">Nothing to show.</b>';
            }
            ?>
            </div>

        <?php while($row = mysqli_fetch_array($result)) { ?>

            <tr style="color:white">
                <td><?php echo ++$counter;?></td>
                <td><?php echo $row['fname'];?></td>
                <td><?php echo ($row['fcity']); ?></td>
                <td><?php echo ($row['femail']); ?></td>
                <td><?php echo ($row['fphone']); ?></td>
                <td><?php echo ($row['bg']); ?></td>

                <?php $bid= $row['bid'];?>
                <?php $fid= $row['fid'];?>
                <?php $bg= $row['bg'];?>
                <form action="file/request.php" method="post">
                    <input type="hidden" name="bid" value="<?php echo $bid; ?>">
                    <input type="hidden" name="fid" value="<?php echo $fid; ?>">
                    <input type="hidden" name="bg" value="<?php echo $bg; ?>">

                <?php if (isset($_SESSION['fid'])) { ?>
                <td><a href="javascript:void(0);" class="btn btn-info hospital">Request Item</a></td>
                <?php } else {(isset($_SESSION['cid']))  ?>
                <td><input type="submit" name="request" class="btn btn-info" value="Request Item"></td>
                <?php } ?>
                
                </form>
            </tr>

        <?php } ?>
        </table>
    </div>
    <?php require 'footer.php' ?>
</body>

<script type="text/javascript">
    $('.hospital').on('click', function(){
        alert("Farmer can't request for items.");
    });
</script>