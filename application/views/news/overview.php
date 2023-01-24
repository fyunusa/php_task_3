<!DOCTYPE html>
<html>

<head>
    <title> News Archive</title>
</head>

<body>
    <h2><?= $title; ?></h2>
    <?php
    if (!empty($news)) {
        foreach ($news as $news_item) { ?>
            <h3><?php echo $news_item['title'] ?></h3>
            <div class="main">
                <?php echo $news_item['body'] ?>
            </div>
            <p><a href="boys"></a></p>
            <p><a href="/news/view/<?php echo $news_item['slug'] ?>"><?php echo $news_item['slug'] ?></a></p>
        <?php
        }
    } else { ?>
        <h3>No News</h3>
        <p>Unable to find any news for you.</p>
    <?php
    }
    ?>
</body>

</html>