<?php
// classes.php
class Pelicula {
    public $titulo;
    public $fechaEstreno;
    public $diasHastaEstreno;
    public $posterUrl;

    public function __construct($titulo, $fechaEstreno, $diasHastaEstreno, $posterUrl) {
        $this->titulo = $titulo;
        $this->fechaEstreno = $fechaEstreno;
        $this->diasHastaEstreno = $diasHastaEstreno;
        $this->posterUrl = $posterUrl;
    }

    public function mostrarDetalles() {
        return "<img src='{$this->posterUrl}' alt='{$this->titulo}'>
                <h2>{$this->titulo} se estrena en {$this->diasHastaEstreno} días</h2>
                <p class='fs5'>Fecha de estreno: <strong>{$this->fechaEstreno}</strong></p>";
    }
}

class ApiPelicula {
    const API_URL = "https://whenisthenextmcufilm.com/api";

    public function obtenerDatos() {
        $result = file_get_contents(self::API_URL);
        return json_decode($result, true);
    }

    public function Pelicula($data) {
        return new Pelicula(
            $data["title"],
            $data["release_date"],
            $data["days_until"],
            $data["poster_url"]
        );
    }

    public function PeliculaSiguiente($data) {
        return new Pelicula(
            $data["following_production"]["title"],
            $data["following_production"]["release_date"],
            $data["following_production"]["days_until"],
            $data["following_production"]["poster_url"]
        );
    }
}
?>