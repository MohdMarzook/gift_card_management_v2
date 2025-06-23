<div class="content">
    <?php include "./App/views/admin/components/sidebar.php";?>
    <div class="right-section">
        <div class="card">
        <?php if (isset($params["id"])) {?>
            <h4>Edit Platform</h4>
            <form action="?controller=adminController&action=editPlatformHandler" method="post" enctype="multipart/form-data">
        <?php } else { ?>
            <h4>Add a Platform</h4>
            <form action="?controller=adminController&action=addPlatformHandler" method="post" enctype="multipart/form-data">
        <?php }?>

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
                <div class='form-floating mb-3'>       
                    <input required name='platform_name' type='text' class='form-control' id='floatingInput' placeholder='' value="<?php (isset($data["platform_name"]) ? print($data["platform_name"]) : "")?>">
                    <label for='floatingInput'>Platform Name</label>
                </div>
                <div style="justify-items: center;" class="row g-2">
                    <div class="col-md">
                        <div class='form-floating mb-3'>    
                            <?php
                                if(!isset($key)){
                                    $key = (isset($data['platform_key'])) ? $data['platform_key'] : "";
                                }
                                echo"<input value='{$key}' style='width:80%' required name='platform_key' type='number' class='form-control' id='floatingInput' placeholder='' readonly>";
                                
                            ?>
                            <label for='floatingInput'>Platform Key</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <label class="input-group" for="inputGroupFile01">Upload a Template Image :<i><sub> (if left empty default image is used)</sub></i></label> 
                        <div class="input-group">
                            </div>
                            <input type="file" class="form-control" id="inputGroupFile01" name="image">
                            <span style="float: right;"><i><sub>Max size:300kb</sub></i></span>
                        
                        </div>

                </div>

                <div class='input-group mb-3'>
                    <span class='input-group-text'>Category</span>
                    <input required style='max-width: 30%;' class='form-select' list='category_list' name="category" id='airline' autocomplete="off" value="<?php (isset($data['platform_category']) ? print($data['platform_category']) : "")?>">
                        <datalist id='category_list'>
                                    <?php
                                    foreach($category as $item){
                                        echo '<option value="' . htmlspecialchars($item) . '"'. (isset($_GET['category']) && $_GET['category'] == $item ? ' selected' : ''). '>' . htmlspecialchars($item) . '</option>';
                                    }
                                    ?>
                        </datalist>
                </div>
                <br>
                <div>                
                    
                <?php if(isset($data["template"])) {
                    echo " <input type='hidden' name='template_id' value='{$data['template']}'>";
                    echo " <input type='hidden' name='platform_id' value='{$data['platform_id']}'>";

                }?></div>
                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>

                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                        ...
                        </div>
                    </div>
                </div> -->

                <button style="width: 80%;margin-left: 10%;" type='submit' name='submit' value='add' class='btn btn-primary'>Add</button>
            </form>
           
        </div>
    </div>
    
</div>

</body>
<style>
    .card{
        width: 75%;
        margin: auto;
        margin-top: 50px;
        padding: 20px;
    }
    .footer{
        position: absolute;
    }
</style>
</html>