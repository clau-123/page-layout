package com.shujaa.shujaa;

import jakarta.persistence.*;
import lombok.Data;

@Entity
@Table(name = "producto")
@Data
public class Producto {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Integer id;

    @Column( length = 50)
    private String nombre;

    @Column( length = 50)
    private String descripcion;

    @Column( length = 50)
    private String unidad_medida;

    @Column( length = 50)
    private String precio;
    @Column( length = 50)
    private String peso;

    @Column( length = 50)
    private String volumen;
    @Column( length = 50)
    private String stock;

    @Column( length = 50)
    private String stock_minimo;
    @Column( length = 50)
    private String stock_maximo;

    @Column( length = 50)
    private String categoria;
}
