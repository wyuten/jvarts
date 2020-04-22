<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <?php foreach ($styles as $style): ?>
        <link rel="stylesheet" href=<?print("assets/styles/" . $style)?>>
    <?php endforeach; ?>
    <title><?print($pageTitle)?></title>
</head>
<body>
    <header class="header container">
        <a class="logo">jvarts</a>
        <div class="right-wrapper">
            <ul class="site-nav">
                <li class="site-nav__item"><a href="#welcome">Главная</a></li>
                <li class="site-nav__item"><a href="#about-us">О нас</a></li>
                <li class="site-nav__item"><a href="#services">Услуги</a></li>
                <li class="site-nav__item"><a href="#portfolio">Портфолио</a></li>
                <li class="site-nav__item"><a href="#news">Блог</a></li>
                <li class="site-nav__item"><a href="#contacts">Связаться с нами</a></li>
            </ul>
            <a href="#">
                <img class="site-search" src="assets/images/site-search.png" alt="Поиск"></a>
        </div>
    </header>