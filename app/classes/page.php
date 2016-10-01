<?php


class Page{

		var $template;

		function renderPage(){
			$html="";

			echo"<!DOCTYPE html>";
			echo"<html>";
			echo"<head>";
			require_once('templates/header.php');
			echo"</head>";
			echo"<body>";
			if(isset($this->template)){
				require_once($this->template);
			}
			require_once('templates/footer.php');
			echo "</body>";
			echo"<html>";

			echo $html;
		}

}

?>