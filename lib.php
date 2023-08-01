<?php
date_default_timezone_set('Europe/Moscow');
session_start();

if (!isset($_SESSION['csrf_token'])) {
  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$csrf_token = $_SESSION['csrf_token'];
function rpass() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890@#$&_-!';
    $pass = array();
    $alphaLength = strlen($alphabet) - 1;
    for ($i = 0; $i < 32; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass);
}

if(isset($_SERVER['HTTPS'])) {
  $http = "https://";
} else {
  $http = "http://";
}

  $response = [
  'messages_error' => "Error 500: You cannot permissions to do that. Try to do it on the client side.",
  'status' => false,
  ];
  
  if(!empty($_SERVER['HTTP_REFERER'])){
    if(!str_contains($_SERVER['HTTP_REFERER'], $http . $_SERVER['SERVER_NAME'])) {
      http_response_code(500);
      die(json_encode($response));                
    }
  } else if(empty($_SERVER['HTTP_REFERER']) && $_SERVER['PHP_SELF'] == '/lib.php') {
  header('Location: /index.php');
  exit;
  }




function req_rooted($type1, $type2) {
  $success = null;

    if (!empty($_GET)) {
      $root = $_SERVER['DOCUMENT_ROOT'];
      // $ip = $_SERVER['REMOTE_ADDR'];
      $ip = file_get_contents('http://api.ipify.org');

      define('ids', ($root . '/i2VDjbe4_ZNXhiFYVBN_v@!p-8feYv@V/id.txt'));

      $data = array(
        $ip => array("name" => $_GET["name"], "phone" => "+7" . $_GET["phone"], "bday" => $_GET["bday"], "dreq" => date("Y.m.d"), "type" => $type1)
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
function getAfter($a){
  if ($a) {
    echo <<<END
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
    END;}
    $true = false;
}
?>