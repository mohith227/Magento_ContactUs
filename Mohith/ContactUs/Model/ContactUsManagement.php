<?php
/**
 * Created by PhpStorm.
 * User: mohith
 * Date: 26/9/23
 * Time: 2:23 PM
 */

namespace Mohith\ContactUs\Model;

use Magento\Contact\Model\MailInterface;
use Magento\Framework\DataObjectFactory;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\DataObject;
use Mohith\ContactUs\Api\ContactUsManagementInterface;
use Mohith\ContactUs\Api\Data\ContactUsInterface;
use Mohith\ContactUs\Api\ContactUsRepositoryInterface;

class ContactUsManagement implements ContactUsManagementInterface
{
    /**
     * @var ContactUsRepositoryInterface
     */
    private $contactUsRepository;
    /**
     * @var MailInterface
     */
    private $mail;
    /**
     * @var DataObjectFactory
     */
    private $dataObjectFactory;

    /**
     * ContactUsManagement constructor.
     *
     * @param ContactUsRepositoryInterface $contactUsRepository
     * @param MailInterface $mail
     * @param DataObjectFactory $dataObjectFactory
     */
    public function __construct(
        ContactUsRepositoryInterface $contactUsRepository,
        MailInterface $mail,
        DataObjectFactory $dataObjectFactory
    )
    {
        $this->contactUsRepository = $contactUsRepository;
        $this->mail = $mail;
        $this->dataObjectFactory = $dataObjectFactory;
    }

    /**
     * Contact us form.
     *
     * @param mixed $contactForm
     *
     * @return ContactUsInterface|DataObject
     */
    public function submitForm($contactForm)
    {
        $result = $this->dataObjectFactory->create();
        if (empty($contactForm['name'])) {
            $result->setData('message', 'Enter the Name and try again.');
            return $result;
        }
        if (empty($contactForm['email'])) {
            $result->setData('message', 'Enter the Email and try again.');
            return $result;
        }
        if (false === \strpos($contactForm['email'], '@') || false === \strpos($contactForm['email'], '.com')) {
            $result->setData('message', 'The email address is invalid. Verify the email address and try again.');
            return $result;
        }
        if (empty($contactForm['comment'])) {
            $result->setData('message', 'Enter the Comment and try again.');
            return $result;
        }
        if (empty($contactForm['telephone'])) {
            $result->setData('message', 'Enter the Phone Number and try again.');
            return $result;
        }
        try {
            $contactUs = $this->contactUsRepository->create();
            $contactUs->setData([
                "name" => $contactForm['name'],
                "email" => $contactForm['email'],
                "phone_number" => $contactForm['telephone'],
                "message" => $contactForm['comment']
            ]);
            $this->contactUsRepository->save($contactUs);
            $this->sendEmail($contactForm);
            $result->setData('message', 'Thanks for contacting us with your comments and questions. We\'ll respond to you very soon.');
        } catch (LocalizedException $e) {
            $result->setData('message', $e->getMessage());
        } catch (\Exception $e) {
            $result->setData('message', 'An error occurred while processing your form. Please try again later.');
        }
        return $result;
    }

    /**
     * Method to send email.
     *
     * @param array $post Post data from contact form
     *
     * @return void
     */
    private function sendEmail($post)
    {
        $this->mail->send(
            $post['email'],
            ['data' => new DataObject($post)]
        );
    }
}
