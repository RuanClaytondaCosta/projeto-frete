<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
</head>
<body>



<form action="<?php echo e(route('frete.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>


    <h1>Formulario Frete</h1>

    <div class="input-container">
    <label for="cliente">Cliente</label>
    <input type="text" name="cliente" id="cliente" placeholder="cliente" required>
</div>


    <div class="input-container">
    <label>Peso (kg):</label>
    <input placeholder="Peso" type="number" step="0.01" name="peso" required><br>
    </div>

    <div class="input-container">
    <label>Distância (km):</label>
    <input placeholder="Distancia" type="number" step="0.01" name="distancia" required><br>
    </div>
    <label>Tipo de frete:</label>
    <select name="tipo" required>
        <option value="normal">Normal</option>
        <option value="expresso">Expresso</option>
    </select><br>

    <button class="submit-button" type="submit">Calcular</button>
</form>


    
</body>
</html>

<?php /**PATH C:\Users\RUAN\Documents\projetos HTML\laravel projeto2\laravel projeto\frete-app\resources\views/frete/formulario.blade.php ENDPATH**/ ?>