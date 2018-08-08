
Ext.define('Shopware.apps.Scaffold', {
    extend: 'Enlight.app.SubApplication',

    name:'Shopware.apps.Scaffold',

    loadPath: '{url action=create}',
    bulkLoad: true,

    controllers: [ 'Main' ],

    views: [
        'detail.Create',
        'detail.Window'
    ],

    models: ['Main'],

    stores: [ 'Main' ],

    launch: function() {
        return this.getController('Main').mainWindow;
    }
});