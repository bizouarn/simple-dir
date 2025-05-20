<?php
/* 
Free PHP File Directory Listing Script - Version 1.20

The MIT License (MIT)

Copyright (c) 2015 Hal Gatewood
https://github.com/halgatewood/file-directory-list/
Modified by (c) 2024 Aymeric BIZOUARN

*/	// OPTIONS
	setlocale(LC_TIME, 'fr_FR');
	// TITLE OF PAGE
	$title = "Liste des fichiers";
	// STYLING (light or dark)
	$color	= "light";
	// ADD SPECIFIC FILES YOU WANT TO IGNORE HERE
	$ignore_file_list = array( ".htaccess", "index.php", ".git", ".icones" );
	// ADD SPECIFIC FILE EXTENSIONS YOU WANT TO IGNORE HERE, EXAMPLE: array('psd','jpg','jpeg')
	$ignore_ext_list = array( "config" );
	// SORT BY
	$sort_by = "name_asc"; // options: name_asc, name_desc, date_asc, date_desc
	// ICON URL
	$icon_url = "data:image/png;base64,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";
	// TOGGLE SUB FOLDERS, SET TO false IF YOU WANT OFF
	$toggle_sub_folders = true;
	// FORCE DOWNLOAD ATTRIBUTE
	$force_download = false;
	// IGNORE EMPTY FOLDERS
	$ignore_empty_folders = true;
	// SET TITLE BASED ON FOLDER NAME, IF NOT SET ABOVE
	if( !$title ) { $title = clean_title(basename(dirname(__FILE__))); }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title><?php echo $title; ?></title>
	<meta charset="utf-8">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<link href="//fonts.googleapis.com/css?family=Lato:400,900" rel="stylesheet" type="text/css">
	<style>
		*, *:before, *:after { -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box; }
		body { background: #dadada; font-family: "Lato", "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; font-weight: 400; font-size: 14px; line-height: 18px; padding: 0; margin: 0; text-align: center;}
		.wrap { max-width: 100%; max-width: 800px; margin: 20px auto; background: white; padding: 20px; border-radius: 3px; text-align: left;}
		@media only screen and (max-width: 700px) { .wrap { padding: 15px; } }
		h1 { text-align: center; margin: 40px 0; font-size: 22px; font-weight: bold; color: #666; }
		a { color: #399ae5; text-decoration: none; } a:hover { color: #206ba4; text-decoration: none; }
		.note { padding: 0 5px 25px 0; font-size:80%; color: #666; line-height: 18px; }
		.block { clear: both; min-height: 70px; border-top: solid 1px #ECE9E9; }
		.block:first-child { border: none; }
		.block .img { width: 50px; height: 50px; display: block; float: left; background: transparent url(<?php echo $icon_url; ?>) no-repeat 0 0; margin: 10px 5px;}
		.block .file { padding-bottom: 5px; }
		.block .data { line-height: 1.3em; color: #666; }
		.block a { display: block; padding: 5px; transition: all 0.35s; }
		.block a:hover, .block a.open { text-decoration: none; background: #efefef; }
		.name { min-height: 60px; }
		
		.bold { font-weight: 900; }
		.upper { text-transform: uppercase; }
		.fs-1 { font-size: 1em; } .fs-1-1 { font-size: 1.1em; } .fs-1-2 { font-size: 1.2em; } .fs-1-3 { font-size: 1.3em; } .fs-0-9 { font-size: 0.9em; } .fs-0-8 { font-size: 0.8em; } .fs-0-7 { font-size: 0.7em; }
		
		.jpg, .jpeg, .gif, .png { background-position: -50px 0 !important; } 
		.pdf { background-position: -100px 0 !important; } 
		.txt, .rtf { background-position: -150px 0 !important; }
		.xls, .xlsx { background-position: -200px 0 !important; } 
		.ppt, .pptx { background-position: -250px 0 !important; } 
		.doc, .docx { background-position: -300px 0 !important; }
		.zip, .rar, .tar, .gzip { background-position: -350px 0 !important; }
		.swf { background-position: -400px 0 !important; } 
		.fla { background-position: -450px 0 !important; }
		.mp3 { background-position: -500px 0 !important; }
		.wav { background-position: -550px 0 !important; }
		.mp4 { background-position: -600px 0 !important; }
		.mov, .aiff, .m2v, .avi, .pict, .qif { background-position: -650px 0 !important; }
		.wmv, .avi, .mpg { background-position: -700px 0 !important; }
		.flv, .f2v { background-position: -750px 0 !important; }
		.psd { background-position: -800px 0 !important; }
		.ai { background-position: -850px 0 !important; }
		.html, .xhtml, .dhtml, .php, .asp, .css, .js, .inc { background-position: -900px 0 !important; }
		.dir { background-position: -950px 0 !important; }
		
		.sub { margin-left: 20px; border-left: solid 5px #ECE9E9; display: none; }
		
		body.dark { background: #1d1c1c; color: #fff; }
		body.dark h1 { color: #fff; }
		body.dark .wrap { background: #2b2a2a; }
		body.dark .block { border-top: solid 1px #666; }
		body.dark .block a:hover, body.dark .block a.open { background: #000; }
		body.dark .note { color: #fff; }
		body.dark .block .data { color: #fff; }
		body.dark .sub { border-left: solid 5px #0e0e0e; }
	</style>
</head>
<body class="<?php echo $color; ?>">
<h1><?php echo $title ?></h1>
<div class="wrap">
<?php
function clean_title($title)
{
	return ucwords( str_replace( array("-", "_"), " ", $title) );
}

function ext($filename) 
{
	return pathinfo($filename, PATHINFO_EXTENSION);
}

function display_size($bytes, $precision = 2) 
{
	$units = array('B', 'KB', 'MB', 'GB', 'TB');
	$bytes = max($bytes, 0); 
	$pow = floor(($bytes ? log($bytes) : 0) / log(1024)); 
	$pow = min($pow, count($units) - 1); 
	$bytes /= (1 << (10 * $pow)); 
	return round($bytes, $precision) . '<span class="fs-0-8 bold">' . $units[$pow] . "</span>";
}

function count_dir_files( $dir)
{
	return iterator_count(new FilesystemIterator($dir, FilesystemIterator::SKIP_DOTS));
}

function get_directory_size($path)
{
	$bytestotal = 0;
	$path = realpath($path);
	if($path!==false && $path!='' && file_exists($path))
	{
		foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS)) as $object)
		{
			$bytestotal += $object->getSize();
		}
	}
	
	return display_size($bytestotal);
}

function extract_url_from_shortcut($file) {
	if (!file_exists($file) || ext($file) !== 'url') {
		return false;
	}
	$content = file_get_contents($file);
	if ($content === false) {
		return false;
	}
	$lines = explode("\n", $content);
	foreach ($lines as $line) {
		if (strpos($line, 'URL=') === 0) {
			return trim(substr($line, 4));
		}
	}
	return false;
}

// SHOW THE MEDIA BLOCK
function display_block( $file )
{
	global $ignore_file_list, $ignore_ext_list, $force_download;
	
	$file_ext = ext($file);
	if( !$file_ext AND is_dir($file)) $file_ext = "dir";
	if(in_array($file, $ignore_file_list) || in_array($file_ext, $ignore_ext_list)) return;
	
	$download_att = ($force_download AND $file_ext != "dir" ) ? " download='" . basename($file) . "'" : "";
	
	$rtn = "<div class=\"block\">";
	if ($file_ext === "url"){
		$url = extract_url_from_shortcut($file);
		$rtn .= "<a href=\"$url\" class=\"$file_ext\" target=\"_blank\">";
	} else {
		$rtn .= "<a href=\"$file\" class=\"$file_ext\"{$download_att}>";
	}
	if (file_exists(".icones/".basename($file).".png")){
		$rtn .= "<div class=\"img md\" style=\"background: url('.icones/".basename($file).".png') no-repeat 0 0; background-size: contain;\"></div>";
	} else {
		$rtn .= "<div class=\"img $file_ext\"></div>";
	}
	$rtn .= "<div class=\"name\">";
	$rtn .= "<div class=\"file fs-1-2 bold\">" . basename($file) . "</div>";
	if ($file_ext === "dir") 
	{
		$rtn .= "<div class=\"data upper size fs-0-7\"><span class=\"bold\">" . count_dir_files($file) . "</span> fichiers</div>";
		$rtn .= "<div class=\"data upper size fs-0-7\"><span class=\"bold\">Taille : </span> " . get_directory_size($file) . "</div>";
	}
	else
	{
		$rtn .= "<div class=\"data upper size fs-0-7\"><span class=\"bold\">Taille:</span> " . display_size(filesize($file)) . "</div>";
		$rtn .= "<div class=\"data upper modified fs-0-7\"><span class=\"bold\">Modifié le : </span> " . date("d/m/Y", filemtime($file)) . "</div>";	
	}
	$rtn .= "</div>";
	$rtn .= "</a>";
	$rtn .= "</div>";
	return $rtn;
}

// RECURSIVE FUNCTION TO BUILD THE BLOCKS
function build_blocks( $items, $folder )
{
	global $ignore_file_list, $ignore_ext_list, $sort_by, $toggle_sub_folders, $ignore_empty_folders;
	
	$objects = array();
	$objects['directories'] = array();
	$objects['files'] = array();
	
	foreach($items as $c => $item)
	{
		$file_ext = ext($item);
		if( $item == ".." 
			|| $item == "."
			|| in_array($item, $ignore_file_list)
			|| in_array($file_ext, $ignore_ext_list)
		) continue;
	
		if( $folder && $item )
		{
			$item = "$folder/$item";
		}
		if( is_dir($item) ) // DIRECTORIES
		{
			$objects['directories'][] = $item; 
		}
		else if( $item ) // FILES
		{
			$file_time = date("U", filemtime($item));
			$objects['files'][$file_time . "-" . $item] = $item;
		}
	}
	
	foreach($objects['directories'] as $c => $file)
	{
		$sub_items = (array) scandir( $file );
		
		if( $ignore_empty_folders )
		{
			$has_sub_items = false;
			foreach( $sub_items as $sub_item )
			{
				$sub_fileExt = ext( $sub_item );
				if( $sub_item == ".." OR $sub_item == "."
					|| in_array($sub_item, $ignore_file_list)
					|| in_array($sub_fileExt, $ignore_ext_list)
				) continue;
			
				$has_sub_items = true;
				break;	
			}
			
			if( $has_sub_items ) echo display_block( $file );
		}
		else
		{
			echo display_block( $file );
		}
		
		if( $toggle_sub_folders && $sub_items )
		{
			echo "<div class='sub' data-folder=\"$file\">";
			build_blocks( $sub_items, $file );
			echo "</div>";
		}
	}
	
	// SORT BEFORE LOOP
	if( $sort_by == "date_asc" ) { ksort($objects['files']); }
	elseif( $sort_by == "date_desc" ) { krsort($objects['files']); }
	elseif( $sort_by == "name_asc" ) { natsort($objects['files']); }
	elseif( $sort_by == "name_desc" ) { arsort($objects['files']); }
	
	foreach($objects['files'] as $t => $file)
	{
		$fileExt = ext($file);
		if( in_array($file, $ignore_file_list) || in_array($fileExt, $ignore_ext_list))
			continue; 
		echo display_block( $file );
	}
}

// GET THE BLOCKS STARTED, FALSE TO INDICATE MAIN FOLDER
build_blocks( scandir( dirname(__FILE__) ), false );
?>
<?php if($toggle_sub_folders) { ?>
<script>
	$(function() {
		$("a.dir").click(function(e)
		{
			$(this).toggleClass('open');
		 	$('.sub[data-folder="' + $(this).attr('href') + '"]').slideToggle();
			e.preventDefault();
		});
	});
</script>
<?php } ?>
</div>
</body>
</html>