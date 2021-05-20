<?php include "header.php"; 
 
if(isset($_POST['submit']))
{

include "config.php";
$userid=pg_escape_string($conn,$_POST['user_id']);
$fname=pg_escape_string($conn,$_POST['f_name']);
$lname=pg_escape_string($conn,$_POST['l_name']);
$user=pg_escape_string($conn,$_POST['username']);
$role=pg_escape_string($conn,$_POST['role']);
    
  $sql = "UPDATE users SET first_name='{$fname}',last_name='{$lname}',username='{$user}',role='{$role}' WHERE user_id={$userid}";

  // $result = pg_query($conn, $sql) or die("Query Failed");

    if(pg_query($conn,$sql)){
        
             header("Location:http://localhost/news_project/admin/users.php");
    }
}

?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
              <div class="col-md-offset-4 col-md-4">
                <?php 
                  include 'config.php';

                  $user_id = $_GET['id'];
                  $sql = "SELECT * FROM users WHERE user_id = {$user_id}";
                  $result = pg_query($conn, $sql) or die("Query Failed.");
                  if (pg_num_rows($result)>0) {
                    while ($row= pg_fetch_assoc($result)) {

                 ?>
                  <!-- Form Start -->
                  <form  action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="user_id"  class="form-control" value="<?php echo $row['user_id']; ?>" placeholder="" >
                      </div>
                          <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="f_name" class="form-control" value="<?php echo $row['first_name']; ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="l_name" class="form-control" value="<?php echo $row['last_name']; ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" value="<?php echo $row['role']; ?>">
                               <?php
                              if($row['role'] != 0){
                                echo "<option value='0'> Journalist</option>
                                      <option value='1' selected>Admin</option>";
                              }else{
                                echo "<option value='0' selected>Journalist</option>
                                      <option value='1'>Admin</option>";
                              }
                            ?>
                          </select>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                  <!-- /Form -->
                  <?php 
                    }
                  }
                   ?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
