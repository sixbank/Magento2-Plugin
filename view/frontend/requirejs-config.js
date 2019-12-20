var config = {
    map: {
        '*': {
            'Magento_Checkout/js/model/place-order':'Sixbank_Gateway/js/model/place-order',
            'Magento_Checkout/js/action/select-payment-method':
                'Sixbank_Gateway/js/action/select-payment-method'
        }
    },
    config: {
        mixins: {
            'Sixbank_Gateway/js/validation': {
                'Sixbank_Gateway/js/validation-mixin': true
            }
        }
    }
};