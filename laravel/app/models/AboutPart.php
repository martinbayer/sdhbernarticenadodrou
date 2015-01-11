<?php 
namespace SdhModel;

class AboutPart extends \Eloquent {
	
	protected $table = 'about_parts';
	protected $guarded = array('id', 'title');
	protected $fillable = array('order_no','content','image','deleted','language_id');
	
	public function language(){
		return $this->hasOne('Language','language_id','id');
	}
}