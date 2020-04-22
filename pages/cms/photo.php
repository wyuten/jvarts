<?php
    session_start();

    $pageTitle = "Фото";

    $styles = [
        "normalize.min.css",
        "cms.min.css",
    ];

    if(!$_SESSION) {
        header("Location: login.php");
    } else {
        if(isset($_FILES["image"])) {
            $link = mysqli_connect("127.0.0.1:3306", "root", "", "jvarts");

            $uploadname = basename($_FILES['image']['name']);//записываем имя файла
            $uploadpath = '../database/images/'.$uploadname; //указываем куда грузить файл
            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadpath)) { //перемещение загруженного файла из временной папки сервера в папку, которую указали (uploadpath)
                $sql = "INSERT INTO photo SET image_name = '" . $uploadname . "'"; //составляем запрос на запись в базу имя и путь к файлу
                mysqli_query($link, $sql); //делаем запрос
                echo "Успешно"; 
            } else {
                echo "Произошла ошибка";
            }
        }
    }
?>

<?php require_once("../__header/cms.php"); ?>

<section class="screen">
    <form class="form" action="photo.php" method="POST" enctype="multipart/form-data">
        <input class="form__field" type="file" name="image">
        <div class="fields-wrapper">
            <button class="form__btn">Отправить</button>
            <a class="form__link" href="../">Главная</a>
            <a class="form__link" href="exit.php">Выход</a>
        </div>
    </form>
</section> 

<?php require_once("../__footer/empty.php"); ?>