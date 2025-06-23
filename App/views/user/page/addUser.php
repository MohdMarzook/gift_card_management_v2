<?php


$editFlag = False;
if (isset($data['editUser']) && $data['editUser'] == true) {
    $editFlag = True;
}



?>

<div class="container">
    <div class="form">
        <form action="" method="post">
            <div class="form-group">
                <label for="name">Enter your name</label>
                <input name="name" class="form-control form-control" type="text" placeholder="" value="<?php echo $data['name'] ?? "" ?>">
            </div>
            <div class="form-group">
                <label for="name">Enter your Register No </label>
                <input name="regno" class="form-control form-control" type="number" min='999999999' max='9999999999' placeholder="" value="<?php echo $data['regno'] ?? "" ?>">
            </div>
            <div class="form-group">
                <label for="name">Enter your Phone No </label>
                <input name="phoneno" class="form-control form-control" type="number" min='999999999' max='9999999999' placeholder="" value="<?php echo $data['phoneno'] ?? "" ?>">
            </div>
            <?php if (!$editFlag) { ?>
                <div class="form-group" align="middle">
                    <button name="addUser" value="submit" type="submit" class="btn btn-primary">submit</button>
                </div>
            <?php } else { ?>
                <div class="form-group" align="middle">
                    <button name="editUser" value="<?php echo $data['id'] ?>" type="submit" class="btn btn-primary">Update</button>
                </div>
            <?php } ?>
        </form>
    </div>
</div>
<div class="toast">


    <?php if (isset($data["toast"]) && ($data["toast"] == "success")) { ?>
        <div class="alert alert-success alert-dismissible">
            <a href="http://localhost/practice/custom_MVC/?controller=user&action=listUser">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </a>
            <strong>Success!</strong> Data has been updated successfully...
        </div>
        <?php } elseif (isset($data["toast"]) && $data["toast"] == "failed") { ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>failed!</strong> Data can't be updated.
            </div>
        <?php } elseif (isset($data["toast"]) && $data["toast"] == "added") { ?>
            <div class="alert alert-success alert-dismissible">
                <a href="http://localhost/practice/custom_MVC/?controller=user&action=listUser">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                </a>
                <strong>Success!</strong> Data has been updated successfully...
            </div>
    <?php } ?>
</div>

<style>
    .form {
        padding: 90px;
    }
    .toast{
        position: absolute;
        right: 10;
        bottom: 60  ;
        width: 350px;
    }
</style>