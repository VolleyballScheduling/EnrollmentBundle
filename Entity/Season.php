<?php
namespace Volleyball\Bundle\EnrollmentBundle\Entity;

use \Doctrine\ORM\Mapping as ORM;
use \Gedmo\Mapping\Annotation as Gedmo;
use \Symfony\Component\Validator\Constraints as Assert;

use Volleyball\Bundle\UtilityBundle\Traits\SluggableTrait;
use Volleyball\Bundle\UtilityBundle\Traits\TimestampableTrait;

/**
 * @ORM\Table(name="season")
 * @ORM\Entity(repositoryClass="Volleyball\Bundle\EnrollmentBundle\Repository\SeasonRepository")
 */
class Season implements \Volleyball\Component\Enrollment\Interfaces\SeasonInterface
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
     * @ORM\Column(type="string")
     * @Assert\Length(
     *      min = "1",
     *      max = "250",
     *      minMessage = "Name must be at least {{ limit }} characters length",
     *      maxMessage = "Name cannot be longer than {{ limit }} characters length"
     * )
     * @var string
     */
    protected $name;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $description;
    
    /**
     * Start
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    protected $start;
    
    /**
     * End
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    protected $end;
    
    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\FacilityBundle\Entity\Facility", inversedBy="season")
     * @ORM\JoinColumn(name="facility_id", referencedColumnName="id")
     */
    protected $facility;

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
}
