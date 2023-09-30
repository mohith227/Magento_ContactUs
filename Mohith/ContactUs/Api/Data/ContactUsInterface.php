<?php
/**
 * Created by PhpStorm.
 * User: mohith
 * Date: 26/9/23
 * Time: 1:56 PM
 */

namespace Mohith\ContactUs\Api\Data;

use Mohith\ContactUs\Model\ContactUs;

interface ContactUsInterface
{
    const ID = 'id';
    const NAME = 'name';
    const EMAIL = 'email';
    const PHONE_NUMBER = 'phone_number';
    const MESSAGE = 'message';
    const STORE_ID = 'store_id';
    const CREATED_AT = "creation_at";
    const UPDATED_AT = "updated_at";

    /**
     * GetId
     *
     * @return string
     */
    public function getId();

    /**
     * GetName
     *
     * @return string
     */
    public function getName();

    /**
     * GetEmail
     *
     * @return string
     */
    public function getEmail();

    /**
     * GetPhoneNumber
     *
     * @return string
     */
    public function getPhoneNumber();

    /**
     * GetMessage
     *
     * @return string
     */
    public function getMessage();

    /**
     * GetStoreId
     *
     * @return string
     */
    public function getStoreId();

    /**
     * GetCreatedAt
     *
     * @return string
     */
    public function getCreatedAt();

    /**
     * GetUpdatedAt
     *
     * @return string
     */
    public function getUpdatedAt();

    /**
     * SetId
     *
     * @param $id
     * @return ContactUs
     */
    public function setId($id);

    /**
     * SetName
     *
     * @param $name
     * @return ContactUs
     */
    public function setName($name);

    /**
     * SetEmail
     *
     * @param $email
     * @return ContactUs
     */
    public function setEmail($email);


    /**
     * SetPhoneNumber
     *
     * @param $phoneNumber
     * @return ContactUs
     */
    public function setPhoneNumber($phoneNumber);

    /**
     * SetMessage
     *
     * @param $message
     * @return ContactUs
     */
    public function setMessage($message);

    /**
     * SetMessage
     *
     * @param $storeId
     * @return ContactUs
     */
    public function setStoreId($storeId);
    /**
     * SetCreatedAt
     *
     * @param $createdAt
     * @return ContactUs
     */
    public function setCreatedAt($createdAt);

    /**
     * SetUpdatedAt
     *
     * @param $updatedAt
     * @return ContactUs
     */
    public function setUpdatedAt($updatedAt);
}
