<?php require('layout.php'); ?>
<?php include 'header.php'; ?>
<div>
    <br>
    <h3 class="h3">Connexion Clients</h3>
    <br>
    <div class="form-group">
        <div class="form-inscri">
            <form method="POST" action="/connexion-client">
                <p>
                    <label for='logInMail' class='form-text text-muted'>E-mail</label>
                    <input type='email' name='logInMail' class='form-control'>
                </p>
                <p>
                    <label for='logInPassword' class='form-text text-muted'>Password</label>
                    <input type='password' name='logInPassword' class='form-control'>
                </p>
                <p>
                    <input type="submit" name="profile" class='btn btn-warning' value='Envoyer'>
                </p>
            </form>
        </div>
    </div>
</div>
    <footer>
        <?php include 'footer.php'; ?>
    </footer>
