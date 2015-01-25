function ChildFx(){

	var cFx = this;

	cFx.settings = {};

	cFx.localData = {
		name : [],
		locations : [],
		func : []
	};

	cFx.functions = {
		name : [],
		selector : [],
		func : []
	}

	cFx.checkBodyClass = function( name ){
		var check = false;

		if( name[0] == 'all' ){

				check = true;
		} else {

			for( var i = 0; i < name.length; i++ ){

				if( jQuery( 'body' ).hasClass( ''+name[i]+'' ) ){

					check = true;

					return check;
				}
			}
		}
		return check;
	};

	cFx.getObj = function( name ){

		var locations  	= cFx.localData.locations[cFx.localData.name.indexOf( name )];
		var functions  	= cFx.localData.func[cFx.localData.name.indexOf( name )];

		var args = {
			name : name,
			locations: locations,
			func: functions
		};

		return args;
	}

	cFx.addGear = function( args ){

		var temp_name 		= cFx.localData.name;
			temp_name.push( args.name );
			cFx.localData.name = temp_name;

		var temp_locations 	= cFx.localData.locations;
			temp_locations.push( args.locations );
			cFx.localData.locations = temp_locations;

		var temp_functions 	= cFx.localData.func;
			temp_functions.push( args.func_names );
			cFx.localData.func = temp_functions;
	};

	cFx.engine = function( name ){

		var that  	= cFx.getObj( name );
		
		var index;

		for( var i = 0; i < that.func.length; i++ ){


			if( cFx.checkBodyClass( that.locations ) ){

				index = cFx.functions.func[cFx.functions.name.indexOf( that.func[i] )];

				if( index ){
					
					var check = jQuery( 'body' ).find( ''+cFx.functions.selector[cFx.functions.name.indexOf( that.func[i] )]+'' );

					if( check.length > 0 ){

						index();
					} else {

						console.log( 'element for function "'+cFx.functions.name[cFx.functions.name.indexOf( that.func[i] )]+'" is not found.' );
					}
				} else {

					console.log( 'function for '+that.name+' is undefined' );
				}
			}
		}
	};

	cFx.addFunctions = function( args ){

		var temp_name = cFx.functions.name;
		var temp_selc = cFx.functions.selector;
		var temp_func = cFx.functions.func;

		temp_name.push( args.name );
		temp_selc.push( args.selector );
		temp_func.push( args.func );

		cFx.functions = {
			name : temp_name,
			selector : temp_selc,
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