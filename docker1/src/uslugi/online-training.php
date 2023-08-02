<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include($root . '/lib.php');

if (empty($_COOKIE["message"])){
    $result = "";
    $true = false;
  } else {
    $result = $_COOKIE["message"];
    $true = true;
    setcookie("message", "", time() + 60 * 60 * 24 * 365 * 10);
  }

req_rooted("","one-training");

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="google-site-verification" content="pKtbCFLuVig1X6R_hgSxv2K3u3aSViz-5Al-5w6NSw">

    <meta name="description" content="Оздоровительный центр реабилитации в Москве «ONE training»">
    <meta property="og:url" content="https://one-training.ru">
    <meta property="og:title" content="Оздоровительный центр реабилитации в Москве «ONE training»">
    <meta property="og:description" content="Оздоровительный центр реабилитации в Москве «ONE training»">
    <meta property="og:type" content="website">
    <meta property="og:image" content="/res/photohd.jpg">
    <link rel="canonical" href="https://one-training.ru">

    <link rel="shortcut icon" href="/favicon/photo4.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="/favicon/photo4.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/favicon/faviconV2.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/favicon/photo3.png">
    <link rel="apple-touch-startup-image" href="/favicon/photo3.png">
    <meta name="msapplication-TileColor" content="#000000">
    <meta name="msapplication-TileImage" content="/favicon/photo2.png">

    <script type="text/javascript" src="https://mc.yandex.ru/metrika/watch.js"></script>
    <script src="https://www.googletagmanager.com/gtm.js?id=GTM-WWN65KM"></script>
    <script src="https://www.google-analytics.com/analytics.js"></script>
    <script src="https://mc.yandex.ru/metrika/tag.js"></script>
    <link rel="icon" type="image/x-icon" href="/favicon/faviconV2.png" />
    <title>Онлайн тренировка</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/lib.css">
    <meta name="viewport" content="width=device-width,initial-scale=0.9,user-scalable=0">
    <style>html{display: none}.body1{margin-top: 75px}</style>
</head>
<body>
    <div class="w1"><ul id="alw"></ul></div><div class="w2"><ul id="alw"></ul></div><div class="w3 ww3"><ul id="alw"></ul></div><div class="w4 ww3"><ul id="alw"></ul></div><div class="w5 ww3"><ul id="alw"></ul></div>
    <div class="yclients"><div class="yanim"><div class="oval">Онлайн Запись</div></div></div><iframe class="yclientw"></iframe>
    <div class="bar"><img src="/res/photo.png" class="icon" onclick="window.location.href='/index.php'"><ul class="bar_ul"></ul><div class="sclink"></div><div class="mode-phone"><div class="line l1"></div><div class="line l2"></div></div></div>
    <div class="m-menu"><div><ul class="bar_ul2"></ul></div></div><div id="m-ulp"></div>

    <div class="book">
            <div class="book-i">
                <div class="exit">
                    <svg width="100%" height="100%" viewBox="0 0 15 15">
                        <path id="pcross" fill="#ffffff" d="M2.64,1.27L7.5,6.13l4.84-4.84C12.5114,1.1076,12.7497,1.0029,13,1c0.5523,0,1,0.4477,1,1&#xA;&#x9;c0.0047,0.2478-0.093,0.4866-0.27,0.66L8.84,7.5l4.89,4.89c0.1648,0.1612,0.2615,0.3796,0.27,0.61c0,0.5523-0.4477,1-1,1&#xA;&#x9;c-0.2577,0.0107-0.508-0.0873-0.69-0.27L7.5,8.87l-4.85,4.85C2.4793,13.8963,2.2453,13.9971,2,14c-0.5523,0-1-0.4477-1-1&#xA;&#x9;c-0.0047-0.2478,0.093-0.4866,0.27-0.66L6.16,7.5L1.27,2.61C1.1052,2.4488,1.0085,2.2304,1,2c0-0.5523,0.4477-1,1-1&#xA;&#x9;C2.2404,1.0029,2.4701,1.0998,2.64,1.27z"/>
                    </svg>
                </div>

                <b1>Записаться на занятие со скидкой -50%</b1>
                <p><v1>Оставьте свои данные ниже</v1></p>

                <form action="" method="GET" class="formWithValidation">
                    <div class="inpt-div">
                        <input type="text" id="name" name="name" placeholder="Имя" maxlength="30"/>
                    </div>
                    <div class="inpt-div">
                        <img src="/res/flag.png" width="25" height="13" style="margin-left: 20px;margin-right: 15px; border: 1px solid #aaa">
                        <span>+7</span>
                        <input type="tel" id="phone" name="phone" placeholder="(999) 999-99-99" maxlength="15" style="padding-left: 5px">
                    </div>
                    <div class="inpt-div">
                        <input type="date" name="bday" value="<?php echo date('o-m-d')?>" min="<?php echo date('o-m-d')?>" max="<?php echo date('o') + 1 . "-" . date('m') . "-" . date('d')?>"/>
                    </div>

                    <button>Записаться</button>
                    <?php echo $result?>
                </form>
                <script>
                    var form = document.querySelector('.formWithValidation');
                    var btn2 = form.querySelector('button');
                    var phone1 = form.querySelector('#phone');
                    let name1 = form.querySelector('#name');
                    var stop = true;

                    form.addEventListener('submit', function (event) {
                        if(phone1.value.length < 15 || name1.value.length < 3 || !stop){
                            event.preventDefault();
                        } else {
                            event.preventDefault();
                            btn2.innerHTML = '<div id="canvas"><canvas class="canva"></canvas></div>';
                            loader();
                            setTimeout(() => {event.target.submit()}, 100);
                            stop = false;
                        }
                    });
                </script>
            </div>
        </div>

    <div class="body1">
    <div class="foot" style="padding: 10px;">
        <hh1>Онлайн тренировка</hh1>
    </div>
    <div class="content" style="padding-bottom: 1%">
            <div class="content-w">
                <div class="c-body" style="display: flex;margin-bottom: 15%; align-items:center">
                    <div class="c-item">
                        <div>
                            <article style="font-size: 16px">
                            <h4 id="blue">Онлайн-тренировки, какие они бывают?</h4>
                            Есть два основных типа онлайн-тренировок: групповые занятия с онлайн-тренером и
                            индивидуальные тренировки онлайн с тренером. И в том и другом случае тренер составляет
                            онлайн программу тренировок, занимаясь по которой вы приходите к определенному результату,
                            будь то набор мышечной массы, похудение, избавление от боли в спине или подготовка по
                            конкретным видам спорта.
                            <br><br>
                            Готовые онлайн-программы тренировок хороши тем, что по стоимости обойдутся вам дешевле, чем
                            занятия вживую. Вместе с тем вы получаете полноценную программу тренировок онлайн и наличие
                            обратной связи с онлайн-тренером.
                            <br><br>
                            Индивидуальные онлайн-тренировки или онлайн-коучинг — это самый гибкий, рентабельный и
                            надежный способ достичь ваших целей в фитнесе. Программа тренировок онлайн подбирается лично
                            под вас и ваши запросы. Все внимание онлайн-тренера направлено на вас и все его знания к
                            вашим услугам. Вы решаете, где и когда вам удобно заниматься, а онлайн-тренер подстраивается
                            под вас. Занимаясь с тренером по онлайн программе c «One-training» вы можете прийти в форму,
                            даже если у вас сумасшедший график.
                            </article>
                        </div>
                    </div>
                    <div class="c-item">
                        <img style="width: 100%" src="/res/20OneTr202022-179.webp">
                    </div>
                </div>

                <div class="c-body" style="display: flex;flex-direction: row-reverse;margin-bottom: 15%; align-items:center">
                    <div class="c-item">
                        <div>
                            <article style="font-size: 16px">
                            <h4 id="blue">Каковы преимущества онлайн-тренировок для вас, если вы клиент?</h4>
                            <ul class="ul16">
                                    <li>Вы не тратите время на дорогу в зал, занимаясь дома либо в ближайшем фитнес-центре
                                    </li>
                                    <li>Можете заниматься с лучшими тренерами независимо от их и вашего местоположения по лучшим онлайн-программам тренировок
                                    </li>
                                    <li>Получаете полноценную обратную связь, можете проконсультироваться по технике и питанию
                                    </li>
                                    <li>Можно найти онлайн-тренера под специфическую задачу в специфической нише (пилатес, реабилитация, фитнесс, единоборства, восстановление, гибкость)
                                    </li>
                                    <li>Возможность работать с большим количеством клиентов без потери качества
                                    </li>
                                    <li>Возможность заниматься из любой точки мира
                                    </li>
                                </ul>
                                Каждый наш инструктор запускает онлайн тренировки немного по-своему, но каждый
                                предоставляет рекомендации по правильному выполнению упражнений подробные онлайн планы
                                тренировок, адаптированные к вашим конкретным целям, постоянную поддержку и, конечно,
                                виртуальную волшебную мотивацию.
                                <br><br>
                                Каждая тренировка онлайн с тренером уникальна, её план составляется профессиональным
                                тренером специально под вас. Тренировка включает полный цикл: разминку, силовой блок,
                                растяжку и заминку, а также восстановление.
                            </article>
                        </div>
                    </div>
                    <div class="c-item" style="margin-top: auto; margin-bottom: auto">
                        <img style="width: 100%" src="/res/20OneTr202022-159.webp">
                    </div>
                </div>

                <div class="c-body" style="display: flex;margin-bottom: 15%; align-items:center">
                    <div class="c-item">
                        <div>
                            <article style="font-size: 16px">
                                <h4 id="blue">Как проходят онлайн-тренировки с персональным инструктором?</h4>
                                Это может быть как простое обучение на основе видеоуроков онлайн или курс онлайн тренинга с помощью нашего чат бота в
                                телеграмме. Оба варианта хороши, но лучше начать с инструктором для более углубленного тренинга - сеансы видео-коучинга,
                                потом добавить сочетание со специализированным приложением, которое вы используете для доступа к тренировкам,
                                отслеживания прогресса и отчета своему онлайн-тренеру.
                                <br><br>
                                <h4 id="blue">С чего начать тренировки-онлайн?</h4>
                                Первое, это определиться с целями: хотите вы похудеть, набрать мышцы, поработать с
                                рельефом. Может вы спортсмен и боитесь потерять форму во время пандемии? Либо вы в
                                разъездах и нужно составить план тренировок, не привязываясь к конкретному месту.
                                <br><br>
                                После этого вы выбираете вашего персонального тренера онлайн. От правильности его выбора
                                зависит главное: ваши результаты. Поэтому первое, на что нужно обратить внимание, это
                                профессионализм всех наших инструкторов, они имеют медицинское и спортивное образование
                                и большой опыт. А так же тренера имеют богатый опыт и отзывы занимающихся по его
                                онлайн-программам тренировок.
                            </article>
                        </div>
                    </div>
                    <div class="c-item">
                        <img style="width: 100%" src="/res/20OneTr202022-195.jpg">
                    </div>
                </div>

                <div class="c-body" style="display: flex;flex-direction: row-reverse;margin-bottom: 25%; align-items:center">
                    <div class="c-item">
                        <div>
                            <article style="font-size: 16px">
                            Важно и то, насколько персональный тренер приятен вам как человек, ведь эмоциональный фактор
                            тоже важен в тренировках.
                            <br><br>
                            Персональный тренер онлайн - человек, который должен вас мотивировать, вдохновлять
                            заниматься. Можно посмотреть странички выбранного тренера-онлайн в соцсетях, узнать,
                            насколько это тот человек, которому вы можете доверить свою физическую форму.
                            <br><br>
                            Может вам нужен жесткий тип, который будет постоянно вас подстегивать, вызывать ужас и
                            трепет и заставлять заниматься, и выкладываться на все двести процентов. Или вам больше
                            подходит добродушный весельчак, «свой парень», с которым будет приятно и комфортно.
                            <br><br>
                            В любом случае, найти своего онлайн-тренера – как минимум половина успеха!
                            </article>
                        </div>
                    </div>
                    <div class="c-item" style="margin-top: auto; margin-bottom: auto">
                        <img style="width: 100%" src="/res/20OneTr202022-169.jpg">
                    </div>
                </div>
                <div class="c-body" style="display: flex;margin-bottom: 15%; align-items:center">
                    <div class="c-item">
                        <div>
                            <article style="font-size: 16px">
                            <h4 id="blue">Чего ожидать от тренировок с онлайн-тренером?</h4>
                            Когда мы говорим не просто об онлайн-тренировках, а о тренировках с персональным
                            онлайн-тренером и онлайн-коучинге, которое включает в себя:
                            <br><br>
                            <i>Этап 1:</i> Определение цели: обговариваем еще раз свои ожидания и цели с тренером, корректируем
                            при необходимости, выявляем потребности. В конце этого этапа не должно остаться
                            недосказанности и недопонимания.
                            <br><br>
                            <i>Этап 2:</i> Определение исходной позиции: функциональное тестирование, замеры. Так мы сможем
                            отслеживать результаты и выявить эффективность подобранной онлайн-программы тренировок.
                            <br><br>
                            <i>Этап 3:</i> Составление программы онлайн-тренировок и ее осуществление.
                            <br><br>
                            Вы тренируетесь по предложенной программе тренировок онлайн, питаетесь по системе, если
                            таковая предусмотрена программой.
                            <br><br>
                            <i>Этап 4:</i> Получение обратной связи, коррекция программы при необходимости, ее усложнение или
                            упрощение. Даже если вы не устремились семимильными шагами к заветной цели спустя пару
                            недель, это еще не повод бросать своего онлайн-тренера. Каждый человек индивидуален, а
                            тренер - не волшебник, который немедленно подбирает нужные ключи. Главное, уметь
                            адаптировать программу тренировок онлайн, вовремя внести коррективы. А это обеспечивается
                            постоянной обратной связью, мониторингом и контролем со стороны тренера.
                            <br><br>
                            Сейчас у нас в графике вы можете найти запись на групповые онлайн тренировки.
                            <h4 id="blue">Желаем продуктивных онлайн-тренировок!</h4>
                            </article><br>
                            <a href="/prays.php"><button class="btn-req" style="margin-top: 5%">Стоимость</button></a>
                        </div>
                    </div>
                    <div class="c-item">
                        <img style="width: 100%" src="/res/20OneTr202022-146.jpg">
                    </div>
                </div>

            </div>
        </div>
        <div class="footeer">
            <iframe src="/footer.html" class="fot" style="width: 100%; position: absolute; border: none;" scrolling="no"></iframe>
        </div>
    </div>
</body>
<script>
    var cb = document.querySelectorAll(".c-body");
    var cit = document.querySelectorAll(".c-item");
    var ctii = document.querySelectorAll(".ct-i");

    var iframe = document.querySelector("iframe");
    var oval = document.querySelector(".oval");
    var ycw = document.querySelector(".yclientw");
    var ylink = "https://b180684.yclients.com/company/183648/record-type?gcid=2018860734.1685372382&referrer=https:%2F%2Fone-training.ru%2F&o=";
    var d = 0;

    var exit = document.querySelector(".exit");
    var book = document.querySelector(".book");
    var booki = document.querySelector(".book-i");

    exit.onclick = function() {
        book.style.display = "none";
        document.documentElement.style.overflow = "auto";
    }

    <?php getAfter($true)?>
    
    oval.onclick = function() {
        if (window.innerWidth > 1000) {
            ycw.src = ylink;
            ycw.style.display = "block";
            ycw.style.width = "600px";
            ycw.style.height = window.innerHeight + "px";
            d = 1;
        } else(window.location.href = ylink);
    }

    function mode() {
        modedef();
        if(window.innerWidth < 1200) {
                cit[0].style.width = "auto";
                cit[0].style.marginRight = "0";
                cit[1].style.width = "100%";

                cit[2].style.width = "auto";
                cit[2].style.marginRight = "0";
                cit[3].style.width = "100%";

                cit[4].style.width = "auto";
                cit[4].style.marginRight = "0";
                cit[5].style.width = "100%";

                cit[6].style.width = "auto";
                cit[6].style.marginRight = "0";
                cit[7].style.width = "100%";

                cit[8].style.width = "auto";
                cit[8].style.marginRight = "0";
                cit[9].style.width = "100%";

                cb[0].style.display = "block";
                cb[1].style.display = "block";
                cb[2].style.display = "block";
                cb[3].style.display = "block";
                cb[4].style.display = "block";
            } else{
                cit[0].style.width = "50%";
                cit[0].style.marginRight = "2.2%";
                cit[1].style.width = "50%";
                
                cit[2].style.width = "50%";
                cit[2].style.marginLeft = "2.2%";
                cit[3].style.width = "50%";
                
                cit[4].style.width = "50%";
                cit[4].style.marginRight = "2.2%";
                cit[5].style.width = "50%";
                
                cit[6].style.width = "50%";
                cit[6].style.marginLeft = "2.2%";
                cit[7].style.width = "50%";

                cit[8].style.width = "50%";
                cit[8].style.marginRight = "2.2%";
                cit[9].style.width = "50%";

                cb[0].style.display = "flex";
                cb[1].style.display = "flex";
                cb[2].style.display = "flex";
                cb[3].style.display = "flex";
                cb[4].style.display = "flex";
            }
    }
</script>
<script src="/lib.js"></script>
</html>