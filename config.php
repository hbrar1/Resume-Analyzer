<?php
$script_dir = "http://publications.muet.edu.pk/";
$script_dir_page = "http://publications.muet.edu.pk/";
/*$production_script_dir_page = "http://thecard.se/";*/

/*$script_dir = "http://www.designwebshop.se/point_online/euroflower/";
$script_dir_page = "http://www.designwebshop.se/point_online/";
*/

$cms_password = 'pass';
$prefix = "ejournal_";

$student_registration = 'registration';
$page_tab = $prefix.'pages';
$paper_tab = $prefix.'paper_list';
$paper_details = $prefix.'paper_details';
$reviewer_atb= $prefix.'reviewer';
$co_author_tab=$prefix.'co_author';
$reference_tab=$prefix.'paper_references';
$admin_tab=$prefix.'admin_login';
$year_tab = $prefix.'year';
$email_tab = $prefix.'email_queue';
$journal_archive_tab= $prefix.'journal_archive';

$usr = "root";
$pwd = "";
$db = "onlineexamdb";
$host = "localhost";

//$usr = "publicat_dbuser";
//$pwd = "S2KgFFgSeDuq";
//$db = "publicat_muetexams";
//$host = "localhost";



$table = "ejournal_pages";
$cid = mysql_connect($host,$usr,$pwd);
if( !$cid ) {
	echo("ERROR: " . mysql_error() . "\n");
}	else {
		//echo "Database selected";
	mysql_select_db( $db );
}
function page_class( $id,$table){

	   $sql = 'SELECT * FROM  '.$table.' where id = ' . $id;

	    $retid = mysql_query( $sql);
	    if( !$retid ) {
	    	echo( mysql_error() );
		}
	    $row = mysql_fetch_array($retid);
	    $content = $row['content'];
		$content = change_chars($content);
		return $content; 
	}


	function change_chars($content) {
		$content = str_replace('\\','',$content);
		$content = str_replace('"','\'',$content);
		$content = str_replace('[','<',$content);
		$content = str_replace(']','>',$content);
		$content = str_replace('','',$content);
		$content=str_replace('rel=lightboxsindexgalcindex','onclick="Lightbox.start(this); return false;" rel="lightbox[gal1]"',$content);
		$content=str_replace('rel=\'lightboxsindexgalcindex\'','onclick="Lightbox.start(this); return false;" rel="lightbox[gal1]"',$content);
		$content = str_replace('border-right: #000 1px solid;','border-right: 0px;',$content);
		$content = str_replace('border-left: #000 1px solid;','border-left: 0px;',$content);
		$content = str_replace('border-top: #000 1px solid;','border-top: 0px;',$content);
		$content = str_replace('border-bottom: #000 1px solid;','border-bottom: 0px;',$content);
		$content = str_replace('BORDER-BOTTOM: #000 1px solid;','BORDER-BOTTOM: 0px;',$content);
		$content = str_replace('BORDER-TOP: #000 1px solid;','BORDER-TOP: 0px;',$content);
		$content = str_replace('BORDER-RIGHT: #000 1px solid;','BORDER-RIGHT: 0px;',$content);
		$content = str_replace('BORDER-LEFT: #000 1px solid;','BORDER-LEFT: 0px;',$content);
		$content = str_replace('border:#000 1px solid;','border: 0px;',$content);
		$content = str_replace('border: 1px solid rgb(0, 0, 0);','border: 0px;',$content);
		$content = str_replace("img src='http://localhost/euroway_2media/","img src='http://www.eurowaymedia.com/test123/",$content);

		return $content;
	}
	
?>