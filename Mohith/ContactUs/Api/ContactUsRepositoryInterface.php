<?php
/**
 * Created by PhpStorm.
 * User: mohith
 * Date: 17/9/23
 * Time: 12:10 PM
 */

namespace Mohith\ContactUs\Api;

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Mohith\ContactUs\Model\ContactUs as Model;
use Mohith\ContactUs\Model\ResourceModel\ContactUs\Collection;

interface ContactUsRepositoryInterface
{
    const ID_FIELD_NAME = "id";

    /**
     * @param string $value
     * @param string $field
     * @throws NoSuchEntityException
     * @return Model
     */
    public function load($value, $field = self::ID_FIELD_NAME);

    /**
     * @param Model $model
     * @throws LocalizedException
     * @return Model
     */
    public function save(Model $model);

    /**
     * @param Model $model
     * @throws \Exception
     * @return $this
     */
    public function delete(Model $model);

    /**
     * @return Collection
     */
    public function getCollection();

    /**
     * @return Model
     */
    public function create();
}