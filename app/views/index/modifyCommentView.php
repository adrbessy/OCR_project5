 <?php $title = 'Un commentaire'; ?>

 <?php ob_start(); ?>
    <h1>Un de mes articles !</h1>
    <p><a href="index.php">Retour à la liste des billets</a></p>

    <div class="news">
        <h3>
            <?php echo htmlspecialchars($post['title']) ?>
            <em>le <?= $post['creation_date_fr'] ?></em>
        </h3>
        
        <p>
            <?= nl2br(htmlspecialchars($post['content'])) ?>
        </p>
    </div>

    <h2>Changement de ce commentaire :</h2>

    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?> </p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>

 
        <h2>par ce nouveau commentaire :</h2>
        <p>Veuillez entrer le nouveau contenu du commentaire:</p>
        <form action="index.php?action=modifiedComment&amp;id=<?= $_GET['id'] ?>&amp;comment_id=<?= $_GET['comment_id'] ?>" method="post">
            <div>
                <label for="modified_author">Auteur</label><br />
                <input type="text" name="modified_author" id="modified_author" />
            </div>
            <div>
                <label for="modified_comment">Commentaire</label><br />
                <textarea type="text" name="modified_comment" id="modified_comment"></textarea>
            </div>
            <div>
               <input type="submit" value="Valider" /> 
            </div>
        </form>


<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>