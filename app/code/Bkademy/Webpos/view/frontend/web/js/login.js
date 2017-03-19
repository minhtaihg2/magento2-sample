
define([
    'jquery',
    'mage/translate',
    'Bkademy_Webpos/js/model/url-builder',
    'mage/storage',
    'jquery/ui'
], function ($, Translate, urlBuilder, storage) {
    $.widget("magestore.webposLogin", {
        _create: function () {
            var self = this;
            $.extend(this, {

            });
            $(this.element).mage('validation', {
                submitHandler: function (form) {
                    self.ajaxLogin();
                }
            });

        },

        ajaxLogin: function () {

            var serviceUrl,
                payload;
            var staff = {};
            staff.username = $(this.element).find('#username').val();
            staff.password = $(this.element).find('#pwd').val();
            console.log(staff);
            serviceUrl = urlBuilder.createUrl('/webpos/staff/login', {});
            console.log(serviceUrl);
            payload = {
                'staff': staff,
            };
            return storage.post(
                serviceUrl, JSON.stringify(payload)
            ).fail(
                function (response) {
                    alert(Translate("Your login information is wrong!"));
                }
            ).success(
                function (response) {
                    console.log(response);
                    if(response==true)
                        window.location.reload();
                    else
                        alert(Translate("Your login information is wrong!"))
                }
            );
        }
    });

    return $.magestore.webposLogin();

});
