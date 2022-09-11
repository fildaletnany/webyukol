<?php 
    session_start();
    include "db.php";

    $_SESSION['sesh_result_count'] = 0;
    $result_count = 0;

    $data = [
        ":ID_user" => $_SESSION['ID_user']
    ];
    $sql = "SELECT * FROM tri_posts WHERE ID_user = :ID_user";
    $sql_prov = $db->prepare($sql);
    $result = $sql_prov->execute($data);
    $fetched_array = $sql_prov->fetchAll(PDO::FETCH_ASSOC);
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Admin - users</title>
        <link rel="stylesheet" type="text/css" href="https://zrostfi21.sps-prosek.cz/mysql/ukol/css/bootstrap/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="https://zrostfi21.sps-prosek.cz/mysql/ukol/css/css.css">
    </head>
    <body>
        <header class="p-3 mb-3 border-bottom bg-light">
            <div class="container">
                <div class="d-flex justify-content-center">
                    <a class="d-flex align-items-center mb-2 mb-lg-0 bg-light text-decoration-none border rounded p-2 mx-2" href="https://zrostfi21.sps-prosek.cz/mysql/ukol/admin/admin_users.php">Users</a>
                    <a class="d-flex align-items-center mb-2 mb-lg-0 bg-primary text-light text-decoration-none rounded p-2 mx-2" href="https://zrostfi21.sps-prosek.cz/mysql/ukol/admin/admin_posts.php">Posts</a>
                    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 mx-2" role="search" action="admin_search_users.php" method="post">
                        <input type="search"class="form-control" type="search" name="search" placeholder="Search users...">
                    </form>
                </div>
            </div>
        </header>
        <div class="container"> 
            <?php
                foreach ($fetched_array as $value) {
                    $result_count = $result_count + 1;
                        $_SESSION['sesh_result_count'] = $result_count;
                        echo "<div class='container border rounded py-2 my-2'>
                            <div class='content-cell-headline d-flex justify-content-between'>
                                <p class='d-flex align-items-center'><strong>".$value['post_name']."</strong></p>
                                <p class='d-flex align-items-center'>posted by ID_user".$value['ID_user']."</p>
                            </div>
                            <div class='content-cell-body'>
                                <p>".$value['post_message']."</p>
                            </div>
                            <div class='content-cell-body d-flex justify-content-between'>
                                <p class='text-secondary'>Date of creation: ".$value[('date')]."</p>
                                <a href='https://zrostfi21.sps-prosek.cz/mysql/ukol/post_system/edit_post.php/?ID_entry=".$value['ID_entry']."'>Edit</a>
                            </div>
                        </div>";
                }
                if ($result_count = 0) {
                    echo "ksdvkjgsv";
                    echo "<div class='container><p>No posts yet :(</p></div>";
                }
            ?>
        </div>
    </body>
</html>

<?php
/*  $time_at_login = time();
    if (time()-$time_at_login > 3600 ) {
        session_destroy();
    }*/
?>