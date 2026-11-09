<?php

class View{
    //Attributs

    //Constructor

    //Getter and Setter

    //Method
    public function displayHeader():self{
        echo("
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Document</title>
        </head>
        <body>
            <header></header>
        ");
        return $this;
    }

    public function displayFooter():self{
        echo("
        <footer>
        </footer>    
        </body>
        </html>");
        return $this;
    }
}