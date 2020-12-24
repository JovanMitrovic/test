<?php

class productModel extends database {

    /////////////////////////////////////////////////////////////////////////////////////

    public function insertProduct($arrProduct)
    {
        if ($this->Query('INSERT INTO products (name, description, image) VALUES (?, ?, ?)',
         $arrProduct))
        {
            return true;
        }
    }

    /////////////////////////////////////////////////////////////////////////////////////

    public function getProducts($boolSqlLimit = false)
    {
        $strSqlLimit = ($boolSqlLimit) ? 'LIMIT 9;' : ';';

        $sql = 'SELECT * FROM products ' . $strSqlLimit;
        
        if ($this->Query($sql))
        {
            $arrData = $this->fetchAll();

            return $arrData;
        }
    }

    /////////////////////////////////////////////////////////////////////////////////////

    public function editProduct($intProductID)
    {
        if ($this->Query('SELECT * FROM products WHERE id = ?', [$intProductID]))
        {
            $arrData = $this->fetch();

            return $arrData;
        }
    }

    /////////////////////////////////////////////////////////////////////////////////////

    public function updateProduct($arrProducts)
    {
        if ($this->Query('UPDATE products SET name = ?, description = ?, image = ? WHERE id = ?', $arrProducts))
        {
            return true;
        }
    }

    /////////////////////////////////////////////////////////////////////////////////////

    public function deleteProduct($intProductID)
    {
        if ($this->Query('DELETE FROM products WHERE id = ?', [$intProductID]))
        {
            return true;
        }
    }

    /////////////////////////////////////////////////////////////////////////////////////

    public function insertComment($arrCommentData)
    {
        if ($this->Query('INSERT INTO comments (message, comment_sender_name, comment_sender_email, time) VALUES (?, ?, ?, ?)',
         $arrCommentData))
        {
            return true;
        }
    }

    /////////////////////////////////////////////////////////////////////////////////////

    public function getAllComments()
    {
        if ($this->Query('SELECT * FROM comments'))
        {
            $arrData = $this->fetchAll();

            return $arrData;
        }
    }

    /////////////////////////////////////////////////////////////////////////////////////

    public function getCommentsList()
    {
        if ($this->Query('SELECT * FROM comments WHERE approve = "y"'))
        {
            $arrData = $this->fetchAll();

            return $arrData;
        }
    }

    /////////////////////////////////////////////////////////////////////////////////////

    public function updateCommentApproval($arrData)
    {
        if ($this->Query('UPDATE comments SET approve = ? WHERE id = ?', $arrData))
        {
            return true;
        }
    }

    /////////////////////////////////////////////////////////////////////////////////////
}

?>