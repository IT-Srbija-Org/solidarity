<p>Dear <?=htmlentities($data['displayName'] ?? '')?>,</p>
<p>Someone has initiated the password recovery process for your email address at Mreža solidarnosti.
    If this wasn't you, please contact us.
</p>
<p>
    Otherwise, click on the link below to start the recovery process.
    We'll send you a link to reset your password. Please note that the link is valid for only 24 hours.
</p>
<a href="<?=$data['resetUrl'] ?? ''?>"><?=$data['resetUrl'] ?? ''?></a>
