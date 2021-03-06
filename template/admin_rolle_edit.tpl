<?php

$rolle = getRolleById($_REQUEST["rolle_id"]);
if ($rolle === false) die("Invalid Id");
$gremium = getGremiumById($rolle["gremium_id"]);
$personen = getRollePersonen($rolle["id"]);
$gruppen = getRolleGruppen($rolle["id"]);
$mailinglisten = getRolleMailinglisten($rolle["id"]);

?>

<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST" enctype="multipart/form-data" class="ajax">
<input type="hidden" name="id" value="<?php echo $rolle["id"];?>"/>
<input type="hidden" name="action" value="rolle_gremium.update"/>
<input type="hidden" name="nonce" value="<?php echo htmlspecialchars($nonce);?>"/>

<div class="panel panel-default">
 <div class="panel-heading">
  <?php echo htmlspecialchars($rolle["name"]); ?> in
  <?php

   echo htmlspecialchars($gremium["name"])." ";

  if (!empty($gremium["studiengang"])) {
   echo htmlspecialchars($gremium["studiengang"])." ";
  }

  if (!empty($gremium["studiengangabschluss"])) {
    echo " (".htmlspecialchars($gremium["studiengangabschluss"]).") ";
  }

  if (!empty($gremium["fakultaet"])) {
   echo " Fak. ".htmlspecialchars($gremium["fakultaet"])." ";
  }

?>
 </div>
 <div class="panel-body">

<div class="form-horizontal" role="form">

<?php

foreach ([
  "id" => "ID",
  "gremium_id" => "Gremium",
  "name" => "Name",
  "active" => "Rolle existent/aktiv?",
  "spiGroupId" => "sPi-Gruppen-Id",
  "numPlatz" => "Plätze",
  "wahlDurchWikiSuffix" => "Wähler",
  "wahlPeriodeDays" => "Wahlperiode",
  "wiki_members_roleAsColumnTable" => "Wiki-Seite für aktuelle Mitglieder (Tabelle mit Spalten für Rollen)",
  "wiki_members_roleAsColumnTableExtended" => "Wiki-Seite für aktuelle Mitglieder (Tabelle mit Spalten für Rollen und Datumsangaben)",
  "wiki_members_roleAsMasterTable" => "Wiki-Seite für aktuelle Mitglieder (Übersichtseite für alle Gremien)",
  "wiki_members_roleAsMasterTableExtended" => "Wiki-Seite für aktuelle Mitglieder (Kontaktseite)",
  "wiki_members" => "Wiki-Seite für aktuelle Mitglieder (GeKo-Seite)",
 ] as $key => $desc):

?>

  <div class="form-group">
    <label for="<?php echo htmlspecialchars($key); ?>" class="control-label col-sm-3"><?php echo htmlspecialchars($desc); ?></label>
    <div class="col-sm-9">

      <?php
        switch($key) {
          case "wiki_members_roleAsColumnTable":
          case "wiki_members_roleAsColumnTableExtended":
?>         <input class="form-control" type="text" name="<?php echo htmlspecialchars($key); ?>" value="<?php echo htmlspecialchars($rolle[$key]); ?>">
           <i>(Wenn gesetzt beginnt immer mit ":sgis:mitglieder:" . Abweichender Spaltenname mit #Spaltenname am Ende angeben.)</i>
<?php
           break;
          case "wiki_members_roleAsMasterTable":
          case "wiki_members_roleAsMasterTableExtended":
          case "wiki_members":
?>         <input class="form-control" type="text" name="<?php echo htmlspecialchars($key); ?>" value="<?php echo htmlspecialchars($rolle[$key]); ?>" placeholder=":sgis:mitglieder:seitenname#Reihenfolge Überschrift?[ibu]*">
           <i>(Wenn gesetzt beginnt immer mit ":sgis:mitglieder:" . Abweichende Reihenfolge oder Spaltenname mit #Spaltenname am Ende angeben. Dahinter können "?" und dann die Flags i (kursiv), b (fett) und u (Underline) angegeben werden.)</i>
<?php
           break;
          case "wahlPeriodeDays":
?>         <input class="form-control" type="text" name="<?php echo htmlspecialchars($key); ?>" value="<?php echo htmlspecialchars($rolle[$key]); ?>"> Tage
<?php
            break;
          case "wahlDurchWikiSuffix":
?>         <input class="form-control" type="text" name="<?php echo htmlspecialchars($key); ?>" value="<?php echo htmlspecialchars($rolle[$key]); ?>">
           <i>(Suffix für Wiki-Seite mit der zu-wählen-Liste.)</i>
<?php
            break;
          case "numPlatz":
?>         <input class="form-control" type="text" name="<?php echo htmlspecialchars($key); ?>" value="<?php echo htmlspecialchars($rolle[$key]); ?>">
           <i>(Anzahl der Vertreter, die laut Ordnung benannt werden können.)</i>
<?php
            break;
          case "spiGroupId":
?>         <input class="form-control" type="text" name="<?php echo htmlspecialchars($key); ?>" value="<?php echo htmlspecialchars($rolle[$key]); ?>">
           <i>(Personen dieser Rolle werden in der entsprechenden <a href="<?php echo htmlspecialchars($sPiBase)."/group/".htmlspecialchars($rolle[$key],ENT_QUOTES);?>" target="_blank">sPi-Gruppe</a> dargestellt.)</i>
<?php
            break;
          case"gremium_id":
?>
      <div class="form-control">
  <?php

   echo htmlspecialchars($gremium["name"])." ";

  if (!empty($gremium["studiengang"])) {
   echo htmlspecialchars($gremium["studiengang"])." ";
  }

  if (!empty($gremium["studiengangabschluss"])) {
    echo " (".htmlspecialchars($gremium["studiengangabschluss"]).") ";
  }

  if (!empty($gremium["fakultaet"])) {
   echo " Fak. ".htmlspecialchars($gremium["fakultaet"])." ";
  }

?>
      </div>
<?php
            break;
          case"active":
?>         <select name="active" size="1" class="selectpicker" data-width="fit">
              <option value="1" <?php  if ($rolle[$key]) echo "selected=\"selected\""; ?>>Ja, derzeit existent</option>
              <option value="0" <?php  if (!$rolle[$key]) echo "selected=\"selected\""; ?>>Nein, derzeit nicht existent</option>
           </select><?php
            break;
          case "id":
?>         <div class="form-control"><?php echo htmlspecialchars($rolle[$key]); ?></div><?php
            break;
          default:
?>         <input class="form-control" type="text" name="<?php echo htmlspecialchars($key); ?>" value="<?php echo htmlspecialchars($rolle[$key]); ?>"><?php
        }
      ?>
    </div>
  </div>

<?php

endforeach;

?>

</div> <!-- form -->

 </div>
 <div class="panel-footer">
     <input type="submit" name="submit" value="Speichern" class="btn btn-primary"/>
     <input type="reset" name="reset" value="Abbrechen" onClick="self.close();" class="btn btn-default"/>
     <a href="?tab=rolle.delete&amp;rolle_id=<?php echo $rolle["id"];?>" class="btn btn-default pull-right">Löschen</a>
 </div>
</div>

</form>

<!-- Personen -->
<?php
$gremienpersonen_edit = true;
require ("../template/gremienpersonenliste.tpl");
?>

<!-- Gruppen -->
<?php
$gremiengruppen_edit = true;
require ("../template/gremiengruppenliste.tpl");
?>

<!-- Mailinglisten -->
<?php
$gremienmailinglisten_edit = true;
require ("../template/gremienmailinglistenliste.tpl");
?>

<?php
// vim:set filetype=php:
