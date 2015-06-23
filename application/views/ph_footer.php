
</div>
<script src="../../assets/js/jquery.js"></script>
<script src="../../assets/js/jquery-ui/jquery-ui.min.js"></script>
<script>
$(function() {
	$(".add").on("click", function() {
		
		$('#new_member').dialog({

			resizable: false,
			height: 200,
			modal: true,
			buttons: {
				"Add Member": function() {
					$(this).dialog().find('form').submit();
				}
			},
			dialogClass: 'no-close success-dialog'

		});



	});

	$('.success').delay(1000).fadeOut(1000);
});
</script>
</body>
</html>