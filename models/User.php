<?php
namespace models;

class User {
    
    private $id;
    private $name;
    private $firstName;
    private $email;
    private $password;
    private $role;
    private $createdAt;
    private $updatedAt;
    
    /**
     * @return string $this->id
     */
    public function getId(): string
    {
        return $this->id;
    }
     /**
     * @params string $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    /**
     * @return string $this->name
     */
    public function getName(): string
    {
        return $this->name;
    }
     /**
     * @params string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    /**
     * @return string $this->firstName
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }
     /**
     * @params string $name string
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }
    
    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }
    
     /**
     * @param $email string
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
    /**
     * @return string $this->password
     */
    public function getPassword(): string
    {
        return $this->password;
    }
     /**
     * @params string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
    /**
     * @return string $this->role
     */
    public function getRole(): ?string
    {
        return $this->role;
    }
     /**
     * @params string $role
     */
    public function setRole(string $role): void
    {
        $this->role = $role;
    }
    /**
     * @return date $this->createdAt
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }
     /**
     * @params date $createdAt
     */
    public function setCreatedAt(string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }
    /**
     * @return date $this->updatedAt
     */
    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
    }
     /**
     * @params date $updatedAt
     */
    public function setUpdatedAt(string $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
    /**
     * params array $data
     */
    public function setUserByData(array $data): void
    {
        $this->setId($data['id']);
        $this->setName($data['name']);
        $this->setFirstName($data['first_name']);
        $this->setEmail($data['email']);
        $this->setPassword($data['password']);
        $this->setRole($data['role']);
        $this->setCreatedAt($data['dateCr']);
        $this->setUpdatedAt($data['dateUp']);
    }
    public function getUserByData(): ?User
    {
        return $this->User;
    }
}