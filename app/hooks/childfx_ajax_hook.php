<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class ChildFx {
	/**
	 * Single Instance
	 */
	protected static $_instance = null;

	/**
	 * Constructor - get the plugin hooked in and ready
	 */
	public function __construct() {

		if ( defined( 'DOING_AJAX' ) ) {
			include_once( 'clockwork/class-childfx-ajax.php' );
		}
	}

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}
}

function WD() {
	return ChildFx::instance();
}

$GLOBALS['childfx'] = new ChildFx();



















// add_action( 'calibrefx_do_ajax', $_POST['do'] );


// function childfx_ajax_test() {
// 	global $calibrefx;
// 	$data = $_POST['data'];
// 	$return_data['message'] 	= 'success';
// 	$return_data['data'] 		= $data;

// 	wp_send_json( $return_data );
// }


function childfx_ajax_handler() {

	

	// class Childfx_Ajax {

	// 	public function __construct() {

	// 		if ( function_exists( "__autoload" ) ) {
	// 			spl_autoload_register( "__autoload" );
	// 		}

	// 		spl_autoload_register( array( $this, 'autoload' ) );

	// 		include_once( 'includes/class-childfx_ajax.php' );

	// 	}

	// 	public function autoload( $class ) {
	// 		$path  = null;
	// 		$class = strtolower( $class );
	// 		$file = 'class-' . str_replace( '_', '-', $class ) . '.php';

			// if ( strpos( $class, 'wp_dropship_shortcode_' ) === 0 ) {
			// 	$path = $this->get_template_directory() . '/includes/shortcodes/';
			// } elseif ( strpos( $class, 'wp_dropship_meta_box' ) === 0 ) {
			// 	$path = $this->get_template_directory() . '/includes/admin/meta-boxes/';
			// } elseif ( strpos( $class, 'wp_dropship_admin' ) === 0 ) {
			// 	$path = $this->get_template_directory() . '/includes/admin/';
			// }

			// if ( $path && is_readable( $path . $file ) ) {
			// 	include_once( $path . $file );
			// 	return;
			// }

			// Fallback
	// 		if ( strpos( $class, 'wp_dropship_' ) === 0 ) {
	// 			$path = $this->get_template_directory() . '/includes/';
	// 		}

	// 		if ( $path && is_readable( $path . $file ) ) {
	// 			include_once( $path . $file );
	// 			return;
	// 		}
	// 	}
	// }

	// $GLOBALS['childfx_ajax_controll'] = new Childfx_Ajax();
	// var_dump($GLOBALS['childfx_ajax_controll']);


	var_dump($_POST);

}
// add_action('calibrefx_do_ajax', 'childfx_ajax_handler');
// function childfx_ajax_handler() {

// 	global $calibrefx;
// 	if(empty($_REQUEST['do'])) return;

// 	$do = $_REQUEST['do'];
	
// 	switch($do){

// 		case 'clockwork':
// 			$data['text'] = $_POST['text'];
// 			$response = $data;
// 			break;

// 		case 'first-ajax':
// 			$data_1 = $_POST['data'];
// 			$response = array( 
// 					'success'		=> 	'successed ajax call'
// 				,	'result'		=> 	$data_1
// 			);
// 			break;

// 		case 'get_post':
// 			$data = $_POST['data'];

// 			$response['data'] = get_post( $data[0] );
// 			break;

// 		case 'get_the_post_thumbnail':
// 			$data = $_POST['data'];
// 				if( $data[0] ){
// 					$response['post_thumbnail'] = get_the_post_thumbnail( $data[0] );
// 				}
// 				if( $data[0] && $data[1] ){
// 					$response['post_thumbnail'] = get_the_post_thumbnail( $data[0], $data[1] );
// 				}
// 				if( $data[0] && $data[1] && $data[2] ){
// 					$response['post_thumbnail'] = get_the_post_thumbnail( $data[0], $data[1], $data[2] );
// 				} 
// 				else {
// 					$response['post_thumbnail'] = 'No argument suplied';
// 				}
// 			break;

// 		case 'load_more_furniture':
// 			$data = $_POST['data'];
// 			$temp = array();
// 			$args = array(
// 				//	Type & Status Parameters
// 					'post_type'   		=> 'furniture',
// 				//	Order & Orderby Parameters
// 					'order'       		=> 'DESC',
// 					'orderby'       	=> 'date',
// 				//	Pagination Parameters
// 					'posts_per_page'    => 3,
// 					'offset'            => $data,
// 			);
// 			$query = new WP_Query( $args );

// 			if ( $query->have_posts() ) {
// 				while ( $query->have_posts() ) {
// 					$query->the_post();
// 					$temp[] = get_the_title();
// 				}
// 			}
// 			wp_reset_postdata();


// 			$response['success'] = $data;
// 			$response['data'] = $temp;
// 			break;
// 	}

// 	echo json_encode($response);
// 	exit;
// }