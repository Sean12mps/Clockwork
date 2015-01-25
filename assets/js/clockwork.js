function ChildFx(){

	var cFx = this;

	cFx.settings = {};

	cFx.localData = {
		name : [],
		selector : [],
		locations: [],
		func : []
	};

	cFx.functions = {
		name : [],
		func : []
	}

	cFx.checkBodyClass = function( name ){

		var check = false;

		for( var i = 0; i < name.length; i++ ){

			if( jQuery( 'body' ).hasClass( name[i] ) ){

				check = true;
			}
		}

		return check;
	};

	cFx.getObj = function( name ){

		var selector  	= cFx.localData.selector[cFx.localData.name.indexOf( name )];
		var locations  	= cFx.localData.locations[cFx.localData.name.indexOf( name )];
		var functions  	= cFx.localData.func[cFx.localData.name.indexOf( name )];

		var args = {
			name : name,
			selector : selector,
			locations: locations,
			func: functions
		};

		return args;
	}

	cFx.addGear = function( args ){

		var temp_name 		= cFx.localData.name;
			temp_name.push( args.name );
			cFx.localData.name = temp_name;

		var temp_selector 	= cFx.localData.selector;
			temp_selector.push( args.selector );
			cFx.localData.selector = temp_selector;

		var temp_locations 	= cFx.localData.locations;
			temp_locations.push( args.locations );
			cFx.localData.locations = temp_locations;

		var temp_functions 	= cFx.localData.func;
			temp_functions.push( args.func );
			cFx.localData.func = temp_functions;
	};

	cFx.engine = function( name ){

		var that  	= cFx.getObj( name );
		var index;

		for( var i = 0; i < that.func.length; i++ ){

			index = cFx.functions.func[cFx.functions.name.indexOf( that.func[i] )];

			if( cFx.checkBodyClass( that.locations ) ){

				if( index ){
					
					index();
				} else {

					console.log( 'function for '+that.name+' is undefined' );
				}
			}
		}
	};

	cFx.addFunctions = function( args ){

		var temp_name = cFx.functions.name;
		var temp_func = cFx.functions.func;

		temp_name.push( args.name );
		temp_func.push( args.func );

		cFx.functions = {
			name : temp_name,
			func : temp_func
		};
	};

	cFx.init = function(){

		if( cFx.localData.name.length > 0 ){

			var leng = cFx.localData.name.length;

			for( var i = 0; i < leng; i++ ){

				if( cFx.checkBodyClass( cFx.localData.locations[i] ) ){

					cFx.engine( cFx.localData.name[i] );
				}
			}
		}
	};
};


	/*	COLLECTIONS
	 *	===========
	 */ ChildFx.prototype.collections = {};
 	/*	===========
	 *	COLLECTIONS
	 */ 	 
	 	ChildFx.prototype.collections.ajaxFunc = {

 			getData : function( cmd, data, fn ){

 				var that = this;

 				that.received = '';

	 			jQuery.ajax( {
				  	type: "POST",
				  	url: cfx_ajax.ajaxurl,
				  	data: { 
							"action" 		: cfx_ajax.ajax_action
						, 	"do" 			: cmd
						, 	"data" 			: data
						, 	"_ajax_nonce" 	: cfx_ajax._ajax_nonce
				    },
				    success: function(result){

				    	var response = result;

				    	that.received = result;

				    	if( fn ){

				    		fn();
				    	}
				    },
				   	dataType : "json"
				} );
 			}
 		};

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