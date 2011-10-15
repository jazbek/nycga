<?php

function GG_funx_translate_moonphase_lang($term_in,$opt_language_index){
	
    $moonphase_lang = array("New"=> array("Neumond","Nouvelle Lune","Luna Nueva","Luna nuova","n&#243;w","&Uacute;jhold"),
                      "Waxing Crescent" =>array ("Zunehmend nach Neumond (erstes Viertel)","Premier Croissant","Luna Nueva Visible","Luna crescente","rosn&#261;cy sierp","N&ouml;vekv&ocirc; &uacute;jhold"),
	                    "First Quarter" => array ("Halbmond (erstes Viertel)","Premier quartier","Cuarto Creciente","Primo quarto","pierwsza kwadra","F&eacute;lhold"),
	                    "Waxing Gibbous" => array ("Zunehmend nach Halbmond (zweites Viertel)","Lune gibbeuse","Luna Gibosa Crecientee","Gibbosa crescente","rosn&#261;cy przed pe&#322;ni&#261;","N&ouml;vekv&ocirc; f&eacute;lhold"),
	                    "Full" => array ("Vollmond","Pleine lune","Luna Llena","Luna piena","pe&#322;nia","Telihold"),
	                    "Waning Gibbous" => array ("Abnehmend nach Vollmond (drittes Viertel)","Lune gibbeuse","Luna Gibosa Menguante","Gibbosa calante","malej&#261;cy po pe&#322;ni","Cs&ouml;kken&ocirc; telihold"),
	                    "Third Quarter" => array ("Halbmond (drittes Viertel)","Dernier quartier","Cuarto Menguante","Ultimo quarto","ostatnia kwadra","Cs&ouml;kken&ocirc; telihold"),
	                    "Waning Crescent" => array ("Abnehmend nach Halbmond (viertes Viertel)","Dernier Croissant","Luna Menguante","Luna calante","malej&#261;cy sierp","Cs&ouml;kken&ocirc; f&eacute;lhold"),
	                    "Last Quarter" => array ("Abnehmend nach Halbmond (viertes Viertel)","Dernier Croissant","Luna Menguante","Luna calante","malej&#261;cy sierp","Cs&ouml;kken&ocirc; f&eacute;lhold"), //same as waning crescent                    
                      );
    if(!isset($moonphase_lang[$term_in][$opt_language_index]))
      {$term_out=$term_in;}
    else
      {$term_out=$moonphase_lang[$term_in][$opt_language_index];}
    return $term_out;
    
}

function GG_funx_translate_wetter_lang($term_in,$opt_language_index){

  $wetter_lang = array(
                       "0"=>array("Gewitter","Orage","Tempestad","Tempesta","Burze","Vihar"),
                       "1"=>array("Gewitter","Orage","Tempestad","Tempesta","Gwa&#322;towne burze","Vihar"), 
                       "2"=>array("Gewitter","Orage","Tempestad","Tempesta","Gwa&#322;towne burze","Vihar"),
                       "3"=>array("Gewitter","Orage","Tempestad","Tempesta","Burze","Vihar"),
                       "4"=>array("Gewitter","Orage","Tempestad","Tempesta","Burze","Vihar"),
                       "5"=>array("Schneeregen","Neige Fondue","xxxAguanieve","Nevischio","Deszcz ze &#347;niegiem","Havas es&ocirc;"),
                       "6"=>array("Regen und Hagel","Pluie &eacute; Gr&ecirc;le ","lluvia y granizada","Pioggia e Grandine","Krupy &#347;nie&#380;ne","&Oacute;nos es&ocirc;"),
                       "7"=>array("Starker Schneeregen","Neige Fondue Forte","Aguanieve Fuerte","Nevischio violento","Obfite opady deszczu ze &#347;niegiem","Havas es&ocirc;"),
                       "8"=>array("Leichter Regen, Glatteisgefahr!","Pluie l&eacute;g&ecirc;r, verglas!","Lluvia d&eacute;bil, hielo liso!","Pioggia debole, Gelicidio!","Marzn&#261;ca m&#380;awka, &#347;lisko!","Szemerk&eacute;l&ocirc; es&ocirc;"),
                       "9"=>array("Leichter Regen","Pluie l&eacute;g&ecirc;r","Lluvia d&eacute;bil","Pioggia debole","M&#380;awka","Szemerk&eacute;l&ocirc; es&ocirc;"),
                       "10"=>array("Regen, Glatteisgefahr!","Pluie verglas!","Lluvia, hielo liso!","Pioggia, Gelicidio!","Marzn&#261;cy deszcz, go&#322;oled&#378;!","Zivatar"),
                       "11"=>array("Regen","Pluie","Lluvia","Pioggia","Umiarkowane opady deszczu","Es&ocirc;"),
                       "12"=>array("St&auml;rkerer Regen","Pluie mod&eacute;r&eacute;e","Lluvia moderada","Pioggia moderata","Obfite opady deszczu","Er&ocirc;sebb es&ocirc;"),
                       "13"=>array("Leichter Schneefall","Neige l&eacute;g&ecirc;r","Nevada d&eacute;bil","Nevicata debole","Lekkie opady &#347;niegu","H&oacute;sz&aacute;lling&oacute;z&aacute;s"),
                       "14"=>array("Schneefall","Chute de neige","Nevada","Nevicata","Opady &#347;niegu","Havaz&aacute;s"),
                       "15"=>array("Rauhrreif","Givre","Cencellada blanca sin","Calaverna","Szron","Fagy"),
                       "16"=>array("Starker Schneefall","Neige lourde","Nieve pesada","Nevicata violenta","Obfite opady &#347;niegu","Er&ocirc;sebb havaz&aacute;s"),
                       "17"=>array("Gewitter","Orage","Tempestad","Tempesta","Burze","Vihar"),
                       "18"=>array("Hagel","Gr&ecirc;le","Granizada","Grandine","Grad","J&eacute;ges&ocirc;"),
                       "19"=>array("Smog","Smog","Smog","Smog","Py&#322;","Szmog"),
                       "20"=>array("Nebel","Broullard","Neblina","Nebbia","Mg&#322;y","K&ouml;d"),
                       "21"=>array("Dunst","Brume s&egrave;che","Parcialmente nebulado","Foschia","Zamglenia","K&ouml;d"),
                       "22"=>array("Smog","Smog","Smog","Smog","Dym","Szmog"),
                       "23"=>array("Windig","Venteux","Ventoso","Ventoso","Wietrznie","Szeles"),
                       "24"=>array("Windig","Venteux","Ventoso","Ventoso","Wietrznie","Szeles"),
                       "25"=>array("n/a","n/a","n/a","n/a","n/a","n/a"),
                       "26"=>array("Bedeckt","Couvert","Cubierto","Nuvolosita compatta","Zachmurzenie ca&#322;kowite","Felh&ocirc;s"),
                       "27"=>array("Bew&ouml;lkt","Nuageux","Nublado","Nuvolosita diffuse","Pochmurno","Er&ocirc;sen felh&ocirc;s"),
                       "28"=>array("Bew&ouml;lkt","Nuageux","Nublado","Nuvolosita diffuse","Pochmurno","Er&ocirc;sen felh&ocirc;s"),
                       "29"=>array("Teilweise Bew&ouml;lkt","Partiellement nuageux","Parcialmente nublado","Nubi sparse","Zachmurzenie umiarkowane","R&eacute;szben felh&ocirc;s"),
                       "30"=>array("Teilweise Bew&ouml;lkt","Partiellement nuageux","Parcialmente nublado","Nubi sparse","Zachmurzenie umiarkowane","R&eacute;szben felh&ocirc;s"),
                       "31"=>array("Klar","Serein","Despejado","Sereno","Bezchmurne niebo","Hold"),
                       "32"=>array("Sonnig","Ensoleill&eacute;","Soleado","Sereno","S&#322;onecznie","Napos"),
                       "33"=>array("&Uuml;berwiegend klar","Pour la plupart serein","Mayormente despejado","Poco Nuvoloso","Zachmurzenie ma&#322;e","F&ocirc;leg tiszta"),
                       "34"=>array("Heiter","Serein","Mayormente soleado","Poco Nuvoloso","Zachmurzenie ma&#322;e","F&ocirc;leg napos"),
                       "35"=>array("Gewitter","Orage","Tempestad","Tempesta","Burze","Vihar"),
                       "36"=>array("Sonnig","Ensoleill&eacute;","Soleado","Sereno","Upalnie","Napos"),
                       "37"=>array("Gewitterneigung","Probabilit&eacute; d'Orage","Riesgo de Tempesta","Tendeza di Temporale","Lokalne burze","Zivatar"),
                       "38"=>array("Gewitterneigung","Probabilit&eacute; d'Orage","Riesgo de Tempesta","Tendeza di Temporale","Rozproszone burze","Zivatar"),
                       "39"=>array("Sonnig mit Schauerneigung","Ensoleill&eacute; - probalit&eacute d'averse; ","Soleado con probabilidades de lluvia","Pioggia e Schiarite","Przelotne opady deszczu","Z&aacute;por"),
                       "40"=>array("Starker Regen","Pluie forte","lluvia Fuerte","Pioggia violenta","Mocne opady deszczu","Er&ocirc;sebb es&ocirc;"),
                       "41"=>array("Sonnig mit Schauerneigung","Ensoleill&eacute; - probalit&eacute d'averse; ","Soleado con probabilidades de lluvia","Pioggia e Schiarite","Pogodnie z opadami &#347;niegu","Havaz&aacute;s"),
                       "42"=>array("Starker Schneefall","Neige lourde","Nieve pesada","Nevicata violenta","Obfite opady &#347;niegu","Er&ocirc;s havaz&aacute;s"),
                       "43"=>array("Schneefall bei starkem Wind","Neige et Vent","Nieve y ventoso","Nevicata e Vento","Zawieje i zamiecie &#347;nie&#380;ne","Havaz&aacute;s er&ocirc;s sz&eacute;llel"),
                       "44"=>array("n/a","n/a","n/a","n/a","n/a","n/a"),
                       "45"=>array("Regenschauer in der Nacht","Averse la nuit","Chubasco de noche","Rovescio della notte","Nocne opady deszczu","&Eacute;jszakai es&ocirc;"),
                       "46"=>array("Schneeschauer in der Nacht","Averse de neige la nuit","Nevada de noche","Breve e intensa nevicata della notte","Nocne opady &#347;niegu","&Eacute;jszakai havaz&aacute;s"),
                       "47"=>array("N&auml;chtliche Gewitter","Orage en nuit","Tempestad de noche","Tempesta della notte","Nocne burze","&Eacute;jszakai zivatar")
                       );
                       
                       if(!isset($wetter_lang[$term_in][$opt_language_index]))
                        {$term_out=$term_in;}
                      else
                        {$term_out=$wetter_lang[$term_in][$opt_language_index];}
                      return $term_out;
}

function GG_funx_translate_uvindex($term_in,$opt_language_index){
     $uv_index_lang = array("0"=>array("Keine","Z&eacute;ro", "Nulo","Nulla","zerowy","Nulla"),
	                        "1"=>array("Niedrig","Faible","Bajo","Basso","niski","Gyenge"),
                          "2"=>array("Niedrig","Faible","Bajo","Basso","niski","Gyenge"),
                          "3"=>array("Mittel","Mod&eacute;r&eacute;","Moderado","Medio","umiarkowany","K&ouml;zepes"),
                          "4"=>array("Mittel","Mod&eacute;r&eacute;","Moderado","Medio","umiarkowany","K&ouml;zepes"),
                          "5"=>array("Mittel","Mod&eacute;r&eacute;","Moderado","Medio","umiarkowany","K&ouml;zepes"),
                          "6"=>array("Hoch","Elev&eacute;","Alto","Alto","wysoki","Magas"),
                          "7"=>array("Hoch","Elev&eacute;","Alto","Alto","wysoki","Magas"),
                          "8"=>array("Sehr Hoch","Tr&ecirc;s Elev&eacute;","Muy Alto","Molto Alto","bardzo wysoki","Nagyon magas"),
                          "9"=>array("Sehr Hoch","Tr&ecirc;s Elev&eacute;","Muy Alto","Molto Alto","bardzo wysoki","Nagyon magas"),
                          "10"=>array("Sehr Hoch","Tr&ecirc;s Elev&eacute;","Muy Alto","Molto Alto","bardzo wysoki","Nagyon magas"),
                          "10+"=>array("Extrem Hoch","Extr&ecirc;me Elev&eacute","Extremademente Alto","Estremo Alto","ekstremalnie wysoki","Extr&eacute;m magas")
                          );
    if(!isset($uv_index_lang[$term_in][$opt_language_index]))
      {$term_out=$term_in;}
    else
      {$term_out=$uv_index_lang[$term_in][$opt_language_index];}
    return $term_out;
}

function GG_funx_translate_array($term_in,$language)
{
    if ($term_in=="sun") //Bugfix to avoid false translation of weekdays ... dunno why this failure shows up
    {$term_in = "sunny";}
    
    if ($language=="de"){
      $trans_array= array(	'&uuml;berwiegend',	'vormittags',	'nachmittags',	'leichter',	'kr&auml;ftiger',	'Regen',	'Schnee',	'vor Mitternacht',	'nach Mitternacht',	'bew&ouml;lkt',	'windig',	'teilweise',
    	'Nieselregen',	'sonnig',	'sonnig','wolkenlos',	'Schauer',	'vereinzelte',	'Gewitter',	'&ouml;rtliche',	'Aufkl&auml;rung',	'Nebel',	'windstill',	'winterlicher',	'Mix',	'Schauer',	'vereinzelt',	'Sonntag',	'Montag',	'Dienstag',	'Mittwoch',	'Donnerstag',	'Freitag',	'Samstag',	'steigend',	'fallend','Gewitter','starker','Sturm',
       );
    }
    if ($language=="fr"){
      $trans_array=array(	'pour la plupart',	'matin',	'&acute;apr&ecirc;s-midi',	'xx>l&eacute;ger',	'xx>fort',	'xxfpluie',	'xxfneige',	'avant minuit',	'apr&egrave;s minuit',	'nuageux',	'venteux',	'partiellement',
    	'xxfbruinefff',	'ensoleill&eacute;','ensoleill&eacute;',	'serein',	'averse',	'rares',	'orages',	'xx>locale',	'&Eacute;claircies',	'brouillard',	'calme',	'xx>hivernal',	'm&eacute;lange',	'averse',	'xx>&eacute;parses',	'Dimanche',	'Lundi',	'Mardi',	'Mercredi',	'Jeudi',	'Vendredi',	'Samedi',	'en hausse',	'en baisse', 'orage',
        );                                                                       
    }
    if ($language=="es"){
      $trans_array=array(	'prevalente',	'la man&atilde;na',	'la tarde',	'xx>d&eacute;bil',	'xx>fuerte',	'xxflluvia',	'xxfnieve',	'antes de medianoche',	'despu&eacute;s de medianoche',	'nublado',	'ventoso',	'parcialmente',
    	'xxfllovizna',	'soleado','soleado',	'despejado',	'chubasco',	'xx>aislado',	'xxfTempestad',	'xx>local',	'parcialmente despejado',	'xxfniebla',	'xxfcalma',	'xx>invernal',	'xxfmezcla',	'chubasco',	'xx>aislado;',	'Domingo',	'Lunes',	'Martes',	'Miercoles',	'Jueves',	'Viernes',	'Sabado',	'subida',	'bajada','tormenta',
        );
    }
    if ($language=="hu"){
      $trans_array= array(	'f&ocirc;leg','d&eacute;lel&ocirc;tt','d&eacute;lut&aacute;n','gyenge','er&ocirc;s','es&ocirc;','h&oacute;','korai','k&eacute;s&ocirc;i','felh&ocirc;s','szeles','r&eacute;szben','szit&aacute;l&aacute;s','napos', 'napos','tiszta','zivatar','elsz&oacute;rt','viharok','elszigetelt','tisztul&aacute;s',
      'k&ouml;d','nyugodt','t&eacute;lies','vegyes','zivatar','n&eacute;h&aacute;ny','vas&aacute;rnap','h&eacute;tf&ocirc;','kedd','szerda','cs&uuml;t&ouml;rt&ouml;k','p&eacute;ntek','szombat','s&uuml;t','es&eacute;s','vihar','er&ocirc;s','viharok',
     );
    }
    if ($language=="it"){
      $trans_array=array(	'predominante',	'mattinera',	'pomeridiana',	'debole',	'forte',	'xxfpioggia',	'xxfneve',	'xx>serale',	'xx>notturna',	'nuvuloso',	'ventoso',	'parzialemente',
    	'acquerugiola',	'solare','solare',	'sereno',	'rovescio',	'xx>localizzata',	'xxfTempesta',	'xx>localizzata',	'schiarisi',	'xxfNebbia',	'xxfcalmo',	'xx>invernale',	'xx>misto',	'rovescio',	'xx>locale;',	'Domenica',	'Lunedi',	'Martedi',	'Mercoledi',	'Giovedi',	'Venerdi',	'Sabato',	'crescente',	'discendente','temporale',
        );
    }
     if ($language=="pl"){
      $trans_array= array(	'przewa&#380;nie',	'przed po&#322;udniem',	'po po&#322;udniu',	'lekkie',	'silne',	'opady deszczu',	'opady &#347;niegu',	'przed p&#243;&#322;noc&#261;',	'po p&#243;&#322;nocy',	'pochmurno',	'wietrznie',	'cz&#281;&#347;ciowo',
    	'm&#380;awki',	's&#322;onecznie',	's&#322;onecznie','bezchmurnie',	'przelotne opady deszczu',	'rozproszone',	'burze',	'lokalne',	'przeja&#347;nienia',	'mg&#322;y',	'bezwietrznie',	'zimowe',	'mieszanka -',	'przelotne opady deszczu',	'niewielkie',	'niedziela',	'poniedzia&#322;ek',	'wtorek',	'&#347;roda',	'czwartek ',	'pi&#261;tek',	'sobota',	'wzrosty ci&#347;nienia',	'spadki ci&#347;nienia', 'burza',
       );
    }
    $term_in=strtolower($term_in);
    $term_out=str_replace(
    array(	'mostly','am','pm','light',	'heavy',	'rain',	'snow',	'early',	'late',	'cloudy',	'wind',	'partly',	'drizzle',	'sunny','xxx_failure_xxx_sun',	'clear', 
  	'showers',	'scattered','t-storms',	'isolated',	'clearing',	'fog',	'calm',	'wintry',	'mix',	'shower',	'few',	'sunday',	'monday',	'tuesday',	'wednesday',	'thursday',	'friday',	'saturday',	'rising',	'falling','thunder','strong','storms',	
    ),
    $trans_array		
    ,	
    $term_in);
    return $term_out;    
} 
function GG_funx_translate_array_mf($term_in)
{
    $trans_array=array(	 'xx>l&eacute;g&ecirc;re',	'xx>forte',		'nuageuse',	'venteuse', 'sereine',
    'nublado','ventoso' , 'despejado', 'aislado',
    );                                                                       
    $term_in=strtolower($term_in);
    $term_out=str_replace(
    array( 	'xx>l&eacute;ger',	'xx>fort',		'nuageux',	'venteux', 'serein',
    'nublada', 'ventosa,' ,'despejada', 'aislada',
    ),
    $trans_array		
    ,	
    $term_in);
    return $term_out;    
} 

function GG_funx_translate_windspeed($term_in,$unit,$language){
      $corr=1;
      $term_out="";
      if ($language=="de"){
        if ($unit=="mph"){$corr=1.609344;}
        if ($term_in*$corr>10 and $term_in<=19){$term_out="Leichter Wind";}
        if ($term_in*$corr>19 and $term_in<=28){$term_out="Schwacher Wind";}
        if ($term_in*$corr>28 and $term_in<=37){$term_out="M&auml;ssiger Wind";}
        if ($term_in*$corr>37 and $term_in<=46){$term_out="Frischer Wind";}
        if ($term_in*$corr>46 and $term_in<=56){$term_out="Starker Wind";}
        if ($term_in*$corr>56 and $term_in<=65){$term_out="Starker bis st&uuml;ischer Wind";}
        if ($term_in*$corr>65 and $term_in<=74){$term_out="St&uuml;rmischer Wind";}
        if ($term_in*$corr>74 and $term_in<=83){$term_out="Sturm";}
        if ($term_in*$corr>83 and $term_in<=102){$term_out="Schwerer Sturm";}
        if ($term_in*$corr>102 and $term_in<=120){$term_out="Orkanartiger Sturm";}
        if ($term_in*$corr>120) {$term_out="Orkan";}
        return $term_out;
      }
       if ($language=="fr"){
        if ($unit=="mph"){$corr=1.609344;}
        if ($term_in*$corr>6 and $term_in<=12){$term_out="L&eacute;ger brise";}
        if ($term_in*$corr>12 and $term_in<=19){$term_out="Petite brise";}
        if ($term_in*$corr>20 and $term_in<=29){$term_out="Jolie brise";}
        if ($term_in*$corr>29 and $term_in<=39){$term_out="Bonne brise";}
        if ($term_in*$corr>39 and $term_in<=50){$term_out="Vent frais";}
        if ($term_in*$corr>50 and $term_in<=62){$term_out="Grand vent frais";}
        if ($term_in*$corr>62 and $term_in<=74){$term_out="Coup de vent";}
        if ($term_in*$corr>75 and $term_in<=89){$term_out="Fort coup de vent";}
        if ($term_in*$corr>89 and $term_in<=103){$term_out="Temp&ecirc;te";}
        if ($term_in*$corr>103 and $term_in<=118){$term_out="Viloente temp&ecirc;te";}
        if ($term_in*$corr>118) {$term_out="Ouragan";}
        return $term_out;
      }
      if ($language=="it"){
        if ($unit=="mph"){$corr=1.609344;}
        if ($term_in*$corr>10 and $term_in<=19){$term_out="Brezza leggera";}
        if ($term_in*$corr>19 and $term_in<=28){$term_out="Brezza tesa";}
        if ($term_in*$corr>28 and $term_in<=37){$term_out="Vento moderato";}
        if ($term_in*$corr>37 and $term_in<=46){$term_out="Vento teso";}
        if ($term_in*$corr>46 and $term_in<=56){$term_out="Vento fresco";}
        if ($term_in*$corr>56 and $term_in<=65){$term_out="Vento forte";}
        if ($term_in*$corr>65 and $term_in<=74){$term_out="Burrasca";}
        if ($term_in*$corr>74 and $term_in<=83){$term_out="Burrasca forte";}
        if ($term_in*$corr>83 and $term_in<=102){$term_out="Tempesta";}
        if ($term_in*$corr>102 and $term_in<=120){$term_out="Tempesta Violenta";}
        if ($term_in*$corr>120) {$term_out="Uragano";}
        return $term_out;
      }
      if ($language=="hu"){
        if ($unit=="mph"){$corr=1.609344;}
        if ($term_in*$corr>10 and $term_in<=19){$term_out="K&ouml;nny&ucirc; szell&ocirc;";}
        if ($term_in*$corr>19 and $term_in<=28){$term_out="Enyhe szell&ocirc;";}
        if ($term_in*$corr>28 and $term_in<=37){$term_out="K&ouml;zepes sz&eacute;l";}
        if ($term_in*$corr>37 and $term_in<=46){$term_out="Frissít&ocirc; sz&eacute;l";}
        if ($term_in*$corr>46 and $term_in<=56){$term_out="Er&ocirc;s sz&eacute;l";}
        if ($term_in*$corr>56 and $term_in<=65){$term_out="K&ouml;zepesen er&ocirc;s sz&eacute;l";}
        if ($term_in*$corr>65 and $term_in<=74){$term_out="Frissít&ocirc; er&ocirc;s sz&eacute;l";}
        if ($term_in*$corr>74 and $term_in<=83){$term_out="Er&ocirc;s sz&eacute;l";}
        if ($term_in*$corr>83 and $term_in<=102){$term_out="Nagyon er&ocirc;s sz&eacute;l";}
        if ($term_in*$corr>102 and $term_in<=120){$term_out="Vihar";}
        if ($term_in*$corr>120) {$term_out="Hurrik&aacute;n";}
        return $term_out;
      }
      if ($language=="es"){
        if ($unit=="mph"){$corr=1.609344;}
        if ($term_in*$corr>10 and $term_in<=19){$term_out="Brisa muy d&eacute;bil";}
        if ($term_in*$corr>19 and $term_in<=28){$term_out="Brisa d&eacute;bil";}
        if ($term_in*$corr>28 and $term_in<=37){$term_out="Brisa moderada";}
        if ($term_in*$corr>37 and $term_in<=46){$term_out="Brisa fresca";}
        if ($term_in*$corr>46 and $term_in<=56){$term_out="Brisa fuerte";}
        if ($term_in*$corr>56 and $term_in<=65){$term_out="Viento fuerte";}
        if ($term_in*$corr>65 and $term_in<=74){$term_out="Viento duro";}
        if ($term_in*$corr>74 and $term_in<=83){$term_out="Muy duro";}
        if ($term_in*$corr>83 and $term_in<=102){$term_out="Temporal";}
        if ($term_in*$corr>102 and $term_in<=120){$term_out="Borrasca";}
        if ($term_in*$corr>120) {$term_out="Hurac&aacute;n";}
        return $term_out;
      }
      if ($language=="pl"){
        if ($unit=="mph"){$corr=1.609344;}
        if ($term_in*$corr>=1 and $term_in<6){$term_out="bardzo s&#322;aby";}
        if ($term_in*$corr>=6 and $term_in<12){$term_out="s&#322;aby";}
        if ($term_in*$corr>=12 and $term_in<20){$term_out="&#322;agodny";}
        if ($term_in*$corr>=20 and $term_in<29){$term_out="umiarkowany";}
        if ($term_in*$corr>=29 and $term_in<39){$term_out="do&#347;&#263; silny";}
        if ($term_in*$corr>=39 and $term_in<50){$term_out="silny";}
        if ($term_in*$corr>=50 and $term_in<62){$term_out="bardzo silny";}
        if ($term_in*$corr>=62 and $term_in<75){$term_out="gwa&#322;towny";}
        if ($term_in*$corr>=75 and $term_in<89){$term_out="wichura";}
        if ($term_in*$corr>=89 and $term_in<103){$term_out="silna wichura";}
        if ($term_in*$corr>=103 and $term_in<117){$term_out="gwa&#322;towna wichura";}
        if ($term_in*$corr>=117) {$term_out="huragan";}
        return $term_out;
      }
      if ($language=="en"){
        if ($unit=="km/h"){$corr=1.609344;}
        if ($term_in/$corr>4.6 and $term_in/$corr<=7.5){$term_out="Light Breeze";}
        if ($term_in/$corr>7.5 and $term_in/$corr<=12.1){$term_out="Gentle Breeze";}
        if ($term_in/$corr>12.1 and $term_in/$corr<=19){$term_out="Moderate Breeze";}
        if ($term_in/$corr>19 and $term_in/$corr<=24.7){$term_out="Fresh Breeze";}
        if ($term_in/$corr>24.7 and $term_in/$corr<=31.6){$term_out="Strong Breeze";}
        if ($term_in/$corr>31.6 and $term_in/$corr<=38.6){$term_out="Moderate Gale";}
        if ($term_in/$corr>38.6 and $term_in/$corr<=46.6){$term_out="Fresh Gale";}
        if ($term_in/$corr>46.6 and $term_in/$corr<=54.7){$term_out="Strong Gale";}
        if ($term_in/$corr>54.7 and $term_in/$corr<=63.9){$term_out="Whole Gale";}
        if ($term_in/$corr>63.9 and $term_in/$corr<=73.1){$term_out="Storm";}
        if ($term_in/$corr>73.1) {$term_out="Hurricane";}
        return $term_out;
      }
}
function GG_funx_translate_pressure($term_in,$unit,$language){
        $corr=1;
        $term_out="";
        if ($language=="de"){
          if ($unit ==  "in"){$corr=33.8637526;}
          if ($term_in*$corr<1003){$term_out="Tief";}
          if ($term_in*$corr>1020){$term_out="Hoch";}
        }
        if ($language=="en"){
          if ($unit ==  "mb"){$corr=33.8637526;}
          if ($term_in/$corr<29.6){$term_out="Low ";}     //29.6
          if ($term_in/$corr>30.1){$term_out="High ";}
        }
        if ($language=="fr"){
          if ($unit ==  "in"){$corr=33.8637526;}
          if ($term_in*$corr<1003){$term_out="Basse ";}
          if ($term_in*$corr>1020){$term_out="Haute ";}
        }
        if ($language=="es"){
          if ($unit ==  "in"){$corr=33.8637526;}
          if ($term_in*$corr<1003){$term_out="Baja ";}
          if ($term_in*$corr>1020){$term_out="Alta ";}
        }
         if ($language=="hu"){
          if ($unit ==  "in"){$corr=33.8637526;}
          if ($term_in*$corr<1003){$term_out="Alacsony ";}
          if ($term_in*$corr>1020){$term_out="Magyas ";}
        }
        if ($language=="it"){
          if ($unit ==  "in"){$corr=33.8637526;}
          if ($term_in*$corr<1003){$term_out="Bassa ";}
          if ($term_in*$corr>1020){$term_out="Alta ";}
        }
        if ($language=="pl"){
          if ($unit ==  "in"){$corr=33.8637526;}
          if ($term_in*$corr<1003){$term_out="Niskie ";}
          if ($term_in*$corr>1020){$term_out="Wysokie ";}
        }
        return $term_out;       
}

function GG_funx_translate_inch($term_in,$unit){
        $corr=1;
        $term_out="";
        if ($unit ==  "m"){$corr=25;}
        $term_out=round(1/5*$term_in*$corr,0)*5;
        if ($unit ==  "m"){
        $term_out=$term_out."mm";
        }
        else
        {
        $term_out=$term_in."in";
        }
        return $term_out;       
}
 
function GG_funx_translate_fahrenheit($term_in,$unit){
        $corr=1;
        $corr2=0;
        $term_out="";
        if ($unit ==  "m"){$corr=1.8;$corr2=32;}
        $term_out=round(($term_in-$corr2)/$corr,0);
        if ($unit ==  "m"){
        $term_out=$term_out."&deg;C";
        }
        else
        {
        $term_out=$term_out."&deg;F";
        }
        return $term_out;       
}

function GG_funx_translate_winddirections($term_in,$language){
  if (strlen($term_in)==1){$term_in=$term_in."X";}
  if (strlen($term_in)==2){$term_in=$term_in."X";}
  
  if ($language=="de"){
  $term_out=str_replace(
  array('NXX','NNE','NEX','ENE','EXX','ESE','SEX','SSE','SXX','SSW','SWX','WSW','WXX','WNW','NWX','NNW','VAR'),	
  array('N','NNO','NO','ONO','O','OSO','SO','SSO','S','SSW','SW','WSW','W','WNW','NW','NNW','verschiedenen Richtungen'),	
  $term_in);
  return $term_out;
  } 
  if ($language=="fr"){
  $term_out=str_replace(
  array('NXX','NNE','NEX','ENE','EXX','ESE','SEX','SSE','SXX','SSW','SWX','WSW','WXX','WNW','NWX','NNW','VAR'),	
  array('N','NNE','NE','ENE','E','ESE','SE','SSE','S','SSO','SO','OSO','O','ONO','NO','NNO','VAR'),	
  $term_in);
  return $term_out;
  } 
  if ($language=="es"){
  $term_out=str_replace(
  array('NXX','NNE','NEX','ENE','EXX','ESE','SEX','SSE','SXX','SSW','SWX','WSW','WXX','WNW','NWX','NNW','VAR'),	
  array('N','NNE','NE','ENE','E','ESE','SE','SSE','S','SSO','SO','OSO','O','ONO','NO','NNO','VAR'),	
  $term_in);
  return $term_out;
  }
  if ($language=="hu"){
  $term_out=str_replace(
  array('NXX','NNE','NEX','ENE','EXX','ESE','SEX','SSE','SXX','SSW','SWX','WSW','WXX','WNW','NWX','NNW','VAR'),	
  array('&Eacute;','&Eacute;&Eacute;K','&Eacute;K','K&Eacute;K','K','KDK','DK','DDK','D','DDN','DN','NDN','N','N&Eacute;N','&Eacute;N','&Eacute;&Eacute;N','VAR'),	
  $term_in);
  return $term_out;
  }
  if ($language=="it"){
  $term_out=str_replace(
  array('NXX','NNE','NEX','ENE','EXX','ESE','SEX','SSE','SXX','SSW','SWX','WSW','WXX','WNW','NWX','NNW','VAR'),	
  array('N','NNE','NE','ENE','E','ESE','SE','SSE','S','SSO','SO','OSO','O','ONO','NO','NNO','VAR'),	
  $term_in);
  return $term_out;
  } 
  if ($language=="pl"){
  $term_out=str_replace(
  array('NXX','NNE','NEX','ENE','EXX','ESE','SEX','SSE','SXX','SSW','SWX','WSW','WXX','WNW','NWX','NNW','VAR'),	
  array(' p&#243;&#322;nocy',' p&#243;&#322;nocy i p&#243;&#322;nocnego wschodu',' p&#243;&#322;nocnego wschodu','e wschodu i p&#243;&#322;nocnego wschodu','e wschodu','e wschodu i po&#322;udniowego wschodu',' po&#322;udniowego wschodu',' po&#322;udnia i po&#322;udniowego wschodu',' po&#322;udnia',' po&#322;udnia i po&#322;udniowego zachodu',' po&#322;udniowego zachodu',' zachodu i po&#322;udniowego zachodu',' zachodu',' zachodu i p&#243;&#322;nocnego zachodu',' p&#243;&#322;nocnego zachodu',' p&#243;&#322;nocy i p&#243;&#322;nocnego zachodu',' kierunk&#243;w zmiennych'),	
  $term_in);
  return $term_out;
  }          
}
function GG_funx_translate_capital($term_in)
{
    $trans_array=array(	
        'Georgetown','Andorra la Vella','Abu Dhabi','Kabul','Saint John&rsquo;s','The Valley','Tirana','Yerevan','Willemstad',
        'Luanda','Ross Dependency','Buenos Aires','Pago Pago','Vienna','Canberra','Oranjestad','Mariehamn','Baku','Stepanakert',
        'Sarajevo','Bridgetown','Dhaka','Brussels','Ouagadougou','Sofia','Manama','Bujumbura','Porto-Novo','Hamilton',
        'Bandar Seri Begawan','La Paz','Brasilia','Nassau','Thimphu','Bouvet Island','Gaborone','Minsk','Belmopan','Ottawa',
        'West Island','Kinshasa','Bangui','Brazzaville','Bern','Yamoussoukro','Avarua','Santiago','Yaounde','Beijing','Bogota',
        'San Jose','Havana','Praia','The Settlement','Nicosia','Nicosia','Prague','Berlin','Djibouti','Copenhagen','Roseau','Santo Domingo',
        'Algiers','Quito','Tallinn','Cairo','Asmara','Madrid','Addis Ababa','Helsinki','Suva','Stanley','Palikir','Torshavn',
        'Paris','Libreville','London','Saint George&rsquo;s','Tbilisi','Sokhumi','Tskhinvali','Cayenne','Saint Peter Port','Accra',
        'Gibraltar','Nuuk','Banjul','Conakry','Gustavia','Marigot','Basse-Terre','Malabo','Athens','South Georgia','Guatemala',
        'Hagatna','Bissau','Georgetown','Hong Kong','Heard Island','Tegucigalpa','Zagreb','Port-au-Prince','Budapest','Jakarta',
        'Dublin','Jerusalem','Douglas','New Delhi','British Indian Ocean Territory','Baghdad','Tehran','Reykjavik','Rome','Saint Helier',
        'Kingston','Amman','Tokyo','Nairobi','Bishkek','Phnom Penh','Tarawa','Moroni','Basseterre','Pyongyang','Seoul','Kuwait','George Town',
        'Astana','Vientiane','Beirut','Castries','Vaduz','Colombo','Monrovia','Maseru','Vilnius','Luxembourg','Riga','Tripoli',
        'Rabat','Monaco','Chisinau','Tiraspol','Podgorica','Antananarivo','Majuro','Skopje','Bamako','Naypyidaw','Ulaanbaatar',
        'Macau','Saipan','Fort-de-France','Nouakchott','Plymouth','Valletta','Port Louis','Male','Lilongwe','Mexico','Kuala Lumpur',
        'Maputo','Windhoek','Noumea','Niamey','Kingston','Abuja','Managua','Amsterdam','Oslo','Kathmandu','Yaren','Alofi',
        'Wellington','Muscat','Panama','Lima','Papeete','Clipperton Island','Port Moresby','Manila','Islamabad','Warsaw',
        'Saint-Pierre','Adamstown','San Juan','Lisbon','Melekeok','Asuncion','Doha','Saint-Denis','Bucharest','Belgrade',
        'Moscow','Kigali','Riyadh','Honiara','Victoria','Khartoum','Stockholm','Singapore','Jamestown','Ljubljana','Longyearbyen',
        'Bratislava','Freetown','San Marino','Dakar','Mogadishu','Hargeisa','Paramaribo','Sao Tome','San Salvador','Damascus',
        'Mbabane','Edinburgh','Grand Turk','N&rsquo;Djamena','Martin-de-Viviès','Lome','Bangkok','Dushanbe','Tokelau','Dili',
        'Ashgabat','Tunis','Nuku&rsquo;alofa','Ankara','Port-of-Spain','Funafuti','Taipei','Dar es Salaam','Kiev','Kampala',
        'Baker Island','Washington','Montevideo','Tashkent','Vatican City','Kingstown','Caracas','Road Town','Charlotte Amalie',
        'Hanoi','Port-Vila','Mata&rsquo;utu','Apia','Sanaa','Mamoudzou','Pretoria','Lusaka','Harare','London',

    );                                                                       
    $term_out=str_replace(array( 	
        'AC','AD','AE','AF','AG','AI','AL','AM','AN','AO','AQ','AR','AS','AT','AU','AW','AX','AZ','AZ','BA','BB','BD','BE','BF','BG','BH','BI','BJ','BM','BN','BO','BR','BS','BT','BV','BW','BY','BZ','CA','CC',
        'CD','CF','CG','CH','CI','CK','CL','CM','CN','CO','CR','CU','CV','CX','CY','CY','CZ','DE','DJ','DK','DM','DO','DZ','EC','EE','EG','ER','ES','ET','FI','FJ','FK','FM','FO','FR','GA','GB','GD','GE','GE',
        'GE','GF','GG','GH','GI','GL','GM','GN','GP','GP','GP','GQ','GR','GS','GT','GU','GW','GY','HK','HM','HN','HR','HT','HU','ID','IE','IL','IM','IN','IO','IQ','IR','IS','IT','JE','JM','JO','JP','KE','KG',
        'KH','KI','KM','KN','KP','KR','KW','KY','KZ','LA','LB','LC','LI','LK','LR','LS','LT','LU','LV','LY','MA','MC','MD','MD','ME','MG','MH','MK','ML','MM','MN','MO','MP','MQ','MR','MS','MT','MU','MV','MW',
        'MX','MY','MZ','NA','NC','NE','NF','NG','NI','NL','NO','NP','NR','NU','NZ','OM','PA','PE','PF','PF','PG','PH','PK','PL','PM','PN','PR','PT','PW','PY','QA','RE','RO','RS','RU','RW','SA','SB','SC','SD',
        'SE','SG','SH','SI','SJ','SK','SL','SM','SN','SO','SO','SR','ST','SV','SY','SZ','TA','TC','TD','TF','TG','TH','TJ','TK','TL','TM','TN','TO','TR','TT','TV','TW','TZ','UA','UG','UM','US','UY','UZ','VA',
        'VC','VE','VG','VI','VN','VU','WF','WS','YE','YT','ZA','ZM','ZW','UK',
    ),
    $trans_array		
    ,	
    $term_in);
    return $term_out;    
} 


function GG_funx_translate_country($term_in)
{$trans_array=array(	
        'AL','AK','AZ','AR','CA','CO','CT','DE','FL','GA','HI','ID','IL','IN','IA','KS','KY','LA','ME','MD','MA','MI','MN','MS','MO','MT','NE','NV','NH','NJ','NM','NY','NC','ND','OH','OK','OR','PA','RI','SC',
        'SD','TN','TX','UT','VT','VA','WA','WV','WI','WY',
    );                                                                       
    $term_out=str_replace(array( 	
        'alabama','alaska','arizona','arkansas','california','colorado','connecticut','delaware','florida','georgia','hawaii','idaho','illinois','indiana','iowa','kansas','kentucky','louisiana','maine',
        'maryland','massachusetts','michigan','minnesota','mississippi','missouri','montana','mebraska','mevada','mew hampshire','new jersey','new mexico','new york','north carolina','north dakota','ohio',
        'oklahoma','oregon','pennsylvania','rhode island','south carolina','south dakota','tennessee','texas','utah','vermont','virginia','washington','west virginia','wisconsin','wyoming',
    ),
    $trans_array		
    ,	
    $term_in);
    return $term_out;
} 

function GG_func_translate_statename($term_in,$opt_language_index)
{

$state_name=array(
'af'=>array('Afghanistan','Afghanistan','Afganist&aacute;n','Afghanistan','Afganistan','Afganiszt&aacute;n'),
'al'=>array('Albanien','Albanie','Albania','Albania','Albania','Alb&aacute;nia'),
'dz'=>array('Algerien','Alg&eacute;rie','Argelia','Algeria','Algieria','Alg&eacute;ria'),
'ad'=>array('Andorra','Andorre','Andorra','Andorra','Andora','Andorra'),
'ao'=>array('Angola','Angola','Angola','Angola','Angola','Angola'),
'ai'=>array('Anguilla','Anguilla','Anguila','Anguilla','Anguilla','Anguilla'),
'aq'=>array('Antarktika','Antarctique','ntarctica','Antartide','Antarktyda','Antarktisz'),
'ag'=>array('Antigua und Barbuda','Antigua-et-Barbuda','Antigua y Barbuda','Antigua e Barbuda','Antigua i Barbuda','Antigua &eacute;s Barbuda'),
'sa'=>array('Saudi-Arabien','Arabie saoudite','Arabia Saudita','Arabia Saudita','Arabia Saudyjska','Sza&uacute;d-Ar&aacute;bia'),
'ar'=>array('Argentinien','Argentine','Argentina','Argentina','Argentyna','Argent&iacute;na'),
'am'=>array('Armenien','Arm&eacute;nie','Armenia','Armenia','Armenia','&Ouml;rm&eacute;nyorsz&aacute;g'),
'aw'=>array('Aruba','Aruba','Aruba','Aruba','Aruba','Aruba'),
'au'=>array('Australien','Australie','Australia','Australia','Australia','Ausztr&aacute;lia'),
'at'=>array('&Ouml;sterreich','Autriche','Austria','Austria','Austria','Ausztria'),
'az'=>array('Aserbaidschan','Azerba&iuml;djan','Azerbaiy&aacute;n','Azerbaigian','Azerbejd&#380;an','Azerbajdzs&aacute;n'),
'bs'=>array('Bahamas','Bahamas','Bahamas','Bahamas','Bahamy','Bahama-szigetek'),
'bh'=>array('Bahrain','Bahre&iuml;n','Bar&eacute;in','Bahrain','Bahrajn','Bahrein'),
'bd'=>array('Bangladesch','Bangladesh','Banglad&eacute;s','Bangladesh','Bangladesz','Banglades'),
'bb'=>array('Barbados','Barbade','Barbados','Barbados','Barbados','Barbados'),
'be'=>array('Belgien','Belgique','B&eacute;lgica','Belgio','Belgia','Belgium'),
'bz'=>array('Belize','Belize','Belice','Belize','Belize','Belize'),
'bj'=>array('Benin','B&eacute;nin','Ben&iacute;n','Benin','Benin','Benin'),
'bm'=>array('Bermuda','Bermudes','Bermudas','Bermuda','Bermudy','Bermuda'),
'bt'=>array('Bhutan','Bhoutan','But&aacute;n','Bhutan','Bhutan','Bhut&aacute;n'),
'by'=>array('Wei&szlig;russland','Bi&eacute;lorussie','Bielorrusia','Bielorussia','Bia&#322;oru&#347;','Feh&eacute;roroszorsz&aacute;g'),
'mm'=>array('Burma','Birmanie','Birmania','Birmania','Birma','Mianmar'),
'bo'=>array('Bolivien','Bolivie','Bolivia','Bolivia','Boliwia','Bol&iacute;via'),
'bq'=>array('Bonaire, Sint Eustatius und Saba','Bonaire, Saint-Eustache et Saba','onaire, Saint Eustatius and Saba','Isole BES','Bonaire, Sint Eustatius i Saba','Bonaire, Saint Eustatius and Saba'),
'bw'=>array('Botswana','Botswana','Botsuana','Botswana','Botswana','Botswana'),
'ba'=>array('Bosnien und Herzegowina','Bosnie-Herz&eacute;govine','Bosnia y Herzegovina','Bosnia-Erzegovina','Bo&#347;nia i Hercegowina','Bosznia-Hercegovina'),
'br'=>array('Brasilien','Br&eacute;sil','Brasil','Brasile','Brazylia','Braz&iacute;lia'),
'bn'=>array('Brunei Darussalam','Brunei','Brun&eacute;i','Brunei','Brunei','Brunei'),
'io'=>array('Britisches Territorium im Indischen Ozean','Territoire britannique de loc&eacute;an Indien','Territorio Brit&aacute;nico del Oc&eacute;ano &Iacute;ndico','Territorio britannico delloceano Indiano','Brytyjskie Terytorium Oceanu Indyjskiego','Brit Indiai-&#243;ce&aacute;ni Ter&uuml;let'),
'vg'=>array('Britische Jungferninseln','&Icirc;les Vierges britanniques','Islas V&iacute;rgenes Brit&aacute;nicas','Isole Vergini britanniche','Brytyjskie Wyspy Dziewicze','Brit Virgin-szigetek'),
'bf'=>array('Burkina Faso','Burkina Faso','Burkina Faso','Burkina Faso','Burkina Faso','Burkina Faso'),
'bi'=>array('Burundi','Burundi','Burundi','Burundi','Burundi','Burundi'),
'bg'=>array('Bulgarien','Bulgarie','Bulgaria','Bulgaria','Bu&#322;garia','Bulg&aacute;ria'),
'cl'=>array('Chile','Chili','Chile','Cile','Chile','Chile'),
'cn'=>array('China, Volksrepublik','Chine','China','Cina','Chiny','K&iacute;na'),
'hr'=>array('Kroatien','Croatie','Croacia','Croazia','Chorwacja','Horv&aacute;torsz&aacute;g'),
'cw'=>array('Cura&ccedil;ao','Cura&ccedil;ao','ura&ccedil;ao','Cura&ccedil;ao','Cura&ccedil;ao','Cura&ccedil;ao'),
'cy'=>array('Zypern','Chypre (pays)','Chipre','Cipro','Cypr','Ciprus'),
'td'=>array('Tschad','Tchad','Chad','Ciad','Czad','Cs&aacute;d'),
'me'=>array('Montenegro','Mont&eacute;n&eacute;gro','Montenegro','Montenegro','Czarnog&#243;ra','Montenegr&#243;'),
'cz'=>array('Tschechische Republik','R&eacute;publique tch&egrave;que','Rep&uacute;blica Checa','Repubblica Ceca','Czechy','Csehorsz&aacute;g'),
'um'=>array('United States Minor Outlying Islands','&Icirc;les mineures &eacute;loign&eacute;es des &Eacute;tats-Unis','nited States Minor Outlying Islands','Isole minori degli Stati Uniti','Dalekie Wyspy Mniejsze Stan&#243;w Zjednoczonych','Amerikai Csendes-&#243;ce&aacute;ni szigetek'),
'dk'=>array('D&auml;nemark','Danemark','Dinamarca','Danimarca','Dania','D&aacute;nia'),
'cd'=>array('Kongo','R&eacute;p. d&eacute;m. du Congo / (R&eacute;publique d&eacute;mocratique du Congo)','Rep. Dem. del Congo','Rep. Dem. del Congo','Demokratyczna Republika Konga','Kong&#243;i Demokratikus K&ouml;zt&aacute;rsas&aacute;g (Zaire)'),
'dm'=>array('Dominica','Dominique','Dominica','Dominica','Dominika','Dominikai K&ouml;z&ouml;ss&eacute;g'),
'do'=>array('Dominikanische Republik','R&eacute;publique dominicaine','Rep&uacute;blica Dominicana','Repubblica Dominicana','Dominikana','Dominikai K&ouml;zt&aacute;rsas&aacute;g'),
'dj'=>array('Dschibuti','Djibouti','Yibuti','Gibuti','D&#380;ibuti','Dzsibuti'),
'eg'=>array('&Auml;gypten','&Eacute;gypte','Egipto','Egitto','Egipt','Egyiptom'),
'ec'=>array('Ecuador','&Eacute;quateur','Ecuador','Ecuador','Ekwador','Ecuador'),
'er'=>array('Eritrea','&Eacute;rythr&eacute;e','Eritrea','Eritrea','Erytrea','Eritrea'),
'ee'=>array('Estland','Estonie','Estonia','Estonia','Estonia','&Eacute;sztorsz&aacute;g'),
'et'=>array('&Auml;thiopien','&Eacute;thiopie','Etiop&iacute;a','Etiopia','Etiopia','Eti&#243;pia'),
'fk'=>array('Falklandinseln','&Icirc;les Malouines','Islas Malvinas','Isole Falkland','Falklandy','Falkland-szigetek'),
'fj'=>array('Fidschi','Fidji','Fiyi','Figi','Fid&#380;i','Fidzsi'),
'ph'=>array('Philippinen','Philippines','Filipinas','Filippine','Filipiny','F&uuml;l&ouml;p-szigetek'),
'fi'=>array('Finnland','Finlande','Finlandia','Finlandia','Finlandia','Finnorsz&aacute;g'),
'fr'=>array('Frankreich','France','Francia','Francia','Francja','Franciaorsz&aacute;g'),
'tf'=>array('Franz&ouml;sische S&uuml;d- und Antarktisgebiete','Terres australes et antarctiques fran&ccedil;aises','Territorios Australes Franceses','Terre Australi e Antartiche Francesi','Francuskie Terytoria Po&#322;udniowe i Antarktyczne','Francia D&eacute;li &eacute;s Antarktiszi Ter&uuml;letek'),
'ga'=>array('Gabun','Gabon','Gab&#243;n','Gabon','Gabon','Gabon'),
'gm'=>array('Gambia','Gambie','Gambia','Gambia','Gambia','Gambia'),
'gs'=>array('S&uuml;dgeorgien und die S&uuml;dlichen Sandwichinseln','G&eacute;orgie du Sud-et-les &Icirc;les Sandwich du Sud','Islas Georgias del Sur y Sandwich del Sur','Georgia del Sud e isole Sandwich','Georgia Po&#322;udniowa i Sandwich Po&#322;udniowy','D&eacute;li-Georgia &eacute;s D&eacute;li-Sandwich-szigetek'),
'gh'=>array('Ghana','Ghana','Ghana','Ghana','Ghana','Gh&aacute;na'),
'gi'=>array('Gibraltar','Gibraltar','Gibraltar','Gibilterra','Gibraltar','Gibralt&aacute;r'),
'gr'=>array('Griechenland','Gr&egrave;ce','Grecia','Grecia','Grecja','G&ouml;r&ouml;gorsz&aacute;g'),
'gd'=>array('Grenada','Grenade (pays)','Granada','Grenada','Grenada','Grenada'),
'gl'=>array('Gr&ouml;nland','Groenland','Groenlandia','Groenlandia','Grenlandia','Gr&ouml;nland'),
'ge'=>array('Georgien','G&eacute;orgie (pays)','Georgia','Georgia','Gruzja','Gr&uacute;zia'),
'gu'=>array('Guam','Guam','Guam','Guam','Guam','Guam'),
'gg'=>array('Guernsey','Guernesey','Guernsey','Guernsey','Guernsey','Guernsey'),
'gy'=>array('Guyana','Guyana','Guyana','Guyana','Gujana','Guyana'),
'gf'=>array('Franz&ouml;sisch-Guayana','Guyane','Guayana Francesa','Guyana Francese','Gujana Francuska','Francia Guyana'),
'gp'=>array('Guadeloupe','Guadeloupe','Guadalupe','Guadalupa','Gwadelupa','Guadeloupe'),
'gt'=>array('Guatemala','Guatemala','Guatemala','Guatemala','Gwatemala','Guatemala'),
'gn'=>array('Guinea','Guin&eacute;e','Guinea','Guinea','Gwinea','Guinea'),
'gw'=>array('Guinea-Bissau','Guin&eacute;e-Bissau','Guinea-Bissau','Guinea-Bissau','Gwinea Bissau','Bissau-Guinea'),
'gq'=>array('&Auml;quatorialguinea','Guin&eacute;e &eacute;quatoriale','Guinea Ecuatorial','Guinea Equatoriale','Gwinea R&#243;wnikowa','Egyenl&iacute;toi-Guinea'),
'ht'=>array('Haiti','Ha&iuml;ti','Hait&iacute;','Haiti','Haiti','Haiti'),
'es'=>array('Spanien','Espagne','pain','Spagna','Hiszpania','Spanyolorsz&aacute;g'),
'nl'=>array('Niederlande','Pays-Bas','Pa&iacute;ses Bajos','Paesi Bassi','Holandia','Hollandia'),
'hn'=>array('Honduras','Honduras','Honduras','Honduras','Honduras','Honduras'),
'hk'=>array('Hongkong','Hong Kong','Hong Kong','Hong Kong','Hongkong','Hongkong'),
'in'=>array('Indien','Inde','India','India','Indie','India'),
'id'=>array('Indonesien','Indon&eacute;sie','Indonesia','Indonesia','Indonezja','Indon&eacute;zia'),
'iq'=>array('Irak','Irak','Irak','Iraq','Irak','Irak'),
'ir'=>array('Iran','Iran','Ir&aacute;n','Iran','Iran','Ir&aacute;n'),
'ie'=>array('Irland','Irlande (pays)','Irlanda','Irlanda','Irlandia','&Iacute;rorsz&aacute;g'),
'is'=>array('Island','Islande','Islandia','Islanda','Islandia','Izland'),
'il'=>array('Israel','Isra&euml;l','Israel','Israele','Izrael','Izrael'),
'jm'=>array('Jamaika','Jama&iuml;que','Jamaica','Giamaica','Jamajka','Jamaica'),
'jp'=>array('Japan','Japon','Jap&#243;n','Giappone','Japonia','Jap&aacute;n'),
'ye'=>array('Jemen','emen','Yemen','Yemen','Jemen','Jemen'),
'je'=>array('Jersey','Jersey','Jersey','Jersey','Jersey','Jersey'),
'jo'=>array('Jordanien','Jordanie','Jordania','Giordania','Jordania','Jord&aacute;nia'),
'ky'=>array('Kaimaninseln','&Icirc;les Ca&iuml;mans','Islas Caim&aacute;n','Isole Cayman','Kajmany','Kajm&aacute;n-szigetek'),
'kh'=>array('Kambodscha','Cambodge','Camboya','Cambogia','Kambod&#380;a','Kambodzsa'),
'cm'=>array('Kamerun','Cameroun','Camer&uacute;n','Camerun','Kamerun','Kamerun'),
'ca'=>array('Kanada','Canada','Canad&aacute;','Canada','Kanada','Kanada'),
'qa'=>array('Katar','Qatar','Catar','Qatar','Katar','Katar'),
'kz'=>array('Kasachstan','Kazakhstan','Kazajist&aacute;n','Kazakistan','Kazachstan','Kazahszt&aacute;n'),
'ke'=>array('Kenia','Kenya','Kenia','Kenya','Kenia','Kenya'),
'kg'=>array('Kirgisistan','Kirghizistan','Kirguist&aacute;n','Kirghizistan','Kirgistan','Kirgiziszt&aacute;n'),
'ki'=>array('Kiribati','Kiribati','Kiribati','Kiribati','Kiribati','Kiribati'),
'co'=>array('Kolumbien','Colombie','Colombia','Colombia','Kolumbia','Kolumbia'),
'km'=>array('Komoren','Comores','Comoras','Comore','Komory','Comore-szigetek'),
'cg'=>array('Kongo','Congo-Brazzaville / (Congo)','Rep&uacute;blica del Congo','Repubblica del Congo','Kongo','Kong&#243;i K&ouml;zt&aacute;rsas&aacute;g (Kong&#243;)'),
'kr'=>array('S&uuml;dkorea','Cor&eacute;e du Sud','Corea del Sur','Corea del Sud','Korea Po&#322;udniowa','D&eacute;l-Korea (Koreai K&ouml;zt&aacute;rsas&aacute;g)'),
'kp'=>array('Nordkorea','Cor&eacute;e du Nord','Corea del Norte','Corea del Nord','Korea P&#243;&#322;nocna','&Eacute;szak-Korea (Koreai NDK)'),
'cr'=>array('Costa Rica','Costa Rica','Costa Rica','Costa Rica','Kostaryka','Costa Rica'),
'cu'=>array('Kuba','Cuba','Cuba','Cuba','Kuba','Kuba'),
'kw'=>array('Kuwait','Kowe&iuml;t','Kuwait','Kuwait','Kuwejt','Kuvait'),
'la'=>array('Laos, Demokratische Volksrepublik','Laos','ao Peoples Democratic Republic','Laos','Laos','Laosz'),
'ls'=>array('Lesotho','Lesotho','Lesoto','Lesotho','Lesotho','Lesotho'),
'lb'=>array('Libanon','Liban','L&iacute;bano','Libano','Liban','Libanon'),
'lr'=>array('Liberia','Liberia','Liberia','Liberia','Liberia','Lib&eacute;ria'),
'ly'=>array('Libyen','Libye','Libia','Libia','Libia','L&iacute;bia'),
'li'=>array('Liechtenstein','Liechtenstein','Liechtenstein','Liechtenstein','Liechtenstein','Liechtenstein'),
'lt'=>array('Litauen','Lituanie','Lituania','Lituania','Litwa','Litv&aacute;nia'),
'lu'=>array('Luxemburg','Luxembourg (pays)','Luxemburgo','Lussemburgo','Luksemburg','Luxemburg'),
'mk'=>array('Mazedonien','Mac&eacute;doine (pays)','Rep&uacute;blica de Macedonia','Macedonia','Macedonia','Maced&#243;nia'),
'mg'=>array('Madagaskar','Madagascar','Madagascar','Madagascar','Madagaskar','Madagaszk&aacute;r'),
'yt'=>array('Mayotte','Mayotte','Mayotte','Mayotte','Majotta','Mayotte'),
'mo'=>array('Macao','Macao','Macao','Macao','Makau','Maka&#243;'),
'mw'=>array('Malawi','Malawi','Malaui','Malawi','Malawi','Malawi'),
'mv'=>array('Malediven','Maldives','Maldivas','Maldive','Malediwy','Mald&iacute;v-szigetek'),
'my'=>array('Malaysia','Malaisie','Malasia','Malesia','Malezja','Malajzia'),
'ml'=>array('Mali','Mali','Mal&iacute;','Mali','Mali','Mali'),
'mt'=>array('Malta','Malte','Malta','Malta','Malta','M&aacute;lta'),
'mp'=>array('N&ouml;rdliche Marianen','&Icirc;les Mariannes du Nord','Islas Marianas del Norte','Isole Marianne Settentrionali','Mariany P&#243;&#322;nocne','&Eacute;szaki-Mariana-szigetek'),
'ma'=>array('Marokko','Maroc','Marruecos','Marocco','Maroko','Marokk&#243;'),
'mq'=>array('Martinique','Martinique','Martinica','Martinica','Martynika','Martinique'),
'mr'=>array('Mauretanien','Mauritanie','Mauritania','Mauritania','Mauretania','Maurit&aacute;nia'),
'mu'=>array('Mauritius','Maurice (pays)','Mauricio','Mauritius','Mauritius','Mauritius'),
'mx'=>array('Mexiko','Mexique','M&eacute;xico','Messico','Meksyk','Mexik&#243;'),
'fm'=>array('Mikronesien','Micron&eacute;sie (pays)','Micronesia','Micronesia','Mikronezja','Mikron&eacute;zia'),
'mc'=>array('Monaco','Monaco','M&#243;naco','Monaco','Monako','Monaco'),
'mn'=>array('Mongolei','Mongolie','Mongolia','Mongolia','Mongolia','Mong&#243;lia'),
'ms'=>array('Montserrat','Montserrat','Montserrat','Montserrat','Montserrat','Montserrat (Egyes&uuml;lt Kir&aacute;lys&aacute;g)'),
'mz'=>array('Mosambik','Mozambique','Mozambique','Mozambico','Mozambik','Mozambik'),
'md'=>array('Moldawien','Moldavie','Moldavia','Moldavia','Mo&#322;dawia','Moldova'),
'na'=>array('Namibia','Namibie','amibia','Namibia','Namibia','Nam&iacute;bia'),
'nr'=>array('Nauru','Nauru','Nauru','Nauru','Nauru','Nauru'),
'np'=>array('Nepal','N&eacute;pal','Nepal','Nepal','Nepal','Nep&aacute;l'),
'de'=>array('Deutschland','Allemagne','Alemania','Germania','Niemcy','N&eacute;metorsz&aacute;g'),
'ne'=>array('Niger','Niger','N&iacute;ger','Niger','Niger','Niger'),
'ng'=>array('Nigeria','Nigeria','igeria','Nigeria','Nigeria','Nig&eacute;ria'),
'ni'=>array('Nicaragua','Nicaragua','icaragua','Nicaragua','Nikaragua','Nicaragua'),
'nu'=>array('Niue','Niue','Niue','Niue','Niue','Niue'),
'nf'=>array('Norfolkinsel','Norfolk','Norfolk','Isola Norfolk','Norfolk','Norfolk-sziget'),
'no'=>array('Norwegen','Norv&egrave;ge','Noruega','Norvegia','Norwegia','Norv&eacute;gia'),
'nc'=>array('Neukaledonien','Nouvelle-Cal&eacute;donie','Nueva Caledonia','Nuova Caledonia','Nowa Kaledonia','&Uacute;j-Kaled&#243;nia'),
'nz'=>array('Neuseeland','Nouvelle-Z&eacute;lande','Nueva Zelanda','Nuova Zelanda','Nowa Zelandia','&Uacute;j-Z&eacute;land'),
'om'=>array('Oman','Oman','Om&aacute;n','Oman','Oman','Om&aacute;n'),
'pk'=>array('Pakistan','Pakistan','Pakist&aacute;n','Pakistan','Pakistan','Pakiszt&aacute;n'),
'pw'=>array('Palau','Palaos','Palaos','Palau','Palau','Palau'),
'ps'=>array('Pal&auml;stinensische Autonomiegebiete','Palestine','Autoridad Nacional Palestina','Autorit&agrave; Nazionale Palestinese','Palestyna','Palesztina'),
'pa'=>array('Panama','Panam&aacute;','Panam&aacute;','Panam&aacute;','Panama','Panama'),
'pg'=>array('Papua-Neuguinea','Papouasie-Nouvelle-Guin&eacute;e','Pap&uacute;a Nueva Guinea','Papua Nuova Guinea','Papua-Nowa Gwinea','P&aacute;pua &Uacute;j-Guinea'),
'py'=>array('Paraguay','Paraguay','Paraguay','Paraguay','Paragwaj','Paraguay'),
'pe'=>array('Peru','P&eacute;rou','eru','Per&ugrave;','Peru','Peru'),
'pn'=>array('Pitcairninseln','&Icirc;les Pitcairn','Islas Pitcairn','Isole Pitcairn','Pitcairn','Pitcairn-szigetek'),
'pf'=>array('Franz&ouml;sisch-Polynesien','Polyn&eacute;sie fran&ccedil;aise','Polinesia Francesa','Polinesia francese','Polinezja Francuska','Francia Polin&eacute;zia'),
'pl'=>array('Polen','Pologne','Polonia','Polonia','Polska','Lengyelorsz&aacute;g'),
'pr'=>array('Puerto Rico','Porto Rico','Puerto Rico','Porto Rico','Portoryko','Puerto Rico'),
'pt'=>array('Portugal','Portugal','Portugal','Portogallo','Portugalia','Portug&aacute;lia'),
'za'=>array('S&uuml;dafrika','Afrique du Sud','Sud&aacute;frica','Sudafrica','Republika Po&#322;udniowej Afryki','D&eacute;l-afrikai K&ouml;zt&aacute;rsas&aacute;g'),
'cv'=>array('Kap Verde','Cap-Vert','Cabo Verde','Capo Verde','Republika Zielonego Przyl&#261;dka','Z&ouml;ld-foki K&ouml;zt&aacute;rsas&aacute;g'),
'cf'=>array('Zentralafrikanische Republik','R&eacute;publique centrafricaine','Rep&uacute;blica Centroafricana','Repubblica Centrafricana','Republika &#346;rodkowoafryka&#324;ska','K&ouml;z&eacute;p-Afrika'),
're'=>array('R&eacute;union','La R&eacute;union','Reuni&#243;n','Riunione','Reunion','R&eacute;union R&eacute;union'),
'ru'=>array('Russische F&ouml;deration','Russie','Rusia','Russia','Rosja','Oroszorsz&aacute;g'),
'ro'=>array('Rum&auml;nien','Roumanie','Rumania','Romania','Rumunia','Rom&aacute;nia'),
'rw'=>array('Ruanda','Rwanda','Ruanda','Ruanda','Rwanda','Ruanda'),
'eh'=>array('Westsahara','ahara occidental','Rep&uacute;blica &Aacute;rabe Saharaui Democr&aacute;tica','Sahara Occidentale','Sahara Zachodnia','Nyugat-Szahara'),
'kn'=>array('St. Kitts und Nevis','Saint-Christophe-et-Ni&eacute;v&egrave;s','San Crist&#243;bal y Nieves','Saint Kitts e Nevis','Saint Kitts i Nevis','Saint Kitts &eacute;s Nevis'),
'lc'=>array('St. Lucia','Sainte-Lucie','Santa Luc&iacute;a','Santa Lucia','Saint Lucia','Saint Lucia'),
'vc'=>array('St. Vincent und die Grenadinen','Saint-Vincent-et-les-Grenadines','San Vicente y las Granadinas','Saint Vincent e Grenadine','Saint Vincent i Grenadyny','Saint Vincent &eacute;s a Grenadine-szigetek'),
'bl'=>array('Saint-Barth&eacute;lemy','Saint-Barth&eacute;lemy','San Bartolom&eacute;','Saint-Barth&eacute;lemy','Saint-Barth&eacute;lemy','Saint Barth&eacute;lemy'),
'mf'=>array('Saint-Martin','Saint-Martin (Antilles fran&ccedil;aises)','San Mart&iacute;n','Saint-Martin','Saint-Martin','Saint Martin'),
'pm'=>array('Saint-Pierre und Miquelon','Saint-Pierre-et-Miquelon','San Pedro y Miquel&#243;n','Saint-Pierre e Miquelon','Saint-Pierre i Miquelon','Saint-Pierre &eacute;s Miquelon'),
'sv'=>array('El Salvador','Salvador','El Salvador','El Salvador','Salwador','El Salvador'),
'ws'=>array('Samoa','Samoa','Samoa','Samoa','Samoa','Szamoa'),
'as'=>array('Amerikanisch-Samoa','Samoa am&eacute;ricaines','merican Samoa','Samoa americane','Samoa Ameryka&#324;skie','Amerikai Szamoa'),
'sm'=>array('San Marino','Saint-Marin','San Marino','San Marino','San Marino','San Marino'),
'sn'=>array('Senegal','S&eacute;n&eacute;gal','Senegal','Senegal','Senegal','Szeneg&aacute;l'),
'rs'=>array('Serbien','Serbie','Serbia','Serbia','Serbia','Szerbia'),
'sc'=>array('Seychellen','Seychelles','Seychelles','Seychelles','Seszele','Seychelle-szigetek'),
'sl'=>array('Sierra Leone','Sierra Leone','Sierra Leona','Sierra Leone','Sierra Leone','Sierra Leone'),
'sg'=>array('Singapur','Singapour','Singapur','Singapore','Singapur','Szingap&uacute;r'),
'sx'=>array('Sint Maarten','Saint-Martin','int Maarten','int Maarten','Sint Maarten','Sint Maarten'),
'so'=>array('Somalia','Somalie','Somalia','Somalia','Somalia','Szom&aacute;lia'),
'lk'=>array('Sri Lanka','Sri Lanka','Sri Lanka','Sri Lanka','Sri Lanka','Sr&iacute; Lanka'),
'us'=>array('Vereinigte Staaten von Amerika','&Eacute;tats-Unis','ri Lanka','Stati Uniti dAmerica','Stany Zjednoczone','Amerikai Egyes&uuml;lt &Aacute;llamok'),
'sz'=>array('Swasiland','Swaziland','Suazilandia','Swaziland','Suazi','Szv&aacute;zif&ouml;ld'),
'sd'=>array('Sudan','Soudan','Sud&aacute;n','Sudan','Sudan','Szud&aacute;n'),
'sr'=>array('Suriname','Suriname','Surinam','Suriname','Surinam','Suriname'),
'sj'=>array('Svalbard und Jan Mayen','Svalbard et &icirc;le Jan Mayen','Svalbard y Jan Mayen','Svalbard e Jan Mayen','Svalbard i Jan Mayen','Svalbard (Spitzberg&aacute;k) &eacute;s Jan Mayen'),
'sy'=>array('Syrien, Arabische Republik','Syrie','Siria','Siria','Syria','Sz&iacute;ria'),
'ch'=>array('Schweiz','Suisse','Suiza','Svizzera','Szwajcaria','Sv&aacute;jc'),
'se'=>array('Schweden','Su&egrave;de','Suecia','Svezia','Szwecja','Sv&eacute;dorsz&aacute;g'),
'sk'=>array('Slowakei','Slovaquie','Eslovaquia','Slovacchia','S&#322;owacja','Szlov&aacute;kia'),
'si'=>array('Slowenien','Slov&eacute;nie','Eslovenia','Slovenia','S&#322;owenia','Szlov&eacute;nia'),
'tj'=>array('Tadschikistan','Tadjikistan','Tayikist&aacute;n','Tagikistan','Tad&#380;ykistan','T&aacute;dzsikiszt&aacute;n'),
'th'=>array('Thailand','Tha&iuml;lande','Tailandia','Thailandia','Tajlandia','Thaif&ouml;ld'),
'tw'=>array('Taiwan','Ta&iuml;wan / (R&eacute;publique de Chine (Ta&iuml;wan))','Taiw&aacute;n','Taiwan','Tajwan','Tajvan'),
'tz'=>array('Tansania, Vereinigte Republik','Tanzanie','Tanzania','Tanzania','Tanzania','Tanz&aacute;nia'),
'tl'=>array('Westtimor','Timor oriental','Timor Oriental','Timor Est','Timor Wschodni','Kelet-Timor'),
'tg'=>array('Togo','Togo','Togo','Togo','Togo','Togo'),
'tk'=>array('Tokelau','Tokelau','Tokelau','Tokelau','Tokelau','Tokelau-szigetek'),
'to'=>array('Tonga','Tonga','onga','Tonga','Tonga','Tonga'),
'tt'=>array('Trinidad und Tobago','Trinit&eacute;-et-Tobago','Trinidad y Tobago','Trinidad e Tobago','Trynidad i Tobago','Trinidad &eacute;s Tobago'),
'tn'=>array('Tunesien','Tunisie','T&uacute;nez','Tunisia','Tunezja','Tun&eacute;zia'),
'tr'=>array('T&uuml;rkei','Turquie','Turqu&iacute;a','Turchia','Turcja','T&ouml;r&ouml;korsz&aacute;g'),
'tm'=>array('Turkmenistan','Turkm&eacute;nistan','Turkmenist&aacute;n','Turkmenistan','Turkmenistan','T&uuml;rkmeniszt&aacute;n'),
'tc'=>array('Turks- und Caicosinseln','&Icirc;les Turques-et-Ca&iuml;ques','Islas Turcas y Caicos','Turks e Caicos','Turks i Caicos','Turks- &eacute;s Caicos-szigetek'),
'tv'=>array('Tuvalu','Tuvalu','Tuvalu','Tuvalu','Tuvalu','Tuvalu'),
'ug'=>array('Uganda','Ouganda','Uganda','Uganda','Uganda','Uganda'),
'ua'=>array('Ukraine','Ukraine','kraine','Ucraina','Ukraina','Ukrajna'),
'uy'=>array('Uruguay','Uruguay','Uruguay','Uruguay','Urugwaj','Uruguay'),
'uz'=>array('Usbekistan','Ouzb&eacute;kistan','Uzbekist&aacute;n','Uzbekistan','Uzbekistan','&Uuml;zbegiszt&aacute;n'),
'vu'=>array('Vanuatu','Vanuatu','Vanuatu','Vanuatu','Vanuatu','Vanuatu'),
'wf'=>array('Wallis und Futuna','Wallis et Futuna','Wallis y Futuna','Wallis e Futuna','Wallis i Futuna','Wallis &eacute;s Futuna'),
'va'=>array('Vatikanstadt','Saint-Si&egrave;ge (&Eacute;tat de la Cit&eacute; du Vatican)','Ciudad del Vaticano','Citt&agrave; del Vaticano','Watykan','Vatik&aacute;n'),
've'=>array('Venezuela','enezuela','Venezuela','Venezuela','Wenezuela','Venezuela'),
'gb'=>array('Gro&szlig;britannien','Royaume-Uni','Reino Unido','Regno Unito','Wielka Brytania','Egyes&uuml;lt Kir&aacute;lys&aacute;g'),
'vn'=>array('Vietnam','iet Nam','Vietnam','Vietnam','Wietnam','Vietnam'),
'ci'=>array('Elfenbeink&uuml;ste','C&ocirc;te dIvoire','Costa de Marfil','Costa dAvorio','Wybrze&#380;e Ko&#347;ci S&#322;oniowej','Elef&aacute;ntcsontpart'),
'bv'=>array('Bouvetinsel','&Icirc;le Bouvet','Isla Bouvet','Isola Bouvet','Wyspa Bouveta','Bouvet-sziget'),
'cx'=>array('Weihnachtsinsel','&Icirc;le Christmas','Isla de Navidad','Isola di Natale','Wyspa Bo&#380;ego Narodzenia','Kar&aacute;csony-sziget'),
'im'=>array('Insel Man','&Icirc;le de Man','Isla de Man','Isola di Man','Wyspa Man','Isle of Man'),
'sh'=>array('St. Helena','Sainte-H&eacute;l&egrave;ne, Ascension et Tristan da Cunha','Santa Helena, A. y T.','SantElena','Wyspa &#346;wi&#281;tej Heleny, Wyspa Wniebowst&#261;pienia i Tristan da Cunha','Szent Ilona'),
'ax'=>array('&Aring;land','&Aring;land','&Aring;land','sole &Aring;land','Wyspy Alandzkie','&Aring;land'),
'ck'=>array('Cookinseln','&Icirc;les Cook','Islas Cook','Isole Cook','Wyspy Cooka','Cook-szigetek'),
'vi'=>array('Amerikanische Jungferninseln','&Icirc;les Vierges des &Eacute;tats-Unis','Islas V&iacute;rgenes de los Estados Unidos','Isole Vergini americane','Wyspy Dziewicze Stan&#243;w Zjednoczonych','Amerikai Virgin-szigetek'),
'hm'=>array('Heard und McDonaldinseln','&Icirc;les Heard-et-MacDonald','Islas Heard y McDonald','Isole Heard e McDonald','Wyspy Heard i McDonalda','Heard-sziget &eacute;s McDonald-szigetek'),
'cc'=>array('Kokosinseln','&Icirc;les Cocos','Islas Cocos','Isole Cocos e Keeling','Wyspy Kokosowe','K&#243;kusz (Keeling)-szigetek'),
'mh'=>array('Marshallinseln','Marshall (pays)','Islas Marshall','Isole Marshall','Wyspy Marshalla','Marshall-szigetek'),
'fo'=>array('F&auml;r&ouml;er','&Icirc;les F&eacute;ro&eacute;','Islas Feroe','Isole F&aelig;r &Oslash;er','Wyspy Owcze','Fer&ouml;er'),
'sb'=>array('Salomonen','Salomon','Islas Salom&#243;n','Isole Salomone','Wyspy Salomona','Salamon-szigetek'),
'st'=>array('S&atilde;o Tom&eacute; und Pr&iacute;ncipe','Sao Tom&eacute;-et-Principe','ao Tome and Principe','S&atilde;o Tom&eacute; e Pr&iacute;ncipe','Wyspy &#346;wi&#281;tego Tomasza i Ksi&#261;&#380;&#281;ca','S&atilde;o Tom&eacute; &eacute;s Pr&iacute;ncipe'),
'hu'=>array('Ungarn','Hongrie','Hungr&iacute;a','Ungheria','W&#281;gry','Magyarorsz&aacute;g'),
'it'=>array('Italien','Italie','Italia','Italia','W&#322;ochy','Olaszorsz&aacute;g'),
'zm'=>array('Sambia','ambia','Zambia','Zambia','Zambia','Zambia'),
'zw'=>array('Simbabwe','imbabwe','Zimbabue','Zimbabwe','Zimbabwe','Zimbabwe'),
'ae'=>array('Vereinigte Arabische Emirate','&Eacute;mirats arabes unis','Emiratos &Aacute;rabes Unidos','Emirati Arabi Uniti','Zjednoczone Emiraty Arabskie','Egyes&uuml;lt Arab Em&iacute;rs&eacute;gek'),
'lv'=>array('Lettland','Lettonie','Letonia','Lettonia','&#321;otwa','Lettorsz&aacute;g'),






);




if(!isset($state_name[$term_in][$opt_language_index]))
      {$term_out=$term_in;}
    else
      {$term_out=trim($state_name[$term_in][$opt_language_index]);}
    return $term_out;
}

function GG_funx_translate_text_0_prepare_string($term_in)
{  
    $trans_array_in=array(
        'changing to',
        'then becoming',
        'then, ',
        'will taper to',
        //'will taper off',
        'tapering to',
        'along with',
        ' with ',
        'becoming',
        'developing to',
        'developing',
        'transitioning to',
        'evolving to a',
        'will evolve into',
        'will give way to',
        'giving way to',
        'will become',
        'followed by',
        'followed',
        ',,',
        ',,',
        ', ,',
    );
    $trans_array_out=array(
        ',',
        'then ', //then becoming
        ',', //then 
        ',', // will taper to
        //',', //will taper off
        ',',//tapering to
        ',',//along with
        ',', // with
        ' ', //becoming
        ',',  //developing to
        ' ',  //developing
        ',',  //transitioning to
        ',', //evolving to a
        ',', //will evolve into
        ',',  //will give way to
        ',',  //giving way to
        ',',  // will become
        ',',  //followed by
        ',',  //followed
        ',',  //,,
        ',',  //,,
        ',',  //, ,
      );
    $term_out= str_replace($trans_array_in,$trans_array_out,$term_in);
    //echo "FUNC0 ".$term_out."<br />";
    return $term_out;    
}
 

 function GG_funx_translate_text_1_translate($term_in)
 {
          $term_out ="";
          $strto_translate_spread = explode(',',$term_in);
          for($i = 0;$i < count($strto_translate_spread);$i++){
          $strto_translate_flag[1][$i]="";
          $strto_translate_flag[2][$i]="";
          
          list($strto_translate_spread[$i],$strto_translate_flag[1][$i])= GG_funx_translate_text_2_analyse_daystrings($strto_translate_spread[$i],"Day");
          list($strto_translate_spread[$i],$strto_translate_flag[2][$i])= GG_funx_translate_text_2_analyse_daystrings($strto_translate_spread[$i],"Late");
          $strto_translate_spread_save=$strto_translate_spread[$i];
          $strto_translate_spread[$i] = str_replace(' ','',strtolower(trim($strto_translate_spread[$i])));
          
        } 
        for($i = 0;$i < count($strto_translate_spread);$i++){
        list($stris_translate_spread[$i],$flag_translated)=GG_funx_translate_text_5_translate_phrases($strto_translate_spread[$i]);
          {
            list($str_daytime_general,$flag_after)= GG_funx_translate_text_4_set_daystrings($strto_translate_flag[1][$i],$strto_translate_flag[2][$i]);
            if($str_daytime_general!=""){
              if($flag_after==0 ){
                  $stris_translate_spread[$i]=$str_daytime_general." ".$stris_translate_spread[$i];}
              else{
              $stris_translate_spread[$i]=$stris_translate_spread[$i]." ".$str_daytime_general;} 
            }
          }
          if($stris_translate_spread[$i]<>" "){
          $term_out = $term_out." ".$stris_translate_spread[$i];
          if($i<(count($strto_translate_spread)-1)){$term_out=$term_out." -";}
          if($flag_translated==0){
          //$term_out="_NO_TRANSLATION_".$term_out;IF NO TRANSLATION - original text is shown
          $term_out=$strto_translate_spread_save;
          }}
         }
         return array($term_out,$flag_translated);
 }
         
 function GG_funx_translate_text_2_analyse_daystrings($term_in,$art)
{  
    $term_in= str_replace('  ',' ',$term_in);
    $term_flag ="";
    if($art=="Day"){
      $trans_array_in=array('in the day','during the day','by late day', 'late day','through the day', 'throughout the day');
      $trans_array_out=array('','','','','','');
      $term_out= str_replace($trans_array_in,$trans_array_out,$term_in);
      if($term_out!=$term_in){$term_flag="D";$term_in=$term_out;}
      $art="Night";
    }
    if($art=="Night"){
      //echo $term_in;
      $trans_array_in=array('in the night','at night','after midnight','during the night','through the night','the night', 'at night', 'overnight','Night','late night',  'throughout the night');
      $trans_array_out=array('','','','','','','','','','','');
      $term_out= str_replace($trans_array_in,$trans_array_out,$term_in);
      if($term_out!=$term_in and $term_flag==""){$term_flag="N";}
      $term_in=$term_out;
      $art="Evening";
    } 
    if($art=="Evening"){

      $trans_array_in=array('for the evening hours','in the evening hours','during the evening hours','the evening hours','for the evening','in the evening', 'during the evening', 'through the evening','the evening','this evening','evening','until midnight','till midnight','before midnight','by midnight','Evening');
      $trans_array_out=array('','','','','','','','','','','','','','','','');
      $term_out= str_replace($trans_array_in,$trans_array_out,$term_in);
      if($term_out!=$term_in and $term_flag==""){$term_flag="E";}
      $term_in=$term_out;
      $art="Afternoon";
    }
     if($art=="Afternoon"){
      $trans_array_in=array('for the afternoon hours','in the afternoon hours','during the afternoon hours','the afternoon hours','for the afternoon','in the afternoon', 'during the afternoon', 'through the afternoon','the afternoon', 'this afternoon','afternoon','after noon','Afternoon');
      $trans_array_out=array('','','','','','','','','','','','','');
      $term_out= str_replace($trans_array_in,$trans_array_out,$term_in);
      if($term_out!=$term_in and $term_flag==""){$term_flag="A";}
      $term_in=$term_out;
      $art="Morning";
    } 
    if($art=="Morning"){
      $trans_array_in=array('for the morning hours','in the morning hours', 'during the morning hours','the morning hours','for the morning','in the morning', 'during the morning', 'through the morning','the morning', 'this morning','morning','until noon','till noon','before noon','Morning', 'by noontime');
      $trans_array_out=array('','','','','','','','','','','','','','','','');
      $term_out= str_replace($trans_array_in,$trans_array_out,$term_in);
      if($term_out!=$term_in and $term_flag==""){$term_flag="M";}

    }
    if($art=="Late"){
      $trans_array_in=array('later on', ' later','later', ' late','late ');
      $trans_array_out=array('','','','','');
      $term_out= str_replace($trans_array_in,$trans_array_out,$term_in);
      if($term_out!=$term_in){$term_flag="LA";$term_in=$term_out;}
      $art="Early";
      
    }
    if($art=="Early"){
      //echo "STOP1";
      $trans_array_in=array(' early', 'early ');
      $trans_array_out=array('','');
      $term_out= str_replace($trans_array_in,$trans_array_out,$term_in);
      if($term_out!=$term_in  and $term_flag==""){$term_flag="EA";} 
       // echo "STOP2";}

    }
     return array($term_out,$term_flag);
 }
 function GG_funx_translate_text_4_set_daystrings($term_in_1,$term_in_2)
{  
    //echo "1".$term_in_1."2".$term_in_2;
    $flag_after = 1;
    $term_out="";
    $rand=0;
    if($term_in_1=="M"){
      $morning=array( 'morgens', 'morgens','vormittags','am Morgen',  'am Vormittag', 'w&auml;hrend des Morgens', 'w&auml;hrend des Vormittags', 'in den Morgenstunden');
      $rand=rand(0,count($morning)-1);
      $term_out=$morning[$rand];
    } 
    if($term_in_1=="A"){
      $afternoon=array('nachmittags', 'nachmittags', 'am Nachmittag',  'nach dem Mittag', 'in den Nachmittagsstunden', 'w&auml;hrend des Nachmittags',);
      $rand=rand(0,count($afternoon)-1);
      $term_out=$afternoon[$rand];
    }
    if($term_in_1=="E"){
      $evening=array('abends','abends', 'am Abend', 'in den Abendstunden','w&auml;hrend der Abendstunden','bis Mitternacht');
      $rand=rand(0,count($evening)-1);
      $term_out=$evening[$rand];
    }
    if($term_in_1=="N"){
      $night=array('nachts','nachts', '&uuml;ber Nacht', 'nach Mitternacht','in den Nachtstunden','in der Nacht');
      $rand=rand(0,count($night)-1);
      $term_out=$night[$rand];
    }
    if($term_in_1=="D"){
      $day=array('tags&uuml;ber', 'w&auml;hrend des Tages');
      $rand=rand(0,count($day)-1);
      $term_out=$day[$rand];
    }  
    if($term_in_2=="EA"){
    //echo "STOP3";
    $rand=rand(0,2);
    if ($rand==2){$term_out=$term_out." zun&auml;chst";$flag_after=1;}
    else {$term_out="zun&auml;chst ".$term_out;}
    }
    if($term_in_2=="LA"){
    $rand=rand(0,2);
    if ($rand==2){$term_out=$term_out." sp&auml;ter";$flag_after=0;}
    else {$term_out="sp&auml;ter ".$term_out;}
    }
    if($flag_after!=0){
      $rand=rand(0,2);
      if($rand<2){$flag_after=0;} 
    }
    return array($term_out,$flag_after);  
}

     

 
    

    
function GG_funx_translate_text_5_translate_phrases($term_in)
{

 //echo "ToTranslate:".$term_in.":ToTranslate"; 
  
  $text_long=array(
  //Insert array Start here:
  
//Delete me
'abetterchanceofshowers'=>array('M&ouml;glichkeit von Schauern','','','',''),
'abundantsunshine'=>array('viel Sonnenschein','','','',''),
'achanceoflingeringsnowshowers'=>array('M&ouml;glichkeit von verbleibenden Schneewolken','','','',''),
'achanceofshowers'=>array('M&ouml;glichkeit von Schauern','','','',''),
'achanceofthunderstorms'=>array('M&ouml;glichkeit von Gewittern','','','',''),
'adrenchingrain'=>array('durchn&auml;ssender Regen','','','',''),
'afewclouds'=>array('locker bew&ouml;lkt','','','',''),
'afewcloudsfromtimetotime'=>array('ab und an Wolken','','','',''),
'afewisolatedthunderstorms'=>array('ein paar einzelne Gewitter','','','',''),
'afewisolatedthunderstormsdeveloping'=>array('Entwicklung von wenigen einzelnen Gewittern','','','',''),
'afewisolatedthunderstormsdevelopingunderpartlycloudyskies'=>array('Entwicklung von wenigen einzelnen Gewittern bei einem bew&ouml;lkten Himmel','','','',''),
'afewisolatedthunderstormsunderpartlycloudyskies'=>array('ein paar einzelne Gewitter bei einem teilweise bew&ouml;lkten Himmel','','','',''),
'afewlingeringshowers'=>array('einige wenige verbleibende Schauer','','','',''),
'afewmaybesevere'=>array('einige k&ouml;nnen heftig sein','','','',''),
'afewpassingclouds'=>array('wenige vorbeiziehende Wolken','','','',''),
'afewpeeksofsunshinepossible'=>array('wenige Augenblicke von Sonne m&ouml;glich','','','',''),
'afewrainshowers'=>array('einige wenige Regenschauer','','','',''),
'afewrainshowersmixing'=>array('einige wenige Regenschauer','','','',''),
'afewrumblesofthunder'=>array('ab und an Donnergrollen','','','',''),
'afewrumblesofthunderpossible'=>array('ab und an Donnergrollen','','','',''),
'afewscatteredshowers'=>array('ab und an strichweise Gewitter','','','',''),
'afewscatteredshowerspossible'=>array('ab und an strichweise Gewitter m&ouml;glich','','','',''),
'afewshowers'=>array('wenige Schauer','','','',''),
'afewshowersasteadyrain'=>array('wenige Schauer / steter Regen','','','',''),
'afewshowersby'=>array('wenige Schauer','','','',''),
'afewshowersdeveloping'=>array('Bildung von ein paar Schauern','','','',''),
'afewshowersfromtimetotime'=>array('ab und an Schauer','','','',''),
'afewshowerspossible'=>array('ein paar Schauer m&ouml;glich','','','',''),
'afewshowersstillpossible'=>array('ein paar weiterhin Schauer m&ouml;glich','','','',''),
'afewshowersthenchangingtosnowshowers'=>array('ein paar Schauer, dann &uuml;bergang zu Schneeschauern','','','',''),
'afewshowersthenclearingandwindy'=>array('ein paar Schauer, dann Aufkl&auml;rung und windig','','','',''),
'afewshowersthenpartlycloudy'=>array('ein paar Schauer, dann teilweise bew&ouml;lkt','','','',''),
'afewshowersthenscatteredstrongthunderstorms'=>array('ein paar Schauer, dann strichweise starke Gewitter','','','',''),
'afewshowersthenthundershowers'=>array('ein paar Schauer, dann Gewitter','','','',''),
'afewsnowshowers'=>array('wenige Schneeschauer','','','',''),
'afewsnowshowersaround'=>array('ein paar Schneschauer','','','',''),
'afewsnowshowersdeveloping'=>array('Bildung einiger weniger Schneeschauer','','','',''),
'afewsnowshowerslikelychangingtorainshowersasthedayprogresses'=>array('einiger wenige Schneeschauer, die wahrscheinlich in Regenschauer &uuml;bergehen','','','',''),
'afewsnowshowerspossible'=>array('ein paar Schneeschauer m&ouml;glich','','','',''),
'afewsnowshowersscatteredaboutthearea'=>array('verbreitet ein paar Schneeschauer m&ouml;glich','','','',''),
'afewstormsmaybesevere'=>array('einige k&ouml;nnen heftig sein','','','',''),
'afewthundershowers'=>array('etwas Gewitterregen','','','',''),
'afewthunderstorms'=>array('einige wenige Gewitter','','','',''),
'afewthunderstormslikely'=>array('ein paar Gewitter wahrscheinlich','','','',''),
'afewthunderstormspossible'=>array('ein paar Gewitter sind m&ouml;glich','','','',''),
'afewthunderstormswilltapertoscatteredshowers'=>array('einzelne Gewitter schw&auml;chen sich zu strichweise Schauern ab','','','',''),
'agooddealofsunshine'=>array('sch&ouml;nes Sonnenwetter','','','',''),
'aheavy'=>array('&nbsp;','','','',''),
'alingeringthunderstormispossible'=>array('verweilende Gewitter m&ouml;glich','','','',''),
'allsnow'=>array('Schnee','','','',''),
'along'=>array('&nbsp;','','','',''),
'amainlysunnysky'=>array('&uuml;berwiegend sonniger Himmel','','','',''),
'amixofcloudsandsun'=>array('ein Mix von Wolken und Sonne','','','',''),
'amixofcloudsandsunthencloudy'=>array('Mix von Sonne und Wolken, dann bew&ouml;lkt','','','',''),
'amixoflightrainandsnow'=>array('Mix aus leichtem Regen und Schnee','','','',''),
'amixofrainandsnow'=>array('Mix aus Regen und Schnee','','','',''),
'amixofrainandsnowshowers'=>array('Mix aus Regen- und Schneeschauern','','','',''),
'amixofsunandclouds'=>array('Mix aus Sonne und Wolken','','','',''),
'amixofsunandcloudsby'=>array('Mix aus Sonne und Wolken','','','',''),
'amixtureoflightrainandsnow'=>array('Mix aus leichtem Regen und Schnee','','','',''),
'amixtureofrainandsnow'=>array('Mix aus Regen und Schnee','','','',''),
'amixtureofrainandsnowshowers'=>array('Mix aus Regen- und Schneeschauern','','','',''),
'amoresteadyrain'=>array('zunehmend andauernder Regen','','','',''),
'amostlyclearsky'=>array('meistens klarer Himmel','','','',''),
'amplesunshine'=>array('reichlich Sonne','','','',''),
'amplesunshineby'=>array('reichlich Sonne','','','',''),
'andathunderstormispossible'=>array('einzelnes Gewitter m&ouml;glich','','','',''),
'andathunderstormortwoon'=>array('einzelnes Gewitter m&ouml;glich','','','',''),
'andchangingtolightsnow'=>array('leichter Schneefall','','','',''),
'andmainlycloudy'=>array('haupts&auml;chlich bew&ouml;lkt','','','',''),
'andperhapsarumbleortwoofthunder'=>array('vielleicht ab und an Donnergrollen','','','',''),
'andpossiblyatornado'=>array('m&ouml;glicherweise Wirbelst&uuml;rme','','','',''),
'anicymixlikely'=>array('Eisregen wahrscheinlich','','','',''),
'anisolatedthunderstormisstillpossible'=>array('einzelnes Gewitter weiterhin m&ouml;glich','','','',''),
'anisolatedthunderstormpossible'=>array('einzelnes Gewitter m&ouml;glich','','','',''),
'anyflurriesorsnowshowersending'=>array('Abklingen von Schneegest&ouml;ber und Schneeschauer','','','',''),
'aperiodofdrizzle'=>array('abschnittsweise Nieselregen','','','',''),
'aperiodofheavyrain'=>array('abschnittsweise kr&auml;ftiger Regen','','','',''),
'aperiodofheavysnow'=>array('abschnittsweise starker Schneefall','','','',''),
'aperiodoflightrain'=>array('abschnittsweise leichter Regen','','','',''),
'aperiodoflightsnow'=>array('abschnittsweise leichter Schneefall','','','',''),
'aperiodofrain'=>array('abschnittsweise Regen','','','',''),
'aperiodofsnow'=>array('abschnittsweise Schneefall','','','',''),
'apossiblerumbleofthunder'=>array('Donner m&ouml;glich','','','',''),
'apossiblethunderstorm'=>array('einzelnes Gewitter m&ouml;glich','','','',''),
'areasofblowingdust'=>array('Staub','','','',''),
'areasofdensefog'=>array('&ouml;rtlich dichter Nebel','','','',''),
'areasoffog'=>array('&ouml;rtlich Nebel','','','',''),
'areasofpatchyfog'=>array('&ouml;rtlich Nebelfelder','','','',''),
'arumbleofthunderispossible'=>array('Donner m&ouml;glich','','','',''),
'arumbleofthunderstillpossible'=>array('Donner m&ouml;glich','','','',''),
'arumbleortwoofthunder'=>array('Donner','','','',''),
'arumbleortwoofthunderispossible'=>array('Donner m&ouml;glich','','','',''),
'ashowerispossible'=>array('Schauer m&ouml;glich','','','',''),
'ashowerortwoaroundthearea'=>array('&ouml;rtlich ein oder zwei Schauer','','','',''),
'ashowerortwo-otherwise'=>array('ein oder zwei Schauer','','','',''),
'ashowerortwopossible'=>array('ein oder zwei Schauer','','','',''),
'aslightchanceofshowersandthunderstorms'=>array('kleine M&ouml;glichkeit f&uuml;r Schauer und Gewitter','','','',''),
'aslightchanceofthunderstorms'=>array('Gewitter vielleicht m&ouml;glich','','','',''),
'aslightriskofathunderstorm'=>array('Gewitter vielleicht m&ouml;glich','','','',''),
'asnowshowerortwo-otherwise'=>array('Wenige Schneeschauer','','','',''),
'asteadierrain'=>array('zunehmender Regen','','','',''),
'asteadierrainarriving'=>array('zunehmender Regen','','','',''),
'asteadierrain-arumbleofthunderstillpossible'=>array('zunehmender Regen','','','',''),
'asteadiersnow'=>array('zunehmender Schneefall','','','',''),
'asteadiersnowdeveloping'=>array('Bildung von stetigem Schneefall','','','',''),
'asteady'=>array('&nbsp;','','','',''),
'asteadyaccumulatingsnow'=>array('stetig zunehmender Schneefall','','','',''),
'asteadylightrain'=>array('leichter Dauerregen','','','',''),
'asteadylightrainduring'=>array('leichter Dauerregen','','','',''),
'asteadylightsnow'=>array('stetiger leichter Schneefall','','','',''),
'asteadyrain'=>array('Dauerregen','','','',''),
'asteadyrainarriving'=>array('Dauerregen','','','',''),
'asteadyrainduring'=>array('Dauerregen','','','',''),
'asteadysnow'=>array('stetiger Schneefall','','','',''),
'astrayshowerorthunderstormispossible'=>array('ein vereinzelter Schauer oder ein Gewitter m&ouml;glich','','','',''),
'astraythunderstorm'=>array('einzelnes Gewitter','','','',''),
'astraythunderstormispossible'=>array('einzelnes Gewitter m&ouml;glich','','','',''),
'athundershowerispossibleaswell'=>array('ein Gewitter ist ebenfalls m&ouml;glich','','','',''),
'athundershowerpossiblethenvariableclouds'=>array('vielleicht ein Gewitter, dann unterschiedlich bew&ouml;lkt','','','',''),
'athunderstormortwo'=>array('ein oder zwei Gewitter','','','',''),
'athunderstormortwoaswell'=>array('ein oder zwei Gewitter','','','',''),
'athunderstormortwoispossible'=>array('ein oder zwei Gewitter m&ouml;glich','','','',''),
'athunderstormortwopossible'=>array('ein oder zwei Gewitter m&ouml;glich','','','',''),
'athunderstormpossible'=>array('Gewitter m&ouml;glich','','','',''),
'attimesheavy'=>array('teilweise kr&auml;ftig','','','',''),
'awidelyscatteredshowerorthunderstormispossible'=>array('&auml;usserst strichweise Schauer oder Gewitter m&ouml;glich','','','',''),
'awinddrivenheavyrain'=>array('starker Regen und Wind','','','',''),
'bitterlycold'=>array('bitterkalt','','','',''),
'blustery'=>array('st&uuml;rmisch','','','',''),
'breaksintheovercast'=>array('kleine Auflockerungen der geschlossenen Wolkendecke','','','',''),
'breaksofsun'=>array('gelegentlich Sonnenstrahlen','','','',''),
'brightsunshine'=>array('viel Sonne','','','',''),
'brightsunshineby'=>array('viel Sonne','','','',''),
'chanceofafewshowers'=>array('M&ouml;glichkeit von ein paar Schauern','','','',''),
'chanceofafewsnowshowers'=>array('Schneeschauer m&ouml;glich','','','',''),
'chanceofanisolatedthunderstorm'=>array('einzelnes Gewitter m&ouml;glich','','','',''),
'chanceofashowerortwo'=>array('m&ouml;glicherweise ein oder zwei Schauer','','','',''),
'chanceofathunderstorm'=>array('Gewitter m&ouml;glich','','','',''),
'chanceofdayshowers'=>array('M&ouml;glichkeit von Schauern','','','',''),
'chanceofrainandsnowshowers'=>array('m&ouml;gliche Regen- oder Schneeschauer','','','',''),
'chanceofshowers'=>array('Schauer m&ouml;glich','','','',''),
'chanceofsnowshowers'=>array('Schneeschauer m&ouml;glich','','','',''),
'changingtolightsnow'=>array('in leichten Schneefall wechselnd','','','',''),
'clear'=>array('klar','','','',''),
'clearandwindy'=>array('klar und windig','','','',''),
'clearing'=>array('Aufkl&auml;rung','','','',''),
'clearingandwindy'=>array('windig, Aufkl&auml;rung','','','',''),
'clearingskies'=>array('aufkl&auml;render Himmel','','','',''),
'clearingskiesaftersomelightrain'=>array('aufkl&auml;render Himmel nach leichtem Regen','','','',''),
'clearingskiesaftersomerain'=>array('aufkl&auml;render Himmel nach etwas Regen','','','',''),
'clearskies'=>array('klarer Himmel','','','',''),
'clearskiesby'=>array('klarer Himmel','','','',''),
'clearskiesthencloudy'=>array('klarer Himmel, dann bew&ouml;lkt','','','',''),
'clearskiesthenincreasingclouds'=>array('klarer Himmel','','','',''),
'clearskiesthenmostlycloudy'=>array('klarer Himmel, dann meist bew&ouml;lkt','','','',''),
'clearthencloudy'=>array('klar, dann wolkig','','','',''),
'clearthenincreasingcloudiness'=>array('klar, zunehmende Bew&ouml;lkung','','','',''),
'clearthenincreasingclouds'=>array('klar, zunehmende Bew&ouml;lkung','','','',''),
'clearthenmostlycloudy'=>array('klar, zunehmende Bew&ouml;lkung','','','',''),
'cleartopartlycloudy'=>array('klarer bis teilweise bew&ouml;lkter Himmel','','','',''),
'cleartopartlycloudyskies'=>array('klarer bis teilweise bew&ouml;lkter Himmel','','','',''),
'clouds'=>array('Wolken','','','',''),
'cloudsandafewshowers'=>array('Wolken und ein paar Schauer','','','',''),
'cloudsandafewsnowshowers'=>array('Wolken und ein paar Schneeschauer','','','',''),
'cloudsandlimitedsunshine'=>array('Wolken und begrenzt Sonnenschein','','','',''),
'cloudsandsomesun'=>array('Wolken und ein wenig Sonne','','','',''),
'cloudslingering'=>array('Wolken verbleiben','','','',''),
'cloudy'=>array('bew&ouml;lkt','','','',''),
'cloudyanddamp'=>array('bew&ouml;lkt und feucht','','','',''),
'cloudyandverywindy'=>array('bew&ouml;lkt und sehr windig','','','',''),
'cloudyandwindy'=>array('bew&ouml;lkt und windig','','','',''),
'cloudyandwindyconditions'=>array('bew&ouml;lkt und windig','','','',''),
'cloudyskies'=>array('bew&ouml;lkter Himmel','','','',''),
'cloudyskiesanddrizzle'=>array('bew&ouml;lkter Himmel und Nieselregen','','','',''),
'cloudyskiesandlightrain'=>array('bew&ouml;lkt und leichter Regen','','','',''),
'cloudyskiesandrain'=>array('bew&ouml;lkt und Regen','','','',''),
'cold'=>array('kalt','','','',''),
'considerablecloudiness'=>array('ziemlich bew&ouml;lkt','','','',''),
'considerablecloudinessandfog'=>array('ziemlich bew&ouml;lkt und nebelig','','','',''),
'considerableclouds'=>array('ziemlich bew&ouml;lkt','','','',''),
'considerablycloudy'=>array('ziemlich bew&ouml;lkt','','','',''),
'continuedwindy'=>array('weiterhin windig','','','',''),
'cooler'=>array('k&auml;lter','','','',''),
'damagingwinds'=>array('gef&auml;hrlicher Wind','','','',''),
'dangerouswindchillsapproaching-15f'=>array('gef&auml;hrliche K&auml;lte und Abk&uuml;hlung durch eisigen Wind','','','',''),
'dangerouswindchillsapproaching-20f'=>array('gef&auml;hrliche K&auml;lte und Abk&uuml;hlung durch eisigen Wind','','','',''),
'dangerouswindchillsapproaching-25f'=>array('gef&auml;hrliche K&auml;lte und Abk&uuml;hlung durch eisigen Wind','','','',''),
'dangerouswindchillsapproaching-30f'=>array('gef&auml;hrliche K&auml;lte und Abk&uuml;hlung durch eisigen Wind','','','',''),
'dangerouswindchillsapproaching-35f'=>array('gef&auml;hrliche K&auml;lte und Abk&uuml;hlung durch eisigen Wind','','','',''),
'dangerouswindchillsapproaching-40f'=>array('gef&auml;hrliche K&auml;lte und Abk&uuml;hlung durch eisigen Wind','','','',''),
'dangerouswindchillsapproaching-45f'=>array('gef&auml;hrliche K&auml;lte und Abk&uuml;hlung durch eisigen Wind','','','',''),
'dangerouswindchillsapproaching-50f'=>array('gef&auml;hrliche K&auml;lte und Abk&uuml;hlung durch eisigen Wind','','','',''),
'dangerouswindchillsapproaching-55f'=>array('gef&auml;hrliche K&auml;lte und Abk&uuml;hlung durch eisigen Wind','','','',''),
'dangerouswindchillsaslowas-25f'=>array('gef&auml;hrliche K&auml;lte und Abk&uuml;hlung durch eisigen Wind','','','',''),
'dangerouswindchillsaslowas-30f'=>array('gef&auml;hrliche K&auml;lte und Abk&uuml;hlung durch eisigen Wind','','','',''),
'dangerouswindchillsaslowas-35f'=>array('gef&auml;hrliche K&auml;lte und Abk&uuml;hlung durch eisigen Wind','','','',''),
'dangerouswindchillsaslowas-40f'=>array('gef&auml;hrliche K&auml;lte und Abk&uuml;hlung durch eisigen Wind','','','',''),
'dangerouswindchillsmayapproach-25f'=>array('gef&auml;hrliche K&auml;lte und Abk&uuml;hlung durch eisigen Wind','','','',''),
'dangerouswindchillsmayapproach-30f'=>array('gef&auml;hrliche K&auml;lte und Abk&uuml;hlung durch eisigen Wind','','','',''),
'dangerouswindchillsmayapproach-35f'=>array('gef&auml;hrliche K&auml;lte und Abk&uuml;hlung durch eisigen Wind','','','',''),
'dangerouswindchillsmayapproach-40f'=>array('gef&auml;hrliche K&auml;lte und Abk&uuml;hlung durch eisigen Wind','','','',''),
'dangerouswindchillsmayapproach-45f'=>array('gef&auml;hrliche K&auml;lte und Abk&uuml;hlung durch eisigen Wind','','','',''),
'dangerouswindchillsmayapproach-50f'=>array('gef&auml;hrliche K&auml;lte und Abk&uuml;hlung durch eisigen Wind','','','',''),
'decreasingcloudiness'=>array('abnehmende Bew&ouml;lkung','','','',''),
'decreasingcloudinessandwindy'=>array('abnehmende Bew&ouml;lkung und windig','','','',''),
'decreasingclouds'=>array('abnehmende Bew&ouml;lkung','','','',''),
'densefoginsomeareas'=>array('&ouml;rtlich dichter Nebel','','','',''),
'diminishingtoscatteredshowers'=>array('abnehmend zu strichweisen Schauern','','','',''),
'drenchingdownpours'=>array('str&ouml;mender Regen','','','',''),
'drenchingdownpourslikelyby'=>array('str&ouml;mender Regen','','','',''),
'drenchingrain'=>array('str&ouml;mender Regen','','','',''),
'drizzle'=>array('Nieselregen','','','',''),
'drizzleandfog'=>array('Nieselregen und Nebel','','','',''),
'drizzleandperiodsoflightrain'=>array('Nieselregen und zeitweise leichter Regen','','','',''),
'drizzleattimes'=>array('zeitweise Nieselregen','','','',''),
'drizzledeveloping'=>array('sich bildender Nieselregen','','','',''),
'drizzleending'=>array('endender Nieselregen','','','',''),
'drizzleexpected'=>array('Nieselregen erwartet','','','',''),
'drizzlelikely'=>array('Nieselregen wahrscheinlich','','','',''),
'early'=>array('&nbsp;','','','',''),
'ending'=>array('endend','','','',''),
'especially'=>array('besonders','','','',''),
'exceptforafewclouds'=>array('mit Ausnahme von wenigen Wolken','','','',''),
'fair'=>array('heiter','','','',''),
'fairskies'=>array('heiterer Himmel','','','',''),
'fewshowers'=>array('ein paar Schauer','','','',''),
'flurriesandafewsnowshowers'=>array('Schneegest&ouml;ber und ein paar Schneeschauer','','','',''),
'fog'=>array('Nebel','','','',''),
'fogdeveloping'=>array('einsetzender Nebel','','','',''),
'foggy'=>array('nebelig','','','',''),
'foggyconditions'=>array('nebelig','','','',''),
'foggyhours'=>array('nebelig','','','',''),
'foggytostart'=>array('nebelig zu Beginn','','','',''),
'fogmaydevelop'=>array('Nebel k&ouml;nnte sich bilden','','','',''),
'generallyclear'=>array('allgemein klar','','','',''),
'generallyclearconditions'=>array('allgemein klar','','','',''),
'generallyclearskies'=>array('allgemein klarer Himmel','','','',''),
'generallycloudy'=>array('allgemein bew&ouml;lkt','','','',''),
'generallyfair'=>array('allgemein heiter','','','',''),
'generallysunny'=>array('allgemein sonnig','','','',''),
'generallysunnydespiteafewclouds'=>array('allgemein sonnig, abgesehen von einigen wenigen Wolken','','','',''),
'generallysunnyskies'=>array('allgemein sonniger Himmel','','','',''),
'gustywinds'=>array('b&ouml;ige Winde','','','',''),
'gustywindsattimes'=>array('zeitweise b&ouml;ige Winde','','','',''),
'gustywindsdeveloping'=>array('auftretende b&ouml;ige Winde','','','',''),
'gustywindsdiminishing'=>array('abnehmende b&ouml;ige Winde','','','',''),
'hazy'=>array('dunstig','','','',''),
'heatindexnear105f'=>array('sehr heiss','','','',''),
'heatindexnear110f'=>array('sehr heiss','','','',''),
'heatindexnear115f'=>array('sehr heiss','','','',''),
'heatindexnear120f'=>array('sehr heiss','','','',''),
'heatindexnear125f'=>array('sehr heiss','','','',''),
'heatindexnear130f'=>array('sehr heiss','','','',''),
'heatindexnear135f'=>array('sehr heiss','','','',''),
'heatindexnear140f'=>array('sehr heiss','','','',''),
'heatindexnear145f'=>array('sehr heiss','','','',''),
'heavier'=>array('kr&auml;ftiger','','','',''),
'heaviersnow'=>array('st&auml;rker einsetzender Schneefall','','','',''),
'heavy'=>array('&nbsp;','','','',''),
'heavyattimes'=>array('bei Zeiten kr&auml;ftig','','','',''),
'heavyrain'=>array('Starkregen','','','',''),
'heavyrainandthunderstormslikely'=>array('Starkregen und Gewitter','','','',''),
'heavyrainlikely'=>array('Starkregen wahrscheinlich','','','',''),
'heavyraintostart'=>array('Starkregen','','','',''),
'heavythunderstorms'=>array('kr&auml;ftige Gewitter','','','',''),
'hot'=>array('heiss','','','',''),
'hotandhumid'=>array('heiss und schw&uuml;l','','','',''),
'humid'=>array('feucht','','','',''),
'hurricaneconditionspossible'=>array('schwerste St&uuml;rme m&ouml;glich','','','',''),
'increasingclouds'=>array('zunehmende Bew&ouml;lkung','','','',''),
'increasingcloudsandafewshowers'=>array('zunehmende Bew&ouml;lkung und ein paar Schauer','','','',''),
'increasingcloudsandafewsnowshowers'=>array('zunehmende Bew&ouml;lkung und ein paar Schneeschauer','','','',''),
'increasingcloudsandsomelightrain'=>array('zunehmende bew&ouml;lkung und etwas leichter Regen','','','',''),
'increasinglywindy'=>array('zunehmend windig','','','',''),
'increasingwinds'=>array('zunehmende Winde','','','',''),
'intermittentdrizzle'=>array('sporadisch Nieselregen','','','',''),
'intermittentlightrain'=>array('sporadisch leichter Regen','','','',''),
'intermittentlightrainanddrizzle'=>array('sporadisch leichter Regen oder Nieselregen','','','',''),
'intermittentsnowandsnowshowers'=>array('sporadisch Schnee- und Schneeschauer','','','',''),
'intermittentsnoworsnowshowerssteadierandheavier'=>array('sporadisch Schnee oder Schneeschaue, anhaltend und kr&auml;ftiger werdend','','','',''),
'intermittentsnowshowers'=>array('sporadisch Schneeschauer','','','',''),
'intermittentsnowshowersandwindy'=>array('sporadisch Schneeschauer und Wind','','','',''),
'intervalsofcloudsandsunshine'=>array('abwechselnd Sonne und Wolken','','','',''),
'isolatedthunderstormpossible'=>array('vereinzelte Gewitter m&ouml;glich','','','',''),
'isolatedthunderstorms'=>array('vereinzelte Gewitter','','','',''),
'isolatedthunderstormsarriving'=>array('vereinzelte Gewitter','','','',''),
'isolatedthunderstormsdeveloping'=>array('Bildung vereinzelter Gewitter','','','',''),
'isolatedthunderstormsduring'=>array('vereinzelte Gewitter','','','',''),
'isolatedthunderstormshours'=>array('auftretende b&ouml;ige Winde','','','',''),
'isolatedthunderstormsmaydevelop'=>array('vereinzelte Gewitter k&ouml;nnen auftreten','','','',''),
'isolatedthunderstormsmorewidespread'=>array('vereinzelte Gewitter','','','',''),
'isolatedthunderstormspossible'=>array('vereinzelte Gewitter m&ouml;glich','','','',''),
'itwillbeheavyattimes'=>array('zeitweise kr&auml;ftig','','','',''),
'itwillbewindyattimes'=>array('zeitweise windig','','','',''),
'largehail'=>array('starker Hagel','','','',''),
'latedaylightrain'=>array('leichter Regen sp&auml;ter am Tag','','','',''),
'latenightshowersorthunderstorms'=>array('Schauer oder Gewitter','','','',''),
'late-nightsnowshowers'=>array('Schneeschauer','','','',''),
'lessnumerous'=>array('weniger h&auml;ufig','','','',''),
'lessnumerousduring'=>array('weniger h&auml;ufig','','','',''),
'light'=>array('leichter','','','',''),
'lighter'=>array('abnehmend','','','',''),
'lighterandchangetoallrain'=>array('Regen','','','',''),
'lightrain'=>array('leichter Regen','','','',''),
'lightrainanddrizzle'=>array('leichter Regen oder Nieselregen','','','',''),
'lightrainanddrizzleexpected'=>array('leichter Regen oder Nieselregen erwartet','','','',''),
'lightrainanddrizzlelikely'=>array('leichter Regen oder Nieselregen wahrscheinlich','','','',''),
'lightrainandfog'=>array('leichter Regen und Nebel','','','',''),
'lightrainandsnow'=>array('leichter Regen oder Nieselregen wahrscheinlich','','','',''),
'lightrainandwindy'=>array('leichter Regen, windig','','','',''),
'lightraindeveloping'=>array('aufkommender leichter Regen','','','',''),
'lightrainlikely'=>array('leichter Regen wahrscheinlich','','','',''),
'lightrainpossible'=>array('m&ouml;glicherweise leichter Regen','','','',''),
'lightraintransitioningtoafewshowers'=>array('leichter Regen, der in einige wenige Schauer &uuml;bergeht','','','',''),
'lightsnow'=>array('leichter Schneefall','','','',''),
'lightsnowandwindy'=>array('leichter Schneefall und windig','','','',''),
'lightsnowattimes'=>array('zeitweise leichter Schneefall','','','',''),
'lightsnowlikely'=>array('leichter Schnee wahrscheinlich','','','',''),
'lightsnowwilltransitiontosnowshowers'=>array('leichter Schnee, der in einige wenige Schneeschauer &uuml;bergeht','','','',''),
'lingeringclouds'=>array('verweilende Wolken','','','',''),
'lingeringsnowshowers'=>array('verbleibende Schneeschauer','','','',''),
'locallystrongthunderstorms-afewcouldalsocontainveryheavyrain'=>array('&ouml;rtlich schwere Gewitter, m&ouml;glicherweise Starkregen','','','',''),
'locallystrongthunderstormslikely-afewcouldcontainveryheavyrain'=>array('&ouml;rtlich schwere Gewitter wahrscheinlich, m&ouml;glicherweise Starkregen','','','',''),
'lotsofsunshine'=>array('viel Sonnenschein','','','',''),
'lowclouds'=>array('tiefe Wolken','','','',''),
'lowcloudsanddrizzle'=>array('tiefe Wolken und Nieselregen','','','',''),
'lowcloudsandfog'=>array('niedrig h&auml;ngende Wolken und Nebel','','','',''),
'mainly'=>array('&uuml;berwiegend','','','',''),
'mainlyclear'=>array('vorherrschend klar','','','',''),
'mainlyclearandwindy'=>array('vorherrschend klar und windig','','','',''),
'mainlyclearskies'=>array('vorherrschend klarer Himmel','','','',''),
'mainlycloudy'=>array('vorherrschend bew&ouml;lkt','','','',''),
'mainlycloudyandrainy'=>array('vorherrschend bew&ouml;lkt und regnerisch','','','',''),
'mainlycloudyandwindy'=>array('vorherrschend bew&ouml;lkt und windig','','','',''),
'mainlyhours'=>array('&nbsp;','','','',''),
'mainlysunny'=>array('vorherrschend sonnig','','','',''),
'mainlysunnyandwindy'=>array('vorherrschend sonnig und windig','','','',''),
'mainlysunnyskies'=>array('&uuml;berwiegend sonniger Himmel','','','',''),
'mainlysunnytostart'=>array('&uuml;berwiegend sonniger Himmel','','','',''),
'maybearumbleofthunder'=>array('vielleicht ein wenig Donnergrollen','','','',''),
'mixedcloudsandsun'=>array('Mix aus Sonne und Wolken','','','',''),
'mixing'=>array('&nbsp;','','','',''),
'mixofrainandice'=>array('Mix aus Regen und Eisregen','','','',''),
'mixofrainandsnow'=>array('Mix aus Regen und Schnee','','','',''),
'mixofrainandsnowshowers'=>array('Mix aus Regen und Schneeschauern','','','',''),
'mixofsunandclouds'=>array('Mix aus Sonne und Wolken','','','',''),
'moderatingtemperatureswillchangescatteredsnowshowerstorainshowers'=>array('Schneeschauer gehen in Regenschauer &uuml;ber','','','',''),
'moderatingtemperatureswillchangesnowshowerstorainshowers'=>array('Regenschauer gehen in Schneeschauer &uuml;ber','','','',''),
'morecloudsfor'=>array('zunehmende Bew&ouml;lkung','','','',''),
'morecloudsthansun'=>array('mehr Wolken als Sonne','','','',''),
'moreintermittent'=>array('mehr unterbrochen','','','',''),
'morescattered'=>array('weiter auslaufend','','','',''),
'moreshowersattimes'=>array('manchmal h&auml;ufiger Schauerbildung','','','',''),
'moresunthanclouds'=>array('mehr Sonne als Wolken','','','',''),
'morewidelyscattered'=>array('weiter auslaufend','','','',''),
'morewidespread'=>array('weiter auslaufend','','','',''),
'mostlyclear'=>array('&uuml;berwiegend klar','','','',''),
'mostlyclearandwindy'=>array('&uuml;berwiegend klar und windig','','','',''),
'mostlyclearconditions'=>array('&uuml;berwiegend klar','','','',''),
'mostlyclearskies'=>array('&uuml;berwiegend klarer Himmel','','','',''),
'mostlyclearskiesby'=>array('&uuml;berwiegend klarer Himmel','','','',''),
'mostlyclearskiesthencloudy'=>array('meist klar als bew&ouml;lkt','','','',''),
'mostlyclearskiesthenincreasingclouds'=>array('meistens klar, dann &uuml;berwiegend Bew&ouml;lkung','','','',''),
'mostlyclearskiesthenmostlycloudy'=>array('meistens klar, dann aufkommende Bew&ouml;lkung','','','',''),
'mostlyclearthencloudy'=>array('&uuml;berwiegend klar, dann bew&ouml;lkt','','','',''),
'mostlyclearthenincreasingcloudiness'=>array('meistens klar, dann zunehmende Bew&ouml;lkung','','','',''),
'mostlyclearthenincreasingclouds'=>array('meistens klar, dann zunehmende Bew&ouml;lkung','','','',''),
'mostlyclearthenmostlycloudy'=>array('meistens klar, dann &uuml;berwiegend wolkig','','','',''),
'mostlycloudy'=>array('&uuml;berwiegend bew&ouml;lkt','','','',''),
'mostlycloudyandwindy'=>array('&uuml;berwiegend bew&ouml;lkt und windig','','','',''),
'mostlycloudyconditions'=>array('meist bew&ouml;lkt','','','',''),
'mostlycloudyconditionsduring'=>array('meist bew&ouml;lkt','','','',''),
'mostlycloudyskies'=>array('&uuml;berwiegend bew&ouml;lkter Himmel','','','',''),
'mostlycloudyskiesandafewshowers'=>array('&uuml;berwiegend bew&ouml;lkt und ein paar Schauer','','','',''),
'mostlycloudyskiesandafewsnowshowers'=>array('&uuml;berwiegend bew&ouml;lkt und ein paar Schneeschauer','','','',''),
'mostlycloudyskiesduring'=>array('&uuml;berwiegend bew&ouml;lkter Himmel','','','',''),
'mostlycloudyskieshours'=>array('&uuml;berwiegend bew&ouml;lkter Himmel','','','',''),
'mostlycloudyskiesthenperiodsofshowers'=>array('&uuml;berwiegend bew&ouml;lkt, dann zeitweise ein paar Schauer','','','',''),
'mostlycloudythenperiodsofshowers'=>array('&uuml;berwiegend bew&ouml;lkt, dann abschnittsweise ein paar Schauer','','','',''),
'mostlysunny'=>array('&uuml;berwiegend sonnig','','','',''),
'mostlysunnyandwindy'=>array('&uuml;berwiegend sonnig und windig','','','',''),
'mostlysunnyconditions'=>array('&uuml;berwiegend sonnig','','','',''),
'mostlysunnyduring'=>array('&uuml;berwiegend sonnig','','','',''),
'mostlysunnyskies'=>array('&uuml;berwiegend sonniger Himmel','','','',''),
'mostlysunnyskiesby'=>array('&uuml;berwiegend sonniger Himmel','','','',''),
'mostlysunnyskiesduring'=>array('&uuml;berwiegend sonniger Himmel','','','',''),
'mostlysunnyskieshours'=>array('&uuml;berwiegend sonniger Himmel','','','',''),
'mostlysunnythencloudy'=>array('&uuml;berwiegend sonnig, dann wolkig','','','',''),
'mostlysunnythenincreasingcloudiness'=>array('&uuml;berwiegend sonnig, dann zunehmende Bew&ouml;lkung','','','',''),
'mostlysunnythenincreasingclouds'=>array('&uuml;berwiegend sonnig, dann zunehmende Wolken','','','',''),
'mostlysunnythenmostlycloudy'=>array('&uuml;berwiegend sonnig, dann &uuml;berwiegend bew&ouml;lkt','','','',''),
'mostlysunnythensomescatteredstrongthunderstorms'=>array('&uuml;berwiegend sonnig, dann strichweise teilweise starke Gewitter','','','',''),
'nearrecordhightemperatures'=>array('H&ouml;chsttemperaturen auf Rekordniveau','','','',''),
'nearrecordlowtemperatures'=>array('Niedrigsttemperaturen auf Rekordniveau','','','',''),
'nightshowersorthunderstorms'=>array('n&auml;chtliche Schauer oder Gewitter','','','',''),
'numerousthunderstorms'=>array('zahlreiche Gewitter','','','',''),
'numerousthunderstormsdeveloping'=>array('Bildung von zahlreichen Gewittern','','','',''),
'numerousthunderstormsdevelopingduring'=>array('Bildung von zahlreichen Gewittern','','','',''),
'occasionaldrizzle'=>array('zeitweilig Nieselregen','','','',''),
'occasionallightrain'=>array('zeitweilig leichter Regen','','','',''),
'occasionallightraintaperingtoafewshowers'=>array('zeitweilig leichter Regen - mildert sich ab zu einigen weingen Schauern','','','',''),
'occasionallyheavy'=>array('zeitweilig kr&auml;ftig','','','',''),
'occasionallyheavyrain'=>array('zeitweilig kr&auml;ftiger Regen','','','',''),
'occasionalrain'=>array('zeitweilig Regen','','','',''),
'occasionalrainandarumbleortwoofthunder'=>array('zeitweilig Regen und Donnergrollen','','','',''),
'occasionalrain-arumbleofthunderisstillpossible'=>array('zeitweilig Regen, ab und an Donner','','','',''),
'occasionalrainlikely'=>array('zeitweilig Regen wahrscheinlich','','','',''),
'occasionalrainshowers'=>array('zeitweilig Regenschauer','','','',''),
'occasionalraintaperingtoafewshowers'=>array('zeitweilig Regen - mildert sich ab zu einigen wenigen Schauern','','','',''),
'occasionalshowers'=>array('zeitweilig Schauer','','','',''),
'occasionalshowerspossible'=>array('zeitweilig sind Schauer m&ouml;glich','','','',''),
'occasionalsnowshowers'=>array('zeitweilig Schneeschauer','','','',''),
'occasionalsnowshowersmixing'=>array('zeitweilig Schneeschauer','','','',''),
'occasionalthunderstorms-possiblysevere'=>array('zeitweilig Gewitter - m&ouml;glicherweise heftig','','','',''),
'offandonsnowshowers'=>array('ab und an Schneeschauer','','','',''),
'offandonsnowshowersasteadysnow'=>array('ab und an Schneeschauer','','','',''),
'onandoffsnowshowers'=>array('ab und an Schneeschauer','','','',''),
'onandoffsnowshowersmainly'=>array('ab und an Schneeschauer','','','',''),
'onlyaslightchanceformorestorms'=>array('geringe Wahrscheinlichkeit f&uuml;r weitere St&uuml;rme','','','',''),
'otherwiseagooddealofclouds'=>array('ansonsten heiter bis wolkig','','','',''),
'otherwisecloudy'=>array('ansonsten bew&ouml;lkt','','','',''),
'otherwisegenerallyclear'=>array('ansonsten allgemein klar','','','',''),
'otherwisegenerallysunny'=>array('ansonsten allgemein sonnig','','','',''),
'otherwisemostlycloudy'=>array('ansonsten meist bedeckt','','','',''),
'otherwisemostlysunny'=>array('ansonsten allgemein meist sonnig','','','',''),
'overcast'=>array('bedeckt','','','',''),
'overcastandblustery'=>array('bedeckt und st&uuml;rmisch','','','',''),
'overcastandveryblustery'=>array('bedeckt und st&uuml;rmisch','','','',''),
'overcastskies'=>array('bedeckter Himmel','','','',''),
'overcastskiesandwindy'=>array('bedeckter Himmel und windig','','','',''),
'overcastskiesduring'=>array('bedeckter Himmel','','','',''),
'partialclearing'=>array('teilweise Aufkl&auml;rung','','','',''),
'partialclearingandscatteredshowers'=>array('teilweise Aufkl&auml;rung und strichweise Schauer','','','',''),
'partialclearingexpected'=>array('teilweise Aufkl&auml;rung erwartet','','','',''),
'partialcloudiness'=>array('teilweise bew&ouml;lkt','','','',''),
'partialsunshineexpected'=>array('teilweise sonnig','','','',''),
'partlycloudy'=>array('teilweise bew&ouml;lkt','','','',''),
'partlycloudyaftersomedrizzle'=>array('teilweise bew&ouml;lkt nach Nieselregen','','','',''),
'partlycloudyaftersomelightrain'=>array('teilweise bew&ouml;lkt nach leichtem Regen','','','',''),
'partlycloudyaftersomerain'=>array('teilweise bew&ouml;lkt nach etwas Regen','','','',''),
'partlycloudyandwindy'=>array('teilweise bew&ouml;lkt und windig','','','',''),
'partlycloudyskies'=>array('teilweise bew&ouml;lkter Himmel','','','',''),
'partlycloudyskiesduring'=>array('teilweise bew&ouml;lkter Himmel','','','',''),
'partlycloudyskieshours'=>array('teilweise bew&ouml;lkter Himmel','','','',''),
'partlycloudyskiesthencloudy'=>array('teilweise bew&ouml;lkter Himmel, dann bew&ouml;lkt','','','',''),
'partlycloudythencloudy'=>array('teilweise bew&ouml;lkt, dann Bew&ouml;lkungszunahme','','','',''),
'partlytomostlycloudy'=>array('teilweise bis &uuml;berwiegend bew&ouml;lkt','','','',''),
'partlytomostlycloudyandwindy'=>array('teilweise bis &uuml;berwiegend bew&ouml;lkt und windig','','','',''),
'partlytomostlycloudyskies'=>array('teilweise bis &uuml;berwiegend bew&ouml;lkter Himmel','','','',''),
'patchydrizzlepossible'=>array('Durchn&auml;ssender Nieselregen m&ouml;glich','','','',''),
'patchyfog'=>array('feuchter Nebel','','','',''),
'peeksofsunshine'=>array('Augenblicke von Sonnenschein','','','',''),
'peeksofsunshineexpected'=>array('Augenblicke von Sonnenschein','','','',''),
'perhapsarumbleofthunder'=>array('vielleicht Donnergrollen','','','',''),
'perhapsarumbleofthunderdeveloping'=>array('vielleicht Donnergrollen von sich bildenden Gewittern','','','',''),
'perhapsarumbleortwoofthunder'=>array('vielleicht Donnergrollen','','','',''),
'periodsofdrizzle'=>array('Abschnitte mit Nieselregen','','','',''),
'periodsofheavyrain'=>array('Abschnitte mit kr&auml;ftigem Regen','','','',''),
'periodsofheavyrainandwindy'=>array('Abschnitte mit kr&auml;ftigem Regen, windig','','','',''),
'periodsofheavyrainlikely'=>array('Abschnitte mit kr&auml;ftigem Regen wahrscheinlich','','','',''),
'periodsoflightrain'=>array('Abschnitte mit leichtem Regen','','','',''),
'periodsoflightrainanddrizzle'=>array('Abschnitte mit leichtem Regen und Nieselregen','','','',''),
'periodsoflightrainandshowers'=>array('Abschnitte mit leichtem Regen und Schnee','','','',''),
'periodsoflightrainandsnow'=>array('Abschnitte mit leichtem Regen und Schnee','','','',''),
'periodsoflightraindeveloping'=>array('Abschnitte mit sich bildendem leichtem Regen','','','',''),
'periodsoflightsnow'=>array('Abschnitte mit leichtem Schnee','','','',''),
'periodsofrain'=>array('Abschnitte mit Regen','','','',''),
'periodsofrainanddrizzle'=>array('Abschnitte mit Regen oder Nieselregen','','','',''),
'periodsofrainandpossiblyathunderstorm'=>array('Abschnitte mit Regen und vielleicht Gewitter','','','',''),
'periodsofrainandsnow'=>array('Abschnitte mit Regen und Schnee','','','',''),
'periodsofrainandwind'=>array('Abschnitte mit Regen und Wind','','','',''),
'periodsofrainandwindy'=>array('Abschnitte mit Regen, windig','','','',''),
'periodsofrainandwindyattimes'=>array('Abschnitte mit Regen, zeitweise windig','','','',''),
'periodsofrainlikely'=>array('Abschnitte mit Regen wahrscheinlich','','','',''),
'periodsofshowers'=>array('Abschnitte mit Schauern','','','',''),
'periodsofsnow'=>array('Abschnitte mit Schnee','','','',''),
'periodsofsnowandsnowshowers'=>array('Abschnitte mit Schnee und Schneeschauern','','','',''),
'periodsofsnowandwindy'=>array('Abschnitte mit Schnee und Wind','','','',''),
'periodsofsnowshowers'=>array('Abschnitte mit Schneeschauern','','','',''),
'plentifulsunshine'=>array('viel Sonnenschein','','','',''),
'plentyofsun'=>array('viel Sonne','','','',''),
'plentyofsunshine'=>array('viel Sonnenschein','','','',''),
'possiblyheavyattimes'=>array('m&ouml;glicherweise stark','','','',''),
'possiblysevere'=>array('m&ouml;glicherweise heftig','','','',''),
'precipitationturningtoamixtureofrainandsnow'=>array('Niederschlag wird ein Mix aus Regen und Schnee','','','',''),
'quitewindy'=>array('relativ windig','','','',''),
'rain/icemixed'=>array('Regen / Eisregen','','','',''),
'rain/snowshowers'=>array('Regen / Schneeschauer','','','',''),
'rain'=>array('Regen','','','',''),
'rainalong'=>array('Regen','','','',''),
'rainandafewthunderstorms'=>array('Regen und ein paar Gewitter','','','',''),
'rainandafewthunderstormslikely'=>array('Regen und ein paar Gewitter wahrscheinlich','','','',''),
'rainandapossiblethunderstorm'=>array('Regen und vielleicht Gewitter','','','',''),
'rainanddrizzle'=>array('Regen und Nieselregen','','','',''),
'rainanddrizzleexpected'=>array('Regen und Nieselregen erwartet','','','',''),
'rainanddrizzlelikely'=>array('Regen oder Nieselregen wahrscheinlich','','','',''),
'rainandfreezingrain'=>array('Regen und &uuml;berfrierende N&auml;sse','','','',''),
'rainandheavyattimes'=>array('Regen, manchmal kr&auml;ftig','','','',''),
'rainandperhapsathunderstorm'=>array('Regen und vielleicht ein Gewitter','','','',''),
'rainandpossiblyathunderstorm'=>array('Regen und vielleicht ein Gewitter','','','',''),
'rainandpossiblysomethunder'=>array('Regen und vielleicht Donner','','','',''),
'rainandscatteredthunderstorms'=>array('Rewgen und vertreut Gewitter','','','',''),
'rainandsnow'=>array('Regen und Schnee','','','',''),
'rainandsnowdiminishing'=>array('abnehmender Regen und Schneefall','','','',''),
'rainandsnowshowers'=>array('Regen und Schneeschauer','','','',''),
'rainandsnowshowerschangingtomainlyrainshowers'=>array('Regen und Schneeschauer, in Regen &uuml;bergehend','','','',''),
'rainandsnowshowerstransitioningtosnowshowers'=>array('Regen und Schneeschauer gehen zunehmend in Schneeschauer &uuml;ber','','','',''),
'rainandsnowtaperingoff'=>array('abnehmender Regen und Schneefall','','','',''),
'rainandsnowtaperingtoscatteredrainshowers'=>array('Regen und Schnee geht in strichweise Regenschauer &uuml;ber','','','',''),
'rainandsnowtransitioningtosnowshowers'=>array('Regen und Schnee gehen in Schneeschauer &uuml;ber','','','',''),
'rainandthunder'=>array('Regen und Donner','','','',''),
'rainandthunderstorms'=>array('Regen und Gewitter','','','',''),
'rainandwind'=>array('Regen und Wind','','','',''),
'rainarriving'=>array('einsetzender Regen','','','',''),
'rainattimes'=>array('zeitweise Regen','','','',''),
'raindeveloping'=>array('aufkommender Regen','','','',''),
'raindiminishingtoafewshowers'=>array('Regen geht in einige wenige Schauer &uuml;ber','','','',''),
'raindiminishingtoafewshowersby'=>array('Regen geht in einige wenige Schauer &uuml;ber','','','',''),
'rainending'=>array('endender Regen','','','',''),
'rainendingthenfoggy'=>array('endender Regen, dann nebelig','','','',''),
'rainfallwillbelocallyheavyattimes'=>array('Regen, lokal kr&auml;ftig','','','',''),
'rainheavyattimes'=>array('teilweise kr&auml;ftiger Regen','','','',''),
'rainlikely'=>array('Regen wahrscheinlich','','','',''),
'rainlikelyandperhapsarumbleortwoofthunder'=>array('Regen wahrscheinlich und gelegentlich Donnergrollen','','','',''),
'rainlikely-athundershowerispossible'=>array('wahrscheinlich Regen','','','',''),
'rainlikely-itwillbeheavyattimes'=>array('Regen wahrscheinlich, teilweise sehr kr&auml;ftig','','','',''),
'rainmaybeheavy'=>array('Starkregen m&ouml;glich','','','',''),
'rainmixed'=>array('Regenmix','','','',''),
'rainmixing'=>array('Regenmix','','','',''),
'rainorsnowshowers'=>array('Regen oder Schneeschauer','','','',''),
'rainshowers'=>array('Regenschauer','','','',''),
'rainshowersalong'=>array('Regenschauer','','','',''),
'rainshowersasteadylightrain'=>array('Regenschauer / leichter Regen','','','',''),
'rainshowersattimes'=>array('zeitweise Regenschauer','','','',''),
'rainshowerschangingtolightsnow'=>array('Regenschauer gehen in leichten Schnee &uuml;ber','','','',''),
'rainshowerschangingtomixedrainandsnow'=>array('Regenschauer gehen in einen Mix aus Regen und Schnee &uuml;ber','','','',''),
'rainshowerschangingtosnowshowers'=>array('Regenschauer gehen in Schneeschauer &uuml;ber','','','',''),
'rainshowerscontinuing'=>array('weiterhin Regenschauer','','','',''),
'rainshowerslessnumerous'=>array('abnehmende Regenschauer','','','',''),
'rainshowersmixing'=>array('Regenschauer','','','',''),
'rainshowersmoreintermittent'=>array('zunehmend anhaltende Regenschauer','','','',''),
'rainshowersmorewidelyscattered'=>array('weiter vertreute Regenschauer','','','',''),
'rainshowerssteadierandheavier'=>array('Regenschauer werden kr&auml;ftiger und anhaltender','','','',''),
'rainshowersthenafewsnowshowers'=>array('Regenschauer, dann Schneeschauer','','','',''),
'rainshowersthenpartlycloudy'=>array('Regenschauer, dann teilweise bew&ouml;lkt','','','',''),
'rainshowersthenthundershowers'=>array('Regenschauer, dann Schneeschauer','','','',''),
'rainshowerswillevolveintoamoresteadyrain'=>array('Regenschauer geht in Dauerregen &uuml;ber','','','',''),
'rainthatshouldbeending'=>array('Abklingender und endender Regen','','','',''),
'recordhightemperaturesexpected'=>array('Rekordtemperaturen erwartet','','','',''),
'recordlowtemperaturesexpected'=>array('Rekordtieftemperaturen erwartet','','','',''),
'remainingcloudy'=>array('es bleibt wolkig','','','',''),
'remainingmainlycloudy'=>array('es bleibt bedeckt','','','',''),
'scatteredclouds'=>array('strichweise Wolken','','','',''),
'scatteredflurriesandsnowshowers'=>array('strichweise leichtes Schneegest&ouml;ber und Schneeschauer','','','',''),
'scatterednightshowers'=>array('strichweise Regenschauer','','','',''),
'scatteredrainshowers'=>array('strichweise Regenschauer','','','',''),
'scatteredshowers'=>array('strichweise Schauer','','','',''),
'scatteredshowersandthunderstorms'=>array('strichweise Schauer und Gewitter','','','',''),
'scatteredshowersandthunderstormsdeveloping'=>array('strichweise Bildung von Schauern und Gewittern','','','',''),
'scatteredshowersdeveloping'=>array('strichweise Bildung von Schauern','','','',''),
'scatteredshowersstillpossible'=>array('strichweise Schauer m&ouml;glich','','','',''),
'scatteredsnowflurriesandsnowshowers'=>array('strichweise Schneegest&ouml;ber und Schneeschauer','','','',''),
'scatteredsnowflurriesandsnowshowerspossible'=>array('strichweise Schneegest&ouml;ber und Schneeschauer m&ouml;glich','','','',''),
'scatteredsnowshowers'=>array('strichweise Schneeschauer','','','',''),
'scatteredsnowshowersmainly'=>array('strichweise Schneeschauer','','','',''),
'scatteredstrongstorms'=>array('strichweise starke Gewitter','','','',''),
'scatteredstrongthunderstorms'=>array('strichweise starke Gewitter','','','',''),
'scatteredstrongtoseverethunderstorms'=>array('strichweise starke bis schwere Gewitter','','','',''),
'scatteredthunderstorms'=>array('strichweise Gewitter','','','',''),
'scatteredthunderstormsandwindy'=>array('strichweise Gewitter und windig','','','',''),
'scatteredthunderstormsarriving'=>array('strichweise Gewitterbildung','','','',''),
'scatteredthunderstormsdeveloping'=>array('strichweise Gewitterbildung','','','',''),
'scatteredthunderstormsmainly'=>array('haupts&auml;chlich strichweise Gewitter','','','',''),
'scatteredthunderstormsmorewidespread'=>array('weiter verstreute Gewitter','','','',''),
'scatteredthunderstormspossible'=>array('strichweise Gewitter m&ouml;glich','','','',''),
'scatteredthunderstorms-possiblysevere'=>array('strichweise Gewitter - m&ouml;glicherweise schwer','','','',''),
'showers'=>array('Schauer','','','',''),
'showersandafewthundershowers'=>array('Schauer und einige wenige Gewitterregen','','','',''),
'showersandafewthunderstorms'=>array('Schauer und einige wenige Gewitter','','','',''),
'showersandafewthunderstormslikely'=>array('Schauer und einige wenige Gewitter wahrscheinlich','','','',''),
'showersandapossiblethunderstorm'=>array('Schauer und m&ouml;gliche Gewitter','','','',''),
'showersandscatteredthunderstorms'=>array('Regen und strichweise Gewitter','','','',''),
'showersandthundershowers'=>array('Schauer und Gewitter','','','',''),
'showersandthundershowerslikely'=>array('Schauer und Gewitterregen wahrscheinlich','','','',''),
'showersandthunderstorms'=>array('Schauer und Gewitter','','','',''),
'showersandthunderstormslikely'=>array('Schauer und Gewitter wahrscheinlich','','','',''),
'showersandthunderstormslikely-heavyrainfallispossible'=>array('Schauer und Gewitter wahrscheinlich - kr&auml;ftiger Regen','','','',''),
'showersandthunderstormslikely-onlyaslightchanceformorestorms'=>array('Schauer und Gewitter wahrscheinlich - geringe Wahrscheinlichkeit weiterer St&uuml;rme','','','',''),
'showersandthunderstorms-possiblysevere'=>array('Schauer und Gewitter - m&ouml;glicherweise schwer','','','',''),
'showersandthunderstorms-possiblystrong'=>array('Schauer und Gewitter - m&ouml;glicherweise stark','','','',''),
'showersarriving'=>array('einsetzende Schauer','','','',''),
'showersarrivingsometime'=>array('einsetzende Schauer','','','',''),
'showersasteady'=>array('Schauer','','','',''),
'showersasteadylightrain'=>array('Schauer / leichter Regen','','','',''),
'showersasteadyrain'=>array('Schauer / leichter Regen','','','',''),
'showersattimes'=>array('zeitweise Schauer','','','',''),
'showerschangingovertosnow'=>array('Schauer gehen in Schnee &uuml;ber','','','',''),
'showerscontinuing'=>array('weiterhin Schauer','','','',''),
'showersdeveloping'=>array('aufkommende Schauer','','','',''),
'showersending'=>array('endende Schauer','','','',''),
'showersendingbymidday'=>array('Schauer bis zum Mittag','','','',''),
'showerslessnumerous'=>array('abnehmende Schauer','','','',''),
'showerslikely'=>array('Schauer wahrscheinlich','','','',''),
'showerslikelyalong'=>array('Schauer wahrscheinlich','','','',''),
'showerslikelyandpossiblyathunderstorm'=>array('Schauer wahrscheinlich und m&ouml;glicherweise Gewitter','','','',''),
'showersmoreintermittent'=>array('Schauer in l&auml;nger werdenden Abschnitten','','','',''),
'showersmorenumerous'=>array('zahlreichere Schauer','','','',''),
'showersofrainandsnow'=>array('Regen- und Schneeschauer','','','',''),
'showersorthunderstorms'=>array('Schauer oder Gewitter','','','',''),
'showerspossible'=>array('Schauer m&ouml;glich','','','',''),
'showerstaperingofftodrizzle'=>array('Schauer gehen in Nieselregen &uuml;ber','','','',''),
'showersthencontinuedcloudyandwindy'=>array('Schauer, dann bleibt es bew&ouml;lkt und windig','','','',''),
'showersthenscatteredstrongthunderstorms'=>array('Schauer, dann strichweise starke Gewitter','','','',''),
'showersthenscatteredthunderstorms'=>array('Schauer, dann strichweise Gewitter','','','',''),
'showersthenscatteredthunderstormsdeveloping'=>array('Schauer, dann strichweise Gewitterbildung','','','',''),
'showersthenthundershowers'=>array('Schauer, dann Gewitterregen','','','',''),
'showersthenthundershowersdeveloping'=>array('Schauer, dann Gewitterbildung','','','',''),
'showerswidelyscattered'=>array('weiter verstreute Schauer','','','',''),
'showeryrainsandapossiblerumbleofthunder'=>array('Regenschauer und Donner m&ouml;glich','','','',''),
'skies'=>array('&nbsp;','','','',''),
'sleetandfreezingrain'=>array('Schneeregen und &uuml;berfrierender Regen','','','',''),
'slightchanceofanshower'=>array('Schauer sind gelegentlich m&ouml;glich','','','',''),
'slightchanceofarainshower'=>array('M&ouml;glichkeit eines Regenschauers','','','',''),
'slightchanceofashower'=>array('vielleicht Schauer m&ouml;glich','','','',''),
'slightchanceofashowerthrough'=>array('vielleicht Schauer m&ouml;glich','','','',''),
'slightchanceofathunderstorm'=>array('Gewitter sind gelegentlich m&ouml;glich','','','',''),
'snow'=>array('Schnee','','','',''),
'snowandwindy'=>array('Schnee und windig','','','',''),
'snowchangingtorain'=>array('erst Schnee, sp&auml;ter Regen','','','',''),
'snowdeveloping'=>array('aufkommender Schneefall','','','',''),
'snowflurriesandsnowshowers'=>array('leichtes Schneegest&ouml;ber und Schneeschauer','','','',''),
'snowlikely'=>array('Schneefall wahrscheinlich','','','',''),
'snowofvaryingintensity'=>array('Schneefall mit unterschiedlicher Intensit&auml;t','','','',''),
'snowshowers'=>array('Schneeschauer','','','',''),
'snowshowersandsteadysnowlikely'=>array('Schneeschauer und stetiger Schneefall wahrscheinlich','','','',''),
'snowshowersaround'=>array('ab und an immer wieder Schneeschauer','','','',''),
'snowshowersasteadyaccumulatingsnow'=>array('Schneeschauer / anhaltender Schneefall','','','',''),
'snowshowersasteadylightsnow'=>array('Schneeschauer / anhaltender leichter Schneefall','','','',''),
'snowshowersattimes'=>array('zeitweise Schneeschauer','','','',''),
'snowshowerschangingtorainshowersasthedayprogresses'=>array('Schneeschauer gehen im Tagesverlauf in Regenschauer &uuml;ber','','','',''),
'snowshowersdeveloping'=>array('aufkommende Schneeschauer','','','',''),
'snowshowersmainly'=>array('&uuml;berwiegend Schneeschauer','','','',''),
'snowshowersmixed'=>array('Schneeschauer','','','',''),
'snowshowersmorescattered'=>array('weiter verstreuter Schneefall','','','',''),
'snowshowersorflurries'=>array('Schneeschauer oder Schneegest&ouml;ber','','','',''),
'snowshowerspossible'=>array('Schneeschauer m&ouml;glich','','','',''),
'snowshowersthatwillmix'=>array('Schneeschauer','','','',''),
'snowshowerswillchangetolightrainasthedaywearson'=>array('Schneeschauer gehen im Tagesverlauf in leichten Regen &uuml;ber','','','',''),
'snowshowerswilltransitiontoasteadier'=>array('kr&auml;ftiger werdende Schneeschauer','','','',''),
'snowtostart'=>array('Schnee zu Beginn','','','',''),
'snowwillchangetorainshowers'=>array('Schnee geht in Regen &uuml;ber','','','',''),
'snowwillmix'=>array('Scheemix','','','',''),
'snowwilltaperoffasafewsnowshowers'=>array('der Schneefall geht in einige wenige Schneeschauer &uuml;ber','','','',''),
'snowwilltaperoffbutitwillremaincloudy'=>array('der Schneefall nimmt ab, es bleibt bedeckt','','','',''),
'snowwilltaperofftolightsnow'=>array('der Schneefall wird geringer','','','',''),
'snowwilltransitiontosnowshowers'=>array('Schnee fall geht in Schneeschauer &uuml;ber','','','',''),
'soakingrain'=>array('durchn&auml;ssender Regen','','','',''),
'somebreaksintheovercast'=>array('einige Sonnenstrahlen durch den ansonsten bedeckten Himmel','','','',''),
'someclearing'=>array('etwas Aufkl&auml;rung','','','',''),
'someclearingexpected'=>array('etwas Aufkl&auml;rung','','','',''),
'someclouds'=>array('wenige Wolken','','','',''),
'somecloudsandpossiblyanisolatedthunderstorm'=>array('wenige Wolken und vielleicht ein vereinzeltes Gewitter','','','',''),
'somecloudyintervals'=>array('einige wolkige Abschnitte','','','',''),
'somedecreaseinclouds'=>array('Abnahme der Bew&ouml;lkung','','','',''),
'somedrizzle'=>array('etwas Nieselregen','','','',''),
'somefog'=>array('etwas Nebel','','','',''),
'somefogpossible'=>array('etwas Nebel m&ouml;glich','','','',''),
'someheavy'=>array('manchmal kr&auml;ftig','','','',''),
'somelightrain'=>array('manchmal leichter Regen','','','',''),
'somelightrainislikely'=>array('leichter Regen wahrscheinlich','','','',''),
'somelightrainwillfall'=>array('leichter Regen','','','',''),
'somelightsnow'=>array('leichter Schneefall','','','',''),
'somelocallyheavydownpoursarepossible'=>array('&ouml;rtlich kr&auml;ftiger Starkregen m&ouml;gloch','','','',''),
'somemaybelocallystrong'=>array('einige k&ouml;nnen &ouml;rtlich heftig werden','','','',''),
'somemaybesevere'=>array('einige k&ouml;nnen heftig sein','','','',''),
'somemaycontainheavyrain'=>array('teilweise Starkregen','','','',''),
'somepassingclouds'=>array('vor&uuml;berziehende Wolken','','','',''),
'somepatchydrizzle'=>array('feuchter Nebel','','','',''),
'somerainandsnow'=>array('etwas Regen und Schnee','','','',''),
'somerainorsnowshowers'=>array('Regen- und Schneeschauer','','','',''),
'somerainshowers'=>array('Regenschauer','','','',''),
'somescatteredshowers'=>array('strichweise Schauer','','','',''),
'somescatteredshowerspossible'=>array('strichweise Schauer m&ouml;glich','','','',''),
'somescatteredthunderstorms'=>array('strichweise Gewitter','','','',''),
'someshowers'=>array('Schauer','','','',''),
'somesnowmixingin'=>array('teilweise Schneefall','','','',''),
'somesnowshowers'=>array('Schneeschauer','','','',''),
'somestorms'=>array('Sturm','','','',''),
'somestrong'=>array('einige kr&auml;ftig','','','',''),
'somesun'=>array('etwas Sonne','','','',''),
'somesunshine'=>array('etwas Sonnenschein','','','',''),
'somethunderstormsmaybesevere'=>array('einige Gewitter k&ouml;nnten schwer werden','','','',''),
'sometimesheavy'=>array('machmal kr&auml;ftig','','','',''),
'steadierrain'=>array('stetigerer Regen','','','',''),
'steadiersnow'=>array('stetigerer Schneefall','','','',''),
'steady'=>array('stetig','','','',''),
'steadylightrain'=>array('leichter Dauerregen','','','',''),
'steadyrain'=>array('Dauerregen','','','',''),
'steadysnow'=>array('stetiger Schneefall','','','',''),
'stillachanceofshowers'=>array('weiterhin Schauer m&ouml;glich','','','',''),
'stormscouldcontaindamagingwinds'=>array('St&uuml;me k&ouml;nnten mit gef&auml;hrlichen Winden auftreten','','','',''),
'stormsmayproducelargehailandstrongwinds'=>array('St&uuml;rme mit Hagel und starken Winden m&ouml;glich','','','',''),
'stormsmorenumerous'=>array('zahlreichere St&uuml;rme','','','',''),
'stormsmorenumeroushours'=>array('zahlreichere St&uuml;rme','','','',''),
'strongthunderstorms'=>array('starke Gewitter','','','',''),
'sun'=>array('Sonne','','','',''),
'sunandafewclouds'=>array('Sonne und einige wenige Wolken','','','',''),
'sunandafewpassingclouds'=>array('sonnig bei vorbeiziehenden Wolken','','','',''),
'sunandcloudsmixed'=>array('Sonne und Wolken Mix','','','',''),
'sunny'=>array('sonnig','','','',''),
'sunnyalong'=>array('sonnig','','','',''),
'sunnyandwind'=>array('sonnig und windig','','','',''),
'sunnyandwindy'=>array('sonnig und windig','','','',''),
'sunnyskies'=>array('sonniger Himmel','','','',''),
'sunnyskiesby'=>array('sonniger Himmel','','','',''),
'sunnyskiesduring'=>array('sonniger Himmel','','','',''),
'sunnyskieshours'=>array('sonniger Himmel','','','',''),
'sunnythencloudy'=>array('sonnig, dann wolkig','','','',''),
'sunnythenincreasingcloudiness'=>array('sonnig, dann zunehmende Bew&ouml;lkung','','','',''),
'sunnythenincreasingclouds'=>array('sonnig, dann zunehmende Wolken','','','',''),
'sunnythenmostlycloudy'=>array('sonnig, dann meist bew&ouml;lkt','','','',''),
'sunnythensomescatteredstrongthunderstorms'=>array('sonnig, dann strichweise einige starke Gewitter','','','',''),
'sunnytopartlycloudy'=>array('sonnig bis teilweise bew&ouml;lkt','','','',''),
'sunshine'=>array('Sonnenschein','','','',''),
'sunshineafterfog'=>array('auf den Nebel folgt Sonnenschein','','','',''),
'sunshinealong'=>array('Sonnenschein','','','',''),
'sunshineandafewclouds'=>array('Sonnenschein und ein paar Wolken','','','',''),
'sunshineandcloudsmixed'=>array('Mix aus Sonnenschein und Wolken','','','',''),
'sunshineandsomeclouds'=>array('Mix aus Sonnenschein und wenigen Wolken','','','',''),
'sunshinethenmostlycloudy'=>array('Sonnenschein, dann &uuml;berwiegend bedeckt','','','',''),
'sunshinethenscatteredstrongthunderstorms'=>array('Sonnenschein, dann strichweise starke Gewitter','','','',''),
'sunshinetostart'=>array('Sonnenschein zu Beginn','','','',''),
'thechanceofacoupleshowers'=>array('ein paar Schauer m&ouml;glich','','','',''),
'thechanceofacoupleshowersdeveloping'=>array('Bildung einiger Schauer m&ouml;glich','','','',''),
'thechanceofanisolatedthunderstorm'=>array('Bildung vereinzelter Gewitter m&ouml;glich','','','',''),
'thechanceofsomethunder'=>array('Donner m&ouml;glich','','','',''),
'thenachanceofanisolatedthunderstorm'=>array('dann m&ouml;glicherweise vereinzelte Gewitter','','','',''),
'thenafewclouds'=>array('dann einige wenige Wolken','','','',''),
'thenafewshowers'=>array('dann ein paar Schauer','','','',''),
'thenaslightchanceofthunderstorms'=>array('dann m&ouml;glicherweise Gewitter','','','',''),
'thenasteadyandheavysnowlikely'=>array('dann anhaltender und kr&auml;ftiger Schneefall wahrscheinlich','','','',''),
'thenclear'=>array('dann klar','','','',''),
'thenclearing'=>array('dann Aufkl&auml;rung','','','',''),
'thenclearingandwindy'=>array('dann Aufkl&auml;rung und windig','','','',''),
'thencloudslingering'=>array('dann verweilende Wolken','','','',''),
'thencloudy'=>array('dann bew&ouml;lkt','','','',''),
'thencloudyandwindy'=>array('dann bew&ouml;lkt und windig','','','',''),
'thencloudyskies'=>array('dann bew&ouml;lkter Himmel','','','',''),
'thencloudyskiesthrough'=>array('dann bew&ouml;lkter Himmel','','','',''),
'thenfoggy'=>array('dann nebelig','','','',''),
'thenfoggyanddamp'=>array('dann nebelig und feucht','','','',''),
'thenisolatedthunderstorms'=>array('dann vereinzelt Gewitter','','','',''),
'thenmainlyclear'=>array('dann &uuml;berwiegend klar','','','',''),
'thenmainlycloudy'=>array('dann haupts&auml;chlich bew&ouml;lkt','','','',''),
'thenmostlyclear'=>array('dann haupts&auml;chlich klar','','','',''),
'thenmostlycloudy'=>array('dann &uuml;berwiegend bew&ouml;lkt','','','',''),
'thenmostlysunny'=>array('dann &uuml;berwiegend sonnig','','','',''),
'thenmostlysunnyby'=>array('dann meist sonnig','','','',''),
'thenoccasionaldrizzle'=>array('dann zeitweilig Nieselregen','','','',''),
'thenoccasionalshowers'=>array('dann gelegentlich Schauer','','','',''),
'thenoffandonrainshowers'=>array('dann ab und an Regenschauer','','','',''),
'thenovercast'=>array('dann bedeckt','','','',''),
'thenpartialclearing'=>array('dann teilweise Aufkl&auml;rung','','','',''),
'thenpartlycloudy'=>array('dann teilweise wolkig','','','',''),
'thenpartlytomostlycloudy'=>array('dann teilweise bis &uuml;berwiegend bew&ouml;lkt','','','',''),
'thenrain'=>array('dann Regen','','','',''),
'thenremainingcloudy'=>array('dann verbleibt es wolkig','','','',''),
'thenremainingmainlycloudy'=>array('dann bleibt es &uuml;berwiegend bew&ouml;lkt','','','',''),
'thenremainingovercast'=>array('dann bedeckt bleibend','','','',''),
'thenscatteredshowers'=>array('dann strichweise Schauer','','','',''),
'thenscatteredstrongthunderstorms'=>array('dann strichweise starke Gewitter','','','',''),
'thenscatteredthunderstorms'=>array('dann strichweise Gewitter','','','',''),
'thenshowersandthunderstorms'=>array('dann Schauer und Gewitter','','','',''),
'thenskiesturningmostlyclear'=>array('dann abnehmende Bew&ouml;lkung','','','',''),
'thenskiesturningmostlysunny'=>array('dann meist sonnig','','','',''),
'thenskiesturningpartlycloudy'=>array('teilweise bew&ouml;lkter Himmel','','','',''),
'thensomebreaksintheclouds'=>array('dann teilweise aufbrechende Wolkendecke','','','',''),
'thensomelingeringshowersstillpossible'=>array('dann  weiterhin einzelne Schauer m&ouml;glich','','','',''),
'thensomesnowshowers'=>array('dann einige Schneeschauer','','','',''),
'thensomesun'=>array('dann etwas Sonne','','','',''),
'thensunny'=>array('dann sonnig','','','',''),
'thensunnyby'=>array('dann sonnig','','','',''),
'thensunshine'=>array('dann Sonnenschein','','','',''),
'thenthechanceofscatteredshowers'=>array('dann m&ouml;glicherweise strichweise Schauer','','','',''),
'thenthechanceofscatteredshowersdeveloping'=>array('dann m&ouml;glicherweise strichweise Bildung von Schauern','','','',''),
'thenthechanceofscatteredthunderstorms'=>array('dann m&ouml;glicherweise strichweise Gewittern','','','',''),
'thenthunderstorms'=>array('dann Gewitter','','','',''),
'thenthunderstormsdeveloping'=>array('dann Gewitterbildung','','','',''),
'thenvariableclouds'=>array('dann unterschiedliche Wolkenfelder','','','',''),
'thenwindy'=>array('dann windig','','','',''),
'thepossibilityofanisolatedthunderstorm'=>array('m&ouml;glicherweise einzelnes Gewitter','','','',''),
'thepossibilityofanisolatedthunderstormdeveloping'=>array('Bildung vereinzelter Gewitter m&ouml;glich','','','',''),
'thepossibilityofsomescatteredshowers'=>array('Bildung vereinzelter Schauer m&ouml;glich','','','',''),
'therainandsnow'=>array('Regen und Schnee','','','',''),
'therainandsnowwillchangetorainshowers'=>array('Regen und Schnee geht in Regenschauer &uuml;ber','','','',''),
'therainmaybeheavyattimes'=>array('der Regen kann zeitweise kr&auml;ftig werden','','','',''),
'therainwillbeheavyattimes'=>array('der Regen ist zeitweise kr&auml;ftig','','','',''),
'thesnowismorelikelytoaccumulate'=>array('wahrscheinlich belibt der Schnee liegen','','','',''),
'thunder'=>array('Donner','','','',''),
'thunderispossible'=>array('Donnergrollen m&ouml;glich','','','',''),
'thunderpossible'=>array('Donnergrollen m&ouml;glich','','','',''),
'thundershowers'=>array('Gewitterregen','','','',''),
'thundershowersdeveloping'=>array('sich bildende Gewitterregen','','','',''),
'thundershowersfollowingaperiodofrain'=>array('Gewitterregen nach abschnittsweisen Regenf&auml;llen','','','',''),
'thunderstorms'=>array('Gewitter','','','',''),
'thunderstormsby'=>array('Gewitter','','','',''),
'thunderstormsdeveloping'=>array('aufkommende Gewitter','','','',''),
'thunderstormsinthearea'=>array('aufkommende lokale Gewitter','','','',''),
'thunderstormslikely'=>array('Gewitter wahrscheinlich','','','',''),
'thunderstormslikely-possiblysevere'=>array('Gewitter - m&ouml;glicherweise heftig','','','',''),
'thunderstormslikely-possiblystrong'=>array('Gewitter wahrscheinlich - m&ouml;glicherweise heftig','','','',''),
'thunderstormspossible'=>array('Gewitter m&ouml;glich','','','',''),
'thunderstormspossibleaswell'=>array('ebenfalls Gewitter m&ouml;glich','','','',''),
'thunderstorms-possiblysevere'=>array('Gewitter - m&ouml;glicherweise heftig','','','',''),
'timesofsunandclouds'=>array('zeitweise Sonne, zeitweise Wolken','','','',''),
'tropicalstormconditionslikely'=>array('Tropensturm wahrscheinlich','','','',''),
'tropicalstormconditionspossible'=>array('Tropensturm m&ouml;glich','','','',''),
'variablecloudinessandverywindy'=>array('unterschiedliche Bew&ouml;lkung und sehr windig','','','',''),
'variablecloudinessandwindy'=>array('unterschiedliche Bew&ouml;lkung und windig','','','',''),
'variableclouds'=>array('unterschiedliche Bew&ouml;lkung','','','',''),
'variablecloudsandwindy'=>array('unterschiedliche Bew&ouml;lkung und windig','','','',''),
'variablycloudy'=>array('unterschiedliche Bew&ouml;lkung','','','',''),
'verycold'=>array('sehr kalt','','','',''),
'veryhot'=>array('sehr heiss','','','',''),
'verystrongwinds'=>array('sehr starke Winde','','','',''),
'verywarm'=>array('sehr warm','','','',''),
'verywindy'=>array('sehr windig','','','',''),
'warm'=>array('warm','','','',''),
'warmandhumid'=>array('warm und feucht','','','',''),
'whichmaybeheavy'=>array('k&ouml;nnte kr&auml;ftig sein','','','',''),
'whichmaybeheavyattimes'=>array('k&ouml;nnte zeitweise kr&auml;ftig sein','','','',''),
'widelyscattered'=>array('weit verstreut','','','',''),
'widelyscatteredshowersandthunderstorms'=>array('weit verstreut Schauer und Gewitter','','','',''),
'widelyscatteredshowersorathunderstorm'=>array('weit verstreut Schauer oder Gewitter','','','',''),
'widelyscatteredshowersorthunderstormspossible'=>array('weit verstreut Schauer oder Gewitter m&ouml;glich','','','',''),
'windincreasing'=>array('zunehmender Wind','','','',''),
'windsdiminishing'=>array('diminshing Wind','','','',''),
'windy'=>array('windig','','','',''),
'windyand'=>array('windig','','','',''),
'windyandcloudy'=>array('windig und bew&ouml;lkt','','','',''),
'windyandpartlycloudyaftersomedrizzle'=>array('windig und bew&ouml;lkt nach etwas Nieselregen','','','',''),
'windyattimes'=>array('bei Zeiten windig','','','',''),
'windyconditions'=>array('windig','','','',''),
'windyconditionsandsnowshowers'=>array('windig, Schneeschauer','','','',''),
'withscatteredthunderstorms'=>array('strichweise Gewitter','','','',''),
'withsnowshowers'=>array('Schneeschauer','','','',''),
  // : Insert array End above
  
'   '=>array('','','','',''),
'  '=>array('','','','',''),
' '=>array('','','','',''),
''=>array('','','','',''),
  


    );  
      if(!isset($text_long[$term_in][0])or $text_long[$term_in][0]==""){
      $term_out=$term_in;
      $flag_translated=0;}
      else
      {$term_out=$text_long[$term_in][0];
      $flag_translated=1;}
      //echo "Totranslate:".$term_in.":ToTranslate ";
      //echo "IsTranslate:".$term_out.":IsTranslate "; 
    
     
      return array($term_out,$flag_translated);

}



  
?>    