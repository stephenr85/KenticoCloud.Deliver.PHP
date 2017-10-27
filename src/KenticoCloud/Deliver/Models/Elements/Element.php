<?php

namespace KenticoCloud\Deliver\Models\Elements;

use KenticoCloud\Deliver\Models\Model;

class Element extends Model {

	public $type = null;
	public $value = null;

	public function getValue(){
		return $this->value;
	}
}