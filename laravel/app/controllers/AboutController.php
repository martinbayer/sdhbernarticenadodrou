<?php
use SdhModel\Actuality;
use SdhModel\AboutPart;
class AboutController extends BaseController {
	function createPageData() {
		$data = array ();
		$title = trans ( 'content.title_about' );
		$data ['title'] = $title;
		$data['page_content_title'] = trans ( 'content.about_title' );
		$data['parts'] = AboutPart::where('deleted','=',False)->get();
		return $data;
	}
	public function showAboutPage() {
		$pageData = $this->createPageData ();
		return View::make ( 'about.about', $pageData );
	}
}
