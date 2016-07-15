<?php
/**
 * @package Yoast\YoastCom\Menu
 */

namespace Yoast\YoastCom\Menu;

/**
 * Class Menu_Structure
 *
 * This class is used on all Yoast Sites to have a consistent menu over multiple domains / installations.
 *
 */
class Menu_Structure {

	const HOME_TYPE = 'home';
	const SEO_BLOG_TYPE = 'seo-blog';
	const PLUGINS_TYPE = 'plugins';
	const COURSES_TYPE = 'courses';
	const EBOOKS_TYPE = 'ebooks';
	const HIRE_US_TYPE = 'hire-us';
	const FAQ_TYPE = 'faq';

	private $menuItems;
	private $yoastComBaseUrl;
	private $myYoastBaseUrl;
	private $development = false;

	/**
	 * Menu_Structure constructor.
	 * 
	 * Register exceptions for matching the currently active page.
	 * Create the menu structure.
	 */
	public function __construct() {
		$this->development = ( defined( 'YOAST_ENVIRONMENT' ) && YOAST_ENVIRONMENT === 'development' );

		$this->yoastComBaseUrl = $this->getYoastComBaseUrl();
		$this->myYoastBaseUrl  = $this->getMyYoastBaseUrl();
		$this->academyBaseUrl  = $this->getAcademyBaseUrl();
		$this->kbBaseUrl       = $this->getKBBaseUrl();

		$this->registerLabelPrimaryCategoryConversion();

		$this->createMenuItems();
	}

	/**
	 * Gets all menuItems.
	 *
	 * @return array
	 */
	public function getMenuItems() {
		return $this->menuItems;
	}

	/**
	 * Environment based Yoast.com URL
	 *
	 * @return string
	 */
	private function getYoastComBaseUrl() {
		if ( $this->development ) {
			return 'http://yoast.dev/';
		}

		return 'https://yoast.com/';
	}

	/**
	 * Environment based my.Yoast.com URL
	 *
	 * @return string
	 */
	private function getMyYoastBaseUrl() {
		if ( $this->development ) {
			return 'http://my.yoast.dev/';
		}

		return 'https://my.yoast.com/';
	}

	/**
	 * Environment based Yoast.academy URL
	 *
	 * @return string
	 */
	private function getAcademyBaseUrl() {
		if ( $this->development ) {
			return 'http://yoast.academy.dev/';
		}

		return 'https://yoast.academy/';
	}

	/**
	 * Environment based kb.Yoast.com URL
	 *
	 * @return string
	 */
	private function getKBBaseUrl() {
		if ( $this->development ) {
			return 'http://kb.yoast.dev/';
		}

		return 'https://kb.yoast.com/';
	}

	/**
	 * Add the menu items to the list.
	 */
	private function createMenuItems() {
		$this->addHomeMenu();
		$this->addSEOBlogMenu();
		$this->addPluginsMenu();
		$this->addCoursesMenu();
		$this->addEBooksMenu();
		$this->addHireUsMenu();
		$this->addFAQMenu();
	}

	/**
	 * Create the Home menu
	 */
	private function addHomeMenu() {

		$mainMenuItem = new Main_Menu_Item(
			$this->yoastComBaseUrl,
			array(
				'icon'             => 'yoast',
				'type'             => self::HOME_TYPE,
				'screenreaderText' => 'home',
			) );

		$mainMenuItem->addChild(
			new Menu_Item(
				$this->yoastComBaseUrl . 'about-us/',
				array(
					'label' => 'About us',
					'type'  => self::HOME_TYPE,
				)
			)
		);

		$mainMenuItem->addChild(
			new Menu_Item(
				$this->yoastComBaseUrl . 'work/',
				array(
					'label' => 'Work at Yoast',
					'type'  => self::HOME_TYPE,
				)
			)
		);
		$mainMenuItem->addChild(
			new Menu_Item(
				$this->yoastComBaseUrl . 'calendar/',
				array(
					'label' => 'Meet us',
					'type'  => self::HOME_TYPE,
				)
			)
		);

		// Uncomment once my.yoast.com has user accounts for the public.

		/*
		$mainMenuItem->addChild(
			new Menu_Item(
				$this->myYoastBaseUrl,
				array(
					'label' => 'My Yoast',
					'icon'  => 'user',
					'type'  => 'home',
				)
			)
		);
		*/

		$this->menuItems[] = $mainMenuItem;
	}

	/**
	 * Create the SEO Blog menu
	 */
	private function addSEOBlogMenu() {

		$mainMenuItem = new Main_Menu_Item(
			$this->yoastComBaseUrl . 'seo-blog/',
			array(
				'label'    => 'SEO blog',
				'type'     => self::SEO_BLOG_TYPE,
				'activeOn' => array( $this->yoastComBaseUrl => array( 'post' ) ),
			)
		);

		$mainMenuItem->addChild(
			new Menu_Item(
				$this->yoastComBaseUrl . 'cat/content-seo/',
				array(
					'label' => 'Content SEO',
					'type'  => self::SEO_BLOG_TYPE,
				)
			)
		);

		$mainMenuItem->addChild(
			new Menu_Item(
				$this->yoastComBaseUrl . 'cat/wordpress/',
				array(
					'label' => 'WordPress',
					'type'  => self::SEO_BLOG_TYPE,
				)
			)
		);

		$mainMenuItem->addChild(
			new Menu_Item(
				$this->yoastComBaseUrl . 'cat/seo/',
				array(
					'label' => 'Technical SEO',
					'type'  => self::SEO_BLOG_TYPE,
				)
			)
		);

		$mainMenuItem->addChild(
			new Menu_Item(
				$this->yoastComBaseUrl . 'cat/search-news/',
				array(
					'label' => 'Search news',
					'type'  => self::SEO_BLOG_TYPE,
				)
			)
		);

		$mainMenuItem->addChild(
			new Menu_Item(
				$this->yoastComBaseUrl . 'cat/usability/',
				array(
					'label' => 'UX & Conversion',
					'type'  => self::SEO_BLOG_TYPE,
				)
			)
		);

		$mainMenuItem->addChild(
			new Menu_Item(
				$this->yoastComBaseUrl . 'cat/analytics/',
				array(
					'label' => 'Analytics',
					'type'  => self::SEO_BLOG_TYPE,
				)
			)
		);

		$mainMenuItem->addChild(
			new Menu_Item(
				$this->yoastComBaseUrl . 'cat/ecommerce/',
				array(
					'label' => 'eCommerce',
					'type'  => self::SEO_BLOG_TYPE,
				)
			)
		);

		$mainMenuItem->addChild(
			new Menu_Item(
				$this->yoastComBaseUrl . 'cat/social-media/',
				array(
					'label' => 'Social media',
					'type'  => self::SEO_BLOG_TYPE,
				)
			)
		);

		$this->menuItems[] = $mainMenuItem;
	}

	/**
	 * Create the Plugins menu
	 */
	private function addPluginsMenu() {

		$mainMenuItem = new Main_Menu_Item(
			$this->yoastComBaseUrl . 'wordpress/plugins/',
			array(
				'label'    => 'Plugins',
				'type'     => self::PLUGINS_TYPE,
				'activeOn' => array( $this->yoastComBaseUrl => array( 'yoast_plugins', 'yoast_dev_article' ) ),
			)
		);

		$mainMenuItem->addChild(
			new Menu_Item(
				$this->yoastComBaseUrl . 'wordpress/plugins/seo/',
				array(
					'label' => 'Yoast SEO',
					'type'  => self::PLUGINS_TYPE,
				)
			)
		);

		$mainMenuItem->addChild(
			new Menu_Item(
				$this->yoastComBaseUrl . 'software/yoast-seo-for-drupal-module/',
				array(
					'label' => 'Drupal',
					'type'  => self::PLUGINS_TYPE,
				)
			)
		);

		$mainMenuItem->addChild(
			new Menu_Item(
				$this->yoastComBaseUrl . 'dev-blog/',
				array(
					'label' => 'Dev blog',
					'type'  => self::PLUGINS_TYPE,
				)
			)
		);

		$this->menuItems[] = $mainMenuItem;
	}

	/**
	 * Create the Courses menu
	 */
	private function addCoursesMenu() {

		$mainMenuItem = new Main_Menu_Item(
			$this->yoastComBaseUrl . 'academy/courses/',
			array(
				'label'    => 'Courses',
				'type'     => self::COURSES_TYPE,
				'activeOn' => array(
					$this->academyBaseUrl  => array(),
					$this->yoastComBaseUrl => array( 'yoast_courses' ),
				),
			)
		);

		$mainMenuItem->addChild(
			new Menu_Item(
				$this->academyBaseUrl,
				array(
					'label' => 'My Academy',
					'type'  => self::COURSES_TYPE,
				)
			)
		);

		$mainMenuItem->addChild(
			new Menu_Item(
				$this->yoastComBaseUrl . 'academy/course/seo-copywriting-training/',
				array(
					'label' => 'SEO copywriting',
					'type'  => self::COURSES_TYPE,
				)
			)
		);

		$mainMenuItem->addChild(
			new Menu_Item(
				$this->yoastComBaseUrl . 'academy/course/basic-seo-training/',
				array(
					'label' => 'Basic SEO',
					'type'  => self::COURSES_TYPE,
				)
			)
		);

		$mainMenuItem->addChild(
			new Menu_Item(
				$this->yoastComBaseUrl . 'academy/course/yoast-seo-wordpress-training/',
				array(
					'label' => 'Yoast SEO for WordPress',
					'type'  => self::COURSES_TYPE,
				)
			)
		);

		$this->menuItems[] = $mainMenuItem;
	}

	/**
	 * Create the E-Books menu
	 */
	private function addEBooksMenu() {

		$mainMenuItem = new Main_Menu_Item(
			$this->yoastComBaseUrl . 'ebooks/',
			array(
				'label'    => 'eBooks',
				'type'     => self::EBOOKS_TYPE,
				'activeOn' => array( $this->yoastComBaseUrl => array( 'yoast_ebooks' ) ),
			)
		);

		$mainMenuItem->addChild(
			new Menu_Item(
				$this->yoastComBaseUrl . 'ebooks/seo-for-wordpress/',
				array(
					'label' => 'SEO for WordPress',
					'type'  => self::EBOOKS_TYPE,
				)
			)
		);

		$mainMenuItem->addChild(
			new Menu_Item(
				$this->yoastComBaseUrl . 'ebooks/content-seo-2/',
				array(
					'label' => 'Content SEO',
					'type'  => self::EBOOKS_TYPE,
				)
			)
		);

		$mainMenuItem->addChild(
			new Menu_Item(
				$this->yoastComBaseUrl . 'ebooks/ux-conversion-seo/',
				array(
					'label' => 'UX & Conversion',
					'type'  => self::EBOOKS_TYPE,
				)
			)
		);

		$this->menuItems[] = $mainMenuItem;
	}

	/**
	 * Create the Hire Us menu
	 */
	private function addHireUsMenu() {

		$mainMenuItem = new Main_Menu_Item(
			$this->yoastComBaseUrl . 'hire-us/',
			array(
				'label'    => 'Hire us',
				'type'     => self::HIRE_US_TYPE,
				'activeOn' => array( $this->yoastComBaseUrl => array( 'post' ) ),
			)
		);

		$mainMenuItem->addChild(
			new Menu_Item(
				$this->yoastComBaseUrl . 'hire-us/website-review/gold-seo-review/',
				array(
					'label' => 'Gold review',
					'type'  => self::HIRE_US_TYPE,
				)
			)
		);

		$mainMenuItem->addChild(
			new Menu_Item(
				$this->yoastComBaseUrl . 'hire-us/website-review/platinum-seo-review/',
				array(
					'label' => 'Platinum review',
					'type'  => self::HIRE_US_TYPE,
				)
			)
		);

		$mainMenuItem->addChild(
			new Menu_Item(
				$this->yoastComBaseUrl . 'hire-us/seo-consultancy/',
				array(
					'label' => 'Yoast consultancy',
					'type'  => self::HIRE_US_TYPE,
				)
			)
		);


		$this->menuItems[] = $mainMenuItem;
	}

	/**
	 * Create the FAQ menu
	 */
	private function addFAQMenu() {

		$mainMenuItem = new Main_Menu_Item(
			$this->kbBaseUrl,
			array(
				'label'    => 'FAQ',
				'type'     => self::FAQ_TYPE,
				'activeOn' => array(
					$this->kbBaseUrl => array(),
				)
			)
		);

		$mainMenuItem->addChild(
			new Menu_Item(
				$this->kbBaseUrl . 'kb/category/wordpress-plugins/',
				array(
					'label' => 'WordPress plugins',
					'type'  => self::FAQ_TYPE,
				)
			)
		);

		$mainMenuItem->addChild(
			new Menu_Item(
				$this->kbBaseUrl . 'kb/category/website-reviews/',
				array(
					'label' => 'Website reviews',
					'type'  => self::FAQ_TYPE,
				)
			)
		);

		$mainMenuItem->addChild(
			new Menu_Item(
				$this->kbBaseUrl . 'kb/category/drupal-modules/',
				array(
					'label' => 'Drupal',
					'type'  => self::FAQ_TYPE,
				)
			)
		);

		$mainMenuItem->addChild(
			new Menu_Item(
				$this->kbBaseUrl . 'kb/category/wordpress-themes/',
				array(
					'label' => 'WordPress themes',
					'type'  => self::FAQ_TYPE,
				)
			)
		);

		$mainMenuItem->addChild(
			new Menu_Item(
				$this->kbBaseUrl . 'kb/category/general/',
				array(
					'label' => 'General',
					'type'  => self::FAQ_TYPE,
				)
			)
		);

		$this->menuItems[] = $mainMenuItem;
	}

	/**
	 * Hook the filter to convert Label to Primary Category
	 *
	 * Handle exceptions in the menu which are needed due to length constraints.
	 */
	private function registerLabelPrimaryCategoryConversion() {
		static $hooked = false;

		if ( $hooked ) {
			return;
		}

		$hooked = true;
		add_filter( 'yoast_nav_label-primary_category', array( $this, 'convertLabelToPrimaryCategory' ) );
	}

	/**
	 * Convert label to match Primary Category
	 *
	 * @param string $label Menu label to convert to Primary Category
	 *
	 * @return string
	 */
	public function convertLabelToPrimaryCategory( $label ) {

		if ( $label === 'UX & Conversion' ) {
			return 'Usability & Conversion';
		}

		return $label;
	}
}
