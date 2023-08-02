<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/x-icon" href="/favicon/faviconV2.png"/>
        <title>Павел Валерьевич Казаков</title>
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
        <hh1>Павел Валерьевич Казаков</hh1>
    </div>
          <div class="content" style="padding: 0">
                              <div class="c-body">
                              <div class="c-item" style="vertical-align: top">
                                        <div class="img" style="background-image: url(/res/photo_2023-01-05_18-1.jpg)"><!-- Колсозим натягивание фона фото --><img style="width: 100%; height: max-content;visibility:hidden" src="/res/ONE_TRAINING_2_-_168.jpg"></div>
                              </div>
                              <div class="c-item" style="padding: 5%;height: 94.5%">
                              <p class="grey">Массажист.</p>

                              <ul class="about">
                                        <li>РУДН специальность «Лечебное дело»
                                        </li>
                                        <li>Курс повышение квалификации «Медицинский массаж»
                                        </li>
                              </ul><br>
                              Павел всегда чувствовал, что может помочь людям своими руками и знаниями. Это чувство направляет его до сих пор учится и развиваться в медицинском направлении и массаже.
                              <br><br>
                              На протяжении многих лет занимаясь массажем он помог людям обрести здоровье и легкость в теле. До сих пор он продолжает учиться и развиваться в этом направлении. Более 10 лет своей жизни посвятил занятию спортом, а именно Каратэ. Призер чемпионата мира, чемпионатов России и Москвы, также активно занимался самбо
                              <br><br>
                              Служил в МЧС России на должности Санитарный инструктор. Спасал жизни людей и оттачивал свои медицинские навыки.
                              <br>
                              <ul class="about">
                                        <li>Реабилитация и массаж после операций на суставах.
                                        </li>
                                        <li>Реабилитация и массаж после переломов.
                                        </li>
                                        <li>Реабилитация и массаж после разрывов связок.
                                        </li>
                                        <li>Массаж при боли в спине, грыже диска, после операций на позвоночнике.
                                        </li>
                                        <li>Восстановление подвижности суставов (мягкотканные контрактуры, замороженное плечо).
                                        </li>
                                        <li>Подбор и коррекция индивидуальных стелек Formthotics.
                                        </li>
                                        <li>Миофасциальный релиз, лечение триггерных точек.
                                        </li>
                                        <li>Работа в рамках современных мировых концепций физической терапии.
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