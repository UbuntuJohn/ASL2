



		
			<tr>
			<td>{lastName}, {firstName}</td>
			<td>{employeeId}</td>
			<td>N/A</td>
			<td>N/A</td>
			<td>N/A</td>
			<td><?php echo "<a href='profile/{employeeId}'><img src='../../assets/images/gears.png' /></a></td>"; ?>
			</tr>		
 		
	</tbody>
</table>
<div id="new_member">

<form action="../teammember/add" method="POST">
<strong>Employee ID:</strong> <br /><input type="text" name="employeeId" size="10" placeholder="123456789" required /><br /><br />
<input type="hidden" name="managerId" value="{employeeId}" size="30" required />
</form>

</div>
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