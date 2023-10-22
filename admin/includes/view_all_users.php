<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>username</th>
            <th>firstName</th>
            <th>lastName</th>
            <th>email</th>
            <th>User image</th>
            <th>role</th>
            <th>date</th>

        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM users";
        $select_posts = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_posts)) {
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];


            echo "<tr>";
            echo "<td>{$user_id}</td>";
            echo "<td>{$username}</td>";
            echo "<td>{$user_firstname}</td>";
            echo "<td>{$user_lastname}</td>";
            echo "<td>{$user_email}</td>";
            echo "<td><img class=\"img-responsive\" style=\"width:100px; height:100px;\" src=\"../images/user_images/{$user_image}\" alt=\"\"></td>";
            echo "<td>{$user_role}</td>";

            // $query = "SELECT * FROM posts where post_id = {$comment_post_id}";
            // $select_post_title = mysqli_query($connection, $query);
            // while ($row = mysqli_fetch_assoc($select_post_title)) {
            //     $post_title = $row['post_title'];
            //     $post_id = $row['post_id'];
            // }
            // echo "<td> <a href=\"../post.php?post_id={$post_id}\">{$post_title}</a></td>";

            // echo "<td>{$comment_date}</td>";
            echo "<td><a class=\"btn btn-success\" href=\"users.php?change_to_admin={$user_id}\">Admin</a></td>";
            echo "<td><a class=\"btn btn-danger\" href=\"users.php?change_to_subscriber={$user_id}\">Subscriber</a></td>";
            echo "<td><a class=\"btn btn-danger\" href=\"users.php?delete={$user_id}\">Delete user</a></td>";
            echo "<td><a class=\"btn btn-warning\" href=\"users.php?source=edit_user&edit_user={$user_id}\">Edit user</a></td>";
            echo "</tr>";
        }



        ?>

    </tbody>
</table>


<?php


if (isset($_GET['change_to_admin'])) {
    $the_user_id = $_GET['change_to_admin'];

    $query = "UPDATE users SET user_role = 'admin' WHERE user_id = {$the_user_id} ";
    $change_to_admin = mysqli_query($connection, $query);
    confirmQuery($change_to_admin);
    header("Location: users.php");
}


if (isset($_GET['change_to_subscriber'])) {
    $the_user_id = $_GET['change_to_subscriber'];

    $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = {$the_user_id} ";
    $change_sub_query = mysqli_query($connection, $query);
    confirmQuery($change_sub_query);
    header("Location: users.php");
}




if (isset($_GET['delete'])) {
    $the_user_id = $_GET['delete'];

    $query = "DELETE FROM users WHERE user_id = {$the_user_id}";
    $delete_user_query = mysqli_query($connection, $query);
    confirmQuery($delete_user_query);
    header("Location: users.php");
}

?>