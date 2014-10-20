<?php
namespace Volleyball\Bundle\EnrollmentBundle\Repository;

class WeekRepository extends \Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository
{
    /**
     * {@inheritdoc}
     */
    protected function getAlias()
    {
        return 'week';
    }
}
