<a href="<?= URLROUTE; ?>/posts/show/<?= $data['id'];?>" class="btn btn-light w-100"><i class="fas fa-long-arrow-alt-left"></i></a>
<div class="card card-body bg-light mt-3">
    <?= flash('post_message'); ?>
    <h2>Edit Post</h2>
    <p>Edit your post with this form</p>
    <form method="post">
        <div class="form-group">
            <label for="title">Title: <sup>*</sup></label>
            <input type="title" name="title" id="title" value="<?= $data['title']; ?>" class="form-control form-control-lg <?= (!empty($data['title_error'])) ? 'is-invalid' : ''; ?>">
            <span class="invalid-feedback"><?= $data['title_error']; ?></span>
        </div>
        <div class="form-group">
            <label for="body">Body: <sup>*</sup></label>
            <textarea name="body" id="body" class="form-control form-control-lg <?= (!empty($data['body_error'])) ? 'is-invalid' : ''; ?>"><?= $data['body']; ?></textarea>
            <span class="invalid-feedback"><?= $data['body_error']; ?></span>
        </div>
        <input type="submit" value="Submit" class="btn btn-success mt-2 w-100">
    </form>
</div>