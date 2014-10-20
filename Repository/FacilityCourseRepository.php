<?php
namespace Volleyball\Bundle\EnrollmentBundle\Repository;

class FacilityCourseRepository extends \Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository
{
    /**
     * {@inheritdoc}
     */
    protected function getAlias()
    {
        return 'facility_course';
    }
}
