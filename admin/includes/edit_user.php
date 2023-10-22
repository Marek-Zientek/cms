<?php

if (isset($_GET['edit_user'])) {
    $the_user_id = $_GET['edit_user'];


    $query_users = "SELECT * FROM users WHERE user_id = {$the_user_id}";
    $select_query_users = mysqli_query($connection, $query_users);
    confirmQuery($select_query_users);

    while ($row = mysqli_fetch_assoc($select_query_users)) {
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_role = $row['user_role'];
        $user_password = $row['user_password'];
        $user_image = $row['user_image'];
    }
}
if (isset($_POST['edit_user'])) {
    $username = $_POST['username'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];

    $user_image = $_FILES['user_image']['name'];
    $user_image_temp = $_FILES['user_image']['tmp_name'];
    $user_password = $_POST['user_password'];

    // $post_date = date("d-m-y");
    // $post_comment_count = 4;


    move_uploaded_file($user_image_temp, "../images/user_images/$user_image");

    if (empty($user_image)) {
        $query = "SELECT * FROM users WHERE user_id = {$user_id}";

        $select_image = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_array($select_image)) {
            $user_image = $row['user_image'];
        }
    }

    $query = "UPDATE users SET ";
    $query .= "username = '{$username}', ";
    $query .= "user_firstname = '{$user_firstname}', ";
    $query .= "user_lastname = '{$user_lastname}', ";
    $query .= "user_email = '{$user_email}', ";
    $query .= "user_image = '{$user_image}', ";
    $query .= "user_password = '{$user_password}' ";
    $query .= "WHERE  user_id = {$user_id}";



    $update_user = mysqli_query($connection, $query);

    confirmQuery($update_user);
}

?>


<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" value="<?= $username; ?>">
    </div>
    <div class="form-group">
        <select name="user_role" id="user_role">
            <option value="subscriber"><?= $user_role ?></option>
            <?php

            if ($user_role == 'admin') {
                echo "<option value=\"subscriber\">subscriber</option>";
            } else {
                echo "<option value=\"admin\">admin</option>";
            }

            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="user_firstname">First Name</label>
        <input type="text" class="form-control" name="user_firstname" value="<?= $user_firstname; ?>">
    </div>
    <div class="form-group">
        <label for="user_lastname">Last Name</label>
        <input type="text" class="form-control" name="user_lastname" value="<?= $user_lastname; ?>">
    </div>
    <div class="form-group">
        <label for="user_email">User Email</label>
        <input type="email" class="form-control" name="user_email" value="<?= $user_email; ?>">
    </div>
    <div class="form-group">
        <label for="user_image">User image</label>
        <input type="file" class="form-control" name="user_image">
        <img width="100" src="../images/user_images/<?= $user_image; ?>" alt="images">
    </div>
    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" class="form-control" name="user_password" value="<?= $user_password; ?>">
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_user" value="Edit User">
    </div>

</form>