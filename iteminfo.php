<?php 
  require 'file/connection.php';
  session_start();
  if(!isset($_SESSION['fid']))
  {
  header('location:login.php');
  }
  else {
?>
<!DOCTYPE html>
<html>
<?php $title="Agro Farm | Add Items samples"; ?>
<?php require 'head.php'; ?>
<style>
    body{
    background: linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75)),url(image/backgroundimgage.jpg) no-repeat center;
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
  <?php require 'header1.php'; ?>

    <div class="container cont">

      <?php require 'message.php'; ?>

      <div class="row justify-content-center">
          
         <div class="col-lg-4 col-md-5 col-sm-6 col-xs-7 mb-5">
          <div class="card">
            <div class="card-header title">Add crops available</div>
        <div class="card-body">
        <form action="file/infoAdd.php" method="post">
          <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" title="click to see">Term & conditions. </a><br>
          <div class="collapse" id="collapseExample">
          <br><br>
        </div>
          <input type="checkbox" name="condition" value="agree" required> Agree<br><br>
          <select class="form-control" name="bg" required="">
                
                <option >Paddy</option>
                <option >Maize</option>
                <option >Bajra</option>
                <option >Wheat</option>
                <option >Ragi</option>
                <option >Millets</option>
                <option >Green Gram</option>
                <option >Red Gram</option>
                <option >Corn</option>
                <option >Jowra</option>
          </select><br>
          <input type="submit" name="add" value="Add" class="btn btn-primary btn-block"><br>
          <a href="hospitalpage.html" class="text-centre" >Cancel</a><br>
        </form>
         </div>
       </div>
     </div>

<?php   if(isset($_SESSION['fid'])){
    $fid=$_SESSION['fid'];
    $sql = "select * from iteminfo where fid='$fid'";
    $result = mysqli_query($conn, $sql);
  }
  ?>
    <div class="col-lg-4 col-md-5 col-sm-6 col-xs-7 mb-5">
          <table style="color:white" class="table table-striped table-responsive">
            <th colspan="4" class="title" style="color:white">List of added items</th>
            <tr style="color:white">
              <th>#</th>

              <th>Items</th>
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
            <tr>
              <td><?php echo ++$counter; ?></td>

              <td><?php echo $row['bg'];?></td>
              <td><a href="file/delete.php?bid=<?php echo $row['bid'];?>" class="btn btn-danger">Delete</a></td>
            </tr>
            <?php } ?>
          </table>
      </div>

   </div>
</div>
<?php require 'footer.php' ?>
</body>
<?php } ?>