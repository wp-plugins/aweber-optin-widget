<?php 
//Add twb_aweber_optin_widget
class twb_aweber_optin_widget extends WP_Widget {
	//Register Widget
	function __construct() {
		parent::__construct(
			'twb_aw_widget', // Base ID
			__('Simple Aweber Optin Widget - Lite Version', 'text_domain'), // Name
			array( 'description' => __( 'Custom Widget that adds an aweber optin form on site. You can add an unlimited number of forms using this widget plugin. The form design and look can be easily controlled in the widget settings. Its Responsive , very Easy to Use and comes with Powerful Features. The aweber forms created by this widget plugin are completely responsive and does not load javascripts and css from aweber server.', 'twb_aweber_optin_widget', 'text_domain' ), ) // Args
		);
	}
	public function widget( $args, $instance ) {
		$twb_main_title = $instance['twb_main_title'];
		$twb_sub_title = $instance['twb_sub_title'];
		$twb_list_name = strip_tags($instance['twb_list_name']);
		$twb_ty_link = strip_tags($instance['twb_ty_link']);
		$twb_onlist_redirect_url = strip_tags($instance['twb_onlist_redirect_url']);
		$twb_name_check = strip_tags($instance['twb_name_check'] ? 'true' : 'false');
		$twb_ph_name = strip_tags($instance['twb_ph_name']);
		$twb_ph_email = strip_tags($instance['twb_ph_email']);
		$twb_ph_btn = strip_tags($instance['twb_ph_btn']);
		$twb_ph_btn_color = strip_tags($instance['twb_ph_btn_color']);
		$twb_ph_btn_txt_color = strip_tags($instance['twb_ph_btn_txt_color']);
		echo $args['before_widget']; 
		$twb_widget_ID = $this->id_base .'-'. $this->number;
	?>
	<script>
		jQuery(document).ready(function() {
			jQuery('form#<?php echo $twb_widget_ID; ?>').each(function() {
        		jQuery(this).validate({       // initialize plugin on each form
        		});
    		});
		});
	</script>
	
	<style type="text/css">
			.widget_twb_aw_widget .twb_sub_title p {font-size:20px; color:<?php echo esc_attr('#f4f4f4'); ?>;}
		</style>
	
        <div class="twb_widget" style="background:<?php echo esc_attr('#f60'); ?>">
		<div class="twb_main_title" style="color:<?php echo esc_attr('#ffffff'); ?>; font-size:<?php echo esc_attr('30px'); ?>;"> <?php echo $twb_main_title; ?></div>
        <div class="twb_sub_title" style="color:<?php echo esc_attr('#f4f4f4'); ?>;"><?php echo $twb_sub_title;?></div>
        <?php 
		    $output = '<form class="twb_wrapper" id="'.$twb_widget_ID.'" method="post" name="'.$twb_widget_ID.'"  action="http://www.aweber.com/scripts/addlead.pl">';
			$output .= '<div style="display: none;">
			<input type="hidden" name="meta_split_id" value="" />
			<input type="hidden" name="listname" value="' .$twb_list_name. '" />
			<input type="hidden" name="redirect" value="'.$twb_ty_link.'" id="" />
			<input type="hidden" name="meta_redirect_onlist" value="' .$twb_onlist_redirect_url. '" /></div>';
			if ($twb_name_check == 'true' ) {
			$output .='<input type="text" id="" name="name" placeholder="' .$twb_ph_name. '"class="twb_name" value="" minlength=3 />
			<input type="email" class="twb_email" id="" name="email" placeholder=" '. $twb_ph_email. '" minlength=3 required />';
			}else {
			$output .='<input type="email" class="twb_email" id="" name="email" placeholder=" '. $twb_ph_email. '" minlength=3 required />';
			}
			$output .='<input type="submit" name="submit" style="background:' .$twb_ph_btn_color. '; color:' .$twb_ph_btn_txt_color. '; margin:5px 0; padding:15px;" class="twb_btn" value="' .$twb_ph_btn. '" />
			<div class="spam-notice" style="color:#ffffff">We hate spam as much as you do!</div></form>';echo $output;?></div>
		<?php echo $args['after_widget'];}
		
	//Previously saved values from database.
	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 
			'twb_main_title' => 'Want to Learn How to Use Wordpress?',
			'twb_sub_title' => '<p>Enter Your Email Below to Get Started!</p>',
			'twb_list_name' => '',
			'twb_ty_link' => '',
			'twb_name_check' => 'off',
			'twb_ph_name' => 'Enter Your First Name',
			'twb_ph_email' => 'Enter Your Best Email',
			'twb_ph_btn' => 'Yes! Let Me In',
			'twb_ph_btn_color' => '#000000',
			'twb_ph_btn_txt_color' => '#ffffff',
			'twb_onlist_redirect_url' => '') );
			$twb_main_title = $instance['twb_main_title'];
			$twb_sub_title = $instance['twb_sub_title'];
			$twb_list_name = strip_tags($instance['twb_list_name']);
			$twb_ty_link = strip_tags($instance['twb_ty_link']);
			$twb_name_check = strip_tags($instance['twb_name_check'] ? 'true' : 'false');
			$twb_ph_name = strip_tags($instance['twb_ph_name']);
			$twb_ph_email = strip_tags($instance['twb_ph_email']);
			$twb_ph_btn = strip_tags($instance['twb_ph_btn']);
			$twb_ph_btn_color = strip_tags($instance['twb_ph_btn_color']);
			$twb_ph_btn_txt_color = strip_tags($instance['twb_ph_btn_txt_color']);
			$twb_onlist_redirect_url = strip_tags($instance['twb_onlist_redirect_url']);?>

		<script type="text/javascript">
		jQuery(document).ready(function($) {
			// colorpicker field
			$('.twb_btn_color, .twb_btn_txt_color').each(function(){
			id = $(this).attr('rel');
			$(this).farbtastic('#' + id).hide();
				$('.twb, .twb-title').click(function(){
					$('.twb_btn_color').fadeIn('medium').siblings("div").hide();
				});
				$('.twb-btn-txt-color, .twb-btn-txt-color-title').click(function(){
					$('.twb_btn_txt_color').fadeIn('medium').siblings("div").hide();
				});
			});
		});
		</script>
	  
	<!-- General Settings -->
	<p>(1) <a href="javascript:;" onclick="jQuery(this).parent().next('div').slideToggle();"><strong>General Settings</strong></a></p>
    
    <div style="display:block;">
		<h4><?php _e('General Settings'); ?></h4>
        <p>
			<label for="<?php echo $this->get_field_id( 'twb_main_title' ); ?>"><?php _e('Main Title'); ?></label>
			<input id="<?php echo $this->get_field_id( 'twb_main_title' ); ?>" name="<?php echo $this->get_field_name( 'twb_main_title' ); ?>" value="<?php echo esc_attr($twb_main_title); ?>" style="width:90%;" />
		</p>
        
		<p>
			<label for="<?php echo $this->get_field_id( 'twb_sub_title' ); ?>"><?php _e('Sub Title'); ?> (HTML is allowed)</label>
			
			<textarea rows="10" id="<?php echo $this->get_field_id( 'twb_sub_title' ); ?>" name="<?php echo $this->get_field_name( 'twb_sub_title' ); ?>" style="width:90%;" ><?php echo wpautop($instance['twb_sub_title']); ?> </textarea>
		</p>
		
        <p>
			<label for="<?php echo $this->get_field_id( 'twb_list_name' ); ?>"><?php _e('Aweber List ID'); ?></label><br />
			<input type="text" id="<?php echo $this->get_field_id( 'twb_list_name' ); ?>" name="<?php echo $this->get_field_name( 'twb_list_name' ); ?>" value="<?php echo $instance['twb_list_name']; ?>" style="width:60%;" /> Input Unique List ID <a target="_blank" href="<?php echo site_url();?>/wp-content/plugins/simple-aweber-optin-widget-lite/images/list-id.jpg">Click Here to see where to find it.</a>
		</p>
        
		<p>
			<label for="<?php echo $this->get_field_id( 'twb_ty_link' ); ?>"><?php _e('Link to the Thank you page'); ?></label> 
			<input id="<?php echo $this->get_field_id( 'twb_ty_link' ); ?>" name="<?php echo $this->get_field_name( 'twb_ty_link' ); ?>" value="<?php echo $instance['twb_ty_link']; ?>" style="width:90%;" /><br />Leave empty if you want to use default aweber thank you page.
		</p>
	</div>
	<!-- General Settings -->
	
	<div style="clear:both;"></div>
	
	<!-- Optin Look -->
		<p>(2) <a href="javascript:;" onclick="jQuery(this).parent().next('div').slideToggle();"><strong>Optin Look</strong></a></p>
	  	
	<div style="display:none;">
		<h4><?php _e('Look'); ?></h4>
		
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
			<label><?php _e('Privacy Text'); ?></label><br /> 
			<input disabled type="text" value="<?php echo 'We hate spam as much as you do!'; ?>" width="90%" /><br />
            <strong>Available in Pro Version Only!</strong>
		</p>
	</div>
	<!-- Optin Look -->
	
	<div style="clear:both;"></div>
	
	<!-- Optin Design -->
		<p>(3) <a href="javascript:;" onclick="jQuery(this).parent().next('div').slideToggle();"><strong>Optin Design</strong></a></p>
	<div style="display:none;">
		
        <h4><?php _e('Design'); ?></h4>

        <p>
			<label><?php _e('Main Background Color'); ?></label> 
			
            <input disabled="disabled" type="text" value="<?php echo '#f60'; ?>" /><br />
            <strong>Available in Pro Version Only!</strong>
          </p>
		  
          <p>
			<label><?php _e('Main Title Font Size'); ?></label> <br />
			
            <input disabled="disabled" type="text" value="<?php echo '30px'; ?>" /><br />
            <strong>Available in Pro Version Only!</strong>
			</p>

		  <p>
			<label><?php _e('Main Title Font Color'); ?></label> <br />
			<input disabled="disabled" type="text" value="<?php echo '#ffffff'; ?>" /><br />
            <strong>Available in Pro Version Only!</strong>
          </p>
		  
          <p>
			<label><?php _e('Sub Title Font Color'); ?></label><br />
            
			<input disabled="disabled" type="text" value="<?php echo '#f4f4f4'; ?>" /><br /><strong>Available in Pro Version Only!</strong>
          </p>
		<p>
        	<label for="<?php echo $this->get_field_id('twb_ph_btn_color'); ?>"><?php _e('Button Color:'); ?></label> 
            <input class="widefat twb" id="<?php echo $this->get_field_id('twb_ph_btn_color'); ?>" name="<?php echo $this->get_field_name('twb_ph_btn_color'); ?>" type="text" value="<?php echo $instance['twb_ph_btn_color']; ?>" />
          	
         	<div class="twb_btn_color" rel="<?php echo $this->get_field_id('twb_ph_btn_color'); ?>"></div>
         </p>
			 
		  <p>
			<label for="<?php echo $this->get_field_id('twb_ph_btn_txt_color'); ?>"><?php _e('Button Text Color:'); ?></label> 

			<input class="widefat twb-btn-txt-color" id="<?php echo $this->get_field_id('twb_ph_btn_txt_color'); ?>" name="<?php echo $this->get_field_name('twb_ph_btn_txt_color'); ?>" type="text" value="<?php echo $instance['twb_ph_btn_txt_color']; ?>" />
          <div class="twb_btn_txt_color" rel="<?php echo $this->get_field_id('twb_ph_btn_txt_color'); ?>"></div>
          
          </p>
		  
          <p>
			<label><?php _e('Privacy Text Color:'); ?></label> 
			<input disabled="disabled" type="text" value="<?php echo '#ffffff'; ?>" /><br /><strong>Available in Pro Version Only!</strong>
          </p>
         
	</div>
	<!-- Optin Design -->
	
	<div style="clear:both;"></div>
	
	<!-- Advanced -->
		<p>(4) <a href="javascript:;" onclick="jQuery(this).parent().next('div').slideToggle();"><strong>Advanced Options</strong></a></p>
		
	<div style="display:none;">
		
        <h4><?php _e('Advanced Options'); ?></h4>
		
        <p>
			<label><?php _e('Aweber Form ID'); ?></label><br />
            
			<input type="text" disabled="disabled" value="<?php echo 'Form ID HERE';?> "/> 
            If you want to associate optins with a specific form<br /><strong>Available in Pro Version Only!</strong>
		</p>
        
         <p>
			<label><?php _e('Meta Tracking ID'); ?></label>
            
			<input type="text" disabled="disabled" value="<?php echo 'META_TRACKING_ID'; ?>" /> Add meta tracking ID here<br /><strong>Available in Pro Version Only!</strong>
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'twb_onlist_redirect_url' ); ?>"><?php _e('Redirect Already Subscribed Users to Following URL'); ?></label><br />
			<input id="<?php echo $this->get_field_id( 'twb_onlist_redirect_url' ); ?>" name="<?php echo $this->get_field_name( 'twb_onlist_redirect_url' ); ?>" value="<?php echo $instance['twb_onlist_redirect_url']; ?>" style="width:90%;" />
		</p>
	</div>
	<!-- Advanced -->
	
	<div style="clear:both; padding-bottom:10px;"></div>
    <a href="http://plugins.theweb-designs.com/simple-aweber-optin-widget/" target="_blank" title="Buy Pro Version"><h2>Buy Pro Version!</h2></a>
    <div style="clear:both; padding-bottom:30px;"></div>
	
	<?php }
		
	//Sanitize widget form values as they are saved.
	public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['twb_main_title'] = $new_instance['twb_main_title'];
			$instance['twb_sub_title'] = wpautop($new_instance['twb_sub_title']);
			$instance['twb_list_name'] = strip_tags( $new_instance['twb_list_name'] );
			$instance['twb_ty_link'] = $new_instance['twb_ty_link'];
			$instance['twb_name_check'] = $new_instance['twb_name_check'];
			$instance['twb_ph_name'] = strip_tags( $new_instance['twb_ph_name'] );
			$instance['twb_ph_email'] = strip_tags( $new_instance['twb_ph_email'] );
			$instance['twb_ph_btn'] = strip_tags( $new_instance['twb_ph_btn'] );
			$instance['twb_ph_btn_color'] = strip_tags( $new_instance['twb_ph_btn_color'] );
			$instance['twb_ph_btn_txt_color'] = strip_tags( $new_instance['twb_ph_btn_txt_color'] );
			$instance['twb_onlist_redirect_url'] = strip_tags($new_instance['twb_onlist_redirect_url']);
		return $instance; }
	} // class twb_aweber_optin_widget
function twb_aweber_optin() {
    register_widget( 'twb_aweber_optin_widget' );
}
add_action( 'widgets_init', 'twb_aweber_optin' );