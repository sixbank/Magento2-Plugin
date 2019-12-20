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
class Antifraud implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * {@inheritdoc}
     */
    public function toOptionArray()
    {
        $options = array();
        $options[] = array('value'=>'kondutoscore','label'=> __('Konduto Score'));
        $options[] = array('value'=>'clearsale','label'=> __('Clear Sale'));        
        $options[] = array('value'=>'fcontrol','label'=> __('Fcontrol'));        

        return $options;
    }
}