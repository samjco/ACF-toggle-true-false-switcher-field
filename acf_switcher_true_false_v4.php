<?php

class acf_field_switcher_true_false extends acf_field
{
	
	/*
	*  __construct
	*
	*  Set name / label needed for actions / filters
	*
	*  @since	3.6
	*  @date	23/01/13
	*/
	
	function __construct()
	{
		// vars
		$this->name = 'switcher_true_false';
		$this->label = __("Switcher True / False",'acf');
		$this->category = __("Choice",'acf');
		$this->defaults = array(
			'default_value'	=>	0,
			'message'	=>	'',
		);
		
		
		// do not delete!
    	parent::__construct();
  
	}
		
	
	/*
	*  create_field()
	*
	*  Create the HTML interface for your field
	*
	*  @param	$field - an array holding all the field's data
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*/
	
	function create_field( $field )
	{
		// html
	

			//Change Toggle Colors Off/On
			$colorOff = "#ed6f6f";
			$colorOn = "#4fb845";


			?>
			<style type="text/css">
					.acf-switcher-true-false-list label {
					  display: block;
					  float: left;
					  cursor: pointer;
					  position: relative;
					  width: 62px;
					  height: 26px;
					  padding: 0;
					  margin: 0;
					  overflow: hidden;
					  -moz-border-radius: 20px;
					  -webkit-border-radius: 20px;
					  border-radius: 20px;
					}
					.acf-switcher-true-false-list label span {
					  position: absolute;
					  top: 4px;
					  left: 4px;
					  width: 18px;
					  height: 18px;
					  background-color: #fff;
					  -moz-border-radius: 16px;
					  -webkit-border-radius: 16px;
					  border-radius: 16px;
					  -moz-transition: left 0.15s ease-out;
					  -o-transition: left 0.15s ease-out;
					  -webkit-transition: left 0.15s ease-out;
					  transition: left 0.15s ease-out;
					}
					.acf-switcher-true-false-list label input {
					  position: absolute;
					  top: 0;
					  left: 0;
					  opacity: 0;
					}
					.acf-switcher-true-false-list label input:checked ~ em {
					  background: <?php echo $colorOn;?>;
					}
					.acf-switcher-true-false-list label input:checked ~ em:before {
					  opacity: 0;
					}
					.acf-switcher-true-false-list label input:checked ~ em:after {
					  opacity: 1;
					}
					.acf-switcher-true-false-list label input:checked ~ span {
					  left: 40px;
					}
					.acf-switcher-true-false-list label em {
					  /* position: relative; */
					  display: block;
					  height: inherit;
					  font-size: 11px;
					  line-height: 26px;
					  font-weight: 500;
					  font-style: normal;
					  text-transform: uppercase;
					  color: #fff;
					  background-color: <?php echo $colorOff;?>;
					  -moz-transition: background 0.15s ease-out;
					  -o-transition: background 0.15s ease-out;
					  -webkit-transition: background 0.15s ease-out;
					  transition: background 0.15s ease-out;
					}
					.acf-switcher-true-false-list label em:before, .acf-switcher-true-false-list label em:after {
					  position: absolute;
					  -moz-transition: opacity 0.15s ease-out;
					  -o-transition: opacity 0.15s ease-out;
					  -webkit-transition: opacity 0.15s ease-out;
					  transition: opacity 0.15s ease-out;
					}
					.acf-switcher-true-false-list label em:before {
					  content: attr(data-off);
					  right: 14px;
					}
					.acf-switcher-true-false-list label em:after {
					  content: attr(data-on);
					  left: 14px;
					  opacity: 0;
					}
					.acf-switcher-true-false-list .message-text{
					  float: left;
					  margin-left: 5px;
					  margin-top: 0;
					  padding-top: 4px;
					  font-weight: bold;
					}
					.field_type-switcher_true_false {
					    padding-bottom: 40px !important;
					}

					ul.acf-switcher-true-false-list {
					    background: transparent !important;
					}

					ul.acf-switcher-true-false-list {
					    background: transparent !important;
					    position: relative;
					    display: block;
					    padding: 1px;
					    margin: 0;
					}	

			</style>


		<?php
		echo '<ul class="acf-switcher-true-false-list ' . $field['class'] . '">';
			echo '<input type="hidden" name="'.$field['name'].'" value="0" />';
			$selected = ($field['value'] == 1) ? 'checked="yes"' : '';
			echo '<li><label><input id="' . $field['id'] . '-1"  type="checkbox" name="'.$field['name'].'" value="1" ' . $selected . ' /><em data-on="'. __( 'on', 'acf' ) .'" data-off="'. __( 'off', 'acf' ) .'"></em><span></span></label> <span class="message-text">' . $field['message'] . '</span></li>';
		
		echo '</ul>';
	}
	
	
	/*
	*  create_options()
	*
	*  Create extra options for your field. This is rendered when editing a field.
	*  The value of $field['name'] can be used (like bellow) to save extra data to the $field
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$field	- an array holding all the field's data
	*/
	
	function create_options( $field )
	{
		// vars
		$key = $field['name'];
		
		
		?>
<tr class="field_option field_option_<?php echo $this->name; ?>">
	<td class="label">
		<label><?php _e("Message",'acf'); ?></label>
		<p class="description"><?php _e("eg. Show extra content",'acf'); ?></a></p>
	</td>
	<td>
		<?php 
		do_action('acf/create_field', array(
			'type'	=>	'text',
			'name'	=>	'fields['.$key.'][message]',
			'value'	=>	$field['message'],
		));
		?>
	</td>
</tr>
<tr class="field_option field_option_<?php echo $this->name; ?>">
	<td class="label">
		<label><?php _e("Default Value",'acf'); ?></label>
	</td>
	<td>
		<?php
		
		do_action('acf/create_field', array(
			'type'	=>	'true_false',
			'name'	=>	'fields['.$key.'][default_value]',
			'value'	=>	$field['default_value'],
		));
		
		?>
	</td>
</tr>
		<?php
		
	}
	
	
	/*
	*  format_value_for_api()
	*
	*  This filter is appied to the $value after it is loaded from the db and before it is passed back to the api functions such as the_field
	*
	*  @type	filter
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$value	- the value which was loaded from the database
	*  @param	$post_id - the $post_id from which the value was loaded
	*  @param	$field	- the field array holding all the field options
	*
	*  @return	$value	- the modified value
	*/
	
	function format_value_for_api( $value, $post_id, $field )
	{
		$value = ($value == 1) ? true : false;
		
		return $value;
	}
	
}

new acf_field_switcher_true_false();

?>