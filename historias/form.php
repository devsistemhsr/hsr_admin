<form action="historia.php" method="get">
	<strong>Factura: </strong><em><small>(Sin SR)</small></em>
	<input type="text" name="FAC" required>
	<input type="submit" name="ok" value="cargar">
	<hr>
	<?php
		$ITEM=array("factura","admision","epicrisis");
		foreach($ITEM as $OPTION)
		{
			echo '<input type="checkbox" name="PDF[]" value="'.$OPTION.'"> '.$OPTION.'<br>';
		}
	?>
</form>
<?php
	
?>