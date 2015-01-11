<?php
class GalleryController extends BaseController {
	function createPageData() {
		$galleries = array ();
		$folders = glob ( public_path ( Variables::GALLERIES_FOLDER . '/*' ) );
		foreach ( $folders as $folder ) {
			if (is_dir ( $folder )) {
				\array_push ( $galleries, $this->readGalleryInfo ( $folder ) );
			}
		}
		$data = array ();
		$title = trans ( 'content.title_gallery' );
		$data ['title'] = $title;
		$data ['page_content_title'] = trans ( 'content.galleries_title' );
		usort ( $galleries, array (
				$this,
				"gallerySort" 
		) );
		$data ['galleries'] = $galleries;
		return $data;
	}
	public function showGalleries() {
		$pageData = $this->createPageData ();
		return View::make ( 'galleries.galleries', $pageData )->render ();
	}
	function readGalleryInfo($folder) {
// 		dd($folder);
		$galleryInfoFileContent = file_get_contents ( $folder . '/description.json' );
		$galleryInfoArray = json_decode ( $galleryInfoFileContent );
		if($galleryInfoArray==null){
			dd($folder);
		}
		return new Gallery ( $galleryInfoArray->title, DateTime::createFromFormat ( 'd/m/Y', $galleryInfoArray->date ), basename ( $folder ), $galleryInfoArray->description, PhotoSourceHelper::getPhotographs ( $folder ) );
	}
	function gallerySort($g1, $g2) {
		return $g1->date == $g2->date ? 0 : ($g1->date > $g2->date) ? - 1 : 1;
	}
	function showGallery($foldername) {
		$galleryInfo = $this->readGalleryInfo ( public_path ( Variables::GALLERIES_FOLDER ) . '/' . $foldername );
		$data = array ();
		$data ['folder'] = Variables::GALLERIES_FOLDER;
		$data ['photonames'] = $galleryInfo->photographs;
		$data ['page_content_title'] = $galleryInfo->title;
		return View::make ( 'galleries.gallery', $data )->render ();
	}
}
class Gallery {
	public $title;
	public $date;
	public $foldername;
	public $description;
	public $photographs;
	function __construct($title, $date, $foldername, $description, $photographs) {
		$this->title = $title;
		$this->date = $date;
		$this->foldername = $foldername;
		$this->description = $description;
		$this->photographs = $photographs;
	}
	function getDateAsString() {
		return $this->date->format ( 'Y-m-d' );
	}
	function __toString() {
		return $this->title . "-" . $this->date->format ( 'Y-m-d' );
	}
}