<?php $this->layout('layout::standard') ?>
<main class="it-grid">
	<h2>Obrazac za delegate u obustavi</h2>
	<p>Molimo Vas da, kao delegat Vaše škole, u ime svog kolektiva popunite ovaj formular kako bismo Vas mogli kontaktirati u vezi sa finansijskom podrškom za prosvetne radnike u obustavi, uključujući i nastavno i nenastavno osoblje.</p>

	<?=$this->printError( $data['errors'] ?? array(), 'form' ); ?>

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
							<?php
							if ( isset( $schoolTypes ) && is_array( $schoolTypes ) ) {
								foreach ( $schoolTypes as $schoolType ) {
									?>
									<option value="<?php echo $schoolType; ?>"><?php echo $schoolType; ?></option>
									<?php
								}
							}
							?>
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
							<?php
							if ( isset( $schoolsMap ) && is_array( $schoolsMap ) ) {
								$cities = array_keys( $schoolsMap );

								foreach ( $cities as $city ) {
									?>
									<option value="<?php echo $city; ?>"><?php echo $city; ?></option>
									<?php
								}
							}
							?>
						</select>
					</div>
				</div>
				<div class="it-column">
					<div class="it-form-field">
						<label>Naziv škole *</label>
						<input type="hidden" name="schoolName" id="school-name" class="it-school-value" value="" aria-required="true" required />
						<?php
						if ( isset( $schoolsMap ) && is_array( $schoolsMap ) ) {
							foreach ( $schoolsMap as $city => $schools ) {
								?>
								<select class="it-school-name" data-city="<?php echo $city; ?>">
									<option value="">Izaberite školu</option>
									<?php
									foreach ( $schools as $school ) {
										?>
										<option value="<?php echo $school; ?>"><?php echo $school; ?></option>
										<?php
									}
									?>
								</select>
								<?php
							}
						}
						?>
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