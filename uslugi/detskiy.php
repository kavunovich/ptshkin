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

req_rooted("detskiy","massage");

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
    <title>Детский массаж</title>
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
    <div class="foot" style="padding: 10px">
        <hh1>Детский массаж</hh1>
    </div>
    <div class="content" style="padding-bottom: 1%">
            <div class="content-w">
                <div class="c-body" style="display: flex;margin-bottom: 15%; align-items:center">
                    <div class="c-item">
                        <div>
                            <article style="font-size: 16px">
                                <b id="blue">Важно знать для будущих и настоящих мам - детский массаж, основные приемы и противопоказания. А также как выбрать хорошего специалиста который понравится ребенку.</b>
                                <br><br>
                                Рождение нового человека — это стресс и для матери, и для ребенка. Покидая обжитое за 9
                                месяцев место, малыш наряду с душевной травмой зачастую получает и физическую. Родовую
                                травму в большей или меньшей степени приобретает каждый новорожденный. Нежные, ласковые
                                материнские руки помогут ребенку быстрее адаптироваться в нашем мире, улучшат его
                                эмоциональное состояние, быстрее научат управлять своим телом.
                                <br><br>
                                Легкое поглаживание, растирание и разминание конечностей - это и будет первый массаж,
                                который необходимо делать с первых дней рождения.
                                <br><br>
                                До 5 недель Детские педиатры рекомендуют в течение этого периода по нескольку раз в день
                                маме делать ребенку массаж. Для большей уверенности в себе можно посмотреть обучающее
                                видео. Для первых 5 недель это будет легкое поглаживание по спинке, животику, разгибание
                                и сгибание ручек, ножек, пальчиков, легкое разминание стопы и пяточек.
                                <br><br>
                                Простые поглаживания по ходу кровеносных сосудов, никаких похлопываний и поколачиваний,
                                особенно в области почек. В положении лежа на спине также легкое поглаживание -
                                обходимо, не трогаем район печени и половые органы. Ножки гладим от стопы, коленные
                                чашечки не трогаем. Когда гладим спинку, позвоночный столб также не трогаем.
                                <br><br>
                                Такое общение матери и ребенка заложено самой природой и не имеет никаких
                                противопоказаний. Находите больше времени, это поможет в будущем избежать проблем со
                                здоровьем.
                            </article>
                        </div>
                    </div>
                    <div class="c-item">
                        <img style="width: 100%" src="/res/newborn-baby_massage.jpg">
                    </div>
                </div>

                <div class="c-body" style="display: flex;flex-direction: row-reverse; margin-bottom: 15%; align-items:center">
                    <div class="c-item">
                        <div>
                            <article style="font-size: 16px">
                            Массаж - это мощная профилактика многих заболеваний. После 5 недель. В этот период жизни
                            ребенка нужно обратиться к профессиональным массажистам. Не стоит затягивать, именно сейчас
                            можно исправить травмы, нанесенные ребенку во время родов.
                            <br><br>
                            Хороший специалист поможет решить проблемы в работе желудка, кишечного тракта, в работе
                            опорно-двигательной системы, исправит искривление позвоночника, нормализует внутричерепное
                            давление. Различные вывихи, которые ребенок получает в первые минуты своего рождения. Все
                            это лучше наладить и нормализовать в начальный период жизни человека.
                            <br><br>
                            Массажные процедуры имеют комплексный эффект. Так, детский массаж обеспечивает крепкий,
                            безмятежный сон, только не рекомендуется делать его перед самым сном. Это вызывает
                            эмоциональный подъем и улучшает настроение малыша.
                            <br><br>
                            Массаж создает максимально гармоничное психологическое состояние для жизни ребенка в самом
                            раннем возрасте. Решает одну из основных причин раздражения и болевых ощущений – колики,
                            настраивает работу желудка и кишечника.
                            <br><br>
                            Детский массаж является лучшим средством, которое повышает аппетит, укрепляет мышцы,
                            благотворно влияет на общее состояние малыша. Поэтому, если ребенок плохо спит или часто
                            беспричинно (как вам кажется) капризничает, тогда массаж – одно из первых средств, которое
                            стоит попробовать.
                            </article>
                        </div>
                    </div>
                    <div class="c-item" style="margin-top: auto; margin-bottom: auto">
                        <img style="width: 100%" src="/res/noroot3.png">
                    </div>
                </div>

                <div class="c-body" style="display: flex;margin-bottom: 15%; align-items:center">
                    <div class="c-item">
                        <div>
                            <article style="font-size: 16px">
                                <b id="blue">Выбор специалиста</b>
                                <br><br>
                                При выборе специалиста нужно руководствоваться несколькими правилами.
                                <br><br>
                                <i>Первое</i> - наличие документов, удостоверяющих квалификацию.
                                <br><br>
                                <i>Второе важное условие</i> — это способность специалиста находить контакт с ребенком.
                                Смотрите за реакцией ребенка, не подвергайте его дополнительному стрессу. Лучше
                                озаботиться поиском другого массажиста, чем душевно травмировать малыша.
                                <br><br>
                                <b id="blue">Противопоказания</b>
                                <br>
                                В ряде случаев стоит временно отказаться от проведения массажа:
                                <ul class="ul16">
                                    <li>
                                        высокая температура
                                    </li>
                                    <li>
                                        воспалительные процессы
                                    </li>
                                    <li>
                                        кожные высыпания
                                    </li>
                                </ul>
                                <b id="blue">И есть ряд заболеваний, при которых массаж полностью противопоказан:</b>
                                <ul class="ul16">
                                    <li>атрофия</li>
                                    <li>ломкость костей</li>
                                    <li>рахит</li>
                                    <li>острый артрит</li>
                                    <li>туберкулез</li>
                                    <li>порок сердца</li>
                                    <li>острый нефрит</li>
                                    <li>грыжи</li>
                                </ul>
                                <b id="blue">В любом случае, прежде чем принять решение, сначала проконсультируйтесь со своим лечащим детским врачом.</b>
                            </article>
                            <a href="/prays.php"><button class="btn-req" style="margin-top: 5%">Стоимость</button></a>
                        </div>
                    </div>
                    <div class="c-item">
                        <img style="width: 100%" src="/res/photo_2023-01-08_03-.jpg">
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
                cit[2].style.marginLeft = "0";
                cit[3].style.width = "100%";

                cit[4].style.width = "auto";
                cit[4].style.marginRight = "0";
                cit[5].style.width = "100%";

                cb[0].style.display = "block";
                cb[1].style.display = "block";
                cb[2].style.display = "block";
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

                cb[0].style.display = "flex";
                cb[1].style.display = "flex";
                cb[2].style.display = "flex";
            }
    }
</script>
<script src="/lib.js"></script>
</html>