<?php 
    $pageTitle = "Новости";
    
    $styles = [
        "normalize.min.css",
        "news.min.css",
    ];

    $link = mysqli_connect("127.0.0.1:3306", "root", "", "jvarts");

    $news = mysqli_query(
        $link, 'SELECT * FROM news ORDER BY id DESC LIMIT 3');
?>

<?php require_once("__header/common.php"); ?>

<ul class="news__list news__list--outside container">
    <?php foreach ($news as $news_item): ?>
        <li class="news__item">
            <a class="news__item-img" href="database/images/<?print($news_item["image_name"])?>">
                <img src="database/images/<?print($news_item["image_name"])?>">
            </a>
            <div class="news__item-text">
                <h3 class="news__item-title"><a href="#"><?print($news_item["title"])?></a></h3>
                <div class="news__item-info">
                    <span class="news__item-date"><?print($news_item["pub_date"])?></span>
                    <span class="news__item-category"><?print($news_item["category"])?></span>
                </div>
                <p class="news__item-preview"><?print($news_item["text"])?></p>
            </div>
        </li>
    <?php endforeach; ?>
</ul>

<?php require_once("__footer/common.php"); ?>
