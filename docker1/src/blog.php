<?php
$directory = "Blogs/";
$filecount = 0;
$index = 0;
$files2 = glob($directory . "*");

usort($files2, function($a,$b){
    return filemtime($a) - filemtime($b);
  });

if ($files2)
    ($filecount = count($files2));
    if(count($files2) == 0) {
    die;
    }
$id = array();
if (count($files2) > 0) {
    foreach (array_filter($files2, 'is_file') as $file) {
        $var = str_replace($directory, "", $file);
        $id[$index] = str_replace(".json", "", $var);
        $index++;
    }
    $step = $filecount >= 10 ? 10 : $filecount;
    if (!empty($_GET['id'])) {
        $limit = $_GET['id'];

        if ($_GET['id'] >= $step && $_GET['id'] - $step !== 0) {
            $limit1 = $_GET['id'] - $step;
        } else {
            $limit1 = $_GET['id'];
        }

        if ($_GET['id'] + $step <= $filecount) {
            $limit2 = $_GET['id'] + $step;
        } else {
            $limit2 = $_GET['id'];
        }

        if($filecount - $step > 0 && $filecount - $step < $step && $_GET['id'] >= $step){
            $limit2 = $_GET['id'] + ($filecount - $step);
            $limit1 = $_GET['id'] - ($filecount - $step);
        }

        if($_GET['id'] > $filecount) {
            header('Location: ' . $_SERVER['PHP_SELF']);
        }
    } else {
        $limit = $step;
        $limit1 = $limit;
        $limit2 = $limit;
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
    <title>Новости</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="lib.css">
    <meta name="viewport" content="width=device-width,initial-scale=0.9,user-scalable=0">
    <style>html {display: none}.body1 {margin-top: 75px}</style>
</head>
<body>
    <div class="w1"><ul id="alw"></ul></div><div class="w2"><ul id="alw"></ul></div><div class="w3 ww3"><ul id="alw"></ul></div><div class="w4 ww3"><ul id="alw"></ul></div><div class="w5 ww3"><ul id="alw"></ul></div>
    <div class="yclients"><div class="yanim"><div class="oval">Онлайн Запись</div></div></div><iframe class="yclientw"></iframe>
    <div class="bar"><img src="res/photo.png" class="icon" onclick="window.location.href='index.php'"><ul class="bar_ul"></ul><div class="sclink"></div><div class="mode-phone"><div class="line l1"></div><div class="line l2"></div></div></div>
    <div class="m-menu"><div><ul class="bar_ul2"></ul></div></div><div id="m-ulp"></div>
    
    <div class="body1">
        <?php
        echo '<div class="content">';
        echo '<div class="content-w">';
        echo '<div class="cont1">';
        
            
            for ($i = $filecount-1; $i >= $filecount-$limit; $i--) {
                $baseid1 = fopen($directory . $id[$i] . ".json", 'r');
                while (!feof($baseid1)) {
                    $ids1 = fgets($baseid1);
                    $ids1view = json_decode($ids1, true);

                    $sub1 = str_replace("*", " ", strip_tags($ids1view[$id[$i]]['sub']));
                    $sub1 = str_replace("|", " ", strip_tags($sub1));
                    $sub1 = str_replace("•", " ", strip_tags($sub1));

                    $title = strlen($ids1view[$id[$i]]['title']) > 0 ? $ids1view[$id[$i]]['title'] : "Отсутсвует";
                    $sub = strlen($ids1view[$id[$i]]['sub']) > 0 ? $sub1 : "Отсутсвует";
                    $img = strlen($ids1view[$id[$i]]['img']) > 0 ? "background-image: url('" . $ids1view[$id[$i]]['img'] . "')" : "background-image: url('https://img.icons8.com/fluency/1000/image.png');background-size: 170%";
                    $imgfs = strlen($ids1view[$id[$i]]['img']) > 0 ? $ids1view[$id[$i]]['img'] : "https://img.icons8.com/fluency/1000/image.png";
                    $time = !empty($ids1view[$id[$i]]['time']) ? $ids1view[$id[$i]]['time'] : "01.01.1970";

                    $id_encode = strrev($id[$i]) . "Y29kaW5nX25leHQ=";
                    echo <<<EOT
                        <div class="cont2-i" id="cont-$i">
                            <div class="imgv" style="$img"></div>
                            <div style="text-align: left">
                            <p>
                                <div class="substr grey">$time</div>
                                <h3 id="blue">$title</h3>
                            </p>
                                <div class="substr grey">$sub</div>
                            </div>
                        </div>
                        <script>
                        document.querySelector("#cont-$i").onclick = function() {
                            var form = document.createElement('form');
                            form.action = '/blogmore.php';
                            form.method = 'get';
                            form.style.display = 'none';
                            
                            var input1 = document.createElement('input');
                            input1.type = 'text';
                            input1.name = 'id';
                            input1.value = '$id_encode';
                            form.appendChild(input1);

                            document.body.appendChild(form);
                            
                            form.submit();
                        }
                        </script>
                        EOT;
                }
                fclose($baseid1);
            }
        } else {
            echo "<div>Пока что отсутствует.</div>";
        }
        echo '</div>';
        function twostep() {
            echo <<<END
                <div onclick="decrease()" style="
                width: 50px;
                height: 50px;
                display: flex;
                justify-content: centet;
                align-items: center;
                ">
                    Назад
                </div>

                <hr style="width: 1px;
                height: 20px;
                display: inline-block;
                margin: 0;
                background: #aaa;
                border: none;">
                
                <div onclick="increase()" style="
                width: 50px;
                height: 50px;
                display: flex;
                justify-content: centet;
                align-items: center;
                ">
                    Еще
                </div>
            END;
        }
        if(!empty($_GET['id'])){
            if($_GET['id'] > $step){
                echo '<center><div class="btn-adds">';
                twostep();
                echo '</div></center>';
            } else{
                echo '<center><div class="btn-adds" onclick="increase()">';
                echo <<<END
                    <div style="
                    height: 50px;
                    display: flex;
                    justify-content: centet;
                    align-items: center;
                    ">
                        Еще
                    </div>
                END;
                echo '</div></center>';
            }
        } else {
            if($step < $filecount) {
                echo '<center><div class="btn-adds">';
                twostep();
                echo '</div></center>';
            }
        }
            echo '</div>';
        echo '</div>';
        ?>
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

    function decrease(){
        scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        window.location = `/blog.php?id=<?php echo $limit1?>&pos=${Math.floor((scrollTop))}`;
    }

    function increase(){
        scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        window.location = `/blog.php?id=<?php echo $limit2?>&pos=${Math.floor((scrollTop))}`;
    }
    setTimeout(() => {
        window.scrollTo(0, <?php if(!empty($_GET['pos'])) {echo $_GET['pos'];} else {echo 0;}?>);
    }, 500);
</script>
<script src="lib.js"></script>
</html>