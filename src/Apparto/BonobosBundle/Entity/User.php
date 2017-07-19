<?php
namespace Apparto\BonobosBundle\Entity;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="fos_user")
 *@ORM\Entity(repositoryClass="Apparto\BonobosBundle\Entity\UserRepository")

*/
class User extends BaseUser
{
 /**
 * @ORM\Id
 * @ORM\Column(type="integer")
 * @ORM\GeneratedValue(strategy="AUTO")
 */
 protected $id;
 
 /**
* @ORM\Column(type="string",nullable=true)
* 
*/
private $famille=null; 
 /**
* @ORM\Column(type="string",nullable=true)
* 
*/
private $race=null;
 /**
* @ORM\Column(type="string",nullable=true)
* 
*/
private $nouriture=null;
/**
* @ORM\Column(type="integer",nullable=true)
* 
*/
private $age=null; 
function getFamille() {
    return $this->famille;
}

function getRace() {
    return $this->race;
}

function getNouriture() {
    return $this->nouriture;
}

function getAge() {
    return $this->age;
}

function setFamille($famille) {
    $this->famille = $famille;
}

function setRace($race) {
    $this->race = $race;
}

function setNouriture($nouriture) {
    $this->nouriture = $nouriture;
}

function setAge($age) {
    $this->age = $age;
}
       /**

 * @ORM\ManyToMany(targetEntity="User", mappedBy="myFriends")
 **/
    private $friendsWithMe;
      /**
   
   * @ORM\ManyToMany(targetEntity="User", inversedBy="friendsWithMe")
 *@ORM\JoinTable(name="friends",
 * joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
 * inverseJoinColumns={@ORM\JoinColumn(name="friend_user_id", referencedColumnName="id")}
 * )
 **/
    private $myFriends;

 
 
 public function __construct()
 {
 parent::__construct();
 // your own logic
     $this->roles = array('ROLE_USER');
$this->friendsWithMe = new \Doctrine\Common\Collections\ArrayCollection();
        $this->myFriends = new \Doctrine\Common\Collections\ArrayCollection();

 }
 
 
 /**
    * Add amis
    *
    * @param \Apparto\BonobosBundle\Entity\User $amis
    * @return User
    */
   public function setAmis(User $amis)
   {
       $this->myFriends[] = $amis;
       
 
       return TRUE;
   }
   /**
    * Add amis
    *
    * @param \Apparto\BonobosBundle\Entity\User $amis
    * @return User
    */
   public function deleteAmis(User $amis)
   {
       $this->myFriends->removeElement($amis);
 
       return TRUE;
   }
   /**
    * test amis
    *
    * @param \Apparto\BonobosBundle\Entity\User $amis
    * @return boolean
    */
   public function isFriend(User $amis)
   {
      return $this->myFriends->contains($amis);
 
      
   }
 
 /**
    * Get amis
    *
    * @return \Doctrine\Common\Collections\Collection
    */
   public function getAmis()
   {
       return $this->myFriends;
   }
 
}
?>