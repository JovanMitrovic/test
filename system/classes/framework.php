<?php 

class framework {

    /////////////////////////////////////////////////////////////////////////////////////

    public function view($viewName, $data = [])
    {
        if (file_exists("../app/views/" . $viewName . ".php"))
        {
            require_once "../app/views/$viewName.php";
        }
        else 
        {
            echo "$viewName.php file not found";
        }
    }

    /////////////////////////////////////////////////////////////////////////////////////

    public function model($modelName)
    {
        if (file_exists("../app/models/" . $modelName . ".php"))
        {
            require_once "../app/models/$modelName.php";

            return new $modelName;
        }
        else
        {
            echo "$modelName.php file not found";
        }
    }

    public function input($inputName)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'post')
        {
            return trim(strip_tags($_POST[$inputName]));
        }
        elseif ($_SERVER['REQUEST_METHOD'] == 'GET' || $_SERVER['REQUEST_METHOD'] == 'get') 
        {
            return trim(strip_tags($_GET[$inputName]));
        }
    }

    /////////////////////////////////////////////////////////////////////////////////////

    public function fileUpload($arrFile)
    {
        if (is_array($arrFile) && (count($arrFile) > 0))
        {
            $fileName    = $arrFile['name'];
            $fileTmpName = $arrFile['tmp_name'];
            $fileSize    = $arrFile['size'];
            $fileError   = $arrFile['error'];
            $fileType    = $arrFile['type'];

            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

            $allowed = array('jpg', 'jpeg', 'png');

            if (in_array($fileActualExt, $allowed))
            {
                if ($fileError === 0)
                {
                    if ($fileSize < 1000000)
                    {
                        $fileNameNew = $fileExt[0] . time() . '.' . $fileActualExt;
                        $fileDestination = 'assets/uploads/' . $fileNameNew;
                        move_uploaded_file($fileTmpName, $fileDestination);

                        $arrData['fileName'] = $fileNameNew;
                        return $arrData;
                    }
                    else
                    {
                        $arrData['error_message'] = 'Your file is too big!';
                        return $arrData;
                    }
                }
                else
                {
                    $arrData['error_message'] = 'There was an error uploading your file!';
                    return $arrData;
                }
            }
            else
            {
                $arrData['error_message'] = 'You cannot upload files of this type!';
                return $arrData;
            }
        }
    }

    /////////////////////////////////////////////////////////////////////////////////////

    public function helper($helperName)
    {
        if (file_exists("../system/helpers/" . $helperName . ".php"))
        {
            require_once "../system/helpers/" . $helperName . ".php";
        }
        else
        {
            echo 'helper $helperName.php file not found';
        }
    }

    /////////////////////////////////////////////////////////////////////////////////////

    // Set session
    public function setSession($sessionName, $sessionValue)
    {
        if (!empty($sessionName) && !empty($sessionValue))
        {
            $_SESSION[$sessionName] = $sessionValue;
        }
    }

    /////////////////////////////////////////////////////////////////////////////////////

    // Get session
    public function getSession($sessionName)
    {
        if (!empty($_SESSION[$sessionName]))
        {
            return $_SESSION[$sessionName];
        }
    }

    /////////////////////////////////////////////////////////////////////////////////////

    // Unset session
    public function unsetSession($sessionName)
    {
        if (!empty($sessionName))
        {
            unset($_SESSION[$sessionName]);
        }
    }

    /////////////////////////////////////////////////////////////////////////////////////

    // Destroy whole sessions
    public function destroy()
    {
        session_destroy();
    }

    /////////////////////////////////////////////////////////////////////////////////////

    // Set flash message
    public function setFlash($sessionName, $msg)
    {
        if (!empty($sessionName) && !empty($msg))
        {
            $_SESSION[$sessionName] = $msg;
        }
    }

    /////////////////////////////////////////////////////////////////////////////////////

    // Show flash message
    public function flash($sessionName, $className)
    {
        if (!empty($sessionName) && !empty($className) 
            && isset($_SESSION[$sessionName]))
        {
            $msg = $_SESSION[$sessionName];

            echo "<div class='" . $className . "' >" . $msg . "</div>";

            unset($_SESSION[$sessionName]);
        }
    }

    /////////////////////////////////////////////////////////////////////////////////////

    public function redirect($path)
    {
        header("location:" . BASEURL . "/" . $path);
    }

    /////////////////////////////////////////////////////////////////////////////////////
}

?>
