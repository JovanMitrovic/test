<?php

class productController extends framework {

    /////////////////////////////////////////////////////////////////////////////////////

    public function __construct()
    {
        $this->helper('link');
        $this->productModel = $this->model('productModel');
    }

    /////////////////////////////////////////////////////////////////////////////////////

    public function index()
    {
        if (!$this->getSession('userID'))
        {
            $arrData['products'] = $this->productModel->getProducts(true);
            $arrData['comments'] = $this->productModel->getCommentsList();
            
            $arrData['commentsCount'] = count($arrData['comments']);

            $this->view('product', $arrData);
        }
        else
        {
            $arrData = $this->productModel->getProducts();

            $this->view('productAdminView', $arrData);
        }
        
    }

    /////////////////////////////////////////////////////////////////////////////////////

    public function addProductForm()
    {
        $this->view('addProduct');
    }

    /////////////////////////////////////////////////////////////////////////////////////

    public function addProduct()
    {

        $arrFileImage = isset($_FILES['image']['name']) ? $_FILES['image']['name'] : '';

        $arrData = [
            'name'              => $this->input('name'),
            'description'       => $this->input('description'),
            'image'             => $arrFileImage,
            'nameError'         => '',
            'descriptionError'  => '',
            'imageError'        => ''
        ];
        
        if (empty($arrData['name']))
        {
            $arrData['nameError'] = 'Name is required';
        }
        if (empty($arrData['description']))
        {
            $arrData['descriptionError'] = 'Description is required';
        }
        if (empty($arrData['image']))
        {
            $arrData['imageError'] = 'Image is required';
        }

        if (empty($arrData['nameError']) && empty($arrData['descriptionError']) 
            && empty($arrData['imageError']))
        {
            $arrImageData = $this->fileUpload($_FILES['image']);
            $arrData['imageError'] = $arrImageData['error_message'];

            if (empty($arrImageData['error_message']))
            {
                $arrDataForm = [$arrData['name'], $arrData['description'], $arrImageData['fileName']];
                if ($this->productModel->insertProduct($arrDataForm))
                {
                    $this->setFlash('productAdded', 'Your product has been added successfuly');
                    $this->redirect('productController/index');
                }
            }
        }
        
        $this->view('addProduct', $arrData);
        
    }

    /////////////////////////////////////////////////////////////////////////////////////
    
    public function updateProduct()
    {
        $intProductID = $this->input('productID');
        
        $arrFileImage = isset($_FILES['image']['name']) ? $_FILES['image']['name'] : '';

        $arrEditProduct = $this->productModel->editProduct($intProductID);
        
        $arrProductData = [
            'name'              => $this->input('name'),
            'description'       => $this->input('description'),
            'image'             => $arrFileImage,
            'data'              => $arrEditProduct,
            'productID'         => $intProductID,
            'nameError'         => '',
            'descriptionError'  => '',
            'imageError'        => ''
        ];

        if (empty($arrProductData['name']))
        {
            $arrProductData['nameError'] = 'Name is required';
        }
        if (empty($arrProductData['description']))
        {
            $arrProductData['descriptionError'] = 'Description is required';
        }
        if (empty($arrProductData['image']) && (empty($arrEditProduct->image)))
        {
            $arrProductData['imageError'] = 'Image is required';
        }

        if (empty($arrProductData['nameError']) && empty($arrProductData['descriptionError']) 
            && empty($arrProductData['imageError']))
        {
            if (!empty($arrProductData['image']))
            {
                $arrImageData = $this->fileUpload($_FILES['image']);
                $strImage = $arrProductData['image'];
            }
            else
            {
                $strImage = $arrEditProduct->image;
            }

            $arrUpdateData = [$arrProductData['name'], $arrProductData['description'], $strImage, $arrProductData['productID']];

            if ($this->productModel->updateProduct($arrUpdateData))
            {
                $this->setFlash('productUpdate', 'Your product record has been updated successfully');
                $this->redirect('productController/');
            }
        }
        else
        {
            $this->view('editProduct', $arrProductData);
        }
    }

    /////////////////////////////////////////////////////////////////////////////////////

    public function editProduct($intProductID)
    {
        $arrProductEdit = $this->productModel->editProduct($intProductID);

        $arrData = [
            'data'                  => $arrProductEdit,
            'nameError'             => '',
            'descriptionError'      => '',
            'imageError'            => ''
        ];
        
        $this->view('editProduct', $arrData);
    }

    /////////////////////////////////////////////////////////////////////////////////////

    public function deleteProduct($intProductID)
    {
        if ($this->productModel->deleteProduct($intProductID))
        {
            $this->setFlash('productDelete', 'Your product has been deleted successfully');
            $this->redirect('productController/index');
        }
    }

    /////////////////////////////////////////////////////////////////////////////////////

    public function addComment()
    {
        $strSenderName = $this->input('senderName');
        $strSenderEmail = $this->input('senderEmail');
        $strCommentContent = $this->input('commentContent');

        $strErrorName = $strErrorEmail = $strErrorMessage = '';
        $strSuccessMessage = '<label class="text-success">Comment Added</label>';

        if (empty($strSenderName) || ($strSenderName == ''))
        {
            $strErrorName .= '<p class="text-danger">Name is required</p>';
        }
        if (empty($strSenderEmail) || ($strSenderEmail == ''))
        {
            $strErrorEmail .= '<p class="text-danger">Email is required</p>';
        }
        if (empty($strCommentContent) || ($strCommentContent == ''))
        {
            $strErrorMessage .= '<p class="text-danger">Comment is required</p>';
        }

        if (empty($strErrorName) && empty($strErrorName) && empty($strErrorName))
        {
            $arrCommentData = [$strCommentContent, $strSenderName, $strSenderEmail, time()];

            $this->productModel->insertComment($arrCommentData);
        }

        $arrData = array(
            'errorName'     => $strErrorName,
            'errorEmail'    => $strErrorEmail,
            'errorMessage'  => $strErrorMessage,
            'successMessage'=> $strSuccessMessage
        );

        echo json_encode($arrData);
    }

    /////////////////////////////////////////////////////////////////////////////////////
    
    public function commentsApprovalList()
    {
        if ($this->getSession('userID'))
        {
            $arrComments = $this->productModel->getAllComments();

            $this->view('commentsAdminView', $arrComments);
        }
    }

    /////////////////////////////////////////////////////////////////////////////////////

    public function commentApprove()
    {
        $intCommentID = $this->input('commentID');
        $strApproval = $this->input('approvalValue');

        if (isset($intCommentID) && isset($strApproval))
        {
            $arrData = [$strApproval, $intCommentID];
            
            $this->productModel->updateCommentApproval($arrData);
        }
    }

    /////////////////////////////////////////////////////////////////////////////////////

    public function logout()
    {
        $this->destroy();

        $this->redirect('productController/index');
    }

    /////////////////////////////////////////////////////////////////////////////////////
}

?>