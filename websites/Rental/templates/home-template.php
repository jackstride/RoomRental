<h1> Welcome to Frans Furniture </h1>
<ul class="furniture">

<?php foreach($newsStory as $news) { 
	 ?>




    <li>

	<div class="details">
	<h2><?=$news->title?></h2>
	<h4><?=$news->description?></h4> 

	<?php
		for($i = 0; $i < 5; $i++)
		{
			if(array_key_exists($i, $news->getImages()))
			{
				if (file_exists("images/furniture/{$news->getImages()[$i]->source}")) 
				{  ?>
				<a href="images/furniture/<?= $news->getImages()[$i]->source?>"> <img src="images/furniture/<?=$news->getImages()[$i]->source?>"/></a>
				<?php }
			}
		}
	?>

	<h4><?=$news->date?></h4>
	</div>
	</li>

<?php } ?>

</ul>
