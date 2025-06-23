<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gift Card App - Sign Up</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">   
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>

    <!-- for bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> 
</head>

<body>
    <div class="container">
        <div class="card">
        <div class="errors">
            <?php
                if(!empty($errors)){
                    foreach($errors as $error){
                        echo "<div class='alert alert-warning' role='alert'>
                            $error
                        </div>";
                    }
                }
            ?>
        </div>
            <h2>User Sign-Up</h2>
            <form action="?controller=authController&action=signupHandler" method="post">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username">
                    <label for="floatingInput">User name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="form-floating mb-4">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Retype Password" name="re_password">
                    <label for="floatingPassword">Repeat Password</label>
                </div>
                <div class="d-grid col-6 mx-auto">
                    <button class="btn btn-primary btn-lg" name="submit" value="submit" type="submit">Submit</button>
                </div>
                <div class="alert alert-light" role="alert">
                    <p>if you already have a account <a href="login.php">Click here..</a></p>
                </div>
            </form>
        </div>
       
    </div>
 
</body>
<style>
    body{
        padding: 0px;
        margin: 0px;
        box-sizing: border-box; 
    }
    .container{
        width: 75%;
        padding: 20px
    }
    .container > .card , .container > .errors{
        width: 50%;
        margin: auto;
        margin-top: 10%;
        padding: 30px;
        box-shadow: rgba(0, 0, 0, 0.09) 0px 2px 1px, rgba(0, 0, 0, 0.09) 0px 4px 2px, rgba(0, 0, 0, 0.09) 0px 8px 4px, rgba(0, 0, 0, 0.09) 0px 16px 8px, rgba(0, 0, 0, 0.09) 0px 32px 16px;
    }
</style>
</html>