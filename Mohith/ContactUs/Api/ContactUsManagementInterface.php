<?php
/**
 * Created by PhpStorm.
 * User: mohith
 * Date: 26/9/23
 * Time: 2:25 PM
 */

namespace Mohith\ContactUs\Api;


use Mohith\ContactUs\Api\Data\ContactUsInterface;
use Magento\Framework\DataObject;

interface ContactUsManagementInterface
{
    /**
     * Contact us form.
     *
     * @param mixed $contactForm
     *
     * @return ContactUsInterface|DataObject
     */
    public function submitForm($contactForm);
}
