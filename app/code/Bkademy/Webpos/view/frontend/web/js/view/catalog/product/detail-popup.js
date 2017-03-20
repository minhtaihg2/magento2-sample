/*
 *  Copyright © 2016 Magestore. All rights reserved.
 *  See COPYING.txt for license details.
 *
 */
define(
    [
        'jquery',
        'ko',
        'uiComponent',
        'Bkademy_Webpos/js/model/catalog/product/detail-popup'
    ],
    function ($, ko, Component, detailPopup) {
        "use strict";
        return Component.extend({
            itemData: ko.pureComputed(function () {
                return detailPopup.itemData();
            }),

            defaults: {
                template: 'Bkademy_Webpos/catalog/product/detail-popup'
            },
            initialize: function () {
                this._super();
            },
            closeDetailPopup: function() {
                $("#popup-product-detail").hide();
                $(".wrap-backover").hide();
                $('.notification-bell').show();
                $('#c-button--push-left').show();
            },
        });
    }
);
