<div class="container">
	<h2>Ajout d'un épisode</h2>

	<?php if($error): ?>
	    <div class="alert alert-danger">
	        Tous les champs ne sont pas remplis !
	    </div>
	<?php endif; ?>


	<form method="post" enctype="multipart/form-data">
		<div>
			<label>Selectionnez une image à charger:</label></br>
			<input type="hidden" name="size" value="1000000">
		    <input type="file" name="image" id="image">
	    </div>
	    <div>
	        <label for="title">Titre de l'épisode</label><br />
	        <input type="text" id="title" name="title" />
	    </div>
	    <div>
	        <label for="content">Contenu</label><br />
	        <textarea id="content" name="content"></textarea>
	    </div>
	    </br>
	    <div>
	        <button class="btn btn-primary mb-2"/>Sauvegarder</div>
	    </div>
	</form>
</div>