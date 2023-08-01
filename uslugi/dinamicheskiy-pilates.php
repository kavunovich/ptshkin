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

req_rooted("dinamicheskiy","pilates");

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
    <title>Динамический пилатес</title>
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
        <hh1>Динамический пилатес</hh1>
    </div>
    <div class="content" style="padding-bottom: 1%;">
            <div class="content-w">
                <div class="c-body" style="display: flex; margin-bottom: 50px">
                    <div class="c-item">
                        <div>
                            <article style="font-size: 16px">
                            Динамический пилатес в полной мере задействует практически все мышцы, включая
                            мышцы-стабилизаторы. Во время занятия будет использоваться разнообразная нагрузка, в
                            основном с использованием веса собственного тела.
                            <br><br>
                            За счет использования оборудования мы активно тренируем вестибулярный аппарат, координацию
                            движения, силу и выносливость.
                            <br><br>
                            Один из самых интересных видов оборудования в пилатесе — это реформер. Именно он позволяет
                            выполнять практически неограниченный спектр упражнений.
                            </article><br>
                        </div>
                    </div>
                    <div class="c-item" style="vertical-align: top;">
                        <img style="width: 100%; margin-bottom: 25%;" src="/res/12.png">
                    </div>
                </div>

                <div class="c-body" style="display: flex;flex-direction: row-reverse">
                    <div class="c-item">
                        <div>
                            <article style="font-size: 16px">
                            Можно совместить силовую работу, развитие выносливости, укрепление мышц стабилизаторов. А
                            также скорректировать координацию движения, помочь в физической реабилитации.
                            <br><br>
                            Занятие проходит почти без пауз, что создает впечатление целостности и непрерывности. Время
                            пролетает незаметно для вас, но с огромной пользой для вашего тела.
                            <br><br>
                            <b id="blue">Какой результат вы получите?</b><br>
                            При активных занятиях изменения вы сможете почувствовать уже через неделю. Осанка станет ровнее, а мышцы — суше, их тонус нормализуется. Выносливость увеличится, а все основные функции организма улучшат свою деятельность.
                            </article><br>
                            <a href="/prays.php"><button class="btn-req" style="margin-top: 5%; margin-bottom: 25%;">Стоимость</button></a>
                        </div>
                    </div>
                    <div class="c-item" style="margin-top: auto; margin-bottom: auto">
                        <img style="width: 100%; margin-bottom: 25%;" src="/res/24.png">
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

                cb[0].style.display = "block";
                cb[1].style.display = "block";
            } else{
                cit[0].style.width = "50%";
                cit[0].style.marginRight = "2.2%";
                cit[1].style.width = "50%";
                
                cit[2].style.width = "50%";
                cit[2].style.marginLeft = "2.2%";
                cit[3].style.width = "50%";

                cb[0].style.display = "flex";
                cb[1].style.display = "flex";
            }
    }
</script>
<script src="/lib.js"></script>
</html>