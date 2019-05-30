<h2>Administrer les épisodes</h2>

<p>
<a href="?action=posts.add" class="btn btn-success">Ajouter</a>
</p>

<?php
if(isset($_GET['confirmation'])){
	if($_GET['confirmation']=='added'){
		?>
		<div class="alert alert-success">L'épisode a bien été ajouté.</div>
		<?php
	}elseif($_GET['confirmation']=='edited'){
		?>
		<div class="alert alert-success">L'épisode a bien été modifié.</div>
		<?php
	}else{
		?>
		<div class="alert alert-success">L'épisode a bien été supprimé.</div>
		<?php
	}
}
?>

<table class="table">
	<thead>	
		<tr>
			<td>Id</td>
			<td>Titre</td>
			<td>Actions</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($allPosts as $post): ?>
			<tr>
				<td><?= $post->id ?></td>
				<td><?= $post->title ?></td>
				<td>
					<a class="btn btn-info" href="?action=posts.read&id=<?= $post->id ?>">Voir</a>
					<a class="btn btn-primary" href="?action=posts.edit&id=<?= $post->id ?>">Editer</a>
					<form action="?action=posts.remove" method="post" style="display: inline;">
						<input type="hidden" name="id" value="<?= $post->id ?>">
						<button type="submit" class="btn btn-danger">Supprimer</button>
					</form>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>

</br>
<?php if($commentsWithSignal !== null){ ?>
	<h2>Signalement de commentaires</h2>
<?php	
} ?>
<table class="table">
		<thead>	
		<tr>
			<td>Id de l'épisode</td>
			<td>Auteur</td>
			<td>Commentaire</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($commentsWithSignal as $comment): ?>
			<tr>
				<td><?= $comment->post_id ?></td>
			<td><?= $comment->author ?></td>
			<td><?= $comment->comment ?></td>
			<td>
				<form action="?action=posts.ignoreSignal" method="post" style="display: inline;">
					<input type="hidden" name="id" value="<?= $comment->id ?>">
					<button type="submit" class="btn btn-info">Ignorer</button>
				</form>
				<form action="?action=posts.removeComment" method="post" style="display: inline;">
					<input type="hidden" name="id" value="<?= $comment->id ?>">
					<button type="submit" class="btn btn-danger">Supprimer</button>
				</form>
			</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>


