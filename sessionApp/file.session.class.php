<?php
class Storage_file{

    public function __construct(?string $cacheExpire = null, ?string $cacheLimiter = null)
    {
        if (session_status() === PHP_SESSION_NONE) {

            if ($cacheLimiter !== null) {
                session_cache_limiter($cacheLimiter);
            }

            if ($cacheExpire !== null) {
                session_cache_expire($cacheExpire);
            }

            session_start();
        }
    }


    // public function __construct()
    // {
        

    //   session_start();
        
    // }

    
    public function get($key)
    {
        if ($this->has($key)) {
            return $_SESSION[$key];
        }

        return null;
    }

   
    public function set( $key, $value)
    {
        $_SESSION[$key] = $value;
        return $this;
    }

    public function remove( $key)
    {
        if ($this->has($key)) {
            unset($_SESSION[$key]);
        }
    }

    public function clear()
    {
        session_unset();
    }

    public function has( $key)
    {
        return array_key_exists($key, $_SESSION);
    }

}