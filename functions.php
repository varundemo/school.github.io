<?php
// To add css and js files
function school_script(){
	wp_enqueue_style('main_style',get_stylesheet_uri());
	wp_enqueue_style('bootstrap_css',get_template_directory_uri().'/CSS/bootstrap.min.css');
	wp_enqueue_style('all_css',get_template_directory_uri().'/CSS/all.min.css.cs');
	wp_enqueue_style('custom_css',get_template_directory_uri().'/CSS/custom.css');

	wp_enqueue_script('jquery_js',get_template_directory_uri().'/JS/jquery.min.js.js',array(),'1.1',true);
	wp_enqueue_script('popper_js',get_template_directory_uri().'/JS/popper.min.js.js',array(),'1.1',true);
	wp_enqueue_script('bootstrap_js',get_template_directory_uri().'/JS/bootstrap.min.js.js',array(),'1.1',true);
	wp_enqueue_script('all_js',get_template_directory_uri().'/JS/all.min.js',array(),'1.1',true);

}
add_action('wp_enqueue_scripts', 'school_script');

// To add Menu option in Dashboard
function show_menu(){
	register_nav_menus(
		array(
				'primary_menu'=> __('Primary Menu'),  // id=>vlaue
				'footer_menu'=> __('Footer Menu')
				)
				);      
}
add_action('init','show_menu');

// To add Logo in customization Dashboard
function school_logo(){
	$defaults = array(
		'height' => 50,
		'width' => 177
	);
	add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme','school_logo');

// To add Custom Post option in Dashboard
function new_post(){
	register_post_type('custom_projects',array(
		'labels'=>array(
			'name'=>__('Our_Projects'),
			'singular_name'=>__('custom Projects')
		),
		'public'=>true,
		"show_in_nav_menus"=>true,
		'has_archive'=>false,
		'supports'=>array('title','editor','excerpt','author','comments','revisions','custom-fields')
			)
	);
}
add_action("init","new_post");

// To add widgets option in Dashboard
// widgets is used to add sidebars in the themes.
function add_sidebar(){
	register_sidebar(array(
		'name'=>__('Primary Sidebar','theme_name'),
		'id'=>'sidebar-1',
		'before_widget'=>'<aside id="%1$s" class="widget %2$s">',
		'after_widget'=>'</aside>',
		'before_title'=>'<h1 class="widget-title">',
		'after_title'=>'</h2>',
	));

	register_sidebar(array(
		'name'=>__('Primary Sidebar 2','theme_name'),
		'id'=>'sidebar-2',
		'before_widget'=>'<aside id="%1$s" class="widget %2$s">',
		'after_widget'=>'</aside>',
		'before_title'=>'<h1 class="widget-title">',
		'after_title'=>'</h2>',
	));
}
add_action('widgets_init','add_sidebar');

// To show feature image
function show_img(){
	add_theme_support("post-thumbnails");
// 	 // To set image size
	add_image_size("small-thumbnail",120,90,true);
	add_image_size("banner-image",700,350,true);

	add_theme_support("post-formats",array("aside","gallery","link"));
}
add_action('after_setup_theme','show_img');
// function format(){
// 	add_theme_support("post-formats",array("aside","gallery","link"));

// }
// add_action('after_setup_theme','format');

add_filter('nav_menu_css_class','li_class');
function li_class($class){
	$class[] = "new_class";
	return $class;
}

add_filter('nav_menu_link_attributes','anchor_attr');
function anchor_attr($attr){
	$attr['class'] = "anchor_class";
	return $attr; 
}

// Theme customize panel
function custom_footer_sec($wp_customize){        //$wp_customize = Global Object
	$wp_customize->add_section('footer_section',array(
		'title'=>"Footer Section",
		'description'=>'This is footer description',
		'priority'=>120,
	));
	$wp_customize->add_setting('footer_setting',array(
		'default' => 'This is my simple text',
		'capability' => 'edit_theme_options',
		'type' => 'option',
	));
	$wp_customize->add_control('footer_first_control',array(
		'label'=>"Enter Your Text",
		'section'=> 'footer_section', 
		'settings'=> 'footer_setting',
	));

	$wp_customize->add_setting('footer_setting_link',array(
		'default' => 'Footer Link',
		'capability' => 'edit_theme_options',
		'type' => 'option',
	));
	$wp_customize->add_control('footer_first_control_link',array(
		'label'=>"Enter Your Text",
		'section'=> 'footer_section', 
		'settings'=> 'footer_setting_link',
	));

	$wp_customize->add_setting('footer_link_value',array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
	));
	$wp_customize->add_control('footer_control_link',array(
		'label'=>"Enter Your Text",
		'section'=> 'footer_section', 
		'type'=>'dropdown-pages',
		'settings'=> 'footer_link_value',
	));

	$wp_customize->add_setting('stu_image',array(
		'default'=>get_bloginfo('template_url').'/image/avtar2.jpeg',
		'capability' => 'edit_theme_options',
		'type' => 'option',
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'stu_image_control',array(
		'label'=>"Choose Image",
		'section'=> 'footer_section', 
		// 'type'=>'',
		'settings'=> 'stu_image',
	)));

	$wp_customize->add_setting('stu_color',array(
		'default'=>'#000',
		'capability' => 'edit_theme_options',
		'type' => 'option',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'stu_color_control',array(
		'label'=>"Choose Color",
		'section'=> 'footer_section', 
		// 'type'=>'',
		'settings'=> 'stu_color',
	)));

}
add_action('customize_register','custom_footer_sec');

function register_my_widget(){
	register_widget('Form_widget');			// register_widget method use to  call the class of widget
}
add_action('widgets_init','register_my_widget');

class Form_widget extends WP_Widget{
	function __construct(){
		parent::__construct(				//parent constructor overrite the parent constructor methods 
				'my_first_widget',						// id of the widget
				__('Form Widget'),						// Title of Widget
				array('description'=>('Sample Form Widget'))	   // Description of widget always passes in an array
		);
	}
		//widget method is to display the widget to the front-end users
	function widget($args,$instance){
		// $arg is used to add aside tag and h1 tag to the code
		$title = apply_filters('widget_title',$instance['title']);
		// if any value comes in $instance['title'] widget_title(Hook) method call/ apply_filters is used to overrite widget title.
		echo $args['before_widget'];  //used for aside tag start
		if(!empty($title))
		// {
			echo $args['before_title'].$title.$args['after_widget'];   //used to add h1 tag
			echo "<input type='text' placeholder='Enter your Name'>";
			echo $args['after_widget']; //aside tag end
		// }

	}
	//$instance object show the value which is saved by you in the database
	function form($instance){
		if(isset($instance['title'])){			//checking if instance has any value or not coming from database
		$title = $instance['title'];
		}
		else{
			$title = __('Great Title','wp_widget_domain');  //if no value is coming from database No value is  default value given here.
		}
?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title'); ?></label>          <!--_e('') is used for echo in wordpress/ get_field_id to dynamicaly generate ID -->
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title);  ?>">
			<!-- get_field_name to dynamicaly generate name/ esc_attr to remove any HTML tag for security purpose -->
		</p>
<?php		
	}
	function update($new_instance,$old_instance){
		$instance = array();
		$instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
		return $instance;
		// value from input field from the user is comes in the $new_instance variable
		// strip_tag is used to remove the html tags for security perpose
	}
}

?>