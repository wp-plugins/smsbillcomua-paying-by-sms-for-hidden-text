<?php
/*
Plugin Name: SmsBill.com.ua Service
Plugin URI: http://smsbill.com.ua/
Description: (RUS) Данный плагин позволяет скрыть выбранный текст, пока пльзователь не оплатит право на просмотр с помощью SMS. Вместо текста обрамленного тегами [smsbill_pass] [/smsbill_pass] будет выведена платежная форма c инструкцией.
(ENG) This plugin provides possibility to hide selected text untill user pay by SMS. Instead of text there will be shown a pay form with instructions.
Version: 1.0
Author:  SMS Billing Ukrane / СМС Биллинг Украина
Author URI: http://smsbill.com.ua
*/

require_once ('SMSBill.class.php');

$locale = get_locale();
if(!empty($locale)) {
	$file = dirname(__FILE__) . "/lang/smsbill_getpass-" . $locale . ".mo";
	if(file_exists($file)) load_textdomain('smsbill_getpass', $file);
}

if (!class_exists('smsbill_getpass')) {

	class smsbill_getpass {
		
		var $options = "smsbill_getpass";
		var $tag_start = "smsbill_pass";
		var $tag_end = "smsbill_pass";
		var $service_id = "";
		var $char_set = "";
		var $link_to_css = "";

	function smsbill_getpass() {
		$this->service_id = get_option($this->options.'_service_id');
		$this->char_set = get_option($this->options.'_char_set');
		$this->link_to_css = get_option($this->options.'_link_to_css');
		add_action('admin_menu', array(&$this,'smsbill_getpass_config'));
		add_filter('the_content', array(&$this,'hidden_content'));
	}
		
	function hidden_content($content) {
		//$content = get_the_content();
		if (preg_match('/\\['.$this->tag_start.'\\](.*?)\\[\\/'.$this->tag_end.'\\]/is', $content, $result)) {			
			//начало скрипта услуги 
			$smsbill = new SMSBill();
			$smsbill->setServiceId($this->service_id);
			$smsbill->useEncoding($this->char_set);
			$smsbill->useHeader('no');
			$smsbill->useCss($this->link_to_css);
			if (isset($_REQUEST['smsbill_password'])) {
				if (!$smsbill->checkPassword($_REQUEST['smsbill_password'])) { 
					//пароль не верный 
					$hidden = '<br><b style="color:red">This is a wrong password. Please, come back and try once more.</b></br>';
					} else { 
						//пароль верный
						$hidden = $result[1];
					}
			} else {
				//показать форму т.к. пароль не введен
				$hidden = $smsbill->getForm();
			}
		$content = preg_replace('/\\['.$this->tag_start.'\\].*?\\[\\/'.$this->tag_end.'\\]/is', $hidden, $content);
		}
		return $content;
	}


	function smsbill_getpass_config() {
	global $wpdb;
	if (function_exists('add_submenu_page') ) {
		if (function_exists('add_options_page')) {
			add_options_page(__('SmsBill Services','smsbill_getpass'), __('SmsBill Services','smsbill_getpass'), 'administrator', basename(__FILE__), array(&$this,'config_page'));
			} else {
				add_menu_page(__($this->options), __('SmsBill Services', 'smsbill_getpass'), 1, __FILE__, array(&$this,'config_page'));
			}
		}
	}

	function config_page() {
		if (isset($_POST['submit']) ) {
			$char =  $_POST['char_set'];
			$service =  intval($_POST['service_id']);
			$css = $_POST['link_to_css'];
			check_admin_referer();
				if (($css) === "") {
					update_option($this->options.'_link_to_css', 'http://form.smsbill.com.ua//serviceform/getpassword/popup_v2.css');
				}
				if (($char) === "") {
					update_option($this->options.'_char_set', 'utf-8');
				}
			
			update_option($this->options.'_service_id', $service);
			update_option($this->options.'_char_set', $char);
			update_option($this->options.'_link_to_css', $css);
			$this->service_id = get_option($this->options.'_service_id');
			$this->char_set = get_option($this->options.'_char_set');
			$this->link_to_css = get_option($this->options.'_link_to_css');
		} ?>
	<div class="wrap">
		<fieldset class="options">
		<?php echo __('<legend><h2>SmsBill services settings - "Get Password" or "Time started"</h2></legend>
		<p>To use this plug-in you need to <a href="http://partner.smsbill.com.ua/?m=registration" target = "_blank"><b>register</b></a> in "Sms Billing Ukraine" system.</p>
		<p>You can get an additional info about <a href="http://smsbill.com.ua/sms-parol" target = "_blank" >"Get Password"</a> service and <a href="http://smsbill.com.ua/sms-parol" target = "_blank" >"Time started"</a></p>
		<p><b>Instruction</b><br>To hide text you should place it between two special tags like this: [smsbill_pass] hidden text [/smsbill_pass].</p>
		<p>Until user pays by sms for access he doesn\'t see your hidden text. He should select his country and operator to get text sms. After he get it he should send it by sms and get password in forwarded message. This password he should input into field.</p><p><p><hr /></p>', 'smsbill_getpass');?>
			<form method="post" id="<?php echo $this->options; ?>-conf" style="text-align: left ; margin: left; width: 50em;">
			<p>
			<?php echo __('Enter service ID:', 'smsbill_getpass');?>
			</p>
			<p>
			<input type="text" id="service_id" name="service_id" size="12" maxlength="15" style="font-family: 'Courier New', monospace; font-size: 1.5em;" value="<?php echo stripslashes($this->service_id); ?>" />
			<p>
			<?php echo __('Enter charset for your site (default UTF-8):', 'smsbill_getpass');?>
			</p>
			<p>
			<input type="text" id="char_set" name="char_set" size="12" style="font-family: 'Courier New', monospace; font-size: 1.5em;" <?php echo ($this->char_set == "" ? ' value="UTF-8" ' : ' value="'.stripslashes($this->char_set).'" ')?>  />
			<p>
			<?php echo __('If you want enter link to your css file (otherwise will be used css by default):', 'smsbill_getpass');?>
			</p>
			<p>
			<input type="text" id="link_to_css" name="link_to_css" size="50" style="font-family: 'Courier New', monospace; font-size: 1.5em;" <?php echo ($this->link_to_css == "" ? 'value="http://form.smsbill.com.ua//serviceform/getpassword/popup_v2.css"' : ' value="'.stripslashes($this->link_to_css).'" ')?>  />
			<p class="submit">
			<input type="submit" name="submit" value="<?php echo __('Save settings', 'smsbill_getpass');?>" />
			</p>
			</form>
			</fieldset>
		</div>

	<?php
		}
	}
  
} 

if (class_exists('smsbill_getpass')) {
$smsbill_getpass = new smsbill_getpass();
}



?>
