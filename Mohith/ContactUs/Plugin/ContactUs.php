<?php
/**
 * Created by PhpStorm.
 * User: mohith
 * Date: 17/9/23
 * Time: 12:31 PM
 */

namespace Mohith\ContactUs\Plugin;

use Mohith\ContactUs\Model\ContactUsRepository;
use Psr\Log\LoggerInterface;

class ContactUs
{
    /**
     * @var ContactUsRepository
     */
    private $contactUsRepository;
    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * ContactUs constructor.
     * @param ContactUsRepository $contactUsRepository
     * @param LoggerInterface $logger
     */
    public function __construct(
        ContactUsRepository $contactUsRepository,
        LoggerInterface $logger
    )
    {
        $this->contactUsRepository = $contactUsRepository;
        $this->logger = $logger;
    }

    /**
     * @param \Magento\Contact\Controller\Index\Post $subject
     * @param $result
     * @return mixed
     */
    public function afterExecute(\Magento\Contact\Controller\Index\Post $subject, $result)
    {
        $params = $subject->getRequest()->getParams();
        $contactUs = $this->contactUsRepository->create();
        $contactUs->setData([
            "name" => $params['name'],
            "email" => $params['email'],
            "phone_number" => $params['telephone'],
            "message" => $params['comment']
        ]);
        try{
            $this->contactUsRepository->save($contactUs);
        }
        catch (\Exception $e){
            $this->logger->info($e->getMessage());
        }
        return $result;
    }
}