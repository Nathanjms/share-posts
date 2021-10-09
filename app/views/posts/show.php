<?= flash('post_message'); ?>
<a href="<?= URLROUTE; ?>/posts" class="btn btn-light w-100 mb-2"><i class="fas fa-long-arrow-alt-left"></i></a>
<br>
<h1><?= $data['post']->title; ?></h1>
<p>Written by <?= $data['user']->name; ?> on <?= $data['post']->created_at; ?>.<p>
<div class="bg-secondary text-white rounded-3 p-2 mb-3">
    <p><?= $data['post']->body; ?></p>
</div>

<?php if ($data['post']->user_id == $_SESSION['user_id']) : ?>
    <hr>
    <a href="<?= URLROUTE; ?>/posts/edit/<?= $data['post']->id; ?>" class="btn btn-dark">Edit</a>

    <form class="float-end" action="<?= URLROUTE; ?>/posts/delete/<?= $data['post']->id; ?>" method="post">
        <input type="submit" value="Delete" class="btn btn-danger">
    </form>
    

<?php endif;?>