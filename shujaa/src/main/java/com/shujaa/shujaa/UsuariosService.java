package com.shujaa.shujaa;

import com.shujaa.shujaa.Usuarios;
import com.shujaa.shujaa.UsuariosRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;
import java.util.Optional;

@Service
public class UsuariosService {

    @Autowired
    private UsuariosRepository usuariosRepository;

    public List<Usuarios> obtenerTodosUsuarios() {
        return usuariosRepository.findAll();
    }

    public Optional<Usuarios> obtenerUsuarioPorId(Long id) {
        return usuariosRepository.findById(id);
    }

    public Usuarios guardarUsuario(Usuarios usuario) {
        System.out.printf(usuario.toString());
        return usuariosRepository.save(usuario);
    }

    public void eliminarUsuario(Long id) {
        usuariosRepository.deleteById(id);
    }
}
