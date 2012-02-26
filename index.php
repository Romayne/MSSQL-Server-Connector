<?php
	include("application/configs/application.php");
	
	$rows = $data->showTables();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<title>Database Tables</title>
	<link rel="stylesheet" type="text/css" href="public/css/default.css">
	<link rel="stylesheet" type="text/css" href="public/css/default_headings.css">
</head>

<body>
	<div id="content_left">
		<div class="text">
			<?php if ($rows != NULL):?>
				<p>
					Result returned <?php echo count($rows);?> record(s).
				</p>	
				<?php foreach($rows as $r):?>
					<h3>
						<?php echo $r['table_name'];?>
					</h3>
					<?php
					$description = $data->describeTable($r['table_name']);
					include("application/views/templates/describe_table.tpl.php");
				endforeach;
			else:?>
				<p>
					Result returned 0 records.
				</p>
			<?php endif;?>
		</div>
	</div>
</body>
</html>