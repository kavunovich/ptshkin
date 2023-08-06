var bar = document.querySelector(".bar");
var mp = document.querySelector(".mode-phone");
var w1 = document.querySelector(".w1");
var w2 = document.querySelector(".w2");
var w3 = document.querySelector(".w3");
var w4 = document.querySelector(".w4");
var w5 = document.querySelector(".w5");
var body1 = document.querySelector(".body1");
var html = document.querySelector("html");
var footer = document.querySelector(".fot");
var ul = document.querySelector(".w1 #alw");
var ul2 = document.querySelector(".w2 #alw");
var ul3 = document.querySelector(".w3 #alw");
var ul4 = document.querySelector(".w4 #alw");
var ul5 = document.querySelector(".w5 #alw");
var bar_ul = document.querySelector(".bar_ul");
var bar_ul2 = document.querySelector(".bar_ul2");
var m_btn = document.querySelector(".m-menu #extra2m");
var scl = document.querySelector(".sclink");
var l1 = document.querySelector(".l1");
var l2 = document.querySelector(".l2");
var m_menu = document.querySelector(".m-menu");
var slli = 1;
var slli2 = 1;
var overflow = 0;
var back = 0;
var open = [false,false,false];
var mback = [0,0];
var alr = true;
var d = 0;
var scrollcolor = "#fff";
var scrollline = 3;

const isNumericInput = (event) => {
  const key = event.keyCode;
  return ((key >= 48 && key <= 57) ||
      (key >= 96 && key <= 105)
  );
};

const isModifierKey = (event) => {
  const key = event.keyCode;
  return (event.shiftKey === true || key === 35 || key === 36) ||
  (key === 8 || key === 9 || key === 13 || key === 46) ||
  (key > 36 && key < 41) ||
  (
      (event.ctrlKey === true || event.metaKey === true) &&
      (key === 65 || key === 67 || key === 86 || key === 88 || key === 90)
  )
};

const enforceFormat = (event) => {
  if(!isNumericInput(event) && !isModifierKey(event)){
      event.preventDefault();
  }
};

const formatToPhone = (event) => {
  if(isModifierKey(event)) {return;}
  if(event.target.value.substring(0,2) == "+7") {
      event.target.value = event.target.value.substring(2,event.target.length);
  } else if(event.target.value.substring(0,1) == "8"){
      event.target.value = event.target.value.substring(1,event.target.length);
  }

  const input = event.target.value.replace(/\D/g,'').substring(0,10);
  const areaCode = input.substring(0,3);
  const middle = input.substring(3,6);
  const last = input.substring(6,8);
  const last2 = input.substring(8,10);

  if(input.length > 8){event.target.value = `(${areaCode}) ${middle}-${last}-${last2}`}
  else if(input.length > 6){event.target.value = `(${areaCode}) ${middle}-${last}`}
  else if(input.length > 3){event.target.value = `(${areaCode}) ${middle}`}
  else if(input.length > 0){event.target.value = `(${areaCode}`}
};

if(location.pathname !== "/admin.php"){

var w1list = ["О нас", "Специалисты", "Методика", "Уровень занятий", "Правила", "Отзывы", "Акции", "Новости"];
var w1link = ["/about-us.php", "/nashi-specialisty.php", "/celnyi-process.php", "/info.php", "/pravila.php", "/feedback.php", "/promotions.php", "/blog.php"];

var w2list = ["Реабилитация", "Тренировки", "Массаж", "Ортопедические стельки", "Тейпирование", "Диетология"];
                                                  var w2link = ["/uslugi/ortopedicheskie-stelki.php", "/uslugi/teypirovanie.php", "/uslugi/dietologiya.php"];

var w3list = ["Динамическая реабилитация", "Реабилитация позвоночника", "Реабилитация суставов", "Реабилитация для детей"];
var w3link = ["/uslugi/reabilitacia/dinamicheskaya.php", "/uslugi/reabilitacia/pozvonochnika.php", "/uslugi/reabilitacia/sustavov.php", "/uslugi/reabilitacia/detyam.php"];

var w4list = ["Пилатес", "Детская гимнастика", "Растяжка", "До родов и после", "Интервальная тренировка", "TRX", "Онлайн тренировка"];
var w4link = ["/uslugi/dinamicheskiy-pilates.php", "/uslugi/detskaya-gimnastika.php", "/uslugi/rastyazhka.php", "/uslugi/prenatalny-postnatalny-pilates.php", "/uslugi/viit.php", "/uslugi/trx.php", "/uslugi/online-training.php"];

var w5list = ["Классический", "Антицелюлитный", "Спортивный", "Детский массаж", "Массаж лица"];
var w5link = ["/uslugi/klassicheskiy.php", "/uslugi/modeliruyushchiy.php", "/uslugi/sportivnyy.php", "/uslugi/detskiy.php", "/uslugi/face.php"];

var barlist = ["О центре", "Услуги", "Обучение", "Туры", "Стоимость", "Контакты"];

var barlink = ["/kursy.php", "/travel.php", "/prays.php", "/contacts.php"];

// Формирование навигационных кнопок

for(let i = 0; i < barlist.length; i++){
  var li = document.createElement("li");
  let href = document.createElement("a");
  if(i < 2) {
  li.textContent = barlist[i];
  li.setAttribute("id", "extra2");
  i == 0 ? (li.setAttribute("class", "ww1")) : li.setAttribute("class", "ww2");
  } else{
    href.textContent = barlist[i];
    li.appendChild(href);
    href.setAttribute("href", barlink[i-2]);
  }
  bar_ul.appendChild(li);
}

for(let i = 0; i < barlist.length; i++){  
  var div = document.createElement("div");
  var li = document.createElement("li");
  if(i < 2) {
    var trg = document.createElement("img");
    li.setAttribute("id", "extra2m");
    trg.setAttribute("class", "trg");
    trg.setAttribute("src", "https://img.icons8.com/ios-filled/50/FFFFFF/sort-down.png");
    i == 0 ? (li.setAttribute("class", "ww1m")) : li.setAttribute("class", "ww2m"); 
    li.textContent = barlist[i];
    li.appendChild(trg);
  } else{
    var href = document.createElement("a");
    href.setAttribute("href", barlink[i-2]);
    href.textContent = barlist[i];
    li.appendChild(href);
  }
  //до костылей еще 2 строчки кода
  div.appendChild(li);
  bar_ul2.appendChild(div);
  // код для окон
  if(i < 2) {
    var win = document.createElement("div");
    win.setAttribute("class", "m-win mw" + i);
    div.appendChild(win);
    //любимые костыли
    li.onclick = function() {
      var win1 = document.querySelectorAll(".m-win");
      var trg1 = document.querySelectorAll(".trg");
      var li1 = document.querySelectorAll("#extra2m");
      if(mback[i] == 1){
        win1[i].style.display = "none";
        trg1[i].setAttribute("src", "https://img.icons8.com/ios-filled/50/FFFFFF/sort-down.png");
        li1[i].style.color = "#FFFFFF";
        mback[i] = 0;
      } else {
        win1[i].style.display = "block";
        trg1[i].setAttribute("src", "https://img.icons8.com/ios-filled/50/00B5CC/sort-down.png");
        li1[i].style.color = "#00B5CC";
        mback[i] = 1;
        if(mback[0] == 1 && i !== 1){
          win1[1].style.display = "none";
          trg1[1].setAttribute("src", "https://img.icons8.com/ios-filled/50/FFFFFF/sort-down.png");
          li1[1].style.color = "#FFFFFF";
          mback[1] = 0;
        }
        if(mback[1] == 1 && i !== 0){
          win1[0].style.display = "none";
          trg1[0].setAttribute("src", "https://img.icons8.com/ios-filled/50/FFFFFF/sort-down.png");
          li1[0].style.color = "#FFFFFF";
          mback[0] = 0;
        }
      }
    }
  }
}

    scl.innerHTML = `
      <a href="https://vk.com/one.training" target="_blank" rel="nofollow noopener">
        <svg width="30px" style="margin-right: 5px" viewBox="0 0 100 100" fill="none">
          <path fill-rule="evenodd" d="M50 100c27.614 0 50-22.386 50-50S77.614 0 50 0 0 22.386 0 50s22.386 50 50 50ZM25 34c.406 19.488 10.15 31.2 27.233 31.2h.968V54.05c6.278.625 11.024 5.216 12.93 11.15H75c-2.436-8.87-8.838-13.773-12.836-15.647C66.162 47.242 71.783 41.62 73.126 34h-8.058c-1.749 6.184-6.932 11.805-11.867 12.336V34h-8.057v21.611C40.147 54.362 33.838 48.304 33.556 34H25Z" fill="#ffffff"></path>
        </svg>
      </a>
      <a href="https://t.me/+iUPFR034ny8zMGQy" target="_blank" rel="nofollow noopener">
        <svg width="30px" style="margin-right: 5px" viewBox="0 0 100 100">
          <path fill-rule="evenodd" d="M50 100c27.614 0 50-22.386 50-50S77.614 0 50 0 0 22.386 0 50s22.386 50 50 50Zm21.977-68.056c.386-4.38-4.24-2.576-4.24-2.576-3.415 1.414-6.937 2.85-10.497 4.302-11.04 4.503-22.444 9.155-32.159 13.734-5.268 1.932-2.184 3.864-2.184 3.864l8.351 2.577c3.855 1.16 5.91-.129 5.91-.129l17.988-12.238c6.424-4.38 4.882-.773 3.34.773l-13.49 12.882c-2.056 1.804-1.028 3.35-.129 4.123 2.55 2.249 8.82 6.364 11.557 8.16.712.467 1.185.778 1.292.858.642.515 4.111 2.834 6.424 2.319 2.313-.516 2.57-3.479 2.57-3.479l3.083-20.226c.462-3.511.993-6.886 1.417-9.582.4-2.546.705-4.485.767-5.362Z" fill="#ffffff"></path>
        </svg>
      </a>
      <a href="https://dzen.ru/id/61f811e792b07973cc66e583" target="_blank" rel="nofollow noopener">
        <img src="/res/dzen.svg" alt="website icon" style="width: 30px;">
      </a>
    `;

var list = document.querySelector(".bar ul");
var li1 = document.querySelector(".ww1");
var li2 = document.querySelector(".ww2");

// Формирование окон
for(let i = 0; i < w1list.length; i++){
  var li = document.createElement("li");
  var link = document.createElement("a");
  link.textContent = w1list[i];
  link.setAttribute("href", w1link[i]);
  li.appendChild(link);
  ul.appendChild(li);
}

for(let i = 0; i < w2list.length; i++){
  var li = document.createElement("li");
  var link = document.createElement("a");
  link.textContent = w2list[i];
  if(i < 3) {
  li.setAttribute("id", "extra3");    
  } else{
  link.setAttribute("href", w2link[i-3]);
  }
  li.appendChild(link);
  ul2.appendChild(li);
}

for(let i = 0; i < w3list.length; i++){
  var li = document.createElement("li");
  var link = document.createElement("a");
  link.textContent = w3list[i];
  link.setAttribute("href", w3link[i]);
  li.appendChild(link);
  ul3.appendChild(li);
}

for(let i = 0; i < w4list.length; i++){
  var li = document.createElement("li");
  var link = document.createElement("a");
  link.textContent = w4list[i];
  link.setAttribute("href", w4link[i]);
  li.appendChild(link);
  ul4.appendChild(li);
}
for(let i = 0; i < w5list.length; i++){
  var li = document.createElement("li");
  var link = document.createElement("a");
  link.textContent = w5list[i];
  link.setAttribute("href", w5link[i]);
  li.appendChild(link);
  ul5.appendChild(li);
}
const ext1 = document.querySelectorAll("#extra2");
var extra3 = document.querySelectorAll("#extra3");
extra3[1].style.setProperty('--marginleft','39%');
extra3[2].style.setProperty('--marginleft','56.8%');

//функция мобильной версии

  function m_win() {


    var alback = 1;
  var m_win = document.querySelectorAll(".m-win");
  for(let i = 1; i < 3; i++) {
  var wind = window['w' + i + "list"];
  var windl = window['w' + i + "link"];
  var ulm = document.createElement("ul");
  for(let i2 = 0; i2 < wind.length; i2++){
    var li2 = document.createElement("li");
    let link2 = document.createElement("a");
    if(i > 1){
      if(i2 > 2) {
        link2.setAttribute("href", windl[i2-3]);
      }
    } else{
      link2.setAttribute("href", windl[i2]);
    }
    link2.textContent = wind[i2];
    li2.appendChild(link2);
    if(i > 1 && i2 < 3){
      li2.setAttribute("class", "wind1");
      var trg1 = document.createElement("img");
      trg1.setAttribute("class", "trg1");
      trg1.setAttribute("src", "https://img.icons8.com/ios-filled/50/FFFFFF/sort-down.png");
      li2.appendChild(trg1);
    }
    ulm.appendChild(li2);
    m_win[i-1].appendChild(ulm);
  }
  var w3m = document.createElement("div");
  w3m.setAttribute("class", "w3m");
  w3m.appendChild(w3);
  ulm.appendChild(w3m);
  var w4m = document.createElement("div");
  w4m.setAttribute("class", "w3m");
  w4m.appendChild(w4);
  ulm.appendChild(w4m);
  var w5m = document.createElement("div");
  w5m.setAttribute("class", "w3m");
  w5m.appendChild(w5);
  ulm.appendChild(w5m);
}
  var w3m = document.querySelectorAll(".w3m");
  var wind1 = document.querySelectorAll(".wind1");
  var wlink1 = document.querySelectorAll(".wind1 a")
  var trg1r = document.querySelectorAll(".trg1");

  wind1[0].onclick = function() {
    if(open[0]){
      w3.style.visibility = "hidden";
      w3.style.position = "fixed";
      w3.style.display = "none";
      open[0] = !open[0];
      trg1r[0].setAttribute("src", "https://img.icons8.com/ios-filled/50/FFFFFF/sort-down.png");
      wlink1[0].style.color = "#eee";
    } else{
      w3.style.visibility = "visible";
      w3.style.display = "block";
      w3.style.borderRadius = "30px";
      w3.style.top = wind1[0].offsetTop + wind1[0].offsetHeight + "px";
      w3.style.left = wind1[0].offsetLeft - 15 + "px";
      w3.style.position = "absolute";
      w3.style.backdropFilter = "none";
      w3.style.background = "#000";
      trg1r[0].setAttribute("src", "https://img.icons8.com/ios-filled/50/00B5CC/sort-down.png");
      trg1r[1].setAttribute("src", "https://img.icons8.com/ios-filled/50/FFFFFF/sort-down.png");
      trg1r[2].setAttribute("src", "https://img.icons8.com/ios-filled/50/FFFFFF/sort-down.png");
      open[0] = !open[0];

      w4.style.visibility = "hidden";
      w4.style.display = "none";
      w5.style.visibility = "hidden";
      w5.style.display = "none";
      wlink1[0].style.color = "#00B5CC";
      wlink1[1].style.color = "#eee";
      wlink1[2].style.color = "#eee";
      open[1] = false;
      open[2] = false;
    }
  }
  wind1[1].onclick = function() {
    if(open[1]){
      w4.style.visibility = "hidden";
      w4.style.position = "fixed";
      w4.style.display = "none";
      trg1r[1].setAttribute("src", "https://img.icons8.com/ios-filled/50/FFFFFF/sort-down.png");
      wlink1[1].style.color = "#eee";
      open[1] = !open[1];
    } else{
      w4.style.visibility = "visible";
      w4.style.display = "block";
      w4.style.borderRadius = "30px";
      w4.style.top = wind1[1].offsetTop + wind1[1].offsetHeight + "px";
      w4.style.left = wind1[0].offsetLeft - 15 + "px";
      w4.style.position = "absolute";
      w4.style.backdropFilter = "none";
      w4.style.background = "#000";
      open[1] = !open[1];
      w3.style.visibility = "hidden";
      w3.style.display = "none";
      w5.style.visibility = "hidden";
      w5.style.display = "none";
      trg1r[1].setAttribute("src", "https://img.icons8.com/ios-filled/50/00B5CC/sort-down.png");
      trg1r[0].setAttribute("src", "https://img.icons8.com/ios-filled/50/FFFFFF/sort-down.png");
      trg1r[2].setAttribute("src", "https://img.icons8.com/ios-filled/50/FFFFFF/sort-down.png");
      wlink1[1].style.color = "#00B5CC";
      wlink1[0].style.color = "#eee";
      wlink1[2].style.color = "#eee";
      open[0] = false;
      open[2] = false;
    }
  }
  wind1[2].onclick = function() {
    if(open[2]){
      w5.style.visibility = "hidden";
      w5.style.position = "fixed";
      w5.style.display = "none";
      trg1r[2].setAttribute("src", "https://img.icons8.com/ios-filled/50/FFFFFF/sort-down.png");
      wlink1[2].style.color = "#eee";
      open[2] = !open[2];
    } else{
      w5.style.visibility = "visible";
      w5.style.display = "block";
      w5.style.visibility = "visible";
      w5.style.display = "block";
      w5.style.width = "300px";
      w5.style.top = wind1[2].offsetTop + wind1[2].offsetHeight + "px";
      w5.style.left = wind1[2].offsetLeft - 15 + "px";
      w5.style.position = "absolute";
      w5.style.backdropFilter = "none";
      w5.style.background = "#000";
      open[2] = !open[2];
      w3.style.visibility = "hidden";
      w3.style.display = "none";
      w4.style.visibility = "hidden";
      w4.style.display = "none";
      trg1r[2].setAttribute("src", "https://img.icons8.com/ios-filled/50/00B5CC/sort-down.png");
      wlink1[2].style.color = "#00B5CC";
      wlink1[0].style.color = "#eee";
      wlink1[1].style.color = "#eee";
      trg1r[0].setAttribute("src", "https://img.icons8.com/ios-filled/50/FFFFFF/sort-down.png");
      trg1r[1].setAttribute("src", "https://img.icons8.com/ios-filled/50/FFFFFF/sort-down.png");
      open[0] = false;
      open[1] = false;
    }
  }
  var mulp = document.querySelector("#m-ulp");
  mulp.innerHTML = `
  <div class="m_scl">
    <div>
      <a href="https://www.facebook.com/one.training.one/" target="_blank" rel="nofollow noopener">
        <img src="/res/fb.svg" class="t-sociallinks__svg" width="30px" height="30px"/>
      </a>
    </div>
    <div>
      <a href="https://www.instagram.com/onetraining_/" target="_blank" rel="nofollow noopener">
        <img src="/res/insta.svg" class="t-sociallinks__svg" width="30px" height="30px"/>
      </a>
    </div>
  <div>
    <a href="https://youtube.com/channel/UCkf2o5MQYVFUTKBb6Oi4_zQ" target="_blank" rel="nofollow noopener">
      <img src="/res/yt.svg" class="t-sociallinks__svg" width="35px" height="35px"/>
    </a>
  </div>
`;
  }

  extra3[0].onclick = function() {
    w3.style.visibility = "visible";
    w3.style.transform = "translateY(0)";
    w4.style.visibility = "hidden";
    w4.style.transform = "translateY(100%)";
    w5.style.visibility = "hidden";
    w5.style.transform = "translateY(100%)";
    w3.style.left = w2.offsetLeft + w2.offsetWidth + "px";
    w3.style.top = bar.offsetHeight + "px";
    w2.style.height = "auto";
    w3.style.height = w2.clientHeight - 10.5 + "px";
    w2.style.borderRadius = "0 0 0 15px";
  };

  extra3[1].onclick = function() {
    w4.style.visibility = "visible";
    w4.style.transform = "translateY(0)";
    w3.style.visibility = "hidden";
    w3.style.transform = "translateY(100%)";
    w5.style.visibility = "hidden";
    w5.style.transform = "translateY(100%)";
    w4.style.left = w2.offsetLeft + w2.offsetWidth + "px";
    w4.style.top = bar.offsetHeight + "px";
    w2.style.borderRadius = "0 0 0 15px";
    w2.style.height = w4.clientHeight - 10 + "px";
  };

  extra3[2].onclick = function() {
    w5.style.visibility = "visible";
    w5.style.transform = "translateY(0)";
    w3.style.visibility = "hidden";
    w3.style.transform = "translateY(100%)";
    w4.style.visibility = "hidden";
    w4.style.transform = "translateY(100%)";
    w5.style.left = w2.offsetLeft + w2.offsetWidth + "px";
    w5.style.top = bar.offsetHeight + "px";
    w2.style.height = "auto";
    w5.style.height = w2.clientHeight - 10.5 + "px";
    w5.style.width = w2.clientWidth + "px";
    w2.style.borderRadius = "0 0 0 15px";
  };

  ext1[0].addEventListener("mouseenter", (e) => {
    w1.style.visibility = "visible";
    w1.style.transform = "translateY(0)";
    if(slli2 == 1) {
      w2.style.visibility = "hidden";
      w2.style.transform = "translateY(100%)";
      w3.style.visibility = "hidden";
      w3.style.transform = "translateY(100%)";
      w4.style.visibility = "hidden";
      w4.style.transform = "translateY(100%)";
      w5.style.visibility = "hidden";
      w5.style.transform = "translateY(100%)";
      w2.style.borderRadius = "0 0 15px 15px";
      w2.style.height = "auto";
    }
  });

  ext1[0].addEventListener("mouseleave", (e) => {
    if(slli == 0) {
      w1.style.visibility = "hidden";
      w1.style.transform = "translateY(100%)";
    }
  });
  ext1[1].addEventListener("mouseenter", (e) => {
    w2.style.visibility = "visible";
    w2.style.transform = "translateY(0)";
    if(slli == 1) {
      w1.style.visibility = "hidden";
      w1.style.transform = "translateY(100%)";
    }
  });
  ext1[1].addEventListener("mouseleave", (e) => {
    if(slli2 == 0) {
      w2.style.visibility = "hidden";
      w2.style.transform = "translateY(100%)";
      w3.style.visibility = "hidden";
      w3.style.transform = "translateY(100%)";
      w4.style.visibility = "hidden";
      w4.style.transform = "translateY(100%)";
      w5.style.visibility = "hidden";
      w5.style.transform = "translateY(100%)";
      w2.style.borderRadius = "0 0 15px 15px";
      w2.style.height = "auto";
    }
  });

  //resize
    function modedef() {
      html.style.display = "block";
      if(screen.width < 350) {document.body.innerHTML = "<div class='error'><h2>Не допустимое разрешение экрана</h2><hr>Ошибка 350MSS (Min Screen Size). Отказано сервером предоставление контента.<br><br>Попробуйте расширить окно или зайти с другого устройства.</div>";back = 1} else {if(back == 1) (location.reload())}
      if(window.innerWidth > 1300){
        list.style.display = "flex";
        scl.style.display = "flex";
        mp.style.display = "none";
        list.style.position = "unset";
        scl.style.position = "relative";
        mp.style.position = "absolute";
        document.body.style.overflow = "auto";
        l1.style.animation = "250ms 1 forwards l1r";
        l2.style.animation = "250ms 1 forwards l2r";
        mp.style.transform = "translateY(0px)";
        m_menu.style.display = "none";
        overflow = 0;
        if(!alr) {
          location.reload();
        }
        alr = true;
      } else {
        list.style.display = "none";
        scl.style.display = "none";
        mp.style.display = "block";
        list.style.position = "absolute";
        scl.style.position = "absolute";
        mp.style.position = "unset";
        if(alr){
          m_win();
          alr = false;
        }
      }
      w1.style.left = li1.offsetLeft - (li1.clientWidth/3) + "px";
      w1.style.top = bar.offsetHeight + "px";
      w2.style.left = li2.offsetLeft - (li2.clientWidth) + "px";
      w2.style.top = bar.offsetHeight + "px";
      if(open[0] || open[1] || open[2]) {
        var wind1 = document.querySelectorAll(".wind1");
        w3.style.left = wind1[0].offsetLeft - 15 + "px";
        w4.style.left = wind1[1].offsetLeft - 15 + "px";
        w5.style.left = wind1[2].offsetLeft - 15 + "px";
      }
    }

    mode(); window.onresize = resize; function resize() {mode(); w1.style.visibility = "hidden"; w2.style.visibility = "hidden"} setTimeout(() => modedef(), 500);
    li1.onclick = function() { slli = 1};

    li2.onclick = function() {slli2 = 1};

    body1.addEventListener("click", function(event) {
      w1.style.visibility = "hidden";
      w2.style.visibility = "hidden";
      w3.style.visibility = "hidden";
      w4.style.visibility = "hidden";
      w5.style.visibility = "hidden";
      w2.style.borderRadius = "0 0 15px 15px";
      w2.style.height = "auto";
      if((event.pageY - bar.offsetHeight) > 0 && d > 0) {
        ycw.style.animation = "500ms 1 normal outwindow";
        setTimeout(() => {
          ycw.style.display = "none";
          ycw.style.animation = "500ms 1 normal onwindow";
          d = 0;
        }, 500);
      }
    });

    window.addEventListener('message', function(event) {
      const event1 = event.data.toString();
      const mess = event1.split(' ');
      if(mess[0] == "data"){
        let height = Number(mess[1]);
        footer.height = height;
      } else if(mess[0] == "bar") {
        w1.style.visibility = "hidden";
        w2.style.visibility = "hidden";
        w3.style.visibility = "hidden";
        w4.style.visibility = "hidden";
        w5.style.visibility = "hidden";
        w2.style.borderRadius = "0 0 15px 15px";
        w2.style.height = "auto";
      } else if(mess[0] == "btn-2") {
        book.style.display = "flex";
        if(window.innerWidth > 1000) {
          exit.style.right = booki.offsetLeft + "px";
          exit.style.top = booki.offsetTop - 30 + "px";
        }
        const inputElement = document.querySelector('#phone');
        inputElement.addEventListener('keydown',enforceFormat);
        inputElement.addEventListener('keyup', formatToPhone);
        
      } else if(mess[0] == "redirect") {
        window.location.href = mess[1];
      }
    });
    mp.onclick = function(){
      if(overflow > 0) {
        var mscl = document.querySelector(".m_scl");
        document.body.style.overflow = "auto";
        l1.style.animation = "250ms 1 forwards l1r";
        l2.style.animation = "250ms 1 forwards l2r";
        mp.style.transform = "translateY(0px)";
        m_menu.style.display = "none";
        mscl.style.display = "none";
        overflow = 0;
      } else {
        var mscl = document.querySelector(".m_scl");
        document.body.style.overflow = "hidden";
        l1.style.animation = "250ms 1 forwards l1";
        l2.style.animation = "250ms 1 forwards l2";
        mp.style.transform = "translateY(-3px)";
        m_menu.style.display = "flex";
        mscl.style.display = "flex";
        overflow = 1;
      }
    }
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
    function loader() {
      const canvas = document.querySelector("canvas");
      const ctx = canvas.getContext("2d");
      let canvasWidth = 30;
      let canvasHeight = 30;
      let progress = 0;
      let speed = 0.02;
      let reverse = 0;
      function draw() {
        canvas.width = canvasWidth;
        canvas.height = canvasHeight;
        ctx.clearRect(0, 0, canvasWidth, canvasHeight);
        ctx.beginPath();
        ctx.strokeStyle = scrollcolor;
        ctx.lineCap = "round";
        ctx.lineWidth = scrollline;
        ctx.arc(
          canvasWidth / 2,
          canvasHeight / 2,
          canvasWidth / 3,
          -Math.PI / 2,
          -Math.PI / 2 + 2 * Math.PI * progress
        );
        ctx.stroke();
        if(reverse == 0) {
          progress += speed;
        } else {
          progress -= speed;
        }
        if (progress > 1) {
          progress = 1;
          reverse = 1;
        }
        if(progress < -0.01) {
          progress = 0;
          reverse = 0;
        }
        requestAnimationFrame(draw);
      }
      draw();
}

function nl2br(str) {
  return str.replace(/\\n/g, "<br>");
}
document.addEventListener("wheel", function touchHandler(e) {
  if (e.ctrlKey) {
    e.preventDefault();
    resize();
  }
}, { passive: false });

function postForm(path, params, method) {
  method = method || 'post';

  var form = document.createElement('form');
  form.setAttribute('method', method);
  form.setAttribute('action', path);

  for (var key in params) {
      if (params.hasOwnProperty(key)) {
          var hiddenField = document.createElement('input');
          hiddenField.setAttribute('type', 'hidden');
          hiddenField.setAttribute('name', key);
          hiddenField.setAttribute('value', params[key]);

          form.appendChild(hiddenField);
      }
  }

  document.body.appendChild(form);
  form.submit();
}