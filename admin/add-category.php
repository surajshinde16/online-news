
<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add New Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat" class="form-control" placeholder="Category Name" required>
                      </div>
                      <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                  </form>
                  <!-- /Form End -->
              </div>
          </div>
      </div>
  </div>
  <?php
    if( isset($_POST['save']) ){
        // database configuration
        include 'config.php';
        $category =pg_escape_string($conn, $_POST['cat']);
        /* query for check input value exists in category table or not*/
        $sql = "SELECT category_name FROM category where category_name='{$category}'";
        $result = pg_query($conn, $sql);
        if (pg_num_rows($result)> 0) {
            // if input value exists
            echo "<p style = 'color:red;text-align:center;margin: 10px 0';> Category already exists.</p>";
        }else{
            // if input value not exists
             /* query for insert record in category name */
            $sql = "INSERT INTO category (category_name)
                    VALUES ('{$category}')";

            if (pg_query($conn, $sql)){
                header("Location:http://localhost/news_project/admin/category.php");
            }else{
              echo "<p style = 'color:red;text-align:center;margin: 10px 0';>Query Failed.</p>";
            }
        }
    }

    include "footer.php";
  ?>



<!-- php 

include "header.php";

if(isset($_POST['save'])&&!empty($_POST['save']))
{

include "config.php";

$category_name=pg_escape_string($conn,$_POST['cat']);

    
  $sql = "insert into public.category(category_name)values('".$_POST['category_name']."')";

  $result = pg_query($conn, $sql) or die("Query Failed");

    if($result){
           header("Location:http://localhost/news_project/admin/category.php");
    }else{
        
            echo "Soething Went Wrong";
    }
}

?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add New Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <form action="" method="POST" autocomplete="off">
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="category_name" class="form-control" placeholder="Category Name" required>
                      </div>
                      <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                  </form>
              </div>
          </div>
      </div>
  </div>
 -->
