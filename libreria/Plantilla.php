<?php

class Plantilla
{

    static $instance = null;

    public static function aplicar()
    {
        if (self::$instance == null) {
            self::$instance = new Plantilla();
        }
    }

    public function __construct()
    {
        ?>

        <!DOCTYPE html>
        <html lang="es">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Torneo de la Fuerza</title>

            <style>
                /* General body styles */
                body {
                    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                    background-image: url('https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/7d643e90-7a9d-4997-8575-b8e2374ae8ba/dgqd1gq-4fa08161-a689-499a-9c1a-632511af3794.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcLzdkNjQzZTkwLTdhOWQtNDk5Ny04NTc1LWI4ZTIzNzRhZThiYVwvZGdxZDFncS00ZmEwODE2MS1hNjg5LTQ5OWEtOWMxYS02MzI1MTFhZjM3OTQuanBnIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.WuClhc2HURnm_qge43O7z5f_TekJB8mKgKtKmpgEUkM');
                    background-size: cover;
                    background-position: center;
                    margin: 0;
                    padding: 0;
                    color: #333;
                }

                /* Container to center the content */
                .container {
                    width: 90%;
                    max-width: 1000px;
                    margin: 30px auto;
                    padding: 20px;
                    background-color: rgba(229, 172, 80, 0.9);
                    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                    border-radius: 8px;
                    min-height: 800px;
                }

                /* Header styles */
                h1 {
                    font-size: 2.8em;
                    color:rgb(49, 76, 103);
                    margin-bottom: 20px;
                    text-align: center;
                }

                /* Paragraph styles */
                p {
                    font-size: 1.2em;
                    color:rgb(11, 58, 76);
                    line-height: 1.6;
                    text-align: center;
                }

                /* Label and input styles */
                label, input {
                    font-size: 1.2em;
                    color: #34495e;
                }

                input {
                    padding: 10px;
                    margin-top: 5px;
                    width: 100%;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                    background-color:rgba(249, 249, 249, 0.82);
                }

                /* Table styles */
                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-top: 30px;
                }

                th, td {
                    padding: 12px;
                    text-align: left;
                    border-bottom: 1px solidrgb(144, 112, 112);
                    font-size: 1.1em;
                }

                th {
                    background-color:rgba(41, 127, 185, 0.81);
                    color: white;
                }

                td {
                    background-color:rgba(249, 249, 249, 0.8);
                }

                .d-derecha {
                    text-align: right;
                }

                /* Button styles */
                .boton {
                    background-color: #27ae60;
                    color: white;
                    padding: 15px 30px;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                    font-size: 1.2em;
                    margin-top: 20px;
                    border-radius: 4px;
                    cursor: pointer;
                    transition: background-color 0.3s ease;
                }

                .boton:hover {
                    background-color: #2ecc71;
                }

                .footer {
                    margin-top: 40px;
                    text-align: center;
                    color: #7f8c8d;
                    font-size: 1em;
                    border-top: 1px solid #ccc;
                    padding: 10px;
                }

            </style>

        </head>

        <body>
            <div class="container">

                <?php
    }

    public function __destruct()
    {
        ?>

                
            </div>
            <div class="footer" style="background-color: rgba(180, 117, 14, 0.42);">
                <p>Desarrollado por Netrolly01®️</p>
            </div>
        </body>
        </html>

        <?php
    }

}
?>