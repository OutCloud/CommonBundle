<?php

namespace OutCloud\CommonBundle\Component;

use CommonBundle\Exception\EntityDoesNotExistException;
use Doctrine\ORM\EntityRepository;

abstract class AbstractRepository extends EntityRepository
{
    /**
     * @param AbstractSearchCriteria $criteria
     * @return AbstractEntity|null
     */
    public function findOne(AbstractSearchCriteria $criteria): ?AbstractEntity
    {
        return $this->findOneBy(
            $criteria->getCriteria(),
            $criteria->getOrderBy(),
            $criteria->getLimit(),
            $criteria->getOffset()
        );
    }

    /**
     * @param AbstractSearchCriteria $criteria
     * @return AbstractEntity
     * @throws EntityDoesNotExistException
     */
    public function getOne(AbstractSearchCriteria $criteria): AbstractEntity
    {
        $entity = $this->findOne($criteria);
        if(!($entity instanceof AbstractEntity)){
            throw new EntityDoesNotExistException();
        }

        return $entity;
    }

    /**
     * @param AbstractSearchCriteria $criteria
     * @return AbstractEntity[]
     */
    public function findMany(AbstractSearchCriteria $criteria): array
    {
        return $this->findBy($criteria->getCriteria(),$criteria->getOrderBy(), $criteria->getLimit(), $criteria->getOffset());
    }


}

