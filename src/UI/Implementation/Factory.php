<?php

/* Copyright (c) 2016 Richard Klees <richard.klees@concepts-and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Implementation;

use \ILIAS\UI\Component as C;
use ILIAS\UI\NotImplementedException;

// TODO: This might cache the created factories.
use ILIAS\UI\Implementation\Component\SignalGenerator;

class Factory implements \ILIAS\UI\Factory
{
	/**
	 * @var C\Counter\Factory
	 */
	protected $counter_factory;

	/**
	 * @var C\Button\Factory
	 */
	protected $button_factory;

	/**
	 * @var C\Listing\Factory
	 */
	protected $listing_factory;

	/**
	 * @var C\Image\Factory
	 */
	protected $image_factory;

	/**
	 * @var C\Panel\Factory
	 */
	protected $panel_factory;

	/**
	 * @var C\Modal\Factory
	 */
	protected $modal_factory;

	/**
	 * @var C\Dropzone\Factory
	 */
	protected $dropzone_factory;

	/**
	 * @var C\Popover\Factory
	 */
	protected $popover_factory;

	/**
	 * @var C\Divider\Factory
	 */
	protected $divider_factory;

	/**
	 * @var C\Link\Factory
	 */
	protected $link_factory;

	/**
	 * @var C\Dropdown\Factory
	 */
	protected $dropdown_factory;

	/**
	 * @var C\Item\Factory
	 */
	protected $item_factory;

	/**
	 * @var C\ViewControl\Factory
	 */
	protected $viewcontrol_factory;

	/**
	 * @var C\Chart\Factory
	 */
	protected $chart_factory;

	/**
	 * @var C\Input\Factory
	 */
	protected $input_factory;

	/**
	 * @var C\Table\Factory
	 */
	protected $table_factory;

	/**
	 * @var Component\MessageBox\Factory
	 */
	protected $messagebox_factory;

	/**
	 * @var C\Card\Factory
	 */
	protected $card_factory;

	/**
	 * @var C\Menu\Factory
	 */
	protected $menu_factory;

	/**
	 * @var Component\Layout\Factory
	 */
	protected $layout_factory;

	/**
	 * @var Component\MainControls\Factory
	 */
	protected $maincontrols_factory;

	/**
	 * @var C\Tree\Factory
	 */
	protected $tree_factory;

	/**
	 * @var C\Symbol\Factory
	 */
	protected $symbol_factory;

	public function __construct(
		C\Counter\Factory $counter_factory,
		C\Button\Factory $button_factory,
		C\Listing\Factory $listing_factory,
		C\Image\Factory	$image_factory,
		C\Panel\Factory $panel_factory,
		C\Modal\Factory $modal_factory,
		C\Dropzone\Factory $dropzone_factory,
		C\Popover\Factory $popover_factory,
		C\Divider\Factory $divider_factory,
		C\Link\Factory $link_factory,
		C\Dropdown\Factory $dropdown_factory,
		C\Item\Factory $item_factory,
		C\ViewControl\Factory $viewcontrol_factory,
		C\Chart\Factory $chart_factory,
		C\Input\Factory $input_factory,
		C\Table\Factory $table_factory,
		C\MessageBox\Factory $messagebox_factory,
		C\Card\Factory $card_factory,
		C\Layout\Factory $layout_factory,
		C\MainControls\Factory $maincontrols_factory,
		C\Tree\Factory $tree_factory,
		C\Menu\Factory $menu_factory,
		C\Symbol\Factory $symbol_factory
	) {
		$this->counter_factory = $counter_factory;
		$this->button_factory = $button_factory;
		$this->listing_factory = $listing_factory;
		$this->image_factory = $image_factory;
		$this->panel_factory = $panel_factory;
		$this->modal_factory = $modal_factory;
		$this->dropzone_factory = $dropzone_factory;
		$this->popover_factory = $popover_factory;
		$this->divider_factory = $divider_factory;
		$this->link_factory = $link_factory;
		$this->dropdown_factory = $dropdown_factory;
		$this->item_factory = $item_factory;
		$this->viewcontrol_factory = $viewcontrol_factory;
		$this->chart_factory = $chart_factory;
		$this->input_factory = $input_factory;
		$this->table_factory = $table_factory;
		$this->messagebox_factory = $messagebox_factory;
		$this->card_factory = $card_factory;
		$this->layout_factory = $layout_factory;
		$this->maincontrols_factory = $maincontrols_factory;
		$this->tree_factory = $tree_factory;
		$this->menu_factory = $menu_factory;
		$this->symbol_factory = $symbol_factory;
	}

	/**
	 * @inheritdoc
	 */
	public function counter()
	{
		return $this->counter_factory;
	}

	/**
	 * @inheritdoc
	 */
	public function button()
	{
		return $this->button_factory;
	}

	/**
	 * @inheritdoc
	 */
	public function card()
	{
		return $this->card_factory;
	}

	/**
	 * @inheritdoc
	 */
	public function deck(array $cards)
	{
		return new Component\Deck\Deck($cards, Component\Deck\Deck::SIZE_S);
	}

	/**
	 * @inheritdoc
	 */
	public function listing()
	{
		return $this->listing_factory;
	}

	/**
	 * @inheritdoc
	 */
	public function image()
	{
		return $this->image_factory;
	}

	/**
	 * @inheritdoc
	 */
	public function legacy($content)
	{
		return new Component\Legacy\Legacy($content);
	}

	/**
	 * @inheritdoc
	 */
	public function panel()
	{
		return $this->panel_factory;
	}

	/**
	 * @inheritdoc
	 */
	public function modal()
	{
		return $this->modal_factory;
	}

	/**
	 * @inheritdoc
	 */
	public function dropzone()
	{
		return $this->dropzone_factory;
	}

	/**
	 * @inheritdoc
	 */
	public function popover()
	{
		return $this->popover_factory;
	}

	/**
	 * @inheritdoc
	 */
	public function divider()
	{
		return $this->divider_factory;
	}

	/**
	 * @inheritdoc
	 */
	public function link()
	{
		return $this->link_factory;
	}

	/**
	 * @inheritdoc
	 */
	public function dropdown()
	{
		return $this->dropdown_factory;
	}

	/**
	 * @inheritdoc
	 */
	public function item()
	{
		return $this->item_factory;
	}


	/**
	 * @inheritdoc
	 */
	public function viewControl()
	{
		return $this->viewcontrol_factory;
	}

	/**
	 * @inheritdoc
	 */
	public function breadcrumbs(array $crumbs)
	{
		return new Component\Breadcrumbs\Breadcrumbs($crumbs);
	}

	/**
	 * @inheritdoc
	 */
	public function chart()
	{
		return $this->chart_factory;
	}

	/**
	 * @inheritdoc
	 */
	public function input()
	{
		return $this->input_factory;
	}

	/**
	 * @inheritdoc
	 */
	public function table()
	{
		return $this->table_factory;
	}

	/**
	 * @inheritdoc
	 */
	public function messageBox()
	{
		return $this->messagebox_factory;
	}

	/**
	 * @inheritdoc
	 */
	public function layout(): C\Layout\Factory
	{
		return $this->layout_factory;
	}

	/**
	 * @inheritdoc
	 */
	public function mainControls(): C\MainControls\Factory
	{
		return $this->maincontrols_factory;
	}

	/**
	* @inheritdoc
	*/
	public function tree()
	{
		return $this->tree_factory;
	}

	/**
	 * @inheritdoc
	 */
	public function menu(): C\Menu\Factory
	{
		return $this->menu_factory;
	}

	/**
	 * @inheritdoc
	 */
	public function symbol(): C\Symbol\Factory
	{
		return $this->symbol_factory;
	}
}
