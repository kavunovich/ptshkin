<?php
$password = "KjF$@FXsNQ@BEqEatzmvKe3JsJHhWZzq";
$root = $_SERVER['DOCUMENT_ROOT'];
if (isset($_POST)) {
          if (!empty($_POST['password'])) {
                    if ($_POST['password'] == $password) {
                            echo '<div style="font-size: 25px;">';
                              echo <<<END
                              <script>
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
                              </script>
                              <p onclick="postForm('/admin.php', {password: '$password'});">Назад</p>
                              END;
                              $baseid = fopen($root . "/i2VDjbe4_ZNXhiFYVBN_v@!p-8feYv@V/id.txt", 'r');
                              while (!feof($baseid)) {
                                        $ids = fgets($baseid);
                                        if (strlen($ids) > 0) {
                                                  $id = explode(',', $ids, 10000);
                                                  $id = array_reverse($id);
                                                  $rows = 4;
                                                  $index1 = array();

                                                  $none = '<td class="item" style="color: #777; cursor: not-allowed;">Пусто</td>';
                                                  for ($i = 0; $i < count($id); $i++) {
                                                            if (file_exists($root . "/Requests/" . $id[$i] . "/massage.json")) {
                                                                      array_push($index1, $id[$i]);
                                                            }
                                                  }
                                                  echo <<<END
                                                            <h3>Массаж
                                                            </h3>
                                                            <table style="width: 100%; text-align: center;border-collapse:collapse; font-size: 25px;">
                                                            <tr>
                                                            <th style="background: #ffffff10; width: 1px">Имя</th>
                                                            <th style="background: #ffffff10">Номер</th>
                                                            <th style="background: #ffffff10">Выбранная Дата</th>
                                                            <th style="background: #ffffff10">Дата запроса</th>
                                                            <th style="background: #ffffff10">Тип</th>
                                                            </tr>
                                                  END;
                                                  for ($i = 0; $i < count($index1); $i++) {
                                                            $baseid1 = fopen($root . "/Requests/" . $index1[$i] . "/massage.json", 'r');
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

                                                                      if ($ids1view[$index1[$i]]['type'] !== null) {
                                                                        $type = strlen($ids1view[$index1[$i]]['type']) > 0 ? $ids1view[$index1[$i]]['type'] : "Пусто";
                                                                        $type = '<td class="item">' . $type . '</td>';
                                                                      } else {
                                                                        $type = $none;
                                                                      }

                                                                      echo '<tr class="cont">';
                                                                      echo $name . $phone . $bday . $dreq . $type;
                                                                      echo '</tr>';

                                                            }
                                                  }
                                                  $var1 = count($index1) * $rows - 1;
                                                  $var2 = $rows * (count($index1) - 1);
                                                  fclose($baseid1);
                                                  echo <<<END
                                                            <script>
                                                            var item = document.querySelectorAll(".item");
                                                            let lastID = $var1;
                                                            item[lastID].style.borderRadius = "0px 0px 20px 0px";
                                                            item[$var2].style.borderRadius = "0px 0px 0px 20px";
                                                            </script>
                                                  END;
                                                  echo '</table>';
                                                  echo '<br><br>Подсказка: Уменьшение количество стилей помогает производительности слабым устройствам.';
                                        }
                              }
                                echo '</div>';
                    }
          }
}
?>