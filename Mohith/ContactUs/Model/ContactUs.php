<?php
/**
 * Created by PhpStorm.
 * User: mohith
 * Date: 17/9/23
 * Time: 12:12 PM
 */

namespace Mohith\ContactUs\Model;


use Magento\Framework\Model\AbstractModel;
use Mohith\ContactUs\Api\Data\ContactUsInterface;
use Mohith\ContactUs\Model\ResourceModel\ContactUs as ContactUsResourceModel;

class ContactUs extends AbstractModel implements ContactUsInterface
{
    const CACHE_TAG = 'contact_us';
    /**
     * @var string
     */
    protected $_cacheTag = 'contact_us';
    /**
     * @var string
     */
    protected $_eventPrefix = 'contact_us';

    /**
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    protected function _construct()
    {
        $this->_init(ContactUsResourceModel::class);
    }
    /**
     * GetId
     *
     * @return string
     */
    public function getId()
    {
        return $this->getData(self::ID);
    }

    /**
     * GetName
     *
     * @return string
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * GetEmail
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->getData(self::EMAIL);
    }

    /**
     * GetPhoneNumber
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->getData(self::PHONE_NUMBER);
    }

    /**
     * GetMessage
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->getData(self::MESSAGE);
    }

    /**
     * GetStoreId
     *
     * @return string
     */
    public function getStoreId()
    {
        return $this->getData(self::STORE_ID);
    }

    /**
     * GetCreatedAt
     *
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * GetUpdatedAt
     *
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT);
    }

    /**
     * SetId
     *
     * @param $id
     * @return ContactUs
     */
    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }

    /**
     * SetName
     *
     * @param $name
     * @return ContactUs
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * SetEmail
     *
     * @param $email
     * @return ContactUs
     */
    public function setEmail($email)
    {
        return $this->setData(self::EMAIL, $email);
    }


    /**
     * SetPhoneNumber
     *
     * @param $phoneNumber
     * @return ContactUs
     */
    public function setPhoneNumber($phoneNumber)
    {
        return $this->setData(self::PHONE_NUMBER, $phoneNumber);
    }

    /**
     * SetMessage
     *
     * @param $message
     * @return ContactUs
     */
    public function setMessage($message)
    {
        return $this->setData(self::MESSAGE, $message);
    }

    /**
     * SetMessage
     *
     * @param $storeId
     * @return ContactUs
     */
    public function setStoreId($storeId)
    {
        return $this->setData(self::STORE_ID, $storeId);
    }
    /**
     * SetCreatedAt
     *
     * @param $createdAt
     * @return ContactUs
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    /**
     * SetUpdatedAt
     *
     * @param $updatedAt
     * @return ContactUs
     */
    public function setUpdatedAt($updatedAt)
    {
        return $this->setData(self::UPDATED_AT, $updatedAt);
    }
}
