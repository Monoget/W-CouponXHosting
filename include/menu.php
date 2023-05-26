<header class="bg-dark">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="Home"><img src="assets/images/logo/logo.png" class="img-fluid"
                                                         alt="" style="max-height:80px"/></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page" href="Savings">Savings</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" role="button" data-bs-toggle="dropdown"
                               aria-expanded="false">
                                Store
                            </a>
                            <ul class="dropdown-menu multi-level">
                                <?php
                                $category_data = $db_handle->runQuery("SELECT * FROM category where status=1 order by id asc");
                                $row_count = $db_handle->numRows("SELECT * FROM category where status=1 order by id asc");

                                for ($i = 0; $i < $row_count; $i++) {
                                    ?>
                                    <li class="dropdown-submenu">
                                        <a href="Category/<?php echo str_replace(" ", "-", $category_data[$i]["c_name"]); ?>" class="dropdown-item dropdown-toggle"
                                           data-toggle="dropdown"><?php echo $category_data[$i]["c_name"]; ?></a>
                                        <ul class="dropdown-menu">
                                            <?php
                                            $id=$category_data[$i]["id"];

                                            $store_data = $db_handle->runQuery("SELECT * FROM store where category_id={$id} and status=1 order by id asc");
                                            $row = $db_handle->numRows("SELECT * FROM store where category_id={$id} and status=1 order by id asc");

                                            for ($j = 0; $j < $row; $j++) {
                                                ?>
                                                <li><a href="Stores/<?php echo str_replace(" ", "-", $store_data[$j]["s_name"]); ?>" class="dropdown-item"><?php echo $store_data[$j]["s_name"]; ?></a></li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="Offer">Offer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="Blog">Blog</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-light" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </div>
</header>