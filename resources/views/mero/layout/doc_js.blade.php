
<script>
	window.config = [];
</script>

<script type="text/javascript">
	if (localStorage.getItem('larecipeSidebar') == null) {
		localStorage.setItem('larecipeSidebar', !!0);
	}
</script>

<script src="/vendor/binarytorch/larecipe/assets/js/app.js"></script>

<script>
	window.LaRecipe = new CreateLarecipe(config)
</script>

<!-- Google Analytics -->
<!-- /Google Analytics -->


<script>
	LaRecipe.run()
</script>

