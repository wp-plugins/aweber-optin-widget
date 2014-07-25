<?php
	if ( !function_exists('add_action') ) { die('Please don\'t open this file directly!'); } 

	add_action( 'widgets_init', 'twb_aweber_optin' );

	function twb_aweber_optin() { register_widget( 'twb_aweber_optin_widget' );}

	class twb_aweber_optin_widget extends WP_Widget {
		function twb_aweber_optin_widget() {
		$widget_ops = array( 'classname' => 'twb_aweber_optin_widget', 'description' => __('Widget that adds Aweber Optin Form to the site.', 'twb_aweber_optin_widget') );

		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'twb_aweber_optin_widget' );

		$this->WP_Widget( 'twb_aweber_optin_widget', __('Aweber Optin Widget - Responsive - by TheWeb-Designs.com', 'twb_aweber_optin_widget'), $widget_ops, $control_ops );
	}
		function widget( $args, $instance ) {
			extract( $args );
	
			$twb_main_title = $instance['twb_main_title'];
			$twb_sub_title = $instance['twb_sub_title'];
			$twb_frm_id = $instance['twb_frm_id'];
			$twb_list_name = $instance['twb_list_name'];
			$twb_ty_link = $instance['twb_ty_link'];
			$twb_name_check = $instance['twb_name_check'] ? 'true' : 'false';
			$twb_ph_name = $instance['twb_ph_name'];
			$twb_ph_email = $instance['twb_ph_email'];
			$twb_ph_btn = $instance['twb_ph_btn'];
			$twb_ph_btn_color = $instance['twb_ph_btn_color'];
			$twb_ph_btn_color_hover = $instance['twb_ph_btn_color_hover'];
			$twb_privacy_text = $instance['twb_privacy_text'];
			
			echo $before_widget;
		?>

		<!-- twbeber form -->
          	<style type="text/css"> .twb_widget .twb_btn:hover { background:  <?php echo esc_attr ($twb_ph_btn_color_hover); ?> !important;} </style>
        
        <div class="twb_widget">
			<h2 class="twb_main_title"><?php echo $twb_main_title; ?> </h2>
        	<p class="twb_sub_title"><?php echo $twb_sub_title; ?> </p>
        
		<?php 
			$output = '<form method="post" class="twb_wrapper" action="http://www.aweber.com/scripts/addlead.pl" target="_new" >
	
			<div style="display: none;">
				<input type="hidden" name="meta_web_form_id" value="' .$twb_frm_id. '" />
				<input type="hidden" name="meta_split_id" value="" />
				<input type="hidden" name="listname" value="' .$twb_list_name. '" />
				<input type="hidden" name="redirect" value="'.$twb_ty_link.'" id="" />
				<input type="hidden" name="meta_adtracking" value="" />
				<input type="hidden" name="meta_message" value="1" />
				<input type="hidden" name="meta_required" value="email" />
				<input type="hidden" name="meta_tooltip" value="" />
			</div>';
	
			if ($twb_name_check == 'true' ) {
			$output .='<input id="" type="text" name="name" placeholder="' .$twb_ph_name. '"class="twb_name" value="" tabindex="500" />
			<input class="twb_email" id="" type="text" name="email" placeholder=" '. $twb_ph_email. '" tabindex="501"  />';
			}else {
			$output .='<input class="twb_email" id="" type="text" name="email" placeholder=" '. $twb_ph_email. '" tabindex="501"  />';
			}
			$output .='<input name="submit" style="background:' .$twb_ph_btn_color. ';" class="twb_btn" type="submit" value="' .$twb_ph_btn. '" tabindex="502" />
			<p class="spam-notice">'. $twb_privacy_text. '</p>
			</form>';
		  echo $output;
		?>
		<!-- twbeber form -->
		</div><!-- twb_widget-->
		
		<?php echo $after_widget; }
	
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
	
			$instance['twb_main_title'] = $new_instance['twb_main_title'];
			$instance['twb_sub_title'] = $new_instance['twb_sub_title'];
			$instance['twb_frm_id'] = strip_tags( $new_instance['twb_frm_id'] );
			$instance['twb_list_name'] = strip_tags( $new_instance['twb_list_name'] );
			$instance['twb_ty_link'] = $new_instance['twb_ty_link'];
			$instance['twb_name_check'] = $new_instance['twb_name_check'];
			$instance['twb_ph_name'] = strip_tags( $new_instance['twb_ph_name'] );
			$instance['twb_ph_email'] = strip_tags( $new_instance['twb_ph_email'] );
			$instance['twb_ph_btn'] = strip_tags( $new_instance['twb_ph_btn'] );
			$instance['twb_ph_btn_color'] = strip_tags( $new_instance['twb_ph_btn_color'] );
			$instance['twb_ph_btn_color_hover'] = strip_tags( $new_instance['twb_ph_btn_color_hover'] );
			$instance['twb_privacy_text'] = $new_instance['twb_privacy_text'];
			
			return $instance;
		}
		function form( $instance ) {
	
			$defaults = array(
				'twb_main_title' => 'Do You Want to Learn Wordpress?',
				'twb_sub_title' => 'Enter your name and email below to get started.',
				'twb_ph_name' => 'Enter Your First Name',
				'twb_ph_email' => 'Enter Your Best Email',
				'twb_ph_btn' => 'Yes! Let Me In',
				'twb_privacy_text' =>'We hate spam as much as you do!',
				'twb_ph_btn_color' => '#2BA6CB',
				'twb_ph_btn_color_hover' => '#2284A1'
				);
			
			$instance = wp_parse_args( (array) $instance, $defaults ); ?>
	  
            <script type="text/javascript">
			//<![CDATA[
				jQuery(document).ready(function()
				{
					// colorpicker field
					jQuery('.twb_btn_color, .twb_btn_color_hover').each(function(){
						var $this = jQuery(this),
							id = $this.attr('rel');
 						$this.farbtastic('#' + id).hide();
					jQuery('.twb, .twb-title').click(function(){jQuery('.twb_btn_color').show('medium')});	
					jQuery('.twb-hover, .twb-hover-title').click(function(){jQuery('.twb_btn_color_hover').show('medium')});
					});
				});
			//]]>   
		  </script>
		
        
        <p>
			<label for="<?php echo $this->get_field_id( 'twb_main_title' ); ?>"><?php _e('Main Title'); ?></label>
			<input id="<?php echo $this->get_field_id( 'twb_main_title' ); ?>" name="<?php echo $this->get_field_name( 'twb_main_title' ); ?>" value="<?php echo $instance['twb_main_title']; ?>" style="width:90%;" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'twb_sub_title' ); ?>"><?php _e('Sub Title'); ?></label>
			<input id="<?php echo $this->get_field_id( 'twb_sub_title' ); ?>" name="<?php echo $this->get_field_name( 'twb_sub_title' ); ?>" value="<?php echo $instance['twb_sub_title']; ?>" style="width:90%;" />
		</p>
   
		<p>
			<label for="<?php echo $this->get_field_id( 'twb_frm_id' ); ?>"><?php _e('Aweber Form ID'); ?></label>
			<input id="<?php echo $this->get_field_id( 'twb_frm_id' ); ?>" name="<?php echo $this->get_field_name( 'twb_frm_id' ); ?>" value="<?php echo $instance['twb_frm_id']; ?>" style="width:90%;" /><br /><a target="_blank" href="/wp-content/plugins/twb_aweber_optin/images/form_id.png">Click Here to see where to find that</a>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'twb_list_name' ); ?>"><?php _e('Aweber List Name'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'twb_list_name' ); ?>" name="<?php echo $this->get_field_name( 'twb_list_name' ); ?>" value="<?php echo $instance['twb_list_name']; ?>" style="width:90%;" /><br />Input list name only. <a target="_blank" href="/wp-content/plugins/twb_aweber_optin/images/list_name.png">Click Here to see where to find that</a>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'twb_ty_link' ); ?>"><?php _e('Link to the Thank you page'); ?></label> 
			<input id="<?php echo $this->get_field_id( 'twb_ty_link' ); ?>" name="<?php echo $this->get_field_name( 'twb_ty_link' ); ?>" value="<?php echo $instance['twb_ty_link']; ?>" style="width:90%;" /><br />If leave empty then it will use default aweber thank you page
		</p>
		
		<h1><?php _e('Form Look'); ?></h1>
	
		
		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['twb_name_check'], 'on'); ?> id="<?php echo $this->get_field_id('twb_name_check'); ?>" name="<?php echo $this->get_field_name('twb_name_check'); ?>" /> 
			<label for="<?php echo $this->get_field_id('twb_name_check'); ?>"><?php _e('Enable Name Field'); ?></label>
		</p>
        
		<p>
			<label for="<?php echo $this->get_field_id( 'twb_ph_name' ); ?>"><?php _e('Placeholder Text For Name Field'); ?></label> 
			<input type="text" id="<?php echo $this->get_field_id( 'twb_ph_name' ); ?>" name="<?php echo $this->get_field_name( 'twb_ph_name' ); ?>" value="<?php echo $instance['twb_ph_name']; ?>" style="width:90%;" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'twb_ph_email' ); ?>"><?php _e('Placeholder Text For Email Field'); ?></label> 
			<input type="text" id="<?php echo $this->get_field_id( 'twb_ph_email' ); ?>" name="<?php echo $this->get_field_name( 'twb_ph_email' ); ?>" value="<?php echo $instance['twb_ph_email']; ?>" style="width:90%;" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'twb_ph_btn' ); ?>"><?php _e('Submit Button Text'); ?></label> 
			<input type="text" id="<?php echo $this->get_field_id( 'twb_ph_btn' ); ?>" name="<?php echo $this->get_field_name( 'twb_ph_btn' ); ?>" value="<?php echo $instance['twb_ph_btn']; ?>" style="width:90%;" />
		</p>
        
		<p>
        	<label for="<?php echo $this->get_field_id('twb_ph_btn_color'); ?>"><?php _e('Button Color:'); ?></label> 
            <input class="widefat twb" id="<?php echo $this->get_field_id('twb_ph_btn_color'); ?>" name="<?php echo $this->get_field_name('twb_ph_btn_color'); ?>" type="text" value="<?php echo $instance['twb_ph_btn_color']; ?>" />
          	
         	<div class="twb_btn_color" rel="<?php echo $this->get_field_id('twb_ph_btn_color'); ?>"></div>
         </p>
			
		 <p>
			<label for="<?php echo $this->get_field_id('twb_ph_btn_color_hover'); ?>"><?php _e('Button Hover Color:'); ?></label> 

			<input class="widefat twb-hover" id="<?php echo $this->get_field_id('twb_ph_btn_color_hover'); ?>" name="<?php echo $this->get_field_name('twb_ph_btn_color_hover'); ?>" type="text" value="<?php echo $instance['twb_ph_btn_color_hover']; ?>" />
          	
            
       		<div class="twb_btn_color_hover" rel="<?php echo $this->get_field_id('twb_ph_btn_color_hover'); ?>"></div>
          </p>
        
        
        <p>
			<label for="<?php echo $this->get_field_id( 'twb_privacy_text' ); ?>"><?php _e('Spam Notice'); ?></label> 
			<input type="text" id="<?php echo $this->get_field_id( 'twb_privacy_text' ); ?>" name="<?php echo $this->get_field_name( 'twb_privacy_text' ); ?>" value="<?php echo $instance['twb_privacy_text']; ?>" style="width:90%;" />
		</p>
		
	<?php
	}
}
?>