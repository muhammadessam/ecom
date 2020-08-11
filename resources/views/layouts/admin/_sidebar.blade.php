<!--  BEGIN SIDEBAR  -->
<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">
        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories" id="accordionExample">


            <li class="menu">
                <a href="{{route('admin.home')}}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span>{{trans('global.dashboard')}}</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="#" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-cpu">
                            <rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect>
                            <rect x="9" y="9" width="6" height="6"></rect>
                            <line x1="9" y1="1" x2="9" y2="4"></line>
                            <line x1="15" y1="1" x2="15" y2="4"></line>
                            <line x1="9" y1="20" x2="9" y2="23"></line>
                            <line x1="15" y1="20" x2="15" y2="23"></line>
                            <line x1="20" y1="9" x2="23" y2="9"></line>
                            <line x1="20" y1="14" x2="23" y2="14"></line>
                            <line x1="1" y1="9" x2="4" y2="9"></line>
                            <line x1="1" y1="14" x2="4" y2="14"></line>
                        </svg>
                        <span>{{ trans('cruds.userManagement.title') }}</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="{{ request()->is('admin/permissions*') ? 'show' : '' }} {{ request()->is('admin/roles*') ? 'show' : '' }} {{ request()->is('admin/users*') ? 'show' : '' }} {{ request()->is('admin/audit-logs*') ? 'show' : '' }} submenu list-unstyled" id="app" data-parent="#accordionExample">
                    @can('permission_access')
                        <li class="{{request()->routeIs('admin.permissions.*') ? 'active' : ''}}">
                            <a href="{{ route("admin.permissions.index") }}">
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="{{request()->routeIs('admin.roles.*') ? 'active' : ''}}">
                            <a href="{{ route("admin.roles.index") }}">
                                <p>
                                    {{ trans('cruds.role.title') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="{{request()->routeIs('admin.users.*') ? 'active' : ''}}">
                            <a href="{{ route("admin.users.index") }}">
                                <p>
                                    {{ trans('cruds.user.title') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                    @can('audit_log_access')
                        <li class="{{request()->routeIs('admin.audit-logs.*') ? 'active' : ''}}">
                            <a href="{{ route("admin.audit-logs.index") }}">
                                <p>
                                    {{ trans('cruds.auditLog.title') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>

            @can('user_management_access')

                <ul class="nav nav-treeview">

                </ul>
                </li>
            @endcan
            @can('product_management_access')
                <li class="nav-item has-treeview {{ request()->is('admin/product-categories*') ? 'menu-open' : '' }} {{ request()->is('admin/product-tags*') ? 'menu-open' : '' }} {{ request()->is('admin/product-statuses*') ? 'menu-open' : '' }} {{ request()->is('admin/product-attributes*') ? 'menu-open' : '' }} {{ request()->is('admin/product-attribute-values*') ? 'menu-open' : '' }} {{ request()->is('admin/products*') ? 'menu-open' : '' }} {{ request()->is('admin/product-reviews*') ? 'menu-open' : '' }}">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="fa-fw nav-icon fas fa-shopping-cart">

                        </i>
                        <p>
                            {{ trans('cruds.productManagement.title') }}
                            <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('product_category_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.product-categories.index") }}"
                                   class="nav-link {{ request()->is('admin/product-categories') || request()->is('admin/product-categories/*') ? 'active' : '' }}">
                                    <i class="fa-fw nav-icon fas fa-folder">

                                    </i>
                                    <p>
                                        {{ trans('cruds.productCategory.title') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('product_tag_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.product-tags.index") }}"
                                   class="nav-link {{ request()->is('admin/product-tags') || request()->is('admin/product-tags/*') ? 'active' : '' }}">
                                    <i class="fa-fw nav-icon fas fa-folder">

                                    </i>
                                    <p>
                                        {{ trans('cruds.productTag.title') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('product_status_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.product-statuses.index") }}"
                                   class="nav-link {{ request()->is('admin/product-statuses') || request()->is('admin/product-statuses/*') ? 'active' : '' }}">
                                    <i class="fa-fw nav-icon fas fa-folder">

                                    </i>
                                    <p>
                                        {{ trans('cruds.productStatus.title') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('product_attribute_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.product-attributes.index") }}"
                                   class="nav-link {{ request()->is('admin/product-attributes') || request()->is('admin/product-attributes/*') ? 'active' : '' }}">
                                    <i class="fa-fw nav-icon fas fa-cogs">

                                    </i>
                                    <p>
                                        {{ trans('cruds.productAttribute.title') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('product_attribute_value_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.product-attribute-values.index") }}"
                                   class="nav-link {{ request()->is('admin/product-attribute-values') || request()->is('admin/product-attribute-values/*') ? 'active' : '' }}">
                                    <i class="fa-fw nav-icon fas fa-cogs">

                                    </i>
                                    <p>
                                        {{ trans('cruds.productAttributeValue.title') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('product_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.products.index") }}"
                                   class="nav-link {{ request()->is('admin/products') || request()->is('admin/products/*') ? 'active' : '' }}">
                                    <i class="fa-fw nav-icon fas fa-shopping-cart">

                                    </i>
                                    <p>
                                        {{ trans('cruds.product.title') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('product_review_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.product-reviews.index") }}"
                                   class="nav-link {{ request()->is('admin/product-reviews') || request()->is('admin/product-reviews/*') ? 'active' : '' }}">
                                    <i class="fa-fw nav-icon far fa-star">

                                    </i>
                                    <p>
                                        {{ trans('cruds.productReview.title') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('location_access')
                <li class="nav-item has-treeview {{ request()->is('admin/countries*') ? 'menu-open' : '' }} {{ request()->is('admin/cities*') ? 'menu-open' : '' }} {{ request()->is('admin/areas*') ? 'menu-open' : '' }}">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="fa-fw nav-icon fas fa-street-view">

                        </i>
                        <p>
                            {{ trans('cruds.location.title') }}
                            <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('country_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.countries.index") }}"
                                   class="nav-link {{ request()->is('admin/countries') || request()->is('admin/countries/*') ? 'active' : '' }}">
                                    <i class="fa-fw nav-icon fas fa-flag">

                                    </i>
                                    <p>
                                        {{ trans('cruds.country.title') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('city_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.cities.index") }}"
                                   class="nav-link {{ request()->is('admin/cities') || request()->is('admin/cities/*') ? 'active' : '' }}">
                                    <i class="fa-fw nav-icon fas fa-map-marker-alt">

                                    </i>
                                    <p>
                                        {{ trans('cruds.city.title') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('area_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.areas.index") }}"
                                   class="nav-link {{ request()->is('admin/areas') || request()->is('admin/areas/*') ? 'active' : '' }}">
                                    <i class="fa-fw nav-icon fas fa-map-pin">

                                    </i>
                                    <p>
                                        {{ trans('cruds.area.title') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('client_access')
                <li class="nav-item has-treeview {{ request()->is('admin/customers*') ? 'menu-open' : '' }} {{ request()->is('admin/addresses*') ? 'menu-open' : '' }} {{ request()->is('admin/customer-devices*') ? 'menu-open' : '' }}">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="fa-fw nav-icon fas fa-users">

                        </i>
                        <p>
                            {{ trans('cruds.client.title') }}
                            <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('customer_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.customers.index") }}"
                                   class="nav-link {{ request()->is('admin/customers') || request()->is('admin/customers/*') ? 'active' : '' }}">
                                    <i class="fa-fw nav-icon fas fa-users">

                                    </i>
                                    <p>
                                        {{ trans('cruds.customer.title') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('address_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.addresses.index") }}"
                                   class="nav-link {{ request()->is('admin/addresses') || request()->is('admin/addresses/*') ? 'active' : '' }}">
                                    <i class="fa-fw nav-icon fas fa-street-view">

                                    </i>
                                    <p>
                                        {{ trans('cruds.address.title') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('customer_device_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.customer-devices.index") }}"
                                   class="nav-link {{ request()->is('admin/customer-devices') || request()->is('admin/customer-devices/*') ? 'active' : '' }}">
                                    <i class="fa-fw nav-icon fas fa-mobile-alt">

                                    </i>
                                    <p>
                                        {{ trans('cruds.customerDevice.title') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('company_access')
                <li class="nav-item has-treeview {{ request()->is('admin/vendors*') ? 'menu-open' : '' }} {{ request()->is('admin/brands*') ? 'menu-open' : '' }}">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="fa-fw nav-icon fas fa-building">

                        </i>
                        <p>
                            {{ trans('cruds.company.title') }}
                            <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('vendor_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.vendors.index") }}"
                                   class="nav-link {{ request()->is('admin/vendors') || request()->is('admin/vendors/*') ? 'active' : '' }}">
                                    <i class="fa-fw nav-icon fas fa-shuttle-van">

                                    </i>
                                    <p>
                                        {{ trans('cruds.vendor.title') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('brand_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.brands.index") }}"
                                   class="nav-link {{ request()->is('admin/brands') || request()->is('admin/brands/*') ? 'active' : '' }}">
                                    <i class="fa-fw nav-icon far fa-star">

                                    </i>
                                    <p>
                                        {{ trans('cruds.brand.title') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('gift_access')
                <li class="nav-item has-treeview {{ request()->is('admin/gifts-categories*') ? 'menu-open' : '' }} {{ request()->is('admin/cift-cards*') ? 'menu-open' : '' }} {{ request()->is('admin/gift-card-usages*') ? 'menu-open' : '' }} {{ request()->is('admin/coupon-usages*') ? 'menu-open' : '' }} {{ request()->is('admin/coupons*') ? 'menu-open' : '' }}">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="fa-fw nav-icon fas fa-cogs">

                        </i>
                        <p>
                            {{ trans('cruds.gift.title') }}
                            <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('gifts_category_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.gifts-categories.index") }}"
                                   class="nav-link {{ request()->is('admin/gifts-categories') || request()->is('admin/gifts-categories/*') ? 'active' : '' }}">
                                    <i class="fa-fw nav-icon fas fa-folder">

                                    </i>
                                    <p>
                                        {{ trans('cruds.giftsCategory.title') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('cift_card_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.cift-cards.index") }}"
                                   class="nav-link {{ request()->is('admin/cift-cards') || request()->is('admin/cift-cards/*') ? 'active' : '' }}">
                                    <i class="fa-fw nav-icon fas fa-address-card">

                                    </i>
                                    <p>
                                        {{ trans('cruds.ciftCard.title') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('gift_card_usage_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.gift-card-usages.index") }}"
                                   class="nav-link {{ request()->is('admin/gift-card-usages') || request()->is('admin/gift-card-usages/*') ? 'active' : '' }}">
                                    <i class="fa-fw nav-icon fas fa-credit-card">

                                    </i>
                                    <p>
                                        {{ trans('cruds.giftCardUsage.title') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('coupon_usage_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.coupon-usages.index") }}"
                                   class="nav-link {{ request()->is('admin/coupon-usages') || request()->is('admin/coupon-usages/*') ? 'active' : '' }}">
                                    <i class="fa-fw nav-icon fas fa-hand-holding-usd">

                                    </i>
                                    <p>
                                        {{ trans('cruds.couponUsage.title') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('coupon_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.coupons.index") }}"
                                   class="nav-link {{ request()->is('admin/coupons') || request()->is('admin/coupons/*') ? 'active' : '' }}">
                                    <i class="fa-fw nav-icon fas fa-star-half-alt">

                                    </i>
                                    <p>
                                        {{ trans('cruds.coupon.title') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('purchase_access')
                <li class="nav-item has-treeview {{ request()->is('admin/order-statuses*') ? 'menu-open' : '' }} {{ request()->is('admin/orders*') ? 'menu-open' : '' }} {{ request()->is('admin/order-items*') ? 'menu-open' : '' }} {{ request()->is('admin/payment-methods*') ? 'menu-open' : '' }} {{ request()->is('admin/transactions*') ? 'menu-open' : '' }} {{ request()->is('admin/cart-items*') ? 'menu-open' : '' }} {{ request()->is('admin/carts*') ? 'menu-open' : '' }}">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="fa-fw nav-icon fas fa-credit-card">

                        </i>
                        <p>
                            {{ trans('cruds.purchase.title') }}
                            <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('order_status_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.order-statuses.index") }}"
                                   class="nav-link {{ request()->is('admin/order-statuses') || request()->is('admin/order-statuses/*') ? 'active' : '' }}">
                                    <i class="fa-fw nav-icon fas fa-cogs">

                                    </i>
                                    <p>
                                        {{ trans('cruds.orderStatus.title') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('order_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.orders.index") }}"
                                   class="nav-link {{ request()->is('admin/orders') || request()->is('admin/orders/*') ? 'active' : '' }}">
                                    <i class="fa-fw nav-icon fas fa-cart-arrow-down">

                                    </i>
                                    <p>
                                        {{ trans('cruds.order.title') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('order_item_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.order-items.index") }}"
                                   class="nav-link {{ request()->is('admin/order-items') || request()->is('admin/order-items/*') ? 'active' : '' }}">
                                    <i class="fa-fw nav-icon fas fa-cogs">

                                    </i>
                                    <p>
                                        {{ trans('cruds.orderItem.title') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('payment_method_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.payment-methods.index") }}"
                                   class="nav-link {{ request()->is('admin/payment-methods') || request()->is('admin/payment-methods/*') ? 'active' : '' }}">
                                    <i class="fa-fw nav-icon fas fa-cogs">

                                    </i>
                                    <p>
                                        {{ trans('cruds.paymentMethod.title') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('transaction_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.transactions.index") }}"
                                   class="nav-link {{ request()->is('admin/transactions') || request()->is('admin/transactions/*') ? 'active' : '' }}">
                                    <i class="fa-fw nav-icon fas fa-cogs">

                                    </i>
                                    <p>
                                        {{ trans('cruds.transaction.title') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('cart_item_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.cart-items.index") }}"
                                   class="nav-link {{ request()->is('admin/cart-items') || request()->is('admin/cart-items/*') ? 'active' : '' }}">
                                    <i class="fa-fw nav-icon fas fa-bars">

                                    </i>
                                    <p>
                                        {{ trans('cruds.cartItem.title') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('cart_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.carts.index") }}"
                                   class="nav-link {{ request()->is('admin/carts') || request()->is('admin/carts/*') ? 'active' : '' }}">
                                    <i class="fa-fw nav-icon fas fa-cart-arrow-down">

                                    </i>
                                    <p>
                                        {{ trans('cruds.cart.title') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('option_access')
                <li class="nav-item has-treeview {{ request()->is('admin/currencies*') ? 'menu-open' : '' }} {{ request()->is('admin/settings*') ? 'menu-open' : '' }} {{ request()->is('admin/sliders*') ? 'menu-open' : '' }}">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="fa-fw nav-icon fas fa-bicycle">

                        </i>
                        <p>
                            {{ trans('cruds.option.title') }}
                            <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('currency_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.currencies.index") }}"
                                   class="nav-link {{ request()->is('admin/currencies') || request()->is('admin/currencies/*') ? 'active' : '' }}">
                                    <i class="fa-fw nav-icon fas fa-cogs">

                                    </i>
                                    <p>
                                        {{ trans('cruds.currency.title') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('setting_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.settings.index") }}"
                                   class="nav-link {{ request()->is('admin/settings') || request()->is('admin/settings/*') ? 'active' : '' }}">
                                    <i class="fa-fw nav-icon fas fa-angle-double-right">

                                    </i>
                                    <p>
                                        {{ trans('cruds.setting.title') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('slider_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.sliders.index") }}"
                                   class="nav-link {{ request()->is('admin/sliders') || request()->is('admin/sliders/*') ? 'active' : '' }}">
                                    <i class="fa-fw nav-icon fas fa-sliders-h">

                                    </i>
                                    <p>
                                        {{ trans('cruds.slider.title') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('contact_us_access')
                <li class="nav-item has-treeview {{ request()->is('admin/replies*') ? 'menu-open' : '' }} {{ request()->is('admin/tickets*') ? 'menu-open' : '' }}">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="fa-fw nav-icon fas fa-mobile">

                        </i>
                        <p>
                            {{ trans('cruds.contactUs.title') }}
                            <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('reply_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.replies.index") }}"
                                   class="nav-link {{ request()->is('admin/replies') || request()->is('admin/replies/*') ? 'active' : '' }}">
                                    <i class="fa-fw nav-icon fas fa-reply">

                                    </i>
                                    <p>
                                        {{ trans('cruds.reply.title') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('ticket_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.tickets.index") }}"
                                   class="nav-link {{ request()->is('admin/tickets') || request()->is('admin/tickets/*') ? 'active' : '' }}">
                                    <i class="fa-fw nav-icon fas fa-ticket-alt">

                                    </i>
                                    <p>
                                        {{ trans('cruds.ticket.title') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('cm_access')
                <li class="nav-item has-treeview {{ request()->is('admin/cms-categories*') ? 'menu-open' : '' }} {{ request()->is('admin/cms-pages*') ? 'menu-open' : '' }}">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="fa-fw nav-icon fab fa-trello">

                        </i>
                        <p>
                            {{ trans('cruds.cm.title') }}
                            <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('cms_category_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.cms-categories.index") }}"
                                   class="nav-link {{ request()->is('admin/cms-categories') || request()->is('admin/cms-categories/*') ? 'active' : '' }}">
                                    <i class="fa-fw nav-icon fas fa-bookmark">

                                    </i>
                                    <p>
                                        {{ trans('cruds.cmsCategory.title') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('cms_page_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.cms-pages.index") }}"
                                   class="nav-link {{ request()->is('admin/cms-pages') || request()->is('admin/cms-pages/*') ? 'active' : '' }}">
                                    <i class="fa-fw nav-icon fas fa-bookmark">

                                    </i>
                                    <p>
                                        {{ trans('cruds.cmsPage.title') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}"
                           href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key nav-icon">
                            </i>
                            <p>
                                {{ trans('global.change_password') }}
                            </p>
                        </a>
                    </li>
                @endcan
            @endif
            <li class="nav-item">
                <a href="#" class="nav-link"
                   onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <p>
                        <i class="fas fa-fw fa-sign-out-alt nav-icon">

                        </i>
                    <p>{{ trans('global.logout') }}</p>
                    </p>
                </a>
            </li>


        </ul>
        <!-- <div class="shadow-bottom"></div> -->

    </nav>

</div>
