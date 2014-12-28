<?php
namespace Volleyball\Bundle\EnrollmentBundle\Entity;

use \Doctrine\ORM\Mapping as ORM;
use \Gedmo\Mapping\Annotation as Gedmo;
use \Symfony\Component\Validator\Constraints as Assert;
use \Doctrine\Common\Collections\ArrayCollection;

use \Volleyball\Bundle\UtilityBundle\Traits\TimestampableTrait;

/**
 * @ORM\Entity(repositoryClass="Volleyball\Bundle\EnrollmentBundle\Repository\AttendeeEnrollmentRepository")
 * @ORM\Table(name="attendee_class_enrollment")
 */
class AttendeeClassEnrollment
{
    use TimestampableTrait;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\EnrollmentBundle\Entity\AttendeeEnrollment", inversedBy="attendee_class_enrollment")
     * @ORM\JoinColumn(name="attendee_enrollment_id", referencedColumnName="id")
     */
    protected $attendee_enrollment;
    
    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\CourseBundle\Entity\VbClass", inversedBy="attendee_class_enrollment")
     * @ORM\JoinColumn(name="vb_class_id", referencedColumnName="id")
     */
    protected $vb_class;
    
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @inheritdoc
     */
    public function getAttendeeEnrollment()
    {
        return $this->attendee_enrollment;
    }
    
    /**
     * @inheritdoc
     */
    public function setAttendeeEnrollment(AttendeeEnrollment $attendee_enrollment)
    {
        $this->attendee_enrollment = $attendee_enrollment;
        
        return $this;
    }
    
    /**
     * @inheritdoc
     */
    public function getVbClass()
    {
        return $this->vb_class;
    }
    
    /**
     * @inheritdoc
     */
    public function setVbClass(\Volleyball\Bundle\CourseBundle\Entity\VbClass $class)
    {
        $this->vb_class = $class;
        
        return $this;
    }
}
