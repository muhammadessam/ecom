<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'product_management_access',
            ],
            [
                'id'    => 18,
                'title' => 'product_category_create',
            ],
            [
                'id'    => 19,
                'title' => 'product_category_edit',
            ],
            [
                'id'    => 20,
                'title' => 'product_category_show',
            ],
            [
                'id'    => 21,
                'title' => 'product_category_delete',
            ],
            [
                'id'    => 22,
                'title' => 'product_category_access',
            ],
            [
                'id'    => 23,
                'title' => 'product_tag_create',
            ],
            [
                'id'    => 24,
                'title' => 'product_tag_edit',
            ],
            [
                'id'    => 25,
                'title' => 'product_tag_show',
            ],
            [
                'id'    => 26,
                'title' => 'product_tag_delete',
            ],
            [
                'id'    => 27,
                'title' => 'product_tag_access',
            ],
            [
                'id'    => 28,
                'title' => 'product_create',
            ],
            [
                'id'    => 29,
                'title' => 'product_edit',
            ],
            [
                'id'    => 30,
                'title' => 'product_show',
            ],
            [
                'id'    => 31,
                'title' => 'product_delete',
            ],
            [
                'id'    => 32,
                'title' => 'product_access',
            ],
            [
                'id'    => 33,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 34,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 35,
                'title' => 'product_status_create',
            ],
            [
                'id'    => 36,
                'title' => 'product_status_edit',
            ],
            [
                'id'    => 37,
                'title' => 'product_status_show',
            ],
            [
                'id'    => 38,
                'title' => 'product_status_delete',
            ],
            [
                'id'    => 39,
                'title' => 'product_status_access',
            ],
            [
                'id'    => 40,
                'title' => 'product_attribute_create',
            ],
            [
                'id'    => 41,
                'title' => 'product_attribute_edit',
            ],
            [
                'id'    => 42,
                'title' => 'product_attribute_show',
            ],
            [
                'id'    => 43,
                'title' => 'product_attribute_delete',
            ],
            [
                'id'    => 44,
                'title' => 'product_attribute_access',
            ],
            [
                'id'    => 45,
                'title' => 'product_attribute_value_create',
            ],
            [
                'id'    => 46,
                'title' => 'product_attribute_value_edit',
            ],
            [
                'id'    => 47,
                'title' => 'product_attribute_value_show',
            ],
            [
                'id'    => 48,
                'title' => 'product_attribute_value_delete',
            ],
            [
                'id'    => 49,
                'title' => 'product_attribute_value_access',
            ],
            [
                'id'    => 50,
                'title' => 'location_access',
            ],
            [
                'id'    => 51,
                'title' => 'country_create',
            ],
            [
                'id'    => 52,
                'title' => 'country_edit',
            ],
            [
                'id'    => 53,
                'title' => 'country_show',
            ],
            [
                'id'    => 54,
                'title' => 'country_delete',
            ],
            [
                'id'    => 55,
                'title' => 'country_access',
            ],
            [
                'id'    => 56,
                'title' => 'city_create',
            ],
            [
                'id'    => 57,
                'title' => 'city_edit',
            ],
            [
                'id'    => 58,
                'title' => 'city_show',
            ],
            [
                'id'    => 59,
                'title' => 'city_delete',
            ],
            [
                'id'    => 60,
                'title' => 'city_access',
            ],
            [
                'id'    => 61,
                'title' => 'area_create',
            ],
            [
                'id'    => 62,
                'title' => 'area_edit',
            ],
            [
                'id'    => 63,
                'title' => 'area_show',
            ],
            [
                'id'    => 64,
                'title' => 'area_delete',
            ],
            [
                'id'    => 65,
                'title' => 'area_access',
            ],
            [
                'id'    => 66,
                'title' => 'client_access',
            ],
            [
                'id'    => 67,
                'title' => 'customer_create',
            ],
            [
                'id'    => 68,
                'title' => 'customer_edit',
            ],
            [
                'id'    => 69,
                'title' => 'customer_show',
            ],
            [
                'id'    => 70,
                'title' => 'customer_delete',
            ],
            [
                'id'    => 71,
                'title' => 'customer_access',
            ],
            [
                'id'    => 72,
                'title' => 'address_create',
            ],
            [
                'id'    => 73,
                'title' => 'address_edit',
            ],
            [
                'id'    => 74,
                'title' => 'address_show',
            ],
            [
                'id'    => 75,
                'title' => 'address_delete',
            ],
            [
                'id'    => 76,
                'title' => 'address_access',
            ],
            [
                'id'    => 77,
                'title' => 'company_access',
            ],
            [
                'id'    => 78,
                'title' => 'vendor_create',
            ],
            [
                'id'    => 79,
                'title' => 'vendor_edit',
            ],
            [
                'id'    => 80,
                'title' => 'vendor_show',
            ],
            [
                'id'    => 81,
                'title' => 'vendor_delete',
            ],
            [
                'id'    => 82,
                'title' => 'vendor_access',
            ],
            [
                'id'    => 83,
                'title' => 'brand_create',
            ],
            [
                'id'    => 84,
                'title' => 'brand_edit',
            ],
            [
                'id'    => 85,
                'title' => 'brand_show',
            ],
            [
                'id'    => 86,
                'title' => 'brand_delete',
            ],
            [
                'id'    => 87,
                'title' => 'brand_access',
            ],
            [
                'id'    => 88,
                'title' => 'purchase_access',
            ],
            [
                'id'    => 89,
                'title' => 'order_create',
            ],
            [
                'id'    => 90,
                'title' => 'order_edit',
            ],
            [
                'id'    => 91,
                'title' => 'order_show',
            ],
            [
                'id'    => 92,
                'title' => 'order_delete',
            ],
            [
                'id'    => 93,
                'title' => 'order_access',
            ],
            [
                'id'    => 94,
                'title' => 'gift_access',
            ],
            [
                'id'    => 95,
                'title' => 'gifts_category_create',
            ],
            [
                'id'    => 96,
                'title' => 'gifts_category_edit',
            ],
            [
                'id'    => 97,
                'title' => 'gifts_category_show',
            ],
            [
                'id'    => 98,
                'title' => 'gifts_category_delete',
            ],
            [
                'id'    => 99,
                'title' => 'gifts_category_access',
            ],
            [
                'id'    => 100,
                'title' => 'cift_card_create',
            ],
            [
                'id'    => 101,
                'title' => 'cift_card_edit',
            ],
            [
                'id'    => 102,
                'title' => 'cift_card_show',
            ],
            [
                'id'    => 103,
                'title' => 'cift_card_delete',
            ],
            [
                'id'    => 104,
                'title' => 'cift_card_access',
            ],
            [
                'id'    => 105,
                'title' => 'gift_card_usage_create',
            ],
            [
                'id'    => 106,
                'title' => 'gift_card_usage_edit',
            ],
            [
                'id'    => 107,
                'title' => 'gift_card_usage_show',
            ],
            [
                'id'    => 108,
                'title' => 'gift_card_usage_delete',
            ],
            [
                'id'    => 109,
                'title' => 'gift_card_usage_access',
            ],
            [
                'id'    => 110,
                'title' => 'coupon_create',
            ],
            [
                'id'    => 111,
                'title' => 'coupon_edit',
            ],
            [
                'id'    => 112,
                'title' => 'coupon_show',
            ],
            [
                'id'    => 113,
                'title' => 'coupon_delete',
            ],
            [
                'id'    => 114,
                'title' => 'coupon_access',
            ],
            [
                'id'    => 115,
                'title' => 'order_status_create',
            ],
            [
                'id'    => 116,
                'title' => 'order_status_edit',
            ],
            [
                'id'    => 117,
                'title' => 'order_status_show',
            ],
            [
                'id'    => 118,
                'title' => 'order_status_delete',
            ],
            [
                'id'    => 119,
                'title' => 'order_status_access',
            ],
            [
                'id'    => 120,
                'title' => 'order_item_create',
            ],
            [
                'id'    => 121,
                'title' => 'order_item_edit',
            ],
            [
                'id'    => 122,
                'title' => 'order_item_show',
            ],
            [
                'id'    => 123,
                'title' => 'order_item_delete',
            ],
            [
                'id'    => 124,
                'title' => 'order_item_access',
            ],
            [
                'id'    => 125,
                'title' => 'payment_method_create',
            ],
            [
                'id'    => 126,
                'title' => 'payment_method_edit',
            ],
            [
                'id'    => 127,
                'title' => 'payment_method_show',
            ],
            [
                'id'    => 128,
                'title' => 'payment_method_delete',
            ],
            [
                'id'    => 129,
                'title' => 'payment_method_access',
            ],
            [
                'id'    => 130,
                'title' => 'transaction_create',
            ],
            [
                'id'    => 131,
                'title' => 'transaction_edit',
            ],
            [
                'id'    => 132,
                'title' => 'transaction_show',
            ],
            [
                'id'    => 133,
                'title' => 'transaction_delete',
            ],
            [
                'id'    => 134,
                'title' => 'transaction_access',
            ],
            [
                'id'    => 135,
                'title' => 'cart_create',
            ],
            [
                'id'    => 136,
                'title' => 'cart_edit',
            ],
            [
                'id'    => 137,
                'title' => 'cart_show',
            ],
            [
                'id'    => 138,
                'title' => 'cart_delete',
            ],
            [
                'id'    => 139,
                'title' => 'cart_access',
            ],
            [
                'id'    => 140,
                'title' => 'cart_item_create',
            ],
            [
                'id'    => 141,
                'title' => 'cart_item_edit',
            ],
            [
                'id'    => 142,
                'title' => 'cart_item_show',
            ],
            [
                'id'    => 143,
                'title' => 'cart_item_delete',
            ],
            [
                'id'    => 144,
                'title' => 'cart_item_access',
            ],
            [
                'id'    => 145,
                'title' => 'option_access',
            ],
            [
                'id'    => 146,
                'title' => 'currency_create',
            ],
            [
                'id'    => 147,
                'title' => 'currency_edit',
            ],
            [
                'id'    => 148,
                'title' => 'currency_show',
            ],
            [
                'id'    => 149,
                'title' => 'currency_delete',
            ],
            [
                'id'    => 150,
                'title' => 'currency_access',
            ],
            [
                'id'    => 151,
                'title' => 'setting_create',
            ],
            [
                'id'    => 152,
                'title' => 'setting_edit',
            ],
            [
                'id'    => 153,
                'title' => 'setting_show',
            ],
            [
                'id'    => 154,
                'title' => 'setting_delete',
            ],
            [
                'id'    => 155,
                'title' => 'setting_access',
            ],
            [
                'id'    => 156,
                'title' => 'slider_create',
            ],
            [
                'id'    => 157,
                'title' => 'slider_edit',
            ],
            [
                'id'    => 158,
                'title' => 'slider_show',
            ],
            [
                'id'    => 159,
                'title' => 'slider_delete',
            ],
            [
                'id'    => 160,
                'title' => 'slider_access',
            ],
            [
                'id'    => 161,
                'title' => 'customer_device_create',
            ],
            [
                'id'    => 162,
                'title' => 'customer_device_edit',
            ],
            [
                'id'    => 163,
                'title' => 'customer_device_show',
            ],
            [
                'id'    => 164,
                'title' => 'customer_device_delete',
            ],
            [
                'id'    => 165,
                'title' => 'customer_device_access',
            ],
            [
                'id'    => 166,
                'title' => 'contact_us_access',
            ],
            [
                'id'    => 167,
                'title' => 'ticket_create',
            ],
            [
                'id'    => 168,
                'title' => 'ticket_edit',
            ],
            [
                'id'    => 169,
                'title' => 'ticket_show',
            ],
            [
                'id'    => 170,
                'title' => 'ticket_delete',
            ],
            [
                'id'    => 171,
                'title' => 'ticket_access',
            ],
            [
                'id'    => 172,
                'title' => 'reply_create',
            ],
            [
                'id'    => 173,
                'title' => 'reply_edit',
            ],
            [
                'id'    => 174,
                'title' => 'reply_show',
            ],
            [
                'id'    => 175,
                'title' => 'reply_delete',
            ],
            [
                'id'    => 176,
                'title' => 'reply_access',
            ],
            [
                'id'    => 177,
                'title' => 'coupon_usage_create',
            ],
            [
                'id'    => 178,
                'title' => 'coupon_usage_edit',
            ],
            [
                'id'    => 179,
                'title' => 'coupon_usage_show',
            ],
            [
                'id'    => 180,
                'title' => 'coupon_usage_delete',
            ],
            [
                'id'    => 181,
                'title' => 'coupon_usage_access',
            ],
            [
                'id'    => 182,
                'title' => 'product_review_create',
            ],
            [
                'id'    => 183,
                'title' => 'product_review_edit',
            ],
            [
                'id'    => 184,
                'title' => 'product_review_show',
            ],
            [
                'id'    => 185,
                'title' => 'product_review_delete',
            ],
            [
                'id'    => 186,
                'title' => 'product_review_access',
            ],
            [
                'id'    => 187,
                'title' => 'cm_access',
            ],
            [
                'id'    => 188,
                'title' => 'cms_page_create',
            ],
            [
                'id'    => 189,
                'title' => 'cms_page_edit',
            ],
            [
                'id'    => 190,
                'title' => 'cms_page_show',
            ],
            [
                'id'    => 191,
                'title' => 'cms_page_delete',
            ],
            [
                'id'    => 192,
                'title' => 'cms_page_access',
            ],
            [
                'id'    => 193,
                'title' => 'cms_category_create',
            ],
            [
                'id'    => 194,
                'title' => 'cms_category_edit',
            ],
            [
                'id'    => 195,
                'title' => 'cms_category_show',
            ],
            [
                'id'    => 196,
                'title' => 'cms_category_delete',
            ],
            [
                'id'    => 197,
                'title' => 'cms_category_access',
            ],
            [
                'id'    => 198,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
