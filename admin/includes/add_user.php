<?php
// include "../functions.php";

if (isset($_POST['create_user'])) {
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    $username = $_POST['username'];

    $user_image = $_FILES['user_image']['name'];
    $user_image_temp = $_FILES['user_image']['tmp_name'];

    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    // $user_date = date("d-m-y");



    move_uploaded_file($user_image_temp, "../images/user_images/$user_image");


    $query = "INSERT INTO users(user_firstname, user_lastname, user_role, username, user_image, user_email, user_password) ";

    $query .= "VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}', '{$user_image}', '{$user_email}','{$user_password}' )";

    $create_post_query = mysqli_query($connection, $query);

    confirmQuery($create_post_query);

    echo "User Created: " . " " . "<a href='users.php'>View Users</a>";
}

?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="firstname">First Name</label>
        <input type="text" id="firstname" class="form-control" name="user_firstname">
    </div>
    <div class="form-group">
        <label for="lastname">Last Name</label>
        <input type="text" id="lastname" class="form-control" name="user_lastname">
    </div>
    <div class="form-group">
        <select name="user_role" id="user_role">
            <option value="subscriber">--- Select Option ----</option>
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>

        </select>
    </div>
    <div class="form-group">
        <label for="username">UserName</label>
        <input type="text" id="username" class="form-control" name="username">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" class="form-control" name="user_email" required>
    </div>
    <div class="form-group">
        <label for="user_image">Use image</label>
        <input type="file" class="form-control" name="user_image">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" class="form-control" name="user_password">
    </div>
    <!-- <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea name="post_content" class="form-control" cols="30" rows="10"></textarea>
    </div> -->
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
    </div>

</form>