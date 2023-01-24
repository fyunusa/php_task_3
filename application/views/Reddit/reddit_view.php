<!DOCTYPE html>
<html>

<head>
    <title>Reddit Data Viewer</title>
</head>

<body>
    <div class="card-deck">
        <?php foreach ($posts as $post) : ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $post->title; ?></h5>
                    <p class="card-text">by <?php echo $post->author; ?></p>
                    <a href="<?php echo $post->url; ?>" class="btn btn-primary">See Post</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>