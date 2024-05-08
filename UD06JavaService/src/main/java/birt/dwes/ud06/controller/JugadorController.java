package birt.dwes.ud06.controller;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import birt.dwes.ud06.entity.Jugador;
import birt.dwes.ud06.service.JugadorService;

@RestController
@RequestMapping("/api") //esta es la raiz de la url http://localhost:8080/api
public class JugadorController {
	
	@Autowired
	private JugadorService jugadorService;
	
	@GetMapping("/jugadores")
	public List<Jugador> findAll(){
		return jugadorService.findAll();		
	}
	
	@GetMapping("/jugadores/nivel/{nivel}")
	public List<Jugador> findByNivel(@PathVariable float nivel){
		return jugadorService.findAbyNivel(nivel);		
	}
	
	@PostMapping("/jugadores/alta")
	public Jugador addJugador(@RequestBody Jugador jugador) {
		jugadorService.guardar(jugador);		
		return jugador;
	}

}
