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

req_rooted("face","massage");

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
    <title>Массаж лица</title>
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
        <hh1>Массаж лица</hh1>
    </div>
    <div class="content" style="padding-bottom: 1%">
            <div class="content-w">
                <div class="c-body" style="display: flex;margin-bottom: 15%; align-items:center">
                    <div class="c-item">
                        <div>
                            <article style="font-size: 16px">
                            <b id="blue">Особенности и преимущества массажа лица</b>
                            <br>
                            Практически каждая женщина знакома с расслабляющим действием массажа, но иногда девушки забывают, что массировать нужно
                            не только тело, но и лицо. С возрастом кожа начинает обвисать, мышцы от напряжения укорачиваются, что приводит к
                            образованию складочек и морщин. Избежать этого можно с помощью правильного массирования, регулярного фейс-билдинга и
                            правильно подобранной уходовой косметики.
                            <br><br>
                            <b id="blue">Массаж лица дает следующий эффект:</b>
                            <ul class="ul16">
                                    <li>Предотвращает появление морщин и уменьшает их выраженность;</li>
                                    <li>Улучшает тургор кожи, делает дерму более эластичной и подтянутой;</li>
                                    <li>Убирает брыли и второй подбородок;</li>
                                    <li>Устраняет отечность;</li>
                                    <li>Улучшает цвет лица за счет нормализации кровообращения;</li>
                                    <li>Усиливает регенерацию.</li>
                                    <li>На лице расположены биологически активные точки, при стимуляции которых можно улучшить работу внутренних органов.</li>
                            </ul>
                            <br><br>
                            Благодаря массажу кожа будет лучше впитывать уходовые средства. Если обменные процессы в
                            дерме нарушены, даже самые дорогие кремы не дадут желаемого эффекта. Массаж позволяет
                            активизировать эти процессы, улучшить кровообращение, усилить насыщение тканей кислородом.
                            </article>
                        </div>
                    </div>
                    <div class="c-item">
                        <img style="width: 100%" src="/res/noroot4.png">
                    </div>
                </div>

                <div class="c-body" style="display: flex;flex-direction: row-reverse; margin-bottom: 15%; align-items:center">
                    <div class="c-item">
                        <div>
                            <article style="font-size: 16px">
                            <b id="blue">Показания и противопоказания</b>
                            <br>
                            В первую очередь массаж лица используют для повышения упругости кожи, чтобы избежать образования морщин или уменьшить их выраженность.
                            <br><br>
                            <b id="blue">Показаниями для проведения процедуры являются:</b>
                            <ul class="ul16">
                                    <li>Снижение упругости дермы, нечеткий овал лица;</li>
                                    <li>Появление первых морщинок;</li>
                                    <li>Повышенная жирность кожи;</li>
                                    <li>Наличие прыщиков и угрей, постакне;</li>
                                    <li>Серый цвет лица, тусклость кожи.</li>
                            </ul>
                            <b id="blue">Противопоказаниями </b>
                            для проведения процедуры являются воспаления на лице (выраженная угревая сыпь, болезненные красные прыщики, гнойники),
                            повреждения (в виде ранок или царапин), наличие висячих родинок или папиллом. Если вы недавно проводили травмирующую
                            кожный покров косметологическую процедуру (кислотный пилинг, чистку и т.д.), делать массаж можно только после того, как
                            кожа полностью восстановится.
                            <br><br>
                            Сильно выраженный купероз также может быть противопоказанием. Но в данном случае лучше проконсультироваться с врачом. Некоторые виды массажных манипуляций допустимы даже при куперозе.
                            </article>
                        </div>
                    </div>
                    <div class="c-item" style="margin-top: auto; margin-bottom: auto">
                        <img style="width: 100%" src="/res/noroot5.png">
                    </div>
                </div>

                <div class="c-body" style="display: flex;margin-bottom: 15%; align-items:center">
                    <div class="c-item">
                        <div>
                            <article style="font-size: 16px">
                            <b id="blue">Виды массажа лица</b>
                            <br>
                            Помимо классического, есть масса других видов лицевого массажа. Можно чередовать техники или использовать периодически
                            одну, наиболее подходящую. Стоит учитывать, что определенная техника выбирается с учетом типа кожи. Например, жирная
                            дерма отлично выдерживает щипки и сильное воздействие, а вот сухая слишком тонкая и чувствительная, с ней нужно
                            обращаться осторожнее.
                            <br><br>
                            <b id="blue">Существует несколько видов массажа лица:</b>
                            <br>
                            <i>Тибетский массаж лица.</i> Эта техника омоложения лица известна с древности. Во время такой
                            процедуры массируют не только лицо, но и шею, голову, область декольте. Считается, что
                            процедура способна заменить массаж всего тела, так как во время ее проведения идет работа со
                            множеством мышц, сухожилий и биологических точек.
                            <br><br>
                            <i>Буккальный.</i> При таком массаже область щек прорабатывается как снаружи, так и с внутренней
                            стороны. Специалист работает в стерильных латексных перчатках. Воздействие на слизистую
                            позволяет лучше проработать мышцы лица и укрепить их. Буккальный массаж лица дает заметный
                            подтягивающий эффект.
                            <br><br>
                            <i>Асахи.</i> Это японская разновидность массажа, при котором оказывается воздействие не только на
                            кожу, но и мышцы лица. Такую процедуру называют безоперационной подтяжкой. Давление
                            оказывается не кончиками пальцем, а ладонями.
                            </article>
                        </div>
                    </div>
                    <div class="c-item">
                        <img style="width: 100%" src="/res/noroot6.png">
                    </div>
                </div>

                <div class="c-body" style="display: flex;flex-direction: row-reverse; margin-bottom: 15%; align-items:center">
                    <div class="c-item">
                        <div>
                            <article style="font-size: 16px">
                            <i>Испанский хиромассаж.</i> Такая процедура особенно эффективна при сухой коже с куперозом.
                            Глубокие движения сменяются мягкими и расслабляющими. Во время процедуры специалист может
                            использовать не только пальцы, но и ладони и даже локти.
                            <br><br>
                            <i>Щипковый массаж по Жоке.</i> Такая процедура эффективна для нормализации жирности кожи,
                            устранения прыщей и угрей, рубцов. Все лицо после подготовки прорабатывается щипковыми
                            движениями с использованием классической техники массажа.
                            <br><br>
                            <i>Медовый.</i> Очень эффективная процедура для поддержания тонуса кожа, устранения воспалений. В
                            меде содержится огромное количество полезный веществ. Он позволяет быстро вывести лишнюю
                            жидкость и шлаки. Однако для такого массажа нужен исключительно натуральный жидкий мед без
                            примесей.
                            <br><br>
                            Нужно учитывать, что не все виды массажа подходят для самостоятельного выполнения. Некоторые
                            техники слишком сложные и требуют определенных навыков и знаний. Их можно делать только у
                            специалиста.
                            </article>
                        </div>
                    </div>
                    <div class="c-item" style="margin-top: auto; margin-bottom: auto">
                        <img style="width: 100%" src="/res/noroot7.png">
                    </div>
                </div>

                <div class="c-body" style="display: flex;margin-bottom: 15%; align-items:center">
                    <div class="c-item">
                        <div>
                            <article style="font-size: 16px">
                            <b id="blue">Виды массажа лица</b>
                            <br>
                            Перед началом процедуры нужно подобрать средство для массажа. Если кожа сухая, подойдет кокосовое масло, для жирной
                            лучше использовать масло виноградных косточек или легкий гель-крем. Текстура средства не должна быть слишком плотная,
                            но, если оно будет быстро впитываться, не получится провести полноценный массаж. Придется постоянно наносить крем.
                            Обязательно следите, чтобы средство не забивало поры.
                            <br><br>
                            <b id="blue">Подготовительные процедуры включают в себя несколько этапов:</b>
                            <ol class="ul16">
                                    <li>Тщательное очищение. Сначала нужно снять макияж специальным средством: молочком, мицеллярной водой. Затем обязательно умойтесь пенкой или гелем, промокните лицо полотенцем, но не трите его.</li>
                                    <li>Разогревание. Кожа будет лучше реагировать на массаж с кремами или маслами, если перед процедурой разогреть кожу. Распаривать лицо не нужно, достаточно приложить теплое полотенце и подождать 5 минут.</li>
                                    <li>Увлажнение. Массаж производится только после нанесения крема. Если тянуть сухую кожу, на ней будут появляться морщинки и различные повреждения. Нанесите легкий крем или масло в небольшом количестве по массажным линиям.</li>
                            </ol>
                            <br><br>
                            Не стоит пренебрегать подготовкой. Иначе можно вместо подтянутой кожи получить прыщики, комедоны и различного рода воспаления.
                            </article>
                        </div>
                    </div>
                    <div class="c-item">
                        <img style="width: 100%" src="/res/noroot8.png">
                    </div>
                </div>

                <div class="c-body" style="display: flex;flex-direction: row-reverse; margin-bottom: 15%; align-items:center">
                    <div class="c-item">
                        <div>
                            <article style="font-size: 16px">
                            <b id="blue">Тибетский массаж лица</b>
                            <br><br>
                            <b id="blue">Техника выполнения</b>
                            <br>
                            Классический массаж представляет собой щадящее воздействие на кожные покровы с использованием сывороток или кремов. Все манипуляции производятся по массажным линиям.
                            <br><br>
                            <b id="blue">Процедура проводится следующим образом:</b>
                            <br>
                            На кончики пальцев наносится небольшое количество масла, крема или лосьона. Затем вбивающими
                            легкими движениями прорабатывается все лицо. Важно, чтобы каждый участок был увлажнен.
                            <br><br>
                            Затем прорабатывается каждая область по массажным линиям. Чередуются несколько видов
                            движений: поглаживание, разминание и растирание. Процедуру специалист проводит, не отрывая
                            руки от лица пациента.
                            <br><br>
                            Если это лечебный массаж, направленный на активизацию восстановительных процессов,
                            специалист будет использовать также щипковые движения, достаточно глубокие, но не
                            оставляющие синяков. Также могут использоваться приемы вибрации.
                            <br><br>
                            Длительность одного сеанса составляет 10-15 минут. Курс включает в себя не менее 10 сеансов.
                            После проведения всего курса можно увидеть результат: более подтянутую и здоровую кожу.
                            <br><br>
                            </article>
                        </div>
                    </div>
                    <div class="c-item" style="margin-top: auto; margin-bottom: auto">
                        <img style="width: 100%" src="/res/noroot9.png">
                    </div>
                </div>

                <div class="c-body" style="display: flex;margin-bottom: 15%; align-items:center">
                    <div class="c-item">
                        <div>
                            <article style="font-size: 16px">
                            Стоит учитывать, что массаж направлен на выведение лишней жидкости, а также шлаков. Не стоит
                            во время курса принимать алкоголь, курить или есть жирную, соленую пищу. Отеки снова будут
                            скапливаться в области лица, а кровообращение будет ухудшаться за счет сужения сосудов.
                            Рекомендуется сочетать массаж лица с правильным питанием, прогулками на свежем воздухе, а
                            также питательными и увлажняющими масками для лица.
                            <br><br>
                            После массажа нужно убрать остатки масла салфеткой или ватным диском. На сухую кожу
                            дополнительно можно нанести маску или питательный крем. Рекомендуется проводить процедуру
                            вечером, чтобы не пришлось после массажа наносить макияж или выходить на яркое солнце.
                            </article>
                            <a href="/prays.php"><button class="btn-req" style="margin-top: 5%">Стоимость</button></a>
                        </div>
                    </div>
                    <div class="c-item">
                        <img style="width: 100%" src="/res/noroot10.jpg">
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

                cit[6].style.width = "auto";
                cit[6].style.marginLeft = "0";
                cit[7].style.width = "100%";

                cit[8].style.width = "auto";
                cit[8].style.marginRight = "0";
                cit[9].style.width = "100%";

                cit[10].style.width = "auto";
                cit[11].style.marginLeft = "0";
                cit[11].style.width = "100%";

                cit[12].style.width = "auto";
                cit[12].style.marginRight = "0";
                cit[13].style.width = "100%";

                cb[0].style.display = "block";
                cb[1].style.display = "block";
                cb[2].style.display = "block";
                cb[3].style.display = "block";
                cb[4].style.display = "block";
                cb[5].style.display = "block";
                cb[6].style.display = "block";
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

                cit[6].style.width = "50%";
                cit[6].style.marginLeft = "2.2%";
                cit[7].style.width = "50%";

                cit[8].style.width = "50%";
                cit[8].style.marginRight = "2.2%";
                cit[9].style.width = "50%";

                cit[10].style.width = "50%";
                cit[10].style.marginLeft = "2.2%";
                cit[11].style.width = "50%";

                cit[12].style.width = "50%";
                cit[12].style.marginRight = "2.2%";
                cit[13].style.width = "50%";

                cb[0].style.display = "flex";
                cb[1].style.display = "flex";
                cb[2].style.display = "flex";
                cb[3].style.display = "flex";
                cb[4].style.display = "flex";
                cb[5].style.display = "flex";
                cb[6].style.display = "flex";
            }
    }
</script>
<script src="/lib.js"></script>
</html>