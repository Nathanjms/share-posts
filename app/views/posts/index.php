<div class="row mb-3">
    <div class="col-md-6">
        <h1>Posts</h1>
    </div>
    <div class="col-md-6">
        <a href="<?= URLROUTE; ?>/posts/add" class="btn btn-primary float-end">
            <i class="fas fa-pencil-alt"></i> Add Post
        </a>
    </div>
</div>
<?php foreach ($data['posts'] as $post) : ?>
    <div class="card card-body mb-3">
        <h4 class="card-title"><?=$post->title;?></h4>
        <div class="bg-light p-2 mb-3">
            Written by: <?= $post->name; ?> on <?= $post->postCreated; ?>
        </div>
        <p class="card-text"><?= strlen($post->body) > 80 ? substr($post->body, 0, 77) . '...' : $post->body; ?></p>
        <a class="btn btn-dark btn-block" href="<?= URLROUTE; ?>/posts/show/<?= $post->postId; ?>">More</a>
    </div>
<?php endforeach; ?>