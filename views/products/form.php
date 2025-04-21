<div class="form-container">
    <h1><?php echo isset($product) ? 'Editar Producto' : 'Crear Producto'; ?></h1>
    <form method="POST">
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($product['name'] ?? ''); ?>" required>
        </div>

        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea id="description" name="description"><?php echo htmlspecialchars($product['description'] ?? ''); ?></textarea>
        </div>

        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" id="stock" name="stock" value="<?php echo htmlspecialchars($product['stock'] ?? 0); ?>" required>
        </div>

        <div class="form-group">
            <label for="price">Precio</label>
            <input type="number" step="0.01" id="price" name="price" value="<?php echo htmlspecialchars($product['price'] ?? 0); ?>" required>
        </div>

        <div class="form-actions">
            <button type="submit">Guardar</button>
            <a href="/products" class="btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
