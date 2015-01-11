<?php namespace SdhModel;

class Language extends \Eloquent {
	
	protected $table = 'languages';
	protected $guarded = array('id', 'shortcut');
	protected $fillable = array('name');
}