<?php 
/**
 * @var $model \app\models\User
 */?>

<h1>Login Form</h1>

<?php $form = \app\core\form\Form::begin('', "post"); ?>
    <?php echo $form->field($model, 'email'); ?>
    <?php echo $form->field($model, 'password')->passwordField(); ?>
    <button type="submit" class="btn btn-primary">Register</button>
<?php \app\core\form\Form::end(); ?>


<!-- <form action="" method="post">
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="password">
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
</form> -->

