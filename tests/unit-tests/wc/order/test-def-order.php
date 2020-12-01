<?php // phpcs:ignore
/**
 *
 * Undocumented class
 *
 * @package category
 */

/**
 * Undocumented class
 */
class Test_Order extends WP_UnitTestCase {



	/**
	 * Test order type
	 */
	public function test_get_type() {
		$order = ( new Krokedil_Order() )->create();
		$this->assertEquals( 'shop_order', $order->get_type() );
	}

	/**
	 * Test order data
	 */
	public function test_get_data() {
		$order = ( new Krokedil_Order() )->create();
		$this->assertTrue( is_array( $order->get_data() ) );
	}

	/**
	 * Test order id
	 */
	public function test_get_id() {
		$kro_helper_order = new Krokedil_Order();
		$order            = $kro_helper_order->create();
		$id               = $kro_helper_order->get_order_id();
		$this->assertEquals( $id, $order->get_id() );

	}

	/**
	 * Test parent id
	 */
	public function test_get_parent_id() {
		$order_helper = new Krokedil_Order();
		$order_helper->create();
		$parent_id = $order_helper->get_order_id();
		$order     = ( new Krokedil_Order() )->create();
		$order->set_parent_id( $parent_id );
		$this->assertEquals( $parent_id, $order->get_parent_id() );
	}

	/**
	 * Test order number
	 */
	public function test_get_order_number() {
		$order_helper = new Krokedil_Order();

		$order = $order_helper->create();
		$id    = $order_helper->get_order_id();
		$this->assertEquals( $id, $order->get_order_number() );
	}

	/**
	 * Test order key
	 */
	public function test_get_order_key() {
		$order = ( new Krokedil_Order() )->create();
		$key   = 'order_key';
		$order->set_order_key( $key );
		$this->assertEquals( $key, $order->get_order_key() );
	}


	/**
	 * Test currency
	 */
	public function test_get_currency() {
		$order    = ( new Krokedil_Order() )->create();
		$currency = 'USD';
		$order->set_currency( $currency );
		$this->assertEquals( $currency, $order->get_currency() );
	}

	/**
	 * Test version
	 *
	 * @throws WC_Data_Exception May throw exception if data is invalid.
	 */
	public function test_get_version() {
		$order   = ( new Krokedil_Order() )->create();
		$version = '1.1.1.';
		$order->set_version( $version );
		$this->assertEquals( $version, $order->get_version() );
	}

	/**
	 * Test  prices include tax
	 *
	 * @throws WC_Data_Exception May throw exception if data is invalid.
	 */
	public function test_get_prices_include_tax() {
		$order = ( new Krokedil_Order() )->create();
		$order->set_prices_include_tax( 1 );
		$this->assertTrue( $order->get_prices_include_tax() );
	}

	/**
	 * Test date created
	 *
	 * @throws WC_Data_Exception May throw exception if data is invalid.
	 */
	public function test_get_date_created() {
		$order = ( new Krokedil_Order() )->create();
		$order->set_date_created( '2020-04-24' );
		$this->assertEquals( '1587686400', $order->get_date_created()->getOffsetTimestamp() );
	}

	/**
	 * Test date modified
	 *
	 * @throws WC_Data_Exception May throw exception if data is invalid.
	 */
	public function test_get_date_modified() {
		$order = ( new Krokedil_Order() )->create();
		$order->set_date_modified( '2020-04-24' );
		$this->assertEquals( '1587686400', $order->get_date_modified()->getOffsetTimestamp() );

		$order->set_date_modified( '1587686400' );
		$this->assertEquals( 1587686400, $order->get_date_modified()->getTimestamp() );
	}

	/**
	 * Test: get_discount_total
	 */
	public function test_get_discount_total() {
		$order = ( new Krokedil_Order() )->create();
		$order->set_discount_total( 50 );
		$this->assertEquals( 50, $order->get_discount_total() );
	}

	/**
	 * Test: get_discount_tax
	 */
	public function test_get_discount_tax() {
		$order = ( new Krokedil_Order() )->create();
		$order->set_discount_tax( 5 );
		$this->assertEquals( 5, $order->get_discount_tax() );
	}

	/**
	 * Test: get_shipping_total
	 */
	public function test_get_shipping_total() {
		$order = ( new Krokedil_Order() )->create();
		$order->set_shipping_total( 5 );
		$this->assertEquals( 5, $order->get_shipping_total() );
	}

	/**
	 * Test: get_shipping_tax
	 */
	public function test_get_shipping_tax() {
		$order = ( new Krokedil_Order() )->create();
		$order->set_shipping_tax( 5 );
		$this->assertEquals( 5, $order->get_shipping_tax() );
	}

	/**
	 * Test: get_cart_tax
	 */
	public function test_get_cart_tax() {
		$order = ( new Krokedil_Order() )->create();
		$order->set_cart_tax( 5 );
		$this->assertEquals( 5, $order->get_cart_tax() );
	}

	/**
	 * Test: get_total
	 */
	public function test_get_total() {
		$order = ( new Krokedil_Order() )->create();
		$order->set_total( 5 );
		$this->assertEquals( 5, $order->get_total() );
	}

	/**
	 * Test: get_total_tax
	 */
	public function test_get_total_tax() {
		$order = ( new Krokedil_Order() )->create();
		$order->set_cart_tax( 5 );
		$order->set_shipping_tax( 5 );
		$this->assertEquals( 10, $order->get_total_tax() );
	}

	/**
	 * Test: get_total_discount
	 */
	public function test_get_total_discount() {
		$order = ( new Krokedil_Order() )->create();
		$order->set_discount_total( 50 );
		$order->set_discount_tax( 5 );
		$this->assertEquals( 50, $order->get_total_discount() );
		$this->assertEquals( 55, $order->get_total_discount( false ) );
	}

	/**
	 * Test: get_subtotal
	 */
	public function test_get_subtotal() {
		$order = ( new Krokedil_Order() )->create();
		$this->assertEquals( 0, $order->get_subtotal() );
	}

	/**
	 * Test: get_tax_totals
	 */
	public function test_get_tax_totals() {
		$order = ( new Krokedil_Order() )->create();
		$this->assertEquals( array(), $order->get_tax_totals() );
	}

	/**
	 * Test: remove_order_items
	 */
	public function test_remove_order_items() {
		$product = ( new Krokedil_Simple_Product() )->create();
		$item_1  = new WC_Order_Item_Product();
		$item_1->set_props(
			array(
				'product'  => $product,
				'quantity' => 4,
			)
		);
		$item_2 = new WC_Order_Item_Product();
		$item_2->set_props(
			array(
				'product'  => $product,
				'quantity' => 2,
			)
		);

		$order = ( new Krokedil_Order( $product, null, array( $item_1, $item_2 ) ) )->create();
		$order->save();
		$this->assertCount( 2, $order->get_items() );
		$order->remove_order_items();
		$this->assertCount( 0, $order->get_items() );
	}

	/**
	 * Test: get_items
	 */
	public function test_get_items() {
		$product1 = ( new Krokedil_Simple_Product() )->create();
		$product2 = ( new Krokedil_Simple_Product() )->create();
		$item_1   = new WC_Order_Item_Product();
		$item_1->set_props(
			array(
				'product'  => $product1,
				'quantity' => 4,
			)
		);
		$item_2 = new WC_Order_Item_Product();
		$item_2->set_props(
			array(
				'product'  => $product1,
				'quantity' => 2,
			)
		);
		$order = ( new Krokedil_Order( $product1, null, array( $item_1, $item_2 ) ) )->create();

		$order->save();
		$this->assertCount( 2, $order->get_items() );
	}

	/**
	 * Test: get_different_items
	 */
	public function test_get_different_items() {
		$item_1 = new WC_Order_Item_Product();
		$item_1->set_props(
			array(
				'product'  => ( new Krokedil_Simple_Product() )->create(),
				'quantity' => 4,
			)
		);
		$item_2 = new WC_Order_Item_Fee();
		$item_2->set_props(
			array(
				'name'       => 'Some Fee',
				'tax_status' => 'taxable',
				'total'      => '100',
				'tax_class'  => '',
			)
		);
		$items[] = $item_1;
		$items[] = $item_2;
		$order   = ( new Krokedil_Order( null, null, $items ) )->create();
		$order->add_item( $item_2 );
		$this->assertCount( 2, $order->get_items( array( 'line_item', 'fee' ) ) );
	}

	/**
	 * Test: get_coupons
	 */
	public function test_get_coupons() {
		$item = new WC_Order_Item_Coupon();
		$item->set_props(
			array(
				'code'         => '12345',
				'discount'     => 10,
				'discount_tax' => 5,
			)
		);
		$items = array();
		$item->save();
		$items[] = $item;
		$order   = ( new Krokedil_Order( null, null, array( $item ), array(), null ) )->create();
		$this->assertCount( 1, $order->get_coupon_codes() );

	}

	/**
	 * Test: get_fees
	 */
	public function test_get_fees() {
		$order = ( new Krokedil_Order() )->create();
		$item  = new WC_Order_Item_Fee();
		$item->set_props(
			array(
				'name'       => 'Some Fee',
				'tax_status' => 'taxable',
				'total'      => '100',
				'tax_class'  => '',
			)
		);
		$order->add_item( $item );
		$this->assertCount( 1, $order->get_fees() );
	}

	/**
	 * Test: get_taxes
	 */
	public function test_get_taxes() {
		update_option( 'woocommerce_calc_taxes', 'yes' );
		$tax_rate = array(
			'tax_rate_country'  => '',
			'tax_rate_state'    => '',
			'tax_rate'          => '10.0000',
			'tax_rate_name'     => 'TAX',
			'tax_rate_priority' => '1',
			'tax_rate_compound' => '0',
			'tax_rate_shipping' => '1',
			'tax_rate_order'    => '1',
			'tax_rate_class'    => '',
		);
		WC_Tax::_insert_tax_rate( $tax_rate );

		$order  = ( new Krokedil_Order() )->create();
		$item_1 = new WC_Order_Item_Product();
		$item_1->set_props(
			array(
				'product'  => ( new Krokedil_Simple_Product() )->create(),
				'quantity' => 4,
			)
		);
		$order->add_item( $item_1 );
		$order->calculate_totals();
		$this->assertCount( 1, $order->get_taxes() );

		$item = new WC_Order_Item_Tax();
		$item->set_rate( 100 );
		$item->set_tax_total( 100 );
		$item->set_shipping_tax_total( 100 );
		$order->add_item( $item );
		$order->save();

		$this->assertCount( 2, $order->get_taxes() );
	}

	/**
	 * Test mapping from old tax array keys to CRUD functions.
	 */
	public function test_tax_legacy_arrayaccess() {
		$tax = new WC_Order_item_Tax();
		$tax->set_rate_id( 5 );
		$tax->set_compound( true );
		$tax->set_tax_total( 2.00 );
		$tax->set_shipping_tax_total( 1.50 );

		$this->assertEquals( $tax->get_rate_id(), $tax['rate_id'] );
		$this->assertEquals( $tax->get_compound(), $tax['compound'] );
		$this->assertEquals( $tax->get_tax_total(), $tax['tax_total'] );
		$this->assertEquals( $tax->get_tax_total(), $tax['tax_amount'] );
		$this->assertEquals( $tax->get_shipping_tax_total(), $tax['shipping_tax_total'] );
		$this->assertEquals( $tax->get_shipping_tax_total(), $tax['shipping_tax_amount'] );
	}

	/**
	 * Test: get_shipping_methods
	 */
	public function test_get_shipping_methods() {
		$order = ( new Krokedil_Order() )->create();
		$rate  = new WC_Shipping_Rate( 'flat_rate_shipping', 'Flat rate shipping', '10', array(), 'flat_rate' );
		$item  = new WC_Order_Item_Shipping();
		$item->set_props(
			array(
				'method_title' => $rate->label,
				'method_id'    => $rate->id,
				'total'        => wc_format_decimal( $rate->cost ),
				'taxes'        => $rate->taxes,
			)
		);
		foreach ( $rate->get_meta_data() as $key => $value ) {
			$item->add_meta_data( $key, $value, true );
		}
		$order->add_item( $item );
		$order->save();
		$this->assertCount( 1, $order->get_shipping_methods() );
	}

	/**
	 * Test: get_shipping_method
	 */
	public function test_get_shipping_method() {
		$order = ( new Krokedil_Order() )->create();
		$rate  = new WC_Shipping_Rate( 'flat_rate_shipping', 'Flat rate shipping', '10', array(), 'flat_rate' );
		$item  = new WC_Order_Item_Shipping();
		$item->set_props(
			array(
				'method_title' => $rate->label,
				'method_id'    => $rate->id,
				'total'        => wc_format_decimal( $rate->cost ),
				'taxes'        => $rate->taxes,
			)
		);
		foreach ( $rate->get_meta_data() as $key => $value ) {
			$item->add_meta_data( $key, $value, true );
		}
		$order->add_item( $item );
		$order->save();
		$this->assertEquals( 'Flat rate shipping', $order->get_shipping_method() );

		$rate = new WC_Shipping_Rate( 'flat_rate_shipping', 'Flat rate shipping 2', '10', array(), 'flat_rate' );
		$item = new WC_Order_Item_Shipping();
		$item->set_props(
			array(
				'method_title' => $rate->label,
				'method_id'    => $rate->id,
				'total'        => wc_format_decimal( $rate->cost ),
				'taxes'        => $rate->taxes,
			)
		);
		foreach ( $rate->get_meta_data() as $key => $value ) {
			$item->add_meta_data( $key, $value, true );
		}
		$order->add_item( $item );
		$order->save();
		$this->assertEquals( 'Flat rate shipping, Flat rate shipping 2', $order->get_shipping_method() );
	}

	/**
	 * Test: get_coupon_codes
	 */
	public function test_get_coupon_codes() {
		$order = ( new Krokedil_Order() )->create();
		$item  = new WC_Order_Item_Coupon();
		$item->set_props(
			array(
				'code'         => '12345',
				'discount'     => 10,
				'discount_tax' => 5,
			)
		);
		$order->add_item( $item );
		$order->save();
		$this->assertCount( 1, $order->get_coupon_codes() );
	}

	/**
	 * Test: get_item_count
	 */
	public function test_get_item_count() {
		$order  = ( new Krokedil_Order() )->create();
		$item_1 = new WC_Order_Item_Product();
		$item_1->set_props(
			array(
				'product'  => ( new Krokedil_Simple_Product() )->create(),
				'quantity' => 4,
			)
		);
		$item_2 = new WC_Order_Item_Product();
		$item_2->set_props(
			array(
				'product'  => ( new Krokedil_Simple_Product() )->create(),
				'quantity' => 2,
			)
		);
		$order->add_item( $item_1 );
		$order->add_item( $item_2 );
		$order->save();
		$this->assertEquals( 6, $order->get_item_count() );
	}

	/**
	 * Test: get_item
	 */
	public function test_get_item() {
		$order = ( new Krokedil_Order() )->create();
		$item  = new WC_Order_Item_Product();
		$item->set_props(
			array(
				'product'  => ( new Krokedil_Simple_Product() )->create(),
				'quantity' => 4,
			)
		);
		$item->save();
		$order->add_item( $item->get_id() );
		$order->save();
		$this->assertInstanceOf( WC_Order_Item_Product::class, $order->get_item( $item->get_id() ) );

		$order = ( new Krokedil_Order() )->create();
		$item  = new WC_Order_Item_Coupon();
		$item->set_props(
			array(
				'code'         => '12345',
				'discount'     => 10,
				'discount_tax' => 5,
			)
		);
		$item_id = $item->save();
		$order->add_item( $item );
		$order->save();
		$this->assertInstanceOf( WC_Order_Item_Coupon::class, $order->get_item( $item_id ) );
	}

	/**
	 * Test: add_payment_token
	 */
	public function test_add_payment_token() {
		$order = ( new Krokedil_Order() )->create();
		$order->save();
		$this->assertFalse( $order->add_payment_token( 'fish' ) );
		$token = new Krokedil_Payment_Token();
		$token->set_extra( __FUNCTION__ );
		$token->set_token( time() );
		$token->save();
		$this->assertTrue( 0 < $order->add_payment_token( $token ) );
	}

	/**
	 * Test: get_payment_tokens
	 */
	public function test_get_payment_tokens() {
		$order = ( new Krokedil_Order() )->create();
		$order->save();
		$token = new Krokedil_Payment_Token();
		$token->set_extra( __FUNCTION__ );
		$token->set_token( time() );
		$token->save();
		$order->add_payment_token( $token );
		$this->assertCount( 1, $order->get_payment_tokens() );
	}

	/**
	 * Test: calculate_shipping
	 */
	public function test_calculate_shipping() {
		$order  = ( new Krokedil_Order() )->create();
		$rate   = new WC_Shipping_Rate( 'flat_rate_shipping', 'Flat rate shipping', '10', array(), 'flat_rate' );
		$item_1 = new WC_Order_Item_Shipping();
		$item_1->set_props(
			array(
				'method_title' => $rate->get_label(),
				'method_id'    => $rate->id,
				'total'        => wc_format_decimal( $rate->get_cost() ),
				'taxes'        => $rate->get_taxes(),
			)
		);
		foreach ( $rate->get_meta_data() as $key => $value ) {
			$item_1->add_meta_data( $key, $value, true );
		}
		$item_2 = new WC_Order_Item_Shipping();
		$item_2->set_props(
			array(
				'method_title' => $rate->get_label(),
				'method_id'    => $rate->id,
				'total'        => wc_format_decimal( $rate->get_cost() ),
				'taxes'        => $rate->get_taxes(),
			)
		);
		foreach ( $rate->get_meta_data() as $key => $value ) {
			$item_1->add_meta_data( $key, $value, true );
		}
		$order->add_item( $item_1 );
		$order->add_item( $item_2 );
		$order->save();
		$order->calculate_shipping();
		$this->assertEquals( 20, $order->get_shipping_total() );
	}

	/**
	 * Test: calculate taxes is vat excempt
	 *
	 * @throws WC_Data_Exception May throw exception if data is invalid.
	 */
	public function test_calculate_taxes_is_vat_excempt() {
		update_option( 'woocommerce_calc_taxes', 'yes' );
		$tax_rate = array(
			'tax_rate_country'  => '',
			'tax_rate_state'    => '',
			'tax_rate'          => '10.0000',
			'tax_rate_name'     => 'TAX',
			'tax_rate_priority' => '1',
			'tax_rate_compound' => '0',
			'tax_rate_shipping' => '1',
			'tax_rate_order'    => '1',
			'tax_rate_class'    => '',
		);
		WC_Tax::_insert_tax_rate( $tax_rate );

		$order = ( new Krokedil_Order() )->create();
		$order->add_product( ( new Krokedil_Simple_Product() )->create(), 4 );
		$rate = new WC_Shipping_Rate( 'flat_rate_shipping', 'Flat rate shipping', '10', array(), 'flat_rate' );
		$item = new WC_Order_Item_Shipping();
		$item->set_props(
			array(
				'method_title' => $rate->label,
				'method_id'    => $rate->id,
				'total'        => wc_format_decimal( $rate->cost ),
				'taxes'        => $rate->taxes,
			)
		);
		foreach ( $rate->get_meta_data() as $key => $value ) {
			$item->add_meta_data( $key, $value, true );
		}
		$order->add_item( $item );

		// Add VAT except meta .
		$order->add_meta_data( 'is_vat_exempt', 'yes', true );
		$order->save();
		$order->calculate_taxes();
		$this->assertEquals( 0, $order->get_total_tax() );
	}

	/**
	 * Test: calculate_taxes_issue_with_addresses
	 */
	public function test_calculate_taxes_issue_with_addresses() {
		update_option( 'woocommerce_calc_taxes', 'yes' );

		$taxes = array();

		$taxes[] = WC_Tax::_insert_tax_rate(
			array(
				'tax_rate_country'  => 'US',
				'tax_rate_state'    => '',
				'tax_rate'          => '20.0000',
				'tax_rate_name'     => 'TAX',
				'tax_rate_priority' => '1',
				'tax_rate_compound' => '0',
				'tax_rate_shipping' => '1',
				'tax_rate_order'    => '1',
				'tax_rate_class'    => '',
			)
		);
		$taxes[] = WC_Tax::_insert_tax_rate(
			array(
				'tax_rate_country'  => 'PY',
				'tax_rate_state'    => '',
				'tax_rate'          => '10.0000',
				'tax_rate_name'     => 'TAX',
				'tax_rate_priority' => '1',
				'tax_rate_compound' => '0',
				'tax_rate_shipping' => '1',
				'tax_rate_order'    => '1',
				'tax_rate_class'    => '',
			)
		);

		update_option( 'woocommerce_default_country', 'PY:Central' );
		update_option( 'woocommerce_tax_based_on', 'shipping' );

		$order = ( new Krokedil_Order() )->create();
		$order->set_billing_country( 'US' );
		$order->set_billing_state( 'CA' );
		$order->add_product( ( new Krokedil_Simple_Product() )->create(), 4 );
		$order->calculate_taxes();

		$tax = $order->get_taxes();
		$this->assertEquals( 1, count( $tax ) );
		$this->assertEquals( 'US-TAX-1', current( $tax )->get_name() );
	}



	/**
	 * Test has status
	 */
	public function test_has_status() {
		$order = ( new Krokedil_Order() )->create();
		$this->assertFalse( $order->has_status( 'completed' ) );
		$this->assertFalse( $order->has_status( array( 'processing', 'completed' ) ) );
		$this->assertTrue( $order->has_status( 'pending' ) );
		$this->assertTrue( $order->has_status( array( 'processing', 'pending' ) ) );
	}

	/**
	 * Has shipping method
	 */
	public function test_has_shipping_method() {
		$order = ( new Krokedil_Order() )->create();
		$order->save();

		$this->assertFalse( $order->has_shipping_method( 'flat_rate_shipping' ) );

		$rate = new WC_Shipping_Rate( 'flat_rate_shipping:1', 'Flat rate shipping', '10', array(), 'flat_rate' );
		$item = new WC_Order_Item_Shipping();
		$item->set_props(
			array(
				'method_title' => $rate->label,
				'method_id'    => $rate->id,
				'total'        => wc_format_decimal( $rate->cost ),
				'taxes'        => $rate->taxes,
			)
		);
		foreach ( $rate->get_meta_data() as $key => $value ) {
			$item->add_meta_data( $key, $value, true );
		}
		$order->add_item( $item );
		$order->save();

		$this->assertTrue( $order->has_shipping_method( 'flat_rate_shipping' ) );
	}

	/**
	 * Test key is valid
	 *
	 * @throws WC_Data_Exception May throw exception if data is invalid.
	 */
	public function test_key_is_valid() {
		$order = ( new Krokedil_Order() )->create();
		$order->save();
		$this->assertFalse( $order->key_is_valid( '1234' ) );
		$order->set_order_key( '1234' );
		$this->assertTrue( $order->key_is_valid( '1234' ) );
	}

	/**
	 * Test has free item
	 *
	 * @throws WC_Data_Exception May throw exception if data is invalid.
	 */
	public function test_has_free_item() {
		$order = ( new Krokedil_Order() )->create();
		$order->add_product( ( new Krokedil_Simple_Product() )->create(), 4 );
		$this->assertFalse( $order->has_free_item() );

		$free_product = ( new Krokedil_Simple_Product() )->create();
		$free_product->set_price( 0 );
		$order->add_product( $free_product, 4 );
		$this->assertTrue( $order->has_free_item() );
	}

	/**
	 * Test: CRUD
	 */
	public function test_CRUD() {
		$order = ( new Krokedil_Order() )->create();

		// Save + create.
		$save_id = $order->save();
		$post    = get_post( $save_id );
		$this->assertEquals( 'shop_order', $post->post_type );
		$this->assertEquals( 'shop_order', $post->post_type );

		// Update.
		$update_id = $order->save();
		$this->assertEquals( $update_id, $save_id );

		// Delete.
		$order->delete( true );
		$post = get_post( $save_id );
		$this->assertNull( $post );
	}

	/**
	 * Test: payment_complete
	 */
	public function test_payment_complete() {
		$order = ( new Krokedil_Order() )->create();
		$this->assertTrue( $order->payment_complete( '12345' ) );
		$this->assertEquals( 'completed', $order->get_status() );
		$this->assertEquals( '12345', $order->get_transaction_id() );
	}

	/**
	 * Test that exceptions thrown during payment_complete are handled.
	 * Note: This can't actually test the transaction rollbacks since WC transactions are disabled in unit tests.
	 *
	 * @since 3.3.0
	 */
	public function test_payment_complete_error() {
		$order = ( new Krokedil_Order() )->create();
		$order->save();

		add_action( 'woocommerce_payment_complete', array( $this, 'throwAnException' ) );

		$this->assertFalse( $order->payment_complete( '12345' ) );
		$note = current(
			wc_get_order_notes(
				array(
					'order_id' => $order->get_id(),
				)
			)
		);
		$this->assertContains( 'Payment complete event failed', $note->content );

		remove_action( 'woocommerce_payment_complete', array( $this, 'throwAnException' ) );
	}

	/**
	 * Test: get_formatted_order_total
	 */
	public function test_get_formatted_order_total() {
		$order = ( new Krokedil_Order() )->create();
		$order->set_total( 100 );
		$order->set_currency( 'USD' );
		if ( '4.4.0' === WC()->version ) {
			$this->assertEquals( '<span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">&#36;</span>100.00</bdi></span>', $order->get_formatted_order_total() );
		} else {
			$this->assertEquals( '<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">&#36;</span>100.00</span>', $order->get_formatted_order_total() );
		}

	}

	/**
	 * Test: set_status
	 */
	public function test_set_status() {
		$order = ( new Krokedil_Order() )->create();
		$order->set_status( 'on-hold' );
		$this->assertEquals( 'on-hold', $order->get_status() );
	}

	/**
	 * Test: update_status
	 */
	public function test_update_status() {
		$order = ( new Krokedil_Order() )->create();
		$this->assertTrue( $order->update_status( 'on-hold' ) );
		$this->assertEquals( 'on-hold', $order->get_status() );
	}

	/**
	 * Test that exceptions thrown during update_status are handled.
	 * Note: This can't actually test the transaction rollbacks since WC transactions are disabled in unit tests.
	 *
	 * @since 3.3.0
	 */
	public function test_update_status_error() {
		$order = ( new Krokedil_Order() )->create();
		$order->save();

		add_filter( 'woocommerce_payment_complete_order_status', array( $this, 'throwAnException' ) );

		$this->assertFalse( $order->update_status( 'on-hold' ) );
		$note = current(
			wc_get_order_notes(
				array(
					'order_id' => $order->get_id(),
				)
			)
		);
		$this->assertContains( 'Update status event failed', $note->content );

		remove_filter( 'woocommerce_payment_complete_order_status', array( $this, 'throwAnException' ) );
	}

	/**
	 * Test: status_transition
	 */
	public function test_status_transition_handles_transition_errors() {
		$order = ( new Krokedil_Order() )->create();
		$order->save();

		add_filter( 'woocommerce_order_status_on-hold', array( $this, 'throwAnException' ) );
		$order->update_status( 'on-hold' );
		remove_filter( 'woocommerce_order_status_on-hold', array( $this, 'throwAnException' ) );

		$note = current(
			wc_get_order_notes(
				array(
					'order_id' => $order->get_id(),
				)
			)
		);

		$this->assertContains( __( 'Error during status transition.', 'woocommerce' ), $note->content );
	}

	/**
	 * Test: get_billing_first_name
	 */
	public function test_get_billing_first_name() {
		$order  = ( new Krokedil_Order() )->create();
		$set_to = 'Fred';
		$order->set_billing_first_name( $set_to );
		$this->assertEquals( $set_to, $order->get_billing_first_name() );
	}

	/**
	 * Test: get_billing_last_name
	 */
	public function test_get_billing_last_name() {
		$order  = ( new Krokedil_Order() )->create();
		$set_to = 'Flintstone';
		$order->set_billing_last_name( $set_to );
		$this->assertEquals( $set_to, $order->get_billing_last_name() );
	}

	/**
	 * Test: get_billing_company
	 */
	public function test_get_billing_company() {
		$order  = ( new Krokedil_Order() )->create();
		$set_to = 'Bedrock Ltd.';
		$order->set_billing_company( $set_to );
		$this->assertEquals( $set_to, $order->get_billing_company() );
	}

	/**
	 * Test: get_billing_address_1
	 */
	public function test_get_billing_address_1() {
		$order  = ( new Krokedil_Order() )->create();
		$set_to = '34 Stonepants avenue';
		$order->set_billing_address_1( $set_to );
		$this->assertEquals( $set_to, $order->get_billing_address_1() );
	}

	/**
	 * Test: get_billing_address_2
	 */
	public function test_get_billing_address_2() {
		$order  = ( new Krokedil_Order() )->create();
		$set_to = 'Rockville';
		$order->set_billing_address_2( $set_to );
		$this->assertEquals( $set_to, $order->get_billing_address_2() );
	}

	/**
	 * Test: get_billing_city
	 */
	public function test_get_billing_city() {
		$order  = ( new Krokedil_Order() )->create();
		$set_to = 'Bedrock';
		$order->set_billing_city( $set_to );
		$this->assertEquals( $set_to, $order->get_billing_city() );
	}

	/**
	 * Test: get_billing_state
	 */
	public function test_get_billing_state() {
		$order  = ( new Krokedil_Order() )->create();
		$set_to = 'Oregon';
		$order->set_billing_state( $set_to );
		$this->assertEquals( $set_to, $order->get_billing_state() );
	}

	/**
	 * Test: get_billing_postcode
	 */
	public function test_get_billing_postcode() {
		$order  = ( new Krokedil_Order() )->create();
		$set_to = '00001';
		$order->set_billing_postcode( $set_to );
		$this->assertEquals( $set_to, $order->get_billing_postcode() );
	}

	/**
	 * Test: get_billing_country
	 */
	public function test_get_billing_country() {
		$order  = ( new Krokedil_Order() )->create();
		$set_to = 'US';
		$order->set_billing_country( $set_to );
		$this->assertEquals( $set_to, $order->get_billing_country() );
	}

	/**
	 * Test: get_billing_email
	 */
	public function test_get_billing_email() {
		$order  = ( new Krokedil_Order() )->create();
		$set_to = 'test@test.com';
		$order->set_billing_email( $set_to );
		$this->assertEquals( $set_to, $order->get_billing_email() );

		$set_to = 'not an email';
		$this->setExpectedException( 'WC_Data_Exception', 'Invalid billing email address' );
		$order->set_billing_email( $set_to );
		$this->assertEquals( 'test@test.com', $order->get_billing_email() );
	}

	/**
	 * Test: get_billing_phone
	 */
	public function test_get_billing_phone() {
		$order  = ( new Krokedil_Order() )->create();
		$set_to = '123456678';
		$order->set_billing_phone( $set_to );
		$this->assertEquals( $set_to, $order->get_billing_phone() );
	}

	/**
	 * Test: Setting/getting billing settings after an order is saved
	 */
	public function test_set_billing_after_save() {
		$order = ( new Krokedil_Order() )->create();
		$phone = '123456678';
		$order->set_billing_phone( $phone );
		$order->save();
		$state = 'Oregon';
		$order->set_billing_state( $state );

		$this->assertEquals( $phone, $order->get_billing_phone() );
		$this->assertEquals( $state, $order->get_billing_state() );
	}

	/**
	 * Test: get_shipping_first_name
	 */
	public function test_get_shipping_first_name() {
		$order  = ( new Krokedil_Order() )->create();
		$set_to = 'Fred';
		$order->set_shipping_first_name( $set_to );
		$this->assertEquals( $set_to, $order->get_shipping_first_name() );
	}

	/**
	 * Test: get_shipping_last_name
	 */
	public function test_get_shipping_last_name() {
		$order  = ( new Krokedil_Order() )->create();
		$set_to = 'Flintstone';
		$order->set_shipping_last_name( $set_to );
		$this->assertEquals( $set_to, $order->get_shipping_last_name() );
	}

	/**
	 * Test: get_shipping_company
	 */
	public function test_get_shipping_company() {
		$order  = ( new Krokedil_Order() )->create();
		$set_to = 'Bedrock Ltd.';
		$order->set_shipping_company( $set_to );
		$this->assertEquals( $set_to, $order->get_shipping_company() );
	}

	/**
	 * Test: get_shipping_address_1
	 */
	public function test_get_shipping_address_1() {
		$order  = ( new Krokedil_Order() )->create();
		$set_to = '34 Stonepants avenue';
		$order->set_shipping_address_1( $set_to );
		$this->assertEquals( $set_to, $order->get_shipping_address_1() );
	}

	/**
	 * Test: get_shipping_address_2
	 */
	public function test_get_shipping_address_2() {
		$order  = ( new Krokedil_Order() )->create();
		$set_to = 'Rockville';
		$order->set_shipping_address_2( $set_to );
		$this->assertEquals( $set_to, $order->get_shipping_address_2() );
	}

	/**
	 * Test: get_shipping_city
	 */
	public function test_get_shipping_city() {
		$order  = ( new Krokedil_Order() )->create();
		$set_to = 'Bedrock';
		$order->set_shipping_city( $set_to );
		$this->assertEquals( $set_to, $order->get_shipping_city() );
	}

	/**
	 * Test: get_shipping_state
	 */
	public function test_get_shipping_state() {
		$order  = ( new Krokedil_Order() )->create();
		$set_to = 'Oregon';
		$order->set_shipping_state( $set_to );
		$this->assertEquals( $set_to, $order->get_shipping_state() );
	}

	/**
	 * Test: get_shipping_postcode
	 */
	public function test_get_shipping_postcode() {
		$order  = ( new Krokedil_Order() )->create();
		$set_to = '00001';
		$order->set_shipping_postcode( $set_to );
		$this->assertEquals( $set_to, $order->get_shipping_postcode() );
	}

	/**
	 * Test: get_shipping_country
	 */
	public function test_get_shipping_country() {
		$order  = ( new Krokedil_Order() )->create();
		$set_to = 'US';
		$order->set_shipping_country( $set_to );
		$this->assertEquals( $set_to, $order->get_shipping_country() );
	}

	/**
	 * Test get_formatted_billing_address and has_billing_address.
	 *
	 * @since 3.3
	 */
	public function test_get_has_formatted_billing_address() {
		$order = ( new Krokedil_Order() )->create();

		$this->assertEquals( 'none', $order->get_formatted_billing_address( 'none' ) );

		$order->set_billing_address_1( '123 Test St.' );
		$order->set_billing_country( 'US' );
		$order->set_billing_city( 'Portland' );
		$order->set_billing_postcode( '97266' );
		$this->assertEquals( '123 Test St.<br/>Portland, 97266<br/>United States (US)', $order->get_formatted_billing_address( 'none' ) );

		$this->assertTrue( $order->has_billing_address() );
		$this->assertFalse( $order->has_shipping_address() );
	}

	/**
	 * Test get_formatted_shipping_address and has_shipping_address.
	 *
	 * @since 3.3
	 */
	public function test_get_has_formatted_shipping_address() {
		$order = ( new Krokedil_Order() )->create();

		$this->assertEquals( 'none', $order->get_formatted_shipping_address( 'none' ) );

		$order->set_shipping_address_1( '123 Test St.' );
		$order->set_shipping_country( 'US' );
		$order->set_shipping_city( 'Portland' );
		$order->set_shipping_postcode( '97266' );
		$this->assertEquals( '123 Test St.<br/>Portland, 97266<br/>United States (US)', $order->get_formatted_shipping_address( 'none' ) );

		$this->assertFalse( $order->has_billing_address() );
		$this->assertTrue( $order->has_shipping_address() );
	}

	/**
	 * Test: Setting/getting shipping settings after an order is saved
	 */
	public function test_set_shipping_after_save() {
		$order   = ( new Krokedil_Order() )->create();
		$country = 'US';
		$order->set_shipping_country( $country );
		$order->save();
		$state = 'Oregon';
		$order->set_shipping_state( $state );

		$this->assertEquals( $country, $order->get_shipping_country() );
		$this->assertEquals( $state, $order->get_shipping_state() );
	}

	/**
	 * Test: get_payment_method
	 */
	public function test_get_payment_method() {
		$order  = ( new Krokedil_Order() )->create();
		$set_to = 'paypal';
		$order->set_payment_method( $set_to );
		$this->assertEquals( $set_to, $order->get_payment_method() );
	}

	/**
	 * Test: get_payment_method_title
	 */
	public function test_get_payment_method_title() {
		$order  = ( new Krokedil_Order() )->create();
		$set_to = 'PayPal';
		$order->set_payment_method_title( $set_to );
		$this->assertEquals( $set_to, $order->get_payment_method_title() );
	}

	/**
	 * Test: get_transaction_id
	 */
	public function test_get_transaction_id() {
		$order  = ( new Krokedil_Order() )->create();
		$set_to = '12345';
		$order->set_transaction_id( $set_to );
		$this->assertEquals( $set_to, $order->get_transaction_id() );
	}

	/**
	 * Test: get_customer_ip_address
	 */
	public function test_get_customer_ip_address() {
		$order  = ( new Krokedil_Order() )->create();
		$set_to = '192.168.1.1';
		$order->set_customer_ip_address( $set_to );
		$this->assertEquals( $set_to, $order->get_customer_ip_address() );
	}

	/**
	 * Test: get_customer_user_agent
	 */
	public function test_get_customer_user_agent() {
		$order  = ( new Krokedil_Order() )->create();
		$set_to = 'UAstring';
		$order->set_customer_user_agent( $set_to );
		$this->assertEquals( $set_to, $order->get_customer_user_agent() );
	}

	/**
	 * Test: get_created_via
	 */
	public function test_get_created_via() {
		$order  = ( new Krokedil_Order() )->create();
		$set_to = 'WooCommerce';
		$order->set_created_via( $set_to );
		$this->assertEquals( $set_to, $order->get_created_via() );
	}

	/**
	 * Test: get_customer_note
	 */
	public function test_get_customer_note() {
		$order  = ( new Krokedil_Order() )->create();
		$set_to = 'Leave on porch.';
		$order->set_customer_note( $set_to );
		$this->assertEquals( $set_to, $order->get_customer_note() );
	}

	/**
	 * Test: get_date_completed
	 */
	public function test_get_date_completed() {
		$order = ( new Krokedil_Order() )->create();
		$order->set_date_completed( '2016-12-12' );
		$this->assertEquals( '1481500800', $order->get_date_completed()->getOffsetTimestamp() );

		$order->set_date_completed( '1481500800' );
		$this->assertEquals( 1481500800, $order->get_date_completed()->getTimestamp() );
	}

	/**
	 * Test: get_date_paid
	 */
	public function test_get_date_paid() {
		$order  = ( new Krokedil_Order() )->create();
		$set_to = 'PayPal';
		$order->set_date_paid( '2016-12-12' );
		$this->assertEquals( 1481500800, $order->get_date_paid()->getOffsetTimestamp() );

		$order->set_date_paid( '1481500800' );
		$this->assertEquals( 1481500800, $order->get_date_paid()->getTimestamp() );
	}

	/**
	 * Test cart hash
	 *
	 * @throws WC_Data_Exception May throw exception if data is invalid.
	 */
	public function test_get_cart_hash() {
		$order     = ( new Krokedil_Order() )->create();
		$cart_hash = '12345';
		$order->set_cart_hash( $cart_hash );
		$this->assertEquals( $cart_hash, $order->get_cart_hash() );
	}

	/**
	 * Test: get_address
	 */
	public function test_get_address() {
		$order = ( new Krokedil_Order() )->create();

		$billing = array(
			'first_name' => 'Fred',
			'last_name'  => 'Flintstone',
			'company'    => 'Bedrock Ltd.',
			'address_1'  => '34 Stonepants avenue',
			'address_2'  => 'Rockville',
			'city'       => 'Bedrock',
			'state'      => 'Boulder',
			'postcode'   => '00001',
			'country'    => 'US',
			'email'      => '',
			'phone'      => '',
		);

		$shipping = array(
			'first_name' => 'Barney',
			'last_name'  => 'Rubble',
			'company'    => 'Bedrock Ltd.',
			'address_1'  => '34 Stonepants avenue',
			'address_2'  => 'Rockville',
			'city'       => 'Bedrock',
			'state'      => 'Boulder',
			'postcode'   => '00001',
			'country'    => 'US',
		);

		$order->set_billing_first_name( 'Fred' );
		$order->set_billing_last_name( 'Flintstone' );
		$order->set_billing_company( 'Bedrock Ltd.' );
		$order->set_billing_address_1( '34 Stonepants avenue' );
		$order->set_billing_address_2( 'Rockville' );
		$order->set_billing_city( 'Bedrock' );
		$order->set_billing_state( 'Boulder' );
		$order->set_billing_postcode( '00001' );
		$order->set_billing_country( 'US' );

		$order->set_shipping_first_name( 'Barney' );
		$order->set_shipping_last_name( 'Rubble' );
		$order->set_shipping_company( 'Bedrock Ltd.' );
		$order->set_shipping_address_1( '34 Stonepants avenue' );
		$order->set_shipping_address_2( 'Rockville' );
		$order->set_shipping_city( 'Bedrock' );
		$order->set_shipping_state( 'Boulder' );
		$order->set_shipping_postcode( '00001' );
		$order->set_shipping_country( 'US' );

		$this->assertEquals( $shipping, $order->get_address( 'shipping' ) );
	}


	/**
	 * Test: get_formatted_billing_full_name
	 */
	public function test_get_formatted_billing_full_name() {
		$order = ( new Krokedil_Order() )->create();
		$order->set_billing_first_name( 'Fred' );
		$order->set_billing_last_name( 'Flintstone' );
		$this->assertEquals( 'Fred Flintstone', $order->get_formatted_billing_full_name() );
	}

	/**
	 * Test: get_formatted_shipping_full_name
	 */
	public function test_get_formatted_shipping_full_name() {
		$order = ( new Krokedil_Order() )->create();
		$order->set_shipping_first_name( 'Barney' );
		$order->set_shipping_last_name( 'Rubble' );
		$this->assertEquals( 'Barney Rubble', $order->get_formatted_shipping_full_name() );
	}

	/**
	 * Test: get_formatted_billing_address
	 */
	public function test_get_formatted_billing_address() {
		$order = ( new Krokedil_Order() )->create();
		$order->set_billing_first_name( 'Fred' );
		$order->set_billing_last_name( 'Flintstone' );
		$order->set_billing_company( 'Bedrock Ltd.' );
		$order->set_billing_address_1( '34 Stonepants avenue' );
		$order->set_billing_address_2( 'Rockville' );
		$order->set_billing_city( 'Bedrock' );
		$order->set_billing_state( 'Boulder' );
		$order->set_billing_postcode( '00001' );
		$order->set_billing_country( 'US' );
		$this->assertEquals( 'Fred Flintstone<br/>Bedrock Ltd.<br/>34 Stonepants avenue<br/>Rockville<br/>Bedrock, BOULDER 00001<br/>United States (US)', $order->get_formatted_billing_address() );
	}

	/**
	 * Test: get_formatted_shipping_address
	 */
	public function test_get_formatted_shipping_address() {
		$order = ( new Krokedil_Order() )->create();
		$order->set_shipping_first_name( 'Barney' );
		$order->set_shipping_last_name( 'Rubble' );
		$order->set_shipping_company( 'Bedrock Ltd.' );
		$order->set_shipping_address_1( '34 Stonepants avenue' );
		$order->set_shipping_address_2( 'Rockville' );
		$order->set_shipping_city( 'Bedrock' );
		$order->set_shipping_state( 'Boulder' );
		$order->set_shipping_postcode( '00001' );
		$order->set_shipping_country( 'US' );
		$this->assertEquals( 'Barney Rubble<br/>Bedrock Ltd.<br/>34 Stonepants avenue<br/>Rockville<br/>Bedrock, BOULDER 00001<br/>United States (US)', $order->get_formatted_shipping_address() );
	}

	/**
	 * Test: has_cart_hash
	 */
	public function test_has_cart_hash() {
		$order = ( new Krokedil_Order() )->create();
		$this->assertFalse( $order->has_cart_hash( '12345' ) );
		$set_to = '12345';
		$order->set_cart_hash( $set_to );
		$this->assertTrue( $order->has_cart_hash( '12345' ) );
	}

	/**
	 * Test: is_editable
	 */
	public function test_is_editable() {
		$order = ( new Krokedil_Order() )->create();
		$order->set_status( 'pending' );
		$this->assertTrue( $order->is_editable() );
		$order->set_status( 'processing' );
		$this->assertFalse( $order->is_editable() );
	}

	/**
	 * Test: is_paid
	 */
	public function test_is_paid() {
		$order = ( new Krokedil_Order() )->create();
		$order->set_status( 'pending' );
		$this->assertFalse( $order->is_paid() );
		$order->set_status( 'processing' );
		$this->assertTrue( $order->is_paid() );
	}

	/**
	 * Test: is_download_permitted
	 */
	public function test_is_download_permitted() {
		$order = ( new Krokedil_Order() )->create();
		$order->set_status( 'pending' );
		$this->assertFalse( $order->is_download_permitted() );
		$order->set_status( 'completed' );
		$this->assertTrue( $order->is_download_permitted() );
	}

	/**
	 * Test: needs_shipping_address
	 */
	public function test_needs_shipping_address() {
		$order = ( new Krokedil_Order() )->create();
		$this->assertFalse( $order->needs_shipping_address() );

	}

	/**
	 * Test: has_downloadable_item
	 */
	public function test_has_downloadable_item() {
		$order = ( new Krokedil_Order() )->create();
		$this->assertFalse( $order->has_downloadable_item() );

		$order = ( new Krokedil_Order() )->create();
		$this->assertFalse( $order->has_downloadable_item() );
	}

	/**
	 * Test: needs_payment
	 */
	public function test_needs_payment() {
		$order = ( new Krokedil_Order() )->create();

		$order->set_status( 'pending' );
		$order->set_total( 100 );
		$this->assertTrue( $order->needs_payment() );

		$order->set_status( 'processing' );
		$this->assertFalse( $order->needs_payment() );
	}

	/**
	 * Test: get_checkout_payment_url
	 */
	public function test_get_checkout_payment_url() {
		$order = ( new Krokedil_Order() )->create();
		$id    = $order->save();
		$this->assertEquals( 'http://example.org?order-pay=' . $id . '&pay_for_order=true&key=' . $order->get_order_key(), $order->get_checkout_payment_url() );
	}

	/**
	 * Test: get_checkout_order_received_url
	 */
	public function test_get_checkout_order_received_url() {
		$order = new WC_Order();
		$order->set_order_key( 'xxx' );
		$id = $order->save();
		$this->assertEquals( 'http://example.org?order-received=' . $id . '&key=' . $order->get_order_key(), $order->get_checkout_order_received_url() );
	}

	/**
	 * Test: get_cancel_order_url
	 */
	public function test_get_cancel_order_url() {
		$order = new WC_Order();
		$this->assertInternalType( 'string', $order->get_cancel_order_url() );
	}

	/**
	 * Test: get_cancel_order_url_raw
	 */
	public function test_get_cancel_order_url_raw() {
		$order = new WC_Order();
		$this->assertInternalType( 'string', $order->get_cancel_order_url_raw() );
	}

	/**
	 * Test: get_cancel_endpoint
	 */
	public function test_get_cancel_endpoint() {
		$order = new WC_Order();
		$this->assertEquals( 'http://example.org/', $order->get_cancel_endpoint() );
	}

	/**
	 * Test: get_view_order_url
	 */
	public function test_get_view_order_url() {
		$order = new WC_Order();
		$id    = $order->save();
		$this->assertEquals( 'http://example.org?view-order=' . $id, $order->get_view_order_url() );
	}

	/**
	 * Test: add_order_note
	 */
	public function test_add_order_note() {
		$order      = new WC_Order();
		$id         = $order->save();
		$comment_id = $order->add_order_note( 'Hello, I am a fish' );
		$this->assertTrue( $comment_id > 0 );

		$comment = get_comment( $comment_id );
		$this->assertEquals( 'Hello, I am a fish', $comment->comment_content );
	}

	/**
	 * Test: get_customer_order_notes
	 */
	public function test_get_customer_order_notes() {
		$order = new WC_Order();
		$id    = $order->save();

		$this->assertCount( 0, $order->get_customer_order_notes() );

		$order->add_order_note( 'Hello, I am a fish', true );
		$order->add_order_note( 'Hello, I am a fish', false );
		$order->add_order_note( 'Hello, I am a fish', true );

		$this->assertCount( 2, $order->get_customer_order_notes() );
	}

	/**
	 * Test: get_refunds
	 */
	public function test_get_refunds() {
		$order = new WC_Order();
		$order->set_total( 100 );
		$id = $order->save();

		$this->assertCount( 0, $order->get_refunds() );

		wc_create_refund(
			array(
				'order_id'   => $id,
				'amount'     => '100',
				'line_items' => array(),
			)
		);

		$this->assertCount( 1, $order->get_refunds() );
	}

	/**
	 * Test: get_total_refunded
	 */
	public function test_get_total_refunded() {
		$order = new WC_Order();
		$order->set_total( 400 );
		$id = $order->save();
		wc_create_refund(
			array(
				'order_id'   => $id,
				'amount'     => '100',
				'line_items' => array(),
			)
		);
		wc_create_refund(
			array(
				'order_id'   => $id,
				'amount'     => '100',
				'line_items' => array(),
			)
		);
		$this->assertEquals( 200, $order->get_total_refunded() );
	}

	/**
	 * Test: get_total_tax_refunded
	 */
	public function test_get_total_tax_refunded() {
		$order = new WC_Order();
		$this->assertEquals( 0, $order->get_total_tax_refunded() );
	}

	/**
	 * Test: get_total_shipping_refunded
	 */
	public function test_get_total_shipping_refunded() {
		$order = new WC_Order();
		$this->assertEquals( 0, $order->get_total_shipping_refunded() );
	}

	/**
	 * Test: test get total qty refunded
	 */
	public function test_get_total_qty_refunded() {
		$order = new WC_Order();
		$this->assertEquals( 0, $order->get_total_shipping_refunded() );
	}

	/**
	 * Test: get_qty_refunded_for_item
	 */
	public function test_get_qty_refunded_for_item() {
		$order = new WC_Order();
		$this->assertEquals( 0, $order->get_qty_refunded_for_item( 2 ) );
	}

	/**
	 *  Test: test_get_total_refunded_for_item
	 */
	public function test_get_total_refunded_for_item() {
		$order = new WC_Order();
		$this->assertEquals( 0, $order->get_total_refunded_for_item( 2 ) );
	}

	/**
	 * Test: get_tax_refunded_for_item
	 */
	public function test_get_tax_refunded_for_item() {
		$order = new WC_Order();
		$this->assertEquals( 0, $order->get_tax_refunded_for_item( 1, 1 ) );
	}

	/**
	 * Test: get_total_tax_refunded_by_rate_id
	 */
	public function test_get_total_tax_refunded_by_rate_id() {
		$order = new WC_Order();
		$this->assertEquals( 0, $order->get_total_tax_refunded_by_rate_id( 2 ) );
	}

	/**
	 * Test: get_remaining_refund_amount
	 *
	 * @throws WC_Data_Exception May throw exception if data is invalid.
	 */
	public function test_get_remaining_refund_amount() {
		$order = new WC_Order();
		$order->set_total( 400 );
		$id = $order->save();
		wc_create_refund(
			array(
				'order_id'   => $id,
				'amount'     => '100',
				'line_items' => array(),
			)
		);
		$this->assertEquals( 300, $order->get_remaining_refund_amount() );
	}

	/**
	 * Test that if an exception is thrown when creating a refund, the refund is deleted from database.
	 *
	 * @throws WC_Data_Exception May throw exception if data is invalid.
	 */
	public function test_refund_exception() {
		$order = ( new Krokedil_Order() )->create();
		add_action( 'woocommerce_create_refund', array( $this, 'throwAnException' ) );
		$refund = wc_create_refund(
			array(
				'order_id'   => $order->get_id(),
				'amount'     => $order->get_total(),
				'line_items' => array(),
			)
		);
		remove_action( 'woocommerce_create_refund', array( $this, 'throwAnException' ) );
		$this->assertEmpty( $order->get_refunds() );
	}


	/**
	 * Test the coupon usage limit based on guest orders with emails only.
	 *
	 * @throws WC_Data_Exception May throw exception if data is invalid.
	 */
	public function test_coupon_email_usage_limit() {
		// Orders .
		$order1 = ( new Krokedil_Order() )->create();
		$order2 = ( new Krokedil_Order() )->create();

		// Setup coupon .
		$coupon = new WC_Coupon();
		$coupon->set_code( 'usage-limit-coupon' );
		$coupon->set_amount( 100 );
		$coupon->set_discount_type( 'percent' );
		$coupon->set_usage_limit_per_user( 1 );
		$coupon->save();

		// Set as guest users with the same email .
		$order1->set_customer_id( 0 );
		$order1->set_billing_email( 'coupontest@example.com' );
		$order2->set_customer_id( 0 );
		$order2->set_billing_email( 'coupontest@example.com' );

		$order1->apply_coupon( 'usage-limit-coupon' );
		$this->assertEquals( 1, count( $order1->get_coupons() ) );

		$order2->apply_coupon( 'usage-limit-coupon' );
		$this->assertEquals( 0, count( $order2->get_coupons() ) );
	}

	/**
	 * Test removing and adding items + recalculation.
	 */
	public function test_add_remove_items() {
		$product = ( new Krokedil_Simple_Product() )->create();
		$order   = new WC_Order();
		$item_1  = new WC_Order_Item_Product();
		$item_1->set_props(
			array(
				'product'  => $product,
				'quantity' => 4,
				'total'    => 100,
			)
		);
		$item_1_id = $item_1->save();
		$item_2    = new WC_Order_Item_Product();
		$item_2->set_props(
			array(
				'product'  => $product,
				'quantity' => 2,
				'total'    => 100,
			)
		);
		$item_2_id = $item_2->save();
		$order->add_item( $item_1 );
		$order->add_item( $item_2 );
		$order->save();
		$order->calculate_totals();

		$this->assertEquals( 200, $order->get_total() );

		// remove an item and add an item, then compare totals .
		$order->remove_item( $item_1_id );
		$item_3 = new WC_Order_Item_Product();
		$item_3->set_props(
			array(
				'product'  => $product,
				'quantity' => 1,
				'total'    => 100,
			)
		);
		$order->add_item( $item_3 );
		$order->save();
		$order->calculate_totals();

		$this->assertEquals( 200, $order->get_total() );
	}
}
