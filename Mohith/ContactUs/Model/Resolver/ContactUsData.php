<?php
/**
 * Created by PhpStorm.
 * User: mohith
 * Date: 28/9/23
 * Time: 3:33 PM
 */

namespace Mohith\ContactUs\Model\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use Magento\Framework\Exception\LocalizedException;
use Mohith\ContactUs\Api\ContactUsRepositoryInterface;

class ContactUsData implements ResolverInterface
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

    private function getDetails($id)
    {
        try{
            $detail = $this->contactUsRepository->load($id);
            return [
                'name' => $detail->getName(),
                'email' => $detail->getEmail(),
                'telephone' => $detail->getPhoneNumber(),
                'comment' => $detail->getMessage()
            ];
        }catch (\Exception $e){
            throw new GraphQlNoSuchEntityException(__($e->getMessage()), $e);

        }


    }

    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)
    {
        $id = $args['input']['id'];
        return $this->getDetails($id);
    }
}
