<div id="mailingliste">
<a name="mailingliste"></a>
<noscript><h3>Mailinglisten</h3></noscript>

<table style="min-width:100%;">
<tr id="rowMLhead">
 <th>
  <a href="#" onClick="$('#insertML').dialog('open'); return false;" title="Mailingliste anlegen">[NEU]</a>
  <div id="insertML" title="neue Mailingliste anlegen" class="editmldialog">
    <noscript><h4>Neue Mailingliste anlegen</h4></noscript>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>#mailingliste" method="POST" enctype="multipart/form-data">
     <ul>
     <li><label for="address">Adresse:</label><input type="text" name="address" value=""/><br/>
         Beispiel: ref-xxx@stura.tu-ilmenau.de</li>
     <li><label for="password">Passwort:</label><input type="text" name="password" value=""/><br/>
         Listen-Administratorpasswort</li>
     <li><label for="url">Webseite (listinfo):</label><input type="text" name="url" value=""/><br/>
         Beispiel: https://listen.stura.tu-ilmenau.de/mailman/listinfo/ref-xxx</li>
     </ul>
     <input type="hidden" name="action" value="mailingliste.insert"/>
     <input type="hidden" name="nonce" value="<?php echo htmlspecialchars($nonce);?>"/>
     <input type="submit" name="submit" value="Speichern"/>
     <input type="reset" name="reset" value="Abbrechen" onClick="$('#insertML').dialog('close');"/>
    </form>
  </div>
  <?php $script[] = "\$('#insertML').dialog({ autoOpen: false, width: 1000, height: 'auto', position: { my: 'center', at: 'center', of: $('#rowMLhead') } });"; ?>
 </th>
 <th>Adresse</th><th>URL</th></tr>
<?php
foreach ($alle_mailinglisten as $i => $mailingliste):
 if (($_COOKIE["mailingliste_start"] >= 0) && ($i < $_COOKIE["mailingliste_start"])) continue;
 if (($_COOKIE["mailingliste_length"] >= 0) && ($i >= $_COOKIE["mailingliste_length"] + $_COOKIE["mailingliste_start"])) break;
?>
<tr id="rowML<?php echo $mailingliste["id"];?>">
 <td>
   <?php echo $i;?>.
   <a href="#" onClick="$('#deleteML<?php echo $mailingliste["id"];?>').dialog('open'); return false;" titel="Mailingliste <?php echo htmlspecialchars($mailingliste["address"],ENT_QUOTES);?> löschen" >[X]</a>
   <div id="deleteML<?php echo $mailingliste["id"];?>" title="Mailingliste <?php echo htmlspecialchars($mailingliste["address"],ENT_QUOTES);?> entfernen" class="editmldialog">
     <noscript><h4>Mailingliste <?php echo htmlspecialchars($mailingliste["address"],ENT_QUOTES);?> entfernen</h4></noscript>
     <form action="<?php echo $_SERVER["PHP_SELF"];?>#mailingliste" method="POST" enctype="multipart/form-data">
     <ul>
     <li>ID: <?php echo $mailingliste["id"];?></li>
     <li><label for="address">Adresse:</label><input type="text" name="address" value="<?php echo htmlspecialchars($mailingliste["address"],ENT_QUOTES);?>" readonly="readonly"/></li>
     <li><label for="password">Passwort:</label><input type="text" name="password" value="<?php echo htmlspecialchars($mailingliste["password"],ENT_QUOTES);?>" readonly="readonly"/></li>
     <li><label for="url">Webseite (listinfo):</label><input type="text" name="url" value="<?php echo htmlspecialchars($mailingliste["url"],ENT_QUOTES);?>" readonly="readonly"/></li>
     </ul>
     <input type="hidden" name="id" value="<?php echo $mailingliste["id"];?>"/>
     <input type="hidden" name="action" value="mailingliste.delete"/>
     <input type="hidden" name="nonce" value="<?php echo htmlspecialchars($nonce);?>"/>
     <input type="submit" name="submit" value="Löschen"/>
     <input type="reset" name="reset" value="Abbrechen" onClick="$('#deleteML<?php echo $mailingliste["id"];?>').dialog('close');"/>
     </form>
   </div>
   <a href="#" onClick="$('#editML<?php echo $mailingliste["id"];?>').dialog('open'); return false;" title="Mailingliste <?php echo htmlspecialchars($mailingliste["address"],ENT_QUOTES);?> bearbeiten">[E]</a>
   <div id="editML<?php echo $mailingliste["id"];?>" title="Mailingliste <?php echo htmlspecialchars($mailingliste["address"],ENT_QUOTES);?> bearbeiten" class="editmldialog">
     <noscript><h4>Mailingliste <?php echo htmlspecialchars($mailingliste["address"],ENT_QUOTES);?> bearbeiten</h4></noscript>
     <form action="<?php echo $_SERVER["PHP_SELF"];?>#mailingliste" method="POST" enctype="multipart/form-data">
     <ul>
     <li>ID: <?php echo $mailingliste["id"];?></li>
     <li><label for="address">Adresse:</label><input type="text" name="address" value="<?php echo htmlspecialchars($mailingliste["address"],ENT_QUOTES);?>"/></li>
     <li><label for="password">Passwort:</label><input type="text" name="password" value="<?php echo htmlspecialchars($mailingliste["password"],ENT_QUOTES);?>"/></li>
     <li><label for="url">Webseite (listinfo):</label><input type="text" name="url" value="<?php echo htmlspecialchars($mailingliste["url"],ENT_QUOTES);?>"/></li>
     </ul>
     <input type="hidden" name="id" value="<?php echo $mailingliste["id"];?>"/>
     <input type="hidden" name="action" value="mailingliste.update"/>
     <input type="hidden" name="nonce" value="<?php echo htmlspecialchars($nonce);?>"/>
     <input type="submit" name="submit" value="Speichern"/>
     <input type="reset" name="reset" value="Abbrechen" onClick="$('#editML<?php echo $mailingliste["id"];?>').dialog('close');"/>
     </form>

     <h4>Zugeordnete Gremien und Rollen</h4>
     <table>
     <tr><th>
   <a href="#" onClick="$('#insertML<?php echo $mailingliste["id"];?>R').dialog('open'); return false;" titel="Rollenzuordnung einfügen" >[NEU]</a>
   <div id="insertML<?php echo $mailingliste["id"];?>R" title="Rollenzuordnung einfügen">
     <noscript><h4>Rollenzuordnung einfügen</h4></noscript>
     <form action="<?php echo $_SERVER["PHP_SELF"];?>#mailingliste" method="POST" enctype="multipart/form-data">
     <ul>
     <li>Mailingliste: <?php echo htmlspecialchars($mailingliste["address"],ENT_QUOTES);?></li>
     <li>Rolle/Gremium:
      <select name="rolle_id" size="1" class="gremienauswahl" onChange="$(this).siblings('span').text($(this).find('option:selected').parent().attr('label'));">
<?php
      $last_gremium_id = -1;
      foreach ($alle_gremien as $agremium):
        if ($last_gremium_id != $agremium["gremium_id"]):
         if ($last_gremium_id != -1) { echo "</optgroup>"; }
         $last_gremium_id = $agremium["gremium_id"];
?>
       <optgroup class="forinsertML<?php echo $mailingliste["id"];?>R <?php echo ($agremium["gremium_active"] ? "gremiumactive" : "gremiuminactive");?>" label="<?php echo htmlspecialchars($agremium["gremium_name"]." ".$agremium["gremium_fakultaet"]." ".$agremium["gremium_studiengang"]." ".$agremium["gremium_studiengangabschluss"],ENT_QUOTES);?>">
<?php
	endif;
?>
        <option  class="forinsertML<?php echo $mailingliste["id"];?>R <?php echo ($agremium["rolle_active"] ? "rolleactive" : "rolleinactive");?>" value="<?php echo $agremium["rolle_id"];?>"><?php echo htmlspecialchars($agremium["rolle_name"],ENT_QUOTES);?></option>
<?php
      endforeach;
      if ($last_gremium_id != -1) { echo "</optgroup>"; }
?>
         </select>
         <a href="#" onClick="$('option.rolleinactive.forinsertML<?php echo $mailingliste["id"];?>R,optgroup.gremiuminactive.forinsertML<?php echo $mailingliste["id"];?>R').toggle(); return false;" titel="inaktive Gremien/Rolle anzeigen/ausblenden" >[inaktive Gremien/Rollen anzeigen/ausblenden]</a>
         <?php $script[] = "\$('option.rolleinactive.forinsertML{$mailingliste["id"]}R,optgroup.gremiuminactive.forinsertML{$mailingliste["id"]}R').hide();"; ?>
       <br/><span></span></li>
     </ul>
     <input type="hidden" name="mailingliste_id" value="<?php echo $mailingliste["id"];?>"/>
     <input type="hidden" name="action" value="rolle_mailingliste.insert"/>
     <input type="hidden" name="nonce" value="<?php echo htmlspecialchars($nonce);?>"/>
     <input type="submit" name="submit" value="Zuordnung eintragen"/>
     <input type="reset" name="reset" value="Abbrechen" onClick="$('#insertML<?php echo $mailingliste["id"];?>R').dialog('close');"/>
     </form>
   </div>
   <?php $script[] = "\$('#insertML{$mailingliste['id']}R').dialog({ autoOpen: false, width: 700, height: 'auto', position: { my: 'center', at: 'center', of: \$('#editML{$mailingliste['id']}') } });"; ?>
         </th><th>Rolle</th><th>Gremium</th><th>Fakultät</th><th>Studiengang</th></tr>
<?php
$gremien = getMailinglisteRolle($mailingliste["id"]);
if (count($gremien) == 0):
?>
     <tr><td colspan="5"><i>Keine Gremienmitgliedschaften.</i></td></tr>
<?php
else:
foreach($gremien as $gremium):
?>
     <tr>
      <td>
   <a href="#" onClick="$('#deleteML<?php echo $mailingliste["id"];?>R<?php echo $gremium["rolle_id"];?>').dialog('open'); return false;" titel="Rollenzuordnung aufheben" >[X]</a>
   <div id="deleteML<?php echo $mailingliste["id"];?>R<?php echo $gremium["rolle_id"];?>" title="Rollenzuordnung aufheben">
     <noscript><h4>Rollenzuordnung aufheben</h4></noscript>
     <form action="<?php echo $_SERVER["PHP_SELF"];?>#mailingliste" method="POST" enctype="multipart/form-data">
     <ul>
     <li>Mailingliste: <?php echo htmlspecialchars($mailingliste["address"],ENT_QUOTES);?></li>
     <li>Gremium/Rolle: <?php echo htmlspecialchars($gremium["rolle_name"]." ".$gremium["gremium_name"]." ".$gremium["gremium_fakultaet"]." ".$gremium["gremium_studiengang"]." ".$gremium["gremium_studiengangabschluss"],ENT_QUOTES);?></li>
     </ul>
     <input type="hidden" name="mailingliste_id" value="<?php echo $mailingliste["id"];?>"/>
     <input type="hidden" name="rolle_id" value="<?php echo $gremium["rolle_id"];?>"/>
     <input type="hidden" name="action" value="rolle_mailingliste.delete"/>
     <input type="hidden" name="nonce" value="<?php echo htmlspecialchars($nonce);?>"/>
     <input type="submit" name="submit" value="Zuordnung aufheben"/>
     <input type="reset" name="reset" value="Abbrechen" onClick="$('#deleteML<?php echo $mailingliste["id"];?>R<?php echo $gremium["rolle_id"];?>').dialog('close');"/>
     </form>
   </div>
  <?php $script[] = "\$('#deleteML{$mailingliste['id']}R{$gremium['rolle_id']}').dialog({ autoOpen: false, width: 1000, height: 'auto', position: { my: 'center', at: 'center', of: \$('#editML{$mailingliste['id']}') } });"; ?>
      </td>
      <td><?php echo htmlspecialchars($gremium["rolle_name"]);?></td>
      <td><?php echo htmlspecialchars($gremium["gremium_name"]);?></td>
      <td><?php echo htmlspecialchars($gremium["gremium_fakultaet"]);?></td>
      <td><?php echo htmlspecialchars($gremium["gremium_studiengang"]);
            if (!empty($gremium["gremium_studiengangabschluss"])) {
              echo " (".htmlspecialchars($gremium["gremium_studiengangabschluss"]).")";
            }
      ?></td>
     </tr>
<?php
endforeach;
endif;
?>
     </table>
     <h4>Personen (abgeleitet)</h4>
<?php $personen = getMailinglistePerson($mailingliste["id"]);
     if (count($personen) == 0):
?>
       <i>Es stehen keine Personen auf der Mailingliste.</i>
<?php
     else:
?>
     <ul>
<?php
     foreach ($personen as $person):
?>
      <li><?php echo htmlspecialchars($person);?></li>
<?php
     endforeach;
?>
     </ul
<?php
     endif;
?>
   </div>
   <?php
     $script[] = "\$('#editML{$mailingliste['id']}').dialog({ autoOpen: false, width: 1000, height: 'auto', position: { my: 'center', at: 'center', of: $('#rowML{$mailingliste['id']}') } });";
     $script[] = "\$('#deleteML{$mailingliste['id']}').dialog({ autoOpen: false, width: 1000, height: 'auto', position: { my: 'center', at: 'center', of: $('#rowML{$mailingliste['id']}') } });";
   ?>
 </td>
 <td><a href="mailto:<?php echo htmlspecialchars($mailingliste["address"]);?>"><?php echo htmlspecialchars($mailingliste["address"]);?></a></td>
 <td><a href="<?php echo htmlspecialchars($mailingliste["url"]);?>"><?php echo htmlspecialchars($mailingliste["url"]);?></a></td>
</tr>
<?php
endforeach;
?>
</table>
<hr/>
<ul class="pageselect">
<?php if ($_COOKIE["mailingliste_start"] > 0): ?><li><a href="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>?mailingliste_start=0#mailingliste">&lt;&lt;</a></li><?php  endif; ?>
<?php
if ($_COOKIE["mailingliste_start"] > $_COOKIE["mailingliste_length"]) {
  $prev = $_COOKIE["mailingliste_start"] - $_COOKIE["mailingliste_length"];
} else {
  $prev = -1;
}
if ((count($alle_mailinglisten) > $_COOKIE["mailingliste_start"] + 2 * $_COOKIE["mailingliste_length"])) {
  $next = $_COOKIE["mailingliste_start"] + $_COOKIE["mailingliste_length"];
} else {
  $next = -1;
}
if ($_COOKIE["mailingliste_length"] > 0):
 for($i = $_COOKIE["mailingliste_length"] ; $i < count($alle_mailinglisten); $i = $i +  $_COOKIE["mailingliste_length"]):
  if ($i < $_COOKIE["mailingliste_start"] || $i > $_COOKIE["mailingliste_start"]): 
?><li><a href="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>?mailingliste_start=<?php echo $i;?>#mailingliste" title="<?php echo htmlspecialchars($alle_mailinglisten[$i]["address"]);?>"><?php echo $i;?></a></li><?php
  endif;
  if ($i < $prev && $i + $_COOKIE["mailingliste_length"] > $prev): 
?><li><a href="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>?mailingliste_start=<?php echo $prev;?>#mailingliste" title="<?php echo htmlspecialchars($alle_mailinglisten[$prev]["address"]);?>">&lt;</a></li><?php
  endif;
  if ($i <= $_COOKIE["mailingliste_start"] && $i + $_COOKIE["mailingliste_length"] > $_COOKIE["mailingliste_start"]): 
?><li><a href="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>?mailingliste_start=<?php echo $_COOKIE["mailingliste_start"];?>#mailingliste">[<?php echo $_COOKIE["mailingliste_start"];?>]</a></li><?php
  endif;
  if ($i < $next && $i + $_COOKIE["mailingliste_length"] > $next): 
?><li><a href="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>?mailingliste_start=<?php echo $next;?>#mailingliste" title="<?php echo htmlspecialchars($alle_mailinglisten[$next]["address"]);?>">&gt;</a></li><?php
  endif;
 endfor;
endif; ?>
<?php if ($_COOKIE["mailingliste_start"] + $_COOKIE["mailingliste_length"] < count($alle_mailinglisten)): ?><li><a href="<?php echo htmlentities($_SERVER["PHP_SELF"])?>?mailingliste_start=<?php echo count($alle_mailinglisten) - $_COOKIE["mailingliste_length"];?>#mailingliste">&gt;&gt;</a></li><?php  endif; ?>
</ul>
<form action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>#mailingliste" method="POST" enctype="multipart/form-data">
Einträge je Seite: <input type="text" name="mailingliste_length" value="<?php echo htmlentities($_COOKIE["mailingliste_length"]);?>"/>
<input type="submit" name="submit" value="Auswählen"/><input type="reset" name="reset" value="Zurücksetzen"/>
</form>
</div>