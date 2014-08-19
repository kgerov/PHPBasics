<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>CV Generator</title>
		<style type="text/css">
			#wrapper {
				width: 560px;
				margin: 0 auto;
			}
			form {
				width: 560px;
			}
			fieldset {
				margin-bottom: 15px;
			}
			input[type=submit] {
				margin-left: 190px;
				width: 180px;
				height: 30px;
			}
			table {
				margin-bottom: 30px;
				border-collapse: collapse;
			}
			td {
				padding: 5px;
				margin-left: 20px;
			}
			tr, td {
				border: 1px solid black;
			}
			#wrapper > table tr:nth-child(1) {
				font-size: 16pt;
				font-weight: bold;
			}
			table table {
				margin-bottom: 0;
				padding: 0;
			}
		</style>
	</head>
	<body onload="loadCache();">
		<script src="scripts/addAndRemove.js"></script>
		<div id="wrapper">
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="cvForm">
			<fieldset>
				<legend>Personal Infromation</legend>
				<input type="text" name="firstname" placeholder="First Name" value="<?php echo isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>"><br>
				<input type="text" name="lastname" placeholder="Last Name" value="<?php echo isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>"><br>
				<input type="email" name="email" placeholder="Email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>"><br>
				<input type="tel" name="tel" placeholder="Phone Number" value="<?php echo isset($_POST['tel']) ? $_POST['tel'] : '' ?>"><br>
				Male<input type="radio" name="sex" value="male" <?php if(isset($_POST['sex']) && $_POST['sex'] == "male") {echo 'checked="checked"';} ?>>
				Female<input type="radio" name="sex" value="female" <?php if(isset($_POST['sex']) && $_POST['sex'] == "female") {echo 'checked="checked"';} ?>><br>
				<label>Birthday</label><br> 
				<input type="date" name="bday" value="<?php echo isset($_POST['bday']) ? $_POST['bday'] : '' ?>"><br>
				<label>Nationality</label><br>
				<select name="nationality">
					<option value="bulgarian" <?php if(isset($_POST['nationality']) && $_POST['nationality'] == "bulgarian") {echo 'selected="selected"';} ?>>Bulgarian</option>
					<option value="american" <?php if(isset($_POST['nationality']) && $_POST['nationality'] == "american") {echo 'selected="selected"';} ?>>American</option>
					<option value="pernichanin" <?php if(isset($_POST['nationality']) && $_POST['nationality'] == "pernichanin") {echo 'selected="selected"';} ?>>Pernichanin</option>
					<option value="french" <?php if(isset($_POST['nationality']) && $_POST['nationality'] == "french") {echo 'selected="selected"';} ?>>French</option>
				</select>
			</fieldset>
			<fieldset>
				<legend>Last Work Position</legend>
				<label>Company Name</label>
				<input type="text" name="company" value="<?php echo isset($_POST['company']) ? $_POST['company'] : '' ?>"><br>
				<label>From</label> 
				<input type="date" name="lastWorkFrom" value="<?php echo isset($_POST['lastWorkFrom']) ? $_POST['lastWorkFrom'] : '' ?>"><br>
				<label>To</label> 
				<input type="date" name="lastWorkTo" value="<?php echo isset($_POST['lastWorkTo']) ? $_POST['lastWorkTo'] : '' ?>"><br>
			</fieldset>
			<fieldset>
				<legend>Computer Skills</legend>
				<label>Programming Languages</label><br>
				<div id="containerProgLang">
					<div id="boxprogLang1">
						<input type="text" name="progLang[]" value="<?php echo isset($_POST['progLang'][0]) ? $_POST['progLang'][0] : '' ?>">
						<select name="progLevel[]">
							<option value="Baluk" >Baluk</option>
							<option value="Staaa" >Staaa</option>
							<option value="Mashina" >Mashina</option>
							<option value="Nakov" >Nakov</option>
						</select><br>
					</div>
				</div>
				<button onclick="removeLang(1); return false;">Remove Language</button>
				<button onclick="addLang(1, true); return false;">Add Language</button>
			</fieldset>
			<fieldset>
				<legend>Other Skills</legend>
				<label>Languages</label><br>
				<div id="containerLang">
					<div id="boxLang1">
						<input type="text" name="lang[]">
						<select name="comprehension[]">
							<option value="no">-Comprehension-</option>
							<option value="Beginner">Beginner</option>
							<option value="Intermediate">Intermediate</option>
							<option value="Advanced">Advanced</option>
						</select>
						<select name="reading[]">
							<option value="no">-Reading-</option>
							<option value="Beginner">Beginner</option>
							<option value="Intermediate">Intermediate</option>
							<option value="Advanced">Advanced</option>
						</select>
						<select name="writing[]">
							<option value="no">-Writing-</option>
							<option value="Beginner">Beginner</option>
							<option value="Intermediate">Intermediate</option>
							<option value="Advanced">Advanced</option>
						</select><br>
					</div>
				</div>
				<button onclick="removeLang(2); return false;">Remove Language</button>
				<button onclick="addLang(2, true); return false;">Add Language</button><br>
				<label>Driver's License</label><br>
				B <input type="checkbox" name="driver[]" value="B" <?php if(isset($_POST['driver']) && in_array("B", $_POST['driver'])) {echo 'checked="checked"';} ?>>
				A <input type="checkbox" name="driver[]" value="A" <?php if(isset($_POST['driver']) && in_array("A", $_POST['driver'])) {echo 'checked="checked"';} ?>>
				C <input type="checkbox" name="driver[]" value="C" <?php if(isset($_POST['driver']) && in_array("C", $_POST['driver'])) {echo 'checked="checked"';} ?>><br>
			</fieldset>
			<input type="submit" name="submit" value="Generate CV">
			</form>

			<?php
				function validateName($toMatch) {
					$pattern = "/^[a-zA-Z]+$/";
					if (!preg_match($pattern, $toMatch)) {
						return false;
					}
					if (strlen($toMatch) > 20 || strlen($toMatch) < 2) {
						return false;
					}
					return true;
				}
				function validateCompany($toMatch) {
					$pattern = "/^[a-zA-Z0-9]+$/";
					if (!preg_match($pattern, $toMatch)) {
						return false;
					}
					if (strlen($toMatch) > 20 || strlen($toMatch) < 2) {
						return false;
					}
					return true;
				}
				function validatePhone($toMatch) {
					$pattern = "/^[+]?[0-9-]+$/";
					if (!preg_match($pattern, $toMatch)) {
						return false;
					}
					return true;
				}	
				function validateEmail($toMatch) {
					$pattern = "/^[0-9A-Za-z]+[@]{1}[0-9A-Za-z]+[.]{1}[a-z]+$/";
					if (!preg_match($pattern, $toMatch)) {
						return false;
					}
					return true;
				}

				function checkSelectedLevel() {
					foreach ($_POST['comprehension'] as $key => $value) {
						if ($value == "no") {
							return false;
						}
					}

					foreach ($_POST['reading'] as $key => $value) {
						if ($value == "no") {
							return false;
						}
					}

					foreach ($_POST['writing'] as $key => $value) {
						if ($value == "no") {
							return false;
						}
					}

					return true;
				}

				//session_start();

				if (isset($_POST['submit'])) {
					$error = false;
					$errorM = "";
					if (empty($_POST['firstname'])) {
						$error = true;
						$errorM .= "<p>Firstname Missing</p>";
					} else {
						$firstname = $_POST['firstname'];
						if (!validateName($firstname)) {
							$error = true;
							$errorM .= "<p>Invalid Firstname</p>";
						}
					}

					if (empty($_POST['lastname'])) {
						$error = true;
						$errorM .= "<p>Lastname Missing</p>";
					} else {
						$lastname = $_POST['lastname'];
						if (!validateName($lastname)) {
							$error = true;
							$errorM .= "<p>Invalid Lastname</p>";
						}
					}

					if (empty($_POST['email'])) {
						$error = true;
						$errorM .= "<p>Email Missing</p>";
					} else {
						$email = $_POST['email'];
						if (!validateEmail($email)) {
							$error = true;
							$errorM .= "<p>Invalid Email</p>";
						}
					}

					if (empty($_POST['tel'])) {
						$error = true;
						$errorM .= "<p>Telephone Missing</p>";
					} else {
						$tel = $_POST['tel'];
						if (!validatePhone($tel)) {
							$error = true;
							$errorM .= "<p>Invalid Telephone</p>";
						}
					}

					if (!isset($_POST['sex'])) {
						$error = true;
						$errorM .= "<p>No sex selected</p>";
					} else {
						$sex = $_POST['sex'];
					}

					if (!isset($_POST['bday'])) {
						$error = true;
						$errorM .= "<p>No Birthday Date</p>";
					} else {
						$bday = $_POST['bday'];
					}

					if (!isset($_POST['nationality'])) {
						$error = true;
						$errorM .= "<p>No Nationality selected</p>";
					} else {
						$nationality = $_POST['nationality'];
					}
					//----------------------------------------------------------
					if (empty($_POST['company'])) {
						$error = true;
						$errorM .= "<p>Company Missing</p>";
					} else {
						$company = $_POST['company'];
						if (!validateCompany($company)) {
							$error = true;
							$errorM .= "<p>Invalid Company</p>";
						}
					}

					if (!isset($_POST['lastWorkFrom'])) {
						$error = true;
						$errorM .= "<p>No Last work position start date</p>";
					} else {
						$lastWorkFrom = $_POST['lastWorkFrom'];
					}

					if (!isset($_POST['lastWorkTo'])) {
						$error = true;
						$errorM .= "<p>No Last work position end date</p>";
					} else {
						$lastWorkTo = $_POST['lastWorkTo'];
					}

					//-----------------------------------------------------------------

					if (empty($_POST['progLang']) || $_POST['progLang'][0] == "") { //FIX
						$error = true;
						$errorM .= "<p>No programming languages selected</p>";
					} else {
						$progLang = array();
						for ($i=0; $i < count($_POST['progLang']); $i++) { 
							$progLang[$_POST['progLang'][$i]] = $_POST['progLevel'][$i];
						}
					}

					//-----------------------------------------------------------------

					if (empty($_POST['lang']) || $_POST['lang'][0] == "") { //FIX
						$error = true;
						$errorM .= "<p>No languages selected</p>";
					} else {
						if (!checkSelectedLevel()) {
							$error = true;
							$errorM .= "<p>Language level missing</p>";
						} else {
							foreach ($_POST['lang'] as $key => $value) {
								if (!validateName($value)) {
									$error = true;
									$errorM .= "<p>Invalid Language</p>";
								}
							}
							if(!$error) {
								$lang = array();
								for ($i=0; $i < count($_POST['lang']); $i++) { 
									$lang[$_POST['lang'][$i]] = array();

									$lang[$_POST['lang'][$i]][0] = $_POST['comprehension'][$i];
									$lang[$_POST['lang'][$i]][1] = $_POST['reading'][$i];
									$lang[$_POST['lang'][$i]][2] = $_POST['writing'][$i];
								}
							}
						}
					}

					if (isset($_POST['driver'])) {
						$driver = $_POST['driver'];
					}

					if ($error) {
						echo "$errorM";
					} else {
						?>
						<script>document.getElementById('cvForm').style.display = "none";</script>
						<h1>CV</h1>
						<table>
							<tr>
								<td colspan="2">Personal Information</td>
							</tr>
							<tr>
								<td>First Name</td>
								<td><?php echo $firstname; ?></td>
							</tr>
							<tr>
								<td>Last Name</td>
								<td><?php echo $lastname; ?></td>
							</tr>
							<tr>
								<td>Email</td>
								<td><?php echo $email; ?></td>
							</tr>
							<tr>
								<td>Phone Number</td>
								<td><?php echo $tel; ?></td>
							</tr>
							<tr>
								<td>Gender</td>
								<td><?php echo $sex; ?></td>
							</tr>
							<tr>
								<td>Birth Date</td>
								<td><?php echo $bday; ?></td>
							</tr>
							<tr>
								<td>Nationality</td>
								<td><?php echo $nationality; ?></td>
							</tr>
						</table>

						<table>
							<tr>
								<td colspan="2">Last Work Position</td>
							</tr>
							<tr>
								<td>Company Name</td>
								<td><?php echo $company; ?></td>
							</tr>
							<tr>
								<td>From</td>
								<td><?php echo $lastWorkFrom; ?></td>
							</tr>
							<tr>
								<td>To</td>
								<td><?php echo $lastWorkTo; ?></td>
							</tr>
						</table>

						<table>
							<tr>
								<td colspan="2">Computer Skills</td>
							</tr>
							<tr>
								<td>Programming Language</td>
								<td>
									<table>
										<tr>
											<td>Language</td>
											<td>Skill</td>
										</tr>
										<?php 
											foreach ($progLang as $key => $value) {
												?>
												<tr>
													<td><?php echo $key; ?></td>
													<td><?php echo $value; ?></td>
												</tr>
												<?php
											}
										?>
									</table>
								</td>
							</tr>
						</table>
						<table>
							<tr>
								<td colspan="2">Other Skills</td>
							</tr>
							<tr>
								<td>Languages</td>
								<td>
									<table>
										<tr>
											<td>Language</td>
											<td>Comprehension</td>
											<td>Reading</td>
											<td>Writing</td>
										</tr>
										<?php 
											foreach ($lang as $key => $value) {
												?><tr><td><?php echo $key; ?></td><?php
												foreach ($value as $key => $value) {
													?>
														<td><?php echo $value; ?></td>
													<?php
												}
												?></tr><?php
											}
										?>
									</table>
								</td>
							</tr>
							<tr>
								<td>Driver's License</td>
								<td>
									<?php
										if (isset($driver)) {
											for ($i=0; $i < count($driver); $i++) { 
												if ($i != 0) {
													echo ", ";
												}
												echo $driver[$i];
											}
										}
									?>
								</td>
							</tr>
						</table>
						<?php

					}
				}
			?>
			<script language="JavaScript">
				window.onbeforeunload = <?php session_unset(); ?>;
			</script>
		</div>
	</body>
</html>