<?php
class ContactController extends BaseController {
	
	private $company_id = "654 72 306";
	function createPageData() {
		$data = array ();
		$title = trans('content.contact_title' );
		$data ['title'] = $title;
		$data['page_content_title'] = trans('content.contact_title');
		$data['subtitle'] = trans('content.contact_subtitle');
		$data['mayorcontacttitle'] = trans('content.contact_mayor');
		$data['rentcontacttitle'] = trans('content.contact_equipment_rent');
		$data['contact_email_label'] = trans('content.contact_email_label');
		$data['contact_email_label_short'] = trans('content.contact_email_label_short');
		
		$data['contact_name_label'] = trans('content.contact_name_label');
		$data['contact_name_label_short'] = trans('content.contact_name_label_short');
		
		$data['contact_phone_label'] = trans('content.contact_phone_label');
		$data['contact_phone_label_short'] = trans('content.contact_phone_label_short');
		
		$data['main_contact'] = $this->getMainContact();
		$data['mayor_contact'] = $this->getMayorContact();
		$data['rent_contact'] = $this->getEquipmentRentingContact();
		$data['commercial_reg_record'] = trans('content.contact_commercial_register_record');
		$data['company_name']=trans('content.contact_company_name');
		$data['company_id'] = $this->company_id;
		return $data;
	}
	public function showContactPage() {
		$pageData = $this->createPageData ();
		return View::make ( 'contact.contact', $pageData );
	}
	
	function getMainContact(){
		$mainContact = new Contact();
		$mainContact->city = "Bernartice nad Odrou";
		$mainContact->email="sdhbernarticenadodrou@gmail.com";
		$mainContact->zipcode ="741 01";
		$mainContact->number = "200";
		return $mainContact;
	}
	
	function getMayorContact(){
		$mayorContact = new Contact();
		$mayorContact->phone = "+420 732 954 331";
		$mayorContact->email = "Tom.Horut@seznam.cz";
		$mayorContact->name = "Tomáš Horut";
		return $mayorContact;
	}
	
	function getEquipmentRentingContact(){
		$rentContact = new Contact();
		$rentContact->phone = "+420 604 729 266";
		$rentContact->name = "Radek Kavan";
		return $rentContact;
	}
}
class Contact{
	public $city;
	public $number;
	public $zipcode;
	public $email;
	public $phone;
	public $name;
}
class ContactPage{
	public $maintitle;
	public $subtitle;
	public $phonelabel;
	public $emaillabel;
}