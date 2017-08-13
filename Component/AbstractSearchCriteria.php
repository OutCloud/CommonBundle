<?php

namespace OutCloud\CommonBundle\Component;

/**
 * Class AbstractSearchCriteria
 * @package CommonBundle\Component
 */
abstract class AbstractSearchCriteria
{
    /** @var  int|null */
    protected $limit;
    /** @var  int|null */
    protected $offset;
    /** @var  array|null */
    protected $orderBy;

    /**
     * AbstractSearchCriteria constructor.
     * @param int|null $limit
     * @param int|null $offset
     * @param array|null $orderBy
     */
    public function __construct($limit = null, $offset = null, $orderBy = null)
    {
        $this->limit = $limit;
        $this->offset = $offset;
        $this->orderBy = $orderBy;
    }

    /**
     * @return array
     */
    public function getCriteria(): array
    {
        $properties = \array_keys(get_object_vars($this));
        $properties = \array_diff($properties, ['limit', 'offset', 'orderBy']);
        foreach ($properties as $property){
            $this->$property ? $criteria[$property] = $this->$property : null;
        }

        return $criteria ?? [];
    }

    /**
     * @return int|null
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * @param int|null $limit
     */
    public function setLimit($limit): void
    {
        $this->limit = $limit;
    }

    /**
     * @return int|null
     */
    public function getOffset(): ?int
    {
        return $this->offset;
    }

    /**
     * @param int|null $offset
     */
    public function setOffset($offset): void
    {
        $this->offset = $offset;
    }

    /**
     * @return array|null
     */
    public function getOrderBy(): ?array
    {
        return $this->orderBy;
    }

    /**
     * @param array|null $orderBy
     */
    public function setOrderBy($orderBy): void
    {
        $this->orderBy = $orderBy;
    }

}

