<?php
/**
 * Created by PhpStorm.
 * User: mohith
 * Date: 17/9/23
 * Time: 12:17 PM
 */

namespace Mohith\ContactUs\Model\ResourceModel\ContactUs;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Mohith\ContactUs\Model\ContactUs as ContactUsModel;
use Mohith\ContactUs\Model\ResourceModel\ContactUs as ContactUsResourceModel;

class Collection extends AbstractCollection
{

    protected function _construct()
    {
        $this->_init(ContactUsModel::class, ContactUsResourceModel::class);
    }
}
