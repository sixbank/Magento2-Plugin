<?php
namespace Sixbank\Gateway\Controller\Order;

use Magento\Framework\App\CsrfAwareActionInterface;
use Magento\Framework\App\Request\InvalidRequestException;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\ResultFactory;

/**
 * Class Index
 *
 * @see        Official Website
 * @author    Sixbank (and others) 
 * @copyright 2018-2019 Sixbank
 * @license   https://www.gnu.org/licenses/gpl-3.0.pt-br.html GNU GPL, version 3
 * @package   Sixbank\Gateway\Controller\Notification
 */
class Index extends \Magento\Framework\App\Action\Action implements CsrfAwareActionInterface
{    
     /**
     * Gateway Helper
     *
     * @var Sixbank\Gateway\Helper\Data;
     */ 
    protected $gatewayHelper;

    /**
     * Gateway Abstract Model
     *
     * @var Sixbank\Gateway\Model\Notifications
     */ 
    protected $gatewayAbModel;
    protected $resultPageFactory;

     /**
     * @param \Sixbank\Gateway\Helper\Data $gatewayHelper
     * @param \Sixbank\Gateway\Model\Notifications $gatewayAbModel
     * @param \Magento\Framework\App\Action\Context $context
     */
    public function __construct(
        \Sixbank\Gateway\Helper\Data $gatewayHelper,
        \Sixbank\Gateway\Model\Notifications $gatewayAbModel,
         \Magento\Framework\App\Action\Context $context,
         \Magento\Framework\View\Result\PageFactory $resultPageFactory
 
    ) {
        $this->gatewayHelper = $gatewayHelper;
        $this->gatewayAbModel = $gatewayAbModel; 
        $this->resultPageFactory = $resultPageFactory;      
        parent::__construct($context);
    }
        
    /**
    * @return json
    */
    public function execute()
    {        
        $transactionID = $this->getRequest()->getParam('TransactionID', false);
        
                
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Custom Front View'));        
        return $resultPage;

    }

    /**
     * Create exception in case CSRF validation failed.
     * Return null if default exception will suffice.
     *
     * @param RequestInterface $request
     *
     * @return InvalidRequestException|null
     */
    public function createCsrfValidationException(RequestInterface $request): ?InvalidRequestException
    {
        return null;
    }

    /**
     * Perform custom request validation.
     * Return null if default validation is needed.
     *
     * @param RequestInterface $request
     *
     * @return bool|null
     */
    public function validateForCsrf(RequestInterface $request): ?bool
    {
        return true;
    }
}