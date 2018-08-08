
Ext.define('Shopware.apps.Scaffold', {
    extend: 'Enlight.app.SubApplication',

    name:'Shopware.apps.Scaffold',

    loadPath: '{url action=load}',
    bulkLoad: true,

    controllers: [ 'Main' ],

    views: [
        'list.Window',
        'list.List',

        'detail.Container',
        'detail.Window'
    ],

    models: [
        'Main',
        'Customer',
    ],

    stores: [ 'Main' ],

    launch: function() {
        return this.getController('Main').mainWindow;
    }
});