define([
    'jquery',
    'uiComponent',
    'ko'
], function ($, Component, ko) {
    'use strict';

    return Component.extend({


        defaults: {
            template: 'Bkademy_Webpos/catalog/product-list'
        },

        product: ko.observableArray([]),
        curPage: ko.observable(1),
        numberOfProduct: ko.observable(0),
        numberOfPage: ko.observable(0),
        searchKey: ko.observable(''),

        initialize: function () {
            this._super();
        },

        showProduct: function (curPage) {

        },


        searchProduct: function (key, curPage) {

        },

        formatPrice: function (price) {
            return price;
        },

        filter: function () {

        },

        next: function () {

        },

        previous: function () {

        },

        showPopupDetails: function (item,event) {

        }
    });
});