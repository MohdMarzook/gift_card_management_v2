<div class="container">
    <div class="row mt-5">
        <div class="col-12">
            <table class="table table-striped table-hover ">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Registration No</th>
                        <th>Phone No</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['list'] as $user): ?>
                        <tr>
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo $user['name']; ?></td>
                            <td><?php echo $user['regno']; ?></td>
                            <td><?php echo $user['phoneno']; ?></td>
                            <td>
                                <a href="http://localhost/practice/custom_MVC/?controller=user&action=editUserFrom&<?php echo "userId=".$user['id']?>"><button class="btn btn-primary btn-sm me-2">edit</button></a>
                                <button class="btn btn-danger btn-sm">delete</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>