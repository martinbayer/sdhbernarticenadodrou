<?php

class PhotoSourceHelper{
	public static function getPhotographs($foldername) {
		$photographs = glob ( $foldername . '/*.{jpg,JPG,png}',GLOB_BRACE );
		$result = array();
		if ($photographs != null) {
			foreach ( $photographs as $photo ) {
				array_push ( $result, basename ( $foldername ) . '/' . basename ( $photo ) );
			}
		}
		return $result;
	}
	
}