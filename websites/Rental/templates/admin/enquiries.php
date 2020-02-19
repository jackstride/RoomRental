<?php
require "admin-panel.php";
?>


<section class="right">

<h2> Enquiries </h2>

<table>
<thead>
<tr>
<th>Enquiry Message</th>
<th style="width: 5%">Date</th>
<th style="width: 10%">Completed</th>
<th style="width: 5%">Respondent</th>
<th style="width: 5%">Respond</th>

</tr>

<?php foreach($enquiries as $enquiry) { ?>

<tr>



<td><?=$enquiry->message?></td>

<td><?=$enquiry->date?></td>

<td><?=$enquiry->completed?></td>

<td><?=$enquiry->respondent?></td>


<td><a style="float: right" href="enquiry-respond?id=<?=$enquiry->id?>"> Edit </a></td>

</tr>
<?php } ?>

</thead>
</table>


</section>