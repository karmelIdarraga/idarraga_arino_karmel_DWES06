package birt.dwes.ud06.entity;

import org.hibernate.annotations.DynamicUpdate;

import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.Table;

@Entity
@DynamicUpdate
@Table(name = "jugadores")
public class Jugador {

	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY)
	@Column(name = "id_jugador")
	private int id_jugador;
	
	@Column(name = "nombre")
	private String nombre;
	
	@Column(name = "edad")
	private int edad;
	
	@Column(name = "nivel")
	private float nivel;

/*
	/**
	 * @param id_jugador
	 * @param nombre
	 * @param edad
	 * @param nivel
	
	public Jugador(int id_jugador, String nombre, int edad, int nivel) {
		this.id_jugador = id_jugador;
		this.nombre = nombre;
		this.edad = edad;
		this.nivel = nivel;
	}
 */
	public int getId_jugador() {
		return id_jugador;
	}

	public void setId_jugador(int id_jugador) {
		this.id_jugador = id_jugador;
	}

	public String getNombre() {
		return nombre;
	}

	public void setNombre(String nombre) {
		this.nombre = nombre;
	}

	public int getEdad() {
		return edad;
	}

	public void setEdad(int edad) {
		this.edad = edad;
	}

	public float getNivel() {
		return nivel;
	}

	public void setNivel(float nivel) {
		this.nivel = nivel;
	}
	
}
