package birt.dwes.ud06.dao.impl;

import java.util.List;

import org.hibernate.Session;
import org.hibernate.query.Query;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Repository;

import birt.dwes.ud06.dao.JugadorDAO;
import birt.dwes.ud06.entity.Jugador;
import jakarta.persistence.EntityManager;
import jakarta.transaction.Transactional;

@Repository
public class JugadorDAOImpl implements JugadorDAO {

	@Autowired
	private EntityManager entityManager;
	
	@Override
	@Transactional
	public List<Jugador> findAll() {
		Session currentSession = entityManager.unwrap(Session.class);
		Query<Jugador> consulta = currentSession.createQuery("FROM Jugador", Jugador.class);
		List<Jugador> jugadores = consulta.getResultList();
		return jugadores;
	}

	@Override
	@Transactional
	public List<Jugador> findAbyNivel(float nivelMinimo) {
		Session currentSession = entityManager.unwrap(Session.class);
		Query<Jugador> consulta = currentSession.createQuery("FROM Jugador WHERE nivel >= :nivel", Jugador.class).setParameter("nivel", nivelMinimo);
		List<Jugador> jugadores = consulta.getResultList();
		return jugadores;
	}

	@Override
	@Transactional
	public void guardar(Jugador jugador) {
		Session currentSession = entityManager.unwrap(Session.class);
		
		currentSession.persist(jugador);

	}

}
