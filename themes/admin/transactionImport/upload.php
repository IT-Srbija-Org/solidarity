<?php $this->layout('layout::crudTableLayout', ['data' => $data ?? []]) ?>
<div id="mainTable">
<h1>Select excel file with list of transactions to validate</h1>

<p>&nbsp;</p>
<form id="crudForm" action="/transactionImport/import/" enctype="multipart/form-data" method="post">
    <label for="file">Select file</label>
    <input name="file" class="input" type="file" id="file" />

    <input type="submit" value="Send" class="btn primary">
</form>
</div>