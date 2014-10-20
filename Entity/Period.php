<?php
namespace Volleyball\Bundle\EnrollmentBundle\Entity;

use \Doctrine\ORM\Mapping as ORM;
use \Gedmo\Mapping\Annotation as Gedmo;
use \Symfony\Component\Validator\Constraints as Assert;

use \Volleyball\Bundle\UtilityBundle\Traits\SluggableTrait;
use \Volleyball\Bundle\UtilityBundle\Traits\TimestampableTrait;

/**
 * @ORM\Entity(repositoryClass="Volleyball\Bundle\EnrollmentBundle\Repository\PeriodRepository")
 * @ORM\Table(name="period")
 */
class Period implements \Volleyball\Component\Enrollment\Interfaces\PeriodInterface
{
    use SluggableTrait;
    use TimestampableTrait;

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
     * Description
     * @var  string description
     * @ORM\Column(name="description", type="string")
     */
    protected $description = '';
    
    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\EnrollmentBundle\Entity\Week", inversedBy="period")
     * @ORM\JoinColumn(name="week_id", referencedColumnName="id")
     */
    protected $week;
    
    /**
     * @ORM\Column(type="time")
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

    /**
     * @inheritdoc
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * @inheritdoc
     */
    public function setDescription($description)
    {
        $this->description = $description;
        
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
    public function setWeek(Week $week)
    {
        $this->week = $week;

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
     * Is special
     *
     * @param boolean $special special
     *
     * @return Period
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
     * @return Period
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
