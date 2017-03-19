/**
 * Created by anhnc on 15/03/2017.
 */
define([
    'Bkademy_Webpos/js/view/container/abstract'
], function (Container) {
    'use strict';

    return Container.extend({
        defaults: {
            container_id:"checkout"
        }
    });
});
