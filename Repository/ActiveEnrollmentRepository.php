<?php
namespace Volleyball\Bundle\EnrollmentBundle\Repository;

class ActiveEnrollmentRepository extends \Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository
{
    /**
     * {@inheritdoc}
     */
    protected function getAlias()
    {
        return 'active_enrollment';
    }
}
