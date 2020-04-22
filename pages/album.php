<?php 
    $pageTitle = "Галерея";

    $styles = [
        "normalize.min.css",
        "album.min.css",
    ];

    $link = mysqli_connect("127.0.0.1:3306", "root", "", "jvarts");

    $images = mysqli_query(
        $link, 'SELECT * FROM photo ORDER BY id DESC');
?>

<?php require_once("__header/common.php"); ?>

<ul class="album album--outside container">
    <?php foreach ($images as $image): ?>
        <li class="labor"><a href="#">
            <img class="labor__img" src="database/images/<?print($image["image_name"])?>" alt="Работа 1"></a></li>
    <?php endforeach; ?>
</ul>

<?php require_once("__footer/common.php"); ?>
