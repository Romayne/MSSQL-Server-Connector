<?php $count = 0;?>
<table class="list" border="0" cellspacing="0" cellpadding="0">
	<thead>
		<tr>
			<th width="25">&nbsp;</th>
			<th align="left">Catalog</th>
			<th width="70" align="center">Table</th>
			<th width="100" align="center">Column Name</td>
			<th width="100" align="center">Data Type</td>
			<th width="100" align="center">Is NULL</td>
		</tr>
	</thead>
	<tbody>
	<?php foreach($description as $r):?>
		<tr>
			<td align="right"><?echo ++$count;?>.</td>
			<td><?php echo $r['TABLE_CATALOG'];?></td>
			<td><?php echo $r['TABLE_NAME'];?></td>
			<td><?php echo $r['COLUMN_NAME'];?></td>
			<td><?php echo $r['DATA_TYPE'];?></td>
			<td><?php echo $r['IS_NULLABLE'];?></td>
		</tr>
	<?php endforeach;?>
	</tbody>
</table>