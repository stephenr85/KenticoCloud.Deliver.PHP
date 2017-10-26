<?php

namespace KenticoCloud\Deliver;

class ContentElementTypesMap extends TypesMap {

	public static $types = array(
		'asset' => '\KenticoCloud\Deliver\Models\Elements\Asset',
		'text' => '\KenticoCloud\Deliver\Models\Elements\Text'
	);

	public static $defaultTypeClass = '\KenticoCloud\Deliver\Models\Elements\Element';

}