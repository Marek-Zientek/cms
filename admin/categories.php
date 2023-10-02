<?php
include "includes/admin_header.php";



?>

<div id="wrapper">

    <?php include "includes/admin_navigation.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to Admin
                        <small>Author</small>
                    </h1>

                    <div class="col-xs-6">

                        <?php insert_categories(); ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat_title">Add category</label>
                                <input type="text" class="form-control" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-primary" value="Add category">
                            </div>
                        </form>


                        <?php

                        if (isset($_GET['edit'])) {
                            $cat_id = $_GET['edit'];
                            include "includes/update_categories.php";
                        }
                        ?>



                    </div> <!-- Add Category Form -->

                    <div class="col-xs-6">
                        <?php



                        ?>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php // find all categories
                                $query = "SELECT * FROM categories";
                                $select_categories  = mysqli_query($connection, $query);

                                while ($row = mysqli_fetch_array($select_categories)) {
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];
                                ?>
                                    <tr>
                                        <td><?= $cat_id ?></td>
                                        <td><?= $cat_title ?></td>
                                        <td><a class="btn btn-danger" href="categories.php?delete=<?= $cat_id ?>">DELETE</a></td>
                                        <td><a class="btn btn-warning" href="categories.php?edit=<?= $cat_id ?>">EDIT</a></td>
                                    </tr>
                                <?php
                                }

                                ?>

                                <?php


                                if (isset($_GET['delete'])) {
                                    $the_cat_id = $_GET['delete'];
                                    $query = "DELETE FROM categories WHERE cat_id = {$cat_id}";
                                    $delete_query = mysqli_query($connection, $query);
                                    header("Location: categories.php");
                                }


                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    <?php include "includes/admin_footer.php"; ?>