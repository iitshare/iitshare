<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
	<div class="form">
		<input name="s" type="text" id="s" onblur="if (this.value =='') this.value='Search Blog...'" onfocus="this.value=''" onclick="if (this.value=='Search Blog...') this.value=''" value="Search Blog..." class="inputbox" />
		<span>
		<input type="submit" name="button" id="button" value="" class="go" />
		</span>
	</div>
</form>