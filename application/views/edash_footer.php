</div>
<script src="../../assets/js/jquery.js"></script>
<script src="../../assets/js/jquery-ui/jquery-ui.min.js"></script>
<script>
$('.header').click(function(){
   $(this).find('span').text(function(_, value){return value=='-'?'+':'-'});
    $(this).nextUntil('tr.header').slideToggle(100, function(){
    });
});
</script>
</body>
</html>