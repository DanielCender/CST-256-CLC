<?php

/**
 * CLC 6
 * JobPostingModel 1
 * Authors: Dylan Dorn, Daniel Cender, Nathaniel Kumar, Ray Omoregie
 * 2-7-2020
 * Model class containing data necessary to update user records
 *
 */
namespace App\Models;

use JsonSerializable;

class JobPostingModel implements JsonSerializable
{

    // variables
    private $id;
    private $name;
    private $description;
    private $institution;
		private $idealStartDate;
    private $type;
    private $author;

    // constructor
    function __construct($id, $name, $description, $institution, $idealStartDate, $type, $author)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->institution = $institution;
        $this->idealStartDate = $idealStartDate;
        $this->type = $type;
        $this->author = $author;
    }

    // getters and setters

    /**
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
		}

    /**
     *
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     *
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     *
     * @return mixed
     */
    public function getInstitution()
    {
        return $this->institution;
    }

    /**
     * @return mixed
     */
    public function getType() {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getIdealStartDate() {
        return $this->idealStartDate;
    }

    /**
     *
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     *
     * @param mixed $institution
     */
    public function setInstitution($institution)
    {
        $this->institution = $institution;
    }

    /**
     * @param mixed $idealStartDate
     */
    public function setIdealStartDate($idealStartDate) {
        $this->idealStartDate = $idealStartDate;
    }

    /**
     * @param boolean $type
     */
    public function setType($type) {
        $this->type = $type;
    }

    /**
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     *
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


    /**
     *
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     *
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }


    public function jsonSerialize() {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'institution' => $this->institution,
            'idealStartDate' => $this->idealStartDate,
            'type' => $this->type,
            'author' => $this->author
        ];
    }
}
