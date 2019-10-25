
		<!-- jQuery -->
		<script src="js/jquery.js"></script>
		<!-- Bootstrap -->
		<script src="js/bootstrap.js"></script>
		<!-- Custom Theme Scripts -->
		<script src="js/custom.js"></script>
		<script type="text/javascript">
			
			<?php
		$U=explode('/', $_SERVER['PHP_SELF']);
		$R=explode(".", $U[count($U)-1]);
		$L="proc/".strtolower($R[0])."_process.php?jsoncallback=?";
	?>
		</script>