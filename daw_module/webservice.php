<?php
/**
 *
 * Classe que realiza pedidos a API do eventbrite.com
 * @author Nuno Guedes Silva
 *
 */
class Webservice {

	
	const API_KEY = "ADD YOUR API KEY";
	private $api_endpoint = "https://www.eventbrite.com/json/";

	function __construct() {

	}

	/**
	 *
	 * Realizado pedido ao endpoint
	 * @param $metodo
	 */
	private function get($metodo) {
		$url = $this->api_endpoint . $metodo . "&app_key=" . self::API_KEY;
		//TODO: alterar o pedido para cURL invés file_get_contents.
		$pedido = file_get_contents($url);

		return json_decode($pedido);
	}

	/**
	 *
	 * Realiza pesquisa por palavas chave.
	 * @param $palavras
	 */
	public function pesquisa($palavras){
		$metodo = "event_search?keywords=" . $palavras;
		$resultado = $this->get($metodo);
		
		return $resultado;
	}

	/**
	 * 
	 * Realiza pesquisa por coordenadas GPS e distância
	 * @param $latitude
	 * @param $longitude
	 * @param $distancia
	 */
	public function pesquisaGps($latitude, $longitude, $distancia) {
		$metodo = "event_search?latitude=" . $latitude . "&longitude=" . $longitude . "&within=" . $distancia . "&within_unit=K&max=20";
		$resultado = $this->get($metodo);

		return $resultado;
	}

	/**
	 * 
	 * Obtém um evento
	 * @param $id_evento
	 */
	public function obterEvento($id_evento){
		$metodo = "event_get?id=" . $id_evento;
		$resultado = $this->get($metodo);

		return $resultado;
	}
	
}
