<?php
require 'config/connection.php';
require 'css/anime.css';
    class Anime extends Connection{
    
        public static function recommendAnime(){
            $connection = new Connection();
            
            $stmt = $connection->dbc->prepare("SELECT title,rating,resume FROM anime ORDER BY id DESC LIMIT 6");
            while ($row = $stmt-fetch()){
                $stmt->execute();
                
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                // checker om der er data i databasen
                if (count($data) > 0){
                    $anime = "";
    
                    // køre igennem dataen og lave nyheds html
                    foreach($data as $row){
                        $anime .= '<div class="anime">'; 
                            $anime .= '<h3>'. $row['title']. '</h3>';
                            $anime .= nl2br($row['resume']);
                            $anime .= $row['rating'];
                        $anime .= '</div>';
                        $anime .= '<br>'; 
                        return $anime;
                    }
                }
            }
        }
    }