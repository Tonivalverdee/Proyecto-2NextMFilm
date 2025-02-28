<?php
declare(strict_types=1);

require_once 'classes.php';
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