<?php
namespace SdhModel;

class PartyEquipment extends \Eloquent {
	
	protected $table = 'party_equipments';
	protected $guarded = array('id', 'title');
	protected $fillable = array('content', 'image', 'language_id');
	
	public function language(){
		return $this->hasOne('Language','language_id','id');
	}
}