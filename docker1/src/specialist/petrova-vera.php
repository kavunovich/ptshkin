<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/x-icon" href="/favicon/faviconV2.png"/>
        <title>Вера Николаевна Петрова</title>
        <link rel="stylesheet" href="/lib.css">
        <meta name="viewport" content="width=device-width,initial-scale=0.9,user-scalable=0">
        <style>html {display: none;}.body1{margin-top: 75px;}</style>
    </head>
    <body>
        <div class="w1"><ul id="alw"></ul></div><div class="w2"><ul id="alw"></ul></div><div class="w3 ww3"><ul id="alw"></ul></div><div class="w4 ww3"><ul id="alw"></ul></div><div class="w5 ww3"><ul id="alw"></ul></div>
        <div class="yclients"><div class="yanim"><div class="oval">Онлайн Запись</div></div></div><iframe class="yclientw"></iframe>
        <div class="bar"><img src="/res/photo.png" class="icon" onclick="window.location.href='/index.php'"><ul class="bar_ul"></ul><div class="sclink"></div><div class="mode-phone"><div class="line l1"></div><div class="line l2"></div></div></div><div class="m-menu"><div><ul class="bar_ul2"></ul></div></div><div id="m-ulp"></div>
    <div class="body1">
    <div class="foot" style="padding: 10px;">
        <hh1>Вера Николаевна Петрова</hh1>
    </div>
          <div class="content" style="padding: 0">
                              <div class="c-body">
                              <div class="c-item" style="vertical-align: top">
                                        <div class="img" style="background-image: url(/res/photo_2021-09-15_17-.jpg)"><!-- Колсозим натягивание фона фото --><img style="width: 100%; height: max-content;visibility:hidden" src="/res/ONE_TRAINING_2_-_168.jpg"></div>
                              </div>
                              <div class="c-item" style="padding: 5%;height: 94.5%">
                              <p class="grey">Врач педиатр, невролог, нейрореабилитолог.</p>

                              <ul class="about">
                                        <li>Первый Московский Государственный Медицинский Университет им. И.М. Сеченова
                                        </li>
                                        <li>(Врач-педиатр) 2015−2021г.
                                        </li>
                                        <li>Академия постдипломного образования федерального научно-клинического центра ФМБА России.
                                        </li>
                                        <li>Клинический ординатор (Кафедра нервных болезней и нейрореабилитации) специальность Врач-Невролог
                                        </li>
                              </ul><br>
                              С детства занималась хореографией, и поняла, что сидячая работа не для нее. Постоянно двигаться стало неотъемлемой привычкой в жизни, а ещё важнее правильно двигаться и любить это. Поэтому решила стать врачом, чтобы углубиться более детально в анатомию и физиологию человека, помогать людям и лечить движением.
                              <br><br>
                              Сейчас Вера постоянно совершенствуется и развивается в медицинском направлении, что сильно заметно по ее довольным клиентам.
                              <ul class="about">
                                        <li>Сертифицированный практик концепций европейского стандарта: Mulligan (мобилизация суставов с движением), диагностика и терапия по системе Maitland.
                                        </li>
                                        <li>Сертифицированный специалист по методу «Динамической реабилитации» Пташкина А.П.
                                        </li>
                                        <li>Сертифицированный специалист по методике проприоцептивной нейромышечной фасилитации (PNF).
                                        </li>
                                        <li>Участник и докладчик международных конференций по лечению опорно-двигательного аппарата. Автор семинаров по реабилитационному фитнесу.
                                        </li>
                                        <li>Ортопедическая диагностика, диагностика мышечных дисбалансов, постуральных нарушений.
                                        </li>
                                        <li>Лечение заболеваний опорно-двигательного аппарата ортопедического и неврологического характера.
                                        </li>
                                        <li>Лечение спортивных травм, острой и хронической боли опорно-двигательного аппарата.
                                        </li>
                                        <li>Ударно-волновая, лазерная, электротерапия. Кинезиотейпирование, тейпирование при помощи Dynamic tape.
                                        </li>
                                        <li>Курация больных с травмами конечностей.
                                        </li>
                                        <li>Комплексное лечение переднего отдела стопы (вальгусная деформация первого пальца стопы, деформация малых пальцев).
                                        </li>
                                        <li>Ударно-волновая терапия, PRP-терапия, лазерная терапия, медицинский массаж, изготовление силиконовых ортезов.
                                        </li>
                                        <li>Изготовление индивидуальных стелек Formthotics.
                                        </li>
                              </ul>
                              </div>
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
        var citi = document.querySelector(".c-body");
        var cit = document.querySelectorAll(".c-item");
        var cont = document.querySelector(".content");
        var img = document.querySelector(".img");
        var ylink = "https://b180684.yclients.com/company/183648/record-type?gcid=2018860734.1685372382&referrer=https:%2F%2Fone-training.ru%2F&o=";
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
                cit[1].style.width = "90%";
                cit[1].style.marginRight = "0";
                cit[0].style.width = "100%";
                cit[0].style.maxHeight = "500px";
                cont.style.display = "block";
                citi.style.display = "block";
                cit[1].style.display = "block";
                img.style.height = "500px";             
            } else{
                cit[1].style.width = "80%";
                cit[0].style.width = "100%";
                cit[0].style.maxHeight = "100%";
                citi.style.display = "flex";
                citi.style.flexDirection = "row-reverse";
                cont.style.display = "flex";
                img.style.height = "100%";
            }
        }
    </script>
    <script src="/lib.js"></script>
</html>