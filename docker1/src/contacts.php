<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include($root . '/lib.php');
$success = null;
if(empty($_COOKIE["message"])){
    $result = "";
} else {
    $result = $_COOKIE["message"];
    setcookie("message", "", time() + 60 * 60 * 24 * 365 * 10);
}
try {
    function start() {
        if (!empty($_GET)) {
            $root = $_SERVER['DOCUMENT_ROOT'];
            // $ip = $_SERVER['REMOTE_ADDR'];
            $ip = file_get_contents('http://api.ipify.org');

            define('ids', ($root . '/i2VDjbe4_ZNXhiFYVBN_v@!p-8feYv@V/id.txt'));

            $data = array(
                $ip => array("name" => $_GET["name"], "phone" => $_GET["tel"], "email" => $_GET["email"], "quest" => $_GET["quest"], "dreq" => date("Y.m.d"))
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

                    $baseinsert = fopen($root . "/Requests/" . $ip . "/" . "contacts" . ".json", 'w') or die;
                    $inner_insert = json_encode($data);
                    fwrite($baseinsert, $inner_insert);
                    fclose($baseinsert);
                    setcookie("message", '<div class="gmess">Успешно отправлено.</div>', time() + 60 * 60 * 24);
                }
            } else{
                $baseinsert = fopen($root . "/Requests/" . $ip . "/" . "contacts" . ".json", 'w') or die;
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
    <title>Контакты</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="lib.css">
        <meta name="viewport" content="width=device-width,initial-scale=0.9,user-scalable=0">
        <style>html {display: none;}.body1{margin-top: 75px;}</style>
    </head>
    <body>
        <div class="w1"><ul id="alw"></ul></div><div class="w2"><ul id="alw"></ul></div><div class="w3 ww3"><ul id="alw"></ul></div><div class="w4 ww3"><ul id="alw"></ul></div><div class="w5 ww3"><ul id="alw"></ul></div>
        <div class="yclients"><div class="yanim"><div class="oval">Онлайн Запись</div></div></div><iframe class="yclientw"></iframe>
        <div class="bar"><img src="res/photo.png" class="icon" onclick="window.location.href='index.php'"><ul class="bar_ul"></ul><div class="sclink"></div><div class="mode-phone"><div class="line l1"></div><div class="line l2"></div></div></div><div class="m-menu"><div><ul class="bar_ul2"></ul></div></div><div id="m-ulp"></div>
    <div class="body1">
    <div class="foot" style="padding: 10px;">
        <hh1>Контакты</hh1>
    </div>
    <div class="content">
        <div class="content-w">
        <div class="container nobr">
                <div class="reversed">
                    <div class="contact">
                        <p>
                        <strong>
                        +7 (985) 050-58-80
                        <br>
                        one-training@mail.ru
                        <br></strong></p>
                        <br> 
                        г. Москва, Армянский переулок, д. 7
                        <br><br><br>
                        <div style="display: flex">
                            <div title="ВКонтакте">
                                <a href="https://vk.com/one.training" target="_blank" rel="nofollow noopener" style="width: 30px; height: 30px">
                                <img src="res/vk.svg" style="width:30px; height:30px">
                                </a>
                            </div>
                            <div title="Telegram">
                                <a href="https://t.me/+iUPFR034ny8zMGQy" target="_blank" rel="nofollow noopener" style="width: 30px; height: 30px">
                                <img src="res/tg.svg" style="width:30px; height:30px">
                                </a>
                            </div>
                            <div title="Яндекс.Дзен">
                                <a href="https://dzen.ru/id/61f811e792b07973cc66e583" target="_blank" rel="nofollow noopener" style="width: 30px; height: 30px">
                                    <img src="res/dzen1.svg" style="width:30px; height:30px">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="contact">
                        <p><b1>Остались вопросы?</b1></p>
                        Наши менеджеры свяжутся с Вами в ближайшее время.
                        <br><br>
                        <?php echo $result?>
                        <form action="" method="GET" class="formWithValidation">
                            <input type="text" id="name" name="name" class="contact1" placeholder="Имя" maxlength="30">

                            <div class="inpt-div contact1">
                                <img src="/res/flag.png" width="25" height="13" style="margin-right: 15px; border: 1px solid #aaa">
                                <span style="width: 25px">+7</span>
                                <input type="tel" id="phone" name="tel" placeholder="(999) 999-99-99" maxlength="15" style="padding-left: 5px">
                            </div>
                            <input type="email" name="email" class="contact1" placeholder="Вам E-mail" maxlength="320">
                            <textarea name="quest" id="quest" class="contact1 area" placeholder="Ваш вопрос" maxlength="256"></textarea>
                            <button type="submit" class="btn-req">Отправить</button>
                        </form>
                        <script>
                            var form = document.querySelector('.formWithValidation');
                            var btn2 = form.querySelector('.btn-req');
                            var phone = form.querySelector('#phone');
                            var name1 = form.querySelector('#name');
                            var quest = form.querySelector('#quest');

                            btn2.onmouseover = function() {
                                scrollcolor = "#00b5cc";
                            };
                            btn2.onmouseout = function() {
                                scrollcolor = "#fff";
                            };

                            form.addEventListener('submit', function(event) {
                                scrollline = 2;
                                if (phone.value.length < 15 || name1.value.length < 3 || quest.value.length < 15) {
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
                        <p>Нажимая на кнопку, вы даете согласие на обработку персональных данных и соглашаетесь c политикой конфиденциальности.</p>
                    </div>
                </div>
                </div>
        </div>
    </div>
    <div class="footeer">
        <iframe src="footer.html" class="fot" style="width: 100%; position: absolute; border: none;" scrolling="no"></iframe>
    </div>
    </div>
    </body>
    <script>
        var iframe = document.querySelector("iframe");
        var oval = document.querySelector(".oval");
        var ycw = document.querySelector(".yclientw");
        var contact = document.querySelectorAll(".contact");
        var reversed = document.querySelector(".reversed");
        var ylink = "https://b180684.yclients.com/company/183648/record-type?gcid=2018860734.1685372382&referrer=https:%2F%2Fone-training.ru%2F&o=";
        setTimeout(() => {
            const inputElement = document.querySelector('#phone');
            inputElement.addEventListener('keydown',enforceFormat);
            inputElement.addEventListener('keyup',formatToPhone);
        }, 500);

        var d = 0;
        oval.onclick = function() {
            if(window.innerWidth > 1000) {
                ycw.src = ylink;
                ycw.style.display = "block";
                ycw.style.width = "600px";
                ycw.style.height = window.innerHeight + "px";
                d = 1;                
            } else (window.location.href = ylink);
        }

        function mode() { 
            modedef();
            if(window.innerWidth < 1000) {
                contact[0].style.width = "100%";
                contact[1].style.width = "100%";
                reversed.style.display = "block";
            } else{
                contact[1].style.width = "50%"
                contact[0].style.width = "50%";
                contact[0].style.height = "100%";
                reversed.style.display = "flex";
                reversed.style.flexDirection = "row";
            }
        }
    </script>
    <script src="lib.js"></script>
</html>