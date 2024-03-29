<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <div class="input-group">
            <form action="search.php" method="post">
                <input type="text" name="search" class="form-control">
                <span class="input-group-btn">
                    <button name="submit" class="btn btn-default" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>

        </div>
        </form>
        <!-- /.input-group -->
    </div>

    <!-- login form -->
    <div class="well">
        <h4>Log In</h4>

        <form action="includes/login.php" method="post">
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Enter your login">


            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="Enter password" class="form-control">
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit" name="login">
                        Submit
                    </button>
                </span>
            </div>


        </form>
        <!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    <div class="well">


        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    <?php

                    $query = "SELECT * FROM categories LIMIT 3";
                    $select_categories_query = mysqli_query($connection, $query);


                    while ($row = mysqli_fetch_array($select_categories_query)) {
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];

                        echo "<li><a href='category.php?category={$cat_id}'>{$cat_title}</a></li>";
                    }

                    ?>


                </ul>
            </div>
            <!-- /.col-lg-6 -->
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    <?php

                    $query = "SELECT * FROM categories LIMIT 3 OFFSET 3";
                    $select_categories_query = mysqli_query($connection, $query);


                    while ($row = mysqli_fetch_array($select_categories_query)) {
                        $cat_title = $row['cat_title'];
                        $cat_id = $row['cat_id'];
                        echo "<li><a href='category.php?category={$cat_id}'>{$cat_title}</a></li>";
                    }

                    ?>

                </ul>
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <?php include "widget.php"; ?>

</div>