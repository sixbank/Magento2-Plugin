<?php
namespace Sixbank\Gateway\Model\System\Config\Source;

/**
 * Class Ccbrand Source model for CC flags
 *
 * @see        Official Website
 * @author    Sixbank (and others) 
 * @copyright 2018-2019 Sixbank
 * @license   https://www.gnu.org/licenses/gpl-3.0.pt-br.html GNU GPL, version 3
 * @package   Sixbank\Gateway\Model\System\Config\Source
 */
class Slipacquirer implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * {@inheritdoc}
     */
    public function toOptionArray()
    {
        $options = array();
        $options[] = array('value'=>'bradesco','label'=> __('Bradesco Shopfácil'));
        $options[] = array('value'=>'cielo','label'=> __('Cielo'));
        $options[] = array('value'=>'itau','label'=> __('Itaú Shopline'));     
        $options[] = array('value'=>'gateway','label'=> __('Sixbank'));

        return $options;
    }
}