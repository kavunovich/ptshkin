<?php
if (empty($_GET)) {
    header("HTTP/1.1 400 Not Found");
    sleep(5);
    die;
} else {
    $directory = "Blogs/";
    $id_decode = strrev(str_replace('Y29kaW5nX25leHQ=', '', $_GET['id']));

    if (!file_exists($directory . $id_decode . ".json")) {
        header("HTTP/1.1 404 Not Found");
        sleep(5);
        die;
    }
}
if(!empty($_GET)) {
    $baseid1 = fopen($directory . $id_decode . ".json", 'r');
    while (!feof($baseid1)) {
        $ids1 = fgets($baseid1);
        $ids1view = json_decode($ids1, true);
        $title = strlen($ids1view[$id_decode]['title']) > 0 ? ucwords($ids1view[$id_decode]['title']) : "Отсутсвует";
        $sub = strlen($ids1view[$id_decode]['sub']) > 0 ? ($ids1view[$id_decode]['sub']) : "Отсутсвует";
        $img = strlen($ids1view[$id_decode]['img']) > 0 ? $ids1view[$id_decode]['img'] : "https://img.icons8.com/fluency/1000/image.png";
        $imgs = strlen($ids1view[$id_decode]['img']) > 0 ? "background-image: url('" . $ids1view[$id_decode]['img'] . "')" : "background-image: url('https://img.icons8.com/fluency/1000/image.png');background-size: 170%";
        $time = !empty($ids1view[$id_decode]['time']) ? $ids1view[$id_decode]['time'] : "01.01.1970";

        $editted = "";

        if(!empty($ids1view[$id_decode]['editted'])) {
            $editted = "<i>Изменено</i>";
        }
        $count1 = substr_count($sub, '*');
        $count2 = substr_count($sub, '|');
        $count3 = substr_count($sub, '•');

        if($count1 % 2 == 1 && $count1 < 0 &&  $count1 !== 1) {
            $count1 -= 1;
        } else if($count1 == 1) {
            $count1 = 0;
        }

        if($count2 % 2 == 1 && $count2 < 0 &&  $count2 !== 1) {
            $count2 -= 1;
        } else if($count2 == 1) {
            $count2 = 0;
        }

        if($count3 % 2 == 1 && $count3 < 0 &&  $count3 !== 1) {
            $count3 -= 1;
        } else if($count3 == 1) {
            $count3 = 0;
        }
        $count = 0;
        $sub = preg_replace_callback("/\•/", function () use (&$count, $count3) {
            $count++;
            if($count == 1) {
                return "<ul><li>";
            }
            if($count == $count3) {
                return "</ul></li>";
            }
            return $count % 2 === 0 ? "</li>" : "<li>";
        }, $sub, $count3);

        $count = 0;
        $sub = preg_replace_callback("/\|/", function () use (&$count) {
            $count++;
            return $count % 2 === 0 ? "</i>" : "<i>";
        }, $sub, $count2);

        $count = 0;
        $sub = preg_replace_callback("/\*/", function () use (&$count) {
            $count++;
            return $count % 2 === 0 ? "</b>" : "<b>";
        }, $sub, $count1);
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
    <title><?php echo $title?></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="lib.css">
    <meta name="viewport" content="width=device-width,initial-scale=0.9,user-scalable=0">
    <style>html{display: none}.body1{margin-top: 75px}</style>
</head>

<body>
    <div class="w1"><ul id="alw"></ul></div><div class="w2"><ul id="alw"></ul></div><div class="w3 ww3"><ul id="alw"></ul></div><div class="w4 ww3"><ul id="alw"></ul></div><div class="w5 ww3"><ul id="alw"></ul></div>
    <div class="yclients"><div class="yanim"><div class="oval">Онлайн Запись</div></div></div><iframe class="yclientw"></iframe>
    <div class="bar"><img src="res/photo.png" class="icon" onclick="window.location.href='index.php'"><ul class="bar_ul"></ul><div class="sclink"></div><div class="mode-phone"><div class="line l1"></div><div class="line l2"></div></div></div>
    <div class="m-menu"><div><ul class="bar_ul2"></ul></div></div><div id="m-ulp"></div>

    <div class="body1">
        <?php
        if (!empty($_GET)) {
                echo <<<EOT
                <div class="imgv" style="$imgs"></div>
                EOT;
                echo '<div class="content">';
                echo '<div class="content-w">';
                echo <<<EOT
                    <div style="text-align: left">
                    <p  style="text-align: center"><hh1 id="blue">$title</hh1></p>
                        <div class="news-lol">$sub</div>
                    <p><div class="substr grey">$time $editted</div></p>
                    </div>
                EOT;
            }
            fclose($baseid1);
        }
        ?>
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
    var ylink = "https://b180684.yclients.com/company/183648/record-type?gcid=2018860734.1685372382&referrer=https:%2F%2Fone-training.ru%2F&o=";
    var d = 0;
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
<script src="lib.js"></script>
</html>