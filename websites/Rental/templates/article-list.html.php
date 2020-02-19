<ul>
<?php foreach ($templateVars['articles'] as $article) { ?>
<li>
 <h2><?=$article['name'];?></h2>
 <h2><?=$article['description'];?></h2>
 <h2><?=$article['price'];?></h2>
 
</li>
<?php } ?>
</ul>