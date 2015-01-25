<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/*
 * WP_Dropship_Ajax
 */
class ChildFx_Ajax {

		public static function init() {

			$ajax_events = array(
				'test'	=> true,
			);

			foreach ( $ajax_events as $ajax_event => $nopriv ) {

				add_action( 'calibrefx_do_ajax', array( __CLASS__, $ajax_event ) );
			}

		}

		public static function test(){
			
			$data = $_POST['data'];
			$return_data['message'] 	= 'success';
			$return_data['data'] 		= $data;
		
			wp_send_json( $return_data );
		}
}
ChildFx_Ajax::init();