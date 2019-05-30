<div class="container">
	</br>
	<h2>Formulaire de connexion</h2>

	<?php if($error): ?>
		<div class="alert alert-danger">
			Identifiants incorrects
		</div>
	<?php endif; ?>

	</br>

	<form method="post">
	    <div>
	        <label for="username">Pseudo</label><br />
	        <input type="text" id="username" name="username" />
	    </div>
	    <div>
	        <label for="password">Mot de passe</label><br />
	        <input type="password" id="password" name="password" />
	    </div>
		</br>
	    <div>
	        <button class="btn btn-primary mb-2">Envoyer</button>
	    </div>
	</form>
</div>