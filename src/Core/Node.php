<?php

namespace Hasnayeen\Fluent\Core;

use Hasnayeen\Fluent\Core\Request;

abstract class Node
{
    protected $token;
    protected $fields;

    public function setToken($token)
    {
        $this->token = $token;
    }

    public function get()
    {
        $query = ($this->fields) ? ['access_token' => $this->token, 'fields' => $this->fields] : ['access_token' => $this->token];

        return Request::get(null, $this->endpoint, ['query' => $query]);
    }

    public function with(array $fields)
    {
        $fields = implode(",", $fields);
        $this->fields = $fields;

        return $this;
    }
}