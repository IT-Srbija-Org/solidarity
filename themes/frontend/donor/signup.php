<main class="it-grid">
    <h2>Obrazac za donatore</h2>

    <form method="post" id="it-donator-form" class="it-form" aria-label="Donator forma">
        <div class="it-form-field">
            <label for="email">Email *</label>
            <input type="email" name="email" id="email" size="40" maxlength="200" autocomplete="email" aria-required="true" aria-invalid="false" value="" required />
        </div>
        <div class="it-row-section it-col-num--2 it-responsive--predefined">
            <div class="it-row">
                <div class="it-column">
                    <div class="it-form-field">
                        <label for="mesecna-podrska">Mesečna podrška *</label>
                        <small id="mesecna-podrska-desc">Klikom na Da prihvatate mesečno izdvajanje dogovorenog iznosa, a klikom na Ne odbijate tu obavezu</small>
                        <select name="mesecna-podrska" id="mesecna-podrska" aria-describedby="mesecna-podrska-desc" aria-required="true" required>
                            <option value="NE">NE</option>
                            <option value="DA">DA</option>
                        </select>
                    </div>
                </div>
                <div class="it-column">
                    <div class="it-form-field">
                        <label for="iznos">Iznos *</label>
                        <small id="iznos-desc">Iznos sa kojim sam spreman/a da pomognem u dinarima (RSD). Minimalni iznos je 500</small>
                        <input type="number" name="iznos" id="iznos" min="500" max="50000" aria-required="true" aria-describedby="iznos-desc" value="500" required />
                    </div>
                </div>
            </div>
        </div>
        <div class="it-form-field">
            <label for="komentar">Komentar (opciono)</label>
            <small id="komentar-desc">Unesi dodatni komentar ili sugestiju</small>
            <textarea name="komentar" id="komentar" cols="40" rows="6" maxlength="600" aria-describedby="komentar-desc"></textarea>
        </div>
        <button type="submit" class="it-form-button it-button it-size--normal it-layout--filled it-m">
            <span class="it-m-text">Pošalji</span>
        </button>
        <div class="it-form-response" aria-hidden="true"></div>
    </form>
</main>