<?php
namespace Yoast\YoastCom\Menu;


class Menu_Item {

	/**
	 * @var string The url the menuitem should link to.
	 */
	private $url;

	/**
	 * @var string The label to display.
	 */
	private $label;

	/**
	 * @var string The font awesome icon name (class name) to display in front of the label.
	 */
	private $icon;

	/**
	 * @var string The text for screenreaders. Set this if the Menu_Item only has an icon.
	 */
	private $screenreaderText;

	/**
	 * @var boolean Determines if the tab is active or not.
	 */
	private $active = false;


	public function __construct( $url, $args = array() ) {
		$this->url = $url;

		if ( ! empty( $args['label'] ) ) {
			$this->label = $args['label'];
		}
		if ( ! empty( $args['icon'] ) ) {
			$this->icon = $args['icon'];
		}
		if ( ! empty( $args['screenreaderText'] ) ) {
			$this->screenreaderText = $args['screenreaderText'];
		}
		if ( isset( $args['parentIndex'] ) && is_int( $args['parentIndex'] ) ) {
			$this->parentIndex = $args['parentIndex'];
		}

		if ( ! isset( $this->label ) && ! isset( $this->icon ) ) {
			throw new \InvalidArgumentException( get_class( $this ) . ' requires at least a label or an icon' );
		}
	}


	/* GETTERS */
	/**
	 * @return string
	 */
	public function getUrl() {
		return $this->url;
	}

	/**
	 * @return string
	 */
	public function getLabel() {
		return $this->label;
	}

	/**
	 * @return string
	 */
	public function getIcon() {
		return $this->icon;
	}

	/**
	 * @return string
	 */
	public function getScreenreaderText() {
		return $this->screenreaderText;
	}

	/**
	 * @return boolean
	 */
	public function isActive() {
		return $this->active;
	}

	/* SETTERS */
	/**
	 * @param boolean $active
	 */
	public function setActive( $active = true ) {
		if ( is_bool( $active ) ) {
			$this->active = $active;
		}
	}


}
