<?php

class WCML_Pip {

	public function __construct() {

		add_filter( 'wcml_send_email_order_id', [ $this, 'wcml_send_email_order_id' ] );
		add_filter( 'woocommerce_currency_symbol', [ $this, 'filter_pip_currency_symbol' ] );
		add_filter( 'wcml_filter_currency_position', [ $this, 'filter_pip_currency_position' ] );
		add_action( 'wc_pip_print', [ $this, 'print_invoice_language' ], 10, 3 );

	}

	public function wcml_send_email_order_id( $order_id ) {

		$pip_order_id = $this->get_pip_order_id();

		if ( $pip_order_id ) {
			$order_id = $pip_order_id;
		}

		return $order_id;

	}

	public function filter_pip_currency_symbol( $currency_symbol ) {

		remove_filter( 'woocommerce_currency_symbol', [ $this, 'filter_pip_currency_symbol' ] );

		$currency = $this->get_pip_order_currency();

		if ( $currency ) {
			$currency_symbol = get_woocommerce_currency_symbol( $currency );
		}

		add_filter( 'woocommerce_currency_symbol', [ $this, 'filter_pip_currency_symbol' ] );

		return $currency_symbol;
	}

	public function filter_pip_currency_position( $currency ) {

		remove_filter( 'wcml_filter_currency_position', [ $this, 'filter_pip_currency_position' ] );

		$currency = $this->get_pip_order_currency( $currency );

		add_filter( 'wcml_filter_currency_position', [ $this, 'filter_pip_currency_position' ] );

		return $currency;

	}

	public function get_pip_order_id() {

		$order_id = false;

		if ( isset( $_GET['wc_pip_action'] ) && isset( $_GET['order_id'] ) ) {
			$order_id = $_GET['order_id'];
		} elseif (
			isset( $_POST['action'] ) &&
			(
				$_POST['action'] == 'wc_pip_order_send_email' ||
				$_POST['action'] == 'wc_pip_send_email_packing_list'
			) &&
			isset( $_POST['order_id'] )
		) {
			$order_id = $_POST['order_id'];
		}

		return $order_id;
	}

	public function get_pip_order_currency( $currency = false ) {

		$pip_order_id = $this->get_pip_order_id();

		if ( $pip_order_id && isset( WC()->order_factory ) ) {

			$the_order = WC()->order_factory->get_order( $pip_order_id );

			if ( $the_order ) {
				$currency = $the_order->get_currency();

				if ( ! $currency && isset( $_COOKIE['_wcml_order_currency'] ) ) {
					$currency = $_COOKIE['_wcml_order_currency'];
				}
			}
		}

		return $currency;

	}

	public function print_invoice_language( $type, $order_id, $order_ids ) {

		$order_language = get_post_meta( $order_id, 'wpml_language', true );

		if ( $order_language ) {
			do_action( 'wpml_switch_language', $order_language );
		}

	}

}
