<?php
// src/Study/BlogBundle/Entity/Blog.php
namespace Study\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="blog")
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
}
