<?php


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Auth'],function(){

    //Login Routes
    Route::get('/login','LoginController@showLoginForm')->name('login');
    Route::post('/login','LoginController@login');
    Route::post('/logout','LoginController@logout')->name('logout');

    //Forgot Password Routes
    Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');

    //Reset Password Routes
    Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');

});


Route::group(['prefix' => 'admins', 'as' => 'admin.', 'middleware' => ['auth:admin']], function () {

    Route::get('/home', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Product Categories
    Route::delete('product-categories/destroy', 'ProductCategoryController@massDestroy')->name('product-categories.massDestroy');
    Route::post('product-categories/media', 'ProductCategoryController@storeMedia')->name('product-categories.storeMedia');
    Route::post('product-categories/ckmedia', 'ProductCategoryController@storeCKEditorImages')->name('product-categories.storeCKEditorImages');
    Route::resource('product-categories', 'ProductCategoryController');

    // Product Tags
    Route::delete('product-tags/destroy', 'ProductTagController@massDestroy')->name('product-tags.massDestroy');
    Route::resource('product-tags', 'ProductTagController');

    // Products
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::post('products/media', 'ProductController@storeMedia')->name('products.storeMedia');
    Route::post('products/ckmedia', 'ProductController@storeCKEditorImages')->name('products.storeCKEditorImages');
    Route::resource('products', 'ProductController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Product Statuses
    Route::delete('product-statuses/destroy', 'ProductStatusController@massDestroy')->name('product-statuses.massDestroy');
    Route::resource('product-statuses', 'ProductStatusController');

    // Product Attributes
    Route::delete('product-attributes/destroy', 'ProductAttributeController@massDestroy')->name('product-attributes.massDestroy');
    Route::resource('product-attributes', 'ProductAttributeController');

    // Product Attribute Values
    Route::delete('product-attribute-values/destroy', 'ProductAttributeValueController@massDestroy')->name('product-attribute-values.massDestroy');
    Route::resource('product-attribute-values', 'ProductAttributeValueController');

    // Countries
    Route::delete('countries/destroy', 'CountriesController@massDestroy')->name('countries.massDestroy');
    Route::resource('countries', 'CountriesController');

    // Cities
    Route::delete('cities/destroy', 'CityController@massDestroy')->name('cities.massDestroy');
    Route::resource('cities', 'CityController');

    // Areas
    Route::delete('areas/destroy', 'AreaController@massDestroy')->name('areas.massDestroy');
    Route::resource('areas', 'AreaController');

    // Customers
    Route::delete('customers/destroy', 'CustomerController@massDestroy')->name('customers.massDestroy');
    Route::post('customers/media', 'CustomerController@storeMedia')->name('customers.storeMedia');
    Route::post('customers/ckmedia', 'CustomerController@storeCKEditorImages')->name('customers.storeCKEditorImages');
    Route::resource('customers', 'CustomerController');

    // Addresses
    Route::delete('addresses/destroy', 'AddressController@massDestroy')->name('addresses.massDestroy');
    Route::resource('addresses', 'AddressController');

    // Vendors
    Route::delete('vendors/destroy', 'VendorController@massDestroy')->name('vendors.massDestroy');
    Route::post('vendors/media', 'VendorController@storeMedia')->name('vendors.storeMedia');
    Route::post('vendors/ckmedia', 'VendorController@storeCKEditorImages')->name('vendors.storeCKEditorImages');
    Route::resource('vendors', 'VendorController');

    // Brands
    Route::delete('brands/destroy', 'BrandController@massDestroy')->name('brands.massDestroy');
    Route::post('brands/media', 'BrandController@storeMedia')->name('brands.storeMedia');
    Route::post('brands/ckmedia', 'BrandController@storeCKEditorImages')->name('brands.storeCKEditorImages');
    Route::resource('brands', 'BrandController');

    // Orders
    Route::delete('orders/destroy', 'OrderController@massDestroy')->name('orders.massDestroy');
    Route::resource('orders', 'OrderController');

    // Gifts Categories
    Route::delete('gifts-categories/destroy', 'GiftsCategoryController@massDestroy')->name('gifts-categories.massDestroy');
    Route::post('gifts-categories/media', 'GiftsCategoryController@storeMedia')->name('gifts-categories.storeMedia');
    Route::post('gifts-categories/ckmedia', 'GiftsCategoryController@storeCKEditorImages')->name('gifts-categories.storeCKEditorImages');
    Route::resource('gifts-categories', 'GiftsCategoryController');

    // Cift Cards
    Route::delete('cift-cards/destroy', 'CiftCardController@massDestroy')->name('cift-cards.massDestroy');
    Route::resource('cift-cards', 'CiftCardController');

    // Gift Card Usages
    Route::delete('gift-card-usages/destroy', 'GiftCardUsageController@massDestroy')->name('gift-card-usages.massDestroy');
    Route::resource('gift-card-usages', 'GiftCardUsageController');

    // Coupons
    Route::delete('coupons/destroy', 'CouponController@massDestroy')->name('coupons.massDestroy');
    Route::post('coupons/media', 'CouponController@storeMedia')->name('coupons.storeMedia');
    Route::post('coupons/ckmedia', 'CouponController@storeCKEditorImages')->name('coupons.storeCKEditorImages');
    Route::resource('coupons', 'CouponController');

    // Order Statuses
    Route::delete('order-statuses/destroy', 'OrderStatusController@massDestroy')->name('order-statuses.massDestroy');
    Route::resource('order-statuses', 'OrderStatusController');

    // Order Items
    Route::delete('order-items/destroy', 'OrderItemController@massDestroy')->name('order-items.massDestroy');
    Route::resource('order-items', 'OrderItemController');

    // Payment Methods
    Route::delete('payment-methods/destroy', 'PaymentMethodController@massDestroy')->name('payment-methods.massDestroy');
    Route::resource('payment-methods', 'PaymentMethodController');

    // Transactions
    Route::delete('transactions/destroy', 'TransactionController@massDestroy')->name('transactions.massDestroy');
    Route::resource('transactions', 'TransactionController');

    // Carts
    Route::delete('carts/destroy', 'CartController@massDestroy')->name('carts.massDestroy');
    Route::resource('carts', 'CartController');

    // Cart Items
    Route::delete('cart-items/destroy', 'CartItemController@massDestroy')->name('cart-items.massDestroy');
    Route::resource('cart-items', 'CartItemController');

    // Currencies
    Route::delete('currencies/destroy', 'CurrencyController@massDestroy')->name('currencies.massDestroy');
    Route::resource('currencies', 'CurrencyController');

    // Settings
    Route::delete('settings/destroy', 'SettingController@massDestroy')->name('settings.massDestroy');
    Route::post('settings/media', 'SettingController@storeMedia')->name('settings.storeMedia');
    Route::post('settings/ckmedia', 'SettingController@storeCKEditorImages')->name('settings.storeCKEditorImages');
    Route::resource('settings', 'SettingController');

    // Sliders
    Route::delete('sliders/destroy', 'SliderController@massDestroy')->name('sliders.massDestroy');
    Route::post('sliders/media', 'SliderController@storeMedia')->name('sliders.storeMedia');
    Route::post('sliders/ckmedia', 'SliderController@storeCKEditorImages')->name('sliders.storeCKEditorImages');
    Route::resource('sliders', 'SliderController');

    // Customer Devices
    Route::delete('customer-devices/destroy', 'CustomerDeviceController@massDestroy')->name('customer-devices.massDestroy');
    Route::resource('customer-devices', 'CustomerDeviceController');

    // Tickets
    Route::delete('tickets/destroy', 'TicketController@massDestroy')->name('tickets.massDestroy');
    Route::resource('tickets', 'TicketController');

    // Replies
    Route::delete('replies/destroy', 'ReplyController@massDestroy')->name('replies.massDestroy');
    Route::resource('replies', 'ReplyController');

    // Coupon Usages
    Route::delete('coupon-usages/destroy', 'CouponUsageController@massDestroy')->name('coupon-usages.massDestroy');
    Route::resource('coupon-usages', 'CouponUsageController');

    // Product Reviews
    Route::delete('product-reviews/destroy', 'ProductReviewController@massDestroy')->name('product-reviews.massDestroy');
    Route::resource('product-reviews', 'ProductReviewController');

    // Cms Pages
    Route::delete('cms-pages/destroy', 'CmsPageController@massDestroy')->name('cms-pages.massDestroy');
    Route::resource('cms-pages', 'CmsPageController');

    // Cms Categories
    Route::delete('cms-categories/destroy', 'CmsCategoryController@massDestroy')->name('cms-categories.massDestroy');
    Route::resource('cms-categories', 'CmsCategoryController');
});


//Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
//// Change password
//    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
//        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
//        Route::post('password', 'ChangePasswordController@update')->name('password.update');
//    }
//});
