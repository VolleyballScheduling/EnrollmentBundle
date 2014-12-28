<?php
namespace Volleyball\Bundle\EnrollmentBundle\Entity;

use \Doctrine\ORM\Mapping as ORM;
use \Gedmo\Mapping\Annotation as Gedmo;
use \Symfony\Component\Validator\Constraints as Assert;

use \Volleyball\Bundle\UtilityBundle\Traits\SluggableTrait;
use \Volleyball\Bundle\UtilityBundle\Traits\TimestampableTrait;

/**
 * @ORM\Entity(repositoryClass="Volleyball\Bundle\EnrollmentBundle\Repository\FacilityCourseRepository")
 * @ORM\Table(name="facility_enrollment")
 */
class FacilityCourse
{
    use TimestampableTrait;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\CourseBundle\Entity\Course", inversedBy="facility_course")
     * @ORM\JoinColumn(name="course_id", referencedColumnName="id")
     */
    protected $course = null;

    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\FacilityBundle\Entity\Facility", inversedBy="facility_enrollments")
     * @ORM\JoinColumn(name="facility_id", referencedColumnName="id")
     */
    protected $facility = null;

    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\EnrollmentBundle\Entity\Season", inversedBy="facility_course")
     * @ORM\JoinColumn(name="season_id", referencedColumnName="id")
     */
    protected $season = null;

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
    public function setCourse(\Volleyball\Bundle\CourseBundle\Entity\Course $course = null)
    {
        $this->course = $course;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getCourse()
    {
        return $this->course;
    }

    /**
     * @inheritdoc
     */
    public function setFacility(\Volleyball\Bundle\FacilityBundle\Entity\Facility $facility = null)
    {
        $this->facility = $facility;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getFacility()
    {
        return $this->facility;
    }

    /**
     * @inheritdoc
     */
    public function setSeason(\Volleyball\Bundle\EnrollmentBundle\Entity\Season $season = null)
    {
        $this->season = $season;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getSeason()
    {
        return $this->season;
    }
}
