
<?php
if (isset($status['submit']['save'])) {

    echo 'Save : ' .($status['submit']['save']);
} else if (isset($status['submit']['delete'])) {

    echo 'delete : ' . ($status['submit']['delete']);
}
?>

<form method="post">

    <input id="form-token" type="hidden" name="<?= Yii::$app->request->csrfParam ?>"
           value="<?= Yii::$app->request->csrfToken ?>"/>

    <label>ID : <?= $user->id ?></label>
    <input type="hidden" name="id" value="<?= $user->id ?>">
    <br>
    <label>Username : <?= $user->username ?></label>
    <br>

    <label>
        Name : 

    </label>

    <input type="text" name="first_name" value="<?= $user->first_name ?>">
    <input type="text" name="last_name" value="<?= $user->last_name ?>">

    <br>

    <label>Email :</label>
    <?php
    if (isset($user->email))
        foreach ($user->email as $values) {
            ?>
            <input type = "text" name = "email[]" value = "<?= $values ?>">
            <?php
        }
    ?>
    <br>
    <label>Address :</label>
    <?php
    if (isset($user->address))
        foreach ($user->address as $values) {
            ?>
            <input type = "text" name = "address[]" value = "<?= $values ?>">
            <?php
        }
    ?>

    <br>
    <button type="submit" class="btn btn-danger"  name="submit" value="delete" >Delete</button>
    <button type="button" class="btn btn-primary" onclick="javascript:history.go(-1)">Cancel</button>
    <button type="submit" class="btn btn-success"  name="submit" value="save" >Save</button>
</form>

