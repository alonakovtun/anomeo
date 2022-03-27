<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit579f94cb207ebb40e71c922f8b05e3c0
{
    public static $files = array (
        'b45b351e6b6f7487d819961fef2fda77' => __DIR__ . '/..' . '/jakeasmith/http_build_url/src/http_build_url.php',
        'e933291de8e260f0db7e94698c34196f' => __DIR__ . '/../..' . '/inc/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Composer\\Installers\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Composer\\Installers\\' => 
        array (
            0 => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers',
        ),
    );

    public static $classMap = array (
        'WCML\\API\\VendorAddon\\Hooks' => __DIR__ . '/../..' . '/classes/API/VendorAddon/Hooks.php',
        'WCML\\AdminDashboard\\Hooks' => __DIR__ . '/../..' . '/classes/AdminDashboard/Hooks.php',
        'WCML\\AdminNotices\\CachePlugins' => __DIR__ . '/../..' . '/classes/AdminNotices/CachePlugins.php',
        'WCML\\AdminNotices\\MultiCurrencyMissing' => __DIR__ . '/../..' . '/classes/AdminNotices/MultiCurrencyMissing.php',
        'WCML\\AdminNotices\\RestrictedScreens' => __DIR__ . '/../..' . '/classes/AdminNotices/RestrictedScreens.php',
        'WCML\\AdminNotices\\Review' => __DIR__ . '/../..' . '/classes/AdminNotices/Review.php',
        'WCML\\Block\\Convert\\ConverterProvider' => __DIR__ . '/../..' . '/classes/Block/Convert/ConverterProvider.php',
        'WCML\\Block\\Convert\\Converter\\ProductsByAttributes' => __DIR__ . '/../..' . '/classes/Block/Convert/Converter/ProductsByAttributes.php',
        'WCML\\Block\\Convert\\Hooks' => __DIR__ . '/../..' . '/classes/Block/Convert/Hooks.php',
        'WCML\\CLI\\Hooks' => __DIR__ . '/../..' . '/classes/CLI/Hooks.php',
        'WCML\\Compatibility\\WOOF\\WooCommerceProductFilter' => __DIR__ . '/../..' . '/compatibility/class-wcml-woof-woocommerce-product-filter.php',
        'WCML\\Container\\Config' => __DIR__ . '/../..' . '/classes/Container/Config.php',
        'WCML\\Email\\Settings\\Hooks' => __DIR__ . '/../..' . '/classes/Email/Settings/Hooks.php',
        'WCML\\MO\\Hooks' => __DIR__ . '/../..' . '/classes/MO/Hooks.php',
        'WCML\\Media\\Wrapper\\Factory' => __DIR__ . '/../..' . '/classes/media/Wrapper/Factory.php',
        'WCML\\Media\\Wrapper\\IMedia' => __DIR__ . '/../..' . '/classes/media/Wrapper/IMedia.php',
        'WCML\\Media\\Wrapper\\NonTranslatable' => __DIR__ . '/../..' . '/classes/media/Wrapper/NonTranslatable.php',
        'WCML\\Media\\Wrapper\\Translatable' => __DIR__ . '/../..' . '/classes/media/Wrapper/Translatable.php',
        'WCML\\MultiCurrency\\ExchangeRateServices\\CurrencyLayer' => __DIR__ . '/../..' . '/classes/multi-currency/exchange-rate-services/CurrencyLayer.php',
        'WCML\\MultiCurrency\\ExchangeRateServices\\ExchangeRatesApi' => __DIR__ . '/../..' . '/classes/multi-currency/exchange-rate-services/ExchangeRatesApi.php',
        'WCML\\MultiCurrency\\ExchangeRateServices\\Fixerio' => __DIR__ . '/../..' . '/classes/multi-currency/exchange-rate-services/Fixerio.php',
        'WCML\\MultiCurrency\\ExchangeRateServices\\OpenExchangeRates' => __DIR__ . '/../..' . '/classes/multi-currency/exchange-rate-services/OpenExchangeRates.php',
        'WCML\\MultiCurrency\\ExchangeRateServices\\Service' => __DIR__ . '/../..' . '/classes/multi-currency/exchange-rate-services/Service.php',
        'WCML\\MultiCurrency\\Geolocation' => __DIR__ . '/../..' . '/classes/multi-currency/geolocation/Geolocation.php',
        'WCML\\MultiCurrency\\GeolocationBackendHooks' => __DIR__ . '/../..' . '/classes/multi-currency/geolocation/GeolocationBackendHooks.php',
        'WCML\\MultiCurrency\\GeolocationFrontendHooks' => __DIR__ . '/../..' . '/classes/multi-currency/geolocation/GeolocationFrontendHooks.php',
        'WCML\\Multicurrency\\Analytics\\Export' => __DIR__ . '/../..' . '/classes/Multicurrency/Analytics/Export.php',
        'WCML\\Multicurrency\\Analytics\\Factory' => __DIR__ . '/../..' . '/classes/Multicurrency/Analytics/Factory.php',
        'WCML\\Multicurrency\\Analytics\\Hooks' => __DIR__ . '/../..' . '/classes/Multicurrency/Analytics/Hooks.php',
        'WCML\\Multicurrency\\Shipping\\AdminHooks' => __DIR__ . '/../..' . '/classes/Multicurrency/Shipping/AdminHooks.php',
        'WCML\\Multicurrency\\Shipping\\DefaultConversion' => __DIR__ . '/../..' . '/classes/Multicurrency/Shipping/DefaultConversion.php',
        'WCML\\Multicurrency\\Shipping\\FlatRateShipping' => __DIR__ . '/../..' . '/classes/Multicurrency/Shipping/FlatRateShipping.php',
        'WCML\\Multicurrency\\Shipping\\FreeShipping' => __DIR__ . '/../..' . '/classes/Multicurrency/Shipping/FreeShipping.php',
        'WCML\\Multicurrency\\Shipping\\FrontEndHooks' => __DIR__ . '/../..' . '/classes/Multicurrency/Shipping/FrontEndHooks.php',
        'WCML\\Multicurrency\\Shipping\\LocalPickup' => __DIR__ . '/../..' . '/classes/Multicurrency/Shipping/LocalPickup.php',
        'WCML\\Multicurrency\\Shipping\\ShippingClasses' => __DIR__ . '/../..' . '/classes/Multicurrency/Shipping/ShippingClasses.php',
        'WCML\\Multicurrency\\Shipping\\ShippingClassesMode' => __DIR__ . '/../..' . '/classes/Multicurrency/Shipping/ShippingClassesMode.php',
        'WCML\\Multicurrency\\Shipping\\ShippingHooksFactory' => __DIR__ . '/../..' . '/classes/Multicurrency/Shipping/ShippingHooksFactory.php',
        'WCML\\Multicurrency\\Shipping\\ShippingMode' => __DIR__ . '/../..' . '/classes/Multicurrency/Shipping/ShippingMode.php',
        'WCML\\Multicurrency\\Shipping\\ShippingModeBase' => __DIR__ . '/../..' . '/classes/Multicurrency/Shipping/ShippingModeBase.php',
        'WCML\\Multicurrency\\Shipping\\ShippingModeProvider' => __DIR__ . '/../..' . '/classes/Multicurrency/Shipping/ShippingModeProvider.php',
        'WCML\\Multicurrency\\Shipping\\UnsupportedShipping' => __DIR__ . '/../..' . '/classes/Multicurrency/Shipping/UnsupportedShipping.php',
        'WCML\\Multicurrency\\Shipping\\VariableCost' => __DIR__ . '/../..' . '/classes/Multicurrency/Shipping/VariableCost.php',
        'WCML\\Multicurrency\\UI\\Factory' => __DIR__ . '/../..' . '/classes/Multicurrency/UI/Factory.php',
        'WCML\\Multicurrency\\UI\\Hooks' => __DIR__ . '/../..' . '/classes/Multicurrency/UI/Hooks.php',
        'WCML\\Options\\WPML' => __DIR__ . '/../..' . '/classes/Options/WPML.php',
        'WCML\\PaymentGateways\\Hooks' => __DIR__ . '/../..' . '/classes/PaymentGateways/Hooks.php',
        'WCML\\Products\\Hooks' => __DIR__ . '/../..' . '/classes/product/Hooks.php',
        'WCML\\Reports\\Categories\\Query' => __DIR__ . '/../..' . '/classes/Reports/Categories/Query.php',
        'WCML\\Reports\\Hooks' => __DIR__ . '/../..' . '/classes/Reports/Hooks.php',
        'WCML\\Reports\\Orders\\Factory' => __DIR__ . '/../..' . '/classes/Reports/Orders/Factory.php',
        'WCML\\Reports\\Orders\\Hooks' => __DIR__ . '/../..' . '/classes/Reports/Orders/Hooks.php',
        'WCML\\Reports\\Products\\Query' => __DIR__ . '/../..' . '/classes/Reports/Products/Query.php',
        'WCML\\Rest\\Exceptions\\Generic' => __DIR__ . '/../..' . '/classes/Rest/Exceptions/Generic.php',
        'WCML\\Rest\\Exceptions\\InvalidCurrency' => __DIR__ . '/../..' . '/classes/Rest/Exceptions/InvalidCurrency.php',
        'WCML\\Rest\\Exceptions\\InvalidLanguage' => __DIR__ . '/../..' . '/classes/Rest/Exceptions/InvalidLanguage.php',
        'WCML\\Rest\\Exceptions\\InvalidProduct' => __DIR__ . '/../..' . '/classes/Rest/Exceptions/InvalidProduct.php',
        'WCML\\Rest\\Exceptions\\InvalidTerm' => __DIR__ . '/../..' . '/classes/Rest/Exceptions/InvalidTerm.php',
        'WCML\\Rest\\Exceptions\\MissingLanguage' => __DIR__ . '/../..' . '/classes/Rest/Exceptions/MissingLanguage.php',
        'WCML\\Rest\\Frontend\\Language' => __DIR__ . '/../..' . '/classes/Rest/Frontend/Language.php',
        'WCML\\Rest\\Functions' => __DIR__ . '/../..' . '/classes/Rest/Functions.php',
        'WCML\\Rest\\Generic' => __DIR__ . '/../..' . '/classes/Rest/Generic.php',
        'WCML\\Rest\\Hooks' => __DIR__ . '/../..' . '/classes/Rest/Hooks.php',
        'WCML\\Rest\\Language\\Set' => __DIR__ . '/../..' . '/classes/Rest/Language/Set.php',
        'WCML\\Rest\\ProductSaveActions' => __DIR__ . '/../..' . '/classes/Rest/ProductSaveActions.php',
        'WCML\\Rest\\Wrapper\\Composite' => __DIR__ . '/../..' . '/classes/Rest/Wrapper/Composite.php',
        'WCML\\Rest\\Wrapper\\Factory' => __DIR__ . '/../..' . '/classes/Rest/Wrapper/Factory.php',
        'WCML\\Rest\\Wrapper\\Handler' => __DIR__ . '/../..' . '/classes/Rest/Wrapper/Handler.php',
        'WCML\\Rest\\Wrapper\\Orders\\Languages' => __DIR__ . '/../..' . '/classes/Rest/Wrapper/Orders/Languages.php',
        'WCML\\Rest\\Wrapper\\Orders\\Prices' => __DIR__ . '/../..' . '/classes/Rest/Wrapper/Orders/Prices.php',
        'WCML\\Rest\\Wrapper\\ProductTerms' => __DIR__ . '/../..' . '/classes/Rest/Wrapper/ProductTerms.php',
        'WCML\\Rest\\Wrapper\\Products\\Products' => __DIR__ . '/../..' . '/classes/Rest/Wrapper/Products/Products.php',
        'WCML\\Rest\\Wrapper\\Reports\\ProductsCount' => __DIR__ . '/../..' . '/classes/Rest/Wrapper/Reports/ProductsCount.php',
        'WCML\\Rest\\Wrapper\\Reports\\ProductsSales' => __DIR__ . '/../..' . '/classes/Rest/Wrapper/Reports/ProductsSales.php',
        'WCML\\Rest\\Wrapper\\Reports\\TopSeller' => __DIR__ . '/../..' . '/classes/Rest/Wrapper/Reports/TopSeller.php',
        'WCML\\Reviews\\Translations\\Factory' => __DIR__ . '/../..' . '/classes/Reviews/Translations/Factory.php',
        'WCML\\Reviews\\Translations\\FrontEndHooks' => __DIR__ . '/../..' . '/classes/Reviews/Translations/FrontEndHooks.php',
        'WCML\\Reviews\\Translations\\Mapper' => __DIR__ . '/../..' . '/classes/Reviews/Translations/Mapper.php',
        'WCML\\RewriteRules\\Hooks' => __DIR__ . '/../..' . '/classes/RewriteRules/Hooks.php',
        'WCML\\Setup\\BeforeHooks' => __DIR__ . '/../..' . '/classes/wcml-setup/BeforeHooks.php',
        'WCML\\Tax\\Strings\\Hooks' => __DIR__ . '/../..' . '/classes/Tax/Strings/Hooks.php',
        'WCML\\User\\Store\\Cookie' => __DIR__ . '/../..' . '/classes/User/Store/Cookie.php',
        'WCML\\User\\Store\\Noop' => __DIR__ . '/../..' . '/classes/User/Store/Noop.php',
        'WCML\\User\\Store\\Store' => __DIR__ . '/../..' . '/classes/User/Store/Store.php',
        'WCML\\User\\Store\\Strategy' => __DIR__ . '/../..' . '/classes/User/Store/Strategy.php',
        'WCML\\User\\Store\\WcSession' => __DIR__ . '/../..' . '/classes/User/Store/WcSession.php',
        'WCML\\Utilities\\Post' => __DIR__ . '/../..' . '/classes/Utilities/Post.php',
        'WCML\\Utilities\\Resources' => __DIR__ . '/../..' . '/classes/Utilities/Resources.php',
        'WCML_ATE_Activate_Synchronization' => __DIR__ . '/../..' . '/classes/ate/class-wcml-ate-activate-synchronization.php',
        'WCML_Accommodation_Bookings' => __DIR__ . '/../..' . '/compatibility/class-wcml-accommodation-bookings.php',
        'WCML_Admin_Cookie' => __DIR__ . '/../..' . '/classes/class-wcml-admin-cookie.php',
        'WCML_Admin_Currency_Selector' => __DIR__ . '/../..' . '/classes/currencies/class-wcml-admin-currency-selector.php',
        'WCML_Admin_Menus' => __DIR__ . '/../..' . '/inc/admin-menus/class-wcml-admin-menus.php',
        'WCML_Adventure_tours' => __DIR__ . '/../..' . '/compatibility/class-wcml-adventure-tours.php',
        'WCML_Ajax_Layered_Nav_Widget' => __DIR__ . '/../..' . '/compatibility/class-wcml-ajax-layered-nav-widget.php',
        'WCML_Ajax_Setup' => __DIR__ . '/../..' . '/inc/class-wcml-ajax-setup.php',
        'WCML_Append_Gallery_To_Post_Media_Ids' => __DIR__ . '/../..' . '/classes/media/class-wml-append-gallery-to-post-media-ids.php',
        'WCML_Append_Gallery_To_Post_Media_Ids_Factory' => __DIR__ . '/../..' . '/classes/media/class-wml-append-gallery-to-post-media-ids-factory.php',
        'WCML_Attribute_Translation_UI' => __DIR__ . '/../..' . '/inc/template-classes/class-wcml-attribute-translation-ui.php',
        'WCML_Attributes' => __DIR__ . '/../..' . '/inc/class-wcml-attributes.php',
        'WCML_Aurum' => __DIR__ . '/../..' . '/compatibility/class-wcml-aurum.php',
        'WCML_Bookings' => __DIR__ . '/../..' . '/compatibility/class-wcml-bookings.php',
        'WCML_Bulk_Stock_Management' => __DIR__ . '/../..' . '/compatibility/class-wcml-bulk-stock-management.php',
        'WCML_Capabilities' => __DIR__ . '/../..' . '/inc/class-wcml-capabilities.php',
        'WCML_Cart' => __DIR__ . '/../..' . '/inc/class-wcml-cart.php',
        'WCML_Cart_Removed_Items_Widget' => __DIR__ . '/../..' . '/inc/class-wcml-cart-removed-items-widget.php',
        'WCML_Cart_Switch_Lang_Functions' => __DIR__ . '/../..' . '/inc/class-wcml-cart-switch-lang-functions.php',
        'WCML_Cart_Sync_Warnings' => __DIR__ . '/../..' . '/inc/class-wcml-cart-sync-warnings.php',
        'WCML_Checkout_Addons' => __DIR__ . '/../..' . '/compatibility/class-wcml-checkout-addons.php',
        'WCML_Checkout_Field_Editor' => __DIR__ . '/../..' . '/compatibility/class-wcml-checkout-field-editor.php',
        'WCML_Comments' => __DIR__ . '/../..' . '/inc/class-wcml-comments.php',
        'WCML_Compatibility' => __DIR__ . '/../..' . '/inc/class-wcml-compatibility.php',
        'WCML_Compatibility_Helper' => __DIR__ . '/../..' . '/compatibility/class-wcml-compatibility-helper.php',
        'WCML_Composite_Products' => __DIR__ . '/../..' . '/compatibility/class-wcml-composite-products.php',
        'WCML_Coupons' => __DIR__ . '/../..' . '/inc/class-wcml-coupons.php',
        'WCML_Currencies' => __DIR__ . '/../..' . '/classes/currencies/class-wcml-currencies.php',
        'WCML_Currencies_Dropdown_UI' => __DIR__ . '/../..' . '/inc/template-classes/class-wcml-currencies-dropdown-ui.php',
        'WCML_Currencies_Payment_Gateways' => __DIR__ . '/../..' . '/classes/multi-currency/payment-gateways/class-wcml-currencies-payment-gateways.php',
        'WCML_Currency_Switcher' => __DIR__ . '/../..' . '/inc/currencies/currency-switcher/class-wcml-currency-switcher.php',
        'WCML_Currency_Switcher_Ajax' => __DIR__ . '/../..' . '/inc/currencies/currency-switcher/class-wcml-currency-switcher-ajax.php',
        'WCML_Currency_Switcher_Options_Dialog' => __DIR__ . '/../..' . '/inc/template-classes/currency-switcher/class-wcml-currency-switcher-options-dialog.php',
        'WCML_Currency_Switcher_Properties' => __DIR__ . '/../..' . '/inc/currencies/currency-switcher/class-wcml-currency-switcher-properties.php',
        'WCML_Currency_Switcher_Template' => __DIR__ . '/../..' . '/inc/template-classes/currency-switcher/class-wcml-currency-switcher-template.php',
        'WCML_Currency_Switcher_Templates' => __DIR__ . '/../..' . '/inc/currencies/currency-switcher/class-wcml-currency-switcher-templates.php',
        'WCML_Currency_Switcher_Widget' => __DIR__ . '/../..' . '/inc/currencies/currency-switcher/class-wcml-currency-switcher-widget.php',
        'WCML_Custom_Currency_Options' => __DIR__ . '/../..' . '/inc/template-classes/multi-currency/class-wcml-custom-currency-options.php',
        'WCML_Custom_Files_UI' => __DIR__ . '/../..' . '/inc/template-classes/class-wcml-custom-files-ui.php',
        'WCML_Custom_Prices' => __DIR__ . '/../..' . '/inc/currencies/class-wcml-custom-prices.php',
        'WCML_Custom_Prices_UI' => __DIR__ . '/../..' . '/inc/template-classes/multi-currency/class-wcml-custom-prices-ui.php',
        'WCML_Custom_Taxonomy_Translation_UI' => __DIR__ . '/../..' . '/inc/template-classes/class-wcml-custom-taxonomy-translation-ui.php',
        'WCML_Dependencies' => __DIR__ . '/../..' . '/inc/class-wcml-dependencies.php',
        'WCML_Downloadable_Products' => __DIR__ . '/../..' . '/inc/translation-editor/class-wcml-downloadable-products.php',
        'WCML_Dynamic_Pricing' => __DIR__ . '/../..' . '/compatibility/class-wcml-dynamic-pricing.php',
        'WCML_Editor_Save_Filters' => __DIR__ . '/../..' . '/inc/translation-editor/class-wcml-editor-save-filters.php',
        'WCML_Editor_UI_Product_Job' => __DIR__ . '/../..' . '/inc/translation-editor/class-wcml-editor-ui-product-job.php',
        'WCML_Editor_UI_WYSIWYG_Field' => __DIR__ . '/../..' . '/inc/translation-editor/class-wcml-editor-ui-wysiwyg-field.php',
        'WCML_Emails' => __DIR__ . '/../..' . '/inc/class-wcml-emails.php',
        'WCML_Endpoints' => __DIR__ . '/../..' . '/inc/class-wcml-endpoints.php',
        'WCML_Exchange_Rates' => __DIR__ . '/../..' . '/classes/multi-currency/class-wcml-exchange-rates.php',
        'WCML_Exchange_Rates_UI' => __DIR__ . '/../..' . '/inc/template-classes/multi-currency/class-wcml-exchange-rates-ui.php',
        'WCML_Extra_Product_Options' => __DIR__ . '/../..' . '/compatibility/class-wcml-extra-product-options.php',
        'WCML_Flatsome' => __DIR__ . '/../..' . '/compatibility/class-wcml-flatsome.php',
        'WCML_Install' => __DIR__ . '/../..' . '/inc/class-wcml-install.php',
        'WCML_JCK_WSSV' => __DIR__ . '/../..' . '/compatibility/class-wcml-jck-wssv.php',
        'WCML_Klarna_Gateway' => __DIR__ . '/../..' . '/compatibility/class-wcml-klarna-gateway.php',
        'WCML_Languages_Upgrade_Notice' => __DIR__ . '/../..' . '/inc/template-classes/class-wcml-languages-upgrade-notice.php',
        'WCML_Languages_Upgrader' => __DIR__ . '/../..' . '/inc/class-wcml-languages-upgrader.php',
        'WCML_LiteSpeed_Cache' => __DIR__ . '/../..' . '/compatibility/class-wcml-litespeed-cache.php',
        'WCML_Locale' => __DIR__ . '/../..' . '/inc/class-wcml-locale.php',
        'WCML_MaxStore' => __DIR__ . '/../..' . '/compatibility/class-wcml-maxstore.php',
        'WCML_Menus_Wrap' => __DIR__ . '/../..' . '/inc/template-classes/class-wcml-menus-wrap.php',
        'WCML_Mix_and_Match_Products' => __DIR__ . '/../..' . '/compatibility/class-wcml-mix-and-match-products.php',
        'WCML_Multi_Currency' => __DIR__ . '/../..' . '/inc/currencies/class-wcml-multi-currency.php',
        'WCML_Multi_Currency_Configuration' => __DIR__ . '/../..' . '/inc/currencies/class-wcml-multi-currency-configuration.php',
        'WCML_Multi_Currency_Coupons' => __DIR__ . '/../..' . '/inc/currencies/class-wcml-multi-currency-coupons.php',
        'WCML_Multi_Currency_Install' => __DIR__ . '/../..' . '/inc/currencies/class-wcml-multi-currency-install.php',
        'WCML_Multi_Currency_Orders' => __DIR__ . '/../..' . '/inc/currencies/class-wcml-multi-currency-orders.php',
        'WCML_Multi_Currency_Prices' => __DIR__ . '/../..' . '/inc/currencies/class-wcml-multi-currency-prices.php',
        'WCML_Multi_Currency_Reports' => __DIR__ . '/../..' . '/inc/currencies/class-wcml-multi-currency-reports.php',
        'WCML_Multi_Currency_Resources' => __DIR__ . '/../..' . '/inc/currencies/class-wcml-multi-currency-resources.php',
        'WCML_Multi_Currency_Shipping' => __DIR__ . '/../..' . '/inc/currencies/class-wcml-multi-currency-shipping.php',
        'WCML_Multi_Currency_Table_Rate_Shipping' => __DIR__ . '/../..' . '/inc/currencies/class-wcml-multi-currency-table-rate-shipping.php',
        'WCML_Multi_Currency_UI' => __DIR__ . '/../..' . '/inc/template-classes/multi-currency/class-wcml-multi-currency-ui.php',
        'WCML_Not_Supported_Payment_Gateway' => __DIR__ . '/../..' . '/classes/multi-currency/payment-gateways/class-wcml-not-supported-payment-gateway.php',
        'WCML_Not_Translatable_Attributes' => __DIR__ . '/../..' . '/inc/template-classes/class-wcml-not-translatable-attributes.php',
        'WCML_Order_Status_Manager' => __DIR__ . '/../..' . '/compatibility/class-wcml-order-status-manager.php',
        'WCML_Orders' => __DIR__ . '/../..' . '/inc/class-wcml-orders.php',
        'WCML_Page_Builders' => __DIR__ . '/../..' . '/inc/translation-editor/class-wcml-page-builders.php',
        'WCML_Payment_Gateway' => __DIR__ . '/../..' . '/classes/multi-currency/payment-gateways/class-wcml-payment-gateway.php',
        'WCML_Payment_Gateway_Bacs' => __DIR__ . '/../..' . '/classes/multi-currency/payment-gateways/class-wcml-payment-gateway-bacs.php',
        'WCML_Payment_Gateway_PayPal' => __DIR__ . '/../..' . '/classes/multi-currency/payment-gateways/class-wcml-payment-gateway-paypal.php',
        'WCML_Payment_Gateway_Stripe' => __DIR__ . '/../..' . '/classes/multi-currency/payment-gateways/class-wcml-payment-gateway-stripe.php',
        'WCML_Payment_Method_Filter' => __DIR__ . '/../..' . '/classes/order-property-filter/class-wcml-payment-method-filter.php',
        'WCML_Per_Product_Shipping' => __DIR__ . '/../..' . '/compatibility/class-wcml-per-product-shipping.php',
        'WCML_Pip' => __DIR__ . '/../..' . '/compatibility/class-wcml-pip.php',
        'WCML_Plugins_Wrap' => __DIR__ . '/../..' . '/inc/template-classes/class-wcml-plugins-wrap.php',
        'WCML_Pointer_UI' => __DIR__ . '/../..' . '/inc/template-classes/class-wcml-pointer-ui.php',
        'WCML_Pointers' => __DIR__ . '/../..' . '/classes/pointers/class-wcml-pointers.php',
        'WCML_Price_Filter' => __DIR__ . '/../..' . '/inc/currencies/class-wcml-price-filter.php',
        'WCML_Privacy_Content' => __DIR__ . '/../..' . '/classes/privacy/class-wcml-privacy-content.php',
        'WCML_Privacy_Content_Factory' => __DIR__ . '/../..' . '/classes/privacy/class-wcml-privacy-content-factory.php',
        'WCML_Product_Addons' => __DIR__ . '/../..' . '/compatibility/class-wcml-product-addons.php',
        'WCML_Product_Bundles' => __DIR__ . '/../..' . '/compatibility/class-wcml-product-bundles.php',
        'WCML_Product_Data_Store_CPT' => __DIR__ . '/../..' . '/classes/product/class-wcml-product-data-store-cpt.php',
        'WCML_Product_Gallery_Filter' => __DIR__ . '/../..' . '/classes/media/class-wcml-product-gallery-filter.php',
        'WCML_Product_Gallery_Filter_Factory' => __DIR__ . '/../..' . '/classes/media/class-wcml-product-gallery-filter-factory.php',
        'WCML_Product_Image_Filter' => __DIR__ . '/../..' . '/classes/media/class-wcml-product-image-filter.php',
        'WCML_Product_Image_Filter_Factory' => __DIR__ . '/../..' . '/classes/media/class-wcml-product-image-filter-factory.php',
        'WCML_Products' => __DIR__ . '/../..' . '/inc/class-wcml-products.php',
        'WCML_Products_Screen_Options' => __DIR__ . '/../..' . '/inc/class-wcml-products-screen-options.php',
        'WCML_Products_UI' => __DIR__ . '/../..' . '/inc/template-classes/class-wcml-products-ui.php',
        'WCML_Relevanssi' => __DIR__ . '/../..' . '/compatibility/class-wcml-relevanssi.php',
        'WCML_Removed_Cart_Items_UI' => __DIR__ . '/../..' . '/inc/template-classes/class-wcml-removed-cart-items-ui.php',
        'WCML_Reports' => __DIR__ . '/../..' . '/inc/class-wcml-reports.php',
        'WCML_Requests' => __DIR__ . '/../..' . '/inc/class-wcml-requests.php',
        'WCML_Resources' => __DIR__ . '/../..' . '/inc/class-wcml-resources.php',
        'WCML_Sensei' => __DIR__ . '/../..' . '/compatibility/class-wcml-sensei.php',
        'WCML_Settings_UI' => __DIR__ . '/../..' . '/inc/template-classes/class-wcml-settings-ui.php',
        'WCML_Setup' => __DIR__ . '/../..' . '/classes/wcml-setup/class-wcml-setup.php',
        'WCML_Setup_Attributes_UI' => __DIR__ . '/../..' . '/inc/template-classes/setup/class-wcml-setup-attributes-ui.php',
        'WCML_Setup_Footer_UI' => __DIR__ . '/../..' . '/inc/template-classes/setup/class-wcml-setup-footer.php',
        'WCML_Setup_Handlers' => __DIR__ . '/../..' . '/classes/wcml-setup/class-wcml-setup-handlers.php',
        'WCML_Setup_Header_UI' => __DIR__ . '/../..' . '/inc/template-classes/setup/class-wcml-setup-header.php',
        'WCML_Setup_Introduction_UI' => __DIR__ . '/../..' . '/inc/template-classes/setup/class-wcml-setup-introduction-ui.php',
        'WCML_Setup_Multi_Currency_UI' => __DIR__ . '/../..' . '/inc/template-classes/setup/class-wcml-setup-multi-currency-ui.php',
        'WCML_Setup_Notice_UI' => __DIR__ . '/../..' . '/inc/template-classes/setup/class-wcml-setup-notice.php',
        'WCML_Setup_Ready_UI' => __DIR__ . '/../..' . '/inc/template-classes/setup/class-wcml-setup-ready-ui.php',
        'WCML_Setup_Store_Pages_UI' => __DIR__ . '/../..' . '/inc/template-classes/setup/class-wcml-setup-store-pages-ui.php',
        'WCML_Setup_Translation_Options_UI' => __DIR__ . '/../..' . '/inc/template-classes/setup/class-wcml-setup-translation-options-ui.php',
        'WCML_Setup_UI' => __DIR__ . '/../..' . '/classes/wcml-setup/class-wcml-setup-ui.php',
        'WCML_St_Taxonomy_UI' => __DIR__ . '/../..' . '/inc/template-classes/class-wcml-st-taxonomy-ui.php',
        'WCML_Status_Config_Warnings_UI' => __DIR__ . '/../..' . '/inc/template-classes/status/class-wcml-status-config-warnings-ui.php',
        'WCML_Status_Media_UI' => __DIR__ . '/../..' . '/inc/template-classes/status/class-wcml-status-media-ui.php',
        'WCML_Status_Multi_Currencies_UI' => __DIR__ . '/../..' . '/inc/template-classes/status/class-wcml-status-multi-currencies-ui.php',
        'WCML_Status_Products_UI' => __DIR__ . '/../..' . '/inc/template-classes/status/class-wcml-status-products-ui.php',
        'WCML_Status_Status_UI' => __DIR__ . '/../..' . '/inc/template-classes/status/class-wcml-status-status-ui.php',
        'WCML_Status_Store_Pages_UI' => __DIR__ . '/../..' . '/inc/template-classes/status/class-wcml-status-store-pages-ui.php',
        'WCML_Status_Taxonomies_UI' => __DIR__ . '/../..' . '/inc/template-classes/status/class-wcml-status-taxonomies-ui.php',
        'WCML_Status_UI' => __DIR__ . '/../..' . '/inc/template-classes/status/class-wcml-status-ui.php',
        'WCML_Store_Pages' => __DIR__ . '/../..' . '/inc/class-wcml-store-pages.php',
        'WCML_Store_URLs_Edit_Base_UI' => __DIR__ . '/../..' . '/inc/template-classes/store-urls/class-wcml-store-urls-edit-base-ui.php',
        'WCML_Store_URLs_Translation_Statuses_UI' => __DIR__ . '/../..' . '/inc/template-classes/store-urls/class-wcml-store-urls-translation-statuses-ui.php',
        'WCML_Store_URLs_UI' => __DIR__ . '/../..' . '/inc/template-classes/store-urls/class-wcml-store-urls-ui.php',
        'WCML_Switch_Lang_Request' => __DIR__ . '/../..' . '/inc/wcml-switch-lang-request.php',
        'WCML_Sync_Taxonomy' => __DIR__ . '/../..' . '/inc/template-classes/class-wcml-sync-taxonomy.php',
        'WCML_Synchronize_Product_Data' => __DIR__ . '/../..' . '/inc/translation-editor/class-wcml-synchronize-product-data.php',
        'WCML_Synchronize_Variations_Data' => __DIR__ . '/../..' . '/inc/translation-editor/class-wcml-synchronize-variations-data.php',
        'WCML_TP_Support' => __DIR__ . '/../..' . '/inc/class-wcml-tp-support.php',
        'WCML_Tab_Manager' => __DIR__ . '/../..' . '/compatibility/class-wcml-tab-manager.php',
        'WCML_Table_Rate_Shipping' => __DIR__ . '/../..' . '/compatibility/class-wcml-table-rate-shipping.php',
        'WCML_Taxonomy_Translation_Link_Filters' => __DIR__ . '/../..' . '/classes/taxonomy-translation/class-wcml-taxonomy-translation-link-filters.php',
        'WCML_Templates_Factory' => __DIR__ . '/../..' . '/inc/template-classes/class-wcml-templates-factory.php',
        'WCML_Terms' => __DIR__ . '/../..' . '/inc/class-wcml-terms.php',
        'WCML_The_Events_Calendar' => __DIR__ . '/../..' . '/compatibility/class-wcml-the-events-calendar.php',
        'WCML_Tracking_Link' => __DIR__ . '/../..' . '/classes/class-wcml-tracking-link.php',
        'WCML_Translation_Editor' => __DIR__ . '/../..' . '/inc/translation-editor/class-wcml-translation-editor.php',
        'WCML_Troubleshooting' => __DIR__ . '/../..' . '/inc/class-wcml-troubleshooting.php',
        'WCML_Troubleshooting_UI' => __DIR__ . '/../..' . '/inc/template-classes/class-wcml-troubleshooting-ui.php',
        'WCML_Update_Product_Gallery_Translation' => __DIR__ . '/../..' . '/classes/media/class-wcml-update-product-gallery-translation.php',
        'WCML_Update_Product_Gallery_Translation_Factory' => __DIR__ . '/../..' . '/classes/media/class-wcml-update-product-gallery-translation-factory.php',
        'WCML_Upgrade' => __DIR__ . '/../..' . '/inc/class-wcml-upgrade.php',
        'WCML_Url_Filters_Redirect_Location' => __DIR__ . '/../..' . '/classes/url-filters/class-wcml-url-filters-redirect-location.php',
        'WCML_Url_Translation' => __DIR__ . '/../..' . '/inc/class-wcml-url-translation.php',
        'WCML_Variation_Swatches_And_Photos' => __DIR__ . '/../..' . '/compatibility/class-wcml-variation-swatches-and-photos.php',
        'WCML_W3TC_Multi_Currency' => __DIR__ . '/../..' . '/inc/currencies/class-wcml-w3tc-multi-currency.php',
        'WCML_WC_Admin_Duplicate_Product' => __DIR__ . '/../..' . '/inc/translation-editor/class-wcml-wc-admin-duplicate-product.php',
        'WCML_WC_Gateways' => __DIR__ . '/../..' . '/inc/class-wcml-wc-gateways.php',
        'WCML_WC_Memberships' => __DIR__ . '/../..' . '/compatibility/class-wcml-wc-memberships.php',
        'WCML_WC_Name_Your_Price' => __DIR__ . '/../..' . '/compatibility/class-wcml-wc-name-your-price.php',
        'WCML_WC_Product_Bundles_Items' => __DIR__ . '/../..' . '/compatibility/includes/class-wcml-wc-product-bundles-items.php',
        'WCML_WC_Product_Type_Column' => __DIR__ . '/../..' . '/compatibility/class-wcml-wc-product-type-column.php',
        'WCML_WC_Shipping' => __DIR__ . '/../..' . '/inc/class-wcml-wc-shipping.php',
        'WCML_WC_Shortcode_Product_Category' => __DIR__ . '/../..' . '/classes/shortcodes/class-wcml-wc-shortcode-product-category.php',
        'WCML_WC_Strings' => __DIR__ . '/../..' . '/inc/class-wcml-wc-strings.php',
        'WCML_WC_Subscriptions' => __DIR__ . '/../..' . '/compatibility/class-wcml-wc-subscriptions.php',
        'WCML_WPSEO' => __DIR__ . '/../..' . '/compatibility/class-wcml-wpseo.php',
        'WCML_Widgets' => __DIR__ . '/../..' . '/inc/class-wcml-widgets.php',
        'WCML_Woo_Var_Table' => __DIR__ . '/../..' . '/compatibility/class-wcml-woo-var-table.php',
        'WCML_Woobe' => __DIR__ . '/../..' . '/compatibility/class-wcml-woobe.php',
        'WCML_WpFastest_Cache' => __DIR__ . '/../..' . '/compatibility/class-wcml-wpfastest-cache.php',
        'WCML_Wpb_Vc' => __DIR__ . '/../..' . '/compatibility/class-wcml-wpb-vc.php',
        'WCML_YIKES_Custom_Product_Tabs' => __DIR__ . '/../..' . '/compatibility/class-wcml-yikes-custom-product-tabs.php',
        'WCML_YITH_WCQV' => __DIR__ . '/../..' . '/compatibility/class-wcml-yith-wcqv.php',
        'WCML_gravityforms' => __DIR__ . '/../..' . '/compatibility/class-wcml-gravityforms.php',
        'WCML_wcExporter' => __DIR__ . '/../..' . '/compatibility/class-wcml-wcexporter.php',
        'WCML_xDomain_Data' => __DIR__ . '/../..' . '/classes/urls/class-wcml-xdomain-data.php',
        'WPML\\Templates\\PHP\\Model' => __DIR__ . '/../..' . '/classes/templates/php/model.php',
        'WPML_Cache_Directory' => __DIR__ . '/..' . '/wpml-shared/wpml-lib-cache/src/cache/class-wpml-cache-directory.php',
        'WPML_Core_Version_Check' => __DIR__ . '/..' . '/wpml-shared/wpml-lib-dependencies/src/dependencies/class-wpml-core-version-check.php',
        'WPML_Dependencies' => __DIR__ . '/..' . '/wpml-shared/wpml-lib-dependencies/src/dependencies/class-wpml-dependencies.php',
        'WPML_PHP_Version_Check' => __DIR__ . '/..' . '/wpml-shared/wpml-lib-dependencies/src/dependencies/class-wpml-php-version-check.php',
        'woocommerce_wpml' => __DIR__ . '/../..' . '/classes/class-woocommerce-wpml.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit579f94cb207ebb40e71c922f8b05e3c0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit579f94cb207ebb40e71c922f8b05e3c0::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit579f94cb207ebb40e71c922f8b05e3c0::$classMap;

        }, null, ClassLoader::class);
    }
}
