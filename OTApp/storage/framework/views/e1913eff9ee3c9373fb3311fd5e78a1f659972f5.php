	<!--footer-->
		<div class="footer">
		   <p>All Rights Reserved &copy; <?php echo e($settings->site_name); ?> 2019</p>
		</div>
        <!--//footer-->
	</div>
	<!-- Classie -->
		<script src="<?php echo e(asset('js/classie.js')); ?>"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			

			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!--scrolling js-->
	<!--
	<script src="<?php echo e(asset('js/jquery.nicescroll.js')); ?>"></script>
	<script src="<?php echo e(asset('js/scripts.js')); ?>"></script>
	-->
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
   <script src="<?php echo e(asset('js/bootstrap.js')); ?>"> </script>
</body>
</html>