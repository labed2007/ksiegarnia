<?php
/**
 * Created by PhpStorm.
 * User: kinga
 * Date: 17.07.15
 * Time: 12:04
 */

class config {
    private static $configuration;
    private static $mysqlConnection;
    /**
     * @return SimpleXMLElement
     */
    public function getConfiguration()
    {
        return self::$configuration;
    }

    /**
     * @param SimpleXMLElement $configuration
     */
    public function setConfiguration($configuration)
    {
        self::$configuration = $configuration;
    }

    /**
     * @return mixed
     */
    public static function getMysqlConnection()
    {
        return self::$mysqlConnection;

    }

    /**
     * @param mixed $mysqlConnection
     */
    public static function setMysqlConnection($mysqlConnection)
    {
        self::$mysqlConnection = $mysqlConnection;
    }


    function __construct()
    {
        $this->setConfiguration(simplexml_load_file('config.xml'));

        self::$mysqlConnection = mysqli_connect(
            $this->getConfiguration()->database->host,
            $this->getConfiguration()->database->login,
            $this->getConfiguration()->database->password,
            $this->getConfiguration()->database->dbname
            );
    }

}