package birt.dwes.ud06.service.impl;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import birt.dwes.ud06.dao.JugadorDAO;
import birt.dwes.ud06.entity.Jugador;
import birt.dwes.ud06.service.JugadorService;

@Service
public class JugadorServiceImpl implements JugadorService {

	@Autowired
	private JugadorDAO jugadorDAO;
	
	@Override
	public List<Jugador> findAll() {
		List<Jugador> listado = jugadorDAO.findAll();
		return listado;
	}

	@Override
	public List<Jugador> findAbyNivel(float nivelMinimo) {
		List<Jugador> listado = jugadorDAO.findAbyNivel(nivelMinimo);
		return listado;
	}

	@Override
	public void guardar(Jugador jugador) {
		jugadorDAO.guardar(jugador);

	}

}
