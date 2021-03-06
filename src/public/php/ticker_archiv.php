<?

//**************************************************************************//
//							�bergabe Variablen checken						//
//**************************************************************************//


//**************************************************************************//
//							Dateispezifische Finals deklarieren				//
//**************************************************************************//


//**************************************************************************//
//							Game.php includen								//
//**************************************************************************//

require_once("../../inc/ingame/game.php");

//**************************************************************************//
//						     	  Header   	     	    					//
//**************************************************************************//

require_once("../../inc/ingame/header.php");

//**************************************************************************//
//							Variablen initialisieren						//
//**************************************************************************//


//**************************************************************************//
//**************************************************************************//
//							Eigentliche Berechnungen!						//
//**************************************************************************//
//**************************************************************************//


$meldungen = assocs("SELECT content, time FROM ticker_content ORDER BY time DESC");
$i = count($meldungen);
foreach($meldungen as $tag => $meldung){
	$meldungen[$tag]['iteration'] = $i--;
	$meldungen[$tag]['date'] = datum("d.m.Y, H:i", $meldung['time']);
	$meldungen[$tag]['text'] = umwandeln_bbcode($meldung['content']);
}

$tpl->assign('TICKER_MELDUNGEN', $meldungen);

$tpl->display('ticker_archiv.tpl');
	

//							Daten schreiben									//

//**************************************************************************//
//								  Footer									//
//**************************************************************************//

require_once("../../inc/ingame/footer.php");

//**************************************************************************//
//							Dateispezifische Funktionen						//
//**************************************************************************//



?>