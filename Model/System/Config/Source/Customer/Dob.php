<?php
namespace Sixbank\Gateway\Model\System\Config\Source\Customer;

/**
 * Class Dob Source model DOB options
 *
 * @see        Official Website
 * @author    Sixbank (and others) 
 * @copyright 2018-2019 Sixbank
 * @license   https://www.gnu.org/licenses/gpl-3.0.pt-br.html GNU GPL, version 3
 * @package   Sixbank\Gateway\Model\System\Config\Source\Customer
 */
class Dob implements \Magento\Framework\Option\ArrayInterface
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
        $fields = $this->gatewayHelper->getFields('customer');
        $options = [];
        $options[] = array('value'=>'','label'=> __('Request customer along with card details'));

        foreach ($fields as $key => $value) {
            if (!is_null($value['frontend_label'])) {
                $options[] = array(
                    'value' => $value['attribute_code'],
                    'label' => $value['frontend_label'] . ' (' . $value['attribute_code'] . ')'
                );
            }
        }

        return $options;
    }
}