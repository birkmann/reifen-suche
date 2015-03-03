<?php include "dbconnect.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Reifen Suche</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/main.css">
	<script src="js/main.js"></script>
</head>
<body id="body">
	<div class="page-content">

		<div class="basket-wrapper">

			<h3>Warenkorb</h3>

			<div class="basket">
				
			</div>

			<div class="total-price">
				
			</div>

			<form method="post" action="sendmail.php" class="contact-form hidden">

				<div class="row">
					<div class="col-md-06">
						<input type="text" name="input-first-name" id="input-first-name" placeholder="Vorname" required>
						<br>
						<input type="text" name="input-last-name" id="input-last-name" placeholder="Nachname" required>
						<br>
						<input type="phone" name="input-phone" id="input-phone" placeholder="Telefonnummer" required>
						<br>
						<input type="text" name="input-mail" id="input-mail" placeholder="E-Mail" required>
					</div>
					<div class="col-md-06">
						<textarea name="textarea-message" id="textarea-message" placeholder="Ihre Nachricht"></textarea>
						<input type="hidden" name="hidden-order" id="hidden-order">
					</div>
				</div>
				<input type="submit" value="Bestellen">

			</form>

		</div>

		<form  class="form-search" method="get" action="index.php" id="searchform">
			<div class="row">
				<label for="typ" class="left">Fahrzeugtyp</label>
				<select name="typ" id="typ">
					<option value="PKW" selected>PKW</option>
					<option value="Motorrad">Motorrad</option>
					<option value="Offroad">Offroad</option>
					<option value="LKW">LKW</option>
					<option value="LLKW">LLKW</option>
				</select>
			</div>

			<div class="row">
				<label for="weather" class="left">Reifentyp</label>
				<select name="wetter" id="wetter">
					<option value="s">Sommerreifen</option>
					<option value="w">Winterreifen</option>
					<option value="g">Ganzjahresreifen</option>
					<option value="">Andere</option>
				</select>
			</div>

			<div class="row">
				<label for="hersteller" class="left">Hersteller</label>
				<select id="hersteller" name="hersteller">

					<option value="all" selected>Alle</option>

					<?php

						$queryAllHersteller = "SELECT * FROM reifen group by `COL 6` ASC Limit 1,999999999";
						$resultAllHersteller = mysql_query($queryAllHersteller);
						$numAllHersteller = mysql_numrows($resultAllHersteller);

						$iHersteller = 0;

						for ($iHersteller; $iHersteller < $numAllHersteller; $iHersteller++) { 
							$tireHersteller = mysql_fetch_row($resultAllHersteller);
							echo "<option value=$tireHersteller[5]>" . $tireHersteller[5] . "</option>";
						}

					?>

				</select>
			</div>

			<div class="row">
				<label for="speed" class="left">Geschwindigkeit</label>
				<select name="speed" id="speed">
					<option value="all" selected>Alle</option>
					<option value="A2">A2 (bis 10km/h)</option>
					<option value="A3">A3 (bis 15 km/h)</option>
					<option value="A5">A5 (bis 25 km/h)</option>
					<option value="A6">A6 (bis 30 km/h)</option>
					<option value="A8">A8 (bis 40 km/h)</option>
					<option value="B">B (bis 50 km/h)</option>
					<option value="C">C (bis 60 km/h)</option>
					<option value="D">D (bis 65 km/h)</option>
					<option value="E">E (bis 70 km/h)</option>
					<option value="F">F (bis 80 km/h)</option>
					<option value="G">G (bis 90 km/h)</option>
					<option value="H">H (bis 210 km/h)</option>
					<option value="J">J (bis 100 km/h)</option>
					<option value="K">K (bis 110 km/h)</option>
					<option value="L">L (bis 120 km/h)</option>
					<option value="M">M (bis 130 km/h)</option>
					<option value="N">N (bis 140 km/h)</option>
					<option value="P">P (bis 150 km/h)</option>
					<option value="Q">Q (bis 160 km/h)</option>
					<option value="R">R (bis 170 km/h)</option>
					<option value="S">S (bis 180 km/h)</option>
					<option value="T">T (bis 190 km/h)</option>
					<option value="V">V (bis 240 km/h)</option>
					<option value="W">W (bis 270 km/h)</option>
					<option value="Y">Y (bis 300 km/h)</option>
					<option value="ZR">ZR (über 240 km/h)</option>
				</select>
			</div>

			<div class="row row-reifen-nummern">
				<div class="col-md-04">
					<label for="breite">Breite</label>
					<select name="breite" id="breite">
						<?php 

							$queryAllBreite = "SELECT * FROM reifen group by `COL 9` * 1 ASC Limit 1,999999999";
							$resultAllBreite = mysql_query($queryAllBreite);
							$numAllBreite = mysql_numrows($resultAllBreite);

							$iBreite = 0;

							for ($iBreite; $iBreite < $numAllBreite; $iBreite++) { 
								$tireBreite = mysql_fetch_row($resultAllBreite);
								if ($tireBreite[8] == 195) {
									echo "<option value=$tireBreite[8] selected>" . $tireBreite[8] . "</option>";
								} else {
									echo "<option value=$tireBreite[8]>" . $tireBreite[8] . "</option>";
								}
							}

						?>

					</select>
				</div>
				<div class="col-md-04">
					<label for="hoehe">Höhe</label>
					<select name="hoehe" id="hoehe">
						<?php 

							$queryAllHoehe = "SELECT * FROM reifen group by `COL 10` * 1 ASC Limit 1,999999999";
							$resultAllHoehe = mysql_query($queryAllHoehe);
							$numAllHoehe = mysql_numrows($resultAllHoehe);

							$iHoehe = 0;

							for ($iHoehe; $iHoehe < $numAllHoehe; $iHoehe++) { 
								$tireHoehe = mysql_fetch_row($resultAllHoehe);
								if ($tireHoehe[9] == 65) {
									echo "<option value=$tireHoehe[9] selected>" . $tireHoehe[9] . "</option>";
								} else {
									echo "<option value=$tireHoehe[9]>" . $tireHoehe[9] . "</option>";
								}
							}

						?>
					</select>
				</div>
				<div class="col-md-04">
					<label for="zoll">Zoll</label>
					<select name="zoll" id="zoll">
						<?php 

							$queryAllZoll = "SELECT * FROM reifen group by `COL 11` * 1 ASC Limit 1,999999999";
							$resultAllZoll = mysql_query($queryAllZoll);
							$numAllZoll = mysql_numrows($resultAllZoll);

							$iZoll = 0;

							for ($iZoll; $iZoll < $numAllZoll; $iZoll++) { 
								$tireZoll = mysql_fetch_row($resultAllZoll);
								if ($tireZoll[10] == 15) {
									echo "<option value=$tireZoll[10] selected>" . $tireZoll[10] . "</option>";
								} else {
									echo "<option value=$tireZoll[10]>" . $tireZoll[10] . "</option>";
								}
							}

							$iZoll = 0;

						?>
					</select>
				</div>
			</div>
			
			<div class="row">
				<input type="submit" name="submit" value="Reifen suchen">
			</div>

			<br>
			<a href="index.php" class="link-reset" id="jumpanchor">zurücksetzen</a>

		</form>



			<?php

				if(isset($_GET['submit'])) {
					echo "<div class=\"result-list\">";	
				}

				$typ = $_GET["typ"];
				$wetter = $_GET["wetter"];

				if ($wetter == "w") {
					$saison = "-Winterreifen";
				};
				if ($wetter == "s") {
					$saison = "-Sommerreifen";
				};
				if ($wetter == "g") {
					$saison = "-Ganzjahresreifen";
				};

				$hersteller = $_GET["hersteller"];
				$speed = $_GET["speed"];
				$breite = $_GET["breite"];
				$hoehe = $_GET["hoehe"];
				$zoll = $_GET["zoll"];

				if ($hersteller!="all" && $speed!="all") {
					$query = "SELECT * FROM reifen WHERE `COL 15`='$typ' AND `COL 14`='$wetter' AND `COL 6`='$hersteller' AND `COL 13`='$speed' AND `COL 9`='$breite' AND `COL 10`='$hoehe' AND `COL 11`='$zoll' ORDER BY `COL 4` * 1 ASC";
				}
				else if($hersteller!="all" && $speed=="all" ) {
					$query = "SELECT * FROM reifen WHERE `COL 15`='$typ' AND `COL 14`='$wetter' AND `COL 6`='$hersteller' AND `COL 9`='$breite' AND `COL 10`='$hoehe' AND `COL 11`='$zoll' ORDER BY `COL 4` * 1 ASC";
				}
				else if($hersteller=="all" && $speed!="all" ) {
					$query = "SELECT * FROM reifen WHERE `COL 15`='$typ' AND `COL 14`='$wetter' AND `COL 13`='$speed' AND `COL 9`='$breite' AND `COL 10`='$hoehe' AND `COL 11`='$zoll' ORDER BY `COL 4` * 1 ASC";
				}
				else if($hersteller=="all" && $speed=="all" ) {
					$query = "SELECT * FROM reifen WHERE `COL 15`='$typ' AND `COL 14`='$wetter' AND `COL 9`='$breite' AND `COL 10`='$hoehe' AND `COL 11`='$zoll' ORDER BY `COL 4` * 1 ASC";
				}

				$result = mysql_query($query);
				$num = mysql_numrows($result);

				$i=0;

				if(isset($_GET['submit'])) {
				
					if ($num == 0) {
						echo "<p class=\"error\">Leider konnten wir in unserem Sortiment keine zu Ihrer Suchanfrage passenden Reifen finden.<br>" .
								"Über die Anpassung der Filtereinstellungen oben können Sie Ihre Auswahl anpassen.<p/>";
					} else {
						echo $num . " Reifen gefunden";
					}

				}

				for ($i; $i < $num; $i++){
					$tire = mysql_fetch_row($result);

					$artikelnummer = $tire[0];
					$hersteller = $tire[5];
					$einkauf = $tire[3];
					$preis = str_replace(',', '.', $einkauf) + (str_replace(',', '.', $einkauf) * (19/100)) + 5;
					$preis = str_replace('.', ',', number_format($preis, 2));
					$bezeichnung = $tire[6];
					$querschnitt = $tire[8];
					$durchmesser = $tire[9];
					$zoll = $tire[10];
					$loadindex = $tire[11];
					$speedindex = $tire[12];
					$bauart = $tire[14];

					$kraftstoff = $tire[16];
					$haftung = $tire[17];
					$lautstaerke = $tire[18];

					
					echo "<div class=\"item\">
							<div class=\"row\">
								<div class=\"left col-md-03\">
									<div class=\"tire-wrapper\">
										<img src=\"http://shop.reifen-pabst.de/images/" . $bezeichnung . ".jpg\" alt=\"tire\" onError=\"this.onerror=null;this.src='img/tire.jpg';\" >
										<small>Grafik kann abweichen</small>
									</div>
								</div>
								<div class=\"center col-md-06\">
									<span class=\"type\">" . $bauart . $saison . "</span>
									<span class=\"name\"><b>" . $hersteller . "</b> " . $bezeichnung . "</span>
									<span class=\"artikelnummer hidden\">" . $artikelnummer . "</span>
									<span class=\"nubmers\">" . $querschnitt . "/" . $durchmesser . " R" . $zoll . " " . $loadindex . $speedindex . "</span>
									<br/>
									<span class=\"icons\">" . "<span class=\"kraftstoff\">" . $kraftstoff . "</span>" . "<span class=\"haftung\">" . $haftung . "</span>" . "<span class=\"lautstaerke\">" . $lautstaerke . " dB</span>" . "</span>
								</div>
								<div class=\"right col-md-03\">
									<div class=\"row row-price\">
										<span class=\"price\"><span class=\"value\">" . $preis . "</span> €<br><small class=\"mwst\">inkl 19% MwSt.</small></span>
									</div>
									<div class=\"row\">
										<div class=\"col-md-06\">
											
										</div>
										<div class=\"col-md-06\">
											<div class=\"number-wrapper\">
												<label for=\"menge\">Menge</label>
												<span class=\"plus\">+</span><span class=\"number\">0</span><span class=\"minus\">-</span>
											</div>
											<a class=\"in-basket\" href=\"#body\">Warenkorb</a>
											<a href=\"#\" class=\"remove-item\">entfernen</a>
										</div>
									</div>
								</div>
							</div>
						</div>";

				}

				mysql_close();

				if(isset($_GET['submit'])) {
					echo "</div>";	
				}

			?>


	</div>
</body>
</html>