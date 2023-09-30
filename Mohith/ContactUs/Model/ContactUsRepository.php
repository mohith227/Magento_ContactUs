<?php
/**
 * Created by PhpStorm.
 * User: mohith
 * Date: 17/9/23
 * Time: 12:13 PM
 */

namespace Mohith\ContactUs\Model;

use Mohith\ContactUs\Model\ContactUs as Model;
use Mohith\ContactUs\Model\ResourceModel\ContactUs\Collection;
use Mohith\ContactUs\Model\ResourceModel\ContactUs\CollectionFactory;
use Mohith\ContactUs\Api\ContactUsRepositoryInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Mohith\ContactUs\Model\ResourceModel\ContactUs as ResourceModel;
use Mohith\ContactUs\Model\ContactUsFactory as ModelFactory;

class ContactUsRepository implements ContactUsRepositoryInterface
{
    /**
     * @var ModelFactory
     */
    private $modelFactory;
    /**
     * @var ResourceModel
     */
    private $resourceModel;
    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    /**
     * ContactUsRepository constructor.
     *
     * @param ContactUsFactory $modelFactory
     * @param ResourceModel $resourceModel
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        ModelFactory $modelFactory,
        ResourceModel $resourceModel,
        CollectionFactory $collectionFactory
    )
    {
        $this->modelFactory = $modelFactory;
        $this->resourceModel = $resourceModel;
        $this->collectionFactory = $collectionFactory;
    }


    /**
     * @param string $value
     * @param string $field
     * @throws NoSuchEntityException
     * @return Model
     */
    public function load($value, $field = self::ID_FIELD_NAME)
    {
        $model = $this->create();
        $this->resourceModel->load($model, $value, $field);
        if (!$model->getId()) {
            throw new NoSuchEntityException(__("Entity with $field = $value is Not Found"));
        }
        return $model;
    }

    /**
     * @param Model $model
     * @throws LocalizedException
     * @return Model
     */
    public function save(Model $model)
    {
        $this->resourceModel->save($model);
        return $model;
    }

    /**
     * @param Model $model
     * @throws \Exception
     * @return $this
     */
    public function delete(Model $model)
    {
        $this->resourceModel->delete($model);
        return $this;
    }

    /**
     * @return Collection
     */
    public function getCollection()
    {
        return $this->collectionFactory->create();
    }

    /**
     * @return Model
     */
    public function create()
    {
        return $this->modelFactory->create();
    }
}