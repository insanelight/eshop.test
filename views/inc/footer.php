<footer>footer</footer>
<script>
	$(document).ready(function(){
		$(".add-to-cart").click(function(){
			let id = $(this).attr("data-id");
			$.post("/cart/addAjax/"+id,{},function(data){
				$("#cart-count").html(data);
			});
			return false;
		})
	});
</script>
</body>
</html>