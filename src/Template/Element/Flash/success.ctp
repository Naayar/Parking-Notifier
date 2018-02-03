<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="message success" style="text-align: center;" onclick="this.classList.add('hidden')"><?= $message ?></div>
