<?php require_once('partial/header.php');
    require_once ("database/database.php")

?>
    <?php 
        $students = selectAllStudents($db);
        foreach($students as $student) {
            if(isset($_GET['id']) && $_GET['id'] == $student['id']){
                $name = $student['name'];
                $age = $student['age'];
                $email =$student['email'];
                $profile = $student['profile'];
            }
        }

        
    ?>

    <div class="container p-4">
        <form action="update_model.php" method="post">
            <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" hidden>
                <input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo $name ?>">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" placeholder="Age" name="age" value="<?php echo $age ?>">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $email ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Image URL" name="image_url" value="<?php echo $profile ?>">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Update</button>
            </div>
        </form>
    </div>
<?php require_once('partial/footer.php'); ?>