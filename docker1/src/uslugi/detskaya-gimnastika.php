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

req_rooted("detskaya","gimnastika");

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
    <title>Детская гимнастика</title>
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
                    btn2.innerHTML='<div id="canvas"><canvas class="canva"></canvas></div>' ;
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
        <hh1>Детская гимнастика</hh1>
    </div>
    <div class="content" style="padding-bottom: 1%;">
            <div class="content-w">
                <div class="c-body" style="display: flex; margin-bottom: 15%; align-items:center">
                    <div class="c-item">
                        <div>
                            <article style="font-size: 16px">
                            Сложно переоценить положительное влияние гимнастических упражнений на физическое и
                            эмоциональное развитие детей. На начальном этапе мы стараемся вызвать у ребенка интерес к
                            занятиям, не допуская переутомления начинающего спортсмена). В будущем это поможет ему
                            быстрее адаптироваться к спортивным нагрузкам, полюбить тренировочный процесс.
                            <br><br>
                            <b id="blue">Чем полезна гимнастика?</b>
                            <br>
                            Выполнение первых физических упражнений педиатры рекомендуют проводить с детьми уже со 2-й недели жизни. Благодаря
                            движению ребенок знакомится с окружающим миром и возможностями своего тела.
                            </article>
                        </div>
                    </div>
                    <div class="c-item">
                        <img style="width: 100%;" src="/res/501dcd801d9d898029d2.webp">
                    </div>
                </div>

                <div class="c-body" style="display: flex;flex-direction: row-reverse; margin-bottom: 15%; align-items:center">
                    <div class="c-item">
                        <div>
                            <article style="font-size: 16px">
                            <b id="blue">ТОП-8 полезных свойств гимнастических упражнений для ребенка можно представить следующим образом:</b>
                            <ul style="display: block" class="ul16">
                                <li>Полноценное физическое развитие, освоение необходимых двигательных навыков. В результате укрепляются мышцы всего тела, формируется координация движений.
                                </li>
                                <li>Развитие крупной и мелкой моторики. Физические упражнения улучшают восприятие информации сенсорным путем.
                                </li>
                                <li>Комплексное оздоровление организма. Занятия благотворно влияют на формирование стойкого иммунитета, развитие центральной нервной системы, сердечно-сосудистой и дыхательной систем.
                                </li>
                                <li>Интеллектуальное и эмоциональное становление. Гимнастика дает детям много новой интересной информации и ярких впечатлений.
                                </li>
                                <li>Формирование логики, мышления, укрепление памяти. Во время тренировок ребенок запоминает новые упражнения, осмысливает их.
                                </li>
                                <li>Полноценный здоровый сон, как результат двигательной активности и получения массы новых положительных впечатлений.
                                </li>
                                <li>Если занятия проходят с родителями, большим плюсом является взаимодействие с родителями, что благоприятно влияет на психоэмоциональное состояние детей.
                                </li>
                                <li>Ребенок учится адаптироваться в больших коллективах, знакомиться с новыми людьми.
                                </li>
                            </ul>
                            </article>
                        </div>
                    </div>
                    <div class="c-item" style="margin-top: auto; margin-bottom: auto">
                        <img style="width: 100%" src="/res/1648670444_34-sporti.webp">
                    </div>
                </div>

                <div class="c-body" style="display: flex; margin-bottom: 15%; align-items:center">
                    <div class="c-item">
                        <div>
                            <article style="font-size: 16px; margin-right: 5%">
                            <b id="blue">
                                Общеразвивающая детская гимнастика
                                <br><br>
                                Гимнастические упражнения для начинающих мы подбираем, опираясь на следующие
                                принципы:
                            </b>
                            <ul style="display: block" class="ul16">
                                <li>Упражнения должны отвечать назначению комплекса.
                                </li>
                                <li>Комплекс необходимо составить так, чтобы он воздействовал на все группы мышц, обеспечивая всестороннее физическое развитие занимающихся.
                                </li>
                                <li>Упражнения должны соответствовать возрасту, полу и физической подготовленности детей.
                                </li>
                                <li>Приемы обучения гимнастическим упражнениям меняются в зависимости от возраста детей. В 1-й год жизни занятия проводятся
                                при помощи взрослого. К концу года самостоятельность ребенка возрастает. Часть упражнений он начинает выполнять,
                                опираясь на предметы. В этом возрасте важно интересно и ярко изобразить действие, которое необходимо сделать, поддержать
                                малыша словом и улыбкой.
                                </li>
                            </ul>
                            <b id="blue">В младшем и среднем дошкольном возрасте обучение технике упражнений сопровождается:</b>
                            <ul style="display: block" class="ul16">
                                <li>Показом.
                                </li>
                                <li>Имитацией.
                                </li>
                                <li>Зрительными и слуховыми приемами.
                                </li>
                                <li>Словесными ориентирами.
                                </li>
                            </ul>
                            </article>
                        </div>
                    </div>
                    <div class="c-item">
                        <img style="width: 100%;" src="/res/noroot2.png">
                    </div>
                </div>

                <div class="c-body" style="display: flex;flex-direction: row-reverse; margin-bottom: 15%; align-items:center">
                    <div class="c-item">
                        <div>
                            <article style="font-size: 16px">
                            <b id="blue">Как начать заниматься?</b>
                            <br>
                            Начав проводить тренировки с ребенком, важно постепенно превратить их в традицию, интересную
                            игру. Нагрузку рекомендуется увеличивать медленными темпами. Переутомлять ребенка
                            недопустимо. Упражнения должны выполнять свою основную задачу: помочь организму проснуться и
                            получить заряд бодрости.
                            <br><br>
                            Со временем дети привыкают к физическим нагрузкам, с удовольствием занимаются спортом,
                            становясь при этом более гибкими, здоровыми и жизнерадостными.
                            <br><br>
                            Спортивная одежда не должна стеснять движений во время занятий и должна быть изготовлена из
                            натуральных «дышащих» материалов.
                            </article><br>
                            <a href="/prays.php"><button class="btn-req" style="margin-top: 5%;">Стоимость</button></a>
                        </div>
                    </div>
                    <div class="c-item" style="margin-top: auto; margin-bottom: auto">
                        <img style="width: 100%" src="/res/photo.jpg">
                    </div>
                </div>

                <center>
                <b1>Наши Преимущества:</b1>
            </center>
                <div class="cont1">
                <div id="cont1-i">
                    <div>
                    <img id="img-l" src="/res/bespl-z.png"><br>
                    <b>Персональная программа занятий</b>
                    <p>Индивидуальная стратегия и постоянное сопровождение специалиста.</p>
                    </div>
                </div>
                <div id="cont1-i">
                    <div>
                        <img id="img-l" src="/res/poborot-handry-i-dep.webp"><br>
                        <b>Эффективное восстановление</b>
                        <p>Лечим причины, а не симптомы. Организм восстанавливается за счет естественной регенерации.</p>
                        </div>
                </div>
                <div id="cont1-i">
                    <div>
                        <img id="img-l" src="/res/sert-tr.png"><br>
                        <b>Дипломированные специалисты</b>
                        <p>Все наши специалисты имеют медицинское образование и опыт более 5 лет в сфере физической реабилитации и ЛФК.</p>
                        </div>
                </div>
                <div id="cont1-i">
                    <div>
                        <img id="img-l" src="/res/sobstv-tr.png"><br>
                        <b>Собственная методика занятия</b>
                        <p>Тренировки проводятся по авторскому методу Алексея Пташкина.</p>
                        </div>
                </div>
                <div id="cont1-i">
                    <div>
                        <img id="img-l" src="/res/bez-abon.png"><br>
                        <b>Занятия без абонемента</b>
                        <p>Вы бронируете время и приходите, когда вам удобно. Оплачиваете только занятия.</p>
                        </div>
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

                cb[0].style.display = "block";
                cb[1].style.display = "block";
                cb[2].style.display = "block";
                cb[3].style.display = "block";
            } else{
                cit[0].style.width = "50%";
                cit[0].style.marginRight = "2.2%";
                cit[1].style.width = "50%";
                
                cit[2].style.width = "50%";
                cit[2].style.marginLeft = "2.2%";
                cit[3].style.width = "50%";
                
                cit[4].style.width = "50%";
                cit[4].style.marginLeft = "2.2%";
                cit[5].style.width = "50%";

                cit[6].style.width = "50%";
                cit[6].style.marginLeft = "2.2%";
                cit[7].style.width = "50%";

                cb[0].style.display = "flex";
                cb[1].style.display = "flex";
                cb[2].style.display = "flex";
                cb[3].style.display = "flex";
            }
    }
</script>
<script src="/lib.js"></script>
</html>