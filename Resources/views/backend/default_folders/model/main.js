Ext.define('Shopware.apps.ContingentsBackend.model.Main', {
    extend: 'Shopware.data.Model',

    configure: function() {
        return {
            controller: 'ContingentsBackend',
            detail: 'Shopware.apps.Scaffold.view.detail.create'
        };
    },

    fields: [
        { name : 'id', type: 'int', useNull: true },
        { name : 'quota', type: 'integer', useNull: true },
        { name : 'customerId', type: 'int' },
        { name : 'articleNumber', type: 'string' },
        { name : 'customerEmail', type: 'string' },
        { name : 'expirationDate', type: 'date', dateFormat: 'd.m.Y'},
        { name : 'initialQuota', type: 'integer' },
        { name : 'isExpired', type: 'boolean' },
    ],

    associations: [{
            relation: 'ManyToOne',
            field: 'customerId',
            type: 'hasMany',
            model: 'Shopware.apps.ContingentsBackend.model.Customer',
            name: 'getCustomer',
            associationKey: 'customer'
        }]
});

