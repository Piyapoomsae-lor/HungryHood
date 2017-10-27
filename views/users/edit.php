
<?php
if (isset($status['submit']['save'])) {

    echo 'Save : ' . ($status['submit']['save']);
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
    <label>Permission : <?= $user->users_permission ?></label>
    <br>

    <label>
        Name : 

    </label>

    <input type="text" name="first_name" value="<?= $user->first_name ?>">
    <input type="text" name="last_name" value="<?= $user->last_name ?>">

    <br>

    <label>Email :</label>

    <input type = "text" name = "email" value = "<?= $user->email ?>">

    <br>

    <button type="submit" class="btn btn-danger"  name="submit" value="delete" >Delete</button>
    <button type="button" class="btn btn-primary" onclick="javascript:history.go(-1)">Cancel</button>
    <button type="submit" class="btn btn-success"  name="submit" value="save" >Save</button>
</form>

