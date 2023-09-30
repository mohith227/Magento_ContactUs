<?php
/**
 * Created by PhpStorm.
 * User: mohith
 * Date: 17/9/23
 * Time: 12:16 PM
 */

namespace Mohith\ContactUs\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;

class ContactUs extends AbstractDb
{
    protected $_idFieldName = 'id';

    /**
     * ContactUs constructor.
     *
     * @param Context $context
     * @param null $connectionName
     */
    public function __construct(Context $context, $connectionName = null)
    {
        parent::__construct($context, $connectionName);
    }

    protected function _construct()
    {
        $this->_init("magento_contact_us", 'id');
    }
}
