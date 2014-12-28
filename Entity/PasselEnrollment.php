<?php
namespace Volleyball\Bundle\EnrollmentBundle\Entity;

use \Doctrine\ORM\Mapping as ORM;
use \Gedmo\Mapping\Annotation as Gedmo;
use \Symfony\Component\Validator\Constraints as Assert;

use \Volleyball\Bundle\UtilityBundle\Traits\TimestampableTrait;

/**
 * @ORM\Entity(repositoryClass="Volleyball\Bundle\EnrollmentBundle\Repository\PasselEnrollmentCollectionRepository")
 * @ORM\Table(name="passel_enrollment")
 */
class PasselEnrollment
{
    use TimestampableTrait;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\PasselBundle\Entity\Passel", inversedBy="passel_enrollment")
     * @ORM\JoinColumn(name="passel_id", referencedColumnName="id")
     */
    protected $passel;

    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\FacilityBundle\Entity\Facility", inversedBy="passel_enrollment")
     * @ORM\JoinColumn(name="facility_id", referencedColumnName="id")
     */
    protected $facility;

    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\EnrollmentBundle\Entity\Week", inversedBy="passel_enrollment")
     * @ORM\JoinColumn(name="week_id", referencedColumnName="id")
     */
    protected $week;

    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\EnrollmentBundle\Entity\Season", inversedBy="passel_enrollment")
     * @ORM\JoinColumn(name="season_id", referencedColumnName="id")
     */
    protected $season;

    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\FacilityBundle\Entity\Quarters", inversedBy="passel_enrollment")
     * @ORM\JoinColumn(name="quarters_id", referencedColumnName="id")
     */
    protected $quarters;

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
    public function setPassel(\Volleyball\Bundle\PasselBundle\Entity\Passel $passel = null)
    {
        $this->passel = $passel;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getPassel()
    {
        return $this->passel;
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
    public function setWeek(\Volleyball\Bundle\EnrollmentBundle\Entity\Week $week = null)
    {
        $this->week = $week;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getWeek()
    {
        return $this->week;
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

    /**
     * @inheritdoc
     */
    public function setQuarters(\Volleyball\Bundle\FacilityBundle\Entity\Quarters $quarters = null)
    {
        $this->quarters = $quarters;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getQuarters()
    {
        return $this->quarters;
    }
}
