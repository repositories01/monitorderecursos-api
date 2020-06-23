<?php
namespace App\Model;

use Config\Db;

class Model{

    public static function all()
    {
       $obj = new static;
              $db = Db::conexao();
       $select = "SELECT * FROM " . $obj->table;
       $stmt = $db->query($select);
       $result = $stmt->fetchAll();

       return $result;
    
       
    }

    static public function find(int $id)
    {
      $obj = new static;
      $conn = Db::conexao();
      $select = "select * from ".$obj->table." where ".$obj->primary_key."=:id LIMIT 1";
      $stmt = $conn->prepare($select);
      $stmt->bindValue(':id',$id);
      $stmt->execute();
      $objAux = $stmt->fetch(\PDO::FETCH_OBJ);
      foreach ($objAux as $key => $value) {
        $obj->{$key} = $value;
      }
      return  $obj;
    }
         
         public function save()
         { 
         $atributos = get_object_vars($this);
         unset($atributos['table']);
         unset($atributos['primary_key']);
          
         if(isset($this->{$this->primary_key})){
             $coluna = "";
             $aux = true;
             unset($atributos[$this->primary_key]);
     
           foreach ($atributos as $key => $value) {
             if($aux){
               $aux = false;
               $coluna .= "$key = :$key";
             }else{
               $coluna .= ", $key = :$key";
             }
           }
           $update = "UPDATE ".$this->table." SET ".$coluna." WHERE ".$this->primary_key."=:id;";
           $conn = Db::conexao();
           $stmt = $conn->prepare($update);
           foreach ($atributos as $key => $value) {
             $stmt->bindValue(':'.$key,$value);
           }
           $stmt->bindValue(':id',$this->{$this->primary_key});
           $stmt->execute();
           return $this;
     
         }
     

          //cria registros
         $col = "(";
         $val = "(";
         $aux = true;
         foreach ($atributos as $key => $value) {
           if($aux){
             $aux = false;
             $col .= "$key";
             $val .= ":$key";
           }else{
             $col .= ",$key";
             $val .= ",:$key";
           }
         }
         $col .= ")";
         $val .= ")";
     
         $insert = "insert into ".$this->table." ".$col." values ".$val;
     
         $conn = Db::conexao();
         $stmt = $conn->prepare($insert);
         foreach ($atributos as $key => $value) {
          $stmt->bindValue(':'.$key, $value);

         }
     
         $stmt->execute();
        return $conn->lastInsertId();
      
      }

      public function delete(){

         $conn = Db::conexao();
         $delete = "DELETE FROM ".$this->table." WHERE ".$this->primary_key."=:id;";
         $stmt = $conn->prepare($delete);
         $stmt->bindValue(':id',$this->{$this->primary_key});
         return $stmt->execute();

      }
    }
  
    
 



