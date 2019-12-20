<?php
namespace Sixbank\Gateway\Controller\Ajax;
use Magento\Framework\Controller\ResultFactory;

/**
 * Class GetSessionId
 *
 * @see        Official Website
 * @author    Sixbank (and others) 
 * @copyright 2018-2019 Sixbank
 * @license   https://www.gnu.org/licenses/gpl-3.0.pt-br.html GNU GPL, version 3
 * @package   Sixbank\Gateway\Controller\Ajax
 */
class GetSessionId extends \Magento\Framework\App\Action\Action
{
     /**
     * Gateway Helper
     *
     * @var Sixbank\Gateway\Helper\Data;
     */ 
    protected $gatewayHelper;

     /**
     * @param \Sixbank\Gateway\Helper\Data $gatewayHelper
     * @param \Magento\Framework\App\Action\Context $context
     */
    public function __construct(
        \Sixbank\Gateway\Helper\Data $gatewayHelper,
         \Magento\Framework\App\Action\Context $context
 
    ) {
        $this->gatewayHelper = $gatewayHelper;
        parent::__construct($context);
    }

    /**
    * @return json
    */
    public function execute()
    {
        $resultJson = $this->resultFactory->create(ResultFactory::TYPE_JSON);     
        try{
             $session_id = $this->gatewayHelper->getSessionId();
             $result = array(
                'status'=> 'success',
                'session_id' => $session_id
            );
         }catch (\Exception $e) {
            $result = array('status'=> 'error','message' => $e->getMessage());
        }

        $resultJson->setData($result);         
        return $resultJson;
    }
}