<?php

namespace Unit6\Computer\Controller\Adminhtml\Game;

class Savecomputer extends \Magento\Backend\App\Action
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
		$data = $this->getRequest()->getPostValue();
      /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $id=$this->getRequest()->getParam('game_id');
        // dd($data);
        //echo $id; exit;
	     try{
	           if(isset($id) && !empty($id)){
	           	   $model = $this->computerFactory->create()->load($id);
                //    dd($model);
				   $model->addData($data);
				   $model->save();
	           }else{
		           $model = $this->computerFactory->create();
				//    dd($data);
				   $model->setData($data);
				   $model->save();
			   }
		    	$this->messageManager->addSuccessMessage(__('You saved the post.'));
        }catch(\Exception $e){
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the post.'));
        }
	 return $resultRedirect->setPath('*/*/');
	//  return $resultRedirect->setPath('computer/game/index');
	}


}