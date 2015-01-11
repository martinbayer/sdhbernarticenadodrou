<?php
use SdhModel\Event;
class EventsController extends BaseController {
	function createActualPageData() {
		$data = array ();
		$title = trans ( 'content.title_events' );
		$data ['title'] = $title;
		$data ['page_content_title'] = trans ( 'content.events_title' );
		$data ['oposite_events_menuitem'] = trans ( 'content.events_menuitem_archive' );
		$data['events'] = $this->getActualEvents();
		$data['archive'] = false;
		return $data;
	}
	public function showEventsPage() {
		$pageData = $this->createActualPageData();
		return View::make('events.events', $pageData)->render();
	}
	
	function createArchivePageData() {
		$data = array ();
		$title = trans ( 'content.title_archive_events' );
		$data ['title'] = $title;
		$data ['page_content_title'] = trans ( 'content.events_archive_title' );
		$data ['oposite_events_menuitem'] = trans ( 'content.events_menuitem_actual' );
		$data ['events'] = $this->getOldEvents();
		$data ['archive'] = true;
		return $data;
	}
	public function showOldEventsPage(){
		$pageData = $this->createArchivePageData();
		return View::make('events.events',$pageData)->render();
	}
	function getActualEvents(){
		$actualDate = new DateTime('today');
		$data = Event::whereNotNull('to_datetime')->where('to_datetime','>=',$actualDate)->orWhereNull('to_datetime')->where('from_datetime','>=',$actualDate)->get();
		return $data;
	}
	function getOldEvents(){
		$actualDate = new DateTime('today');
		$data = Event::whereNotNull('to_datetime')->where('to_datetime','<',$actualDate)->orWhereNull('to_datetime')->where('from_datetime','<',$actualDate)->get();
		return $data;
	}
}
