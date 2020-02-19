<section class="left">
		<ul>
			<?php 
			foreach($categories as $category){?>
			<li><a href="furniture?id=<?=$category->id?>"><?=$category->name?></a></li>
			<?php } ?>
			
		</ul>
	</section>

	

	<section class="right">

	<div class="sort">
		<form method="post">
			<select name="sort">
			<option value="new">New</option>
			<option value="used">Second-Hand</option>
			</select>
			<input type="submit" name="submit" value="filter" />
		</form>
	</div>
	

		<h1>Furniture</h1>
		

	<ul class="furniture">
	
				
<?php

	foreach ($furnitures as $furniture) {
		if($furniture->hide === 'show') { ?>

	<li>

	<div class="details">
		<h2><?=$furniture->name?></h2>
		<h3><?= $furniture->getCatgeoryName()->name ?></h3>
		<h4>£<?=$furniture->price?></h4>
		<p> <?=$furniture->description?></p>
		<p> <?=$furniture->quality?></p>

		<?php

		for($i = 0; $i < 5; $i++)
		{
			if(array_key_exists($i, $furniture->getImages()))
			{
				if (file_exists("images/furniture/{$furniture->getImages()[$i]->source}")) 
				{  ?>
				<a href="images/furniture/<?= $furniture->getImages()[$i]->source?>"> <img src="images/furniture/<?=$furniture->getImages()[$i]->source?>"/></a>

			<?php }
			}
		}

		?>

	</div>
	
	</li>

<?php } }  ?>



</ul>

</section>


