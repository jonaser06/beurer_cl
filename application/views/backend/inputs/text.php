<div class="form-group">
    <label for="<?= $variable['nombre'] ?>">
        <?= $variable['label']; ?> <small style="color: #999;"><?= $variable['descripcion']; ?></small>
    </label>
    <input type="text" class="form-control" name="<?= $variable['nombre'] ?>" id="<?= $variable['nombre'] ?>" value="<?= isset($variable['valor']) ? $variable['valor'] : ''; ?>">
</div>
<hr>