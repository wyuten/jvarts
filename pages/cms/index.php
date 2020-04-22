<?php
    session_start();

    $pageTitle = "Добавить контент";

    $styles = [
        "normalize.min.css",
        "cms.min.css",
    ];

    if(!$_SESSION) {
        header("Location: login.php");
    }
?>

<?php require_once("../__header/cms.php"); ?>

<section class="screen">
    <div class="form">
        <div class="fields-wrapper">
            <a class="form__link" href="photo.php">Фото</a>
            <a class="form__link" href="news.php">Новости</a>
        </div>
    </div>
</section>

<?php require_once("../__footer/empty.php"); ?>