<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TreeClass
 *
 * @author unknown
 */
require_once 'Item.php';

class Tree
{
    public $root;

    public function __construct($conn)  // конструктор
    {
        $this->create_tree($conn);
    }

    private function create_tree($conn)  // создает все дерево
    {
        $sql = 'SELECT id, name 
                FROM Tree
                WHERE parent_id IS NULL';  // селект корня дерева

        $row = $conn->query($sql)->fetch(PDO::FETCH_ASSOC);
        $this->root = new Item($row['name']);
        $this->create_children($conn, $row['id'], $this->root);
    }

    private function create_children($conn, $parent_id, $parent_item)  // создает потомков (рекурсия)
    {
        $sql = 'SELECT id, name
                FROM Tree
                WHERE parent_id = ' . $parent_id;   //ищем всех детей данного родителя
        foreach ($conn->query($sql) as $row) //for each children
        {
            $item = new Item($row['name']);
            $this->create_children($conn, $row['id'], $item); 
            array_push($parent_item->children_list, new Item($row['name']));
        }
    }
}
