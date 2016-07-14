<?php
namespace Yoast\YoastCom\Menu;

class Menu_Structure {

	const HOME_TYPE = 'home';
	const SEO_BLOG_TYPE = 'seo-blog';
	const PLUGINS_TYPE = 'plugins';
	const COURSES_TYPE = 'cources';
	const EBOOKS_TYPE = 'ebooks';
	const HIRE_US_TYPE = 'hire-us';
	const FAQ_TYPE ='faq';

	private $mainMenuItems;
	private $yoastComBaseUrl;
	private $myYoastBaseUrl;

	public function __construct() {
		$this->yoastComBaseUrl = $this->getYoastComBaseUrl();
		$this->myYoastBaseUrl  = $this->getmyYoastBaseUrl();
		$this->academyBaseUrl  = $this->getAcademyBaseUrl();
		$this->kbBaseUrl       = $this->getKBBaseUrl();

		$this->createMenuItems();
	}

	private function createMenuItems() {
		$this->addHomeMenu();
		$this->addSEOBlogMenu();
		$this->addPluginsMenu();
		$this->addCoursesMenu();
		$this->addEBooksMenu();
		$this->addHireUsMenu();
		$this->addFAQMenu();
	}

	private function addHomeMenu() {

		$mainMenuItem = new Main_Menu_Item(
			$this->yoastComBaseUrl,
			array(
				'icon'             => 'yoast',
				'type'             => self::HOME_TYPE,
				'screenreaderText' => 'home',
			) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->yoastComBaseUrl . 'about-us/',
			array(
				'label' => 'About us',
				'type'  => self::HOME_TYPE,
			) ) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->yoastComBaseUrl . 'work/',
			array(
				'label' => 'Work at Yoast',
				'type'  => self::HOME_TYPE,
			) ) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->yoastComBaseUrl . 'calendar/',
			array(
				'label' => 'Meet us',
				'type'  => self::HOME_TYPE,
			) ) );
		// uncomment once my.yoast.con fully goes live
//		$mainMenuItem->addChild( new Menu_Item(
//			$this->myYoastBaseUrl,
//			array(
//				'label' => 'My Yoast',
//				'icon'  => 'user',
//				'type'  => 'home',
//			) ) );

		$this->mainMenuItems[] = $mainMenuItem;
	}

	private function addSEOBlogMenu() {

		$mainMenuItem = new Main_Menu_Item(
			$this->yoastComBaseUrl . 'seo-blog/',
			array(
				'label'    => 'SEO blog',
				'type'     => self::SEO_BLOG_TYPE,
				'activeOn' => array( $this->yoastComBaseUrl => array( 'post' ) ),
			) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->yoastComBaseUrl . 'cat/content-seo/',
			array(
				'label' => 'Content SEO',
				'type'  => self::SEO_BLOG_TYPE,
			) ) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->yoastComBaseUrl . 'cat/wordpress/',
			array(
				'label' => 'WordPress',
				'type'  => self::SEO_BLOG_TYPE,
			) ) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->yoastComBaseUrl . 'cat/seo/',
			array(
				'label' => 'Technical SEO',
				'type'  => self::SEO_BLOG_TYPE,
			) ) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->yoastComBaseUrl . 'search-news/',
			array(
				'label' => 'Search news',
				'type'  => self::SEO_BLOG_TYPE,
			) ) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->yoastComBaseUrl . 'cat/usability/',
			array(
				'label' => 'UX & Conversion',
				'type'  => self::SEO_BLOG_TYPE,
			) ) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->yoastComBaseUrl . 'cat/analytics/',
			array(
				'label' => 'Analytics',
				'type'  => self::SEO_BLOG_TYPE,
			) ) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->yoastComBaseUrl . 'cat/ecommerce/',
			array(
				'label' => 'eCommerce',
				'type'  => self::SEO_BLOG_TYPE,
			) ) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->yoastComBaseUrl . 'cat/social-media/',
			array(
				'label' => 'Social media',
				'type'  => self::SEO_BLOG_TYPE,
			) ) );

		$this->mainMenuItems[] = $mainMenuItem;
	}

	private function addPluginsMenu() {
		$mainMenuItem = new Main_Menu_Item(
			$this->yoastComBaseUrl . 'wordpress/plugins/',
			array(
				'label'    => 'Plugins',
				'type'     => self::PLUGINS_TYPE,
				'activeOn' => array( $this->yoastComBaseUrl => array( 'yoast_plugins', 'yoast_dev_article' ) ),
			) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->yoastComBaseUrl . 'wordpress/plugins/seo/',
			array(
				'label' => 'Yoast SEO',
				'type'  => self::PLUGINS_TYPE,
			) ) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->yoastComBaseUrl . '/software/yoast-seo-for-drupal-module/',
			array(
				'label' => 'Drupal',
				'type'  => self::PLUGINS_TYPE,
			) ) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->yoastComBaseUrl . 'dev-blog/',
			array(
				'label' => 'Dev blog',
				'type'  => self::PLUGINS_TYPE,
			) ) );

		$this->mainMenuItems[] = $mainMenuItem;
	}

	private function addCoursesMenu() {
		$mainMenuItem = new Main_Menu_Item(
			$this->yoastComBaseUrl . 'academy/courses/',
			array(
				'label'    => 'Courses',
				'type'     => self::COURSES_TYPE,
				'activeOn' => array(
					$this->academyBaseUrl,
					$this->yoastComBaseUrl => array( 'yoast_courses' ),
				),
			) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->academyBaseUrl,
			array(
				'label' => 'My Academy',
				'type'  => self::COURSES_TYPE,
			) ) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->yoastComBaseUrl . 'academy/course/seo-copywriting-training/',
			array(
				'label' => 'SEO copywriting',
				'type'  => self::COURSES_TYPE,
			) ) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->yoastComBaseUrl . 'academy/course/basic-seo-training/',
			array(
				'label' => 'Basic SEO',
				'type'  => self::COURSES_TYPE,
			) ) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->yoastComBaseUrl . 'academy/course/yoast-seo-wordpress-training/',
			array(
				'label' => 'Yoast SEO for WordPress',
				'type'  => self::COURSES_TYPE,
			) ) );

		$this->mainMenuItems[] = $mainMenuItem;
	}

	private function addEBooksMenu() {
		$mainMenuItem = new Main_Menu_Item(
			$this->yoastComBaseUrl . 'ebooks/',
			array(
				'label'    => 'eBooks',
				'type'     => self::EBOOKS_TYPE,
				'activeOn' => array( $this->yoastComBaseUrl => array( 'yoast_ebooks' ) ),
			) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->yoastComBaseUrl . 'ebooks/seo-for-wordpress/',
			array(
				'label' => 'SEO for WordPress',
				'type'  => self::EBOOKS_TYPE,
			) ) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->yoastComBaseUrl . 'ebooks/content-seo-2/',
			array(
				'label' => 'Content SEO',
				'type'  => self::EBOOKS_TYPE,
			) ) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->yoastComBaseUrl . 'ebooks/ux-conversion-seo',
			array(
				'label' => 'UX & Conversion',
				'type'  => self::EBOOKS_TYPE,
			) ) );

		$this->mainMenuItems[] = $mainMenuItem;
	}

	private function addHireUsMenu() {
		$mainMenuItem = new Main_Menu_Item(
			$this->yoastComBaseUrl . 'hire-us',
			array(
				'label'    => 'Hire us',
				'type'     => self::HIRE_US_TYPE,
				'activeOn' => array( $this->yoastComBaseUrl => array( 'post' ) ),
			) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->yoastComBaseUrl . 'hire-us/website-review/gold-seo-review/',
			array(
				'label' => 'Gold review',
				'type'  => self::HIRE_US_TYPE,
			) ) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->yoastComBaseUrl . 'hire-us/website-review/platinum-seo-review/',
			array(
				'label' => 'Platinum review',
				'type'  => self::HIRE_US_TYPE,
			) ) );

		$this->mainMenuItems[] = $mainMenuItem;
	}

	private function addFAQMenu() {
		$mainMenuItem = new Main_Menu_Item(
			$this->kbBaseUrl,
			array(
				'label'    => 'FAQ',
				'type'     => self::FAQ_TYPE,
				'activeOn' => array( $this->kbBaseUrl => array( 'wpkb-article' ) ),
			) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->kbBaseUrl . 'kb/category/wordpress-plugins/',
			array(
				'label' => 'WordPress plugins',
				'type'  => self::FAQ_TYPE,
			) ) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->kbBaseUrl . 'kb/category/website-reviews/',
			array(
				'label' => 'Website reviews',
				'type'  => self::FAQ_TYPE,
			) ) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->kbBaseUrl . 'kb/category/drupal-modules/',
			array(
				'label' => 'Drupal',
				'type'  => self::FAQ_TYPE,
			) ) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->kbBaseUrl . 'kb/category/wordpress-themes/',
			array(
				'label' => 'WordPress themes',
				'type'  => self::FAQ_TYPE,
			) ) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->kbBaseUrl . 'kb/category/general/',
			array(
				'label' => 'General',
				'type'  => self::FAQ_TYPE,
			) ) );

		$this->mainMenuItems[] = $mainMenuItem;
	}

	private function getYoastComBaseUrl() {
		if ( defined( 'YOAST_ENVIRONMENT' ) && YOAST_ENVIRONMENT === 'development' ) {
			return 'http://yoast.dev/';
		}
		else {
			return 'https://yoast.com/';
		}
	}

	private function getMyYoastBaseUrl() {
		if ( defined( 'YOAST_ENVIRONMENT' ) && YOAST_ENVIRONMENT === 'development' ) {
			return 'http://my.yoast.dev/';
		}
		else {
			return 'https://my.yoast.com/';
		}
	}

	private function getAcademyBaseUrl() {
		if ( defined( 'YOAST_ENVIRONMENT' ) && YOAST_ENVIRONMENT === 'development' ) {
			return 'http://yoast.academy.dev/';
		}
		else {
			return 'https://yoast.academy/';
		}
	}

	private function getKBBaseUrl() {
		if ( defined( 'YOAST_ENVIRONMENT' ) && YOAST_ENVIRONMENT === 'development' ) {
			return 'http://kb.yoast.dev/';
		}
		else {
			return 'https://kb.yoast.com/';
		}
	}

	/**
	 * Gets all menuItems.
	 *
	 * @return array
	 */
	public function getMenuItems() {
		return $this->mainMenuItems;
	}

}
