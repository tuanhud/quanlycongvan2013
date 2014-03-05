<?php 
/**
 * PHP Grid Component
 *
 * @author Abu Ghufran <gridphp@gmail.com> - http://www.phpgrid.org
 * @version 1.4.6
 * @license: see license.txt included in package
 */
// set your db encoding -- for ascent chars (if required)
mysql_query("SET NAMES 'utf8'");

include("inc/jqgrid_dist.php");

// you can customize your own columns ...

$col = array();
$col["title"] = "Mã Đăng ký"; // caption of column
$col["name"] = "MaDK"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias) 
$col["width"] = "40";
$col["editable"] = false;
$cols[] = $col;		
		
$col = array();
$col["title"] = "Số kí hiệu";
$col["name"] = "SoKH";
$col["width"] = "40";
$col["editable"] = true; // this column is not editable // this column is not editable
$col["search"] = true; // this column is not searchable

# $col["formatter"] = "image"; // format as image -- if data is image url e.g. http://<domain>/test.jpg
# $col["formatoptions"] = array("width"=>'20',"height"=>'30'); // image width / height etc

$cols[] = $col;

$col = array();
$col["title"] = "Trích yếu";
$col["name"] = "TrichYeu";
$col["width"] = "100"; // not specifying width will expand to fill space
$col["sortable"] = false; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = true;
$col["edittype"] = "textarea"; // render as textarea on edit
$col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes
$cols[] = $col;

$col = array();
$col["title"] = "Active";
$col["name"] = "Active";
$col["width"] = "40";
$col["editable"] = true; // this column is not editable // this column is not editable
$col["type"] = "checkbox";
$col["edittype"] = "checkbox";
$col["editoptions"] = array("value"=>"1:0", "checked"=>"checked"); 
$col["search"] = true; // this column is not searchable

# $col["formatter"] = "image"; // format as image -- if data is image url e.g. http://<domain>/test.jpg
# $col["formatoptions"] = array("width"=>'20',"height"=>'30'); // image width / height etc

$cols[] = $col;

$g = new jqgrid();

// $grid["url"] = ""; // your paramterized URL -- defaults to REQUEST_URI
$grid["rowNum"] = 15; // by default 20
$grid["sortname"] = 'MaDK'; // by default sort grid by this field
$grid["sortorder"] = "asc"; // ASC or DESC
$grid["caption"] = "Khôi phục công văn"; // caption of grid
$grid["autowidth"] = true; // expand grid to screen width
$grid["width"] = "700";
$grid["multiselect"] = false; // allow you to multi-select through checkboxes

$g->set_options($grid);
$g->set_actions(array(	
						"add"=>true, // allow/disallow add
						"edit"=>true, // allow/disallow edit
						"delete"=>true, // allow/disallow delete
						"rowactions"=>true, // show/hide row wise edit/del/save option
						"search" => "advance" // show single/multi field search condition (e.g. simple or advance)
					) 
				);

// you can provide custom SQL query to display data
$g->select_command = "SELECT * FROM congvan o";

// this db table will be used for add,edit,delete
$g->table = "phongban";

// pass the cooked columns to grid
$g->set_columns($cols);

// generate grid output, with unique grid name as 'list1'
$out = $g->render("list1");

$themes = array("ui-lightness","smoothness","start","dot-luv","excite-bike","flick","ui-darkness","ui-lightness","cupertino","dark-hive");
$i = rand(0,0);
?>