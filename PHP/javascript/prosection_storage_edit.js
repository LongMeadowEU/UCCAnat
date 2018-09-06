// JavaScript Document
    	
function go_function(){
	var storage_type_java = $("#storage option:selected").val();
	//console.log("storage type selected from PHP = " + storage_type_java);
	
	if(storage_type_java == "fridge") {
		// setting the unit options
		 $("#unit").html("");
		list_unit(storage_unit);
		$("#unit").val(php_var);
		
		// setting the shelf options
		$("#shelf").html("");
		list_shelf(storage_shelf); 
		$("#shelf").val(php_var_shelf);
		
	} else if(storage_type_java == "freezer") {
		// setting the unit options
		 $("#unit").html("");
		list_unit(freezer_unit);
		$("#unit").val(php_var);
		
		// setting the shelf options
		$("#shelf").html("");
		list_shelf(storage_shelf); 
		$("#shelf").val(php_var_shelf);
		
	}  else if(storage_type_java == "tank") {
		// setting the unit options
		 $("#unit").html("");
		list_unit(tank_unit);
		$("#unit").val(php_var);
		
		// setting the shelf options
		$("#shelf").html("");
		list_shelf(storage_shelf_tank); 
		$("#shelf").val(php_var_shelf);
	}
	
	go_function_prosecs();
};
	
// array lists for the REGIONS selection box values	
	var storage_unit = [
    {display: "1", value: "storage_unit1" }, 
	{display: "2", value: "storage_unit2" },
	{display: "3", value: "storage_unit3" },
	{display: "4", value: "storage_unit4" },
	{display: "5", value: "storage_unit5" },
	{display: "6", value: "storage_unit6" },
	{display: "7", value: "storage_unit7" },
	{display: "8", value: "storage_unit8" },
	{display: "9", value: "storage_unit9" },
	{display: "10", value: "storage_unit10" },
	{display: "11", value: "storage_unit11" },
	{display: "12", value: "storage_unit12" },
	{display: "13", value: "storage_unit13" },
	{display: "14", value: "storage_unit14" },
	{display: "15", value: "storage_unit15" }
    ];
	
	var freezer_unit = [
    {display: "1", value: "freezer_unit1" }, 
	{display: "2", value: "freezer_unit2" },
	{display: "3", value: "freezer_unit3" }
    ];
	
	var tank_unit = [
    {display: "1", value: "tank_unit1" }, 
	{display: "2", value: "tank_unit2" },
	{display: "3", value: "tank_unit3" }, 
	{display: "4", value: "tank_unit4" },
	{display: "5", value: "tank_unit5" } 
    ];
	
	var storage_shelf = [
	  {display: "1", value: "storage_shelf1" }, 
	  {display: "2", value: "storage_shelf2" },
	  {display: "3", value: "storage_shelf3" },
	  {display: "4", value: "storage_shelf4" },
	  {display: "5", value: "storage_shelf5" }
    ];

var storage_shelf_tank = [
	  {display: "0", value: "storage_shelf_tank_0" }
    ];
//function to populate child select box >> FOR THE UNIT SELECT BOX
function list_unit(array_unit)
{
  $("#unit").html(""); //reset child options
  $(array_unit).each(function (i) { //populate child options 
	  $("#unit").append("<option value=\""+array_unit[i].value+"\">"+array_unit[i].display+"</option>");
  });
}	
//function to populate child select box >> FOR THE SHELF SELECT BOX
function list_shelf(array_shelf)
{
  $("#shelf").html(""); //reset child options
  $(array_shelf).each(function (i) { //populate child options 
	  $("#shelf").append("<option value=\""+array_shelf[i].value+"\">"+array_shelf[i].display+"</option>");
  });
}
// Change function: populate the unit select box when type of storage select box option is chosen
$("#storage").change(function() {
    var parent_storage = $(this).val(); 
    switch(parent_storage){ 
        case 'fridge':
				 $("#unit").html(""); //reset child options
				list_unit(storage_unit);
            break;
        case 'freezer':
				 $("#unit").html(""); //reset child options
				 list_unit(freezer_unit);
            break; 
		case 'tank':
				 $("#unit").html(""); //reset child options
				 list_unit(tank_unit);
            break;          
        default: //default child option is blank
            $("#child_selection_units").html(''); 
            break;
    }
});	
// Change function: populate the shelf select box when unit select box option is chosen
$("#unit").change(function() {
    var parent_shelf = $(this).val(); 
    switch(parent_shelf){ 
        case 'tank_unit1':
				$("#shelf").html(""); //reset child options
			list_shelf(storage_shelf_tank); 
            break; 
		case 'tank_unit2':
				$("#shelf").html(""); //reset child options
			list_shelf(storage_shelf_tank); 
            break;
		case 'tank_unit3':
				$("#shelf").html(""); //reset child options
			list_shelf(storage_shelf_tank); 
            break; 
		case 'tank_unit4':
				 $("#shelf").html(""); //reset child options
			list_shelf(storage_shelf_tank); 
            break;  
		case 'tank_unit5':
				 $("#shelf").html(""); //reset child options
			list_shelf(storage_shelf_tank); 
            break;           
        default: //default child option is blank
            $("#shelf").html(""); //reset child options
			list_shelf(storage_shelf); 
            break;
    }
});