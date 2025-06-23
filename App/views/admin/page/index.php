<?php
// function curl($data, $action){
//     $req["data"] = json_encode($data);

//     $req["action"] = $action;
    
//     $curl = curl_init("localhost/project/server/api.php");
//     curl_setopt_array($curl, [
//         CURLOPT_POST=>true,
//         CURLOPT_RETURNTRANSFER=>true,
//         CURLOPT_POSTFIELDS=>$req
//         ]
//     );  
//     $response = json_decode(curl_exec($curl), true);
//     curl_close($curl);
//     return $response;
// }

// if(isset($_GET['delete'])){
//     $response = curl($_GET['delete'], "deletePlatform");
// }
// if(isset($_GET['edit'])){
//     header("location:edit_platform.php?id={$_GET['edit']}");
// }

// function get_all_platforms(){
//     $response = curl(" ","listAllPlatforms");
//     if($response['status'] == "success"){
//         $data = $response['data'];
//     }
//     else if(isset($response["error"])){
//         return $response["error"];
//     }
//     return $data; 
// }



// $platforms = get_all_platforms();
// $rows = mysqli_affected_rows($connection);

?>

<div class="content">
<?php include "./App/views/admin/components/sidebar.php";?>
    <div class="right-section">
        <?php
                if(!empty($errors)){
                    echo "<div class='errors'>";
                    foreach($errors as $error){
                        echo "<div class='alert alert-warning d-flex justify-content-between'  role='alert'>
                            $error
                            <a href='?.'><i class='bi bi-x-lg'></i></a>
                        </div>";
                    }
                    echo "</div>";
                }
                ?>
        <div class="list_table">
            <h4>Has <?php echo count($data["platforms"])?> records</h4>
            <table class="table table-hover table-primary table-striped-columns">
                <thead>
                    <tr>
                    <th scope="col">Platform ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Validation key</th>
                    <th scope="col">Category</th>
                    <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(empty($platforms)) {echo "No Records found";}
                        else{
                            foreach($platforms as $platform){
                                $platform['platform_id'] = htmlspecialchars($platform['platform_id']);
                                $platform['platform_name'] = htmlspecialchars($platform['platform_name']);
                                $platform['platform_key'] = htmlspecialchars($platform['platform_key']);
                                $platform['platform_category'] = htmlspecialchars($platform['platform_category']);
                                echo"<tr>"; 
                                echo"<th scope='row'>{$platform['platform_id']}</th>";
                                echo "<td>{$platform['platform_name']}</td>";
                                echo "<td>{$platform['platform_key']}</td>";
                                echo "<td>{$platform['platform_category']}</td>";
                                echo "<td>
                                        <div>
                                            <a class='btn btn-primary btn-sm' href='?controller=adminController&action=editPlatform&id={$platform['platform_id']}'>
                                                <i class='bi bi-pencil-square'></i> Edit
                                            </a>
                                            <a class='btn btn-danger btn-sm' href='?controller=adminController&action=deletePlatform&id={$platform['platform_id']}'>
                                                <i class='bi bi-trash'></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                ";
                                echo"</tr>";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .errors{
        width: 50%;
        margin: auto;
        margin-top: 70px;
        box-shadow: rgba(0, 0, 0, 0.09) 0px 2px 1px, rgba(0, 0, 0, 0.09) 0px 4px 2px, rgba(0, 0, 0, 0.09) 0px 8px 4px, rgba(0, 0, 0, 0.09) 0px 16px 8px, rgba(0, 0, 0, 0.09) 0px 32px 16px;
    }
</style>


</body>
</html>