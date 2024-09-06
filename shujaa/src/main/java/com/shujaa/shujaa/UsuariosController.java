    package com.shujaa.shujaa;

    import org.springframework.beans.factory.annotation.Autowired;
    import org.springframework.http.ResponseEntity;
    import org.springframework.web.bind.annotation.*;

    import java.util.List;
    import java.util.Optional;

    @RestController
    @RequestMapping("/usuario")
    public class UsuariosController {

        @Autowired
        private UsuariosService usuariosService;

        @GetMapping
        public ResponseEntity<List<Usuarios>> getUsuarios() {
            List<Usuarios> usuarios = usuariosService.obtenerTodosUsuarios();
            return ResponseEntity.ok(usuarios);
        }

        @GetMapping("/{id}")
        public ResponseEntity<Usuarios> getUsuario(@PathVariable Long id) {
            Optional<Usuarios> usuario = usuariosService.obtenerUsuarioPorId(id);
            if (usuario.isPresent()) {
                return ResponseEntity.ok(usuario.get());
            } else {
                return ResponseEntity.notFound().build();
            }
        }
        @PostMapping
        public ResponseEntity<Usuarios> addUsuario(@RequestBody Usuarios usuario) {
            usuario = usuariosService.guardarUsuario(usuario);
            return ResponseEntity.ok(usuario);
        }

        @PutMapping("/{id}")
        public ResponseEntity<Usuarios> updateUsuario(@PathVariable Long id, @RequestBody Usuarios usuario) {
            if (!usuariosService.obtenerUsuarioPorId(id).isPresent()) {
                return ResponseEntity.notFound().build();
            }
            usuario.setId(Math.toIntExact(id));
            usuario = usuariosService.guardarUsuario(usuario);
            return ResponseEntity.ok(usuario);
        }

        @DeleteMapping("/{id}")
        public ResponseEntity<Void> deleteUsuario(@PathVariable Long id) {
            if (usuariosService.obtenerUsuarioPorId(id).isPresent()) {
                usuariosService.eliminarUsuario(id);
                return ResponseEntity.noContent().build();
            }
            return ResponseEntity.notFound().build();
        }
    }
