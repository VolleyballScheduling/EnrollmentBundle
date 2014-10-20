<?php
namespace Volleyball\Bundle\EnrollmentBundle\Entity;

use \Doctrine\ORM\Mapping as ORM;
use \Gedmo\Mapping\Annotation as Gedmo;
use \Symfony\Component\Validator\Constraints as Assert;
use \Doctrine\Common\Collections\ArrayCollection;

use \Volleyball\Bundle\UtilityBundle\Traits\SluggableTrait;
use \Volleyball\Bundle\UtilityBundle\Traits\TimestampableTrait;

/**
 * @ORM\Entity(repositoryClass="Volleyball\Bundle\EnrollmentBundle\Repository\WeekRepository")
 * @ORM\Table(name="week")
 */
class Week
{
    use SluggableTrait;
    use TimestampableTrait;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->periods = new ArrayCollection();
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * Name
     * @var  string name
     * @ORM\Column(name="name", type="string")
     */
    protected $name = '';
    
    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\EnrollmentBundle\Entity\Season", inversedBy="week")
     * @ORM\JoinColumn(name="season_id", referencedColumnName="id")
     */
    protected $season;
    
    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\FacilityBundle\Entity\Facility", inversedBy="week")
     * @ORM\JoinColumn(name="facility_id", referencedColumnName="id")
     */
    protected $facility;
    
    /**
     * @ORM\OneToMany(targetEntity="Period", mappedBy="week")
     */
    protected $periods;
    
    /**
     * @ORM\Column(type="date")
     */
    protected $start;
    
    /**
     * @ORM\Column(type="date")
     */
    protected $end;
    
    /**
     * @ORM\Column(type="boolean")
     */
    protected $special;

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @inheritdoc
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }   

    public function getSeason()
    {
        return $this->season;
    }

    /**
     * @inheritdoc
     */
    public function setSeason(\Volleyball\Bundle\EnrollmentBundle\Entity\Season $season)
    {
        $this->season = $season;

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
    public function setFacility(\Volleyball\Bundle\FacilityBundle\Entity\Facility $facility)
    {
        $this->facility = $facility;

        return $this;
    }

     /**
     * @inheritdoc
     */
    public function getPeriods()
    {
        return $this->periods;
    }

    /**
     * @inheritdoc
     */
    public function setPeriods(array $periods)
    {
        if (! $periods instanceof ArrayCollection) {
            $periods = new ArrayCollection($periods);
        }

        $this->periods = $periods;

        return $this;
    }

    /**
     * Has periods
     *
     * @return boolean
     */
    public function hasPeriods()
    {
        return !$this->periods->isEmpty();
    }

    /**
     * @inheritdoc
     */
    public function getPeriod($period)
    {
        return $this->periods->get($period);
    }

    /**
     * @inheritdoc
     */
    public function addPeriod(\Volleyball\Bundle\EnrollmentBundle\Entity\Period $period)
    {
        $this->periods->add($period);

        return $this;
    }

    /**
     * Remove an period
     *
     * @param Period|String $period period
     *
     * @return self
     */
    public function removePeriod($period)
    {
        $this->periods->remove($period);

        return $this;
    }

    /**
     * Get formatted date
     *
     * @param  string $format format
     * @return string
     */
    public function getFormattedStart($format = 'M/d/Y')
    {
        return date($format, $this->start->getTimestamp());
    }
    
    /**
     * @inheritdoc
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @inheritdoc
     */
    public function setStart(\DateTime $start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get formatted date
     *
     * @param  string $format format
     * @return string
     */
    public function getFormattedEnd($format = 'M/d/Y')
    {
        return date($format, $this->end->getTimestamp());
    }

    /**
     * @inheritdoc
     */
    public function getEnd()
    {
        return $this->end;
    }
    
    /**
     * @inheritdoc
     */
    public function setEnd(\DateTime $end)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function isSpecial($special = null)
    {
        if (null != $special) {
            $this->special = (bool)$special;

            return $this;
        }

        return $this->special;
    }
    
    /**
     * Set special
     *
     * @param boolean $special
     * @return Week
     */
    public function setSpecial($special)
    {
        $this->special = $special;

        return $this;
    }

    /**
     * Get special
     *
     * @return boolean
     */
    public function getSpecial()
    {
        return $this->special;
    }
}
