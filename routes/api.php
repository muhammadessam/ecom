<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Product Categories
    Route::post('product-categories/media', 'ProductCategoryApiController@storeMedia')->name('product-categories.storeMedia');
    Route::apiResource('product-categories', 'ProductCategoryApiController');

    // Product Tags
    Route::apiResource('product-tags', 'ProductTagApiController');

    // Products
    Route::post('products/media', 'ProductApiController@storeMedia')->name('products.storeMedia');
    Route::apiResource('products', 'ProductApiController');

    // Product Statuses
    Route::apiResource('product-statuses', 'ProductStatusApiController');

    // Product Attributes
    Route::apiResource('product-attributes', 'ProductAttributeApiController');

    // Product Attribute Values
    Route::apiResource('product-attribute-values', 'ProductAttributeValueApiController');

    // Countries
    Route::apiResource('countries', 'CountriesApiController');

    // Cities
    Route::apiResource('cities', 'CityApiController');

    // Areas
    Route::apiResource('areas', 'AreaApiController');

    // Customers
    Route::post('customers/media', 'CustomerApiController@storeMedia')->name('customers.storeMedia');
    Route::apiResource('customers', 'CustomerApiController');

    // Addresses
    Route::apiResource('addresses', 'AddressApiController');

    // Vendors
    Route::post('vendors/media', 'VendorApiController@storeMedia')->name('vendors.storeMedia');
    Route::apiResource('vendors', 'VendorApiController');

    // Brands
    Route::post('brands/media', 'BrandApiController@storeMedia')->name('brands.storeMedia');
    Route::apiResource('brands', 'BrandApiController');

    // Orders
    Route::apiResource('orders', 'OrderApiController');

    // Gifts Categories
    Route::post('gifts-categories/media', 'GiftsCategoryApiController@storeMedia')->name('gifts-categories.storeMedia');
    Route::apiResource('gifts-categories', 'GiftsCategoryApiController');

    // Cift Cards
    Route::apiResource('cift-cards', 'CiftCardApiController');

    // Gift Card Usages
    Route::apiResource('gift-card-usages', 'GiftCardUsageApiController');

    // Coupons
    Route::post('coupons/media', 'CouponApiController@storeMedia')->name('coupons.storeMedia');
    Route::apiResource('coupons', 'CouponApiController');

    // Order Statuses
    Route::apiResource('order-statuses', 'OrderStatusApiController');

    // Order Items
    Route::apiResource('order-items', 'OrderItemApiController');

    // Payment Methods
    Route::apiResource('payment-methods', 'PaymentMethodApiController');

    // Transactions
    Route::apiResource('transactions', 'TransactionApiController');

    // Carts
    Route::apiResource('carts', 'CartApiController');

    // Cart Items
    Route::apiResource('cart-items', 'CartItemApiController');

    // Currencies
    Route::apiResource('currencies', 'CurrencyApiController');

    // Settings
    Route::post('settings/media', 'SettingApiController@storeMedia')->name('settings.storeMedia');
    Route::apiResource('settings', 'SettingApiController');

    // Sliders
    Route::post('sliders/media', 'SliderApiController@storeMedia')->name('sliders.storeMedia');
    Route::apiResource('sliders', 'SliderApiController');

    // Customer Devices
    Route::apiResource('customer-devices', 'CustomerDeviceApiController');

    // Tickets
    Route::apiResource('tickets', 'TicketApiController');

    // Replies
    Route::apiResource('replies', 'ReplyApiController');

    // Coupon Usages
    Route::apiResource('coupon-usages', 'CouponUsageApiController');

    // Product Reviews
    Route::apiResource('product-reviews', 'ProductReviewApiController');

    // Cms Pages
    Route::apiResource('cms-pages', 'CmsPageApiController');

    // Cms Categories
    Route::apiResource('cms-categories', 'CmsCategoryApiController');
});
