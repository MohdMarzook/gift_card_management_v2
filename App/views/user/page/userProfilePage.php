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
            <a style="text-decoration: none; color: white;" href="?controller=userController">
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