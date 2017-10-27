<?php

namespace KenticoCloud\Deliver;

class ContentElementTypesMap extends TypesMap {

	public $types = array(
		'asset' => '\KenticoCloud\Deliver\Models\Elements\Asset',
		'text' => '\KenticoCloud\Deliver\Models\Elements\Text'
	);

	public $defaultTypeClass = '\KenticoCloud\Deliver\Models\Elements\Element';

}