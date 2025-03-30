<?php $this->layout('layout::standard') ?>
<main class="it-grid">
	<h2>Mreža Solidarnosti - Obrazac za Donatore</h2>
	<p>Priključi se – Pomozimo prosvetnim radnicima sada!</p>
	<p>Mere smanjenja plata su već stupile na snagu, što znači da moramo odmah reagovati</p>
	<p><strong>Hitno nam je potrebno više donatora</strong>! Broj ugroženih nastavnika raste iz dana u dan, a vremena je sve manje.</p>
	<p><strong>Prijavite se odmah i pomozite da zaštitimo što veći broj prosvetnih radnika putem direktne materijalne podrške.</strong></p>
	<p>* Obavezno je da donatori ostave svoju mejl adresu kako bismo im mogli
		pravovremeno poslati <b>tačne i personalizovane instrukcije za uplatu.</b></p>
	<p>
		<strong>Želite više informacija?</strong>
		<br />
		Pripremili smo dokument koji sadrži odgovore na sva ključna	pitanja vezana za ovaj model podrške.
		<strong>Molimo vas da ga pažljivo pročitate.</strong>
	</p>
	<p>
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36" style="width: 18px;height: auto;vertical-align: middle;"><path fill="#99AAB5" d="M35.354 25.254c.217-2.391-.513-4.558-2.057-6.102L17.033 2.89c-.391-.391-1.024-.391-1.414 0-.391.391-.391 1.024 0 1.414l16.264 16.263c1.116 1.117 1.642 2.717 1.479 4.506-.159 1.748-.957 3.456-2.188 4.686-1.23 1.23-2.938 2.027-4.685 2.187-1.781.161-3.39-.362-4.506-1.479L3.598 12.082c-.98-.98-1.059-2.204-.953-3.058.15-1.196.755-2.401 1.66-3.307 1.7-1.7 4.616-2.453 6.364-.707l14.85 14.849c1.119 1.12.026 2.803-.708 3.536-.733.735-2.417 1.826-3.535.707L9.962 12.789c-.391-.391-1.024-.39-1.414 0-.391.391-.391 1.023 0 1.414l11.313 11.314c1.859 1.858 4.608 1.05 6.363-.707 1.758-1.757 2.565-4.507.708-6.364L12.083 3.597c-2.62-2.62-6.812-1.673-9.192.706C1.677 5.517.864 7.147.661 8.775c-.229 1.833.312 3.509 1.523 4.721l18.384 18.385c1.365 1.365 3.218 2.094 5.281 2.094.27 0 .544-.013.82-.037 2.206-.201 4.362-1.209 5.918-2.765 1.558-1.556 2.565-3.713 2.767-5.919z"></path></svg>
		<strong>Važna pitanja i odgovori:</strong>
		<a href="https://drive.google.com/file/d/1MEnYGGyp0wWojRV5gSPg3LC_pxBX2JLJ/view?usp=sharing">Ovde</a>
	</p>
	<p>Takođe, možete se detaljnije informisati putem naših društvenih mreža.</p>
	<p><a href="https://itsrbija.org/">IT Srbija</a> – Neformalna grupa IT Stručnjaka</p>

    <form method="post" action="obrazacDonatori" class="it-form" id="it-donatori-form" aria-label="Donatori forma" data-type="donatori">
        <?=$this->formToken(); ?>
	    <div class="it-form-field">
		    <label for="email">Email *</label>
		    <input type="email" name="email" id="email" size="40" maxlength="200" autocomplete="email" aria-required="true" aria-invalid="false" value="" required />
	    </div>
	    <div class="it-row-section it-col-num--2 it-responsive--predefined">
		    <div class="it-row">
			    <div class="it-column">
				    <div class="it-form-field">
					    <label for="monthly-support">Mesečna podrška *</label>
					    <select name="monthly" id="monthly-support" aria-describedby="monthly-support-desc" aria-required="true" required>
						    <option value="0">NE</option>
						    <option value="1">DA</option>
					    </select>
					    <small id="monthly-support-desc">Klikom na Da prihvatate mesečno izdvajanje dogovorenog iznosa, a klikom na Ne odbijate tu obavezu</small>
				    </div>
			    </div>
			    <div class="it-column">
				    <div class="it-form-field">
					    <label for="amount">Iznos *</label>
					    <input type="number" name="amount" id="amount" min="500" max="600000" aria-required="true" aria-describedby="amount-desc" value="" placeholder="500" required />
					    <small id="amount-desc">Iznos sa kojim sam spreman/a da pomognem u dinarima (RSD). Minimalni iznos je 500</small>
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