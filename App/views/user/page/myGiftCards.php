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
            <a style='text-decoration: none; color: inherit;' href='<?php echo ($_SESSION['role']) ? "#" : "#"; ?>'>
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


<div class="container" style="padding-top: 100px;">
    <h2>My Gift Cards</h2>
    
    <?php if(isset($giftcards) && is_array($giftcards) && count($giftcards) > 0): ?>
        <div class="row">
            <?php foreach($giftcards as $card): ?>
                <div class="col-md-4 mb-4">
                    <div class="card" style='width: 18rem;'>
                        <?php if(isset($card['image_path']) && $card['image_path']): ?>
                            <img src="<?= htmlspecialchars($card['image_path']) ?>" class="card-img-top" alt="Gift Card">
                        <?php else: ?>
                            <div class="card-img-top bg-light text-center py-5">No Image</div>
                        <?php endif; ?>
                        
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($card['platform_name'] ?? 'Unknown Platform') ?></h5>
                            <p class="card-text">
                                <strong>Code:</strong> <?= htmlspecialchars($card['code'] ?? 'N/A') ?><br>
                                <strong>Value:</strong> $<?= htmlspecialchars($card['value'] ?? '0.00') ?><br>
                                <strong>Purchase Date:</strong> <?= date('j  F , Y', strtotime($card['issued_at'] ?? 'N/A')) ?><br>
                                <strong>Status:</strong> 
                                <span class="badge <?= ($card['is_used'] ?? false) ? 'bg-secondary' : 'bg-success' ?>">
                                    <?= ($card['is_used'] ?? false) ? 'Used' : 'Available' ?>
                                </span>
                            </p>
                            
                            <?php if(!($card['is_used'] ?? false)): ?>
                                <button class="btn btn-primary" onclick="copyToClipboard('<?= htmlspecialchars($card['code'] ?? '') ?>')">
                                    Copy Code
                                </button>
                                
                                <a href="?controller=userController&action=markAsUsed&card_id=<?= htmlspecialchars($card['id'] ?? '') ?>" 
                                   class="btn btn-outline-secondary">
                                    Mark as Used
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="alert alert-info">
            <p>You don't have any gift cards yet.</p>
            <a href="?controller=userController&action=index" class="btn btn-primary">Browse Gift Cards</a>
        </div>
    <?php endif; ?>
</div>

<script>
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(function() {
        alert("Code copied to clipboard!");
    }, function() {
        alert("Failed to copy code");
    });
}
</script>

</body>
</html>