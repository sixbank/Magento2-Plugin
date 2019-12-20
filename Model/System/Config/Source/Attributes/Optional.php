<?php
namespace Sixbank\Gateway\Model\System\Config\Source\Attributes;

/**
 * Class Optional
 *
 * @see        Official Website
 * @author    Sixbank (and others) 
 * @copyright 2018-2019 Sixbank
 * @license   https://www.gnu.org/licenses/gpl-3.0.pt-br.html GNU GPL, version 3
 * @package   Sixbank\Gateway\Model\System\Config\Source\Attributes
 */
class Optional implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * @var \Sixbank\Gateway\Helper\Internal
     */
    protected $gatewayHelper;

    /**
     * @param \Sixbank\Gateway\Helper\Internal $gatewayHelper
     */
    public function __construct(
            \Sixbank\Gateway\Helper\Internal $gatewayHelper
    ){
        $this->gatewayHelper = $gatewayHelper;
    }

    /**
     * {@inheritdoc}
     */
    public function toOptionArray()
    {
        $fields = $this->gatewayHelper->getFields('customer_address');
         $options = [];
         $options[] = array('value'=>'','label'=> __('Do not Report to Gateway'));

        foreach ($fields as $key => $value) {
            if (!is_null($value['frontend_label'])) {
                //caso esteja sendo usado a propriedade multilinha do endereco, ele aceita indicar o que cada linha faz
                if ($value['attribute_code'] == 'street') {
                    $streetLines = $this->gatewayHelper->getStoreConfig('customer/address/street_lines');
                    for ($i = 1; $i <= $streetLines; $i++) {
                        $options[] = array('value' => 'street_'.$i, 'label' => 'Street Line '.$i);
                    }
                } else {
                    $options[] = array(
                        'value' => $value['attribute_code'],
                        'label' => $value['frontend_label']. ' (' . $value['attribute_code'] . ')'
                    );
                }
            }
        }

        return $options;
    }
}