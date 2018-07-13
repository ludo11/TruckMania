<?php require('layout.php'); ?>
 <?php include 'header.php'; ?>
<div class="text-center" style="padding:50px 0">
	<div class="logo">Pros</div>
	<!-- Main Form -->
	
            <form id="login-form" class="text-left" method="POST" action="/connexion-pros">
			
			
				 <div class="form-inscri">
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
				
				<button type="submit" class="login-button">Connexion</button>
			</div>
            </form>
</div>

<?php include 'footer.php'; ?>
