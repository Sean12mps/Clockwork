jQuery(document).ready(function($){

	var childfx = new ChildFx;

	childfx.addGear({
		name  		: 'home_test_array',
		locations 	: ['home','archive'],
		func_names 	: ['display_test','display_test2']
	});

	childfx.addFunctions({
		name 		: 'display_test',
		selector 	: '#inner',
		func 		: function(){
			console.log( 'first' );
		}
	});

	childfx.addFunctions({
		name 		: 'display_test2',
		selector 	: '#inner',
		func 		: function(){
			console.log( 'second' );
		}
	});

	childfx.engine( 'home_test_array' );




	childfx.addGear({
		name  		: 'research_creating_events',
		locations 	: ['eventcreation'],
		func_names 	: ['creating_events']
	});

	childfx.addFunctions({
		name 		: 'creating_events',
		selector 	: '#inner',
		func 		: function(){

			var myText = {
				name : 'julee',
				func : 'serve'
			};

			$( document ).on( "clock-right", { myText: myText }, 
				function( event, $args ) {
					console.log(myText);
				    var target = $( $args ).attr( 'target' );
				    $( ''+target+'' ).text( $args.text() );
				    myText.func = $args.text();
				}
			);
			
			$( '#right-text' ).on( 'click', function(){
				var $elem = $( this );
				$( document ).trigger( "clock-right" ,[ $elem ] );
			} );


		}
	});

	childfx.engine( 'research_creating_events' );

});

function check_focus(elm,val){
    if(elm.value.toLowerCase() == val.toLowerCase()){
        elm.value = '';    
    }
}

function check_blur(elm,val){
    if(elm.value.toLowerCase() == ''){
        elm.value = val;    
    }
}

/*	TEMPLATE
 ***********
 
childfx.addGear({
	name  		: 'function_key_name',
	selector 	: 'element_to_be_passed',
	locations 	: 'body_class',
	func 	 	: 'function_registry_name'
});

childfx.addFunctions({

		name 		: 'function_registry_name',
		
		func 		: function(){
			// 	function here
		}
});

childfx.engine( 'function_key_name' );

***********
*/