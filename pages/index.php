<?php 
    $pageTitle = "Jvarts";

    $styles = [
        "normalize.min.css",
        "index.min.css",
    ];

    $link = mysqli_connect("127.0.0.1:3306", "root", "", "jvarts");

    $images = mysqli_query(
        $link, 'SELECT * FROM photo ORDER BY id DESC LIMIT 6');

    $news = mysqli_query(
        $link, 'SELECT * FROM news ORDER BY id DESC LIMIT 3');
?>

<?php require_once("__header/index.php"); ?>

<section class="welcome" id="welcome">
    <div class="welcome__text">
        <h1 class="page-title">Видео-студия “JVARTS”</h1>
        <p class="page-subtitle">Международня видеостудия с большим будущим</p>
        <div class="links">
            <a class="services-link" href="#services">Наши услуги</a>
            <a class="contacts-link" href="#contacts">Подписаться</a>
        </div>
        <img class="arrow" src="assets/images/arrow.png" alt="Листайте">
    </div>
</section>
<section class="about-us container" id="about-us">
    <h2 class="block-title">О компании</h2>
    <p class="block-subtitle">
        Наша видеостудия обладает ключевыми преимуществами, 
        котрые другие компании не имеют. Мы берёмся за любой</p>
    <ul class="advantages">
        <li class="advantages__item">
            <h3 class="advantages__item-title">Работаем по всему миру</h3>
            <p class="advantages__item-subtitle">Наши представительства расположены в о всех странах от Европы до Азии</p>
        </li>
        <li class="advantages__item">
            <h3 class="advantages__item-title">Взаимодейтвуем с клиенами</h3>
            <p class="advantages__item-subtitle">Мы всегда в точноси следуем пожеланиям клиента</p>
        </li>
        <li class="advantages__item">
            <h3 class="advantages__item-title">Работаем с головой</h3>
            <p class="advantages__item-subtitle">Мы всегда стараемся выполняь всю работу качественно и в срок!</p>
        </li>
    </ul>
</section>
<section class="services container" id="services">
    <h2 class="block-title">Наши услуги</h2>
    <p class="block-subtitle">
        Прочтите о том, какие работы мы производим в нашей видеостудии 
        и сделайте выбор сами!</p>
    <ul class="services-list">
        <li class="service">
            <h3 class="service__title">Передовые технологии</h3>
            <p class="service__subtitle">При работе в нашей студии мы используем 
                передовые технологии видеосъёмки и спецэффекты</p>
            <a class="service__link" href="#">Перейти</a>
        </li>
        <li class="service">
            <h3 class="service__title">Опыт работы</h3>
            <p class="service__subtitle">Мы имеем обширное портфолио готовых работ, 
                вы сами можете посмотреть и сделать выбор тогда, когда захотите</p>
            <a class="service__link" href="#">Перейти</a>
        </li>
        <li class="service">
            <h3 class="service__title">Сопровождение</h3>
            <p class="service__subtitle">Мы всегда идём на контакт и готовы ответить 
                на любые интересующие вас вопросы</p>
            <a class="service__link" href="#">Перейти</a>
        </li>
        <li class="service">
            <h3 class="service__title">Документация</h3>
            <p class="service__subtitle">Мы имеем в соем распоряении все неообходимые 
                разрешительные документы, 
                при необходимости вы можете ознакомиться с ними на сайте</p>
            <a class="service__link" href="#">Перейти</a>
        </li>
        <li class="service">
            <h3 class="service__title">Будущее</h3>
            <p class="service__subtitle">Мы считаем себя прогрессивной компанией и стремимся к тому, 
                чтобы в будущем наши работы были ещё лучше!</p>
            <a class="service__link" href="#">Перейти</a>
        </li>
        <li class="service">
            <h3 class="service__title">Профессионализм</h3>
            <p class="service__subtitle">Все члены нашего коллектива - большие профессионалы в своём деле 
                и иммеют боольшой стаж работы в своих направлениях</p>
            <a class="service__link" href="#">Перейти</a>
        </li>
    </ul>
</section>
<section class="portfolio container" id="portfolio">
    <h2 class="block-title">Наши последние работы</h2>
    <p class="block-subtitle">Lorem ipsum dolor sit amet, 
        consectetur adipisicing elit, 
        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
        Ut enim ad minim veniam,</p>
    <ul class="filters">
        <li class="filters__item">
            <button class="filters__btn filters__btn--current">Все</button></li>
        <li class="filters__item">
            <button class="filters__btn">Свадебные видео</button></li>
        <li class="filters__item">
            <button class="filters__btn">Реклама</button></li>
        <li class="filters__item">
            <button class="filters__btn">Праздники</button></li>
    </ul>
    <ul class="album">
        <?php foreach ($images as $image): ?>
            <li class="labor"><a href="database/images/<?print($image["image_name"])?>">
                <img class="labor__img" src="database/images/<?print($image["image_name"])?>" alt="Работа 1"></a></li>
        <?php endforeach; ?>
    </ul>
    <a class="portfolio__link" href="album.php">Посмотреть все</a>
</section>
<section class="rates container">
    <h2 class="block-title">Ценовые категории</h2>
    <p class="block-subtitle">На нашемм сайте представлен 
        порядок цен на все предлагаемые услуги и виды работ. 
        Мы предлагаем самые доступные цены за качественную работу!</p>
    <ul class="prices">
        <li class="price">
            <div class="price__topic">
                <h3 class="price__title">Видеосопровождение 
                    праздников</h3>
                <p class="price__value">
                    <span class="price__value--num">30000</span>рублей</p>
            </div>
            <ul class="price__descriptions">
                <li>Бесплатно первые 2 часа</li>
                <li>Общее время работы 12 часов</li>
                <li>Бесплатная консультация</li>
                <li>+ фотосъёмка и клип</li>
            </ul>
            <a class="price__link" href="#">Подробнее</a>
        </li>
        <li class="price">
            <div class="price__topic">
                <h3 class="price__title">Видеосъёмка 
                    свадеб</h3>
                <p class="price__value">
                    <span class="price__value--num">50000</span>рублей</p>
            </div>
            <ul class="price__descriptions">
                <li>Работаем, чтобы было удобно вам</li>
                <li>12 часов работы</li>
                <li>Профессиональное оборудование</li>
                <li>По вашему желанию используем квадрокоптер</li>
            </ul>
            <a class="price__link" href="#">Подробнее</a>
        </li>
        <li class="price">
            <div class="price__topic">
                <h3 class="price__title">Съёмка рекламных 
                    роликов</h3>
                <p class="price__value">
                    <span class="price__value--num">100000</span>рублей</p>
            </div>
            <ul class="price__descriptions">
                <li>Большой опыт</li>
                <li>Работаем с заказчиком индивидуально</li>
                <li>Снимем продающий ролик</li>
                <li>Длительность не более 3 минут</li>
            </ul>
            <a class="price__link" href="#">Подробнее</a>
        </li>
    </ul>
</section>
<section class="team container">
    <h2 class="block-title">Наша команда</h2>
    <p class="block-subtitle">В нашей видеостудии рабтают большие профессионалы своего дела, 
        ИТ-специалисты активно сопровождают все проекты</p>
    <ul class="members-list">
        <li class="member">
            <div class="member__avatar">
                <img src="assets/images/Vinidiktov.jpg" alt="Аватар"></div>
            <p class="member__name">Винидиктов Александр</p>
            <p class="member__position">Руководитель, видеооператор, пилот дрона, монтажер</p>
            <ul class="member__socials">
                <li class="member__social member__social--twitter">
                    <a href="https://twitter.com">Twitter</a></li>
                <li class="member__social member__social--messenger">
                    <a href="https://vk.com/jvarts">VK</a></li>
                <li class="member__social member__social--dribbble">
                    <a href="https://dribbble.com">Dribbble</a></li>
            </ul>
        </li>
        <li class="member">
            <div class="member__avatar">
                <img src="assets/images/Korneev.jpg" alt="Аватар"></div>
            <p class="member__name">Николай Корнеев</p>
            <p class="member__position">Второй видеооператор, фотограф, монтажер</p>
            <ul class="member__socials">
                <li class="member__social member__social--twitter">
                    <a href="https://twitter.com">Twitter</a></li>
                <li class="member__social member__social--messenger">
                    <a href="https://vk.com/kolamba_777">VK</a></li>
                <li class="member__social member__social--dribbble">
                    <a href="https://dribbble.com">Dribbble</a></li>
            </ul>
        </li>
        <li class="member">
            <div class="member__avatar">
                <img src="assets/images/Shulga.jpg" alt="Аватар"></div>
            <p class="member__name">Шульга Анастасия</p>
            <p class="member__position">Режиссёр</p>
            <ul class="member__socials">
                <li class="member__social member__social--twitter">
                    <a href="https://twitter.com">Twitter</a></li>
                <li class="member__social member__social--messenger">
                    <a href="https://vk.com/asya_vista">VK</a></li>
                <li class="member__social member__social--dribbble">
                    <a href="https://dribbble.com">Dribbble</a></li>
            </ul>
        </li>
    </ul>
</section>
<section class="news container" id="news">
    <h2 class="block-title">Наш новостной блог</h2>
    <p class="block-subtitle">Все новости нашей компании, собранные в одном месте, 
        это успех! Смотритм и записываем профессиональные секреты!</p>
    <ul class="news__list">
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
    <a class="news__link" href="news.php">Подробнее</a>
</section>
<section class="contacts container" id="contacts">
    <h2 class="block-title">Контакты</h2>
    <p class="block-subtitle">Если у вас возникли вопросы по поводу работы нашей видеостудии - 
        напишите нам письмо на электронную почту или позвоните по телефону!</p>
    <ul class="contacts-list">
        <li class="contacts-list__item contacts-list__item--location">
            Россйская Федерация Красноярский край Город Канск</li>
        <li class="contacts-list__item contacts-list__item--call">
            +7 (913) 036-84-23</li>
        <li class="contacts-list__item contacts-list__item--site">
            www.jvarts.ru</li>
    </ul>
    <form class="feedback-form" action="#" method="POST">
        <div class="top-fields-wrapper">
            <input type="text" name="name" maxlength="30" placeholder="Ваше имя" autocomplete="off">
            <input type="email" name="email" maxlength="50" placeholder="Ваша почта" autocomplete="off">
        </div>
        <textarea name="message" placeholder="Сообщение"></textarea>
        <button class="feedback-form__btn">Отправить</button>
    </form>
</section>

<?php require_once("__footer/common.php"); ?>
