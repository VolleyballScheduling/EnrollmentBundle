<?php
namespace Volleyball\Bundle\EnrollmentBundle\Repository;

class AttendeeClassEnrollmentRepository extends \Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository
{
    /**
     * {@inheritdoc}
     */
    protected function getAlias()
    {
        return 'attendee_enrollment';
    }
}
