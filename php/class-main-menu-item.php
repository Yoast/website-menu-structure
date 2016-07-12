<?php

namespace Yoast\YoastCom\Menu;


class Main_Menu_Item extends Menu_Item {
	/**
	 * @var string The type of the menuitem (determines the color for parent menuItems).
	 */
	private $type;

	/**
	 * @var array Array of Menu_Items charing the same parent.
	 */
	private $children;

	/**
	 * @var array Determines on which pages combined with specified post types set the Menu_Item as _active_. ['base_url'=>['post_type','post_type]].
	 * If no post_types are given ('base_url' => []), the Menu_Item will be active on all pages of the given base_url.
	 */
	private $activeOn;


	public function __construct( $url, array $args ) {
		parent::__construct( $url, $args );
		if ( ! empty( $args['type'] ) ) {
			$this->type = $args['type'];
		}
		if ( ! empty( $args['children'] ) ) {
			$this->children = $args['children'];
		}
		if ( ! empty( $args['activeOn'] ) ) {
			$this->activeOn = $args['activeOn'];
		}
	}

	/**
	 * Add a child Menu_Item.
	 *
	 * @param $menuItem
	 */
	public function addChild( $menuItem ) {
		if ( is_a( $menuItem, 'Yoast\YoastCom\Menu\Menu_Item' ) ) {
			$this->children[] = $menuItem;
		}
	}

	/* GETTERS */
	/**
	 * @return string
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * @return array
	 */
	public function getChildren() {
		return $this->children;
	}

	/**
	 * @return array
	 */
	public function getActiveOn() {
		return $this->activeOn;
	}
}
