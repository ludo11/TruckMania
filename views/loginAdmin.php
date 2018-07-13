<?php require('layout.php'); ?>
<header> <?php include 'header.php'; ?></header>
<div class="text-center" style="padding:50px 0">
	<div class="logo">Administration</div>
	<!-- Main Form -->
	<div class="login-form-1">
            <form id="login-form" class="text-left" method="POST" action="/connexion-administrateur">
			<div class="login-form-main-message"></div>
			<div class="main-login-form">
				<div class="login-group">
					<div class="form-group">
						<label for="lg_username" class="sr-only">Username</label>
                                                <input type="email" class="form-control" id="lg_username" name="logInMail" placeholder="Identifiant">
					</div>
					<div class="form-group">
						<label for="lg_password" class="sr-only">Password</label>
						<input type="password" class="form-control" id="lg_password" name="logInPassword" placeholder="password">
					</div>
<!--					<div class="form-group login-group-checkbox">
						<input type="checkbox" id="lg_remember" name="lg_remember">
						<label for="lg_remember">remember</label>
					</div>-->
				</div>
				<button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
			</div>
            </form>
</div>

<footer>
<?php include 'footer.php'; ?>
</footer>

