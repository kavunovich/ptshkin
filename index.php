<?php
include 'lib.php';
$success = null;

if(empty($_COOKIE["message"])){
    $result = "";
    $true = false;
} else {
    $result = $_COOKIE["message"];
    $true = true;
    setcookie("message", "", time() + 60 * 60 * 24 * 365 * 10);
}
// Создание заявки и отправки ее
try {
    function start() {
        if (!empty($_GET)) {
            // $ip = $_SERVER['REMOTE_ADDR'];
            $ip = file_get_contents('http://api.ipify.org');
            // Защита от повторений
            define('ids', 'i2VDjbe4_ZNXhiFYVBN_v@!p-8feYv@V/id.txt');

            $data = array(
                $ip => array("name" => $_GET["name"], "phone" => "+7" . $_GET["phone"], "bday" => $_GET["bday"], "dreq" => date("Y.m.d"))
            );

            if (!file_exists("Requests/" . $ip . "/")) {
                mkdir("Requests/" . $ip . "/", 0777, true);
            }

            if (!str_contains(file_get_contents(ids), $ip)) {
                if (empty($_COOKIE["ready"]) || empty($_COOKIE["id"]) || !file_get_contents(ids)) {
                    $baseid = fopen("i2VDjbe4_ZNXhiFYVBN_v@!p-8feYv@V/id.txt", 'r');
                    while (!feof($baseid)) {
                        $ids = fgets($baseid);
                        if (strlen($ids) > 0) {
                            $id = explode(',', $ids, 10000);
                            $inner_insert = $ids . "," . $ip;
                            // Я думаю 10 лет достаточно для одной заявки
                            setcookie("ready", "true", time() + 60 * 60 * 24 * 365 * 10);
                            header("Refresh:0");
                        } else {
                            $id = $ip;
                            $inner_insert = $id;
                            // Я думаю 10 лет достаточно для одной заявки
                            setcookie("ready", "true", time() + 60 * 60 * 24 * 365 * 10);
                            header("Refresh:0");
                        }
                    }
                    fclose($baseid);
                    $baseidset = fopen("i2VDjbe4_ZNXhiFYVBN_v@!p-8feYv@V/id.txt", 'w'); // Запись айди в специальный файл, хз зачем оно если в новостях есть упрощенная система =)
                    fwrite($baseidset, $inner_insert);
                    fclose($baseidset);
                } else {
                    $success = true;
                    $baseinsert = fopen("Requests/" . $ip . "/" . "index" . ".json", 'w') or die;
                    $inner_insert = json_encode($data);
                    fwrite($baseinsert, $inner_insert);
                    fclose($baseinsert);
                    setcookie("message", '<div class="gmess">Успешно отправлено.</div>', time() + 60 * 60 * 24);
                }
            } else{
                $baseinsert = fopen("Requests/" . $ip . "/" . "index" . ".json", 'w') or die;
                $inner_insert = json_encode($data);
                fwrite($baseinsert, $inner_insert);
                fclose($baseinsert);
                setcookie("message", '<div class="gmess">Успешно отправлено.</div>', time() + 60 * 60 * 24);

                header('Location: ' . strtok($_SERVER['REQUEST_URI'], '?')); // Выход из GET запроса
            }
        }
    }
    start();
} catch (Exception $e) {
    echo 'Не удалось получить результат из левой части. Уведомите ближайшему или же самому разработчику сайта. Извените за неудобства.';
    // На крайняк если климанет и все улетит на небеса
}
// Далее идет очень сжатый html-код. В этом коде все по стандарту, что есть практически во всех страницах поэтому я сжал его как смог. 
// Для начала идут всякие окна бара, заявки и т.д.
// Далее сам бар, бар в мобильной версии называется m-menu из-за большего различия
// М-ulp это окна для моб версии
// body1 костыль но он не сильно занимает места, просто для отделения самого боди от контента для допустим бара

// Здесь все написал, чтобы не было видно в коде самой страницы
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
        <link rel="icon" type="image/x-icon" href="/favicon/faviconV2.png"/>
        <title>Оздоровительный центр реабилитации в Москве «ONE training»</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="lib.css">
        <meta name="viewport" content="width=device-width, initial-scale=0.9, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no">
        <style>html {display: none;}</style>
    </head>
    <body>

    <div class="w1"><ul id="alw"></ul></div><div class="w2"><ul id="alw"></ul></div><div class="w3 ww3"><ul id="alw"></ul></div><div class="w4 ww3"><ul id="alw"></ul></div><div class="w5 ww3"><ul id="alw"></ul></div>
    <div class="yclients"><div class="yanim"><div class="oval">Онлайн Запись</div></div></div><iframe class="yclientw"></iframe>

    <div class="bar"><img src="res/photo.png" class="icon" onclick="window.location.href='index.php'"><ul class="bar_ul"></ul><div class="sclink"></div><div class="mode-phone"><div class="line l1"></div><div class="line l2"></div></div></div>
    <div class="m-menu"><div class="m-ulp"><ul class="bar_ul2"></ul></div></div><div id="m-ulp"></div>

    <div class="book">
            <div class="book-i">
            <div class="exit">
                <svg width="100%" height="100%" viewBox="0 0 15 15">
                    <path id="pcross" fill="#ffffff" d="M2.64,1.27L7.5,6.13l4.84-4.84C12.5114,1.1076,12.7497,1.0029,13,1c0.5523,0,1,0.4477,1,1&#xA;&#x9;c0.0047,0.2478-0.093,0.4866-0.27,0.66L8.84,7.5l4.89,4.89c0.1648,0.1612,0.2615,0.3796,0.27,0.61c0,0.5523-0.4477,1-1,1&#xA;&#x9;c-0.2577,0.0107-0.508-0.0873-0.69-0.27L7.5,8.87l-4.85,4.85C2.4793,13.8963,2.2453,13.9971,2,14c-0.5523,0-1-0.4477-1-1&#xA;&#x9;c-0.0047-0.2478,0.093-0.4866,0.27-0.66L6.16,7.5L1.27,2.61C1.1052,2.4488,1.0085,2.2304,1,2c0-0.5523,0.4477-1,1-1&#xA;&#x9;C2.2404,1.0029,2.4701,1.0998,2.64,1.27z"/>
                </svg>
            </div>
            <b1>Записаться на занятие со скидкой -50%</b1>
            <p><v1>Оставьте свои данные ниже</v1></p>
            <form action="index.php" method="GET" class="formWithValidation">
                <div class="inpt-div">
                    <input type="text" id="name" name="name" placeholder="Имя" maxlength="30"/>
                </div>
                <div class="inpt-div">
                    <img src="/res/flag.png" width="25" height="13" style="margin-left: 20px;margin-right: 15px; border: 1px solid #aaa">
                    <span>+7</span>
                    <input type="tel" id="phone" name="phone" placeholder="(999) 999-99-99" maxlength="15" minlength="15" style="padding-left: 5px" required/>
                </div>
                <div class="inpt-div">
                    <input type="date" name="bday" value="<?php echo date('o-m-d')?>" min="<?php echo date('o-m-d')?>" max="<?php echo date('o') + 1 . "-" . date('m') . "-" . date('d')?>"/>
                </div>

                <button type="submit">Записаться</button>
                <?php echo $result?>
            </form>
            <script>
                var form = document.querySelector('.formWithValidation');
                var btn1 = form.querySelector('button');
                var phone = form.querySelector('#phone');
                var name1 = form.querySelector('#name');

                form.addEventListener('submit', function (event) {
                    if(phone.value.length < 15 || name1.value.length < 3){
                        event.preventDefault();
                    } else {
                        event.preventDefault();
                        btn1.innerHTML = '<div id="canvas"><canvas class="canva"></canvas></div>';
                        loader();
                        setTimeout(() => {event.target.submit()}, 500);
                    }
                });
            </script>
            </div>
        </div>

    <div class="body1">
        <div class="banner">
            <div class="i-banner">
               <div class="d-banner">
                <img src="res/2.png" style="width: 17vmax">
                <div class="b-text">
                Health<br><d style="color: #019fb4">Training</d>
                </div>
               </div>
               <center>
                <div style="font-size: max(2vmin, 15px); margin-top:30px;">Первое занятие со скидкой -50%</div>
                              <button class="btn-req">Записаться</button>
                </center>
                <div class="extra">
                    <div class="extr">
                        <img style="width: 15px; margin-right: 15px;" src="res/location.svg">
                        г. Москва, Армянский переулок, д. 7                            
                        </div>
                    <div class="extr">
                        <img style="height: 16px; margin-right: 15px;" src="res/m.svg">
                        Китай-город/Любянка/Чистые пруды
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="content-w">
            <div class="c-body">
                <div class="c-item">
                    <div>
                    <b1>Оздоровительный центр ONE-TRAINING это:</b1>
                    <ul>
                        <li> Уникальная авторская методика динамической реабилитации Алексея Пташкина;
                        </li>
                        <li> Внимание и забота опытных специалистов в области спортивной медицины и физической реабилитации;
                        </li>
                        <li> Персональные тренировки и занятия в мини-группах в дружелюбной и позитивной обстановке для детей и взрослых: пилатес, растяжка, ВИИТ, TRX, ЛФК;
                        </li>
                        <li> Массаж (спортивный, классический, моделирующий, перинатальный);
                        </li>
                        <li> Оздоровительные туры в компании единомышленников;
                        </li>
                        <li> Обучающие курсы и материалы для специалистов.
                        </li>
                    </ul>
                    <v1>Ждем Вас на занятиях!</v1><br>
                    <button class="btn-req" style="margin-top: 5%; margin-bottom: 25%;">Записаться</button>
                </div>
                </div>
                <div class="c-item" style="vertical-align: top;">
                    <img style="width: 100%; margin-bottom: 25%;" src="res/main-2.webp">
                </div>
            </div>
            <center>
                <b1>Наши Преимущества:</b1>
            </center>
            <div class="cont1">
                <div id="cont1-i">
                    <div>
                    <img id="img-l" src="res/bespl-z.png"><br>
                    <b>Персональная программа занятий</b>
                    <p>Индивидуальная стратегия и постоянное сопровождение специалиста.</p>
                    </div>
                </div>
                <div id="cont1-i">
                    <div>
                        <img id="img-l" src="res/poborot-handry-i-dep.webp"><br>
                        <b>Эффективное восстановление</b>
                        <p>Лечим причины, а не симптомы. Организм восстанавливается за счет естественной регенерации.</p>
                        </div>
                </div>
                <div id="cont1-i">
                    <div>
                        <img id="img-l" src="res/sert-tr.png"><br>
                        <b>Дипломированные специалисты</b>
                        <p>Все наши специалисты имеют медицинское образование и опыт более 5 лет в сфере физической реабилитации и ЛФК.</p>
                        </div>
                </div>
                <div id="cont1-i">
                    <div>
                        <img id="img-l" src="res/sobstv-tr.png"><br>
                        <b>Собственная методика занятия</b>
                        <p>Тренировки проводятся по авторскому методу Алексея Пташкина.</p>
                        </div>
                </div>
                <div id="cont1-i">
                    <div>
                        <img id="img-l" src="res/bez-abon.png"><br>
                        <b>Занятия без абонемента</b>
                        <p>Вы бронируете время и приходите, когда вам удобно. Оплачиваете только занятия.</p>
                        </div>
                </div>
              </div>
              <center>
                <b1>Наши Услуги:</b1>
              </center>
              <div class="cont1">
                <div class="cont2-i it-i">
                    <a href="/uslugi/ozdorovutelny-trening.php">
                    <div class="ct-i">
                        <b>Персональные трененги</b>
                        <div id="sub-c">Оздоровительные трененги по индивидуальной программе</div>
                    </div>
                    </a>
                </div>
                <div class="cont2-i it-i">
                    <a href="/uslugi/reabilitacia/dinamicheskaya.php">
                    <div class="ct-i">
                        <b>Реабилитация ЛФК</b>
                        <div id="sub-c">Занятия в мини-группах для детей и взрослых</div>
                    </div>
                    </a>
                </div>
                <div class="cont2-i it-i">
                    <a href="/uslugi/klassicheskiy.php">
                    <div class="ct-i">
                        <b>Массаж</b>
                        <div id="sub-c">Спортивный, классический, моделирующий, перинатальный</div>
                    </div>
                    </a>
                </div>
                <div class="cont2-i it-i">
                    <a href="/uslugi/dinamicheskiy-pilates.php">
                    <div class="ct-i">
                        <b>Пилатес</b>
                        <div id="sub-c">Динамический, перинатальный и постонатальный</div>
                    </div>
                    </a>
                </div>
                <div class="cont2-i it-i">
                    <a href="/uslugi/rastyazhka.php">
                    <div class="ct-i">
                        <b>Растяжка</b>
                        <div id="sub-c">Комплекс упражнений на увеличение гибкости тела</div>
                    </div>
                    </a>
                </div>
                <div class="cont2-i it-i">
                    <a href="/uslugi/trx.php">
                    <div class="ct-i">
                        <b>ТРХ</b>
                        <div id="sub-c">Функциональные тренировки с использованием собственного веса</div>
                    </div>
                    </a>
                </div>
                <div class="cont2-i it-i">
                    <a href="/kursy.php">
                    <div class="ct-i">
                        <b>Обучение</b>
                        <div id="sub-c">Занятия и навыки для работы в спорте, фитнесе, реабилитации</div>
                    </div>
                    </a>
                </div>
                <div class="cont2-i it-i">
                    <a href="/uslugi/detskaya-gimnastika.php">
                    <div class="ct-i">
                        <b>Гимнастика для детей</b>
                        <div id="sub-c">Специальная программа для детей развития силы гибкости для детей</div>
                    </div>
                    </a>
                </div>
                <div class="cont2-i it-i">
                    <a href="/uslugi/travel.php">
                    <div class="ct-i">
                        <b>Оздоровительный центр</b>
                        <div id="sub-c">Отдых с комплексом медицинских и профилактических мероприятий</div>
                    </div>
                    </a>
                </div>
              </div>
              <center>
                <b1>Наши Отзывы:</b1>
            </center>
              <center>
                <div style="width: min(100%, 700px); height:800px; overflow: hidden; position:relative; margin-top: 10%;"><iframe style="width:100%;height:100%;border:1px solid #e6e6e6;border-radius:8px;box-sizing:border-box" src="https://yandex.ru/maps-reviews-widget/147581867929?comments"></iframe><a href="https://yandex.ru/maps/org/one_training/147581867929/" target="_blank" style="box-sizing:border-box;text-decoration:none;color:#b3b3b3;font-size:10px;font-family:YS Text,sans-serif;padding:0 20px;position:absolute;bottom:8px;width:100%;text-align:center;left:0;overflow:hidden;text-overflow:ellipsis;display:block;max-height:14px;white-space:nowrap;padding:0 16px;box-sizing:border-box">One training на карте Москвы — Яндекс Карты</a></div>
            </center>
            </div>
    </div>
    <div class="footeer">
    <iframe src="footer.html" class="fot" style="width: 100%; position: absolute; border: none;" scrolling="no"></iframe>
    </div>
    </div>
    </body>
    <script>
        var cit = document.querySelectorAll(".c-item");
        var iti = document.querySelectorAll(".it-i");
        var ctii = document.querySelectorAll(".ct-i");
        var cbody = document.querySelector(".c-body");
        var iframe = document.querySelector("iframe");
        var exit = document.querySelector(".exit");
        var oval = document.querySelector(".oval");
        var ycw = document.querySelector(".yclientw");
        var btn_req = document.querySelectorAll(".btn-req");
        var book = document.querySelector(".book");
        var booki = document.querySelector(".book-i");
        var d = 0;
        var itim = ['_OneTr_2022-136.webp', 'One_Training_2020-20.jpg', '2021_-_167.jpg', 'ONE_TRAINING_2021-_1.jpg', 'One_training_2019_-_.jpg', '_One-TRAINING_-_175_.jpg', '2021_-_180.jpg', 'One_Training_2020-11.jpg', 'DvB6abbXgAAMn5v.jpg'];

        for(let i = 0; i < btn_req.length; i++){
            btn_req[i].onclick = function() {
                book.style.display = "flex";
                document.documentElement.style.overflow = "hidden";
                book.style.height = "100vh";
                mode();
                const inputElement = document.querySelector('#phone');
                inputElement.addEventListener('keydown',enforceFormat);
                inputElement.addEventListener('keyup',formatToPhone);
            }            
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

        for(let i = 0; i < iti.length; i++){    
            iti[i].style.backgroundImage = `url(/res/${itim[i]})`;
            iti[i].style.backgroundSize = "105%";
            iti[i].style.backgroundPosition = "center"; 

            ctii[i].onmouseover = function () {
            ctii[i].style.opacity = "0.5";
            iti[i].style.boxShadow = "0 50px 50px #00000020";
            iti[i].style.backgroundSize = "150%";
            };
            ctii[i].onmouseleave = function () {
            ctii[i].style.opacity = "1";
            iti[i].style.boxShadow = "0 0 0 transparent";
            iti[i].style.backgroundSize = "105%";
            }
        }

        var ylink = "https://b180684.yclients.com/company/183648/record-type?gcid=2018860734.1685372382&referrer=https:%2F%2Fone-training.ru%2F&o=";

        oval.onclick = function() {     
            if(window.innerWidth > 1000) {
                ycw.src = ylink;
                ycw.style.display = "block";
                ycw.style.width = "600px";
                ycw.style.height = window.innerHeight + "px";
                d = 1;
            }else{      
                window.location.href = ylink;
            }
        }

        exit.onclick = function() {
            book.style.display = "none";
            document.documentElement.style.overflow = "auto";
        }

        function mode() { 
            modedef();
            book.style.height = "calc(100vh + 75px)";
            if(window.innerWidth < 1000) {
                cbody.style.display = "block";
                cit[0].style.width = "auto";
                cit[0].style.marginRight = "0";
                cit[1].style.width = "0";
                btn_req[1].style.marginBottom = "3%";
                exit.style.right = "5%";
                exit.style.top = "calc(5% + 75px)";
            } else {
                cbody.style.display = "flex";
                cit[0].style.width = "50%";
                cit[0].style.marginRight = "2.2%";
                cit[1].style.width = "50%";
                exit.style.right = booki.offsetLeft + "px";
                exit.style.top = booki.offsetTop - 30 + "px";
            }
        }
    </script>
    <script src="lib.js"></script>
</html>