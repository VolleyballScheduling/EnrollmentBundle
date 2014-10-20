<?php
namespace Volleyball\Bundle\EnrollmentBundle\Repository;

class PasselEnrollmentRepository extends \Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository
{
    /**
     * {@inheritdoc}
     */
    protected function getAlias()
    {
        return 'passel_enrollment';
    }
}
