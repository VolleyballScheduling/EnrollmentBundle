<?php
namespace Volleyball\Bundle\EnrollmentBundle\Entity;

use \Doctrine\ORM\Mapping as ORM;
use \Gedmo\Mapping\Annotation as Gedmo;
use \Symfony\Component\Validator\Constraints as Assert;
use \Doctrine\Common\Collections\ArrayCollection;

use \Volleyball\Bundle\UtilityBundle\Traits\TimestampableTrait;

/**
 * @ORM\Entity(repositoryClass="Volleyball\Bundle\EnrollmentBundle\Repository\AttendeeEnrollmentRepository")
 * @ORM\Table(name="attendee_enrollment")
 */
class AttendeeEnrollment
{
    use TimestampableTrait;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\PasselBundle\Entity\Attendee", inversedBy="attendee_enrollment")
     * @ORM\JoinColumn(name="attendee_id", referencedColumnName="id")
     */
    protected $attendee = null;

    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\EnrollmentBundle\Entity\PasselEnrollment", inversedBy="attendee_enrollment")
     * @ORM\JoinColumn(name="facility_id", referencedColumnName="id")
     */
    protected $passel_enrollment;

    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\FacilityBundle\Entity\AttendeeQuarters", inversedBy="attendee_enrollment")
     * @ORM\JoinColumn(name="week_id", referencedColumnName="id")
     */
    protected $quarters;

    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\EnrollmentBundle\Entity\AttendeeClassEnrollment", inversedBy="attendee_enrollment")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $class_enrollments;

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
    public function getAttendee()
    {
        return $this->attendee;
    }
    
    /**
     * @inheritdoc
     */
    public function setAttendee(\Volleyball\Bundle\PasselBundle\Entity\Attendee $attendee)
    {
        $this->attendee = $attendee;
        
        return $this;
    }
    
    /**
     * @inheritdoc
     */
    public function getPasselEnrollment()
    {
        return $this->passel_enrollment;
    }
    
    /**
     * @inheritdoc
     */
    public function setPasselEnrollment(\Volleyball\Bundle\EnrollmentBundle\Entity\PasselEnrollment $passel_enrollment)
    {
        $this->passel_enrollment = $passel_enrollment;
        
        return $this;
    }
    
    /**
     * @inheritdoc
     */
    public function getQuarters()
    {
        return $this->quarters;
    }
    
    /**
     * @inheritdoc
     */
    public function setQuarters(\Volleyball\Bundle\FacilityBundle\Entity\Quarters $quarters)
    {
        $this->quarters = $quarters;
        
        return $this;
    }
    
    /**
     * @inheritdoc
     */
    public function getClassEnrollments()
    {
        return $this->class_enrollments;
    }
    
    /**
     * @inheritdoc
     */
    public function getClassEnrollment($class_enrollment)
    {
        return $this->class_enrollments->get($class_enrollment);
    }
    
    /**
     * @inheritdoc
     */
    public function setClassEnrollments(array $class_enrollments)
    {
        if (!$class_enrollments instanceof ArrayCollection) {
            $class_enrollments = new ArrayCollection($class_enrollments);
        }
        
        $this->class_enrollments = $class_enrollments;
        
        return $this;
    }
    
    /**
     * @inheritdoc
     */
    public function addClassEnrollment(\Volleyball\Bundle\EnrollmentBundle\Entity\AttendeeClassEnrollment $class_enrollment)
    {
        $this->class_enrollments->add($class_enrollment);
        
        return $this;
    }
}
