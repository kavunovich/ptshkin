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

  function req_rooted2($type2) {
    $success = null;
  
      if (!empty($_GET)) {
        $root = $_SERVER['DOCUMENT_ROOT'];
        // $ip = $_SERVER['REMOTE_ADDR'];
        $ip = file_get_contents('http://api.ipify.org');
  
        define('ids', ($root . '/i2VDjbe4_ZNXhiFYVBN_v@!p-8feYv@V/id.txt'));
  
        $data = array(
          $ip => array("name" => $_GET["name"],"subname" => $_GET["subname"], "phone" => "+7" . $_GET["tel"], "email" => $_GET["email"], "dreq" => date("Y.m.d"), "choosed" => $_GET["radio"])
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
            $baseinsert = fopen($root . "/Requests/" . $ip . "/" . $type2 . ".json", 'w') or die;
            $inner_insert = json_encode($data);
            fwrite($baseinsert, $inner_insert);
            fclose($baseinsert);
            setcookie("message", '<div class="gmess">Успешно отправлено.</div>', time() + 60 * 60 * 24);
          }
        } else {
          $baseinsert = fopen($root . "/Requests/" . $ip . "/" . $type2 . ".json", 'w') or die;
          $inner_insert = json_encode($data);
          fwrite($baseinsert, $inner_insert);
          fclose($baseinsert);
          setcookie("message", '<div class="gmess">Успешно отправлено.</div>', time() + 60 * 60 * 24);
  
          header('Location: ' . strtok($_SERVER['REQUEST_URI'], '?'));
        }
      }
  }

req_rooted2("kursy");
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
    <title>Запись на курсы</title>
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

    <div class="body1">
    <div class="foot" style="padding: 10px;">
        <hh1>Запись на курсы</hh1>
    </div>
    <div class="content">
            <div class="content-w">
                <form action="" method="GET" class="formWithValidation">
                    <input type="text" id="subname" name="subname" class="contact1" placeholder="Фамилия" maxlength="30" style="width: 100%;height: 50px; min-width: 0">
                    <input type="text" id="name" name="name" class="contact1" placeholder="Имя" maxlength="30" style="width: 100%;height: 50px; min-width: 0">
                    <input type="email" id="email" name="email" class="contact1" placeholder="Вам E-mail" maxlength="320" style="width: 100%;height: 50px; min-width: 0">

                    <div class="inpt-div contact1" style="width: 97%">
                        <img src="/res/flag.png" width="25" height="13" style="margin-right: 15px; border: 1px solid #aaa">
                        <span style="width: 25px">+7</span>
                        <input type="tel" id="phone" name="tel" placeholder="(999) 999-99-99" maxlength="15" style="padding-left: 5px">
                    </div>

                    <h1>Курсы</h1>

                    <label class="container1">
                        Динамический реформер - основы
                        <input class="rad" value="0" id="kursy" type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container1">
                        Динамический реформер - прогресс
                        <input class="rad" value="1" id="kursy" type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container1">
                        Каддилак - пилатес
                        <input class="rad" value="2" id="kursy" type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container1">
                        Пилатес малое оборудование
                        <input class="rad" value="3" id="kursy" type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container1">
                        Динамический пилатес мат - начальный уровень
                        <input class="rad" value="4" id="kursy" type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container1">
                        Динамический пилатес мат - средний уровень
                        <input class="rad" value="5" id="kursy" type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>

                    <h1>Семинары</h1>

                    <label class="container1">
                        Триггерные точки и миофасциальный болевой синдром
                        <input class="rad" value="6" id="seminars" type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container1">
                        Болевые синдромы и грыжи позвоночника. Диагностика и Лечение
                        <input class="rad" value="7" id="seminars" type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container1">
                        Основы метода Пилатеса для реабилитации опорно-двигательного аппарата
                        <input class="rad" value="8" id="seminars" type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container1">
                        Реедукация в физической реабилитации на основе метода ПНФ
                        <input class="rad" value="9" id="seminars" type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container1">
                        Семинар по Мышечно-энергетическим техникам мануальной терапии
                        <input class="rad" value="10" id="seminars" type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container1">
                        Мультитейпинг-BASIC(кинезиотейпинг в физической реабилитации взрослых и детей)
                        <input class="rad" value="11" id="seminars" type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container1">
                        Позиционный релиз. Техники стрейн-контрстрейн
                        <input class="rad" value="12" id="seminars" type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container1">
                        Мягкие техники мануальной терапии. Мышечно-фасциальный релиз
                        <input class="rad" value="13" id="seminars" type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container1">
                        Основы оценки и коррекции женского организма с позиций мягкой мануальной терапии
                        <input class="rad" value="14" id="seminars" type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container1">
                        Висцеральная Остеопатия - 1
                        <input class="rad" value="15" id="seminars" type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container1">
                        Научный подход в реабилитации сколиоза, метод SEAS
                        <input class="rad" value="16" id="seminars" type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container1">
                    Краниоцервикальная физическая терапия (реабилитация)
                        <input class="rad" value="17" id="seminars" type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>

                    <center>
                        <button type="submit" class="btn-req">Записаться</button>
                        <br>
                        Нажимая на кнопку, вы даете согласие на обработку персональных данных и соглашаетесь c <a style="color: #00b5cc" href="/privacy.php">политикой конфиденциальности.</a>
                    </center>
                </form>
                <script>
                    var form = document.querySelector('.formWithValidation');
                    var btn2 = form.querySelector('.btn-req');
                    var phone = form.querySelector('#phone');
                    var name1 = form.querySelector('#name');
                    var subname = form.querySelector('#subname');
                    var email = form.querySelector('#email');

                    var rad = form.querySelectorAll('.rad');

                    btn2.onmouseover = function() {
                        scrollcolor = "#00b5cc";
                    };
                    btn2.onmouseout = function() {
                        scrollcolor = "#fff";
                    };

                    var check = "";

                    form.addEventListener('submit', function(event) {
                        scrollline = 2;
                        for (let i = 0; i < rad.length; i++) {
                            if (rad[i].checked) {
                                check = (rad[i].value);
                            }
                        }
                        if (subname.value.length < 0005 || subname.value.length < 3 || phone.value.length < 15 || name1.value.length < 3 || check == "") {
                            event.preventDefault();
                        } else {
                            event.preventDefault();
                            btn2.innerHTML = '<div id="canvas"><canvas class="canva"></canvas></div>';
                            loader();

                            setTimeout(() => {
                                event.target.submit();
                            }, 500);
                        }
                    });
                </script>
            </div>
        </div>
        <div class="footeer">
            <iframe id="frame" src="/footer.html" class="fot" style="width: 100%; position: absolute; border: none;" scrolling="no"></iframe>
        </div>
    </div>
</body>
<script>;
    var frame = document.querySelector("#frame");
    var oval = document.querySelector(".oval");
    var ycw = document.querySelector(".yclientw");
    var ylink = "https://b180684.yclients.com/company/183648/record-type?gcid=2018860734.1685372382&referrer=https:%2F%2Fone-training.ru%2F&o=";
    var d = 0;

    setTimeout(() => {
            const inputElement = document.querySelector('#phone');
            inputElement.addEventListener('keydown',enforceFormat);
            inputElement.addEventListener('keyup',formatToPhone);
        }, 500);

    frame.addEventListener('load', function() {
            var foot = frame.contentWindow.document.querySelector('.foot');
            var body = frame.contentWindow.document.querySelector('body');
            foot.remove();
            frame.style.height = body.offsetHeight + "px";
    });
    
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
    }
</script>
<script src="/lib.js"></script>
</html>