<?php
/**
 * Created by PhpStorm.
 * User: mohith
 * Date: 28/9/23
 * Time: 12:18 PM
 */

namespace Mohith\ContactUs\Model\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use Magento\Framework\Exception\LocalizedException;
use Mohith\ContactUs\Api\ContactUsRepositoryInterface;

class ContactUs implements ResolverInterface
{
    /**
     * @var ContactUsRepositoryInterface
     */
    private $contactUsRepository;

    /**
     * ContactUs constructor.
     *
     * @param ContactUsRepositoryInterface $contactUsRepository
     */
    public function __construct(ContactUsRepositoryInterface $contactUsRepository
    )
    {
        $this->contactUsRepository = $contactUsRepository;

    }

    /**
     * Contact us form.
     *
     * @param array $contactForm
     *
     * @return array
     * @throws GraphQlNoSuchEntityException
     */
    private function submitForm($contactForm)
    {
        if (empty($contactForm['name'])) {
            return ['msg' => 'Enter the Name and try again.'];
        }
        if (empty($contactForm['email'])) {
            return ['msg' => 'Enter the Email and try again.'];
        }
        if (false === \strpos($contactForm['email'], '@') || false === \strpos($contactForm['email'], '.com')) {
            return ['msg' => 'The email address is invalid. Verify the email address and try again.'];
        }
        if (empty($contactForm['comment'])) {
            return ['msg' => 'Enter the Comment and try again.'];
        }
        if (empty($contactForm['telephone'])) {
            return ['msg' => 'Enter the Phone Number and try again.'];
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
            return ['msg' => 'Thanks for contacting us with your comments and questions. We\'ll respond to you very soon.'];

        } catch (LocalizedException $e) {
            throw new GraphQlNoSuchEntityException(__($e->getMessage()), $e);
        } catch (\Exception $e) {
            return ['msg' => 'An error occurred while processing your form. Please try again later.'];

        }
    }

    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)
    {
        $contactForm = $args['input'];
        return $this->submitForm($contactForm);
    }
}
