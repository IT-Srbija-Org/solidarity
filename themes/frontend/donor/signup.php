<form action="/donorForm" method="post" class="">
    <?=$this->formToken(); ?>
    <div class="uacf7-form-134  "><label>Email *</label>
        <span class="wpcf7-form-control-wrap" data-name="email">
            <input class="" value="" type="email" name="email">
        </span>
        <div class="uacf7-row">
            <div class="uacf7-col-6">
                <label>Mesečna podrška *</label>
                <small>Klikom na Da prihvatate mesečno izdvajanje dogovorenog iznosa, a klikom na Ne odbijate tu obavezu</small>
                <span class="wpcf7-form-control-wrap">
                    <select name="monthly">
                        <option value="0">NE</option>
                        <option value="1">DA</option>
                    </select>
                </span>
            </div>
            <div class="uacf7-col-6">
                <label>Iznos *</label>
                <small>Iznos sa kojim sam spreman/a da pomognem u dinarima (RSD). Minimalni iznos je 500</small>
                <input class="" value="" type="number" name="amount">
            </div>
        </div>
        <br>
        <label>Komentar (opciono)</label>
        <small>Unesi dodatni komentar ili sugestiju</small>
        <span class="wpcf7-form-control-wrap" data-name="message">
            <textarea cols="40" rows="10" maxlength="2000" class="" name="comment"></textarea>
        </span>
        <br>
        <button class="" type="submit"><span class="">Pošalji</span></button></div>
</form>