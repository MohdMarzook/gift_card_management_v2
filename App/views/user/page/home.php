<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://kit.fontawesome.com/9e0958114b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="http://localhost/projectMVC/App/views/user/assets/css/index.css">

    <title>Home - page</title>
</head>

<body>

    <div class="navbar">
        <div class="logo">
            <a style="text-decoration: none; color: white;" href="./index.php">
                <i class="fa-solid fa-vault"></i>
                <span>𝔾𝕚𝕗𝕥𝕍𝕒𝕦𝕝𝕥</span>
            </a>
        </div>
        <div class="navlink">
            <button class="btn btn-dark" type="button">
                <a style="text-decoration: none; color: inherit;" href="?controller=userController&action=myGiftCards">
                    <i class="bi bi-gift"></i> My GiftCards
                </a>
            </button>
            <button class="btn btn-dark" type="button">
                <i class="fa-solid fa-circle-user"></i>
                <a style='text-decoration: none; color: inherit;' href='<?php echo ($_SESSION['role'] == "admin") ? "?." : "?controller=userController&action=userProfile"; ?>'>
                    <?php
                    echo ($_SESSION['role'] == "admin") ? "you are admin" : "My Profile";
                    ?>
                </a>
            </button>
            <button class="btn btn-dark" type="button">
                <a style="text-decoration: none; color: inherit;" href="?controller=authController&action=logout">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </a>
            </button>

        </div>
    </div>
    <div class="content">
        <div class="sidebar">
            <div class="filters">
                <h3><strong>Filters</strong></h3>
                <div class="category-filter">
                    <h4>Filter by Platform</h4>
                    <form action="?controller=userController&action=filterHandler" method="post">
                        <select style="width: 60%;" class="form-select" name="category" id="">
                            <option <?php (($_GET['category'] == 'all')) ? 'selected' : ''; ?> value="all">ALL</option>
                            <?php
                            foreach ($category as $item) {
                                echo '<option value="' . htmlspecialchars($item) . '"' . (isset($_GET['category']) && $_GET['category'] == $item ? ' selected' : '') . '>' . htmlspecialchars($item) . '</option>';
                            }
                            ?>
                        </select>
                        <button class='btn btn-primary' type='submit'>Select</button>
                    </form>
                </div>
                <div class="platform-filter">


                    <form action="?controller=userController&action=filterHandler" method="post">
                        <h4> Select the Platforms</h4>
                        <?php
                        foreach ($platforms as $platform) {
                            $simple_text = htmlspecialchars($platform);
                            // echo "<input  type='checkbox' name='$platform' id='$platform'>";
                            echo '<input type="checkbox" name="' . $platform . '" id="' . $simple_text . '" value="' . $platform . '"' . (isset($_GET["selected"]) && in_array($platform, explode(",", $_GET['selected'])) ? ' checked' : '') . '>';
                            echo "<label for='$simple_text'>$platform</label> <br>";
                        }

                        echo "<button class='btn btn-primary' name='platform-filter' value='{$_GET['category']}' type='submit'>Submit</button>"
                        ?>

                    </form>

                </div>
            </div>
        </div>
        <div class="right-section">
            <div class="main-content">
                <div class="filtered">



                    <?php
                    function print_data($given_data)
                    {
                        foreach ($given_data as $data) {
                            $data['platform_name'] = ucfirst($data['platform_name']);
                            echo "<div class='card' style='width: 18rem;'>
                                        <img src='" . htmlspecialchars($data['img_data']['path']) . "' class='card-img-top' alt='card template design'>
                                        <div class='card-body'>
                                            <h5 class='card-title'>{$data['platform_name']}</h5>
                                            <p class='card-text'>This card can be purchased for the range of 10-1000</p>
                                            <div style='display: flex; justify-content: space-between ; align-items: center;'>
                                                <a href='.?controller=usercontroller&action=cardInfo&card={$data['platform_id']}&temp_id=1' class='btn btn-primary'>Buy</a> 
                                                <strong>$10 - $1000</strong>
                                            </div>
                                        </div>
                                    </div>";
                        }
                        echo "</div>";
                    }
                    if (isset($cards)) {

                        echo "<div class='heading'>
                            <h3>Category :{$_GET['category']}</h3>
                            </div>";
                        echo "<div class='cards_area'>";
                        print_data($cards);
                        echo "</div>";
                    }

                    ?>
                    <div class="rows">
                        <h4>Current Offers</h4>
                        <div class="category-carousel">
                            <div class="carousel-track">
                                <?php
                                for ($i = 0; $i < 10; $i++) {
                                    echo "<div class='card' style='width: 18rem;'>
                                    <img src='./public/default_platform_templates/temp_img.png' class='card-img-top' alt='card template design'>
                                    <div class='card-body'>
                                    <h5 class='card-title'>Card Type</h5>
                                    <p class='card-text'>This is used for fashion things</p>
                                    <div style='display: flex; justify-content: space-between ; align-items: center;'>
                                    <a href='#' class='btn btn-primary'>Buy</a> 
                                    <strong>$1000</strong>
                                    </div>
                                    </div>
                                    </div>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="rows">
                        <h4>Festival Offers</h4>
                        <div class="category-carousel">
                            <div class="carousel-track">
                                <?php
                                for ($i = 0; $i < 10; $i++) {
                                    echo "<div class='card' style='width: 18rem;'>
                                    <img src='./public/default_platform_templates/temp2_img.jpg' class='card-img-top' alt='card template design'>
                                    <div class='card-body'>
                                    <h5 class='card-title'>Card Type</h5>
                                    <p class='card-text'>This is used for fashion things</p>
                                    <div style='display: flex; justify-content: space-between ; align-items: center;'>
                                    <a href='#' class='btn btn-primary'>Buy</a> 
                                    <strong>$1000</strong>
                                    </div>
                                    </div>
                                    </div>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>