<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<form>
    <div class="form-group" method="get">
        <label for="name">First & Last Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="First & Last Name">
    </div>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" id="username" placeholder="Username">
    </div>

    <button type="submit"  class="btn btn-default">
        <i class="fa fa-search" aria-hidden="true"></i> 
        Search
    </button>
</form>

<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>
                <a href="/dashboard/users&username=desc"><i class="fa fa-sort-desc" aria-hidden="true"></i></a>
                Username
            </th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <?php if ($IsPromisesEditUsers) { ?>
                <th>Edit</th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>

        <?php
        if (isset($users->data))
            foreach ($users->data as $key => $values) {
                ?> 
                <tr>
                    <td><?= $values->id ?></td>
                    <td><?= $values->username ?></td>
                    <td><?= $values->first_name . $values->last_name ?></td>
                    <td><?= $values->email[0] ?></td>
                    <td><?= $values->address[0] ?></td>

        <?php if ($IsPromisesEditUsers) { ?>
                        <td>
                            <button class="btn btn-warning" onclick="window.location.href = '<?= $url['url_buttonEdit'] ?>?id=<?= $values->id ?>'"><i cla<i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                        </td>
                <?php } ?>
                </tr>
    <?php } ?>
    </tbody>
</table>

