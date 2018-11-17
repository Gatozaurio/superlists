<?php
    require_once '../setup.php';
    require_once '../includes/header.php'; 
?>
<div class="container">
    <div class="offset-3 col-6 pt-4 pb-4">
        <form action="" method="POST" novalidate>
        <div class="form-group">
                <label for="username">Nombre de usuario</label>
                <input type="text" class="form-control <?=($errors['username'])?"is-invalid":""?>" id="username" name="username" aria-describedby="usernameHelp" placeholder="Introduce un nombre de usuario" value="<?=($username??'')?>">
                <?php if( !empty($errors['username']) ): ?> 
                <div class="invalid-feedback">
                    <?php foreach ($errors['username'] as $error): ?>
                        <?=$error?><br/>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control <?=($errors['password'])?"is-invalid":""?>" id="password" name="password" aria-describedby="passwordHelp" placeholder="Introduce una contraseña">
                <?php if( !empty($errors['password']) ): ?> 
                <div class="invalid-feedback">
                    <?php foreach ($errors['password'] as $error): ?>
                        <?=$error?><br>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
            <?php if( isset($errors['login']) ): ?>
                <div class="alert alert-danger" role="alert">
                    <?php foreach($errors['login'] as $error): ?>
                        <?=$error?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <button type="submit" name="login" class="btn btn-primary">Entrar</button>
        </form>
    </div>
</div>
<?php require_once '../includes/footer.php'; ?>