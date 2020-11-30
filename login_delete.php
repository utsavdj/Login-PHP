<?php include "db.php"; ?>
<?php include "functions.php"; ?>
<?php deleteData(); ?>

<?php include "includes/header.php"; ?>
   <div class="container">
      <div class="col-xs-6">
         <form action="login_delete.php" method="post">
             <h1 class="text-center">Delete</h1>
            <div class="form-group">
               <label for="username">Username</label>
               <input type="text" name="username" class="form-control">
            </div>
            <div class="form-group">
               <label for="password">Password</label>
               <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
               <select name="id" id="" class="form-control" style="width: 150px">
                  <option hidden>Select ID</option>
                  <?php
                     showAllData();
                  ?>
               </select>
            </div>
            <input type="submit" value="Delete" name="submit" class="btn btn-primary">
         </form>
      </div>
   </div>
<?php include "includes/footer.php"; ?>


