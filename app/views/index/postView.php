<div class="col-md-6 col-sm-10 col-xs-10 mx-auto">
    <article class="card mb-4"> 
        <header class="card-header">  
            <div class="card-meta">
                <p><?= $post->creation_date_fr ?></p>
            </div>
            <h4 class="card-title"> 
                <?= htmlspecialchars($post->title) ?>
            </h4>
        </header>
        <?= $post->content?>
    </article> 
</div>

<div class="container">
    <?php if($error): ?>
        <div class="alert alert-danger">
            Tous les champs ne sont pas remplis !
        </div>
    <?php endif; ?>

    <h2>Commentaires</h2>
    <?php if(isset($_GET['signal'])): ?>
        <div class="alert alert-success">
            Le commentaire a bien été signalé !
        </div>
    <?php endif; ?>
    <?php foreach ($comments as $comment): ?>
        <div class="media thumbnail">
            <strong><?= $comment->author ?></strong> le <?= $comment->comment_date_fr ?>
        
            <a class="btn btn-link" href="index.php?action=posts.signal&post_id=<?= $comment->post_id ?>&id=<?= $comment->id ?>"><i class="fas fa-flag"></i> Signaler</a>
            </br>
            <?= nl2br($comment->comment) ?>
        </div>
    <?php endforeach; ?>

    <form action="index.php?action=posts.addComment&amp;id=<?= $post->id ?>" method="post">
        <div>
            <label for="author">Auteur</label><br />
            <input type="text" id="author" name="author" />
        </div>
        <div>
            <label for="comment">Commentaire</label><br />
            <textarea id="comment" name="comment"></textarea>
        </div>
        <div>
            <input type="submit" class="btn btn-primary mb-2"/>
        </div>
    </form>
    </br>
</div>