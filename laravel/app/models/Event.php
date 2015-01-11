<?php
namespace SdhModel;

class Event extends \Eloquent {
	
	protected $table = 'events';
	protected $guarded = array('id', 'shortcut');
	protected $fillable = array('title','from_datetime', 'show_from_time', 'show_to_time', 'to_datetime','html_description','image','language_id');
	
	public function language(){
		return $this->hasOne('Language','language_id','id');
	}
	
	public function getDateTimeRange(){
		$rangeString = '';
		/* date time is always mandatory so it does not have to be checked for NULL */
		if($this->show_from_time){
			$rangeString = date(\Variables::DATE_TIME_FORMAT, strtotime($this->from_datetime)); 
		}else{
			$rangeString = date(\Variables::DATE_FORMAT, strtotime($this->from_datetime));
		}
		/* now check whether the to_datetime is contained and if its time should be displayed too */
		if($this->to_datetime!=null){
			if($this->show_to_time){
				$rangeString = $rangeString . ' - ' . date(\Variables::DATE_TIME_FORMAT, strtotime($this->to_datetime));
			}else{
				$rangeString = $rangeString . ' - ' . date(\Variables::DATE_FORMAT, strtotime($this->to_datetime));
			}		
		}
		return $rangeString;
	}
}