<footer>
		<!--
			Links to W3C HTML5 & CSS Validation and your Course Homepage

			Extremely genius design by me! :)

			This code gets the URL of the page through PHP.
			And by getting the URL of the page, it will place the URL inside the validation links.
			By doing this, the validation links will always validate the page you are currently visiting.
			So, just copy and paste this everywhere using the include(); function and you've got validation links for every page!
			No need to manually create those links yourself!
		--> 
        <?php
            $url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        ?>

		<p class="validation">  
		<a href="http://validator.w3.org/check?uri=<?php echo $url?>" title="HTML5 Validation - W3C">HTML5 Validation</a> | 
		<a href="https://jigsaw.w3.org/css-validator/validator?uri=http://basicn587.macombserver.net/itwp2750/project-3/styles.css"> CSS Validation</a> | 
		<a href="../home.htm" title="Course Homepage">Course Homepage</a>
		</p>  
</footer>