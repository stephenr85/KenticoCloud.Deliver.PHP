<?php

namespace KenticoCloud\Deliver;

class ContentElementTypesMap extends TypesMap {

	public static $types = array(
		'asset' => '\KenticoCloud\Deliver\Models\Asset'
	);

	public static $defaultTypeClass = '\KenticoCloud\Deliver\Models\ContentItemElement';

}