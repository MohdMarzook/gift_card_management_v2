<?php
// if(!isset($_GET["card"]) || !isset($_GET["temp_id"])){
//     header("Location:index.php");
//     exit;
// }
// function checkGivenToUser($conn, $email){
//     $email = mysqli_real_escape_string($conn, $email);
//     $query = "select * from users where emailid= '$email'";
//     mysqli_query($conn, $query);
//     if(mysqli_affected_rows($conn) > 0){
//         return true;
//     }
//     else{
//         return false;
//     }
// }

// function get_templates($conn){
//     $query = "select * from templates where name != 'default'";
//     $temp_data = mysqli_fetch_all(mysqli_query($conn, $query),MYSQLI_ASSOC);
//     return $temp_data;
// }
// $temp_data = get_templates($connection);

// function get_card_data($conn, $id){
//     $query = "select * from platforms where platform_id = '$id'";
//     $data = mysqli_query($conn, $query);
//     $data = mysqli_fetch_all($data, MYSQLI_ASSOC)[0];
//     $query = "select * from templates where temp_id='{$data['template']}'";
//     $img_data = mysqli_fetch_all(mysqli_query($conn, $query), MYSQLI_ASSOC)[0];
//     $data["img_data"] = $img_data;
//     return $data;
// }
// if(isset($_GET['card'])){
//     $card_data = get_card_data($connection, $_GET['card']);
//     // print_r($card_data);
// }

// if(isset($_POST['submit'])){
//     // print_r($_POST);
//     $errors = [];
//     if(!checkGivenToUser($connection, $_POST['email'])){
//         $errors[] = "Recivers Email not found"; 
//     }
//     if(($_POST['value'] < 99) || ($_POST['value'] > 10001)){
//         $errors[] = "Invalid Amount Entered";
//     }
//     if(empty($errors)){

//         $issued_at = date('Y-m-d H:i:s'); 
//         $expire_at = date('Y-m-d H:i:s', strtotime('+1 year'));
//         $query = "insert into gift_cards (value, code, platform_id, given_to, given_by, template_id, expire_at) values ";
//         $values = "('{$_POST['value']}', '{$_POST['code']}', '{$_POST['platform_id']}', '{$_POST['given_to']}', '{$_POST['given_by']}', '{$_POST['template_id']}', '{$expire_at}')";    
//         // print_r("card has bought");

//     }
//     // mysqli_query($connection, $query.$values);
//     // header("Location:my_cards.php");
// }


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9e0958114b.js" crossorigin="anonymous"></script>   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>

    <!-- for bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="dashboard-style.css">
    <title>Order - Processing</title>
</head>
<body>
    <div class="container">
        <a href="?controller=userController">
        <div class="back_button">
            <i class="bi bi-caret-left"></i>
        </div>
        </a>
        <div class="card">
        
            <div class="card_img">
                <h3><?php echo ucfirst($card_data['platform_name'])?> Gift Card</h3>
                <img src="
                <?php
                    $flag=true;
                        foreach($temp_data as $temp){
                            if($temp['temp_id'] == $_GET['temp_id']){
                                echo $temp['path'];
                                $flag=false;
                            }
                        }
                    if($flag){
                            echo $card_data['img_data']['path'];
                        }
                
                ?>
                " align="middle" width="480px"  alt="" style="border-radius: 18px;">
                <div>
                    <div class="heading"><h3>Templates</h3></div>
                    
                    <form action="" method="get">
                        <?php 
                            echo"<a href='?controller=usercontroller&action=cardInfo&card={$_GET['card']}&temp_id={$card_data['img_data']['temp_id']}'>";
                                echo "<img src='" . htmlspecialchars($card_data['img_data']['path']) . "' height='55px'>";
                            echo"</a>";
                            foreach($temp_data as $template){
                                echo"<a href='?controller=usercontroller&action=cardInfo&card={$_GET['card']}&temp_id={$template['temp_id']}'>";
                                    echo"<img src='".htmlspecialchars($template['path'])."' height='55px'>";
                                echo"</a>";
                            }
                        ?>
                    </form>
                    </div>
                </div>
            <div class="form">
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
                <h4 align='middle'>Enter the Details</h4>
                <form action="" method="post">
                    <div class="form-floating mb-3">
                        <input type="text" value="admin" class="form-control" id="name" placeholder="" required>
                        <label for="name">Reciver's Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" name="email" value="example@example.com" class="form-control" id="reciver_name" placeholder="" required>
                        <label for="reciver_name">Receiver's Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" value="100" name="value" min="100" max="1000" class="form-control" id="floatingInput" placeholder="" required>
                        <label for="floatingInput">Enter denomination</label>
                    </div>
                    <div class="code">
                        <label for="floatingInput">Code:</label>
                        <label class="form-control" for="">XXXX-XXXX-XXXX</label>                        
                    </div>
                    <?php
                        $bought_by = $_SESSION['user_id'];
                        echo "<div class='hidden_data'>
                                <input type='text' name='given_by' value='$bought_by'>
                                <input type='text' name='platform_id' value='{$_GET['card']}'>
                                <input type='text' name='template_id' value='{$_GET['temp_id']}'>
                            </div>";
                        ?>
                            <div class="submit">
                        <button style="box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px; width: 100%; margin-top: 25px;" name="submit" value="submitted" type="submit" class="btn btn-dark">Buy</button>
                    </div>

                </form>

                <div>   
                    <div class="alert alert-success" role="alert" style="display: <?php echo ((isset($success) && ($success)) ? 'block' : 'none'); ?>">
                        <i class="bi bi-check-circle-fill"></i> Card purchased successfully! The code will be sent to the recipient's email.
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
<style>
    body{
        margin: 0px;
        padding: 0px;
    }
    .card{
        display: flex;
        flex-direction: row ;
        margin: auto;
        margin-top: 70px;
        width: 980px;
        height: 580px;
        border: 1px solid rgba(59, 59, 59, 0.3);
        padding: 20px;
        border-radius: 20px;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
    }
    .form{
        padding-top: 20px;
        width: 50%;
        box-shadow: rgba(9, 30, 66, 0.25) 0px 1px 1px, rgba(9, 30, 66, 0.13) 0px 0px 1px 1px;
    }
    .form div{
        width: 80%;
        margin: auto;
    }
    .code {
        -webkit-user-select: none; 
        -ms-user-select: none; 
        user-select: none;
        filter: blur(1px);
    }
    .code  input {
        -webkit-user-select: none; 
        -ms-user-select: none;
        user-select: none;

    }
    .hidden_data{
        display: none;
    }
    .submit{
        margin: auto;
        margin-top: 30px;
        width: 80%;
    }

    .back_button{
        display: flex;
        align-items: center;
        justify-content: center;
        position: absolute;
        background: whitesmoke;
        border-radius: 50%;
        width: 55px;
        height: 55px;
        transition-duration: 0.2s;
        box-shadow: rgba(76, 89, 101, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px;
    }
    .back_button:hover{
        color: white;
        background-color: #1c1f23;
        box-shadow: rgba(0, 0, 0, 0.68) 7px 10px 35px 4px;
        transition-duration: 0.2s;
    }
    .errors{
        margin-bottom: 10px;
    }

</style>
</html>