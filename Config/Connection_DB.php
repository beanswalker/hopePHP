<?php
require_once './ConnectData.php';
/*
 * * * * * * * * * * * * * * * * * * * * * * * * * *
 * * Copyleft(C)  2019 GNU General Public License V3 * * 
 * * *         Made with love in Colombia!!!           * * *
 * *         @Author:... ==>BEANSWALKER<==           * *
 * * * * * * * * * * * * * * * * * * * * * * * * * *
  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Description of Connection_DB
 *
 * @author beanswalker
 */
class Connection_DB extends ConnectData
{
    //Los aributos privados estáticos solo serán accedidos desde dentro de la clase
    static private $connex;
    static private $responseSQL;
    static private $response_error;
    
    /**
     * Connect database using the constructor
     * Conectarse a la BD mediante el constructor
     */
    function __construct()
    {
        self::$connex = new mysqli(parent::server_system, parent::user_system, parent::user_pass, parent::db_system);
        mysqli_query(self::$connex, 'SET NAMES "'.parent::db_charset.'"');
        if(self::$connex->connect_error)
        {
            // CODIGO PENDIENTE PARA MEJORAR !!!!

                        echo "
                      <br>
                      <center><img src='../Files/images/ghost.png'  width='160' height='280' alt='error1'/></center>
                                  ";
                        die("<center>falló la conexión en:..<br><b><i> ". self::$connex->connect_error."</i></b></center>");
                        //exit();
        }
    }
    
        /**
         * SQL procedure that returns a complete content
         * Procedimiento SQL que retorna un contenido Completo
         * @param string $code_sql
         * @return String
         */
        protected function complete_query($code_sql)
        {
            $query = self::$connex->query($code_sql);
            self::$responseSQL = $query;
        }
        
        /**
         *Procedure to capture a simple SQL content or the ID of the last record
         * Procedimiento para capturar un contenido SQL simple o el ID del último registro
         * @param string $code_sql
         * @param boolean $id
         */
        protected function simple_query($code_sql)
        {
            // ***********************************************
        }
    
}
//Ensayo de la conexión enviando un parametro erróneo:..:
//   $conectar = new Connection_DB();


