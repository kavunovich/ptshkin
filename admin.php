<?php
include 'lib.php';
$csrf_token = $_SESSION['csrf_token'];

$directory = "Blogs/";
$filecount = 0;
$index = 0;
$password = "KjF$@FXsNQ@BEqEatzmvKe3JsJHhWZzq";

$files2 = glob($directory . "*");

usort($files2, function($a,$b){
    return filemtime($a) - filemtime($b);
  });
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="lib.css">
    <link rel="icon" type="image/x-icon" href="favicon/faviconV2.png" />
    <title>Админ. Панель</title>
    <meta name="viewport" content="width=device-width,initial-scale=0.9,user-scalable=0">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap');

        body,
        html {
            background: #121317;
            font-family: 'Open Sans', sans-serif;
            color: #fff;
            width: 100%;
            height: 100%;
            padding: 0;
            margin: 0;
        }
    </style>
</head>

<body>
    <?php
    $tab1 = 'activetab';
    $tab2 = '';
    $tab3 = '';
    $tab1l = 'activetab';
    $tab2l = '';
    $tab3l = '';
    $space = '\n';
    if (!empty($_SERVER['HTTP_REFERER'])) {
        if (!empty($_POST)) {
            if ($_POST['password'] == $password) {
                if (!empty($_POST['csrf_token']) && $_POST['csrf_token'] == $_SESSION['csrf_token']) {
                    if (!empty($_POST['title']) && !empty($_POST['sub']) && !empty($_POST['img'] && empty($_POST['edit']))) {
                        $generated = rpass();
                        $t1 = time();
                        $time1 = date("d.m.Y", $t1);
                        $data = array(count($files2) . $generated => array("title" => strip_tags($_POST["title"], '<br>'), "img" => $_POST["img"], "time" => $time1, "sub" => strip_tags(nl2br($_POST["sub"]), '<br>')));
                        $baseinsert = fopen("Blogs/" . count($files2) . $generated . ".json", 'w') or die;
                        $inner_insert = json_encode($data);
                        fwrite($baseinsert, $inner_insert);
                        fclose($baseinsert);
                    }
                    
                    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
                    $csrf_token = $_SESSION['csrf_token'];
                    $tab1 = '';
                    $tab2 = "activetab";
                    $tab1l = '';
                    $tab2l = 'activetab';
                    if(!empty($_POST['delete'])) {
                        if (file_exists($directory . $_POST['delete'] . ".json")) {
                            unlink($directory . $_POST['delete'] . ".json");
                        }
                    }

                    if(!empty($_POST['edit'])) {
                        if (!empty($_POST['title']) && !empty($_POST['sub'])) {
                            $baseid1 = fopen($directory . $_POST['edit'] . ".json", 'r');
                            while (!feof($baseid1)) {
                                $ids1 = fgets($baseid1);
                                $ids1view = json_decode($ids1, true);
                            }
                            $img11 = $ids1view[$_POST['edit']]['img'];
                            fclose($baseid1);

                            $generated = $_POST['edit'];
                            $t1 = time();
                            $time1 = date("d.m.Y", $t1);
                            $data = array($generated => array("title" => strip_tags($_POST["title"], '<br>'), "img" => $img11, "editted" => true, "time" => $time1, "sub" => strip_tags(nl2br($_POST["sub"]), '<br>')));
                            $baseinsert = fopen("Blogs/" . $generated . ".json", 'w') or die;
                            $inner_insert = json_encode($data);
                            fwrite($baseinsert, $inner_insert);
                            fclose($baseinsert);
                        }
                    }
                }
                echo <<<EOT
                    <div class="book">
                        <div class="book-i2">
                        <p><h3>Создание публикации</h3></p>
                        <form action="/admin.php" method="POST" onsubmit="this.disabled = true">
                        <input type="hidden" name="password" value="$password"></input>
                        <input type="hidden" name="csrf_token" value="$csrf_token">
                        <input type="hidden" name="index1" value="$csrf_token">
                        <input type="hidden" name="img" class="image1">
                        <div style="display: flex; margin-bottom: 5%">
                            <img id="imagehidden" hidden>
                            <div class="imgdiv">
                                <img src="/res/image.png" id="image-show" height="200"/>
                                <input name="image" type="file" id="imginpt" accept=".jpg,.jpeg,.png" onchange="validateFileType(this, event)"/>
                            </div>
                            <textarea type="text" style="height: auto; resize: none; margin: 0; padding: 15px; font-size: 18px" name="title" placeholder="Название" class="pass formcreate" autocomplete="off" maxlength="64"></textarea style="">
                        </div>
                        <div>
                            <div class="nav n-book">
                                <div class="nav-i n-n-i" onclick="document.querySelector('.textarea').value += '*Жирный текст*';">
                                    <img width="20" height="20" src="https://img.icons8.com/ios-filled/50/ffffff/bold.png" />
                                </div>
                                <div class="nav-i n-n-i" onclick="document.querySelector('.textarea').value += '|Курсив|';">
                                    <img width="20" height="20" src="https://img.icons8.com/external-tal-revivo-bold-tal-revivo/50/ffffff/external-italics-text-style-funtion-button-for-document-application-text-bold-tal-revivo.png" />
                                </div>
                                <div class="nav-i n-n-i" onclick="document.querySelector('.textarea').value += '$space •Список•';">
                                    <img width="20" height="20" src="https://img.icons8.com/ios-glyphs/50/ffffff/list--v1.png" />
                                </div>
                            </div>

                            <textarea type="text" name="sub" placeholder="Описание" class="pass textarea formcreate" autocomplete="off" maxlength="10240"></textarea>
                        </div>
                            <div style="display:flex">
                                <button type="button" class="submit1 disabled" style="margin-right: 15px" onclick="document.querySelector('.book').style.display = 'none';">Отмена</button>
                                <button type="submit" class="submit1 enabled">Опубликовать</button>
                            </div>
                        </form>
                        </div>
                    </div>
                EOT;
                echo '<div class="panels">';
                echo '<div class="deep_panel">';
                echo '<button onclick="location.reload()" class="reload"><img width="20" height="20" src="https://img.icons8.com/material-rounded/40/FFFFFF/available-updates.png" style="opacity: 0.3; margin-right: 5px"/>Перезагрузка</button>';
                echo <<<END
                    <div class="tablink $tab1l" onclick="openTab(event, 'tab1')">
                        <div class="b_section">
                            <img width="24" height="24" src="https://img.icons8.com/material-sharp/24/FFFFFF/resume-website.png" style="margin-right: 15px"/>
                            Заявки
                        </div>
                    </div>
                END;
                echo <<<END
                    <div class="tablink $tab2l" onclick="openTab(event, 'tab2')">
                        <div class="b_section">
                            <img width="24" height="24" src="https://img.icons8.com/hatch/64/FFFFFF/e-magazine.png" alt="e-magazine" style="margin-right: 15px"/>
                            Новости
                        </div>
                    </div>
                END;
                echo <<<END
                <div class="tablink $tab3l" onclick="openTab(event, 'tab3')">
                    <div class="b_section">
                        <img width="24" height="24" src="https://img.icons8.com/ios/24/ffffff/where-what-quest.png" alt="e-magazine" style="margin-right: 15px"/>
                        Вопросы
                    </div>
                </div>
                END;
                echo '</div>';
                echo '<div class="double_panel">';
                echo '<div id="tab1" class="tab ' . $tab1 . '" style="padding-left: 2%;padding-right: 2%">';
                echo '<h2>Таблицы записей</h2>';

                $baseid = fopen("i2VDjbe4_ZNXhiFYVBN_v@!p-8feYv@V/id.txt", 'r');
                while (!feof($baseid)) {
                    $ids = fgets($baseid);
                    if (strlen($ids) > 0) {
                        $id = explode(',', $ids, 10000);
                        $id = array_reverse($id);
                        $id_index = count($id);
                        $rows = 4;

                        $index1 = array();
                        $pilates = array();
                        $reab = array();
                        $tour = array();
                        $massage = array();
                        $kursy = array();
                        $extra = array();
                        $gimnastika = array();
                        $trx = array();
                        $viit = array();
                        $rastyazhka = array();

                        $contacts = array();

                        $limitv = 10;

                        $none = '<td class="item" style="color: #777; cursor: not-allowed;">Пусто</td>';

                        for ($i = 0; $i < count($id); $i++) {
                            if (file_exists("Requests/" . $id[$i] . "/index.json")) {
                                array_push($index1, $id[$i]);
                            }
                            if (file_exists("Requests/" . $id[$i] . "/pilates.json")) {
                                array_push($pilates, $id[$i]);
                            }
                            if (file_exists("Requests/" . $id[$i] . "/reabilitacia.json")) {
                                array_push($reab, $id[$i]);
                            }
                            if (file_exists("Requests/" . $id[$i] . "/tour.json")) {
                                array_push($tour, $id[$i]);
                            }
                            if (file_exists("Requests/" . $id[$i] . "/massage.json")) {
                                array_push($massage, $id[$i]);
                            }
                            if (file_exists("Requests/" . $id[$i] . "/kursy.json")) {
                                array_push($kursy, $id[$i]);
                            }
                            if (file_exists("Requests/" . $id[$i] . "/extra.json")) {
                                array_push($extra, $id[$i]);
                            }
                            if (file_exists("Requests/" . $id[$i] . "/gimnastika.json")) {
                                array_push($gimnastika, $id[$i]);
                            }
                            if (file_exists("Requests/" . $id[$i] . "/trx.json")) {
                                array_push($trx, $id[$i]);
                            }
                            if (file_exists("Requests/" . $id[$i] . "/viit.json")) {
                                array_push($viit, $id[$i]);
                            }
                            if (file_exists("Requests/" . $id[$i] . "/rastyazhka.json")) {
                                array_push($rastyazhka, $id[$i]);
                            }
                            if (file_exists("Requests/" . $id[$i] . "/contacts.json")) {
                                array_push($contacts, $id[$i]);
                            }
                        }
                        if (count($index1) !== 0) {
                            echo <<<END
                        <h3 style="margin-top: 10%;">Необозначенные запросы (Главная)
                        <div class="add">Всё</div>
                        </h3>
                        <table style="width: 100%; text-align: center;border-collapse:collapse">
                        <tr style="height: 50px">
                            <th style="background: #ffffff10; width: 1px">Имя</th>
                            <th style="background: #ffffff10">Номер</th>
                            <th style="background: #ffffff10">Выбранная Дата</th>
                            <th style="background: #ffffff10">Дата запроса</th>
                        </tr>
                        END;

                            $limit = count($index1) >= $limitv ? $limitv : count($index1);

                            for ($i = 0; $i < $limit; $i++) {
                                $baseid1 = fopen("Requests/" . $index1[$i] . "/index.json", 'r');
                                while (!feof($baseid1)) {
                                    $ids1 = fgets($baseid1);
                                    $ids1view = json_decode($ids1, true);

                                    if ($ids1view[$index1[$i]]['name'] !== null) {
                                        $name = strlen($ids1view[$index1[$i]]['name']) > 0 ? $ids1view[$index1[$i]]['name'] : "Пусто";
                                        $name = '<td class="item">' . $name . '</td>';
                                    } else {
                                        $name = $none;
                                    }

                                    if ($ids1view[$index1[$i]]['bday'] !== null) {
                                        $bday = strlen($ids1view[$index1[$i]]['bday']) > 0 ? $ids1view[$index1[$i]]['bday'] : "Пусто";
                                        $bday = '<td class="item">' . $bday . '</td>';
                                    } else {
                                        $bday = $none;
                                    }

                                    if ($ids1view[$index1[$i]]['phone'] !== null) {
                                        $phone = strlen($ids1view[$index1[$i]]['phone']) > 0 ? $ids1view[$index1[$i]]['phone'] : "Пусто";
                                        $phone = '<td class="item">' . $phone . '</td>';
                                    } else {
                                        $phone = $none;
                                    }

                                    if ($ids1view[$index1[$i]]['dreq'] !== null) {
                                        $dreq = strlen($ids1view[$index1[$i]]['dreq']) > 0 ? $ids1view[$index1[$i]]['dreq'] : "Пусто";
                                        $dreq = '<td class="item">' . $dreq . '</td>';
                                    } else {
                                        $dreq = $none;
                                    }

                                    echo '<tr class="cont">';
                                    echo $name . $phone . $bday . $dreq;
                                    echo '</tr>';

                                }
                            }
                            fclose($baseid1);
                            echo '</table>';
                        }

                        if (count($pilates) !== 0) {
                            echo <<<END
                        <h3 style="margin-top: 10%;">Заявки на Пилатес
                        <div class="add">Всё</div>
                        </h3>
                        <table style="width: 100%; text-align: center;border-collapse:collapse">
                        <tr>
                            <th style="background: #ffffff10; width: 1px">Имя</th>
                            <th style="background: #ffffff10">Номер</th>
                            <th style="background: #ffffff10">Выбранная Дата</th>
                            <th style="background: #ffffff10">Дата запроса</th>
                            <th style="background: #ffffff10">Тип</th>
                        </tr>
                        END;

                            $limit1 = count($pilates) >= $limitv ? $limitv : count($pilates);

                            for ($i = 0; $i < $limit1; $i++) {
                                $baseid1 = fopen("Requests/" . $pilates[$i] . "/pilates.json", 'r');
                                while (!feof($baseid1)) {
                                    $ids1 = fgets($baseid1);
                                    $ids1view = json_decode($ids1, true);

                                    if ($ids1view[$pilates[$i]]['name'] !== null) {
                                        $name = strlen($ids1view[$pilates[$i]]['name']) > 0 ? $ids1view[$pilates[$i]]['name'] : "Пусто";
                                        $name = '<td class="item">' . $name . '</td>';
                                    } else {
                                        $name = $none;
                                    }

                                    if ($ids1view[$pilates[$i]]['bday'] !== null) {
                                        $bday = strlen($ids1view[$pilates[$i]]['bday']) > 0 ? $ids1view[$pilates[$i]]['bday'] : "Пусто";
                                        $bday = '<td class="item">' . $bday . '</td>';
                                    } else {
                                        $bday = $none;
                                    }

                                    if ($ids1view[$pilates[$i]]['phone'] !== null) {
                                        $phone = strlen($ids1view[$pilates[$i]]['phone']) > 0 ? $ids1view[$pilates[$i]]['phone'] : "Пусто";
                                        $phone = '<td class="item">' . $phone . '</td>';
                                    } else {
                                        $phone = $none;
                                    }

                                    if ($ids1view[$pilates[$i]]['dreq'] !== null) {
                                        $dreq = strlen($ids1view[$pilates[$i]]['dreq']) > 0 ? $ids1view[$pilates[$i]]['dreq'] : "Пусто";
                                        $dreq = '<td class="item">' . $dreq . '</td>';
                                    } else {
                                        $dreq = $none;
                                    }

                                    if ($ids1view[$pilates[$i]]['type'] !== null) {
                                        $type = strlen($ids1view[$pilates[$i]]['type']) > 0 ? $ids1view[$pilates[$i]]['type'] : "Пусто";
                                        $type = '<td class="item">' . $type . '</td>';
                                    } else {
                                        $type = $none;
                                    }

                                    echo '<tr class="cont">';
                                    echo $name . $phone . $bday . $dreq . $type;
                                    echo '</tr>';

                                }
                            }
                            fclose($baseid1);
                            echo '</table>';
                        }
                        if (count($reab) !== 0) {
                            echo <<<END
                        <h3 style="margin-top: 10%;">Реабилитация
                        <div class="add">Всё</div>
                        </h3>
                        <table style="width: 100%; text-align: center;border-collapse:collapse">
                        <tr>
                            <th style="background: #ffffff10; width: 1px">Имя</th>
                            <th style="background: #ffffff10">Номер</th>
                            <th style="background: #ffffff10">Выбранная Дата</th>
                            <th style="background: #ffffff10">Дата запроса</th>
                            <th style="background: #ffffff10">Тип</th>
                        </tr>
                        END;

                            $limit1 = count($reab) >= $limitv ? $limitv : count($reab);

                            for ($i = 0; $i < $limit1; $i++) {
                                $baseid1 = fopen("Requests/" . $reab[$i] . "/reabilitacia.json", 'r');
                                while (!feof($baseid1)) {
                                    $ids1 = fgets($baseid1);
                                    $ids1view = json_decode($ids1, true);

                                    if ($ids1view[$reab[$i]]['name'] !== null) {
                                        $name = strlen($ids1view[$reab[$i]]['name']) > 0 ? $ids1view[$reab[$i]]['name'] : "Пусто";
                                        $name = '<td class="item">' . $name . '</td>';
                                    } else {
                                        $name = $none;
                                    }

                                    if ($ids1view[$reab[$i]]['bday'] !== null) {
                                        $bday = strlen($ids1view[$reab[$i]]['bday']) > 0 ? $ids1view[$reab[$i]]['bday'] : "Пусто";
                                        $bday = '<td class="item">' . $bday . '</td>';
                                    } else {
                                        $bday = $none;
                                    }

                                    if ($ids1view[$reab[$i]]['phone'] !== null) {
                                        $phone = strlen($ids1view[$reab[$i]]['phone']) > 0 ? $ids1view[$reab[$i]]['phone'] : "Пусто";
                                        $phone = '<td class="item">' . $phone . '</td>';
                                    } else {
                                        $phone = $none;
                                    }

                                    if ($ids1view[$reab[$i]]['dreq'] !== null) {
                                        $dreq = strlen($ids1view[$reab[$i]]['dreq']) > 0 ? $ids1view[$reab[$i]]['dreq'] : "Пусто";
                                        $dreq = '<td class="item">' . $dreq . '</td>';
                                    } else {
                                        $dreq = $none;
                                    }

                                    if ($ids1view[$reab[$i]]['type'] !== null) {
                                        $type = strlen($ids1view[$reab[$i]]['type']) > 0 ? $ids1view[$reab[$i]]['type'] : "Пусто";
                                        $type = '<td class="item">' . $type . '</td>';
                                    } else {
                                        $type = $none;
                                    }

                                    echo '<tr class="cont">';
                                    echo $name . $phone . $bday . $dreq . $type;
                                    echo '</tr>';

                                }
                            }
                            fclose($baseid1);
                            echo '</table>';
                        }

                        if (count($tour) !== 0) {
                            echo <<<END
                        <h3 style="margin-top: 10%;">Туры
                        <div class="add">Всё</div>
                        </h3>
                        <p>0 - Фитнес тур «Оздоровительный Тайцзицюань»</p>
                        <table style="width: 100%; text-align: center;border-collapse:collapse; font-size: 15px">
                        <tr style="height: 55px;">
                            <th style="background: #ffffff10;">Имя</th>
                            <th style="background: #ffffff10;">Фамилия</th>
                            <th style="background: #ffffff10">Номер</th>
                            <th style="background: #ffffff10">Почта</th>
                            <th style="background: #ffffff10">Дата запроса</th>
                            <th style="background: #ffffff10">Выбранное</th>
                        </tr>
                        END;

                            $limit1 = count($tour) >= $limitv ? $limitv : count($tour);

                            for ($i = 0; $i < $limit1; $i++) {
                                $baseid1 = fopen("Requests/" . $tour[$i] . "/tour.json", 'r');
                                while (!feof($baseid1)) {
                                    $ids1 = fgets($baseid1);
                                    $ids1view = json_decode($ids1, true);

                                    if ($ids1view[$tour[$i]]['name'] !== null) {
                                        $name = strlen($ids1view[$tour[$i]]['name']) > 0 ? $ids1view[$tour[$i]]['name'] : "Пусто";
                                        $name = '<td class="item">' . $name . '</td>';
                                    } else {
                                        $name = $none;
                                    }

                                    if ($ids1view[$tour[$i]]['subname'] !== null) {
                                        $sub = strlen($ids1view[$tour[$i]]['subname']) > 0 ? $ids1view[$tour[$i]]['subname'] : "Пусто";
                                        $sub = '<td class="item">' . $sub . '</td>';
                                    } else {
                                        $sub = $none;
                                    }

                                    if ($ids1view[$tour[$i]]['phone'] !== null) {
                                        $phone = strlen($ids1view[$tour[$i]]['phone']) > 0 ? $ids1view[$tour[$i]]['phone'] : "Пусто";
                                        $phone = '<td class="item">' . $phone . '</td>';
                                    } else {
                                        $phone = $none;
                                    }

                                    if ($ids1view[$tour[$i]]['dreq'] !== null) {
                                        $dreq = strlen($ids1view[$tour[$i]]['dreq']) > 0 ? $ids1view[$tour[$i]]['dreq'] : "Пусто";
                                        $dreq = '<td class="item">' . $dreq . '</td>';
                                    } else {
                                        $dreq = $none;
                                    }

                                    if ($ids1view[$tour[$i]]['email'] !== null) {
                                        $email = strlen($ids1view[$tour[$i]]['email']) > 0 ? $ids1view[$tour[$i]]['email'] : "Пусто";
                                        $email = '<td class="item">' . $email . '</td>';
                                    } else {
                                        $email = $none;
                                    }

                                    if ($ids1view[$tour[$i]]['choosed'] !== null) {
                                        $choosed = strlen($ids1view[$tour[$i]]['choosed']) > 0 ? $ids1view[$tour[$i]]['choosed'] : "Пусто";
                                        $choosed = '<td class="item">' . $choosed . '</td>';
                                    } else {
                                        $email = $none;
                                    }

                                    echo '<tr class="cont">';
                                    echo $name . $sub . $email . $phone . $dreq . $choosed;
                                    echo '</tr>';

                                }
                            }
                            fclose($baseid1);
                            echo '</table>';
                        }

                        if (count($massage) !== 0) {
                            echo <<<END
                        <h3 style="margin-top: 10%;">Массаж
                        <div class="add">Всё</div>
                        </h3>
                        <table style="width: 100%; text-align: center;border-collapse:collapse">
                        <tr style="height: 55px;">
                            <th style="background: #ffffff10; width: 1px">Имя</th>
                            <th style="background: #ffffff10">Номер</th>
                            <th style="background: #ffffff10">Выбранная Дата</th>
                            <th style="background: #ffffff10">Дата запроса</th>
                            <th style="background: #ffffff10">Тип</th>
                        </tr>
                        END;

                            $limit1 = count($massage) >= $limitv ? $limitv : count($massage);

                            for ($i = 0; $i < $limit1; $i++) {
                                $baseid1 = fopen("Requests/" . $massage[$i] . "/massage.json", 'r');
                                while (!feof($baseid1)) {
                                    $ids1 = fgets($baseid1);
                                    $ids1view = json_decode($ids1, true);

                                    if ($ids1view[$massage[$i]]['name'] !== null) {
                                        $name = strlen($ids1view[$massage[$i]]['name']) > 0 ? $ids1view[$massage[$i]]['name'] : "Пусто";
                                        $name = '<td class="item">' . $name . '</td>';
                                    } else {
                                        $name = $none;
                                    }

                                    if ($ids1view[$massage[$i]]['bday'] !== null) {
                                        $bday = strlen($ids1view[$massage[$i]]['bday']) > 0 ? $ids1view[$massage[$i]]['bday'] : "Пусто";
                                        $bday = '<td class="item">' . $bday . '</td>';
                                    } else {
                                        $bday = $none;
                                    }

                                    if ($ids1view[$massage[$i]]['phone'] !== null) {
                                        $phone = strlen($ids1view[$massage[$i]]['phone']) > 0 ? $ids1view[$massage[$i]]['phone'] : "Пусто";
                                        $phone = '<td class="item">' . $phone . '</td>';
                                    } else {
                                        $phone = $none;
                                    }

                                    if ($ids1view[$massage[$i]]['dreq'] !== null) {
                                        $dreq = strlen($ids1view[$massage[$i]]['dreq']) > 0 ? $ids1view[$massage[$i]]['dreq'] : "Пусто";
                                        $dreq = '<td class="item">' . $dreq . '</td>';
                                    } else {
                                        $dreq = $none;
                                    }

                                    if ($ids1view[$massage[$i]]['type'] !== null) {
                                        $type = strlen($ids1view[$massage[$i]]['type']) > 0 ? $ids1view[$massage[$i]]['type'] : "Пусто";
                                        $type = '<td class="item">' . $type . '</td>';
                                    } else {
                                        $type = $none;
                                    }

                                    echo '<tr class="cont">';
                                    echo $name . $phone . $bday . $dreq . $type;
                                    echo '</tr>';

                                }
                            }
                            fclose($baseid1);
                            echo '</table>';
                        }

                        if (count($kursy) !== 0) {
                            echo <<<END
                        <h3 style="margin-top: 10%;">Курсы
                        <div class="add">Всё</div>
                        </h3>
                        0 - Динамический реформер - основы<br>
                        1 - Динамический реформер - прогресс<br>
                        2 - Каддилак - пилатес<br>
                        3 - Пилатес малое оборудование<br>
                        4 - Динамический пилатес мат - начальный уровень<br>
                        5 - Динамический пилатес мат - средний уровень<br>
                        <h3>Семинары</h3><br>
                        6 - Триггерные точки и миофасциальный болевой синдром<br>
                        7 - Болевые синдромы и грыжи позвоночника. Диагностика и Лечение<br>
                        8 - Основы метода Пилатеса для реабилитации опорно-двигательного аппарата<br>
                        9 - Реедукация в физической реабилитации на основе метода ПНФ<br>
                        10 - Семинар по Мышечно-энергетическим техникам мануальной терапии<br>
                        11 - Мультитейпинг-BASIC(кинезиотейпинг в физической реабилитации взрослых и детей)<br>
                        12 - Позиционный релиз. Техники стрейн-контрстрейн<br>
                        13 - Мягкие техники мануальной терапии. Мышечно-фасциальный релиз<br>
                        14 - Основы оценки и коррекции женского организма с позиций мягкой мануальной терапии<br>
                        15 - Висцеральная Остеопатия - 1<br>
                        16 - Научный подход в реабилитации сколиоза, метод SEAS<br>
                        17 - Краниоцервикальная физическая терапия (реабилитация)</p>
                        <table style="width: 100%; text-align: center;border-collapse:collapse; font-size: 15px">
                        <tr style="height: 55px;">
                            <th style="background: #ffffff10; width: 1px;">Имя</th>
                            <th style="background: #ffffff10;">Фамилия</th>
                            <th style="background: #ffffff10">Номер</th>
                            <th style="background: #ffffff10">Почта</th>
                            <th style="background: #ffffff10">Дата запроса</th>
                            <th style="background: #ffffff10">Выбранное</th>
                        </tr>
                        END;

                            $limit1 = count($kursy) >= $limitv ? $limitv : count($kursy);

                            for ($i = 0; $i < $limit1; $i++) {
                                $baseid1 = fopen("Requests/" . $kursy[$i] . "/kursy.json", 'r');
                                while (!feof($baseid1)) {
                                    $ids1 = fgets($baseid1);
                                    $ids1view = json_decode($ids1, true);

                                    if ($ids1view[$kursy[$i]]['name'] !== null) {
                                        $name = strlen($ids1view[$kursy[$i]]['name']) > 0 ? $ids1view[$kursy[$i]]['name'] : "Пусто";
                                        $name = '<td class="item">' . $name . '</td>';
                                    } else {
                                        $name = $none;
                                    }

                                    if ($ids1view[$kursy[$i]]['subname'] !== null) {
                                        $sub = strlen($ids1view[$kursy[$i]]['subname']) > 0 ? $ids1view[$kursy[$i]]['subname'] : "Пусто";
                                        $sub = '<td class="item">' . $sub . '</td>';
                                    } else {
                                        $sub = $none;
                                    }

                                    if ($ids1view[$kursy[$i]]['phone'] !== null) {
                                        $phone = strlen($ids1view[$kursy[$i]]['phone']) > 0 ? $ids1view[$kursy[$i]]['phone'] : "Пусто";
                                        $phone = '<td class="item">' . $phone . '</td>';
                                    } else {
                                        $phone = $none;
                                    }

                                    if ($ids1view[$kursy[$i]]['dreq'] !== null) {
                                        $dreq = strlen($ids1view[$kursy[$i]]['dreq']) > 0 ? $ids1view[$kursy[$i]]['dreq'] : "Пусто";
                                        $dreq = '<td class="item">' . $dreq . '</td>';
                                    } else {
                                        $dreq = $none;
                                    }

                                    if ($ids1view[$kursy[$i]]['email'] !== null) {
                                        $email = strlen($ids1view[$kursy[$i]]['email']) > 0 ? $ids1view[$kursy[$i]]['email'] : "Пусто";
                                        $email = '<td class="item">' . $email . '</td>';
                                    } else {
                                        $email = $none;
                                    }

                                    if ($ids1view[$kursy[$i]]['choosed'] !== null) {
                                        $choosed = strlen($ids1view[$kursy[$i]]['choosed']) > 0 ? $ids1view[$kursy[$i]]['choosed'] : "Пусто";
                                        $choosed = '<td class="item">' . $choosed . '</td>';
                                    } else {
                                        $email = $none;
                                    }

                                    echo '<tr class="cont">';
                                    echo $name . $sub . $email . $phone . $dreq . $choosed;
                                    echo '</tr>';

                                }
                            }
                            fclose($baseid1);
                            echo '</table>';
                        }

                        if (count($extra) !== 0) {
                            echo <<<END
                        <h3 style="margin-top: 10%;">Дополнительное
                        <div class="add">Всё</div>
                        </h3>
                        <table style="width: 100%; text-align: center;border-collapse:collapse">
                        <tr>
                            <th style="background: #ffffff10; width: 1px">Имя</th>
                            <th style="background: #ffffff10">Номер</th>
                            <th style="background: #ffffff10">Выбранная Дата</th>
                            <th style="background: #ffffff10">Дата запроса</th>
                            <th style="background: #ffffff10">Тип</th>
                        </tr>
                        END;

                            $limit1 = count($extra) >= $limitv ? $limitv : count($extra);

                            for ($i = 0; $i < $limit1; $i++) {
                                $baseid1 = fopen("Requests/" . $extra[$i] . "/extra.json", 'r');
                                while (!feof($baseid1)) {
                                    $ids1 = fgets($baseid1);
                                    $ids1view = json_decode($ids1, true);

                                    if ($ids1view[$extra[$i]]['name'] !== null) {
                                        $name = strlen($ids1view[$extra[$i]]['name']) > 0 ? $ids1view[$extra[$i]]['name'] : "Пусто";
                                        $name = '<td class="item">' . $name . '</td>';
                                    } else {
                                        $name = $none;
                                    }

                                    if ($ids1view[$extra[$i]]['bday'] !== null) {
                                        $bday = strlen($ids1view[$extra[$i]]['bday']) > 0 ? $ids1view[$extra[$i]]['bday'] : "Пусто";
                                        $bday = '<td class="item">' . $bday . '</td>';
                                    } else {
                                        $bday = $none;
                                    }

                                    if ($ids1view[$extra[$i]]['phone'] !== null) {
                                        $phone = strlen($ids1view[$extra[$i]]['phone']) > 0 ? $ids1view[$extra[$i]]['phone'] : "Пусто";
                                        $phone = '<td class="item">' . $phone . '</td>';
                                    } else {
                                        $phone = $none;
                                    }

                                    if ($ids1view[$extra[$i]]['dreq'] !== null) {
                                        $dreq = strlen($ids1view[$extra[$i]]['dreq']) > 0 ? $ids1view[$extra[$i]]['dreq'] : "Пусто";
                                        $dreq = '<td class="item">' . $dreq . '</td>';
                                    } else {
                                        $dreq = $none;
                                    }

                                    if ($ids1view[$extra[$i]]['type'] !== null) {
                                        $type = strlen($ids1view[$extra[$i]]['type']) > 0 ? $ids1view[$extra[$i]]['type'] : "Пусто";
                                        $type = '<td class="item">' . $type . '</td>';
                                    } else {
                                        $type = $none;
                                    }

                                    echo '<tr class="cont">';
                                    echo $name . $phone . $bday . $dreq . $type;
                                    echo '</tr>';

                                }
                            }
                            fclose($baseid1);
                            echo '</table>';
                        }


                        if (count($gimnastika) !== 0) {
                            echo <<<END
                        <h3 style="margin-top: 10%;">Гимнастика
                        <div class="add">Всё</div>
                        </h3>
                        <table style="width: 100%; text-align: center;border-collapse:collapse">
                        <tr>
                            <th style="background: #ffffff10">Имя</th>
                            <th style="background: #ffffff10">Номер</th>
                            <th style="background: #ffffff10">Выбранная Дата</th>
                            <th style="background: #ffffff10">Дата запроса</th>
                            <th style="background: #ffffff10">Тип</th>
                        </tr>
                        END;

                            $limit1 = count($gimnastika) >= $limitv ? $limitv : count($gimnastika);

                            for ($i = 0; $i < $limit1; $i++) {
                                $baseid1 = fopen("Requests/" . $gimnastika[$i] . "/gimnastika.json", 'r');
                                while (!feof($baseid1)) {
                                    $ids1 = fgets($baseid1);
                                    $ids1view = json_decode($ids1, true);

                                    if ($ids1view[$gimnastika[$i]]['name'] !== null) {
                                        $name = strlen($ids1view[$gimnastika[$i]]['name']) > 0 ? $ids1view[$gimnastika[$i]]['name'] : "Пусто";
                                        $name = '<td class="item">' . $name . '</td>';
                                    } else {
                                        $name = $none;
                                    }

                                    if ($ids1view[$gimnastika[$i]]['bday'] !== null) {
                                        $bday = strlen($ids1view[$gimnastika[$i]]['bday']) > 0 ? $ids1view[$gimnastika[$i]]['bday'] : "Пусто";
                                        $bday = '<td class="item">' . $bday . '</td>';
                                    } else {
                                        $bday = $none;
                                    }

                                    if ($ids1view[$gimnastika[$i]]['phone'] !== null) {
                                        $phone = strlen($ids1view[$gimnastika[$i]]['phone']) > 0 ? $ids1view[$gimnastika[$i]]['phone'] : "Пусто";
                                        $phone = '<td class="item">' . $phone . '</td>';
                                    } else {
                                        $phone = $none;
                                    }

                                    if ($ids1view[$gimnastika[$i]]['dreq'] !== null) {
                                        $dreq = strlen($ids1view[$gimnastika[$i]]['dreq']) > 0 ? $ids1view[$gimnastika[$i]]['dreq'] : "Пусто";
                                        $dreq = '<td class="item">' . $dreq . '</td>';
                                    } else {
                                        $dreq = $none;
                                    }

                                    if ($ids1view[$gimnastika[$i]]['type'] !== null) {
                                        $type = strlen($ids1view[$gimnastika[$i]]['type']) > 0 ? $ids1view[$gimnastika[$i]]['type'] : "Пусто";
                                        $type = '<td class="item">' . $type . '</td>';
                                    } else {
                                        $type = $none;
                                    }

                                    echo '<tr class="cont">';
                                    echo $name . $phone . $bday . $dreq . $type;
                                    echo '</tr>';

                                }
                            }
                            fclose($baseid1);
                            echo '</table>';
                        }

                        if (count($trx) !== 0) {
                            echo <<<END
                        <h3 style="margin-top: 10%;">TRX
                        <div class="add">Всё</div>
                        </h3>
                        <table style="width: 100%; text-align: center;border-collapse:collapse">
                        <tr style="height: 55px;">
                            <th style="background: #ffffff10">Имя</th>
                            <th style="background: #ffffff10">Номер</th>
                            <th style="background: #ffffff10">Выбранная Дата</th>
                            <th style="background: #ffffff10">Дата запроса</th>
                        </tr>
                        END;

                            $limit1 = count($trx) >= $limitv ? $limitv : count($trx);

                            for ($i = 0; $i < $limit1; $i++) {
                                $baseid1 = fopen("Requests/" . $trx[$i] . "/trx.json", 'r');
                                while (!feof($baseid1)) {
                                    $ids1 = fgets($baseid1);
                                    $ids1view = json_decode($ids1, true);

                                    if ($ids1view[$trx[$i]]['name'] !== null) {
                                        $name = strlen($ids1view[$trx[$i]]['name']) > 0 ? $ids1view[$trx[$i]]['name'] : "Пусто";
                                        $name = '<td class="item">' . $name . '</td>';
                                    } else {
                                        $name = $none;
                                    }

                                    if ($ids1view[$trx[$i]]['bday'] !== null) {
                                        $bday = strlen($ids1view[$trx[$i]]['bday']) > 0 ? $ids1view[$trx[$i]]['bday'] : "Пусто";
                                        $bday = '<td class="item">' . $bday . '</td>';
                                    } else {
                                        $bday = $none;
                                    }

                                    if ($ids1view[$trx[$i]]['phone'] !== null) {
                                        $phone = strlen($ids1view[$trx[$i]]['phone']) > 0 ? $ids1view[$trx[$i]]['phone'] : "Пусто";
                                        $phone = '<td class="item">' . $phone . '</td>';
                                    } else {
                                        $phone = $none;
                                    }

                                    if ($ids1view[$trx[$i]]['dreq'] !== null) {
                                        $dreq = strlen($ids1view[$trx[$i]]['dreq']) > 0 ? $ids1view[$trx[$i]]['dreq'] : "Пусто";
                                        $dreq = '<td class="item">' . $dreq . '</td>';
                                    } else {
                                        $dreq = $none;
                                    }

                                    echo '<tr class="cont">';
                                    echo $name . $phone . $bday . $dreq;
                                    echo '</tr>';

                                }
                            }
                            fclose($baseid1);
                            echo '</table>';
                        }


                        
                        if (count($viit) !== 0) {
                            echo <<<END
                        <h3 style="margin-top: 10%;">Интервальная тренировка
                        <div class="add">Всё</div>
                        </h3>
                        <table style="width: 100%; text-align: center;border-collapse:collapse">
                        <tr style="height: 55px;">
                            <th style="background: #ffffff10">Имя</th>
                            <th style="background: #ffffff10">Номер</th>
                            <th style="background: #ffffff10">Выбранная Дата</th>
                            <th style="background: #ffffff10">Дата запроса</th>
                        </tr>
                        END;

                            $limit1 = count($viit) >= $limitv ? $limitv : count($viit);

                            for ($i = 0; $i < $limit1; $i++) {
                                $baseid1 = fopen("Requests/" . $viit[$i] . "/viit.json", 'r');
                                while (!feof($baseid1)) {
                                    $ids1 = fgets($baseid1);
                                    $ids1view = json_decode($ids1, true);

                                    if ($ids1view[$viit[$i]]['name'] !== null) {
                                        $name = strlen($ids1view[$viit[$i]]['name']) > 0 ? $ids1view[$viit[$i]]['name'] : "Пусто";
                                        $name = '<td class="item">' . $name . '</td>';
                                    } else {
                                        $name = $none;
                                    }

                                    if ($ids1view[$viit[$i]]['bday'] !== null) {
                                        $bday = strlen($ids1view[$viit[$i]]['bday']) > 0 ? $ids1view[$viit[$i]]['bday'] : "Пусто";
                                        $bday = '<td class="item">' . $bday . '</td>';
                                    } else {
                                        $bday = $none;
                                    }

                                    if ($ids1view[$viit[$i]]['phone'] !== null) {
                                        $phone = strlen($ids1view[$viit[$i]]['phone']) > 0 ? $ids1view[$viit[$i]]['phone'] : "Пусто";
                                        $phone = '<td class="item">' . $phone . '</td>';
                                    } else {
                                        $phone = $none;
                                    }

                                    if ($ids1view[$viit[$i]]['dreq'] !== null) {
                                        $dreq = strlen($ids1view[$viit[$i]]['dreq']) > 0 ? $ids1view[$viit[$i]]['dreq'] : "Пусто";
                                        $dreq = '<td class="item">' . $dreq . '</td>';
                                    } else {
                                        $dreq = $none;
                                    }

                                    echo '<tr class="cont">';
                                    echo $name . $phone . $bday . $dreq;
                                    echo '</tr>';

                                }
                            }
                            fclose($baseid1);
                            echo '</table>';
                        }

                        if (count($rastyazhka) !== 0) {
                            echo <<<END
                        <h3 style="margin-top: 10%;">Растяжка
                        <div class="add">Всё</div>
                        </h3>
                        <table style="width: 100%; text-align: center;border-collapse:collapse">
                        <tr style="height: 55px;">
                            <th style="background: #ffffff10">Имя</th>
                            <th style="background: #ffffff10">Номер</th>
                            <th style="background: #ffffff10">Выбранная Дата</th>
                            <th style="background: #ffffff10">Дата запроса</th>
                        </tr>
                        END;

                            $limit1 = count($rastyazhka) >= $limitv ? $limitv : count($rastyazhka);

                            for ($i = 0; $i < $limit1; $i++) {
                                $baseid1 = fopen("Requests/" . $rastyazhka[$i] . "/rastyazhka.json", 'r');
                                while (!feof($baseid1)) {
                                    $ids1 = fgets($baseid1);
                                    $ids1view = json_decode($ids1, true);

                                    if ($ids1view[$rastyazhka[$i]]['name'] !== null) {
                                        $name = strlen($ids1view[$rastyazhka[$i]]['name']) > 0 ? $ids1view[$rastyazhka[$i]]['name'] : "Пусто";
                                        $name = '<td class="item">' . $name . '</td>';
                                    } else {
                                        $name = $none;
                                    }

                                    if ($ids1view[$rastyazhka[$i]]['bday'] !== null) {
                                        $bday = strlen($ids1view[$rastyazhka[$i]]['bday']) > 0 ? $ids1view[$rastyazhka[$i]]['bday'] : "Пусто";
                                        $bday = '<td class="item">' . $bday . '</td>';
                                    } else {
                                        $bday = $none;
                                    }

                                    if ($ids1view[$rastyazhka[$i]]['phone'] !== null) {
                                        $phone = strlen($ids1view[$rastyazhka[$i]]['phone']) > 0 ? $ids1view[$rastyazhka[$i]]['phone'] : "Пусто";
                                        $phone = '<td class="item">' . $phone . '</td>';
                                    } else {
                                        $phone = $none;
                                    }

                                    if ($ids1view[$rastyazhka[$i]]['dreq'] !== null) {
                                        $dreq = strlen($ids1view[$rastyazhka[$i]]['dreq']) > 0 ? $ids1view[$rastyazhka[$i]]['dreq'] : "Пусто";
                                        $dreq = '<td class="item">' . $dreq . '</td>';
                                    } else {
                                        $dreq = $none;
                                    }

                                    echo '<tr class="cont">';
                                    echo $name . $phone . $bday . $dreq;
                                    echo '</tr>';

                                }
                            }
                            fclose($baseid1);
                            echo '</table>';
                        }








                        echo '<script src="lib.js"></script>';
                        echo '<script>';
                        echo <<<EOT
                        var base64;
                        var imgtag = document.getElementById("image-show");
                        var img = document.getElementById("imagehidden");
                        var fc = document.querySelectorAll(".formcreate");
                        var add = document.querySelectorAll(".add");
                        var idcurrent1 = 0;

                        add[0].onclick = function() {
                            postForm('/admin/index.php', {password: '$password'});
                        }

                        add[1].onclick = function() {
                            postForm('/admin/pilates.php', {password: '$password'});
                        }

                        add[2].onclick = function() {
                            postForm('/admin/reab.php', {password: '$password'});
                        }

                        add[3].onclick = function() {
                            postForm('/admin/tour.php', {password: '$password'});
                        }

                        add[4].onclick = function() {
                            postForm('/admin/massage.php', {password: '$password'});
                        }

                        add[5].onclick = function() {
                            postForm('/admin/kursy.php', {password: '$password'});
                        }

                        add[6].onclick = function() {
                            postForm('/admin/extra.php', {password: '$password'});
                        }

                        add[7].onclick = function() {
                            postForm('/admin/gimnastika.php', {password: '$password'});
                        }

                        add[8].onclick = function() {
                            postForm('/admin/trx.php', {password: '$password'});
                        }

                        add[9].onclick = function() {
                            postForm('/admin/viit.php', {password: '$password'});
                        }

                        add[10].onclick = function() {
                            postForm('/admin/rastyazhka.php', {password: '$password'});
                        }

                        function openTab(evt, tabName) {
                            var i, tabcontent, tablinks;
                            tabcontent = document.getElementsByClassName("tab");
                            for (i = 0; i < tabcontent.length; i++) {
                              tabcontent[i].className = tabcontent[i].className.replace(" activetab", "");
                            }
                            tablinks = document.getElementsByClassName("tablink");
                            for (i = 0; i < tablinks.length; i++) {
                              tablinks[i].className = tablinks[i].className.replace(" activetab", "");
                            }
                            document.getElementById(tabName).className += " activetab";
                            evt.currentTarget.className += " activetab";
                          }

                          function validateFileType(target, event){
                            var fileName = document.getElementById("imginpt").value;
                            var idxDot = fileName.lastIndexOf(".") + 1;
                            var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
                            if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
                                var selectedFile = event.target.files[0];
                                var reader = new FileReader();
                                imgtag.title = selectedFile.name;
                                  
                                reader.onload = function(event) {
                                    imgtag.src = event.target.result;
                                    img.src = event.target.result;
                                };
                                reader.readAsDataURL(selectedFile);
                            }else{
                                target.value = "";
                            }   
                        }

                        var cooldown = true;
                        document.querySelector('form').addEventListener('submit', function(event) {
                            event.preventDefault();
                            if(cooldown) {
                                if(fc[0].value.length < 8 && fc[1].value.length < 500 && img.src == "") {
                                } else{
                                    cooldown = !cooldown;
                                    document.querySelector('.enabled').innerHTML = '<div id="canvas"><canvas class="canva"></canvas></div>';
                                    document.querySelector('.enabled').style.background = '#1a40c9';
                                    loader();
                                    document.querySelector(".textarea").value = nl2br(document.querySelector(".textarea").value);
                                    upload(event);
                                }
                            }
                        });

                        function upload(event){
                            var canvas = document.createElement("canvas");

                            canvas.width = img.width;
                            canvas.height = img.height;
                            var ctx = canvas.getContext("2d");
                            ctx.drawImage(img, 0, 0);
                            var dataURL = canvas.toDataURL();
                            var base641 = dataURL.split(",")[1];

                            var formData = new FormData();
                            formData.append("image", base641);
                            fetch("https://api.imgbb.com/1/upload?key=36922d8acb54cdccc20783694bd395b7", {
                                method: "POST",
                                body: formData,
                            })
                            .then((response) => response.json())
                            .then((result) => {
                                console.log(result);
                                document.querySelector(".image1").value = result.data.url;
                                event.target.submit();
                            })
                            .catch((error) => {
                                console.error("Error:", error);
                            });
                        }
                        </script>
                        EOT;
                        echo '</table>';
                        echo '<div style="opacity: 0.4; font-size: 10px; margin-top: 25px">При сбросе самого списка аутификации могут не показываться заявки до сброса.</div>';
                    } else {
                        echo "<div>Пока никто не оставлял заявки.</div>";
                    }
                    echo '</div>';
                    echo '<div id="tab2" class="tab ' . $tab2 . '" style="height: calc(95% - 65px)">';
                    echo <<<END
                    <div class="nav">
                        <div class="nav-i" onclick="document.querySelectorAll('.book')[0].style.display = 'flex';">
                            <img width="30" height="30" src="https://img.icons8.com/external-becris-lineal-becris/64/CCCCCC/external-add-mintab-for-ios-becris-lineal-becris-2.png"/>
                        </div>
                    </div>
                    END;
                    $directory = "Blogs/";
                    $filecount = 0;
                    $index = 0;
                    $files2 = glob($directory . "*");

                    usort($files2, function($a,$b){
                        return filemtime($a) - filemtime($b);
                      });
                    if ($files2)
                        ($filecount = count($files2));
                    $id = array();
                    if (count($files2) > 0) {
                        foreach (array_filter($files2, 'is_file') as $file) {
                            $var = str_replace($directory, "", $file);
                            $id[$index] = str_replace(".json", "", $var);
                            $index++;
                        }
                        $id = array_reverse($id);
                        $limit33 = $filecount >= 25 ? 25 : $filecount;

                        echo <<<EOT
                        <div class="book" style="left: 0">
                            <div class="book-i2">
                                <div style="text-align: left">
                                    <h2>Вы уверены?</h2>
                                    <p>Публикация возвратно исчезнет с базы. Вы уверены, что ходите произвести данное действие?</p>
                                </div>
                                <div style="display:flex">
                                    <button type="button" class="submit1 disabled" style="margin-right: 15px" onclick="document.querySelectorAll('.book')[1].style.display = 'none';">Отмена</button>
                                    <button type="submit" class="submit1 submit2 enabled" onclick="postForm('/admin.php', {password: '$password',csrf_token: '$csrf_token', delete: idcurrent1});">Удалить</button>
                                </div>
                            </div>
                        </div>
                        EOT;
                        
                        echo <<<EOT
                            <div class="book" style="left: 0">
                                <div class="book-i2">
                                    <p>
                                        <h3>Редактирование публикации</h3>
                                    </p>
                                    <form action="/admin.php" method="POST" onsubmit="this.disabled = true">
                                        <input type="hidden" name="password" value="$password"></input>
                                        <input type="hidden" name="csrf_token" value="$csrf_token">
                                        <input type="hidden" name="index1" value="$csrf_token">
                                        <input type="hidden" name="edit" class="editt1">
                                        <input type="hidden" name="img" class="image1">
                                        <div style="display: flex; margin-bottom: 5%">
                                            <textarea type="text"
                                                style="height: auto; resize: none; margin: 0; padding: 15px; font-size: 18px"
                                                name="title" placeholder="Название" class="pass formcreate ttx2"
                                                autocomplete="off"
                                                maxlength="64"></textarea style="">
                            </div>
                            <div>
                                <div class="nav n-book">
                                    <div class="nav-i n-n-i" onclick="document.querySelector('.textarea').value += '*Жирный текст*';">
                                        <img width="20" height="20" src="https://img.icons8.com/ios-filled/50/ffffff/bold.png" />
                                    </div>
                                    <div class="nav-i n-n-i" onclick="document.querySelector('.textarea').value += '|Курсив|';">
                                        <img width="20" height="20" src="https://img.icons8.com/external-tal-revivo-bold-tal-revivo/50/ffffff/external-italics-text-style-funtion-button-for-document-application-text-bold-tal-revivo.png" />
                                    </div>
                                    <div class="nav-i n-n-i" onclick="document.querySelector('.textarea').value += '$space •Список•';">
                                        <img width="20" height="20" src="https://img.icons8.com/ios-glyphs/50/ffffff/list--v1.png" />
                                    </div>
                                </div>

                                <textarea type="text" name="sub" placeholder="Описание" class="pass textarea formcreate ttx1" autocomplete="off" maxlength="10240"></textarea>
                                        </div>
                                        <div style="display:flex">
                                            <button type="button" class="submit1 disabled" style="margin-right: 15px"
                                                onclick="document.querySelectorAll('.book')[2].style.display = 'none';">Отмена</button>
                                            <button type="submit" class="submit1 enabled">Опубликовать</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        EOT;

                        for ($i = 0; $i < $limit33; $i++) {
                            $baseid1 = fopen($directory . $id[$i] . ".json", 'r');
                            while (!feof($baseid1)) {
                                $ids1 = fgets($baseid1);
                                $ids1view = json_decode($ids1, true);

                                $sub3 = strlen($ids1view[$id[$i]]['sub']) > 0 ? strip_tags($ids1view[$id[$i]]['sub']) : "Отсутсвует";
                                
                                $sub1 = str_replace("*", " ", strip_tags($ids1view[$id[$i]]['sub']));
                                $sub1 = str_replace("|", " ", strip_tags($sub1));
                                $sub1 = str_replace("•", " ", strip_tags($sub1));
                                $title = strlen($ids1view[$id[$i]]['title']) > 0 ? $ids1view[$id[$i]]['title'] : "Отсутсвует";
                                $sub = strlen($ids1view[$id[$i]]['sub']) > 0 ? $sub1 : "Отсутсвует";
                                $img = strlen($ids1view[$id[$i]]['img']) > 0 ? $ids1view[$id[$i]]['img'] : "https://img.icons8.com/fluency/1000/image.png";
                                $time = strlen($ids1view[$id[$i]]['time']) > 0 ? $ids1view[$id[$i]]['time'] : "01.01.1970";

                                $idcurrent = $id[$i];
                                echo <<<EOT
                                <div class="news">
                                    <div class="container nobr" style="margin-bottom: 0">
                                        <img src="$img" class="imgnobr" style="width: 90px; height: 90px; border-radius: 10px">
                                        <div>
                                            <p class="ttl1" hidden>$sub3</p>
                                            <strong class="ttl2">$title</strong><br>
                                            <div class="substr vb1">$sub</div>
                                            $time
                                        </div>
                                    </div>
                                    <div class="nav" style="background: none; padding: 0">
                                        <div class="nav-i n-n-i" style="width: 50px; height: 50px; background: none" onclick="
                                        idcurrent1 = '$idcurrent'; 
                                        document.querySelectorAll('.book')[1].style.display = 'flex';
                                        ">
                                            <img width="32" height="32" src="https://img.icons8.com/fluency-systems-regular/50/00b5cc/trash--v1.png" style="margin: 0"/>
                                        </div>

                                        <div class="nav-i n-n-i" style="width: 50px; height: 50px; background: none" onclick="
                                        idcurrent1 = '$idcurrent';
                                        document.querySelectorAll('.book')[2].style.display = 'flex';
                                        document.querySelector('.ttx1').value = document.querySelectorAll('.ttl1')[$i].textContent;
                                        document.querySelector('.ttx2').value = document.querySelectorAll('.ttl2')[$i].textContent;
                                        document.querySelector('.editt1').value = idcurrent1;
                                        ">
                                            <img width="35" height="35" src="https://img.icons8.com/sf-regular/50/00b5cc/edit.png" style="margin: 0"/>
                                        </div>
                                    </div>
                                </div>
                                EOT;
                            }
                            fclose($baseid1);
                        }
                        echo '</div>';
                        echo '<div id="tab3" class="tab" style="height: calc(95% - 65px)">';
                        if (count($contacts) !== 0) {

                            $limit1 = count($contacts) >= $limitv ? $limitv : count($contacts);

                            for ($i = 0; $i < $limit1; $i++) {
                                $baseid1 = fopen("Requests/" . $contacts[$i] . "/contacts.json", 'r');
                                while (!feof($baseid1)) {
                                    $ids1 = fgets($baseid1);
                                    $ids1view = json_decode($ids1, true);

                                    if ($ids1view[$contacts[$i]]['name'] !== null) {
                                        $name = strlen($ids1view[$contacts[$i]]['name']) > 0 ? $ids1view[$contacts[$i]]['name'] : "Пусто";
                                        $name = '<td class="item">' . $name . '</td>';
                                    } else {
                                        $name = $none;
                                    }

                                    if ($ids1view[$contacts[$i]]['email'] !== null) {
                                        $email = strlen($ids1view[$contacts[$i]]['email']) > 0 ? $ids1view[$contacts[$i]]['email'] : "Пусто";
                                        $email = '<td class="item">' . $email . '</td>';
                                    } else {
                                        $email = $none;
                                    }

                                    if ($ids1view[$contacts[$i]]['phone'] !== null) {
                                        $phone = strlen($ids1view[$contacts[$i]]['phone']) > 0 ? $ids1view[$contacts[$i]]['phone'] : "Пусто";
                                        $phone = '<td class="item">' . $phone . '</td>';
                                    } else {
                                        $phone = $none;
                                    }

                                    if ($ids1view[$contacts[$i]]['dreq'] !== null) {
                                        $dreq = strlen($ids1view[$contacts[$i]]['dreq']) > 0 ? $ids1view[$contacts[$i]]['dreq'] : "Пусто";
                                        $dreq = '<td class="item">' . $dreq . '</td>';
                                    } else {
                                        $dreq = $none;
                                    }

                                    if ($ids1view[$contacts[$i]]['quest'] !== null) {
                                        $quest = strlen($ids1view[$contacts[$i]]['quest']) > 0 ? $ids1view[$contacts[$i]]['quest'] : "Пусто";
                                        $quest = '<td class="item">' . $quest . '</td>';
                                    } else {
                                        $quest = $none;
                                    }

                                    echo '<tr class="cont">';
                                    echo <<<EOT

                                    <div class="news">
                                        <div class="container nobr">
                                        <div>
                                            <strong>$name</strong><br>
                                            <div class="substr" style="color: #aaa">$quest</div>
                                            <br>
                                            <d id="blue">+7 $phone</d><br>
                                            <d id="blue">$email</d>
                                            <p style="float: right">$dreq</p>
                                        </div>
                                    </div>
                                    </div>
                                    EOT;
                                    echo '</tr>';

                                }
                            }
                            fclose($baseid1);
                            echo '';
                        }
                        echo '</div>';
                        echo '</div>';
                    } else {
                        echo '<div class="empty"><div style="display: block;display: flex;flex-direction: column;align-items: center"><img width="50%" height="auto" src="https://img.icons8.com/emoji/450/no-entry-emoji.png" alt="no-entry-emoji"/>Пока что отсутствует.</div></div>';
                    }
                    echo '</div>';
                }
                fclose($baseid);
                die;
            } else {
            }
        }
    }
    echo '<div class="body2"><div class="field">';
    echo '<div style="width: 100%; display: flex; justify-content: center; margin-bottom: 35%"><img src="res/2.png" alt="website icon" style="width: 150px"></div>';
    echo '<div style="max-width: 270px; text-align: center; margin-bottom: 15%"><h2>Для начала введите пароль</h2></div>';
    echo '<form action="admin.php" method="POST" spellcheck="false" class="form1">';
    if (!empty($_POST) && $_POST['password'] !== $password) {
        echo '<div style="background: #16171B; transform: translate(12px, 10px); font-size: 12px; width: 110px; height: 16px; padding-left:5px">Неверный пароль</div>';
    }
    echo '<input type="text" name="password" placeholder="Введите пароль" class="pass" autocomplete="off"></input>';
    echo '<button class="submit1">Войти</button>';
    echo '</form></div></div>';
    echo <<<END
    <script src="lib.js"></script>
    <script>
    var cooldown = true;
    document.querySelector('form').addEventListener('submit', function(event) {
        event.preventDefault();
        if(cooldown) {
            cooldown = !cooldown;
            setTimeout(function() {
                document.querySelector('.submit1').innerHTML = '<div id="canvas"><canvas class="canva"></canvas></div>';
                document.querySelector('.submit1').style.background = '#1a40c9';
                loader();
            }, 150);

            setTimeout(function() {
                event.target.submit();
            }, 1500);
        }
    });
    </script>
    END;
    echo '<div class="foott">Данная панель предоставляет все процессы происходящие на сайте. Не пытайтесь обойти систему, она защищена двух-этапной аутификацией на случай слива паролей.</div>';
    ?>
</body>
</html>