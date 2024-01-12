<?
if ($periphery == "SWITCH") {
  echo "<td class='per-switch'>$periphery</td>";

      } elseif ($periphery == "TISK") {
        echo "<td class='per-tisk'><a href='http://$ip' target='blank'>$periphery</td></style></a>";
     
      } elseif ($periphery == "PC") {
        echo "<td class='per-pc'>$periphery</td>";
      
      } elseif ($periphery == "KAMERA") {
        echo "<td class='per-kamera'><a href='http://$ip' target='blank'>$periphery</td></a>";
     
      } elseif ($periphery == "BRÁNA") {
        echo "<td class='per-brana'>$periphery</td>";

      } elseif ($periphery == "NEZNÁMÉ") {
        echo "<td class='per-nezname'>$periphery</td>";

      } elseif ($periphery == "SÍŤ") {
        echo "<td class='per-sit'>$periphery</td>";
        
      } elseif ($periphery == "BROADCAST") {
        echo "<td class='per-broadcast'>$periphery</td>";

      } elseif ($periphery == "DHCP") {
        echo "<td class='per-dhcp'>$periphery</td>";

      } elseif ($periphery == "NAS") {
        echo "<td class='per-nas'><a href='http://$ip' target='blank'>$periphery</td>";

      }elseif ($periphery == "IP TELEFON") {
        echo "<td class='per-ip-telefon'><a href='http://$ip' target='blank'>$periphery</td>";

      } elseif ($periphery == "NVR") {
        echo "<td class='per-nvr'><a href='http://$ip' target='blank'>$periphery</td>";

      } elseif ($periphery == "SCO") {
        echo "<td class='per-sco'>$periphery</td>";

      }  elseif ($periphery == "ZAPŮJČENÁ IP") {
        echo "<td class='per-zapujcena-ip'>$periphery</td>";

      }  elseif ($periphery == "SERVER") {
        echo "<td class='per-server'>$periphery</td>";

       } elseif ($periphery == "EKV") {
        echo "<td class='per-ekv'>$periphery</td>";

      }elseif ($periphery == "EPYGI") {
        echo "<td class='per-epygi'>$periphery</td>";

      }elseif ($periphery == "") {
        echo "<td class='per-neurceno'>Neurčeno</td>";

      }elseif ($periphery == "VOLNÁ") {
        echo "<td class='per-volna'>$periphery</td>";
      }

      elseif ($periphery == "NOTEBOOK") {
        echo "<td class='per-notebook'>$periphery</td>";
      }

      ?>
