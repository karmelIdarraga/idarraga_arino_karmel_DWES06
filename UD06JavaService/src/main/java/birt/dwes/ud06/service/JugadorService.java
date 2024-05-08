package birt.dwes.ud06.service;

import java.util.List;

import birt.dwes.ud06.entity.Jugador;

public interface JugadorService {
	
public List<Jugador> findAll();
	
	/**
	 * Método que sirve para buscar una lista de jugadores con un nivel
	 * igual o superior al indicado como parámetro
	 * @param nivelMinimo
	 * @return lista de jugadores
	 */
	public List<Jugador> findAbyNivel(float nivelMinimo);
	
	public void guardar (Jugador jugador);

}
