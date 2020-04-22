<?php
    session_start();

    $pageTitle = "Авторизация";

    $styles = [
        "normalize.min.css",
        "cms.min.css",
    ];

    if($_SESSION["is_auth"] == true) {
        header("Location: index.php");
    } else if ($_POST["login"] == "root" && $_POST["password"] == "root") {
        $_SESSION["is_auth"] = true;
        header("Location: index.php");
    }
?>

<?php require_once("../__header/cms.php"); ?>

<section class="screen">
    <form class="form" action="login.php" method="POST">
        <input class="form__field" type="text" name="login" maxlength="30" 
            placeholder="login" autocomplete="off">
        <input class="form__field" type="password" name="password" maxlength="50" 
            placeholder="password" autocomplete="off">
        <div class="fields-wrapper">
            <button class="form__btn">Отправить</button>
            <a class="form__link" href="../">Главная</a>
        </div>
    </form>
</section> 

<?php require_once("../__footer/empty.php"); ?>