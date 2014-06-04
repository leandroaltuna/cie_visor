<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'class' => 'span3',
);
if ($login_by_username AND $login_by_email) {
	$login_label = 'Email or username';
} else if ($login_by_username) {
	$login_label = 'Usuario';
} else {
	$login_label = 'Email';
}
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'class' => 'span3',
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	//'style' => 'margin:0;padding:0',
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
	'class' => 'span3',
);
?>

<?php 
$attr = array('class' => 'well form-vertical form-val','id' => 'form_container');
echo form_open($this->uri->uri_string(),$attr); 

		echo '<div class="control-group">'; 
		 echo form_label($login_label, $login['id']); 
		  echo '<div class="controls">';
		   echo form_input($login); ?>
		<?php echo form_error($login['name']); ?>
		<div class="help-block error">
		<?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?>
			</div>
		<?php 
			echo '</div>'; 
			echo '</div>';
		

		echo '<div class="control-group">'; 
		 echo form_label('Contraseña', $password['id']); 
		  echo '<div class="controls">';
		 echo form_password($password); ?>
		<?php echo form_error($password['name']); ?>
		<div class="help-block error">
		<?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?>
		</div>
		<?php 
			echo '</div>'; 
			echo '</div>'; 
		?>

	<?php if ($show_captcha) {
		if ($use_recaptcha) { ?>
			<div id="recaptcha_widget">
			<div id="recaptcha_image"></div>
			<a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
			<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
			<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>

			<div class="recaptcha_only_if_image">Enter the words above</div>
			<div class="recaptcha_only_if_audio">Enter the numbers you hear</div>

		<input type="text" id="recaptcha_response_field" name="recaptcha_response_field" style="width:98%" />
		<?php echo form_error('recaptcha_response_field'); ?>
		
		<?php echo $recaptcha_html; ?>
		</div>	
	<?php } else { ?>

			<p>Enter the code exactly as it appears:</p>
			<?php echo $captcha_html; ?>

		<?php echo form_label('Confirmation Code', $captcha['id']); ?>
		<?php echo form_input($captcha); ?>
		<?php echo form_error($captcha['name']); ?>

	<?php }
	} ?>



			<p class="pull-right">			
			</p>

	<?php echo form_submit('submit', 'Ingresar','class="btn btn-inverse"'); ?>

<?php 
echo form_close(); 
?>


