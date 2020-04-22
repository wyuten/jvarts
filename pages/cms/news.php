<?php
    session_start();

    $pageTitle = "Новости";

    $styles = [
        "normalize.min.css",
        "news.min.css",
    ];

    if(!$_SESSION) {
        header("Location: login.php");
    } else {
        if(!empty($_POST)) {
            date_default_timezone_set('Asia/Krasnoyarsk');
            
            $uploadname = basename($_FILES['image']['name']);//записываем имя файла
            $uploadpath = '../database/images/'.$uploadname; //указываем куда грузить файл

            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadpath)) { //перемещение загруженного файла из временной папки сервера в папку, которую указали (uploadpath)
                $link = mysqli_connect("127.0.0.1:3306", "root", "", "jvarts");
                
                $sql = 'INSERT INTO `news`(`title`, `text`, `category`, `pub_date`, `image_name`) 
                VALUES (
                    "'. $_POST["title"] . '",
                    "'. $_POST["text"] . '",
                    "'. $_POST["category"] . '",
                    "' . date("Y-m-d") . '",
                    "'. $uploadname . '"
                )';

                mysqli_query($link, $sql);

                echo "Успешно"; 
            } else {
                echo "Произошла ошибка";
            }
        }
    }
?>

<?php require_once("../__header/cms.php"); ?>

<section class="screen">
    <form class="form" action="news.php" method="POST"  enctype="multipart/form-data">
        <input class="form__field" type="text" name="title" maxlength="50" 
            placeholder="Заголовок" autocomplete="off">
        <select class="form__field" name="category" placeholder="Категория">
            <option value="" disabled selected>Категория</option>
            <option value="Оборудование">Оборудование</option>
            <option value="Профессионализм">Профессионализм</option></select>
        <textarea class="form__field" name="text" maxlength="1000"
            placeholder="Текст новости"></textarea>
        <input class="form__field" type="file" name="image">
        <div class="fields-wrapper">
            <button class="form__btn">Отправить</button>
            <a class="form__link" href="../">Главная</a>
            <a class="form__link" href="exit.php">Выход</a>
        </div>
    </form>
</section>

<?php require_once("../__footer/empty.php"); ?>