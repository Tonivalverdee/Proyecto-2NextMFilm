<?php
declare(strict_types=1);

class Pelicula {
    public string $titulo;
    public string $fechaEstreno;
    public int $diasHastaEstreno;
    public string $posterUrl;

    public function __construct(string $titulo, string $fechaEstreno, int $diasHastaEstreno, string $posterUrl) {
        $this->titulo = $titulo;
        $this->fechaEstreno = $fechaEstreno;
        $this->diasHastaEstreno = $diasHastaEstreno;
        $this->posterUrl = $posterUrl;
    }

    public function mostrarDetalles(): string {
        return "<img src='{$this->posterUrl}' alt='{$this->titulo}'>
                <h2>{$this->titulo} se estrena en {$this->diasHastaEstreno} días</h2>
                <p class='fs5'>Fecha de estreno: <strong>{$this->fechaEstreno}</strong></p>";
    }
}

class ApiPelicula {
    private string $api_url;

    public function __construct(string $api_url) {
        $this->api_url = $api_url;
    }

    public function obtenerDatos(): array {
        $result = file_get_contents($this->api_url);
        return json_decode($result, true);
    }

    public function Pelicula(array $data): Pelicula {
        return new Pelicula(
            $data["title"],
            $data["release_date"],
            $data["days_until"],
            $data["poster_url"]
        );
    }

    public function PeliculaSiguiente(array $data): Pelicula {
        return new Pelicula(
            $data["following_production"]["title"],
            $data["following_production"]["release_date"],
            $data["following_production"]["days_until"],
            $data["following_production"]["poster_url"]
        );
    }
}
?>