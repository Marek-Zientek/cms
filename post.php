<?php
include "./includes/db.php";
include "./includes/header.php";
include "./includes/navigation.php";

?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <?php

            if (isset($_GET['post_id'])) {
                $the_post_id = $_GET['post_id'];
            }
            $query = "SELECT * FROM posts WHERE post_id = {$the_post_id}";
            $select_all_posts_query = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_array($select_all_posts_query)) {
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];

            ?>

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?= $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?= $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?= $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?= $post_image ?>" alt="">
                <hr>
                <p><?= $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
            <?php
            }


            ?>



            <!-- Blog Comments -->

            <?php

            if (isset($_POST['create_comment'])) {
                $the_post_id = $_GET['post_id'];

                $comment_author = htmlentities($_POST['comment_author']);
                $comment_email = htmlentities($_POST['comment_email']);
                $comment_content = htmlentities($_POST['comment_content']);

                $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) ";
                $query .= "VALUES ({$the_post_id}, '{$comment_author}', '{$comment_email}', '{$comment_content}', 'unapprove', now()) ";

                $create_comment_query = mysqli_query($connection, $query);

                if (!$create_comment_query) {
                    die("QUERY FAILED " . mysqli_error($connection));
                }
            }

            ?>

            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form role="form" method="post">
                    <div class="form-group">
                        <label for="auhor">Author name :</label>
                        <input type="text" class="form-control" name="comment_author">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" name="comment_email">
                    </div>
                    <div class="form-group">
                        <label for="comment">Comment :</label>
                        <textarea class="form-control" name="comment_content" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="create_comment">Submit</button>
                </form>
            </div>

            <hr>

            <!-- Posted Comments -->
            <?php


            $query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
            $query .= "AND comment_status = 'approve' ";
            $query .= "ORDER BY comment_id DESC ";

            $select_comment_query = mysqli_query($connection, $query);

            if (!$select_comment_query) {
                die('Query Failed' . mysqli_error($connection));
            }

            while ($row = mysqli_fetch_assoc($select_comment_query)) {
                $comment_date = $row['comment_date'];
                $comment_content = $row['comment_content'];
                $comment_author = $row['comment_author'];

            ?>

                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?= $comment_author; ?>
                            <small><?= $comment_date; ?></small>
                        </h4>
                        <?= $comment_content; ?>
                    </div>
                </div>



            <?php } ?>


            <!-- Comment -->


        </div>

        <?php require "includes/sidebar.php"; ?>

    </div>
    <!-- /.row -->

    <hr>

    <?php include "includes/footer.php"; ?>