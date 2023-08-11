<?php

namespace App\Models\MySQL\CodeeasyGerenciadorDeLojas;

final class TokenModel 
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $token;
    /**
     * @var string
     */
    private $refresh_token;
    /**
     * @var string
     */
    private $expired_at;
    /**
     * @var int
     */
    private $usuarios_id;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of token
     * 
     * @return string
     */ 
    public function getToken() : string
    {
        return $this->token;
    }

    /**
     * Set the value of token
     *@param string
     * 
     * @return  self
     */ 
    public function setToken($token) : self
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get the value of refresh_token
     * 
     * @return string
     */ 
    public function getRefresh_token() : string
    {
        return $this->refresh_token;
    }

    /**
     * Set the value of refresh_token
     *@param string
     * 
     * @return  self
     */ 
    public function setRefresh_token($refresh_token) : self
    {
        $this->refresh_token = $refresh_token;

        return $this;
    }

    /**
     * Get the value of expired_at
     * 
     * @return string
     */ 
    public function getExpired_at() : string
    {
        return $this->expired_at;
    }

    /**
     * Set the value of expired_at
     *@param string
     * 
     * @return  self
     */ 
    public function setExpired_at($expired_at) : self
    {
        $this->expired_at = $expired_at;

        return $this;
    }

    /**
     * Get the value of usuarios_id
     * 
     * @return int
     */ 
    public function getUsuarios_id() : int
    {
        return $this->usuarios_id;
    }

    /**
     * Set the value of usuarios_id
     *@param int
     * 
     * @return  self
     */ 
    public function setUsuarios_id($usuarios_id) : self
    {
        $this->usuarios_id = $usuarios_id;

        return $this;
    }
}