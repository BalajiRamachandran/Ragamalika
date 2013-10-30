<?php
   include dirname(__FILE__) . '/../../../../wp-load.php';
   get_header();
?>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/ui-lightness/jquery-ui.css" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo get_stylesheet_directory_uri() . '/library/js/jqgrid/ui.jqgrid.css';?>" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo get_stylesheet_directory_uri() . '/library/js/jqgrid/ui.multiselect.css';?>" />

<script src="<?php echo get_stylesheet_directory_uri() . '/library/js/jqgrid/jquery-ui-1.8.2.custom.min.js';?>" type="text/javascript"></script>
<script src="<?php echo get_stylesheet_directory_uri() . '/library/js/jqgrid/jquery.layout.js';?>" type="text/javascript"></script>
<script src="<?php echo get_stylesheet_directory_uri() . '/library/js/jqgrid/grid.locale-en.js';?>" type="text/javascript"></script>
<script type="text/javascript">
   // jQuery.jgrid.no_legacy_api = true;
   // jQuery.jgrid.useJSON = true;
   //http://bramkaslp01/autos2day/wp-content/themes/TheClothesShop/ajax_form_posts.php?q=1&edit=true
</script>
<script src="<?php echo get_stylesheet_directory_uri() . '/library/js/jqgrid/jquery.jqGrid.min.js';?>" type="text/javascript"></script>
<script src="<?php echo get_stylesheet_directory_uri() . '/library/js/jqgrid/jquery.tablednd.js';?>" type="text/javascript"></script>
<!--
<script src="<?php echo get_stylesheet_directory_uri() . '/library/js/jqgrid/jquery.contextmenu.js';?>" type="text/javascript"></script>
-->
<script src="<?php echo get_stylesheet_directory_uri() . '/library/js/jqgrid/ui.multiselect.js';?>" type="text/javascript"></script>

<link rel="stylesheet" type="text/css" media="screen" href="<?php echo get_stylesheet_directory_uri() . '/custom.css';?>" />

<style type="text/css">
/*.ui-jqgrid .ui-jqgrid-bdiv {
   overflow: hidden;
   min-height: 50px;
}
.ui-jqgrid tr.jqgrow td {
   padding: 0 0 0 6px;
}
.ui-jqgrid .ui-jqgrid-hdiv {
   overflow-x: hidden;
}
*/
..ui-paging-info {
   color: black;
}
.ui-jqgrid td input, .ui-jqgrid td select .ui-jqgrid td textarea {
   margin: 4px;
}
.ui-jqgrid .ui-jqgrid-bdiv {
   overflow: hidden;
}

</style>

<script type="text/javascript"> 
   jQuery(document).ready(function(){
   		var debug = "&debug=true";
      jQuery("input[rel*='date']").each(function(){
            jQuery(this).datepicker( { currentText: "Now", dateFormat: "yy-mm-dd", minDate: -90, maxDate: 0 } );
      });
      var param = "";
      var url = '<?php echo get_template_directory_uri(); ?>' + '/custom/get_students.php?version=1';
      var processed = 0;
      display_grid ( url );
   });


   function display_grid ( url, param ) {
     jQuery(".narrow").attr("style","width:100%;");
      site_url = '<?php echo site_url();?>';
      if ( (param == 'undefined') || (param = '') ) {
         param = "&none=none";
      }
      var myGrid = jQuery("#studentlists");
      myGridId = jQuery.jgrid.jqID(myGrid[0].id);

      jQuery("#studentlists").jqGrid({
         url: url,
         datatype: "xml",
         xmlReader : { 
            root: "ObjectXml", 
            row: "Element", 
            page: "ObjectXml>page", 
            total: "ObjectXml>total", 
            records : "ObjectXml>records", 
            userdata : "userdata",
            repeatitems: false, 
            id: "id" 
         },      
            colNames:[
               'Student ID',
               'Student Name', 
               'Date',
               'Email',
               'Phone',
               'Subject',
               'Status',
               'RegisterCode'
               ],
            colModel:[
               {name:'id',index:'id', width:40, xmlmap:"id", align:"center", search: false, xmlmap:"id", sorttype: "int"},
               {name:'Student Name',index:'student_name', width:115, align:"center", search: false, xmlmap:"meta>Your_Name"},
               {name:'Date',index:'date', width:115, align:"center", search: false, xmlmap:"sub_date"},
               {name:'Email',index:'email', width:115, align:"center", search: false, xmlmap:"email"},
               {name:'Phone',index:'phone', width:115, align:"center", search: false, xmlmap:"meta>Phone_Number"},
               {name:'Subject',index:'subject', width:115, align:"center", search: false, xmlmap:"meta>Subject"},
               {name:'Status',index:'status', width:115, align:"center", search: false, xmlmap:"meta>status"},
               {name:'RegisterCode',index:'register_id', width:115, align:"center", search: false, xmlmap:"meta>register_id"}
               // {name:'Make',index:'ad_make', width:70, align:"center", xmlmap:"Meta>ad_make"},
               // {name:'Model',index:'ad_model', width:85, align:"center", xmlmap:"Meta>ad_model"},
               // {name:'Trim',index:'ad_trim', width:70, align:"center", search: false, xmlmap:"Meta>ad_trim"},     
               // {name:'Category',index:'category', width:65, align:"center", sortable:false, xmlmap:"Categories>name"},     
               // {name:'Dealer',index:'dealer', width:135, align:"center", sortable:false, search: false, xmlmap:"User>dealership_name"},     
               // {name:'Dealer Price',index:'ad_price', width:85, align:"center", editable: false, search: false, xmlmap:"Meta>ad_price", formatter:'currency', formatoptions:{decimalSeparator:".", thousandsSeparator: ",", decimalPlaces: 2, prefix: "$ "}},     
               // {name:'Percentage',index:'percentage', width:40, align:"center", search: false, xmlmap:"Meta>percentage"},     
               // {name:'Submit Date',index:'post_date', width:125, align:"center", sorttype: "date", xmlmap:"post_date"},     
               // {name:'Deal Date',index:'deal_date', width:75, align:"center", xmlmap:"Meta>deal-date", search: false, hidden: true},     
               // {name:'Exp Date',index:'exp_date', width:75, align:"center", search: false, xmlmap:"Meta>expiration-time", search: false, hidden: true},     
               // {name:'VIN',index:'VIN', width:75, align:"center", xmlmap:"Meta>ad_vin", hidden: true},     
               // {name:'Miles',index:'Miles', width:75, align:"center", xmlmap:"Meta>ad_miles", search: false, hidden: true},     
               // {name:'NADA',index:'NADA', width:75, align:"center", xmlmap:"Meta>ad_pparty", search: false, hidden: true, formatter:'currency', formatoptions:{decimalSeparator:".", thousandsSeparator: ",", decimalPlaces: 2, prefix: "$ "}},     
               // {name:'Amount',index:'Amount', width:55, align:"center", xmlmap:"A2D>Amount", search: false, hidden: false, sortable: false, formatter:'currency', formatoptions:{decimalSeparator:".", thousandsSeparator: ",", decimalPlaces: 2, prefix: "$ "}},     
               // {name:'customerPaymentProfileId',index:'customerPaymentProfileId', width:75, align:"center", xmlmap:"Meta>customerPaymentProfileId", hidden: true},     
               // {name:'TransactionID',index:'customerPaymentProfileId', width:75, align:"center", xmlmap:"A2D>TransactionID", hidden: true},     
               // {name:'AuthorizationCode',index:'customerPaymentProfileId', width:75, align:"center", xmlmap:"A2D>AuthorizationCode", hidden: true},     
               // {name:'DateAuthorized',index:'customerPaymentProfileId', width:75, align:"center", xmlmap:"A2D>DateAuthorized", hidden: true},                                                  
               // {name:'Status',index:'status', width:104, align:"center", xmlmap:"post_status",editable:true},
               // {name:'Viewed',index:'view_count', width:60, align:"center", xmlmap:"Meta>view_count", sorttype: "int", editable:false},
               // {name:'Days Published',index:'days_published', width:80, align:"center", xmlmap:"Meta>days_published", sorttype: "int", editable:false},
               // {name:'Trans Status',index:'trans_status', width:304, align:"center", xmlmap:"trans_status",editable:true, hidden: true}
            ],
            rowNum:50,
            rowList:[10,50,100,150,200,500],
            pager: jQuery('#listingpager'),
            sortname: 'id',
            multiselect: true,
            viewrecords: true,
            sortorder: "DESC",
            loadonce:false,
            caption:"List of Student Requests",
            height: "100%",
            editable: true,
            toolbar: [true,"top"],          
            autowidth: true,
            editurl: url + "?edit=true&version=1",
            shrinkToFit: true,
            recordpos: 'right',
            hidegrid: false,
            beforeRequest: function () {
            },
            gridComplete: function() {
               jQuery(".ui-jqgrid").find("table").each(function(){
               });
               jQuery(".ui-jqgrid-bdiv").css("height", "auto");
               // jQuery(".ui-paging-info").css("color", "black");
                jQuery("#approve_" + myGridId).addClass('ui-state-disabled');
                jQuery("#reject_" + myGridId).addClass('ui-state-disabled');               
            }
            ,
            onSelectRow: function (rowid) {
               var selRowId = jQuery(this).getGridParam('selrow');
               // alert ( jQuery(this).jqGrid('getGridParam','selarrrow') );
               // alert ( myGrid.jqGrid ('getGridParam', 'selrow') );
               tr = jQuery(this.rows.namedItem(rowid));
               thisId = jQuery.jgrid.jqID(this.id);
               // jQuery("#edit_" + thisId).addClass('ui-state-disabled');
               jQuery("#approve_" + thisId).removeClass('ui-state-disabled');
               jQuery("#reject_" + thisId).removeClass('ui-state-disabled');
               jQuery("#del_" + thisId).removeClass('ui-state-disabled');
               return true;
            },
            afterComplete : function (response, postdata, formid) {
            }
      });
      // jQuery("#studentlists").jqGrid('navGrid',"#listingpager",{edit:true,add:false,del:true,view:false},{},{},{}, {multipleSearch:true, multipleGroup:false, showQuery: true, resize: true, closeOnEscape: true});
      jQuery("#studentlists").jqGrid('navGrid',"#listingpager",{edit:false,add:false,del:true,view:false,search:false});//,{},{},{}, {});
      jQuery("#edit_" + myGridId).addClass('ui-state-disabled');
      jQuery("#del_" + myGridId).addClass('ui-state-disabled');


      // jQuery("#studentlists").jqGrid('navButtonAdd',"#listingpager",{caption:"Toggle",title:"Toggle Search Toolbar", buttonicon :'ui-icon-pin-s',
      //    onClickButton:function(){
      //       myGrid[0].toggleToolbar()
      //    } 
      // });
      // jQuery("#studentlists").jqGrid('navButtonAdd',"#listingpager",{caption:"Clear",title:"Clear Search",buttonicon :'ui-icon-refresh',
      //    onClickButton:function(){
      //       myGrid[0].clearToolbar()
      //    } 
      // });
      // jQuery("#studentlists").jqGrid('filterToolbar');


      jQuery("#studentlists").navButtonAdd('#listingpager', {
         caption: "Approve", title:"Approve", buttonicon:"ui-icon-tag", id: "approve_" + myGridId,
         onClickButton: function(){ 
            var selectedRows = jQuery("#studentlists").jqGrid('getGridParam','selarrrow');
            if ( selectedRows != "") {
               jQuery.ajax ({
                  url: url + "&id="+selectedRows + "&action=approved&debug=true"
               });
               jQuery("#studentlists").trigger("reloadGrid"); 
            } else {
               alert("Please Select Row!"); 
            }
      }, 
         position:"last"
      });
      jQuery("#studentlists").navButtonAdd('#listingpager', {
         caption: "Reject", title:"Reject", buttonicon:"ui-icon-cancel", id: "reject_" + myGridId,
         onClickButton: function(){ 
            var selectedRows = jQuery("#studentlists").jqGrid('getGridParam','selarrrow');
            if ( selectedRows != "") {
               jQuery.ajax ({
                  url: url + "&id="+selectedRows + "&action=rejected&debug=true"
               });
               jQuery("#studentlists").trigger("reloadGrid"); 
            } else {
               alert("Please Select Row!"); 
            }
      }, 
         position:"last"
      });      
      // jQuery("#studentlists").navButtonAdd('#listingpager', {
      //    caption:"Export", title: "Export to CSV", buttonicon:"ui-icon-newwin", 
      //    onClickButton: function(){ 
      //       exportExcel();
      // }, 
      //    position:"last"
      // });      
    jQuery("#approve_" + myGridId).addClass('ui-state-disabled');
    jQuery("#reject_" + myGridId).addClass('ui-state-disabled');
    jQuery(document).ready(function(){
      jQuery("#cb_" + myGridId).live("click", function(){
         if ( jQuery("#cb_" + myGridId).is(":checked") ) {
             jQuery("#approve_" + myGridId).removeClass('ui-state-disabled');
             jQuery("#reject_" + myGridId).removeClass('ui-state-disabled');            
         } else {
             jQuery("#approve_" + myGridId).addClass('ui-state-disabled');
             jQuery("#reject_" + myGridId).addClass('ui-state-disabled');

         }
      });
    });

   }

   function exportExcel() {
      var filename = '<?php echo date("yy-mm-dd");?>';
      var mya = new Array();
      mya = jQuery("#studentlists").getDataIDs();  // Get All IDs
      var data = jQuery("#studentlists").getRowData(mya[0]);     // Get First row to get the labels
      var colNames = new Array(); 
      var ii=0;
      var html="";
      for (var i in data){
         colNames[ii++]=i;
         html = html + i + ",";
      }    // capture col names
      html=html+"<br/>";
      for (i=0; i<mya.length; i++)
          {
          data = jQuery("#studentlists").getRowData(mya[i]); // get each row
          for( j=0; j<colNames.length; j++)
              {
               html = html+data[colNames[j]]+","; // output each column as tab delimited
              }
          html=html+"<br/>";  // output each row with end of line

          }
      html=html+"\r\n";  // end of line at the end
      jQuery("#csvBuffer").val( html );
      jQuery(".export_form").attr("method", "POST");
      jQuery(".export_form").attr("action" , '<?php echo get_protocol();?>' + NWS_template_directory_alt + '/csvExport.php');  // send it to server which will open this contents in excel file
      jQuery(".export_form").attr("target", '_blank');
      jQuery(".export_form").submit();      
   }				
</script>
<?php   
   // echo '<form name="exportData" id="exportData" action="">' . "\r\n";
   // echo '  <table>' . "\r\n";
   // echo '    <tr>' . "\r\n";
   // echo '      <td>StartDate</td>' . "\r\n";
   // echo '      <td>' . "\r\n";
   // echo '        <input type="text" rel="date" id="startDate" required/>' . "\r\n";
   // echo '      </td>' . "\r\n";
   // echo '      <td>EndDate</td>' . "\r\n";
   // echo '      <td>' . "\r\n";
   // echo '        <input type="text" rel="date" id="endDate" required/>' . "\r\n";
   // echo '      </td>' . "\r\n";
   // echo '      <td>' . "\r\n";
   // echo '        <input type="submit" value="GO" />' . "\r\n";
   // echo '      </td>' . "\r\n";
   // echo '    </tr>' . "\r\n";
   // echo '  </table>' . "\r\n";
   // echo '</form>' . "\r\n";

   echo '<table id="studentlists"></table>';
   echo '<div id="listingpager"></div>';
   echo '<hr/>';
   echo '<form class="export_form display-hide">';
   echo '<input type="hidden" name="csvBuffer" id="csvBuffer"/>';
   echo '</form>'
?>