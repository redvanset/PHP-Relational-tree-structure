<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TreeItem
 *
 * @author unknown
 */
class Item
{
    public $name;
    public $children_list;

    function __construct($name, $children_list = array()) 
    {
        $this->name = $name;
        $this->children_list = $children_list;
    }
}
