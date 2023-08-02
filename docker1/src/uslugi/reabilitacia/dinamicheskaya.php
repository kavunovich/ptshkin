<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include($root . '/lib.php');
$success = null;
if(empty($_COOKIE["message"])){
    $result = "";
    $true = false;
} else {
    $result = $_COOKIE["message"];
    $true = true;
    setcookie("message", "", time() + 60 * 60 * 24 * 365 * 10);
}
try {
    function start() {
        $type = "dinamicheskaya";

        if (!empty($_GET)) {
            $root = $_SERVER['DOCUMENT_ROOT'];
            // $ip = $_SERVER['REMOTE_ADDR'];
            $ip = file_get_contents('http://api.ipify.org');

            define('ids', ($root . '/i2VDjbe4_ZNXhiFYVBN_v@!p-8feYv@V/id.txt'));

            $data = array(
                $ip => array("name" => $_GET["name"], "phone" => $_GET["phone"], "bday" => $_GET["bday"], "dreq" => date("Y.m.d"), "type" => $type)
            );

            if (!file_exists($root . "/Requests/" . $ip . "/")) {
                mkdir($root . "/Requests/" . $ip . "/", 0777, true);
            }
            
            if (!str_contains(file_get_contents(ids), $ip)) {

                if (empty($_COOKIE["ready"]) || !file_get_contents(ids)) {
                    $baseid = fopen($root . "/i2VDjbe4_ZNXhiFYVBN_v@!p-8feYv@V/id.txt", 'r');
                    while (!feof($baseid)) {
                        $ids = fgets($baseid);
                        if (strlen($ids) > 0) {
                            $id = explode(',', $ids, 10000);
                            $inner_insert = $ids . "," . $ip;
                            setcookie("ready", "true", time() + 60 * 60 * 24 * 365 * 10);
                            header("Refresh:0");
                        } else {
                            $id = $ip;
                            $inner_insert = $id;
                            setcookie("ready", "true", time() + 60 * 60 * 24 * 365 * 10);
                            header("Refresh:0");
                        }
                    }
                    fclose($baseid);
                    $baseidset = fopen($root . "/i2VDjbe4_ZNXhiFYVBN_v@!p-8feYv@V/id.txt", 'w');
                    fwrite($baseidset, $inner_insert);
                    fclose($baseidset);
                } else {
                    $success = true;
                    $baseinsert = fopen($root . "/Requests/" . $ip . "/" . "reabilitacia" . ".json", 'w') or die;
                    $inner_insert = json_encode($data);
                    fwrite($baseinsert, $inner_insert);
                    fclose($baseinsert);
                    setcookie("message", '<div class="gmess">Успешно отправлено.</div>', time() + 60 * 60 * 24);
                }
            } else{
                $baseinsert = fopen($root . "/Requests/" . $ip . "/" . "reabilitacia" . ".json", 'w') or die;
                $inner_insert = json_encode($data);
                fwrite($baseinsert, $inner_insert);
                fclose($baseinsert);
                setcookie("message", '<div class="gmess">Успешно отправлено.</div>', time() + 60 * 60 * 24);
                
                header('Location: ' . strtok($_SERVER['REQUEST_URI'], '?'));
            }
        }
}
start();
} catch (Exception $e) {
    echo 'Не удалось получить результат из левой части. Уведомите ближайшему или же самому разработчику сайта. Извените за неудобства.';
}
?>
<!DOCTYPE html>
<html>
    <head>        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="google-site-verification" content="pKtbCFLuVig1X6R_hgSxv2K3u3aSViz-5Al-5w6NSw">

        <meta name="description" content="Оздоровительный центр реабилитации в Москве «ONE training»">
        <meta property="og:url" content="https://one-training.ru">
        <meta property="og:title" content="Оздоровительный центр реабилитации в Москве «ONE training»">
        <meta property="og:description" content="Оздоровительный центр реабилитации в Москве «ONE training»">
        <meta property="og:type" content="website">
        <meta property="og:image" content="res/photohd.jpg">
        <link rel="canonical" href="https://one-training.ru">

        <link rel="shortcut icon" href="/favicon/photo4.png" type="image/x-icon">
        <link rel="apple-touch-icon" href="/favicon/photo4.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/favicon/faviconV2.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/favicon/photo3.png">
        <link rel="apple-touch-startup-image" href="/favicon/photo3.png">
        <meta name="msapplication-TileColor" content="#000000">
        <meta name="msapplication-TileImage" content="favicon/photo2.png">
        
        <script type="text/javascript" src="https://mc.yandex.ru/metrika/watch.js"></script>
        <script src="https://www.googletagmanager.com/gtm.js?id=GTM-WWN65KM"></script>
        <script src="https://www.google-analytics.com/analytics.js"></script>
        <script src="https://mc.yandex.ru/metrika/tag.js"></script>

        <link rel="icon" type="image/x-icon" href="/favicon/faviconV2.png"/>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="/lib.css">
        <meta name="viewport" content="width=device-width,initial-scale=0.9,user-scalable=0">
        <title>Динамическая реабилитация</title>
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
        <div class="lb" style="background: #00b5cc; margin-top: 75px; padding-bottom: 0">
            <div class="content-w">
                <div class="lb-i">
                    <h1 style="color: white; font-size: 36px">ДИНАМИЧЕСКАЯ РЕАБИЛИТАЦИЯ</h1>
                    <h1 style="font-size: 24px">устраняем боль, восстанавливаем после травм и операций</h1>
                    <div style="font-size: 18px">
                        Для избежания возможных негативных последствий, которые могут проявиться даже через несколько лет, любая травма или операция требует своевременной реабилитации в начальный период.
                    </div>
                    <button class="btn-req btn-req3" style="margin-top: 5%; margin-bottom: 25%">ЗАПИСАТЬСЯ</button>
                </div>
                <div class="lb-i">
                    <img src="/res/13.png" style="width: 100%; height: 100%" id="bannerr">
                </div>
            </div>
        </div>
        <div class="content">
            <div class="content-w">
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
              <hr style="position: absolute;left: 0;right: 0;background-color: #e6e6e6; border: 0;height: 1px">

            <div class="container nobr">
                <div class="reversed">
                    <img src="/res/12.webp" class="imgnobr" style="width:150px;float:right; margin: 0; margin-left: 20px">
                    <div style="height: auto; display: flex; align-items: center; font-size: 16px; line-height: 1.55">
                        <div>
                            Лечебная физкультура — это мощный стимулятор жизненных функций организма. Наши упражнения
                            направленно воздействуют на
                            органы и ткани, способствуют активации обмена веществ, улучшению кровообращения, уменьшению
                            застойных явлений и
                            повышению настроения. Цель нашей реабилитации — с помощью комплекса специальных средств и
                            упражнений
                            восстановить
                            нарушенные функции организма, быстрее вернуть утраченное здоровье, возможность полноценно
                            жить и
                            работать. Кому
                            подойдёт?

                            <h4 id="blue">Всем, кому требуется:</h4>
                            <ul style="display: block">
                                <li>Улучшение своего физического состояния до или после операции.
                                </li>
                                <li>Восстановление после травмы.
                                </li>
                                <li>Лечение последствий хронических травм и других проблем.
                                </li>
                                <li>Возвращение в тренировочный процесс после длительного перерыва.
                                </li>
                                <li>Восстановление после родов, особенно в случае осложнений.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <hr style="position: absolute;left: 0;right: 0;background-color: #e6e6e6; border: 0;height: 1px">

            <div class="container nobr">
                <div class="reversed">
                    <img src="/res/13.webp" class="imgnobr" style="width:150px;float:right">
                    <div style="height: auto; display: flex; align-items: center; font-size: 16px; line-height: 1.55">
                        <div>
                            <h4>Первый шаг — создание индивидуальной программы для вас.</h4>
                            <p>Для этого персональный реабилитолог проведет первоначальную оценку вашего состояния здоровья, возможностей и целей.</p>

                            <h4 id="blue">Что будет на занятии?</h4>
                            <ul style="display: block">
                                <li>Всё очень индивидуально. Программа каждого человека будет совершенно иной.
                                </li>
                                <li>Участвуют несколько специалистов, что позволяет быстрее достигать целей. Используется различное подходящее оборудование, исходя из выбранной программы.
                                </li>
                            </ul>
                            <br>
                            <h4 id="blue">Какой результат вы получите?</h4>
                            Комплексное улучшение здоровья. Для максимального эффекта мы предлагаем посещать эти занятия регулярно: три или два раза в неделю в течение 6 недель.
                            <br>
                            <a href="/prays.php"><button class="btn-req" style="margin-top: 5%; margin-bottom: 0%">Стоимость</button></a>
                        </div>
                    </div>
                </div>
                <hr style="position: absolute;left: 0;right: 0;background-color: #e6e6e6; border: 0;height: 1px; margin: 0">
            </div>
            </div>
        </div>
        <center>
            <b1>
                Отзывы пациентов
                <iframe src="https://yandex.ru/sprav/widget/rating-badge/147581867929?type=rating" width="150" height="50" frameborder="0" style="vertical-align: middle"></iframe>
            </b1>
        </center>
        <div class="content">
            <div id="videos">
            <div class="videos"></div>
            </div>
        </div>
        <div class="footeer">
            <iframe src="/footer.html" class="fot" style="width: 100%; position: absolute; border: none;" scrolling="no"></iframe>
        </div>
    </div>
</body>
<script>
    var iframe = document.querySelector("iframe");
    var oval = document.querySelector(".oval");
    var ycw = document.querySelector(".yclientw");
    var lb = document.querySelector(".content-w");
    var bannerr = document.querySelector("#bannerr");
    var lb_i = document.querySelectorAll(".lb-i");
    var btn = document.querySelector(".btn-req");
    var exit = document.querySelector(".exit");
    var book = document.querySelector(".book");
    var booki = document.querySelector(".book-i");
    var nobrimg = document.querySelectorAll(".imgnobr");
    var reversed = document.querySelectorAll(".reversed");
    var container = document.querySelector(".container");

    var content = document.querySelector(".content");
    var avideo = document.querySelector('.videos');
    var videos = ["72AHc5YSC0c","3sEwlfn5Yd4", "CyoBjfCtKj4", "g64yMb8Ji0s", "s2ZtrWkBlYo", "syVq_0Oka-I", "OSN0RNws91M", "zFMVpKss4IY", "WA4RtogYf74", "2YVzHsj7OXA", "6zBbY5P7XqY", "OqC6lrJiO5E", "eIeQwri1crw", "AD24KMJUwQg", "IRHL9w9fPgc", "beW3_ZcFZUw", "JHXJqrQ2ZGY", "0l3DOOMpzhE"];
    
    var ylink = "https://b180684.yclients.com/company/183648/record-type?gcid=2018860734.1685372382&referrer=https:%2F%2Fone-training.ru%2F&o=";
    var be = true;
    var d = 0;
    btn.onclick = function() {
        book.style.display = "flex";

        if(window.innerWidth > 1000) {
            document.documentElement.style.overflow = "hidden";
            exit.style.right = booki.offsetLeft + "px";
            exit.style.top = booki.offsetTop - 30 + "px";
        }
        const inputElement = document.querySelector('#phone');
        inputElement.addEventListener('keydown',enforceFormat);
        inputElement.addEventListener('keyup',formatToPhone);
    }
    <?php if ($true) {echo <<<END
        setTimeout(() => {
        book.style.display = "flex";

        if(window.innerWidth > 1000) {
            document.documentElement.style.overflow = "hidden";
            exit.style.right = booki.offsetLeft + "px";
            exit.style.top = booki.offsetTop - 30 + "px";
        }
        const inputElement = document.querySelector('#phone');
        inputElement.addEventListener('keydown',enforceFormat);
        inputElement.addEventListener('keyup',formatToPhone);
        }, 100);
        END;}$true = false;?>
    
    exit.onclick = function() {
        book.style.display = "none";
        document.documentElement.style.overflow = "auto";
    }
    
    oval.onclick = function() {
        if (window.innerWidth > 1000) {
            ycw.src = ylink;
            ycw.style.display = "block";
            ycw.style.width = "600px";
            ycw.style.height = window.innerHeight + "px";
            d = 1;
        } else(window.location.href = ylink);
    }

    reversed[0].style.display = "flex";
    reversed[1].style.display = "flex";

    function mode() {
        modedef();
        if(be){
            for(let i = 0; i < 9; i++){
            var video = document.createElement("div");
            var link = document.createElement("a");
            video.setAttribute("class", "video");
            link.setAttribute("href", `https://www.youtube.com/watch?v=${videos[i]}`);
            link.setAttribute("target", `_blank`);
            let url = `url("https://img.youtube.com/vi/${videos[i]}/0.jpg")`;
            video.style.backgroundImage = "linear-gradient(to top, transparent, rgba(0, 0, 0, 0.7))," + url;
            link.appendChild(video)
            avideo.appendChild(link);
            let width = video.clientWidth;
            video.style.height = `${width * (16/9)}px`;
            }
            var videol = document.querySelectorAll(".video");
            for(let i = 0; i < videol.length; i++){
                fetch(`https://www.googleapis.com/youtube/v3/videos?id=${videos[i]}&key=AIzaSyDR2RrpBp4_wUgLoItTLDtBkEvXzrUDuV0&part=snippet`)
                .then(response => response.json())
                .then(data => {
                let title = data.items[0].snippet.title;
                videol[i].innerHTML = `
                ${title}
                <div style="position: absolute; bottom: 0; opacity: 0.5; margin-right: 20px">
                    <p>Нажмите чтобы воспроизвести</p>
                </div>`;
                })
                .catch(error => console.error(error));
            }
            be = false;
            }
        
        book.style.height = "calc(100vh + 75px)";
        if(window.innerWidth < 1200) {
                lb.style.display = "block";
                lb.style.height = "auto";
                lb_i[0].style.width = "100%";
                lb_i[1].style.height = "100%";
                lb_i[0].style.textAlign = "center";
                lb_i[1].style.width = "100%";
                lb_i[1].style.display = "flex";
                lb_i[1].style.maxWidth = "100%";
                lb_i[1].style.justifyContent = "center";
                bannerr.style.height = "500px";
                bannerr.style.width = "400px";
                btn.style.marginBottom = "0";

                for (let i = 0; i < nobrimg.length; i++) {
                    nobrimg[i].style.width = "100%";
                }
                reversed[0].style.flexDirection = "column-reverse";
                reversed[01].style.flexDirection = "column-reverse";
                container.style.display = "block";

                exit.style.right = "5%";
                exit.style.top = "calc(5% + 75px)";
            } else{
                lb.style.display = "flex";
                lb.style.height = "500px";
                lb_i[0].style.width = "60%";
                lb_i[0].style.textAlign = "left";
                lb_i[1].style.maxWidth = "400px";
                bannerr.style.transform = "translateY(0)";
                bannerr.style.height = "500px";
                lb_i[1].style.height = "500px";
                btn.style.marginBottom = "25%";

                for (let i = 0; i < nobrimg.length; i++) {
                    nobrimg[i].style.width = "50%";
                }
                reversed[0].style.flexDirection = "row-reverse";
                reversed[1].style.flexDirection = "row";
                container.style.display = "flex";
            }

            if(window.innerWidth > 1000){
                exit.style.right = booki.offsetLeft + "px";
                exit.style.top = booki.offsetTop - 30 + "px";
            }
    }
</script>
<script src="/lib.js"></script>
</html>