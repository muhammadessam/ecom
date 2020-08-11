<!--  BEGIN SIDEBAR  -->
<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">
        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories" id="dashboard">

            <li class="menu">
                <a href="{{route('admin.home')}}" class="dropdown-toggle">
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

            @can('user_management_access')
                <li class="menu">
                    <a href="#app" id="user-management" data-toggle="collapse"
                       aria-expanded="{{request()->routeIs('admin.users.*') || request()->routeIs('admin.roles.*') || request()->routeIs('admin.permissions.*') || request()->routeIs('admin.audit-logs.*')?'true' : 'false'}}"
                       class="dropdown-toggle">
                        <div class="">
                            <i class="fa-fw nav-icon fas fa-users"></i>
                            <span>{{ trans('cruds.userManagement.title') }}</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="{{ request()->routeIs('admin.users.*') || request()->routeIs('admin.roles.*') || request()->routeIs('admin.permissions.*') || request()->routeIs('admin.audit-logs.*') ? 'show' : '' }} collapse submenu list-unstyled"
                        id="app" data-parent="#user-management">
                        @can('permission_access')
                            <li class="{{request()->routeIs('admin.permissions.*') ? 'active' : ''}}">
                                <a href="{{ route("admin.permissions.index") }}">{{ trans('cruds.permission.title') }}</a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="{{request()->routeIs('admin.roles.*') ? 'active' : ''}}">
                                <a href="{{ route("admin.roles.index") }}">{{ trans('cruds.role.title') }}</a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="{{request()->routeIs('admin.users.*') ? 'active' : ''}}">
                                <a href="{{ route("admin.users.index") }}">{{ trans('cruds.user.title')}}</a>
                            </li>
                        @endcan
                        @can('audit_log_access')
                            <li class="{{request()->routeIs('admin.audit-logs.*') ? 'active' : ''}}">
                                <a href="{{ route("admin.audit-logs.index") }}">{{ trans('cruds.auditLog.title') }}</a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan

            @can('product_management_access')
                <li class="menu">
                    <a href="#products" id="product-management" data-toggle="collapse"
                       aria-expanded="{{request()->routeIs('admin.product-categories.*') || request()->routeIs('admin.product-tags.*') || request()->routeIs('admin.products.*') || request()->routeIs('admin.product-attribute-values.*') || request()->routeIs('admin.product-attributes.*') || request()->routeIs('admin.product-reviews.*' ? '' :'') ?'true' :'false'}}"
                       class="dropdown-toggle collapsed">
                        <div class="">
                            <i class="fa-fw nav-icon fas fa-cart-arrow-down"></i>
                            <span>{{ trans('cruds.productManagement.title') }}</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="{{request()->routeIs('admin.product-categories.*') || request()->routeIs('admin.product-tags.*') || request()->routeIs('admin.products.*') || request()->routeIs('admin.product-attribute-values.*') || request()->routeIs('admin.product-attributes.*') || request()->routeIs('admin.product-reviews.*') ? 'show' :''}} submenu list-unstyled collapse"
                        id="products" data-parent="#product-management">
                        @can('product_category_access')
                            <li class="{{request()->routeIs('admin.product-categories.*') ? 'active' : ''}}">
                                <a href="{{ route("admin.product-categories.index") }}">
                                    {{ trans('cruds.productCategory.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('product_tag_access')
                            <li class="{{request()->routeIs('admin.product-tags.*') ? 'active' : ''}}">
                                <a href="{{ route("admin.product-tags.index") }}">
                                    {{ trans('cruds.productTag.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('product_status_access')
                            <li class="{{request()->routeIs('admin.product-statuses.*') ? 'active' : ''}}">
                                <a href="{{ route("admin.product-statuses.index") }}">
                                    {{ trans('cruds.productStatus.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('product_attribute_access')
                            <li class="{{request()->routeIs('admin.product-attributes.*') ? 'active' : ''}}">
                                <a href="{{ route("admin.product-attributes.index") }}">
                                    {{ trans('cruds.productAttribute.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('product_attribute_value_access')
                            <li class="{{request()->routeIs('admin.product-attribute-values.*') ? 'active' : ''}}">
                                <a href="{{ route("admin.product-attribute-values.index") }}">
                                    {{ trans('cruds.productAttributeValue.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('product_access')
                            <li class="{{request()->routeIs('admin.products.*') ? 'active' : ''}}">
                                <a href="{{ route("admin.products.index") }}">
                                    {{ trans('cruds.product.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('product_review_access')
                            <li class="{{request()->routeIs('admin.product-reviews.*') ? 'active' : ''}}">
                                <a href="{{ route("admin.product-reviews.index") }}">
                                    {{ trans('cruds.productReview.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan

            @can('location_access')
                <li class="menu">
                    <a class="dropdown-toggle collapse" href="#locations"
                       data-toggle="collapse" id="locations-container"
                       aria-expanded="{{request()->routeIs('admin.countries.*') || request()->routeIs('admin.cities.*') || request()->routeIs('admin.areas.*') ? 'true' : 'false'}}">
                        <div class="">
                            <i class="fa-fw nav-icon fas fa-street-view"></i>
                            <span>{{ trans('cruds.location.title') }}</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="submenu list-unstyled collapse {{request()->routeIs('admin.countries.*') || request()->routeIs('admin.cities.*') || request()->routeIs('admin.areas.*') ? 'show' : ''}}"
                        id="locations" data-parent="#locations-container">
                        @can('country_access')
                            <li class="{{ request()->is('admin/countries') || request()->is('admin/countries/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.countries.index") }}">
                                    {{ trans('cruds.country.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('city_access')
                            <li class="{{ request()->is('admin/cities') || request()->is('admin/cities/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.cities.index") }}">
                                    {{ trans('cruds.city.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('area_access')
                            <li class="{{ request()->is('admin/areas') || request()->is('admin/areas/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.areas.index") }}">
                                    {{ trans('cruds.area.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan

            @can('client_access')
                <li class="menu">
                    <a class="dropdown-toggle collapse" href="#clietns"
                       data-toggle="collapse" id="clients-container"
                       aria-expanded="{{request()->routeIs('admin.customers.*') || request()->routeIs('admin.addresses.*') || request()->routeIs('admin.customer-devices.*') ? 'true' : 'false' }}">
                        <div>
                            <i class="fa-fw nav-icon fas fa-users"></i>
                            {{ trans('cruds.client.title') }}
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="submenu list-unstyled collapse {{ request()->routeIs('admin.customer-devices.*') || request()->routeIs('admin.customers.*')  || request()->routeIs('admin.addresses.*') ? 'show' : '' }}"
                        id="clietns">
                        @can('customer_access')
                            <li class="{{ request()->routeIs('admin.customers.*') ? 'active' : '' }}">
                                <a href="{{ route("admin.customers.index") }}">
                                    {{trans('cruds.customer.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('address_access')
                            <li class="{{ request()->routeIs('admin.addresses.*') ? 'active' : '' }}">
                                <a href="{{ route("admin.addresses.index") }}">
                                    {{ trans('cruds.address.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('customer_device_access')
                            <li class="{{request()->routeIs('admin.customer-devices.*') ? 'active' : '' }}">
                                <a href="{{route("admin.customer-devices.index") }}">
                                    {{ trans('cruds.customerDevice.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan

            @can('company_access')
                <li class="menu">
                    <a class="dropdown-toggle collapse"
                       href="#companies" data-toggle="collapse"
                       aria-expanded="{{ request()->routeIs('admin.vendors.*') || request()->routeIs('admin.brands.*') ? 'true' : 'false' }}">
                        <div>
                            <i class="fa-fw nav-icon fas fa-building"></i>
                            {{ trans('cruds.company.title') }}
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="submenu list-unstyled collapse {{ request()->routeIs('admin.vendors.*') || request()->routeIs('admin.brands.*') ? 'show' : '' }}"
                        id="companies">
                        @can('vendor_access')
                            <li class="{{ request()->routeIs('admin.vendors.*') ? 'active' : '' }}">
                                <a href="{{ route("admin.vendors.index") }}">
                                    {{ trans('cruds.vendor.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('brand_access')
                            <li class="{{ request()->routeIs('admin.brands.*') ? 'active' : '' }}">
                                <a href="{{ route("admin.brands.index") }}">
                                    {{ trans('cruds.brand.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan

            @can('gift_access')
                <li class="menu">
                    <a class="dropdown-toggle collapse"
                       href="#gifts"
                       data-toggle="collapse"
                       aria-expanded="{{request()->routeIs('admin.gifts-categories.*') || request()->routeIs('admin.gift-cards.*') || request()->routeIs('admin.gift-card-usages.*') || request()->routeIs('admin.coupon-usages.*') || request()->routeIs('admin.coupons.*') ? 'true' : 'false' }}">
                        <div>
                            <i class="fa-fw nav-icon fas fa-cogs"></i>
                            {{ trans('cruds.gift.title') }}
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="submenu list-unstyled collapse {{request()->routeIs('admin.gifts-categories.*') || request()->routeIs('admin.gift-cards.*') || request()->routeIs('admin.gift-card-usages.*') || request()->routeIs('admin.coupon-usages.*') || request()->routeIs('admin.coupons.*') ? 'show' : '' }} "
                        id="gifts">
                        @can('gifts_category_access')
                            <li class="{{ request()->routeIs('admin.gifts-categories.*') ? 'active' : '' }}">
                                <a href="{{ route("admin.gifts-categories.index") }}">
                                    {{ trans('cruds.giftsCategory.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('cift_card_access')
                            <li class=" {{ request()->routeIs('admin.gift-cards.*') ? 'active' : '' }}">
                                <a href="{{ route("admin.gift-cards.index") }}">
                                    {{ trans('cruds.ciftCard.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('gift_card_usage_access')
                            <li class="{{ request()->routeIs('admin.gift-card-usages.*') ? 'active' :''}}">
                                <a href="{{ route("admin.gift-card-usages.index") }}">
                                    {{ trans('cruds.giftCardUsage.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('coupon_usage_access')
                            <li class=" {{ request()->routeIs('admin.coupon-usages.*') ? 'active' : '' }}">
                                <a href="{{ route("admin.coupon-usages.index") }}">
                                    {{ trans('cruds.couponUsage.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('coupon_access')
                            <li class="{{ request()->routeIs('admin.coupons.*') ? 'active' : '' }}">
                                <a href="{{ route("admin.coupons.index") }}">
                                    {{ trans('cruds.coupon.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan

            @can('purchase_access')
                <li class="menu">
                    <a class="dropdown-toggle collapse"
                       href="#pruchase"
                       data-toggle="collapse"
                       aria-expanded="{{ request()->routeIs('admin.order-statuses.*') || request()->routeIs('admin.orders.*') || request()->routeIs('admin.order-items.*') || request()->routeIs('admin.payment-methods.*') || request()->routeIs('admin.transactions.*') || request()->routeIs('admin.cart-items.*') || request()->routeIs('admin.carts.*') ? 'ture' : 'false' }}">
                        <div>
                            <i class="fa-fw nav-icon fas fa-credit-card"></i>
                            {{ trans('cruds.purchase.title') }}
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="submenu list-unstyled collapse {{ request()->routeIs('admin.order-statuses.*') || request()->routeIs('admin.orders.*') || request()->routeIs('admin.order-items.*') || request()->routeIs('admin.payment-methods.*') || request()->routeIs('admin.transactions.*') || request()->routeIs('admin.cart-items.*') || request()->routeIs('admin.carts.*') ? 'show' :'' }}"
                        id="pruchase">
                        @can('order_status_access')
                            <li class="{{ request()->routeIs('admin.order-statuses.*') ? 'active' : '' }}">
                                <a href="{{ route("admin.order-statuses.index") }}"
                                   class="nav-link {{ request()->is('admin/order-statuses') || request()->is('admin/order-statuses/*') ? 'active' : '' }}">
                                    {{ trans('cruds.orderStatus.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('order_access')
                            <li class="{{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
                                <a href="{{ route("admin.orders.index") }}">
                                    {{ trans('cruds.order.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('order_item_access')
                            <li class="{{ request()->routeIs('admin.order-items.*') ? 'active' : '' }}">
                                <a href="{{ route("admin.order-items.index") }}">
                                    {{ trans('cruds.orderItem.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('payment_method_access')
                            <li class="{{ request()->routeIs('admin.payment-methods.*') ? 'active' : '' }}">
                                <a href="{{ route("admin.payment-methods.index") }}">
                                    {{ trans('cruds.paymentMethod.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('transaction_access')
                            <li class="{{ request()->routeIs('admin.transactions.*')  ? 'active' : '' }}">
                                <a href="{{ route("admin.transactions.index") }}">
                                    {{ trans('cruds.transaction.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('cart_item_access')
                            <li class="{{ request()->routeIs('admin.cart-items.*')  ? 'active' : '' }}">
                                <a href="{{ route("admin.cart-items.index") }}">
                                    {{ trans('cruds.cartItem.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('cart_access')
                            <li class="{{ request()->routeIs('admin.carts.*') ? 'active' : '' }}">
                                <a href="{{ route("admin.carts.index") }}">
                                    {{ trans('cruds.cart.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan

            @can('option_access')
                <li class="menu">
                    <a class="dropdown-toggle collapse"
                       href="#options"
                       data-toggle="collapse"
                       aria-expanded="{{ request()->routeIs('admin.currencies.*') || request()->routeIs('admin.settings.*') || request()->routeIs('admin.sliders.*') ? 'true' : 'false' }}">
                        <div>
                            <i class="fa-fw nav-icon fas fa-bicycle"></i>
                            <span>{{ trans('cruds.option.title') }}</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="submenu list-unstyled collapse {{ request()->routeIs('admin.currencies.*') || request()->routeIs('admin.settings.*') || request()->routeIs('admin.sliders.*') ? 'show' : '' }}"
                        id="options">
                        @can('currency_access')
                            <li class="{{ request()->routeIs('admin.currencies.*') ? 'active' : '' }}">
                                <a href="{{ route("admin.currencies.index") }}">
                                    {{ trans('cruds.currency.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('setting_access')
                            <li class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                                <a href="{{ route("admin.settings.index") }}">
                                    {{ trans('cruds.setting.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('slider_access')
                            <li class="{{ request()->routeIs('admin.sliders.*') ? 'active' : '' }}">
                                <a href="{{ route("admin.sliders.index") }}">
                                    {{ trans('cruds.slider.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan

            @can('contact_us_access')
                <li class="menu">
                    <a class="dropdown-toggle collapse"
                       href="#contact"
                       data-toggle="collapse"
                       aria-expanded="{{ request()->routeIs('admin.replies.*') || request()->routeIs('admin.tickets.*') ? 'true' : 'false' }}">
                        <div>
                            <i class="fa-fw nav-icon fas fa-mobile"></i>
                            {{ trans('cruds.contactUs.title') }}
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="submenu list-unstyled collapse {{ request()->routeIs('admin.replies.*') || request()->routeIs('admin.tickets.*') ? 'show' : '' }}"
                        id="contact">
                        @can('reply_access')
                            <li class="{{request()->routeIs('admin.replies.*') ? 'active' : '' }}">
                                <a href="{{ route("admin.replies.index") }}">
                                    {{ trans('cruds.reply.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('ticket_access')
                            <li class="{{request()->routeIs('admin.tickets.*') ? 'active' : '' }}">
                                <a href="{{ route("admin.tickets.index") }}">
                                    {{ trans('cruds.ticket.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan

            @can('cm_access')
                <li class="menu">
                    <a class="dropdown-toggle collapse"
                       href="#cms"
                       data-toggle="collapse"
                       aria-expanded="{{request()->routeIs('admin.cms-categories.*') || request()->routeIs('admin.cms-pages.*') ? 'true' : 'false'}}">
                        <div>
                            <i class="fa-fw nav-icon fab fa-trello"></i>
                            {{ trans('cruds.cm.title') }}
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul id="cms"
                        class="submenu list-unstyled collapse {{request()->routeIs('admin.cms-categories.*') || request()->routeIs('admin.cms-pages.*') ? 'show' : ''}}">
                        @can('cms_category_access')
                            <li class="{{request()->is('admin/cms-categories') || request()->is('admin/cms-categories/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.cms-categories.index") }}">
                                    {{ trans('cruds.cmsCategory.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('cms_page_access')
                            <li class="{{request()->is('admin/cms-pages') || request()->is('admin/cms-pages/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.cms-pages.index") }}">
                                    {{ trans('cruds.cmsPage.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan

            @if(file_exists(app_path('Http/Controllers/Admin/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="menu">
                        <a class="dropdown-toggle collapse"
                           href="{{ route('profile.password.edit') }}">
                            <div>
                                <i class="fa-fw fas fa-key nav-icon"></i>
                                {{ trans('global.change_password') }}
                            </div>
                        </a>
                    </li>
                @endcan
            @endif
            <li class="menu">
                <a href="#" class="collapse dropdown-toggle"
                   onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <div>
                        <i class="fas fa-fw fa-sign-out-alt nav-icon"></i>
                        {{ trans('global.logout') }}
                    </div>
                </a>
            </li>
        </ul>
    </nav>
</div>
