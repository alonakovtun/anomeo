<?php

use WPML\Core\Twig_Loader_Filesystem;
use WPML\Core\Twig_Environment;

class WCML_Plugins_Wrap {

	/** @var \woocommerce_wpml */
	private $woocommerce_wpml;
	/** @var \SitePress */
	private $sitepress;
	/** @var WCML_Tracking_Link */
	private $tracking_link;

	/**
	 * WCML_Plugins_Wrap constructor.
	 *
	 * @param woocommerce_wpml $woocommerce_wpml
	 * @param SitePress        $sitepress
	 */
	public function __construct( $woocommerce_wpml, $sitepress ) {
		$this->woocommerce_wpml = $woocommerce_wpml;
		$this->sitepress        = $sitepress;
		$this->tracking_link    = new WCML_Tracking_Link();
	}

	/**
	 * @return array
	 */
	public function get_model() {

		$model = [
			'link_url'          => admin_url( 'admin.php?page=wpml-wcml' ),
			'old_wpml'          => defined( 'ICL_SITEPRESS_VERSION' ) && version_compare( ICL_SITEPRESS_VERSION, '4.0', '<' ),
			'tracking_link'     => $this->tracking_link->getWpmlAccount(),
			'install_wpml_link' => $this->woocommerce_wpml->dependencies->required_plugin_install_link( 'wpml' ),
			'icl_version'       => defined( 'ICL_SITEPRESS_VERSION' ),
			'icl_setup'         => $this->sitepress ? $this->sitepress->setup() : false,
			'tm_version'        => defined( 'WPML_TM_VERSION' ),
			'st_version'        => defined( 'WPML_ST_VERSION' ) && function_exists( 'icl_get_string_id' ),
			'wc'                => class_exists( 'WooCommerce' ),
			'old_wc'            => class_exists( 'WooCommerce' ) && version_compare( WC_VERSION, WCML_Dependencies::MIN_WOOCOMMERCE, '<' ),
			'wc_link'           => 'http://wordpress.org/extend/plugins/woocommerce/',
			'strings'           => [
				'title'                => __( 'WooCommerce Multilingual', 'woocommerce-multilingual' ),
				'required'             => __( 'Required plugins', 'woocommerce-multilingual' ),
				'plugins'              => __( 'Plugins Status', 'woocommerce-multilingual' ),
				'depends'              => __( 'WooCommerce Multilingual depends on several plugins to work. If any required plugin is missing, you should install and activate it.', 'woocommerce-multilingual' ),
				'old_wpml_link'        => sprintf( __( 'WooCommerce Multilingual is enabled but not effective. It is not compatible with  <a href="%s">WPML</a> versions prior 4.0', 'woocommerce-multilingual' ), $this->tracking_link->getWpmlHome() ),
				'update_wpml'          => __( 'Update WPML', 'woocommerce-multilingual' ),
				'upgrade_wpml'         => __( 'Upgrade WPML', 'woocommerce-multilingual' ),
				'get_wpml'             => __( 'Get WPML', 'woocommerce-multilingual' ),
				'get_wpml_tm'          => __( 'Get WPML Translation Management', 'woocommerce-multilingual' ),
				'get_wpml_st'          => __( 'Get WPML String Translation', 'woocommerce-multilingual' ),
				'new_design_wpml_link' => sprintf( __( 'You are using WooCommerce Multilingual %1$s. This version includes an important UI redesign for the configuration screens and it requires <a href="%2$s">WPML %3$s</a> or higher. Everything still works on the front end now but, in order to configure options for WooCommerce Multilingual, you need to upgrade WPML.', 'woocommerce-multilingual' ), WCML_VERSION, $this->tracking_link->getWpmlHome(), '3.4' ),
				'wpml'                 => '<strong>WPML</strong>',
				'tm'                   => '<strong>WPML Translation Management</strong>',
				'st'                   => '<strong>WPML String Translation</strong>',
				'wc'                   => '<strong>WooCommerce</strong>',
				'inst_active'          => __( '%s is installed and active.', 'woocommerce-multilingual' ),
				'is_setup'             => __( '%s is set up.', 'woocommerce-multilingual' ),
				'not_setup'            => __( '%s is not set up.', 'woocommerce-multilingual' ),
				'not_inst'             => __( '%s is either not installed or not active.', 'woocommerce-multilingual' ),
				'wpml_not_inst'        => sprintf( __( '%s is either not installed or not active.', 'woocommerce-multilingual' ), '<strong><a title="' . esc_attr__( 'The WordPress Multilingual Plugin', 'woocommerce-multilingual' ) . '" href="' . $this->tracking_link->getWpmlHome() . '">WPML</a></strong>' ),
				'old_wc'               => sprintf( __( '%1$s  is installed, but with incorrect version. You need %1$s %2$s or higher. ', 'woocommerce-multilingual' ), '<strong>WooCommerce</strong>', '3.3.0' ),
				'download_wc'          => __( 'Download WooCommerce', 'woocommerce-multilingual' ),
			],
		];

		return $model;

	}

	/**
	 * Outputs the template.
	 */
	public function show() {
		$model = new \WPML\Templates\PHP\Model( $this->get_model() );
		include WCML_PLUGIN_PATH . '/templates/php/plugins-wrap.php';
	}

}
