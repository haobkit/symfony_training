<?php
// src/Study/BlogBundle/Entity/Blog.php
namespace Study\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="Study\BlogBundle\Entity\BlogRepository")
 * @ORM\Table(name="blog")
 * @ORM\HasLifecycleCallbacks()
 */

class Blog
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="string", length=100)
	 *
	 */
	protected $title;
	
	/**
	 * @ORM\Column(type="text")
	 * 
	 */
	protected $description;
	
	/**
	 *
	 * @ORM\Column(name="created_date", type="datetime")
	 */
	protected $createdDate;
	
	/**
	 *
	 * @ORM\Column(name="updated_date", type="datetime")
	 */
	protected $updatedDate;
	
	// ...

    /**
     * @ORM\OneToMany(targetEntity="Post", mappedBy="blog")
     */
    protected $posts;
	
	/**
     * @ORM\Column(type="boolean")
     */
    protected $deleted;


    public function __construct()
    {
        $this->posts = new ArrayCollection();
    }
	
	/**
	 * Get id
	 */
	public function getId()
	{
		return $this->id;
	}
	
	/**
	 * Set id
	 * @param type $id
	 */
	public function setId($id)
	{
		$this->id = $id;
	}
	
	/**
	 * Get title
	 */
	public function getTitle()
	{
		return $this->title;
	}
	
	/**
	 * Set title
	 */
	public  function setTitle($title)
	{
		$this->title = $title;
	}
	
	/**
	 * Get description
	 */
	public function getDescription()
	{
		return $this->description;
	}
	
	/**
	 * Set description
	 */
	public function setDescription($description)
	{
		$this->description = $description;
	}
	
	/**
	 * Get cratedDate
	 */
	public function getCreatedDate()
	{
		return $this->createdDate;
	}
	
	/**
	 * Set createdDate
	 */
	public function setCreatedDate(\DateTime $createdDate = null)
	{
		$this->createdDate = $createdDate;
	}

	/**
	 * Get updatedDate
	 */
	public function getUpdatedDate()
	{
		return $this->updatedDate;
	}
	
	/**
	 * Set updatedDate
	 */
	public function setUpdatedDate(\DateTime $updatedDate = null)
	{
		$this->updatedDate = $updatedDate;
	}

    /**
     * Add posts
     *
     * @param \Study\BlogBundle\Entity\Post $posts
     * @return Blog
     */
    public function addPost(\Study\BlogBundle\Entity\Post $posts)
    {
        $this->posts[] = $posts;
    
        return $this;
    }

    /**
     * Remove posts
     *
     * @param \Study\BlogBundle\Entity\Post $posts
     */
    public function removePost(\Study\BlogBundle\Entity\Post $posts)
    {
        $this->posts->removeElement($posts);
    }

    /**
     * Get posts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPosts()
    {
        return $this->posts;
    }
	
	/**
	 * @ORM\PrePersist
	 */
	public function prePersist()
	{
        $this->deleted = false;
		$this->createdDate = new \DateTime('now');
		$this->updatedDate = new \DateTime('now');
	}
	
	/**
	 * @ORM\PreUpdate
	 */
	public function preUpdate()
	{
		$this->updatedDate = new \DateTime('now');
	}

    /**
     * Set deleted
     *
     * @param boolean $deleted
     * @return Blog
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
    
        return $this;
    }

    /**
     * Get deleted
     *
     * @return boolean 
     */
    public function getDeleted()
    {
        return $this->deleted;
    }
}