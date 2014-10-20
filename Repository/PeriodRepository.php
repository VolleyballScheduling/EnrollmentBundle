<?php
namespace Volleyball\Bundle\EnrollmentBundle\Repository;

class PeriodRepository extends \Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository
{
    /**
     * {@inheritdoc}
     */
    protected function getAlias()
    {
        return 'period';
    }
}
