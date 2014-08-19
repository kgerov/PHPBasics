<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>HTML Tags Counter</title>
		<style type="text/css">
			body {margin: 0; padding: 0;}

			html  {
				background-color: #0A4958;
				color: white;
			}
			#wrapper {
				width: 760px;
				margin: 0 auto;
				background-color: #01B6AD;
				padding: 150px;
				padding-top: 10px;
				border-bottom-left-radius: 10px;
				border-bottom-right-radius: 10px;
			}
			h1 {
				font-family: Arial;
				text-align: center;
				margin-bottom: 50px;
			}
			p {
				text-align: center;
				font-size: 14pt;
				font-weight: bold;
				font-family: Tahoma;
			}
			input[type=submit] {
				background: none;
				border: none;
				border: 2px solid #F6E7D2;
				padding: 8px 18px;
				color: white;
				font-size: 14pt;
			}
			input[type=submit]:hover{
				background: #F6E7D2;
				color: #01B6AD;
			}
			label {
				font-size: 16pt;
				font-size: Arial;
			}
			form {
				width: 550px;
				margin: 0 auto;
			}
			input[type=text] {
				width: 220px;
				height: 30px;
				font-size: 16pt;
				color: #0A4958;
				background: none;
				border: none;
				border: 2px solid #0A4958;
				outline: none;
				margin: 0 10px;
				margin-bottom: 20px;
				text-indent: 10px;
			}
			#wrapper > form:nth-child(3) > input[type="submit"] {
				width: 180px;
				margin-left: 190px;
			}
		</style>
	</head>
	<body>
		<div id="wrapper">
			<h1>HTML 5 Tag Game</h1>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				<label for="tag">Enter HTML Tags</label>
				<input type="text" name="tag" id="tag" autofocus="autofocus"/>
				<input type="submit" value="Tag it!" name="submit" />
			</form>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				<input type="submit" value="Restart Game" name="restart"/>
			</form>
		<?php 
			session_start();

			if (isset($_POST['restart'])) {
				session_unset();			
			}

			if (!isset($_SESSION['counter'])) {
			    $_SESSION['counter'] = 0;
				$_SESSION['tags'] = ["!DOCTYPE","a","abbr","acronym","address","applet","area","article","aside","audio","b","base","basefont","bdi","bdo","big","blockquote","body","br","button","canvas","caption","center","cite","code","col","colgroup","datalist","dd","del","details","dfn","dialog","dir","div","dl","dt","em","embed","fieldset","figcaption","figure","font","footer","form","frame","frameset","h1 to &lt;h6&gt;","head","header","hr","html","i","iframe","img","input","ins","kbd","keygen","label","legend","li","link","main","map","mark","menu","menuitem","meta","meter","nav","noframes","noscript","object","ol","optgroup","option","output","p","param","pre","progress","q","rp","rt","ruby","s","samp","script","section","select","small","source","span","strike","strong","style","sub","summary","sup","table","tbody","td","textarea","tfoot","th","thead","time","title","tr","track","tt","u","ul","var","video","wbr"];
				$_SESSION['gTags'] = array();
			} 

			if (isset($_POST['submit'])) {
				if (!empty($_POST['tag'])) {
					$flag = true;
					foreach ($_SESSION['tags'] as $key => $value) {
						if ($_POST['tag'] == $value) {
							$_SESSION['gTags'][] = $_SESSION['tags'][$key];
							unset($_SESSION['tags'][$key]);
							?><p>Valid HTML Tag!</p><?php
							$_SESSION['counter'] ++;
							$flag = false;
						}
					}

					if ($flag) {
						if (in_array($_POST['tag'], $_SESSION['gTags'])) {
							?><p>HTML Tag ALREADY INSERTED!</p><?php	
						} else {
							?><p>Invalid HTML Tag!</p><?php							
						}
					}
					
				} else {
					?><p>No input</p><?php
				}
			}

			if ($_SESSION['counter'] == 117) {
				?><script>alert('You WIN!');</script><?php
				session_unset();
			}

			?><p><?php echo "Number of tags Guessed: " . $_SESSION['counter'] . "/117";?></p><?php
		?>
		</div>
	</body>
</html>