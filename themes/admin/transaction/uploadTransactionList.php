<?php $this->layout('layout::crudTableLayout', ['data' => $data ?? []]) ?>
<div id="mainTable">
<h1>Select excel file returned by delegate to upload</h1>

<p>&nbsp;</p>
<form id="crudForm" action="/transaction/uploadTransactionList/" enctype="multipart/form-data" method="post">
    <label for="file">Select file</label>
    <input name="file" class="input" type="file" id="file" />

    <input type="submit" value="Send" class="btn primary">
</form>
</div>