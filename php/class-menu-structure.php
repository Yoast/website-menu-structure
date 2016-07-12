<?php
namespace Yoast\YoastCom\Menu;

class Menu_Structure {

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
		$this->addCourcesMenu();
		$this->addEBooksMenu();
		$this->addHireUsMenu();
		$this->addFAQMenu();
	}

	private function addHomeMenu() {

		$mainMenuItem = new Main_Menu_Item(
			$this->yoastComBaseUrl,
			array(
				'icon'             => 'yoast',
				'type'             => 'home',
				'screenreaderText' => 'home',
			) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->yoastComBaseUrl . 'about-us/',
			array(
				'label' => 'About us',
				'type'  => 'home',
			) ) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->yoastComBaseUrl . 'work/',
			array(
				'label' => 'Work at Yoast',
				'type'  => 'home',
			) ) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->yoastComBaseUrl . 'calendar/',
			array(
				'label' => 'Meet us',
				'type'  => 'home',
			) ) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->myYoastBaseUrl,
			array(
				'label' => 'My Yoast',
				'icon'  => 'user',
				'type'  => 'home',
			) ) );

		$this->mainMenuItems[] = $mainMenuItem;
	}

	private function addSEOBlogMenu() {

		$mainMenuItem = new Main_Menu_Item(
			$this->yoastComBaseUrl . 'seo-blog/',
			array(
				'label' => 'SEO blog',
				'type'  => 'seo-blog',
			) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->yoastComBaseUrl . 'cat/content-seo/',
			array(
				'label' => 'Content SEO',
				'type'  => 'seo-blog',
			) ) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->yoastComBaseUrl . 'cat/wordpress/',
			array(
				'label' => 'Wordpress',
				'type'  => 'seo-blog',
			) ) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->yoastComBaseUrl . 'cat/seo/',
			array(
				'label' => 'Technical SEO',
				'type'  => 'seo-blog',
			) ) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->yoastComBaseUrl . 'search-news/',
			array(
				'label' => 'Search news',
				'type'  => 'seo-blog',
			) ) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->yoastComBaseUrl . 'cat/usability/',
			array(
				'label' => 'UX & Conversion',
				'type'  => 'seo-blog',
			) ) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->yoastComBaseUrl . 'cat/analytics/',
			array(
				'label' => 'Analytics',
				'type'  => 'seo-blog',
			) ) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->yoastComBaseUrl . 'cat/ecommerce/',
			array(
				'label' => 'eCommerce',
				'type'  => 'seo-blog',
			) ) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->yoastComBaseUrl . 'cat/social-media/',
			array(
				'label' => 'Social media',
				'type'  => 'seo-blog',
			) ) );

		$this->mainMenuItems[] = $mainMenuItem;
	}

	private function addPluginsMenu() {
		$mainMenuItem = new Main_Menu_Item(
			$this->yoastComBaseUrl . 'wordpress/plugins/',
			array(
				'label' => 'Plugins',
				'type'  => 'plugins',
			) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->yoastComBaseUrl . 'wordpress/plugins/seo/',
			array(
				'label' => 'Yoast SEO',
				'type'  => 'plugins',
			) ) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->yoastComBaseUrl . 'wordpress/plugins/seo/', // todo update url
			array(
				'label' => 'Yoast SEO Extentions',
				'type'  => 'plugins',
			) ) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->yoastComBaseUrl . 'wordpress/plugins/seo/', // todo update url
			array(
				'label' => 'Other platforms',
				'type'  => 'plugins',
			) ) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->yoastComBaseUrl . 'dev-blog/',
			array(
				'label' => 'Dev blog',
				'type'  => 'plugins',
			) ) );

		$this->mainMenuItems[] = $mainMenuItem;
	}

	private function addCourcesMenu() {
		$mainMenuItem = new Main_Menu_Item(
			$this->yoastComBaseUrl . 'academy/courses/',
			array(
				'label' => 'Cources',
				'type'  => 'cources',
			) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->academyBaseUrl,
			array(
				'label' => 'My Academy',
				'type'  => 'cources',
			) ) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->yoastComBaseUrl . 'academy/course/seo-copywriting-training/',
			array(
				'label' => 'SEO copywriting',
				'type'  => 'cources',
			) ) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->yoastComBaseUrl . 'academy/course/basic-seo-training/',
			array(
				'label' => 'Basic SEO',
				'type'  => 'cources',
			) ) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->yoastComBaseUrl . 'academy/course/yoast-seo-wordpress-training/',
			array(
				'label' => 'Yoast SEO for WordPress',
				'type'  => 'cources',
			) ) );

		$this->mainMenuItems[] = $mainMenuItem;
	}

	private function addEBooksMenu() {
		$mainMenuItem = new Main_Menu_Item(
			$this->yoastComBaseUrl . 'ebooks/',
			array(
				'label' => 'eBooks',
				'type'  => 'ebooks',
			) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->yoastComBaseUrl . 'ebooks/seo-for-wordpress/',
			array(
				'label' => 'SEO for WordPress',
				'type'  => 'ebooks',
			) ) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->yoastComBaseUrl . 'ebooks/content-seo-2/',
			array(
				'label' => 'Content SEO',
				'type'  => 'ebooks',
			) ) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->yoastComBaseUrl . 'ebooks/ux-conversion-seo',
			array(
				'label' => 'UX & Conversion',
				'type'  => 'ebooks',
			) ) );

		$this->mainMenuItems[] = $mainMenuItem;
	}

	private function addHireUsMenu() {
		$mainMenuItem = new Main_Menu_Item(
			$this->yoastComBaseUrl . 'hire-us',
			array(
				'label' => 'Hire us',
				'type'  => 'hire-us',
			) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->yoastComBaseUrl . 'hire-us/website-review/gold-seo-review/',
			array(
				'label' => 'Gold review',
				'type'  => 'hire-us',
			) ) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->yoastComBaseUrl . 'hire-us/website-review/platinum-seo-review/',
			array(
				'label' => 'Platinum review',
				'type'  => 'hire-us',
			) ) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->yoastComBaseUrl . 'hire-us',
			array(
				'label' => 'Hire team Yoast',
				'type'  => 'hire-us',
			) ) );

		$this->mainMenuItems[] = $mainMenuItem;
	}

	private function addFAQMenu() {
		$mainMenuItem = new Main_Menu_Item(
			$this->kbBaseUrl,
			array(
				'label' => 'FAQ',
				'type'  => 'faq',
				'activeOn' => array($this->kbBaseUrl => array('wpkb-article')),
			) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->kbBaseUrl . 'kb/category/wordpress-plugins/',
			array(
				'label' => 'WordPress plugins',
				'type'  => 'faq',
			) ) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->kbBaseUrl . 'kb/category/website-reviews/',
			array(
				'label' => 'Website reviews',
				'type'  => 'faq',
			) ) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->kbBaseUrl . 'kb/category/drupal-modules/',
			array(
				'label' => 'Drupal modules',
				'type'  => 'faq',
			) ) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->kbBaseUrl . 'kb/category/wordpress-themes/',
			array(
				'label' => 'WordPress themes',
				'type'  => 'faq',
			) ) );
		$mainMenuItem->addChild( new Menu_Item(
			$this->kbBaseUrl . 'kb/category/general/',
			array(
				'label' => 'General',
				'type'  => 'faq',
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
