<?php if (isset($_SESSION['user'])) { ?>
    <a href="<?= yii\helpers\Url::to(['users/logout']); ?>" >
        <input type="button" name="Logout" value="Logout">
    </a>
<?php } ?>