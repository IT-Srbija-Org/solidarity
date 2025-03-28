<?php $this->layout('layout::standard') ?>
<main class="it-grid">
    <h2>Obrazac za donatore</h2>

    <form method="post" action="donorForm" id="it-donatori-form" aria-label="Donatori forma" data-type="donatori">
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