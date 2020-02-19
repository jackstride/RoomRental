<?php
if (!empty($errors)) : ?>
    <div class="errors">
    <p>Whoops! Something went wrong.. Please check the following errors:</p>
    <ul> 
    <?php
        foreach ($errors as $error) : ?>
        <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
    </div>
    <?php endif; ?>