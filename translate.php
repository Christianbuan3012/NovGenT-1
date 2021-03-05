<?php 
    require 'header.php';
    include 'include/connect.php'; 
    require 'include/dbHandler.php'; 
?>
<div class="mainbox">
    <div class="displaycontent">
		<h2><i>Translate the contents of this page:</i></h2>
		<div id="google_translate_element"></div>

		<script type="text/javascript">
		function googleTranslateElementInit() {
		  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
		}
		</script>

		<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

		<p>You can translate the content of this page by selecting a language in the select box.</p><br><br>
		<div class="row">
		  <div class="col-6">
		    <label style="font-size: 20px;"><b><i>Please type a word/ or sentence to translate</i></b></label><br><br>
		    <input id="main" class="form-control" placeholder="Enter some text"><br><br>
		  </div>
		  <div class="col-6">
		    <label style="font-size: 20px;"><b><i>Translation</i></b></label>
		    <div id="mirror" ></div><br><br><br>
		  </div>
		</div>
		<script type="text/javascript">
			var main = document.getElementById('main');
			var mirror = document.getElementById('mirror');

			main.addEventListener('input', function(event) {
			  mirror.innerText = event.target.value.split('').join('');
			});
		</script>
	</div>
</div>
</body>
</html>