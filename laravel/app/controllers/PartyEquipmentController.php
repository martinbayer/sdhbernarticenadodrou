<?php
use SdhModel\PartyEquipment;
class PartyEquipmentController extends BaseController {
	function createPageData() {
		$data = array ();
		$title = trans ( 'content.title_party_equipment' );
		$data ['title'] = $title;
		$data['page_content_title'] = trans('content.party_equipment_title');
		$data['page_renting_ad'] = trans('content.party_equipment_renting_ad');
		$data['items'] = PartyEquipment::get();
		return $data;
	}
	public function showEquipmentPage() {
		$inipath = php_ini_loaded_file();
		$pageData = $this->createPageData ();
		return View::make ( 'partyequipment.partyequipment', $pageData )->render();
	}
}
