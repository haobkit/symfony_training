<?php
// src/Study/BlogBundle/Entity/Blog.php
namespace Study\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="post")
 */

class Post
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	/**
	 * @ORM\ManyToOne(targetEntity="Blog", inversedBy="posts")
	 * @ORM\JoinColumn(name="blog", referencedColumnName="id")
	 */
	protected $blog;
	
	/**
	 * @ORM\Column(type="string", length=100)
	 *
	 */
	protected $title;
	
	/**
	 * @ORM\Column(type="text")
	 * 
	 */
	protected $shortDescription;
	
	/**
	 * @ORM\Column(type="text")
	 * 
	 */
	protected $fullDescription;
	
	/**
	 * @ORM\Column(type="integer")
	 * 
	 */
	protected $viewed;
	
	/**
	 * @ORM\Column(type="string", length=100)
	 * 
	 */
	protected $author;
	
	/**
	 *
	 * @ORM\Column(type="date")
	 */
	protected $createdDate;
	
	/**
	 *
	 * @ORM\Column(type="date")
	 */
	protected $updatedDate;
	
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
	 * Get viewed
	 */
	public function getViewed()
	{
		return $this->viewed;
	}
	
	/**
	 * Set viewed
	 */
	public function setViewed($viewed = 0)
	{
		$this->viewed = $viewed;
	}

	/**
	 * Get author
	 */
	public function getAuthor()
	{
		return $this->author;
	}
	
	/**
	 * Set author
	 */
	public function setAuthor($author)
	{
		$this->author = $author;
	}


    /**
     * Set shortDescription
     *
     * @param string $shortDescription
     * @return Post
     */
    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;
    
        return $this;
    }
	
    /**
     * Get shortDescription
     *
     * @return string 
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    /**
     * Set fullDescription
     *
     * @param string $fullDescription
     * @return Post
     */
    public function setFullDescription($fullDescription)
    {
        $this->fullDescription = $fullDescription;
    
        return $this;
    }

    /**
     * Get fullDescription
     *
     * @return string 
     */
    public function getFullDescription()
    {
        return $this->fullDescription;
    }

    /**
     * Set blog
     *
     * @param \Study\BlogBundle\Entity\Blog $blog
     * @return Post
     */
    public function setBlog(\Study\BlogBundle\Entity\Blog $blog = null)
    {
        $this->blog = $blog;
    
        return $this;
    }

    /**
     * Get blog
     *
     * @return \Study\BlogBundle\Entity\Blog 
     */
    public function getBlog()
    {
        return $this->blog;
    }
}