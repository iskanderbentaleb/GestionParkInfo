<?php

namespace App\Controllers;

use App\Models;

class BaseController
{
    protected static $model;

    public static function getModel()
    {
        self::requireAuthenticated(); // Enforce authentication
        return static::$model;
    }

    public static function setModel($model)
    {
        self::requireAuthenticated(); // Enforce authentication
        static::$model = $model;
    }

    protected static function view($path, $data = [])
    {
        self::requireAuthenticated(); // Enforce authentication
        require $path;
        return $data;
    }

    protected static function withAlert($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    // Helper method to check if the user is authenticated
    protected static function requireAuthenticated()
    {
        

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    
        $skipAuthPages = [
            ['page' => 'login', 'action' => 'index'],

            ['page' => 'Forgotpassword', 'action' => 'index'],
            ['page' => 'Forgotpassword', 'action' => 'sendEmail'],
            
            ['page' => 'verifycode', 'action' => 'index'],  
            ['page' => 'verifycode', 'action' => 'CheckTheVirifyCode'],
            
            ['page' => 'NewPassword', 'action' => 'index'],
            ['page' => 'NewPassword', 'action' => 'ChangePassword'],
        ];
        
        foreach ($skipAuthPages as $page) {
            if (isset($_GET['page']) && $_GET['page'] === $page['page'] && isset($_GET['action']) && $_GET['action'] === $page['action']) {
                return; // Skip authentication check for the specified pages
            }
        }
        
        // Check if user is logged in and session is not expired
        if ( !isset($_SESSION['user']) && !is_null($_SESSION['user']) || !isset($_SESSION['last_activity']) || time() - $_SESSION['last_activity'] > 3600) {
            // Log out the user and redirect to login page
            session_unset();
            session_destroy();
            session_start();
            $_SESSION['errorr_message'] = 'La session a expiré. Veuillez vous reconnecter.';
            header('Location: index.php?page=login&action=index');
        }
    
        // Update last activity timestamp
        
    }
    
}

?>
