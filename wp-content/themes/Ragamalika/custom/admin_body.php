<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.1/css/jquery.dataTables.css" media="all"/>
<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.1/css/jquery.dataTables_themeroller.css"/>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/ui-lightness/jquery-ui.css" type="text/css" media="all" />
<link rel="Stylesheet" href="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.10/themes/redmond/jquery-ui.css" />

<script type="text/javascript">
jQuery(document).ready(function(){
	/* dataTable - Approve Students */
	var oTable = jQuery(".pending-students").dataTable({
		"bServerSide": true,
		"bSort": true,
		"bFilter": true,
		"bInfo": true,
		"bAutoWidth" : false,
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		// "sDom": '<"H"Tfr>t<"F"ip>',
		"sAjaxSource": jQuery(".pending-students").attr('datasource')		
	}).makeEditable({
	    sUpdateURL: jQuery(".pending-students").attr('edittable'),
	    sUpdateHttpMethod: 'GET',
			"aoColumns": [ 
				{ "sWidth" : "10%"}, 
				null, 
				{
					// indicator: 'Updating Email...', 
					// tooltip: 'Click to edit platforms', 
					// type: 'textarea', 
					"sClass": "center"
					// submit:'Save changes'
				}, 
				null,
				{
					indicator: 'Saving Student Registration...', 
					tooltip: 'Click To Approve', 
					loadtext: 'loading...',
					type: 'select', 
					onblur: 'cancel', 
					submit: 'Ok', 
					loadurl: jQuery(".pending-students").attr('student-status'),
					loadtype: 'GET',
					"sClass": "center",
					"bSearchable": false
				} ]	    
    });

    /* Apply the jEditable handlers to the table */
    // oTable.$('td').editable( jQuery(".pending-students").attr('edittable'), {
    //     "callback": function( sValue, y ) {
    //         var aPos = oTable.fnGetPosition( this );
    //         oTable.fnUpdate( sValue, aPos[0], aPos[1] );
    //     },
    //     "submitdata": function ( value, settings ) {
    //         return {
    //             "row_id": this.parentNode.getAttribute('id'),
    //             "column": oTable.fnGetPosition( this )[2]
    //         };
    //     },
    //     "height": "14px",
    //     "width": "100%"
    // } );	

});
</script>

<table 
	class="pending-students" 
	id="pending-students" 
	datasource="<?php echo get_stylesheet_directory_uri() . '/custom/pending-students.php'?>" 
	edittable="<?php echo get_stylesheet_directory_uri() . '/custom/edit-students.php'?>"
	student-status = "<?php echo get_stylesheet_directory_uri() . '/custom/student-status.php'?>"
	>
	<thead>
		<tr>
			<th class="center">ID</th>
			<th class="center">Date</th>
			<th class="center">email</th>
			<th class="center">subject</th>
			<th class="center">status</th>
		</tr>
	</thead>
	<tbody>
	</tbody>
</table>