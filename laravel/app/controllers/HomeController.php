<?php
use SdhModel\Actuality;
class HomeController extends BaseController {
	function createPageData() {
		$data = array ();
		$photographs = array();
		$homePhotosFolder = public_path (Variables::HOME_IMAGES_FOLDER);
		$photographNames = PhotoSourceHelper::getPhotographs($homePhotosFolder);
		if($photographNames!=null){
			foreach($photographNames as $photoName){
				array_push($photographs,$homePhotosFolder . '/' . basename($photoName));
			}
		}
		$title = trans ( 'content.title_home' );
		$data ['title'] = $title;
		
		/* create data for actualities */
		$data ['actualitiesTitle'] = trans ( 'content.actualities_title' );
		$data ['photographs'] = $photographs;
		if(count($photographs)>0){
			$data ['active_idx'] = rand(0, count($photographs)-1);
		}else{
			$data ['active_idx'] = -1;
		}
		$actualities = Actuality::where('active','=',True)->get();
		$data ['actualities'] = $actualities;
		return $data;
	}
	public function showHomePage() {
		$pageData = $this->createPageData ();
		return View::make ( 'home', $pageData );
	}
}
