<?php

namespace Unit6\Computer\Controller\Adminhtml\Game;

class Deletecomputer extends \Magento\Backend\App\Action
{
	protected $resultPageFactory = false;
	protected $computerFactory;

	public function __construct(
		\Magento\Backend\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $resultPageFactory,
		\Unit6\Computer\Model\ComputerFactory $computerFactory
	)
	{
		$this->computerFactory = $computerFactory;
		parent::__construct($context);
		$this->resultPageFactory = $resultPageFactory;
	}

	public function execute()
	{

        $resultRedirect = $this->resultRedirectFactory->create();
        $id=$this->getRequest()->getParam('id');
       // echo $id; exit;
	     try{
	           	   $model = $this->computerFactory->create()->load($id);
				   $model->delete();
		    	$this->messageManager->addSuccessMessage(__('You have deleted the post.'));
			}catch(\Exception $e){
				 $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the post.'));
			}
	 return $resultRedirect->setPath('*/*/');
	}


}