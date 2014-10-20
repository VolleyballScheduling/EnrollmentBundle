<?php
namespace Volleyball\Bundle\EnrollmentBundle\Repository;

class AttendeeEnrollmentRepository extends \Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository
{
    /**
     * {@inheritdoc}
     */
    protected function getAlias()
    {
        return 'attendee_enrollment';
    }
}
    