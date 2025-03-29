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
		<img src="https://s.w.org/images/core/emoji/15.0.3/svg/1f4ce.svg" alt="" style="width: 18px; height: auto; vertical-align: middle;" />
		<strong>Važna pitanja i odgovori:</strong>
		<a href="https://drive.google.com/file/d/1MEnYGGyp0wWojRV5gSPg3LC_pxBX2JLJ/view?usp=sharing">Ovde</a>
	</p>
	<p>Takođe, možete se detaljnije informisati putem naših društvenih mreža.</p>
	<p><a href="https://itsrbija.org/">IT Srbija</a> – Neformalna grupa IT Stručnjaka</p>

    <form method="post" action="donorForm" class="it-form" id="it-donatori-form" aria-label="Donatori forma" data-type="donatori">
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
					    <small id="monthly-support-desc">Klikom na Da prihvatate mesečno izdvajanje dogovorenog iznosa, a klikom na Ne odbijate tu obavezu</small>
					    <select name="monthly" id="monthly-support" aria-describedby="monthly-support-desc" aria-required="true" required>
						    <option value="0">NE</option>
						    <option value="1">DA</option>
					    </select>
				    </div>
			    </div>
			    <div class="it-column">
				    <div class="it-form-field">
					    <label for="amount">Iznos *</label>
					    <small id="amount-desc">Iznos sa kojim sam spreman/a da pomognem u dinarima (RSD). Minimalni iznos je 500</small>
					    <input type="number" name="amount" id="amount" min="500" max="600000" aria-required="true" aria-describedby="amount-desc" value="500" required />
				    </div>
			    </div>
		    </div>
	    </div>
	    <div class="it-form-field">
		    <label for="message">Komentar (opciono)</label>
		    <small id="message-desc">Unesi dodatni komentar ili sugestiju</small>
		    <textarea name="comment" id="message" cols="40" rows="6" maxlength="600" aria-describedby="message-desc"></textarea>
	    </div>
	    <button type="submit" class="it-form-button it-button it-size--normal it-layout--filled it-m">
		    <span class="it-m-text">Pošalji</span>
	    </button>
	    <div class="it-form-response" aria-hidden="true"></div>
    </form>
</main>