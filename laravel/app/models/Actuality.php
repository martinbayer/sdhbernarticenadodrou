<?php
namespace SdhModel;

class Actuality extends \Eloquent {
	
	protected $table = 'actualities';
	protected $guarded = array('id', 'title');
	protected $fillable = array('order_no','content','reference','active','language_id');
	
	public function language(){
		return $this->hasOne('Language','language_id','id');
	}
}