<?php $this->layout('layout::standard') ?>
<main class="it-grid">
	<h2>Obrazac za delegate u obustavi</h2>
	<p>Molimo Vas da, kao delegat Vaše škole, u ime svog kolektiva popunite ovaj formular kako bismo Vas mogli kontaktirati u vezi sa finansijskom podrškom za prosvetne radnike u obustavi, uključujući i nastavno i nenastavno osoblje.</p>

	<?php if ( isset( $data['errors'] ) ) { ?>
		<div class="it-form-error">
			<?php
			foreach ( $data['errors'] as $key => $error ) {
				echo '<p>' . $error . '</p>';
			}
			?>
		</div>
	<?php }	?>

	<form method="post" action="obrazacDelegati" id="it-delegati-form" class="it-form" aria-label="Delegati forma" data-type="delegati">
        <?=$this->formToken(); ?>
		<div class="it-row-section it-col-num--2 it-responsive--predefined">
			<div class="it-row">
				<div class="it-column">
					<div class="it-form-field">
						<label for="email">Email *</label>
						<input type="email" name="email" id="email" size="40" maxlength="60" autocomplete="email" aria-required="true" aria-invalid="false" value="" required />
					</div>
				</div>
				<div class="it-column">
					<div class="it-form-field">
						<label for="full-name">Ime i Prezime *</label>
						<input type="text" name="name" id="full-name" aria-required="true" value="" required />
					</div>
				</div>
			</div>
		</div>
		<div class="it-row-section it-col-num--2 it-responsive--predefined">
			<div class="it-row">
				<div class="it-column">
					<div class="it-form-field">
						<label for="phone">Broj telefona *</label>
						<input type="tel" name="phone" id="phone" maxlength="20" aria-required="true" aria-invalid="false" value="" required="">
					</div>
				</div>
				<div class="it-column">
					<div class="it-form-field">
						<label for="school-type">Tip obrazovne ustanove *</label>
						<select name="schoolType" id="school-type" aria-required="true" required>
							<option value="OŠ">Osnovna škola</option>
							<option value="SŠ">Srednja stručna škola</option>
							<option value="G">Gimnazija</option>
						</select>
					</div>
				</div>
			</div>
		</div>
		<div class="it-row-section it-col-num--2 it-responsive--predefined">
			<div class="it-row">
				<div class="it-column">
					<div class="it-form-field">
						<label for="city">Mesto škole *</label>
						<select name="city" id="city" class="it-school-city" aria-required="true" required>
							<option value="Ada">Ada</option>
							<option value="Aleksandrovac">Aleksandrovac</option>
							<option value="Aleksinac">Aleksinac</option>
							<option value="Alibunar">Alibunar</option>
							<option value="Apatin">Apatin</option>
							<option value="Aranđelovac">Aranđelovac</option>
							<option value="Arilje">Arilje</option>
							<option value="Babušnica">Babušnica</option>
							<option value="Bajina Bašta">Bajina Bašta</option>
							<option value="Batočina">Batočina</option>
							<option value="Bač">Bač</option>
							<option value="Bačka Palanka">Bačka Palanka</option>
							<option value="Bačka Topola">Bačka Topola</option>
							<option value="Bački Petrovac">Bački Petrovac</option>
							<option value="Bela Palanka">Bela Palanka</option>
							<option value="Bela Crkva">Bela Crkva</option>
							<option value="Beograd - Barajevo">Beograd - Barajevo</option>
							<option value="Beograd - Voždovac">Beograd - Voždovac</option>
							<option value="Beograd - Vračar">Beograd - Vračar</option>
							<option value="Beograd - Grocka">Beograd - Grocka</option>
							<option value="Beograd - Zvezdara">Beograd - Zvezdara</option>
							<option value="Beograd - Zemun">Beograd - Zemun</option>
							<option value="Beograd - Lazarevac">Beograd - Lazarevac</option>
							<option value="Beograd - Mladenovac">Beograd - Mladenovac</option>
							<option value="Beograd - Novi Beograd">Beograd - Novi Beograd</option>
							<option value="Beograd - Obrenovac">Beograd - Obrenovac</option>
							<option value="Beograd - Palilula">Beograd - Palilula</option>
							<option value="Beograd - Rakovica">Beograd - Rakovica</option>
							<option value="Beograd - Savski Venac">Beograd - Savski Venac</option>
							<option value="Beograd - Sopot">Beograd - Sopot</option>
							<option value="Beograd - Stari Grad">Beograd - Stari Grad</option>
							<option value="Beograd - Surčin">Beograd - Surčin</option>
							<option value="Beograd - Čukarica">Beograd - Čukarica</option>
							<option value="Beočin">Beočin</option>
							<option value="Bečej">Bečej</option>
							<option value="Blace">Blace</option>
							<option value="Bogatić">Bogatić</option>
							<option value="Bojnik">Bojnik</option>
							<option value="Boljevac">Boljevac</option>
							<option value="Bor">Bor</option>
							<option value="Bosilegrad">Bosilegrad</option>
							<option value="Brus">Brus</option>
							<option value="Bujanovac">Bujanovac</option>
							<option value="Valjevo">Valjevo</option>
							<option value="Varvarin">Varvarin</option>
							<option value="Velika Plana">Velika Plana</option>
							<option value="Veliko Gradište">Veliko Gradište</option>
							<option value="Veliko Ropotovo">Veliko Ropotovo</option>
							<option value="Visibaba">Visibaba</option>
							<option value="Vladimirci">Vladimirci</option>
							<option value="Vladičin Han">Vladičin Han</option>
							<option value="Vlasotince">Vlasotince</option>
							<option value="Vranje">Vranje</option>
							<option value="Vranjska Banja">Vranjska Banja</option>
							<option value="Vrbas">Vrbas</option>
							<option value="Vrbovac">Vrbovac</option>
							<option value="Vrnjačka Banja">Vrnjačka Banja</option>
							<option value="Vršac">Vršac</option>
							<option value="Vučitrn">Vučitrn</option>
							<option value="Vučje">Vučje</option>
							<option value="Gadžin Han">Gadžin Han</option>
							<option value="Golubac">Golubac</option>
							<option value="Goraždevac">Goraždevac</option>
							<option value="Gornje Kusce">Gornje Kusce</option>
							<option value="Gornji Milanovac">Gornji Milanovac</option>
							<option value="Gračanica">Gračanica</option>
							<option value="Grdelica">Grdelica</option>
							<option value="Grocka">Grocka</option>
							<option value="Guča">Guča</option>
							<option value="Despotovac">Despotovac</option>
							<option value="Dimitrovgrad">Dimitrovgrad</option>
							<option value="Doljevac">Doljevac</option>
							<option value="Donja Gušterica">Donja Gušterica</option>
							<option value="Dragaš">Dragaš</option>
							<option value="Žabalj">Žabalj</option>
							<option value="Žabari">Žabari</option>
							<option value="Žagubica">Žagubica</option>
							<option value="Žitište">Žitište</option>
							<option value="Žitorađa">Žitorađa</option>
							<option value="Zaječar">Zaječar</option>
							<option value="Zvečan">Zvečan</option>
							<option value="Zrenjanin">Zrenjanin</option>
							<option value="Zubin Potok">Zubin Potok</option>
							<option value="Ivanjica">Ivanjica</option>
							<option value="Inđija">Inđija</option>
							<option value="Irig">Irig</option>
							<option value="Jagodina">Jagodina</option>
							<option value="Kanjiža">Kanjiža</option>
							<option value="Kikinda">Kikinda</option>
							<option value="Kladovo">Kladovo</option>
							<option value="Knić">Knić</option>
							<option value="Knjaževac">Knjaževac</option>
							<option value="Kovačica">Kovačica</option>
							<option value="Kovin">Kovin</option>
							<option value="Kosjerić">Kosjerić</option>
							<option value="Kosovska Kamenica">Kosovska Kamenica</option>
							<option value="Kosovska Mitrovica">Kosovska Mitrovica</option>
							<option value="Kostolac">Kostolac</option>
							<option value="Koceljeva">Koceljeva</option>
							<option value="Kragujevac">Kragujevac</option>
							<option value="Kraljevo">Kraljevo</option>
							<option value="Krupanj">Krupanj</option>
							<option value="Kruševac">Kruševac</option>
							<option value="Kula">Kula</option>
							<option value="Kuršumlija">Kuršumlija</option>
							<option value="Kučevo">Kučevo</option>
							<option value="Lazarevac">Lazarevac</option>
							<option value="Lajkovac">Lajkovac</option>
							<option value="Laplje Selo">Laplje Selo</option>
							<option value="Lapovo">Lapovo</option>
							<option value="Lebane">Lebane</option>
							<option value="Leposavić">Leposavić</option>
							<option value="Leskovac">Leskovac</option>
							<option value="Lešak">Lešak</option>
							<option value="Loznica">Loznica</option>
							<option value="Lučani">Lučani</option>
							<option value="Ljig">Ljig</option>
							<option value="Ljubovija">Ljubovija</option>
							<option value="Majdanpek">Majdanpek</option>
							<option value="Mali Zvornik">Mali Zvornik</option>
							<option value="Mali Iđoš">Mali Iđoš</option>
							<option value="Malo Crniće">Malo Crniće</option>
							<option value="Medveđa">Medveđa</option>
							<option value="Merošina">Merošina</option>
							<option value="Mionica">Mionica</option>
							<option value="Mladenovac">Mladenovac</option>
							<option value="Negotin">Negotin</option>
							<option value="Niš">Niš</option>
							<option value="Niška Banja">Niška Banja</option>
							<option value="Nova Varoš">Nova Varoš</option>
							<option value="Nova Crnja">Nova Crnja</option>
							<option value="Novi Bečej">Novi Bečej</option>
							<option value="Novi Kneževac">Novi Kneževac</option>
							<option value="Novi Pazar">Novi Pazar</option>
							<option value="Novi Sad">Novi Sad</option>
							<option value="Obrenovac">Obrenovac</option>
							<option value="Opovo">Opovo</option>
							<option value="Orahovac">Orahovac</option>
							<option value="Osečina">Osečina</option>
							<option value="Odžaci">Odžaci</option>
							<option value="Pančevo">Pančevo</option>
							<option value="Paraćin">Paraćin</option>
							<option value="Petrovaradin">Petrovaradin</option>
							<option value="Petrovac na Mlavi">Petrovac na Mlavi</option>
							<option value="Pećinci">Pećinci</option>
							<option value="Pirot">Pirot</option>
							<option value="Plandište">Plandište</option>
							<option value="Požarevac">Požarevac</option>
							<option value="Požega">Požega</option>
							<option value="Preoce">Preoce</option>
							<option value="Preševo">Preševo</option>
							<option value="Priboj">Priboj</option>
							<option value="Prijepolje">Prijepolje</option>
							<option value="Prilužje">Prilužje</option>
							<option value="Prokuplje">Prokuplje</option>
							<option value="Ražanj">Ražanj</option>
							<option value="Ranilug">Ranilug</option>
							<option value="Rača">Rača</option>
							<option value="Raška">Raška</option>
							<option value="Rekovac">Rekovac</option>
							<option value="Ruma">Ruma</option>
							<option value="Ruski Krstur">Ruski Krstur</option>
							<option value="Svilajnac">Svilajnac</option>
							<option value="Svrljig">Svrljig</option>
							<option value="Senta">Senta</option>
							<option value="Sečanj">Sečanj</option>
							<option value="Sjenica">Sjenica</option>
							<option value="Smederevo">Smederevo</option>
							<option value="Smederevska Palanka">Smederevska Palanka</option>
							<option value="Sokobanja">Sokobanja</option>
							<option value="Sombor">Sombor</option>
							<option value="Sopot">Sopot</option>
							<option value="Srbobran">Srbobran</option>
							<option value="Sremska Mitrovica">Sremska Mitrovica</option>
							<option value="Sremski Karlovci">Sremski Karlovci</option>
							<option value="Srpska Crnja">Srpska Crnja</option>
							<option value="Stanišor">Stanišor</option>
							<option value="Stara Pazova">Stara Pazova</option>
							<option value="Subotica">Subotica</option>
							<option value="Suvo Grlo">Suvo Grlo</option>
							<option value="Surdulica">Surdulica</option>
							<option value="Sušica">Sušica</option>
							<option value="Temerin">Temerin</option>
							<option value="Titel">Titel</option>
							<option value="Topola">Topola</option>
							<option value="Trgovište">Trgovište</option>
							<option value="Trstenik">Trstenik</option>
							<option value="Tutin">Tutin</option>
							<option value="Ćićevac">Ćićevac</option>
							<option value="Ćuprija">Ćuprija</option>
							<option value="Ub">Ub</option>
							<option value="Užice">Užice</option>
							<option value="Umka">Umka</option>
							<option value="Futog">Futog</option>
							<option value="Crvenka">Crvenka</option>
							<option value="Crna Trava">Crna Trava</option>
							<option value="Čajetina">Čajetina</option>
							<option value="Čačak">Čačak</option>
							<option value="Čoka">Čoka</option>
							<option value="Šabac">Šabac</option>
							<option value="Šid">Šid</option>
							<option value="Šilovo">Šilovo</option>
							<option value="Štrpce">Štrpce</option>
						</select>
					</div>
				</div>
				<div class="it-column">
					<div class="it-form-field">
						<label>Naziv škole *</label>
						<input type="hidden" name="schoolName" id="school-name" class="it-school-value" value="" aria-required="true" required />
						<select class="it-school-name" data-city="Ada">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Novak Radonić' Mol">Osnovna škola 'Novak Radonić' Mol</option>
							<option value="Osnovna škola 'Čeh Karolj'">Osnovna škola 'Čeh Karolj'</option>
							<option value="Tehnička škola">Tehnička škola</option>
							<option value="Škola za muzičko obrazovanje i vaspitanje 'Barok Bela'">Škola za muzičko obrazovanje i vaspitanje 'Barok Bela'</option>
						</select>
						<select class="it-school-name" data-city="Aleksandrovac">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'ACA ALEKSIĆ'">Osnovna škola 'ACA ALEKSIĆ'</option>
							<option value="Osnovna škola 'Ivo Lola Ribar'">Osnovna škola 'Ivo Lola Ribar'</option>
							<option value="Srednja škola Sveti Trifun">Srednja škola Sveti Trifun</option>
						</select>
						<select class="it-school-name" data-city="Aleksinac">
							<option value="">Izaberite školu</option>
							<option value="Muzička škola 'Vladimir Đorđević'">Muzička škola 'Vladimir Đorđević'</option>
							<option value="Osnovna škola 'Aca Sinadinovič' Loćika">Osnovna škola 'Aca Sinadinovič' Loćika</option>
							<option value="Osnovna škola 'Vožd Karađorđe'">Osnovna škola 'Vožd Karađorđe'</option>
							<option value="Osnovna škola 'Vuk Karadžić' Žitkovac">Osnovna škola 'Vuk Karadžić' Žitkovac</option>
							<option value="Osnovna škola 'Desanka Maksimović' Katun">Osnovna škola 'Desanka Maksimović' Katun</option>
							<option value="Osnovna škola 'Jovan Jovanović Zmaj' Aleksinački Rudnik">Osnovna škola 'Jovan Jovanović Zmaj' Aleksinački Rudnik</option>
							<option value="Osnovna škola 'Ljupče Nikolić'">Osnovna škola 'Ljupče Nikolić'</option>
							<option value="Osnovna škola 'Sveti Sava' Subotinac">Osnovna škola 'Sveti Sava' Subotinac</option>
							<option value="Osnovna škola 'Stojan Živković Stole' Trnjane">Osnovna škola 'Stojan Živković Stole' Trnjane</option>
							<option value="Osnovna škola 'Smeh i suza'">Osnovna škola 'Smeh i suza'</option>
							<option value="Aleksinačka gimnazija">Aleksinačka gimnazija</option>
							<option value="Poljoprivredna škola Šumatovac">Poljoprivredna škola Šumatovac</option>
							<option value="Tehnička škola Prota Stevan Dimitrijević">Tehnička škola Prota Stevan Dimitrijević</option>
						</select>
						<select class="it-school-name" data-city="Alibunar">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola '1. maj' Vladimirovac">Osnovna škola '1. maj' Vladimirovac</option>
							<option value="Osnovna škola '2. oktobar' Nikolinci">Osnovna škola '2. oktobar' Nikolinci</option>
							<option value="Osnovna škola '3. oktobar' Lokve">Osnovna škola '3. oktobar' Lokve</option>
							<option value="Osnovna škola 'Bratstvo jedinstvo'">Osnovna škola 'Bratstvo jedinstvo'</option>
							<option value="Osnovna škola 'Dušan Jerković' Banatski Karlovac">Osnovna škola 'Dušan Jerković' Banatski Karlovac</option>
							<option value="Osnovna škola 'Miloš Crnjanski' Ilandža">Osnovna škola 'Miloš Crnjanski' Ilandža</option>
							<option value="Osnovna škola 'Sava Veljković' Dobrica">Osnovna škola 'Sava Veljković' Dobrica</option>
							<option value="Osnovna škola 'Tomaš Garig Masarik' Janošik">Osnovna škola 'Tomaš Garig Masarik' Janošik</option>
							<option value="Ekonomsko-trgovinska škola">Ekonomsko-trgovinska škola</option>
						</select>
						<select class="it-school-name" data-city="Apatin">
							<option value="">Izaberite školu</option>
							<option value="Muzička škola 'Stevan Hristić'">Muzička škola 'Stevan Hristić'</option>
							<option value="Osnovna škola 'Žarko Zrenjanin'">Osnovna škola 'Žarko Zrenjanin'</option>
							<option value="Osnovna škola 'Ivan Goran Kovačić' Sonta">Osnovna škola 'Ivan Goran Kovačić' Sonta</option>
							<option value="Osnovna škola 'Jozef Atila' Kupusina">Osnovna škola 'Jozef Atila' Kupusina</option>
							<option value="Osnovna škola 'Kiš Ferenc' Svilojevo">Osnovna škola 'Kiš Ferenc' Svilojevo</option>
							<option value="Osnovna škola 'Mladost' Prigrevica">Osnovna škola 'Mladost' Prigrevica</option>
							<option value="Gimnazija i stručna škola">Gimnazija i stručna škola</option>
							<option value="Tehnička škola">Tehnička škola</option>
						</select>
						<select class="it-school-name" data-city="Aranđelovac">
							<option value="">Izaberite školu</option>
							<option value="Osnovna muzička škola 'Petar Ilić'">Osnovna muzička škola 'Petar Ilić'</option>
							<option value="Osnovna škola 'Velja Gerasimović' Venčane">Osnovna škola 'Velja Gerasimović' Venčane</option>
							<option value="Osnovna škola 'Vuk Karadžić' Stojnik">Osnovna škola 'Vuk Karadžić' Stojnik</option>
							<option value="Osnovna škola 'Dušan Radonjić' Banja">Osnovna škola 'Dušan Radonjić' Banja</option>
							<option value="Osnovna škola 'Ilija Garašanin'">Osnovna škola 'Ilija Garašanin'</option>
							<option value="Osnovna škola 'Ljubomir Ljuba Nenadović' Ranilović">Osnovna škola 'Ljubomir Ljuba Nenadović' Ranilović</option>
							<option value="Osnovna škola 'Milan Ilić Čiča'">Osnovna škola 'Milan Ilić Čiča'</option>
							<option value="Osnovna škola 'Miloš Obrenović'">Osnovna škola 'Miloš Obrenović'</option>
							<option value="Osnovna škola 'Prvi srpski ustanak' Orašac">Osnovna škola 'Prvi srpski ustanak' Orašac</option>
							<option value="Osnovna škola 'Sveti Sava'">Osnovna škola 'Sveti Sava'</option>
							<option value="Osnovna škola 'Slavko Popović' Darosava">Osnovna škola 'Slavko Popović' Darosava</option>
							<option value="Osnovna škola 'Svetolik Ranković'">Osnovna škola 'Svetolik Ranković'</option>
							<option value="Gimnazija Miloš Savković">Gimnazija Miloš Savković</option>
							<option value="Ekonomsko-ugostiteljska škola Slobodan Minić">Ekonomsko-ugostiteljska škola Slobodan Minić</option>
							<option value="Tehnička škola Mileta Nikolić">Tehnička škola Mileta Nikolić</option>
						</select>
						<select class="it-school-name" data-city="Arilje">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Stevan Čolović'">Osnovna škola 'Stevan Čolović'</option>
							<option value="Osnovna škola 'Brekovo' Brekovo">Osnovna škola 'Brekovo' Brekovo</option>
							<option value="Osnovna škola 'Jezdimir Tripković' Latvica">Osnovna škola 'Jezdimir Tripković' Latvica</option>
							<option value="Osnovna škola 'Ratko Jovanović' Kruščica">Osnovna škola 'Ratko Jovanović' Kruščica</option>
							<option value="Srednja škola Sveti Ahilije">Srednja škola Sveti Ahilije</option>
						</select>
						<select class="it-school-name" data-city="Babušnica">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'BRATSTVO' Zvonce">Osnovna škola 'BRATSTVO' Zvonce</option>
							<option value="Osnovna škola 'Despot Stefan Lazarević'">Osnovna škola 'Despot Stefan Lazarević'</option>
							<option value="Osnovna škola 'Mladost' Veliko Bonjince">Osnovna škola 'Mladost' Veliko Bonjince</option>
							<option value="Osnovna škola 'Svetozar Marković' Ljuberađa">Osnovna škola 'Svetozar Marković' Ljuberađa</option>
							<option value="Osnovna škola 'Dobrinka Bogdanović' Strelac">Osnovna škola 'Dobrinka Bogdanović' Strelac</option>
							<option value="Srednja škola">Srednja škola</option>
						</select>
						<select class="it-school-name" data-city="Bajina Bašta">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Dušan Jerković' Kostojevići">Osnovna škola 'Dušan Jerković' Kostojevići</option>
							<option value="Osnovna škola 'Rajak Pavićević'">Osnovna škola 'Rajak Pavićević'</option>
							<option value="Osnovna škola 'Sveti Sava'">Osnovna škola 'Sveti Sava'</option>
							<option value="Osnovna škola 'Stevan Joksimović' Rogačica">Osnovna škola 'Stevan Joksimović' Rogačica</option>
							<option value="Gimnazija Josif Pančić">Gimnazija Josif Pančić</option>
							<option value="Tehnička škola">Tehnička škola</option>
						</select>
						<select class="it-school-name" data-city="Barajevo">
							<option value="">Izaberite školu</option>
							<option value="Srednja škola">Srednja škola</option>
						</select>
						<select class="it-school-name" data-city="Batočina">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Sveti Sava'">Osnovna škola 'Sveti Sava'</option>
							<option value="Srednja škola Nikola Tesla">Srednja škola Nikola Tesla</option>
						</select>
						<select class="it-school-name" data-city="Bač">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Aleksa Šantić' Vajska">Osnovna škola 'Aleksa Šantić' Vajska</option>
							<option value="Osnovna škola 'Vuk Karadžić'">Osnovna škola 'Vuk Karadžić'</option>
							<option value="Osnovna škola 'Ivo Lola Ribar' Plavna">Osnovna škola 'Ivo Lola Ribar' Plavna</option>
							<option value="Osnovna škola 'Jan Kolar' Selenča">Osnovna škola 'Jan Kolar' Selenča</option>
							<option value="Osnovna škola 'Moša Pijade' Bačko Novo Selo">Osnovna škola 'Moša Pijade' Bačko Novo Selo</option>
							<option value="Poljoprivredna škola">Poljoprivredna škola</option>
						</select>
						<select class="it-school-name" data-city="Bačka Palanka">
							<option value="">Izaberite školu</option>
							<option value="Muzička škola 'Stevan Hristić'">Muzička škola 'Stevan Hristić'</option>
							<option value="Osnovna škola '15. oktobar' Pivnice">Osnovna škola '15. oktobar' Pivnice</option>
							<option value="Osnovna škola 'Aleksa Šantić' Gajdobra">Osnovna škola 'Aleksa Šantić' Gajdobra</option>
							<option value="Osnovna škola 'Braća Novakov' Silbaš">Osnovna škola 'Braća Novakov' Silbaš</option>
							<option value="Osnovna škola 'Vuk Karadžić'">Osnovna škola 'Vuk Karadžić'</option>
							<option value="Osnovna škola 'Desanka Maksimović'">Osnovna škola 'Desanka Maksimović'</option>
							<option value="Osnovna škola 'Žarko Zrenjanin' Obrovac">Osnovna škola 'Žarko Zrenjanin' Obrovac</option>
							<option value="Osnovna škola 'Zdravko Čelar' Čelarevo">Osnovna škola 'Zdravko Čelar' Čelarevo</option>
							<option value="Osnovna škola 'Mileta Protić' Tovariševo">Osnovna škola 'Mileta Protić' Tovariševo</option>
							<option value="Osnovna škola 'Sveti Sava'">Osnovna škola 'Sveti Sava'</option>
							<option value="Osnovna škola 'Heroj Pinki'">Osnovna škola 'Heroj Pinki'</option>
							<option value="Osnovna škola 'Branko Ćopić' Mladenovo">Osnovna škola 'Branko Ćopić' Mladenovo</option>
							<option value="Gimnazija 20. oktobar">Gimnazija 20. oktobar</option>
							<option value="Srednja stručna škola Radivoj Uvalić">Srednja stručna škola Radivoj Uvalić</option>
							<option value="Tehnička škola 9. Maj">Tehnička škola 9. Maj</option>
						</select>
						<select class="it-school-name" data-city="Bačka Topola">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola '18.oktobar' Novo Orahovo">Osnovna škola '18.oktobar' Novo Orahovo</option>
							<option value="Osnovna škola 'Bratstvo jedinstvo' Bajša">Osnovna škola 'Bratstvo jedinstvo' Bajša</option>
							<option value="Osnovna škola 'Vuk Karadžić' Krivaja">Osnovna škola 'Vuk Karadžić' Krivaja</option>
							<option value="Osnovna škola 'Doža Đerđ' Gunaroš">Osnovna škola 'Doža Đerđ' Gunaroš</option>
							<option value="Osnovna škola 'Nikola Tesla'">Osnovna škola 'Nikola Tesla'</option>
							<option value="Osnovna škola 'Čaki Lajoš'">Osnovna škola 'Čaki Lajoš'</option>
							<option value="Osnovna Škola 'Moša Pijade' Pačir">Osnovna Škola 'Moša Pijade' Pačir</option>
							<option value="Osnovna škola 'Stari kovač Đula' Stara Moravica">Osnovna škola 'Stari kovač Đula' Stara Moravica</option>
							<option value="Gimnazija i ekonomska škola Dositej Obradović">Gimnazija i ekonomska škola Dositej Obradović</option>
							<option value="Poljoprivredna škola">Poljoprivredna škola</option>
							<option value="Srednja tehnička škola Šinković Jožef">Srednja tehnička škola Šinković Jožef</option>
							<option value="Škola za osnovno muzičko obrazovanje">Škola za osnovno muzičko obrazovanje</option>
						</select>
						<select class="it-school-name" data-city="Bački Petrovac">
							<option value="">Izaberite školu</option>
							<option value="Osnovna Škola 'Žarko Zrenjanin' Maglić">Osnovna Škola 'Žarko Zrenjanin' Maglić</option>
							<option value="Osnovna škola 'Jan Amos Komenski' Kulpin">Osnovna škola 'Jan Amos Komenski' Kulpin</option>
							<option value="Osnovna škola 'Jan Čajak'">Osnovna škola 'Jan Čajak'</option>
							<option value="Osnovna škola 'Jožef Marčok Dragutin' Gložan">Osnovna škola 'Jožef Marčok Dragutin' Gložan</option>
							<option value="Gimnazija Jan Kolar">Gimnazija Jan Kolar</option>
						</select>
						<select class="it-school-name" data-city="Bela Palanka">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Jovan Aranđelović' Crvena Reka">Osnovna škola 'Jovan Aranđelović' Crvena Reka</option>
							<option value="Osnovna škola 'Ljupče Španac'">Osnovna škola 'Ljupče Španac'</option>
							<option value="Srednja škola Niketa Remezijanski">Srednja škola Niketa Remezijanski</option>
						</select>
						<select class="it-school-name" data-city="Bela Crkva">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Dositej Obradović'">Osnovna škola 'Dositej Obradović'</option>
							<option value="Osnovna škola 'Đorđe Maletić' Jasenovo">Osnovna škola 'Đorđe Maletić' Jasenovo</option>
							<option value="Osnovna škola 'Žarko Zrenjanin'">Osnovna škola 'Žarko Zrenjanin'</option>
							<option value="Osnovna škola 'Mara Janković' Kusić">Osnovna škola 'Mara Janković' Kusić</option>
							<option value="Osnovna škola 'Marko Stojanović' Vračev Gaj">Osnovna škola 'Marko Stojanović' Vračev Gaj</option>
							<option value="Osnovna škola 'Mihail Sadoveanu' Grebenac">Osnovna škola 'Mihail Sadoveanu' Grebenac</option>
							<option value="Osnovna škola 'Sava Munćan' Kruščica">Osnovna škola 'Sava Munćan' Kruščica</option>
							<option value="Belocrkvanska gimnazija i ekonomska škola">Belocrkvanska gimnazija i ekonomska škola</option>
							<option value="Tehnička škola Sava Munćan">Tehnička škola Sava Munćan</option>
						</select>
						<select class="it-school-name" data-city="Beograd - Barajevo">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Knez Sima Marković'">Osnovna škola 'Knez Sima Marković'</option>
							<option value="Osnovna škola 'Pavle Popović'">Osnovna škola 'Pavle Popović'</option>
						</select>
						<select class="it-school-name" data-city="Beograd - Voždovac">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Bora Stanković'">Osnovna škola 'Bora Stanković'</option>
							<option value="Osnovna muzička škola 'Petar Konjović'">Osnovna muzička škola 'Petar Konjović'</option>
							<option value="Osnovna škola 'Branislav Nušić'">Osnovna škola 'Branislav Nušić'</option>
							<option value="Osnovna škola 'Vasa Čarapić'">Osnovna škola 'Vasa Čarapić'</option>
							<option value="Osnovna škola 'Veselin Masleša'">Osnovna škola 'Veselin Masleša'</option>
							<option value="Osnovna škola 'Vojvoda Putnik'">Osnovna škola 'Vojvoda Putnik'</option>
							<option value="Osnovna Škola 'Vojvoda Stepa'">Osnovna Škola 'Vojvoda Stepa'</option>
							<option value="Osnovna škola 'Vuk Karadžić'">Osnovna škola 'Vuk Karadžić'</option>
							<option value="Osnovna škola 'Dositej Obradović'">Osnovna škola 'Dositej Obradović'</option>
							<option value="Osnovna škola 'Đura Daničić'">Osnovna škola 'Đura Daničić'</option>
							<option value="Osnovna škola 'Zmaj Jova Jovanović'">Osnovna škola 'Zmaj Jova Jovanović'</option>
							<option value="Osnovna škola 'Janko Veselinović'">Osnovna škola 'Janko Veselinović'</option>
							<option value="Osnovna škola 'Karađorđe'">Osnovna škola 'Karađorđe'</option>
							<option value="Osnovna škola 'Milan Đ. Milićević'">Osnovna škola 'Milan Đ. Milićević'</option>
							<option value="Osnovna škola 'Filip Filipović'">Osnovna škola 'Filip Filipović'</option>
							<option value="Osnovna škola 'Danilo Kiš'">Osnovna škola 'Danilo Kiš'</option>
							<option value="Osnovna škola 'Jajinci'">Osnovna škola 'Jajinci'</option>
							<option value="Specijalna škola 'Miodrag Matić'">Specijalna škola 'Miodrag Matić'</option>
							<option value="Geološka i hidrometeorološka škola Milutin Milanković">Geološka i hidrometeorološka škola Milutin Milanković</option>
							<option value="Dvanaesta beogradska gimnazija">Dvanaesta beogradska gimnazija</option>
							<option value="Druga ekonomska škola">Druga ekonomska škola</option>
							<option value="Osma beogradska gimnazija">Osma beogradska gimnazija</option>
							<option value="Tehnička škola za dizajn kože">Tehnička škola za dizajn kože</option>
							<option value="Škola za dizajn tekstila">Škola za dizajn tekstila</option>
							<option value="Škola za negu lepote">Škola za negu lepote</option>
							<option value="Škola za osnovno i srednje obrazovanje Vožd">Škola za osnovno i srednje obrazovanje Vožd</option>
						</select>
						<select class="it-school-name" data-city="Beograd - Vračar">
							<option value="">Izaberite školu</option>
							<option value="Muzička škola 'Josip Slavenski'">Muzička škola 'Josip Slavenski'</option>
							<option value="Muzička škola 'Josif Marinković'">Muzička škola 'Josif Marinković'</option>
							<option value="Muzička škola 'Stanković'">Muzička škola 'Stanković'</option>
							<option value="Osnovna škola 'Vladislav Ribnikar'">Osnovna škola 'Vladislav Ribnikar'</option>
							<option value="Osnovna škola 'Jovan Miodragović'">Osnovna škola 'Jovan Miodragović'</option>
							<option value="Osnovna škola 'Kralj Petar II Karađorđević'">Osnovna škola 'Kralj Petar II Karađorđević'</option>
							<option value="Osnovna škola 'NH Siniša Nikolajević'">Osnovna škola 'NH Siniša Nikolajević'</option>
							<option value="Osnovna škola 'Sveti Sava'">Osnovna škola 'Sveti Sava'</option>
							<option value="Osnovna škola 'Svetozar Marković'">Osnovna škola 'Svetozar Marković'</option>
							<option value="Specijalna škola 'Dušan Dugalić'">Specijalna škola 'Dušan Dugalić'</option>
							<option value="Arhitektonska tehnička škola">Arhitektonska tehnička škola</option>
							<option value="Muzička škola Josip Slavenski">Muzička škola Josip Slavenski</option>
							<option value="Muzička škola Josif Marinković">Muzička škola Josif Marinković</option>
							<option value="Muzička škola Stanković">Muzička škola Stanković</option>
							<option value="Privatna gimnazija Vladislav Petković Dis">Privatna gimnazija Vladislav Petković Dis</option>
							<option value="Tehnička škola GSP">Tehnička škola GSP</option>
							<option value="Treća beogradska gimnazija">Treća beogradska gimnazija</option>
							<option value="Četrnaesta beogradska gimnazija">Četrnaesta beogradska gimnazija</option>
						</select>
						<select class="it-school-name" data-city="Beograd - Grocka">
							<option value="">Izaberite školu</option>
							<option value="Osnovna muzička škola 'Nevena Popović'">Osnovna muzička škola 'Nevena Popović'</option>
							<option value="Osnovna škola 'Aleksa Šantić'">Osnovna škola 'Aleksa Šantić'</option>
							<option value="Osnovna škola 'Ilija Garašanin'">Osnovna škola 'Ilija Garašanin'</option>
							<option value="Osnovna škola 'Miloje Vasić'">Osnovna škola 'Miloje Vasić'</option>
							<option value="Osnovna škola 'Mića Stojković'">Osnovna škola 'Mića Stojković'</option>
							<option value="Osnovna škola 'Nikola Tesla'">Osnovna škola 'Nikola Tesla'</option>
							<option value="Osnovna škola 'Sveti Sava' Vrčin">Osnovna škola 'Sveti Sava' Vrčin</option>
							<option value="Osnovna škola 'Ivo Lola Ribar'">Osnovna škola 'Ivo Lola Ribar'</option>
						</select>
						<select class="it-school-name" data-city="Beograd - Zvezdara">
							<option value="">Izaberite školu</option>
							<option value="Muzička škola 'Vladimir Đorđević'">Muzička škola 'Vladimir Đorđević'</option>
							<option value="Osnovna škola '1300 kaplara'">Osnovna škola '1300 kaplara'</option>
							<option value="Osnovna škola 'Veljko Dugošević'">Osnovna škola 'Veljko Dugošević'</option>
							<option value="Osnovna škola 'Vladislav Petković Dis'">Osnovna škola 'Vladislav Petković Dis'</option>
							<option value="Osnovna škola 'Desanka Maksimović'">Osnovna škola 'Desanka Maksimović'</option>
							<option value="Osnovna škola 'Despot Stefan Lazarević'">Osnovna škola 'Despot Stefan Lazarević'</option>
							<option value="Osnovna škola 'Dragojlo Dudić'">Osnovna škola 'Dragojlo Dudić'</option>
							<option value="Osnovna škola 'Ivan Goran Kovačić'">Osnovna škola 'Ivan Goran Kovačić'</option>
							<option value="Osnovna škola 'Jelena Ćetković'">Osnovna škola 'Jelena Ćetković'</option>
							<option value="Osnovna škola 'Marija Bursać'">Osnovna škola 'Marija Bursać'</option>
							<option value="Osnovna škola 'Pavle Savić'">Osnovna škola 'Pavle Savić'</option>
							<option value="Osnovna škola 'Stevan Sinđelić'">Osnovna škola 'Stevan Sinđelić'</option>
							<option value="Osnovna škola 'Ćirilo i Metodije'">Osnovna škola 'Ćirilo i Metodije'</option>
							<option value="Specijalna škola 'Boško Buha'">Specijalna škola 'Boško Buha'</option>
							<option value="Geodetska tehnička škola">Geodetska tehnička škola</option>
							<option value="Gimnazija Singidunum">Gimnazija Singidunum</option>
							<option value="Građevinska škola">Građevinska škola</option>
							<option value="Građevinsko tehnička škola Branko Žeželj">Građevinsko tehnička škola Branko Žeželj</option>
							<option value="Zubotehnička škola">Zubotehnička škola</option>
							<option value="Medicinska škola">Medicinska škola</option>
							<option value="Sedma beogradska gimnazija">Sedma beogradska gimnazija</option>
							<option value="Tehnoart Beograd - škola za mašinstvo i umetničke zanate">Tehnoart Beograd - škola za mašinstvo i umetničke zanate</option>
							<option value="Farmaceutsko - fizioterapeutska škola">Farmaceutsko - fizioterapeutska škola</option>
							<option value="Šesta beogradska gimnazija">Šesta beogradska gimnazija</option>
						</select>
						<select class="it-school-name" data-city="Beograd - Zemun">
							<option value="">Izaberite školu</option>
							<option value="Muzička škola 'Kosta Manojlović'">Muzička škola 'Kosta Manojlović'</option>
							<option value="Osnovna škola 'Branko Radičević'">Osnovna škola 'Branko Radičević'</option>
							<option value="Osnovna škola 'Gavrilo Princip'">Osnovna škola 'Gavrilo Princip'</option>
							<option value="Osnovna škola 'Gornja Varoš'">Osnovna škola 'Gornja Varoš'</option>
							<option value="Osnovna škola 'Ilija Birčanin'">Osnovna škola 'Ilija Birčanin'</option>
							<option value="Osnovna škola 'Majka Jugovića'">Osnovna škola 'Majka Jugovića'</option>
							<option value="Osnovna škola 'Mihajlo Pupin'">Osnovna škola 'Mihajlo Pupin'</option>
							<option value="Osnovna škola 'Petar Kočić'">Osnovna škola 'Petar Kočić'</option>
							<option value="Osnovna škola 'Rade Končar'">Osnovna škola 'Rade Končar'</option>
							<option value="Osnovna škola 'Sava Jovanović Sirogojno'">Osnovna škola 'Sava Jovanović Sirogojno'</option>
							<option value="Osnovna škola 'Sava Šumanović'">Osnovna škola 'Sava Šumanović'</option>
							<option value="Osnovna škola 'Svetislav Golubović Mitraljeta'">Osnovna škola 'Svetislav Golubović Mitraljeta'</option>
							<option value="Osnovna škola 'Svetozar Miletić'">Osnovna škola 'Svetozar Miletić'</option>
							<option value="Osnovna škola 'Sonja Marinković'">Osnovna škola 'Sonja Marinković'</option>
							<option value="Osnovna škola 'Stanko Marić'">Osnovna škola 'Stanko Marić'</option>
							<option value="Osnovna škola 'Sutjeska'">Osnovna škola 'Sutjeska'</option>
							<option value="Osnovna škola 'Boško Palkovljević-Pinki'">Osnovna škola 'Boško Palkovljević-Pinki'</option>
							<option value="Osnovna škola 'Lazar Savatić'">Osnovna škola 'Lazar Savatić'</option>
							<option value="Specijalna škola 'Radivoj Popović'">Specijalna škola 'Radivoj Popović'</option>
							<option value="Škola 'Branko Pešić'">Škola 'Branko Pešić'</option>
							<option value="Ekonomska škola Nada Dimić">Ekonomska škola Nada Dimić</option>
							<option value="Elektrotehnička škola Zemun">Elektrotehnička škola Zemun</option>
							<option value="Zemunska gimnazija">Zemunska gimnazija</option>
							<option value="Medicinska škola Nadežda Petrović">Medicinska škola Nadežda Petrović</option>
							<option value="Muzička škola Kosta Manojlović">Muzička škola Kosta Manojlović</option>
							<option value="Politehnika - škola za nove tehnologije">Politehnika - škola za nove tehnologije</option>
							<option value="Pravno-birotehnička škola Dimitrije Davidović">Pravno-birotehnička škola Dimitrije Davidović</option>
							<option value="Savremena gimnazija">Savremena gimnazija</option>
							<option value="Saobraćajno-tehnička škola">Saobraćajno-tehnička škola</option>
							<option value="Srednja pravno ekonomska škola">Srednja pravno ekonomska škola</option>
							<option value="Srednja škola za informacione tehnologije">Srednja škola za informacione tehnologije</option>
							<option value="Škola za učenike oštećenog vida Veljko Ramadanović">Škola za učenike oštećenog vida Veljko Ramadanović</option>
						</select>
						<select class="it-school-name" data-city="Beograd - Lazarevac">
							<option value="">Izaberite školu</option>
							<option value="Muzička škola 'Marko Tajčević'">Muzička škola 'Marko Tajčević'</option>
							<option value="Osnovna škola 'Vojislav Voka Savić'">Osnovna škola 'Vojislav Voka Savić'</option>
							<option value="Osnovna škola 'Dule Karaklajić'">Osnovna škola 'Dule Karaklajić'</option>
							<option value="Osnovna škola 'Knez Lazar'">Osnovna škola 'Knez Lazar'</option>
							<option value="Osnovna škola 'Milorad Labudović Labud'">Osnovna škola 'Milorad Labudović Labud'</option>
							<option value="Osnovna škola 'Rudovci'">Osnovna škola 'Rudovci'</option>
							<option value="Osnovna škola 'Sveti Sava'">Osnovna škola 'Sveti Sava'</option>
							<option value="Osnovna škola 'Slobodan Penezić Krcun'">Osnovna škola 'Slobodan Penezić Krcun'</option>
							<option value="Osnovna škola 'Vuk Karadžić'">Osnovna škola 'Vuk Karadžić'</option>
							<option value="Osnovna škola 'Diša Đurđević'">Osnovna škola 'Diša Đurđević'</option>
							<option value="Osnovna škola 'Mihailo Mladenović Selja'">Osnovna škola 'Mihailo Mladenović Selja'</option>
						</select>
						<select class="it-school-name" data-city="Beograd - Mladenovac">
							<option value="">Izaberite školu</option>
							<option value="Osnovna muzička škola 'Stevan Hristić'">Osnovna muzička škola 'Stevan Hristić'</option>
							<option value="Osnovna škola 'Bisa Simić'">Osnovna škola 'Bisa Simić'</option>
							<option value="Osnovna škola 'Bora Lazić'">Osnovna škola 'Bora Lazić'</option>
							<option value="Osnovna škola 'Živomir Savković'">Osnovna škola 'Živomir Savković'</option>
							<option value="Osnovna škola 'Milica Milošević'">Osnovna škola 'Milica Milošević'</option>
							<option value="Osnovna škola 'Momčilo Živojinović'">Osnovna škola 'Momčilo Živojinović'</option>
							<option value="Osnovna škola 'Sveti Sava'">Osnovna škola 'Sveti Sava'</option>
							<option value="Osnovna škola 'Kosta Đukić'">Osnovna škola 'Kosta Đukić'</option>
						</select>
						<select class="it-school-name" data-city="Beograd - Novi Beograd">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola '20.oktobar'">Osnovna škola '20.oktobar'</option>
							<option value="Osnovna škola 'Borislav Pekić'">Osnovna škola 'Borislav Pekić'</option>
							<option value="Osnovna škola 'Vlada Obradović Kameni'">Osnovna škola 'Vlada Obradović Kameni'</option>
							<option value="Osnovna škola 'Dragan Lukić'">Osnovna škola 'Dragan Lukić'</option>
							<option value="Osnovna škola 'Duško Radović'">Osnovna škola 'Duško Radović'</option>
							<option value="Osnovna škola 'Đuro Strugar'">Osnovna škola 'Đuro Strugar'</option>
							<option value="Osnovna škola 'Ivan Gundulić'">Osnovna škola 'Ivan Gundulić'</option>
							<option value="Osnovna škola 'Jovan Sterija Popović'">Osnovna škola 'Jovan Sterija Popović'</option>
							<option value="Osnovna škola 'Kneginja Milica'">Osnovna škola 'Kneginja Milica'</option>
							<option value="Osnovna škola 'Kralj Aleksandar I'">Osnovna škola 'Kralj Aleksandar I'</option>
							<option value="Osnovna škola 'Laza Kostić'">Osnovna škola 'Laza Kostić'</option>
							<option value="Osnovna škola 'Marko Orešković'">Osnovna škola 'Marko Orešković'</option>
							<option value="Osnovna škola 'Milan Rakić'">Osnovna škola 'Milan Rakić'</option>
							<option value="Osnovna škola 'Mladost'">Osnovna škola 'Mladost'</option>
							<option value="Osnovna škola 'Nadežda Petrović'">Osnovna škola 'Nadežda Petrović'</option>
							<option value="Osnovna škola 'Novi Beograd'">Osnovna škola 'Novi Beograd'</option>
							<option value="Osnovna škola 'Ratko Mitrović'">Osnovna škola 'Ratko Mitrović'</option>
							<option value="Osnovna škola 'Jovan Dučić'">Osnovna škola 'Jovan Dučić'</option>
							<option value="Osnovna škola 'Branko Radičević'">Osnovna škola 'Branko Radičević'</option>
							<option value="Osnovna škola 'Radoje Domanović'">Osnovna škola 'Radoje Domanović'</option>
							<option value="Grafička škola Otona">Grafička škola Otona</option>
							<option value="Deveta gimnazija Mihailo Petrović Alas">Deveta gimnazija Mihailo Petrović Alas</option>
							<option value="Deseta gimnazija Mihajlo Pupin">Deseta gimnazija Mihajlo Pupin</option>
							<option value="Srednja turistička škola">Srednja turistička škola</option>
							<option value="Srednja škola Kosta Cukić">Srednja škola Kosta Cukić</option>
							<option value="Srednjoškolski obrazovni centar 'SMARTANAC'">Srednjoškolski obrazovni centar 'SMARTANAC'</option>
							<option value="Tehnička škola Zmaj">Tehnička škola Zmaj</option>
							<option value="Tehnička škola Novi Beograd">Tehnička škola Novi Beograd</option>
						</select>
						<select class="it-school-name" data-city="Beograd - Obrenovac">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola '14.oktobar'">Osnovna škola '14.oktobar'</option>
							<option value="Osnovna škola 'Grabovac'">Osnovna škola 'Grabovac'</option>
							<option value="Osnovna škola 'Draževac'">Osnovna škola 'Draževac'</option>
							<option value="Osnovna škola 'Živojin Perić'">Osnovna škola 'Živojin Perić'</option>
							<option value="Osnovna škola 'Jefimija'">Osnovna škola 'Jefimija'</option>
							<option value="Osnovna škola 'Jovan Jovanović Zmaj'">Osnovna škola 'Jovan Jovanović Zmaj'</option>
							<option value="Osnovna škola 'Ljubomir Aćimović'">Osnovna škola 'Ljubomir Aćimović'</option>
							<option value="Osnovna škola 'Nikola Tesla'">Osnovna škola 'Nikola Tesla'</option>
							<option value="Osnovna škola 'Posavski partizani'">Osnovna škola 'Posavski partizani'</option>
							<option value="Osnovna škola 'Prva obrenovačka osnovna škola'">Osnovna škola 'Prva obrenovačka osnovna škola'</option>
						</select>
						<select class="it-school-name" data-city="Beograd - Palilula">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Vasa Pelagić'">Osnovna škola 'Vasa Pelagić'</option>
							<option value="Osnovna škola 'Dr Arčibald Rajs'">Osnovna škola 'Dr Arčibald Rajs'</option>
							<option value="Osnovna škola 'Zaga Malivuk'">Osnovna škola 'Zaga Malivuk'</option>
							<option value="Osnovna škola 'Ivan Milutinović'">Osnovna škola 'Ivan Milutinović'</option>
							<option value="Osnovna škola 'Jovan Popović'">Osnovna škola 'Jovan Popović'</option>
							<option value="Osnovna škola 'Jovan Ristić'">Osnovna škola 'Jovan Ristić'</option>
							<option value="Osnovna škola 'Jovan Cvijić'">Osnovna škola 'Jovan Cvijić'</option>
							<option value="Osnovna škola 'Kraljica Marija'">Osnovna škola 'Kraljica Marija'</option>
							<option value="Osnovna škola 'Milena Pavlović Barili'">Osnovna škola 'Milena Pavlović Barili'</option>
							<option value="Osnovna škola 'Olga Petrov'">Osnovna škola 'Olga Petrov'</option>
							<option value="Osnovna škola 'Oslobodioci Beograda'">Osnovna škola 'Oslobodioci Beograda'</option>
							<option value="Osnovna škola 'Rade Drainac'">Osnovna škola 'Rade Drainac'</option>
							<option value="Osnovna škola 'Starina Novak'">Osnovna škola 'Starina Novak'</option>
							<option value="Osnovna škola 'Stevan Dukić'">Osnovna škola 'Stevan Dukić'</option>
							<option value="Osnovna škola 'Stevan Sremac'">Osnovna škola 'Stevan Sremac'</option>
							<option value="Osnovna škola 'Filip Višnjić'">Osnovna škola 'Filip Višnjić'</option>
							<option value="Osnovna škola 'Vlada Aksentijević'">Osnovna škola 'Vlada Aksentijević'</option>
							<option value="Elektrotehnička škola Rade Končar">Elektrotehnička škola Rade Končar</option>
							<option value="Železnička tehnička škola">Železnička tehnička škola</option>
							<option value="Peta beogradska gimnazija">Peta beogradska gimnazija</option>
							<option value="Poljoprivredna škola PK Beograd">Poljoprivredna škola PK Beograd</option>
							<option value="Prva privatna ugostiteljsko-turistička škola">Prva privatna ugostiteljsko-turistička škola</option>
							<option value="Srednja tehnička PTT škola">Srednja tehnička PTT škola</option>
						</select>
						<select class="it-school-name" data-city="Beograd - Rakovica">
							<option value="">Izaberite školu</option>
							<option value="Muzička škola 'Davorin Jenko'">Muzička škola 'Davorin Jenko'</option>
							<option value="Osnovna škola '14. oktobar'">Osnovna škola '14. oktobar'</option>
							<option value="Osnovna škola 'Branko Ćopić'">Osnovna škola 'Branko Ćopić'</option>
							<option value="Osnovna škola 'Vladimir Rolović'">Osnovna škola 'Vladimir Rolović'</option>
							<option value="Osnovna škola 'Đura Jakšić'">Osnovna škola 'Đura Jakšić'</option>
							<option value="Osnovna škola 'Ivo Andrić'">Osnovna škola 'Ivo Andrić'</option>
							<option value="Osnovna škola 'Kosta Abrašević'">Osnovna škola 'Kosta Abrašević'</option>
							<option value="Osnovna škola 'Nikola Tesla'">Osnovna škola 'Nikola Tesla'</option>
							<option value="Osnovna škola 'France Prešern'">Osnovna škola 'France Prešern'</option>
							<option value="Gimnazija 'Patrijarh Pavle'">Gimnazija 'Patrijarh Pavle'</option>
							<option value="Evropska poslovna škola">Evropska poslovna škola</option>
							<option value="Mašinska škola Radoje Dakić">Mašinska škola Radoje Dakić</option>
							<option value="Muzička škola Davorin Jenko">Muzička škola Davorin Jenko</option>
							<option value="Peta ekonomska škola">Peta ekonomska škola</option>
							<option value="Srednja zanatska škola">Srednja zanatska škola</option>
						</select>
						<select class="it-school-name" data-city="Beograd - Savski Venac">
							<option value="">Izaberite školu</option>
							<option value="Muzička škola 'Stanislav Binički'">Muzička škola 'Stanislav Binički'</option>
							<option value="Osnovna škola 'Vojvoda Mišić'">Osnovna škola 'Vojvoda Mišić'</option>
							<option value="Osnovna škola 'Vojvoda Radomir Putnik'">Osnovna škola 'Vojvoda Radomir Putnik'</option>
							<option value="Osnovna škola 'Isidora Sekulić'">Osnovna škola 'Isidora Sekulić'</option>
							<option value="Osnovna škola 'Petar Petrović Njegoš'">Osnovna škola 'Petar Petrović Njegoš'</option>
							<option value="Osnovna škola 'Radojka Lakić'">Osnovna škola 'Radojka Lakić'</option>
							<option value="Osnovna škola 'Stefan Nemanja'">Osnovna škola 'Stefan Nemanja'</option>
							<option value="Specijalna škola 'Anton Skala'">Specijalna škola 'Anton Skala'</option>
							<option value="Specijalna škola 'Dr Dragan Hercog'">Specijalna škola 'Dr Dragan Hercog'</option>
							<option value="Gimnazija Kreativno pero">Gimnazija Kreativno pero</option>
							<option value="Gimnazija Sveti Sava">Gimnazija Sveti Sava</option>
							<option value="Gimnazija Stefan Nemanja">Gimnazija Stefan Nemanja</option>
							<option value="Medicinska škola Beograd">Medicinska škola Beograd</option>
							<option value="Srednja medicinska škola Milutin Milanković">Srednja medicinska škola Milutin Milanković</option>
							<option value="Srednja stručna škola Zaharija Stefanović Orfelin">Srednja stručna škola Zaharija Stefanović Orfelin</option>
							<option value="Srednja škola Artimedia">Srednja škola Artimedia</option>
							<option value="Ugostiteljsko-turistička škola">Ugostiteljsko-turistička škola</option>
							<option value="Filološka gimnazija">Filološka gimnazija</option>
							<option value="Četvrta beogradska gimnazija">Četvrta beogradska gimnazija</option>
							<option value="Škola za brodarstvo, brodogradnju i hidrogradnju">Škola za brodarstvo, brodogradnju i hidrogradnju</option>
							<option value="Škola za dizajn">Škola za dizajn</option>
							<option value="Škola za oštećene sluhom-nagluve Stefan Dečanski">Škola za oštećene sluhom-nagluve Stefan Dečanski</option>
						</select>
						<select class="it-school-name" data-city="Beograd - Sopot">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Janko Katić'">Osnovna škola 'Janko Katić'</option>
							<option value="Osnovna škola 'Jelica Milovanović'">Osnovna škola 'Jelica Milovanović'</option>
							<option value="Osnovna škola 'Milorad Mića Marković'">Osnovna škola 'Milorad Mića Marković'</option>
							<option value="Osnovna škola 'Cana Marjanović'">Osnovna škola 'Cana Marjanović'</option>
						</select>
						<select class="it-school-name" data-city="Beograd - Stari Grad">
							<option value="">Izaberite školu</option>
							<option value="Baletska škola 'Lujo Davičo'">Baletska škola 'Lujo Davičo'</option>
							<option value="Muzička škola 'Dr Vojislav Vučković'">Muzička škola 'Dr Vojislav Vučković'</option>
							<option value="Muzička škola 'Mokranjac'">Muzička škola 'Mokranjac'</option>
							<option value="Muzička škola Mokranjac">Muzička škola Mokranjac</option>
							<option value="Osnovna škola 'Braća Baruh'">Osnovna škola 'Braća Baruh'</option>
							<option value="Osnovna škola 'Vuk Karadžić'">Osnovna škola 'Vuk Karadžić'</option>
							<option value="Osnovna škola 'Kralj Petar Prvi'">Osnovna škola 'Kralj Petar Prvi'</option>
							<option value="Osnovna škola 'Mihailo Petrović Alas'">Osnovna škola 'Mihailo Petrović Alas'</option>
							<option value="Osnovna škola 'Skadarlija'">Osnovna škola 'Skadarlija'</option>
							<option value="Osnovna škola 'Drinka Pavlović'">Osnovna škola 'Drinka Pavlović'</option>
							<option value="Specijalna škola 'Dragan Kovačević'">Specijalna škola 'Dragan Kovačević'</option>
							<option value="Baletska škola Lujo Davičo">Baletska škola Lujo Davičo</option>
							<option value="Vazduhoplovna akademija">Vazduhoplovna akademija</option>
							<option value="Elektrotehnička škola Nikola Tesla">Elektrotehnička škola Nikola Tesla</option>
							<option value="Elektrotehnička škola Stari grad">Elektrotehnička škola Stari grad</option>
							<option value="Matematička gimnazija">Matematička gimnazija</option>
							<option value="Muzička škola Dr Vojislav Vučković">Muzička škola Dr Vojislav Vučković</option>
							<option value="Muzička škola Mokranjac">Muzička škola Mokranjac</option>
							<option value="Pravno-poslovna škola">Pravno-poslovna škola</option>
							<option value="Prva beogradska gimnazija">Prva beogradska gimnazija</option>
							<option value="Prva ekonomska škola">Prva ekonomska škola</option>
							<option value="Privatna gimnazija Milena Pavlović-Barili">Privatna gimnazija Milena Pavlović-Barili</option>
							<option value="Računarska gimnazija">Računarska gimnazija</option>
							<option value="Sportska gimnazija">Sportska gimnazija</option>
							<option value="Srednja medicinska škola Sveti Vasilije Ostroški">Srednja medicinska škola Sveti Vasilije Ostroški</option>
							<option value="Srednja škola Dositej">Srednja škola Dositej</option>
							<option value="Srednja škola za ekonomiju, pravo i administraciju">Srednja škola za ekonomiju, pravo i administraciju</option>
							<option value="Srednja škola Sveti Sava">Srednja škola Sveti Sava</option>
							<option value="Tehnička škola DRVO ART">Tehnička škola DRVO ART</option>
							<option value="Trgovačka škola">Trgovačka škola</option>
						</select>
						<select class="it-school-name" data-city="Beograd - Surčin">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola '22. oktobar'">Osnovna škola '22. oktobar'</option>
							<option value="Osnovna škola 'Branko Radičević'">Osnovna škola 'Branko Radičević'</option>
							<option value="Osnovna škola 'Vožd Karađorđe'">Osnovna škola 'Vožd Karađorđe'</option>
							<option value="Osnovna škola 'Vuk Karadžić'">Osnovna škola 'Vuk Karadžić'</option>
							<option value="Osnovna škola 'Dušan Vukasović - Diogen'">Osnovna škola 'Dušan Vukasović - Diogen'</option>
							<option value="Osnovna škola 'Stevan Sremac'">Osnovna škola 'Stevan Sremac'</option>
						</select>
						<select class="it-school-name" data-city="Beograd - Čukarica">
							<option value="">Izaberite školu</option>
							<option value="Muzička škola 'Vatroslav Lisinski'">Muzička škola 'Vatroslav Lisinski'</option>
							<option value="Osnovna i srednja muzička škola Amadeus">Osnovna i srednja muzička škola Amadeus</option>
							<option value="Osnovna škola 'Aca Milosavljević'">Osnovna škola 'Aca Milosavljević'</option>
							<option value="Osnovna škola 'Braća Jerković'">Osnovna škola 'Braća Jerković'</option>
							<option value="Osnovna škola 'Vuk Karadžić'">Osnovna škola 'Vuk Karadžić'</option>
							<option value="Osnovna škola 'Dositej Obradović'">Osnovna škola 'Dositej Obradović'</option>
							<option value="Osnovna škola 'Duško Radović'">Osnovna škola 'Duško Radović'</option>
							<option value="Osnovna škola 'Đorđe Krstić'">Osnovna škola 'Đorđe Krstić'</option>
							<option value="Osnovna škola 'Karađorđe'">Osnovna škola 'Karađorđe'</option>
							<option value="Osnovna škola 'Ljuba Nenadović'">Osnovna škola 'Ljuba Nenadović'</option>
							<option value="Osnovna škola 'Miloš Crnjanski'">Osnovna škola 'Miloš Crnjanski'</option>
							<option value="Osnovna škola 'Miroslav Antić'">Osnovna škola 'Miroslav Antić'</option>
							<option value="Osnovna škola 'Ruđer Bošković'">Osnovna škola 'Ruđer Bošković'</option>
							<option value="Osnovna škola 'Stefan Dečanski'">Osnovna škola 'Stefan Dečanski'</option>
							<option value="Osnovna škola 'Ujedinjene nacije'">Osnovna škola 'Ujedinjene nacije'</option>
							<option value="Osnovna škola 'Filip Kljajić Fića'">Osnovna škola 'Filip Kljajić Fića'</option>
							<option value="Osnovna škola 'Branko Radičević'">Osnovna škola 'Branko Radičević'</option>
							<option value="Osnovna škola 'Banović Strahinja'">Osnovna škola 'Banović Strahinja'</option>
							<option value="Osnovna škola 'Josif Pančić'">Osnovna škola 'Josif Pančić'</option>
							<option value="Privatna osnovna škola 'Plavi krug'">Privatna osnovna škola 'Plavi krug'</option>
							<option value="Specijalna škola 'Miloje Pavlović'">Specijalna škola 'Miloje Pavlović'</option>
							<option value="Škola za osnovno i srednje obrazovanje sa domom 'Sveti Sava'">Škola za osnovno i srednje obrazovanje sa domom 'Sveti Sava'</option>
							<option value="Gimnazija Ruđer Bošković">Gimnazija Ruđer Bošković</option>
							<option value="Gimnazija Crnjanski">Gimnazija Crnjanski</option>
							<option value="Muzička škola Vatroslav Lisinski">Muzička škola Vatroslav Lisinski</option>
							<option value="Osnovna i srednja muzička škola Amadeus">Osnovna i srednja muzička škola Amadeus</option>
							<option value="Prva sportska košarkaška gimnazija">Prva sportska košarkaška gimnazija</option>
							<option value="Tehnička škola">Tehnička škola</option>
							<option value="Trinaesta beogradska gimnazija">Trinaesta beogradska gimnazija</option>
							<option value="Hemijsko-prehrambena tehnološka škola">Hemijsko-prehrambena tehnološka škola</option>
						</select>
						<select class="it-school-name" data-city="Beočin">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Jovan Popović' Susek">Osnovna škola 'Jovan Popović' Susek</option>
							<option value="Osnovna škola 'Jovan Grčić Milenko'">Osnovna škola 'Jovan Grčić Milenko'</option>
						</select>
						<select class="it-school-name" data-city="Bečej">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Zdravko Gložanski'">Osnovna škola 'Zdravko Gložanski'</option>
							<option value="Osnovna škola 'Petefi Šandor'">Osnovna škola 'Petefi Šandor'</option>
							<option value="Osnovna škola 'Svetozar Marković' Bačko Gradište">Osnovna škola 'Svetozar Marković' Bačko Gradište</option>
							<option value="Osnovna škola 'Sever Đurkić'">Osnovna škola 'Sever Đurkić'</option>
							<option value="Osnovna škola 'Šamu Mihalj'">Osnovna škola 'Šamu Mihalj'</option>
							<option value="Gimnazija Zelena 13">Gimnazija Zelena 13</option>
							<option value="Ekonomsko-trgovinska škola">Ekonomsko-trgovinska škola</option>
							<option value="Tehnička škola Uroša Predića 1">Tehnička škola Uroša Predića 1</option>
							<option value="Škola za osnovno i srednje obrazovanje 'Bratstvo'">Škola za osnovno i srednje obrazovanje 'Bratstvo'</option>
							<option value="Škola za osnovno muzičko vaspitanje i obrazovanje 'Petar Konjović'">Škola za osnovno muzičko vaspitanje i obrazovanje 'Petar Konjović'</option>
						</select>
						<select class="it-school-name" data-city="Blace">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Stojan Novaković'">Osnovna škola 'Stojan Novaković'</option>
							<option value="Srednja škola">Srednja škola</option>
						</select>
						<select class="it-school-name" data-city="Bogatić">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Vuk Karadžić' Badovinci">Osnovna škola 'Vuk Karadžić' Badovinci</option>
							<option value="Osnovna škola 'Janko Veselinović' Crna Bara">Osnovna škola 'Janko Veselinović' Crna Bara</option>
							<option value="Osnovna škola 'Laza K. Lazarević' Klenje">Osnovna škola 'Laza K. Lazarević' Klenje</option>
							<option value="Osnovna škola 'Mika Mitrović'">Osnovna škola 'Mika Mitrović'</option>
							<option value="Osnovna škola 'Nikola Tesla' Dublje">Osnovna škola 'Nikola Tesla' Dublje</option>
							<option value="Osnovna škola 'Cvetin Brkić' Glušci">Osnovna škola 'Cvetin Brkić' Glušci</option>
							<option value="Mačvanska srednja škola">Mačvanska srednja škola</option>
						</select>
						<select class="it-school-name" data-city="Bojnik">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Stanimir Veljković Zele'">Osnovna škola 'Stanimir Veljković Zele'</option>
							<option value="Osnovna škola 'Stojan Ljubić' Kosančić">Osnovna škola 'Stojan Ljubić' Kosančić</option>
							<option value="Tehnička škola Boško Krstić">Tehnička škola Boško Krstić</option>
						</select>
						<select class="it-school-name" data-city="Boljevac">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola '9. srpska brigada'">Osnovna škola '9. srpska brigada'</option>
							<option value="Osnovna škola 'Đorđe Simeonović' Podgorac">Osnovna škola 'Đorđe Simeonović' Podgorac</option>
							<option value="Osnovna škola 'Đura Jakšić' Sumrakovac">Osnovna škola 'Đura Jakšić' Sumrakovac</option>
							<option value="Srednja škola Nikola Tesla">Srednja škola Nikola Tesla</option>
						</select>
						<select class="it-school-name" data-city="Bor">
							<option value="">Izaberite školu</option>
							<option value="Osnovna muzička škola 'Miodrag Vasiljević'">Osnovna muzička škola 'Miodrag Vasiljević'</option>
							<option value="Osnovna škola '3.oktobar'">Osnovna škola '3.oktobar'</option>
							<option value="Osnovna škola 'Branko Radičević'">Osnovna škola 'Branko Radičević'</option>
							<option value="Osnovna škola 'Dušan Radović'">Osnovna škola 'Dušan Radović'</option>
							<option value="Osnovna škola 'Đura jakšić' Krivelj">Osnovna škola 'Đura jakšić' Krivelj</option>
							<option value="Osnovna škola 'Petar Radovanović' Zlot">Osnovna škola 'Petar Radovanović' Zlot</option>
							<option value="Osnovna škola 'Sveti Sava'">Osnovna škola 'Sveti Sava'</option>
							<option value="Osnovna škola 'Stanoje Miljković' Brestovac">Osnovna škola 'Stanoje Miljković' Brestovac</option>
							<option value="Osnovna škola 'Vuk Karadžić'">Osnovna škola 'Vuk Karadžić'</option>
							<option value="Gimnazija Bora Stanković">Gimnazija Bora Stanković</option>
							<option value="Ekonomsko-trgovinska škola">Ekonomsko-trgovinska škola</option>
							<option value="Mašinsko-elektrotehnička škola">Mašinsko-elektrotehnička škola</option>
							<option value="Tehnička škola">Tehnička škola</option>
							<option value="Škola za osnovno i srednje obrazovanje 'Vidovdan'">Škola za osnovno i srednje obrazovanje 'Vidovdan'</option>
						</select>
						<select class="it-school-name" data-city="Bosilegrad">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Georgi Dimitrov'">Osnovna škola 'Georgi Dimitrov'</option>
							<option value="Gimnazija">Gimnazija</option>
						</select>
						<select class="it-school-name" data-city="Brus">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola '1. maj' Vlajkovci">Osnovna škola '1. maj' Vlajkovci</option>
							<option value="Osnovna škola 'Branko Radičević' Razbojna">Osnovna škola 'Branko Radičević' Razbojna</option>
							<option value="Osnovna škola 'Vuk Karadžić' Blaževo">Osnovna škola 'Vuk Karadžić' Blaževo</option>
							<option value="Osnovna škola 'Jovan Jovanović Zmaj'">Osnovna škola 'Jovan Jovanović Zmaj'</option>
							<option value="Srednja škola">Srednja škola</option>
						</select>
						<select class="it-school-name" data-city="Bujanovac">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Ali Bektaši' Nesalce">Osnovna škola 'Ali Bektaši' Nesalce</option>
							<option value="Osnovna škola 'Desanka Maksimović' Biljača">Osnovna škola 'Desanka Maksimović' Biljača</option>
							<option value="Osnovna škola 'Dragomir Trajković' Žbevac">Osnovna škola 'Dragomir Trajković' Žbevac</option>
							<option value="Osnovna škola 'Miđeni' Muhovac">Osnovna škola 'Miđeni' Muhovac</option>
							<option value="Osnovna škola 'Muarem Kadriju' Veliki Trnovac">Osnovna škola 'Muarem Kadriju' Veliki Trnovac</option>
							<option value="Osnovna škola 'Sami Frašeri' Lučane">Osnovna škola 'Sami Frašeri' Lučane</option>
							<option value="Osnovna škola 'Bora Stanković' Klenike">Osnovna škola 'Bora Stanković' Klenike</option>
							<option value="Osnovna škola 'Branko Radičević'">Osnovna škola 'Branko Radičević'</option>
							<option value="Osnovna škola 'Naim Frašeri'">Osnovna škola 'Naim Frašeri'</option>
							<option value="Osnovna škola 'Vuk Stefanović Karadžić' Levosoje">Osnovna škola 'Vuk Stefanović Karadžić' Levosoje</option>
							<option value="Srednja škola Sezai Suroi">Srednja škola Sezai Suroi</option>
							<option value="Stručna škola Sveti Sava">Stručna škola Sveti Sava</option>
							<option value="Škola za osnovno muzičko obrazovanje">Škola za osnovno muzičko obrazovanje</option>
						</select>
						<select class="it-school-name" data-city="Valjevo">
							<option value="">Izaberite školu</option>
							<option value="Muzička škola 'Živorad Grbić'">Muzička škola 'Živorad Grbić'</option>
							<option value="Osnovna škola 'Andra Savčić'">Osnovna škola 'Andra Savčić'</option>
							<option value="Osnovna škola 'Vladika Nikolaj Velimirović'">Osnovna škola 'Vladika Nikolaj Velimirović'</option>
							<option value="Osnovna škola 'Desanka Maksimović'">Osnovna škola 'Desanka Maksimović'</option>
							<option value="Osnovna škola 'Dragoljub Ilić' Dračić">Osnovna škola 'Dragoljub Ilić' Dračić</option>
							<option value="Osnovna škola 'Zdravko Jovanović' Tubravić">Osnovna škola 'Zdravko Jovanović' Tubravić</option>
							<option value="Osnovna škola 'Ilija Birčanin' Bobova">Osnovna škola 'Ilija Birčanin' Bobova</option>
							<option value="Osnovna škola 'Milovan Glišić'">Osnovna škola 'Milovan Glišić'</option>
							<option value="Osnovna škola 'Milovan Glišić' Kamenica">Osnovna škola 'Milovan Glišić' Kamenica</option>
							<option value="Osnovna škola 'Miloš Marković' Donje Leskovice">Osnovna škola 'Miloš Marković' Donje Leskovice</option>
							<option value="Osnovna škola 'Nada Purić'">Osnovna škola 'Nada Purić'</option>
							<option value="Osnovna škola 'Prva osnovna škola'">Osnovna škola 'Prva osnovna škola'</option>
							<option value="Osnovna škola 'Prota Mateja Nenadović' Brankovina">Osnovna škola 'Prota Mateja Nenadović' Brankovina</option>
							<option value="Osnovna škola 'Sveti Sava' Popučke">Osnovna škola 'Sveti Sava' Popučke</option>
							<option value="Osnovna škola 'Stevan Filipović' Divci">Osnovna škola 'Stevan Filipović' Divci</option>
							<option value="Osnovna škola 'Sestre Ilić'">Osnovna škola 'Sestre Ilić'</option>
							<option value="Valjevska gimnazija">Valjevska gimnazija</option>
							<option value="Ekonomska škola">Ekonomska škola</option>
							<option value="Medicinska škola Dr Miša Pantić">Medicinska škola Dr Miša Pantić</option>
							<option value="Muzička škola">Muzička škola</option>
							<option value="Poljoprivredna škola">Poljoprivredna škola</option>
							<option value="Tehnička škola">Tehnička škola</option>
						</select>
						<select class="it-school-name" data-city="Varvarin">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Dragi Makić' Bošnjane">Osnovna škola 'Dragi Makić' Bošnjane</option>
							<option value="Osnovna škola 'Jovan Kursula'">Osnovna škola 'Jovan Kursula'</option>
							<option value="Osnovna škola 'Mirko Tomić' Obrež">Osnovna škola 'Mirko Tomić' Obrež</option>
							<option value="Osnovna škola 'Sveti Sava' Bačina">Osnovna škola 'Sveti Sava' Bačina</option>
							<option value="Osnovna škola 'Heroj Mirko Tomić' Donji Krčin">Osnovna škola 'Heroj Mirko Tomić' Donji Krčin</option>
							<option value="Srednja škola">Srednja škola</option>
						</select>
						<select class="it-school-name" data-city="Velika Plana">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Akademik Radomir Lukić' Miloševac">Osnovna škola 'Akademik Radomir Lukić' Miloševac</option>
							<option value="Osnovna škola 'Vuk Karadžić' Krnjevo">Osnovna škola 'Vuk Karadžić' Krnjevo</option>
							<option value="Osnovna škola 'Drugi šumadijski odred' Markovac">Osnovna škola 'Drugi šumadijski odred' Markovac</option>
							<option value="Osnovna škola 'Karađorđe'">Osnovna škola 'Karađorđe'</option>
							<option value="Osnovna škola 'Nadežda Petrović'">Osnovna škola 'Nadežda Petrović'</option>
							<option value="Osnovna škola 'Radica Ranković' Lozovik">Osnovna škola 'Radica Ranković' Lozovik</option>
							<option value="Osnovna škola 'Sveti Sava'">Osnovna škola 'Sveti Sava'</option>
							<option value="Gimnazija Velika Plana">Gimnazija Velika Plana</option>
							<option value="Ekonomsko-ugostiteljska škola Vuk Karadžić">Ekonomsko-ugostiteljska škola Vuk Karadžić</option>
							<option value="Tehnička škola Nikola Tesla">Tehnička škola Nikola Tesla</option>
						</select>
						<select class="it-school-name" data-city="Veliko Gradište">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Vuk Karadžić' Majilovac">Osnovna škola 'Vuk Karadžić' Majilovac</option>
							<option value="Osnovna škola 'Ivo Lola Ribar'">Osnovna škola 'Ivo Lola Ribar'</option>
							<option value="Osnovna škola 'Miša Živanović' Srednjevo">Osnovna škola 'Miša Živanović' Srednjevo</option>
							<option value="Srednja škola Miloje Vasić">Srednja škola Miloje Vasić</option>
						</select>
						<select class="it-school-name" data-city="Veliko Ropotovo">
							<option value="">Izaberite školu</option>
							<option value="Medicinska škola">Medicinska škola</option>
						</select>
						<select class="it-school-name" data-city="Visibaba">
							<option value="">Izaberite školu</option>
							<option value="Poljoprivredna škola">Poljoprivredna škola</option>
						</select>
						<select class="it-school-name" data-city="Vladimirci">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Žika Popović'">Osnovna škola 'Žika Popović'</option>
							<option value="Osnovna škola 'Jovan Cvijić' Debrc">Osnovna škola 'Jovan Cvijić' Debrc</option>
							<option value="Posavotamnavska srednja škola">Posavotamnavska srednja škola</option>
						</select>
						<select class="it-school-name" data-city="Vladičin Han">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Branko Radičević'">Osnovna škola 'Branko Radičević'</option>
							<option value="Osnovna škola 'Vojvoda Radomir Putnik' Džep">Osnovna škola 'Vojvoda Radomir Putnik' Džep</option>
							<option value="Osnovna škola 'Vuk Karadžić' Stubal">Osnovna škola 'Vuk Karadžić' Stubal</option>
							<option value="Osnovna škola 'Sveti Sava'">Osnovna škola 'Sveti Sava'</option>
							<option value="Gimnazija Jovan Skerlić">Gimnazija Jovan Skerlić</option>
							<option value="Tehnička škola">Tehnička škola</option>
						</select>
						<select class="it-school-name" data-city="Vlasotince">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola '25. Maj' Dolja Lopušnja">Osnovna škola '25. Maj' Dolja Lopušnja</option>
							<option value="Osnovna škola '8. oktobar'">Osnovna škola '8. oktobar'</option>
							<option value="Osnovna škola 'Božidar Miljković' Gornji Prisjan">Osnovna škola 'Božidar Miljković' Gornji Prisjan</option>
							<option value="Osnovna škola 'Braća Milenković' Šišave">Osnovna škola 'Braća Milenković' Šišave</option>
							<option value="Osnovna škola 'Vuk Karadžić' Tegošnica">Osnovna škola 'Vuk Karadžić' Tegošnica</option>
							<option value="Osnovna škola 'Dositej Obradović' Svođe">Osnovna škola 'Dositej Obradović' Svođe</option>
							<option value="Osnovna škola 'Karađorđe Petrović' Kruševica">Osnovna škola 'Karađorđe Petrović' Kruševica</option>
							<option value="Osnovna škola 'Sveti Sava' Gložane">Osnovna škola 'Sveti Sava' Gložane</option>
							<option value="Osnovna škola 'Siniša Janić'">Osnovna škola 'Siniša Janić'</option>
							<option value="Gimnazija Stevan Jakovljević">Gimnazija Stevan Jakovljević</option>
							<option value="Tehnička škola">Tehnička škola</option>
						</select>
						<select class="it-school-name" data-city="Vranje">
							<option value="">Izaberite školu</option>
							<option value="Muzička škola 'Stevan Mokranjac'">Muzička škola 'Stevan Mokranjac'</option>
							<option value="Osnovna škola '1. maj' Vrtogoš">Osnovna škola '1. maj' Vrtogoš</option>
							<option value="Osnovna škola '20 OKTOBAR' Vlase">Osnovna škola '20 OKTOBAR' Vlase</option>
							<option value="Osnovna škola 'Bora Stanković' Tibužde">Osnovna škola 'Bora Stanković' Tibužde</option>
							<option value="Osnovna škola 'Branislav Nušić' Rataje">Osnovna škola 'Branislav Nušić' Rataje</option>
							<option value="Osnovna škola 'Branko Radičević'">Osnovna škola 'Branko Radičević'</option>
							<option value="Osnovna škola 'Vuk Karadžić'">Osnovna škola 'Vuk Karadžić'</option>
							<option value="Osnovna škola 'Dositej Obradović'">Osnovna škola 'Dositej Obradović'</option>
							<option value="Osnovna škola 'Jovan Jovanović Zmaj'">Osnovna škola 'Jovan Jovanović Zmaj'</option>
							<option value="Osnovna škola 'Radoje Domanović'">Osnovna škola 'Radoje Domanović'</option>
							<option value="Osnovna škola 'Svetozar Marković'">Osnovna škola 'Svetozar Marković'</option>
							<option value="Gimnazija Bora Stanković">Gimnazija Bora Stanković</option>
							<option value="Ekonomsko-trgovinska škola">Ekonomsko-trgovinska škola</option>
							<option value="Medicinska škola Dr Izabel Emsli Haton">Medicinska škola Dr Izabel Emsli Haton</option>
							<option value="Muzička škola Stevan Mokranjac">Muzička škola Stevan Mokranjac</option>
							<option value="Srednja poljoprivredno-veterinarska škola Stevan Sinđelić">Srednja poljoprivredno-veterinarska škola Stevan Sinđelić</option>
							<option value="Srednja poslovna škola Trajković">Srednja poslovna škola Trajković</option>
							<option value="Tehnička škola Bulevar AVNOJA 2">Tehnička škola Bulevar AVNOJA 2</option>
							<option value="Hemijsko-tehnološka škola">Hemijsko-tehnološka škola</option>
							<option value="Škola za osnovno i srednje obrazovanje 'Vule Antić'">Škola za osnovno i srednje obrazovanje 'Vule Antić'</option>
						</select>
						<select class="it-school-name" data-city="Vranjska Banja">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Kralj Petar I Oslobodilac' Korbevac">Osnovna škola 'Kralj Petar I Oslobodilac' Korbevac</option>
							<option value="Osnovna škola 'Predrag Devedžić'">Osnovna škola 'Predrag Devedžić'</option>
						</select>
						<select class="it-school-name" data-city="Vrbas">
							<option value="">Izaberite školu</option>
							<option value="Osnovna muzička škola">Osnovna muzička škola</option>
							<option value="Osnovna škola '20. oktobar'">Osnovna škola '20. oktobar'</option>
							<option value="Osnovna škola 'Branko Radičević' Ravno Selo">Osnovna škola 'Branko Radičević' Ravno Selo</option>
							<option value="Osnovna škola 'Branko Radičević' Savino Selo">Osnovna škola 'Branko Radičević' Savino Selo</option>
							<option value="Osnovna škola 'Bratstvo jedinstvo' Kucura">Osnovna škola 'Bratstvo jedinstvo' Kucura</option>
							<option value="Osnovna škola 'Vuk Karadžić' Bačko Dobro Polje">Osnovna škola 'Vuk Karadžić' Bačko Dobro Polje</option>
							<option value="Osnovna škola 'Jovan Jovanović Zmaj' Zmajevo">Osnovna škola 'Jovan Jovanović Zmaj' Zmajevo</option>
							<option value="Osnovna škola 'Petar Petrović Njegoš'">Osnovna škola 'Petar Petrović Njegoš'</option>
							<option value="Osnovna škola 'Svetozar Miletić'">Osnovna škola 'Svetozar Miletić'</option>
							<option value="Osnovna škola 'Bratstvo jedinstvo'">Osnovna škola 'Bratstvo jedinstvo'</option>
							<option value="Gimnazija Žarko Zrenjanin">Gimnazija Žarko Zrenjanin</option>
							<option value="Srednja medicinska škola Kozma i Damjan">Srednja medicinska škola Kozma i Damjan</option>
							<option value="Srednja stručna škola 4. juli">Srednja stručna škola 4. juli</option>
						</select>
						<select class="it-school-name" data-city="Vrbovac">
							<option value="">Izaberite školu</option>
							<option value="Tehnička škola">Tehnička škola</option>
						</select>
						<select class="it-school-name" data-city="Vrnjačka Banja">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Bane Milenković' Novo Selo">Osnovna škola 'Bane Milenković' Novo Selo</option>
							<option value="Osnovna škola 'Branko Radičević' Vraneši">Osnovna škola 'Branko Radičević' Vraneši</option>
							<option value="Osnovna škola 'Mladost' Vrnjci">Osnovna škola 'Mladost' Vrnjci</option>
							<option value="Osnovna škola 'Popinski borci'">Osnovna škola 'Popinski borci'</option>
							<option value="Gimnazija">Gimnazija</option>
							<option value="Ugostiteljsko-turistička škola">Ugostiteljsko-turistička škola</option>
						</select>
						<select class="it-school-name" data-city="Vršac">
							<option value="">Izaberite školu</option>
							<option value="Muzička škola 'Josif Marinković'">Muzička škola 'Josif Marinković'</option>
							<option value="Osnovna škola 'Branko Radičević' Veliko Središte">Osnovna škola 'Branko Radičević' Veliko Središte</option>
							<option value="Osnovna škola 'Branko Radičević' Uljma">Osnovna škola 'Branko Radičević' Uljma</option>
							<option value="Osnovna škola 'Vuk Karadžić'">Osnovna škola 'Vuk Karadžić'</option>
							<option value="Osnovna škola 'Đura Jakšić' Pavliš">Osnovna škola 'Đura Jakšić' Pavliš</option>
							<option value="Osnovna škola 'Žarko Zrenjanin' Izbište">Osnovna škola 'Žarko Zrenjanin' Izbište</option>
							<option value="Osnovna škola 'Jovan Sterija Popović'">Osnovna škola 'Jovan Sterija Popović'</option>
							<option value="Osnovna škola 'Koriolan Doban' Kuštilj">Osnovna škola 'Koriolan Doban' Kuštilj</option>
							<option value="Osnovna škola 'Mladost'">Osnovna škola 'Mladost'</option>
							<option value="Osnovna škola 'Moša Pijade' Gudurica">Osnovna škola 'Moša Pijade' Gudurica</option>
							<option value="Osnovna škola 'Olga Petrov Radišić'">Osnovna škola 'Olga Petrov Radišić'</option>
							<option value="Osnovna škola 'Paja Jovanović'">Osnovna škola 'Paja Jovanović'</option>
							<option value="Gimnazija Borislav Petrov Braca">Gimnazija Borislav Petrov Braca</option>
							<option value="Muzička škola Josif Marinković">Muzička škola Josif Marinković</option>
							<option value="Poljoprivredna škola">Poljoprivredna škola</option>
							<option value="Hemijsko-medicinska škola">Hemijsko-medicinska škola</option>
							<option value="Škola za osnovno i srednje obrazovanje Jelena Varjaški">Škola za osnovno i srednje obrazovanje Jelena Varjaški</option>
							<option value="Školski centar Nikola Tesla">Školski centar Nikola Tesla</option>
							<option value="Škola za osnovno i srednje obrazovanje 'Jelena Varjaški'">Škola za osnovno i srednje obrazovanje 'Jelena Varjaški'</option>
						</select>
						<select class="it-school-name" data-city="Vučitrn">
							<option value="">Izaberite školu</option>
							<option value="Gimnazija">Gimnazija</option>
							<option value="Tehnička škola">Tehnička škola</option>
						</select>
						<select class="it-school-name" data-city="Vučje">
							<option value="">Izaberite školu</option>
							<option value="Srednja škola Svetozar Krstić Toza">Srednja škola Svetozar Krstić Toza</option>
						</select>
						<select class="it-school-name" data-city="Gadžin Han">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Vitko i Sveta'">Osnovna škola 'Vitko i Sveta'</option>
						</select>
						<select class="it-school-name" data-city="Golubac">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Veljko Dugošević' Braničevo">Osnovna škola 'Veljko Dugošević' Braničevo</option>
							<option value="Osnovna škola 'Branko Radičević'">Osnovna škola 'Branko Radičević'</option>
						</select>
						<select class="it-school-name" data-city="Goraždevac">
							<option value="">Izaberite školu</option>
							<option value="Gimnazija">Gimnazija</option>
							<option value="Ekonomska škola">Ekonomska škola</option>
							<option value="Mašinsko-elektrotehnička škola">Mašinsko-elektrotehnička škola</option>
						</select>
						<select class="it-school-name" data-city="Gornje Kusce">
							<option value="">Izaberite školu</option>
							<option value="Tehnička škola Dragi Popović">Tehnička škola Dragi Popović</option>
						</select>
						<select class="it-school-name" data-city="Gornji Milanovac">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Arsenije Loma' Rudnik">Osnovna škola 'Arsenije Loma' Rudnik</option>
							<option value="Osnovna škola 'Desanka Maksimović'">Osnovna škola 'Desanka Maksimović'</option>
							<option value="Osnovna škola 'Ivo Andrić' Pranjani">Osnovna škola 'Ivo Andrić' Pranjani</option>
							<option value="Osnovna škola 'Kralj Aleksandar I'">Osnovna škola 'Kralj Aleksandar I'</option>
							<option value="Osnovna škola 'Momčilo Nastasijević'">Osnovna škola 'Momčilo Nastasijević'</option>
							<option value="Osnovna škola 'Sveti Sava'">Osnovna škola 'Sveti Sava'</option>
							<option value="Osnovna škola 'Takovski ustanak' Takovo">Osnovna škola 'Takovski ustanak' Takovo</option>
							<option value="Gimnazija Takovski ustanak">Gimnazija Takovski ustanak</option>
							<option value="Ekonomsko-trgovačka škola Knjaz Miloš">Ekonomsko-trgovačka škola Knjaz Miloš</option>
							<option value="Tehnička škola Jovan Žujović">Tehnička škola Jovan Žujović</option>
						</select>
						<select class="it-school-name" data-city="Gračanica">
							<option value="">Izaberite školu</option>
							<option value="Građevinsko-saobraćajna škola">Građevinsko-saobraćajna škola</option>
							<option value="Medicinska škola">Medicinska škola</option>
							<option value="Muzička škola Stevan Mokranjac">Muzička škola Stevan Mokranjac</option>
						</select>
						<select class="it-school-name" data-city="Grdelica">
							<option value="">Izaberite školu</option>
							<option value="Srednja škola">Srednja škola</option>
						</select>
						<select class="it-school-name" data-city="Grocka">
							<option value="">Izaberite školu</option>
							<option value="Srednja škola">Srednja škola</option>
						</select>
						<select class="it-school-name" data-city="Guča">
							<option value="">Izaberite školu</option>
							<option value="Srednja škola Dragačevo">Srednja škola Dragačevo</option>
						</select>
						<select class="it-school-name" data-city="Despotovac">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Vuk Karadžić' Resavica">Osnovna škola 'Vuk Karadžić' Resavica</option>
							<option value="Osnovna škola 'Despot Stefan Visoki'">Osnovna škola 'Despot Stefan Visoki'</option>
							<option value="Osnovna škola 'Đura Jakšić' Plažane">Osnovna škola 'Đura Jakšić' Plažane</option>
							<option value="Osnovna škola 'Stevan Sinđelić' Veliki Popović">Osnovna škola 'Stevan Sinđelić' Veliki Popović</option>
							<option value="Osnovna škola 'Stevan Nemanja' Stenjevac">Osnovna škola 'Stevan Nemanja' Stenjevac</option>
							<option value="Tehnička škola">Tehnička škola</option>
						</select>
						<select class="it-school-name" data-city="Dimitrovgrad">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Hristo Botev'">Osnovna škola 'Hristo Botev'</option>
							<option value="Gimnazija Sveti Kirilo i Metodije">Gimnazija Sveti Kirilo i Metodije</option>
						</select>
						<select class="it-school-name" data-city="Doljevac">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Vuk Karadžić'">Osnovna škola 'Vuk Karadžić'</option>
						</select>
						<select class="it-school-name" data-city="Donja Gušterica">
							<option value="">Izaberite školu</option>
							<option value="Poljoprivredna škola">Poljoprivredna škola</option>
						</select>
						<select class="it-school-name" data-city="Dragaš">
							<option value="">Izaberite školu</option>
							<option value="Ekonomsko-trgovinska škola">Ekonomsko-trgovinska škola</option>
						</select>
						<select class="it-school-name" data-city="Žabalj">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Đura Jakšić' Čurug">Osnovna škola 'Đura Jakšić' Čurug</option>
							<option value="Osnovna škola 'Žarko Zrenjanin' Gospođinci">Osnovna škola 'Žarko Zrenjanin' Gospođinci</option>
							<option value="Osnovna škola 'Jovan Jovanović Zmaj' Đurđevo">Osnovna škola 'Jovan Jovanović Zmaj' Đurđevo</option>
							<option value="Osnovna škola 'Miloš Crnjanski'">Osnovna škola 'Miloš Crnjanski'</option>
							<option value="Srednja škola 22. oktobar">Srednja škola 22. oktobar</option>
						</select>
						<select class="it-school-name" data-city="Žabari">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Dude Jović'">Osnovna škola 'Dude Jović'</option>
							<option value="Osnovna škola 'Heroj Rosa Trifunović' Aleksandrovac">Osnovna škola 'Heroj Rosa Trifunović' Aleksandrovac</option>
						</select>
						<select class="it-school-name" data-city="Žagubica">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Jovan Šerbanović' Krepoljin">Osnovna škola 'Jovan Šerbanović' Krepoljin</option>
							<option value="Osnovna škola 'Moša Pijade'">Osnovna škola 'Moša Pijade'</option>
							<option value="Osnovna škola 'Jovan Šerbanović' Laznica">Osnovna škola 'Jovan Šerbanović' Laznica</option>
							<option value="Tehnička škola">Tehnička škola</option>
						</select>
						<select class="it-school-name" data-city="Žitište">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Miloš Crnjanski' Srpski Itebej">Osnovna škola 'Miloš Crnjanski' Srpski Itebej</option>
							<option value="Osnovna škola 'Nikola Tesla' Banatsko Karađorđevo">Osnovna škola 'Nikola Tesla' Banatsko Karađorđevo</option>
							<option value="Osnovna škola 'Sveti Sava'">Osnovna škola 'Sveti Sava'</option>
						</select>
						<select class="it-school-name" data-city="Žitorađa">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Toplički heroji'">Osnovna škola 'Toplički heroji'</option>
							<option value="Srednja škola">Srednja škola</option>
						</select>
						<select class="it-school-name" data-city="Zaječar">
							<option value="">Izaberite školu</option>
							<option value="Osnovna muzička škola 'Stevan Mokranjac'">Osnovna muzička škola 'Stevan Mokranjac'</option>
							<option value="Osnovna škola '15. maj' Mali Jasenovac">Osnovna škola '15. maj' Mali Jasenovac</option>
							<option value="Osnovna škola 'Vladislav Petković Dis' Grljan">Osnovna škola 'Vladislav Petković Dis' Grljan</option>
							<option value="Osnovna škola 'Vuk Karadžić' Veliki Izvor">Osnovna škola 'Vuk Karadžić' Veliki Izvor</option>
							<option value="Osnovna škola 'Desanka Maksimović'">Osnovna škola 'Desanka Maksimović'</option>
							<option value="Osnovna škola 'Dositej Obradović' Vražogrnac">Osnovna škola 'Dositej Obradović' Vražogrnac</option>
							<option value="Osnovna škola 'Đura Jakšić'">Osnovna škola 'Đura Jakšić'</option>
							<option value="Osnovna škola 'Jeremija Ilić-Jegor' Rgotina">Osnovna škola 'Jeremija Ilić-Jegor' Rgotina</option>
							<option value="Osnovna škola 'Jovan Jovanović Zmaj' Salaš">Osnovna škola 'Jovan Jovanović Zmaj' Salaš</option>
							<option value="Osnovna škola 'Ljuba Nešić'">Osnovna škola 'Ljuba Nešić'</option>
							<option value="Osnovna škola 'Hajduk Veljko'">Osnovna škola 'Hajduk Veljko'</option>
							<option value="Osnovna škola 'Ljubica Radosavljević Nada'">Osnovna škola 'Ljubica Radosavljević Nada'</option>
							<option value="Škola za osnovno i srednje obrazovanje Jelena Majstorović">Škola za osnovno i srednje obrazovanje Jelena Majstorović</option>
							<option value="Gimnazija">Gimnazija</option>
							<option value="Ekonomsko-trgovinska škola">Ekonomsko-trgovačka škola</option>
							<option value="Medicinska škola">Medicinska škola</option>
							<option value="Tehnička škola">Tehnička škola</option>
							<option value="Škola za osnovno i srednje obrazovanje Jelena Majstorović">Škola za osnovno i srednje obrazovanje Jelena Majstorović</option>
						</select>
						<select class="it-school-name" data-city="Zvečan">
							<option value="">Izaberite školu</option>
							<option value="Srednja škola">Srednja škola</option>
						</select>
						<select class="it-school-name" data-city="Zrenjanin">
							<option value="">Izaberite školu</option>
							<option value="Muzička škola 'Josif Marinković'">Muzička škola 'Josif Marinković'</option>
							<option value="Osnovna i srednja škola '9. maj'">Osnovna i srednja škola '9. maj'</option>
							<option value="Osnovna škola '2. oktobar'">Osnovna škola '2. oktobar'</option>
							<option value="Osnovna Škola 'Branko Radičević' Čenta">Osnovna Škola 'Branko Radičević' Čenta</option>
							<option value="Osnovna škola 'Branko Ćopić' Lukićevo">Osnovna škola 'Branko Ćopić' Lukićevo</option>
							<option value="Osnovna škola 'Bratstvo jedinstvo' Belo Blato">Osnovna škola 'Bratstvo jedinstvo' Belo Blato</option>
							<option value="Osnovna škola 'Bratstvo' Aradac">Osnovna škola 'Bratstvo' Aradac</option>
							<option value="Osnovna škola 'Vuk Karadžić'">Osnovna škola 'Vuk Karadžić'</option>
							<option value="Osnovna škola 'Dositej Obradović'">Osnovna škola 'Dositej Obradović'</option>
							<option value="Osnovna škola 'Dositej Obradović' Farkaždin">Osnovna škola 'Dositej Obradović' Farkaždin</option>
							<option value="Osnovna škola 'Dr Aleksandar Sabovljev' Ečka">Osnovna škola 'Dr Aleksandar Sabovljev' Ečka</option>
							<option value="Osnovna škola 'Dr Boško Vrebalov' Melenci">Osnovna škola 'Dr Boško Vrebalov' Melenci</option>
							<option value="Osnovna škola 'Dr Jovan Cvijić'">Osnovna škola 'Dr Jovan Cvijić'</option>
							<option value="Osnovna škola 'Đura Jakšić'">Osnovna škola 'Đura Jakšić'</option>
							<option value="Osnovna škola 'Đura Jakšić' Perlez">Osnovna škola 'Đura Jakšić' Perlez</option>
							<option value="Osnovna škola 'Žarko Zrenjanin'">Osnovna škola 'Žarko Zrenjanin'</option>
							<option value="Osnovna škola 'Jovan Dučić' Klek">Osnovna škola 'Jovan Dučić' Klek</option>
							<option value="Osnovna škola 'Jovan Jovanović Zmaj'">Osnovna škola 'Jovan Jovanović Zmaj'</option>
							<option value="Osnovna škola 'Mladost' Tomaševac">Osnovna škola 'Mladost' Tomaševac</option>
							<option value="Osnovna škola 'Petar Kočić' Banatski Despotovac">Osnovna škola 'Petar Kočić' Banatski Despotovac</option>
							<option value="Osnovna škola 'Petar Petrović Njegoš'">Osnovna škola 'Petar Petrović Njegoš'</option>
							<option value="Osnovna škola 'Sveti Sava' Stajićevo">Osnovna škola 'Sveti Sava' Stajićevo</option>
							<option value="Osnovna škola 'Svetozar Marković Toza' Elemir">Osnovna škola 'Svetozar Marković Toza' Elemir</option>
							<option value="Osnovna škola 'Servo Mihalj'">Osnovna škola 'Servo Mihalj'</option>
							<option value="Osnovna škola 'Slavko Rodić' Lazarevo">Osnovna škola 'Slavko Rodić' Lazarevo</option>
							<option value="Osnovna škola 'Sonja Marinković'">Osnovna škola 'Sonja Marinković'</option>
							<option value="Osnovna škola 'Stevan Knićanin' Knićanin">Osnovna škola 'Stevan Knićanin' Knićanin</option>
							<option value="Osnovna škola 'Uroš Predić' Orlovat">Osnovna škola 'Uroš Predić' Orlovat</option>
							<option value="Osnovna škola '1. oktobar' Botoš">Osnovna škola '1. oktobar' Botoš</option>
							<option value="Ekonomsko-trgovinska škola Jovan Trajković">Ekonomsko-trgovinska škola Jovan Trajković</option>
							<option value="Elektrotehnička i građevinska škola Nikola Tesla">Elektrotehnička i građevinska škola Nikola Tesla</option>
							<option value="Zrenjaninska gimnazija">Zrenjaninska gimnazija</option>
							<option value="Medicinska škola">Medicinska škola</option>
							<option value="Muzička škola Josif Marinković">Muzička škola Josif Marinković</option>
							<option value="Osnovna i srednja škola 9. Maj">Osnovna i srednja škola 9. Maj</option>
							<option value="Poljoprivredna škola">Poljoprivredna škola</option>
							<option value="Tehnička škola">Tehnička škola</option>
							<option value="Hemijsko-prehrambena i tekstilna škola Uroš Predić">Hemijsko-prehrambena i tekstilna škola Uroš Predić</option>
						</select>
						<select class="it-school-name" data-city="Zubin Potok">
							<option value="">Izaberite školu</option>
							<option value="Srednja škola Grigorije Božović">Srednja škola Grigorije Božović</option>
						</select>
						<select class="it-school-name" data-city="Ivanjica">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Vučić Veličković' Međurečje">Osnovna škola 'Vučić Veličković' Međurečje</option>
							<option value="Osnovna škola 'Kirilo Savić' Sveštica">Osnovna škola 'Kirilo Savić' Sveštica</option>
							<option value="Osnovna škola 'Major Ilić' Kušići">Osnovna škola 'Major Ilić' Kušići</option>
							<option value="Osnovna škola 'Milan Vučićević Zverac' Bratljevo">Osnovna škola 'Milan Vučićević Zverac' Bratljevo</option>
							<option value="Osnovna škola 'Milinko Kušić'">Osnovna škola 'Milinko Kušić'</option>
							<option value="Osnovna škola 'Mićo Matović' Katići">Osnovna škola 'Mićo Matović' Katići</option>
							<option value="Osnovna škola 'Prof. dr. Nedeljko Košanin' Devići">Osnovna škola 'Prof. dr. Nedeljko Košanin' Devići</option>
							<option value="Osnovna škola 'Svetozar Marković' Kovilje">Osnovna škola 'Svetozar Marković' Kovilje</option>
							<option value="Osnovna škola 'Sreten Lazarević' Prilike">Osnovna škola 'Sreten Lazarević' Prilike</option>
							<option value="Gimnazija 13. Septembar 58">Gimnazija 13. Septembar 58</option>
							<option value="Tehnička škola Miće Matovića 2">Tehnička škola Miće Matovića 2</option>
						</select>
						<select class="it-school-name" data-city="Inđija">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola '22. jul' Krčedin">Osnovna škola '22. jul' Krčedin</option>
							<option value="Osnovna škola 'Branko Radičević' Maradik">Osnovna škola 'Branko Radičević' Maradik</option>
							<option value="Osnovna škola 'Braća Grulović' Beška">Osnovna škola 'Braća Grulović' Beška</option>
							<option value="Osnovna škola 'Dr Đorđe Natošević' Novi Slankamen">Osnovna škola 'Dr Đorđe Natošević' Novi Slankamen</option>
							<option value="Osnovna škola 'Jovan Popović'">Osnovna škola 'Jovan Popović'</option>
							<option value="Osnovna škola 'Petar Kočić'">Osnovna škola 'Petar Kočić'</option>
							<option value="Osnovna škola 'Ruža Đurđević Crna' Čortanovci">Osnovna škola 'Ruža Đurđević Crna' Čortanovci</option>
							<option value="Osnovna škola 'Dušan Jerković'">Osnovna škola 'Dušan Jerković'</option>
							<option value="Osnovna škola 'Slobodan Bajić Paja' Novi Karlovci">Osnovna škola 'Slobodan Bajić Paja' Novi Karlovci</option>
							<option value="Gimnazija Trg slobode 2a">Gimnazija Trg slobode 2a</option>
							<option value="Srednja škola Dr Đorđe Natošević">Srednja škola Dr Đorđe Natošević</option>
							<option value="Tehnička škola Mihajlo Pupin">Tehnička škola Mihajlo Pupin</option>
						</select>
						<select class="it-school-name" data-city="Irig">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Dositej Obradović'">Osnovna škola 'Dositej Obradović'</option>
							<option value="Osnovna škola 'Milica Stojadinović Srpkinja' Vrdnik">Osnovna škola 'Milica Stojadinović Srpkinja' Vrdnik</option>
							<option value="Srednja stručna škola Borislav Mihajlović Mihiz">Srednja stručna škola Borislav Mihajlović Mihiz</option>
						</select>
						<select class="it-school-name" data-city="Jagodina">
							<option value="">Izaberite školu</option>
							<option value="Muzička škola 'Vladimir Đorđević'">Muzička škola 'Vladimir Đorđević'</option>
							<option value="Osnovna škola '17. oktobar'">Osnovna škola '17. oktobar'</option>
							<option value="Osnovna škola 'Boško Đuričić'">Osnovna škola 'Boško Đuričić'</option>
							<option value="Osnovna škola 'Branko Radičević' Bunar">Osnovna škola 'Branko Radičević' Bunar</option>
							<option value="Osnovna škola 'Vuk Karadžić' Glogovac">Osnovna škola 'Vuk Karadžić' Glogovac</option>
							<option value="Osnovna škola 'Goran Ostojić'">Osnovna škola 'Goran Ostojić'</option>
							<option value="Osnovna škola 'Joca Milosavljević' Bagrdan">Osnovna škola 'Joca Milosavljević' Bagrdan</option>
							<option value="Osnovna škola 'Ljubiša Urošević' Ribare">Osnovna škola 'Ljubiša Urošević' Ribare</option>
							<option value="Osnovna škola 'Milan Mijalković'">Osnovna škola 'Milan Mijalković'</option>
							<option value="Osnovna škola 'Rada Miljković'">Osnovna škola 'Rada Miljković'</option>
							<option value="Osnovna škola 'Radislav Nikčević' Majur">Osnovna škola 'Radislav Nikčević' Majur</option>
							<option value="Privatna osnovna škola 'Crnjanski'">Privatna osnovna škola 'Crnjanski'</option>
							<option value="Škola za učenike oštećenog sluha i govora '11. maj'">Škola za učenike oštećenog sluha i govora '11. maj'</option>
							<option value="Gimnazija Svetozar Marković">Gimnazija Svetozar Marković</option>
							<option value="Ekonomsko-trgovinska škola Slavka Đurđević">Ekonomsko-trgovinska škola Slavka Đurđević</option>
							<option value="Elektrotehnička i građevinska škola Nikola Tesla">Elektrotehnička i građevinska škola Nikola Tesla</option>
							<option value="Prva tehnička škola">Prva tehnička škola</option>
							<option value="Srednja medicinska škola">Srednja medicinska škola</option>
							<option value="Škola za učenike oštećenog sluha i govora 11. maj">Škola za učenike oštećenog sluha i govora 11. maj</option>
						</select>
						<select class="it-school-name" data-city="Kanjiža">
							<option value="">Izaberite školu</option>
							<option value="Osnovna muzička škola">Osnovna muzička škola</option>
							<option value="Osnovna škola 'Aranj Janoš' Trešnjevac">Osnovna škola 'Aranj Janoš' Trešnjevac</option>
							<option value="Osnovna škola 'Jovan Jovanović Zmaj'">Osnovna škola 'Jovan Jovanović Zmaj'</option>
							<option value="Osnovna škola 'Karolina Karas' Horgoš">Osnovna škola 'Karolina Karas' Horgoš</option>
							<option value="Poljoprivredno-tehnički srednjoškolski centar Besedeš Jožef">Poljoprivredno-tehnički srednjoškolski centar Besedeš Jožef</option>
						</select>
						<select class="it-school-name" data-city="Kikinda">
							<option value="">Izaberite školu</option>
							<option value="Osnovna muzička škola 'Slobodan Malbaški'">Osnovna muzička škola 'Slobodan Malbaški'</option>
							<option value="Osnovna škola '1. oktobar' Bašaid">Osnovna škola '1. oktobar' Bašaid</option>
							<option value="Osnovna škola '6. oktobar'">Osnovna škola '6. oktobar'</option>
							<option value="Osnovna škola 'Bratstvo - jedinstvo' Banatska Topola">Osnovna škola 'Bratstvo - jedinstvo' Banatska Topola</option>
							<option value="Osnovna škola 'Vasa Stajić' Mokrin">Osnovna škola 'Vasa Stajić' Mokrin</option>
							<option value="Osnovna škola 'Vuk Karadžić'">Osnovna škola 'Vuk Karadžić'</option>
							<option value="Osnovna škola 'Gligorije Popov' Rusko Selo">Osnovna škola 'Gligorije Popov' Rusko Selo</option>
							<option value="Osnovna škola 'Đura Jakšić'">Osnovna škola 'Đura Jakšić'</option>
							<option value="Osnovna škola 'Žarko Zrenjanin'">Osnovna škola 'Žarko Zrenjanin'</option>
							<option value="Osnovna škola 'Ivo Lola Ribar' Novi Kozarci">Osnovna škola 'Ivo Lola Ribar' Novi Kozarci</option>
							<option value="Osnovna škola 'Jovan Popović'">Osnovna škola 'Jovan Popović'</option>
							<option value="Osnovna škola 'Milivoj Omorac' Iđoš">Osnovna škola 'Milivoj Omorac' Iđoš</option>
							<option value="Osnovna škola 'Mora Karolj' Sajan">Osnovna škola 'Mora Karolj' Sajan</option>
							<option value="Osnovna škola 'Petar Kočić' Nakovo">Osnovna škola 'Petar Kočić' Nakovo</option>
							<option value="Osnovna škola 'Sveti Sava'">Osnovna škola 'Sveti Sava'</option>
							<option value="Osnovna škola 'Slavko Rodić' Banatsko Veliko Selo">Osnovna škola 'Slavko Rodić' Banatsko Veliko Selo</option>
							<option value="Osnovna škola 'Feješ Klara'">Osnovna škola 'Feješ Klara'</option>
							<option value="Gimnazija Dušan Vasiljev Doktora">Gimnazija Dušan Vasiljev Doktora</option>
							<option value="Ekonomsko-trgovinska škola Doktora">Ekonomsko-trgovinska škola Doktora</option>
							<option value="Srednja stručna škola Miloš Crnjanski">Srednja stručna škola Miloš Crnjanski</option>
							<option value="Tehnička škola">Tehnička škola</option>
						</select>
						<select class="it-school-name" data-city="Kladovo">
							<option value="">Izaberite školu</option>
							<option value="Osnovna muzička škola 'Konstantin Babić'">Osnovna muzička škola 'Konstantin Babić'</option>
							<option value="Osnovna škola 'Vuk Karadžić'">Osnovna škola 'Vuk Karadžić'</option>
							<option value="Osnovna škola 'Ljubica Jovanović Radosavljević' Podvrška">Osnovna škola 'Ljubica Jovanović Radosavljević' Podvrška</option>
							<option value="Osnovna škola 'Svetozar Radić' Tekija">Osnovna škola 'Svetozar Radić' Tekija</option>
							<option value="Osnovna škola 'Stefanija Mihajlović' Brza Palanka">Osnovna škola 'Stefanija Mihajlović' Brza Palanka</option>
							<option value="Osnovna škola 'Hajduk Veljko' Korbovo">Osnovna škola 'Hajduk Veljko' Korbovo</option>
							<option value="Srednja škola Mladosti 1">Srednja škola Mladosti 1</option>
						</select>
						<select class="it-school-name" data-city="Knić">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Vuk Karadžić'">Osnovna škola 'Vuk Karadžić'</option>
							<option value="Osnovna škola 'Rada Šubakić' Gruža">Osnovna škola 'Rada Šubakić' Gruža</option>
							<option value="Osnovna škola 'Sveti Sava' Toponica">Osnovna škola 'Sveti Sava' Toponica</option>
							<option value="Srednja škola Vojvode Stevana Knićanina 174">Srednja škola Vojvode Stevana Knićanina 174</option>
						</select>
						<select class="it-school-name" data-city="Knjaževac">
							<option value="">Izaberite školu</option>
							<option value="Osnovna muzička škola 'Predrag Milošević'">Osnovna muzička škola 'Predrag Milošević'</option>
							<option value="Osnovna škola 'Dimitrije Todorović Kaplar'">Osnovna škola 'Dimitrije Todorović Kaplar'</option>
							<option value="Osnovna škola 'Dubrava'">Osnovna škola 'Dubrava'</option>
							<option value="Osnovna škola 'Mladost'">Osnovna škola 'Mladost'</option>
							<option value="Osnovna škola 'Vuk Karadžić'">Osnovna škola 'Vuk Karadžić'</option>
							<option value="Knjaževačka gimnazija">Knjaževačka gimnazija</option>
							<option value="Tehnička škola">Tehnička škola</option>
						</select>
						<select class="it-school-name" data-city="Kovačica">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Lukrecija Ankucić' Samoš">Osnovna škola 'Lukrecija Ankucić' Samoš</option>
							<option value="Osnovna škola 'Maršal Tito' Padina">Osnovna škola 'Maršal Tito' Padina</option>
							<option value="Osnovna škola 'Mihajlo Pupin' Idvor">Osnovna škola 'Mihajlo Pupin' Idvor</option>
							<option value="Osnovna škola 'Mlada pokolenja'">Osnovna škola 'Mlada pokolenja'</option>
							<option value="Osnovna škola 'Moša Pijade' Debeljača">Osnovna škola 'Moša Pijade' Debeljača</option>
							<option value="Osnovna škola 'Sava Žebeljan' Crepaja">Osnovna škola 'Sava Žebeljan' Crepaja</option>
							<option value="Osnovna škola 'Sveti Georgije' Uzdin">Osnovna škola 'Sveti Georgije' Uzdin</option>
							<option value="Gimnazija Mihajlo Pupin">Gimnazija Mihajlo Pupin</option>
						</select>
						<select class="it-school-name" data-city="Kovin">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Bora Radić' Bavanište">Osnovna škola 'Bora Radić' Bavanište</option>
							<option value="Osnovna škola 'Desanka Maksimović'">Osnovna škola 'Desanka Maksimović'</option>
							<option value="Osnovna škola 'Đura Jakšić'">Osnovna škola 'Đura Jakšić'</option>
							<option value="Osnovna škola 'Đura Filipović' Pločica">Osnovna škola 'Đura Filipović' Pločica</option>
							<option value="Osnovna škola 'Jovan Jovanović Zmaj'">Osnovna škola 'Jovan Jovanović Zmaj'</option>
							<option value="Osnovna škola 'Miša Stojković' Gaj">Osnovna škola 'Miša Stojković' Gaj</option>
							<option value="Osnovna škola 'Paja Marganović' Deliblato">Osnovna škola 'Paja Marganović' Deliblato</option>
							<option value="Osnovna škola 'Predrag Kožić' Dubovac">Osnovna škola 'Predrag Kožić' Dubovac</option>
							<option value="Osnovna škola 'Sava Maksimović' Mramorak">Osnovna škola 'Sava Maksimović' Mramorak</option>
							<option value="Osnovna škola 'Žarko Zrenjanin' Skorenovac">Osnovna škola 'Žarko Zrenjanin' Skorenovac</option>
							<option value="Gimnazija i ekonomska škola Branko Radičević">Gimnazija i ekonomska škola Branko Radičević</option>
							<option value="Srednja stručna škola Vasa Pelagić">Srednja stručna škola Vasa Pelagić</option>
						</select>
						<select class="it-school-name" data-city="Kosjerić">
							<option value="">Izaberite školu</option>
							<option value="Tehnička škola">Tehnička škola</option>
							<option value="Osnovna škola 'Jordan Đukanović' Varda">Osnovna škola 'Jordan Đukanović' Varda</option>
							<option value="Osnovna škola 'Mito Igumanović'">Osnovna škola 'Mito Igumanović'</option>
						</select>
						<select class="it-school-name" data-city="Kosovska Kamenica">
							<option value="">Izaberite školu</option>
							<option value="Gimnazija">Gimnazija</option>
							<option value="Tehnička škola">Tehnička škola</option>
						</select>
						<select class="it-school-name" data-city="Kosovska Mitrovica">
							<option value="">Izaberite školu</option>
							<option value="Gimnazija">Gimnazija</option>
							<option value="Ekonomsko-trgovinska škola">Ekonomsko-trgovinska škola</option>
							<option value="Medicinska škola">Medicinska škola</option>
							<option value="Muzička škola Miodrag Vasiljević">Muzička škola Miodrag Vasiljević</option>
							<option value="Tehnička škola Mihailo Petrović Alas">Tehnička škola Mihailo Petrović Alas</option>
							<option value="Škola za osnovno i srednje obrazovanje Kosovski božur">Škola za osnovno i srednje obrazovanje Kosovski božur</option>
						</select>
						<select class="it-school-name" data-city="Kostolac">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Jovan Cvijić'">Osnovna škola 'Jovan Cvijić'</option>
							<option value="Tehnička škola Nikola Tesla">Tehnička škola Nikola Tesla</option>
						</select>
						<select class="it-school-name" data-city="Koceljeva">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Mića Stanojlović'">Osnovna škola 'Mića Stanojlović'</option>
							<option value="Srednja škola Dositejeva broj 1">Srednja škola Dositejeva broj 1</option>
						</select>
						<select class="it-school-name" data-city="Kragujevac">
							<option value="">Izaberite školu</option>
							<option value="Muzička škola 'Dr Miloje Milojević'">Muzička škola 'Dr Miloje Milojević'</option>
							<option value="Osnovna škola '19. oktobar' Maršić">Osnovna škola '19. oktobar' Maršić</option>
							<option value="Osnovna škola '21. oktobar'">Osnovna škola '21. oktobar'</option>
							<option value="Osnovna škola 'Vuk Stefanović Karadžić'">Osnovna škola 'Vuk Stefanović Karadžić'</option>
							<option value="Osnovna škola 'Dositej Obradović' Erdeč">Osnovna škola 'Dositej Obradović' Erdeč</option>
							<option value="Osnovna škola 'Dragiša Luković-Španac'">Osnovna škola 'Dragiša Luković-Španac'</option>
							<option value="Osnovna škola 'Dragiša Mihajlović'">Osnovna škola 'Dragiša Mihajlović'</option>
							<option value="Osnovna škola 'Đura Jakšić'">Osnovna škola 'Đura Jakšić'</option>
							<option value="Osnovna škola 'Živadinka Divac'">Osnovna škola 'Živadinka Divac'</option>
							<option value="Osnovna škola 'Jovan Popović'">Osnovna škola 'Jovan Popović'</option>
							<option value="Osnovna škola 'Julijana Ćatić' Stragari">Osnovna škola 'Julijana Ćatić' Stragari</option>
							<option value="Osnovna škola 'Miloje Simović' Dragobraća">Osnovna škola 'Miloje Simović' Dragobraća</option>
							<option value="Osnovna škola 'Milutin i Draginja Todorović'">Osnovna škola 'Milutin i Draginja Todorović'</option>
							<option value="Osnovna škola 'Mirko Jovanović'">Osnovna škola 'Mirko Jovanović'</option>
							<option value="Osnovna škola 'Moma Stanojlović'">Osnovna škola 'Moma Stanojlović'</option>
							<option value="Osnovna škola 'Natalija Nana Nedeljković' Grošnica">Osnovna škola 'Natalija Nana Nedeljković' Grošnica</option>
							<option value="Osnovna škola 'Prota Stevan Popović' Čumić">Osnovna škola 'Prota Stevan Popović' Čumić</option>
							<option value="Osnovna škola 'Radoje Domanović'">Osnovna škola 'Radoje Domanović'</option>
							<option value="Osnovna škola 'Sveti Sava'">Osnovna škola 'Sveti Sava'</option>
							<option value="Osnovna škola 'Svetozar Marković'">Osnovna škola 'Svetozar Marković'</option>
							<option value="Osnovna škola 'Sreten Mladenović' Desimirovac">Osnovna škola 'Sreten Mladenović' Desimirovac</option>
							<option value="Osnovna škola 'Stanislav Sremčević'">Osnovna škola 'Stanislav Sremčević'</option>
							<option value="Osnovna škola 'Treći kragujevački bataljon'">Osnovna škola 'Treći kragujevački bataljon'</option>
							<option value="Škola za osnovno obrazovanje 'Vukašin Marković'">Škola za osnovno obrazovanje 'Vukašin Marković'</option>
							<option value="Škola sa domom za učenike oštećenog sluha">Škola sa domom za učenike oštećenog sluha</option>
							<option value="Druga kragujevačka gimnazija Liceja">Druga kragujevačka gimnazija Liceja</option>
							<option value="Ekonomska škola">Ekonomska škola</option>
							<option value="Medicinska škola Sestre Ninković">Medicinska škola Sestre Ninković</option>
							<option value="Muzička škola dr Miloje Milojević">Muzička škola dr Miloje Milojević</option>
							<option value="Prva kragujevačka gimnazija">Prva kragujevačka gimnazija</option>
							<option value="Prva tehnička škola">Prva tehnička škola</option>
							<option value="Srednja stručna škola">Srednja stručna škola</option>
							<option value="Srednja škola Dositej Obradović">Srednja škola Dositej Obradović</option>
							<option value="Srednja škola Sveti Arhangel">Srednja škola Sveti Arhangel</option>
							<option value="Trgovinsko-ugostiteljska škola Toza Dragović">Trgovinsko-ugostiteljska škola Toza Dragović</option>
							<option value="Škola za osnovno i srednje obrazovanje Vukašin Marković">Škola za osnovno i srednje obrazovanje Vukašin Marković</option>
							<option value="Škola sa domom za učenike oštećenog sluha">Škola sa domom za učenike oštećenog sluha</option>
						</select>
						<select class="it-school-name" data-city="Kraljevo">
							<option value="">Izaberite školu</option>
							<option value="Muzička škola 'Stevan Mokranjac'">Muzička škola 'Stevan Mokranjac'</option>
							<option value="Osnovna škola 'IV kraljevački bataljon'">Osnovna škola 'IV kraljevački bataljon'</option>
							<option value="Osnovna škola 'Braća Vilotijević'">Osnovna škola 'Braća Vilotijević'</option>
							<option value="Osnovna škola 'VUK KARADžIĆ'">Osnovna škola 'VUK KARADžIĆ'</option>
							<option value="Osnovna škola 'Dositej Obradović' Vrba">Osnovna škola 'Dositej Obradović' Vrba</option>
							<option value="Osnovna škola 'DRAGAN DJOKOVIĆ UČA' Lađevci">Osnovna škola 'DRAGAN DJOKOVIĆ UČA' Lađevci</option>
							<option value="Osnovna škola 'Dragan Marinković' Adrani">Osnovna škola 'Dragan Marinković' Adrani</option>
							<option value="Osnovna škola 'Živan Maričić' Žiča">Osnovna škola 'Živan Maričić' Žiča</option>
							<option value="Osnovna škola 'Jovan Dučić' Roćevići">Osnovna škola 'Jovan Dučić' Roćevići</option>
							<option value="Osnovna škola 'Jovan Cvijić' Sirča">Osnovna škola 'Jovan Cvijić' Sirča</option>
							<option value="Osnovna škola 'Jovo Kursula'">Osnovna škola 'Jovo Kursula'</option>
							<option value="Osnovna škola 'Milunka Savić' Vitanovac">Osnovna škola 'Milunka Savić' Vitanovac</option>
							<option value="Osnovna škola 'Olga Milutinović' Godačica">Osnovna škola 'Olga Milutinović' Godačica</option>
							<option value="Osnovna škola 'Sveti Sava'">Osnovna škola 'Sveti Sava'</option>
							<option value="Osnovna škola 'Stefan Nemanja' Brezova">Osnovna škola 'Stefan Nemanja' Brezova</option>
							<option value="Osnovna škola 'Čibukovački partizani'">Osnovna škola 'Čibukovački partizani'</option>
							<option value="Osnovna škola 'Đura Jakšić' Konarevo">Osnovna škola 'Đura Jakšić' Konarevo</option>
							<option value="Osnovna škola 'Dimitrije Tucović'">Osnovna škola 'Dimitrije Tucović'</option>
							<option value="Osnovna škola 'Milun Ivanović' Ušće">Osnovna škola 'Milun Ivanović' Ušće</option>
							<option value="Osnovna škola 'Svetozar Marković'">Osnovna škola 'Svetozar Marković'</option>
							<option value="Osnovna škola 'Branko Radičević' Vitkovac">Osnovna škola 'Branko Radičević' Vitkovac</option>
							<option value="Osnovna škola 'Petar Nikolić' Samaila">Osnovna škola 'Petar Nikolić' Samaila</option>
							<option value="Škola za osnovno i srednje obrazovanje 'Ivo Lola Ribar'">Škola za osnovno i srednje obrazovanje 'Ivo Lola Ribar'</option>
							<option value="Gimnazija">Gimnazija</option>
							<option value="Ekonomsko-trgovinska škola">Ekonomsko-trgovinska škola</option>
							<option value="Elektro-saobraćajna tehnička škola Nikola Tesla">Elektro-saobraćajna tehnička škola Nikola Tesla</option>
							<option value="Mašinska tehnička škola 14. oktobar">Mašinska tehnička škola 14. oktobar</option>
							<option value="Medicinska škola">Medicinska škola</option>
							<option value="Muzička škola Stevan Mokranjac">Muzička škola Stevan Mokranjac</option>
							<option value="Poljoprivredno-hemijska škola Dr Đorđe Radić">Poljoprivredno-hemijska škola Dr Đorđe Radić</option>
							<option value="Umetnička škola">Umetnička škola</option>
							<option value="Škola za osnovno i srednje obrazovanje Ivo Lola Ribar">Škola za osnovno i srednje obrazovanje Ivo Lola Ribar</option>
							<option value="Šumarska škola">Šumarska škola</option>
						</select>
						<select class="it-school-name" data-city="Krupanj">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Borivoje Ž. Milojević'">Osnovna škola 'Borivoje Ž. Milojević'</option>
							<option value="Osnovna škola 'Žikica Jovanović Španac' Bela Crkva">Osnovna škola 'Žikica Jovanović Španac' Bela Crkva</option>
							<option value="Srednja škola">Srednja škola</option>
						</select>
						<select class="it-school-name" data-city="Kruševac">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Brana Pavlović' Konjuh">Osnovna škola 'Brana Pavlović' Konjuh</option>
							<option value="Osnovna škola 'Branko Radičević' Bivolje">Osnovna škola 'Branko Radičević' Bivolje</option>
							<option value="Osnovna škola 'Vasa Pelagić' Padež">Osnovna škola 'Vasa Pelagić' Padež</option>
							<option value="Osnovna škola 'Velizar Stanković-Korčagin' Veliki Šiljegovac">Osnovna škola 'Velizar Stanković-Korčagin' Veliki Šiljegovac</option>
							<option value="Osnovna škola 'Vladislav Savić Jan' Parunovac">Osnovna škola 'Vladislav Savić Jan' Parunovac</option>
							<option value="Osnovna škola 'Vuk Karadžić'">Osnovna škola 'Vuk Karadžić'</option>
							<option value="Osnovna škola 'Despot Stefan' Gornji Stepoš">Osnovna škola 'Despot Stefan' Gornji Stepoš</option>
							<option value="Osnovna škola 'Dositej Obradović'">Osnovna škola 'Dositej Obradović'</option>
							<option value="Osnovna škola 'Dragomir Marković'">Osnovna škola 'Dragomir Marković'</option>
							<option value="Osnovna škola 'Žabare'">Osnovna škola 'Žabare'</option>
							<option value="Osnovna škola 'Jovan Jovanović Zmaj' Mudrakovac">Osnovna škola 'Jovan Jovanović Zmaj' Mudrakovac</option>
							<option value="Osnovna škola 'Jovan Popović'">Osnovna škola 'Jovan Popović'</option>
							<option value="Osnovna škola 'Knez Lazar' Veliki Kupci">Osnovna škola 'Knez Lazar' Veliki Kupci</option>
							<option value="Osnovna škola 'Nada Popović'">Osnovna škola 'Nada Popović'</option>
							<option value="Osnovna škola 'Sveti Sava' Čitluk">Osnovna škola 'Sveti Sava' Čitluk</option>
							<option value="Osnovna škola 'Stanislav Binički' Jasika">Osnovna škola 'Stanislav Binički' Jasika</option>
							<option value="Osnovna škola 'Strahinja Popović' Dvorane">Osnovna škola 'Strahinja Popović' Dvorane</option>
							<option value="Škola za osnovno i srednje obrazovanje 'Veselin Nikolić'">Škola za osnovno i srednje obrazovanje 'Veselin Nikolić'</option>
							<option value="Gimnazija">Gimnazija</option>
							<option value="Ekonomsko-trgovinska škola">Ekonomsko-trgovinska škola</option>
							<option value="Medicinska škola">Medicinska škola</option>
							<option value="Muzička škola Stevan Hristić">Muzička škola Stevan Hristić</option>
							<option value="Politehnička škola Milutin Milanković">Politehnička škola Milutin Milanković</option>
							<option value="Prva tehnička škola">Prva tehnička škola</option>
							<option value="Srednja poslovno menadžerska škola">Srednja poslovno menadžerska škola</option>
							<option value="Hemijsko-tehnološka škola">Hemijsko-tehnološka škola</option>
							<option value="Škola za osnovno i srednje obrazovanje Veselin Nikolić">Škola za osnovno i srednje obrazovanje Veselin Nikolić</option>
						</select>
						<select class="it-school-name" data-city="Kula">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Petefi brigada'">Osnovna škola 'Petefi brigada'</option>
							<option value="Osnovna i srednja škola 'Pjetro Kuzmjak' Ruski Krstur">Osnovna i srednja škola 'Pjetro Kuzmjak' Ruski Krstur</option>
							<option value="Osnovna škola '20. oktobar' Sivac">Osnovna škola '20. oktobar' Sivac</option>
							<option value="Osnovna škola 'Veljko Vlahović' Kruščić">Osnovna škola 'Veljko Vlahović' Kruščić</option>
							<option value="Osnovna škola 'Vuk Karadžić' Crvenka">Osnovna škola 'Vuk Karadžić' Crvenka</option>
							<option value="Osnovna škola 'Isa Bajić'">Osnovna škola 'Isa Bajić'</option>
							<option value="Osnovna škola 'Nikola Tesla' Lipar">Osnovna škola 'Nikola Tesla' Lipar</option>
							<option value="Ekonomsko-trgovinska škola">Ekonomsko-trgovinska škola</option>
							<option value="Srednja tehnička škola Mihajlo Pupin">Srednja tehnička škola Mihajlo Pupin</option>
							<option value="Srednja škola Peti april">Srednja škola Peti april</option>
							<option value="Škola za osnovno muzičko obrazovanje">Škola za osnovno muzičko obrazovanje</option>
						</select>
						<select class="it-school-name" data-city="Kuršumlija">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Drinka Pavlović'">Osnovna škola 'Drinka Pavlović'</option>
							<option value="Osnovna škola 'Miloje Zakić'">Osnovna škola 'Miloje Zakić'</option>
							<option value="Gimnazija">Gimnazija</option>
							<option value="Ekonomsko-tehnička škola">Ekonomsko-tehnička škola</option>
						</select>
						<select class="it-school-name" data-city="Kučevo">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Veljko Dugošević' Turija">Osnovna škola 'Veljko Dugošević' Turija</option>
							<option value="Osnovna škola 'Milutin Milanković' Rabrovo">Osnovna škola 'Milutin Milanković' Rabrovo</option>
							<option value="Osnovna škola 'Slobodan Jović' Voluja">Osnovna škola 'Slobodan Jović' Voluja</option>
							<option value="Osnovna škola 'Ugrin Branković'">Osnovna škola 'Ugrin Branković'</option>
							<option value="Ekonomsko-trgovinska i mašinska škola">Ekonomsko-trgovinska i mašinska škola</option>
						</select>
						<select class="it-school-name" data-city="Lazarevac">
							<option value="">Izaberite školu</option>
							<option value="Gimnazija">Gimnazija</option>
							<option value="Muzička škola Marko Tajčević">Muzička škola Marko Tajčević</option>
							<option value="Poslovno menadžerska škola">Poslovno menadžerska škola</option>
							<option value="Tehnička škola Kolubara">Tehnička škola Kolubara</option>
						</select>
						<select class="it-school-name" data-city="Lajkovac">
							<option value="">Izaberite školu</option>
							<option value="Srednja škola 17. septembar">Srednja škola 17. septembar</option>
							<option value="Osnovna škola 'Dimitrije Tucović' Jabučje">Osnovna škola 'Dimitrije Tucović' Jabučje</option>
							<option value="Osnovna škola 'Mile Dubljević'">Osnovna škola 'Mile Dubljević'</option>
						</select>
						<select class="it-school-name" data-city="Laplje Selo">
							<option value="">Izaberite školu</option>
							<option value="Gimnazija">Gimnazija</option>
							<option value="Ekonomsko-trgovinska škola">Ekonomsko-trgovinska škola</option>
						</select>
						<select class="it-school-name" data-city="Lapovo">
							<option value="">Izaberite školu</option>
							<option value="Srednja škola">Srednja škola</option>
							<option value="Osnovna škola 'Svetozar Marković'">Osnovna škola 'Svetozar Marković'</option>
						</select>
						<select class="it-school-name" data-city="Lebane">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Vuk Karadžić'">Osnovna škola 'Vuk Karadžić'</option>
							<option value="Osnovna škola 'Radovan Kovačević Maksim'">Osnovna škola 'Radovan Kovačević Maksim'</option>
							<option value="Osnovna škola 'Radoje Domanović' Bošnjace">Osnovna škola 'Radoje Domanović' Bošnjace</option>
							<option value="Gimnazija">Gimnazija</option>
							<option value="Srednja tehnička škola Vožd Karađorđe">Srednja tehnička škola Vožd Karađorđe</option>
						</select>
						<select class="it-school-name" data-city="Leposavić">
							<option value="">Izaberite školu</option>
							<option value="Srednja škola Nikola Tesla">Srednja škola Nikola Tesla</option>
						</select>
						<select class="it-school-name" data-city="Leskovac">
							<option value="">Izaberite školu</option>
							<option value="Muzička škola 'Stanislav Binički'">Muzička škola 'Stanislav Binički'</option>
							<option value="Osnovna škola 'Vuk Karadžić' Pečenjevce">Osnovna škola 'Vuk Karadžić' Pečenjevce</option>
							<option value="Osnovna škola 'Bora Stanković' Bogojevce">Osnovna škola 'Bora Stanković' Bogojevce</option>
							<option value="Osnovna škola 'Bora Stanković' Vučje">Osnovna škola 'Bora Stanković' Vučje</option>
							<option value="Osnovna škola 'Bora Stanković' Guberevac">Osnovna škola 'Bora Stanković' Guberevac</option>
							<option value="Osnovna škola 'Branko Radičević' Brestovac">Osnovna škola 'Branko Radičević' Brestovac</option>
							<option value="Osnovna škola 'Vasa Pelagić'">Osnovna škola 'Vasa Pelagić'</option>
							<option value="Osnovna škola 'Vožd Karađorđe'">Osnovna škola 'Vožd Karađorđe'</option>
							<option value="Osnovna škola 'Vuk Karadžić' Velika Grabovnica">Osnovna škola 'Vuk Karadžić' Velika Grabovnica</option>
							<option value="Osnovna škola 'Đura Jakšić' Turekovac">Osnovna škola 'Đura Jakšić' Turekovac</option>
							<option value="Osnovna škola 'Josif Pančić' Orašac">Osnovna škola 'Josif Pančić' Orašac</option>
							<option value="Osnovna škola 'Kosta Stamenković'">Osnovna škola 'Kosta Stamenković'</option>
							<option value="Osnovna škola 'Milutin Smiljković' Vinarce">Osnovna škola 'Milutin Smiljković' Vinarce</option>
							<option value="Osnovna škola 'Nikola Skobaljić' Veliko Trnjane">Osnovna škola 'Nikola Skobaljić' Veliko Trnjane</option>
							<option value="Osnovna škola 'Petar Tasić'">Osnovna škola 'Petar Tasić'</option>
							<option value="Osnovna škola 'Svetozar Marković'">Osnovna škola 'Svetozar Marković'</option>
							<option value="Osnovna škola 'Slavko Zlatanović' Miroševce">Osnovna škola 'Slavko Zlatanović' Miroševce</option>
							<option value="Osnovna škola 'Aca Sinadinović' Predejane">Osnovna škola 'Aca Sinadinović' Predejane</option>
							<option value="Osnovna škola 'Desanka Maksimović' Grdelica">Osnovna škola 'Desanka Maksimović' Grdelica</option>
							<option value="Osnovna škola 'Radoje Domanović' Manojlovce">Osnovna škola 'Radoje Domanović' Manojlovce</option>
							<option value="Osnovna škola 'Vuk Karadžić'">Osnovna škola 'Vuk Karadžić'</option>
							<option value="Osnovna škola 'Josif Kostić'">Osnovna škola 'Josif Kostić'</option>
							<option value="Osnovna škola 'Trajko Stamenković'">Osnovna škola 'Trajko Stamenković'</option>
							<option value="Škola za osnovno i srednje obrazovanje '11. oktobar'">Škola za osnovno i srednje obrazovanje '11. oktobar'</option>
							<option value="Gimnazija">Gimnazija</option>
							<option value="Ekonomska škola Đuka Dinić">Ekonomska škola Đuka Dinić</option>
							<option value="Medicinska škola Bore Dimitrijevića Piksle 1">Medicinska škola Bore Dimitrijevića Piksle 1</option>
							<option value="Muzička škola Stanislav Binički">Muzička škola Stanislav Binički</option>
							<option value="Poljoprivredna škola">Poljoprivredna škola</option>
							<option value="Tehnička škola Rade Metalac">Tehnička škola Rade Metalac</option>
							<option value="Trgovinsko-ugostiteljska škola">Trgovinsko-ugostiteljska škola</option>
							<option value="Hemijsko-tehnološka škola Božidar Đorđević Kukar">Hemijsko-tehnološka škola Božidar Đorđević Kukar</option>
							<option value="Škola za osnovno i srednje obrazovanje 11.oktobar">Škola za osnovno i srednje obrazovanje 11.oktobar</option>
							<option value="Škola za tekstil i dizajn">Škola za tekstil i dizajn</option>
						</select>
						<select class="it-school-name" data-city="Lešak">
							<option value="">Izaberite školu</option>
							<option value="Poljoprivredna škola">Poljoprivredna škola</option>
						</select>
						<select class="it-school-name" data-city="Loznica">
							<option value="">Izaberite školu</option>
							<option value="Osnovna muzička škola 'Vuk Karadžić'">Osnovna muzička škola 'Vuk Karadžić'</option>
							<option value="Osnovna škola '14.oktobar' Draginac">Osnovna škola '14.oktobar' Draginac</option>
							<option value="Osnovna škola 'Anta Bogićević'">Osnovna škola 'Anta Bogićević'</option>
							<option value="Osnovna škola 'Vera Blagojević' Banja Koviljača">Osnovna škola 'Vera Blagojević' Banja Koviljača</option>
							<option value="Osnovna škola 'Vuk Karadžić'">Osnovna škola 'Vuk Karadžić'</option>
							<option value="Osnovna škola 'Vuk Karadžić' Lipnica">Osnovna škola 'Vuk Karadžić' Lipnica</option>
							<option value="Osnovna škola 'Vukova spomen škola' Tršić">Osnovna škola 'Vukova spomen škola' Tršić</option>
							<option value="Osnovna škola 'Dositej Obradović' Klupci">Osnovna škola 'Dositej Obradović' Klupci</option>
							<option value="Osnovna škola 'Jovan Cvijić'">Osnovna škola 'Jovan Cvijić'</option>
							<option value="Osnovna škola 'Kadinjača'">Osnovna škola 'Kadinjača'</option>
							<option value="Osnovna škola 'Kralj Aleksandar I Karađorđević' Jadranska Lešnica">Osnovna škola 'Kralj Aleksandar I Karađorđević' Jadranska Lešnica</option>
							<option value="Osnovna škola 'Mika Mitrović' Brezjak">Osnovna škola 'Mika Mitrović' Brezjak</option>
							<option value="Osnovna škola 'Petar Tasić' Lešnica">Osnovna škola 'Petar Tasić' Lešnica</option>
							<option value="Osnovna škola 'Sveti Sava' Lipnički Šor">Osnovna škola 'Sveti Sava' Lipnički Šor</option>
							<option value="Osnovna škola 'Stepa Stepanović' Tekeriš">Osnovna škola 'Stepa Stepanović' Tekeriš</option>
							<option value="Gimnazija Vuk Karadžić">Gimnazija Vuk Karadžić</option>
							<option value="Srednja ekonomska škola">Srednja ekonomska škola</option>
							<option value="Srednja škola Sveti Sava">Srednja škola Sveti Sava</option>
							<option value="Tehnička škola">Tehnička škola</option>
						</select>
						<select class="it-school-name" data-city="Lučani">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Akademik Milenko Šušić' Guča">Osnovna škola 'Akademik Milenko Šušić' Guča</option>
							<option value="Osnovna škola 'Vuk Karadžić' Kaona">Osnovna škola 'Vuk Karadžić' Kaona</option>
							<option value="Osnovna škola 'Goračići' Goračići">Osnovna škola 'Goračići' Goračići</option>
							<option value="Osnovna škola 'Kotraža' Kotraža">Osnovna škola 'Kotraža' Kotraža</option>
							<option value="Osnovna škola 'Marko Pajić' Viča">Osnovna škola 'Marko Pajić' Viča</option>
							<option value="Osnovna škola 'Milan Blagojević'">Osnovna škola 'Milan Blagojević'</option>
						</select>
						<select class="it-school-name" data-city="Ljig">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Sava Kerković'">Osnovna škola 'Sava Kerković'</option>
							<option value="Osnovna škola 'Sestre Pavlović' Belanovica">Osnovna škola 'Sestre Pavlović' Belanovica</option>
							<option value="Srednja škola 1300 kaplara">Srednja škola 1300 kaplara</option>
						</select>
						<select class="it-school-name" data-city="Ljubovija">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Petar Vragolić'">Osnovna škola 'Petar Vragolić'</option>
							<option value="Srednja škola Vuk Karadžić Drinska bb">Srednja škola Vuk Karadžić Drinska bb</option>
						</select>
						<select class="it-school-name" data-city="Majdanpek">
							<option value="">Izaberite školu</option>
							<option value="Osnovna muzička škola 'Ranko Krivić'">Osnovna muzička škola 'Ranko Krivić'</option>
							<option value="Osnovna škola '12. septembar'">Osnovna škola '12. septembar'</option>
							<option value="Osnovna škola 'Branko Perić' Rudna Glava">Osnovna škola 'Branko Perić' Rudna Glava</option>
							<option value="Osnovna škola 'Velimir Markićević'">Osnovna škola 'Velimir Markićević'</option>
							<option value="Osnovna škola 'Vuk Karadžić' Donji Milanovac">Osnovna škola 'Vuk Karadžić' Donji Milanovac</option>
							<option value="Osnovna škola 'Miladin Bučanović' Vlaole">Osnovna škola 'Miladin Bučanović' Vlaole</option>
							<option value="Gimnazija Mile Arsenijević Bandera">Gimnazija Mile Arsenijević Bandera</option>
							<option value="Tehnička škola">Tehnička škola</option>
						</select>
						<select class="it-school-name" data-city="Mali Zvornik">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Nikola Tesla' Velika Reka">Osnovna škola 'Nikola Tesla' Velika Reka</option>
							<option value="Osnovna škola 'Stevan Filipović' Radalj">Osnovna škola 'Stevan Filipović' Radalj</option>
							<option value="Osnovna škola 'Branko Radičević'">Osnovna škola 'Branko Radičević'</option>
							<option value="Osnovna škola 'Braća Ribar' Donja Borina">Osnovna škola 'Braća Ribar' Donja Borina</option>
							<option value="Osnovna škola 'Miloš Gajić' Amajić">Osnovna škola 'Miloš Gajić' Amajić</option>
							<option value="Srednja škola">Srednja škola</option>
						</select>
						<select class="it-school-name" data-city="Mali Iđoš">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Adi Endre'">Osnovna škola 'Adi Endre'</option>
							<option value="Osnovna škola 'Vuk Karadžić' Lovćenac">Osnovna škola 'Vuk Karadžić' Lovćenac</option>
							<option value="Osnovna škola 'Nikola Đurković' Feketić">Osnovna škola 'Nikola Đurković' Feketić</option>
						</select>
						<select class="it-school-name" data-city="Malo Crniće">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Draža Marković Rođa' Smoljinac">Osnovna škola 'Draža Marković Rođa' Smoljinac</option>
							<option value="Osnovna škola 'Đura Jakšić' Toponica">Osnovna škola 'Đura Jakšić' Toponica</option>
							<option value="Osnovna škola 'Milisav Nikolić' Boževac">Osnovna škola 'Milisav Nikolić' Boževac</option>
							<option value="Osnovna škola 'Moša Pijade'">Osnovna škola 'Moša Pijade'</option>
						</select>
						<select class="it-school-name" data-city="Medveđa">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Vladimir Bukilić' Tulare">Osnovna škola 'Vladimir Bukilić' Tulare</option>
							<option value="Osnovna škola 'Gornja Jablanica'">Osnovna škola 'Gornja Jablanica'</option>
							<option value="Osnovna škola 'Zenelj Hajdini' Tupale">Osnovna škola 'Zenelj Hajdini' Tupale</option>
							<option value="Osnovna škola 'Partizanski dom' Donji Bučumet">Osnovna škola 'Partizanski dom' Donji Bučumet</option>
							<option value="Osnovna škola 'Radovan Kovačević' Lece">Osnovna škola 'Radovan Kovačević' Lece</option>
							<option value="Osnovna škola 'Sijarinska Banja' Sijarinska Banja">Osnovna škola 'Sijarinska Banja' Sijarinska Banja</option>
							<option value="Tehnička škola Nikola Tesla">Tehnička škola Nikola Tesla</option>
						</select>
						<select class="it-school-name" data-city="Merošina">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Jastrebački partizani'">Osnovna škola 'Jastrebački partizani'</option>
						</select>
						<select class="it-school-name" data-city="Mionica">
							<option value="">Izaberite školu</option>
							<option value="Srednja škola">Srednja škola</option>
							<option value="Osnovna škola 'Vojvoda Živojin Mišić' Rajković">Osnovna škola 'Vojvoda Živojin Mišić' Rajković</option>
							<option value="Osnovna škola 'Milan Rakić'">Osnovna škola 'Milan Rakić'</option>
						</select>
						<select class="it-school-name" data-city="Mladenovac">
							<option value="">Izaberite školu</option>
							<option value="Gimnazija">Gimnazija</option>
							<option value="Tehnička škola">Tehnička škola</option>
						</select>
						<select class="it-school-name" data-city="Negotin">
							<option value="">Izaberite školu</option>
							<option value="Muzička škola 'Stevan Mokranjac'">Muzička škola 'Stevan Mokranjac'</option>
							<option value="Osnovna škola 'Branislav Nušić' Urovica">Osnovna škola 'Branislav Nušić' Urovica</option>
							<option value="Osnovna škola 'Branko Radičević'">Osnovna škola 'Branko Radičević'</option>
							<option value="Osnovna škola 'Vera Radosavljević'">Osnovna škola 'Vera Radosavljević'</option>
							<option value="Osnovna škola 'Vuk Karadžić'">Osnovna škola 'Vuk Karadžić'</option>
							<option value="Osnovna škola 'Jovan Jovanović Zmaj' Jabukovac">Osnovna škola 'Jovan Jovanović Zmaj' Jabukovac</option>
							<option value="Osnovna škola 'Momčilo Ranković' Rajac">Osnovna škola 'Momčilo Ranković' Rajac</option>
							<option value="Osnovna škola 'Pavle Ilić Veljko' Dušanovac">Osnovna škola 'Pavle Ilić Veljko' Dušanovac</option>
							<option value="Osnovna škola 'Pavle Ilić Veljko' Prahovo">Osnovna škola 'Pavle Ilić Veljko' Prahovo</option>
							<option value="Osnovna škola 'Stevan Mokranjac' Kobišnica">Osnovna škola 'Stevan Mokranjac' Kobišnica</option>
							<option value="Osnovna škola 'Hajduk Veljko' Štubik">Osnovna škola 'Hajduk Veljko' Štubik</option>
							<option value="Osnovna škola za lako mentalno ometenu decu '12. decembar'">Osnovna škola za lako mentalno ometenu decu '12. decembar'</option>
							<option value="Muzička škola Stevan Mokranjac">Muzička škola Stevan Mokranjac</option>
							<option value="Negotinska gimnazija">Negotinska gimnazija</option>
							<option value="Poljoprivredna škola Rajko Bosnić">Poljoprivredna škola Rajko Bosnić</option>
							<option value="Tehnička škola Miomira Radosavljevića">Tehnička škola Miomira Radosavljevića</option>
						</select>
						<select class="it-school-name" data-city="Niš - Medijana">
							<option value="">Izaberite školu</option>
							<option value="Muzička škola">Muzička škola</option>
							<option value="Osnovna škola 'Ćele Kula'">Osnovna škola 'Ćele Kula'</option>
							<option value="Osnovna škola 'Vožd Karađorđe'">Osnovna škola 'Vožd Karađorđe'</option>
							<option value="Osnovna škola 'Dositej Obradović'">Osnovna škola 'Dositej Obradović'</option>
							<option value="Osnovna škola 'Dr Zoran Đinđić' Brzi brod">Osnovna škola 'Dr Zoran Đinđić' Brzi brod</option>
							<option value="Osnovna škola 'Dušan Radović'">Osnovna škola 'Dušan Radović'</option>
							<option value="Osnovna škola 'Radoje Domanović'">Osnovna škola 'Radoje Domanović'</option>
							<option value="Osnovna škola 'Ratko Vukićević'">Osnovna škola 'Ratko Vukićević'</option>
							<option value="Osnovna škola 'Sveti Sava'">Osnovna škola 'Sveti Sava'</option>
							<option value="Osnovna škola 'Učitelj Tasa'">Osnovna škola 'Učitelj Tasa'</option>
							<option value="Osnovna škola 'Car Konstantin'">Osnovna škola 'Car Konstantin'</option>
							<option value="Gimnazija Bora Stanković">Gimnazija Bora Stanković</option>
							<option value="Gimnazija Deveti maj">Gimnazija Deveti maj</option>
							<option value="Ekonomska škola">Ekonomska škola</option>
							<option value="Elektrotehnička škola Mija Stanimirović">Elektrotehnička škola Mija Stanimirović</option>
							<option value="Medicinska škola Dr Milenko Hadžić">Medicinska škola Dr Milenko Hadžić</option>
							<option value="Muzička škola">Muzička škola</option>
							<option value="Pravno-poslovna škola Trg kralja Milana 8">Pravno-poslovna škola Trg kralja Milana 8</option>
							<option value="Prva niška gimnazija Stevan Sremac">Prva niška gimnazija Stevan Sremac</option>
							<option value="Prehrambeno-hemijska škola Generala Milojka">Prehrambeno-hemijska škola Generala Milojka</option>
							<option value="Srednja škola Prokopović 9. brigade 6">Srednja škola Prokopović 9. brigade 6</option>
							<option value="Trgovinska škola">Trgovinska škola</option>
							<option value="Ugostiteljsko-turistička škola">Ugostiteljsko-turistička škola</option>
							<option value="Umetnička škola">Umetnička škola</option>
							<option value="Škola mode i lepote Generala Milojka">Škola mode i lepote Generala Milojka</option>
						</select>
						<select class="it-school-name" data-city="Niš - Palilula">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Branko Miljković'">Osnovna škola 'Branko Miljković'</option>
							<option value="Osnovna škola 'Branko Radičević' Gabrovac">Osnovna škola 'Branko Radičević' Gabrovac</option>
							<option value="Osnovna škola 'Bubanjski heroji'">Osnovna škola 'Bubanjski heroji'</option>
							<option value="Osnovna škola 'Desanka Maksimović' Čokot">Osnovna škola 'Desanka Maksimović' Čokot</option>
							<option value="Osnovna škola 'Kole Rašić'">Osnovna škola 'Kole Rašić'</option>
							<option value="Osnovna škola 'Kralj Petar I'">Osnovna škola 'Kralj Petar I'</option>
							<option value="Osnovna škola 'Sreten Mladenović Mika'">Osnovna škola 'Sreten Mladenović Mika'</option>
							<option value="Specijalna škola 'Bubanj'">Specijalna škola 'Bubanj'</option>
							<option value="Škola za osnovno i srednje obrazovanje 'Carica Jelena'">Škola za osnovno i srednje obrazovanje 'Carica Jelena'</option>
							<option value="Gimnazija Svetozar Marković">Gimnazija Svetozar Marković</option>
							<option value="Mašinska škola">Mašinska škola</option>
							<option value="Specijalna škola Bubanj">Specijalna škola Bubanj</option>
							<option value="Škola za osnovno i srednje obrazovanje Carica Jelena">Škola za osnovno i srednje obrazovanje Carica Jelena</option>
						</select>
						<select class="it-school-name" data-city="Niš - Crveni Krst">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Branislav Nušić' Donja Trnava">Osnovna škola 'Branislav Nušić' Donja Trnava</option>
							<option value="Osnovna škola 'Vojislav Ilić-Mlađi' Hum">Osnovna škola 'Vojislav Ilić-Mlađi' Hum</option>
							<option value="Osnovna škola 'Ivo Andrić'">Osnovna škola 'Ivo Andrić'</option>
							<option value="Osnovna škola 'Lela Popović' Miljkovac">Osnovna škola 'Lela Popović' Miljkovac</option>
							<option value="Osnovna škola 'Milan Rakić' Medoševac">Osnovna škola 'Milan Rakić' Medoševac</option>
							<option value="Osnovna škola 'Prvi maj' Trupale">Osnovna škola 'Prvi maj' Trupale</option>
							<option value="Osnovna škola 'Vuk Karadžić'">Osnovna škola 'Vuk Karadžić'</option>
							<option value="Građevinska tehnička škola Neimar">Građevinska tehnička škola Neimar</option>
							<option value="Elektrotehnička škola Nikola Tesla">Elektrotehnička škola Nikola Tesla</option>
							<option value="Srednja stručna škola">Srednja stručna škola</option>
						</select>
						<select class="it-school-name" data-city="Niška Banja">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Đura Jakšić' Jelašnica">Osnovna škola 'Đura Jakšić' Jelašnica</option>
							<option value="Osnovna škola 'Ivan Goran Kovačić'">Osnovna škola 'Ivan Goran Kovačić'</option>
							<option value="Osnovna škola 'Nadežda Petrović' Sićevo">Osnovna škola 'Nadežda Petrović' Sićevo</option>
						</select>
						<select class="it-school-name" data-city="Nova Varoš">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Vuk Karadžić' Jasenovo">Osnovna škola 'Vuk Karadžić' Jasenovo</option>
							<option value="Osnovna škola 'Gojko Drulović' Radoinja">Osnovna škola 'Gojko Drulović' Radoinja</option>
							<option value="Osnovna škola 'Dobrisav Dobrica Rajić' Bistrica">Osnovna škola 'Dobrisav Dobrica Rajić' Bistrica</option>
							<option value="Osnovna škola 'Živko Ljujić'">Osnovna škola 'Živko Ljujić'</option>
							<option value="Osnovna škola 'Knezova Raškovića' Božetići">Osnovna škola 'Knezova Raškovića' Božetići</option>
							<option value="Osnovna škola 'Momir Pucarević' Akmačići">Osnovna škola 'Momir Pucarević' Akmačići</option>
							<option value="Srednja škola Jevstastija Karamatijevića 26-30">Srednja škola Jevstastija Karamatijevića 26-30</option>
						</select>
						<select class="it-school-name" data-city="Nova Crnja">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola '4. oktobar' Vojvoda Stepa">Osnovna škola '4. oktobar' Vojvoda Stepa</option>
							<option value="Osnovna škola 'Branko Radičević' Aleksandrovo">Osnovna škola 'Branko Radičević' Aleksandrovo</option>
							<option value="Osnovna škola 'Đura Jakšić'">Osnovna škola 'Đura Jakšić'</option>
							<option value="Osnovna škola 'Petefi Šandor'">Osnovna škola 'Petefi Šandor'</option>
							<option value="Osnovna škola 'Stanko Krstin' Radojevo">Osnovna škola 'Stanko Krstin' Radojevo</option>
						</select>
						<select class="it-school-name" data-city="Novi Bečej">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Dositej Obradović' Bočar">Osnovna škola 'Dositej Obradović' Bočar</option>
							<option value="Osnovna škola 'Dr Đorđe Joanović' Novo Miloševo">Osnovna škola 'Dr Đorđe Joanović' Novo Miloševo</option>
							<option value="Osnovna škola 'Josif Marinković'">Osnovna škola 'Josif Marinković'</option>
							<option value="Osnovna škola 'Milan Stančić Uča' Kumane">Osnovna škola 'Milan Stančić Uča' Kumane</option>
							<option value="Osnovna škola 'Miloje Čiplić'">Osnovna škola 'Miloje Čiplić'</option>
							<option value="Srednja škola Maršala Tita 5">Srednja škola Maršala Tita 5</option>
						</select>
						<select class="it-school-name" data-city="Novi Kneževac">
							<option value="">Izaberite školu</option>
							<option value="Muzička škola">Muzička škola</option>
							<option value="Osnovna škola 'Jovan Jovanović Zmaj'">Osnovna škola 'Jovan Jovanović Zmaj'</option>
							<option value="Gimnazija i stručna škola Dositej Obradović">Gimnazija i stručna škola Dositej Obradović</option>
						</select>
						<select class="it-school-name" data-city="Novi Pazar">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Avdo Međedović'">Osnovna škola 'Avdo Međedović'</option>
							<option value="Osnovna škola 'Bratstvo'">Osnovna škola 'Bratstvo'</option>
							<option value="Osnovna škola 'Vuk Karadžić'">Osnovna škola 'Vuk Karadžić'</option>
							<option value="Osnovna škola 'Desanka Maksimović'">Osnovna škola 'Desanka Maksimović'</option>
							<option value="Osnovna škola 'DOSITEJ OBRADOVIĆ' Osaonica">Osnovna škola 'DOSITEJ OBRADOVIĆ' Osaonica</option>
							<option value="Osnovna škola 'Đura Jakšić' Trnava">Osnovna škola 'Đura Jakšić' Trnava</option>
							<option value="Osnovna škola 'Jovan Jovanović Zmaj'">Osnovna škola 'Jovan Jovanović Zmaj'</option>
							<option value="Osnovna škola 'Jošanica' Lukare">Osnovna škola 'Jošanica' Lukare</option>
							<option value="Osnovna škola 'Meša Selimović'">Osnovna škola 'Meša Selimović'</option>
							<option value="Osnovna škola 'Mur' Mur">Osnovna škola 'Mur' Mur</option>
							<option value="Osnovna škola 'Rastko Nemanjić' Deževa">Osnovna škola 'Rastko Nemanjić' Deževa</option>
							<option value="Osnovna škola 'Rifat Burdžović Tršo'">Osnovna škola 'Rifat Burdžović Tršo'</option>
							<option value="Osnovna škola 'Stefan Nemanja'">Osnovna škola 'Stefan Nemanja'</option>
							<option value="Osnovna škola 'Ćamil Sijarić'">Osnovna škola 'Ćamil Sijarić'</option>
							<option value="Osnovna škola 'Halifa Bin Zaid al Nahjan' Rajčinoviće">Osnovna škola 'Halifa Bin Zaid al Nahjan' Rajčinoviće</option>
							<option value="Škola za osnovno muzičko obrazovanje i vaspitanje 'Stevan Mokranjac'">Škola za osnovno muzičko obrazovanje i vaspitanje 'Stevan Mokranjac'</option>
							<option value="Gimnazija">Gimnazija</option>
							<option value="Ekonomsko-trgovinska škola">Ekonomsko-trgovinska škola</option>
							<option value="Medicinska škola">Medicinska škola</option>
							<option value="Srednja škola Novi Pazar">Srednja škola Novi Pazar</option>
							<option value="Srednja škola Hipokrat">Srednja škola Hipokrat</option>
							<option value="Tehnička škola">Tehnička škola</option>
							<option value="Ugostiteljsko-turistička škola">Ugostiteljsko-turistička škola</option>
							<option value="Škola za dizajn tekstila i kože">Škola za dizajn tekstila i kože</option>
						</select>
						<select class="it-school-name" data-city="Novi Sad">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Đura Jakšić' Kać">Osnovna škola 'Đura Jakšić' Kać</option>
							<option value="Baletska škola">Baletska škola</option>
							<option value="Muzička škola 'Isidor Bajić'">Muzička škola 'Isidor Bajić'</option>
							<option value="Osnovna muzička škola 'Josip Slavenski'">Osnovna muzička škola 'Josip Slavenski'</option>
							<option value="Osnovna škola 'Aleksa Šantić' Stepanovićevo">Osnovna škola 'Aleksa Šantić' Stepanovićevo</option>
							<option value="Osnovna škola 'Branko Radičević'">Osnovna škola 'Branko Radičević'</option>
							<option value="Osnovna škola 'Vasa Stajić'">Osnovna škola 'Vasa Stajić'</option>
							<option value="Osnovna škola 'Veljko Vlahović'">Osnovna škola 'Veljko Vlahović'</option>
							<option value="Osnovna škola 'Veljko Petrović' Begeč">Osnovna škola 'Veljko Petrović' Begeč</option>
							<option value="Osnovna škola 'Vuk Karadžić'">Osnovna škola 'Vuk Karadžić'</option>
							<option value="Osnovna škola 'Desanka Maksimović' Futog">Osnovna škola 'Desanka Maksimović' Futog</option>
							<option value="Osnovna škola 'Dositej Obradović'">Osnovna škola 'Dositej Obradović'</option>
							<option value="Osnovna škola 'Dušan Radović'">Osnovna škola 'Dušan Radović'</option>
							<option value="Osnovna škola 'Đorđe Natošević'">Osnovna škola 'Đorđe Natošević'</option>
							<option value="Osnovna škola 'Đura Daničić'">Osnovna škola 'Đura Daničić'</option>
							<option value="Osnovna škola 'Žarko Zrenjanin'">Osnovna škola 'Žarko Zrenjanin'</option>
							<option value="Osnovna škola 'Ivan Gundulić'">Osnovna škola 'Ivan Gundulić'</option>
							<option value="Osnovna škola 'Ivo Andrić' Budisava">Osnovna škola 'Ivo Andrić' Budisava</option>
							<option value="Osnovna škola 'Ivo Lola Ribar'">Osnovna škola 'Ivo Lola Ribar'</option>
							<option value="Osnovna škola 'Jovan Popović'">Osnovna škola 'Jovan Popović'</option>
							<option value="Osnovna škola 'Jožef Atila'">Osnovna škola 'Jožef Atila'</option>
							<option value="Osnovna škola 'Kosta Trifković'">Osnovna škola 'Kosta Trifković'</option>
							<option value="Osnovna škola 'Laza Kostić' Kovilj">Osnovna škola 'Laza Kostić' Kovilj</option>
							<option value="Osnovna škola 'Ljudovit Štur' Kisač">Osnovna škola 'Ljudovit Štur' Kisač</option>
							<option value="Osnovna škola 'Marija Trandafil' Veternik">Osnovna škola 'Marija Trandafil' Veternik</option>
							<option value="Osnovna škola 'Miloš Crnjanski'">Osnovna škola 'Miloš Crnjanski'</option>
							<option value="Osnovna škola 'Miroslav Antić' Futog">Osnovna škola 'Miroslav Antić' Futog</option>
							<option value="Osnovna škola 'Mihajlo Pupin' Veternik">Osnovna škola 'Mihajlo Pupin' Veternik</option>
							<option value="Osnovna škola 'Nikola Tesla'">Osnovna škola 'Nikola Tesla'</option>
							<option value="Osnovna škola 'Petefi Šandor'">Osnovna škola 'Petefi Šandor'</option>
							<option value="Osnovna škola 'Prva vojvođanska brigada'">Osnovna škola 'Prva vojvođanska brigada'</option>
							<option value="Osnovna škola 'Sveti Kirilo i Metodije'">Osnovna škola 'Sveti Kirilo i Metodije'</option>
							<option value="Osnovna škola 'Sveti Sava' Rumenka">Osnovna škola 'Sveti Sava' Rumenka</option>
							<option value="Osnovna škola 'Svetozar Marković Toza'">Osnovna škola 'Svetozar Marković Toza'</option>
							<option value="Osnovna škola 'Sonja Marinković'">Osnovna škola 'Sonja Marinković'</option>
							<option value="Baletska škola">Baletska škola</option>
							<option value="Gimnazija Živorad Janković">Gimnazija Živorad Janković</option>
							<option value="Gimnazija Isidora Sekulić">Gimnazija Isidora Sekulić</option>
							<option value="Gimnazija Jovan Jovanović Zmaj">Gimnazija Jovan Jovanović Zmaj</option>
							<option value="Gimnazija Laza Kostić">Gimnazija Laza Kostić</option>
							<option value="Gimnazija Svetozar Marković">Gimnazija Svetozar Marković</option>
							<option value="Elektrotehnička škola Mihajlo Pupin">Elektrotehnička škola Mihajlo Pupin</option>
							<option value="Elitna privatna ekonomska škola i gimnazija">Elitna privatna ekonomska škola i gimnazija</option>
							<option value="Medicinska škola 7. april Vojvode Knićanina 1">Medicinska škola 7. april Vojvode Knićanina 1</option>
							<option value="Muzička škola Isidor Bajić">Muzička škola Isidor Bajić</option>
							<option value="Prva privatna srednja optičarska škola Pašćan">Prva privatna srednja optičarska škola Pašćan</option>
							<option value="Prva privatna srednja frizerska škola Vojkan">Prva privatna srednja frizerska škola Vojkan</option>
							<option value="Privatna gimnazija E-gimnazija">Privatna gimnazija E-gimnazija</option>
							<option value="Računarska gimnazija Smart">Računarska gimnazija Smart</option>
							<option value="Saobraćajna škola Pinki">Saobraćajna škola Pinki</option>
							<option value="Srednja mašinska škola">Srednja mašinska škola</option>
							<option value="Srednja medicinska škola Hipokrat">Srednja medicinska škola Hipokrat</option>
							<option value="Srednja saobraćajna škola">Srednja saobraćajna škola</option>
							<option value="Srednja stručna škola Krug">Srednja stručna škola Krug</option>
							<option value="Srednja škola Dositej Obradović">Srednja škola Dositej Obradović</option>
							<option value="Srednja škola Sveti Nikola">Srednja škola Sveti Nikola</option>
							<option value="Srednja škola Svetozar Miletić">Srednja škola Svetozar Miletić</option>
							<option value="Tehnička škola Mileva Marić Ajnštajn">Tehnička škola Mileva Marić Ajnštajn</option>
							<option value="Tehnička škola Pavle Savić">Tehnička škola Pavle Savić</option>
							<option value="Škola za dizajn Bogdan Šuput">Škola za dizajn Bogdan Šuput</option>
							<option value="Škola za osnovno i srednje obrazovanje 'Milan Petrović'">Škola za osnovno i srednje obrazovanje 'Milan Petrović'</option>
						</select>
						<select class="it-school-name" data-city="Obrenovac">
							<option value="">Izaberite školu</option>
							<option value="Gimnazija">Gimnazija</option>
							<option value="Poljoprivredno-hemijska škola">Poljoprivredno-hemijska škola</option>
							<option value="Tehnička škola">Tehnička škola</option>
						</select>
						<select class="it-school-name" data-city="Opovo">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Dositej Obradović'">Osnovna škola 'Dositej Obradović'</option>
						</select>
						<select class="it-school-name" data-city="Orahovac">
							<option value="">Izaberite školu</option>
							<option value="Gimnazija Orahovac">Gimnazija Orahovac</option>
						</select>
						<select class="it-school-name" data-city="Osečina">
							<option value="">Izaberite školu</option>
							<option value="Obrazovno-vaspitni centar">Obrazovno-vaspitni centar</option>
							<option value="Obrazovno-vaspitni centar">Obrazovno-vaspitni centar</option>
							<option value="Osnovna škola 'Vojvoda Mišić' Pecka">Osnovna škola 'Vojvoda Mišić' Pecka</option>
						</select>
						<select class="it-school-name" data-city="Odžaci">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Bora Stanković' Karavukovo">Osnovna škola 'Bora Stanković' Karavukovo</option>
							<option value="Osnovna škola 'Vuk Karadžić' Deronje">Osnovna škola 'Vuk Karadžić' Deronje</option>
							<option value="Osnovna škola 'Jožef Atila' Bogojevo">Osnovna škola 'Jožef Atila' Bogojevo</option>
							<option value="Osnovna škola 'Kosta Stamenković' Srpski Miletić">Osnovna škola 'Kosta Stamenković' Srpski Miletić</option>
							<option value="Osnovna škola 'Marko Orešković' Bački Gračac">Osnovna škola 'Marko Orešković' Bački Gračac</option>
							<option value="Osnovna škola 'Miroslav Antić'">Osnovna škola 'Miroslav Antić'</option>
							<option value="Osnovna škola 'Nestor Žučni' Lalić">Osnovna škola 'Nestor Žučni' Lalić</option>
							<option value="Osnovna škola 'Nikola Tesla' Bački Brestovac">Osnovna škola 'Nikola Tesla' Bački Brestovac</option>
							<option value="Osnovna škola 'Ratko Pavlović Ćićko' Ratkovo">Osnovna škola 'Ratko Pavlović Ćićko' Ratkovo</option>
							<option value="Osnovna škola 'Branko Radičević'">Osnovna škola 'Branko Radičević'</option>
							<option value="Gimnazija i ekonomska škola Jovan Jovanović Zmaj Somborska 18">Gimnazija i ekonomska škola Jovan Jovanović Zmaj Somborska 18</option>
							<option value="Srednja stručna škola">Srednja stručna škola</option>
							<option value="Tehnička škola">Tehnička škola</option>
						</select>
						<select class="it-school-name" data-city="Pančevo">
							<option value="">Izaberite školu</option>
							<option value="Baletska škola 'Dimitrije Parlić'">Baletska škola 'Dimitrije Parlić'</option>
							<option value="Muzička škola 'Jovan Bandur'">Muzička škola 'Jovan Bandur'</option>
							<option value="Osnovna škola '4. oktobar' Glogonj">Osnovna škola '4. oktobar' Glogonj</option>
							<option value="Osnovna škola 'Aksentije Maksimović' Dolovo">Osnovna škola 'Aksentije Maksimović' Dolovo</option>
							<option value="Osnovna škola 'Borisav Petrov Braca'">Osnovna škola 'Borisav Petrov Braca'</option>
							<option value="Osnovna škola 'Branko Radičević'">Osnovna škola 'Branko Radičević'</option>
							<option value="Osnovna škola 'Bratstvo jedinistvo'">Osnovna škola 'Bratstvo jedinistvo'</option>
							<option value="Osnovna škola 'Vasa Živković'">Osnovna škola 'Vasa Živković'</option>
							<option value="Osnovna škola 'Vuk Stefanović Karadžić' Starčevo">Osnovna škola 'Vuk Stefanović Karadžić' Starčevo</option>
							<option value="Osnovna škola 'Goce Delčev' Jabuka">Osnovna škola 'Goce Delčev' Jabuka</option>
							<option value="Osnovna škola 'Dositej Obradović' Omoljica">Osnovna škola 'Dositej Obradović' Omoljica</option>
							<option value="Osnovna škola 'Đura Jakšić'">Osnovna škola 'Đura Jakšić'</option>
							<option value="Osnovna škola 'Žarko Zrenjanin' Kačarevo">Osnovna škola 'Žarko Zrenjanin' Kačarevo</option>
							<option value="Osnovna škola 'Žarko Zrenjanin' Banatsko Novo Selo">Osnovna škola 'Žarko Zrenjanin' Banatsko Novo Selo</option>
							<option value="Osnovna škola 'Isidora Sekulić'">Osnovna škola 'Isidora Sekulić'</option>
							<option value="Osnovna škola 'Jovan Jovanović Zmaj'">Osnovna škola 'Jovan Jovanović Zmaj'</option>
							<option value="Osnovna škola 'Miroslav Antić Mika'">Osnovna škola 'Miroslav Antić Mika'</option>
							<option value="Osnovna škola 'Moša Pijade' Ivanovo">Osnovna škola 'Moša Pijade' Ivanovo</option>
							<option value="Osnovna škola 'Sveti Sava'">Osnovna škola 'Sveti Sava'</option>
							<option value="Osnovna škola 'Stevica Jovanović'">Osnovna škola 'Stevica Jovanović'</option>
							<option value="Osnovna škola 'Olga Petrov' Banatski Brestovac">Osnovna škola 'Olga Petrov' Banatski Brestovac</option>
							<option value="Škola za osnovno i srednje obrazovanje 'Mara Mandić'">Škola za osnovno i srednje obrazovanje 'Mara Mandić'</option>
							<option value="Baletska škola Dimitrije Parlić">Baletska škola Dimitrije Parlić</option>
							<option value="Gimnazija Uroš Predić">Gimnazija Uroš Predić</option>
							<option value="Ekonomsko-menadžerska škola">Ekonomsko-menadžerska škola</option>
							<option value="Ekonomsko-trgovinska škola Paja Marganović">Ekonomsko-trgovinska škola Paja Marganović</option>
							<option value="Elektrotehnička škola Nikola Tesla">Elektrotehnička škola Nikola Tesla</option>
							<option value="Mašinska škola">Mašinska škola</option>
							<option value="Medicinska škola Stevica Jovanović">Medicinska škola Stevica Jovanović</option>
							<option value="Muzička škola Jovan Bandur">Muzička škola Jovan Bandur</option>
							<option value="Poljoprivredna škola Josif Pančić">Poljoprivredna škola Josif Pančić</option>
							<option value="Srednja stručna škola Vizija">Srednja stručna škola Vizija</option>
							<option value="Tehnička škola 23. maj">Tehnička škola 23. maj</option>
							<option value="Škola za osnovno i srednje obrazovanje Mara Mandić">Škola za osnovno i srednje obrazovanje Mara Mandić</option>
						</select>
						<select class="it-school-name" data-city="Paraćin">
							<option value="">Izaberite školu</option>
							<option value="Muzička škola 'Milenko Živković'">Muzička škola 'Milenko Živković'</option>
							<option value="Osnovna škola 'Branko Krsmanović' Donja Mutnica">Osnovna škola 'Branko Krsmanović' Donja Mutnica</option>
							<option value="Osnovna škola 'Branko Krsmanović' Sikirica">Osnovna škola 'Branko Krsmanović' Sikirica</option>
							<option value="Osnovna škola 'Vuk Karadžić' Potočac">Osnovna škola 'Vuk Karadžić' Potočac</option>
							<option value="Osnovna škola 'Momčilo Popović Ozren'">Osnovna škola 'Momčilo Popović Ozren'</option>
							<option value="Osnovna škola 'Radoje Domanović'">Osnovna škola 'Radoje Domanović'</option>
							<option value="Osnovna škola 'Đura Jakšić'">Osnovna škola 'Đura Jakšić'</option>
							<option value="Osnovna škola 'Branko Radičević' Popovac">Osnovna škola 'Branko Radičević' Popovac</option>
							<option value="Osnovna škola 'Stevan Jakovljević'">Osnovna škola 'Stevan Jakovljević'</option>
							<option value="Gimnazija">Gimnazija</option>
							<option value="Ekonomsko-trgovinska škola">Ekonomsko-trgovinska škola</option>
							<option value="Mašinsko-elektrotehnička škola">Mašinsko-elektrotehnička škola</option>
							<option value="Tehnološka škola">Tehnološka škola</option>
						</select>
						<select class="it-school-name" data-city="Petrovaradin">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola '22. avgust' Bukovac">Osnovna škola '22. avgust' Bukovac</option>
							<option value="Osnovna škola 'Jovan Dučić'">Osnovna škola 'Jovan Dučić'</option>
							<option value="Osnovna škola 'Jovan Jovanović Zmaj' Sremska Kamenica">Osnovna škola 'Jovan Jovanović Zmaj' Sremska Kamenica</option>
							<option value="Osnovna škola i predškolska ustanova 'Svitac' Sremska Kamenica">Osnovna škola i predškolska ustanova 'Svitac' Sremska Kamenica</option>
							<option value="Privatna osnovna škola 'Tvrđava'">Privatna osnovna škola 'Tvrđava'</option>
						</select>
						<select class="it-school-name" data-city="Petrovac na Mlavi">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Bata Bulić'">Osnovna škola 'Bata Bulić'</option>
							<option value="Osnovna škola 'Branko Radičević' Melnica">Osnovna škola 'Branko Radičević' Melnica</option>
							<option value="Osnovna škola 'Žarko Zrenjanin' Veliko Laole">Osnovna škola 'Žarko Zrenjanin' Veliko Laole</option>
							<option value="Osnovna škola 'Jovan Šerbanović' Ranovac">Osnovna škola 'Jovan Šerbanović' Ranovac</option>
							<option value="Osnovna škola 'Miroslav Bukumirović-Bukum' Šetonje">Osnovna škola 'Miroslav Bukumirović-Bukum' Šetonje</option>
							<option value="Osnovna škola 'Profesor Brana Paunović' Rašanac">Osnovna škola 'Profesor Brana Paunović' Rašanac</option>
							<option value="Osnovna škola 'Sveta Mihajlović' Burovac">Osnovna škola 'Sveta Mihajlović' Burovac</option>
							<option value="Osnovna škola 'Đura Jakšić' Oreškovica">Osnovna škola 'Đura Jakšić' Oreškovica</option>
							<option value="Srednja škola Mladost">Srednja škola Mladost</option>
						</select>

						<select class="it-school-name" data-city="Pećinci">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Dušan Vukasović Diogen'">Osnovna škola 'Dušan Vukasović Diogen'</option>
							<option value="Osnovna škola 'Dušan Jerković Uča' Šimanovci">Osnovna škola 'Dušan Jerković Uča' Šimanovci</option>
							<option value="Osnovna škola 'Slobodan Bajić Paja'">Osnovna škola 'Slobodan Bajić Paja'</option>
							<option value="Tehnička škola Milenko Verkić">Tehnička škola Milenko Verkić</option>
						</select>

						<select class="it-school-name" data-city="Pirot">
							<option value="">Izaberite školu</option>
							<option value="Osnovna muzička škola 'dr Dragutin Gostuški'">Osnovna muzička škola 'dr Dragutin Gostuški'</option>
							<option value="Osnovna škola '8.Septembar'">Osnovna škola '8.Septembar'</option>
							<option value="Osnovna škola 'Vuk Karadžić'">Osnovna škola 'Vuk Karadžić'</option>
							<option value="Osnovna škola 'DUŠAN RADOVIĆ'">Osnovna škola 'DUŠAN RADOVIĆ'</option>
							<option value="Osnovna škola 'Sveti Sava'">Osnovna škola 'Sveti Sava'</option>
							<option value="Gimnazija">Gimnazija</option>
							<option value="Ekonomska škola">Ekonomska škola</option>
							<option value="Mlekarska škola Dr. Obren Pejić3">Mlekarska škola Dr. Obren Pejić3</option>
							<option value="Srednja stručna škola">Srednja stručna škola</option>
							<option value="Tehnička škola">Tehnička škola</option>
							<option value="Škola za osnovno i srednje obrazovanje Mladost">Škola za osnovno i srednje obrazovanje Mladost</option>
						</select>

						<select class="it-school-name" data-city="Plandište">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Dositej Obradović'">Osnovna škola 'Dositej Obradović'</option>
							<option value="Osnovna škola 'Jovan Jovanović Zmaj' Hajdučica">Osnovna škola 'Jovan Jovanović Zmaj' Hajdučica</option>
							<option value="Osnovna škola 'Jovan Sterija Popović' Velika Greda">Osnovna škola 'Jovan Sterija Popović' Velika Greda</option>
						</select>

						<select class="it-school-name" data-city="Požarevac">
							<option value="">Izaberite školu</option>
							<option value="Muzička škola Stevan Mokranjac">Muzička škola Stevan Mokranjac</option>
							<option value="Osnovna škola 'Vuk Karadžić'">Osnovna škola 'Vuk Karadžić'</option>
							<option value="Osnovna škola 'Desanka Maksimović'">Osnovna škola 'Desanka Maksimović'</option>
							<option value="Osnovna škola 'Dositej Obradović'">Osnovna škola 'Dositej Obradović'</option>
							<option value="Osnovna škola 'Kralj Aleksandar Prvi'">Osnovna škola 'Kralj Aleksandar Prvi'</option>
							<option value="Osnovna škola 'Miloš Savić' Lučica">Osnovna škola 'Miloš Savić' Lučica</option>
							<option value="Osnovna škola 'Sveti vladika Nikolaj' Bradarac">Osnovna škola 'Sveti vladika Nikolaj' Bradarac</option>
							<option value="Osnovna škola 'Sveti Sava'">Osnovna škola 'Sveti Sava'</option>
							<option value="Ekonomsko-trgovinska škola">Ekonomsko-trgovinska škola</option>
							<option value="Medicinska škola">Medicinska škola</option>
							<option value="Muzička škola Stevan Mokranjac">Muzička škola Stevan Mokranjac</option>
							<option value="Požarevačka gimnazija">Požarevačka gimnazija</option>
							<option value="Politehnička škola">Politehnička škola</option>
							<option value="Poljoprivredna škola Sonja Marinković">Poljoprivredna škola Sonja Marinković</option>
							<option value="Škola za osnovno i srednje muzičko obrazovanje 'Stevan Mokranjac'">Škola za osnovno i srednje muzičko obrazovanje 'Stevan Mokranjac'</option>
						</select>
						<select class="it-school-name" data-city="Požega">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Petar Leković'">Osnovna škola 'Petar Leković'</option>
							<option value="Osnovna škola 'Emilija Ostojić'">Osnovna škola 'Emilija Ostojić'</option>
							<option value="Gimnazija Sveti Sava">Gimnazija Sveti Sava</option>
							<option value="Tehnička škola">Tehnička škola</option>
						</select>
						<select class="it-school-name" data-city="Preoce">
							<option value="">Izaberite školu</option>
							<option value="Mašinska škola">Mašinska škola</option>
						</select>
						<select class="it-school-name" data-city="Preševo">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola '9. maj' Reljan">Osnovna škola '9. maj' Reljan</option>
							<option value="Osnovna škola 'Abdulah Krašnica' Miratovac">Osnovna škola 'Abdulah Krašnica' Miratovac</option>
							<option value="Osnovna škola 'Vuk Karadžić'">Osnovna škola 'Vuk Karadžić'</option>
							<option value="Osnovna škola 'Diturija' Crnotice">Osnovna škola 'Diturija' Crnotice</option>
							<option value="Osnovna škola 'Zenelj Hajdini'Rajince">Osnovna škola 'Zenelj Hajdini'Rajince</option>
							<option value="Osnovna škola 'Ibrahim Keljmendi'">Osnovna škola 'Ibrahim Keljmendi'</option>
							<option value="Osnovna škola 'Miđeni' Cerevajka">Osnovna škola 'Miđeni' Cerevajka</option>
							<option value="Osnovna škola 'Selami Haliči' Oraovica">Osnovna škola 'Selami Haliči' Oraovica</option>
							<option value="Gimnazija Skenderbeu">Gimnazija Skenderbeu</option>
							<option value="Srednja tehnička škola">Srednja tehnička škola</option>
						</select>
						<select class="it-school-name" data-city="Priboj">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola '9.maj' Kasidoli">Osnovna škola '9.maj' Kasidoli</option>
							<option value="Osnovna škola 'Blagoje Polić' Kratovo">Osnovna škola 'Blagoje Polić' Kratovo</option>
							<option value="Osnovna škola 'Branko Radičević'">Osnovna škola 'Branko Radičević'</option>
							<option value="Osnovna škola 'Vuk Karadžić'">Osnovna škola 'Vuk Karadžić'</option>
							<option value="Osnovna škola 'Desanka Maksimović'">Osnovna škola 'Desanka Maksimović'</option>
							<option value="Osnovna škola 'Nikola Tesla'">Osnovna škola 'Nikola Tesla'</option>
							<option value="Gimnazija">Gimnazija</option>
							<option value="Mašinsko-elektrotehnička škola">Mašinsko-elektrotehnička škola</option>
						</select>
						<select class="it-school-name" data-city="Prijepolje">
							<option value="">Izaberite školu</option>
							<option value="Osnovna muzička škola">Osnovna muzička škola</option>
							<option value="Osnovna škola 'Boško Buha' Ivanje">Osnovna škola 'Boško Buha' Ivanje</option>
							<option value="Osnovna škola 'Vladimir Perić Valer'">Osnovna škola 'Vladimir Perić Valer'</option>
							<option value="Osnovna škola 'Dušan Tomašević Ćirko' Kovačevac">Osnovna škola 'Dušan Tomašević Ćirko' Kovačevac</option>
							<option value="Osnovna škola 'Milosav Stiković'">Osnovna škola 'Milosav Stiković'</option>
							<option value="Osnovna škola 'Mihajlo Baković' Seljašnica">Osnovna škola 'Mihajlo Baković' Seljašnica</option>
							<option value="Osnovna škola 'Sveti Sava'">Osnovna škola 'Sveti Sava'</option>
							<option value="Osnovna škola 'Svetozar Marković' Brodarevo">Osnovna škola 'Svetozar Marković' Brodarevo</option>
							<option value="Ekonomsko-trgovinska škola">Ekonomsko-trgovinska škola</option>
							<option value="Prijepoljska gimnazija">Prijepoljska gimnazija</option>
							<option value="Tehnička škola">Tehnička škola</option>
						</select>
						<select class="it-school-name" data-city="Prokuplje">
							<option value="">Izaberite školu</option>
							<option value="Muzička škola 'Kornelije Stanković'">Muzička škola 'Kornelije Stanković'</option>
							<option value="Osnovna škola '9. oktobar'">Osnovna škola '9. oktobar'</option>
							<option value="Osnovna škola 'Vuk Karadžić' Žitni Potok">Osnovna škola 'Vuk Karadžić' Žitni Potok</option>
							<option value="Osnovna škola 'Milić Rakić Mirko'">Osnovna škola 'Milić Rakić Mirko'</option>
							<option value="Osnovna škola 'Nikodije Stojanović Tatko'">Osnovna škola 'Nikodije Stojanović Tatko'</option>
							<option value="Osnovna škola 'Ratko Pavlović Ćićko'">Osnovna škola 'Ratko Pavlović Ćićko'</option>
							<option value="Osnovna škola 'Svetislav Mirković Nenad' Mala Plana">Osnovna škola 'Svetislav Mirković Nenad' Mala Plana</option>
							<option value="Specijalna škola 'Sveti Sava'">Specijalna škola 'Sveti Sava'</option>
							<option value="Gimnazija">Gimnazija</option>
							<option value="Medicinska škola Dr. Aleksa Savić">Medicinska škola Dr. Aleksa Savić</option>
							<option value="Poljoprivredna škola Radoš Jovanović Selja">Poljoprivredna škola Radoš Jovanović Selja</option>
							<option value="Tehnička škola 15.maj">Tehnička škola 15.maj</option>
						</select>
						<select class="it-school-name" data-city="Ražanj">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Vuk Karadžić' Vitoševac">Osnovna škola 'Vuk Karadžić' Vitoševac</option>
							<option value="Osnovna škola 'Ivan Vušović'">Osnovna škola 'Ivan Vušović'</option>
						</select>
						<select class="it-school-name" data-city="Rača">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Karađorđe'">Osnovna škola 'Karađorđe'</option>
							<option value="Srednja škola Đura Jakšić">Srednja škola Đura Jakšić</option>
						</select>
						<select class="it-school-name" data-city="Raška">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Josif Pančić' Baljevac">Osnovna škola 'Josif Pančić' Baljevac</option>
							<option value="Osnovna škola 'Jošanička banja' Jošanička banja">Osnovna škola 'Jošanička banja' Jošanička banja</option>
							<option value="Osnovna škola 'Sutjeska' Supnje">Osnovna škola 'Sutjeska' Supnje</option>
							<option value="Osnovna škola 'Raška'">Osnovna škola 'Raška'</option>
							<option value="Gimnazija">Gimnazija</option>
							<option value="Srednja škola Kraljica Jelena">Srednja škola Kraljica Jelena</option>
						</select>
						<select class="it-school-name" data-city="Rekovac">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Dušan Popović' Belušić">Osnovna škola 'Dušan Popović' Belušić</option>
							<option value="Osnovna škola 'Svetozar Marković'">Osnovna škola 'Svetozar Marković'</option>
							<option value="Poljoprivredno-veterinarska škola">Poljoprivredno-veterinarska škola</option>
						</select>
						<select class="it-school-name" data-city="Ruma">
							<option value="">Izaberite školu</option>
							<option value="Osnovna muzička škola 'Teodor Toša Andrejević'">Osnovna muzička škola 'Teodor Toša Andrejević'</option>
							<option value="Osnovna škola '23. oktobar' Klenak">Osnovna škola '23. oktobar' Klenak</option>
							<option value="Osnovna škola 'Branko Radičević' Nikinci">Osnovna škola 'Branko Radičević' Nikinci</option>
							<option value="Osnovna škola 'Veljko Dugošević'">Osnovna škola 'Veljko Dugošević'</option>
							<option value="Osnovna škola 'Dositej Obradović' Putinci">Osnovna škola 'Dositej Obradović' Putinci</option>
							<option value="Osnovna škola 'Dušan Jerković'">Osnovna škola 'Dušan Jerković'</option>
							<option value="Osnovna škola 'Zmaj Jova Jovanović'">Osnovna škola 'Zmaj Jova Jovanović'</option>
							<option value="Osnovna škola 'Ivo Lola Ribar'">Osnovna škola 'Ivo Lola Ribar'</option>
							<option value="Osnovna škola 'Milivoj Petković - Fećko' Platičevo">Osnovna škola 'Milivoj Petković - Fećko' Platičevo</option>
							<option value="Osnovna škola 'Miloš Crnjanski' Hrtkovci">Osnovna škola 'Miloš Crnjanski' Hrtkovci</option>
							<option value="Osnovna škola 'Nebojša Jerković' Buđanovci">Osnovna škola 'Nebojša Jerković' Buđanovci</option>
							<option value="OŠ 'VI udarna vojvođanska brigada' Grabovci">OŠ 'VI udarna vojvođanska brigada' Grabovci</option>
							<option value="Gimnazija Stevan Puzić">Gimnazija Stevan Puzić</option>
							<option value="Srednja poljoprivredno-prehrambena škola Stevan Petrović - Brile">Srednja poljoprivredno-prehrambena škola Stevan Petrović - Brile</option>
							<option value="Srednja stručna škola Branko Radičević">Srednja stručna škola Branko Radičević</option>
							<option value="Srednja tehnička škola Milenko Brzak - Uča">Srednja tehnička škola Milenko Brzak - Uča</option>
						</select>
						<select class="it-school-name" data-city="Ruski Krstur">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola i gimnazija Pjetro Kuzmjak">Osnovna škola i gimnazija Pjetro Kuzmjak</option>
						</select>
						<select class="it-school-name" data-city="Svilajnac">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Branko Radičević' Sedlare">Osnovna škola 'Branko Radičević' Sedlare</option>
							<option value="Osnovna škola 'Vožd Karađorđe' Kušiljevo">Osnovna škola 'Vožd Karađorđe' Kušiljevo</option>
							<option value="Osnovna škola 'Stevan Sinđelić' Vojska">Osnovna škola 'Stevan Sinđelić' Vojska</option>
							<option value="Osnovna škola 'Jovan Jovanović Zmaj'">Osnovna škola 'Jovan Jovanović Zmaj'</option>
							<option value="Poljoprivredno-veterinarska škola">Poljoprivredno-veterinarska škola</option>
							<option value="Srednja škola Braće Jugovića 10">Srednja škola Braće Jugovića 10</option>
						</select>
						<select class="it-school-name" data-city="Svrljig">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Dobrila Stambolić'">Osnovna škola 'Dobrila Stambolić'</option>
							<option value="Stručna škola Dušan Trivunac Dragoš">Stručna škola Dušan Trivunac Dragoš</option>
						</select>
						<select class="it-school-name" data-city="Senta">
							<option value="">Izaberite školu</option>
							<option value="Osnovna muzička škola 'Stevan Mokranjac'">Osnovna muzička škola 'Stevan Mokranjac'</option>
							<option value="Osnovna škola 'Petefi Šandor'">Osnovna škola 'Petefi Šandor'</option>
							<option value="Osnovna škola 'Stevan Sremac'">Osnovna škola 'Stevan Sremac'</option>
							<option value="Osnovna škola 'Temerkenj Ištvan' - Tornjoš">Osnovna škola 'Temerkenj Ištvan' - Tornjoš</option>
							<option value="Osnovna škola 'Turzo Lajoš'">Osnovna škola 'Turzo Lajoš'</option>
							<option value="Gimnazija za talentovane učenike Boljai">Gimnazija za talentovane učenike Boljai</option>
							<option value="Ekonomsko-trgovinska škola">Ekonomsko-trgovinska škola</option>
							<option value="Senćanska gimnazija">Senćanska gimnazija</option>
							<option value="Srednja medicinska škola">Srednja medicinska škola</option>
						</select>
						<select class="it-school-name" data-city="Sečanj">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Aleksa Šantić'">Osnovna škola 'Aleksa Šantić'</option>
							<option value="Osnovna škola 'Braća Stefanović' Neuzina">Osnovna škola 'Braća Stefanović' Neuzina</option>
							<option value="Osnovna škola 'Veljko Đuričin' Jarkovac">Osnovna škola 'Veljko Đuričin' Jarkovac</option>
							<option value="Osnovna škola 'Vuk Karadžić' Konak">Osnovna škola 'Vuk Karadžić' Konak</option>
							<option value="Osnovna škola 'Žarko Zrenjanin' Boka">Osnovna škola 'Žarko Zrenjanin' Boka</option>
							<option value="Osnovna škola 'Ivo Lola Ribar' Sutjeska">Osnovna škola 'Ivo Lola Ribar' Sutjeska</option>
							<option value="Osnovna škola 'Slavko Rodić' Krajišnik">Osnovna škola 'Slavko Rodić' Krajišnik</option>
							<option value="Osnovna škola 'Stevan Aleksić' Jaša Tomić">Osnovna škola 'Stevan Aleksić' Jaša Tomić</option>
							<option value="Srednja škola Vuk Karadžić">Srednja škola Vuk Karadžić</option>
						</select>
						<select class="it-school-name" data-city="Sjenica">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola '12. decembar'">Osnovna škola '12. decembar'</option>
							<option value="Osnovna škola 'Branko Radičević' Štavalj">Osnovna škola 'Branko Radičević' Štavalj</option>
							<option value="Osnovna škola 'Bratstvo-jedinstvo' Duga Poljana">Osnovna škola 'Bratstvo-jedinstvo' Duga Poljana</option>
							<option value="Osnovna škola 'Vuk Karadžić' Kladnica">Osnovna škola 'Vuk Karadžić' Kladnica</option>
							<option value="Osnovna škola 'Jovan Jovanović Zmaj' Raždaginja">Osnovna škola 'Jovan Jovanović Zmaj' Raždaginja</option>
							<option value="Osnovna škola 'Rifat Burdžović Tršo' Karajukića Bunari">Osnovna škola 'Rifat Burdžović Tršo' Karajukića Bunari</option>
							<option value="Osnovna škola 'Sveti Sava' Bare">Osnovna škola 'Sveti Sava' Bare</option>
							<option value="Osnovna škola 'Svetozar Marković'">Osnovna škola 'Svetozar Marković'</option>
							<option value="Gimnazija Jezdimir Lović">Gimnazija Jezdimir Lović</option>
							<option value="Tehničko-poljoprivredna škola">Tehničko-poljoprivredna škola</option>
						</select>
						<select class="it-school-name" data-city="Smederevo">
							<option value="">Izaberite školu</option>
							<option value="Osnovna i srednja muzička škola 'Kosta Manojlović'">Osnovna i srednja muzička škola 'Kosta Manojlović'</option>
							<option value="Osnovna škola 'Branislav Nušić'">Osnovna škola 'Branislav Nušić'</option>
							<option value="Osnovna škola 'Branko Radičević' Lugavčina">Osnovna škola 'Branko Radičević' Lugavčina</option>
							<option value="Osnovna škola 'Branko Radičević'">Osnovna škola 'Branko Radičević'</option>
							<option value="Osnovna škola 'Vožd Karađorđe' Vodanj">Osnovna škola 'Vožd Karađorđe' Vodanj</option>
							<option value="Osnovna škola 'Vuk Karadžić' Lipe">Osnovna škola 'Vuk Karadžić' Lipe</option>
							<option value="Osnovna škola 'Dimitrije Davidović'">Osnovna škola 'Dimitrije Davidović'</option>
							<option value="Osnovna škola 'Dositej Obradović' Vranovo">Osnovna škola 'Dositej Obradović' Vranovo</option>
							<option value="Osnovna škola 'Dositej Obradović'">Osnovna škola 'Dositej Obradović'</option>
							<option value="Osnovna škola 'Dr Jovan Cvijić'">Osnovna škola 'Dr Jovan Cvijić'</option>
							<option value="Osnovna škola 'Đura Jakšić' Mala Krsna">Osnovna škola 'Đura Jakšić' Mala Krsna</option>
							<option value="Osnovna škola 'Ivo Andrić' Radinac">Osnovna škola 'Ivo Andrić' Radinac</option>
							<option value="Osnovna škola 'Ivo Lola Ribar' Skobalj">Osnovna škola 'Ivo Lola Ribar' Skobalj</option>
							<option value="Osnovna škola 'Ilija M. Kolarac' Kolari">Osnovna škola 'Ilija M. Kolarac' Kolari</option>
							<option value="Osnovna škola 'Jovan Jovanović Zmaj'">Osnovna škola 'Jovan Jovanović Zmaj'</option>
							<option value="Osnovna škola 'Sava Kovačević' Mihajlovac">Osnovna škola 'Sava Kovačević' Mihajlovac</option>
							<option value="Osnovna škola 'Sveti Sava'">Osnovna škola 'Sveti Sava'</option>
							<option value="Osnovna škola 'Svetitelj Sava' Drugovac">Osnovna škola 'Svetitelj Sava' Drugovac</option>
							<option value="Osnovna škola 'Heroj Sveta Mladenović' Saraorci">Osnovna škola 'Heroj Sveta Mladenović' Saraorci</option>
							<option value="Osnovna škola 'Heroj Srba' Osipaonica">Osnovna škola 'Heroj Srba' Osipaonica</option>
							<option value="Gimnazija">Gimnazija</option>
							<option value="Ekonomsko-trgovinska škola 16 oktobar">Ekonomsko-trgovinska škola 16 oktobar</option>
							<option value="Muzička škola Kosta Manojlović">Muzička škola Kosta Manojlović</option>
							<option value="Tekstilno-tehnološka i poljoprivredna škola Despot Đurađ">Tekstilno-tehnološka i poljoprivredna škola Despot Đurađ</option>
							<option value="Tehnička škola">Tehnička škola</option>
						</select>
						<select class="it-school-name" data-city="Smederevska Palanka">
							<option value="">Izaberite školu</option>
							<option value="Osnovna muzička škola 'Božidar Trudić'">Osnovna muzička škola 'Božidar Trudić'</option>
							<option value="Osnovna škola 'Brana Jevtić' Kusadak">Osnovna škola 'Brana Jevtić' Kusadak</option>
							<option value="Osnovna škola 'Đorđe Jovanović' Selevac">Osnovna škola 'Đorđe Jovanović' Selevac</option>
							<option value="Osnovna škola 'Milija Rakić' Cerovac">Osnovna škola 'Milija Rakić' Cerovac</option>
							<option value="Osnovna škola 'Radomir Lazić' Azanja">Osnovna škola 'Radomir Lazić' Azanja</option>
							<option value="Osnovna škola 'Heroj Ivan Muker'">Osnovna škola 'Heroj Ivan Muker'</option>
							<option value="Osnovna škola 'Heroj Radmila Šišković'">Osnovna škola 'Heroj Radmila Šišković'</option>
							<option value="Osnovna škola 'Vuk Karadžić'">Osnovna škola 'Vuk Karadžić'</option>
							<option value="Osnovna škola 'Lazar Stanojević' Ratari">Osnovna škola 'Lazar Stanojević' Ratari</option>
							<option value="Osnovna škola 'Nikola Tesla' Golobok">Osnovna škola 'Nikola Tesla' Golobok</option>
							<option value="Osnovna škola 'Olga Milošević'">Osnovna škola 'Olga Milošević'</option>
							<option value="Osnovna škola 'Stanoje Glavaš' Glibovac">Osnovna škola 'Stanoje Glavaš' Glibovac</option>
							<option value="Mašinsko-elektrotehnička škola Goša">Mašinsko-elektrotehnička škola Goša</option>
							<option value="Palanačka gimnazija">Palanačka gimnazija</option>
							<option value="Srednja škola Žikica Damnjanović">Srednja škola Žikica Damnjanović</option>
						</select>
						<select class="it-school-name" data-city="Sokobanja">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Mitropolit Mihailo'">Osnovna škola 'Mitropolit Mihailo'</option>
							<option value="Srednja škola Branislav Nušić">Srednja škola Branislav Nušić</option>
						</select>
						<select class="it-school-name" data-city="Sombor">
							<option value="">Izaberite školu</option>
							<option value="Muzička škola 'Petar Konjović'">Muzička škola 'Petar Konjović'</option>
							<option value="Osnovna škola '22. oktobar' Bački Monoštor">Osnovna škola '22. oktobar' Bački Monoštor</option>
							<option value="Osnovna škola 'Avram Mrazović'">Osnovna škola 'Avram Mrazović'</option>
							<option value="Osnovna škola 'Aleksa Šantić' Aleksa Šantić">Osnovna škola 'Aleksa Šantić' Aleksa Šantić</option>
							<option value="Osnovna škola 'Branko Radičević' Stapar">Osnovna škola 'Branko Radičević' Stapar</option>
							<option value="Osnovna škola 'Bratstvo jedinstvo' Svetozar Miletić">Osnovna škola 'Bratstvo jedinstvo' Svetozar Miletić</option>
							<option value="Osnovna škola 'Bratstvo jedinstvo'">Osnovna škola 'Bratstvo jedinstvo'</option>
							<option value="Osnovna škola 'Bratstvo-jedinstvo' Bezdan">Osnovna škola 'Bratstvo-jedinstvo' Bezdan</option>
							<option value="Osnovna škola 'Dositej Obradović'">Osnovna škola 'Dositej Obradović'</option>
							<option value="Osnovna škola 'Ivan Goran Kovačić' Stanišić">Osnovna škola 'Ivan Goran Kovačić' Stanišić</option>
							<option value="Osnovna škola 'Ivo Lola Ribar'">Osnovna škola 'Ivo Lola Ribar'</option>
							<option value="Osnovna škola 'Kiš Ferenc' Telečka">Osnovna škola 'Kiš Ferenc' Telečka</option>
							<option value="Osnovna škola 'Laza Kostić' Gakovo">Osnovna škola 'Laza Kostić' Gakovo</option>
							<option value="Osnovna škola 'Miroslav Antić' Čonoplja">Osnovna škola 'Miroslav Antić' Čonoplja</option>
							<option value="Osnovna škola 'Moše Pijade' Bački Breg">Osnovna škola 'Moše Pijade' Bački Breg</option>
							<option value="Osnovna škola 'Nikola Vukićević'">Osnovna škola 'Nikola Vukićević'</option>
							<option value="Osnovna škola 'Nikola Tesla' Kljajićevo">Osnovna škola 'Nikola Tesla' Kljajićevo</option>
							<option value="Osnovna škola 'Ognjena Price' Kolut">Osnovna škola 'Ognjena Price' Kolut</option>
							<option value="Osnovna škola 'Petefi Šandor' Doroslovo">Osnovna škola 'Petefi Šandor' Doroslovo</option>
							<option value="Osnovna škola 'Petar Kočić' Riđica">Osnovna škola 'Petar Kočić' Riđica</option>
							<option value="Škola za osnovno i srednje obrazovanje sa domom 'Vuk Karadžić'">Škola za osnovno i srednje obrazovanje sa domom 'Vuk Karadžić'</option>
							<option value="Gimnazija Veljko Petrović">Gimnazija Veljko Petrović</option>
							<option value="Muzička škola Petar Konjović">Muzička škola Petar Konjović</option>
							<option value="Srednja ekonomska škola">Srednja ekonomska škola</option>
							<option value="Srednja medicinska škola Dr Ružica Rip">Srednja medicinska škola Dr Ružica Rip</option>
							<option value="Srednja poljoprivredno-prehrambena škola">Srednja poljoprivredno-prehrambena škola</option>
							<option value="Srednja tehnička škola">Srednja tehnička škola</option>
							<option value="Srednja škola Sveti Sava">Srednja škola Sveti Sava</option>
							<option value="Škola za osnovno i srednje obrazovanje sa domom Vuk Karadžić">Škola za osnovno i srednje obrazovanje sa domom Vuk Karadžić</option>
						</select>
						<select class="it-school-name" data-city="Sopot">
							<option value="">Izaberite školu</option>
							<option value="Ekonomsko-trgovinska škola">Ekonomsko-trgovinska škola</option>
							<option value="Mašinska škola Kosmaj">Mašinska škola Kosmaj</option>
						</select>
						<select class="it-school-name" data-city="Srbobran">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Vuk Karadžić' Srbobran">Osnovna škola 'Vuk Karadžić' Srbobran</option>
							<option value="Osnovna škola 'Jovan Jovanović Zmaj' Srbobran">Osnovna škola 'Jovan Jovanović Zmaj' Srbobran</option>
							<option value="Osnovna škola 'Petar Drapšin' Turija">Osnovna škola 'Petar Drapšin' Turija</option>
							<option value="Osnovna škola 'Žarko Zrenjanin Uča' Nadalj">Osnovna škola 'Žarko Zrenjanin Uča' Nadalj</option>
							<option value="Gimnazija i ekonomska škola Svetozar Miletić">Gimnazija i ekonomska škola Svetozar Miletić</option>
						</select>
						<select class="it-school-name" data-city="Sremska Mitrovica">
							<option value="">Izaberite školu</option>
							<option value="Muzička škola 'Petar Krančević'">Muzička škola 'Petar Krančević'</option>
							<option value="Osnovna škola 'Boško Palkovljević Pinki'">Osnovna škola 'Boško Palkovljević Pinki'</option>
							<option value="Osnovna škola 'Branko Radičević' Kuzmin">Osnovna škola 'Branko Radičević' Kuzmin</option>
							<option value="Osnovna škola 'Dobrosav Radosavljević Narod' Mačvanska Mitrovica">Osnovna škola 'Dobrosav Radosavljević Narod' Mačvanska Mitrovica</option>
							<option value="Osnovna škola 'Jovan Jovanović Zmaj'">Osnovna škola 'Jovan Jovanović Zmaj'</option>
							<option value="Osnovna škola 'Jovan Popović'">Osnovna škola 'Jovan Popović'</option>
							<option value="Osnovna škola 'Sveti Sava'">Osnovna škola 'Sveti Sava'</option>
							<option value="Osnovna škola 'Slobodan Bajić Paja'">Osnovna škola 'Slobodan Bajić Paja'</option>
							<option value="Osnovna škola 'Triva Vitasović Lebarnik' Laćarak">Osnovna škola 'Triva Vitasović Lebarnik' Laćarak</option>
							<option value="Osnovna škola 'Jovan Jovanović Zmaj' Martinci">Osnovna škola 'Jovan Jovanović Zmaj' Martinci</option>
							<option value="Škola za osnovno i srednje obrazovanje 'Radivoj Popović'">Škola za osnovno i srednje obrazovanje 'Radivoj Popović'</option>
							<option value="Ekonomska škola 9. Maj">Ekonomska škola 9. Maj</option>
							<option value="Medicinska škola Draginja Nikšić">Medicinska škola Draginja Nikšić</option>
							<option value="Mitrovačka gimnazija">Mitrovačka gimnazija</option>
							<option value="Muzička škola Petar Krančević">Muzička škola Petar Krančević</option>
							<option value="Prehrambeno-šumarska i hemijska škola">Prehrambeno-šumarska i hemijska škola</option>
							<option value="Srednja tehnička škola Nikola Tesla">Srednja tehnička škola Nikola Tesla</option>
							<option value="Škola za osnovno i srednje obrazovanje Radivoj Popović">Škola za osnovno i srednje obrazovanje Radivoj Popović</option>
						</select>
						<select class="it-school-name" data-city="Sremski Karlovci">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola '23. oktobar'">Osnovna škola '23. oktobar'</option>
							<option value="Karlovačka gimnazija">Karlovačka gimnazija</option>
							<option value="Srednja informatička škola">Srednja informatička škola</option>
							<option value="Srednja poslovno menadžerska škola">Srednja poslovno menadžerska škola</option>
						</select>
						<select class="it-school-name" data-city="Srpska Crnja">
							<option value="">Izaberite školu</option>
							<option value="Srednja škola Đura Jakšić">Srednja škola Đura Jakšić</option>
						</select>
						<select class="it-school-name" data-city="Stanišor">
							<option value="">Izaberite školu</option>
							<option value="Muzička škola">Muzička škola</option>
						</select>
						<select class="it-school-name" data-city="Stara Pazova">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola '23.oktobar' Golubinci">Osnovna škola '23.oktobar' Golubinci</option>
							<option value="Osnovna škola 'Boško Palkovljević Pinki'">Osnovna škola 'Boško Palkovljević Pinki'</option>
							<option value="Osnovna škola 'Vera Miščević' Belegiš">Osnovna škola 'Vera Miščević' Belegiš</option>
							<option value="Osnovna škola 'Milan Hadžić' Vojka">Osnovna škola 'Milan Hadžić' Vojka</option>
							<option value="Osnovna škola 'Nikola Tesla' Novi Banovci">Osnovna škola 'Nikola Tesla' Novi Banovci</option>
							<option value="Osnovna škola 'Rastko Nemanjić - Sveti Sava' Nova Pazova">Osnovna škola 'Rastko Nemanjić - Sveti Sava' Nova Pazova</option>
							<option value="Osnovna škola 'Simeon Aranicki'">Osnovna škola 'Simeon Aranicki'</option>
							<option value="Osnovna škola 'Slobodan Savković' Stari Banovci">Osnovna škola 'Slobodan Savković' Stari Banovci</option>
							<option value="Osnovna škola 'Heroj Janko Čmelik'">Osnovna škola 'Heroj Janko Čmelik'</option>
							<option value="Gimnazija Branko Radičević">Gimnazija Branko Radičević</option>
							<option value="Ekonomsko-trgovinska škola Vuk Karadžić">Ekonomsko-trgovinska škola Vuk Karadžić</option>
							<option value="Tehnička škola">Tehnička škola</option>
							<option value="Škola za osnovno i srednje obrazovanje 'Anton Skala'">Škola za osnovno i srednje obrazovanje 'Anton Skala'</option>
						</select>
						<select class="it-school-name" data-city="Subotica">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Sonja Marinković'">Osnovna škola 'Sonja Marinković'</option>
							<option value="Muzička škola">Muzička škola</option>
							<option value="Osnovna i srednja škola 'Žarko Zrenjanin'">Osnovna i srednja škola 'Žarko Zrenjanin'</option>
							<option value="Osnovna škola '10. oktobar'">Osnovna škola '10. oktobar'</option>
							<option value="Osnovna škola 'Bosa Milićević' Novi Žednik">Osnovna škola 'Bosa Milićević' Novi Žednik</option>
							<option value="Osnovna škola 'Vladimir Nazor' Đurđin">Osnovna škola 'Vladimir Nazor' Đurđin</option>
							<option value="Osnovna škola 'Vuk Karadžić' Bajmok">Osnovna škola 'Vuk Karadžić' Bajmok</option>
							<option value="Osnovna škola 'Đuro Salaj'">Osnovna škola 'Đuro Salaj'</option>
							<option value="Osnovna škola 'Ivan Goran Kovačić'">Osnovna škola 'Ivan Goran Kovačić'</option>
							<option value="Osnovna škola 'Ivan Milutinović'">Osnovna škola 'Ivan Milutinović'</option>
							<option value="Osnovna škola 'Jovan Jovanović Zmaj'">Osnovna škola 'Jovan Jovanović Zmaj'</option>
							<option value="Osnovna škola 'Jovan Mikić'">Osnovna škola 'Jovan Mikić'</option>
							<option value="Osnovna škola 'Kizur Ištvan'">Osnovna škola 'Kizur Ištvan'</option>
							<option value="Osnovna škola 'Majšanski put'">Osnovna škola 'Majšanski put'</option>
							<option value="Osnovna škola 'Matija Gubec' Donji Tavankut">Osnovna škola 'Matija Gubec' Donji Tavankut</option>
							<option value="Osnovna škola 'Matko Vuković'">Osnovna škola 'Matko Vuković'</option>
							<option value="Osnovna škola 'Miroslav Antić' Palić">Osnovna škola 'Miroslav Antić' Palić</option>
							<option value="Osnovna škola 'Petefi Šandor' Hajdukovo">Osnovna škola 'Petefi Šandor' Hajdukovo</option>
							<option value="Osnovna škola 'Pionir' Stari Žednik">Osnovna škola 'Pionir' Stari Žednik</option>
							<option value="Osnovna škola 'Sveti Sava'">Osnovna škola 'Sveti Sava'</option>
							<option value="Osnovna škola 'Sečenji Ištvan'">Osnovna škola 'Sečenji Ištvan'</option>
							<option value="Osnovna škola 'Hunjadi Janoš' Čantavir">Osnovna škola 'Hunjadi Janoš' Čantavir</option>
							<option value="Školski centar 'Dositej Obradović'">Školski centar 'Dositej Obradović'</option>
							<option value="Gimnazija za talentovane učenike Deže Kostolanji">Gimnazija za talentovane učenike Deže Kostolanji</option>
							<option value="Gimnazija Svetozar Marković">Gimnazija Svetozar Marković</option>
							<option value="Ekonomska srednja škola Bosa Milićević">Ekonomska srednja škola Bosa Milićević</option>
							<option value="Ekonomska škola Global">Ekonomska škola Global</option>
							<option value="Muzička škola">Muzička škola</option>
							<option value="Osnovna i srednja škola Žarko Zrenjanin">Osnovna i srednja škola Žarko Zrenjanin</option>
							<option value="Politehnička škola">Politehnička škola</option>
							<option value="Srednja medicinska škola">Srednja medicinska škola</option>
							<option value="Tehnička škola Ivan Sarić">Tehnička škola Ivan Sarić</option>
							<option value="Hemijsko-tehnološka škola">Hemijsko-tehnološka škola</option>
							<option value="Školski centar Dositej Obradović">Školski centar Dositej Obradović</option>
						</select>
						<select class="it-school-name" data-city="Suvo Grlo">
							<option value="">Izaberite školu</option>
							<option value="Tehnička škola">Tehnička škola</option>
						</select>
						<select class="it-school-name" data-city="Surdulica">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Vuk Karadžić'">Osnovna škola 'Vuk Karadžić'</option>
							<option value="Osnovna škola 'Akademik Đorđe Lazarević' Vlasina Okruglica">Osnovna škola 'Akademik Đorđe Lazarević' Vlasina Okruglica</option>
							<option value="Osnovna škola 'Ivo Lola Ribar' Klisura">Osnovna škola 'Ivo Lola Ribar' Klisura</option>
							<option value="Osnovna škola 'Pera Mačkatovac'">Osnovna škola 'Pera Mačkatovac'</option>
							<option value="Osnovna škola 'Sveti Sava' Božica">Osnovna škola 'Sveti Sava' Božica</option>
							<option value="Osnovna škola 'Jovan Jovanović Zmaj'">Osnovna škola 'Jovan Jovanović Zmaj'</option>
							<option value="Osnovna škola 'Bora Stanković' Jelašica">Osnovna škola 'Bora Stanković' Jelašica</option>
							<option value="Gimnazija Svetozar Marković">Gimnazija Svetozar Marković</option>
							<option value="Poljoprivredno-šumarska škola Josif Pančić">Poljoprivredno-šumarska škola Josif Pančić</option>
							<option value="Tehnička škola Nikola Tesla">Tehnička škola Nikola Tesla</option>
						</select>
						<select class="it-school-name" data-city="Sušica">
							<option value="">Izaberite školu</option>
							<option value="Elektrotehnička škola Mihajlo Pupin">Elektrotehnička škola Mihajlo Pupin</option>
						</select>
						<select class="it-school-name" data-city="Temerin">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Danilo Zelenović' Sirig">Osnovna škola 'Danilo Zelenović' Sirig</option>
							<option value="Osnovna škola 'Kokai Imre'">Osnovna škola 'Kokai Imre'</option>
							<option value="Osnovna škola 'Petar Kočić'">Osnovna škola 'Petar Kočić'</option>
							<option value="Osnovna škola 'Slavko Rodić' Bački Jarak">Osnovna škola 'Slavko Rodić' Bački Jarak</option>
							<option value="Srednja škola Lukijan Mušicki">Srednja škola Lukijan Mušicki</option>
						</select>
						<select class="it-school-name" data-city="Titel">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Isidora Sekulić' Šajkaš">Osnovna škola 'Isidora Sekulić' Šajkaš</option>
							<option value="Osnovna škola 'Svetozar Miletić'">Osnovna škola 'Svetozar Miletić'</option>
							<option value="Srednja tehnička škola Mileva Marić">Srednja tehnička škola Mileva Marić</option>
						</select>
						<select class="it-school-name" data-city="Topola">
							<option value="">Izaberite školu</option>
							<option value="Srednja škola Kralj Petar Prvi">Srednja škola Kralj Petar Prvi</option>
							<option value="Osnovna škola 'Živko Tomić' Donja Šatornja">Osnovna škola 'Živko Tomić' Donja Šatornja</option>
							<option value="Osnovna škola 'Karađorđe'">Osnovna škola 'Karađorđe'</option>
							<option value="Osnovna škola 'Milan Blagojević' Natalinci">Osnovna škola 'Milan Blagojević' Natalinci</option>
							<option value="Osnovna škola 'Milutin Jelenić' Gornja Trnava">Osnovna škola 'Milutin Jelenić' Gornja Trnava</option>
							<option value="Osnovna škola 'Sestre Radović' Belosavci">Osnovna škola 'Sestre Radović' Belosavci</option>
						</select>
						<select class="it-school-name" data-city="Trgovište">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Bora Stanković' Novo Selo">Osnovna škola 'Bora Stanković' Novo Selo</option>
							<option value="Osnovna škola 'Branko Radičević'">Osnovna škola 'Branko Radičević'</option>
							<option value="Osnovna škola 'Vuk Karadžić' Donji Stajevac">Osnovna škola 'Vuk Karadžić' Donji Stajevac</option>
							<option value="Osnovna škola 'Žarko Zrenjanin Uča' Radovnica">Osnovna škola 'Žarko Zrenjanin Uča' Radovnica</option>
							<option value="Srednja stručna škola Milutin Bojić">Srednja stručna škola Milutin Bojić</option>
						</select>
						<select class="it-school-name" data-city="Trstenik">
							<option value="">Izaberite školu</option>
							<option value="Muzička škola 'Kornelije Stanković'">Muzička škola 'Kornelije Stanković'</option>
							<option value="Osnovna škola 'Dobrica Ćosić' Velika Drenova">Osnovna škola 'Dobrica Ćosić' Velika Drenova</option>
							<option value="Osnovna škola 'Živadin Apostolović'">Osnovna škola 'Živadin Apostolović'</option>
							<option value="Osnovna škola 'Jovan Jovanović Zmaj' Stopanja">Osnovna škola 'Jovan Jovanović Zmaj' Stopanja</option>
							<option value="Osnovna škola 'Knjeginja Milica' Donji Ribnik">Osnovna škola 'Knjeginja Milica' Donji Ribnik</option>
							<option value="Osnovna škola 'Ljubivoje Bajić' Medveđa">Osnovna škola 'Ljubivoje Bajić' Medveđa</option>
							<option value="Osnovna škola 'Miodrag Čajetinac Čajka'">Osnovna škola 'Miodrag Čajetinac Čajka'</option>
							<option value="Osnovna škola 'Rade Dodić' Milutovac">Osnovna škola 'Rade Dodić' Milutovac</option>
							<option value="Osnovna škola 'Sveti Sava'">Osnovna škola 'Sveti Sava'</option>
							<option value="Gimnazija Vuk Karadžić">Gimnazija Vuk Karadžić</option>
							<option value="Tehnička škola">Tehnička škola</option>
						</select>
						<select class="it-school-name" data-city="Tutin">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola '25. maj' Delimeđe">Osnovna škola '25. maj' Delimeđe</option>
							<option value="Osnovna škola 'Aleksa Đilas Bećo' Istočni Mojstir">Osnovna škola 'Aleksa Đilas Bećo' Istočni Mojstir</option>
							<option value="Osnovna škola 'Aleksa Šantić' Crkvine">Osnovna škola 'Aleksa Šantić' Crkvine</option>
							<option value="Osnovna škola 'Vuk Karadžić'">Osnovna škola 'Vuk Karadžić'</option>
							<option value="Osnovna škola 'Dr Ibrahim Bakić' Leskova">Osnovna škola 'Dr Ibrahim Bakić' Leskova</option>
							<option value="Osnovna škola 'Meša Selimović' Ribariće">Osnovna škola 'Meša Selimović' Ribariće</option>
							<option value="Osnovna škola 'Rifat Burdžović Tršo'">Osnovna škola 'Rifat Burdžović Tršo'</option>
							<option value="Gimnazija 7. jula 18">Gimnazija 7. jula 18</option>
							<option value="Tehnička škola 7. juli 18">Tehnička škola 7. juli 18</option>
						</select>
						<select class="it-school-name" data-city="Ćićevac">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Vojvoda Prijezda' Stalać">Osnovna škola 'Vojvoda Prijezda' Stalać</option>
							<option value="Osnovna škola 'Dositej Obradović'">Osnovna škola 'Dositej Obradović'</option>
						</select>
						<select class="it-school-name" data-city="Ćuprija">
							<option value="">Izaberite školu</option>
							<option value="Muzička škola 'Dušan Skovran'">Muzička škola 'Dušan Skovran'</option>
							<option value="Osnovna škola '13. oktobar'">Osnovna škola '13. oktobar'</option>
							<option value="Osnovna škola 'Vuk Karadžić'">Osnovna škola 'Vuk Karadžić'</option>
							<option value="Osnovna škola 'Đura Jakšić'">Osnovna škola 'Đura Jakšić'</option>
							<option value="Gimnazija">Gimnazija</option>
							<option value="Medicinska škola">Medicinska škola</option>
							<option value="Tehnička škola">Tehnička škola</option>
							<option value="Škola za muzičke talente">Škola za muzičke talente</option>
							<option value="Škola za muzičke talente">Škola za muzičke talente</option>
						</select>
						<select class="it-school-name" data-city="Ub">
							<option value="">Izaberite školu</option>
							<option value="Muzička škola 'Petar Stojanović'">Muzička škola 'Petar Stojanović'</option>
							<option value="Osnovna škola 'Dušan Danilović' Radljevo">Osnovna škola 'Dušan Danilović' Radljevo</option>
							<option value="Osnovna škola 'Milan Munjas'">Osnovna škola 'Milan Munjas'</option>
							<option value="Osnovna škola 'Rajko Mihajlović' Banjani">Osnovna škola 'Rajko Mihajlović' Banjani</option>
							<option value="Osnovna škola 'Sveti Sava' Pambukovica">Osnovna škola 'Sveti Sava' Pambukovica</option>
							<option value="Gimnazija Branislav Petronijević">Gimnazija Branislav Petronijević</option>
							<option value="Tehnička škola">Tehnička škola</option>
						</select>
						<select class="it-school-name" data-city="Užice">
							<option value="">Izaberite školu</option>
							<option value="Muzička škola 'Vojislav Lale Stefanović'">Muzička škola 'Vojislav Lale Stefanović'</option>
							<option value="Osnovna škola 'Aleksa Dejović' Sevojno">Osnovna škola 'Aleksa Dejović' Sevojno</option>
							<option value="Osnovna škola 'Bogosav Janković' Kremna">Osnovna škola 'Bogosav Janković' Kremna</option>
							<option value="Osnovna škola 'Đura Jakšić' Ravni">Osnovna škola 'Đura Jakšić' Ravni</option>
							<option value="Osnovna škola 'Miodrag Milovanović Lune' Karan">Osnovna škola 'Miodrag Milovanović Lune' Karan</option>
							<option value="Osnovna škola 'Nada Matić'">Osnovna škola 'Nada Matić'</option>
							<option value="Osnovna škola 'Stari Grad'">Osnovna škola 'Stari Grad'</option>
							<option value="Osnovna škola 'Dušan Jerković'">Osnovna škola 'Dušan Jerković'</option>
							<option value="Osnovna škola 'Slobodan Sekulić'">Osnovna škola 'Slobodan Sekulić'</option>
							<option value="Osnovna škola za obrazovanje učenika sa smetnjama u razvoju Miodrag V. Matić">Osnovna škola za obrazovanje učenika sa smetnjama u razvoju Miodrag V. Matić</option>
							<option value="Prva Osnovna škola 'Kralj Petra II'">Prva Osnovna škola 'Kralj Petra II'</option>
							<option value="Ekonomska škola">Ekonomska škola</option>
							<option value="Medicinska škola">Medicinska škola</option>
							<option value="Muzička škola Vojislav - Lale Stefanović">Muzička škola Vojislav - Lale Stefanović</option>
							<option value="Tehnička škola Radoje Ljubičić">Tehnička škola Radoje Ljubičić</option>
							<option value="Tehnička škola">Tehnička škola</option>
							<option value="Užička gimnazija">Užička gimnazija</option>
							<option value="Umetnička škola">Umetnička škola</option>
						</select>
						<select class="it-school-name" data-city="Umka">
							<option value="">Izaberite školu</option>
							<option value="Škola za osnovno i srednje obrazovanje sa domom Sveti Sava">Škola za osnovno i srednje obrazovanje sa domom Sveti Sava</option>
						</select>
						<select class="it-school-name" data-city="Futog">
							<option value="">Izaberite školu</option>
							<option value="Poljoprivredna škola">Poljoprivredna škola</option>
						</select>
						<select class="it-school-name" data-city="Crvenka">
							<option value="">Izaberite školu</option>
							<option value="Srednja stručna škola">Srednja stručna škola</option>
						</select>
						<select class="it-school-name" data-city="Crna Trava">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Aleksandar Stojanović'">Osnovna škola 'Aleksandar Stojanović'</option>
							<option value="Tehnička škola Milentije Popović">Tehnička škola Milentije Popović</option>
						</select>
						<select class="it-school-name" data-city="Čajetina">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Dimitrije Tucović'">Osnovna škola 'Dimitrije Tucović'</option>
							<option value="Osnovna škola 'Milivoje Borović' Mačkat">Osnovna škola 'Milivoje Borović' Mačkat</option>
							<option value="Osnovna škola 'Savo Jovanović Sirogojno' Sirogojno">Osnovna škola 'Savo Jovanović Sirogojno' Sirogojno</option>
							<option value="Ugostiteljsko-turistička škola">Ugostiteljsko-turistička škola</option>
						</select>
						<select class="it-school-name" data-city="Čačak">
							<option value="">Izaberite školu</option>
							<option value="Muzička škola 'Dr Vojislav Vučković'">Muzička škola 'Dr Vojislav Vučković'</option>
							<option value="Osnovna škola 'Božo Tomić' Prijevor">Osnovna škola 'Božo Tomić' Prijevor</option>
							<option value="Osnovna škola 'Vladislav Petković Dis' Zablaće">Osnovna škola 'Vladislav Petković Dis' Zablaće</option>
							<option value="Osnovna škola 'Vuk Karadžić'">Osnovna škola 'Vuk Karadžić'</option>
							<option value="Osnovna škola 'Đeneral Marko Đ. Katanić' Bresnica">Osnovna škola 'Đeneral Marko Đ. Katanić' Bresnica</option>
							<option value="Osnovna škola 'Milica Pavlović'">Osnovna škola 'Milica Pavlović'</option>
							<option value="Osnovna škola 'Preljina' Preljina">Osnovna škola 'Preljina' Preljina</option>
							<option value="Osnovna škola 'Sveti Sava' Atenica">Osnovna škola 'Sveti Sava' Atenica</option>
							<option value="Osnovna škola 'Stepa Stepanović' Gornja Gorevnica">Osnovna škola 'Stepa Stepanović' Gornja Gorevnica</option>
							<option value="Osnovna škola 'Tanasko Rajić'">Osnovna škola 'Tanasko Rajić'</option>
							<option value="Osnovna škola 'Tatomir Anđelić' Mrčajevci">Osnovna škola 'Tatomir Anđelić' Mrčajevci</option>
							<option value="Osnovna škola 'Filip Filipović'">Osnovna škola 'Filip Filipović'</option>
							<option value="Osnovna škola 'Branislav Petrović' Slatina">Osnovna škola 'Branislav Petrović' Slatina</option>
							<option value="Osnovna škola 'Sveti đakon Avakum' Trnava">Osnovna škola 'Sveti đakon Avakum' Trnava</option>
							<option value="Osnovna škola '22 decembar' Donja Trepča">Osnovna škola '22 decembar' Donja Trepča</option>
							<option value="Osnovna škola 'Dr Dragiša Mišović'">Osnovna škola 'Dr Dragiša Mišović'</option>
							<option value="Osnovna škola 'Ratko Mitrović'">Osnovna škola 'Ratko Mitrović'</option>
							<option value="Škola za osnovno i srednje obrazovanje '1.Novembar'">Škola za osnovno i srednje obrazovanje '1.Novembar'</option>
							<option value="Gimnazija">Gimnazija</option>
							<option value="Ekonomska škola">Ekonomska škola</option>
							<option value="Mašinsko-saobraćajna škola">Mašinsko-saobraćajna škola</option>
							<option value="Medicinska škola Episkopa Nikifora">Medicinska škola Episkopa Nikifora</option>
							<option value="Muzička škola Dr Vojislav Vučković">Muzička škola Dr Vojislav Vučković</option>
							<option value="Prehrambeno-ugostiteljska škola">Prehrambeno-ugostiteljska škola</option>
							<option value="Tehnička škola">Tehnička škola</option>
							<option value="Škola za osnovno i srednje obrazovanje 1. novembar">Škola za osnovno i srednje obrazovanje 1. novembar</option>
						</select>
						<select class="it-school-name" data-city="Čoka">
							<option value="">Izaberite školu</option>
							<option value="Osnovna škola 'Dr Tihomir Ostojić' Ostojićevo">Osnovna škola 'Dr Tihomir Ostojić' Ostojićevo</option>
							<option value="Osnovna škola 'Jovan Popović'">Osnovna škola 'Jovan Popović'</option>
							<option value="Osnovna škola 'Servo Mihalj' Padej">Osnovna škola 'Servo Mihalj' Padej</option>
							<option value="Hemijsko-prehrambena srednja škola">Hemijsko-prehrambena srednja škola</option>
						</select>
						<select class="it-school-name" data-city="Šabac">
							<option value="">Izaberite školu</option>
							<option value="Muzička škola 'Mihailo Vukdragović'">Muzička škola 'Mihailo Vukdragović'</option>
							<option value="Osnovna škola 'Vojvoda Stepa' Lipolist">Osnovna škola 'Vojvoda Stepa' Lipolist</option>
							<option value="Osnovna škola 'Vuk Karadžić'">Osnovna škola 'Vuk Karadžić'</option>
							<option value="Osnovna škola 'Dositej Obradović' Volujac">Osnovna škola 'Dositej Obradović' Volujac</option>
							<option value="Osnovna škola 'Janko Veselinović'">Osnovna škola 'Janko Veselinović'</option>
							<option value="Osnovna škola 'Jevrem Obrenović'">Osnovna škola 'Jevrem Obrenović'</option>
							<option value="Osnovna škola 'Jovan Cvijić' Zminjak">Osnovna škola 'Jovan Cvijić' Zminjak</option>
							<option value="Osnovna škola 'Kralj Aleksandar Karađorđević' Prnjavor">Osnovna škola 'Kralj Aleksandar Karađorđević' Prnjavor</option>
							<option value="Osnovna škola 'Laza K. Lazarević'">Osnovna škola 'Laza K. Lazarević'</option>
							<option value="Osnovna škola 'Majur' Majur">Osnovna škola 'Majur' Majur</option>
							<option value="Osnovna škola 'Nata Jeličić'">Osnovna škola 'Nata Jeličić'</option>
							<option value="Osnovna škola 'Nikolaj Velimirović'">Osnovna škola 'Nikolaj Velimirović'</option>
							<option value="Osnovna škola 'Stojan Novaković'">Osnovna škola 'Stojan Novaković'</option>
							<option value="Specijalna škola 'Sveti Sava'">Specijalna škola 'Sveti Sava'</option>
							<option value="Ekonomska škola 'Stana Milanović'">Ekonomska škola 'Stana Milanović'</option>
							<option value="Medicinska škola Dr Andra Jovanović">Medicinska škola Dr Andra Jovanović</option>
							<option value="Muzička škola Mihailo Vukdragović">Muzička škola Mihailo Vukdragović</option>
							<option value="Srednja ekonomsko-poslovna škola">Srednja ekonomsko-poslovna škola</option>
							<option value="Srednja poljoprivredna škola">Srednja poljoprivredna škola</option>
							<option value="Stručna hemijska i tekstilna škola">Stručna hemijska i tekstilna škola</option>
							<option value="Tehnička škola">Tehnička škola</option>
							<option value="Šabačka gimnazija">Šabačka gimnazija</option>
							<option value="Škola primenjenih umetnosti">Škola primenjenih umetnosti</option>
						</select>
						<select class="it-school-name" data-city="Šid">
							<option value="">Izaberite školu</option>
							<option value="Muzička škola 'Filip Višnjić'">Muzička škola 'Filip Višnjić'</option>
							<option value="Osnovna škola 'Branko Radičević'">Osnovna škola 'Branko Radičević'</option>
							<option value="Osnovna škola 'Vuk Karadžić' Adaševci">Osnovna škola 'Vuk Karadžić' Adaševci</option>
							<option value="Osnovna škola 'Sava Šumanović' Erdevik">Osnovna škola 'Sava Šumanović' Erdevik</option>
							<option value="Osnovna škola 'Sremski front'">Osnovna škola 'Sremski front'</option>
							<option value="Osnovna škola 'Filip Višnjić' Morović">Osnovna škola 'Filip Višnjić' Morović</option>
							<option value="Specijalna škola 'Jovan Jovanović Zmaj'">Specijalna škola 'Jovan Jovanović Zmaj'</option>
							<option value="Gimnazija Sava Šumanović">Gimnazija Sava Šumanović</option>
							<option value="Tehnička škola Nikola Tesla">Tehnička škola Nikola Tesla</option>
						</select>
						<select class="it-school-name" data-city="Šilovo">
							<option value="">Izaberite školu</option>
							<option value="Gimnazija">Gimnazija</option>
						</select>
						<select class="it-school-name" data-city="Štrpce">
							<option value="">Izaberite školu</option>
							<option value="Ekonomsko-trgovinska škola">Ekonomsko-trgovinska škola</option>
						</select>
					</div>
				</div>
			</div>
		</div>
		<div class="it-row-section it-col-num--2 it-responsive--predefined">
			<div class="it-row">
				<div class="it-column">
					<div class="it-form-field">
						<label for="suspended-number">Broj u obustavi *</label>
						<input type="number" name="countBlocking" id="suspended-number" min="0" max="500" aria-required="true" aria-describedby="suspended-number-desc" value="" placeholder="0" required />
						<small id="suspended-number-desc">Broj nastavnog i nenastavnog osoblja Vaše škole, koji su u obustavi</small>
					</div>
				</div>
				<div class="it-column">
					<div class="it-form-field">
						<label for="total-number">Ukupan broj *</label>
						<input type="number" name="count" id="total-number" min="1" max="500" aria-required="true" aria-describedby="total-number-desc" value="" placeholder="1" required />
						<small id="total-number-desc">Ukupan broj nastavnog i nenastavnog osoblja u Vašoj školi (dovoljano je uneti približan broj)</small>
					</div>
				</div>
			</div>
		</div>
		<div class="it-form-field">
			<label for="message">Komentar (opciono)</label>
			<textarea name="comment" id="message" cols="40" rows="6" maxlength="600" aria-describedby="message-desc"></textarea>
			<small id="message-desc">Unesi dodatni komentar ili sugestiju</small>
		</div>
		<button type="submit" class="it-form-button it-button it-size--normal it-layout--filled it-m">
			<span class="it-m-text">Pošalji</span>
		</button>
		<div class="it-form-response" aria-hidden="true"></div>
    </form>
</main>