<?php 
session_start();
require 'file/connection.php';
if(isset($_GET['search'])){
    $searchKey = $_GET['search'];
    $sql = "select jobinfo.*, farmer.* from jobinfo, farmer where jobinfo.fid=farmer.id && bg='$searchKey'";
}else{
    $sql = "select jobinfo.*, farmer.* from jobinfo, farmer where jobinfo.fid=farmer.id";
}
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<?php $title="Agro Farm | Available works"; ?>
<?php require 'head.php'; ?><style>
    body{
    background:linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75)),url(image/backgroundimgage.jpg);
    background-size: cover;
    min-height: 0;
    height: 100%;
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
            <form method="get" action="" style="margin-top:-20px; ">
            <label class="font-weight-bolder" style="color:white">Select Job Name:</label>
               <select name="search" class="form-control">
               <option><?php echo @$_GET['search']; ?></option>
               <option value="Watering">Watering</option>
                <option value="Sowing">Sowing</option>
                <option value="Cleaning">Cleaning</option>
                
                <option value="Harvesting">Harvesting</option>
                <option value="Ploughing">Ploughing</option>
                
               </select><br>
               <a href="deleteit.php" class="btn btn-info mr-4"> Reset</a>
               <input type="submit" name="submit" class="btn btn-info" value="search">
           </form>
        </div>

        <table class="table table-responsive table-striped rounded mb-5">
            <tr style="color:white"><th colspan="7" class="title">Available Jobs</th></tr>
            <tr style="color:white">
                <th>#</th>
                <th>Farmer Name</th>
                <th>Farmer City</th>
                <th>Farmer Email</th>
                <th>Farmer Phone</th>
                <th>Job Type</th>
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

                <?php $bdid= $row['bdid'];?>
                <?php $fid= $row['fid'];?>
                <?php $bg= $row['bg'];?>
                <form action="file/requestd.php" method="post">
                    <input type="hidden" name="bdid" value="<?php echo $bdid; ?>">
                    <input type="hidden" name="fid" value="<?php echo $fid; ?>">
                    <input type="hidden" name="bg" value="<?php echo $bg; ?>">
                    

                <?php if (isset($_SESSION['fid'])) { ?>
                <td><a href="javascript:void(0);" class="btn btn-info hospital">Request for job</a></td>
                <?php } else {(isset($_SESSION['cid']))  ?>
                <td><input type="submit" name="request" class="btn btn-info" value="Request Job"></td>
                <?php } ?>
                
                </form>
            </tr>

        <?php } ?>
        </table>
    </div>
       
    <?php require 'footer.php' ?>
</body>
<script type="text/javascript">
    $('.customers').on('click', function(){
        alert("Farmer can't request for jobs.");
    });
</script>
</html>
