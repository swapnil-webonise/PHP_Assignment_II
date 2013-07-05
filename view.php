<body>
	<h3>Registration Form</h3>
	<form action="<?php echo $_SERVER['PHP_SELF'];?>" name="myform" method="post">
		<table>
			<tr>
				<td><label>First Name:</label></td>
				<td>
					<input type="text" name="txtFname" value="<?php if(isset($_GET['txtFname']))  echo $_GET['txtFname'];?>">
					<span class="notification">*</span>
				</td>
			</tr>
			<tr>
				<td><label>Last Name:</label></td>
				<td>
					<input type="text" name="txtLname" value="<?php if(isset($_GET['txtLname']))  echo $_GET['txtLname'];?>">
					<span class="notification">*</span>
				</td>
			</tr>
			<tr>
				<td><label>Password:</label></td>
				<td>
					<input type="password" name="txtPassword" value="<?php if(isset($_GET['txtPassword']))  echo $_GET['txtPassword'];?>">
					<span class="notification">*</span>
				</td>
			</tr>
			<tr>
				<td><label>Address:</label></td>
				<td>
					<textarea name="txtAddrs" rows="3" cols="25"><?php if(isset($_GET['txtAddrs']))  echo $_GET['txtAddrs'];?></textarea>
					<span class="notification">*</span>
				</td>
			</tr>
			<tr>
				<td><label>Email ID:</label></td>
				<td>
					<input type="text" name="txtEmailId" value="<?php if(isset($_GET['txtEmailId']))  echo $_GET['txtEmailId'];?>">
					<span class="notification">*</span>
				</td>
			</tr>
			<tr>
				<td><label>Country:</label></td>
				<td>
					<select name="comboCountry">
						<option>Select</option>  
						<?php
							foreach ($countries as $value) {
								if($value==$_GET['comboCountry'])
									echo '<option value="'.$value.'" selected>'.$value.'</option>';		
								else
									echo '<option value="'.$value.'" >'.$value.'</option>';		
					    	}
						?>
					</select>
					<span class="notification">*</span>
				</td>
			</tr>
			<tr>
				<td><label>Zip code:</label></td> 
				<td>
					<input type="text" name="txtZipCode" value="<?php if(isset($_GET['txtZipCode']))  echo $_GET['txtZipCode'];?>">
					<span class="notification">*</span>
				</td>
			</tr>
			<tr>
				<td><label>Gender:</label></td> 
				<td>
					<input type="radio" value="Male" name="gender" <?php if($_GET['gender']=='Male') echo 'checked="checked"'; ?>>Male&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="radio" value="Female" name="gender" <?php if($_GET['gender']=='Female') echo 'checked="checked"';?>>Female
					<span class="notification">*</span>
				</td>
			</tr>
			<tr>
				<td><label>Hobbies:</label></td>
				<td>
					<?php
						foreach ($hobbies as $value1) {  
							if(in_array($value1, $abc))
								echo '<input type="checkbox" value="'.$value1.'" name="chkHobbies[]" checked>&nbsp;'.$value1;
							else
								echo '<input type="checkbox" value="'.$value1.'" name="chkHobbies[]">&nbsp;'.$value1;			
				    	}
					?>
				</td> 
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="Submit"></td>
			</tr>
		</table>					
		<small><span class="notification">*</span> Required field.</small>
	</form>
</body>

