
<?php if (isset($error[$label])) :?>
<?php foreach ($error[$label] as $error): ?>
    <p class="error"><b><?=$error?></b></p>
<?php endforeach; ?>
<?php endif; ?>