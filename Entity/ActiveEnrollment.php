<?php
namespace Volleyball\Bundle\EnrollmentBundle\Entity;

use \Doctrine\ORM\Mapping as ORM;
use \Gedmo\Mapping\Annotation as Gedmo;
use \Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="active_enrollment")
 */
class ActiveEnrollment
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    

    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\OrganizationBundle\Entity\Organization", inversedBy="active_enrollment")
     * @ORM\JoinColumn(name="organization_id", referencedColumnName="id")
     */
    protected $organization = null;
    
    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\OrganizationBundle\Entity\Council", inversedBy="active_enrollment")
     * @ORM\JoinColumn(name="council_id", referencedColumnName="id")
     */
    protected $council = null;
    
    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\OrganizationBundle\Entity\Region", inversedBy="active_enrollment")
     * @ORM\JoinColumn(name="region_id", referencedColumnName="id")
     */
    protected $region = null;
    
    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\PasselBundle\Entity\Passel", inversedBy="active_enrollment")
     * @ORM\JoinColumn(name="passel_id", referencedColumnName="id")
     */
    protected $passel;
    
    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\PasselBundle\Entity\Leader", inversedBy="active_enrollment")
     * @ORM\JoinColumn(name="leader_id", referencedColumnName="id")
     */
    protected $leader = null;
    
    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\FacilityBundle\Entity\Facility", inversedBy="active_enrollment")
     * @ORM\JoinColumn(name="facility_id", referencedColumnName="id")
     */
    protected $facility;
    
    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\PasselBundle\Entity\Attendee", inversedBy="active_enrollment")
     * @ORM\JoinColumn(name="attendee_id", referencedColumnName="id")
     */
    protected $attendee = null;
    
    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\EnrollmentBundle\Entity\Season", inversedBy="active_enrollment")
     * @ORM\JoinColumn(name="season_id", referencedColumnName="id")
     */
    protected $season;
    
    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\EnrollmentBundle\Entity\Week", inversedBy="active_enrollment")
     * @ORM\JoinColumn(name="week_id", referencedColumnName="id")
     */
    protected $week;
    
    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\UserBundle\Entity\User", inversedBy="active_enrollment")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * Get id
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get Organization
     * @return Volleyball\Bundle\OrganizationBundle\Entity\Organization
     */
    public function getOrganization()
    {
        return $this->organization;
    }

    /**
     * Set Organization
     * @param \Volleyball\Bundle\OrganizatonBundle\Entity\Organization $organization
     * @return \Volleyball\Bundle\EnrollmentBundle\Entity\ActiveEnrollment
     */
    public function setOrganization(\Volleyball\Bundle\OrganizationBundle\Entity\Organization $organization)
    {
        $this->organization = $organization;

        return $this;
    }   

    /**
     * Get Council
     * @return Volleyball\Bundle\OrganizationBundle\Entity\Council
     */
    public function getCouncil()
    {
        return $this->council;
    }

    /**
     * Set Council
     * @param \Volleyball\Bundle\OrganizationBundle\Entity\Council $council
     * @return \Volleyball\Bundle\EnrollmentBundle\Entity\ActiveEnrollment
     */
    public function setCouncil(\Volleyball\Bundle\OrganizationBundle\Entity\Council $council)
    {
        $this->council = $council;

        return $this;
    }

    /**
     * Get Region
     * @return Volleyball\Bundle\OrganizationBundle\Entity\Region
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set Region
     * @param \Volleyball\Bundle\OrganizationBundle\Entity\Region $region
     * @return \Volleyball\Bundle\EnrollmentBundle\Entity\ActiveEnrollment
     */
    public function setRegion(\Volleyball\Bundle\OrganizationBundle\Entity\Region $region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get Passel
     * @return Volleyball\Bundle\PasselBundle\Entity\Passel
     */
    public function getPassel()
    {
        return $this->passel;
    }

    /**
     * Set Passel
     * @param \Volleyball\Bundle\PasselBundle\Entity\Passel $passel
     * @return \Volleyball\Bundle\EnrollmentBundle\Entity\ActiveEnrollment
     */
    public function setPassel(\Volleyball\Bundle\PasselBundle\Entity\Passel $passel)
    {
        $this->passel = $passel;

        return $this;
    }

    /**
     * Get Attendee
     * @return Volleyball\Bundle\PasselBundle\Entity\Attendee
     */
    public function getAttendee()
    {
        return $this->attendee;
    }

    /**
     * Set Attendee
     * @param \Volleyball\Bundle\PasselBundle\Entity\Attendee $attendee
     * @return \Volleyball\Bundle\EnrollmentBundle\Entity\ActiveEnrollment
     */
    public function setAttendee(\Volleyball\Bundle\PasselBundle\Entity\Attendee $attendee)
    {
        $this->attendee = $attendee;

        return $this;
    }

    /**
     * Get Leader
     * @return Volleyball\Bundle\PasselBundle\Entity\Leader
     */
    public function getLeader()
    {
        return $this->leader;
    }

    /**
     * Set Leader
     * @param \Volleyball\Bundle\PasselBundle\Entity\Leader $leader
     * @return \Volleyball\Bundle\EnrollmentBundle\Entity\ActiveEnrollment
     */
    public function setLeader(\Volleyball\Bundle\PasselBundle\Entity\Leader $leader)
    {
        $this->leader = $leader;

        return $this;
    }

    /**
     * Get Facility
     * @return Volleyball\Bundle\FacilityBundle\Entity\Facility
     */
    public function getFacility()
    {
        return $this->facility;
    }

    /**
     * Set Facility
     * @param \Volleyball\Bundle\FacilityBundle\Entity\Facility $facility
     * @return \Volleyball\Bundle\EnrollmentBundle\Entity\ActiveEnrollment
     */
    public function setFacility(\Volleyball\Bundle\FacilityBundle\Entity\Facility $facility)
    {
        $this->facility = $facility;

        return $this;
    }

    /**
     * Get Season
     * @return Volleyball\Bundle\EnrollmentBundle\Entity\Season
     */
    public function getSeason()
    {
        return $this->season;
    }

    /**
     * Set Season
     * @param \Volleyball\Bundle\EnrollmentBundle\Entity\Season $season
     * @return \Volleyball\Bundle\EnrollmentBundle\Entity\ActiveEnrollment
     */
    public function setSeason(\Volleyball\Bundle\EnrollmentBundle\Entity\Season $season)
    {
        $this->season = $season;

        return $this;
    }

    /**
     * Get Week
     * @return Volleyball\Bundle\EnrollmentBundle\Entity\Week
     */
    public function getWeek()
    {
        return $this->week;
    }

    /**
     * Set Week
     * @param \Volleyball\Bundle\EnrollmentBundle\Entity\Week $week
     * @return \Volleyball\Bundle\EnrollmentBundle\Entity\ActiveEnrollment
     */
    public function setWeek(\Volleyball\Bundle\EnrollmentBundle\Entity\Week $week)
    {
        $this->week = $week;

        return $this;
    }

    /**
     * Get User
     * @return Volleyball\Bundle\EnrollmentBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set User
     * @param \Volleyball\Bundle\EnrollmentBundle\Entity\User $user
     * @return \Volleyball\Bundle\EnrollmentBundle\Entity\ActiveEnrollment
     */
    public function setUser(\Volleyball\Bundle\UserBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

}
