<?php
namespace n2n\web\dispatch\mag;

use n2n\impl\web\ui\view\html\HtmlView;
use n2n\web\dispatch\map\PropertyPath;
use n2n\web\ui\UiComponent;

interface UiOutfitter {
	const NATURE_MAIN_CONTROL = 1;
	const NATURE_TEXT = 2;
	const NATURE_CHECK = 4;
	const NATURE_CHECK_LABEL = 8;
	const NATURE_TEXT_AREA = 16;
	const NATURE_MASSIVE_ARRAY_ITEM = 32;
	const NATURE_MASSIVE_ARRAY = 64;
	const NATURE_LEGEND = 128;
	const NATURE_BTN_PRIMARY = 256;
	const NATURE_BTN_SECONDARY = 512;

	/**
	 * @param string $nature
	 * @return array
	 */
	public function buildAttrs(int $nature): array;

	/**
	 * @param PropertyPath $propertyPath
	 * @param HtmlView $contextView
	 * @return UiComponent
	 */
	public function createMagDispatchableView(PropertyPath $propertyPath = null, HtmlView $contextView): UiComponent;
}