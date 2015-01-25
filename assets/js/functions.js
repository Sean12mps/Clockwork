jQuery(document).ready(function($){

	var childfx = new ChildFx;

	childfx.addGear({
		name  		: 'home_test_array',
		selector 	: '#inner',
		locations 	: ['home','archive'],
		func 	 	: ['display_test','display_test2']
	});

	childfx.addFunctions({

			name 		: 'display_test',
			
			func 		: function(){
				console.log( 'first' );
			}
	});

	childfx.addFunctions({

			name 		: 'display_test2',
			
			func 		: function(){
				console.log( 'second' );
			}
	});

	childfx.engine( 'home_test_array' );



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