<?php
/**
 * Created by PhpStorm.
 * User: Semir
 * Date: 10.12.2017
 * Time: 22:05
 */

    class Books
    {
        private $connect;

        public function __construct($dbConnect)
        {
            $this->connect = $dbConnect;
        }

        public function insertBook($bName, $bWriter){
            $query = "INSERT INTO books(book_name, book_writer) VALUES ('$bName','$bWriter')";
            $desc = "";

            if (!$result = mysqli_query($this->connect, $query)){
                $desc = "Error: " . mysqli_error($this->connect);
            }
                return $desc;
        }

        public function deleteBook($bName){
            $delete = "DELETE FROM books WHERE book_name = '$bName'";
            $desc = "Book: ".$bName." removed";

            if (!$result = mysqli_query($this->connect, $delete)){
                $desc = "Error: " . mysqli_error($this->connect);
            }
            return $desc;
        }

        public function selectAll(){
            $query =  "SELECT book_name, book_writer, user_id FROM books";

            if (!$result = mysqli_query($this->connect, $query)){
                $desc = "Error: " . mysqli_error($this->connect);
                return $desc;
            }
            return $result;
        }

        public function reserveBook($user, $bName){
            $query = "UPDATE books SET user_id = $user WHERE book_name = '$bName'";

            if (!$result = mysqli_query($this->connect, $query)){
                $desc = "Error: " . mysqli_error($this->connect);
                return $desc;
            }
            return $result;

        }

        public function selectBookByUser($user){
            $query =  "SELECT id, book_name FROM books WHERE user_id = $user";

            if (!$result = mysqli_query($this->connect, $query)){
                $desc = "Error: " . mysqli_error($this->connect);
                return $desc;
            }
            return $result;
        }


    }